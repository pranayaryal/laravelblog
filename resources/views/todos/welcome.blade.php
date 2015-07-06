@extends ('layouts.main')
@section ('content')
  <h2>Welcome to the ToDoList Application</h2>
  <h3>Sign in or Sign Up to view this Application</h3>
  {!! link_to_route('auth.login','Sign In',null, ['class' => 'success button']) !!}
  {!! link_to_route('auth.register','Sign Up',null, ['class' => 'default button']) !!}
@stop