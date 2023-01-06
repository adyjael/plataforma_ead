<?php

use App\Models\Aulas;

$aulaAssitida = new Aulas;
?>

<div class="site">


    <!-- Home do site -->
    <div class="base-geral">
        <div class="caixa">
            <h2 class="titulo"><span class="case"><i class="fa-solid fa-desktop ico"></i> <?= $curso["tituloCurso"] ?></span>
                <?= strtolower($curso["tituloCurso"]) ?> > <?= strtolower($aula["tituloAula"]) ?> </h2>
        </div>
        <!-- Area de videos -->
        <div class="base-home">
            <div class="rows base-curso ver_videos">

                <div class="cel8">
                    <div class="caixa">
                        <span class="titulo2"><?= $aula["tituloAula"] ?></span>
                        <div class="caixa-video">
                            <div style="position: relative;height: 0;padding-bottom: 54.84%;">
                                <iframe style="position: absolute;width: 100%;height: 100%;left: 0;" width="656" height="360px" src="https://www.youtube.com/embed/<?= $aula["embedAula"] ?>" title="<?= $aula["tituloAula"] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="controles">
                                <?php if ($aulaAnterior == false) : ?>
                                    <a href="javascript:void(0)" class="btn anterior">Anterior</a>
                                <?php else : ?>
                                    <a href="<?= URL_BASE . "/painel/professor/curso/" . $curso["slugCurso"] . "/aulas/" . $aulaAnterior["slugAula"] ?>" class="btn anterior">Anterior</a>
                                <?php endif; ?>


                                <a href="<?= URL_BASE . "/painel/professor/curso/" . $curso["slugCurso"] . "/aulas/" . $aula["slugAula"] ?>/proxima" class="btn proximo">Proximo</a>


                                <!--                                 
                                <?php if ($proximaAula == false) : ?>
                                    <a href="javascript:void(0)" class="btn proximo">Proximo</a>
                                <?php else : ?>
                                <?php endif; ?> -->




                            </div>
                        </div>
                    </div>

                    <div class="rows v-downloads">
                        <div class="caixa">
                            <span class="titulo2">Descrição aula</span>
                            <p>
                                <?= $aula["descricaoAula"] ?>
                            </p>
                        </div>
                    </div>

                    <div class="rows comemtarios">
                        <div class="caixa">
                            <span class="titulo2">Comentarios</span>
                            <form action="<?= URL_BASE ?>/comentar" method="POST">
                                <input type="hidden" value="<?= $curso["idCurso"] ?> " name="curso">
                                <input type="hidden" value="<?= $aula["idAula"] ?> " name="aula">
                                <textarea name="comentario" id="" cols="30" placeholder="Deixe o seu comentrio" rows="10"></textarea>
                                <input type="submit" class="btn" name="" value="Enviar">
                            </form>
                        </div>
                    </div>

                </div>

                <!-- SIDEBAR -->
                <div class="cel3">
                    <div class="menu-sidebar">
                        <div class="caixa">

                            <span class="titulo2">Lista de aul\as</span>
                            <div class="scroll-lista">
                                <ul>

                                    <?php foreach ($listaAulas as $aulas) : ?>

                                        <li class="naomarcado">
                                            <a href="<?= URL_BASE . "/painel/professor/curso/" . $curso["slugCurso"] ?>/aulas/<?= $aulas["slugAula"] ?>">
                                                <?= $aulas["tituloAula"] ?> </a>
                                        </li>
                                        <!-- <li class="marcado"><a href="#">Apresentação do curso</a></li> -->

                                    <?php endforeach; ?>
                                </ul>
                            </div>
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