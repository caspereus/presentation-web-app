@extends('layouts.template')

@section('content')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Video</h4>
						<p class="card-subtitle">There is data video</p>
						<hr>

						<table class="table table-bordered table-striped table-hover" id="example23">
							<thead>
								<tr>
									<td>No</td>
									<td>Video Title</td>
									<td>Video Description</td>
									<td>Likes</td>
									<td>Views</td>
									<td>Uploaded at</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $video)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td>{{ $video['title'] }}</td>
									<td>{{ $video['description'] }}</td>
									<td>{{ $video['likes'] }}</td>
									<td>{{ $video['views'] }}</td>
									<td>{{ $video['created_at'] }}</td>
									<td>
										<a href="{{ url('video/delete/'.$video['id']) }}" class="btn btn-danger btn-sm btnDelete"><i class="fa fa-trash"></i></a>
										<a href="{{ url('video/edit/'.$video['id']) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
										<a href="{{ url('like/'.$video['id']."/video") }}" class="btn btn-warning btn-sm"><i class="fa fa-heart"></i></a>
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
@stop