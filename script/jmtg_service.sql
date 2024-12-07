-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/12/2024 às 23:55
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jmtg_service`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `Matricula` int(8) NOT NULL,
  `Nome` varchar(90) DEFAULT NULL,
  `Data_Nascimento` date DEFAULT NULL,
  `CPF` char(14) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Endereco` varchar(255) DEFAULT NULL,
  `CEP` char(10) DEFAULT NULL,
  `Telefone` char(14) DEFAULT NULL,
  `Senha` varchar(255) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Status do aluno\nAtivo: 1 | Inativo: 0',
  `usuario_sistema_ID` int(11) DEFAULT NULL,
  `reset_token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`Matricula`, `Nome`, `Data_Nascimento`, `CPF`, `Email`, `Endereco`, `CEP`, `Telefone`, `Senha`, `Foto`, `Status`, `usuario_sistema_ID`, `reset_token`) VALUES
(0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(1900, 'Prof. Tiago', NULL, '12345678912', 'proftiago@teste.com', 'quadra 1 rua 2', '72555125', '61912345678', '202cb962ac59075b964b07152d234b70', 'Array', 1, NULL, 0),
(10101010, 'Aluno Teste', '2000-01-01', '19090320008', 'alunoteste@gmail.com', 'Rua da Felicidade', '72.155-155', '61 999009900', '1791962eadeadcd9001ce88815698370', 'c37c452cd75342976e49a7e918e335f6.jpg', 1, NULL, 0),
(20200543, 'Taynná Oliveira', '1995-08-22', '01025768159', 'taynna@gmail.com', 'Rua da Felicidade', '72.155-155', '61 982160583', '1791962eadeadcd9001ce88815698370', 'c37c452cd75342976e49a7e918e335f6.jpg', 1, NULL, 0),
(2147483647, 'teste3', '2024-12-05', '29208341003', 'teste3@teste.com', 'Rua da Felicidade', '72.155-407', '61 982160583', '1791962eadeadcd9001ce88815698370', 'c37c452cd75342976e49a7e918e335f6.jpg', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `candidatura`
--

CREATE TABLE `candidatura` (
  `Vaga_Numero` int(11) NOT NULL,
  `Aluno_Matricula` int(8) NOT NULL,
  `status` char(1) DEFAULT NULL COMMENT 'A = Aprovado\nR = Reprovado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `curriculo`
--

CREATE TABLE `curriculo` (
  `Codigo` int(11) NOT NULL,
  `Sobre_Mim` text DEFAULT NULL,
  `Atividades_Extracurriculares` text DEFAULT NULL,
  `Interesses_Profissionais` text DEFAULT NULL,
  `Aluno_Matricula` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `curriculo`
--

INSERT INTO `curriculo` (`Codigo`, `Sobre_Mim`, `Atividades_Extracurriculares`, `Interesses_Profissionais`, `Aluno_Matricula`) VALUES
(1, NULL, NULL, NULL, 20200543),
(2, NULL, NULL, NULL, 20200543),
(3, NULL, NULL, NULL, 20200543);

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(90) NOT NULL,
  `Instituicao` varchar(45) DEFAULT NULL,
  `Conclusao` char(7) DEFAULT NULL COMMENT 'Formato: MM/AAAA',
  `Curriculo_Codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(90) DEFAULT NULL,
  `CNPJ` char(18) DEFAULT NULL,
  `Endereco` varchar(45) DEFAULT NULL,
  `CEP` char(10) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Telefone` char(14) DEFAULT NULL,
  `Senha` varchar(255) DEFAULT NULL,
  `Entrevista_Codigo` int(11) NOT NULL,
  `reset_token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `entrevista`
--

