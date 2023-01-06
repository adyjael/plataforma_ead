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
    <title><?php echo isset($titulo) ? $titulo : "Login"  ?></title>
</head>



<body class="base-login">
    <div class="caixa-login">
        <form action="#">
            <h1>Login professor</h1>
            <small id="msg" style="color: red;"></small>
            <label><input value="professor@gmail.com" type="text" name="" id="emailProfessor" placeholder="Email"></label>
            <label><input value="professor12343" type="text" name="" id="senhaProfessor" placeholder="Senha"></label>
            <input type="submit" name="" value="Entrar" class="btn" id="btnLoginProfessor">
        </form>
    </div>

</body>

</html>