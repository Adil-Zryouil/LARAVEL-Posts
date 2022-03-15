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
    </ul>
  </div>
</nav>
<div class="container pt-5">
    <!--Bdayate l FORM-->
<form action="{{route('add.post')}}" method="post" class="was-validated" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="uname">Title:</label>
    <input type="text" class="form-control" placeholder="Enter The title" name="title" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="uname">Image:</label>
    <input type="file" class="form-control  pb-5" name="image" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="pwd">Body:</label>
    <textarea name="body" class="form-control" placeholder="Enter the description" cols="30" rows="7" required></textarea>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="remember" required> I agree on anani la ghlate fi les données saisie chrboni l9ahwa.
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Check this checkbox to continue.</div>
    </label>
  </div>
  <button type="submit" class="btn btn-outline-success">Ajouter</button>
</form>
</div>
</body>
</html>