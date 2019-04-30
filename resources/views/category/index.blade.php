@extends('layouts.template')

@section('title','Category')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Form Category</h4>
						<hr>
						<form action="{{ url('category/store') }}" method="post">
							@csrf
							<div class="form-group">
								<label for="">Category name</label>
								<input type="text" class="form-control" name="category">
							</div>
							<button class="btn btn-info">Save Category <i class="fa fa-save"></i></button>
						</form>

						<hr>

						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover" id="example23">
								<thead>
									<tr>
										<td>No</td>
										<td>Category</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $field)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td>{{ $field->category }}</td>
										<td>
											<a href="{{ url('category/delete/'.$field->id) }}" class="btn btn-danger">Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop