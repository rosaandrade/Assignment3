<!-- Public Page -->
<?php
require 'template/header.php';

if ($_SERVER['REQUEST_METHOD'] =='POST'){
    //if the fields of email and password are not empty...
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        require'config/dbconfig.php';
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":email",$_POST['email']);
        $stmt->bindParam(":password",$_POST['password']);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // O usuário foi autenticado com sucesso
            // Armazenar as informações do usuário na sessão
            $_SESSION['email'] = $_POST['email'];

            // Redirecionar para a página de membros
            header("Location: member.php");
            exit;
        } else {
            // As credenciais fornecidas estão incorretas
            $error_message = "Invalid email or password. Please try again.";
        }
    } else {
        // Os campos de e-mail e senha estão vazios
        $error_message = "Both email and password fields are required.";
    }
}

?> 
   
<!-- HTML Code -->
<h1>This is our Home Page</h1>
<h2>Welcome!</h2>

<?php if (!isset($_SESSION['email']) && !isset($_SESSION['password'])): ?>

<!-- html form -->
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <div>
        <h3>Login</h3>
        <label for="email">Email......:</label>
        <input type="email" name="email" placeholder="your@email.com">
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="your password">
    </div>
    <br>
    <div>
        <input type="submit" name="submit" value="login">
        <input type="reset" value="clear">
    </div>
</form>

<p>You can <a href="register.php">register</a> in our website. </p>

<?php endif;?>

<!-- Footer -->
<?php require 'template/footer.php'; ?>