@extends('admin.admin_master')
@section('admin')
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
       <!-- Add brand -->

      <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
			       <form method="post" action="{{route('admin.brand.update',$brand->id)}}" enctype="multipart/form-data">
						@csrf
						<div class="col-12">

                            <input type="hidden" name="id" value="{{$brand->id}}">
                            <input type="hidden" name="images" value="{{$brand->brand_image}}">

							<div class="form-group">
								<h5>Brand Name English<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="bne" class="form-control"data-validation-required-message="This field is required" value="{{$brand->brand_name_en}}"> <div class="help-block"></div></div>
									@error('bne')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>

						<div class="col-12">						
							<div class="form-group">
								<h5>Brand Name Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="bnh" class="form-control"data-validation-required-message="This field is required" value="{{$brand->brand_name_hin}}"> <div class="help-block"></div></div>
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