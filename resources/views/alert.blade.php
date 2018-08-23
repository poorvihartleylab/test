<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="/add-alert" method="post">
		{{ csrf_field() }}
		<input type="text" name="age">
		<input type="submit" name="save" value="Save">
	</form>
</body>
</html>