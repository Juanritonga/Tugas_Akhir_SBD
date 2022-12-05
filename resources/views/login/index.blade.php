<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ITEM STORE</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container"><br>
        <div class="col-md-6 col-md-offset-3">
            <hr>
            <h3 class="text-center">ITEM STORE</h3>
            <hr>
            <div
  style="
    background-image: url('https://cdn.popmama.com/content-images/post/20220914/1-foto-mark-nct-03492bd2cac6eba03502c66908fd8cc6_600x315.png');
    width: 500px;
    margin: 30px;
    height: 300px;
  "
></div>            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('actionlogin') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Username/Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Username/Email" required="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                <hr>
                <!-- <p class="text-center">Belum punya akun? <a href="#">Register</a> sekarang!</p> -->
            </form>
        </div>
    </div>
</body>
</html>