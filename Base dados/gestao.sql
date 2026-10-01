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
(8, 'Monitor Xiomi 34', ' 	Monitor Xiomi 34\" UW 1MS', 365.50, 1, 1, 2, 1),
(9, 'Teclado Sem Fios Logitech K380', 'Teclado Bluetooth para três dispositivos', 34.90, 15, 1, 3, 1),
(10, 'Rato Sem Fios Logitech M330', 'Rato silencioso com bateria de longa duração', 24.50, 20, 1, 4, 1),
(11, 'Monitor Dell UltraSharp U2723QE 27"', 'Monitor IPS 4K com USB-C e hub integrado', 429.00, 4, 1, 2, 1),
(12, 'Impressora HP LaserJet Pro M404', 'Impressora laser monocromática de escritório', 289.00, 3, 1, 8, 1),
(13, 'Cabo de Rede Cat6 3 metros', 'Cabo UTP certificado para redes Gigabit', 6.90, 40, 1, 7, 1),
(14, 'Headset Gaming HyperX Cloud II', 'Auscultadores gaming com som surround 7.1', 129.90, 6, 1, 6, 1),
(15, 'SSD Kingston NV2 1TB NVMe', 'Disco SSD NVMe com leituras até 3500 MB/s', 89.90, 12, 1, 1, 1),
(16, 'Memória RAM DDR4 16GB 3200MHz', 'Módulo DDR4 para estações de trabalho', 74.50, 10, 1, 1, 1),
(17, 'Câmara Logitech Brio 4K', 'Câmara 4K para videochamadas profissionais', 149.00, 5, 1, 7, 1),
(18, 'UPS APC Back-UPS 650VA', 'UPS linha-interactiva com protecção contra picos', 119.00, 4, 1, 7, 1);

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
(6, 'Geral'),
(7, 'Acessórios'),
(8, 'Impressoras');

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
(2, 'Deslocação'),
(3, 'Manutenção'),
(4, 'Consultoria');

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
(3, 'Global data', '2025-12-11', '2026-01-12', 149.99, 3),
(4, 'TechInovações, Lda', '2026-09-18', '2026-10-02', 486.20, 1),
(5, 'Porto Networks, Lda', '2026-10-01', '2026-10-15', 742.90, 1),
(6, 'Oficinas do Norte, SA', '2026-09-28', '2026-10-26', 318.75, 3),
(7, 'LogiForneces, Lda', '2026-10-01', '2026-11-27', 1294.40, 3),
(8, 'Ambiente Digital, Lda', '2026-10-15', '2027-01-08', 967.00, 3),
(9, 'TechInovações, Lda', '2026-10-20', '2026-11-12', 556.30, 1);

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
(3, 'Ana Duarte', 'Rua das Flores', 128, 'Porto', '4000-013', '963 852 741', '000 000 009', 'ana.duarte@mail.com', '1989-02-09'),
-- NASCIMENTO em Outubro para alimentar o widget de aniversariantes do dashboard.
(4, 'Bruno Ferreira', 'Rua de Gonçalo Cristino', 45, 'Porto', '4100-129', '912 345 678', '512 847 363', 'bruno.ferreira@exemplo.pt', '1990-04-14'),
(5, 'Carla Moreira', 'Avenida da República', 1180, 'Braga', '4700-325', '936 112 233', '507 412 982', 'carla.moreira@exemplo.pt', '1988-07-22'),
(6, 'Diogo Pinto', 'Rua Luís de Camões', 27, 'Aveiro', '3800-011', '925 887 744', '501 923 470', 'diogo.pinto@exemplo.pt', '1993-11-30'),
(7, 'Filipa Rocha', 'Avenida 25 de Abril', 62, 'Setúbal', '2900-446', '961 445 556', '509 873 120', 'filipa.rocha@exemplo.pt', '1995-02-18'),
(8, 'Gonçalo Neves', 'Rua Pedro Nunes', 88, 'Coimbra', '3000-334', '933 221 100', '504 738 291', 'goncalo.neves@exemplo.pt', '1986-10-20'),
(9, 'Helena Cruz', 'Rua do Almada', 305, 'Aveiro', '3800-023', '917 663 245', '506 291 472', 'helena.cruz@exemplo.pt', '1992-10-28'),
(10, 'Ivan Ribeiro', 'Rua de Santa Catarina', 750, 'Porto', '4000-447', '928 004 118', '511 829 361', 'ivan.ribeiro@exemplo.pt', '1994-10-01'),
(11, 'Joana Lima', 'Avenida Almirante Reis', 12, 'Lisboa', '1000-012', '944 771 260', '503 748 196', 'joana.lima@exemplo.pt', '1991-10-05'),
(12, 'Kléber Sousa', 'Rua 5 de Outubro', 214, 'Funchal', '9000-064', '969 330 412', '508 163 250', 'kleber.sousa@exemplo.pt', '1989-10-12');

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
-- Dados de empresa ficticios, mas com NIF e IBAN de formato portugues valido.
(1, 'TechStore Informática, Lda', 'TechStore', 'Rua das Albertas 142, Sala 3', 'Porto', '4200-105', '518 294 730', 'PT14 0002 0123 1234 5678 9012 3', '220 145 890', 'geral@techstore.pt', 'www.techstore.pt', 'img/logo.png');

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
(9, 1, '2025-12-11', '', 2, 4, 1),
-- Orçamentos de 2026. TIPO: 1=Pedido, 2=Aceite, 3=Rejeitado, 4=Realizado.
-- Sete orçamentos realizada em 2026-10-01, um por cliente, para o dashboard mensal.
(10, 4, '2026-01-20', 'Manutenção preventiva do parque informático.', 4, 6, 1),
(11, 4, '2026-02-17', 'Substituição de discos e actualização de memória.', 5, 6, 1),
(12, 4, '2026-03-12', 'Instalação de rede no novo piso de escritórios.', 6, 7, 1),
(13, 4, '2026-05-21', 'Configuração de seis postos de trabalho.', 7, 6, 1),
(14, 4, '2026-06-15', 'Upgrade de memórias e teste de desempenho.', 8, 7, 1),
(15, 4, '2026-07-08', 'Cópia de segurança automática para a nuvem.', 9, 6, 1),
(16, 4, '2026-07-24', 'Aquisição de monitores para a sala de reuniões.', 10, 7, 1),
(17, 4, '2026-08-11', 'Formação de utilizadores sobre as novas ferramentas.', 11, 8, 1),
(18, 4, '2026-09-03', 'Manutenção do sistema de impressão.', 12, 6, 1),
(19, 4, '2026-09-18', 'Renovação das licenças de software.', 4, 7, 1),
(20, 4, '2026-10-01', 'Fornecimento de teclados e ratos sem fios.', 5, 6, 1),
(21, 4, '2026-10-01', 'Instalação de câmaras para videochamadas.', 6, 7, 1),
(22, 4, '2026-10-01', 'Certificação de cabling e pontos de rede.', 7, 8, 1),
(23, 4, '2026-10-01', 'Limpeza e optimização de postos de trabalho.', 9, 6, 1),
(24, 4, '2026-10-01', 'Instalação de UPS para o servidor de premises.', 10, 7, 1),
(25, 4, '2026-10-01', 'Consultoria a sistemas de gestão documental.', 11, 8, 1),
(26, 4, '2026-10-01', 'Assistência técnica e actualização do equipamento.', 12, 6, 1),
(27, 1, '2026-10-28', 'Orçamento valido por 30 dias. Fornecimento de portáteis.', 5, 6, 1),
(28, 1, '2026-11-12', 'Orçamento valido por 30 dias. Instalação de rede wireless.', 8, 7, 1),
(29, 1, '2026-12-03', 'Orçamento valido por 30 dias. Plano de backups anual.', 10, 8, 1),
(30, 2, '2026-09-25', 'Aceite com condições de entrega acordadas.', 6, 6, 1),
(31, 2, '2026-10-24', 'Aceite com upgrade de memórias confirmado.', 9, 7, 1),
(32, 3, '2026-07-14', 'Rejeitado por ultrapassar o orçamento aprovado.', 11, 6, 1),
(33, 3, '2026-09-30', 'Rejeitado, cliente optou por solução interna.', 4, 7, 1);

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
(14, 9, 7, NULL, 'Desktop Gaming VIST', 'Desktop Gaming VIST Ryzen 7 5700G Ram 32Gb Ssd 1Tb M.2 ', 1, 805.99, 20.00, 1),
-- Linhas dos orçamentos de 2026. Exatamente um de ID_OAS_ARTIGOS / ID_OAS_SERVICOS por linha.
-- NOME e DESCRICAO são NULL nas linhas de serviço, tal como o sistema grava.
(15, 10, NULL, 9, NULL, 'Limpeza de software desnecessário nos postos de trabalho', 6, 30.00, 0.00, 1),
(16, 10, NULL, 6, NULL, 'Verificação de rede e ligação de rede nos pisos', 1, 60.00, 10.00, 1),
(17, 11, 15, NULL, 'SSD Kingston NV2 1TB NVMe', 'Disco SSD NVMe com leituras até 3500 MB/s', 3, 89.90, 5.00, 1),
(18, 11, 16, NULL, 'Memória RAM DDR4 16GB 3200MHz', 'Módulo DDR4 para estações de trabalho', 6, 74.50, 5.00, 1),
(19, 12, 13, NULL, 'Cabo de Rede Cat6 3 metros', 'Cabo UTP certificado para redes Gigabit', 30, 6.90, 0.00, 1),
(20, 12, NULL, 6, NULL, 'Instalação e certificação de pontos de rede', 12, 60.00, 8.00, 1),
(21, 13, 13, NULL, 'Cabo de Rede Cat6 3 metros', 'Cabo UTP certificado para redes Gigabit', 24, 6.90, 0.00, 1),
(22, 13, NULL, 9, NULL, 'Remoção de programas desnecessários e melhoria de desempenho', 6, 30.00, 0.00, 1),
(23, 14, 16, NULL, 'Memória RAM DDR4 16GB 3200MHz', 'Módulo DDR4 para estações de trabalho', 8, 74.50, 10.00, 1),
(24, 14, NULL, 7, NULL, 'Análise de desempenho e recomendação de melhorias', 4, 75.00, 0.00, 2),
(25, 15, NULL, 5, NULL, 'Cópia de segurança automática para a nuvem', 1, 45.00, 0.00, 1),
(26, 15, 17, NULL, 'Câmara Logitech Brio 4K', 'Câmara 4K para videochamadas profissionais', 2, 149.00, 12.00, 1),
(27, 16, 11, NULL, 'Monitor Dell UltraSharp U2723QE 27"', 'Monitor IPS 4K com USB-C e hub integrado', 2, 429.00, 8.00, 1),
(28, 16, 13, NULL, 'Cabo de Rede Cat6 3 metros', 'Cabo UTP certificado para redes Gigabit', 12, 6.90, 0.00, 1),
(29, 17, NULL, 8, NULL, 'Sessão de formação prática sobre as ferramentas da empresa', 2, 90.00, 0.00, 2),
(30, 17, NULL, 7, NULL, 'Apoio durante a transição para as novas ferramentas', 3, 75.00, 5.00, 2),
(31, 18, 12, NULL, 'Impressora HP LaserJet Pro M404', 'Impressora laser monocromática de escritório', 1, 289.00, 0.00, 1),
(32, 18, NULL, 3, NULL, 'Deslocação técnica ao local para instalação da impressora', 1, 0.50, 50.00, 1),
(33, 19, NULL, 7, NULL, 'Renovação e revisão de licenças de software', 24, 75.00, 15.00, 2),
(34, 19, NULL, 9, NULL, 'Remoção de programas desnecessários e melhoria de desempenho', 3, 30.00, 0.00, 1),
(35, 20, 9, NULL, 'Teclado Sem Fios Logitech K380', 'Teclado Bluetooth para três dispositivos', 6, 34.90, 0.00, 1),
(36, 20, 10, NULL, 'Rato Sem Fios Logitech M330', 'Rato silencioso com bateria de longa duração', 6, 24.50, 5.00, 1),
(37, 21, 17, NULL, 'Câmara Logitech Brio 4K', 'Câmara 4K para videochamadas profissionais', 4, 149.00, 10.00, 1),
(38, 21, NULL, 6, NULL, 'Instalação e configuração das câmaras de videochamada', 4, 60.00, 0.00, 1),
(39, 22, 13, NULL, 'Cabo de Rede Cat6 3 metros', 'Cabo UTP certificado para redes Gigabit', 40, 6.90, 0.00, 1),
(40, 22, NULL, 6, NULL, 'Certificação de cabling em todo o piso de escritórios', 1, 60.00, 10.00, 1),
(41, 23, NULL, 9, NULL, 'Remoção de programas desnecessários e melhoria de desempenho', 8, 30.00, 15.00, 1),
(42, 23, NULL, 8, NULL, 'Formação rápida sobre boas práticas de utilização', 1, 90.00, 0.00, 2),
(43, 24, 18, NULL, 'UPS APC Back-UPS 650VA', 'UPS linha-interactiva com protecção contra picos', 2, 119.00, 5.00, 1),
(44, 24, 13, NULL, 'Cabo de Rede Cat6 3 metros', 'Cabo UTP certificado para redes Gigabit', 8, 6.90, 0.00, 1),
(45, 25, NULL, 7, NULL, 'Consultoria a sistemas de gestão documental', 8, 75.00, 10.00, 2),
(46, 25, NULL, 5, NULL, 'Cópia de segurança automática para a nuvem', 1, 45.00, 0.00, 1),
(47, 26, NULL, 9, NULL, 'Diagnóstico e reparação avançada de hardware', 4, 30.00, 0.00, 1),
(48, 26, NULL, 3, NULL, 'Deslocação técnica ao local para intervenção', 2, 0.50, 50.00, 1),
(49, 27, 5, NULL, 'Portátil Lenovo Legion 5i (10ª Geração) 15IRX10-426', 'Intel Core i9-14900HX | Free DOS | 32GB RAM | OLED WQXG', 3, 1599.99, 5.00, 1),
(50, 27, 9, NULL, 'Teclado Sem Fios Logitech K380', 'Teclado Bluetooth para três dispositivos', 3, 34.90, 0.00, 1),
(51, 28, NULL, 6, NULL, 'Instalação de pontos de acesso wireless e cobertura', 4, 60.00, 8.00, 1),
(52, 28, NULL, 9, NULL, 'Optimização do sistema após instalação de rede', 2, 30.00, 0.00, 1),
(53, 29, NULL, 5, NULL, 'Plano anual de cópias de segurança para a nuvem', 12, 45.00, 12.00, 1),
(54, 29, NULL, 8, NULL, 'Formação dos utilizadores sobre a política de cópias', 1, 90.00, 0.00, 2),
(55, 30, 10, NULL, 'Rato Sem Fios Logitech M330', 'Rato silencioso com bateria de longa duração', 5, 24.50, 0.00, 1),
(56, 30, NULL, 6, NULL, 'Entrega e configuração nos locais acordados', 2, 60.00, 0.00, 1),
(57, 31, 16, NULL, 'Memória RAM DDR4 16GB 3200MHz', 'Módulo DDR4 para estações de trabalho', 4, 74.50, 10.00, 1),
(58, 31, NULL, 7, NULL, 'Teste de desempenho após a actualização de memórias', 3, 75.00, 0.00, 2),
(59, 32, 11, NULL, 'Monitor Dell UltraSharp U2723QE 27"', 'Monitor IPS 4K com USB-C e hub integrado', 2, 429.00, 0.00, 1),
(60, 32, NULL, 9, NULL, 'Análise de desempenho e recomendação de melhorias', 2, 75.00, 0.00, 2),
(61, 33, NULL, 7, NULL, 'Análise de sistemas e recomendação de melhorias', 4, 75.00, 0.00, 2),
(62, 33, NULL, 9, NULL, 'Remoção de programas desnecessários e melhoria de desempenho', 2, 30.00, 0.00, 1);

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
(4, 'Instalação e configuração de sistemas op', 'Instalação e configuração de sistemas operacionais', 15.00, 1, 4, 1, 1),
(5, 'Backup e cópia de segurança', 'Cópia de segurança automática para disco externo ou nuvem', 45.00, 1, 4, 3, 1),
(6, 'Configuração de rede', 'Instalação e certificação de redes ethernet e Wi-Fi', 60.00, 1, 4, 3, 1),
(7, 'Consultoria informática', 'Análise de sistemas e recomendação de melhorias', 75.00, 1, 4, 4, 2),
(8, 'Formação de utilizadores', 'Sessão de formação prática sobre as ferramentas da empresa', 90.00, 1, 4, 4, 2),
(9, 'Limpeza e optimização', 'Remoção de programas desnecessários e melhoria de desempenho', 30.00, 1, 4, 3, 1);

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
  `PASSWORD` varchar(255) NOT NULL,
  `EMAIL` varchar(55) NOT NULL,
  `TIPO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `utilizadores`
--
-- A coluna PASSWORD guarda "sha256:<sal_hex>:<hash_hex>" (104 caracteres),
-- e nao a senha em texto puro. A politica de senha exige 8 caracteres minimo.
-- Credenciais de demonstracao:
--   user   / user2026
--   admin  / admin2026
--   rui    / rui2026
--   marta  / marta2026
--   tiago  / tiago2026
-- Troque-as antes de publicar o site.
--

INSERT INTO `utilizadores` (`ID_UTILIZADORES`, `NOME`, `USERNAME`, `PASSWORD`, `EMAIL`, `TIPO`) VALUES
(4, 'Utilizador', 'user', 'sha256:6076605ba5d0a4c1167779e9d6ec167d:31332bd8764cbbc60dcd32e7b4ed9a64c5e9f343261f591965efb12dc254d9d6', 'user@mail.com', 2),
(5, 'administrador', 'admin', 'sha256:6e6ed1e3fd1d2f0313fbdc301af25b67:624edb565228ab9090cef11b2fd1376b7d23b71503ad3591ac46daf463ac5668', 'admin@mail.com', 1),
(6, 'Rui Fernandes', 'rui', 'sha256:f961a9530ac6b351ecd81c68d556dd74:af86dd4d7b6e78b4345eb0a737a502dd6bd819feac7565030250216b13043ace', 'rui.fernandes@techstore.pt', 2),
(7, 'Marta Soares', 'marta', 'sha256:2bcec71577d6c566ad09e96018a554cc:660d4d7d69b4218e44480fe0f70b943638824405065b72ed17a3d1d08b8a4c27', 'marta.soares@techstore.pt', 2),
(8, 'Tiago Cardoso', 'tiago', 'sha256:bf99102e394c572693c3667f3c0aa6d8:09927c57f46a7954e75fa7ba4ca5747bca51f6704f61040ad73c36d789a208c7', 'tiago.cardoso@techstore.pt', 2);

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
(1, 'v.1.1.0');

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
  -- O login procura por USERNAME; sem unicidade, dois utilizadores com o
  -- mesmo nome de utilizador tornariam o login ambiguo.
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
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
  MODIFY `ID_ARTIGOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_CATEGORIAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cheques`
--
ALTER TABLE `cheques`
  MODIFY `ID_CHEQUES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID_CLIENTES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `ID_ORCAMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `orc_art_ser`
--
ALTER TABLE `orc_art_ser`
  MODIFY `ID_ORC_ART_SER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `ID_SERVICOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `ID_UTILIZADORES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- ------------------------------------------------------------------
