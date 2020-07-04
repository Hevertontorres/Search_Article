<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.5.0-dist/css/bootstrap.min.css">
        <title>Login</title>
    </head>
    <body>
        <div class="sidenav">
            <div class="login-main-text">
                <h2>Development by</h2>
                <h2>Heverton Torres</h2>
                <p>login and password = admin</p>
                <?php
                if ($errors->any()) {
                    echo"<div class='alert alert-danger'>
                        <ul>
                            foreach ($errors->all() as $error){
                            <li>{{ $error }}</li>
                            }
                        </ul>
                    </div>";
                }
                ?>
                @if(session('msg'))
                <div class="alert alert-danger">
                    {{session('msg')}}
                </div>
                @endif
            </div>
        </div>
        <div class="main">
            <div class="col-md-6 col-sm-12">
                <div class="login-form">
                    <form action="/login" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="user">User Name</label>
                            <input type="text" name="user" class="form-control" placeholder="User Name" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-dark">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>