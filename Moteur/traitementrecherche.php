<html>
<head>
<meta charset="utf-8"/> 
</head>
<?php
$mots=$_POST['mot'];
if(!(empty($mots)))
{
    $connexion=mysqli_connect("localhost", "root", "");
if ($connexion){
// Connexion au serveur effectuée
//echo "<p>connexion réussie</p>";
$bd = mysqli_select_db($connexion,"testbm");
if ($bd){
// Connexion à la base de données effectuée
//echo "<p> Connexion à la base de données effectuée </p>";
}}
$requete ="SELECT doc_title,doc_path from lsi WHERE doc_keywords LIKE '%$mots%'";
$resultat = mysqli_query($connexion,$requete);
if(mysqli_num_rows($resultat)>0)
{
    echo"<center style='padding-top: 20%'><table border=1 width=60%  >";
    echo"<tr><th>num</th><th>titre</th><th>adresse</th></tr>";
    $index=0;
    while($ligne =mysqli_fetch_row($resultat))
    {
        $index=$index+1;
        $title=$ligne[0];
        $path=$ligne[1];
        echo"<tr><td>$index</td><td>$title</td><td>$path</td></tr>";
    }
    echo"</table>";
    echo"<b>Recherche Terminée</center";
}
else
echo" <center style='padding-top: 20%'><b>Aucun ligne selectionnée</center>";
}
else
echo" <center style='padding-top: 20%'><b>Aucun mot a été saiser</center>";
?>
</html>