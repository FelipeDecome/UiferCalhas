<section class="portfolioHeader" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sectionHeader sectionHeaderInverse">
                    <h2 class="sectionTitle">Serviços Realizados</h2>
                    <h2>Nosso <span class="greatYellow">Portfólio</span></h2>
                </div>
                <div class="col-md-4 colPort">
                    <div class="portZoom artesanato">
                        <img src="<?php echo IMAGENS;?>portfolio/artesanatoBanner.jpg" alt="Banner artesanato Uifer Calhas" title="Artesanato Uifer Calhas"/>
                        <div class="retina">
                            <div>
                                <h5 class="greatRed">Artesanato</h5>
                                <p>Latões de Leite, Regadores, Bules Muito Mais.</p>
                                <button class="btn btnNew btnRed">Veja Mais <span class="glyphicon glyphicon-plus"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="smShow smShow1"><div class="hidden-md hidden-lg portContentSlide"><?php include './portfolio/portArtesanatoMobile.php'; ?></div></div>
                <div class="col-md-4 colPort">
                    <div class="portZoom calhas">
                        <img src="<?php echo IMAGENS;?>portfolio/calhasBanner.jpg" alt="Banner calhas Uifer Calhas" title="Calhas Uifer Calhas"/>
                        <div class="retina">
                            <div>
                                <h5 class="greatYellow">Calha</h5>
                                <p>Calhas Molduras, Pingadeiras, Rufos e Muito Mais.</p>
                                <button class="btn btnNew btnYellow">Veja Mais <span class="glyphicon glyphicon-plus"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="smShow smShow2"><div class="hidden-md hidden-lg portContentSlide"><?php include './portfolio/portCalhasMobile.php'; ?></div></div>
                <div class="col-md-4 colPort">
                    <div class="portZoom funilaria">
                        <img src="<?php echo IMAGENS;?>portfolio/funilariaBanner.jpg" alt="Banner funilaria industrial Uifer Calhas" title="Funilaria Industrial Uifer Calhas"/>
                        <div class="retina">
                            <div>
                                <h5 class="greatBlue">Funilaria Industrial</h5>
                                <p>Coifas, Tubulações Redondas e Quadradas e Muito Mais</p>
                                <button class="btn btnNew btnBlue">Veja Mais <span class="glyphicon glyphicon-plus"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="smShow smShow3"><div class="hidden-md hidden-lg portContentSlide"><?php include './portfolio/portFunilariaMobile.php'; ?></div></div>
            </div>
        </div>
        <div class="row mdShow mdShow1" id="md1"><div class="hidden-xs hidden-sm col-md-12 portContentSlide"><?php include './portfolio/portArtesanato.php'; ?></div></div>
        <div class="row mdShow mdShow2" id="md2"><div class="hidden-xs hidden-sm col-md-12 portContentSlide"><?php include './portfolio/portCalhas.php'; ?></div></div>
        <div class="row mdShow mdShow3" id="md3"><div class="hidden-xs hidden-sm col-md-12 portContentSlide"><?php include './portfolio/portFunilaria.php'; ?></div></div>
    </div>
</div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        $('.mdShow').hide(0);
        $('.smShow').hide(0);

        $('.artesanato .retina .btn').on('click', function () {
            if (window.innerWidth >= 992) {
                $('.mdShow2').hide(500);
                $('.mdShow3').hide(500);
                $('.mdShow1').toggle(500);
            } else {
                $('.smShow2').hide(500);
                $('.smShow3').hide(500);
                $('.smShow1').toggle(500);
            }
        });

        $('.calhas .retina .btn').on('click', function () {
            if (window.innerWidth >= 992) {
                $('.mdShow1').hide(500);
                $('.mdShow3').hide(500);
                $('.mdShow2').toggle(500);
            } else {
                $('.smShow1').hide(500);
                $('.smShow3').hide(500);
                $('.smShow2').toggle(500);
            }
        });

        $('.funilaria .retina .btn').on('click', function () {
            if (window.innerWidth >= 992) {
                $('.mdShow1').hide(500);
                $('.mdShow2').hide(500);
                $('.mdShow3').toggle(500);
            } else {
                $('.smShow1').hide(500);
                $('.smShow2').hide(500);
                $('.smShow3').toggle(500);
            }
        });

        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 1300
            });
        });
    });
</script>

<!--Portfolio CSS-->
<link href="<?php echo CSS; ?>portfolio.css" rel="stylesheet" type="text/css"/>