@extends('layouts.template')
@section('title')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Likers</h4>
						<table class="table table-striped table-bordered table-hover" id="example23">
							<thead>
								<tr>
									<td>No</td>
									<td>Name</td>
									<td>Like at</td>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $field)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td>{{ $field['name_user'] }}</td>
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
@endsection