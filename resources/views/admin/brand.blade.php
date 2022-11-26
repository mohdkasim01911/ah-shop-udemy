@extends('admin.admin_master')
@section('admin')
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example5" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Brand En</th>
								<th>Brand Hin</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							 @php $i = 1; @endphp
						  @foreach($brand as $brands)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$brands->brand_name_en}}</td>
								<td>{{$brands->brand_name_hin}}</td>
								<td><img src="{{asset($brands->brand_image)}}" style="width:50px;height:50px"></td>
								<td><a href="{{route('admin.brand.edit',$brands->id)}}" class="btn btn-primary mb-5"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    <a href="{{route('admin.brand.delete',$brands->id)}}" class="btn btn-danger mb-5 delete"><i class="fa fa-remove" aria-hidden="true"></i></a>
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

      

       <!-- Add brand -->

      <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
			       <form method="post" action="{{route('admin.brand.store')}}" enctype="multipart/form-data">
						@csrf
						<div class="col-12">						
							<div class="form-group">
								<h5>Brand Name English<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="bne" class="form-control"data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('bne')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>

						<div class="col-12">						
							<div class="form-group">
								<h5>Brand Name Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="bnh" class="form-control"data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('bnh')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>

						<div class="col-12">						
							<div class="form-group">
								<h5>Image <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="image" class="form-control"> <div class="help-block"></div></div>
									@error('image')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
							   <input type="submit" name="submit" class="btn btn-rounded btn-primary" value="Add Brand">
						  </div>
						</div>       
					  </div>
					
					</form>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->      
			</div> 
			
		<!-- end add page -->


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content --> 
	</div>


@endsection