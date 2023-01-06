<?php

namespace App\Models;

use PDO;

class Aulas extends Model
{


    public function teste($idAluno)
    {
        $query = $this->conn->prepare("SELECT * FROM aulas_assistidas WHERE idAluno = ?");
        $query->execute(array($idAluno));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($resultados > 0) {
            $resultadosAulas = [];
            foreach ($resultados as $aulas) {
                array_push($resultadosAulas, $this->getAulaById($aulas["idAula"]));
            }
            return $resultadosAulas;
        } else {
            return false;
        }
    }

    public function getAulaAssitidaByAluno($idAluno)
    {
        $query = $this->conn->prepare("SELECT aluno.nomeAluno,cursos.slugCurso,cursos.tituloCurso,aulas.tituloAula,aulas.slugAula,aulas_assistidas.dataAulaAssitida 
        FROM aluno 
        JOIN aulas_assistidas ON aluno.idAluno = aulas_assistidas.idAluno 
        JOIN aulas ON aulas_assistidas.idAula = aulas.idAula 
        JOIN cursos ON aulas.idCurso = cursos.idCurso
        WHERE aluno.idAluno = ?;");
        $query->execute(array($idAluno));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAulaById($idAula)
    {
        $query = $this->conn->prepare("SELECT * FROM aulas WHERE idAula = ? ");
        $query->execute(array($idAula));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($resultados > 0) {
            return $resultados;
        } else {
            return false;
        }
    }



    public function ListarAulasNoCursoById($idCurso)
    {

        $query = $this->conn->prepare("SELECT * FROM aulas WHERE idCurso = ? ORDER BY ordem ASC");
        $query->execute(array($idCurso));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($resultados > 0) {
            return $resultados;
        } else {
            return false;
        }
    }

    public function getAulaByslug($slugAula)
    {

        $query = $this->conn->prepare("SELECT * FROM aulas WHERE slugAula = ? ");
        $query->execute(array($slugAula));
        $resultados = $query->fetch(PDO::FETCH_ASSOC);

        if ($resultados > 0) {
            return $resultados;
        } else {
            return false;
        }
    }

    public function adicionarAula($titulo, $descicao, $duracao, $embed, $idCurso, $ordem)
    {
        $slugAula = explode(" ", $titulo);
        $slugAula = implode("-", $slugAula);
        $slugAula = strtolower($slugAula);
        $slugAula = str_replace("?", "", $slugAula);
        $titulo = "Aula $ordem - " . $titulo;


        $query = $this->conn->prepare("INSERT INTO aulas (tituloAula,idCurso,slugAula,duracaoAula,ordem,embedAula,descricaoAula) 
                                            VALUES(?,?,?,?,?,?,?)");
        $query->execute(array($titulo, $idCurso, $slugAula, $duracao, $ordem, $embed, $descicao));
    }


    public function getAulaAnterior($idAulaAtual)
    {
        $ordem = $idAulaAtual - 1;
        $resultados = [];
        if ($ordem < 1) {
            return false;
        }
        $query = $this->conn->prepare("SELECT * FROM aulas WHERE ordem = ? ");
        $query->execute(array($ordem));
        $resultados = $query->fetch(PDO::FETCH_ASSOC);

        if ($resultados > 0) {
            return $resultados;
        } else {
            return false;
        }
    }
    public function getProximaAula($idAulaAtual, $idCurso, $ordem)
    {
        $ordem = $ordem + 1;
        $query = $this->conn->prepare("SELECT * FROM aulas WHERE ordem = ? AND idCurso = ?");
        $query->execute(array($ordem, $idCurso));
        $resultados = $query->fetch(PDO::FETCH_ASSOC);

        if ($resultados > 0) {
            if ($this->verificarAulaAssitida($idAulaAtual, $_SESSION["aluno"])) {
                $this->atualizarAulasAssistida($idAulaAtual, $_SESSION["aluno"]);
            } else {

                $this->setAulasAssitidas($idAulaAtual, $idCurso, $_SESSION["aluno"]);
            }
            return $resultados;
        } else {
            return false;
        }
    }

    public function setAulasAssitidas($idAula, $idCurso, $idAluno)
    {

        $query = $this->conn->prepare("INSERT INTO aulas_assistidas (idAula,idCurso,idAluno) VALUES(?,?,?)");
        $query->execute(array($idAula, $idCurso, $idAluno));
    }

    public function verificarAulaAssitida($idAula, $idAluno)
    {
        $query = $this->conn->prepare("SELECT * FROM aulas_assistidas WHERE idAula = ? AND idAluno = ?");
        $query->execute(array($idAula, $idAluno));
        $resultados = $query->fetch(PDO::FETCH_ASSOC);

        if ($resultados > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function atualizarAulasAssistida($idAula, $idAluno)
    {
        $query = $this->conn->prepare("UPDATE aulas_assistidas SET dataAulaAssitida = ? where idAula = ? AND idAluno = ? ");
        $query->execute(array(date("Y/m/d"), $idAula, $idAluno));
    }

    public function getAulaAssitida($idAluno, $idCurso)
    {
        $query = $this->conn->prepare("SELECT * FROM aulas_assistidas WHERE idAluno = ? AND idCurso = ?");
        $query->execute(array($idAluno, $idCurso));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($resultados > 0) {
            return $resultados;
        } else {
            return false;
        }
    }


    public function setComentarios($idAluno, $idCurso, $idAula, $comentario)
    {
        $query = $this->conn->prepare("INSERT INTO comentarios (idAula,idCurso,idAluno,comentario) VALUES(?,?,?,?)");
        $query->execute(array($idAula, $idCurso, $idAluno, $comentario));
    }
    public function getComentarios($idAluno)
    {
        $query = $this->conn->prepare("SELECT * FROM comentarios WHERE idAluno = ?");
        $query->execute(array($idAluno));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($resultados > 0) {
            return $resultados;
        } else {
            return false;
        }
    }
    public function getRespostas($idComentario, $idAluno)
    {
        $query = $this->conn->prepare("SELECT * FROM resposta WHERE idAluno = ? AND idComentario = ?");
        $query->execute(array($idAluno, $idComentario));
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($resultados > 0) {
            return $resultados;
        } else {
            return false;
        }
    }


    public function atualizarAula($idAula, $titulo, $duracao, $ordem, $descicao, $video)
    {
        $slugAula = explode(" ", $titulo);
        $slugAula = implode("-", $slugAula);
        $slugAula = strtolower($slugAula);
        $slugAula = str_replace("?", "", $slugAula);

        $query = $this->conn->prepare("UPDATE aulas SET tituloAula = ?,slugAula = ?, duracaoAula = ?,ordem = ?, descricaoAula = ?, embedAula = ? WHERE idAula = ?");
        $query->execute(array($titulo, $slugAula, $duracao, $ordem, $descicao, $video, $idAula));
    }


    public function apagarAula($idAula)
    {
        $this->deleteAulasAssistidas($idAula);
        $this->deleteComentario($idAula);
        $query = $this->conn->prepare("DELETE FROM aulas WHERE idAula = ? ");

        $query->execute(array($idAula));
    }



    public function deleteComentario($idAula)
    {
        $query = $this->conn->prepare("DELETE FROM comentarios WHERE idAula = ? ");

        $query->execute(array($idAula));
    }
    public function deleteAulasAssistidas($idAula)
    {
        $query = $this->conn->prepare("DELETE FROM aulas_assistidas WHERE idAula = ? ");

        $query->execute(array($idAula));
    }
}
