@extends('layouts.app')


@section('header', 'Список статей')
@section('content')

        @foreach ($articles as $article)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title"><a href="/articles/{{ $article->id }}">{{ $article->name }}</a></h4>
                    <p class="card-text">{{ Str::limit($article->body, 200) }}</p>
                    <!--<a href="#" class="btn btn-sm btn-outline-primary">Читать далее</a> -->
                </div>
            </div>
        @endforeach

        <div class="mt-4">
            {{ $articles->links() }}
        </div>

@endsection
