-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Dez-2022 às 19:46
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `formulariocontratante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratante`
--

CREATE TABLE `contratante` (
  `idContratante` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `CPF` varchar(30) NOT NULL,
  `RG` varchar(30) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Profissao` varchar(255) DEFAULT NULL,
  `Sexo` varchar(20) NOT NULL,
  `Celular` varchar(30) NOT NULL,
  `Telefone` varchar(30) NOT NULL,
  `EstadoCivil` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `contratante`
--

INSERT INTO `contratante` (`idContratante`, `Nome`, `CPF`, `RG`, `DataNascimento`, `Profissao`, `Sexo`, `Celular`, `Telefone`, `EstadoCivil`, `Email`) VALUES
(61, 'Bruno Deluca Satil Cassiano', '01993233644', 'MG94985856', '2002-03-16', 'Programador ', 'M', '4241412512512', '5232624723445', 3, 'brunocassiano@gmail.com'),
(62, 'Samuel Rodrigues de Araújo', '70177346612', 'MG35657458', '2000-07-11', 'Social Media', 'M', '32988233565', '32988233565', 1, 'samueldesigner25@gmail.com'),
(65, 'Maria Freire de Fátima', '11908755443', 'RJ41254552', '1998-06-17', 'Atriz', 'F', '3298485559445', '219222424242', 4, 'mariafreire@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dependente`
--

CREATE TABLE `dependente` (
  `idDependente` int(11) NOT NULL,
  `NomeDependente` varchar(255) NOT NULL,
  `DataNascimentoDependente` date NOT NULL,
  `GrauParentesco` varchar(200) NOT NULL,
  `CPFDependente` varchar(30) NOT NULL,
  `FK_Dependente_Contratante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `dependente`
--

INSERT INTO `dependente` (`idDependente`, `NomeDependente`, `DataNascimentoDependente`, `GrauParentesco`, `CPFDependente`, `FK_Dependente_Contratante`) VALUES
(42, '', '0000-00-00', '', '', 61),
(43, 'Joana', '2013-07-06', 'Tia', '4125136277', 61),
(44, 'Antonio', '2002-07-18', 'Tio', '4141241556', 61),
(45, 'Maria Aparecida Rodrigues', '1970-06-16', 'Mãe', '62908243687', 62),
(46, 'Misael Rodrigues de Araújo', '1999-05-14', 'Irmão', '254865742180', 62),
(47, 'João Mangues de Freire', '2006-10-05', 'Irmão', '4466288929088', 65),
(48, 'Misandra Oliveira de Fátima', '1953-03-13', 'Mãe', '2557990333889', 65);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `RazaoSocial` varchar(255) NOT NULL,
  `NomeFantasia` varchar(255) NOT NULL,
  `Telefone` varchar(30) NOT NULL,
  `Celular` varchar(30) NOT NULL,
  `Endereco` varchar(255) NOT NULL,
  `Numero` varchar(10) NOT NULL,
  `Bairro` varchar(200) NOT NULL,
  `Cidade` varchar(200) NOT NULL,
  `UF` int(11) NOT NULL,
  `CEP` varchar(20) NOT NULL,
  `Complemento` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `RazaoDoResponsavel` varchar(255) NOT NULL,
  `PIS/NIT` varchar(50) NOT NULL,
  `CPF` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `Endereco` varchar(255) NOT NULL,
  `Numero` varchar(30) NOT NULL,
  `Bairro` varchar(255) NOT NULL,
  `Cidade` varchar(200) NOT NULL,
  `Estado` int(11) NOT NULL,
  `CEP` varchar(20) NOT NULL,
  `FK_Endereco_Contratante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idEndereco`, `Endereco`, `Numero`, `Bairro`, `Cidade`, `Estado`, `CEP`, `FK_Endereco_Contratante`) VALUES
(28, 'Rua Lopo Cardoso', '21', 'Cardoso de Melo', 'Muriaé', 13, '36887209', 61),
(29, 'Rua Boa Esperança', '82', 'Dornelas', 'Muriaé', 13, '36884182', 62),
(39, 'Rua Guimarães Peixoto', '22', 'Fernandez Alcantra', 'Baixada Toronto', 3, '45525552', 65);

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano`
--

CREATE TABLE `plano` (
  `idPlano` int(11) NOT NULL,
  `Plano` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `plano`
--

INSERT INTO `plano` (`idPlano`, `Plano`) VALUES
(1, 'Plano Premium'),
(3, 'Plano Sênior'),
(4, 'Plano Simples'),
(5, 'Plano Vitalício'),
(6, 'Plano Avançado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planocontratado`
--

CREATE TABLE `planocontratado` (
  `idPlanoContratado` int(11) NOT NULL,
  `PlanoContratado` int(11) NOT NULL,
  `MetodoCobranca` int(11) NOT NULL,
  `Valor` float NOT NULL,
  `Vencimento` date NOT NULL,
  `FK_PlanoContratado_Contratante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `planocontratado`
--

INSERT INTO `planocontratado` (`idPlanoContratado`, `PlanoContratado`, `MetodoCobranca`, `Valor`, `Vencimento`, `FK_PlanoContratado_Contratante`) VALUES
(15, 4, 3, 649, '2022-12-31', 61),
(18, 6, 2, 499, '2023-06-17', 62),
(20, 4, 2, 56, '2023-06-16', 65);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contratante`
--
ALTER TABLE `contratante`
  ADD PRIMARY KEY (`idContratante`),
  ADD UNIQUE KEY `CPF` (`CPF`),
  ADD UNIQUE KEY `RG` (`RG`);

--
-- Índices para tabela `dependente`
--
ALTER TABLE `dependente`
  ADD PRIMARY KEY (`idDependente`),
  ADD KEY `FK_Dependente_Contratante` (`FK_Dependente_Contratante`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `FK_Endereco_Contratante` (`FK_Endereco_Contratante`);

--
-- Índices para tabela `plano`
--
ALTER TABLE `plano`
  ADD PRIMARY KEY (`idPlano`);

--
-- Índices para tabela `planocontratado`
--
ALTER TABLE `planocontratado`
  ADD PRIMARY KEY (`idPlanoContratado`),
  ADD KEY `FK_PlanoContratado_Contratante` (`FK_PlanoContratado_Contratante`),
  ADD KEY `FK_PlanoContratado_Contrato` (`PlanoContratado`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contratante`
--
ALTER TABLE `contratante`
  MODIFY `idContratante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de tabela `dependente`
--
ALTER TABLE `dependente`
  MODIFY `idDependente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de tabela `plano`
--
ALTER TABLE `plano`
  MODIFY `idPlano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `planocontratado`
--
ALTER TABLE `planocontratado`
  MODIFY `idPlanoContratado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `dependente`
--
ALTER TABLE `dependente`
  ADD CONSTRAINT `FK_Dependente_Contratante` FOREIGN KEY (`FK_Dependente_Contratante`) REFERENCES `contratante` (`idContratante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `FK_Endereco_Contratante` FOREIGN KEY (`FK_Endereco_Contratante`) REFERENCES `contratante` (`idContratante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `planocontratado`
--
ALTER TABLE `planocontratado`
  ADD CONSTRAINT `FK_PlanoContratado_Contratante` FOREIGN KEY (`FK_PlanoContratado_Contratante`) REFERENCES `contratante` (`idContratante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PlanoContratado_Contrato` FOREIGN KEY (`PlanoContratado`) REFERENCES `plano` (`idPlano`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
