<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    
    <div class="container vh-100 ">
        <div class="row h-100">
            <div class="col-11 col-md-8 col-lg-6 mx-auto my-auto shadow-lg p-3 ">
                <h1 class="text-center">Todo List</h1>
                
                <form action="/todo/add" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="todo" type="text" class="form-control" placeholder="what do you want to do?">
                        <button class="btn btn-primary" type="submit">Save</button>
                      </div>
                </form>

                <ul class="list-group list-group-flush overflow-auto" style="max-height: 350px">

                    @foreach($todos as $todo)
                    
                    <li class="list-group-item d-flex justify-content-between {{($todo->status)? 'list-group-item-success' : ''}}">
                        <a class="btn btn-light" href="/todo/delete/{{ $todo->id }}">
                            <i class="bi-x-lg"></i>
                        </a>

                        @if ($todo->status)
                            <del>{{ $todo->todo }}</del>
                        @else
                            {{ $todo->todo }}
                        @endif

                        <a class="btn btn-light" href="/todo/update/{{ $todo->id }}">
                            <i class="bi-{{ ($todo->status)? 'arrow-counterclockwise' : 'check-lg' }}"></i>
                        </a>
                    </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>