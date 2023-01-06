<?php

namespace App\Models;

use PDO;

class Alunos extends Model
{

    /**
     * @param array $infoAluno
     */
    private array $infoAluno;

   
    public static function logado()
    {

        if (!isset($_SESSION["aluno"]) ||  empty($_SESSION["aluno"])) {
            return false;
        }
        return true;
    }

    public function loginAluno($email, $senha)
    {
        if ($this->verificaEmailExiste($email)) {

            $query = $this->conn->prepare("SELECT * FROM aluno WHERE emailAluno = ? AND senhaAluno = ? LIMIT 1");
            $query->execute(array($email, $senha));
            $resultado = $query->fetch(PDO::FETCH_ASSOC);
            if ($resultado > 0) {
                $_SESSION["aluno"] = $resultado["idAluno"];

                return true;
            } else {
                return false;
            }
        }
    }

    public function verificaEmailExiste($email)
    {

        $query = $this->conn->prepare("SELECT * FROM aluno WHERE emailAluno = ? LIMIT 1");
        $query->execute(array($email));
        $resultado = $query->fetch(PDO::FETCH_ASSOC);

        if ($resultado < 1) {
            return false;
        }

        return true;
    }

    public function meusCursos($idAluno)
    {
        $cursos = new Cursos;
        $query = $this->conn->prepare("SELECT * FROM aluno_matricula WHERE idAluno = ? ORDER BY idMatricula desc  ");
        $query->execute(array($idAluno));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($resultados > 0) {
            $resultadosCursos = [];
            foreach ($resultados as $curso) {
                array_push($resultadosCursos, $cursos->getCursoById($curso["idCurso"]));
            }
            return $resultadosCursos;
        } else {
            return false;
        }
    }


    public function getAluno($idAluno)
    {

        $query = $this->conn->prepare("SELECT * FROM aluno WHERE idAluno = ?");
        $query->execute(array($idAluno));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($resultados) {
           
            return $resultados;
        } else {
            return false;
        }
    }


  
}
