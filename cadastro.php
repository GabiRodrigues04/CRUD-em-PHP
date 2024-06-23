<?php
include("config.php");

$message = "";

if (isset($_REQUEST["action"])) {
switch ($_REQUEST["action"]) {


    case 'create':
        $cpf = $_POST["cpf"];
        $creci = $_POST["creci"];
        $name = $_POST["name"];

        $sql = "INSERT INTO corretores (cpf, creci, name) VALUES ('{$cpf}','{$creci}','{$name}')";

        $res = $conn->query($sql);

        if ($res === true) {
            $_SESSION['message'] = "<div class='alert alert-success text-center' role='alert'>Corretor cadastrado com sucesso!</div>";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();

        } else {
            $_SESSION['message'] = "<div class='alert alert-danger text-center' role='alert'>Falha ao cadastrar corretor.</div>";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    break;


    case 'update':
        $cpf = $_POST["cpf"];
        $creci = $_POST["creci"];
        $name = $_POST["name"];

        $sql = "UPDATE corretores SET cpf='{$cpf}',creci='{$creci}',name='{$name}' WHERE id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res === true) {
            $_SESSION['message'] = "<div class='alert alert-success text-center' role='alert'>Cadastro de corretor atualizado com sucesso.</div>";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();

        } else {
            $_SESSION['message'] = "<div class='alert alert-danger text-center' role='alert'>Falha ao atualizar cadastro de corretor.</div>";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    break;

    case 'delete':

        $sql = "DELETE FROM corretores WHERE id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res === true) {

            $_SESSION['message'] = "<div class='alert alert-success text-center' role='alert'>Cadastro de corretor excluido com sucesso.</div>";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();

        } else {
            $_SESSION['message'] = "<div class='alert alert-danger text-center' role='alert'>Falha ao excluir corretor.</div>";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    break;
    }
}

