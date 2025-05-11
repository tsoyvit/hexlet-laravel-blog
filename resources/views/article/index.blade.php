@extends('layouts.app')

@section('header', 'Список статей')
@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a class="icon-link" href="{{ route('articles.create') }}">
            Создать статью
            <svg xmlns="http://www.w3.org/2000/svg" class="bi" viewBox="0 0 16 16" aria-hidden="true">
                <path
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
        </a>

        {{ html()->form('GET', route('articles.index'))->class('d-flex ms-3')->open() }}
        {{ html()->input('text', 'name')
            ->class('form-control me-2')
            ->placeholder('Поиск статей')
            ->value(request('name')) }}
        {{ html()->submit('Найти')->class('btn btn-outline-success') }}
        {{ html()->form()->close() }}
    </div>

    <div class="card shadow-sm overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive rounded-1">
                <table class="table table-hover mb-0">
                    <thead class="table-primary">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Название</th>
                        <th>Статус</th>
                        <th>Лайки</th>
                        <th>Дата создания</th>
                        <th class="pe-4">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td class="ps-4">{{ $article->id }}</td>
                            <td>
                                <a href="/articles/{{ $article->id }}" class="text-decoration-none">
                                    {{ Str::limit($article->name, 40) }}
                                </a>
                            </td>
                            <td>
                                @if($article->state == 'published')
                                    <span class="badge bg-success bg-opacity-10 text-success">Опубликовано</span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary">Черновик</span>
                                @endif
                            </td>
                            <td>{{ $article->likes_count }}</td>
                            <td>{{ $article->created_at->format('d.m.Y') }}</td>
                            <td class="pe-4">
                                <div class="d-flex gap-2">
                                    <a href="/articles/{{ $article->id }}/edit" class="btn btn-sm btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg>
                                    </a>
                                    <form action="/articles/{{ $article->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd"
                                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $articles->appends(['name' => request('name')])->links() }}
    </div>

@endsection
