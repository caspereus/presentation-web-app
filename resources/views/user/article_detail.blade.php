@extends('layouts.new')

@section('title',$data['title'])

@section('content')
	<div class="content-detail">
		<div class="container article">
			<div class="title-heading text-center">
				<h1><span>{{ $data['title'] }}</span></h1>
			</div>
			<div class="box-img">
				<img src="{{ asset('images/'.$data['cover_image']) }}">
			</div>
			<div class="box-entry">
				<article>
                    <p>{!! nl2br($data['full_content']) !!}</p>
                    {{-- <blockquote>"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum".</blockquote> --}}
                </article>
			</div>
		</div>
		<div class="container article">
			<div class="box-btn text-center">
				<a href="{{ url('user/article') }}" class="btn btn-primary">
					Browse More News
				</a>

			</div>
		</div>
	</div>
@stop