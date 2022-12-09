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
				  <h3 class="box-title">Edit Slider</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
			       <form method="post" action="{{route('slider.update',$slider->id)}}" enctype="multipart/form-data">
						@csrf
						<div class="col-12">						
							<div class="form-group">
								<h5>Slider Title<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="slider_title" class="form-control" value="{{$slider->title}}">
								</div>
									@error('slider_title')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>

						<div class="col-12">						
							<div class="form-group">
								<h5>Slider Description<span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea  name="slider_desc" class="form-control">{{$slider->description}}</textarea>
								</div>
									@error('slider_desc')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>

						<div class="col-12">						
							<div class="form-group">
								<h5>Image <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="image" class="form-control">
								</div>
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