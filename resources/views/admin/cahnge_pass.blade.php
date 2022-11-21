@extends('admin.admin_master')
@section('admin')

<div class="container-full">
	<!-- Main content -->
	<section class="content">
		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Change Password</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('admin.update_password')}}" enctype="multipart/form-data">
						@csrf
						<div class="col-6">						
							<div class="form-group">
								<h5>Old Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="old_pass" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
							</div>
						</div>

						<div class="col-6">						
							<div class="form-group">
								<h5>New Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="new_pass" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
							</div>
						</div>

						<div class="col-6">						
							<div class="form-group">
								<h5>Confirm Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="C_pass" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
							   <button type="submit" class="btn btn-rounded btn-primary">Change Password</button>
						  </div>
						</div>       
					  </div>
					
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
	<!-- /.content -->
</div>

@endsection