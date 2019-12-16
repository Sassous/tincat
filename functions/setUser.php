<?php
// Etape 1 : config database
$DB_HOST = "localhost";
$DB_NAME = "tincat";
$DB_USER = "root";
$DB_PASSWORD = "";
// Etape 2 : Connexion to database
try {
    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
var_dump($_POST);
// Avant d'insérer en base de données faire les vérifications suivantes
    // Vérifier si le pseudo ou le mot de passe est vide
    
    if( empty($_POST["pseudo"]) || (empty($_POST["password"])) ){
        echo"pseudo ou mdp vide" ;}
        
        // Ajouter un input confirm password et vérifier si les deux sont égaux
        
    if($_POST['password'] != $_POST['confirmpassword']){
        echo "Votre mot de passe est faux";}
     
     
// Ajouter un champ email

// <form action="setUser.php" method="post">
// <input type="email" placeholder="email" name="email">
// </form>




// Etape 3 : prepare request
$req = $db->prepare("INSERT INTO users (pseudo, password) VALUES(:pseudo, :password)");
$req->bindParam(":pseudo", $_POST["pseudo"]);
$req->bindParam(":password", $_POST["password"]);
$req->execute();

?>