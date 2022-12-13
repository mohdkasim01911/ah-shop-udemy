   @php 
       $categorys = App\Models\admin\Category::orderBy('cat_name_en','ASC')->get();
   @endphp  
  
    <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
            @foreach($categorys as $cat)
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{$cat->cat_name_en}}</a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                    @php 
                      $subcategory = App\Models\admin\SubCategory::where('category_id',$cat->id)->orderBy('Subcat_name_en','ASC')->get();
                    @endphp
                    @foreach($subcategory as $subcat)
                      <div class="col-sm-12 col-md-3">
                        <h2 class="title">{{$subcat->subcat_name_en}}</h2>
                        @php 
                          $subsubcategory = App\Models\admin\SubsubCategory::where('subcategory_id',$subcat->id)->orderBy('subsubcategory_name_en','ASC')->get();
                        @endphp
                        @foreach($subsubcategory as $subsubcat)
                        <ul class="links list-unstyled">
                          <li><a href="#">{{$subsubcat->subsubcategory_name_en}}</a></li>
                        </ul>
                        @endforeach
                      </div>
                      @endforeach
                      <!-- /.col --> 
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              @endforeach
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a> 
                <!-- /.dropdown-menu --> 
              </li>
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a> 
                <!-- ================================== MEGAMENU VERTICAL ================================== --> 
                <!-- /.dropdown-menu --> 
                <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
              <!-- /.menu-item -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a> 
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 