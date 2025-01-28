<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            text-align: center;
            margin: 80px;
            padding: 20px;
            border: 1px solid palevioletred;
        }

        .top{
            font-size: 20px;
        }

        .bold{
            font-weight: bold
        }
        
    </style>
</head>
<body>
    <p class="top"> Hello, <span class="bold">{{ $name }}</span>!</p>
    
    Thank you for registering. <br>
    To start, visit our website <a href="{{ $appURL}}">here</a>.<br>
    Thank you!
</body>
</html>