@extends('layouts.app')

@section('header', 'Список категорий статей')
@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a class="btn btn-outline-primary" href="{{ route('article_categories.create') }}">
            Создать категорию
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-plus-circle ms-1" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </a>
    </div>




    <div class="row g-4">
        @foreach($articleCategories as $category)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100 border-0">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title mb-3">
                            <a href="{{ route('article_categories.show', $category) }}"
                               class="text-decoration-none text-dark">
                                {{ $category->name }}
                            </a>
                        </h5>

                        <div class="card-text text-muted mb-3 flex-grow-1">
                            @if($category->description)
                                {{ Str::limit($category->description, 120) }}
                            @else
                                <span class="text-muted">Описание отсутствует</span>
                            @endif
                        </div>

                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <span class="badge bg-light text-dark border border-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                 class="bi bi-file-text me-1" viewBox="0 0 16 16">
                                <path
                                    d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                                <path
                                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                            </svg>{{ $category->articles->count() ?? 0 }}</span>

                            <a href="{{ route('article_categories.show', $category) }}" title="Подробнее">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6c757d"
                                     class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $articleCategories->links() }}
    </div>

@endsection
