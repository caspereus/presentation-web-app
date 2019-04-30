@extends('layouts.template')

@section('title','Data Visitors')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Data Visitors</h4>
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover" id="example23">
								<thead>
									<tr>
										<td>No</td>
										<td>Name</td>
										<td>Email</td>
										<td>Phone</td>
										<td>Created at</td>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $field)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td>{{ $field['name'] }}</td>
										<td>{{ $field['email'] }}</td>
										<td>{{ $field['phone'] }}</td>
										<td>{{ $field['created_at'] }}</td>
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