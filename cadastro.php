<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro completo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Você foi cadastrado!</h1>
    </header>
    <main>
        <div class="php">
        <?php
        try {
            $nome = $_POST['user'] ?? "";
            $sobrenome = $_POST['userS'] ?? "";
            $endereco = $_POST["address"] ?? "";
            $telefone = $_POST["number"] ?? "";  
            $con = new PDO("mysql:host=localhost;dbname=membros", "root", "");
            echo "Conectando ao Banco de Dados do Gui do Excel!<br>";
            $my_Insert_Statement = $con->prepare("INSERT INTO registro (nome, sobrenome, endereco, telefone) VALUES (:nome, :sobrenome, :endereco, :telefone)");
            $my_Insert_Statement->bindParam(':nome', $nome);
            $my_Insert_Statement->bindParam(':sobrenome', $sobrenome);
            $my_Insert_Statement->bindParam(':endereco', $endereco);
            $my_Insert_Statement->bindParam(':telefone', $telefone);
            if ($my_Insert_Statement->execute()) {
                echo "Seu cadastro foi realizado!<br>";
            } else {
                echo "Seu cadastro não foi realizado!<br>";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
            echo "<strong>$nome $sobrenome</strong> é mais um membro do Gui_do_Excel agora. <br><br>Seja bem vindo!";
        ?>
        </div>
        <p><a href="javascript:history.go(-1)">Voltar para a página anterior</a></p>
    </main>
</body>
</html>