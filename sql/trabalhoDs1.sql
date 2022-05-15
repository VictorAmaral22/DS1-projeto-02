-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 15-Maio-2022 às 16:17
-- Versão do servidor: 8.0.29
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabalhods1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

CREATE TABLE `jogo` (
  `id` int NOT NULL,
  `nome` varchar(250) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `preco` double NOT NULL,
  `categoria` int NOT NULL,
  `imagem` varchar(500) NOT NULL,
  `dataregist` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `console` int DEFAULT NULL,
  `quantidade` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogo`
--

INSERT INTO `jogo` (`id`, `nome`, `descricao`, `preco`, `categoria`, `imagem`, `dataregist`, `console`, `quantidade`) VALUES
(3, 'Grand Theft Auto San Andreas', 'Há 5 anos, Carl Johnson fugiu das pressões da vida em Los Santos, San Andreas... uma cidade que se destruía com gangues, drogas e corrupção, onde estrelas de cinema e milionários fazem o melhor que podem para evitar traficantes e bandidos.', 5, 3, 'https://upload.wikimedia.org/wikipedia/pt/d/d3/Grand_Theft_Auto_San_Andreas_capa.png', '2022-05-13 21:34:59', 7, 20),
(4, 'Grand Theft Auto V', 'Quando um tratante inexperiente, um ladrão de bancos aposentado e um psicopata aterrorizante se envolvem com algumas das figuras mais assustadoras e problemáticas do submundo do crime, do governo dos EUA e da indústria do entretenimento, eles precisam realizar uma série de golpes ousados para sobreviver em uma cidade implacável onde não podem confiar em ninguém, nem mesmo um no outro.', 150, 1, 'https://upload.wikimedia.org/wikipedia/pt/8/80/Grand_Theft_Auto_V_capa.png', '2022-05-15 12:46:17', 3, 17),
(5, 'Grand Theft Auto V', 'Quando um tratante inexperiente, um ladrão de bancos aposentado e um psicopata aterrorizante se envolvem com algumas das figuras mais assustadoras e problemáticas do submundo do crime, do governo dos EUA e da indústria do entretenimento, eles precisam realizar uma série de golpes ousados para sobreviver em uma cidade implacável onde não podem confiar em ninguém, nem mesmo um no outro.', 150, 1, 'https://upload.wikimedia.org/wikipedia/pt/8/80/Grand_Theft_Auto_V_capa.png', '2022-05-14 19:02:31', 5, 45),
(6, 'God of War (2018)', 'Kratos é pai novamente. Como mentor e protetor de Atreus, um filho determinado a ganhar seu respeito, ele é forçado a encarar e controlar a fúria que há muito tempo o define enquanto viaja por um mundo ameaçador com o seu filho.', 200, 1, 'https://cdn1.epicgames.com/offer/3ddd6a590da64e3686042d108968a6b2/EGS_GodofWar_SantaMonicaStudio_S2_1200x1600-fbdf3cbc2980749091d52751ffabb7b7_1200x1600-fbdf3cbc2980749091d52751ffabb7b7', '2022-05-13 21:23:01', 5, 69),
(7, 'Doom', 'Doom é uma série de jogos eletrônicos de tiro em primeira pessoa desenvolvida pela id Software. A série gira em torno das aventuras de um fuzileiro espacial sem nome que trabalha para o UAC, que luta contra legiões de demônios e mortos - vivos, a fim de sobreviver e posteriormente, na história, salvar a raça humana.', 60, 2, 'https://image.api.playstation.com/vulcan/ap/rnd/202009/2814/GGyEnCkIXoyiVlN9sRHkzUPo.png', '2022-05-13 21:22:51', 3, 3),
(8, 'Star Wars Jedi Fallen Order', 'Star Wars Jedi: Fallen Order é um jogo eletrônico de ação-aventura desenvolvido pela Respawn Entertainment e publicado pela Electronic Arts. O jogo é ambientado no universo Star Wars, cinco anos após o Episódio III – A Vingança dos Sith, e conta a história de Cal Kestis, um jovem Padawan que está sendo perseguido pelo Império Galático enquanto tenta completar o seu treinamento e restaurar a Ordem Jedi. Foi anunciado durante a E3 2018 e uma revelação mais detalhada aconteceu na Star Wars Celebrat', 100, 3, 'https://image.api.playstation.com/vulcan/img/rnd/202105/1714/WHeOu95nW2SZQy6H5IKgE2Bg.png', '2022-05-13 21:25:38', 5, 48),
(9, 'Dead by Daylight', 'Dead by Daylight é jogado exclusivamente um jogador contra quatro, onde um jogador assume o papel do assassino selvagem, e os outros quatro jogadores jogam como sobreviventes, tentando escapar do assassino, reparando cinco geradores e abrindo os portões de saída para evitar ser capturado, enganchados e sacrificados.', 40, 5, 'https://upload.wikimedia.org/wikipedia/pt/e/e9/Dead_By_Daylight.png', '2022-05-15 12:46:17', 3, 57),
(10, 'The Elder Scrolls V - Skyrim', 'The Elder Scrolls V: Skyrim é um jogo eletrônico de RPG de ação desenvolvido pela Bethesda Game Studios e publicado pela Bethesda Softworks. É o quinto jogo principal da série The Elder Scrolls, seguindo The Elder Scrolls IV: Oblivion. Foi lançado em 11 de novembro de 2011 para Microsoft Windows, PlayStation 3 e Xbox 360. É o primeiro jogo ocidental da história a receber 40/40 (nota máxima) na conceituada Famitsu. O jogo conseguiu três prêmios no VGA 2011, incluindo Jogo do Ano.', 100, 1, 'https://wallpaperstock.net/the-elder-scrolls-v%3A-skyrim-wallpapers_32865_1600x1200.jpg', '2022-05-13 20:31:22', 6, 39),
(11, 'Battlefield 1', '\"Battlefield 1\" terá batalhas multiplayer entre até 64 jogadores e irá mostrar vários lados do conflito do início do século XX, desde seu fronte mais conhecido na Europa, em países como Itália e França, até o deserto da Arábia. Como já é de se esperar, \"Battlefield 1\" também terá combates por terra, mar e ar', 50, 6, 'https://i.ytimg.com/vi/x3tSSwEdZss/maxresdefault.jpg', '2022-05-12 20:42:56', 2, 60),
(12, 'Battlefield 4', 'O protagonista de Battlefield 4 é o Sargento Daniel Recker, membro de um grupo de soldados de elite conhecido como Esquadrão Lápide. Numa missão no Azerbaijão para coletar informações de um general russo desertor, esse esquadrão é descoberto e precisa lutar contra tropas russas para conseguir escapar do país', 10, 6, 'https://upload.wikimedia.org/wikipedia/pt/8/84/Battlefield_4_capa.png', '2022-05-14 19:33:55', 1, 0),
(13, 'Star Wars Episode III: Revenge of the Sith', 'Third-person action/adventure game, Star Wars: Episode III, delivers the ultimate Jedi action experience as Anakin Skywalker and Obi-Wan Kenobi join forces in fierce battles and heroic lightsaber duels until one\'s lust for power and the other\'s devotion to duty leads to a final confrontation between good and evil.\r\n\r\nIn Star Wars: Episode III, players control all the Jedi abilities of both Anakin Skywalker and Obi-Wan Kenobi, including devastating Force powers and advanced lightsaber...', 5, 2, 'https://static.gamevicio.com/imagens_itens/big/12/star-wars-episode-iii-revenge-of-the-sith-cover-011599.webp', '2022-05-13 21:25:38', 7, 39),
(14, 'Star Wars: The Force Unleashed 2', 'Star Wars: The Force Unleashed é um jogo de video game produzido pela LucasArts como parte do projeto multimídia \"The Force Unleshead\" que inclui publicações pela Dark Horse Comics, LEGO, Hasbro e livros Del Rey.[1] The Force Unleashead foi desenvolvido para PlayStation 2, PlayStation 3, Wii, Xbox 360, iPhone, N-Gage, Nintendo DS, PlayStation Portable e aparelhos celulares equipados com Java. O jogo foi lançado na América do Norte em 16 de setembro, na Austrália e sul da Ásia em 17 de setembro e', 5, 2, 'https://cdn-products.eneba.com/resized-products/DLWEcAdIJF_z70CuTZ17RlcQxvYnIi3tXPUZrig46R8_350x200_1x-0.jpeg', '2022-05-13 21:26:10', 7, 59),
(15, 'Resident Evil 2', 'Resident Evil 2[b] is a 1998 survival horror video game developed and published by Capcom for the PlayStation. The player controls Leon S. Kennedy and Claire Redfield, who must escape Raccoon City after its citizens are transformed into zombies by a biological weapon two months after the events of the original Resident Evil. The gameplay focuses on exploration, puzzles, and combat; the main difference from its predecessor are the branching paths, with each player character having unique storylin', 100, 5, 'https://upload.wikimedia.org/wikipedia/pt/c/c5/RE2_remake_PS4_cover_art.png', '2022-05-12 20:48:04', 2, 40),
(16, 'NieR:Automata™', 'NieR: Automata tells the story of androids 2B, 9S and A2 and their battle to reclaim the machine-driven dystopia overrun by powerful machines.\r\n\r\nHumanity has been driven from the Earth by mechanical beings from another world. In a final effort to take back the planet, the human resistance sends a force of android soldiers to destroy the invaders. Now, a war between machines and androids rages on... A war that could soon unveil a long-forgotten truth of the world.\r\n', 107, 1, 'https://upload.wikimedia.org/wikipedia/pt/1/15/Nier_Automata_capa.png', '2022-05-12 21:26:54', 3, 12),
(17, 'Dark Souls', 'Dark Souls se passa primariamente no reino fictício de Lordran, onde os jogadores assumem o papel de um personagem denominado \"Chosen Undead\" que, segundo lendas, seria responsável pela quebra de uma maldição que torna incapazes de morrer aqueles que são afligidos por uma misteriosa marca negra.', 10, 8, 'https://upload.wikimedia.org/wikipedia/pt/7/7c/Dark_Souls_1_capa.png', '2022-05-13 21:31:11', 6, 39),
(18, 'Dark Souls 2', 'Durante a hegemonia dos lords primordiais, quatro reis governaram um reino chamado New Londo, porém, foram seduzidos pelo poder do dreno de vida apresentados pelas forças do abismo (Kaathe, uma das serpentes primordiais), então vieram os darkwraiths, em suma, para não focar no primeiro game, New Londo foi destruída, ...', 60, 8, 'https://upload.wikimedia.org/wikipedia/pt/2/22/Dark_Souls_2_capa.png', '2022-05-13 21:31:11', 3, 9),
(19, 'Dark Souls III', 'Lothric é a cidade onde os Lordes das Cinzas se encontram, esses que têm seus deveres como herdeiros da Chama, responsáveis pela manutenção ou extinção da mesma. Entretanto, quando o dever chamou tais Lordes, cada um fugiu para uma parte do mundo, renunciando e negando seu trabalho', 200, 8, 'https://upload.wikimedia.org/wikipedia/pt/e/e9/Dark_Souls_3_capa.png', '2022-05-13 21:31:11', 5, 49);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `jogo`
--
ALTER TABLE `jogo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `jogo`
--
ALTER TABLE `jogo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
