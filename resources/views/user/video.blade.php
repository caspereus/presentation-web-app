
@extends('layouts.new')

@section('title','Video')

@section('content')
<style>
    
    #title{
        margin-top:10px !important;
    }
    
    #sub_title{
        margin-top:-20px !important;
    }
</style>
	<div class="news">
		<div class="container cj">
			<div class="title-heading text-center">
				<h1><span>Video</span></h1>
			</div>
			<div class="list-news">
				<div class="row">
					@foreach($data as $gallery)
						<div class="col-sm-12 col-md-6 col-lg-6">
							<div class="item-news">
								<div class="box-img">
									<a href="{{ url('user/gallery/'.$gallery['id']) }}">
										<div class="thumbnail-img">
											<iframe width="560" height="315" src="{{ "https://www.youtube.com/embed/".$gallery->url_link }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
										</div>
									</a>
								</div>
								<h5 id="title">{{ $gallery['title'] }}</h5>
								<p id="sub_title">{{ $gallery['created_at']->diffForHumans() }}</p>
								<br><br>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@stop