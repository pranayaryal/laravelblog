@extends ('layouts.main')
@section ('content')

    {!!Form::open( array('route'=>'todos.store') ) !!}
    	@include('todos.partials._form')
    {!! link_to_route('auth.logout','Log Out',null, ['class' => 'default button']) !!}
@stop