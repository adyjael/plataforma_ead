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
                                        <span>5 aulas</span>
                                    </li>
                                </ul>



                            </div>

                        </div>
                    </div>


                    <div class="caixa" id="showFormEdtiCurso" style="margin-top: 20px;display:none;">

                        <form action="#" class="rows" id="formEditAula">
                            <input type="hidden" id="idAula">
                            <div class="cel6" style="margin-left: 0 !important;">
                                <label for="tituloCurso">Titulo da aula</label>
                                <input type="text" id="titulo" placeholder="Digite o titulo da aula">
                            </div>
                            <div class="cel4">
                                <label for="duracao">Duração da aula</label>
                                <input type="text" id="duracao" placeholder="ex: 20min">
                            </div>
                            <div class="cel10" style="margin-left: 0 !important;">
                                <label for="ordem">Ordem</label>
                                <input type="text" id="ordem" placeholder="ex: 1-primaira aula , 3-terceira aula">
                            </div>
                            <div class="cel10" style="margin-left: 0 !important;">
                                <label for="embad">Embad da aula</label>
                                <input type="text" id="embedAula">
                            </div>
                            <div class="cel10" style="margin-left: 0 !important;width:100% !important;">
                                <label for="descricao">Descrição da aula</label>
                                <textarea id="descricao" id="descricao" cols="30" rows="10"></textarea>
                            </div>
                            <button class="btn" id="btnAtualizarAula">Atualizar aula</button>
                        </form>
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
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php if ($aulas != null) : ?>
                                            <?php foreach ($aulas as $aula) : ?>
                                                <tr>
                                                    <td><a href="<?= URL_BASE . "/painel/professor/curso/" . $curso["slugCurso"] . "/aulas/" . $aula["slugAula"] ?>"><i class="fa-solid fa-play ico"></i><?= $aula["tituloAula"] ?></a></td>
                                                    <td><i class="fa-solid fa-clock ico"></i><?= $aula["duracaoAula"] ?></td>


                                                    <td>
                                                        <form id="">
                                                            <input type="hidden" name="idAula" id="idAula" value="<?= $aula["idAula"] ?>">
                                                            <button class="editarAula" style="border: none;font-size:18px; cursor:pointer;margin-left:2px;"><i class="fa-regular fa-pen-to-square verde"></i></button>
                                                            <button class="btnApagarAula" style="border: none;font-size:18px; cursor:pointer;"><i class="fa-solid fa-trash-can red"></i></button>
                                                        </form>
                                                    </td>


                                                </tr>

                                            <?php endforeach; ?>
                                        <?php else : ?>


                                        <?php endif; ?>




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- SIDBAR -->





                <!-- FOOTER -->
                <div class="base-rodape">
                    <p>CopyRigth - adyjael neto</p>
                </div>
            </div>
            <!-- fecha Home do site -->
        </div>






        </body>

        </html>