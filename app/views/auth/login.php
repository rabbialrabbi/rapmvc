<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div style="text-align: center">
    <h1 >Login</h1>
    <form action=<?php echo SITE_URL.'/login/verify'?> method="post">
        <p>User Name: <input type="email" name="email"></p>
        <p>Password: <input type="password" name="password"></p>
        <p>Password: <input type="submit"></p>
    </form>

</div>


</body>
</html>