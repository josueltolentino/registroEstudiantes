
<?php

include '../Helpers/utilities.php';

session_start();                 

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['carrera']) && isset($_POST['check'])){


  $_SESSION['estudiantes'] = isset($_SESSION['estudiantes']) ? $_SESSION['estudiantes']: array();

  $estudiantes = $_SESSION['estudiantes'];
     
  $estudianteId = 1;

  if(!empty($estudiantes)){
    $lastElement = GetLastElement($estudiantes);
    $estudianteId = $lastElement['id'] + 1;
  }

  
  array_push($estudiantes, ['id'=>$estudianteId, 'nombre'=>$_POST['nombre'], 'apellido'=>$_POST['apellido'], 
  'carrera'=>$_POST['carrera'], 'check'=>$_POST['check']]);

  $_SESSION['estudiantes'] = $estudiantes;
  
  header("Location: ../index.php");
  exit();
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de estudiantes ITLA</title>
    <link href="..\assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <script href="..\assets\js\bootstrap.min.js"></script>
</head>

<body class="cuerpo">

<header>
  <div class="navbar navbar-dark bg-info shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="../index.php" class="navbar-brand d-flex align-items-center">
        <strong>Inicio</strong>
      </a>
    </div>
</header>

<h2 class="h2">Instituto Tecnologico de las Americas</h2>

<form action="add.php" method="POST">

<div class="forma card bg-white">
    <div class="card-header ch">
    Registro de estudiantes
    </div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Nombre"  id="nombre">
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" placeholder="Apellido"  id="apellido">

        <label for="carrera">Carrera</label>

        <select class="custom-select" id="carrera" name="carrera">

        <?php foreach($carrera as $id => $text): ?>

        <option value="<?php echo $id ?>"><?php echo $text; ?></option>

        <?php endforeach; ?>

        </select>
        <p class="es">Estatus del estudiante</p>

       <div class="form-check">
       <input type="checkbox" class="form-check-input" name="check" id="check" Value="Activo" checked >
       <label for="estatus">Activo</label>
       </div>
       
       
       
        <button type="submit" class="btn btn-primary " id="sendForm">Enviar</button> 

        
</div>

</form>
    
</body>
</html>