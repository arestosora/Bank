<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de Usuario</title>
    <link rel="stylesheet" href="../styles/formulario.css">
</head>

<body>

    <form action="procesar_formulario.php" method="post">
        <label for="nombre">Nombre completo:</label>
        <input type="text" name="nombre" required>

        <br>

        <div class="genero-section">
            <label>Género:</label>
            <div class="genero-options">
                <div class="genero-option">
                    <input type="radio" name="genero" value="masculino" required>
                    <label>Masculino</label>
                </div>
                <div class="genero-option">
                    <input type="radio" name="genero" value="femenino" required>
                    <label>Femenino</label>
                </div>
            </div>
        </div>

        <br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" required>

        <br>

        <label for="estado_civil">Estado Civil:</label>
        <select name="estado_civil" required>
            <option value="1">Soltero</option>
            <option value="2">Casado</option>
            <option value="3">Unión Libre</option>
            <option value="4">Separado</option>
            <option value="5">Divorciado</option>
            <option value="6">Viudo</option>
            <option value="7">Monja</option>
        </select>

        <br>

        <label for="nivel_estudios">Último nivel de estudios:</label>
        <select name="nivel_estudios" required>
            <option value="1">Ninguno</option>
            <option value="2">Primaria incompleta</option>
            <option value="3">Primaria completa</option>
            <option value="4">Bachillerato incompleto</option>
            <option value="5">Bachillerato completo</option>
            <option value="6">Técnico / tecnológico incompleto</option>
            <option value="7">Técnico / tecnológico completo</option>
            <option value="8">Profesional incompleto</option>
            <option value="9">Profesional completo</option>
            <option value="10">Carrera militar / policía</option>
            <option value="11">Post-grado incompleto</option>
            <option value="12">Post-grado completo</option>
        </select>

        <br>

        <label for="ocupacion">Ocupación o profesión:</label>
        <input type="text" name="ocupacion" required>

        <br>

        <label for="anios_trabajo">¿Hace cuántos años que trabaja en esta empresa?</label>
        <select name="anios_trabajo" required>
            <option value="1">Menos de un año</option>
            <option value="2">1 año o más</option>
        </select>


        <label for="residencia_ciudad">Ciudad / municipio de residencia:</label>
        <input type="text" name="residencia_ciudad" required>

        <br>

        <label for="residencia_departamento">Departamento de residencia:</label>
        <input type="text" name="residencia_departamento" required>

        <br>

        <label for="estrato">Estrato de los servicios públicos:</label>
        <select name="estrato" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="Finca">Finca</option>
            <option value="Unknown">No sé</option>
        </select>

        <br>

        <label for="tipo_vivienda">Tipo de vivienda:</label>
        <select name="tipo_vivienda" required>
            <option value="1">Propia</option>
            <option value="2">En arriendo</option>
            <option value="3">Familiar</option>
        </select>

        <br>

        <label for="personas_dependientes">Número de personas que dependen económicamente de usted:</label>
        <input type="number" name="personas_dependientes" required>

        <br>

        <label for="lugar_trabajo_ciudad">Lugar donde trabaja actualmente (Ciudad / municipio):</label>
        <input type="text" name="lugar_trabajo_ciudad" required>

        <br>

        <label for="lugar_trabajo_departamento">Departamento donde trabaja actualmente:</label>
        <input type="text" name="lugar_trabajo_departamento" required>

        <br>

        <label for="cargo">¿Cuál es el nombre del cargo que ocupa en la empresa?</label>
        <input type="text" name="cargo" required>

        <br>

        <label for="tipo_cargo">Seleccione el tipo de cargo que más se parece al que usted desempeña:</label>
        <select name="tipo_cargo" required>
            <option value="1">Jefatura - tiene personal a cargo</option>
            <option value="2">Profesional, analista, técnico, tecnólogo</option>
            <option value="3">Auxiliar, asistente administrativo, asistente técnico</option>
            <option value="4">Operario, operador, ayudante, servicios generales</option>
        </select>


        <br>

        <label for="departamento_empresa">Escriba el nombre del departamento, área o sección de la empresa en el que
            trabaja:</label>
        <input type="text" name="departamento_empresa" required>

        <br>

        <label for="tipo_contrato">Seleccione el tipo de contrato que tiene actualmente:</label>
        <select name="tipo_contrato" required>
            <option value="1">Temporal de menos de 1 año</option>
            <option value="2">Temporal de 1 año o más</option>
            <option value="3">Término indefinido</option>
            <option value="4">Cooperado (cooperativa)</option>
            <option value="5">Prestación de servicios</option>
            <option value="6">No sé</option>
        </select>

        <br>

        <label for="horas_diarias">Indique cuántas horas diarias de trabajo están establecidas habitualmente por la
            empresa para su cargo:</label>
        <input type="number" name="horas_diarias" required>

        <br>

        <label for="tipo_salario">Seleccione y marque el tipo de salario que recibe:</label>
        <select name="tipo_salario" required>
            <option value="1">Fijo (diario, semanal, quincenal o mensual)</option>
            <option value="2">Una parte fija y otra variable</option>
            <option value="3">Todo variable (a destajo, por producción, por comisión)</option>
        </select>

        <br>

        <input type="submit" value="Guardar">
    </form>

</body>

</html>