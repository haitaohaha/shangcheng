<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>请输入新密码</title>
</head>
<body>
	<h1>请输入新密码</h1>
	<hr/>
	<form method="post" action="{{ url('/admin/update') }}">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $id }}">
		密码:<input type="text" name="password"><br/>
		确认密码:<input type="text" name="password1"><br/>
		<button>确认更新</button>
	</form>
</body>
</html>