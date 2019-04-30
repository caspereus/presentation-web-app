
@extends('layouts.new')

@section('title','Article')

@section('content')
	<div class="news">
		<div class="container cj">
			<div class="title-heading text-center">
				<h1><span>News & Information</span></h1>
			</div>
			<div class="list-news">
				<div class="row">
					@foreach($data as $article)
						<div class="col-sm-12 col-md-6 col-lg-6">
							<div class="item-news">
								<div class="box-img">
									<a href="{{ url('user/article/'.$article['id']) }}">
										<div class="thumbnail-img">
											<img src="{{ asset('images/'.$article['cover_image']) }}">
										</div>
									</a>
								</div>
								<div class="box-post">
									<h3 class="post-title">
										<a href="{{ url('user/article/'.$article['id']) }}">{{ $article['title'] }}</a>
									</h3>
									<div class="label-tag">{{ $article['category'] }}</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			{{-- <div class="row">
				<div class="col-md-12 text-center">
					<ul class="pagination">
						<li class="prev"><a href=""><i class="ti-arrow-left"></i></a></li>
						<li class="active"><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">4</a></li>
						<li><a href="">5</a></li>
						<li class="next"><a href=""><i class="ti-arrow-right"></i></a></li>
					</ul>
				</div>
			</div> --}}
		</div>
	</div>
@stop