{!! Form::label('name', 'Name')!!}
{!! Form::text('name')!!}
{!! $errors->first('name', '<small class="error">:message</small>' ) !!}
{!! Form::submit('update', array('class'=>'button'))!!}