CREATE TABLE `entrevista` (
  `Codigo` int(11) NOT NULL,
  `Data` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Endereco` varchar(255) DEFAULT NULL,
  `Link` varchar(255) DEFAULT NULL,
  `candidatura_Vaga_Numero` int(11) NOT NULL,
  `candidatura_Aluno_Matricula` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `experiencias_profissionais`
--

CREATE TABLE `experiencias_profissionais` (
  `ID` int(11) NOT NULL,
  `Empresa` varchar(100) DEFAULT NULL,
  `Funcao` varchar(45) DEFAULT NULL,
  `Periodo` varchar(45) DEFAULT NULL,
  `Atividade` text DEFAULT NULL,
  `Curriculo_Codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `experiencias_profissionais`
--

INSERT INTO `experiencias_profissionais` (`ID`, `Empresa`, `Funcao`, `Periodo`, `Atividade`, `Curriculo_Codigo`) VALUES
(1, NULL, NULL, NULL, NULL, 2),
(2, NULL, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `formacao`
--

CREATE TABLE `formacao` (
  `ID` int(11) NOT NULL,
  `Curso` varchar(45) DEFAULT NULL,
  `Ano_Conclusao` year(4) DEFAULT NULL,
  `Instituicao` varchar(45) DEFAULT NULL,
  `Curriculo_Codigo` int(11) NOT NULL,
  `Grau_Escolaridade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `formacao`
--

INSERT INTO `formacao` (`ID`, `Curso`, `Ano_Conclusao`, `Instituicao`, `Curriculo_Codigo`, `Grau_Escolaridade_id`) VALUES
(1, NULL, NULL, NULL, 2, 2),
(2, NULL, NULL, NULL, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `grau_escolaridade`
--

CREATE TABLE `grau_escolaridade` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `grau_escolaridade`
--

INSERT INTO `grau_escolaridade` (`ID`, `Nome`) VALUES
(1, 'ensino medio'),
(2, 'ensino superior');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `ID` int(11) NOT NULL,
  `Funcao` varchar(45) DEFAULT NULL,
  `Descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `perfil`
--

INSERT INTO `perfil` (`ID`, `Funcao`, `Descricao`) VALUES
(1, 'administrador', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `resultado_entrevista`
--

CREATE TABLE `resultado_entrevista` (
  `ID` int(11) NOT NULL,
  `Presenca` char(1) NOT NULL COMMENT 'Indica se o candidato foi à entrevista.\nS = Sim\nN = Não',
  `Nota` decimal(4,2) DEFAULT NULL,
  `Observacao` varchar(255) DEFAULT NULL,
  `Entrevista_Codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario_sistema`
--

CREATE TABLE `usuario_sistema` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(90) DEFAULT NULL,
  `CPF` char(14) DEFAULT NULL,
  `Telefone` char(14) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Senha` varchar(255) DEFAULT NULL,
  `Perfil_ID` int(11) NOT NULL,
  `reset_token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario_sistema`
--

INSERT INTO `usuario_sistema` (`ID`, `Nome`, `CPF`, `Telefone`, `Email`, `Senha`, `Perfil_ID`, `reset_token`) VALUES
(7, 'Tadeu', '05398531271', '61 999009900', 'tadeu@gmail.com', '$2y$10$zxwU9Aby3qB.jq8sGZ.jf.2aIImtjhbHJ/ratHY5cXyCl9RjYaB0y', 1, NULL),
(8, 'Adalberto', '68926598020', '61 999009900', 'adalberto@gmail.com', '$2y$10$u8YE8T82xrcRklcvkTn7zeoGYmE7DZdiuwQEIwc2RvnCG1eHXUb8a', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vaga`
--

CREATE TABLE `vaga` (
  `Numero` int(11) NOT NULL,
  `Funcao` varchar(45) DEFAULT NULL,
  `Quantidade_Vagas` int(11) DEFAULT NULL,
  `Salario` decimal(8,2) DEFAULT NULL,
  `Beneficios` varchar(255) DEFAULT NULL,
  `Descricao_Atividades` text DEFAULT NULL,
  `Requisitos` text DEFAULT NULL,
  `Empresa_ID` int(11) NOT NULL,
  `usuario_sistema_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`Matricula`),
  ADD KEY `fk_Aluno_usuario_sistema1_idx` (`usuario_sistema_ID`);

--
-- Índices de tabela `candidatura`
--
ALTER TABLE `candidatura`
  ADD PRIMARY KEY (`Vaga_Numero`,`Aluno_Matricula`),
  ADD KEY `fk_Vaga_has_Aluno_Aluno1_idx` (`Aluno_Matricula`),
  ADD KEY `fk_Vaga_has_Aluno_Vaga_idx` (`Vaga_Numero`);

--
-- Índices de tabela `curriculo`
--
ALTER TABLE `curriculo`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `fk_Currículo_Aluno1_idx` (`Aluno_Matricula`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Curso_Currículo1_idx` (`Curriculo_Codigo`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ID`,`Entrevista_Codigo`);

--
-- Índices de tabela `entrevista`
--
ALTER TABLE `entrevista`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `fk_Entrevista_candidatura1_idx` (`candidatura_Vaga_Numero`,`candidatura_Aluno_Matricula`);

--
-- Índices de tabela `experiencias_profissionais`
--
ALTER TABLE `experiencias_profissionais`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Experiências_Profissionais_Currículo1_idx` (`Curriculo_Codigo`);

--
-- Índices de tabela `formacao`
--
ALTER TABLE `formacao`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Formação_Currículo1_idx` (`Curriculo_Codigo`),
  ADD KEY `fk_Formação_Grau_Escolaridade1_idx` (`Grau_Escolaridade_id`);

--
-- Índices de tabela `grau_escolaridade`
--
ALTER TABLE `grau_escolaridade`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `resultado_entrevista`
--
ALTER TABLE `resultado_entrevista`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Resultado_Entrevista_Entrevista1_idx` (`Entrevista_Codigo`);

--
-- Índices de tabela `usuario_sistema`
--
ALTER TABLE `usuario_sistema`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_usurio_sistema_Perfil1_idx` (`Perfil_ID`);

--
-- Índices de tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `fk_Vaga_Empresa1_idx` (`Empresa_ID`),
  ADD KEY `fk_Vaga_usuario_sistema1_idx` (`usuario_sistema_ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `curriculo`
--
ALTER TABLE `curriculo`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `entrevista`
--
ALTER TABLE `entrevista`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `experiencias_profissionais`
--
ALTER TABLE `experiencias_profissionais`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `formacao`
--
ALTER TABLE `formacao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `resultado_entrevista`
--
ALTER TABLE `resultado_entrevista`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vaga`
--
ALTER TABLE `vaga`
  MODIFY `Numero` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_Aluno_usuario_sistema1` FOREIGN KEY (`usuario_sistema_ID`) REFERENCES `usuario_sistema` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `candidatura`
--
ALTER TABLE `candidatura`
  ADD CONSTRAINT `fk_Vaga_has_Aluno_Aluno1` FOREIGN KEY (`Aluno_Matricula`) REFERENCES `aluno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vaga_has_Aluno_Vaga` FOREIGN KEY (`Vaga_Numero`) REFERENCES `vaga` (`Numero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `curriculo`
--
ALTER TABLE `curriculo`
  ADD CONSTRAINT `fk_Currículo_Aluno1` FOREIGN KEY (`Aluno_Matricula`) REFERENCES `aluno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_Curso_Currículo1` FOREIGN KEY (`Curriculo_Codigo`) REFERENCES `curriculo` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `entrevista`
--
ALTER TABLE `entrevista`
  ADD CONSTRAINT `fk_Entrevista_candidatura1` FOREIGN KEY (`candidatura_Vaga_Numero`,`candidatura_Aluno_Matricula`) REFERENCES `candidatura` (`Vaga_Numero`, `Aluno_Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `experiencias_profissionais`
--
ALTER TABLE `experiencias_profissionais`
  ADD CONSTRAINT `fk_Experiências_Profissionais_Currículo1` FOREIGN KEY (`Curriculo_Codigo`) REFERENCES `curriculo` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `formacao`
--
ALTER TABLE `formacao`
  ADD CONSTRAINT `fk_Formação_Currículo1` FOREIGN KEY (`Curriculo_Codigo`) REFERENCES `curriculo` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Formação_Grau_Escolaridade1` FOREIGN KEY (`Grau_Escolaridade_id`) REFERENCES `grau_escolaridade` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `resultado_entrevista`
--
ALTER TABLE `resultado_entrevista`
  ADD CONSTRAINT `fk_Resultado_Entrevista_Entrevista1` FOREIGN KEY (`Entrevista_Codigo`) REFERENCES `entrevista` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `usuario_sistema`
--
ALTER TABLE `usuario_sistema`
  ADD CONSTRAINT `fk_usurio_sistema_Perfil1` FOREIGN KEY (`Perfil_ID`) REFERENCES `perfil` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `vaga`
--
ALTER TABLE `vaga`
  ADD CONSTRAINT `fk_Vaga_Empresa1` FOREIGN KEY (`Empresa_ID`) REFERENCES `empresa` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vaga_usuario_sistema1` FOREIGN KEY (`usuario_sistema_ID`) REFERENCES `usuario_sistema` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
