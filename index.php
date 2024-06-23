<?php session_start(); ?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de corretor</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

  <script src="js/bootstrap.bundle.min.js"></script>
  
    <?php
        include("cadastro.php");
    ?>

    <div class="container">
    <div class="row">
    <div class="col mt-5">
        <h3>Cadastro de corretor </h3>
        <form action="?page=cadastro" method="POST" class="needs-validation" novalidate>
        <input type="hidden" name="action" value="create">
            <div class="mb-3">
                <input type="text" class="form-control" name="cpf" placeholder="Digite seu CPF" pattern="[0-9]{11}" required>
                    <div class ="invalid-feedback"> Você deve informar um CPF com 11 dígitos númericos. </div>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="creci" placeholder="Digite seu CRECI" pattern=".{2,}" required>
                <div class ="invalid-feedback"> Digite um CRECI válido.</div>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Digite seu NOME" pattern=".{2,}" required>
                <div class ="invalid-feedback"> Digite um nome válido.</div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-dark mb-3 btn-lg" >Enviar</button>
            </div>
        </form>
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
    </div>
    </div>
    </div>

    
    <script>
            
            (() => {
            'use strict'
    
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')
    
            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
    
                form.classList.add('was-validated')
                }, false)
            })
            })()
            
            </script> 
    
<div class="container">
<div class="row">
<div class="col mt-5">
    <?php

        $sql = "SELECT * FROM corretores";
        $res = $conn->query($sql);

        $numr = $res->num_rows;

        if($numr > 0){
            print "<table class='table table-hover table-striped'>";
             print "<tr>";
                print "<th>ID</th>";
                print "<th>CPF</th>";
                print "<th>CRECI</th>";
                print "<th>NOME</th>";
                print "<th>Editar ou Excluir</th>";
                print "</tr>";
            while($row = $res->fetch_object()){
                print "<tr>";
                print "<td>". $row->id ."</td>";
                print "<td>". $row->cpf ."</td>";
                print "<td>". $row->creci ."</td>";
                print "<td>". $row->name ."</td>";
                print "<td> 
                <div class='btn-group' role='group' aria-label='Basic example'> 
                <a href='editar.php?id=".$row->id."' class='btn btn-outline-secondary'>Editar</a>

                <button onclick=\"location.href='?page=cadastro&action=delete&id=".$row->id."';\" class='btn btn-secondary'>Excluir</button>
                </div></td>";
                print "</tr>";
            }
            print "</table>";
        } else {
                print "<table class='table table-hover table-striped'>";
                 print "<tr>";
                    print "<th>ID</th>";
                    print "<th>CPF</th>";
                    print "<th>CRECI</th>";
                    print "<th>NOME</th>";
                    print "</tr>";
        }

    ?>
</div>
</div>
</div>

  </body>
</html>