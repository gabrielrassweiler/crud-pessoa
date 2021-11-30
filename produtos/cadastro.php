<?php
    if (isset($_POST['gravar'])) {
        try {
            $stmt = $conn->prepare('INSERT INTO produtos (nome) values (:nome)');
            $stmt->execute(array('nome' => $_POST['nome']));
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
?>
<form method="post">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>
    <input type="submit" name="gravar" value="Gravar">
</form>
