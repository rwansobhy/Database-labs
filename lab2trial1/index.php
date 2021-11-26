<?php
    $dbConnect=mysqli_connect('localhost','root','','registeration');


if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hashedPassowrd=md5($password);
    $dbConnect=mysqli_connect('localhost','root','','registeration');
if(!$dbConnect){
    echo "Error in Connection: " . mysqli_connect_error();
}
else{
       
       $validationpasswordQuery="select * from users where email='$email' and password='$hashedPassowrd';";
       $validateOutput=mysqli_query($dbConnect,$validationpasswordQuery);
    if(mysqli_num_rows($validateOutput)==0){
        echo "Please check email or password";

          }
    else
    {
        $resultsArrayFormat=mysqli_fetch_all($validateOutput,MYSQLI_ASSOC);
        $quriedName=$resultsArrayFormat[0]['name'];
        echo "welcome {$quriedName}";


    }



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
        function validateFormEmpty()
         {
            let x = document.forms["loginForm"]["email"].value;
            let y = document.forms["loginForm"]["password"].value;
            if(x == "" && y=="" )
                {
                    alert("Please at Least enter one of the required fields");
                    return false;
                }
            if (x == "") 
                {
                     alert("email must be filled out");
                     return false;
                }

            if (y=="")
                { 
                    alert("password must be filled out");
                    return false;

                }
            function EmailValidation(email)
                {
                    const re=/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return re.test(email)
                }
            
            if(!EmailValidation(x))
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
                 <div class="imageContainer">
                    <img class="userImg" src="img\avatar.svg" alt="">
                </div> 
                
                <form name="loginForm" action="index.php"  onsubmit="return validateFormEmpty()"  method="POST">
                    <h2>Signin Form</h2>
                    <div class="input-box">
                        <input type="email" id="email" name="email" placeholder="johnsmith@gmail.com" >
                    </div>
                    <div class="input-box">
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="input-box">
                        <input type="submit" id="login" value="sign in " name="submit">
                    </div>
                    <p class="message">Don't have an account ? <a href="./signup.php">Sign up</a></p>
                   
                      <!-- <img  src="img\login.svg" alt=""> -->
                
                </form>
            </div>
        </div>
    </div>
   </section>   
  
</body>
</html>