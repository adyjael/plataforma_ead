<?php

namespace App\Controllers;


use App\Models\Alunos;
use App\Models\Aulas;
use App\Models\Cursos;

class DasboardController extends web
{

    public function index()
    {

        if (!Alunos::logado()) {
            header("location:" . URL_BASE . "/login");
            return;
        }

        $cursos = new Cursos;
        $aulas = new Aulas;
        $cursosMatriculados = $cursos->getCursoMatriculadoByAlunoId($_SESSION["aluno"]);
        $aulasAssistida = $aulas->getAulaAssitidaByAluno($_SESSION["aluno"]);
        $this->view([
            "header",
            "dashboard"
        ], [
            "titulo" => "Dashboard",
            "cursosMatriculados" => $cursosMatriculados,
            "aulasAssistida" => $aulasAssistida,
        ]);
    }

    public function allCursos()
    {

        if (!Alunos::logado()) {
            header("Location:" . URL_BASE . "/login");
            return;
        }

        $cursos = new Cursos;
        $this->view([
            "header",
            "cursos"
        ], [
            "titulo" => "Cursos",
            "cursos" => $cursos->listarCurso(),
        ]);
    }


    public function verCurso($data)
    {
        if (!Alunos::logado()) {
            header("Location:" . URL_BASE . "/login");
            return;
        }

        $cursos = new Cursos;
        $aulas = new Aulas;

        if (!$cursos->getCursoBySlug($data["slugCurso"])) {
            return false;
        }
        $curso = $cursos->getCursoBySlug($data["slugCurso"]);
        $aulasDoCurso = $aulas->ListarAulasNoCursoById($curso["idCurso"]);
        $alunoInscrito = $cursos->verificarAlunoIncrito($_SESSION["aluno"], $curso["idCurso"]);
        $totalAulasAssistida = $aulas->getAulaAssitida($_SESSION["aluno"], $curso["idCurso"]);
        $progressoCurso = (count($totalAulasAssistida) / count($aulasDoCurso) * 100);

        $this->view([
            "header",
            "verCurso"
        ], [
            "titulo" => $curso["tituloCurso"],
            "curso" => $curso,
            "aulas" => $aulasDoCurso,
            "inscrito" => $alunoInscrito,
            "progressoCurso" => $progressoCurso,
        ]);
    }


    public function increver($data)
    {
        if (!Alunos::logado()) {
            header("Location:" . URL_BASE . "/login");
            return;
        }

        $cursos = new Cursos;
        $cursos->increverAlunoNoCurso($data["idAluno"], $data["idCurso"], $data["idProfessor"]);
        header("Location:" . URL_BASE . "/curso/" . $data["slugCurso"]);
    }

    public function meusCursos()
    {
        if (!Alunos::logado()) {
            header("Location:" . URL_BASE . "/login");
            return;
        }
        $alunos = new Alunos;
        $meusCursos = $alunos->meusCursos($_SESSION["aluno"]);

        if (count($meusCursos) < 1) {
            $this->view([
                "header",
                "nao_matriculado",
            ], [
                "titulo" => "Meus Cursos",
                "meusCursos" => $meusCursos,
            ]);
        } else {
            $this->view([
                "header",
                "meus_cursos",
            ], [
                "titulo" => "Meus Cursos",
                "meusCursos" => $meusCursos,
            ]);
        }
    }

    public function aulas($data)
    {
        if (!Alunos::logado()) {
            header("Location:" . URL_BASE . "/login");
            return;
        }

        $aulas = new Aulas;
        $cursos = new Cursos;
        $aulaAtual =  $aulas->getAulaByslug($data["slugAula"]);
        $cursoAtual = $cursos->getCursoById($aulaAtual["idCurso"])[0];
        $aulasDoCurso = $aulas->ListarAulasNoCursoById($cursoAtual["idCurso"]);
        $aulaAnterior = ($aulas->getAulaAnterior($aulaAtual["ordem"]));




        $this->view([
            "header",
            "aula",
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
        $cursos = new Cursos;
        $aulaAtual =  $aulas->getAulaByslug($data["slugAula"]);
        $cursoAtual = $cursos->getCursoById($aulaAtual["idCurso"])[0];
        $proximaAula =  $aulas->getProximaAula($aulaAtual["idAula"], $cursoAtual["idCurso"], $aulaAtual["ordem"]);

        if ($proximaAula == false) {
            if ($aulas->verificarAulaAssitida($aulaAtual["idAula"], $_SESSION["aluno"])) {
                $aulas->atualizarAulasAssistida($aulaAtual["idAula"], $_SESSION["aluno"]);
            } else {
                $aulas->setAulasAssitidas($aulaAtual["idAula"], $cursoAtual["idCurso"], $_SESSION["aluno"]);
            }
            header("Location:" . URL_BASE . "/curso/" . $data["slugCurso"] . "/aulas");
        } else {
            header("Location:" . URL_BASE . "/" . $data["slugCurso"] . "/aulas/" . $proximaAula["slugAula"]);
        }
    }


    public function meusComentario($data)
    {
        $aulas = new Aulas;
        $comentarios = $aulas->getComentarios($_SESSION["aluno"]);


        $this->view([
            "header",
            "comentario"
        ], [
            "comentarios" => $comentarios
        ]);
    }

    public function comentar($data)
    {
        //dd($data);
        $aulas = new Aulas;
        $aulas->setComentarios($_SESSION["aluno"], $data["curso"], $data["aula"], $data["comentario"]);
        header("Location: " . URL_BASE . "/comentario");
    }

    public function perfil()
    {

        $alunos = new Alunos;
        $alunoLogado = $alunos->getAluno($_SESSION["aluno"])[0];


        $this->view(
            [
                "header",
                "perfil"
            ],
            [
                "titulo" => "Minha conta | " . $alunoLogado["nomeAluno"],
                "alunoLogado" => $alunoLogado,
            ]
        );
    }

    public function notFound($data)
    {
        var_dump($data["errcode"]);
    }
}
