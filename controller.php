<?php
    include 'model.php';
    session_start();
    
    if (!isset($_SESSION['employees'])) {
        $_SESSION['employees'] = array();
    }
        if (!isset($_SESSION['offices'])) {
        $_SESSION['offices'] = array();
    }
        if (!isset($_SESSION['office_employees'])) {
        $_SESSION['office_employees'] = array();
    }
function getEmployees() {
    $model = new listEmployee();
    $model->nama = $_POST['exampleInputNama'] ?? '';
    $model->umur = $_POST['exampleInputUmur'] ?? '';
    $model->alamat = $_POST['exampleInputAlamat'] ?? '';
    $model->no_hp = $_POST['exampleInputNOHP'] ?? '';
    $model->email = $_POST['exampleInputEmail1'] ?? '';

    array_push($_SESSION['employees'], $model);
}

    function getAllEmployees(){
        return $_SESSION['employees'];
    }

function deleteEmployee($index) {
    if (isset($_SESSION['employees'][$index])) {
        unset($_SESSION['employees'][$index]);
        $_SESSION['employees'] = array_values($_SESSION['employees']);
    }
}

    
if (isset($_POST['submit'])) {
    getEmployees();
    header("Location: view.php");
    exit();
}

if (isset($_POST['delete'])) {
    deleteEmployee((int) $_POST['index']);
    header("Location: view.php");
    exit();
}

function addOffice() {
    $model = new listOffice();
    $model->nama = $_POST['inputNamaOffice'] ?? '';
    $model->kota = $_POST['inputKotaOffice'] ?? '';
    $model->alamat = $_POST['inputAlamatOffice'] ?? '';
    $model->no_hp = $_POST['inputNoHPOffice'] ?? '';

    array_push($_SESSION['offices'], $model);
}

function getAllOffices() {
    return $_SESSION['offices'];
}

function deleteOffice($index) {
    if (isset($_SESSION['offices'][$index])) {
        unset($_SESSION['offices'][$index]);
        $_SESSION['offices'] = array_values($_SESSION['offices']);
    }
}

if (isset($_POST['submit'])) {
    getEmployees();
    header("Location: view.php");
    exit();
}

if (isset($_POST['delete'])) {
    deleteEmployee((int) $_POST['index']);
    header("Location: view.php");
    exit();
}

if (isset($_POST['submit_office'])) {
    addOffice();
    header("Location: view2.php");
    exit();
}

if (isset($_POST['delete_office'])) {
    deleteOffice((int) $_POST['index']);
    header("Location: view2.php");
    exit();
}
function saveOfficeEmployee($employee, $office) {
    if ($employee !== '' && $office !== '') {
        $_SESSION['office_employees'][$employee] = $office;
    }
}

function getAllOfficeEmployees() {
    return $_SESSION['office_employees'];
}

if (isset($_POST['submit'])) {
    getEmployees();
    header("Location: view.php");
    exit();
}

if (isset($_POST['delete'])) {
    deleteEmployee((int) $_POST['index']);
    header("Location: view.php");
    exit();
}

if (isset($_POST['submit_office'])) {
    addOffice();
    header("Location: view2.php");
    exit();
}

if (isset($_POST['delete_office'])) {
    deleteOffice((int) $_POST['index']);
    header("Location: view2.php");
    exit();
}

if (isset($_POST['save_office_employee'])) {
    saveOfficeEmployee($_POST['employee'] ?? '', $_POST['office'] ?? '');
    header("Location: view3.php");
    exit();
}
?>