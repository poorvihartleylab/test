<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{ route('save-mobile') }}" method="post">
		{{ csrf_field() }}
		<input type="text" name="mobile_no">
		<input type="submit" name="save" value="Save">
	</form>
</body>
</html>