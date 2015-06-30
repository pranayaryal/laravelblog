@extends ('layouts.main')
@section ('content')
    {!!Form::open( array('route'=>'todos.store') ) !!}
    	{!! Form::label('title', 'List Title')!!}
    	{!! Form::text('title')!!}
    	{!! Form::submit('submit', array('class'=>'button'))!!}

    
@stop