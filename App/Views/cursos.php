<?php

use App\Models\Aulas;
use App\Models\Cursos;

$aulas = new Aulas;
$cursosInscritos = new Cursos;
?>

<div class="site">

    <!-- Home do site -->
    <div class="base-geral">
        <div class="caixa">
            <h2 class="titulo"><span class="case"><i class="fa-solid fa-desktop ico"></i> Cursos</span>Lista de
                cursos</h2>
        </div>

        <div class="base-home">
            <div class="rows cursos">
<!--  -->
                <?php foreach ($cursos as $curso) : ?>


                    <div class="cel3">
                        <div class="caixa">
                            <div><img src="<?= URL_BASE ?>/<?= $curso["fotoCurso"] ?>" alt=""></div>
                            <div class="del-cursos">
                                <p><?= strtoupper($curso["tituloCurso"]) ?></p>
                                <small>Desenpenho <b>0%</b></small>
                                <progress value="0" max="100"></progress>
                                <a class="btn " href="<?= URL_BASE ?>/curso/<?= $curso["slugCurso"] ?>">Ir para o curso</a>
                            </div>
                        </div>
                    </div>

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