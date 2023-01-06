<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL_BASE ?>/public/css/style.css">
    <link rel="stylesheet" href="<?= URL_BASE ?>/public/css/m-style.css">
    <link rel="stylesheet" href="<?= URL_BASE ?>/public/css/grade.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script defer src="<?= URL_BASE ?>/public/js/script.js"></script>
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

                    </li>



                </ul>
            </div>
        </div>
    </div>

    <!-- Menu lateral do site -->
    <div id="menu">
        <div class="menu-lateral">
            <figure>
                <div class="thumb"> <img width="30px" src="https://upload.wikimedia.org/wikipedia/en/d/d5/Professor_%28Money_Heist%29.jpg" alt=""></div>
                <figcaption>
                    <strong>Professor</strong>
                    <small>Programação</small>
                </figcaption>
            </figure>
            <ul>
                <li><i class="fa-solid fa-house ico"></i><a href="<?= URL_BASE ?>/painel/professor">Home</a></li>
                <li><i class="fa-solid fa-desktop ico"></i><a href="<?= URL_BASE ?>/painel/novo-curso">Meus Cursos</a></li>
                <li><i class="fa-solid fa-user ico"></i><a href="<?= URL_BASE ?>/painel/perfil">Meu perfil</a></li>
                <li><i class="fa-solid fa-comment ico"></i><a href="<?= URL_BASE ?>/painel/comentarios">Comentario</a></li>
                <li><i class="fa-solid fa-right-from-bracket ico"></i><a href="<?= URL_BASE ?>/sair">sair</a></li>
            </ul>
        </div>
    </div>
    <!--  Fecha Menu lateral do site -->