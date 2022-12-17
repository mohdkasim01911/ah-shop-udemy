<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('front/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/bootstrap-select.min.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('front/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('front.front_include.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content');
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('front.front_include.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{asset('front/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('front/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('front/assets/js/echo.min.js')}}"></script> 
<script src="{{asset('front/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('front/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('front/assets/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('front/assets/js/lightbox.min.js')}}"></script> 
<script src="{{asset('front/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('front/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('front/assets/js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
      </script>  


   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span></strong></h5>
        <button type="button" id="clodeModel" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         
         <div class="row">
              
              <div class="col-md-4">

                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src=" " alt="..." style="height: 200px;width: 200px;" id="pimage">
                </div>
                  
              </div> <!-- cols row -->

              <div class="col-md-4">
                  
                <ul class="list-group">
                  <li class="list-group-item">Product Price: <strong id="sprice" class="text-danger"></strong>  <strong><del id="price"></del></strong></li>
                  <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                  <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                  <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
                  <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="available" style="background-color:green;color:white"></span><span class="badge badge-pill badge-success" id="OutStock" style="background-color:red;color:white"></span></li>
                </ul>

              </div> <!-- cols row --><!-- modal row -->

              <div class="col-md-4">
                <div class="form-group">
                  <label for="color">Choose Color</label>
                  <select id="color" class="form-control" name="color">

                  </select>
                </div> <!-- Form Group -->

                 <div class="form-group" id="sizeArea">
                  <label for="size">Choose Size</label>
                  <select class="form-control" id="size" name="size">
                    
                  </select>
                </div> <!-- Form Group -->

                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="number" name="" id="quantity" class="form-control" value="1" min="1">
                </div> <!-- Form Group -->
             <input type="hidden" id="product_id">
            <button class="btn btn-primary mb-2" onclick="addincart()">Add to Cart</button>

              </div> <!-- cols row -->

         </div> <!-- modal row -->
      </div>
    </div>
  </div>
</div>    
  
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<!-- product View Start -->

<script type="text/javascript">
    function productView(id){
        $.ajax({
            type:'GET',
            url:'/product/view/modal/'+id,
            dataType : 'json',
            success:function(data){
                $('#pname').text(data.product.product_name_en);
                $('#pprice').text(data.product.product_selling_price);
                $('#pcode').text(data.product.product_code);
                $('#pcategory').text(data.product.category.cat_name_en);
                $('#pbrand').text(data.product.brand.brand_name_en);
                $('#pimage').attr('src','/'+data.product.product_thambnail);

                $('#product_id').val(id);
                $('#quantity').val(1);

                 if(data.product.product_selling_price == null)
                 {
                    $('#price').text('');
                    $('#sprice').text('');
                    $('#price').text(data.product.product_selling_price);
                }else{
                    $('#price').text('');
                    $('#sprice').text('');
                    $('#price').text(data.product.product_selling_price);
                    $('#sprice').text(data.product.product_discont_price);
                }

                if(data.product.product_qty > 0)
                {
                   $('#available').text('');
                   $('#OutStock').text('');
                   $('#available').text('available');
                }else{
                   $('#available').text('');
                   $('#OutStock').text('');
                   $('#OutStock').text('OutStock');
                }


                // show color
                $('select[name="color"]').empty();
                $.each(data.color,function(key,value){
                 $('select[name="color"]').append('<option value="' +value+ '">'+ value +'</option>')

                });

                 $('select[name="size"]').empty();
                 $.each(data.size,function(key,value){
                 $('select[name="size"]').append('<option value="' +value+ '">'+ value +'</option>');
                   
                    if(data.size == ""){
                        $('#sizeArea').hide();
                    }else{
                        $('#sizeArea').show();
                    }

                });
            }
        })
    }

// end modal show data

//start add to card 

function addincart(){
    var product_name = $('#pname').text();
    var id = $('#product_id').val();
    var color = $('#color option:selected').text();
    var size = $('#size option:selected').text();
    var quantity = $('#quantity').val();

    $.ajax({
        type : 'POST',
        dataType : 'json',
        data : {color:color,size:size,quantity:quantity,product_name:product_name},
        url : '/cart/data/store/'+id,
        success:function(data){

            miniCart();
           $('#clodeModel').click();

           //start message

        const Toast = Swal.mixin({
                      toast : true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                  if($.isEmptyObject(data.error))
                  {
                     Toast.fire({
                         type : "success",
                         title : data.success
                     })
                  }else{
                         Toast.fire({
                         type : "error",
                         title : data.error
                     })
                  }

           //end message


        }
    });

}


</script>

<script type="text/javascript">
    
    function miniCart()
    {
        $.ajax({
            type: "GET",
            url : "/product/mini/cart",
            dataType : "json",
            success : function(response){

               $('span[id="cartValue"]').text(response.cartTotal);
               $('#cartQty').text(response.cartQty);

               var miniCart  = "";

                $.each(response.carts,function(key,value){
                    
                miniCart += `<div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                      <div class="price">${value.price} * ${value.qty}</div>
                    </div>
                    <div class="col-xs-1 action"> <button type="submit" id="${value.rowId}" onclick="removeMiniCart(this.id)"><i class="fa fa-trash"></i></button> </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <hr>`

                })


               $('#miniCarts').html(miniCart);
            }
        });
    }

    miniCart();


    //remove item from card

    function removeMiniCart(id)
    {
          $.ajax({
              type:"GET",
              url : '/miniCart/product-remove/'+id,
              dataType : "json",
              success : function(data){
               miniCart();

                //start message

        const Toast = Swal.mixin({
                      toast : true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                  if($.isEmptyObject(data.error))
                  {
                     Toast.fire({
                         type : "success",
                         title : data.success
                     })
                  }else{
                         Toast.fire({
                         type : "error",
                         title : data.error
                     })
                  }

           //end message
              }
          });
    }

</script>

</body>
</html>