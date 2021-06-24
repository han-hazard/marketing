<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
</head>
<body>
    
    <div class="container">
        <form action="" method="POST" role="form">
            @csrf
            <legend>Form add</legend>
        
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Input field">
                @error('name')
                    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Input field">
                @error('address')
                    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Input field">
                @error('email')
                    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <input type="text" class="form-control" name="content" placeholder="Input field">
                @error('content')
                    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Created_by</label>
                <input type="text" class="form-control" name="created_by" placeholder="Input field">
                @error('created_by')
                    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
        
            
        
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
    
</body>
</html>