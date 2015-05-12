
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 11/05/2015 às 18:24:42
-- Versão do Servidor: 5.1.69
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u879518409_year`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE IF NOT EXISTS `cidades` (
  `idCidade` int(11) NOT NULL AUTO_INCREMENT,
  `idEstado` int(11) NOT NULL,
  `nomeCidade` varchar(70) NOT NULL,
  PRIMARY KEY (`idCidade`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`idCidade`, `idEstado`, `nomeCidade`) VALUES
(1, 1, 'Manaus'),
(2, 5, 'Belem'),
(3, 2, 'Belo Horizonte'),
(4, 2, 'Araxa'),
(5, 3, 'Natal'),
(6, 4, 'Porto Alegre');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `sigaEstado` char(2) NOT NULL,
  `nomeEstado` varchar(50) NOT NULL,
  PRIMARY KEY (`idEstado`),
  UNIQUE KEY `sigaEstado` (`sigaEstado`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`idEstado`, `sigaEstado`, `nomeEstado`) VALUES
(1, 'AM', 'Amazonas'),
(2, 'MG', 'Minas Gerais'),
(3, 'RN', 'Rio Grande do Norte'),
(4, 'RS', 'Rio Grande do Sul'),
(5, 'PA', 'Para');

-- --------------------------------------------------------

--
-- Estrutura da tabela `participantes`
--

CREATE TABLE IF NOT EXISTS `participantes` (
  `login` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nomeCompleto` varchar(50) NOT NULL,
  `arquivoFoto` varchar(50) NOT NULL,
  `cidade` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `participantes`
--

