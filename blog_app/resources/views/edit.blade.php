<h1>Edit Page</h1>
<form action="/edit" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$blogs['id']}}"><br><br>
    <input type="name" name="name" value="{{$blogs['name']}}"><br><br>
    <input type="name" name="blog" value="{{$blogs['blog']}}"><br><br>
    <button type="submit">Update</button>
</form>