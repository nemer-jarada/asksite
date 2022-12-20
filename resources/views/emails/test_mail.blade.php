<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>

<body style="background: #eee; font-family: Arial, Helvetica, sans-serif">
    <div style="width: 600px; margin: 100px auto 0; background: #fff; bordered:2px solid #999; padding: 30px;">
        <h3>Dear Admin,</h3>
        <p>There is new data come from your website as bellow</p><br>
        <p>Name: <b style="color: red">{{ $name }}</b></p>
        <p>Email: <b style="color: red">{{ $email }}</b></p>
        <p>Subject : {{ $subject }}</p>
        <p>Message : {{ $textMsg }}</p>
        <br><br>
        <p>Best Regards</p>
    </div>
</body>

</html>
