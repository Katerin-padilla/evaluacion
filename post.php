<?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $direccion = $_POST['direccion'];
    $fechanaci = $_POST['fechanaci'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $ciudadnaci = $_POST['ciudadnaci'];
    $pais = $_POST['pais'];
    $correo = $_POST['correo'];
    $carrera = $_POST['carrera'];

      define("DB_HOST", "localhost");
      define("DB_NAME", "datospersonales");
      define("DB_CHARSET", "utf8mb4");
      define("DB_USER", "root");
      define("DB_PASSWORD", "1234567katy");

      $pdo = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET, 
        DB_USER, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
   
      if ($pdo) {

        $sql = "INSERT INTO usuario (nombre,paterno,materno,direccion,fechanaci,telefono,celular,ciudadnaci,pais,correo,carrera) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$nombre, $paterno, $materno,$direccion,$fechanaci,$telefono,$celular,$ciudadnaci,$pais,$correo,$carrera]);
        echo "Inserción exitosa!";
      }
      
  }
      $inc = include("config.php");
    if ($inc) {
      $consulta = "SELECT * FROM usuario";
      $resultado = mysqli_query($conex,$consulta);
      if ($resultado) {
        while ($row = $resultado->fetch_array()) {
          $id = $row['id'];
          $nombre = $row['nombre'];
          $paterno = $row['paterno'];
          $materno = $row['materno'];
          $direccion = $row['direccion'];
          $fechanaci = $row['fechanaci'];
          $telefono = $row['telefono'];
          $celular = $row['celular'];
          $ciudadnaci = $row['ciudadnaci'];
          $pais = $row['pais'];
          $correo = $row['correo'];
          $carrera = $row['carrera'];
          ?>
            <div>
             <?php echo $nombre,' ', $paterno,' ', $materno; ?>
              <div>
                <p>
                    <b>ID: </b><?php echo $id ?><br>
                    <b>Direccion: </b><?php echo $direccion ?><br>
                    <b>Telefono: </b><?php echo $telefono ?><br>
                    <b>Celular: </b><?php echo $celular ?><br>
                    <b>Fecha de Nacimiento: </b><?php echo $fechanaci ?><br>
                    <b>Ciudad de Nacimiento: </b><?php echo $ciudadnaci ?><br>
                    <b>Pais: </b><?php echo $pais ?><br>
                    <b>Correo: </b><?php echo $correo ?><br>
                    <b>Carrera: </b><?php echo $carrera?><br>
                </p>
              </div>
            </div> 
          <?php
          }
      }
    }
    
?>