<?php
require_once '../Init.php';
var_dump($_SESSION);
session_destroy();

$conn = new CrudSystem("SELECT", "products_line", "", "name", "category = 'funilaria'");
$result = $conn->Result;
$resCount = 0;
//var_dump($result);
foreach ($result as $key => $value) {
    foreach ($value as $key => $val) {
        if ($resCount === 0) {
            $resCount++;
            echo $val;
        } else {
            $resCount++;
            echo "|" . $val;
        }
    }
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script type="text/javascript">

    function  createOptions(result, category) {
        var lineSelect = document.querySelector(".lineSelect");
        if (category === "none") {
            content = "<option value='none'>Nenhuma categoria selecionada</option>";
            lineSelect.innerHTML = content;
        } else {
            var splitResult = result.split("|");
            for (var i = 0; i < splitResult.length; i++) {
                var content = "<option value='" + splitResult[i] + "'>" + splitResult[i] + "</option>";
                if (i === 0) {
                    lineSelect.innerHTML = content;
                } else {
                    lineSelect.innerHTML = lineSelect.innerHTML + content;
                }
            }
        }
    }

    function changeLine(category) {

        if (category !== null && category !== "") {
            $.ajax({
                url: "arquivoteste.php",
                type: "POST",
                data: category,
                dataType: "html"

            }).done(function (msg) {
                result = msg;
                console.log(result);
                createOptions(result, category);

            }).fail(function (jqXHR, textStatus) {
                result = "Request failed: " + textStatus;

            }).always(function () {
                console.log("completou");
            });
        } else {
            createOptions("", 'none');
        }
    }    
    
</script>

<form class="" action="validProduct.php" method="post" enctype="multipart/form-data">

    <label for="name">Nome:</label>
    <input type="text" class="name" name="name"/>

    <label for="reference">Referência:</label>
    <input type="text" class="reference" name="reference"/>

    <label for="category">Categoria:</label>
    <select class="category" name="category" onchange="changeLine(this.value)" onload="changeLine(this.value)">
        <optgroup>
            <option value="none">Selecione uma Categoria</option>
            <option value="artesanato">Artesanato</option>
            <option value="calhas">Calhas</option>
            <option value="funilaria">Funilaria Industrial</option>           
        </optgroup>
    </select>

    <!--Depende da categoria selecionada-->
    <label for="line">Linha:</label>
    <select class="line" name="line">
        <optgroup class="lineSelect">
            <option value="none">Nenhuma categoria selecionada</option>                     
        </optgroup>
    </select>

    <label for="description">Descrição:</label>
    <textarea class="description" name="description"></textarea>

    <input type="file" class="" name="image1" />
    <input type="file" class="" name="image2" />
    <input type="file" class="" name="image3" />
    <input class="" type="submit" value="Cadastrar" name="submit"/>

</form>