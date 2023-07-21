-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jun-2022 às 03:29
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `iptuverde_2023`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_tipos`
--

CREATE TABLE `cadastro_tipos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastro_tipos`
--

INSERT INTO `cadastro_tipos` (`id`, `tipo`) VALUES
(1, 'Residencial (casas, etc)'),
(2, 'Residencial em Condomínio Vertical (Apartamentos)'),
(3, 'Residencial em Condônio Horizontal'),
(4, 'Terreno Residencial'),
(5, 'Terreno Comercial'),
(6, 'Imóvel Comercial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prerequisitos`
--

CREATE TABLE `prerequisitos` (
  `id` int(11) NOT NULL,
  `prerequisito` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prerequisitos`
--

INSERT INTO `prerequisitos` (`id`, `prerequisito`) VALUES
(1, 'Estar em dia com o IPTU'),
(2, 'Rede esgoto deve estar conectada á residência'),
(3, 'Imóvel deve estar sediado em Maringá');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisicoes`
--

CREATE TABLE `requisicoes` (
  `codigo` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cadastrado_em` datetime NOT NULL,
  `atualizado_em` datetime DEFAULT NULL,
  `analista` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `desconto_soliticado` int(11) DEFAULT NULL,
  `desconto_concedido` int(11) DEFAULT NULL,
  `codigo_confirmacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `requisicoes`
--

INSERT INTO `requisicoes` (`codigo`, `email`, `cadastrado_em`, `atualizado_em`, `analista`, `status`, `desconto_soliticado`, `desconto_concedido`, `codigo_confirmacao`) VALUES
(10, 'eduardobona@vivaweb.net', '2022-06-15 03:24:35', NULL, NULL, 'enviado', 20, NULL, 2147483647);

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisitos`
--

CREATE TABLE `requisitos` (
  `id` int(11) NOT NULL,
  `requisito` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `requisitos`
--

INSERT INTO `requisitos` (`id`, `requisito`) VALUES
(1, 'Coleta de água da chuva'),
(2, 'Aquecimento solar para chuveiro'),
(3, 'Energia Solar'),
(4, 'Lixo Reciclável\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisitos_solicitados`
--

CREATE TABLE `requisitos_solicitados` (
  `requisicao` int(11) NOT NULL,
  `requisito` int(11) NOT NULL,
  `desconto_solicitado` int(11) NOT NULL,
  `desconto_concedido` int(11) DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `link_1` varchar(255) DEFAULT NULL,
  `link_2` varchar(255) DEFAULT NULL,
  `link_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `requisitos_solicitados`
--

INSERT INTO `requisitos_solicitados` (`requisicao`, `requisito`, `desconto_solicitado`, `desconto_concedido`, `observacoes`, `link_1`, `link_2`, `link_3`) VALUES
(10, 1, 5, NULL, 'Tenho uma sisterna de 500l com filtro e coletor com cao PVC de 25mm que é usada para atividades como limpar o imóvel e regar plantas', 'rst', 'rs', 'r'),
(10, 2, 6, NULL, 'Telhado 25x25', 'abc', 'ab', 'a'),
(10, 4, 7, NULL, 'Tenho 3 recipientes de lixo de 50l sendo um deles apenas para plástico. Além disso, tenho uma composteira (conforme link) e assim por diante;', 'efg', 'fg', 'e');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro_tipos`
--
ALTER TABLE `cadastro_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `prerequisitos`
--
ALTER TABLE `prerequisitos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `requisicoes`
--
ALTER TABLE `requisicoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `requisitos`
--
ALTER TABLE `requisitos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `requisitos_solicitados`
--
ALTER TABLE `requisitos_solicitados`
  ADD PRIMARY KEY (`requisicao`,`requisito`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_tipos`
--
ALTER TABLE `cadastro_tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `prerequisitos`
--
ALTER TABLE `prerequisitos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `requisicoes`
--
ALTER TABLE `requisicoes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `requisitos`
--
ALTER TABLE `requisitos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
