-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 17-Set-2019 às 18:00
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(250) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `solicitante` varchar(250) NOT NULL,
  `data_cad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  `descricao` text NOT NULL,
  `observacoes` text,
  `setor` varchar(250) NOT NULL,
  `data_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `equipamento` varchar(250) NOT NULL,
  `criacao` varchar(250) NOT NULL,
  `mod_login` varchar(250) DEFAULT NULL,
  `data_encerramento` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `login`, `tipo`, `solicitante`, `data_cad`, `status`, `descricao`, `observacoes`, `setor`, `data_mod`, `equipamento`, `criacao`, `mod_login`, `data_encerramento`) VALUES
(1, '', 'Gaiola de Avarias', 'Emanuel/Ivanaldo', '2019-09-02 14:25:21', 2, 'Fabricar uma gaiola para avaria na anti-cÃ¢mara, usando os fundos de rack jogados em cima dos banheiros das docas e tela para parte da frente.', 'ugencia/VigilÃ¢ncia SanitÃ¡ria.\r\nChamado 2769646 aguardando OM para executar o serviÃ§o\r\nOM 42942514 agendar\r\n\r\nagendado para dia 20', 'Pereciveis', '2019-09-17 13:54:48', 'Tela e Equipamento em desuso', 'EMANUEL SHERLEI DA CUNHA SILVA', '3327124', '2019-09-17 13:54:48'),
(2, '', 'maquinas de fatiar', 'emanuel/ivanaldo', '2019-09-02 14:26:18', 0, 'temos uma maquina sem funcionar no setor.', 'orÃ§amento  ', 'fatiados', '2019-09-11 17:06:53', 'maquina de fatiar', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL, NULL),
(3, '', 'mesa de exposiÃ§Ã£o', 'emanuel/ivanaldo', '2019-09-02 14:27:18', 0, 'montar a mesa de rack para exposiÃ§Ã£o de mortadelas no setor de embutidos.', 'orÃ§amento \r\n( mdf ) ', 'embutidos/loja', '2019-09-11 17:06:18', 'mesa de rack', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL, NULL),
(4, '', 'ralos de perecÃ­veis', 'Emanuel/Ivanaldo', '2019-09-02 14:28:39', 1, 'Trocar os ralos para os que abre/fecha', 'milzente/vigilancia', 'sala de pesagem e fatiados', '2019-09-06 20:49:52', 'Ralos de giro', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL, NULL),
(5, '', 'vedar cano na entrada da sala de fatiados', 'Emanuel/Ivanaldo', '2019-09-02 14:29:48', 4, 'cortar e vedar um cano que tem de 1/2 metro na entrada da sala de fatiados.', 'ConcluÃ­do em 07/09/2019.', 'sala de pesagem', '2019-09-10 11:30:45', 'cano de pia', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL, NULL),
(6, '', 'portas de camara de congelados ', 'Emanuel/Ivanaldo', '2019-09-02 14:47:10', 1, 'As portas estÃ£o com problemas de puxadores, guias e empenadas', '06/09/2019 - agendar com o Denis e Emanuel o dia para executar\r\nagendado para dia 20', 'CamÃ¢ras', '2019-09-17 13:54:10', 'Portas', 'EMANUEL SHERLEI DA CUNHA SILVA', '3327124', '2019-09-17 13:54:10'),
(7, '', 'Evaporador Congelado', 'Emanuel/Ivanaldo', '2019-09-02 14:48:18', 4, 'Segundo corredor esquerdo do congelado, evaporador com tampa aberta e pigando Ã¡gua, igual uma torneira.', 'ServiÃ§o executado dia 05/09/2019', 'CamÃ¢ra Congelado', '2019-09-06 20:47:27', 'Evaporador', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL, NULL),
(8, '', 'Desempeno das portas do Estepim', 'Emanuel/Ivanaldo', '2019-09-02 14:49:04', 1, 'Desempeno e borracha das portas do Estepim', '06/09/2019 - agendar com o Denis e o Emanuel o dia e hora para executar o serviÃ§o.', 'PerecÃ­veis', '2019-09-06 20:51:17', 'Estepim', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL, NULL),
(9, '', 'batedores portas', 'Emanuel/Ivanaldo', '2019-09-02 14:50:19', 4, 'Recolocar os batedores que estÃ£o soltos nas portas das cÃ¢maras.', '06/09/2019 - sendo executado\r\n09/09/2019 - concluÃ­do', 'perecvÃ­veis', '2019-09-10 11:46:53', 'batedor das portas', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL, NULL),
(10, '', 'ColocaÃ§Ã£o batedouros loja', 'Emanuel/Ivanaldo', '2019-09-02 14:51:26', 2, 'Concluir serviÃ§o dos batedores das ilhas e balcÃµes de perecÃ­veis', '06/09/2019 - Aguardando liberaÃ§Ã£o da compra de tubos INOX', 'Ilhas e BalcÃµes na Loja', '2019-09-06 20:53:12', 'Batedor ', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL, NULL),
(11, '', 'Gaiola de Avarias', 'Emanuel/Ivanaldo', '2019-09-03 12:23:35', 3, 'Teste', 'Teste', 'Pereciveis', '2019-09-06 20:32:55', 'Tela e Equipamento em desuso', '', NULL, NULL),
(12, '', 'manutenÃ§Ã£o/troca', 'paulo ', '2019-09-03 12:43:20', 4, 'Troca do vaso sanitÃ¡rio que estÃ¡ quebrado por um novo. Banheiro  de clientes masculino.', '06/09/2019 - executado', 'loja', '2019-09-11 17:05:10', 'vaso sanitÃ¡rio', 'PAULO FELIPE COSTA MEDEIROS', NULL, NULL),
(13, '', 'Pintura', 'Paulo ', '2019-09-03 12:51:34', 2, 'Pintura das marcaÃ§Ãµes do estacionamento.', 'Em andamento.', 'Estacionamento', '2019-09-06 11:04:17', 'Piso', 'PAULO FELIPE COSTA MEDEIROS', NULL, NULL),
(14, '', 'bases para radios ht', 'paulo ', '2019-09-03 13:05:22', 4, 'Instalar as bases para os rÃ¡dios HT&#39;s na portaria.', 'instalado duas pranchas ( 13/09/2019', 'prevenÃ§Ã£o', '2019-09-13 16:27:17', 'bases', 'PAULO FELIPE COSTA MEDEIROS', NULL, NULL),
(18, '', 'manutenÃ§Ã£o', 'welber tavares', '2019-09-09 18:26:20', 4, 'ARMÃRIO DE ENTRADA DE LOJA NECESSITA DE MANUTENÃ‡ÃƒO', 'O REFERIDO ARMÃRIO NECESSITA DE CHAVES, CONSERTO DE ALGUMAS PORTAS E ACRÃLICOS QUE ESTÃƒO FALTANDO.\r\n\r\n\r\ntrocado chave dos amarios que estava faltando \r\nfixados acrilico  (13/09/2019', 'prevenÃ§Ã£o', '2019-09-13 16:57:05', 'armÃ¡rio guarda volumes', 'WELBER CALDAS TAVARES', NULL, NULL),
(17, '', 'conserto', 'francisca', '2019-09-07 16:58:40', 4, 'O miolo da porta de saÃ­da estÃ¡ quebrado.', 'dia 10/09/2019\r\ncolocaÃ§Ã£o de parafusos', 'frente de loja', '2019-09-11 17:04:04', 'porta da saÃ­da', 'FRANCISCA CARLOS SILVA', NULL, NULL),
(19, '', 'MANUTENÃ‡ÃƒO', 'WELBER TAVARES', '2019-09-10 10:59:52', 4, 'CONFINADO DE CARNES FIXO ESTA COM AS DOBRADIÃ‡AS DAS GRADES QUEBRADA.', 'NECESSITA DE SOLDA OU UM POSSÃVEL PALIATIVO, POIS ESTA ABERTA DIRETO E FACILITA SITUAÃ‡Ã•ES .\r\n\r\n(instalado corrente com dois cadeados  ) dia 17/09/19', 'PREVENÃ‡ÃƒO', '2019-09-17 16:21:33', 'GAIOLA CONFINADO CARNES', 'WELBER CALDAS TAVARES', '3327124', '2019-09-17 16:21:33'),
(20, '', 'Trilho das portas das CÃ¢maras', 'Emanuel', '2019-09-10 11:36:45', 2, 'RecolocaÃ§Ã£o dos guias do trilho das portas: Porta do Horti, Anti-cÃ¢mara, CÃ¢mara de Congelado.\r\nFixar trilho da porta de resfriado.', 'agendado para dia 20', 'pereciveis ', '2019-09-17 13:53:11', 'portas das cÃ¢maras', 'EMANUEL SHERLEI DA CUNHA SILVA', '3327124', '2019-09-17 13:53:11'),
(21, '', 'manutenÃ§Ã£o carrinhos cuba', 'Emanuel', '2019-09-10 11:39:21', 1, 'revisar lubrificaÃ§Ã£o das rodinha dos carrinhos, estÃ£o emperrando.', '', 'pereciveis', '2019-09-10 12:20:50', 'carrinhos cuba', 'EMANUEL SHERLEI DA CUNHA SILVA', NULL, NULL),
(22, '', 'banho maria', 'raquel', '2019-09-10 12:41:22', 0, 'Controladora de temperatura quebrada', 'orÃ§amento', 'refeitÃ³rio', '2019-09-11 17:02:09', 'buffet', 'RAQUEL Ã‚NGELA LIMA DA SILVA', NULL, NULL),
(23, '', 'vidro', 'raquel', '2019-09-10 12:41:58', 0, 'Vidro do buffet quebrado', ' orÃ§amentos ', 'refeitÃ³rio', '2019-09-11 17:02:18', 'buffet', 'RAQUEL Ã‚NGELA LIMA DA SILVA', NULL, NULL),
(24, '', 'Teto', 'Raquel', '2019-09-10 12:42:57', 0, 'Teto da minha sala arriado/ abrir boca de ar', '', 'RefeitÃ³rio', NULL, 'Sala', 'RAQUEL Ã‚NGELA LIMA DA SILVA', NULL, NULL),
(25, '', 'marcenaria', 'raquel', '2019-09-10 12:48:42', 2, 'Tampo da mesa do refeitÃ³rio solta', '', 'refeitÃ³rio', '2019-09-11 17:00:45', 'mesa', 'RAQUEL Ã‚NGELA LIMA DA SILVA', NULL, NULL),
(26, '', 'Fazer banco Motorista', 'Marcio Ferrari', '2019-09-11 16:53:13', 0, 'Paulo favor fazer banco dos motoristas conforma falamos, aproveita o que temos em loja, os motoristas estÃ£o fazendo com paletes quebrados da loja, onde fica muito feio.', 'Urgente', 'Paulo ADM', NULL, 'Concreto ou afins', 'MARCIO CAMPOS FERRARI', NULL, NULL),
(27, '', 'piso', 'raquel', '2019-09-11 17:04:19', 0, '&#34;Piso&#34; em que foi feito o serviÃ§o do vazamento do gÃ¡s', 'faltando a ceremica', 'cozinha', '2019-09-11 18:15:11', 'cozinha', 'RAQUEL Ã‚NGELA LIMA DA SILVA', NULL, NULL),
(28, '', 'pintura', 'paulo ', '2019-09-14 10:43:17', 4, 'Teste', 'Teste.', 'estacionamento', '2019-09-14 11:26:54', 'piso', 'admin', 'admin', '2019-09-14 11:26:54');

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `data_cad`, `status`, `data_mod`, `login`, `nivel`) VALUES
(2, 'admin', '08965d74c1a8e5c9cb5df4ed5e5621b4', '2019-08-07 06:19:26', 1, '2019-08-09 17:15:33', 'admin', 0),
(12, 'PAULO FELIPE COSTA MEDEIROS', 'f37742a46079ef5e98b85bf174c7987a', '2019-09-02 13:55:48', 1, NULL, '2817160', 1),
(10, 'JOSE LUIZ NUNEZ DO AMARAL', 'b1a21487662abc07acdc6a25a77c8abe', '2019-09-02 13:46:11', 1, NULL, '3327124', 2),
(22, 'RAQUEL Ã‚NGELA LIMA DA SILVA', 'e2e7d257f5667176aec3985f2977cdf6', '2019-09-10 12:38:47', 1, NULL, '611228', 3),
(13, 'LUANA MAIZA DA SILVA SOUZA', 'fe46f7cea775791586eccb02480182f1', '2019-09-02 13:57:19', 1, NULL, '3395405', 3),
(14, 'FRANCISCA CARLOS SILVA', '6bbdcba859e4f7942f17f15be1740529', '2019-09-02 14:02:21', 1, NULL, '2816849', 3),
(15, 'EMANUEL SHERLEI DA CUNHA SILVA', 'd5fbb6498ef9eb8683e4172458cc1c5d', '2019-09-02 14:20:56', 1, NULL, '4101626', 3),
(16, 'WELBER CALDAS TAVARES', '96879ad170ea66130edfe16a1af38176', '2019-09-03 13:06:32', 1, NULL, '2611775', 3),
(17, 'DENISIO BATISTA GOMES DE ARAUJO', '33f6eb8416bbdbbe5970b6113a751e9a', '2019-09-03 19:16:13', 1, NULL, '3119750', 3),
(18, 'SERGINALDO SANTINO DA SILVA', '6d94d5c82b5598b15a2eac8fa0284fc8', '2019-09-03 19:16:57', 1, NULL, '3369064', 3),
(19, 'LANUANE VIEIRA SILVA', '1047254c24369d1d5d87a23a31c9d8a3', '2019-09-03 19:18:30', 1, NULL, '3133974', 3),
(20, 'LUANA MAIZA DA SILVA SOUZA', 'fb1649a1c8dd8a25e884f465a4b187a8', '2019-09-03 19:20:33', 1, NULL, '3395405', 3),
(21, 'MARCIO CAMPOS FERRARI', '6b55219874228cc3319b3e30f1578055', '2019-09-06 21:02:42', 1, NULL, '636108', 1),
(23, 'WYLISTON LESSA CAIRES', 'f3646f53eaa841a994aae9ba3842763b', '2019-09-10 17:22:46', 1, NULL, '3164527', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
