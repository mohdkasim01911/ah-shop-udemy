@extends('admin.admin_master')
@section('admin')
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All Category</h3>
				  <a href="{{route('category.add')}}" class="btn btn-primary" style="float:right;">Add Category</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example5" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Category En</th>
								<th>Category Hin</th>
								<th>Category Icon</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							 @php $i = 1; @endphp
						  @foreach($categorys as $category)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$category->cat_name_en}}</td>
								<td>{{$category->cat_name_hin}}</td>
								<td><i class="{{$category->cat_icon}}" aria-hidden="true"></i></td>
								<td><a href="{{route('category.edit',$category->id)}}" class="btn btn-primary mb-5"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    <a href="{{route('category.delete',$category->id)}}" class="btn btn-danger mb-5 delete"><i class="fa fa-remove" aria-hidden="true"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
						
					</table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->      
			</div>  
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content --> 
	</div>


@endsection