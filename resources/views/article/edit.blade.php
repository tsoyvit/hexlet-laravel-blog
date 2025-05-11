@extends('layouts.app')
@section('header', 'Редактирование статьи')

@section('content')

    {{ html()->modelForm($article, 'PATCH', route('articles.update', $article))->open() }}

    @include('article.form')

    <div class="mb-3">
    {{ html()->submit('Обновить')->class('btn btn-primary') }}
    </div>

    {{ html()->closeModelForm() }}

@endsection
