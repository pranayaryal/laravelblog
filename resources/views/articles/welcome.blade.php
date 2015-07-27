@extends ('layouts.main')
@section ('content')
  <h2>Welcome</h2>
  <h2>This is an App for Blog Posts</h2>
  

@stop


@section('login')
	{!! link_to_route('auth.login','Sign In',null, ['class' => 'sucess button']) !!}
@stop

@section('register')
	{!! link_to_route('auth.register','Sign Up',null, ['class' => 'alert button']) !!}
@stop
