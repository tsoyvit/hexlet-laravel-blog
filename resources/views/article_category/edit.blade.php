
@extends('layouts.app')

@section('header', 'Редактирование категории')
@section('content')

    {{ html()->modelForm($articleCategory, 'PATCH', route('article_categories.update', $articleCategory))->open() }}

    @include('article_category.form')

    {{ html()->closeModelForm() }}
@endsection
