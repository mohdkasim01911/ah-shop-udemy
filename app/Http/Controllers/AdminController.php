<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Pipeline;

use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;

use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

use App\Actions\Fortify\AttemptToAuthenticate;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Http\Responses\LoginResponse;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }


    public function loginForm()
    {
        return view('auth.admin_login',['guard' => 'admin']);
    }

    /**
     * Show the login view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LoginViewResponse
     */
    public function create(Request $request): LoginViewResponse
    {
        return app(LoginViewResponse::class);
    }

    /**
     * Attempt to authenticate a new session.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return mixed
     */
    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            return app(LoginResponse::class);
        });
    }

    /**
     * Get the authentication pipeline instance.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Pipeline\Pipeline
     */
    protected function loginPipeline(LoginRequest $request)
    {
        if (Fortify::$authenticateThroughCallback) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                call_user_func(Fortify::$authenticateThroughCallback, $request)
            ));
        }

        if (is_array(config('fortify.pipelines.login'))) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                config('fortify.pipelines.login')
            ));
        }

        return (new Pipeline(app()))->send($request)->through(array_filter([
            config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
            Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LogoutResponse
     */
    public function destroy(Request $request): LogoutResponse
    {
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }

    public function profile(){
 
        $data = Admin::find(1);
        return view('admin.profile',compact('data'));
    }

    public function editProfile(){
 
        $profiledata = Admin::find(1);
        return view('admin.admin_profile',compact('profiledata'));
    }

    public function updateprofile(Request $request)
    { 
       $data = Admin::find(1);

       $data->name = $request->name;
       $data->email = $request->email;

       if($request->file('image'))
       {
         $file = $request->file('image');
         @unlink(public_path('upload/admin_image/'.$data->profile_photo_path));
         $filename = date('YmdHi').$file->getClientOriginalName();
         $file->move(public_path('upload/admin_image'),$filename);
         $data['profile_photo_path'] = $filename;
       }
       $data->save();

       $notification = array(
 
          'message' => 'Admin Profile Updated',
          'alert-type' => 'success'
 

       );

       return redirect()->route('admin.profile')->with($notification);
}

    public function change_password()
    {
         return view('admin.cahnge_pass');
    }

    public function update_password(Request $request)
    {



        // $validateData = $request->validate([
            
        //     'old_pass' => 'required',
        //     'password' => 'required|confirmed'

        // ]);

         $haspassword = Admin::find(1)->password;
         if(Hash::check($request->old_pass,$haspassword))
         {
            
            $admin = Admin::find(1);

            $admin->password = Hash::make($request->new_pass);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
         }else{
            return redirect()->back();
         }
    }


}

