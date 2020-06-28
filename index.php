
<?php 

include 'Helpers/utilities.php';

session_start();

$_SESSION['estudiantes'] = isset($_SESSION['estudiantes']) ? $_SESSION['estudiantes']: array();

$listadoEstu = $_SESSION['estudiantes'];

if(!empty($listadoEstu)){
  if(isset($_GET['carreraId'])){

    $listadoEstu = buscarProperty($listadoEstu, 'carrera', $_GET['carreraId']);

  }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de estudiantes ITLA</title>
    <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <script href="assets\js\bootstrap.min.js"></script>
</head>

<body class="cuerpo">

<header>
  <div class="collapse bg-dark">
    <div class="container">
      <div class="row">
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-info shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="index.php" class="navbar-brand d-flex align-items-center">
        <strong>Inicio</strong>
      </a>
    </div>
  </div>
</header>


<h2 class="h2">Instituto Tecnologico de las Americas</h2>

<div class="text-center ">
<a href="Students\add.php" class="btn bg">Registar estudiante</a>
</div>

<div class="row fil">

<div class="col-md-9"></div>

    <div class="col-md-3"></div>

    <div class="btn-group">

      <a href="index.php?carreraId=2" class="btn bg-light">Software</a>
      <a href="index.php?carreraId=3" class="btn bg-light">Redes</a>
      <a href="index.php?carreraId=4" class="btn bg-light">Mecatronica</a>
      <a href="index.php?carreraId=5" class="btn bg-light">Seguridad informatica</a>
      <a href="index.php?carreraId=6" class="btn bg-light">Multimedia</a>
      <a href="index.php" class="btn bg-light">Todos</a>

    </div>

  </div>
     
<div class="album py-5 bg-light con">
<div class="container">

  

<div class="row"> 

<?php if(empty($listadoEstu)): ?>

  
  <h2 class="hc ">No hay estudiantes registrados</h2>


<?php else: ?>

  <?php foreach($listadoEstu as $estu): ?>
    
<div class="col-md-4">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $estu['nombre'] ?></h5>
    <h5 class="card-subtitle mb-2 text-muted"><?php echo $estu['apellido']?></h5> 
    <p class="card-text"><?php echo getCarrera($estu['carrera']) ?></p>
    <p class="card-text"><?php echo $estu['check'] ?></p>
    <a href="Students/edit.php?id=<?php echo $estu['id']; ?>" class="card-link">Editar</a>
    <a href="Students/delite.php?id=<?php echo $estu['id']; ?>" class="card-link">Eliminar</a>
  </div>
</div>
</div> 

  <?php endforeach; ?>  

  
<?php endif; ?>  


</div>
</div>
</div>

<footer class="text-muted text-center">
  <div class="container">
    <p class="float-right">
      <a href="#" class="h22">Volver arriba</a>
    </p>
    <p class="p">Registro de estudiantes &copy; Instituto Tecnologico de las Americas ITLA</p>
  </div>
</footer>
    
</body>
</html>