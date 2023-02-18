@php
      
   $prefix = Request::route()->getPrefix();
   $route  = Route::current()->getname();


@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>AH</b> Shop</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{($route == 'dashboard')? 'active' :''}}">
          <a href="{{route('dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Brand</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'admin.brand' || $route == 'admin.brand.edit')? 'active' :''}}"><a href="{{route('admin.brand')}}"><i class="ti-more"></i>All Brand</a></li>
          </ul>
        </li> 
		  
        <li class="treeview {{($prefix == 'admin/category' || $prefix == 'admin/subcategory')?'active' :''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'category.list' || $route == 'category.add')? 'active' :''}}"><a href="{{route('category.list')}}"><i class="ti-more"></i>All Category</a></li>
            <li class="{{($route == 'subcategory.list' || $route == 'subcategory.add')?'active' :''}}"><a href="{{route('subcategory.list')}}"><i class="ti-more"></i>All SubCategory</a></li>

            <li class="{{($route == 'subsubcategory.list' || $route == 'subsubcategory.add')?'active' :''}}"><a href="{{route('subsubcategory.list')}}"><i class="ti-more"></i>All Sub->SubCategory</a></li>
          </ul>
        </li>
		
        <li class="treeview">
          <a href="#">
            <i data-feather="file"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('product-add')}}"><i class="ti-more"></i>Add-product</a></li>
            <li><a href="{{route('manage.product')}}"><i class="ti-more"></i>Manage Product</a></li>
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i data-feather="file"></i>
            <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('slider.add')}}"><i class="ti-more"></i>Add-slider</a></li>
            <li><a href="{{route('slider.view')}}"><i class="ti-more"></i>Manage Slider</a></li>
          </ul>
        </li> 

        <li class="treeview">
          <a href="#">
            <i data-feather="file"></i>
            <span>Coupan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('coupan.add')}}"><i class="ti-more"></i>Add-Coupan</a></li>
            <li><a href="{{route('coupan.view')}}"><i class="ti-more"></i>Manage Coupan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i data-feather="file"></i>
            <span>shiping</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('shiping.add')}}"><i class="ti-more"></i>Add-Shiping</a></li>
            <li><a href="{{route('shiping.view')}}"><i class="ti-more"></i>Manage Shiping</a></li>
            <li><a href="{{route('distric.add')}}"><i class="ti-more"></i>Add Distric</a></li>
            <li><a href="{{route('distric.view')}}"><i class="ti-more"></i>Manage Distric</a></li>
            <li><a href="{{route('state.add')}}"><i class="ti-more"></i>Add State</a></li>
            <li><a href="{{route('state.view')}}"><i class="ti-more"></i>Manage state</a></li>
          </ul>
        </li>  
		  
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('pendding.order')}}"><i class="ti-more"></i>Pendding</a></li>
            <li><a href="{{route('confirm.order')}}"><i class="ti-more"></i>Confirm</a></li>
            <li><a href="{{route('proccessing.order')}}"><i class="ti-more"></i>Proccessing</a></li>
            <li><a href="{{route('picked.order')}}"><i class="ti-more"></i>Picked</a></li>
            <li><a href="{{route('shipped.order')}}"><i class="ti-more"></i>Shipped</a></li>
            <li><a href="{{route('delivered.order')}}"><i class="ti-more"></i>Delivered</a></li>
            <li><a href="{{route('cancel.order')}}"><i class="ti-more"></i>Cancel</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
		  </ul>
        </li>   
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>