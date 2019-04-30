@extends('layouts.template')

@section('title','Add Video')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Edit Video</h4>
						<p class="card-subtitle">Edit Video to your app</p>
						<hr>
						<form action="{{ url('video/update/'.$data->id) }}" method="post">
							@csrf @method('patch')
							<div class="form-group">
								<label>Title</label>
								<input type="text" class="form-control" name="title" value="{{ $data->title }}">
							</div>

							<div class="form-group">
								<label>Description</label>
								<textarea name="description" class="form-control" rows="10">{{ $data->description }}</textarea>
							</div>

							<div class="form-group">
								<label for="">Url Youtube</label>
								<input type="text" class="form-control" name="url_link" value="{{ $data->url_link }}">
							</div>

							<button class="btn btn-info">Update</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop