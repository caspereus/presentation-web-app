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
						<form action="{{ url('article/store') }}" method="post" enctype="multipart/form-data">
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
								<label for="">Category</label>
								<select name="category_id" class="form-control">
									<option value="">Choose Category</option>
									@foreach($category as $data)
									<option value="{{ $data->id }}">{{ $data->category }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="">Content</label>
								<textarea name="full_content" id="" cols="30" rows="10" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for="">Cover Image</label>
								<input type="file" id="input-file-now" class="dropify" name="cover_image" />
							</div>
							<button class="btn btn-info">Add Event</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop