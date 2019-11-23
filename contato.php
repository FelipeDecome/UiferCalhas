<section class="ContatoHeader" id="contato">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sectionHeader">
                    <h2 class="sectionTitle">Fale Conosco</h2>
                    <h2>Tire suas <span class="greatYellow">Dúvidas</span></h2>
                </div>
                <div class="contatoInfo text-center clearfix">
                    <div class="col-md-4 col-sm-4">
                        <i class="glyphicon glyphicon-map-marker"></i>
                        <h5>Rua do Trabalhador 15, Jardim Triunfo. Pedreira-SP. Cep 13.920-000</h5>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <i class="glyphicon glyphicon-envelope"></i>
                        <h5 class="Yellow">uifercalhas@hotmail.com</h5>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <i class="glyphicon glyphicon-phone"></i>
                        <h5>(19) 3852-3381<br/>(19) 3893-4121<br/>(19) 99699-1247<br/> (19) 99618-2095</h5>
                    </div>
                </div>
                <div class="formularioContent">
                    <form class="form-horizontal formContato" action="contatoSend.php" method="post" enctype="multipart/form-data">

                        <?php
                        if (isset($_GET['send']) && $_GET['send'] == 'success') {
                            echo'<div class="col-md-12"><h5 class="text-center text-success msgErr">Mensagem Enviada</h5></div>';
                        } else if (isset($_GET['send']) && $_GET['send'] == 'fail') {
                            echo'<div class="col-md-12"><h5 class="text-center text-danger msgErr">Mensagem não foi enviada, tente Novamente</h5></div>';
                        }
                        ?>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="control-label col-md-3" for="name">Nome:</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Digite seu Nome e Sobrenome" class="inputContato" name="name" id="name" pattern="[a-zA-Z\s]+$" required="required"/>
                                    <div class="help-block helpBlockEdit">Somente letras!</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="mail">E-mail:</label>
                                <div class="col-md-9">
                                    <input type="email" placeholder="Digite seu E-mail" class="inputContato" name="mail" id="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required"/>
                                    <div class="help-block helpBlockEdit">Ex.: exemplo@exemplo.com</div>
                                </div>                
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="tel">Telefone/Celular:</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Digite seu Celular ou Telefone" class="inputContato" name="tel" id="tel" required="required"/>
                                    <div class="help-block helpBlockEdit">Ex.: (12)3456-78901 | (12)3456-7890</div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="control-label col-md-3" for="subject">Assunto:</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Digite o assunto de seu contato" class="inputContato" name="subject" id="subject" required="required"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="mensagem">Mensagem:</label>
                                <div class="col-md-9">
                                    <textarea name="mensagem" id="mensagem" class="textAreaContato" rows="6" placeholder="Digite sua Mensagem"></textarea>
                                    <div class="help-block helpBlockEdit text-right" id="helpBlockMens"></div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" name="send" class="btn btnNew btnYellow">Envie sua Mensagem <i class="glyphicon glyphicon-send"></i></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">

    $(document).ready(function () {

        $('#tel').mask('(00) 0000-00009');

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