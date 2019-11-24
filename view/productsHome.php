<?php 

use UiferCalhas\SrcClasses\ConfigDeclarations as Conf;

?>

<main class="prodBackHome" style="background: url(imagens/produtos/backArt.jpg) no-repeat center center / cover;">
    <div class="prodHomeContent">
        <div class="backContent">
            <h1 class="catTitle clarendon"><span>A</span>rtesanato</h1>
            <p class="catDesc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pulvinar sed augue ac auctor. Aliquam erat volutpat. Vestibulum quis pellentesque mi. Maecenas in sagittis elit. Praesent a ultricies augue. Aenean in velit interdum, mollis leo ut, feugiat sapien. Vestibulum suscipit sodales augue vel faucibus. Donec maximus lectus arcu, ac tempor leo dapibus ac. Vestibulum condimentum lobortis bibendum. Pellentesque et consectetur orci.</p>
            <div class="btnMais">
                <button class="btn btnNew btnRed"><a class="scroll" href="#prodList" title="Serviços Uifer Calhas">Saiba Mais <span class="glyphicon glyphicon-plus"></span></a></button>
            </div>
        </div>
    </div>
</main>

<link href="<?php echo Conf::CSS; ?>prodHome.css" rel="stylesheet" type="text/css"/>
