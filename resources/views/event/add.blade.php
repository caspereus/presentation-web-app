@extends('layouts.template')

@section('title','Add Event')

@section('content')
	<div class="container">
		<div class="row">
			<a href=""></a>
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Form Event</h4>
						<hr>
						<form action="{{ url('event/store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label for="">Title</label>
								<input type="text" class="form-control" name="title">
							</div>
							<div class="form-group">
								<label for="">Description</label>
								<input type="text" class="form-control" name="description">
							</div>
							<div class="form-group">
								<label for="">Cover Image</label>
								<input type="file" id="input-file-now" class="dropify" name="cover_image" />
							</div>
							<div class="form-group">
								<label for="">PPT File</label>
								<input type="file" id="input-file-now" class="dropify" name="ppt_file" />
							</div>
							<button class="btn btn-info">Add Event</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop