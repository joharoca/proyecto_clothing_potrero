<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Clothes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-light">
       <div class="container-fluid cabecera"> 
         <button class="btn boton_nav" type="submit"><a class="navbar-brand" href="lista-de-ropa.html">Home</a></button>
         <button class="btn boton_nav boton_lista" type="submit"><a class="nav-link" href="listarconcard.php">Lista completa</a></button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <form action="listarconcard.php" class="d-flex" role="search">
             <input class="form-control me-2" type="search" name="search" placeholder="Búsqueda" aria-label="Search">
             <button class="btn btn-outline-success style-1" type="submit">Buscar</button>
           </form>
         </div>
       </div>
     </nav>
</header>
<div class="btn_filters_box">
  <button class="btn btn_filters" type="submit"><a href="adidas.php">Addidas</a></button>
  <button class="btn btn_filters" type="submit"><a href="nike.php">Nike</a></button>
  <button class="btn btn_filters" type="submit"><a href="supreme.php">Supreme</a></button>
  <button class="btn btn_filters" type="submit"><a href="menor5000.php">Precio menor a 5000</a></button>
</div>

  <br>
  <h2 class="titulos">Lista de ropa</h2>
  <p>La siguiente lista muestra los datos de la ropa actualmente en stock.</p>

  <section>
    <div class="container">
      <div class="row">

        <?php
        // 1) Conexion y selección de base de datos
        $conexion = mysqli_connect("127.0.0.1", "root", "");
        mysqli_select_db($conexion, "clothes"); // esto lo podemos poner acá o mas abajo, no hay problema

        // 2) Preparar la orden SQL

        $consulta='SELECT * FROM ropa WHERE marca= "addidas"';

        // 3) Ejecutar la orden y obtenemos los registros
        $datos= mysqli_query($conexion, $consulta);

        //  recorro todos los registros y genero una CARD PARA CADA UNA
        while ($reg = mysqli_fetch_array($datos)) {?>
          <div class="card cardstyle col-sm-12 col-md-6 col-lg-3">
            <img class="card-img-top" src="data:image/jpg;base64,
            <?php echo base64_encode($reg['imagen'])?>" alt="" width="200px" height="200px")>

            <h3 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['marca']) ?></h3>
            <span>Talle: <?php echo strtoupper($reg['talle']); ?></span>
            <span>$ <?php echo $reg['precio']; ?></span>

          </div>

        <?php } ?>
        
      </div>
    </div>
  </section>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
