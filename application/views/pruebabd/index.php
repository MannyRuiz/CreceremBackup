<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $datos_alumno[0]['nombre']." ".$datos_alumno[0]['apellido_p']." ".$datos_alumno[0]['apellido_m']; ?> estudio en: <?php echo $datos_alumno[0]['nombre_escuela']; ?> con dirección en <?php echo $datos_alumno[0]["direccion"]; ?></h1>
    
    
    
</body>
</html>