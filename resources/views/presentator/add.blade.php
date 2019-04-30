@extends('layouts.template')

@section('title','Add Presentator')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Add Presentator</h4>
						<hr>
						<form action="{{ url('presentator/store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Name</label>
										<input type="text" class="form-control" name="name">
									</div>
									<div class="form-group">
										<label for="">Email</label>
										<input type="email" class="form-control" name="email">
									</div>
									<div class="form-group">
										<label for="">Phone</label>
										<input type="number" class="form-control" name="phone">
									</div>
									<div class="form-group">
										<label for="">Position</label>
										<input type="text" class="form-control" name="position">
									</div>
									<div class="form-group">
										<label for="">Address</label>
										<textarea name="address" id="" cols="30" rows="10" class="form-control"></textarea>
									</div>
									<div class="form-group">
										<label for="">About</label>
										<textarea name="about" id="" class="form-control" rows="10"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Company</label>
										<input type="text" class="form-control" name="company">
									</div>
									<div class="form-group">
										<label for="">Facebook</label>
										<input type="text" class="form-control" name="facebook">
									</div>
									<div class="form-group">
										<label for="">Instagram</label>
										<input type="text" class="form-control" name="instagram">
									</div>
									<div class="form-group">
										<label for="">Website</label>
										<input type="text" class="form-control" name="website">
									</div>
									<div class="form-group">
										<label for="">Tweeter</label>
										<input type="text" class="form-control" name="tweeter">
									</div>
									<div class="form-group">
										<label for="">Google+</label>
										<input type="text" class="form-control" name="google">
									</div>
									<div class="form-group">
										<label for="input-file-now">Foto</label>
                            			<input type="file" id="input-file-now" class="dropify" name="photo" />
									</div>
									<button type="submit" class="btn btn-info btn-block">Add <i class="mdi mdi-library-plus"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop