<?php

if (isset($_POST['submit'])) {

    require_once '../Init.php';
    require_once '../class/PhotosVerify.class.php';
    require_once '../class/PhotosUpload.class.php';
    require_once '../class/ValidaDados.class.php';

    //Recebe os valores do formulário
    $data['name'] = (isset($_POST['name'])) ? strip_tags(trim($_POST['name'])) : null;
    $data['reference'] = (isset($_POST['reference'])) ? strip_tags(trim($_POST['reference'])) : null;
    $data['category'] = (isset($_POST['category'])) ? strip_tags(trim($_POST['category'])) : null;
    $data['line'] = (isset($_POST['line'])) ? strip_tags(trim($_POST['line'])) : null;
    $data['description'] = (isset($_POST['description'])) ? strip_tags(trim($_POST['description'])) : null;


    /*
     * Inicio da Sessão de validação
     */

    //Valida o nome
    if ($data['name'] === "") {
        $_SESSION['err_msg']['name'] = "Parece que o campo 'Nome' não foi preenchido, por favor, preencha-o.";
    } else {
        $validName = new CrudSystem("SELECT", 'products', "", "*", "name = '" . $data['name'] . "'");
        if ($validName->Result) {
            $_SESSION['err_msg']['name'] = "Já existem um produto com esse nome cadastrado, por favor, escolha outro nome ou apague o outro produto.";
        }
    }

    //Valida a Referência
    if ($data['reference'] != null) {
        $validReference = new CrudSystem("SELECT", 'products', "", "*", "reference = '" . $data['reference'] . "'");
        if ($validReference->Result) {
            $_SESSION['err_msg']['reference'] = "Já existem um produto com essa referência cadastrada, por favor, escolha outra referência ou apague o outro produto.";
        }
    } else {
        $_SESSION['err_msg']['reference'] = "Por favor, coloque uma referência";
    }

    //Valida a Categoria
    if ($data['category'] != null) {
        $validCategory = new CrudSystem("SELECT", 'products_cat', "", "*", "name = '" . $data['category'] . "'");
        if (!$validCategory->Result) {
            $_SESSION['err_msg']['category'] = "Essa categoria '{$data['category']}' não existe no sistema, houve algum erro atualize a página e se ele persistir contate o administrador do site.";
        }
    } else {
        $_SESSION['err_msg']['category'] = "Parece que a categoria não foi selecionada, atualize a página e tente novamente e se o erro persistir contate o administrador da página.";
    }

    //Valida a Linha do Produto
    if ($data['line'] != null) {
        $validLine = new CrudSystem("SELECT", 'products_line', "", "*", "name = '" . $data['line'] . "' AND category ='" . $data['category'] . "'");
        if (!$validLine->Result) {
            $_SESSION['err_msg']['line'] = "Essa Linha de Produtos '{$data['line']}' não existe no sistema ou está sendo enviada para um local errado, houve algum erro atualize a página e se ele persistir contate o administrador do site.";
        }
    } else {
        $_SESSION['err_msg']['line'] = "Parece que a Linha de Produtos não foi selecionada, atualize a página e tente novamente e se o erro persistir contate o administrador da página.";
    }

    if ($data['description'] === "") {
        $_SESSION['err_msg']['description'] = "Por favor coloque uma descrição.";
    }

    //Passa tudo na sessão, para caso dê algum erro, o formulário ainda esteja preenchido
    $_SESSION['data'] = $data;

    $verFalCount = 0;
    foreach ($_FILES as $key => $value) {
        $files[$key] = $value;
        $img = explode('image', $key);
        if ($files[$key]['tmp_name'] != null && $files[$key]['tmp_name'] != '') {
            $verify[$key] = new PhotosVerify($data['reference'] . "-" . $key, $files[$key]['type'], $files[$key]['size'], $img[1], false);
            if (!$verify[$key]->IsValid) {
                $verFalCount++;
                $_SESSION['err_msg'][$key] = $verify[$key]->Err_Msg;
            }
        }
    }

    $upFalCount = 0;
    if ($verFalCount === 0) {
        
        foreach ($_FILES as $key => $value) {
            $files[$key] = $value;
            $img = explode('image', $key);
            if ($files[$key]['tmp_name'] != null && $files[$key]['tmp_name'] != '' && !isset($_SESSION['err_msg'])) {
                $upload[$key] = new PhotosUpload($files[$key]['tmp_name'], $verify[$key]->Name, PROD_UP_DEST, $img[1]);
                $url[$key] = $verify[$key]->Name;
                if ($upload[$key]->Upload != true) {
                    $upFalCount++;
                    $_SESSION['err_msg'][$key] = $upload[$key]->Err_msg;
                }
            }
        }
    } else {
        header("location:" . RAIZ . "system/painel/cadastroexample.php");
    }

    if ($upFalCount === 0 && !isset($_SESSION['err_msg'])) {
        $urlFalCount = 0;
        foreach ($url as $key => $value) {
            $img = explode("image", $key);
            if (file_exists(PROD_UP_DEST . $url[$key])) {
                if (isset($urls)) {
                    $urls = $urls . "|" . $url[$key];
                } else {
                    $urls = $url[$key];
                }
            } else {
                $_SESSION['err_msg']['url'][$img[1]] = "Houve algum erro com a url da imagem {$img[1]}, por favor, contate o administrador do site.";
                $urlFalCount++;
            }
        }
        if(isset($urlFalCount) && $urlFalCount === 0){
            $data['img_url'] = $urls;
            $data['create_date'] = date("Y-m-d h:m:s");
            $insertDB = new CrudSystem("INSERT", "products", $data, "", "");            
        }       

        header("location:" . RAIZ . "system/painel/cadastroexample.php");
    } else {
        header("location:" . RAIZ . "system/painel/cadastroexample.php");
    }
}
    