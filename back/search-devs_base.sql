-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Dez-2022 às 04:54
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
-- Banco de dados: `search-devs_base`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE `area` (
  `Area_ID` int(11) NOT NULL,
  `Area_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`Area_ID`, `Area_name`) VALUES
(1, 'Artificial Intelligente'),
(2, 'Database Analytics'),
(3, 'Desktop Development'),
(4, 'Web - Back End'),
(5, 'Blockchain'),
(6, 'Data Science'),
(7, 'DevOps'),
(8, 'Web - Front End'),
(9, 'Cybersecurity'),
(10, 'Design'),
(11, 'Mobile Development'),
(12, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_dev`
--

CREATE TABLE `area_dev` (
  `Area_ID` int(11) DEFAULT NULL,
  `Dev_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `area_dev`
--

INSERT INTO `area_dev` (`Area_ID`, `Dev_ID`) VALUES
(10, 1),
(4, 1),
(8, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_project`
--

CREATE TABLE `area_project` (
  `Area_ID` int(11) DEFAULT NULL,
  `Proj_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `area_project`
--

INSERT INTO `area_project` (`Area_ID`, `Proj_ID`) VALUES
(10, 1),
(4, 1),
(8, 1),
(12, 1),
(4, 2),
(8, 2),
(12, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `company`
--

CREATE TABLE `company` (
  `Comp_ID` int(11) NOT NULL,
  `Comp_name` varchar(75) DEFAULT NULL,
  `Comp_email` varchar(150) DEFAULT NULL,
  `Comp_pass` varchar(150) DEFAULT NULL,
  `Comp_cnpj` varchar(18) DEFAULT NULL,
  `Comp_num` varchar(50) DEFAULT NULL,
  `Comp_user` varchar(400) NOT NULL,
  `Comp_responsible` varchar(300) NOT NULL,
  `Comp_cpf` varchar(400) NOT NULL,
  `Comp_date` varchar(10) NOT NULL,
  `Comp_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `company`
--

INSERT INTO `company` (`Comp_ID`, `Comp_name`, `Comp_email`, `Comp_pass`, `Comp_cnpj`, `Comp_num`, `Comp_user`, `Comp_responsible`, `Comp_cpf`, `Comp_date`, `Comp_description`) VALUES
(1, 'Search Devs', 'searchdevs@gmail.com', '25d55ad283aa400af464c76d713c07ad', '97.324.754/0001-39', '(11) 96289-1250', 'searchdevs', 'pessoa maneira legal', '578.741.558-23', '07/03/2005', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `developers`
--

CREATE TABLE `developers` (
  `Dev_ID` int(11) NOT NULL,
  `Dev_name` varchar(400) DEFAULT NULL,
  `Dev_username` varchar(400) DEFAULT NULL,
  `Dev_email` varchar(150) DEFAULT NULL,
  `Dev_pass` varchar(150) DEFAULT NULL,
  `Dev_Num` varchar(50) DEFAULT NULL,
  `Dev_cep` varchar(9) DEFAULT NULL,
  `Dev_cpf` varchar(14) DEFAULT NULL,
  `Dev_born` varchar(10) DEFAULT NULL,
  `Dev_sex` char(1) DEFAULT NULL,
  `dev_description` text DEFAULT NULL,
  `dev_office` text DEFAULT NULL,
  `dev_xp` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `developers`
--

INSERT INTO `developers` (`Dev_ID`, `Dev_name`, `Dev_username`, `Dev_email`, `Dev_pass`, `Dev_Num`, `Dev_cep`, `Dev_cpf`, `Dev_born`, `Dev_sex`, `dev_description`, `dev_office`, `dev_xp`) VALUES
(1, 'Emily Leme Silva', 'catmiih', 'emilyleme.dev@gmail.com', '25d55ad283aa400af464c76d713c07ad', '(11) 96289-1250', '08062-670', '578.741.558-23', '07/03/2005', 'F', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dev_ideal`
--

CREATE TABLE `dev_ideal` (
  `Dev_ID` int(11) DEFAULT NULL,
  `Proj_ID` int(11) DEFAULT NULL,
  `points` int(5) NOT NULL,
  `dev_accept` int(1) NOT NULL DEFAULT 0,
  `comp_accept` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dev_ideal`
--

INSERT INTO `dev_ideal` (`Dev_ID`, `Proj_ID`, `points`, `dev_accept`, `comp_accept`) VALUES
(1, 1, 1000, 1, 0),
(1, 2, 1000, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `path` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `project`
--

CREATE TABLE `project` (
  `Proj_ID` int(11) NOT NULL,
  `Proj_name` varchar(100) DEFAULT NULL,
  `Proj_time` int(2) DEFAULT NULL,
  `Proj_start` varchar(10) NOT NULL,
  `Proj_end` varchar(10) NOT NULL,
  `Proj_hourPay` float NOT NULL,
  `Proj_pay` float DEFAULT NULL,
  `Proj_dev` int(11) DEFAULT NULL,
  `Proj_comp` int(11) DEFAULT NULL,
  `Proj_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `project`
--

INSERT INTO `project` (`Proj_ID`, `Proj_name`, `Proj_time`, `Proj_start`, `Proj_end`, `Proj_hourPay`, `Proj_pay`, `Proj_dev`, `Proj_comp`, `Proj_desc`) VALUES
(1, 'Site de vendas', 3, '2023-01-25', '2023-07-26', 18, 9952.96, NULL, 1, 'Esse Ã© meu novo projeto!'),
(2, 'Site de PetShop', 7, '2022-12-21', '2022-12-27', 18, 800.97, NULL, 1, 'Esse Ã© meu novo projeto!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `skills`
--

CREATE TABLE `skills` (
  `Skill_ID` int(11) NOT NULL,
  `Skill_name` varchar(50) DEFAULT NULL,
  `Skill_area` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `skills`
--

INSERT INTO `skills` (`Skill_ID`, `Skill_name`, `Skill_area`) VALUES
(1, 'HTML5', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `skills_dev`
--

CREATE TABLE `skills_dev` (
  `Dev_ID` int(11) DEFAULT NULL,
  `Skill_ID` int(11) DEFAULT NULL,
  `Skill_level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `skills_dev`
--

INSERT INTO `skills_dev` (`Dev_ID`, `Skill_ID`, `Skill_level`) VALUES
(1, 1, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `skills_proj`
--

CREATE TABLE `skills_proj` (
  `Proj_ID` int(11) DEFAULT NULL,
  `Skill_ID` int(11) DEFAULT NULL,
  `Skill_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `skills_proj`
--

INSERT INTO `skills_proj` (`Proj_ID`, `Skill_ID`, `Skill_level`) VALUES
(1, 1, 4),
(2, 1, 5);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`Area_ID`);

--
-- Índices para tabela `area_dev`
--
ALTER TABLE `area_dev`
  ADD KEY `fk_area-dev` (`Area_ID`),
  ADD KEY `fk_area-dev2` (`Dev_ID`);

--
-- Índices para tabela `area_project`
--
ALTER TABLE `area_project`
  ADD KEY `fk_area-proj` (`Area_ID`),
  ADD KEY `fk_proj-id-area` (`Proj_ID`);

--
-- Índices para tabela `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Comp_ID`);

--
-- Índices para tabela `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`Dev_ID`);

--
-- Índices para tabela `dev_ideal`
--
ALTER TABLE `dev_ideal`
  ADD KEY `fk_devideal` (`Dev_ID`),
  ADD KEY `fk_projideal` (`Proj_ID`);

--
-- Índices para tabela `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

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
-- Índices para tabela `skills_proj`
--
ALTER TABLE `skills_proj`
  ADD KEY `fk_project` (`Proj_ID`),
  ADD KEY `fk_skill_proj` (`Skill_ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `Area_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `company`
--
ALTER TABLE `company`
  MODIFY `Comp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `developers`
--
ALTER TABLE `developers`
  MODIFY `Dev_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project`
--
ALTER TABLE `project`
  MODIFY `Proj_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `skills`
--
ALTER TABLE `skills`
  MODIFY `Skill_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `area_dev`
--
ALTER TABLE `area_dev`
  ADD CONSTRAINT `fk_area-dev` FOREIGN KEY (`Area_ID`) REFERENCES `area` (`Area_ID`),
  ADD CONSTRAINT `fk_area-dev2` FOREIGN KEY (`Dev_ID`) REFERENCES `developers` (`Dev_ID`);

--
-- Limitadores para a tabela `area_project`
--
ALTER TABLE `area_project`
  ADD CONSTRAINT `fk_area-proj` FOREIGN KEY (`Area_ID`) REFERENCES `area` (`Area_ID`),
  ADD CONSTRAINT `fk_proj-id-area` FOREIGN KEY (`Proj_ID`) REFERENCES `project` (`Proj_ID`);

--
-- Limitadores para a tabela `dev_ideal`
--
ALTER TABLE `dev_ideal`
  ADD CONSTRAINT `fk_devideal` FOREIGN KEY (`Dev_ID`) REFERENCES `developers` (`Dev_ID`),
  ADD CONSTRAINT `fk_projideal` FOREIGN KEY (`Proj_ID`) REFERENCES `project` (`Proj_ID`);

--
-- Limitadores para a tabela `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_proj_comp` FOREIGN KEY (`Proj_comp`) REFERENCES `company` (`Comp_ID`),
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
-- Limitadores para a tabela `skills_proj`
--
ALTER TABLE `skills_proj`
  ADD CONSTRAINT `fk_project` FOREIGN KEY (`Proj_ID`) REFERENCES `project` (`Proj_ID`),
  ADD CONSTRAINT `fk_skill_proj` FOREIGN KEY (`Skill_ID`) REFERENCES `skills` (`Skill_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
