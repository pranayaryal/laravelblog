@extends ('layouts.main')
@section ('content')
	{{{"Welcome Back"}}}
	<p>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</p>
    <h2>All todo lists.</h2>
    @foreach ($todo_lists as $list)
		<h4>{!! link_to_route('todos.show', $list->name, [$list->id]) !!}</h4>
		<ul class="no-bullet button-group">
			<li>
				{!! link_to_route('todos.edit', 'edit', [$list->id], ['class'=>'tiny button'])!!}
			</li>
			<li>
				{!! Form::model($list, ['route' => ['todos.destroy', $list->id], 'method' => 'delete']) !!}
					{!! Form::button('destroy', ['type'=>'submit', 'class' => 'tiny alert button'])!!}
				{!! Form::close()!!}
			</li>

		</ul>
	@endforeach
	{!! link_to_route('todos.create','Create New List',null, ['class' => 'success button']) !!}
	{!! link_to_route('auth.logout','Log Out',null, ['class' => 'default button']) !!}
	
    
    
@stop