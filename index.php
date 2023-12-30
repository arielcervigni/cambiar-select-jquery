<?php
 
 $paisesJson = file_get_contents("paises.json");
 $paises = json_decode($paisesJson, true);
 
 $provinciasJson = file_get_contents("provincias.json");
 $provincias = json_decode($provinciasJson, true);
 
 ?>

<h1> Hola Mundo Php! </h1>

<form action="accion.php" method="post">
 <p>Su nombre: <input type="text" name="nombre" /></p>
 <p>Su edad: <input type="text" name="edad" /></p>
 <p>Su pais: <select name="pais" id="pais"> 
 <option value="0"> Selecione su país </option>

<?php
     for($i = 0; $i<count($paises); $i++){ ?>
        <option value=<?=$i+1;?>> <?=$paises[$i]["pais"];?> </option>
    <?php } ?>
     
    </select> </p>
    <p>Su provincia: <select name="provincia" id="provincia"> 
 <option value="0"> Selecione su provincia </option>

 <?php
     for($i = 0; $i<count($provincias); $i++){ ?>
        <option value=<?=$i+1;?>> <?=$provincias[$i]["provincia"];?> </option>
    <?php } ?>

 <p><input type="submit" /></p>
</form>

 <!-- JavaScript opcional -->
    <!-- Primero jQuery, después Popper.js y por último el JS de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<script>

// const selectPais = document.getElementById('pais');
// const selectProvincia = document.getElementById('provincia');

// selectPais.addEventListener('change', () => {
//   console.log('changed ' + selectPais.value);

//   var provincias = 
//   console.log(provincias);

//   $("#provincia option[value=0]").html("Nuevo texto");


  $(document).ready(function(){
            $('#pais').change(function(){
                var valorSeleccionado = $(this).val();
                console.log(valorSeleccionado);
                // Realizar una solicitud AJAX al servidor con el valor seleccionado
                $.ajax({
                    url: 'filtrarProvincias.php', // Ruta a tu script PHP
                    method: 'POST',
                    data: { pais: valorSeleccionado },
                    success: function(respuesta){
                        // Actualizar el segundo select con los datos obtenidos
                        $('#provincia').html(respuesta);
                    }
                });
            });
        });
</script>