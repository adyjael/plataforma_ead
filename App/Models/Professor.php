<?php

namespace App\Models;

use PDO;
use Symfony\Component\VarDumper\Exception\ThrowingCasterException;

class Professor extends Model
{


    public static function logado()
    {

        if (!isset($_SESSION["professor"]) ||  empty($_SESSION["professor"])) {
            return false;
        }
        return true;
    }

    public function loginProfessor($email, $senha)
    {
        if ($this->verificaEmailExiste($email)) {

            $query = $this->conn->prepare("SELECT * FROM professor WHERE email = ? AND senha = ? LIMIT 1");
            $query->execute(array($email, $senha));
            $resultado = $query->fetch(PDO::FETCH_ASSOC);
            if ($resultado > 0) {

                $_SESSION["professor"] = $resultado["idProfessor"];
                return true;
            } else {
                return false;
            }
        }
    }

    public function verificaEmailExiste($email)
    {

        $query = $this->conn->prepare("SELECT * FROM professor WHERE email = ? LIMIT 1");
        $query->execute(array($email));
        $resultado = $query->fetch(PDO::FETCH_ASSOC);

        if ($resultado < 1) {
            return false;
        }

        return true;
    }

    public function meusCursos($idProfessor)
    {
        $cursos = new Cursos;
        $query = $this->conn->prepare("SELECT * FROM cursos WHERE idProfessor = ? ");
        $query->execute(array($idProfessor));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($resultados > 0) {

            return $resultados;
        } else {
            return false;
        }
    }

    public function selecionarMeusAlunos($idProfessor)
    {
        $query = $this->conn->prepare("SELECT DISTINCT a.nomeAluno, m.dataMatricula FROM aluno a JOIN aluno_matricula m ON a.idAluno = m.idAluno JOIN professor p ON p.idProfessor = m.idProfessor WHERE p.idProfessor = ?");

        $query->execute(array($idProfessor));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($resultados) {
            return $resultados;
        } else {
            return false;
        }
    }

    public function proximaAula($idCurso, $ordem)
    {
        $ordem = $ordem + 1;
        $query = $this->conn->prepare("SELECT * FROM aulas WHERE ordem = ? AND idCurso = ?");
        $query->execute(array($ordem, $idCurso));
        $resultados = $query->fetch(PDO::FETCH_ASSOC);

        if ($resultados > 0) {

            return $resultados;
        } else {
            return false;
        }
    }


    public function selecionaTodosCursos($idProfessor)
    {

        $query = $this->conn->prepare("SELECT * FROM cursos WHERE idProfessor = ?");
        $query->execute(array($idProfessor));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($resultados < 1) {
            return false;
        }

        return $resultados;
    }

    public function selecionarComentarios($idProfessor)
    {
        $query = $this->conn->prepare("SELECT cursos.idCurso,comentarios.idAluno, aluno.nomeAluno ,comentarios.comentario,comentarios.idComentario,comentarios.dataComentario,aulas.tituloAula FROM comentarios JOIN cursos ON cursos.idCurso = comentarios.idCurso JOIN aulas ON aulas.idAula = comentarios.idAula JOIN aluno ON aluno.idAluno = comentarios.idAluno WHERE cursos.idProfessor = ? ");
        $query->execute(array($idProfessor));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selecionarRespostas($idComentario)
    {
        $query = $this->conn->prepare("SELECT * FROM resposta WHERE idComentario = ?");
        $query->execute(array($idComentario));
        $resultados = $query->fetch(PDO::FETCH_ASSOC);

        if ($resultados > 0) {
            return $resultados;
        } else {
            return false;
        }
    }

    public function setResposta($idComentario,$idProfessor,$idAluno,$resposta){
        
        $query = $this->conn->prepare("INSERT INTO resposta (idComentario,idProfessor,idAluno,resposta) VALUES (?,?,?,?)");
        $query->execute(array($idComentario,$idProfessor,$idAluno,$resposta));

    }

}
