<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon"  href="/assets/img/medical-remove.png">
    <title>Apotek | {{ $title }}</title>
</head>
<body >
@extends('dashboard.layouts.login')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        {{ session('loginError') }}
      </div>
    @endif

    <main  class="form-signin">
      <img class="mt-2 mb-2" src="/assets/img/medical-remove.png" alt="" width="200" style="margin-left:80px">
      <h1 class="h4 mb-3 fw-normal text-center ">Please login</h1>
      <form action="/login" method="post">
        @csrf
        <div class="form-floating mt-4">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" autofocus required value="{{ old('email') }}">
          <label for="email">Email</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>

        <button style="background-color:#219ebc; border:none;" class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      </form>
    
    </main>
  </div>
</div>
</div>
</body>
</html>