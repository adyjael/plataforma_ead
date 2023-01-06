



    <div class="site">


        <!-- Home do site -->
        <div class="base-geral">
            <div class="caixa">
                <h2 class="titulo"><span class="case"><i class="fa-solid fa-user ico perfil"></i> Meu perfil</span> Alterar dados do perfil</h2>
            </div>

            <div class="base-home">
                <div class="rows base-perfil">
                    <div class="caixa">
                        <form action="">
                            <fieldset class="alt-mob">
                                <legend>Dados do usuario</legend>
                                <div class="rows">
                                <div class="cel4">
                                    <label>Foto do perfil</label>
                                    <div class="thumb">
                                        
                                        <img width="60px" src="<?= URL_BASE ?>/public/assets/img/user-default.jpg" alt="">
                                        <input type="file">
                                    </div>
                                    <small>Tamanho da imagem: 220px altura X 220px largura</small>
                                </div>

                                <div class="cel6">
                                    <div class="cel12">
                                        <label>Nome</label>
                                        <input type="text" name="" id="" value="<?= $alunoLogado["nomeAluno"] ?>">
                                    </div>
                                    <div class="cel12">
                                        <label>Email</label>
                                        <input type="text" name="" id=""value= "<?= $alunoLogado["emailAluno"]?>" >
                                    </div>
                                    <div class="cel12">
                                        <label>Senha</label>
                                        <input type="text" name="" id="" placeholder="senha">
                                    </div>
                                </div>
                                </div>

                            </fieldset>


                            <fieldset class="">
                                <legend>Dados do Pessoais</legend>
                                <div class="rows">
                                    <div class="cel3">
                                        <label>CPF</label>
                                        <input type="text" name="" id="" placeholder="CPF">
                                    </div>
                                    <div class="cel3">
                                        <label>Data de nascimento</label>
                                        <input type="text" name="" id="" placeholder="Data de nascimento">
                                    </div>
                                    <div class="cel3">
                                        <label>Telefone</label>
                                        <input type="text" name="" id="" placeholder="telefone">
                                    </div>
                                    <div class="cel3">
                                        <label>Profissão</label>
                                        <input type="text" name="" id="" placeholder="Profissão">
                                    </div>
                                </div>

                            </fieldset>

                            
                            <fieldset>
                                <legend>Endereços</legend>
                                <div class="rows">
                                    <div class="cel4">
                                        <label>Bairo</label>
                                        <input type="text" name="" id="" placeholder="Bairo">
                                    </div>
                                    <div class="cel4">
                                        <label>Cidade</label>
                                        <input type="text" name="" id="" placeholder="Cidade">
                                    </div>
                                    <div class="cel4">
                                        <label>Rua</label>
                                        <input type="text" name="" id="" placeholder="Rua">
                                    </div>
                                </div>
                                <div class="rows">
                                    <div class="cel3">
                                        <label>Estado</label>
                                        <input type="text" name="" id="" placeholder="Estado">
                                    </div>
                                    <div class="cel3">
                                        <label>cep</label>
                                        <input type="text" name="" id="" placeholder="cep">
                                    </div>
                                    <div class="cel4">
                                        <label>Complemento</label>
                                        <input type="text" name="" id="" placeholder="cep">
                                    </div>
                                    <div class="cel2">
                                        <label>Numero</label>
                                        <input type="text" name="" id="" placeholder="Numero">
                                    </div>
                                </div>

                            </fieldset>
                            
                            <input class="btn" type="submit" name="" id="" value="Atualizar perfil">

                        </form>
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