<?php
    $dbConnect=mysqli_connect('localhost','root','','registeration');


if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hashedPassword=md5($password);
    $dbConnect=mysqli_connect('localhost','root','','registeration');
    $sql="select * from users where ( email='$email');";
    $res=mysqli_query($dbConnect,$sql);
    if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
        if($email==isset($row['email']))
        {
            echo "email already exists ";
        }
		
		}
        elseif(!$dbConnect)
        {
             echo "Error in Connection: " . mysqli_connect_error();
        }

    else{
       
             $insertData="insert into users(email,name,password) values('$email','$name','$hashedPassword');";
             $insertOutput=mysqli_query($dbConnect,$insertData);
            echo "welcome {$name}";
 
   


        }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registeration form</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateFormEmpty() {
            let x= document.forms["registerForm"]["name"].value;
            let y = document.forms["registerForm"]["email"].value;
            let password= document.forms["registerForm"]["password"].value;
            let confirmPassword = document.forms["registerForm"]["confirmpassword"].value;
            if(x == "" && y=="" && password =="" && confirmPassword== "")
                {
                     alert("Please at Least enter one of the required fields");
                    return false;
                } 

            if (x== "") 
                {
                    alert("name field must be filled out");
                    return false;
                }         
            if (y== "") 
                {
                     alert("email must be filled out");
                     return false;
                 }
            if (password=="")
                { 
                    alert("password must be filled out");
                    return false;

                 }
             if (confirmPassword=="")
                { 
                     alert("confirm password field must be filled out");
                    return false;

                }
                if (password != confirmPassword)
                 {
                alert("Passwords do not match.");
                return false;
                 }
                 function EmailValidation(email)
                 {
                     const re=/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                     return re.test(email)
                 }
                 if(!EmailValidation(y))
                 {
                     alert("Please insert correct e-mail format");
                     return false;
                 }

}
    </script>
</head>
<body>
   <section>
     <div class="colour"></div> 
     <div class="colour"></div> 
     <div class="colour"></div> 
     <div class="box">
         <div class="square" style="--i:0;"></div>
         <div class="square" style="--i:1;"></div>
         <div class="square" style="--i:2;"></div>
         <div class="square" style="--i:3;"></div>
         <div class="square" style="--i:4;"></div>
        <div class="container">
            <div class="form">
                
                <form name="registerForm" action="signup.php" onsubmit="return validateFormEmpty()" method="POST">
                    <h2>Signup Form</h2>
                    <div class="imageContainer">
                            <img class="userImg" src="img\avatar.svg" alt="">
                     </div> 
                    <div class="input-box">
                        <input type="text" id="userName" name="name" placeholder="UserName" >
                    </div>
                    <div class="input-box">
                        <input type="email" id="email" name="email" placeholder="johnsmith@gmail.com" >
                    </div>
                    <div class="input-box">
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="input-box">
                        <input type="password" id="confirmPassword" name="confirmpassword" placeholder="Confirm Password">
                    </div>
                    <div class="input-box">
                        <input type="submit" id="register" value="Sign up" name="submit">
                    </div>
                    <p class="message">have an account already ? <a href="./index.php">Sign in</a></p>
                </form>
            </div>
        </div>
    </div>
   </section>   
  
</body>
</html>