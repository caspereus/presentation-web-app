@extends('layouts.template')

@section('title','Data Article')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Data Article</h4>
						<hr>
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover" id="example23">
								<thead>
									<tr>
										<td>No</td>
										<td>Title</td>
										<td>Description</td>
										<td>Likes</td>
										<td>Views</td>
										<td>Creted At</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $field)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td width="200">{{ $field['title'] }}</td>
										<td width="400">{{ $field['description'] }}</td>
										<td>{{ $field['likes'] }}</td>
										<td>{{ $field['views'] }}</td>
										<td>{{ $field['created_at'] }}</td>
										<td>
											<a href="{{ url('article/edit/'.$field['id']) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
											<a href="{{ url('article/delete/'.$field['id']) }}" class="btn btn-danger btnDelete btn-sm"><i class="fa fa-trash"></i></a>
											<a href="{{ url('like/'.$field['id']."/article") }}" class="btn btn-warning btn-sm"><i class="fa fa-heart"></i></a>
										</td>
									</tr>
									<script>
										$(document).ready(function(){
										    $('.btnDelete').on('click', function(e){
										        e.preventDefault();
										        var href = $(this).attr('href');
										        swal({
										            title: "U Sure ??",
										            text: "Permanently", 
										            icon: "warning",
										            buttons: true,
										            dangerMode: true,
										        })
										        .then((willDelete) => {
										          if (willDelete) {
										            window.location.href = href;
										          }
										        });
										    });
										});
										</script>
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