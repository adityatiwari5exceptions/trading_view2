<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User Login</h1>
    
    <form action="/user" method="post">
        @csrf
        <input type="text" name="user" id="" placeholder="Enter username">
        <br>
        <input type="text" name="password" id="" placeholder="Enter password">
         <button type="submit">Login</button>
    </form>
</body>
</html>