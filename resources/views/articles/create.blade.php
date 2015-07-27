@extends ('layouts.main')


@section('content')

	<h1>Write a New Article</h1>

	<hr>

	{!! Form::model($article = new \App\Article, ['url' => 'articles'])!!}

		@include ('articles.form', ['submitButtonText' => 'Add Article'])

		
	{!! Form::close() !!}

	@include ('errors.list')

@stop

@section('logout')
	{!! link_to_route('auth.logout','Log Out',null, ['class' => 'alert button']) !!}
@stop