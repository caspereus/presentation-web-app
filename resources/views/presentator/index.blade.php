@extends('layouts.template')

@section('title','Data Presentator')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Data Presentator</h4>
						<div class="row">
							<div class="col-md-7">
								<table class="table">
									<tr>
										<td>Name</td>
										<td>:</td>
										<td>{{ $data->name }}</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>:</td>
										<td>{{ $data->email }}</td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>:</td>
										<td>{{ $data->phone }}</td>
									</tr>
									<tr>
										<td>Company</td>
										<td>:</td>
										<td>{{ $data->company }}</td>
									</tr>
									<tr>
										<td>Position</td>
										<td>:</td>
										<td>{{ $data->position }}</td>
									</tr>
									<tr>
										<td>Address</td>
										<td>:</td>
										<td>{{ $data->address }}</td>
									</tr>
									<tr>
										<td>Facebook</td>
										<td>:</td>
										<td>{{ $data->facebook }}</td>
									</tr>
									<tr>
										<td>Instagram</td>
										<td>:</td>
										<td>{{ $data->instagram }}</td>
									</tr>
									<tr>
										<td>Website</td>
										<td>:</td>
										<td>{{ $data->website }}</td>
									</tr>
								</table>
								<a href="{{ url('presentator/edit/'.$data->id) }}" class="btn btn-info">Edit data <i class="fa fa-edit"></i></a>
							</div>
							<div class="col-md-5">
								<div class="card">
						       		 <img class="card-img-top img-responsive" src="{{ asset('images/presentator/'.$data->photo) }}" alt="Card image cap">
						        </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop