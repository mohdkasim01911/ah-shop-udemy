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
				  <h3 class="box-title">Add State</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
			       <form method="post" action="{{route('state.update',$AreaState->id)}}">
						@csrf
						<div class="col-12">						
							<div class="form-group">
								<h5>Select Devision<span class="text-danger">*</span></h5>
								<div class="controls">
									<select class="form-control" name="devision_id">
										<option value="" selected="" disabled="">Select Devision</option>
									 @foreach($division as $div)
										<option value="{{$div->id}}" {{$div->id == $AreaState->division_id ? 'selected' : ''}}>{{$div->division_name}}</option>
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
								<h5>Select Distric<span class="text-danger">*</span></h5>
								<div class="controls">
									<select class="form-control" name="distric_id">
										<option value="" selected="" disabled="">Select Distric</option>
									 @foreach($distric as $dis)
										<option value="{{$dis->id}}" {{$dis->id == $AreaState->distric_id ? 'selected' : ''}}>{{$dis->distric_name}}</option>
									 @endforeach
									</select>
								</div>
									@error('distric_id')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>

						<div class="col-12">						
							<div class="form-group">
								<h5>State Name<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="state_name" class="form-control" value="{{$AreaState->state_name}}">
								</div>
									@error('state_name')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
							   <input type="submit" name="submit" class="btn btn-rounded btn-primary" value="Add State">
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