@extends('layouts.new')

@section('title','Profile')
@section('title_content','Profile')

@section('content')
<div class="content-detail">
	<div class="container article">
		<div class="title-heading text-center">
			<h1><span>About Me</span></h1>
		</div>
		<div class="box-entry">
			<article>
				<p>{!!nl2br($data->about) !!}</p>
			</article>
		</div>
	</div>
	
</div>
@stop