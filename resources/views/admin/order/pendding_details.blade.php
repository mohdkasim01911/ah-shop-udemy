@extends('admin.admin_master')
@section('admin')
	  <div class="container-full">
		<!-- Main content -->

		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Basic Box</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Box Cards</li>
								<li class="breadcrumb-item active" aria-current="page">Basic Box</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<section class="content">
		  <div class="row">

		  	<div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Shipping </strong> Details</h4>
				  </div>
				  <table class="table">
                           <tr>
                              <th>Shipping Name : </th>
                              <th>{{$orders->user->name}}</th>
                           </tr>
                           <tr>
                              <th>Shipping Phone : </th>
                              <th>{{$orders->phone}}</th>
                           </tr>
                           <tr>
                              <th>Shipping Email : </th>
                              <th>{{$orders->email}}</th>
                           </tr>
                           <tr>
                              <th>Devision : </th>
                              <th>{{$orders->division->division_name}}</th>
                           </tr>
                           <tr>
                              <th>District : </th>
                              <th>{{$orders->destrict->distric_name}}</th>
                           </tr>
                           <tr>
                              <th>State  : </th>
                              <th>{{$orders->state->state_name}}</th>
                           </tr>

                           <tr>
                              <th>Post Code  : </th>
                              <th>{{$orders->post_code}}</th>
                           </tr>

                           <tr>
                              <th>Order Date  : </th>
                              <th>{{$orders->order_date}}</th>
                           </tr>
                        </table>
				</div>
			  </div>

			  <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Order </strong> Details <span class="text-danger">Invoice: {{$orders->invoice_number}}</span></h4>
				  </div>
				    <table class="table">
                           <tr>
                              <th> Name : </th>
                              <th>{{$orders->user->name}}</th>
                           </tr>
                           <tr>
                              <th> Phone : </th>
                              <th>{{$orders->user->phone}}</th>
                           </tr>
                           <tr>
                              <th>Payment Type : </th>
                              <th>{{$orders->payment_method}}</th>
                           </tr>
                           <tr>
                              <th>Tranx ID : </th>
                              <th>{{$orders->transaction_id}}</th>
                           </tr>
                           <tr>
                              <th>Invoice : </th>
                              <th class="text-danger">{{$orders->invoice_number}}</th>
                           </tr>
                           <tr>
                              <th>Order Total  : </th>
                              <th>{{$orders->amont}}</th>
                           </tr>

                           <tr>
                              <th>Order  : </th>
                              <th>{{$orders->post_code}}</th>
                           </tr>

                           <tr>
                              <th>Order Date  : </th>
                              <th><span class="badge badge-pill badge-warning" style="background: #418D89">{{$orders->status}}</span></th>
                           </tr>

                           <tr>
                              @if($orders->status == 'pendding')
                              <th></th>
                              <th><a href="{{route('pendding.confirm',$orders->id)}}" class="btn btn-block btn-success">Confirm Order</a></span></th>
                              @elseif($orders->status == 'confirm')
                               <th></th>
                              <th><a href="{{route('confirm.Proccessing',$orders->id)}}" class="btn btn-block btn-success">Proccessing Order</a></span></th>
                              @elseif($orders->status == 'proccessing')
                               <th></th>
                              <th><a href="{{route('proccessing.picked',$orders->id)}}" class="btn btn-block btn-success">Picked Order</a></span></th>
                              @elseif($orders->status == 'picked')
                               <th></th>
                              <th><a href="{{route('picked.shipped',$orders->id)}}" class="btn btn-block btn-success">Shipped Order</a></span></th>
                              @elseif($orders->status == 'shipped')
                               <th></th>
                              <th><a href="{{route('shipped.delivered',$orders->id)}}" class="btn btn-block btn-success">Delivered Order</a></span></th>
                              @endif
                           </tr>
                        </table>
				</div>
			  </div>


			  <div class="col-md-12 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					
				  </div>
                    <table class="table">
                        <tbody>
                            <tr>
                              <td class="col-md-1">
                                  <label for="">Image</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">Product Name</label>
                              </td>  
                              <td class="col-md-1">
                                  <label for="">Product Code</label>
                              </td> 
                              <td class="col-md-1">
                                  <label for="">Color</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">Size</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">Quantity</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">Price</label>
                              </td>
                            </tr>
                         @foreach($ordersItem as $item)
                            <tr>
                              <td class="col-md-1">
                                  <label for=""><img src="{{asset($item->product->product_thambnail)}}" width="50" height="50"></label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">{{$item->product->product_name_en}}</label>
                              </td> 
                              <td class="col-md-1">
                                  <label for="">{{$item->product->product_code}}</label>
                              </td>  
                              <td class="col-md-1">
                                  <label for="">{{$item->color}}</label>
                              </td>
                              <td class="col-md-1">
                                  <label for="">{{$item->size}}</label>
                              </td>

                               <td class="col-md-1">
                                  <label for="">{{$item->qty}}</label>
                              </td>

                              <td class="col-md-1">
                                  <label for="">${{$item->price}} ({{$item->price * $item->qty}})</label>
                              </td>
                              
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
				</div>
			  </div>

		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content --> 
	</div>


@endsection