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
        <div class="card-header">
            <h3>Welcome to Homepage <a class="btn btn-info float-end" href="{{url('/home/logout')}}">Logout</a></h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">    
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($posts as $post)
                      <?php $total_records++ ?>
                    @endforeach
                </thead>
                <tbody>
                  <?php $records_per_page = 3 ?>
                  <?php $total_page = ceil($total_records/$records_per_page) ?>

                    @switch((int)$current_page)

                      @case((int)$current_page)
                      @for ($i = ((int)$current_page-1)*(int)$records_per_page; $i < (int)$current_page*(int)$records_per_page; $i++)
                      @if ($i >= (int)$total_records)
                          @continue
                      @endif
                      @if ($i < 0)
                          @break
                      @endif
                      <tr>
                        <td>{{$posts[$i]['id']}}</td>
                        <td>{{$posts[$i]['title']}}</td>
                        <td>{{$posts[$i]['body']}}</td>
                        <td>{{auth()->user()->name}}</td>
                        <td><a class="btn btn-sm btn-warning mx-2" href="{{ url('home/'.$posts[$i]['id'].'/edit')}}">Edit</a>
                            <a class="btn btn-sm btn-danger mx-2" href="{{ url('home/'.$posts[$i]['id'].'/delete')}}" onclick="return confirm('Are you sure you want to delete?');">Delete</a></td>
                      </tr>
                      @endfor                           
                      @break

                    @endswitch
         
                </tbody>
            </table>
            <a class="btn btn-info" href="{{url('home/'.$current_page.'/add')}}">Add Data</a>
        </div>
      </div>
    </div>
    
    <div class="page text-center mt-3">
      @if ((int)$current_page > 1)
        <a class="btn btn-primary" id="prev" href="/home/{{(int)$current_page-1}}">Previous</a>
      @else
        <button class="btn btn-primary" id="prev" disabled>Previous</button>
      @endif
      
      <a class="btn btn-info">{{$current_page}}</a>

      @if ((int)$current_page < (int)$total_page)
        <a class="btn btn-primary" id="next" href="/home/{{(int)$current_page+1}}">Next</a>
      @else
        <button class="btn btn-primary" id="next" disabled>Next</button>
      @endif
    </div>
    
    @endauth
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>