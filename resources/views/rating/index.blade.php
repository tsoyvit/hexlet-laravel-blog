@extends('layouts.app')

@section('content')

    <div class="card shadow-sm overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive rounded-1">
                <table class="table table-hover mb-0">
                    <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Статус</th>
                        <th>Лайки</th>
                        <th>Текст</th>
                        <th>Создано</th>
                        <th>Обновлено</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ Str::limit($article->name, 30) }}</td>
                            <td>
                                @if($article->state == 'published')
                                    <span class="badge bg-success">Опубликовано</span>
                                @else
                                    <span class="badge bg-secondary">Черновик</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $article->likes_count }}</td>
                            <td>{{ Str::limit($article->body, 50) }}</td>
                            <td>{{ $article->created_at->format('d.m.Y H:i') }}</td>
                            <td>{{ $article->updated_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
