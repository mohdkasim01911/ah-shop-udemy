@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script
<!-- Content Wrapper. Contains page content -->
<div class="container-full">	  

<!-- Main content -->
<section class="content">

 <!-- Basic Forms -->
  <div class="box">
	<div class="box-header with-border">
	  <h4 class="box-title">Add Product</h4>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	  <div class="row">
		<div class="col">
			<form method="post" action="{{route('updateproduct',$product->id)}}" autocomplete="off" enctype="multipart/form-data">
				@csrf
			  <div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-md-4">
						<div class="form-group">
						<h5>Brand Select<span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="brand_id" id="brand_id"
							 class="form-control" aria-invalid="false">
								<option value="">Select Brand</option>
								@foreach($brands as $brand)
								<option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' : ''}}>{{$brand->brand_name_en}}</option>
								@endforeach
							</select>
						<div class="help-block"></div></div>
					    </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
						<h5>Select Category<span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="category_id" id="category_id"  class="form-control" aria-invalid="false">
								<option value="">Select category</option>
								@foreach($categorys as $category)
								<option value="{{$category->id}}" {{$category->id == $product->brand_id ? 'selected' : ''}}>{{$category->cat_name_en}}</option>
								@endforeach
							</select>
						<div class="help-block"></div></div>
					    </div>
							
						</div>
						<div class="col-md-4">
							<div class="form-group">
						<h5>Select SubCategory<span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="subcategory_id" id="subcategory_id"  class="form-control" aria-invalid="false">
								<option value="">Select SubCategory</option>

							</select>
						<div class="help-block"></div></div>
					    </div>
						</div>
					</div> <!-- Row 1st -->




					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
							   <h5>Select Sub->SubCategory<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subsubcategory_id" id="subsubcategory_id"  class="form-control" aria-invalid="false">
										<option value="">Select Sub->SubCategory</option>
									</select>
								</div>
						    </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<h5>Product Name English<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_name_en" class="form-control" value="{{$product->product_name_en}}">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<h5>Product Name Hindi<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_name_hin" class="form-control" value="{{$product->product_name_hin}}">
								</div>
							</div>
						</div>
					</div> <!-- Row 2nd -->


					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
							   <h5>Product Code<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_code" class="form-control" value="{{$product->product_code}}">
								</div>
						    </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<h5>Product Quantity<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_qty" class="form-control" value="{{$product->product_qty}}">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<h5>Product Tags English<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_tags_en" value="{{$product->product_tags_en}}" data-role="tagsinput">
								</div>
							</div>
						</div>
					</div> <!-- Row 3rd -->
                    

                    <div class="row">
						<div class="col-md-4">
							<div class="form-group">
							   <h5>Product Tags Hindi<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_tags_hin" value="{{$product->product_tags_hin}}" data-role="tagsinput">
								</div>
						    </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<h5>Product Size English<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_size_en" value="{{$product->product_size_en}}" data-role="tagsinput">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<h5>Product Size Hindi<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_size_hin" value="{{$product->product_size_hin}}" data-role="tagsinput">
								</div>
							</div>
						</div>
					</div> <!-- Row 4th -->


                    <div class="row">
						<div class="col-md-4">
							<div class="form-group">
							   <h5>Product Color English<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_color_en" value="{{$product->product_color_en}}" data-role="tagsinput">
								</div>
						    </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<h5>Product Color Hindi<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_color_hin" value="{{$product->product_color_hin}}" data-role="tagsinput">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<h5>Product Selling Price<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_selling_price" class="form-control" value="{{$product->product_selling_price}}">
								</div>
							</div>
						</div>
					</div> <!-- Row 4th -->


					 <div class="row">
						<div class="col-md-6">
							<div class="form-group">
							   <h5>Product Discount Price<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_discont_price" class="form-control" value="{{$product->product_discont_price}}">
								</div>
						    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<h5>Product Thumbnail<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="product_thambnail" class="form-control" onchange="mainThamurl(this)">
								</div>
								<img src="" id="mainThmb">
							</div>
						</div>
					</div> <!-- Row 5th -->


					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							   <h5>Short Discription English<span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea class="form-control" name="short_desc_en">{{$product->short_desc_en}}</textarea>
								</div>
						    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							   <h5>Short Discription Hindi<span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea class="form-control" name="short_desc_hin">{{$product->short_desc_hin}}</textarea>
								</div>
						    </div>
						</div>
					</div> <!-- Row 5th -->


					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							   <h5>Long Discription English<span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea id="editor1" name="long_desc_en" rows="10" cols="80">{{$product->long_desc_en}}</textarea>
								</div>
						    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							   <h5>Long Discription Hindi<span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea id="editor2" name="long_desc_hin" rows="10" cols="80">{{$product->long_desc_hin}}</textarea>
								</div>
						    </div>
						</div>
					</div> <!-- Row 5th -->


					<hr>
				</div>
			  </div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<div class="controls">
								<fieldset>
									<input type="checkbox" name="hot_deals" id="checkbox_5" value="1" aria-invalid="false" {{$product->hot_deals == 1 ? 'checked' : ''}}>
									<label for="checkbox_5">Hot Deals</label>
								</fieldset>
								<fieldset>
									<input type="checkbox" name="featured" id="checkbox_6" value="1" aria-invalid="false" {{$product->featured == 1 ? 'checked' : ''}}>
									<label for="checkbox_6">featured</label>
								</fieldset>
							<div class="help-block"></div></div></div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<div class="controls">
								<fieldset>
									<input type="checkbox" id="checkbox_7" value="1" data-validation-minchecked-minchecked="2" data-validation-minchecked-message="Choose at least two" name="special_offer" {{$product->special_offer == 1 ? 'checked' : ''}}>
									<label for="checkbox_7">Special Offer</label>
								</fieldset>
								<fieldset>
									<input type="checkbox" id="checkbox_8" value="1" name="special_deals" {{$product->special_deals == 1 ? 'checked' : ''}}>
									<label for="checkbox_8">Special Deals</label>
								</fieldset>
							<div class="help-block"></div>
						</div>
					  </div>
					</div>
						</div>
				<div class="text-xs-right">
					<input type="submit" name="submit" class="btn btn-primary" value="Add Product">
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


