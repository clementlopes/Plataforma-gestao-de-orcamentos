-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Dez-2025 às 18:39
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gestao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigos`
--

CREATE TABLE `artigos` (
  `ID_ARTIGOS` int(11) NOT NULL,
  `NOME` varchar(55) NOT NULL,
  `DESCRICAO` varchar(55) DEFAULT NULL,
  `PRECOUNITARIO` decimal(10,2) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `ID_ART_UNIDADE` int(11) NOT NULL,
  `ID_ART_CATEGORIA` int(11) NOT NULL,
  `ID_ART_IVA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `artigos`
--

INSERT INTO `artigos` (`ID_ARTIGOS`, `NOME`, `DESCRICAO`, `PRECOUNITARIO`, `QUANTIDADE`, `ID_ART_UNIDADE`, `ID_ART_CATEGORIA`, `ID_ART_IVA`) VALUES
(1, 'Artigo editavel', 'EX. Conjunto de artigos', 1.00, 1, 1, 6, 1),
(2, 'Teclado Mecânico Logitech G512 Carbon RGB PT ', 'Teclado mecânico RGB para jogos Logitech G512 CARBON LI', 99.90, 1, 1, 3, 1),
(3, 'Rato Óptico Logitech G502 X Plus Lightspeed RGB Wireles', 'O rato para jogos G502 é o rato mais popular do mundo. ', 139.90, 1, 1, 4, 1),
(5, 'Portátil Lenovo Legion 5i (10ª Geração) 15IRX10-426', 'Intel Core i9-14900HX | Free DOS | 32GB RAM | OLED WQXG', 1599.99, 1, 1, 5, 1),
(7, 'Desktop Gaming VIST', 'Desktop Gaming VIST Ryzen 7 5700G Ram 32Gb Ssd 1Tb M.2 ', 805.99, 1, 1, 1, 1),
(8, 'Monitor Xiomi 34', ' 	Monitor Xiomi 34\" UW 1MS', 365.50, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `NOME` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`ID_CATEGORIA`, `NOME`) VALUES
(1, 'Computadores'),
(2, 'Monitores'),
(3, 'Teclados'),
(4, 'Ratos'),
(5, 'Portateis'),
(6, 'Geral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `ID_CATEGORIAS` int(11) NOT NULL,
  `NOME` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`ID_CATEGORIAS`, `NOME`) VALUES