INSERT INTO `participantes` (`login`, `senha`, `nomeCompleto`, `arquivoFoto`, `cidade`, `email`, `descricao`, `tipo`) VALUES
('DGondim', 'teste', 'Daniela Gondim', 'DanielaGondim.jpg', 1, 'daniela.gondim2012@gmail.com', 'Sou formada em Sistemas de Informação pela Universidade de Uberaba e trabalho a 2 anos como Analista de Sistemas no setor de desenvolvimento.', 0),
('hriox', 'hriox', 'Helio Rios', 'heliorobertoloureirorios.png', 1, 'mail@heliorios.com', 'Analista de Sistemas', 0),
('hriox2', 'hrx123', 'Roberto Loureiro', '1416348666533.jpg', 5, 'hriox@hotmail.com', '                Nenhuma        ', 0),
('teste', 'teste', 'Test', 'generic.png', 1, 'test@test.com', 'Test', 0),
('APaula', 'teste', 'Alessandro Paula', 'AlessandroPaula.jpg', 1, 'alessandro@amsistemas.com.br', 'Sou Analista de Sistemas há 16 anos, desde 1998 trabalho com WEB, já desenvolvi vários sites, sistemas e aplicações. Para aliviar o stress da área de Tecnologia da Informação, trabalho com música, dando aulas ou tocando em festas e bares.', 0),
('NTeodoro', 'teste', 'Nilson Aparecido Teodoro', 'NilsonTeodoro.jpg', 1, 'nilsonkz22@gmail.com', 'Formado em Sistemas de informação pela Universidade de Araxá, onde concluí o mesmo em Dezembro de 2010. Atuo como Analista de Sistemas desde 2010, onde iniciei como DBA, e atualmente sou desenvolvedor ASP.Net. Optar por essa pós-graduação foi imediata, pois irei adquirir e quem sabe repassar conhecimentos, construir novas alianças, e claro sempre buscando novos desafios.', 0),
('LSoares', 'teste', 'Leonardo Cabral Soares', 'LeonardoSoares.jpeg', 1, 'mail@larback.com.br', 'In google we trust', 0),
('JFerreira', 'teste', 'João Augusto Lima Ferreira', 'JoãoFerreira.jpg', 1, 'joaoaugusto@gmail.com', 'Possuo vivência em análise e desenvolvimento de sistemas, tenho proficiência em data warehouse, fiz cursos oficiais nas ferramentas Business Objects (OLAP) e Power Center (ETL). Também tenho vivência e formação oficial no banco de dados Oracle, além disso, sou certificado no sistema operacional Linux. Venho desenvolvendo aplicativos para WEB desde 2003, já utilizei as linguagens: PHP, Javascript, .Net, C#, Java, Ajax, Xajax. Já passei por micro empresas de desenvolvimento até grandes fábricas de software como IBM. Tenho interesse em engenharia de software, modelos de ciclo de vida de software, arquitetura de sistemas e Linux.', 0),
('NTeixeira', 'teste', 'Nikolas Rodrigues Teixeira', 'NikolasTeixeira.jpg', 1, 'nikolasrod@gmail.com', 'Formado em Análise e Desenvolvimento de Sistemas, programador Python na empresa Starline Tecnologia. Chrome é o melhor navegador, não odeio o Windows 8, Android é melhor que iOS, Xbox é melhor que PS3. :)', 0),
('CBorges', 'teste', 'Cássio Henrique Borges', 'CássioBorges.png', 1, 'cassiohenriqueborges@hotmail.com', 'Formado em Sistemas de Informação pela faculdade - Centro Universitário do Planalto de Araxá - Pos Graduado pela Uni Minas em Segurança da Informação. Trabalho na área de ti há 12 anos com infra-estrutura de rede e servidores Windows e Linux. Atualmente decidi mudar um foco e embarquei neste novo desafio da minha vida que é desenvolver Aplicativos para Web.', 0),
('RBalthazar', 'teste', 'Rodrigo Batista Balthazar', 'RodrigoBalthazar.jpg', 1, 'rodrigobalthazar@yahoo.com', 'Olá, sou engenheiro eletricista e entusiasta na área de linguística. Além dessas áreas, tenho interesse em diversas outras, como a música, o canto, a literatura, as artes marciais e a corrida, para as quais já dediquei ou dedico certo tempo em minha vida.', 0),
('JSilva', 'teste', 'Juliana Aparecida da Silva', 'JulianaSilva.jpg', 1, 'julianapr.silva@gmail.com', 'Olá, sou formada Sistemas para Internet pelo IF Sudeste MG – Câmpus Barbacena. Tenho experiência na área de desenvolvimento, administração e configuração de sistemas de informações e ambientes operacionais. Sou apaixonada sistema operacional linux e programação. Meu hobbie é ler livros e escutar músicas.', 0),
('FCarlos', 'teste', 'Fabiano Pessoa Carlos', 'FabianoCarlos.jpg', 1, 'fabiano.pessoa5@gmail.com', 'Tenho 32 anos, Sou bacharel em Administração pela Estácio de Sá, Pós-Graduado em Engenharia de Software pela ULT , formação técnica em Suporte e Segurança em TI, Especialista em Segurança da Informação e Perícia Computacional Forense. Atuo desde 2011 com teste de invasão e análise de vulnerabilidades, atualmente trabalhando como Analista de Infraestrutura Sênior na Embratel do Rio de Janeiro no setor de homologação de software e hardware para o grupo Carso que, compõe CLARO, NET entre outras empresas.  Estou realizando esta especialização por perceber as inúmeras oportunidades de mercado e visão de profissão do futuro. Como hobbie sou praticante de Jiu-Jitsu, amo minha família, animais ... e espero me casar em breve (risos). Grande abraço a todos!!!', 0),
('PRezende', 'teste', 'Paulo Humberto Rezende', 'PauloRezende.jpg', 1, 'phr.rezende@gmail.com', 'Sou licenciado em Computação no ano de 2013, atualmente trabalho como servidor público no setor de desenvolvimento de sistemas do IFSULDEMINAS. Interesso-me muito por assuntos bastante polêmicos como política e religião. Gosto de ler e curto muito séries de TV, não assisto mais por falta de tempo. Atualmente estou acompanhando Marvel''s Agents of Shield, Under the Dome e Revenge.', 0),
('RTeixeira', 'teste', 'Rafael Bartholomeu Teixeira', 'RafaelTeixeira.jpg', 1, 'rafaelbrt.teixeira@gmail.com', 'Sou programador graduado em Análise e Desenvolvimento de Sistemas. Trabalho como programador em uma indústria de minha cidade, desenvolvendo aplicações para as necessidades específicas do segmento. O curso só tem a agregar na melhoria de qualidade dos projetos.', 0),
('CPossa', 'teste', 'Carlos Henrique Coimbra Possa', 'CarlosPossa.jpg', 1, 'carlos@mastersig.com.br', 'Bacharel em Ciência da Computação pela UNIPAC de Barbacena. Sou responsável pelo departamento de desenvolvimento de sistemas onde trabalho, atuando principalmente com C# e Delphi.', 0),
('ACosta', 'teste', 'Amaury Gonçalves Costa', 'AmauryCosta.jpg', 1, 'baugoncalves@gmail.com', 'sou formado em Sistemas de Informação pela Faculdade Doctum. Meu início de desenvolvimento em web começou em agosto de 2011, em uma empresa que desenvolvia sites e sistemas em JavaScript, CSS, HTML, PHP e SGBD Mysql. Gosto de assistir filmes, seriados e animes.', 0),
('FGama', 'teste', 'Fernando de Araújo Gama', 'FernandoGama.jpg', 1, 'faraujog@hotmail.com', 'Tenho 28 anos, sou formado em Análise e Desenvolvimento de Sistemas desde 2007, MBA em Gestão Empresarial no ano de 2011 e agora faço essa especialização com intuito de agregar valor ao meu trabalho. Já trabalhei como programador Delphi, mas hoje trabalho em uma empresa que desenvolve  sistemas para empresas do varejo, atuo gerenciando a equipe de suporte. Como hobbies pratico boxe e gosto muito de viajar para outros lugares conhecendo pessoas, línguas e culturas diferentes.', 0),
('EFigueiredo', 'teste', 'Edson Pinheiro de Figueiredo', 'EdsonFigueiredo.jpg', 1, 'edsonfigue@gmail.com', 'Sou professor de matemática da rede pública desde que me formei. Formado em Licenciatura em Matemática pela UFRJ em 2010. Cursei mestrado profissional em matemática na PUC-Rio de 2012 a 2013, mas não terminei. Minha experiência em informática foi os 2 anos em que atuei como professor de Informática para concursos públicos em cursos preparatórios. Sei pouco de web, ou melhor, quase nada. Escolhi este curso para justamente preencher esta lacuna. Gosto de ouvir música, ir a praia, viajar, e cozinhar. Sou casado e tenho um filho de 4 anos, que sempre quer brincar nas horas que tento estudar. Estou com grandes espectativas nesta especialização.', 0),
('ESouza', 'teste', 'Edésio Pereira de Souza', 'EdésioSouza.png', 1, 'edesiopsd@gmail.com', 'Sou formado em Ciência da Computação. Pratico futebol e ciclismo. Como hobbie, gosto de ler, jogar xadrez,  ver filmes/séries e desenhar.', 0),
('PBrito', 'teste', 'Paulo César Soares De Brito', 'PauloBrito.png', 1, 'pcego36@gmail.com', 'Sou graduado em Sistemas de Informação pela FACET (Faculdade de Ciências Exatas e Tecnológicas Santo Agostinho) e um apaixonado por linhas de código com foco na pesquisa e desenvolvimento para de APPs para dispositivos móveis e web.', 0),
('SCerqueira', 'teste', 'Sidnei de Cerqueira', 'SidneiCerqueira.jpg', 1, 'sidneidecerqueira@gmail.com', 'Sou graduado em Ciência da Computação, tenho  interesse por tecnologias na área da computação e em outras também. Sou programador PHP na empresa SPDM - ASSOCIAÇÃO PAULISTA PARA O DESENVOLVIMENTO DA MEDICINA.', 0),
('FJunqueira', 'teste', 'Francisco José de Sousa Junqueira', 'FranciscoJunqueira.jpg', 1, 'l530175@gmail.com', 'Minha formação inicial é licenciatura em matemática UFSJ e UNIG, matemática computacional (incompleto) UFMG, especialização em engenharia de software UFLA. Trabalho atualmente como professor na rede pública. Meu interesse principal nesse curso é acadêmico mesmo, em vista de um possível mestrado futuramente (informática na educação).', 0),
('DMoreira', 'teste', 'Douglas José Antunes Moreira', 'DouglasMoreira.jpg', 1, 'email@email.com', 'Bacharel em Ciência da Computação, atua no desenvolvimento de aplicações web tendo como principal ferramenta php, kohana, jasper reports e jquery. Gosta de artes marciais, xadrez e eletrônica.', 0),
('ESilva', 'teste', 'Elizangela Mattos Faria da Silva', 'ElizangelaSilva.jpg', 1, 'elizangela@gmail.com', 'Formada em Análise de Sistemas pela Universidade Federal de MS, trabalho como coordenadora de informática em uma escola particular (Colégio Alexander Fleming). Sou apaixonada por boa música, livros e filmes.', 0),
('FMorais', 'teste', 'Frederico Souza Morais', 'FredericoMorais.jpg', 1, 'fredssmofi@hotmail.com', 'Formei em Sistemas de Informação, sou servidor público, Analista de Sistemas do Município de Sete Lagoas, trabalho na TI da prefeitura daqui na área de suporte e de desenvolvimento da Escola Técnica do Município, pro lazer o bom mesmo é um futebol, jogar e torcer pro flamengo!', 0),
('PCândido', 'teste', 'Paulo Gustavo Lopes Cândido', 'PauloCândido.png', 1, 'pitelosy@gmail.com', 'Bacharel em Sistemas de Informação pela UFV-CRP (2012) e Gerente de Projetos da Realtec Sistemas (2009)', 0),
('FCarvalho', 'teste', 'Fernanda Ramos de Carvalho', 'FernandaCarvalho.jpg', 1, 'nandaramoscarvalho@hotmail.com', 'Formada em Ciência da Computação pela Universidade José do Rosário Vellano. Trabalho na área administrativa. Gosto muito de leitura, filmes e uma boa música.', 0),
('LOliveira', 'teste', 'Leonardo Antônio Oliveira', 'LeonardoOliveira.jpg', 1, 'leonardo.ns.2008@hotmail.com', 'Sou formado em Ciência da Computação pela Universidade de Itaúna/MG. Estou começando a desenvolver projetos Web e me interesso bastante por essa área. Gosto de música, esportes e de viajar.', 0),
('FNeto', 'teste', 'Francisco Alberto Neto', 'FranciscoNeto.jpg', 1, 'fneto33@gmail.com', 'Me interesso pela cultura e pelas especificidades linguísticas dos países da América do Sul. Gosto muito do estilo de escrita de José Saramago. Não dispenso a bicicleta como meio de transporte para o trabalho e para a faculdade.', 0),
('PFaria', 'teste', 'Pablo Vaz Faria', 'PabloFaria.jpg', 1, 'vazsk8@yahoo.com.br', 'Olá, sou graduado em Ciência da Computação pelo Centro Universitário de Formiga o UNIFOR-MG e atualmente trabalho como Analista de Sistemas Web também no UNIFOR-MG. Sempre achei muito interessante e queria muito saber como era possível a comunicação entre Computadores, e como transmissão de informações era realizada. Certamente por isso, escolhi a área da computação. Pretendo mais a frente trabalhar com pesquisas nessa área, desenvolvendo soluções que possam facilitar cada vez mais meu dia a dia, como também a vida de outras pessoas.', 0),
('RPorto', 'teste', 'Rafael Caires Porto', 'RafaelPorto.png', 1, ' rafael.caires@outlook.com', 'Sou formado em Matemática pela UNIMONTES e, atualmente, trabalho na Caixa Econômica Federal. Gosto das tecnologias WEB e pretendo complementar/aprimorar o meu conhecimento com este curso.', 0),
('GMarino', 'teste', 'Gabriel Zago Marino', 'GabrielMarino.jpg', 1, 'gabrielzmarino@gmail.com', 'Formado em Análise e Desenvolvimento de Sistemas pelo Centro Universitário do Espírito Santo (UNESC). Analista e desenvolvedor de sistemas em web, desktop, criação de websites, blogs, dentre outros. Trabalho com as linguagens: PHP, HTML, HTML5, JavaScript, Ajax, CSS e CSS3. Trabalho também com auditorias e melhorias em soluções de Segurança, Tecnologia da Informação e Infra-estrutura. Atuei em processos como Perito em Computação Forense. Possuo certificação Microsoft - MLSS Lite, além dos cursos MCP 2165B/2147B. Curso de Perito em Computação Forense, Curso em Gerenciamento de Sites em WordPress, dentre outros. Gosto de futebol, correr e sair com os amigos.', 0),
('JMartinez', 'teste', 'João Paulo da Silva Canadell Martinez', 'JoãoMartinez.jpg', 1, 'jp@amperstudio.com.br', 'Sou mineiro, mas acabei me mudando para o ES ainda muito jovem. Sempre gostei de tecnologia e descobrir como algo funciona. (até hoje me pego desmontando alguma coisa, e para monta de volta sempre sobram algumas coisinhas kkk). Sou bacharel em sistemas de informação, fundei junto com um amigo uma empresa de  soluções web, que tem dado muito certo.Amo muito o que eu faço e sinto a necessidade de continuar aprendendo. Como Hobbie, sou aspirante a desenhista, um bom rock e livros me deixam em paz. =) ', 0),
('KSantos', 'teste', 'Klaisler Antunes Santos', 'KlaislerSantos.jpg', 1, 'katekas@gmail.com', 'Bacharel em Sistemas de Informação pela PUC Minas - São Gabriel (Belo Horizonte - Minas Gerais) concluído no segundo semestre de 2009. Trabalho com desenvolvimento Web desde 2007 quando participei do programa Proform .NET (student to Business) criado pela Microsof com o apoio da PUC Minas.', 0),
('DEstrázulas', 'teste', 'Daniel Severo Estrázulas', 'DanielEstrázulas.png', 1, 'daniel.estrazulas@gmail.com', 'Formado em ciências da computação pela FURB e atualmente na profissão de Analista de Sistemas no Instituto Federal de Santa Catarina. Meus hobbies são praticar Karatê e andar de bike. Já trabalhei como avaliador de aplicativos PAF-ECF e desenvolvimento Mobile.', 0),
('WJunior', 'teste', 'Wilson Donizetti de Noronha Junior', 'WilsonJunior.jpg', 1, 'wilsondonizetti@hotmail.com', 'Formado em Ciência da Computação, atuo como Analista de Sistema. Gosto de jogos eletrônicos, livros, ver TV dentre outras coisas.', 0),
('ANunes', 'teste', 'Anselmo Maciel Nunes', 'AnselmoNunes.jpg', 1, 'anselmomaciel@gmail.com', 'Graduado em Ciência da Computação pela UNISUL-SC em 1999. Analista de Sistemas do Tribunal de Justiça de Santa Catarina desde 2003. Além da paixão pela minha família, tento incansavelmente aprender a tocar guitarra.', 0),
('ABarros', 'teste', 'Alysson Barros', 'AlyssonBarros.png', 1, 'arb35@yahoo.com.br', 'Sou Tecnólogo de sistemas, e atualmente trabalho na área comercial da Cemig,  sou administrador dos sistemas que envolvem o faturamento, ajudo também na manutenção do nosso site corporativo na rede e na intranet (sharepoint).', 0),
('ÁSantos', 'teste', 'Álvaro Santos', 'ÁlvaroSantos.png', 1, 'alvarosantos@mail.com.br', 'Sou recém formado em Sistemas de Informação e atuo como desenvolvedor web desde meu primeiro estágio. Comecei a pós para aperfeiçoar meus conhecimentos e conhecer mais dessa incrível área de atuação. Como hobbies tenho a prática de corrida,e a leitura de livros de filosofia e mitologia de vários povos.', 0),
('DRodrigues', 'teste', 'David Abraão Petro Rodrigues', 'DavidRodrigues.jpg', 1, 'david.abraao.petro@gmail.com', 'Graduado em Sistemas para Internet. Analista de Sistemas Desenvolvedor empresa própria. Hobbies gosto de brincar com PHP antes de dormir. Gosto de treinar boxes e submission quando tenho tempo. Pretendo com a pós ampliar meu conheço Web.', 0),
('WBraz', 'teste', 'William Alex Braz', 'WilliamBraz.jpg', 1, 'williambraz@gmail.com', 'Formado em Jogos Digitais pela Unicsul em 2008, estou sempre disponível para uma boa e velha partida online. Programador front-end nas horas vagas.', 0),
('ALima', 'teste', 'Antonio Augusto de Lima', 'AntonioLima.jpg', 1, 'aaugustodelima@gmail.com', 'Sou formado em Ciência e professor de Matemática pela rede estadual. Atualmente estou no último semestre Análise e Desenvolvimento de Sistemas. E para Adquiri conhecimento em WEB resolve fazer está especialização. Gosto de estuda e prático karatê.', 0),
('PMascarenhas', 'teste', 'Patrícia Josianne Silva Mascarenhas', 'PatríciaMascarenhas.png', 1, 'patriciajosianne@gmail.com', 'Formada em Sistemas de Informação pela Faculdade Santo Agostinho. Trabalho com o desenvolvimento web há mais de 3 anos, atualmente trabalho com a linguagem Java utilizando frameworks como hibernate, spring e JSF.', 0),
('LMasi', 'teste', 'Lucas Jotadiemel Masi', 'LucasMasi.jpg', 1, 'ljmasi@gmail.com', 'Sou formado em Ciência da Computação pela Puc Minas e Matemática Computacional pela UFMG. Trabalho há mais de 5 anos na UFMG com desenvolvimento web utilizando a linguagem Java e os frameworks Hibernate e JSF.', 0),
('DAraújo', 'teste', 'Daniel Oliveiros Almeida de Araújo', 'DanielAraújo.jpg', 1, 'DanO.A.Araujo@gmail.com', 'Formado em Ciência da Computação pela Universidade Vale do Rio Doce em 2011. Tenho como hobbies leitura, quebra-cabeças lógicos, assistir séries e filmes e escrever.', 0),
('MMelo', 'teste', 'Matheus Leão de Melo', 'MatheusMelo.jpg', 1, 'matheusleaodemelo@gmail.com', 'Descrição Padrão', 0),
('PSouza', 'teste', 'Pablo Souza', 'PabloSouza.jpg', 1, 'pablo.souza@gmail.com', 'Aluno do Curso de Especialização em Desenvolvimento em Aplicações WEB', 0),
('AZerbinato', 'teste', 'André Simonelli Zerbinato', 'AndréZerbinato.jpg', 1, 'andresimonelli@gmail.com', 'Cursando Pós-Graduação em Desenvolvimento de Aplicações Web pela Pontifícia Universidade Católica (PUC-MG). Graduado em Design Digital pela Universidade Anhembi Morumbi - UAM (2010) e Tecnólogo em Projeto e Produção de Internet pela Universidade Anhembi Morumbi -UAM (2006). Atualmente atua como professor titular no Grupo de Formação Profissional ALLNET e professor autônomo no Serviço Nacional de Aprendizagem Comercial (SENAC-SP).', 0),
('KMalheiros', 'teste', 'Kennedi Malheiros', 'KennediMalheiros.jpg', 1, 'kennedimalheiros@gmail.com', 'Sou graduado pela Faculdade de Ciências Exatas e Tecnológicas Santo Agostinho em Sistemas de Informação, trabalhando atualmente com desenvolvimento Java, gosto muito de desenvolvimento Web e Mobile.', 0),
('JViana', 'teste', 'Jéssica Cristiane F. Viana', 'JéssicaViana.jpg', 1, 'cristianne_jessica@hotmail.com', 'Formada em Sistemas para Internet no ano 2013, trabalho como professora de Ferramentas de Design para Web e bolsista na Universidade Federal, escolhi essa especialidade para  aprofundar meus conhecimentos e aprender mais sobre as novas tecnologias para web.', 0),
('FCampos', 'teste', 'Fernando Henrique Resende Campos', 'FernandoCampos.jpg', 1, 'fernandohrcampos@yahoo.com.br', 'Formado em Sistemas de Informação, atualmente trabalhando como supervisor de tecnologia da informação em uma instituição financeira. Amante da tecnologia e grande entusiasta com a ciência.', 0),
('RBarbosa', 'teste', 'Rodrigo Luiz Barbosa', 'RodrigoBarbosa.jpg', 1, 'rolubar@hotmail.com', 'Formado em banco de dados pela faculdade Pitágoras em 2010, atuando no mercado de trabalho como DBA com foco em Microsoft SQL Server. Buscando aprimorar em desenvolvimento web focando o mercado de internet no futuro.', 0),
('EGuimarães', 'teste', 'Erik Guimarães Silva', 'ErikSilva.jpg', 1, 'erikguimaraesdasilva@gmail.com', 'Formado em Sistemas de Informação, trabalha com desenvolvimento web, design e UX.', 0),
('CFilho', 'teste', 'Cedric Carol Patrician Williams Filho', 'CedricWilliams.jpg', 1, 'cedricstm@yahoo.com.br', 'Analista de Sistemas, usando Java para Web. Formado pela UFPA em Processamento de Dados em 2000. Atualmente me dedico a tecnologia Java com foco em RIA.', 0),
('BFoletto', 'teste', 'Bruno Sokolosk Foletto', 'BrunoFoletto.jpg', 1, 'chad_sm@hotmail.com', 'Ex-militar e Bacharel em Ciência da Computação em 2013, tenho gosto pela área da web. Gosto de ver filmes e séries, além de games.', 0),
('GPacheco', 'teste', 'Gregory Pacheco', 'GregoryPacheco.jpg', 1, 'gpzim98@gmail.com', 'Sou formado em Sistemas de Informação pelas Faculdades Santo Agostinho e sou Team Leader de equipe de programação.', 0),
('JSchneider', 'teste', 'Jonathan Schneider', 'JonathanSchneider.png', 1, 'cabral345@hotmail.com', 'Graduado em Ciência da Computação pelo UNIVEL e pós-graduado em Arquitetura JAVA/SOA pela FIAP. Trabalho atualmente com analise/desenvolvimento JavaEE/EJB, nas horas vagas brinco com front-end e acredito que o JavaScript vai dominar o mundo!!', 0),
('PFilho', 'teste', 'Paulo José dos Santos Filho', 'PauloFilho.jpg', 1, 'paulojsfilho@gmail.com', ' Formado em Tecnologia em Processamento de Dados e atualmente, trabalho no Depto de TI da Prefeitura Municipal de Mariana', 0),
('BBarbosa', 'teste', 'Bráulio Batista Alvarenga Barbosa', 'BráulioBarbosa.jpg', 1, 'brauliobatista@ig.com.br', 'Formado em Computação - Sistemas de Informação, pelo Unileste-MG, não tenho emprego fixo na área de TI, mas tenho experiência em manutenção / desenvolvimento de websites e sistemas desktops. Realização de manutenção e criação de recursos para o site de vendas de anúncios www.tocknet.com.br. Desenvolvimento de sistema desktop em Java com JPA para empresa Aquarius Decorarte. Desenvolvimento de sistema web para gerenciamento de processos do setor jurídico e estágio do curso de direito do Unileste-MG, e etc. Gosto de futebol, filmes e jogos online (LOL, PES2013...)', 0),
('DLemos', 'teste', 'Dayan Lemos', 'DayanLemos.jpg', 1, 'dayan-lemos@hotmail.com', 'Formado em Análise e Desenvolvimento de Sistemas pela Universidade Federal de Viçosa. Programador Web na empresa Get Enterprise Technology.', 0),
('RSilva', 'teste', 'Rosangela Freire de Oliveira Silva', 'RosangelaSilva.jpg', 1, 'rosangelafreire@ig.com.br', 'Sou formada em Ciência da Computação, Licenciatura em Matemática e Licenciatura em Informática. Leciono no Centro Paula Souza/SP para alunos do Curso Técnico em Informática e Ensino Técnico Integrado ao Médio. Tenho uma família linda com dois filhos, o Heitor de 6 anos e a Isabela com 3 anos e, hoje, tudo é por eles,  assim meu passatempo se transformou em piquenick no parque, teatros infantis ... Amo muito tudo isso!', 0),
('TPereira', 'teste', 'Thais Silva Pereira', 'ThaisPereira.jpg', 1, 'email@email.com', 'Bacharel em Sistemas de Informação, trabalho com TI há mais de 3 anos. Atualmente trabalho na área de desenvolvimento', 0),
('ABorges', 'teste', 'Adriano Machado Borges', 'AdrianoBorges.jpg', 1, 'adriano.mborges@hotmail.com', 'Descrição Padrão', 0),
('TMonteiro', 'teste', 'Thiago Monteiro', 'ThiagoMonteiro.jpg', 1, 'thiagomonteiro.ti@gmail.com', 'Graduado em Redes de Computadores Faculdade - CET', 0),
('TLima', 'teste', 'Tiago Bernardes de Lima', 'TiagoLima.jpg', 1, 'tb.lima@yahoo.com.br', 'Descrição Padrão', 0),
('GPinho', 'teste', 'Gabriel Paes Pinho', 'GabrielPinho.jpg', 1, 'gabriel.paes.pinho@gmail.com', 'Graduado em Ciências Contábeis e em Análise e Desenvolvimento de Sistemas.', 0),
('JFilho', 'teste', 'José Augusto Monteiro Viana de Souza Filho', 'JoséFilho.jpg', 1, 'j.augusto30@gmail.com', 'Graduado em Web design e Programação pela Universidade do Sul de Santa Catarina com 10 anos de experiência como Web designer. Professor de Web design e Desktop publishing do Senac Pará.', 0),
('TMiranda', 'teste', 'Thiago Clemente de Albuquerque Miranda', 'ThiagoMiranda.jpg', 1, 'email@email.com', 'Bacharel em Ciência da Computação no UNI-BH em 2011', 0),
('SGomes', 'teste', 'Sandro Gomes', 'SandroGomes.png', 1, 'email@email.com', 'Bacharel em Engenharia de Computação - Instituto de Estudos Superiores da Amazônia', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
