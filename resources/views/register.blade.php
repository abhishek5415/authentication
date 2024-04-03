<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Practise</title>
  </head>
  <body>
    <div class="container">
        <div class="card mt-5">
          <div class="card-header">
              <h3>Signup to Continue <a class="btn btn-info float-end" href="{{url('/login')}}">Login</a></h3>
          </div>
          <div class="card-body">
            <form method="POST" action="{{url('/register')}}">
              @csrf
                <div class="mb-3">
                  <label  class="form-label">Full Name</label>
                  <input type="text" class="form-control" name="name">
                  @error('name')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="mb-3">
                  <label  class="form-label">Email Address</label>
                  <input type="email" class="form-control" name="email">
                  @error('email')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control" name="password">
                  @error('password')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>