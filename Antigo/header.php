<header class="navbar navbarHeader navbarOnTop">
    <div class="container">
        <div class="row">
            <div class="headerTop">
                <div class="col-md-2 col-xs-9">
                    <div class="logo">
                        <a href="#">
                            <span class="clarendon"><span class="logoInitial1">U</span><span class="Red FinalWords1">ifer</span> <span class="logoInitial2">C</span><span class="Blue Finalwords2">alhas</span></span>
                        </a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="menuBar">
                        <nav class="navbar navbar-default navbarNew">
                            <div class="container-fluid">
                                <div class="navbar-header navbarHeaderNew">
                                    <button type="button" class="navbar-toggle navbarToggleNew collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="true">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="collapse navbar-collapse" id="navbar">
                                    <ul class="nav navbar-nav navbarNavNew pull-right">
                                        <li><a class="scroll itemMenu" href="#home" title="Página inicial Uifer Calhas">Home</a></li>
                                        <li><a class="scroll itemMenu" href="#sobre" title="Quem Somos Uifer Calhas">Sobre</a></li>
                                        <li><a class="scroll itemMenu" href="#servicos" title="Nossos Serviços Uifer Calhas">Serviços</a></li>
                                        <li><a class="scroll itemMenu" href="#portfolio" title="Nosso Portfólio Uifer Calhas">Portfólio</a></li>
                                        <li><a class="scroll itemMenu" href="#parClien" title="Parceiros Uifer Calhas">Parceiros & Clientes</a></li>
                                        <li><a class="scroll itemMenu" href="#contato" title="Fale Conosco Uifer Calhas">Contato</a></li>
                                        <li><a class="scroll itemMenu" href="<?php echo RAIZ;?>produtos" title="Fale Conosco Uifer Calhas">Produtos</a></li>
                                    </ul>
                                </div>

                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script type="text/javascript">
    $(document).ready(function () {
        //Efeito Menu
        $(window).on('scroll', function () {
            if (window.scrollY > 0) {
                $('.navbarHeader').removeClass('navbarOnTop');
                $('.navbarHeader').addClass('navbarOnScroll');
            } else {
                $('.navbarHeader').removeClass('navbarOnScroll');
                $('.navbarHeader').addClass('navbarOnTop');
            }
        });

        //Scroll Suave
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 800);
        });
        
        //Fecha Menu quando clicar em um link
        $('.itemMenu').on('click', function(){
            $('#navbar').collapse('hide');
        });
    });
</script>
