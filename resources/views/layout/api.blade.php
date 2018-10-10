<form method="post" action="{{route('api.store')}}">
	@csrf
	Title:<input type="text" name="title">
	Src:<input type="text" name="src">
	Api key:<input type="text" name="key">
	<input type="submit" name="">
</form>