-- Verificacoes de integridade dos dados de demonstracao.
-- Correm depois do COMMIT das restricoes, para nao abortarem o dump.
-- ------------------------------------------------------------------

-- Orcamentos realizados em 2026-10-01: tem de existir um por cliente distinto.
SELECT COUNT(*) AS realizados_outubro_clientes_distintos
FROM `orcamento`
WHERE `TIPO` = 4 AND `DATA` = '2026-10-01';

-- Linhas de orcamento: exactamente um dos dois identificadores preenchidos.
SELECT COUNT(*) AS linhas_invalidas
FROM `orc_art_ser`
WHERE (`ID_OAS_ARTIGOS` IS NULL) = (`ID_OAS_SERVICOS` IS NULL);

-- Nomes ou descricoes de artigo que atingiram o limite da coluna (55),
-- sinal de truncamento silencioso pelo modo SQL nao estrito.
-- Esperado: apenas as linhas 2, 3, 5 e 7, ja presentes antes deste ficheiro.
SELECT `ID_ARTIGOS`, `NOME`, CHAR_LENGTH(`NOME`) AS tam_nome, CHAR_LENGTH(`DESCRICAO`) AS tam_desc
FROM `artigos`
WHERE CHAR_LENGTH(`NOME`) = 55 OR CHAR_LENGTH(`DESCRICAO`) = 55;

-- Verificacao de passwords: cada hash tem de confirmar a senha de demonstracao.
-- As duas primeiras linhas validam-se com 'user2026' e 'admin2026'.
-- As restantes com 'rui2026', 'marta2026' e 'tiago2026'.

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
