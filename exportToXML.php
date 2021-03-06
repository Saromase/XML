<?php
// Récupération des variables :
$objectif = $_POST['objectif'];
$code = $_POST['code'];
$time = $_POST['time'];
$subojectif = $_POST['subojectif'];
$description = $_POST['description'];
$check = $_POST['check'];
$index = "../form.php";
$name = htmlspecialchars($_POST['name']);

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
$destination = 'sortie_xml/' .$name. '.xml';
// Ouverture du fichier
$handle = fopen($destination, 'x+');
// On vérifie si le dossier est écrivable
if (is_writable($destination)) {

    if (fwrite($handle, $string) === false){
        echo " Probleme d'ecriture1";
    }
    header('Location:'.$destination);
} else {
    echo "Probleme d'écriture";
}


?>

