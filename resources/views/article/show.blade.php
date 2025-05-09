@extends('layouts.app')
@section('header', 'Show')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">body</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
            <th scope="col">views_count</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{ $article->id }}</th>
            <td>{{ $article->name }}</td>
            <td>{{ $article->body }}</td>
            <td>{{ $article->created_at }}</td>
            <td>{{ $article->updated_at }}</td>
            <td>{{ $article->views_count }}</td>
        </tr>
        </tbody>
    </table>

@endsection
