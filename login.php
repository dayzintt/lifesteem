<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(95deg, rgb(76, 200, 238), rgba(255, 145, 0, 0.856));
        }
        .diva{
            background-color: rgba(5, 0, 0, 0.7 );
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 25px;
            color: white;

        }
        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }
        .submit_bt{
            background-color: rgb(3, 92, 209);
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }
        .submit_bt:hover{
            background-color: rgb(84, 154, 245);
        }
    </style>

    
    <title>tela de login</title>
</head>
<body>
    <div class= "diva">
        <h1>Login</h1>
        <form action ="test_login.php" method= "POST">
        <input type="text" name= "email" placeholder="E-mail"> <br><br>
        <input type="password" name = "senha" placeholder="senha"><br><br>
        <input class= "submit_bt" type="submit" name="submit" value="enviar">
        </form>
    </div>
    
</body>
</html>
