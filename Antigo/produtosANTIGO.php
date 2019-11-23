<!--JQUERY-->
<script src="../js/jquery-3.1.1.min.js" type="text/javascript"></script>

<!--BOOTSTRAP JS-->
<script src="../js/bootstrap.min.js" type="text/javascript"></script>

<!--MASK PLUGIN JQUERY-->
<script src="../js/jquery.mask.js" type="text/javascript"></script>   

<!--FONTS AWESOME-->
<script src="https://use.fontawesome.com/e6f15e8532.js"></script>

<!--CSS BOOTSTRAP-->
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<!--CSS MAIN-->
<link href="../css/main.css" rel="stylesheet" type="text/css"/>

<!--Produtos CSS-->
<link href="../css/produtosANTIGO.css" rel="stylesheet" type="text/css"/>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <nav class="sideBar">
                <ul class="nav">
                    <li class="headerSidebarTitle">Produtos</li>
                    <li class="headerSidebar"><a href="" class="josefinRed"><i class="fa fa-chevron-right"></i> Artesanato</a></li>
                    <li class="headerSidebar"><a href="" class="josefinYellow"><i class="fa fa-folder"></i> Calhas <i class="iconToggle fa fa-chevron-up pull-right"></i></a>
                        <ul class="subNavSideBar yellow">
                            <li><a href=""><i class="fa fa-chevron-right"></i> Molduras</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i> Pingadeiras</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i> Rufos</a></li>
                        </ul>
                    </li>
                    <li class="headerSidebar"><a href="" class="josefinGreen"><i class="fa fa-folder"></i> Funilaria Industrial <i class="iconToggle fa fa-chevron-up pull-right"></i></a>
                        <ul class="subNavSideBar green">
                            <li><a href=""><i class="fa fa-chevron-right"></i> Coifas</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i> Tubulações Redondas</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i> Tubulações Quadradas</a></li>
                        </ul>
                    </li>
                    <li class="headerSidebar"><a href="" class="josefinYellow"><i class="fa fa-chevron-right"></i> Telhas</a></li>
                    <li class="headerSidebar"><a href="" class="josefinYellow"><i class="fa fa-folder"></i> Venezianas <i class="iconToggle fa fa-chevron-down pull-right"></i></a></li>
                </ul>
            </nav>
            <div class="toggleSideBar"><i class="fa fa-chevron-left"></i></div>
        </div>

        <div class="mainContainer">
            <main class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                            <div id="carouselProd" class="carousel slide" data-ride="carousel">

                                <ol class="carousel-indicators">
                                    <li data-target="#carouselProd" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselProd" data-slide-to="1"></li>
                                    <li data-target="#carouselProd" data-slide-to="2"></li>
                                </ol>

                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="../imagens/portfolio/artesanato/01.jpg" alt="imagem/Artesanato.jpg" title="Artesanato Uifer Calhas">
                                    </div>
                                    <div class="item">
                                        <img src="../imagens/portfolio/artesanato/02.jpg" alt="imagem/Artesanato.jpg" title="Artesanato Uifer Calhas">
                                    </div>
                                    <div class="item">
                                        <img src="../imagens/portfolio/artesanato/03.jpg" alt="imagem/Artesanato.jpg" title="Artesanato Uifer Calhas">
                                    </div>
                                </div>


                                <a class="left carousel-control" href="#carouselProd" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carouselProd" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>

                            </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </main>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        var mainLarg = window.innerWidth - $('.sideBar').innerWidth();
        $('.mainContainer').css("width:" + mainLarg);

        $('.toggleSideBar').on('click', function () {
            if ($('.sideBar').is(":visible")) {
                $('.sideBar').toggle(500);
                $('.toggleSideBar i').addClass('fa-chevron-right');
                $('.toggleSideBar i').removeClass('fa-chevron-left');
                $('.toggleSideBar').removeClass('toggleNoEffect');
                $('.toggleSideBar').addClass('toggleEffect');
                var mainLarg = window.innerWidth - $('.sideBar').innerWidth();
                $('.mainContainer').css("width:" + mainLarg);

            } else {
                $('.sideBar').toggle(500);
                $('.toggleSideBar i').removeClass('fa-chevron-right');
                $('.toggleSideBar i').addClass('fa-chevron-left');
                $('.toggleSideBar').addClass('toggleNoEffect');
                $('.toggleSideBar').removeClass('toggleEffect');
                var mainLarg = window.innerWidth - $('.sideBar').innerWidth();
                $('.mainContainer').css("width:" + mainLarg);
            }
        });
    });

</script>