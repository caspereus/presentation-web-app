@php $message = session('message'); @endphp
@if(session('message'))
	<script>
		swal("Berhasil","{{ $message }}","success");
	</script>
@endif