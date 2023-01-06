<?php

namespace App\Controllers;

use App\Models\Aulas;
use App\Models\Cursos;
use App\Models\Professor;

class PainelAdmin extends Web
{

    public function index()
    {
        $professor = new Professor;
        $cursosCriados = $professor->meusCursos($_SESSION["professor"]);
        $meusAlunos = $professor->selecionarMeusAlunos($_SESSION["professor"]);

        $this->view([
            "headerProfessor",
            "admin"
        ], [
            "titulo" => "Painel do professor",
            "cursosCriados" => $cursosCriados,
            "meusAlunos" => $meusAlunos,
        ]);
    }


    public function verCurso($data)
    {
        $cursos = new Cursos;
        $aulas = new Aulas;

        if (!$cursos->getCursoBySlug($data["slugCurso"])) {
            return false;
        }
        $curso = $cursos->getCursoBySlug($data["slugCurso"]);
        $aulasDoCurso = $aulas->ListarAulasNoCursoById($curso["idCurso"]);


        $this->view([
            "headerProfessor",
            "admim_curso"
        ], [
            "titulo" => $curso["tituloCurso"],
            "curso" => $curso,
            "aulas" => $aulasDoCurso,
        ]);
    }

    public function verAulas($data)
    {
        $aulas = new Aulas;
        $cursos = new Cursos;
        $aulaAtual =  $aulas->getAulaByslug($data["slugAula"]);
        $cursoAtual = $cursos->getCursoById($aulaAtual["idCurso"])[0];
        $cursoAtual = $cursos->getCursoById($aulaAtual["idCurso"])[0];
        $aulasDoCurso = $aulas->ListarAulasNoCursoById($cursoAtual["idCurso"]);
        $aulaAnterior = ($aulas->getAulaAnterior($aulaAtual["ordem"]));

        $this->view([
            "headerProfessor",
            "admim_aula"
        ], [
            "titulo" => $aulaAtual["tituloAula"],
            "aula" => $aulaAtual,
            "curso" => $cursoAtual,
            "listaAulas" => $aulasDoCurso,
            "aulaAnterior" => $aulaAnterior,
        ]);
    }

    public function proximaAula($data)
    {
        $aulas = new Aulas;
        $professor = new Professor;
        $cursos = new Cursos;
        $aulaAtual =  $aulas->getAulaByslug($data["slugAula"]);
        $cursoAtual = $cursos->getCursoById($aulaAtual["idCurso"])[0];
        $proximaAula =  $professor->proximaAula($cursoAtual["idCurso"], $aulaAtual["ordem"]);

        if ($proximaAula == false) {
            header("Location:" . URL_BASE . "/painel/professor/curso/" . $data["slugCurso"]);
        } else {
            header("Location:" . URL_BASE . "/painel/professor/curso/" . $data["slugCurso"] . "/aulas/" . $proximaAula["slugAula"]);
        }
    }

    public function adicionarCurso($data)
    {

        $titulo = $data["titulo"];
        $preco = $data["preco"];
        $duracao = $data["duracao"];
        $descricao = $data["descricao"];

        $imagem = $_FILES['imagem'];
        //App/Views/$estrutura.php
        $uploads_dir =  'public/assets/imagemCurso/';
        $nome_imagem = $imagem['name'];
        $novo_nome_imagem = uniqid();
        $extensao = strtolower(pathinfo($nome_imagem, PATHINFO_EXTENSION));
        if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg" && $extensao != "webp") {

            echo json_encode(array("erro" => true, "msg" => "Tipo de imagem não aceto"));
            return;
        }
        $path = $uploads_dir . $novo_nome_imagem . "." . $extensao;
        move_uploaded_file($imagem["tmp_name"], $path);

        $curso = new Cursos;
        $curso->adicionarCurso($titulo, $descricao, $duracao, $preco, $path, $_SESSION["professor"]);
        echo json_encode(array("erro" => false));
    }

    public function novoCurso()
    {
        $professor = new Professor;
        $cursos =  $professor->selecionaTodosCursos($_SESSION["professor"]);


        $this->view([
            "headerProfessor",
            "novo_curso"
        ], [
            "cursos" => $cursos,
        ]);
    }

    public function adicionarAula($data)
    {
        $aulas = new Aulas;

        $titulo = $data["titulo"];
        $duracao = $data["duracao"];
        $embed = $data["embad"];
        $idCurso = $data["idCurso"];
        $ordem = $data["ordem"];
        $descricao = $data["descricao"];
        $aulas->adicionarAula($titulo, $descricao, $duracao, $embed, $idCurso, $ordem);
        echo json_encode(array("erro" => false));
    }

    public function comentarios()
    {

        $professor = new Professor;
        $comentarios = ($professor->selecionarComentarios($_SESSION["professor"]));
        // dd($comentarios);
        $this->view([
            "headerProfessor",
            "admin_comentario",
        ], [
            "comentarios" => $comentarios,
        ]);
    }

    public function responderAluno($data)
    {
        // dd($data);
        $professor = new Professor;
        $professor->setResposta($data["idComentario"], $data["idProfessor"], $data["idAluno"], $data["resposta"]);

        header("Location: " . URL_BASE . "/painel/comentarios");
    }

    public function editarCurso($data)
    {
        $curso = new Cursos;
        $editarCurso = $curso->getCursoById($data["idCurso"])[0];
        echo json_encode(($editarCurso));
    }
    public function atualizarCurso($data)
    {
        $curso = new Cursos;
        $titulo = $data["titulo"];
        $duracao = $data["duracao"];
        $descricao = $data["descricao"];
        $idCurso = $data["idCurso"];
        $preco = $data["preco"];
        $curso->atualizarCurso($idCurso, $titulo, $duracao, $descricao, $preco);
        echo json_encode(array("erro" => false, "msg" => "Curso atualizado com successo"));
    }

    public function editarAula($data)
    {
        $aulas = new Aulas;
        echo json_encode(($aulas->getAulaById($data["idAula"])[0]));
    }

    public function atualizarAula($data)
    {
        $aulas = new Aulas;
        $aulas->atualizarAula($data["idAula"], $data["titulo"], $data["duracao"], $data["ordem"], $data["descricao"], $data["video"]);

        echo json_encode(array("erro" => false, "msg" => "Aula atualizada com successo"));
    }

    public function apagarCurso($data)
    {
        $curso = new Cursos;
        $curso->apagarCurso($data["idCurso"]);
        echo json_encode(array("erro" => false, "msg" => "Curso apagado com successo"));
    }
    public function apagarAula($data)
    {
        $aulas = new Aulas;
        $aulas->apagarAula($data["idAula"]);
        echo json_encode(array("erro" => false, "msg" => "Aula apagada com successo"));
    }
}
