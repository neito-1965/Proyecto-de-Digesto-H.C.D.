<!doctype html> 
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<title>DIGESTO - H.C.D.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="expires" content="timestamp">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-3.1.1.js"></script>
	<script src="js/bootstrap.js"></script>
</head> 
<?php flush(); ?>
<body> 

<!-- Menú -->
	<!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.hcdcorrientes.gov.ar/digesto/legislacion/index.html">Digesto H.C.D.</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://www.hcdcorrientes.gov.ar/digesto/legislacion/index.html">Inicio</a></li>
            <li><a href="rama9.html">Leyes por Materia</a></li>
            <li><a href="consultas.html">Consultas</a></li>
        </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container page-header">
     


<form action="http://www.hcdcorrientes.gov.ar/digesto/legislacion/buscasimple106dip.php" method="post"> 


<?
$NL =utf8_encode($_POST['NL']);
$Voz =utf8_encode($_POST['Voz']);
$Subvoz =utf8_encode($_POST['Subvoz']);
$Extracto =utf8_encode($_POST['Extracto']);
$Sancion =utf8_encode($_POST['Sancion']);
$Promulgacion =utf8_encode($_POST['Promulgacion']);
$Observaciones =utf8_encode($_POST['Observaciones']);
$PBO =utf8_encode($_POST['PBO']);
$es =utf8_encode($_POST['es']);
$materia =utf8_encode($_POST['materia']);
$nlm =utf8_encode($_POST['nlm']);
$modi =utf8_encode($_POST['modi']);
$regla =utf8_encode($_POST['regla']);
$reglad =utf8_encode($_POST['reglad']);
$audio =utf8_encode($_POST['audio']);
$braille =utf8_encode($_POST['braille']);
$NDL =utf8_encode($_POST['NDL']);


	$host="localhost";
	$usuarioh="neito1965";
	$claveh="neItoMaVr$1965";
	$enlace = mysql_connect($host,$usuarioh,$claveh);

	mysql_set_charset('utf8', $enlace);
	mysql_select_db("legislatura2015", $enlace); 


if ($NL<>"") {
$SQL1="SELECT* FROM leyesydecretosleyesvigentes1  WHERE NL LIKE '$NL'  ORDER BY NL ASC";

}if ($Voz<>"") {
$SQL1="SELECT* FROM leyesydecretosleyesvigentes1 WHERE Voz LIKE '%$Voz%' ORDER BY NL ASC";

}if ($Subvoz<>"") {
$SQL1="SELECT* FROM leyesydecretosleyesvigentes1 WHERE Subvoz LIKE '%$Subvoz%' ORDER BY NL ASC";

}if ($Extracto<>"") {
$SQL1="SELECT* FROM leyesydecretosleyesvigentes1 WHERE Extracto LIKE '%$Extracto%' ORDER BY NL ASC";

}if ($Sancion<>"") {
$SQL1="SELECT* FROM leyesydecretosleyesvigentes1 WHERE Sancion LIKE '%$Sancion%' ORDER BY NL ASC";

}if ($Promulgacion<>"") {
$SQL1="SELECT* FROM leyesydecretosleyesvigentes1 WHERE Promulgacion LIKE '%$Promulgacion%' ORDER BY NL ASC";

}if ($Observaciones<>"") {
$SQL1="SELECT* FROM leyesydecretosleyesvigentes1 WHERE Observaciones LIKE '%Observaciones%' ORDER BY NL ASC";

}if ($PBO<>"") {
$SQL1="SELECT* FROM leyesydecretosleyesvigentes1 WHERE PBO LIKE '%$PBO%' ORDER BY NL ASC";

}if ($es<>"") {
$SQL1="SELECT* FROM leyesydecretosleyesvigentes1 WHERE es LIKE '%$es%' ORDER BY NL ASC";

}if ($materia<>"") {
$SQL1="SELECT* FROM leyesydecretosleyesvigentes1 WHERE materia LIKE '%$materia%' ORDER BY NL ASC";

}if ($nlm<>"") {
$SQL1="SELECT* FROM leyesydecretosleyesvigentes1 WHERE nlm LIKE '%$nlm%' ORDER BY NL ASC";

}if ($modi<>"") {
$SQL1="SELECT* FROM leyesydecretosleyesvigentes1 WHERE modi LIKE '%$modi%' ORDER BY NL ASC";

}if ($regla<>"") {
$SQL1="SELECT* FROM leyesydecretosleyesvigentes1 WHERE regla LIKE '%$regla%' ORDER BY NL ASC";

}
 


$result=mysql_query($SQL1,$enlace);

$numero = mysql_num_rows($result); 

echo '<div class="alert alert-success" role="alert">Se han encontrado '.$numero.' registros</div>';




