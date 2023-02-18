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
								<th>Coupan Name</th>
								<th>Coupan Discount</th>
								<th>Validety</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							 @php $i = 1; @endphp
						  @foreach($coupan as $item)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$item->coupan_name}}</td>
								<td>{{$item->coupan_discount}}%</td>
								<td>{{Carbon\Carbon::parse($item->coupan_validety)->format('D, d F Y')}}</td>
								<td>
                                  @if($item->coupan_validety >= Carbon\Carbon::now()->format('Y-m-d'))
                                    <span class="badge badge-pill badge-success">Valid</span>
                                  @else
                                     <span class="badge badge-pill badge-danger">Invalid</span>
                                  @endif
								<td><a href="{{route('coupan.edit',$item->id)}}" class="btn btn-primary mb-5"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    <a href="{{route('coupan.delete',$item->id)}}" class="btn btn-danger mb-5 delete"><i class="fa fa-remove" aria-hidden="true"></i></a>
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