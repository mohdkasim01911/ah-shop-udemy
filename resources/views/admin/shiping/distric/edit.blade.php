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
				  <h3 class="box-title">Add Slider</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
			       <form method="post" action="{{route('distric.update',$distric->id)}}">
						@csrf
						<div class="col-12">						
							<div class="form-group">
								<h5>select devision<span class="text-danger">*</span></h5>
								<div class="controls">
									<select class="form-control" name="devision_id">
										<option value="" selected="" disabled="">Select Distric</option>
									 @foreach($division as $div)
										<option value="{{$div->id}}" {{$distric->division_id == $div->id ? 'selected' : ''}}>{{$div->division_name}}</option>
									 @endforeach
									</select>
								</div>
									@error('devision_id')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>

						<div class="col-12">						
							<div class="form-group">
								<h5>Distric Name<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="distric_name" class="form-control" value="{{$distric->distric_name}}">
								</div>
									@error('distric_name')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
							   <input type="submit" name="submit" class="btn btn-rounded btn-primary" value="Add Division">
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