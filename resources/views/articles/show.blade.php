@extends ('layouts.main')


@section('content')

	<h1>{{ $article->title }}</h1>


	<article>
		{{ $article->body }}
	</article>

	<ul class="no-bullet button-group">
		<li>
			{!! link_to_route('articles.edit', 'edit', [$article->id], ['class'=>'tiny button'])!!}
		</li>
		<li>
			{!! Form::model($article, ['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
				{!! Form::button('destroy', ['type'=>'submit', 'class' => 'tiny alert button'])!!}
			{!! Form::close()!!}
		</li>

	</ul>

	<hr>

	@unless ($article->tags->isEmpty())
		<h5>Tags:</h5>
		<ul>
			@foreach($article->tags as $tag)

				<li>{{ $tag->name }}</li>
			@endforeach
		</ul>
	@endunless
@stop

@section('logout')
	{!! link_to_route('auth.logout','Log Out',null, ['class' => 'alert button']) !!}
@stop