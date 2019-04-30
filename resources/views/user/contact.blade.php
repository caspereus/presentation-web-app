@extends('layouts.new')

@section('title','Contact')

@section('content')
	<div class="content-detail">
		<div class="container article">
			<div class="title-heading text-center">
				<h1><span>Contact Me</span></h1>
			</div>
			<div class="box-entry">
				<article>
					<h5 style="color:#4675f9">Phone / WhatsApp</h5>
					<p>{{ $data->phone }}</p>
					<h5 style="color:#4675f9">Email</h5>
					<p>{{ $data->email }}</p>
					<h5 style="color:#4675f9">Address</h5>
					<p>{{ $data->address }}</p>
				</article>
			</div>
		</div>
		
	</div>
@endsection