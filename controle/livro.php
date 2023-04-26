<?php

    include_once ("../banco/Banco.php");

    function mostrarAutor(){
        $banco = new Banco();
        $sql = "select*from autor";
        $resultado = $banco->consultar($sql);
        while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "<option value=$linha[id_autor]>$linha[nome]</option>";
        }             
    }

    function mostrarTemas(){
        $banco = new Banco();
        $sql = "select*from tema";
        $resultado = $banco->consultar($sql);
        while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "<option value=$linha[id_tema]>$linha[tema]</option>";
        }
    }

    function mostrarEditoras(){
        $banco = new Banco();
        $sql = "select*from editora";
        $resultado = $banco->consultar($sql);
        while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "<option value=$linha[id_editora]>$linha[nome]</option>";
        }
    }

    if (isset($_POST['isbn'])) {
        $isbn = $_POST['isbn'];
        $titulo = $_POST['titulo'];
        $ano = $_POST['ano'];
        $id_autor = $_POST['id_autor'];
        $id_tema = $_POST['id_tema'];
        $id_editora = $_POST['id_editora'];
        $precocompra = $_POST['precocompra'];
        $precovenda = $_POST['precovenda'];
        $quantidade = $_POST['quantidade'];
        $foto = $_FILES['foto'];
        $nomeaequivo = $foto['name'];

        //conversão dos valores para banco
        $precocompra = floatval($precocompra);
        $precovenda = floatval($precovenda);

        $pasta = 'img/';
        $caminhocompleto = $pasta.basename($nomeaequivo);
        move_uploaded_file($foto['tmp_name'], $caminhocompleto);

        $banco = new Banco();
        $sql = "INSERT INTO livro(isbn,titulo,ano,id_autor,id_tema,id_editora,precocompra,precovenda,quantidade,foto) VALUES ('$isbn','$titulo','$ano','$id_autor','$id_tema','$id_editora','$precocompra','$precovenda','$quantidade','$caminhocompleto')";
        if($banco->executar($sql)){
            header("Location:../view/sucesso_cadastro.php");
        }else{
            header("Location:../view/falha_cadastro.php");
        }
    }

    

?>