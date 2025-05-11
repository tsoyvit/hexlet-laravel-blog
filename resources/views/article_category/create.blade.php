@extends('layouts.app')

@section('header', 'Создание категории')

@section('content')

    {{ html()->modelForm($articleCategory, 'POST', route('article_categories.store'))->open() }}

    <div class="mb-3">
        {{ html()->label('Имя', 'name')->class('form-label') }}
        {{ html()->input('text', 'name')->class('form-control') }}
    </div>

    <div class="mb-3">
        {{ html()->label('Описание', 'description')->class('form-label') }}
        {{ html()->input('text', 'description')->class('form-control') }}
    </div>

    <div class="mb-3">
        {{ html()->label('Состояние', 'state')->class('form-label') }}
        {{ html()->select('state', ['draft' => 'draft', 'published' => 'published'])
            ->value(old('state', $articleCategory->state ?? 'draft'))
            ->class('form-control') }}
    </div>

    <div class="mb-3">
        {{ html()->submit('Создать')->class('btn btn-primary') }}
    </div>

    {{ html()->closeModelForm() }}

@endsection
