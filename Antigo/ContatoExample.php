<!--BOOTSTRAP SELECT-->
<link href="css/bootstrap-select.css" rel="stylesheet" type="text/css"/>
<!-- CSS DA PÁGINA DE CONTATO -->
<link href="css/contatoStyle.css" rel="stylesheet" type="text/css"/>
<!--MASK PLUGIN JQUERY-->
<script src="js/jquery.mask.js" type="text/javascript"></script>    
<!--SELECT PLUGIN-->
<script src="js/bootstrap-select.js" type="text/javascript"></script>

<div class="container-fluid">
    <div class="row">
        <form class="form-horizontal col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4" action="contatoSend.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label class="control-label col-md-3" for="name">Nome:</label>
                <div class="col-md-9">
                    <input type="text" placeholder="Digite seu Nome." class="inputContato" name="name" id="name" pattern="[a-zA-Z\s]+$" required="required"/>
                    <div class="help-block helpBlockEdit">Somente letras!</div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3" for="mail">E-mail:</label>
                <div class="col-md-9">
                    <input type="email" placeholder="Digite seu E-mail." class="inputContato" name="mail" id="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required"/>
                    <div class="help-block helpBlockEdit">Ex.: exemplo@exemplo.com</div>
                </div>                
            </div>

            <div class="form-group">
                <label class="control-label col-md-3" for="tel">Telefone/Celular:</label>
                <div class="col-md-9">
                    <input type="text" placeholder="Digite seu Celular ou Telefone." class="inputContato" name="tel" id="tel" required="required"/>
                    <div class="help-block helpBlockEdit">Ex.: (12)34567-8901 | (12)3456-7890</div>
                </div>
            </div>

            <div class="form-group">

                <label class="control-label col-md-3">Pessoa:</label>
                <div class="col-md-9">

                    <label class="radio-inline" for="fisica">
                        <input type="radio" name="pessoa" id="fisica" value="fisica" required="required"/>
                        Física
                    </label>

                    <label class="radio-inline" for="juridica">
                        <input type="radio" name="pessoa" id="juridica" value="juridica" required="required"/>
                        Jurídica
                    </label>

                </div>

            </div>

            <div class="form-group cpfCamp"></div>
            <div class="form-group dataCamp"></div>
            <div class="form-group cnpjCamp"></div>

            <div class="form-group">
                <label class="control-label col-md-3" for="subject">Assunto:</label>
                <div class="col-md-9">
                    <select class="selectpicker show-tick show-menu-arrow" title="Qual o assunto de seu Contato?" data-width="100%" name="subject" required="required">
                        <option value="orcamento">Orçamento!</option>
                        <option value="duvidas">Dúvidas?</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3" for="mensagem">Mensagem:</label>
                <div class="col-md-9">
                    <textarea name="mensagem" id="mensagem" class="textAreaContato" rows="5" placeholder="Digite sua Mensagem."></textarea>
                    <div class="help-block helpBlockEdit text-right" id="helpBlockMens"></div>
                </div>
            </div>

            <div class="form-group uploadCamp">
                <div class="col-sm-5 col-xs-2 text-right">
                    <!--<label for="selectFile" class="hidden-xs">Adicionar Imagem:</label>-->
                    <a href="#" class="selectFile btn" id="selectFile"><i class="glyphicon glyphicon-upload"></i></a>
                    <input type="file" name="upload[]" id="upload" class="inputFile" accept="image/*" multiple="multiple"/>
                </div>
                <div class="col-sm-6 col-xs-offset-1 col-xs-9">
                    <input type="text" placeholder="Selecione uma Imagem." class="help-block helpBlockFile text-center" disabled="disabled"/>                 
                </div>
            </div>

            <div class="form-group text-center">
                <input type="submit" value="Envie sua Mensagem!" name="send" class="btn btnContato"/>
                <?php
                if (isset($_GET['msg']) && $_GET['msg'] == 'env') {
                    echo "<div class='help-block'> <span class='text-success'> Mensagem enviada com sucesso! </span> </div>";
                } else if (isset($_GET['msg']) && $_GET['msg'] == 'err') {
                    echo "<div class='help-block'> <span class='text-danger'> Mensagem náo enviada, algum dado pode estar errado, confira os dados passados e tente novamente! </span> </div>";
                }
                ?>
            </div>

            <script type="text/javascript">

                $(document).ready(function () {

                    $('.selectFile').on('click', function () {
                        $('.inputFile').trigger('click');
                    });

                    $('.inputFile').on('change', function () {
                        $('.helpBlockFile').empty();
                        var uploadFiles = $('.inputFile')[0].files.length;
                        var i;
                        for (i = 0; i < uploadFiles; i++) {
                            $('.helpBlockFile').val($('.helpBlockFile').val()+$('.inputFile')[0].files[i].name);
                                $('.helpBlockFile').val($('.helpBlockFile').val()+' | ');
                        }
                    });

                    //Mask Telefone
                    $('#tel').mask('(00) 0000-00009');

                    //Seta a data atual
                    function setDate() {
                        data = new Date;
                        var day = (data.getDate().toString().length < 2) ? '0' + data.getDate().toString() : data.getDate();
                        var month2 = data.getMonth() + 1;
                        var month = (month2.toString().length < 2) ? '0' + month2 : month2;
                        ;
                        var string = 'Ex.: ' + day + '/' + month + '/' + data.getFullYear();
                        $('#helpBlockDate').append(string);
                    }

                    //Função radio pessoa fisica juridica
                    $('#fisica').on('change', function () {
                        $('.cpfCamp').append('<label class="control-label col-md-5" for="cpf">Cpf:</label><div class="col-md-7"><input type="text" placeholder="Digite seu Cpf!" class="inputContato" pattern="[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}" name="cpfcnpj" id="cpf" required="required"/><div class="help-block helpBlockEdit">Ex.: 123.456.789-01</div></div>');
                        $('.dataCamp').append('<label class="control-label col-md-7" for="cpf">Data de Nascimento:</label><div class="col-md-5"><input type="text" placeholder="Digite sua data de Nascimento!" class="inputContato" name="data" id="data" required="required"/><div class="help-block helpBlockEdit" id="helpBlockDate"></div></div>');
                        $('.cnpjCamp').empty();
                        setDate();
                        //Função de mascara JQUERY
                        $('#cpf').mask('000.000.000-00', {reverse: true});
                        $('#data').mask('00/00/0000');
                    });

                    $('#juridica').on('change', function () {
                        $('.cpfCamp').empty();
                        $('.dataCamp').empty();
                        $('.cnpjCamp').append('<label class="control-label col-md-5" for="cnpj">Cnpj:</label><div class="col-md-7"><input type="text" placeholder="Digite seu Cnpj!" class="inputContato" name="cnpj" id="cnpj" pattern="[0-9]{2}\.[0-9]{3}\.[0-9]{3}\/[0-9]{4}-[0-9]{2}" required="required"/><div class="help-block helpBlockEdit">Ex.: 12.345.678/0001-34</div></div>');
                        //Função de mascara JQUERY
                        $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
                    });

                    //Função para contar os caracteres da mensagem
                    $('#helpBlockMens').append('000');
                    $('#mensagem').on('keyup keydown', function () {
                        var count = $('#mensagem').val().length;
                        //var count2 = (count.toString().length < 2) ? '0'+count : count;
                        if ((count.toString().length < 3) && (count.toString().length == 2)) {
                            var count2 = '0' + count;
                        } else if (count.toString().length < 2) {
                            var count2 = '00' + count;
                        } else {
                            var count2 = count;
                        }
                        $('#helpBlockMens').html(count2);
                    });

                });

            </script>            
        </form>
    </div>
</div>