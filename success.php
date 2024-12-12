<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            display: flex ;
            min-height: 100vh;
            background-image: url("img/login.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            display: flex ;
            justify-content: center;
            align-items: center;

        }
        .air-main{
            background: transparent;
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            color: black;
            border-radius: 10px;
            padding: 30px 40px;
        }
        .air-main .btn{
                        width: 100%;
                        height: 45px;
                        background: rgb(253, 213, 159);
                        border: none;
                        outline: none;
                        border-radius: 40px;
                        box-shadow: 0 0 10px  rgba(0,0,0, .1);
                        cursor: pointer;
                        font-size: 16px;
                        color: #333;
                        font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="air-main">
    <h1>Successful Payment</h1><br><br>
    <button class="btn" onclick="window.location.href='view.php'" >View Ticket</button>
    </div>
</body>
</html>