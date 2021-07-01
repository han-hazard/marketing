<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="htpps://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <form action="" method="POST" role="form">
            @if(Session::has('success'))
               <div class="alert alert-danger">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   {{Session::get('success')}}
               </div>
            @endif
            @csrf
            <legend>Form login</legend>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Password:</label>
                <input type="text" class="form-control" name="password" id="password" placeholder="Input field">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            
            <a class="btn btn-success" href="{{route('user_add')}}" role="">Registration</a>
            
            <div class="btn-group">
                <a class="btn btn-warning" href="{{route('forget')}}" role="button">Forget account and password </a>
            </div>
            
        </form>
    </div>
    </div>
</body>
</html>