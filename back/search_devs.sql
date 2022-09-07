-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Set-2022 às 22:29
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `search_devs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE `area` (
  `Area_ID` int(11) NOT NULL,
  `Area_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `developers`
--

CREATE TABLE `developers` (
  `Dev_ID` int(11) NOT NULL,
  `Dev_name` varchar(400) DEFAULT NULL,
  `Dev_lastN` varchar(400) DEFAULT NULL,
  `Dev_email` varchar(150) DEFAULT NULL,
  `Dev_pass` varchar(150) DEFAULT NULL,
  `Dev_Num` varchar(50) DEFAULT NULL,
  `Dev_cep` varchar(8) DEFAULT NULL,
  `Dev_cpf` varchar(14) DEFAULT NULL,
  `Dev_born` varchar(10) DEFAULT NULL,
  `Dev_sex` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dev_ideal`
--

CREATE TABLE `dev_ideal` (
  `Ideal_area` int(11) DEFAULT NULL,
  `Ideal_hour` int(20) DEFAULT NULL,
  `Ideal_pay` float DEFAULT NULL,
  `Ideal_dev` int(11) DEFAULT NULL,
  `Ideal_skill` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `Comp_ID` int(11) NOT NULL,
  `Comp_name` varchar(75) DEFAULT NULL,
  `Comp_email` varchar(150) DEFAULT NULL,
  `Comp_pass` varchar(150) DEFAULT NULL,
  `Comp_cnpj` varchar(18) DEFAULT NULL,
  `Comp_num` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `project`
--

CREATE TABLE `project` (
  `Proj_ID` int(11) NOT NULL,
  `Proj_name` varchar(100) DEFAULT NULL,
  `Proj_type` int(11) DEFAULT NULL,
  `Proj_start` varchar(10) DEFAULT NULL,
  `Proj_end` varchar(10) DEFAULT NULL,
  `Proj_pay` float DEFAULT NULL,
  `Proj_dev` int(11) DEFAULT NULL,
  `Proj_comp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `skills`
--

CREATE TABLE `skills` (
  `Skill_ID` int(11) NOT NULL,
  `Skill_name` varchar(50) DEFAULT NULL,
  `Skill_area` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `skills_dev`
--

CREATE TABLE `skills_dev` (
  `Dev_ID` int(11) DEFAULT NULL,
  `Skill_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `skill_proj`
--

CREATE TABLE `skill_proj` (
  `Proj_ID` int(11) DEFAULT NULL,
  `Skill_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`Area_ID`);

--
-- Índices para tabela `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`Dev_ID`);

--
-- Índices para tabela `dev_ideal`
--
ALTER TABLE `dev_ideal`
  ADD KEY `fk_ideal_area` (`Ideal_area`),
  ADD KEY `fk_ideal_dev` (`Ideal_dev`),
  ADD KEY `fk_ideal_skill` (`Ideal_skill`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Comp_ID`);

--
-- Índices para tabela `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Proj_ID`),
  ADD KEY `fk_proj_dev` (`Proj_dev`),
  ADD KEY `fk_proj_comp` (`Proj_comp`);

--
-- Índices para tabela `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`Skill_ID`),
  ADD KEY `fk_area` (`Skill_area`);

--
-- Índices para tabela `skills_dev`
--
ALTER TABLE `skills_dev`
  ADD KEY `fk_dev` (`Dev_ID`),
  ADD KEY `fk_skills` (`Skill_ID`);

--
-- Índices para tabela `skill_proj`
--
ALTER TABLE `skill_proj`
  ADD KEY `fk_project` (`Proj_ID`),
  ADD KEY `fk_skill_proj` (`Skill_ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `Area_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `developers`
--
ALTER TABLE `developers`
  MODIFY `Dev_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `Comp_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project`
--
ALTER TABLE `project`
  MODIFY `Proj_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `skills`
--
ALTER TABLE `skills`
  MODIFY `Skill_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `dev_ideal`
--
ALTER TABLE `dev_ideal`
  ADD CONSTRAINT `fk_ideal_area` FOREIGN KEY (`Ideal_area`) REFERENCES `area` (`Area_ID`),
  ADD CONSTRAINT `fk_ideal_dev` FOREIGN KEY (`Ideal_dev`) REFERENCES `developers` (`Dev_ID`),
  ADD CONSTRAINT `fk_ideal_skill` FOREIGN KEY (`Ideal_skill`) REFERENCES `skills` (`Skill_ID`);

--
-- Limitadores para a tabela `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_proj_comp` FOREIGN KEY (`Proj_comp`) REFERENCES `empresa` (`Comp_ID`),
  ADD CONSTRAINT `fk_proj_dev` FOREIGN KEY (`Proj_dev`) REFERENCES `developers` (`Dev_ID`);

--
-- Limitadores para a tabela `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `fk_area` FOREIGN KEY (`Skill_area`) REFERENCES `area` (`Area_ID`);

--
-- Limitadores para a tabela `skills_dev`
--
ALTER TABLE `skills_dev`
  ADD CONSTRAINT `fk_dev` FOREIGN KEY (`Dev_ID`) REFERENCES `developers` (`Dev_ID`),
  ADD CONSTRAINT `fk_skills` FOREIGN KEY (`Skill_ID`) REFERENCES `skills` (`Skill_ID`);

--
-- Limitadores para a tabela `skill_proj`
--
ALTER TABLE `skill_proj`
  ADD CONSTRAINT `fk_project` FOREIGN KEY (`Proj_ID`) REFERENCES `project` (`Proj_ID`),
  ADD CONSTRAINT `fk_skill_proj` FOREIGN KEY (`Skill_ID`) REFERENCES `skills` (`Skill_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
