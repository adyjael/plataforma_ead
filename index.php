<?php
require "vendor/autoload.php";

use CoffeeCode\Router\Router;

session_start();
$router = new Router(URL_BASE);

$router->namespace("App\Controllers");
$router->group(NULL);

$router->get("/login", "AccountController:index");
$router->get("/", "AccountController:index");
$router->get("/sair", "AccountController:sair");
$router->post("/login/aluno", "AccountController:login");
$router->get("/perfil", "DasboardController:perfil");
// ROUTAS DASHBOARD

$router->get("/dashboard", "DasboardController:index");
$router->get("/cursos", "DasboardController:allCursos");
$router->get("/meus-cursos", "DasboardController:meusCursos");
$router->get("/curso/{slugCurso}", "DasboardController:verCurso");
$router->get("/{slugCurso}/aulas/{slugAula}", "DasboardController:aulas");
$router->get("/{slugCurso}/aulas/{slugAula}/proxima", "DasboardController:proximaAula");
$router->get("/curso/{slugCurso}/aulas", "DasboardController:verCurso");
$router->get("/comentario", "DasboardController:meusComentario");
$router->post("/curso/inscrever", "DasboardController:increver");
$router->post("/comentar", "DasboardController:comentar");


// PAINEL DO PROFESSOR
$router->get("/professor", "AccountController:indexProfessor");
$router->post("/login/professor", "AccountController:loginProfessor");
$router->get("/painel/novo-curso", "PainelAdmin:novoCurso");
$router->get("/painel/professor", "PainelAdmin:index");
$router->get("/painel/professor/curso/{slugCurso}", "PainelAdmin:verCurso");
$router->get("/painel/comentarios", "PainelAdmin:comentarios");
$router->get("/painel/professor/curso/{slugCurso}/aulas/{slugAula}", "PainelAdmin:verAulas");
$router->get("/painel/professor/curso/{slugCurso}/aulas/{slugAula}/proxima", "PainelAdmin:proximaAula");
$router->post("/painel/adicionarCurso", "PainelAdmin:adicionarCurso");
$router->post("/painel/editarAula", "PainelAdmin:editarAula");
$router->post("/painel/editarCurso", "PainelAdmin:editarCurso");
$router->post("/painel/atualizarCurso", "PainelAdmin:atualizarCurso");
$router->post("/painel/atualizarAula", "PainelAdmin:atualizarAula");
$router->post("/painel/adicionarAula", "PainelAdmin:adicionarAula");
$router->post("/painel/apagarCurso", "PainelAdmin:apagarCurso");
$router->post("/painel/apagarAula", "PainelAdmin:apagarAula");
$router->post("/painel/responder", "PainelAdmin:responderAluno");


// NOT FOUND
$router->get("/ops/{errcode}", "DasboardController:notFound");

$router->dispatch();

if ($router->error()) {
    $router->redirect("/ops/{$router->error()}");
}
