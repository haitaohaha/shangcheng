<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>查看邮件</title>
</head>
<body>

	<div style="height:200px; background:pink">
		{{ $res->name}}:你好! 请点击以下链接
		<a href="{{ env('APP_URl') }}/admin/link/{{ $res->remember_token }}">找回密码</a>
	</div>
</body>
</html>