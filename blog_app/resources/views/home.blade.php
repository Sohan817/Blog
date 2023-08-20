@extends('layouts.app')
@section('content')
<style>
textarea {
  width: 50%;
  height: 100px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  opacity: 0.5;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 12px;
  resize: none;
}
</style>
<div style="font-size:clamp(1rem, 1rem + 6vw, 10rem)">
     BLOG
</div>
<h1>{{ Auth::user()->name }}</h1>
<form action="/blog" method="POST">
@csrf
<div style="text-align: center">
<label for="name">Blog Name</label>
<input type="text" name="name" placeholder="Enter Blog Name">
</div>
<br><br>
<div style="text-align: center">
<textarea name="blog" id="" cols="50" rows="10"></textarea>
</div>
<br><br>
<div style="text-align: center">
   <button style="background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-decoration: none;
        border-radius: 12px;
        font-size: 16px;" type="submit">Create Blog</button>
</div>
</form>
@endsection