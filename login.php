<?php include "connect.php";?>
<!DOCTYPE html>
<html lang="en">
<?php include "layouts/head.php";?>

<body>


<?php include "layouts/header.php" ;?>



<div class="container fluid">
    <main class="tm-main">
<?php if($_SERVER['REQUEST_METHOD']=='POST'){

$email=$_POST['email'];
$password=$_POST['psw'];

$sql = 'SELECT * FROM user WHERE email = :email';
$stmt = $con->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();

$row = $stmt->fetch();
$hashed_password = $row['password'];
echo $hashed_password;

if (password_verify($password, $hashed_password)) {

  $_SESSION['username'] = $username;
  header('Location: index.php');
} else {
  echo 'Invalid username or password.';
}
}
?>



                      <form action='' class='mb-5 tm-comment-form' method='post'>
                                <h2 class='tm-color-primary tm-post-title mb-4'>Login</h2>
                                

                                <div class='mb-4'>

                                <label for="email"><b>Email</b></label>
                                <input type="text"  class='form-control' placeholder="Enter Email" name="email" id="email" required>
                                </div>  
                                <div class='mb-4'>
                                <label for="psw"><b>Password</b></label>
                                <input type="password" class='form-control' placeholder="Enter Password" name="psw" id="psw" required>                                </div>
                                <div class='text-right'>
                                    <button class='tm-btn tm-btn-primary tm-btn-small'>Login</button>                        
                                </div>                                
                            </form> 
                            </main>     
                            </div>
</body>

<script src="js/jquery.min.js"></script>
<script src="js/templatemo-script.js"></script>
</html>