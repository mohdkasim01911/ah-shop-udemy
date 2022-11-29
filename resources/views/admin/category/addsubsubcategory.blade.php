@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
       <!-- Add brand -->

      <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Sub->SubCategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
			       <form method="post" action="{{route('subsubcategory.store')}}" enctype="multipart/form-data">
						@csrf

						<div class="col-12">						
							<div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
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
								<h5>Sub Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
                                     <select class="form-control" name="subcategory_id">
                                      <option value="" selected="" disabled="">Select Category</option>
                                       
                                     </select>
                                     @error('subcategory_id')
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
									<input type="text" name="subcaten" class="form-control"data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('subcaten')
									  <div class="text-danger">{{ $message }}</div>
									@enderror
							</div>
						</div>

						<div class="col-12">						
							<div class="form-group">
								<h5>SubCategory Name Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="subcateh" class="form-control"data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('subcateh')
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

	<script type="text/javascript">
		$(document).ready(function(){
           $('select[name="category_id"]').on('change', function(){
              var category_id = $(this).val();
              if(category_id){
              	$.ajax({
                  url:"{{url('admin/subsubcategory/category/ajax')}}/"+category_id,
                  type : "get",
                  dataType : "json",
                  success:function(data){

                  	var d = $('select[name="subcategory_id"]').empty();
                  	 $.each(data,function(key, value){
                        $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcat_name_en + '</option>');
                  	 });
                  },
              	});
              }else{
              	alert('danger');
              }
           });
		});
	</script>


@endsection