<!-- Multi image update -->

<section class="content">
	<div class="row">
    
     <div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Product Image<strong>Update</strong></h4>
				  </div>
        
           <form method="post" action="{{route('image.update')}}" enctype="multipart/form-data">
           	@csrf
             <div class="row row-sm">
             	@foreach($multiimage as $img)
             	 <div class="col-md-3">
             	 	  <div class="card">
									  <img class="card-img-top" src="{{asset($img->photo_name)}}" style="width:200px;height:200px" >
									  <div class="card-body">
									    <h5 class="card-title">
									    	<a href="#" class="btn btn-sm btn-danger delete" title="Delete-Data"><i class="fa fa-trash"></i></a>
									    </h5>
									    <p class="card-text">
									    	<div class="form-group">
									    		 <label class="form-control-label">Change Images<span class="text-danger">*</span></label>
									    		 <input type="file" name="multi_img[ {{$img->id
									    		 }} ]" class="form-control">
									    	</div>
									    </p>
									  </div>
									</div>
             	 </div>
             	@endforeach
             </div>
             <div class="text-xs-right">
             	 <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
             </div>
           	
           </form> 
       
				   
			  </div>
		 </div>


	</div>
</section>








<!-- multi image update end -->








</div>

    <script type="text/javascript">
		$(document).ready(function(){
              var category_id = $('#category_id').val();
              var subcat_id = '<?php echo $product->subcategory_id ?>';
              if(category_id){
              	$.ajax({
                  url:"{{url('admin/subsubcategory/category/ajax')}}/"+category_id,
                  type : "get",
                  dataType : "json",
                  success:function(data){
                  	var d = $('select[name="subcategory_id"]').empty();
                  	 $('select[name="subcategory_id"]').append('<option value="">Select SubCategory</option>');
                  	 $.each(data,function(key, value){

                      if(value.id == subcat_id)
	                    {
	                       var selected = 'selected';
	                    }else{
	                       var selected = '';
	                    }

                        $('select[name="subcategory_id"]').append('<option value="'+ value.id +'" '+ selected +'>' + value.subcat_name_en + '</option>');
                  	 });
                  },
              	});
              }else{
              	alert('danger');
              }
           });
	</script>

	<script type="text/javascript">
		setTimeout(() => {
  	      var subcategory_id = $('#subcategory_id').val();
          var subsubcat_id = '<?php echo $product->subsubcategory_id ?>';
          if(subcategory_id){
          	$.ajax({
              url:"{{url('admin/product/subsubcategory/ajax')}}/"+subcategory_id,
              type : "get",
              dataType : "json",
              success:function(data){
       
              	var d = $('select[name="subsubcategory_id"]').empty();
              	$('select[name="subsubcategory_id"]').append('<option value="">Select Sub->SubCategory</option>');
              	 $.each(data,function(key, value){
                    if(value.id == subsubcat_id)
                    {
                       var selected = 'selected';
                    }else{
                       var selected = '';
                    }

                    $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'" '+ selected +'>' + value.subsubcategory_name_en + '</option>');
              	 });
              },
          	});
          }else{
          	alert('danger');
          }
         },1000);
	</script>
  


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
                  	 $('select[name="subcategory_id"]').append('<option value="">Select SubCategory</option>');
                  	 $.each(data,function(key, value){
                        $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcat_name_en + '</option>');
                  	 });
                  },
              	});
              }else{
              	alert('danger');
              }
           });


           $('select[name="subcategory_id"]').on('change', function(){
              var subcategory_id = $(this).val();
              if(subcategory_id){
              	$.ajax({
                  url:"{{url('admin/product/subsubcategory/ajax')}}/"+subcategory_id,
                  type : "get",
                  dataType : "json",
                  success:function(data){
           
                  	var d = $('select[name="subsubcategory_id"]').empty();
                  	$('select[name="subsubcategory_id"]').append('<option value="">Select Sub->SubCategory</option>');
                  	 $.each(data,function(key, value){
                        $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                  	 });
                  },
              	});
              }else{
              	alert('danger');
              }
           });


		});
	</script>

	<script type="text/javascript">
		function mainThamurl(input) {
			if(input.files && input.files[0]){

				var reader = new FileReader();
				reader.onload = function(e){
                  $("#mainThmb").attr('src',e.target.result).width(80).height(80);
				};
				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>

    <script type="text/javascript">
    	  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpeg|png|webp)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
    </script>	


@endsection