<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME','Laravel')}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<!--mn hna kibda codhom hh-->
<x-app-layout>
   <!--mn hna kibda codi hh-->
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active"  href="{{url('/Home')}}">Home</a>
      </li>
      @if(auth()->check())
     
      <li class="nav-item">
        <a class="nav-link" href="{{url('/AddPage')}}">Ajouter</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/myposts')}}">My Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link">{{auth()->user()->name}}</a>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="{{url('/login')}}">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/register')}}">Register</a>
      </li>
      @endif
    </ul>
  </div>
</nav>
<div class="container pt-2">

<div class="card-columns">
@foreach(auth()->user()->posts as $post)
  <div class="card">
  <img class="card-img-top" src="{{asset('./uploads/'.$post->image)}}" style="height:200px; " alt="Card image">
  <div class="card-body">
    <h4 class="card-title">{{$post->title}}</h4>
    <h4 class="card-title">{{$post->user ? $post->user->name : null}}</h4>
    <p class="card-text">{{Str::limit($post->body,20)}}</p>
    <a href="{{route('post.show',$post->id)}}" class="btn btn-primary">See Post</a>
  </div>
</div>
@endforeach
</div>

</div> 
</x-app-layout>

</body>
</html>