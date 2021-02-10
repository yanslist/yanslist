@extends('layouts.app')

@section('content')
    <table>
        <caption>Heading</caption>
        <thead>
        <tr>
            <th>Title</th>
            <th>I Have</th>
            <th>I Need</th>
            <th>Contact</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{$post->ihave}}</td>
                <td>{{$post->ineed}}</td>
                <td>{{$post->contact}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
