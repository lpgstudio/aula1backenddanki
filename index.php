<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,200;0,400;0,600;0,700;1,200&family=Viaoda+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">




    <title>SPA das Sobrancelhas</title>
</head>

<body>
    <?php 
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';

        switch ($url) {
            case 'sobre':
                echo '<target target="sobre" />';
                break;

            case 'servicos':
                echo '<target target="servicos" />';
                break;
            
        }
    ?>
    <header>
        <div class="content">
            <div class="logo">SPA das Sobrancelhas</div>
            <nav class="menu-desktop">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Início</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <nav class="menu-mobile">
                <div class="icon-mobile">
                    <i class="fas fa-bars"></i>
                </div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Início</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>

<!-- 
    ##esse script é usado para carregar as páginas      dinamicamente no site e carrega a pagina de erro.
    ##Os arquivos das páginas tem que ficar em uma pasta chamada 'pages' para funcionar esse script
    ##há uma verificação no footer que complementa esse script
-->
    <?php 

        if(file_exists('pages/'.$url.'.php')){
            include('pages/'.$url.'.php');
        }else{
            //pode ser encaminhado para uma página de erro
            if($url != 'sobre' && $url != 'servicos'){
                $pagina404 = true;
                include('pages/404.php');
            }else{
                include('pages/home.php');
            }
            
        }

    
    ?>
   


    <footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"' ?>>
        <p>Todos os direitos reservados</p>
    </footer>
    <script src="./js/jquery.js"></script>
    <script src="./js/script.js"></script>
    <?php 
        if($url == 'contato'){
    ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AQUIVAIAKEY"
    ></script>
    <script src="./js/map.js"></script>
    <?php 
        }
    ?>

</body>

</html>

