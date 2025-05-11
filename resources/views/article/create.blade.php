@extends('layouts.app')
@section('header', 'Создание статьи')
@section('content')

    {{ html()->modelForm($article, 'POST', route('articles.store'))->open() }}

    @include('article.form')

    <div class="mb-3">
        {{ html()->submit('Создать')->class('btn btn-primary') }}
    </div>

    {{ html()->closeModelForm() }}

@endsection
