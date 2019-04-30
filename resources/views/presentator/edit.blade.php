@extends('layouts.template')

@section('title','Add Presentator')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Uodate Presentator</h4>
						<hr>
						<form action="{{ url('presentator/update/'.$data->id) }}" method="post" enctype="multipart/form-data">
							@csrf @method('patch')
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Name</label>
										<input type="text" class="form-control" name="name" value="{{ $data->name }}">
									</div>
									<div class="form-group">
										<label for="">Email</label>
										<input type="email" class="form-control" name="email" value="{{ $data->email }}">
									</div>
									<div class="form-group">
										<label for="">Phone</label>
										<input type="number" class="form-control" name="phone" value="{{ $data->phone }}">
									</div>
									<div class="form-group">
										<label for="">Position</label>
										<input type="text" class="form-control" name="position" value="{{ $data->position }}">
									</div>
									<div class="form-group">
										<label for="">Address</label>
										<textarea name="address" id="" cols="30" rows="10" class="form-control">{{ $data->address }}</textarea>
									</div>
									<div class="form-group">
										<label for="">About</label>
										<textarea name="about" id="" class="form-control" rows="10">{{ $data->about }}</textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Company</label>
										<input type="text" class="form-control" name="company" value="{{ $data->company }}">
									</div>
									<div class="form-group">
										<label for="">Facebook</label>
										<input type="text" class="form-control" name="facebook" value="{{ $data->facebook }}">
									</div>
									<div class="form-group">
										<label for="">Instagram</label>
										<input type="text" class="form-control" name="instagram" value="{{ $data->instagram }}">
									</div>
									<div class="form-group">
										<label for="">Website</label>
										<input type="text" class="form-control" name="website" value="{{ $data->website }}">
									</div>
									<div class="form-group">
										<label for="">Tweeter</label>
										<input type="text" class="form-control" name="tweeter" value="{{ $data->tweeter }}">
									</div>
									<div class="form-group">
										<label for="">Google+</label>
										<input type="text" class="form-control" name="google" value="{{ $data->google }}">
									</div>
									<div class="form-group">
										<label for="input-file-now">Foto Masukan Foto baru jika dibutuhkan</label>
                            			<input type="file" id="input-file-now" class="dropify" name="photo" />
									</div>
									<button type="submit" class="btn btn-info btn-block">Update <i class="mdi mdi-library-plus"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop