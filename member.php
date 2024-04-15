<?php require 'template/header.php';?>

<h1>Welcome to our Website</h1>
<p>Members Page</p>
<p>This page is only for our clients!</p>

<?php
require 'config/dbconfig.php'; // ou o arquivo de configuração do seu banco de dados

$email = $_SESSION['email'];

try {
    // Prepare a consulta SQL para selecionar o first_name e last_name com base no email
    $sql = "SELECT first_name, last_name FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    // Verifica se encontrou um resultado
    if($stmt->rowCount() > 0) {
        // Recupere o first_name e last_name do resultado
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        
        // Use o $first_name e $last_name conforme necessário
        echo "FullName: $first_name $last_name!";
    } else {
        echo "No user found with the email $email $email";
    }
} catch(PDOException $e) {
    echo "Error executing the query: " . $e->getMessage();
}
?>


<!-- Footer -->
<?php require 'template/footer.php'; ?>