@extends('admin.admin_master')
@section('admin')

<div class="container-full">
	<!-- Main content -->
	<section class="content">
		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Profile</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('admin.update_profile')}}" enctype="multipart/form-data">
						@csrf
					  <div class="row">
						<div class="col-6">						
							<div class="form-group">
								<h5>Basic Text Input <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" class="form-control" required="" data-validation-required-message="This field is required" value="{{$profiledata->name}}"> <div class="help-block"></div></div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<h5>Email Field <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" class="form-control" required="" data-validation-required-message="This field is required" value="{{$profiledata->email}}"> <div class="help-block"></div></div>
							</div>
						</div>

                        <div class="col-6">
                        	<div class="form-group">
								<h5>File Input Field <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="image" class="form-control"  id="image"> <div class="help-block"></div></div>
							</div>
                        </div>

                        <div class="col-6">
                        	<img id="showImage" src="{{(!empty($profiledata->profile_photo_path))?url('upload/admin_image/'.$profiledata->profile_photo_path):url('upload/admin_image/no-image-available.webp')}}" style="width: 100px;height: 100px;">
                        </div>
					  </div>
						<div class="text-xs-right">
							<button type="submit" class="btn btn-rounded btn-info">Submit</button>
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
	<!-- /.content -->
</div>

<script type="text/javascript">
	$(document).ready(function(){
      $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
        	$('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      });
	});
</script>


@endsection