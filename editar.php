<link href="css/bootstrap.min.css" rel="stylesheet">


    <?php
        include("config.php");

        $sql = "SELECT * FROM corretores WHERE id=".$_REQUEST["id"];
        $res = $conn->query($sql);
        $row = $res->fetch_object();
    ?>

    <div class="container">
    <div class="row">
    <div class="col mt-5">
        <h3>Editar corretor </h3>
        <form action="index.php" method="POST">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?php print $row->id; ?>">
            <div class="mb-3">
                <input type="text" class="form-control" name="cpf" value="<?php print $row->cpf; ?>" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="creci" value="<?php print $row->creci; ?>" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="name" value="<?php print $row->name; ?>" required>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-dark mb-3 btn-lg" >Salvar</button>
            </div>
        </form>
    </div>
    </div>
    </div>