(1, 'Reparação'),
(2, 'Deslocação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cheques`
--

CREATE TABLE `cheques` (
  `ID_CHEQUES` int(11) NOT NULL,
  `FORNECEDOR` varchar(255) NOT NULL,
  `DATA_EMITIDA` date NOT NULL,
  `DATA_PAGAMENTO` date NOT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  `ID_CHEQUES_DIAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `cheques`
--

INSERT INTO `cheques` (`ID_CHEQUES`, `FORNECEDOR`, `DATA_EMITIDA`, `DATA_PAGAMENTO`, `VALOR`, `ID_CHEQUES_DIAS`) VALUES
(1, 'Pc componentes', '2025-11-01', '2025-12-31', 236.50, 1),
(2, 'Global data', '2025-12-11', '2026-01-12', 149.99, 3),
(3, 'Global data', '2025-12-11', '2026-01-12', 149.99, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `ID_CLIENTES` int(11) NOT NULL,
  `NOME` varchar(55) NOT NULL,
  `RUA` varchar(55) DEFAULT NULL,
  `NUMERO` int(11) DEFAULT NULL,
  `CIDADE` varchar(55) DEFAULT NULL,
  `POSTAL` varchar(8) DEFAULT NULL,
  `CONTATO` varchar(20) NOT NULL,
  `NIF` varchar(40) DEFAULT NULL,
  `EMAIL` varchar(55) DEFAULT NULL,
  `NASCIMENTO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`ID_CLIENTES`, `NOME`, `RUA`, `NUMERO`, `CIDADE`, `POSTAL`, `CONTATO`, `NIF`, `EMAIL`, `NASCIMENTO`) VALUES
(1, 'Álvaro Mendes', 'Rua do Limoeiro', 128, 'Porto', '4050-321', ' 963 852 741', '000000009', 'Alvaro@mail.com', '1995-01-10'),
(2, 'Sílvia Duarte', 'Avenida da Ribeira', 72, 'Lisboa', '1900-442', '914 258 369', '000000009', 'silvia@mail.com', '1985-12-11'),
(3, 'Ana Duarte', 'Rua das Flores', 128, 'Porto', '4000-013', '963 852 741', '000 000 009', 'ana.duarte@mail.com', '1989-02-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dias_pagamento`
--

CREATE TABLE `dias_pagamento` (
  `ID_DIAS` int(11) NOT NULL,
  `DIAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `dias_pagamento`
--

INSERT INTO `dias_pagamento` (`ID_DIAS`, `DIAS`) VALUES
(1, 30),
(2, 60),
(3, 90);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `ID_EMPRESA` int(11) NOT NULL,
  `NOME` varchar(55) NOT NULL,
  `NOME_COMERCIAL` varchar(55) DEFAULT NULL,
  `RUA` varchar(55) NOT NULL,
  `CIDADE` varchar(255) NOT NULL,
  `CODIGOPOSTAL` varchar(55) NOT NULL,
  `NIF` varchar(40) NOT NULL,
  `IBAN` varchar(55) NOT NULL,
  `CONTACTO` varchar(20) NOT NULL,
  `EMAIL` varchar(55) NOT NULL,
  `WEBSITE` varchar(55) DEFAULT NULL,
  `LOGO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`ID_EMPRESA`, `NOME`, `NOME_COMERCIAL`, `RUA`, `CIDADE`, `CODIGOPOSTAL`, `NIF`, `IBAN`, `CONTACTO`, `EMAIL`, `WEBSITE`, `LOGO`) VALUES
(1, 'empresa ficticia', 'Fictitius', 'Parque Empresarial de Gaia, Edifício B7', 'Vila Nova de Gaia', '4400-345', '000 000 009', 'PT50 0000 0000 0000 0000 0000 0', '930 258 369', 'fictitius@geral.pt', 'www.fictitius.pt', 'img/logo.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `iva`
--

CREATE TABLE `iva` (
  `ID_IVA` int(11) NOT NULL,
  `IVA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `iva`
--

INSERT INTO `iva` (`ID_IVA`, `IVA`) VALUES
(1, 23),
(2, 14),
(3, 6),
(4, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `ID_ORCAMENTO` int(11) NOT NULL,
  `TIPO` int(11) NOT NULL,
  `DATA` date NOT NULL,
  `OBSERVACOES` varchar(255) NOT NULL,
  `ID_ORC_CLIENTES` int(11) NOT NULL,
  `ID_ORC_UTILIZADORES` int(11) NOT NULL,
  `ID_ORC_EMPRESA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`ID_ORCAMENTO`, `TIPO`, `DATA`, `OBSERVACOES`, `ID_ORC_CLIENTES`, `ID_ORC_UTILIZADORES`, `ID_ORC_EMPRESA`) VALUES
(5, 4, '2025-12-11', 'Orçamento valido por 30 dias.', 1, 4, 1),
(6, 3, '2025-12-11', '', 2, 5, 1),
(7, 2, '2025-12-11', '', 3, 5, 1),
(8, 1, '2025-12-11', '', 1, 5, 1),
(9, 1, '2025-12-11', '', 2, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orc_art_ser`
--

CREATE TABLE `orc_art_ser` (
  `ID_ORC_ART_SER` int(11) NOT NULL,
  `ID_OAS_ORCAMENTO` int(11) NOT NULL,
  `ID_OAS_ARTIGOS` int(11) DEFAULT NULL,
  `ID_OAS_SERVICOS` int(11) DEFAULT NULL,
  `NOME` varchar(255) DEFAULT NULL,
  `DESCRICAO` varchar(255) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `PRECO` decimal(10,2) NOT NULL,
  `DESCONTO` decimal(10,2) NOT NULL,
  `OAS_IVA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `orc_art_ser`
--

INSERT INTO `orc_art_ser` (`ID_ORC_ART_SER`, `ID_OAS_ORCAMENTO`, `ID_OAS_ARTIGOS`, `ID_OAS_SERVICOS`, `NOME`, `DESCRICAO`, `QUANTIDADE`, `PRECO`, `DESCONTO`, `OAS_IVA`) VALUES
(1, 5, 5, NULL, 'Portátil Lenovo Legion 5i (10ª Geração) 15IRX10-426', 'Intel Core i9-14900HX | Free DOS | 32GB RAM | OLED WQXG', 1, 1599.99, 0.00, 1),
(2, 5, NULL, 3, NULL, 'Deslocação técnica ao local para diagnóstico e intervenção', 2, 0.50, 50.00, 1),
(3, 6, NULL, 3, NULL, 'Deslocação técnica ao local para diagnóstico e intervenção', 10, 0.50, 0.00, 1),
(4, 6, NULL, 2, NULL, 'extração de informação de unidades avariadas', 2, 35.00, 0.00, 1),
(5, 7, 1, NULL, 'Monitor Xiomi 34\"', 'Monitor Xiomi 34\" UW 1MS', 1, 365.00, 10.00, 1),
(6, 7, 2, NULL, 'Teclado Mecânico Logitech G512 Carbon RGB PT ', 'Teclado mecânico RGB para jogos Logitech G512 CARBON LI', 1, 99.90, 0.00, 1),
(7, 7, 3, NULL, 'Rato Óptico Logitech G502 X Plus Lightspeed RGB Wireles', 'O rato para jogos G502 é o rato mais popular do mundo. ', 1, 139.90, 0.00, 1),
(8, 8, NULL, 1, NULL, 'limpeza de sistemas e restauração de integridade', 2, 25.00, 0.00, 1),
(9, 8, NULL, 2, NULL, 'extração de informação de unidades avariadas', 3, 35.00, 0.00, 1),
(10, 8, NULL, 3, NULL, 'Deslocação técnica ao local para diagnóstico e intervenção', 15, 0.50, 50.00, 1),
(11, 9, 1, NULL, 'Monitor Xiomi 34\"', 'Monitor Xiomi 34\" UW 1MS', 1, 365.00, 10.00, 1),
(12, 9, 2, NULL, 'Teclado Mecânico Logitech G512 Carbon RGB PT ', 'Teclado mecânico RGB para jogos Logitech G512 CARBON LI', 1, 99.90, 0.00, 1),
(13, 9, 3, NULL, 'Rato Óptico Logitech G502 X Plus Lightspeed RGB Wireles', 'O rato para jogos G502 é o rato mais popular do mundo. ', 1, 139.90, 0.00, 1),
(14, 9, 7, NULL, 'Desktop Gaming VIST', 'Desktop Gaming VIST Ryzen 7 5700G Ram 32Gb Ssd 1Tb M.2 ', 1, 805.99, 20.00, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `ID_SERVICOS` int(11) NOT NULL,
  `NOME` varchar(40) NOT NULL,
  `DESCRICAO` varchar(255) DEFAULT NULL,
  `PRECOUNITARIO` decimal(10,2) NOT NULL,
  `QUANTIDADE` int(10) NOT NULL,
  `ID_SER_UNIDADE` int(11) NOT NULL,
  `ID_SER_CATEGORIA` int(11) NOT NULL,
  `ID_SER_IVA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`ID_SERVICOS`, `NOME`, `DESCRICAO`, `PRECOUNITARIO`, `QUANTIDADE`, `ID_SER_UNIDADE`, `ID_SER_CATEGORIA`, `ID_SER_IVA`) VALUES
(1, 'Remoção de malware', 'limpeza de sistemas e restauração de integridade', 25.00, 1, 4, 1, 1),
(2, 'Recuperação de dados', 'extração de informação de unidades avariadas', 35.00, 1, 4, 1, 1),
(3, 'Deslocação', 'Deslocação técnica ao local para diagnóstico e intervenção', 0.50, 1, 7, 2, 1),
(4, 'Instalação e configuração de sistemas op', 'Instalação e configuração de sistemas operacionais', 15.00, 1, 4, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `ID_TIPO` int(11) NOT NULL,
  `NOME` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`ID_TIPO`, `NOME`) VALUES
(1, 'Administrador'),
(2, 'Funcionario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_orc`
--

CREATE TABLE `tipo_orc` (
  `ID_TIPO_ORC` int(11) NOT NULL,
  `NOME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tipo_orc`
--

INSERT INTO `tipo_orc` (`ID_TIPO_ORC`, `NOME`) VALUES
(1, 'Pedido'),
(2, 'Aceite'),
(3, 'Rejeitado'),
(4, 'Realizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades`
--

CREATE TABLE `unidades` (
  `ID_UNIDADE` int(11) NOT NULL,
  `NOME` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `unidades`
--

INSERT INTO `unidades` (`ID_UNIDADE`, `NOME`) VALUES
(1, 'un.'),
(2, 'm²'),
(3, 'm'),
(4, 'H'),
(5, 'Kg'),
(6, 'm³'),
(7, 'Km');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `ID_UTILIZADORES` int(11) NOT NULL,
  `NOME` varchar(55) NOT NULL,
  `USERNAME` varchar(25) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `EMAIL` varchar(55) NOT NULL,
  `TIPO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`ID_UTILIZADORES`, `NOME`, `USERNAME`, `PASSWORD`, `EMAIL`, `TIPO`) VALUES
(4, 'Utilizador', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@mail.com', 2),
(5, 'administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@mail.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `versao_pgo`
--

CREATE TABLE `versao_pgo` (
  `ID` int(11) NOT NULL,
  `VERSAO` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `versao_pgo`
--

INSERT INTO `versao_pgo` (`ID`, `VERSAO`) VALUES
(1, 'v.1.0.0');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`ID_ARTIGOS`),
  ADD KEY `ID_ARTIGOS_CAT` (`ID_ART_CATEGORIA`),
  ADD KEY `ART_IVA` (`ID_ART_IVA`),
  ADD KEY `ART_UN` (`ID_ART_UNIDADE`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_CATEGORIAS`);

--
-- Índices para tabela `cheques`
--
ALTER TABLE `cheques`
  ADD PRIMARY KEY (`ID_CHEQUES`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_CLIENTES`);

--
-- Índices para tabela `dias_pagamento`
--
ALTER TABLE `dias_pagamento`
  ADD PRIMARY KEY (`ID_DIAS`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ID_EMPRESA`);

--
-- Índices para tabela `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`ID_IVA`);

--
-- Índices para tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`ID_ORCAMENTO`),
  ADD KEY `ID_ORC_CLIENTES` (`ID_ORC_CLIENTES`),
  ADD KEY `ID_ORC_UTILIZADORES` (`ID_ORC_UTILIZADORES`),
  ADD KEY `ID_ORC_EMPRESA` (`ID_ORC_EMPRESA`),
  ADD KEY `TIPO_ORCAMENTO` (`TIPO`);

--
-- Índices para tabela `orc_art_ser`
--
ALTER TABLE `orc_art_ser`
  ADD PRIMARY KEY (`ID_ORC_ART_SER`),
  ADD KEY `ID_OAS_ARTIGOS` (`ID_OAS_ARTIGOS`),
  ADD KEY `ID_OAS_ORCAMENTO` (`ID_OAS_ORCAMENTO`),
  ADD KEY `ID_OAS_SERVICOS` (`ID_OAS_SERVICOS`),
  ADD KEY `OAS_IVA` (`OAS_IVA`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`ID_SERVICOS`),
  ADD KEY `ID_SER_CATEGORIA` (`ID_SER_CATEGORIA`),
  ADD KEY `SER_UN` (`ID_SER_UNIDADE`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`ID_TIPO`);

--
-- Índices para tabela `tipo_orc`
--
ALTER TABLE `tipo_orc`
  ADD PRIMARY KEY (`ID_TIPO_ORC`);

--
-- Índices para tabela `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`ID_UNIDADE`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`ID_UTILIZADORES`),
  ADD KEY `TIPO` (`TIPO`);

--
-- Índices para tabela `versao_pgo`
--
ALTER TABLE `versao_pgo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigos`
--
ALTER TABLE `artigos`
  MODIFY `ID_ARTIGOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_CATEGORIAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cheques`
--
ALTER TABLE `cheques`
  MODIFY `ID_CHEQUES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID_CLIENTES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `dias_pagamento`
--
ALTER TABLE `dias_pagamento`
  MODIFY `ID_DIAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `ID_EMPRESA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `iva`
--
ALTER TABLE `iva`
  MODIFY `ID_IVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `ID_ORCAMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `orc_art_ser`
--
ALTER TABLE `orc_art_ser`
  MODIFY `ID_ORC_ART_SER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `ID_SERVICOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `ID_TIPO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipo_orc`
--
ALTER TABLE `tipo_orc`
  MODIFY `ID_TIPO_ORC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `unidades`
--
ALTER TABLE `unidades`
  MODIFY `ID_UNIDADE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `ID_UTILIZADORES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `versao_pgo`
--
ALTER TABLE `versao_pgo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `artigos`
--
ALTER TABLE `artigos`
  ADD CONSTRAINT `ART_CAT` FOREIGN KEY (`ID_ART_CATEGORIA`) REFERENCES `categoria` (`ID_CATEGORIA`),
  ADD CONSTRAINT `ART_IVA` FOREIGN KEY (`ID_ART_IVA`) REFERENCES `iva` (`ID_IVA`),
  ADD CONSTRAINT `ART_UN` FOREIGN KEY (`ID_ART_UNIDADE`) REFERENCES `unidades` (`ID_UNIDADE`);

--
-- Limitadores para a tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD CONSTRAINT `ORC_CLIENTES` FOREIGN KEY (`ID_ORC_CLIENTES`) REFERENCES `clientes` (`ID_CLIENTES`),
  ADD CONSTRAINT `ORC_EMPRESA` FOREIGN KEY (`ID_ORC_EMPRESA`) REFERENCES `empresa` (`ID_EMPRESA`),
  ADD CONSTRAINT `ORC_UTILIZADORES` FOREIGN KEY (`ID_ORC_UTILIZADORES`) REFERENCES `utilizadores` (`ID_UTILIZADORES`),
  ADD CONSTRAINT `TIPO_ORCAMENTO` FOREIGN KEY (`TIPO`) REFERENCES `tipo_orc` (`ID_TIPO_ORC`);

--
-- Limitadores para a tabela `orc_art_ser`
--
ALTER TABLE `orc_art_ser`
  ADD CONSTRAINT `OAS_ARTIGO` FOREIGN KEY (`ID_OAS_ARTIGOS`) REFERENCES `artigos` (`ID_ARTIGOS`),
  ADD CONSTRAINT `OAS_IVA` FOREIGN KEY (`OAS_IVA`) REFERENCES `iva` (`ID_IVA`),
  ADD CONSTRAINT `OAS_ORCAMENTO` FOREIGN KEY (`ID_OAS_ORCAMENTO`) REFERENCES `orcamento` (`ID_ORCAMENTO`),
  ADD CONSTRAINT `OAS_SERVICOS` FOREIGN KEY (`ID_OAS_SERVICOS`) REFERENCES `servicos` (`ID_SERVICOS`);

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `SER_CATEGORIAS` FOREIGN KEY (`ID_SER_CATEGORIA`) REFERENCES `categorias` (`ID_CATEGORIAS`),
  ADD CONSTRAINT `SER_UN` FOREIGN KEY (`ID_SER_UNIDADE`) REFERENCES `unidades` (`ID_UNIDADE`);

--
-- Limitadores para a tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD CONSTRAINT `utilizadores_ibfk_1` FOREIGN KEY (`TIPO`) REFERENCES `tipo` (`ID_TIPO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
