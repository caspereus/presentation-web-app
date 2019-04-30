@extends('layouts.template')

@section('title','Add Video')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Add Video</h4>
						<p class="card-subtitle">Add Video to your app</p>
						<hr>
						<form action="{{ url('video/save') }}" method="post">
							@csrf
							<div class="form-group">
								<label>Title</label>
								<input type="text" class="form-control" name="title">
							</div>

							<div class="form-group">
								<label>Description</label>
								<textarea name="description" class="form-control" rows="10"></textarea>
							</div>

							<div class="form-group">
								<label for="">Url Youtube</label>
								<input type="text" class="form-control" name="url_link">
							</div>

							<button class="btn btn-info">Add</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop