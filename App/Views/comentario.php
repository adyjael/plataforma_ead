<?php

use App\Models\Aulas;

$aulas = new Aulas;
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
                                    <span class="titulo">Comentario: <?=strtoupper( $comentario["comentario"]) ?></span>
                                    <span class="tt1">Aula: <?= $aulas->getAulaById($comentario["idAula"])[0]["tituloAula"] ?></span>
                                    <?php if ($aulas->getRespostas($comentario["idComentario"], $_SESSION["aluno"])) : ?>
                                        <?php $resposta = $aulas->getRespostas($comentario["idComentario"], $_SESSION["aluno"])[0]  ?>
                                        <div class="resposta">
                                            <span class="titulo">Resposta <small>Data; <?= date("d/m/Y",strtotime($resposta["dataResposta"])) ?></small></span>
                                            <p><?= $resposta["resposta"] ?></p>
                                        </div>

                                    <?php else : ?>
                                        <div class="resposta">
                                            <span class="titulo">Nemhuma resposta ainda</small></span>
                                            <p>Por favor aguarde que um do nossos colabotradores irá te responder</p>
                                        </div>
                            <?php endif; ?>
                            </li>
                        <?php endforeach; ?>


                    <?php else : ?>
                        <img src="<?= URL_BASE?>/public/assets/img/user-sad.png" alt="">
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