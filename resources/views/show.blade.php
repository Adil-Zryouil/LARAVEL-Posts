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
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="{{url('/Home')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/AddPage')}}">Ajouter</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{url('/myposts')}}">My Posts</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container pt-5">

  <div class="row">
      <div class="col-8">
      <div class="card">
      <img class="card-img-top" src="{{asset('./uploads/'.$post->image)}}" height="400"  alt="Card image">
      <div class="card-body">
      <h4 class="card-title">{{$post->title}}</h4>
      <p class="card-text">{{$post->body}}</p>
      
     </div>
    </div>
    </div>
@if(auth()->user()->id == $post->user_id) 
<div class="col-4">

  <a href="{{route('update.page',$post->id)}}" class="btn btn-warning">Update</a><br>
  <form action="{{route('delete.post',$post->id)}}" method="post">
    @csrf 
    @method('DELETE')
  <input type="submit" value="Delete" class="btn btn-danger mt-3">
  </form> 
</div>
@endif
</div>
</div>
</body>
</html>