<?php

namespace App\Controllers;

use App\Models\Alunos;
use App\Models\Professor;

class AccountController extends Web
{

    public function index()
    {
        $this->view([
            "login"
        ]);
    }

    public function login()
    {

        $alunos = new Alunos;

        if (isset($_POST) && $_POST["type"] == "login") {
            echo $alunos->loginAluno($_POST["emailAluno"], $_POST["senhaAluno"]);
        }
    }

    public function indexProfessor()
    {
        $this->view([
            "login_professor"
        ]);
    }
    public function loginProfessor($data)
    {
        $professor = new Professor;
        echo $professor->loginProfessor($data["emailprofessor"], $data["senhaprofessor"]);
    }

    public function sair()
    {

        unset($_SESSION["aluno"]);
        header("Location: " . URL_BASE . "/login");
    }
}
