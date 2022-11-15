<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            background: cornflowerblue;
            max-width: 1500px;
            max-height: 1100px;
        }
        .innercontainer {
            margin-right: 50px;
            padding: 0px 5px 0px 5px;
            border: 2px solid;
            background: floralwhite;
            width: 600px;
            height: 450px;
            margin-top: 120px;
            margin-left: 25px
        }
    .contant {
            margin-top: 50px;
            text-align: center;
            font-size: 18px;
            line-height: 30px;
            font-family: sans-serif;
        }
        h1 {
            font-size: 50px;
            color: darkgoldenrod;
            text-align: center;
        }
        .headig_comman {
            text-align: center;
            color: darkgoldenrod;
            font-size: 40px;
            font-weight: 600;
            font-family: serif;
        }
        .btn {
            background-color: black;
            color: white;
            font-size: 20px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 50px;
            display: block;
            width: 100%;
            padding: 10px 0px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="innercontainer">
            <div class="cred-header">
                <h1>19</h1>
                <h3 class="headig_comman">Basic</h3>
            </div>
            <div class="contant">
                <h5>5GB Disk Space</h5>
                <h5>10 Domain Names</h5>
                <h5>5 E-Mail Address</h5>
                <h5>Fully Support</h5>
            </div>
            <div class="button">
                <a href="{{route('plans.checkout', $basic->plan_id)}}" class="btn">Choose Plan</a>
            </div>
        </div>
        <div class="innercontainer">
            <div class="cred-header">
                <h1>39</h1>
                <h3 class="headig_comman">PROFESSLONAL</h3>
            </div>
            <div class="contant">
                <h5>10GB Disk Space</h5>
                <h5>20 Domain Names</h5>
                <h5>10 E-Mail Address</h5>
                <h5>Fully Support</h5>
            </div>
            <div class="button">
                <a href="{{route('plans.checkout', $Silver->plan_id)}}" class="btn">Choose Plan</a>
            </div>
        </div>
        <div class="innercontainer">
            <div class="cred-header">
                <h1>99</h1>
                <h3 class="headig_comman">ENTERPRISE</h3>
            </div>
            <div class="contant">
                <h5>50GB Disk Space</h5>
                <h5>50 Domain Names</h5>
                <h5>50 E-Mail Address</h5>
                <h5>Fully Support</h5>
            </div>
            <div class="button" style="margin-top: 20px;">
                <a href="{{route('plans.checkout', $gold->plan_id)}}" class="btn">Choose Plan</a>
            </div>
        </div>
    </div>
</body>

</html>