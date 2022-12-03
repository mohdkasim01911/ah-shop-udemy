@extends('admin.admin_master')
@section('admin')
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example5" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Product En</th>
								<th>Product Hin</th>
								<th>Quantity</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							 @php $i = 1; @endphp
						  @foreach($products as $item)
							<tr>
								<td>{{$i++}}</td>
								<td width="140px">{{$item->product_name_en}}</td>
								<td width="140px">{{$item->product_name_hin}}</td>
								<td>{{$item->product_qty}}</td>
								<td><img src="{{asset($item->product_thambnail)}}" width="50" height="50"></td>
								<td><a href="{{route('product.edit',$item->id)}}" class="btn btn-primary mb-5"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    <a href="{{route('category.delete',$item->id)}}" class="btn btn-danger mb-5 delete"><i class="fa fa-remove" aria-hidden="true"></i></a>
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