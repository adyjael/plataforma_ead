<?php

use App\Models\Professor;

$professor = new Professor;
?>



<div class="site">


    <!-- Home do site -->
    <div class="base-geral">
        <div class="caixa">
            <h2 class="titulo"><span class="case"><i class="fa-solid fa-comment ico"></i> Comentario</span> Perguntas e respostas da Plataforma</h2>
        </div>

        <div class="base-home">
            <div class="rows duvidas">
                <div class="caixa">
                    <ul>


                        <?php if ($comentarios) : ?>
                            <?php foreach ($comentarios as $comentario) : ?>
                                <li>
                                    <img src="/assets/img/comentario.png" alt="">
                                    <span class="titulo">Comentario: <?= strtoupper($comentario["comentario"]) ?></span>
                                    <span class="tt2">Aluno: <?= $comentario["nomeAluno"] ?></span>
                                    <span class="tt1">Aula: <?= $comentario["tituloAula"] ?></span>
                                    <?php
                                    $resposta = $professor->selecionarRespostas($comentario["idComentario"]);
                            
                                    ?>
                                    <?php if ($resposta != []) : ?>
                                        <div class="resposta">
                                            <span class="titulo">Você Respondeu</small></span>
                                            <p><?= $resposta["resposta"] ?></p>
                                        </div>
                                    <?php else : ?>
                                        <div class="resposta">
                                            <span class="titulo">Nemhuma resposta ainda</small></span>
                                            <p>Vc ainda não respondeu este aluno</p>
                                            <form action="<?= URL_BASE ?>/painel/responder" method="post">
                                                <input type="hidden" name="idComentario" value="<?= $comentario["idComentario"] ?>">
                                                <input type="hidden" name="idProfessor" value="<?= $_SESSION["professor"] ?>">
                                                <input type="hidden" name="idAluno" value="<?= $comentario["idAluno"] ?>">
                                                <textarea style="background-color: #fff !important;" name="resposta" id="" cols="30" rows="3"></textarea>
                                                <button class="btn">Responder</button>
                                            </form>
                                        <?php endif ?>

                                </li>
                            <?php endforeach; ?>


                        <?php else : ?>
                            <img src="<?= URL_BASE ?>/public/assets/img/user-sad.png" alt="">
                            <span class="titulo"><b>Você ainda não fez nenhum comentario</b></span>
                            <span class="tt1">Aula nenhuma</span>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </div>





        <!-- FOOTER -->
        <div class="base-rodape">
            <p>CopyRigth - adyjael neto</p>
        </div>
    </div>
    <!-- fecha Home do site -->
</div>






</body>

</html>