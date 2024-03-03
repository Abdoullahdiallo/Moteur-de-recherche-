<html>
<head>
<meta charset="utf-8"/> 
</head>
<?php
$titre=$_POST['titre'];
$mots=$_POST["mot"];
$path='';
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)

{
        if ($_FILES['monfichier']['size'] <= 1000000)
        {
             // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('txt', 'ppt', 'pdf', 'doc', 'docx');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                     // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'C:/DocumentsIR'.basename($_FILES['monfichier']['name']));
                        echo "L'envoi a bien été effectué !";
                 }
        }
}
if(!(empty($titre)))
	{
		if(!(empty($mots)))
			{
$path='C:/DocumentsIR'.basename($_FILES['monfichier']['name']);
$connexion=mysqli_connect("localhost", "root", "");
if ($connexion){
// Connexion au serveur effectuée
echo "<p>connexion réussie</p>";
$bd = mysqli_select_db($connexion,"testbm");
if ($bd){
// Connexion à la base de données effectuée
echo "<p> Connexion à la base de données effectuée </p>";
$requete = "INSERT INTO lsi(doc_title,doc_path,doc_keywords) VALUES ('".$titre."','".$path."','".$mots."')";
$resultat = mysqli_query($connexion,$requete);
if ($resultat){
// requête exécutée
echo "<p>Requête executée</p>";
} 
else echo "<p>Requête incorrecte</p>";
} 
else echo "<p>Base de données inconnue</p>";
} 
else echo "<p>Erreur de connexion</p>";
mysqli_close($connexion);
}
}
?>
</html>