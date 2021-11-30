<?php
    $stmt = $conn->prepare('select * from estados');
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (isset($_POST['gravar'])) {
        try {
            $stmt = $conn->prepare('INSERT INTO cidades (codigo, nome, estado) values (:codigo, :nome, :estado)');
            $stmt->execute([
                'codigo' => $_POST['codigo'],
                'nome' => $_POST['nome'],
                'estado' => $_POST['estado'],
            ]);
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
?>
<form method="post">
    <div class="form-group">
        <label for="codigo">Código</label>
        <input type="number" class="form-control" name="codigo" id="codigo" placeholder="Código">

        <label for="estado">Estado</label>
        <select class="form-control" name="estado" id="estado">
            <?php
                foreach ($result as $estado) {
                    ?>
                        <option selected value="<?=$estado['id']?>"><?=$estado['sigla']?> - <?=$estado['nome']?></option>
                    <?php    
                }
            ?>
        </select>

        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>
    <input type="submit" name="gravar" value="Gravar">
</form>
