<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.5.0-dist/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <title>Articles</title>
    </head>
    <body>
        <span class="group-btn m-2 float-right">     
            <a href="/" class="btn btn-secondary btn-md m-2 m-0 auto">login <i class="fa fa-sign-in"></i></a>
        </span>
        <h1 class="text-center">Articles</h1>
        <div class="text-center m-2">
            <a href="articles/create">
                <button class="btn btn-success">New Search</button>
            </a>
        </div>
        <div class="col-8 m-auto">
            @csrf
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User</th>
                        <th scope="col">Title</th>
                        <th scope="col">Link</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($article as $articles)
                    <tr>
                        <th scope='row'>{{$articles->id}}</th>
                        <th>{{$articles->relationUsers->user}}</th>
                        <td>{{$articles->title}}</td>
                        <td>
                            <a href="{{$articles->link}}" target="_blank">{{$articles->link}}</a>
                        </td>
                        <td>
                            <form action="{{route('articles.destroy', $articles->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="articles/{{$articles->id}}">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>