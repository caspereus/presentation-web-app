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
						<form action="{{ url('event/updates/'.$data->id) }}" method="post" enctype="multipart/form-data">
							@csrf @method('patch')
							<div class="form-group">
								<label for="">Title</label>
								<input type="text" class="form-control" name="title" value="{{ $data->title }}">
							</div>
							<div class="form-group">
								<label for="">Description</label>
								<input type="text" class="form-control" name="description" value="{{ $data->description }}">
							</div>
							<div class="form-group">
								<label for="">Cover Image</label>
								<input type="file" id="input-file-now" class="dropify" name="cover_image" data-default-file="{{ asset('images/'.$data->cover_image) }}" />
							</div>
							<div class="form-group">
								<label for="">PPT File</label>
								<input type="file" id="input-file-now" class="dropify" name="ppt_file" data-default-file="{{ asset('files/'.$file->file_name) }}" />
							</div>
							<button class="btn btn-info">Update Event</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop