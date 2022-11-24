-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Nov-2022 às 23:26
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

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
(1, 2),
(2, 2),
(6, 2),
(2, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_project`
--

CREATE TABLE `area_project` (
  `Area_ID` int(11) DEFAULT NULL,
  `Proj_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'SearchDevs', 'searchdevs@gmail.com', '25d55ad283aa400af464c76d713c07ad', '16.554.666/0001-21', '(99) 99999-9999', 'searchdevs', 'Emily Leme', '123.456.789-09', '07/03/2005', 'Super empresa foda');

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
  `dev_office` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `developers`
--

INSERT INTO `developers` (`Dev_ID`, `Dev_name`, `Dev_username`, `Dev_email`, `Dev_pass`, `Dev_Num`, `Dev_cep`, `Dev_cpf`, `Dev_born`, `Dev_sex`, `dev_description`, `dev_office`) VALUES
(1, 'Emily Leme Silva', 'catmiih', 'emilyleme.dev@gmail.com', '5ffbcf53a6c3433752586d6aea67e7e1', '(11) 96289-1250', '', 'Emily Leme', '123.456.78', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.', 'Analista'),
(2, 'Gustavo Cardoso Barros', 'GusCardoso', 'gustavocardoso@gmail.com', '25d55ad283aa400af464c76d713c07ad', '(99) 99999-9999', '08062-670', '123.456.789-09', '29/11/2005', 'M', NULL, 'Nenhum cargo');

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
  `Proj_type` int(11) DEFAULT NULL,
  `Proj_start` varchar(10) DEFAULT NULL,
  `Proj_end` varchar(10) DEFAULT NULL,
  `Proj_pay` float DEFAULT NULL,
  `Proj_dev` int(11) DEFAULT NULL,
  `Proj_comp` int(11) DEFAULT NULL,
  `Proj_level` int(2) NOT NULL
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

--
-- Extraindo dados da tabela `skills`
--

INSERT INTO `skills` (`Skill_ID`, `Skill_name`, `Skill_area`) VALUES
(1, 'HTML5', 8),
(2, 'CSS3', 8),
(3, 'PHP', 4),
(4, 'SQL', 2),
(5, '', 4),
(6, 'CSS', 8),
(7, 'Linux', 9),
(8, 'JavaScript', 8);

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
(1, 5, 5),
(1, 1, 5),
(2, 7, 5),
(2, 4, 1),
(2, 3, 3),
(1, 8, 3),
(2, 5, 3);

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
  ADD KEY `fk_ideal_area` (`Ideal_area`),
  ADD KEY `fk_ideal_dev` (`Ideal_dev`),
  ADD KEY `fk_ideal_skill` (`Ideal_skill`);

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
  MODIFY `Dev_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project`
--
ALTER TABLE `project`
  MODIFY `Proj_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `skills`
--
ALTER TABLE `skills`
  MODIFY `Skill_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `fk_ideal_area` FOREIGN KEY (`Ideal_area`) REFERENCES `area` (`Area_ID`),
  ADD CONSTRAINT `fk_ideal_dev` FOREIGN KEY (`Ideal_dev`) REFERENCES `developers` (`Dev_ID`),
  ADD CONSTRAINT `fk_ideal_skill` FOREIGN KEY (`Ideal_skill`) REFERENCES `skills` (`Skill_ID`);

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
-- Limitadores para a tabela `skill_proj`
--
ALTER TABLE `skill_proj`
  ADD CONSTRAINT `fk_project` FOREIGN KEY (`Proj_ID`) REFERENCES `project` (`Proj_ID`),
  ADD CONSTRAINT `fk_skill_proj` FOREIGN KEY (`Skill_ID`) REFERENCES `skills` (`Skill_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
