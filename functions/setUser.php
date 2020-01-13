<?php
require("database.php");

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