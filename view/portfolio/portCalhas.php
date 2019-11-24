<?php 

use UiferCalhas\SrcClasses\ConfigDeclarations as Conf;

?>

<div class="col-md-8 col">
    <div id="carouselCalhas" class="carousel slide" data-ride="carousel">
        
        <ol class="hidden-xs hidden-sm carousel-indicators">
            <li data-target="#carouselCalhas" data-slide-to="0" class="active"></li>
            <li data-target="#carouselCalhas" data-slide-to="1"></li>
            <li data-target="#carouselCalhas" data-slide-to="2"></li>
        </ol>
        
        <div class="carousel-inner portSlide" role="listbox">
            <div class="item active">
                <img src="<?php echo Conf::IMAGENS;?>portfolio/calhas/01.jpg" alt="imagem/Calhas.jpg" title="Calhas Uifer Calhas">
            </div>
            <div class="item">
                <img src="<?php echo Conf::IMAGENS;?>portfolio/calhas/02.jpg" alt="imagem/Calhas.jpg" title="Calhas Uifer Calhas">
            </div>
            <div class="item">
                <img src="<?php echo Conf::IMAGENS;?>portfolio/calhas/03.jpg" alt="imagem/Calhas.jpg" title="Calhas Uifer Calhas">
            </div>
        </div>

        <a class="left carousel-control" href="#carouselCalhas" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carouselCalhas" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        
    </div>
</div>
<div class="col-md-4 calhas sliderText">
    <h5 class="greatYellow">Calhas</h5>
    <p>Corte e dobra de calhas, sob medida para atender sua necessidade e da sua empresa. Medição e orçamento sem compromisso.</p>
    <!--<button class="btn btnNew">Veja nossos Produtos</button>-->
</div>