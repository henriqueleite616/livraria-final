-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Jun-2019 às 19:29
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estagio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores`
--

CREATE TABLE `autores` (
  `id` int(11) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autores`
--

INSERT INTO `autores` (`id`, `autor`, `created`, `modified`) VALUES
(7, 'J. K. Rowling', '2019-05-27 03:43:58', '2019-05-27 03:43:58'),
(8, 'Luiz Alberto Bacheschi', '2019-05-27 03:59:44', '2019-05-27 03:59:44'),
(10, 'Machado de Assis', '2019-05-29 03:37:47', '2019-05-29 03:37:47'),
(11, 'Friedrich Nietzsche', '2019-05-29 03:39:32', '2019-05-29 03:39:32'),
(12, 'Ernest Cline', '2019-05-29 03:40:18', '2019-05-31 21:05:43'),
(13, 'Taran Matharu', '2019-05-29 03:40:52', '2019-05-29 03:40:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `descric` varchar(250) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`id`, `genero`, `descric`, `created`, `modified`) VALUES
(5, 'Fantasia', 'DragÃµes, Magia e etc.', '2019-05-27 03:45:08', '2019-05-27 03:45:08'),
(6, 'Medicina', 'Coisas Medicas', '2019-05-27 03:59:31', '2019-05-27 03:59:31'),
(8, 'Aventura', 'Altas Aventuras', '2019-05-27 04:25:25', '2019-05-30 14:19:10'),
(9, 'Neurologia', 'Medicina Cerebral', '2019-05-27 04:25:53', '2019-05-27 04:25:53'),
(11, 'Filosofia', 'E meras palavras poderiam descrever algo tÃ£o profundo?', '2019-05-29 04:31:49', '2019-05-29 04:31:49'),
(12, 'FicÃ§Ã£o CiÃªntifica', 'Piew - Piew - Lasers!', '2019-05-29 04:39:58', '2019-05-29 04:39:58'),
(13, 'TecnolÃ³gico', 'Ow! Tecnologia!', '2019-05-29 04:40:30', '2019-05-29 04:40:30'),
(14, 'Futuristico', 'Por que se prender ao presente?', '2019-05-29 04:40:49', '2019-05-29 04:40:49'),
(15, 'ClÃ¡ssico', 'NÃ£o Ã© antigo, Ã© clÃ¡ssico!', '2019-05-29 04:43:33', '2019-05-29 04:43:33'),
(16, 'Magia', 'Avada Kedavra!', '2019-05-29 04:44:59', '2019-05-29 04:44:59'),
(17, 'Contos', 'Pequena obra de ficÃ§Ã£o.', '2019-05-29 04:50:56', '2019-05-29 04:50:56'),
(18, 'Medieval', 'Bravo cavaleiro, por favor aceite esse lenÃ§o como recompensa por ter me salvado!', '2019-05-29 04:55:18', '2019-05-29 04:55:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `subgen1` varchar(100) NOT NULL,
  `subgen2` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `qntest` int(11) NOT NULL,
  `qntloc` int(11) NOT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `isbn` bigint(13) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `nome`, `genero`, `subgen1`, `subgen2`, `autor`, `qntest`, `qntloc`, `descricao`, `isbn`, `created`, `modified`) VALUES
(35, 'A Neurologia Que Todo MÃ©dico Deve Saber - 3Âª Ed. 2015', 'Medicina', '', '', 'Luiz Alberto Bacheschi', 100, 25, '\"A Neurologia Que Todo MÃ©dico Deve Saber - 3Âª Ed. 2015\", preserva a didÃ¡tica e a sistematizaÃ§Ã£o tÃ£o eficiente de suas ediÃ§Ãµes anteriores, procurando investigar e produzir o estudo acurado dos distÃºrbios neurolÃ³gicos, tÃ£o comuns em clÃ­nica mÃ©dica, psiquiatria, geriatria, oftalmologia, ortopedia e outras especialidades mÃ©dicas.', 9788538806240, '2019-05-27 04:22:56', '2019-05-28 23:43:01'),
(51, 'Harry Potter e A Pedra Filosofal', 'Fantasia', 'Magia', '', 'J. K. Rowling', 1188, 20, 'Harry Potter Ã© um garoto orfÃ£o que foi levado para a casa dos tios, que nada tinham a ver com o sobrenatural. AtÃ© os 10 anos, Harry foi maltratado pelos tios, herdava roupas velhas do primo gorducho, tinha Ã³culos remendados e era tratado como um estorvo. Quando fez 11 anos, entretanto, seu destino muda e o conduz a um mundo mÃ¡gico. Descobre sua verdadeira histÃ³ria e seu destino: ser um aprendiz de feiticeiro atÃ© o dia em que terÃ¡ que enfrentar a pior forÃ§a do mal, o homem que assassinou seus pais. Potter fica sabendo que Ã© a Ãºnica pessoa a ter sobrevivido a um ataque do tal bruxo do mal e essa Ã© a causa da marca em forma de raio que ele carrega na testa. Ele nÃ£o Ã© um garoto qualquer, ele sequer Ã© um feiticeiro qualquer; ele Ã© Harry Potter, sÃ­mbolo de poder, resistÃªncia e um lÃ­der natural entre os sobrenaturais. A fÃ¡bula, recheada de fantasmas, paredes que falam, caldeirÃµes, sapos, unicÃ³rnios, dragÃµes e gigantes, nÃ£o Ã©, entretanto, apenas um passatempo.', 9788532530783, '2019-05-27 04:40:26', '2019-05-29 04:49:39'),
(53, 'Jogador NÂº1', 'FicÃ§Ã£o CiÃªntifica', 'Futuristico', 'TecnolÃ³gico', 'Ernest Cline', 54745, 0, 'Um mundo em jogo, a busca pelo grande prÃªmio. O ano Ã© 2044 e a Terra nÃ£o Ã© mais a mesma. Fome, guerras e desemprego empurraram a humanidade para um estado de apatia nunca antes visto. Wade Watts Ã© mais um dos que escapa da desanimadora realidade passando horas e horas conectado ao OASIS â€“ uma utopia virtual global que permite aos usuÃ¡rios ser o que quiserem; um lugar onde se pode viver e se apaixonar em qualquer um dos mundos inspirados nos filmes, videogames e cultura pop dos anos 1980.', 9788544103166, '2019-05-29 04:42:10', '2019-05-29 04:42:10'),
(54, 'Nietzsche Hoje - Sobre Os Desafios Da Vida ContemporÃ¢nea', 'Filosofia', 'ClÃ¡ssico', '', 'Friedrich Nietzsche', 43634634, 0, 'A estreita relaÃ§Ã£o entre o conhecimento e a vida, razÃ£o e emoÃ§Ã£o, a possibilidade de aproximar opostos, aliÃ¡s, por que opostos? NÃ£o se pode ser uma coisa e outra, em vez de escolher entre uma opÃ§Ã£o ou outra? Baseada nestes princÃ­pios e questionamentos, levantados sÃ©culos atrÃ¡s por Nietzsche, a autora Viviane MosÃ© apresenta Nietzsche hoje - Sobre os desafios da vida contemporÃ¢nea. A intenÃ§Ã£o da autora Ã© que nos coloquemos em questÃ£o e reflitamos: o que temos feito? Quais caminhos trilhamos? O que enfim nos tornamos? Ao contrÃ¡rio de buscar uma interaÃ§Ã£o com a vida, um modo de incentivÃ¡-la, a civilizaÃ§Ã£o foi se especializando em substituir a vida por um conjunto de signos, de ficÃ§Ãµes. Precisamos contar a histÃ³ria desta ilusÃ£o que se chama razÃ£o, este sonho antropocÃªntrico de controlar a vida e que hoje desaba. Esta Ã© uma leitura necessÃ¡ria para viver o processo de transformaÃ§Ã£o que impulsiona a filosofia nietzschiana em sua afirmaÃ§Ã£o da vida.', 9788532659552, '2019-05-29 04:44:08', '2019-05-29 04:44:08'),
(55, '50 Contos De Machado De Assis', 'Contos', 'ClÃ¡ssico', '', 'Machado de Assis', 342325, 0, 'Um homem que tem o estranho prazer de torturar ratos, e encara a morte da mulher com a mesma satisfaÃ§Ã£o; uma mulher tÃ£o obcecada em esconder a idade que impede a filha de se casar; um afortunado compositor de melodias populares que deseja desesperadamente escrever mÃºsica clÃ¡ssica; um rapazinho de quinze anos que se deixa empolgar pela visÃ£o dos braÃ§os de uma mulher mais velha... Essas sÃ£o algumas das situaÃ§Ãµes e personagens desta nova antologia de contos de Machado de Assis, que inclui textos famosos mas tambÃ©m escolhas mais inusitadas, alÃ©m de uma apresentaÃ§Ã£o convidativa e de notas esclarecedoras. Seja vocÃª um aficionado pela obra de Machado ou apenas um entusiasta da boa literatura, a amplitude e sutileza desses escritos, o prazer que se extrai da maneira como as histÃ³rias sÃ£o contadas e da observaÃ§Ã£o de pequenos detalhes vÃ£o fazÃª-lo ler, reler e redescobrir um dos maiores escritores brasileiros.', 9788535910391, '2019-05-29 04:51:30', '2019-06-01 15:41:26'),
(56, 'Conjurador - o Aprendiz', 'Fantasia', 'Magia', 'Medieval', 'Taran Matharu', 634653, 0, 'Ele pode invocar demÃ´nios. Primeiro volume da sÃ©rie Conjurador, O aprendiz Ã© um prato cheio para os fÃ£s de Harry Potter, O Senhor dos AnÃ©is e outros clÃ¡ssicos da fantasia. Com referÃªncias a jogos de RPG, PokÃ©mon e Skyrim, o romance mescla a magia dos mundos fantÃ¡sticos com criaturas poderosas em duelos de tirar o fÃ´lego. Fletcher Ã© um Ã³rfÃ£o de 15 anos que conseguiu invocar um demÃ´nio do quinto nÃ­vel. O problema Ã© que apenas os nobres deveriam ser capazes de conjurar criaturas e usÃ¡-las na guerra contra os orcs. Mas plebeus como Fletcher tambÃ©m podem ser conjuradores, e o garoto consegue uma vaga na Academia Vocans, uma escola de magos que prepara seus alunos para os campos de batalha. LÃ¡, ele irÃ¡ enfrentar o bullying dos nobres, mas tambÃ©m aprenderÃ¡ feitiÃ§os e farÃ¡ amigos incomuns, como anÃµes e elfos. AlÃ©m de se provar digno de uma boa patente na guerra, Fletcher e seu grupo de segregados precisam se unir e vencer o preconceito que sofrem na desigual sociedade', 9788501105776, '2019-05-29 04:56:58', '2019-05-29 04:56:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autor` (`autor`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genero` (`genero`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autores`
--
ALTER TABLE `autores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
