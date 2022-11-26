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
				  <h3 class="box-title">Add Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
			       <form method="post" action="{{route('subcategory.store')}}" enctype="multipart/form-data">
						@csrf

						<div class="col-12">						
							<div class="form-group">
								<h5>Category Name <span class="text-danger">*</span></h5>
								<div class="controls">
                                     <select class="form-control" name="category_id">
                                      <option value="" selected="" disabled="">Select Category</option>
                                       @foreach($category as $categorys)
                                     	<option value="{{$categorys->id}}">{{$categorys->cat_name_en}}</option>
                                       @endforeach
                                     </select>
                                     @error('category_id')
									  <div class="text-danger">{{ $message }}</div>
									@enderror

									 <div class="help-block"></div>
								</div>
									
							</div>
						</div>

						<div class="col-12">

							<div class="form-group">
								<h5>SubCategory Name English<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="bne" class="form-control"data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('bne')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>

						<div class="col-12">						
							<div class="form-group">
								<h5>SubCategory Name Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="bnh" class="form-control"data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('bnh')
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