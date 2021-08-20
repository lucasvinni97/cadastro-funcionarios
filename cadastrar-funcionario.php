<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1" />
    <title>Cadastro de Funcionários</title>
    <link rel="stylesheet" type="text/css" href="estilos/estilo.css" />
</head>
<body>
<div class="corpo">
    <h1>Cadastro de Funcionários</h1>
    <form action="cadastrar-funcionario.php" method="post" name="formulario">
        <label>Primeiro Nome</label>
            <input type="text" name="p-nome" />
        <label>Sobrenome</label>
            <input type="text" name="s-nome" />
        <label>Data de Nascimento</label>
            <input type="date" name="nascimento" />
        <label>Cargo</label>
        <select name="cargo" value="Cargo">
            <option name="adm" value="Administrador">Administrador</option>
            <option name="cont" value="Contador">Contabilidade</option>
            <option name="juri" value="Juri">Jurídico</option>
        </select><br>
            <input type="submit" name="salvar" value="Enviar" />
    </form>

    <?php
        if (isset($_POST['p-nome'], $_POST['s-nome'], $_POST['nascimento'], $_POST['cargo'] )) {
            $_SESSION['primeiro-nome'][] = $_POST['p-nome'];
            $_SESSION['segundo-nome'][] = $_POST['s-nome'];
            $_SESSION['d_nascimento'][] = $_POST['nascimento'];
            $_SESSION['p_cargo'][] = $_POST['cargo'];
        }

        if (isset($_SESSION['primeiro-nome'],$_SESSION['segundo-nome'],$_SESSION['d_nascimento'],  $_SESSION['p_cargo'])) {
            $primeiro_nome = array();
            $segundo_nome = array();
            $d_nascimento = array();
            $p_cargo = array();


            $primeiro_nome = $_SESSION['primeiro-nome'];
            $segundo_nome = $_SESSION['segundo-nome'];
            $d_nascimento = $_SESSION['d_nascimento'];
            $p_cargo = $_SESSION['p_cargo'];
        }
    ?>

    <table>
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Sobrenome</th>
            <th scope="col">Idade</th>
            <th scope="col">Cargo</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td scope="row" data-label="Nome">
                <?php
                if (isset($primeiro_nome)) {
                    foreach ($primeiro_nome as $p_nome) {
                        echo $p_nome . "<br>";
                    }
                }
                ?>
            </td>
            <td data-label="Sobrenome">
                <?php
                if (isset($segundo_nome)) {
                    foreach ($segundo_nome as $s_nome) {
                        echo $s_nome . "<br>"; 
                    }
                }
                ?>
            </td>
            <td data-label="Data/Nascimento">
                <?php
                if (isset($d_nascimento)) {
                    foreach ($d_nascimento as $d_nasc) {
                        if ($d_nasc) {
                            echo $d_nasc . "<br>";
                        }
                        else {
                            echo "Indefinido <br>";
                        }
                    }
                } 
                ?>
            </td>
            <td data-label="Cargo">
                <?php
                if (isset($p_cargo)) {
                    foreach ($p_cargo as $p_carg) {
                        echo $p_carg . "<br>"; 
                    } 
                }
                ?>
            </td>
        </tr>
        </tbody>
    </table>    
</div>
</body>
</html>