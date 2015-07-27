@extends ('layouts.main')
@section ('content')

    {!!Form::model($list, array('route'=>['todos.update', $list->id], 'method' => 'PUT') ) !!}
    	@include ('todos.partials._form')
    	@include('todos.partials._logout')
    {!! link_to_route('auth.logout','Log Out',null, ['class' => 'default button']) !!}

    
@stop