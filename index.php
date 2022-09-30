<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pdo login</title>
</head>
<body>

<!-- register -->
<h2>Sign Up</h2>

<form action="api/register.php" method="post">
    <div>
        <input type="text" name="name" id="" placeholder="Username">    
    </div>
    <div>
    <input type="email" name="email" id="" placeholder="Email">   
    </div>
    <div>
         <input type="password" name="password" id="" placeholder="Password">   
    </div>

    <button type="submit" name="register">Register</button>
</form>
    
<br>
<!-- login -->
<h2>Login</h2>
<form action="api/login.php" method="post">

    <div>
     <input type="email" name="email" id="" placeholder="Email">       
    </div>
    <div>
        <input type="password" name="password" id="" placeholder="Password">
    </div>

    <button type="submit" name="login">
        Login
    </button>
</form>


</body>
</html>