<?php

$arquivo = $_GET['arquivo'];
echo $arquivo;
unlink("arquivos/{$arquivo}");
header("location: lista_arquivos.php");

?>