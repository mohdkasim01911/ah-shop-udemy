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
				  <h3 class="box-title">Edit Coupan</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
			       <form method="post" action="{{route('coupan.update',$coupan->id)}}" enctype="multipart/form-data">
						@csrf
						<div class="col-12">						
							<div class="form-group">
								<h5>Coupan Name<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="copan_name" class="form-control" value="{{$coupan->coupan_name}}">
								</div>
									@error('copan_name')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>

						<div class="col-12">						
							<div class="form-group">
								<h5>Discount<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="coupan_discount" class="form-control" value="{{$coupan->coupan_discount}}">
								</div>
									@error('coupan_discount')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>

						<div class="col-12">						
							<div class="form-group">
								<h5>Date<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="date" name="copan_date" class="form-control" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" value="{{$coupan->coupan_validety}}">
								</div>
									@error('copan_date')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>

						<div class="col-12">
							<div class="form-group">
							   <input type="submit" name="submit" class="btn btn-rounded btn-primary" value="Update Copan">
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