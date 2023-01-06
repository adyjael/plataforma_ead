
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL_BASE ?>/public/css/style.css">
    <link rel="stylesheet" href="<?= URL_BASE ?>/public/css/m-style.css">
    <link rel="stylesheet" href="<?= URL_BASE ?>/public/css/grade.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    <script src="<?= URL_BASE ?>/public/js/script.js"></script>
    <title><?php echo isset($titulo) ? $titulo : "Plataforma ead"  ?></title>
</head>

<body>
    <div class="base-topo">
        <div class="conteudo">
            <a href="#" class="menu-m"><i class="fa-solid fa-bars"></i></a>
            <a href="#" class="menu-grade"><i class="fa-solid fa-ellipsis-vertical"></i></a>
            <a href="#" class="logo">EAD</a>
            <div id="grade">
                <ul class="menu-topo">
                    <li class="sub"><a href="<?= URL_BASE ?>/cursos"><i class="fa-solid fa-desktop ico"></i> Cursos</a>
                        <ul>
                            <li><a href="#">Java</a></li>
                            <li><a href="#">PHP</a></li>
                            <li><a href="#">Mysql</a></li>
                            <li><a href="#">Html</a></li>
                        </ul>
                    </li>

                    <li class="sub user">
                        <a href="#" class="thumb"><img src="<?= URL_BASE ?>/public/assets/img/user-default.jpg" alt=""></a>
                        <ul>
                            <li><b>Adyjael neto</b> <small><a href="#">Sair</a></small></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <!-- Menu lateral do site -->
    <div id="menu">
        <div class="menu-lateral">
            <figure>
                <div class="thumb"> <img width="30px" src="<?= URL_BASE ?>/public/assets/img/user-default.jpg" alt=""></div>
                <figcaption>
                    <strong>Adyjael neto</strong>
                    <small>Em andamento</small>
                </figcaption>
            </figure>
            <ul>
                <li><i class="fa-solid fa-house ico"></i><a href="<?=URL_BASE ?>/dashboard">Home</a></li>
                <li><i class="fa-solid fa-desktop ico"></i><a href="<?= URL_BASE ?>/meus-cursos">Meus cursos</a></li>
                <li><i class="fa-solid fa-user ico"></i><a href="<?= URL_BASE ?>/perfil">Meu perfil</a></li>
                <li><i class="fa-solid fa-comment ico"></i><a href="<?= URL_BASE ?>/comentario">Comentario</a></li>
                <li><i class="fa-solid fa-right-from-bracket ico"></i><a href="<?= URL_BASE ?>/sair">sair</a></li>
            </ul>
        </div>
    </div>
    <!--  Fecha Menu lateral do site -->