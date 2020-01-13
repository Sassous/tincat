 <?php
require("database.php");
if( empty($_POST["pseudo"]) && empty($_POST["password"]) ){
    $message = "Vous devez remplir les deux champs";
    header("Location: ../login.php?message=$message");
} else if( empty($_POST["pseudo"]) && !empty($_POST["password"])  ){
    $message = "Vous devez remplir un pseudo";
    header("Location: ../login.php?message=$message");
} else if( !empty($_POST["pseudo"]) && empty($_POST["password"]) ){
    $message = "Vous devez remplir un password";
    header("Location: ../login.php?message=$message");
}
if( !empty($_POST["pseudo"]) && !empty($_POST["password"]) ){
    $req = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo AND password = :password");
    $req->bindParam(":pseudo", $_POST["pseudo"]);
    $req->bindParam(":password", $_POST["password"]);
    $req->execute();
    $result = $req->fetch(PDO::FETCH_ASSOC);
    var_dump($result);
}