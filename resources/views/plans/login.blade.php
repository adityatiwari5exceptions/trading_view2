<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   
<div class="container-md">
    <form action="{{route('plans.login')}}" method="POST">
    @csrf
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" id="" class="form-control" placeholder="Enter Plan Name">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="text" name="password" id="" class="form-control" placeholder="Enter Amount">
        </div>
       
    <br>
    <button type="submit" class="btn  btn-primary">Login</button>
    </form>
</div>
</body>
</html>