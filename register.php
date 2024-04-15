<!-- public page -->
<?php require 'template/header.php';?>

<?php
$error_message="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty('password')){
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            $error_message = "Invalid email format.";
        }else{
            require 'config/dbconfig.php';
            $check_email_sql = "SELECT * FROM users where email = :email ";
            $check_email_stmt = $pdo->prepare($check_email_sql);
            $check_email_stmt -> bindParam(':email',$_POST['email']);
            $check_email_stmt -> execute();

            if($check_email_stmt -> rowCount()>0){
                $error_message = "Email already exists. Please use a different email";
            }else{
                $insert_user_sql = "INSERT INTO users (first_name,last_name,email, password) VALUES (:first_name,:last_name,:email,:password)";
                $insert_user_stmt = $pdo->prepare(($insert_user_sql));
                $insert_user_stmt -> bindParam(':first_name',$_POST['first_name']);
                $insert_user_stmt -> bindParam(':last_name',$_POST['last_name']);
                
                $insert_user_stmt -> bindParam(':email',$_POST['email']);
                // $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                // $insert_user_stmt -> bindParam(':password',$hashed_password);
                $insert_user_stmt -> bindParam(':password',$_POST['password']);
                if ($insert_user_stmt->execute()){
                    $_SESSION['email'] = $_POST['email'];
                    header("Location: member.php");
                    exit;
                }else{
                    $error_message = "Registration failed.Please try again.";
                }
            }
        }
    }else{
        $error_message="All fields are required.";
    }
}

?>


<h2>Register</h2>
<?php if(!empty($error_message)):?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label for="first_name">First Name: </label>
    <input type="text" id="first_name" name="first_name" required><br><br>

    <label for="last_name">Last Name: </label>
    <input type="text" id="last_name" name="last_name" required><br><br>

    <label for="email">Email........: </label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password..:</label>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Register</button><br><br>

</form>


<!-- Footer -->
<?php require 'template/footer.php'; ?>