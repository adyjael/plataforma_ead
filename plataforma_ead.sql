-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jan-2023 às 22:07
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `plataforma_ead`
--
CREATE DATABASE IF NOT EXISTS `plataforma_ead` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `plataforma_ead`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--
-- Criação: 03-Jan-2023 às 20:12
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `idAluno` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAluno` varchar(100) NOT NULL,
  `emailAluno` varchar(100) NOT NULL,
  `senhaAluno` varchar(300) NOT NULL,
  `telefoneAluno` varchar(15) NOT NULL,
  `fotoAluno` varchar(200) NOT NULL,
  `nascAluno` date DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`idAluno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `nomeAluno`, `emailAluno`, `senhaAluno`, `telefoneAluno`, `fotoAluno`, `nascAluno`, `created`) VALUES
(1, 'Adyjael neto', 'adyjaelneto@gmail.com', 'Zarkff1619', '932058583', '', '2004-09-15', '2022-12-22 19:44:35'),
(2, 'zark', 'zarkff@gmail.com', '1234', '', '', '2022-12-19', '2022-12-26 00:49:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_matricula`
--
-- Criação: 03-Jan-2023 às 20:12
-- Última actualização: 06-Jan-2023 às 19:59
--

DROP TABLE IF EXISTS `aluno_matricula`;
CREATE TABLE IF NOT EXISTS `aluno_matricula` (
  `idMatricula` int(11) NOT NULL AUTO_INCREMENT,
  `idCurso` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `dataMatricula` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idMatricula`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluno_matricula`
--

INSERT INTO `aluno_matricula` (`idMatricula`, `idCurso`, `idProfessor`, `idAluno`, `dataMatricula`) VALUES
(1, 2, 1, 1, '2023-01-06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--
-- Criação: 03-Jan-2023 às 20:12
-- Última actualização: 06-Jan-2023 às 20:03
--

DROP TABLE IF EXISTS `aulas`;
CREATE TABLE IF NOT EXISTS `aulas` (
  `idAula` int(11) NOT NULL AUTO_INCREMENT,
  `tituloAula` varchar(200) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `slugAula` varchar(200) NOT NULL,
  `descricaoAula` varchar(600) NOT NULL,
  `duracaoAula` varchar(20) NOT NULL,
  `ordem` int(11) NOT NULL,
  `embedAula` varchar(100) NOT NULL,
  `ativoAula` varchar(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`idAula`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`idAula`, `tituloAula`, `idCurso`, `slugAula`, `descricaoAula`, `duracaoAula`, `ordem`, `embedAula`, `ativoAula`) VALUES
(1, 'Apresentação do curso', 1, 'apresentação-do-curso', 'Nesta aula vamos dar uma pequena introdução sobre o que vamos aprender ao longo do curso', '10mim', 1, 'hnIAbU9_6uw', 'S'),
(2, 'Aula 2 - Teste de ordem', 1, 'teste-de-ordem', '2222', '12min', 2, 'hnIAbU9_6uw', 'S'),
(3, 'Aula 3 - teste de cores', 1, 'teste-de-cores', 'gdbvn s', '29h30min', 3, 'UBr3Y_or_Ls', 'S'),
(4, 'Aula 4 - Falar com o gerente', 1, 'falar-com-o-gerente', '5eng', '29h30min', 4, 'hnIAbU9_6uw', 'S'),
(5, 'Aula 1 - Introdução – JavaScript Moderno', 2, 'aula-1---introdução-–-javascript-moderno', 'Olá, Pequeno Gafanhoto! O Curso em Vídeo e o Google apresentam um curso de JavaScript e ECMAScript para Iniciantes aqui no YouTube! Veja nesse vídeo os detalhes sobre o lançamento, que aconteceu todo no mesmo dia. O curso já está 100% disponível para todos, gratuitamente,.', '3min', 1, 'BXqUH86F-kA', 'S'),
(6, 'Aula 2 - Conhecendo o JavaScript ', 2, 'aula-2---conhecendo-o-javascript-', 'Seja bem-vindo ao Módulo A do seu Curso em Vídeo de JavaScript para Iniciante! A partir de agora, vamos conhecer um pouco mais sobre a linguagem JS, quais são os seus fundamentos e como deixar seu computador pronto para começar seus estudos. Também vai entender a relação entre JavaScript e ECMAScript e saber se JavaScript e Java têm algo entre si.', '6min', 2, 'uzEhd3Lugik', 'S'),
(7, 'Aula 3 - O que o JavaScript é capaz de fazer?', 2, 'o-que-o-javascript-é-capaz-de-fazer', 'Você sabe para que serve a linguagem JavaScript / ECMAScript? Sabe a diferença entre um cliente e um servidor para a Internet? Sabe para que servem as tecnologias HTML5, CSS3 e JavaScript? Consegue citar 4 sites que utilizam a linguagem JavaScript nos seus códigos? \r\n\r\nPois, para responder a essas e muitas outras perguntas, assista essa aula do Curso de JavaScript para Iniciantes até o final. E não se esqueça sempre de praticar todas as atividades que fizermos durante o vídeo no seu próprio computador.\r\n\r\nAula do Curso de JavaScript e ECMAScript para Iniciantes, criado pelo professor Gustavo G', '28min', 3, 'Ptbk2af68e8', 'S'),
(8, 'Aula 4 - JavaScript: como chegamos até aqui?', 2, 'aula-4---javascript:-como-chegamos-até-aqui', 'Você sabe qual foi a empresa a criar o JavaScript? Sabe qual é a diferença entre as linguagens Java e JavaScript? Sabe qual é a relação que existe entre as linguagens JavaScript e ECMAScript? Sabia que, por exemplo, o programa usado para acessar WhatsApp no computador é feito em JavaScript?\n\nPois, para responder a essas e muitas outras perguntas, assista essa aula do Curso de JavaScript para Iniciantes até o final. E não se esqueça sempre de praticar todas as atividades que fizermos durante o vídeo no seu próprio computador.\n\nAula do Curso de JavaScript e ECMAScript para Iniciantes, criado', '24min', 4, 'rUTKomc2gG8', 'S'),
(9, 'Aula 5 - Dando os primeiros passos', 2, 'dando-os-primeiros-passos', 'Quais são os melhores livros de JavaScript em Português? Onde ter acesso à documentação oficial do JavaScript em Português e Inglês? Quais são os requisitos de software para aprender a programar em JavaScript? Qual é o melhor editor para códigos JavaScript?  Como instalar o Node.js no seu computador? Como configurar o Node.js? Para aprender JavaScript, é realmente necessário saber muito Inglês?Você está precisando de dicas para estudar e aprender de verdade?\r\n\r\nPois, para responder a essas e muitas outras perguntas, assista essa aula do Curso de JavaScript para Iniciantes até o final. E não se', '30min', 5, 'FdePtO5JSd0', 'S'),
(10, 'Aula 6 - Criando o seu primeiro script ', 2, 'aula-6---criando-o-seu-primeiro-script-', 'Você já sabe diferenciar dentro do seu código, os trechos em HTML5, em CSS3 e em JavaScript? Sabe organizar as pastas do seu projeto dentro do Visual Studio Code? Sabe como testar se o Node.js está devidamente instalado? Já sabe utilizar os comandos alert, confirm e prompt do JavaScript? \n\nPois, para responder a essas e muitas outras perguntas, assista essa aula do Curso de JavaScript para Iniciantes até o final. E não se esqueça sempre de praticar todas as atividades que fizermos durante o vídeo no seu próprio computador.\n\nAula do Curso de JavaScript e ECMAScript para Iniciantes, criado p', '20min', 6, 'OmmJBfcMJA8', 'S'),
(11, 'Aula 7 -  Comandos Básicos do JavaScript', 2, 'aula-7----comandos-básicos-do-javascript', 'Seja bem-vindo ao Módulo B do seu Curso em Vídeo de JavaScript para Iniciante! Nesse segundo módulo, vamos aprender os comandos básicos do JavaScript, bem como o uso dos principais operadores da linguagem.', '2min', 7, 'FjT97HVT5g8', 'S'),
(12, 'Aula 8 - Variáveis e Tipos Primitivos ', 2, 'variáveis-e-tipos-primitivos-', '', '30min', 8, 'Vbabsye7mWo', 'S'),
(13, 'Aula 9 - Tratamento de dados', 2, 'tratamento-de-dados', '', '40min', 9, 'OJgu_KCCUSY', 'S'),
(14, 'Aula 10 - Operadores (Parte1) ', 2, 'operadores-(parte1)-', '', '25min', 10, 'hZG9ODUdxHo', 'S'),
(15, 'Aula 11 - Operadores (Parte 2)', 2, 'operadores-(parte-2)', '', '24min', 11, 'BP63NhITvao', 'S'),
(16, 'Aula 12 - Entendendo o DOM', 2, 'entendendo-o-dom', 'Seja bem-vindo ao Módulo C do seu Curso em Vídeo de JavaScript para Iniciante! Nesse terceiro módulo, vamos aprender o que é o Document Object Model, para que ele serve e como manipular os elementos DOM de um site. Apesar de ser um módulo com menos aulas, elas são muito importantes e valiosas para você poder entender os fundamentos do JavaScript.', '2min', 12, 'H80nCKs9c2k', 'S'),
(17, 'Aula 13 - Introdução ao DOM', 2, 'introdução-ao-dom', '', '28min', 13, 'WWZX8RWLxIk', 'S'),
(18, 'Aula 14 - Eventos DOM', 2, 'eventos-dom', '', '28min', 14, 'wWnBB-mZIvY', 'S'),
(19, 'Aula 15 - Condições em JavaScript', 2, 'condições-em-javascript', '', '2min', 15, 'uPFasdmZHJc', 'S'),
(20, 'Aula 16 - Condições (Parte 1) ', 2, 'condições-(parte-1)-', '', '27min', 16, 'cOdG4eACN2A', 'S'),
(21, 'Aula 17 - Condições (Parte 2) ', 2, 'condições-(parte-2)-', '', '29min', 17, 'EEStcIe8rAM', 'S'),
(22, 'Aula 18 - Exercícios JavaScript (Parte 1)', 2, 'exercícios-javascript-(parte-1)', '', '14min', 18, 'b2K7eo5Jdj8', 'S'),
(23, 'Aula 19 - Exercícios JavaScript (Parte 2)', 2, 'exercícios-javascript-(parte-2)', '', '17min', 19, 'UXSWgnbSHxs', 'S'),
(24, 'Aula 20 - Exercícios JavaScript (Parte 3)', 2, 'exercícios-javascript-(parte-3)', '', '22min', 20, 'f5es-PpaUI8&list', 'S'),
(25, 'Aula 21 - Repetições em JavaScript', 2, 'repetições-em-javascript', '', '2min', 21, '3emz6rpcJyA', 'S'),
(26, 'Aula 22 - Repetições (Parte 1)', 2, 'repetições-(parte-1)', '', '20min', 22, '5rZqYPKIwkY', 'S'),
(27, 'Aula 23 - Repetições (Parte 2) ', 2, 'repetições-(parte-2)-', '', '20min', 23, 'eX-lkN_Zahc', 'S'),
(28, 'Aula 24 - Exercícios JavaScript (Parte 4)', 2, 'exercícios-javascript-(parte-4)', '', '10mim', 24, '6tyHypeY4-8', 'S'),
(29, 'Aula 25 - Exercícios JavaScript (Parte 5)', 2, 'exercícios-javascript-(parte-5)', '', '18min', 25, 'oMNbc_LFz8w', 'S'),
(30, 'Aula 26 - Exercícios JavaScript (Parte 6) ', 2, 'exercícios-javascript-(parte-6)-', '', '12min', 26, 'mfHAQ-4Rspw', 'S'),
(31, 'Aula 27 - Avançando os estudos em JavaScript', 2, 'avançando-os-estudos-em-javascript', '', '2min', 27, '5m4UhZd-Les', 'S'),
(32, 'Aula 28 - Variáveis Compostas ', 2, 'variáveis-compostas-', '', '30min', 28, 'XdkW62tkAgU', 'S'),
(33, 'Aula 29 - Funções ', 2, 'funções-', '', '26min', 29, 'mc3TKp2XzhI', 'S'),
(34, 'Aula 30 - Exercícios JavaScript (Parte 7)', 2, 'exercícios-javascript-(parte-7)', '', '16min', 30, 'vEOEZ03ZyiE', 'S'),
(35, 'Aula 31 - Exercícios JavaScript (Parte 8)', 2, 'exercícios-javascript-(parte-8)', '', '15min', 31, 'slLoLLCd-k0', 'S'),
(36, 'Aula 32 - Próximos Passos', 2, 'próximos-passos', 'O que você precisa aprender sobre JavaScript a partir de agora? Você conseguiu assistir todas as aulas do curso para iniciantes em JavaScript? Quer aprender um pouco mais de JavaScript avançado?\r\n\r\nPois, para responder a essas e muitas outras perguntas, assista essa aula do Curso de JavaScript para Iniciantes até o final. E não se esqueça sempre de praticar todas as atividades que fizermos durante o vídeo no seu próprio computador.\r\n\r\nAula do Curso de JavaScript e ECMAScript para Iniciantes, criado pelo professor Gustavo Guanabara para o canal CursoemVideo.', '20min', 32, 'roP93FA-NgU', 'S'),
(38, 'Aula 1 - o que é php ?', 4, 'o-que-é-php-', 'Vamos conhecer a hitória do php', '10min', 1, 'AqDj3OSV0mM', 'S'),
(39, 'Aula 2 - Como funciona o php?', 4, 'como-funciona-o-php', 'teste', '2min', 2, 'Eup6utTPe2U', 'S'),
(41, 'Aula 2 - Apresentação do curso', 3, 'apresentação-do-curso', 'rfg w', '29h30min', 2, 'UBr3Y_or_Ls', 'S'),
(43, 'Aula 1 - Curso de mysql', 5, 'curso-de-mysql', 'w3efWEF', '10mim', 1, 'hnIAbU9_6uw', 'S'),
(44, 'Aula 1 - primeira aula do curso de teste editado', 6, 'aula-1---primeira-aula-do-curso-de-teste-editado', 'fhbjvhjkbwdfv', '29h30min', 1, 'hnIAbU9_6uw', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas_assistidas`
--
-- Criação: 03-Jan-2023 às 20:12
-- Última actualização: 06-Jan-2023 às 20:00
--

DROP TABLE IF EXISTS `aulas_assistidas`;
CREATE TABLE IF NOT EXISTS `aulas_assistidas` (
  `idAulasAssitidas` int(11) NOT NULL AUTO_INCREMENT,
  `idAula` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `dataAulaAssitida` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idAulasAssitidas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aulas_assistidas`
--

INSERT INTO `aulas_assistidas` (`idAulasAssitidas`, `idAula`, `idAluno`, `idCurso`, `dataAulaAssitida`) VALUES
(1, 5, 1, 2, '2023-01-06'),
(2, 6, 1, 2, '2023-01-06'),
(3, 7, 1, 2, '2023-01-06'),
(4, 8, 1, 2, '2023-01-06'),
(5, 9, 1, 2, '2023-01-06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--
-- Criação: 03-Jan-2023 às 20:12
-- Última actualização: 06-Jan-2023 às 20:00
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `idAluno` int(11) NOT NULL,
  `idAula` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `dataComentario` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idComentario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `idAluno`, `idAula`, `idCurso`, `comentario`, `dataComentario`) VALUES
(1, 1, 10, 2, 'O javascrpt é muito legal obrigado pela aula', '2023-01-06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--
-- Criação: 03-Jan-2023 às 20:12
-- Última actualização: 06-Jan-2023 às 20:02
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `idProfessor` int(11) NOT NULL,
  `tituloCurso` varchar(300) NOT NULL,
  `fotoCurso` varchar(200) NOT NULL,
  `descricaoCurso` text NOT NULL,
  `precoCurso` decimal(20,2) NOT NULL,
  `duracaoCurso` varchar(10) NOT NULL,
  `slugCurso` varchar(50) NOT NULL,
  `embedCurso` int(100) NOT NULL,
  `dataCurso` date NOT NULL DEFAULT current_timestamp(),
  `ativoCurso` varchar(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`idCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`idCurso`, `idProfessor`, `tituloCurso`, `fotoCurso`, `descricaoCurso`, `precoCurso`, `duracaoCurso`, `slugCurso`, `embedCurso`, `dataCurso`, `ativoCurso`) VALUES
(1, 1, 'Curso de php avançado', 'public/assets/imagemCurso/63aca183d953b.webp', 'Neste curso vc vai aprender php do basico ao avançado,\r\nOnde vamos ver as principais funções e metodos dentro da linguagem php etc,', '0.00', '7h30min', 'curso-de-php-avançado', 0, '2022-12-28', 'S'),
(2, 1, 'Javascript', 'public/assets/imagemCurso/63ad9c14b0a9d.jpg', 'Curso de linguagem JavaScript, voltado para iniciantes e para quem quiser aprender mais sobre ECMAScript, a versão padronizada do JS. Em um curso patrocinado pelo Google, o professor Gustavo Guanabara vai ensinar o conteúdo básico em 6 módulos que vão desde o conhecimento da linguagem até o uso de funções.', '0.00', '40h', 'javascript', 0, '2022-12-29', 'S'),
(4, 1, 'Curso de php basico', 'public/assets/imagemCurso/63ae32ff06070.png', 'Neste curso vou ensina a vcs como user o php ', '0.00', '7h30min', 'curso-de-php-basico', 0, '2022-12-30', 'S'),
(7, 1, 'curso de teste editado', 'public/assets/imagemCurso/63b87e3c196cf.jpg', 'Este curso é de teste', '0.00', '29h30min', 'curso-de-teste-editado', 0, '2023-01-06', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--
-- Criação: 03-Jan-2023 às 20:12
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `idProfessor` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProfessor` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `datanasc` date NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idProfessor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`idProfessor`, `nomeProfessor`, `email`, `senha`, `datanasc`, `createdAt`) VALUES
(1, 'Albert Einstein', 'professor@gmail.com', 'professor12343', '1984-05-16', '2022-12-25 16:12:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--
-- Criação: 03-Jan-2023 às 20:12
-- Última actualização: 06-Jan-2023 às 20:03
--

DROP TABLE IF EXISTS `resposta`;
CREATE TABLE IF NOT EXISTS `resposta` (
  `idResposta` int(11) NOT NULL AUTO_INCREMENT,
  `idComentario` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `resposta` text NOT NULL,
  `dataResposta` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idResposta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `resposta`
--

INSERT INTO `resposta` (`idResposta`, `idComentario`, `idAluno`, `idProfessor`, `resposta`, `dataResposta`) VALUES
(1, 1, 1, 1, 'Eu que agradeço continue estudando que vc vai ficar melhor a cada dia', '2023-01-06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
