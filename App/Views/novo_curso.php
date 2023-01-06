<?php

use App\Models\Cursos;

$alunosNocursos = new Cursos;

?>




<div class="site">



    <!-- Home do site -->
    <div class="base-geral">
        <div class="caixa">
            <h2 class="titulo"><span class="case"><i class="fa-solid fa-house ico"></i>Painel Admim</span> Criar/editar/apagar cursos </h2>
        </div>


        <div class="base-home">

            <div class="caixa d-flex" style="margin-top: 20px;">
                <button class="btn" id="btnAddCurso">Adicionar Curso</button>
                <button class="btn" id="btnAddAula">Adicionar aula</button>
            </div>
            <div class="caixa" style="margin-top: 20px;">
                <small id="msg" class="red"></small>
                <small id="msgG" class="verde"></small>
                <form action="#" class="rows" id="novoCurso" style="display: none;" enctype="multipart/form-data">
                    <div class="cel4">
                        <label for="tituloCurso">Nome do curso</label>
                        <input type="text" name="titulo" placeholder="Digite o nome do seu Curso">
                    </div>
                    <div class="cel4">
                        <label for="descricao">Preco</label>
                        <input type="text" name="preco" placeholder="Se for gratis digite 0">
                    </div>
                    <div class="cel4">
                        <label for="duracao">Duração do curso</label>
                        <input type="text" name="duracao" placeholder="ex: 17h30min">
                    </div>
                    <div class="cel10" style="margin-left: 0 !important;width:100% !important;">
                        <label for="duracao">Imagem</label>
                        <input type="file" name="imagem" id="imagem">
                    </div>
                    <div class="cel10" style="margin-left: 0 !important;width:100% !important;">
                        <label for="descricao">Descrição</label>
                        <textarea name="descricao" id="descricao" placeholder="Fale sobre o seu curso" cols="30" rows="10"></textarea>
                    </div>
                    <button class="btn">Adicionar curso</button>
                </form>


                <!-- ------------------------------------------FORMULARIO DE ADICIONAR AULA------------------------------------------------------------------------------ -->
                <small id="msg" class="red"></small>
                <small id="msgG" class="verde"></small>
                <form action="#" class="rows" id="novaAula" style="display: none;">
                    <div class="cel4">
                        <label for="tituloCurso">Titulo da aula</label>
                        <input type="text" name="titulo"  placeholder="Digite o titulo da aula">
                    </div>
                    <div class="cel4">
                        <label for="descricao">Curso</label>
                        <select name="idCurso" id="idCurso">
                            <option value="0">Selecione o curso</option>

                            <?php foreach ($cursos as $curso) : ?>

                                <option value="<?= $curso["idCurso"] ?>"><?= $curso["tituloCurso"] ?></option>

                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="cel4">
                        <label for="duracao">Duração da aula</label>
                        <input type="text" name="duracao" placeholder="ex: 20min">
                    </div>
                    <div class="cel10" style="margin-left: 0 !important;">
                        <label for="ordem">Ordem</label>
                        <input type="text" name="ordem" placeholder="ex: 1-primaira aula , 3-terceira aula">
                    </div>
                    <div class="cel10" style="margin-left: 0 !important;">
                        <label for="embad">Embad da aula</label>
                        <input type="text" name="embad" id="embad" placeholder="https://www.youtube.com/watch?v=EEtMT3kv2TE o embad é o que fica a frete do v=">
                    </div>
                    <div class="cel10" style="margin-left: 0 !important;width:100% !important;">
                        <label for="descricao">Descrição da aula</label>
                        <textarea name="descricao" id="descricao" placeholder="OPICIONAL" cols="30" rows="10"></textarea>
                    </div>
                    <button class="btn">Adicionar aula</button>
                </form>

                <!-- FORM EDITAR CURSO --------------------- -->

                <h2 class="cel10" id="tteditarCurso" style="display: none;margin-left:0 !important;" ></h2>
                <form action="#" class="rows" id="editarCurso" style="display: none;">
                <input type="hidden" id="idCurso">
                    <div class="cel4" style="margin-left:0 !important;">
                        <label for="tituloCurso">Nome do curso</label>
                        <input type="text" id="titulo" placeholder="Digite o nome do seu Curso">
                    </div>
                    <div class="cel4" >
                        <label for="descricao">Preco</label>
                        <input type="text" id="preco" placeholder="Se for gratis digite 0">
                    </div>
                    <div class="cel4" >
                        <label for="duracao">Duração do curso</label>
                        <input type="text" id="duracao" placeholder="ex: 17h30min">
                    </div>
                    
                    <div class="cel10" style="margin-left: 0 !important;width:100% !important;">
                        <label for="descricao">Descrição</label>
                        <textarea name="descricao" id="descricao" placeholder="Fale sobre o seu curso" cols="30" rows="10"></textarea>
                    </div>
                    <button class="btn" id="btnAtualizarCurso">Atualizar curso</button>
                </form>




            </div>

            <div class="caixa" style="margin-top: 20px;">
                <h3>Meus cursos</h3>

                <div class="lista">
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Alunos inscritos</th>
                                <th>Publicado</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($cursos as $curso) : ?>

                                <tr>
                                    <td> <a href="<?= URL_BASE . "/painel/professor/curso" ?>/<?= $curso["slugCurso"] ?>"><?= $curso["tituloCurso"] ?></a></td>
                                    <td><?= $alunosNocursos->selecionarAlunosNocurso($curso["idCurso"])
                                            ?  sizeof($alunosNocursos->selecionarAlunosNocurso($curso["idCurso"])) : 0 ?></td>
                                    <td><?= date("d/m/Y", strtotime($curso["dataCurso"])) ?> </td>
                                    <td>
                                        <form action="#" id="formEditCurso">
                                            <input type="hidden" name="idCurso" id="idCurso" value="<?= $curso["idCurso"] ?>">
                                            <button class="editarCurso" style="border: none;font-size:18px; cursor:pointer;margin-left:2px;"><i class="fa-regular fa-pen-to-square verde"></i></button>
                                            <button class="btnApagarCurso" style="border: none;font-size:18px; cursor:pointer;"><i class="fa-solid fa-trash-can red"></i></button>
                                        </form>
                                    </td>
                                </tr>

                            <?php endforeach; ?>



                        </tbody>
                    </table>
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