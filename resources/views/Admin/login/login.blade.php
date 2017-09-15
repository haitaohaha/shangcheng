<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>鲁易购</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('/admin/admin/bootstrap/css/bootstrap.min.css') }}"
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/admin/admin/dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('/admin/admin/plugins/iCheck/square/blue.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]--> 
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <b>鲁易购后台</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">请登录你的账号</p>
    @if(session('info'))
          <p class="text-danger">{{ session('info') }}</p>
    @endif

    <form action="{{ url('/admin/login') }}" method="post">
    {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="text" name="name" class="form-control" placeholder="用户名">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="密码">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="code" width="15px;" class="form-control" placeholder="验证码" >&nbsp;&nbsp;
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span><br/>
      <img src="{{asset('/code')}}" title="点击切换" onclick="this.src=this.src+'?a='+Math.random()">
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember_me"> 记住我
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    
    <a href="{{ url('/admin/forgot') }}">忘记密码 ?</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('/admin/admin/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('/admin/admin/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('/admin/admin/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });

  // 点击生成新的验证码
   function re_captcha() {
      $url = "{{ URL('kit/captcha') }}";
      $url = $url + "/" + Math.random();
      document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
  }
</script>
</body>
</html>
