@extends('layouts.app')
@section('content')
<h1>Blogs Page</h1><br>
@foreach($blogs as $blog)
<div style="text-align:center">
<h3>Blog Name: {{$blog['name']}}</h3>
<h6>{{$blog['blog']}}</h6>
<a href="delete/{{$blog['id']}}">Delete</a>
<a href="edit/{{$blog['id']}}">Edit</a>
</div>
@endforeach

@endsection