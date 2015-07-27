@extends ('layouts.main')
@section ('content')
  <h2>Welcome to the ToDoList Application</h2>
  
  {!! link_to_route('auth.login','Sign In',null, ['class' => 'success button']) !!}
  {!! link_to_route('auth.register','Sign Up',null, ['class' => 'default button']) !!}
@stop