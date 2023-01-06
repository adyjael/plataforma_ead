<?php

namespace App\Models;

use PDO;

class Cursos extends Model
{

    public function getCursoMatriculadoByAlunoId($idAluno)
    {

        $query = $this->conn->prepare("SELECT * FROM aluno_matricula WHERE idAluno = ?  ");
        $query->execute(array($idAluno));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($resultados > 0) {
            $resultadosCursos = [];
            foreach ($resultados as $cursos) {
                array_push($resultadosCursos, $this->getCursoById($cursos["idCurso"]));
            }
            return $resultadosCursos;
        } else {
            return false;
        }
    }

    public function adicionarCurso($titulo, $descricao, $duracao, $preco, $imagem, $idProfessor)
    {
        $slugCurso = explode(" ", $titulo);
        $slugCurso = implode("-", $slugCurso);
        $slugCurso = strtolower($slugCurso);
        $slugCurso = str_replace("?", "", $slugCurso);
        $query = $this->conn->prepare("INSERT INTO cursos (tituloCurso,descricaoCurso,duracaoCurso,precoCurso,slugCurso,fotoCurso,idProfessor)
                                        VALUES(?,?,?,?,?,?,?)");
        $query->execute(array($titulo, $descricao, $duracao, $preco, $slugCurso, $imagem, $idProfessor));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }


    public function getCursoById($idCurso)
    {
        $query = $this->conn->prepare("SELECT * FROM cursos WHERE idCurso = ? ORDER BY idCurso DESC");
        $query->execute(array($idCurso));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($resultados > 0) {
            return $resultados;
        } else {
            return false;
        }
    }

    public function verificarAlunoIncrito($idAluno, $idCurso)
    {
        $query = $this->conn->prepare("SELECT * FROM aluno_matricula WHERE idCurso = ? AND idAluno = ?");
        $query->execute(array($idCurso, $idAluno));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($resultados > 0) {
            return $resultados;
        } else {
            return false;
        }
    }

    public function listarCurso()
    {
        $query = $this->conn->prepare("SELECT * FROM cursos");
        $query->execute();
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($resultados > 0) {
            return $resultados;
        } else {
            return false;
        }
    }

    public function getCursoBySlug($slug)
    {

        $query = $this->conn->prepare("SELECT * FROM cursos WHERE slugCurso = ?");
        $query->execute(array($slug));
        $resultados = $query->fetch(PDO::FETCH_ASSOC);
        if ($resultados > 0) {
            return $resultados;
        } else {
            return false;
        }
    }

    public function increverAlunoNoCurso($idAluno, $idCurso, $idProfessor)
    {
        $query = $this->conn->prepare("INSERT INTO aluno_matricula (idAluno,idCurso,idProfessor) VALUES (?,?,?)");
        $query->execute(array($idAluno, $idCurso, $idProfessor));
    }


    public function selecionarAlunosNocurso($idCurso)
    {
        //SELECT idAluno FROM aluno_matricula WHERE idCurso = 6;
        $query = $this->conn->prepare("SELECT idAluno FROM aluno_matricula WHERE idCurso = ?");
        $query->execute(array($idCurso));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($resultados > 0) {
            return $resultados;
        } else {
            return 0;
        }
    }

    public function atualizarCurso($idCurso, $titulo, $duracao, $descricao, $preco)
    {
        $slugCurso = explode(" ", $titulo);
        $slugCurso = implode("-", $slugCurso);
        $slugCurso = strtolower($slugCurso);
        $slugCurso = str_replace("?", "", $slugCurso);

        $query = $this->conn->prepare("UPDATE cursos SET tituloCurso = ?,slugCurso = ?, duracaoCurso = ?, descricaoCurso = ?, precoCurso = ? WHERE idCurso = ?");
        $query->execute(array($titulo, $slugCurso, $duracao, $descricao, $preco, $idCurso));
    }


    public function apagarCurso($idCurso)
    {
        $this->deleteMatricula($idCurso);
        $this->deleteComentario($idCurso);
        $query = $this->conn->prepare("DELETE FROM cursos WHERE idCurso = ? ");
        $query->execute(array($idCurso));
    }



    public function deleteComentario($idCurso)
    {

        $query = $this->conn->prepare("DELETE FROM comentarios WHERE idCurso = ? ");
        $query->execute(array($idCurso));
    }
    public function deleteMatricula($idCurso)
    {
        $query = $this->conn->prepare("DELETE FROM aluno_matricula WHERE idCurso = ? ");

        $query->execute(array($idCurso));
    }
}
