-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/09/2024 às 21:33
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerenciamento`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `task_name` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `status` set('Pendentes','Em andamento','Concluidas') DEFAULT 'Pendentes',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `task_name`, `description`, `status`, `created_at`) VALUES
(3, 'Lavar roupa', 'Lavar todas as roupas sujas acumuladas durante a semana.', 'Em andamento', NULL),
(5, 'Estudar para o exame', 'Revisar os tópicos importantes para o exame de matemática.', 'Pendentes', NULL),
(6, 'Fazer exercícios', 'Realizar uma rotina de exercícios físicos para manter a forma.', 'Concluidas', NULL),
(7, 'Preparar jantar', 'Cozinhar um jantar saudável para a família.', 'Pendentes', NULL),
(8, 'Pagar contas', 'Pagar todas as contas de água, luz e internet antes do prazo.', 'Em andamento', NULL),
(9, 'Ler um livro', 'Ler um capítulo do livro que estou interessado.', 'Pendentes', NULL),
(10, 'Assistir a um filme', 'Escolher e assistir a um filme para relaxar.', 'Pendentes', NULL),
(11, 'Escrever um e-mail', 'Enviar um e-mail importante para o colega de trabalho.', 'Pendentes', NULL),
(12, 'Organizar a garagem', 'Arrumar a garagem e descartar itens desnecessários.', 'Pendentes', NULL),
(13, 'Reparar vazamento', 'Consertar o vazamento no encanamento da cozinha.', 'Pendentes', NULL),
(14, 'Planejar viagem', 'Pesquisar e planejar detalhes da próxima viagem de férias.', 'Pendentes', NULL),
(15, 'Fazer reunião com equipe', 'Conduzir reunião com a equipe para discutir projetos em andamento.', 'Pendentes', NULL),
(16, 'Atualizar o currículo', 'Revisar e atualizar informações no currículo profissional.', 'Pendentes', NULL),
(17, 'Comprar presentes', 'Selecionar e comprar presentes para o aniversário de um amigo.', 'Concluidas', NULL),
(18, 'Visitar o médico', 'Agendar e comparecer à consulta médica de rotina.', 'Pendentes', NULL),
(19, 'Fazer backup dos dados', 'Realizar backup completo dos arquivos importantes do computador.', 'Pendentes', NULL),
(20, 'Preparar relatório', 'Escrever e formatar o relatório trimestral de desempenho.', 'Pendentes', NULL),
(21, 'Fazer a manutenção do carro', 'Levar o carro para revisão e manutenção preventiva.', 'Pendentes', NULL),
(22, 'Arrumar a mesa de trabalho', 'Organizar a mesa de trabalho e descartar papéis desnecessários.', 'Pendentes', NULL),
(23, 'Participar de workshop', 'Participar de um workshop online sobre desenvolvimento pessoal.', 'Pendentes', NULL),
(24, 'Comprar roupas novas', 'Ir às lojas para comprar roupas novas para a estação atual.', 'Pendentes', NULL),
(25, 'Limpar o jardim', 'Cortar a grama e cuidar das plantas do jardim.', 'Pendentes', NULL),
(26, 'Atualizar o site', 'Adicionar novos conteúdos e atualizar o site pessoal.', 'Pendentes', NULL),
(27, 'Treinar habilidades novas', 'Dedicar tempo para aprender uma nova habilidade ou hobby.', 'Pendentes', NULL),
(28, 'Fazer exames médicos', 'Realizar exames de rotina para verificar a saúde geral.', 'Em andamento', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
