@if($errors->any())
	@foreach($errors->all() as $error)
		<script>
			$(document).ready(function()
			{
			  $.toast({
		        text: '{{ $error }}',
		        position: 'top-right',
		        loaderBg:'#fff',
		        icon: 'info',
		      });
			});
		</script>
	@endforeach
@endif