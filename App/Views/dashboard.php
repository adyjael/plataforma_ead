<div class="site">


    <!-- Home do site -->
    <div class="base-geral">
        <div class="caixa">
            <h2 class="titulo"><span class="case"><i class="fa-solid fa-house ico"></i>Home</span> Seja bem vindo
            </h2>
        </div>

        <div class="base-home">
            <div class="rows detalhes">
                <div class="cel4">
                    <figure class="caixa">
                        <div class="thumb"><img width="" src="<?= URL_BASE ?>/public/assets/img/user-default.jpg" alt=""></div>
                        <figcaption>
                            <strong>Adyjael neto</strong>
                            <small><b>Em busca do meu sucesso</b></small>
                            <small>adyjaelneto399@gmail.com</small>
                        </figcaption>
                    </figure>
                </div>
                <div class="cel9">
                    <div class=" cel4">
                        <div class="caixa">
                            <i class="fa-solid fa-play ico"></i>
                            <small>Aulas assitidas</small>
                            <h3><?= count($aulasAssistida) ?></h3>
                        </div>
                    </div>
                    <div class="cel4">
                        <div class="caixa">
                            <i class="fa-regular fa-square-check ico"></i>
                            <small>Cursos inscrito</small>
                            <h3><?= count($cursosMatriculados) ?></h3>
                        </div>
                    </div>
                    <div class="cel4">
                        <div class="caixa">
                            <i class="fa-solid fa-play ico"></i>
                            <small>Exercicios Concluido</small>
                            <h3>0</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CURSOS MATRICULADOS -->
            <div class="rows listagem">
                <div class="cel6 matriculados">
                    <div class="caixa">
                        <span class="titulo2">Cursos MATRICULADOS</span>
                        <div class="rolagem">
                            <div class="lista">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <th>Curso</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!$cursosMatriculados) : ?>
                                           
                                        <?php else : ?>
                                            <?php foreach ($cursosMatriculados as $cursos) : ?>
                                                <?php for ($i = 0; $i < count($cursos); $i++) : ?>
                                                    <tr>
                                                        <td> <a href="<?= URL_BASE ?>/curso/<?= $cursos[$i]["slugCurso"]  ?>"><?= $cursos[0]["tituloCurso"] ?></a></td>
                                                    </tr>
                                                <?php endfor; ?>
                                            <?php endforeach; ?>


                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="cel6">
                    <div class="caixa">
                        <span class="titulo2">Ultimas aulas assitidas</span>
                        <div class="rolagem">
                            <div class="lista">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <th width="">Aula</th>
                                            <th>Curso</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if ($aulasAssistida) : ?>
                                            <?php foreach ($aulasAssistida as $aulas) : ?>

                                                <tr>
                                                    <td> <a href="<?= URL_BASE ?>/<?= $aulas["slugCurso"] ?>/aulas/<?= $aulas["slugAula"] ?>"><?= $aulas["tituloAula"] ?></a></td>
                                                    <td> <a href="<?= URL_BASE ?>/curso/<?= $aulas["slugCurso"] ?>"><?= $aulas["tituloCurso"] ?></a></td>
                                                   
                                                </tr>

                                            <?php endforeach; ?>
                                        <?php endif; ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="meus_curso.html" class="btn btn-curso">Ver meus cursos</a>
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