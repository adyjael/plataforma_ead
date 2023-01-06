<?php

use App\Models\Aulas;

$aulasAssitidas = new Aulas;

?>

<div class="site">
    <!-- Home do site -->
    <div class="base-geral">
        <div class="caixa">
            <h2 class="titulo"><span class="case"><i class="fa-solid fa-desktop ico"></i>Curso</span> <?= ucwords($curso["tituloCurso"]) ?> </h2>
        </div>
        <!-- DETALHES DO CURSO -->
        <div class="base-home">
            <div class="rows base-curso">
                <div class="cel8 alt">
                    <div class="caixa">
                        <div class="base-caixa-curso">
                            <div class="cel3 alt2">
                                <div class="thumb"><img src="<?= URL_BASE ?>/<?= $curso["fotoCurso"] ?>" alt=""></div>
                            </div>
                            <div class="cel8 alt2">
                                <span class="titulo"> <?= $curso["tituloCurso"] ?> </span>
                                <ul>
                                    <li><i class="fa-solid fa-calendar-days ico"></i> <small>Publicado</small>
                                        <span><?= date("d/m/Y", strtotime($curso["dataCurso"])) ?> </span>
                                    </li>
                                    <li><i class="fa-solid fa-clock ico"></i> <small>Duração:</small>
                                        <span> <?= $curso["duracaoCurso"] ?></span>
                                    </li>
                                    <li><i class="fa-solid fa-plus ico"></i><small>Quantidades:</small>
                                        <span><?php if($aulas != null){echo count($aulas);}else{echo 0;} ?> aulas</span>
                                    </li>
                                </ul>
                                <?php if ($inscrito) : ?>

                                    <div class="progress">
                                        <small>Nivel de prgressão deste curso <b><?= round($progressoCurso) ?>%</b></small>
                                        <progress value="<?= ($progressoCurso) ?>" max="100"></progress>
                                    </div>
                                    <?php if ($progressoCurso < 100) :  ?>
                                        <p>Você etsá inscrito neste curso</p>
                                    <?php else : ?>
                                        <p class="verde">Parabens você ja concluiu este curso</p>
                                    <?php endif; ?>

                                <?php else : ?>
                                    <div class="progress">
                                        <small>Nivel de prgressão deste curso <b>0%</b></small>
                                        <progress value="0" max="100"></progress>

                                    </div>
                                    <form action="<?= URL_BASE ?>/curso/inscrever" method="post">
                                        <input type="hidden" name="idCurso" value="<?= $curso["idCurso"] ?>">
                                        <input type="hidden" name="idAluno" value="<?= $_SESSION["aluno"] ?>">
                                        <input type="hidden" name="slugCurso" value="<?= $curso["slugCurso"] ?>">
                                        <input type="hidden" name="idProfessor" value="<?= $curso["idProfessor"] ?>">
                                        <button class="btn">Inscrever</button>
                                    </form>
                                <?php endif; ?>

                            </div>

                        </div>
                    </div>

                    <!-- Lista de aulas -->
                    <div class="rows">
                        <div class="lista alternativo">
                            <div class="caixa">
                                <span class="titulo2">Lista de aulas</span>
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Duração</th>
                                            <th>Assitido</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php if ($aulas != null) : ?>
                                            <?php foreach ($aulas as $aula) : ?>
                                                <tr>
                                                    <td><a href="<?php if ($inscrito) {
                                                                        echo URL_BASE . "/" . $curso["slugCurso"] . "/aulas/" . $aula["slugAula"];
                                                                    } else {
                                                                        echo "javascript:void(0)";
                                                                    }
                                                                    ?>"><i class="fa-solid fa-play ico"></i><?= $aula["tituloAula"] ?></a></td>
                                                    <td><i class="fa-solid fa-clock ico"></i><?= $aula["duracaoAula"] ?></td>
                                                    <?php if ($aulasAssitidas->verificarAulaAssitida($aula["idAula"], $_SESSION["aluno"])) :  ?>

                                                        <td><i class="fa-regular fa-circle-check ico verde"></i>Sim</td>
                                                    <?php else : ?>

                                                        <td><i class="fa-regular fa-circle-check ico red"></i> não</td>

                                                    <?php endif; ?>


                                                </tr>

                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td><a href="#"><i class="fa-solid fa-play ico"></i>As aulas ainda não estão finalizadas</a></td>
                                            </tr>

                                        <?php endif; ?>




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- SIDBAR -->
                <div class="cel3 alt">
                    <div class="caixa">
                        <div class="seus-acessos">
                            <span class="titulo2">Seus Acessos no curso</span>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-calendar-days ico"></i>
                                    <span class="tt1">Ultimo acesso</span>
                                    <span class="tt2"><?=  date("d/m/Y"); ?></span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-clock ico"></i>
                                    <span class="tt1">Duração</span>
                                    <span class="tt2"><?= $curso["duracaoCurso"]?></span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-fire ico"></i>
                                    <span class="tt1">Total</span>
                                    <span class="tt2"><?php if($aulas != null){echo count($aulas);}else{echo 0;} ?> Aulas</span>
                                </li>
                                <li>
                                    <i class="fa-regular fa-circle-check ico verde"></i>
                                    <span class="tt1">Aulas assistidas</span>
                                    <span class="tt2"><?= count($aulasAssitidas->getAulaAssitidaByAluno($_SESSION["aluno"])) ?> aulas</span>
                                </li>
                            </ul>
                        </div>
                    </div>
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