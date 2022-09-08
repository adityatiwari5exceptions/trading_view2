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
    <form action="{{route('plans.store')}}" method="POST">
    @csrf
        <div class="form-group">
            <label for="">Plan Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Enter Plan Name">
        </div>
        <div class="form-group">
            <label for="">Amount</label>
            <input type="number" name="amount" id="" class="form-control" placeholder="Enter Amount">
        </div>
        <div class="form-group">
            <label for="">currency</label>
            <input type="text" name="currency" id="" class="form-control" placeholder="Enter currency">
        </div>
        <div class="form-group">
            <label for="">interval_count</label>
            <input type="text" name="interval_count" id="" class="form-control" placeholder="Enter interval_count">
        </div>
    <div class="form-group">
        <label for="">Billing Period</label>
        <select name="billing_period" id="" class="form-control">
            <option value="" disabled selected>Choose Billing method</option>
            <option value="week">Weekly</option>
            <option value="Monthly">Monthly</option>
            <option value="year">Yearly</option>
        </select>
    </div><br>
    <button type="submit" class="btn  btn-primary">Choose Plan</button>
    </form>
</div>
</body>
</html>