<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mất khẩu</title>
    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
</head>
<body>
<div class="container">
        <form action="" method="POST" role="form">
            @csrf
            <legend>Form change password</legend>
           
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" value="{{$re->email}}" name="email" placeholder="Input field">
                @error('email')
                    <small id="emailHelp"  class="form-text text-danger">{{$message}}</small>
                @enderror
            </div> 
            <div class="form-group">
                <label for="">password</label>
                <input type="password" class="form-control" name="password" placeholder="Input field">
                @error('password')
                    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">same_password</label>
                <input type="password" class="form-control" name="same_password" placeholder="Input field">
                @error('same_password')
                    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Reset</button>
        </form>
    </div>
</body>
</html>