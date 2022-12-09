@extends('admin.admin_master')
@section('admin')
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Slider</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example5" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Slider Title</th>
								<th>Slider Desc</th>
								<th>Image</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							 @php $i = 1; @endphp
						  @foreach($slider as $item)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$item->title}}</td>
								<td>{{$item->description}}</td>
								<td><img src="{{asset($item->slider_image)}}" style="width:50px;height:50px"></td>
								<td>{{$item->status == 1 ? 'Active' :'Deactive'}}</td>
								<td><a href="{{route('slider.edit',$item->id)}}" class="btn btn-primary mb-5"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    <a href="{{route('slider.delete',$item->id)}}" class="btn btn-danger mb-5 delete"><i class="fa fa-remove" aria-hidden="true"></i></a>
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