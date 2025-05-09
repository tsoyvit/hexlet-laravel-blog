@extends('layouts.app')
@section('header', 'Articles')
@section('content')

    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>body</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>views_count</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
        <tr>
            <td>{{ $article['id'] }}</td>
            <td>{{ $article['name'] }}</td>
            <td>{{ $article['body'] }}</td>
            <td>{{ $article['created_at'] }}</td>
            <td>{{ $article['updated_at'] }}</td>
            <td>{{ $article['views_count'] }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>



@endsection
