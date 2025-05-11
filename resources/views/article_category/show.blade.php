@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title h4 mb-3">{{ $category->name }}</h1>
                        <p class="card-text mb-4">{{ $category->description }}</p>

                        @if(!$category->articles->isEmpty())
                            <h2 class="h5 mb-3">Статьи в категории:</h2>
                            <div class="list-group">
                                @foreach($category->articles as $article)
                                    <a href="{{ route('articles.show', $article->id) }}"
                                       class="list-group-item list-group-item-action">
                                        {{ $article->name }}
                                        <span class="float-end small">
                                        {{ $article->created_at->format('d.m.Y') }}
                                    </span>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">
                                В этой категории пока нет статей.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
