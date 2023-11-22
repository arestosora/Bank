<?php

require_once(__DIR__ . "/procesar.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_SESSION['id_usuario']; 
    $nombre = $_POST["nombre"];
    $educationLevel = $_POST["nivel_estudios"];
    $occupation = $_POST["ocupacion"];
    $residenceCity = $_POST["residencia_ciudad"];
    $residenceDepartment = $_POST["residencia_departamento"];
    $stratum = $_POST["estrato"];
    $numDependents = $_POST["personas_dependientes"];
    $workCity = $_POST["lugar_trabajo_ciudad"];
    $workDepartment = $_POST["lugar_trabajo_departamento"];
    $workDuration = $_POST["anios_trabajo"];
    $jobName = $_POST["cargo"];
    $jobDepartment = $_POST["departamento_empresa"];
    $jobType = $_POST["tipo_contrato"];
    $contractType = $_POST["tipo_cargo"];
    $salaryType = $_POST["tipo_salario"];
    $workHours = $_POST["horas_diarias"];
    $civilStatus = $_POST["estado_civil"];
    $gender = $_POST["genero"];
    $yearOfBirth = $_POST["fecha_nacimiento"];
    $typeHousing = $_POST["tipo_vivienda"];

    $procesar = new Procesar(
        $idUsuario,
        $nombre,
        $educationLevel,
        $occupation,
        $residenceCity,
        $residenceDepartment,
        $stratum,
        $numDependents,
        $workCity,
        $workDepartment,
        $workDuration,
        $jobName,
        $jobDepartment,
        $jobType,
        $contractType,
        $salaryType,
        $workHours,
        $civilStatus,
        $gender,
        $yearOfBirth,
        $typeHousing
    );

    $procesar->guardarEnBD();
} else {
    echo "No se ha enviado ningún formulario.";
}
?>
