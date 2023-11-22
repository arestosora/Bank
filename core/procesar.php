<?php

require_once(__DIR__ . "/../database/MysqlConnection.php");

class Procesar
{
    private $contractType;
    private $chargeType;
    private $salaryType;
    private $typeHousing;
    private $occupation;
    private $workDuration;
    private $civilStatus;
    private $idUsuario;
    private $educationLevel;
    private $nombre;
    private $yearOfBirth;
    private $profession;
    private $stratum;
    private $gender;
    private $residenceCity;
    private $residenceDepartment;
    private $numDependents;
    private $workCity;
    private $workDepartment;
    private $jobName;
    private $jobDepartment;
    private $workHours;

    public function __construct(
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
        $contractType,
        $chargeType,
        $salaryType,
        $workHours,
        $civilStatus,
        $gender,
        $yearOfBirth,
        $typeHousing
    ) {
        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->educationLevel = $educationLevel;
        $this->occupation = $occupation;
        $this->residenceCity = $residenceCity;
        $this->residenceDepartment = $residenceDepartment;
        $this->stratum = $stratum;
        $this->numDependents = $numDependents;
        $this->workCity = $workCity;
        $this->workDepartment = $workDepartment;
        $this->workDuration = $workDuration;
        $this->jobName = $jobName;
        $this->jobDepartment = $jobDepartment;
        $this->contractType = $contractType;
        $this->chargeType = $chargeType;
        $this->salaryType = $salaryType;
        $this->workHours = $workHours;
        $this->civilStatus = $civilStatus;
        $this->gender = $gender;
        $this->yearOfBirth = $yearOfBirth;
        $this->typeHousing = $typeHousing;
    }

    private function displayData()
    {

        echo "<table border='1'>";
        echo "<tr><th>Datos a guardar</th><th>Valor</th></tr>";

        echo "<tr><td>ID Usuario</td><td>{$this->idUsuario}</td></tr>";
        echo "<tr><td>Nombre</td><td>{$this->nombre}</td></tr>";
        echo "<tr><td>Nivel de Estudios</td><td>{$this->educationLevel}</td></tr>";
        echo "<tr><td>Ocupación</td><td>{$this->occupation}</td></tr>";
        echo "<tr><td>Ciudad de Residencia</td><td>{$this->residenceCity}</td></tr>";
        echo "<tr><td>Departamento de Residencia</td><td>{$this->residenceDepartment}</td></tr>";
        echo "<tr><td>Estrato</td><td>{$this->stratum}</td></tr>";
        echo "<tr><td>Personas Dependientes</td><td>{$this->numDependents}</td></tr>";
        echo "<tr><td>Ciudad de Trabajo</td><td>{$this->workCity}</td></tr>";
        echo "<tr><td>Departamento de Trabajo</td><td>{$this->workDepartment}</td></tr>";
        echo "<tr><td>Años de Trabajo</td><td>{$this->workDuration}</td></tr>";
        echo "<tr><td>Nombre del Cargo</td><td>{$this->jobName}</td></tr>";
        echo "<tr><td>Departamento del Cargo</td><td>{$this->jobDepartment}</td></tr>";
        echo "<tr><td>Tipo de Contrato</td><td>{$this->contractType}</td></tr>";
        echo "<tr><td>Tipo de Cargo</td><td>{$this->chargeType}</td></tr>";
        echo "<tr><td>Tipo de Salario</td><td>{$this->salaryType}</td></tr>";
        echo "<tr><td>Horas de Trabajo Diarias</td><td>{$this->workHours}</td></tr>";
        echo "<tr><td>Estado Civil</td><td>{$this->civilStatus}</td></tr>";
        echo "<tr><td>Género</td><td>{$this->gender}</td></tr>";
        echo "<tr><td>Fecha de Nacimiento</td><td>{$this->yearOfBirth}</td></tr>";
        echo "<tr><td>Tipo de Vivienda</td><td>{$this->typeHousing}</td></tr>";

        echo "</table>";

    }

    public function guardarEnBD()
    {
        try {
            $this->displayData();

            $db = MysqlConnection::getInstance()->GetDatabase();
            $sql = "INSERT INTO personal_information (
                type_contract_id, type_charge_id, duration_job_id, civil_status_id, users_id, type_salary_id, type_housing_id, education_level_id,
                name, year_of_birth, profession, stratum, sex, city, department, num_person_economic, city_job, department_job, name_job, 
                name_department_job, num_hour_job) 
                VALUES (:contractType, :chargeType, :workDuration, :civilStatus, :idUsuario, :salaryType, :typeHousing, :educationLevel,
                :nombre, :yearOfBirth, :occupation, :stratum, :gender, :residenceCity, :residenceDepartment, :numDependents, :workCity, :workDepartment,
                :jobName, :jobDepartment, :workHours)";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(':contractType', $this->contractType);
            $stmt->bindParam(':chargeType', $this->chargeType);
            $stmt->bindParam(':workDuration', $this->workDuration);
            $stmt->bindParam(':civilStatus', $this->civilStatus);
            $stmt->bindParam(':idUsuario', $this->idUsuario);
            $stmt->bindParam(':salaryType', $this->salaryType);
            $stmt->bindParam(':typeHousing', $this->typeHousing);
            $stmt->bindParam(':educationLevel', $this->educationLevel);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':yearOfBirth', $this->yearOfBirth);
            $stmt->bindParam(':occupation', $this->occupation);
            $stmt->bindParam(':stratum', $this->stratum);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':residenceCity', $this->residenceCity);
            $stmt->bindParam(':residenceDepartment', $this->residenceDepartment);
            $stmt->bindParam(':numDependents', $this->numDependents);
            $stmt->bindParam(':workCity', $this->workCity);
            $stmt->bindParam(':workDepartment', $this->workDepartment);
            $stmt->bindParam(':jobName', $this->jobName);
            $stmt->bindParam(':jobDepartment', $this->jobDepartment);
            $stmt->bindParam(':workHours', $this->workHours);

            $stmt->execute();

            echo "Datos guardados exitosamente.";
        } catch (PDOException $e) {
            echo "Error al guardar los datos: " . $e->getMessage();
        }
    }
}
?>