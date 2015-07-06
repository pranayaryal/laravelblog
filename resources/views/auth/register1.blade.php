<!---@extends ('layouts.main') 

@section ('content')
    <h2>New Registration</h2>
    {!! Form::label('name', 'Name')!!}
    {!! Form::text('name')!!}
    {!! Form::label('email', 'Email')!!}
    {!! Form::text('email')!!}
    {!! Form::label('password', 'Password')!!}
    {!! Form::text('password')!!}
    {!! Form::label('confirm_password', 'Confirm Password')!!}
    {!! Form::text('confirm_password')!!}
    {!! $errors->first('name', '<small class="error">:message</small>' ) !!}
    {!! Form::submit('Register', array('class'=>'button'))!!}

@stop 

-->