if ($row=mysql_fetch_array ($result)){ 


while ($field = mysql_fetch_field($result)){ 

echo "<b>$field->name</b>"; 

} 


do {

echo '<div class="panel panel-default"><div class="panel-body">';

$valor2=$row["NL"];
$valor2=implode('-',explode('/',$valor2));
$valor3=implode('-',explode('/',$valor2));

echo "<h4><a href='http://www.hcdcorrientes.gov.ar/Leyes-texto/Ley$valor2.pdf' target='_BLANK'>Ley Nº ".utf8_decode($row['NL'])." (".utf8_decode($row['es']).")</a></h4>"; 

echo '<b>Materia: </b>'.utf8_decode($row["materia"]).'<br>';

echo '<b>Tema y Subtema: </b>'.utf8_decode($row["Voz"]).' - '.utf8_decode($row["Subvoz"]).'<br>'; 






if ($row['ta'] == 's') {
       echo "<a href='http://www.hcdcorrientes.gov.ar/digesto/legislacion/textos-actualizados/Ley$valor2.pdf' target='_BLANK'>Texto actualizado de la Ley</a><br>";
       
  } else {
	   echo '<b>Esta Ley no tiene texto actualizado<br></b>';
	   
	
  }





if ($row['audio'] == 's') {
       echo "
       <audio controls preload>
       <source src='http://www.hcdcorrientes.gov.ar/digesto/legislacion/audio/$valor2.mp3' type='audio/mpeg'>
       Tu navegador no soporta este elemento de audio
       </audio>

       <br>";
       
  } else {
	   echo "<span class='glyphicon glyphicon-volume-off'></span> Ley sin audio<br>";
	   
	
  }



if ($row['braille'] == 's') {
       
       echo "<a href='http://www.hcdcorrientes.gov.ar/digesto/legislacion/braille/$valor2.pdf' target='_BLANK'><span class='glyphicon glyphicon-th'></span> Ley en braille</a><br>";
  } else {
	   
	   echo "<span class='glyphicon glyphicon-th'></span> Ley sin braille<br>";
	
  }



if ($row['modi'] == 'Con modificaciones') {

echo "<b><a href='http://www.hcdcorrientes.gov.ar/digesto/legislacion/$valor3.php' target='_BLANK'>".utf8_decode($row["modi"])."</a></b><br>";
} else {
	echo '<b>'.utf8_decode($row["modi"]).'</b><br>';
	
}


if ($row['regla'] == 'Reglamentada') {
       echo '<b>'.utf8_decode($row["regla"]).'</b> ';
 } else
if ($row['regla'] == 'Complementarias') {
        echo '<b>'.utf8_decode($row["regla"]).'</b> ';
 } else {
        echo '<b>'.utf8_decode($row["regla"]).'</b> ';
	
 }


$valor7=$row["reglad"];
$valor8=implode('-',explode('/',$valor7));

$valor9=$row["reglad1"];
$valor10=implode('-',explode('/',$valor9));

$valor11=$row["reglad2"];
$valor12=implode('-',explode('/',$valor11));

$valor13=$row["reglad3"];
$valor14=implode('-',explode('/',$valor13));

$valor15=$row["reglad4"];
$valor16=implode('-',explode('/',$valor15));

$valor17=$row["reglad5"];
$valor18=implode('-',explode('/',$valor17));

$valor19=$row["reglad6"];
$valor20=implode('-',explode('/',$valor19));

$valor21=$row["reglad7"];
$valor22=implode('-',explode('/',$valor21));

$valor23=$row["reglad8"];
$valor24=implode('-',explode('/',$valor23));



echo "<a href='http://www.hcdcorrientes.gov.ar/digesto/legislacion/decretos-reglamentarios/Decreto$valor8.pdf' target='_BLANK'>".utf8_decode($row["reglad"])."\n
<a href='http://www.hcdcorrientes.gov.ar/digesto/legislacion/decretos-reglamentarios/Decreto$valor10.pdf' target='_BLANK'>".utf8_decode($row["reglad1"])."\n
<a href='http://www.hcdcorrientes.gov.ar/digesto/legislacion/decretos-reglamentarios/Decreto$valor12.pdf' target='_BLANK'>".utf8_decode($row["reglad2"])."\n
<a href='http://www.hcdcorrientes.gov.ar/digesto/legislacion/decretos-reglamentarios/Decreto$valor14.pdf' target='_BLANK'>".utf8_decode($row["reglad3"])."\n
<a href='http://www.hcdcorrientes.gov.ar/digesto/legislacion/decretos-reglamentarios/Decreto$valor16.pdf' target='_BLANK'>".utf8_decode($row["reglad4"])."\n
<a href='http://www.hcdcorrientes.gov.ar/digesto/legislacion/decretos-reglamentarios/Decreto$valor18.pdf' target='_BLANK'>".utf8_decode($row["reglad5"])."\n
<a href='http://www.hcdcorrientes.gov.ar/digesto/legislacion/decretos-reglamentarios/Decreto$valor20.pdf' target='_BLANK'>".utf8_decode($row["reglad6"])."\n
<a href='http://www.hcdcorrientes.gov.ar/digesto/legislacion/decretos-reglamentarios/Decreto$valor22.pdf' target='_BLANK'>".utf8_decode($row["reglad7"])."\n
<a href='http://www.hcdcorrientes.gov.ar/digesto/legislacion/decretos-reglamentarios/Decreto$valor24.pdf' target='_BLANK'>".utf8_decode($row["reglad8"])."\n
</a><br>";

echo utf8_decode($row["Extracto"]).'<br>';

echo '<b>Sanción: </b>'.utf8_decode($row["Sancion"]).'<br>'; 

echo '<b>Promulgación: </b>'.utf8_decode($row["Promulgacion"]).'<br>'; 

echo '<b>Observaciones: </b>'.utf8_decode($row["Observaciones"]).'<br>';

echo '<b>P.B.O.: </b>'.utf8_decode($row["PBO"]).'<br>'; 



echo '</div></div>';

 
} while ($row = mysql_fetch_array($result)); 




} else { 
$Rc=$Rc+1


?>

	<script language="JavaScript">
		window.top.location ="http://www.hcdcorrientes.gov.ar/digesto/legislacion/consultas.html";
		alert("Esta Ley o Decreto Ley que esta consultando no esta mas vigente");
	</script>




<?

}
?>
 
  </form>
</div>

  <footer class="footer">
     
        <p class="text-muted" style="text-align:center">Honorable Cámara de Diputados<br>de la Provincia de Corrientes</p>
      
    </footer>

</body>
</html>