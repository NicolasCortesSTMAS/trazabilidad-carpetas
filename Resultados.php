<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ingreso de Datos</title>
    <!-- <link rel="stylesheet" type="text/css" href="estilo.css">  -->
</head>
<body>
    <form method="post">
        <section class="Form-registro">
            <p id="fechaHora"></p>
            <h4>Formulario Resultado</h4>
            <label>
                <input type="radio" name="documento" value="DUS"> DUS
            </label>
            <label>
                <input type="radio" name="documento" value="DIN"> DIN
            </label>
            <br>
            <script>
                var fechaHoraActual = new Date();
                var dia = fechaHoraActual.getDate();
                var mes = fechaHoraActual.getMonth() + 1;
                var año = fechaHoraActual.getFullYear();
                var horas = fechaHoraActual.getHours();
                var minutos = fechaHoraActual.getMinutes();
                var fechaHoraFormateada = dia + '/' + mes + '/' + año + ' ' + horas + ':' + minutos;
                document.getElementById("fechaHora").textContent = fechaHoraFormateada;
            </script>
            <br>
            <input class="control-chico" type="text" name="numerod" placeholder="Ingrese hasta 10 números" oninput="limitarNumeros(this)">
            <script>
                function limitarNumeros(input) {
                    input.value = input.value.replace(/[^0-9]/g, '');
                    if (input.value.length > 10) {
                        input.value = input.value.slice(0, 10);
                    }
                }
            </script>
            <section class="nuevo">
                <h4>Selecciona agente aduana</h4>
                <select id="listaencargado" name="nagente">
                    <option value="A-15">Larribel juanitox</option>
                    <option value="A-73">LARRAGUIBEL RICARDO E.</option>
                    <option value="C-97">TELLERIA LONGHI HERNAN C.</option>
                    <option value="F-52">MUÑOZ MUÑOZ ANA DE LOURDES.</option>
                    <option value="P-60">Rosamel Fierro Delgado</option>
                </select>
            </section>
            <br>
            
            <section>
                <div class="txtform">
            
                    <h3>Tipo Revisión</h3>
                    <label for="opcion1">Libre</label>
                    <input type="radio" id="opcion1" name="tipo_revision" value="Libre" class="mi-checkbox">
                    <label for="opcion2">Documental</label>
                    <input type="radio" id="opcion2" name="tipo_revision" value="Documental" class="mi-checkbox">
                    <label for="opcion3">Fisico</label>
                    <input type="radio" id="opcion3" name="tipo_revision" value="Fisico" class="mi-checkbox">
                </div>
            </section>
            <br>
            <label for="nombre_usuario">Nombre Usuario</label>
            <input class="controls" id="nombre_usuario" name="nombre_usuario" placeholder="Ingrese Nombre Usuario">
            <section class="nuevo">
                <h4>Encargado</h4>
                <select id="listaencargado2" name="listaencargado">
                    <option value="3">Fernando Albornoz</option>
                    <option value="4">Humberto Donoso</option>
                    <option value="5">Jorge Tapia</option>
                    <option value="6">Mario Godoy</option>
                    <option value="7">Jhonatan esquivel</option>
                    <option value="8">Cristian Cabrera</option>
                </select>
            </section>
            <br>

            <section class="nuevo">
                <h4>Selecciones Resultados Obtenidos:</h4>
                <select id="Resultado" name="Resultado">
                    <option value="1">1.SIN OBSERVACIONES</option>
                    <option value="2">2.TOMA DE MUESTRAS</option>
                    <option value="3">3.DUDA RAZONABLE (VALORACION)</option>
                    <option value="4">4.CAMBIO DE REGIMEN DE IMPORTACION</option>
                    <option value="5">5.DENUNCIA POR CONTRABANDO</option>
                    <option value="6">6.DENUNCIA POR DROGAS</option>
                    <option value="7">7.DENUNCIA ASOCIADA AL MEDIO AMBIENTE</option>
                    <option value="8">8.DENUNCIA ASOCIADA A LA SALUD PUBLICA</option>
                    <option value="9">9.DENUNCIA ASOACIADA A LA SEGURIDAD EN LA CADENA LOGISTIA</option>
                    <option value="10">10.DENUNCIA ASOCIADA POR ABUSO DE REQUISITOS (V°B°,CERTIFICADOS, RESOLUCIONES)</option>
                    <option value="11">11.DENUCNIA ASOSIADA A PTRIMONIO ARTISTICO - CULTURAL</option>
                    <option value="12">12.SUSPENSION DEL DESPACHO POR PROPIEDAD INTELECTUAL</option>
                    <option value="13">13.OTROS RESULTADOS (ESPECIFICAR EN RECUADRO OBSERVACIONES)</option>
                </select>
                <br>
               
                <input class="" id="observaciones" name="observaciones" placeholder="OBSERVACIONES">

            </section>


            <br>
            <br>





            <input class="boton" type="submit" name="guardar" value="enviar">
        </section>
    </form>

    <?php
    include("registrar.php");
    ?>

</body>
</html>
