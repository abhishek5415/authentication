<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Practise</title>
  </head>
  <body>
    @auth
    <div class="container">
      <div class="card mt-5">
        @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <div class="card-header">
            <h3>Add Data<a class="btn btn-info float-end" href="{{url('home/' . $current_page)}}">Back</a></h3>  
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('home/'. $current_page.'/add')}}"> 
                @csrf
                <div class="mb-3">
                  <label  class="form-label">Post Title</label>
                  <input type="text" class="form-control" name="title" value="{{old('title')}}">
                  @error('title')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="mb-3">
                    <label  class="form-label">Post Description</label>
                  <textarea class="form-control" name="body"></textarea>
                  @error('body')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
      </div>
    </div>
    @endauth
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>