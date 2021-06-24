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
       <legend></legend>
       <table class="table table-hover">
                <div class="btn-group">
                    <a class="btn btn-primary" href="{{route('language.index',['en'])}}" role="button">English</a>
                    <a class="btn btn-danger" href="{{route('language.index',['vi'])}}" role="button">Tiếng Việt </a>
                </div>
                <br>
                <a class="btn btn-success" href="{{route('login')}}" role="button">Add new</a>
            
            
           <thead>
               <tr>
                   <th>name</th>
                   <th>address</th>
                   <th>email</th>
                   <th>created_by</th>
                   <th>content</th>
               </tr>
           </thead>
           <tbody>
           @foreach($con as $cons)
               <tr>
                  <td>{{$cons->name}}</td>
                  <td>{{$cons->address}}</td>
                  <td>{{$cons->email}}</td>
                  <td>{{$cons->created_by}}</td>
                  <td>{{$cons->content}}</td>
               </tr>
            @endforeach
           </tbody>
       </table>
       
   </div>
   
    
</body>
</html>