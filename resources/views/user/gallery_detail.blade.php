
@extends('layouts.new')

@section('title','Gallery')

@section('content')
	<div class="news">
		<div class="container cj">
			<div class="title-heading text-center">
				<h1><span>Detail Gallery</span></h1>
			</div>
			<div class="list-news">
				<div class="row">
					@foreach($data as $event)
						<div class="col-sm-12 col-md-6 col-lg-6">
							<div class="item-news">
								<div class="box-img">
									<p>
										<div class="thumbnail-img">
											<img src="{{ asset('images/gallery/'.$event['image_name']) }}">
										</div>
									</p>
								</div>
								<br>
								<br>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@stop