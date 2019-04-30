
@extends('layouts.new')

@section('title','Gallery')

@section('content')
	<div class="news">
		<div class="container cj">
			<div class="title-heading text-center">
				<h1><span>Gallery</span></h1>
			</div>
			<div class="list-news">
				<div class="row">
					@foreach($data as $gallery)
						<div class="col-sm-12 col-md-6 col-lg-6">
							<div class="item-news">
								<div class="box-img">
									<a href="{{ url('user/gallery/'.$gallery['id']) }}">
										<div class="thumbnail-img">
											<img src="{{ asset('images/gallery/'.$gallery['image_thumbnail']) }}">
										</div>
									</a>
								</div>
								<div class="box-post">
									<h3 class="post-title">
										<a href="{{ url('user/gallery/'.$gallery['id']) }}">{{ $gallery['gallery_title'] }}</a>
									</h3>
									{{-- <p>{{ $event }}</p> --}}
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@stop