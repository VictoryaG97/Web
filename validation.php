<?php
include ('list_of_all_students.php');

// this will execute on submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // validate student name
    if (empty($_POST["name"])) {
        $nameError = "Името е задължително поле.";
    } elseif (strlen($_POST["name"]) > 200) {
        $nameError = "Максималната дължина на името е 200 символа.";
    } else {
        $name = test_input($_POST["name"]);
    }

    // validate student fn
    if (empty($_POST["fn"])) {
        $fnError = "Факултетният номер е задължително поле.";
    } elseif ($_POST["fn"] < 62000 || $_POST["fn"] > 62999) {
        $fnError = "Валидните факултетни номера са между 62000 и 62999.";
    } else {
        $fn = test_input($_POST["fn"]);
    }

    // validate student mark
    if (empty($_POST["mark"])) {
        $markError = "Оценката е задължително поле.";
    } elseif ($_POST["mark"] < 2.0 || $_POST["mark"] > 62999) {
        $markError = "Невалидна оценка.";
    } else {
        $mark = test_input($_POST["mark"]);
    }

    if (empty($nameError) && empty($fnError) && empty($markError)) {
        $students[] = ['name' => $name, 'fn'   => $fn, 'mark' => $mark];
        // echo arsort($students);
        $json_data = json_encode($students);
        include ('list_students.html');
        exit();
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
?>