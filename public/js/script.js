$(function () {
    const URL_BASE = "http://localhost/plataforma_ead";


    $(".menu-m").click(function () {
        $("#menu .menu-lateral").slideToggle();
        return false;
    })

    $(".menu-grade").click(function () {
        $("#grade .menu-topo").slideToggle();
        return false;
    })



    $("#btnLoginAluno").click(function (e) {
        e.preventDefault();

        var emailAluno = $("#emailAluno").val();
        var senhaAluno = $("#senhaAluno").val();

        $.ajax({
            url: URL_BASE + "/login/aluno",
            type: "POST",
            data: {
                type: "login",
                emailAluno: emailAluno,
                senhaAluno: senhaAluno,
            },

            success: function (response) {
                if (response) {
                    window.location = URL_BASE + "/dashboard";
                } else {
                    $("#msg").html("Dados invalidos")
                }
            }
        })
    })

    $("#btnLoginProfessor").click(function (e) {
        e.preventDefault();

        var emailprofessor = $("#emailProfessor").val();
        var senhaprofessor = $("#senhaProfessor").val();

        $.ajax({
            url: URL_BASE + "/login/professor",
            type: "POST",
            data: {
                type: "loginProfessor",
                emailprofessor: emailprofessor,
                senhaprofessor: senhaprofessor,
            },

            success: function (response) {
                if (response) {
                    window.location = URL_BASE + "/painel/professor";
                } else {
                    alert("Dados Invalidos");
                }
            }
        })


    })


    $("#btnAddAula").click(function () {
        $("#novoCurso").hide()
        $("#novaAula").show()
        $("#editarCurso").hide();
    })
    $("#btnAddCurso").click(function () {
        $("#novoCurso").show()
        $("#novaAula").hide()
        $("#editarCurso").hide();
    })



    $("#novoCurso").submit(function (e) {
        e.preventDefault();
        var formulario = document.getElementById("novoCurso")
        var formData = new FormData(formulario)


        $.ajax({
            url: URL_BASE + "/painel/adicionarCurso",
            type: "POST",
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (retorno) {
                if (retorno.erro) {
                    alert(retorno.msg);
                } else {
                    document.location.reload(true);

                }
            }
        });

    })

    $("#novaAula").submit(function (e) {
        e.preventDefault();
        var formulario = document.getElementById("novaAula")
        var formData = new FormData(formulario)


        $.ajax({
            url: URL_BASE + "/painel/adicionarAula",
            type: "POST",
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (retorno) {
                alert("Nova aula adicionada");
                document.location.reload(true);

            }
        });


    })



    $(".editarCurso").on("click", function (e) {
        e.preventDefault();
        var formControll = this.parentElement;
        var idCurso = formControll.querySelector("#idCurso").value;
        $('html, body').animate({ scrollTop: 300 })


        $.ajax({
            url: URL_BASE + "/painel/editarCurso",
            type: "POST",
            data: {
                idCurso: idCurso,
            },
            dataType: "JSON",

            success: function (response) {

                $("#novoCurso").hide()
                $("#novaAula").hide()
                $("#editarCurso").show();
                $("#tteditarCurso").show();
                $("#tteditarCurso").html("Editar o curso de " + response.tituloCurso)
                var titulo = document.querySelector("#editarCurso #titulo");
                var preco = document.querySelector("#editarCurso #preco");
                var duracao = document.querySelector("#editarCurso #duracao");
                var descricao = document.querySelector("#editarCurso #descricao");
                var idCurso = document.querySelector("#editarCurso #idCurso");

                titulo.value = response.tituloCurso;
                preco.value = response.precoCurso;
                duracao.value = response.duracaoCurso;
                descricao.value = response.descricaoCurso;
                idCurso.value = response.idCurso
            }
        })

    })


    $(".editarAula").on("click", function (e) {
        e.preventDefault();
        var formControll = this.parentElement;
        var idAula = formControll.querySelector("#idAula").value;
        $('html, body').animate({ scrollTop: 300 })
        $("#showFormEdtiCurso").show();

        $.ajax({
            url: URL_BASE + "/painel/editarAula",
            type: "POST",
            data: {
                idAula: idAula,
            },
            dataType: "JSON",

            success: function (response) {


                var titulo = document.querySelector("#formEditAula #titulo");
                var duracao = document.querySelector("#formEditAula #duracao");
                var descricao = document.querySelector("#formEditAula #descricao");
                var ordem = document.querySelector("#formEditAula #ordem");
                var video = document.querySelector("#formEditAula #embedAula");
                var idAula = document.querySelector("#formEditAula #idAula");

                titulo.value = response.tituloAula;
                duracao.value = response.duracaoAula;
                descricao.value = response.descricaoAula;
                ordem.value = response.ordem
                video.value = response.embedAula;
                idAula.value = response.idAula;
            }
        })

    })



    $("#btnAtualizarAula").on("click", function (e) {
        e.preventDefault();
        var titulo = document.querySelector("#formEditAula #titulo").value;
        var duracao = document.querySelector("#formEditAula #duracao").value;
        var descricao = document.querySelector("#formEditAula #descricao").value;
        var ordem = document.querySelector("#formEditAula #ordem").value;
        var video = document.querySelector("#formEditAula #embedAula").value;
        var idAula = document.querySelector("#formEditAula #idAula").value;
        $.ajax({
            url: URL_BASE + "/painel/atualizarAula",
            type: "POST",
            data: {
                titulo: titulo,
                duracao: duracao,
                descricao: descricao,
                ordem: ordem,
                video: video,
                idAula: idAula
            },
            dataType: 'json',
            success: function (response) {
                alert(response.msg);
                document.location.reload(true)
            }
        })


    })
    $("#btnAtualizarCurso").on("click", function (e) {
        e.preventDefault();
        var titulo = document.querySelector("#editarCurso #titulo").value;
        var preco = document.querySelector("#editarCurso #preco").value;
        var duracao = document.querySelector("#editarCurso #duracao").value;
        var descricao = document.querySelector("#editarCurso #descricao").value;
        var idCurso = document.querySelector("#editarCurso #idCurso").value;
        $.ajax({
            url: URL_BASE + "/painel/atualizarCurso",
            type: "POST",
            data: {
                titulo: titulo,
                duracao: duracao,
                descricao: descricao,
                idCurso: idCurso,
                preco: preco
            },
            dataType: 'json',
            success: function (response) {
                alert(response.msg);
                document.location.reload(true)
            }
        })

    })


    $(".btnApagarCurso").on("click", function (e) {
        e.preventDefault();
        var formControll = this.parentElement;
        var idCurso = formControll.querySelector("#idCurso").value;
        var pergunta = confirm("Tem certesa que quer apagar esse curso?")
        if (pergunta) {
            $.ajax({
                url: URL_BASE + "/painel/apagarCurso",
                type: "POST",
                data: {
                    idCurso: idCurso,
                },
                dataType: 'json',
                success: function (response) {
                    alert(response.msg);
                    document.location.reload(true)
                }
            })
        }
    })

    $(".btnApagarAula").on("click", function (e) {
        e.preventDefault();
        var formControll = this.parentElement;
        var idAula = formControll.querySelector("#idAula").value;
        var pergunta = confirm("Tem certesa que quer apagar essa aula?")
        if (pergunta) {
            $.ajax({
                url: URL_BASE + "/painel/apagarAula",
                type: "POST",
                data: {
                    idAula: idAula,
                },
                dataType: 'json',
                success: function (response) {
                    alert(response.msg);
                    document.location.reload(true)
                }
            })
        }
    })






});