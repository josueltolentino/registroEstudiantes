<?php 

include '../Helpers/utilities.php';

session_start();  

$estudiantes = $_SESSION['estudiantes'];

if(isset($_GET['id'])){

$estuId = $_GET['id'];

$elementIndex = getIndexElement($estudiantes,'id',$estuId);

unset($estudiantes[$elementIndex]);

$_SESSION['estudiantes'] = $estudiantes;

}

header("Location: ../index.php");
exit();

?>