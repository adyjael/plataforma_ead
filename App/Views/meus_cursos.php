<?php

use App\Models\Aulas;

$aulas = new Aulas;



?>


<div class="site">

    <!-- Home do site -->
    <div class="base-geral">
        <div class="caixa">
            <h2 class="titulo"><span class="case"><i class="fa-solid fa-desktop ico"></i> Meus Cursos</span>Lista dos meus
                cursos</h2>
        </div>

        <div class="base-home">
            <div class="rows cursos">


                <?php foreach ($meusCursos as $cursos) : ?>
                    <?php for ($i = 0; $i < count($cursos); $i++) : ?>
                        <?php
                        $aulasDoCurso = $aulas->ListarAulasNoCursoById($cursos[$i]["idCurso"]);
                        $totalAulasAssistida = $aulas->getAulaAssitida($_SESSION["aluno"], $cursos[$i]["idCurso"]);
                        $progressoCurso = (count($totalAulasAssistida) / count($aulasDoCurso) * 100);
                        ?>
                        <div class="cel3">
                            <div class="caixa">
                                <div><img src="<?= URL_BASE ?>/<?= $cursos[$i]["fotoCurso"] ?>" alt=""></div>
                                <div class="del-cursos">
                                    <p><?= $cursos[$i]["tituloCurso"] ?></p>
                                    <small>Desenpenho <b><?= round($progressoCurso) ?>%</b></small>
                                    <progress value="<?= $progressoCurso ?>" max="100"></progress>
                                    <a class="btn " href="<?= URL_BASE ?>/curso/<?= $cursos[$i]["slugCurso"] ?>">Ir para o curso</a>
                                </div>
                            </div>
                        </div>


                    <?php endfor; ?>
                <?php endforeach; ?>

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