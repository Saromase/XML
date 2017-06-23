<?php
// Récupération des variables :
$objectif = $_POST['objectif'];
$code = $_POST['code'];
$time = $_POST['time'];
$subojectif = $_POST['subojectif'];
$description = $_POST['description'];
$check = $_POST['check'];
$index = "../form.php";
if (isset($check)){
    $check = "true";
} else {
    $check = "false";
}

// Mise en forme XML
$string =
"<?xml version='1.0' encoding='UTF-8'?>
<root>
    <programme formation=''>
        <module language='' group=''>
            <Objectif></Objectif>
            <PreRequis></PreRequis>
            <Materiel></Materiel>
            <Sequence evaluation=''>
                <Objectif></Objectif>
                <Code></Code>
                <Activite done='$check'>
                    <Objectif>$objectif</Objectif>
                    <Code>$code </Code>
                    <Temps>$time</Temps>
                    <SousObjectif>$subojectif</SousObjectif>
                    <Description>$description</Description>
                </Activite>
            </Sequence>
        </module>
    </programme>
</root>
";

echo '<pre>', htmlentities($string), '</pre>';
$name = 'sortie_xml/' .$_POST['name']. '.xml';
var_dump($name);
// Fichier de destination
$destination = $name;
// Ouverture du fichier
$handle = fopen($destination, 'x+');
// On vérifie si le dossier est écrivable
if (is_writable($destination)) {

    if (fwrite($handle, $string) === false){
        echo " Probleme d'ecriture1";
    }
    header('Location:'.$name);
} else {
    echo "Probleme d'écriture";
}


?>

