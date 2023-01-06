<div class="site">



    <!-- Home do site -->
    <div class="base-geral">
        <div class="caixa">
            <h2 class="titulo"><span class="case"><i class="fa-solid fa-house ico"></i>Painel Admim</span> Seja bem vindo
                ao seu painel </h2>
        </div>

        <div class="base-home">
            <div class="rows detalhes">
                <div class="cel4">
                    <figure class="caixa">
                        <div class="thumb"><img width="" src="https://upload.wikimedia.org/wikipedia/en/d/d5/Professor_%28Money_Heist%29.jpg" alt=""></div>
                        <figcaption>
                            <strong>Professor</strong>
                            <small><b>Mestre em programação</b></small>
                            <small>professor@gmail.com</small>
                        </figcaption>
                    </figure>
                </div>
                <div class="cel9">
                    <div class=" cel4">
                        <div class="caixa">
                            <i class="fa-solid fa-play ico"></i>
                            <small>Cursos criados</small>
                            <h3><?= count($cursosCriados) ?></h3>
                        </div>
                    </div>
                    <div class="cel4">
                        <div class="caixa">
                            <i class="fa-regular fa-square-check ico"></i>
                            <small>Total alunos</small>
                            <h3><?= $meusAlunos? count($meusAlunos):0  ?></h3>
                        </div>
                    </div>
                    <div class="cel4">
                        <div class="caixa">
                            <i class="fa-solid fa-play ico"></i>
                            <small>Exercicios criados</small>
                            <h3>0</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CURSOS MATRICULADOS -->
            <div class="rows listagem">
                <div class="cel6 matriculados">
                    <div class="caixa">
                        <span class="titulo2">Cursos criados</span>
                        <div class="rolagem">
                            <div class="lista">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <th>Curso</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($cursosCriados != false) : ?>
                                            <?php foreach ($cursosCriados as $curso) : ?>
                                                <tr>
                                                    <td> <a href="<?= URL_BASE ?>/painel/professor/curso/<?= $curso["slugCurso"] ?>"><?= $curso["tituloCurso"] ?></a></td>
                                                    <td><?= date("d/m/Y", strtotime($curso["dataCurso"])) ?></td>
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


                <div class="cel6">
                    <div class="caixa">
                        <span class="titulo2">Meus alunos</span>
                        <div class="rolagem">
                            <div class="lista">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <th width="75%">Nome</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($meusAlunos != false) : ?>

                                            <?php foreach ($meusAlunos as $alunos) : ?>

                                                <tr>
                                                    <td> <a href="javascript:void(0)"><?= $alunos["nomeAluno"] ?></a></td>
                                                    <td><?= date("d/m/Y", strtotime($alunos["dataMatricula"]))?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <a href="meus_curso.html" class="btn btn-curso">Ver meus cursos</a> -->
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


































<!-- 
    <h1>Adicionar curso</h1>

<form action="<?= URL_BASE ?>/painel/adicionarCurso" method="post">
    <div>
        <label for="">Titulo</label>
        <input type="text" name="titulo">
    </div>
    <div>
        <label for="">Descrição</label>
        <input type="text" name="descricao" id="">
    </div>
    <div>
        <label for="">Precço</label>
        <input type="text" name="preco">
    </div>
    <div>
        <label for="">Duração</label>
        <input type="text" name="duracao">
    </div>

    <button>Adicionar</button>
</form> -->