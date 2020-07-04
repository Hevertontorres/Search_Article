<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.5.0-dist/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <title>Search</title>
    </head>
    <body>
        <span class="group-btn m-2 float-right">     
            <a href="/" class="btn btn-secondary btn-md m-2 m-0 auto">login <i class="fa fa-sign-in"></i></a>
        </span>
        <h1 class="text-center">Search articles in https://uplexis.com.br/category/blog/</h1>
        <form class="form-inline m-5" name="Insert" id="Insert" method="POST" action="/articles/create" >
            @csrf
            <div class="form-group m-2">
                <h4>Type the article you want</h4>
            </div>
            <div class="form-group m-2">
                <input class="form-control m-2" type="text" name="title" id="title" placeholder="title">
                <a href="/articles/create">
                    <button class="btn btn-success m-2" type="submit" value="btnInsert">Capture links</button>
                </a>
            </div>
            <div class="text-center m-2">
                @if (isset($errors) && count($errors) > 0)
                <div class="text-center m-2 alert-danger">
                    @foreach ($errors->all() as $erro)
                    {{$erro}}<br>
                    @endforeach
                </div>
                @endif
            </div>
        </form>
        <form class="form-inline m-5" name="Insert" id="Get" method="GET" action="/articles" >
            <div class="form-group m-2">                
                <a href="/articles">
                    <button class="btn btn-info m-2" type="submit" value="btnInsert">View links</button>
                </a>
            </div>
            @if(session('msg'))
            <div class="alert alert-success">
                {{session('msg')}}
            </div>
            @endif
        </form>
    </body>
</html>