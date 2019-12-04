-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: 27-Nov-2019 às 23:32
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_cli`
--

CREATE TABLE `dados_cli` (
  `id_dadosCli` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `ciade` varchar(40) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua_avenida` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `adicionais` varchar(200) NOT NULL,
  `telefone` int(11) NOT NULL,
  `n_cartao` int(11) NOT NULL,
  `validade_cartao` int(11) NOT NULL,
  `nome_cartao` varchar(40) NOT NULL,
  `cpf` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dados_cli`
--

INSERT INTO `dados_cli` (`id_dadosCli`, `id_cli`, `cep`, `estado`, `ciade`, `bairro`, `rua_avenida`, `numero`, `adicionais`, `telefone`, `n_cartao`, `validade_cartao`, `nome_cartao`, `cpf`) VALUES
(1, 1, 17054333, 'sao paulo', 'bauru', 'meridota', 'rua dos bobos', 999, 'perto do hospital', 2147483647, 2147483647, 1221, 'gabriel junior', '12332145678'),
(7, 2, 17283745, 'Sao Paulo', 'jau', 'praia', 'brasil', 980, 'perto do lago', 1432839483, 2147483647, 234, 'amanda moraes', '2342342345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_cli`
--

CREATE TABLE `login_cli` (
  `id_cli` int(11) NOT NULL,
  `nome_cli` varchar(70) NOT NULL,
  `sobNome_cli` varchar(70) NOT NULL,
  `email_cli` varchar(70) NOT NULL,
  `senha_cli` varchar(50) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login_cli`
--

INSERT INTO `login_cli` (`id_cli`, `nome_cli`, `sobNome_cli`, `email_cli`, `senha_cli`, `user`) VALUES
(1, 'cesar', 'moraes', 'cesar@email.com', 'admin', 'cliente'),
(2, 'amanda', 'moraes', 'amanda@email.com', 'amanda', 'cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_fun`
--

CREATE TABLE `login_fun` (
  `id_fun` int(11) NOT NULL,
  `nome_fun` varchar(50) NOT NULL,
  `sobNome_fun` varchar(50) NOT NULL,
  `email_fun` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `user` varchar(30) NOT NULL,
  `cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login_fun`
--

INSERT INTO `login_fun` (`id_fun`, `nome_fun`, `sobNome_fun`, `email_fun`, `senha`, `user`, `cargo`) VALUES
(1, 'gabriel', 'junior', 'gabriel@email.com', 'admin', 'admin', 'vendedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `part_number` varchar(5) NOT NULL,
  `nome_prod` varchar(150) NOT NULL,
  `valor_prod` decimal(10,2) NOT NULL,
  `estoque_quant` int(11) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `date_create` datetime NOT NULL,
  `date_last_update` datetime NOT NULL,
  `promocao` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `part_number`, `nome_prod`, `valor_prod`, `estoque_quant`, `descricao`, `imagem`, `date_create`, `date_last_update`, `promocao`) VALUES
(6, '#912d', 'Raspberry Pi 3 Model B+ Anatel', '271.90', 20, '																																				A EletronicArts oferece com exclusividade a Raspberry Pi 3 Model B+ com homologa&ccedil;&atilde;o Anatel e na vers&atilde;o blue. Uma placa extremamente vers&aacute;til para os mais variados projetos como videogames, servidores de arquivos, c&acirc;meras de monitoramento e projetos embarcados. A Raspberry Pi 3 Model B+ Anatel &eacute; um mini-PC que roda distribui&ccedil;&otilde;es Linux como o Raspbian e Ubuntu, mas tamb&eacute;m suporta outros sistemas operacionais como o Windows 10 IoT e vers																																', 'images/promocao/81HN4z3avRL._SX679_.jpg', '2019-11-06 21:27:49', '2019-11-06 22:15:38', 'promoÃ§Ã£o'),
(7, '#f1b6', 'Motor de Passo NEMA 17 1,5A 40mm para CNC', '99.00', 50, 'Pra quem procura um motor de passo mais robusto encontrou o que precisava. O Motor de Passo NEMA 17 1,5A 40mm para CNC de alto torque &eacute; um motor ideal para projetos de impressora 3D e m&aacute;quinas CNC devido suas especifica&ccedil;&otilde;es t&eacute;cnicas.', 'images/promocao/144846-4.jpg', '2019-11-06 22:19:59', '2019-11-06 22:19:59', 'promoÃ§Ã£o'),
(8, '#8d6d', 'Plataforma Rob&oacute;tica Falcon', '119.00', 12, 'A Plataforma Rob&oacute;tica Falcon foi desenvolvida para atender aos mais variados projetos de rob&oacute;tica em uma base m&oacute;vel. Com dois motores com redu&ccedil;&atilde;o e duas rodas, esta &eacute; uma das melhores op&ccedil;&otilde;es de chassi rob&oacute;tico 2WD do mercado, sendo extremamente resistente, pois &eacute; fabricado com poliestireno de alto impacto (PSAI), material superior ao acr&iacute;lico. ', 'images/promocao/582_5_X.jpg', '2019-11-06 23:05:24', '2019-11-06 23:05:24', 'promoÃ§Ã£o'),
(9, '#dd45', 'Albatross Slave - Rel&ecirc;', '289.00', 28, 'Este m&oacute;dulo escravo do Albatross cont&eacute;m dois rel&ecirc;s independentes, ou seja, &eacute; poss&iacute;vel acionar duas cargas independentes de at&eacute; 4A cont&iacute;nuos ou um pulso de corrente mais elevada. Ele se comunica sem fio com o m&oacute;dulo mestre (Albatross Master), portanto s&oacute; &eacute; preciso aliment&aacute;-lo com 12 V e conectar as cargas desejadas nos rel&ecirc;s.', 'images/promocao/483_1_M.jpg', '2019-11-06 23:13:37', '2019-11-06 23:13:37', 'promoÃ§Ã£o'),
(10, '#185e', 'Arduino Shield - LCD 16x2 com Teclado', '29.60', 10, '									 Este &eacute; um shield muito popular para Arduino e placas semelhantes. Ele pode ser ligado diretamente &agrave; placa Arduino, sem necessidade de soldas ou fios. O shield possui um display de LCD 16x2, ou seja, 16 caracteres em 2 linhas. Esse LCD possui backlight (luz de fundo), que pode ser ligado ou desligado via software (atrav&eacute;s do pino digital 10).								', 'images/promocao/550x550.jpg', '2019-11-06 23:16:09', '2019-11-06 23:16:40', 'promoÃ§Ã£o'),
(11, '#2a08', 'Bra&ccedil;o Rob&oacute;tico RoboARM', '149.90', 26, 'O Bra&ccedil;o Rob&oacute;tico RoboARM foi desenvolvido para ser uma maneira f&aacute;cil e divertida de introduzir o mundo da programa&ccedil;&atilde;o e rob&oacute;tica. Ideal para voc&ecirc; aprender sobre movimenta&ccedil;&atilde;o mec&acirc;nica e testar conceitos na pr&aacute;tica de uma forma descontra&iacute;da! ', 'images/promocao/eg49f.jpg', '2019-11-06 23:19:45', '2019-11-06 23:19:45', 'promoÃ§Ã£o'),
(12, '#f1b6', ' Livro Movimento, Luz e Som com Arduino e Raspberry Pi', '72.00', 12, '																		Partindo de no&ccedil;&otilde;es b&aacute;sicas e gradualmente avan&ccedil;ando para desafios maiores, este livro guia voc&ecirc; passo a passo pelos experimentos e projetos que mostram como usar Arduino ou Raspberry Pi para criar e controlar movimento, luz e som. Em outras palavras: a&ccedil;&atilde;o! 																', 'images/vitrine/51tLPM-Ir6L._SR600,315_SCLZZZZZZZ_.jpg', '2019-11-09 01:01:19', '2019-11-09 01:23:44', 'null'),
(13, '#109a', 'Rob&ocirc; Zumo para Arduino - Pololu', '503.10', 5, ' O rob&ocirc; Zumo da Pololu &eacute; uma plataforma rob&oacute;tica sobre lagartas control&aacute;vel por Arduino e menor do que 10 x 10cm pequena o suficiente para ser qualificada como Mini Sum&ocirc;. Inclui dois micromotores met&aacute;licos acoplados a um par de lagartas de silicone, uma l&acirc;mina de a&ccedil;o inoxid&aacute;vel para a parte frontal, um conjunto de seis sensores de reflet&acirc;ncia para rastreamento de linhas ou detec&ccedil;&atilde;o de bordas, um aceler&ocirc;metro de 3 eixos com magnet&ocirc;metro, uma bozina para sons simples e m&uacute;sica. Apenas adicione 4 pilhas AA e um Arduino, ou um microcontrolador compat&iacute;vel (n&atilde;o inclu&iacute;dos), e voc&ecirc; est&aacute; pronto para come&ccedil;ar. N&atilde;o s&atilde;o necess&aacute;rias soldas nem montagens.', 'images/vitrine/Robo_Zumo_montado_para_Arduino_M.jpg', '2019-11-09 01:25:58', '2019-11-09 01:25:58', 'NULL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_vendidos`
--

CREATE TABLE `produtos_vendidos` (
  `id_produto_vendido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `vendas` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `carrinho` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos_vendidos`
--

INSERT INTO `produtos_vendidos` (`id_produto_vendido`, `id_produto`, `vendas`, `quantidade`, `cliente`, `carrinho`) VALUES
(10, 6, 23, 1, 2, '*9cfdf10e8fc047a44b08ed031e1f0ed1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_vendas` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `codigo_carrinho` varchar(40) NOT NULL,
  `valor_carrinho` decimal(10,2) NOT NULL,
  `forma_pagamento` varchar(50) NOT NULL,
  `parcelas` int(5) DEFAULT NULL,
  `forma_envio` varchar(50) NOT NULL,
  `total_compra` decimal(10,2) NOT NULL,
  `data` datetime NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `cep` varchar(30) NOT NULL,
  `cpf` varchar(40) NOT NULL,
  `cartao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_vendas`, `id_cliente`, `codigo_carrinho`, `valor_carrinho`, `forma_pagamento`, `parcelas`, `forma_envio`, `total_compra`, `data`, `telefone`, `cep`, `cpf`, `cartao`) VALUES
(23, 2, '*9cfdf10e8fc047a44b08ed031e1f0ed1', '271.90', 'Parcelado.', 2, 'Sedex 10', '291.90', '2019-11-27 00:23:24', '1432839483', '17283745', '2342342345', '2147483647');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dados_cli`
--
ALTER TABLE `dados_cli`
  ADD PRIMARY KEY (`id_dadosCli`),
  ADD KEY `id_cli` (`id_cli`);

--
-- Indexes for table `login_cli`
--
ALTER TABLE `login_cli`
  ADD PRIMARY KEY (`id_cli`),
  ADD UNIQUE KEY `email_cli` (`email_cli`);

--
-- Indexes for table `login_fun`
--
ALTER TABLE `login_fun`
  ADD PRIMARY KEY (`id_fun`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos_vendidos`
--
ALTER TABLE `produtos_vendidos`
  ADD PRIMARY KEY (`id_produto_vendido`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `id_vendas` (`vendas`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_vendas`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dados_cli`
--
ALTER TABLE `dados_cli`
  MODIFY `id_dadosCli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_cli`
--
ALTER TABLE `login_cli`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_fun`
--
ALTER TABLE `login_fun`
  MODIFY `id_fun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produtos_vendidos`
--
ALTER TABLE `produtos_vendidos`
  MODIFY `id_produto_vendido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_vendas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `dados_cli`
--
ALTER TABLE `dados_cli`
  ADD CONSTRAINT `dados_cli_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `login_cli` (`id_cli`);

--
-- Limitadores para a tabela `produtos_vendidos`
--
ALTER TABLE `produtos_vendidos`
  ADD CONSTRAINT `produtos_vendidos_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `produtos_vendidos_ibfk_2` FOREIGN KEY (`cliente`) REFERENCES `login_cli` (`id_cli`),
  ADD CONSTRAINT `produtos_vendidos_ibfk_3` FOREIGN KEY (`vendas`) REFERENCES `vendas` (`id_vendas`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `login_cli` (`id_cli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
