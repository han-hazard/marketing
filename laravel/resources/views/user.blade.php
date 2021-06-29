<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
</head>
<body>
    
   
   
   
   <div class="container">
       <legend></legend>
       <table class="table table-hover">
             @if(Session::has('error'))
             <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 {{Session::get('error')}}
             </div>
            @endif

            @if(Session::has('success'))
             <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 {{Session::get('success')}}
             </div>
             @endif
             
            <br>
            <a class="btn btn-success" href="{{route('user_add')}}" role="button">ADD</a>
            
           <thead>
               <tr>
                   <th>id</th>
                   <th>name</th>
                   <th>email</th>
                   <th>created_at</th>
                   <th>action</th>
               </tr>
           </thead>
           <tbody>
           @foreach($datas as $data)
               <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->created_at}}</td>
                  <td>
                    <a href="{{route('edit_user',$data->id)}}" class="btn text-primary" title="Edit">Sửa</a>
                    <a href="{{route('delete_user',$data->id)}}" title="Delete" class="btn text-danger">Xóa</a>
                  </td>
               </tr>
            @endforeach
           </tbody>
       </table>
       
   </div>
   
    
</body>
</html>