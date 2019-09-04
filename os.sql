-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 04-Set-2019 às 13:20
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `os`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'UsuÃ¡rios'),
(2, 'Fornecedores'),
(3, 'Ordem de ServiÃ§o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `data_cad` timestamp NOT NULL,
  `status` int(1) NOT NULL,
  `telefone` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `cnpj` varchar(250) DEFAULT NULL,
  `tipo_servicos` text,
  `data_mod` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `data_cad`, `status`, `telefone`, `email`, `cnpj`, `tipo_servicos`, `data_mod`) VALUES
(1, 'Wyliston Lessa Caires', '2019-08-08 23:42:43', 1, '84999714384', 'lessacaires@gmail.com', '06057223031050', 'Teste', '2019-08-09 16:46:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(250) NOT NULL,
  `solicitante` varchar(250) NOT NULL,
  `data_cad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  `descricao` text NOT NULL,
  `observacoes` text,
  `setor` varchar(250) NOT NULL,
  `data_mod` timestamp NULL DEFAULT NULL,
  `equipamento` varchar(250) NOT NULL,
  `criacao` varchar(250) NOT NULL,
  `mod_login` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `tipo`, `solicitante`, `data_cad`, `status`, `descricao`, `observacoes`, `setor`, `data_mod`, `equipamento`, `criacao`, `mod_login`) VALUES
(1, 'Gaiola de Avarias', 'Emanuel/Ivanaldo', '2019-09-02 14:25:21', 0, 'Fabricar uma gaiola para avaria na anti-cÃ¢mara, usando os fundos de rack jogados em cima dos banheiros das docas e tela para parte da frente.', 'ugencia/VigilÃ¢ncia SanitÃ¡ria.', 'Pereciveis', '2019-09-03 12:44:45', 'Tela e Equipamento em desuso', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL),
(2, 'Maquinas de Fatiar', 'Emanuel/Ivanaldo', '2019-09-02 14:26:18', 0, 'temos uma maquina sem funcionar no setor.', '', 'Fatiados', '2019-09-03 11:56:51', 'Maquina de Fatiar', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL),
(3, 'Mesa de ExposiÃ§Ã£o', 'Emanuel/Ivanaldo', '2019-09-02 14:27:18', 0, 'montar a mesa de rack para exposiÃ§Ã£o de mortadelas no setor de embutidos.', '', 'Embutidos/loja', '2019-09-03 11:56:56', 'mesa de rack', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL),
(4, 'ralos de perecÃ­veis', 'Emanuel/Ivanaldo', '2019-09-02 14:28:39', 0, 'Trocar os ralos para os que abre/fecha', 'milzente/vigilancia', 'sala de pesagem e fatiados', '2019-09-03 11:57:03', 'Ralos de giro', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL),
(5, 'vedar cano na entrada da sala de fatiados', 'Emanuel/Ivanaldo', '2019-09-02 14:29:48', 0, 'cortar e vedar um cano que tem de 1/2 metro na entrada da sala de fatiados.', '', 'sala de pesagem', '2019-09-03 11:57:11', 'cano de pia', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL),
(6, 'portas de camara de congelados ', 'Emanuel/Ivanaldo', '2019-09-02 14:47:10', 0, 'As portas estÃ£o com problemas de puxadores, guias e empenadas', '', 'CamÃ¢ras', '2019-09-03 11:57:17', 'Portas', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL),
(7, 'Evaporador Congelado', 'Emanuel/Ivanaldo', '2019-09-02 14:48:18', 0, 'Segundo corredor esquerdo do congelado, evaporador com tampa aberta e pigando Ã¡gua, igual uma torneira.', '', 'CamÃ¢ra Congelado', '2019-09-03 11:57:26', 'Evaporador', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL),
(8, 'Desempeno das portas do Estepim', 'Emanuel/Ivanaldo', '2019-09-02 14:49:04', 0, 'Desempeno e borracha das portas do Estepim', '', 'PerecÃ­veis', '2019-09-03 11:58:27', 'Estepim', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL),
(9, 'batedores portas', 'Emanuel/Ivanaldo', '2019-09-02 14:50:19', 0, 'Recolocar os batedores que estÃ£o soltos nas portas das cÃ¢maras.', '', 'perecvÃ­veis', '2019-09-03 11:58:07', 'batedor das portas', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL),
(10, 'ColocaÃ§Ã£o batedouros loja', 'Emanuel/Ivanaldo', '2019-09-02 14:51:26', 0, 'Concluir serviÃ§o dos batedores das ilhas e balcÃµes de perecÃ­veis', '', 'Ilhas e BalcÃµes na Loja', '2019-09-03 11:58:13', 'Batedor ', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL),
(11, 'Gaiola de Avarias', 'Emanuel/Ivanaldo', '2019-09-03 12:23:35', 0, 'Teste', 'Teste', 'Pereciveis', NULL, 'Tela e Equipamento em desuso', '', NULL),
(12, 'manutenÃ§Ã£o/troca', 'Paulo ', '2019-09-03 12:43:20', 0, 'Troca do vaso sanitÃ¡rio que estÃ¡ quebrado por um novo. Banheiro  de clientes masculino.', '', 'loja', NULL, 'vaso sanitÃ¡rio', 'PAULO FELIPE COSTA MEDEIROS', NULL),
(13, 'Pintura', 'Paulo ', '2019-09-03 12:51:34', 0, 'Pintura das marcaÃ§Ãµes do estacionamento.', 'Em andamento.', 'Estacionamento', '2019-09-03 16:59:23', 'Piso', 'PAULO FELIPE COSTA MEDEIROS', NULL),
(14, 'bases para radios HT', 'Paulo ', '2019-09-03 13:05:22', 0, 'Instalar as bases para os rÃ¡dios HT&#39;s na portaria.', '', 'PrevenÃ§Ã£o', NULL, 'bases', 'PAULO FELIPE COSTA MEDEIROS', NULL),
(15, 'Pintura', 'Paulo ', '2019-09-03 18:21:16', 0, 'conserto de empilhadeira.', '', 'Estacionamento', NULL, 'empiljhadeira', 'PAULO FELIPE COSTA MEDEIROS', NULL),
(16, 'Pintura', 'Paulo ', '2019-09-03 18:21:41', 4, 'empilhadeira', 'prestador dia 07', 'Estacionamento', '2019-09-03 18:22:57', 'empiljhadeira', 'PAULO FELIPE COSTA MEDEIROS', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `data_cad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` double NOT NULL DEFAULT '1',
  `data_mod` timestamp NULL DEFAULT NULL,
  `login` varchar(250) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `data_cad`, `status`, `data_mod`, `login`, `nivel`) VALUES
(2, 'admin', '08965d74c1a8e5c9cb5df4ed5e5621b4', '2019-08-07 06:19:26', 1, '2019-08-09 17:15:33', 'admin', 0),
(12, 'PAULO FELIPE COSTA MEDEIROS', 'f37742a46079ef5e98b85bf174c7987a', '2019-09-02 13:55:48', 1, NULL, '2817160', 1),
(10, 'JOSE LUIZ NUNEZ DO AMARAL', 'b1a21487662abc07acdc6a25a77c8abe', '2019-09-02 13:46:11', 1, NULL, '3327124', 2),
(11, 'RAQUEL Ã‚NGELA LIMA DA SILVA', '6f9d91cbacf333d10cafbbe8e9914b1f', '2019-09-02 13:51:57', 1, '2019-09-02 13:52:29', '', 3),
(13, 'LUANA MAIZA DA SILVA SOUZA', 'fe46f7cea775791586eccb02480182f1', '2019-09-02 13:57:19', 1, NULL, '3395405', 3),
(14, 'FRANCISCA CARLOS SILVA', '6bbdcba859e4f7942f17f15be1740529', '2019-09-02 14:02:21', 1, NULL, '2816849', 3),
(15, 'EMANUEL SHERLEI DA CUNHA SILVA', 'd5fbb6498ef9eb8683e4172458cc1c5d', '2019-09-02 14:20:56', 1, NULL, '4101626', 3),
(16, 'WELBER CALDAS TAVARES', '96879ad170ea66130edfe16a1af38176', '2019-09-03 13:06:32', 1, NULL, '2611775', 3),
(17, 'DENISIO BATISTA GOMES DE ARAUJO', '33f6eb8416bbdbbe5970b6113a751e9a', '2019-09-03 19:16:13', 1, NULL, '3119750', 3),
(18, 'SERGINALDO SANTINO DA SILVA', '6d94d5c82b5598b15a2eac8fa0284fc8', '2019-09-03 19:16:57', 1, NULL, '3369064', 3),
(19, 'LANUANE VIEIRA SILVA', '1047254c24369d1d5d87a23a31c9d8a3', '2019-09-03 19:18:30', 1, NULL, '3133974', 3),
(20, 'LUANA MAIZA DA SILVA SOUZA', 'fb1649a1c8dd8a25e884f465a4b187a8', '2019-09-03 19:20:33', 1, NULL, '3395405', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
