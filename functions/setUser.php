<?php
// Etape 1 : config database
$DB_HOST = "localhost";
$DB_NAME = "tincat";
$DB_USER = "root";
$DB_PASSWORD = "root";
// Etape 2 : Connexion to database
try {
    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
$message = "";
if( empty($_POST["pseudo"]) && empty($_POST["password"]) ){
    $message = "Vous devez remplir les deux champs";
    header("Location: ../register.php?message=$message");
} else if( empty($_POST["pseudo"]) && !empty($_POST["password"])  ){
    $message = "Vous devez remplir un pseudo";
    header("Location: ../register.php?message=$message");
} else if( !empty($_POST["pseudo"]) && empty($_POST["password"]) ){
    $message = "Vous devez remplir un password";
    header("Location: ../register.php?message=$message");
} 
if( !empty($_POST["password"]) && !empty($_POST["confirmPassword"]) && !empty($_POST["pseudo"])){
    if($_POST["password"] === $_POST["confirmPassword"] ){
        $req = $db->prepare("INSERT INTO users (pseudo, password) VALUES(:pseudo, :password)");
        $req->bindParam(":pseudo", $_POST["pseudo"]);
        $req->bindParam(":password", $_POST["password"]);
        $req->execute();
        $message = "Success create account";
        header("Location: ../login.php?message=$message");
    }else{
        $message = "Password and confirmPassword not egal";
        header("Location: ../register.php?message=$message");
    }
}
     
     var_dump($message)

// Ajouter un champ email

// <form action="setUser.php" method="post">
// <input type="email" placeholder="email" name="email">
// </form>
//



// Etape 3 : prepare request


?>