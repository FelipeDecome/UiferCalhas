<section class="ProdutosHeader" id="produtos">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sectionHeader">
                    <h2 class="sectionTitle"><?php echo ucfirst($catData['cat_name']); ?></h2>
                    <h2><?php echo $catData['section_header']; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li> 
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li> 
                        </ul>  
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categoria <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Artesanato</a></li>
                                    <li><a href="#">Calhas</a></li>
                                    <li><a href="#">Funilaria Industrial</a></li>
                                    <li><a href="#">Telhas</a></li>
                                    <li><a href="#">Venezianas</a></li>                                    
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</section>