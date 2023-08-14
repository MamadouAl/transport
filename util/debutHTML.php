<?php


/* 1 */
function debut(string $title = "Title content"): string
{
    $chaine = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
    <!-- encodage utf-8 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="style.css" />


    <style type="text/css"></style>';

    $chaine .= '<title>'.$title.'</title> </head><body>';
    return $chaine;
}


function fin(): string
{
  $fin = '
<body>
  <!-- contenu -->
</body>
</html>';
return $fin;
}


/* première version */
function intoBalise2(string $nomElement, string $contenuElement): string
{
  if($contenuElement ==""){
      return "<$nomElement/>";
  }else {
      return "<$nomElement> $contenuElement  <$nomElement>";
  }
}
//$balise = intoBalise("br", "coucou");


function intoBalise(string $nomElement, string $contenuElement, array $params=null): string
{
  $morceauEle ="<$nomElement ";
  if(!is_null($params)){
    foreach ($params as $Attribut => $valeur) {
      $morceauEle .= $Attribut.'="'.$valeur .'" ';
    }
  }
  if($contenuElement ==""){
      return  $morceauEle .'/>';
  }else{
    // code...
    $morceauEle .= "/> $contenuElement </$nomElement>";
    return $morceauEle;
  }
}


$fin = getFinHTML();










?>
