@extends('admin.admin_master')
@section('admin')
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Pendding Order</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example5" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Date</th>
								<th>Invoice</th>
								<th>Amount</th>
								<th>Payment</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							 @php $i = 1; @endphp
						  @foreach($orders as $item)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$item->order_date}}</td>
								<td>{{$item->invoice_number}}</td>
								<td>${{$item->amont}}</td>
								<td>{{$item->payment_method}}</td>
								<td><span class="badge badge-pill btn-primary">{{$item->status}}</span></td>
								<td><a href="{{route('pendding.details',$item->id)}}" class="btn btn-primary mb-5"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="{{route('distric.delete',$item->id)}}" class="btn btn-danger mb-5 delete"><i class="fa fa-remove" aria-hidden="true"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->      
			</div>  
			<!-- /.col -->

		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content --> 
	</div>


@endsection