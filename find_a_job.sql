-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 11:47 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `find_a_job`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_candidates`
--

CREATE TABLE `tb_candidates` (
  `id_c` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` int(50) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `workexperience` longtext DEFAULT NULL,
  `educationexperience` longtext DEFAULT NULL,
  `personalexperience` longtext DEFAULT NULL,
  `saved` tinyint(1) DEFAULT NULL,
  `profileid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `jobid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_candidates`
--

INSERT INTO `tb_candidates` (`id_c`, `firstname`, `lastname`, `email`, `address`, `city`, `zipcode`, `phone`, `birthdate`, `workexperience`, `educationexperience`, `personalexperience`, `saved`, `profileid`, `status`, `jobid`) VALUES
(17, 'Даяна', 'Димитрова', 'selena99selena@abv.bg', 'ул. Стефан Караджа 1Г', 5, 8629, '0988350579', '1999-11-14', '2018-2020 аранжор-касиер Билла ЕООД', '2018-2022 висше обрзование бакалавър\r\nспециалност \"Компютърни системи и технологии\"', 'майчин език: български,\r\nдруги езици: английски, гръцки,\r\nкомпютърни умения', 1, 36, 4, 34),
(18, 'Стиляна ', 'Стоева', 'sstoeva2000@gmail.com', 'ул. Генерал Владимиров 45', 18, 33434, '34344343', '2012-06-28', 'няма', 'СУ \'св. Климент Охридски\'', 'Microsoft office', 1, 38, 3, 34),
(19, 'Мелани', 'Ангелова', 'selena99selena@abv.bg', 'ул. Перуника', 17, 4354, '345435435', '2022-05-31', '2019-2022 аниматор', 'ПУ \'Паисий Хилендарски\'', 'Английски език', NULL, 36, 5, 35),
(20, 'Stilqna', 'Stoeva', 'sstoeva2000@gmail.com', 'ул. Зорница', 18, 1234, '344353453', '2022-06-02', '2018-2022 бариста', 'ГПЧЕ \"Васил Карагьозов\"', 'Английски език и Испански език', NULL, 38, 5, 43),
(21, 'Наско', 'Николов', 'nasko.s.nikolov@abv.bg', 'Ул.Дубровник ', 3, 9300, '0879965851', '1999-02-04', 'Работил едно време в Албена', 'ТУ\"Варна\"', 'Български,', 1, 44, 5, 34),
(22, 'Наско', 'Николов', 'nasko.s.nikolov@abv.bg', 'ул.\"Дубровник\" 18', 3, 9300, '8888888888', '1998-02-26', 'Работил като спасител ', 'ТУ \"Варна\"', 'Български', 1, 44, 5, 49);

-- --------------------------------------------------------

--
-- Table structure for table `tb_category_profession`
--

CREATE TABLE `tb_category_profession` (
  `id` int(11) NOT NULL,
  `title` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category_profession`
--

INSERT INTO `tb_category_profession` (`id`, `title`) VALUES
(3, ' Шофьори, Куриери, Транспорт, Логистика'),
(47, 'Авиация, Летища и Авиолинии'),
(32, 'Автомобили, Автосервизи, Бензиностанции '),
(26, 'Административни, Офис и Бизнес дейности '),
(27, 'Архитектура, Строителство '),
(5, 'Банки, Кредитиране, Застраховане'),
(41, 'Дизайн, Криейтив, Изкуство'),
(44, 'Държавна администрация, Институции'),
(39, 'Енергетика, ВиК, Комунални услуги'),
(33, 'Забавление, Промоции, Спорт, Салони за красота'),
(31, 'Здравеопазване и Фармация'),
(1, 'ИТ'),
(34, 'Маркетинг, Реклама, ПР'),
(45, 'Медии, Издателство'),
(48, 'Морски и Речен транспорт'),
(6, 'Недвижими имоти'),
(40, 'Образование, Курсове, Преводи'),
(35, 'Почистване, Градинарство, Услуги за домакинството'),
(46, 'Право, Юридически услуги'),
(25, 'Производство'),
(30, 'Ремонтни и Монтажни дейности'),
(4, 'Ресторанти, Заведения, Хотели, Туризъм'),
(42, 'Селско и горско стопанство, Рибовъдство'),
(37, 'Сигурност и Охрана'),
(28, 'Счетоводство, Одит, Финанси '),
(36, 'Телекоми'),
(2, 'Търговия и Продажби'),
(23, 'Учител'),
(29, 'Центрове за обслужване на клиенти и бизнес услуги'),
(38, 'Човешки ресурси (HR)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_city`
--

CREATE TABLE `tb_city` (
  `id` int(11) NOT NULL,
  `title` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_city`
--

INSERT INTO `tb_city` (`id`, `title`) VALUES
(7, 'Благоевград'),
(4, 'Бургас'),
(3, 'Варна'),
(8, 'Велико Търново'),
(9, 'Видин'),
(10, 'Враца'),
(11, 'Габрово'),
(12, 'Добрич'),
(13, 'Кърджали'),
(14, 'Кюстендил'),
(15, 'Ловеч'),
(16, 'Монтана'),
(17, 'Пазарджик'),
(18, 'Перник'),
(19, 'Плевен'),
(2, 'Пловдив'),
(20, 'Разград'),
(21, 'Русе'),
(22, 'Силистра'),
(23, 'Сливен'),
(24, 'Смолян'),
(1, 'София'),
(6, 'Стара Загора'),
(26, 'Търговище'),
(27, 'Хасково'),
(28, 'Шумен'),
(5, 'Ямбол');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hr`
--

CREATE TABLE `tb_hr` (
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_hr`
--

INSERT INTO `tb_hr` (`username`, `firstname`, `lastname`) VALUES
('slujitel1', 'Васил', 'Милков'),
('slujitel2', 'Христо', 'Христов');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jobs`
--

CREATE TABLE `tb_jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `payment` decimal(10,0) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `approved` tinyint(4) NOT NULL,
  `sentExpireEmail` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jobs`
--

INSERT INTO `tb_jobs` (`id`, `title`, `payment`, `category`, `city`, `description`, `company`, `expire_date`, `approved`, `sentExpireEmail`) VALUES
(32, 'Монтьор', '850', 5, 19, 'Да сглобява мебели.', 1010202222, '2022-06-18', 0, 1),
(34, 'Front-End Web Developer', '1900', 1, 3, 'Основните задължения към теб ще са:\r\n\r\n•Поддръжка и подобряване на съществуващ софтуер\r\n•Отстраняване на неизправности и грешки \r\n•Изграждането на цялостни UI решения\r\n•Редовно участие в технически прегледи и дискусии за нови функционалности\r\n•Гарантиране на безпроблемно интегриране на технологията с други части на платформата \r\n•Следене на новите тенденции в сферата на дизайна и UX\r\nПостигане на резултати \r\n\r\nОсновните изисквания, които имаме към теб, са:\r\n\r\n•2+ години професионален опит в сферата на Frontend Web Development; \r\n•Mobile first и Responsive стил на работа;\r\n•Отлични умения с: JavaScript, HTML, CSS/ SCSS/ Bootstrap, AJAX/ REST/ GraphQL, jQuery;\r\n•Контрол на кода в GIT;\r\n•Предимство е ако имаш опит с:  Angular 2+/ React/ Vue.js;\r\n•Отговорност и стриктност по отношение сроковете за предоставяне на информация\r\n•Опит с Photoshop и Illustrator ще се счита за предимство\r\n•Работа в екип и способност за самостоятелно изпълнение на поставените задачи ', 1010202222, '2022-07-25', 1, 0),
(35, '.NET Developer', '2300', 1, 2, 'WHAT WILL YOU DO?\r\n\r\n•Participation in design and development of conceptual and architectural models of applied information systems;\r\n•Development and improvement of applied information systems;\r\n•Implementation in real production of information systems;\r\n•Test the developed systems and integration of modules and components in the information systems;\r\n•Preparation of required documentation, related to the implementation of modules, interfaces, description of software libraries as objects, their content and purpose.\r\n\r\nWHAT SKILLS AND QUALIFICATIONS YOU NEED TO HAVE?\r\n\r\n•3+ years of experience in software projects;\r\nUniversity degree in the field of IT is an advantage;\r\n•Experience in the development of large projects;\r\n•Experience and knowledge of modern development technologies;\r\n•Experience in the development of technical documentation/specifications;\r\n•Advanced knowledge of and experience with Microsoft technologies – Visual Studio , MS SQL Server, TSQL, ASP.Net, ASP.Net MVC, ASP.Net Core;\r\n•An advantage would be the knowledge of PostgreSql, PL/PGSQL, Docker containers;\r\n•Very good communication and teamwork skills, as well as the ability to work with clients.', 1010202222, '2022-08-17', 1, 0),
(36, 'Инженер проектант', '2300', 27, 21, 'С цел разширяване на проектантският екип, компанията търси да назначи Инженер Проектант.\r\n\r\nИзисквания към позицията:\r\n•Висше техническо образование; \r\n•Опит в проектирането на слаботокови инсталации;\r\n•Владеене на английски език на работно ниво;\r\n•Умение за работа в екип;\r\n•Компютърна грамотност – Microsoft Office;\r\n•Работа със софтуер за чертане и конструиране, AutoCad;\r\n•Желание и стремеж към постоянно повишаване на квалификацията.\r\n•С предимство са кандидати, притежаващи проектантска правоспособност\r\n\r\nОписание на основните задължения и отговорности:\r\n•Проектиране на специализирани слаботокови системи,  разработване на решения, идейни и технически проекти по слаботокови системи и системи за сигурност;\r\n•Изготвя проектна документация, чертежи, блокови схеми и количествени сметки;\r\n•Изготвяне на екзекутивни чертежи по проекти;\r\n•Огледи на обекти;\r\n•Изготвяне на спецификации за оферти;\r\n•Контрол при изпълнението на проекта;\r\n•Възможни са командировки в страната и чужбина.', 2147483647, '2022-08-16', 1, 0),
(37, 'Служител в строителен магазин', '1250', 27, 13, 'Вашите задължения са:\r\n- Обслужва клиентите на звеното;\r\n- Подреждане и разпределение на доставената стока в складовите пространства на магазина;\r\n- Събира стока по заявки към звеното;\r\n\r\nОт Вас очакваме:\r\n- Минимум средно образование;\r\n- Умения за работа в екип;\r\n\r\nНие предлагаме:\r\n- Продуктово и търговско обучение;\r\n- Възможност за професионална реализация в голяма българска фирма за търговия\r\nсъс строителни материали, машини и инструменти;\r\n- Условия на труд, съобразени с българското законодателство;\r\n- Стартова заплата 1250 нетна сума.\r\n- Осигуровки се начисляват върху цялата заплата.', 2147483647, '2022-08-11', 1, 0),
(38, 'Арматурист', '1700', 27, 21, 'КОГО ТЪРСИМ?\r\nТърсим кандидати, които имат опит в изпълнение на армировъчни работи както на строителните обекти, така и в нашите заводи.\r\nАрматурист е строителен работник, който изпълнява армировъчни работи на строителната площадка за различни бетонни конструкции като фундаменти, плочи, стени, колони или греди. Арматуристът също подготвя арматурни пръти по поръчка, като ги нарязва и огъва.\r\n\r\nВАШИТЕ ЗАДЪЛЖЕНИЯ\r\n\r\nКато арматурист, вие ще носите отговорност за:\r\n- подготовка на арматурни пръти за монтаж;\r\n- монтаж и подреждане на армировка в кофраж\r\n- изправяне, рязане, огъване, съединяване и монтаж на армировка\r\n- монтаж на армировъчни мрежи и скелети.\r\n- монтаж на армировка в кофража в съответствие с конструктивния проект.', 2147483647, '2022-09-14', 1, 0),
(39, 'Багерист', '1150', 27, 21, 'Търсим да назначим багерист на пълно работно време. Опитът е предимство. Атрактивно възнаграждение.', 2147483647, '2022-10-06', 1, 0),
(40, 'Строител', '1550', 27, 20, 'Основни изисквания към кандидата:\r\nСтроителен работник (груб строеж и довършителни работи), който работи надеждно и екипно\r\nАмбицирано и енергично отношение към нови строителни технологии\r\nПрофесионално образование или опит\r\nЖелание за непрекъснато обучение\r\n\r\nНезадължителни предимства:\r\nРабота по енергийно ефективни проекти\r\n\r\nКакво предлагаме:\r\nОбучение: най-качествените строителни технологии, материали и машини; строителство на нискоенергийни и пасивни сгради\r\nДългосрочна работа с професионалисти\r\nМотивиращо възнаграждение, базирано на опита и желанието на кандидата\r\nРаботно облекло\r\nТрудов договор', 2147483647, '2022-09-12', 1, 0),
(41, 'Фризьор/ка', '1200', 33, 5, 'Ние предлагаме:\r\n-трудов договор\r\n-осигуровки\r\n-работа на смени (8 часов работен ден, на смени спрямо седмичен работен график)\r\n-заможни клиенти предполагаща локацията\r\n-възможност за развитие в дългосрочен план\r\n-допълнителни бонуси към заплатата при достигнат месечен таргет\r\n-модерна и луксозна среда на работа\r\n-работи се с продукти на Kerastase и Loreal\r\n\r\n\r\nИзисквания към кандидатите:\r\n-завършен курс\r\n-опит \r\n-умения за работа в екип\r\n-отдаденост на професията\r\n-желание за работа и развитие\r\n-лоялност\r\n-умения за разговори с клиенти\r\n-учтивост\r\n-сериозно отношение\r\n-бързина и високо качество\r\n-поддръжка на работното място в изряден и чист вид\r\n\r\n\r\nПредимство е ако имате следните качества:\r\n-познания върху продукти за коса Kerastase и Loreal', 2050304012, '2022-08-17', 1, 0),
(42, 'Маникюрист/ка', '1200', 33, 5, 'Изисквания:\r\n\r\n- средно образование или по-високо\r\n- удостоверение за завършен курс по специалността\r\n- опит в областта\r\n- представителен външен вид\r\n- комуникативност и умения в работа в екип\r\n- позитивен, с чувство за отговорност и желание за работа\r\n\r\nФирмата предлага:\r\n- различни варианти на работно време.\r\n- % от личния оборот\r\n- салона разполага с постоянна клиентела\r\n- осигуряване на материали изцяло за сметка на салона', 2050304012, '2022-09-06', 1, 0),
(43, 'Масажист/ка', '1300', 33, 5, 'Предлагаме отлични работни условия и възможност за обучение и работа с LPG апарат.\r\n\r\nФинансови условия - трудов договор, осигуровки.', 2050304012, '2022-07-30', 1, 0),
(44, 'Козметик', '1000', 33, 5, 'Търся козметик за козметичен кабинет в салон за красота.Кандидатите да имат професионален опит с козметика за лице ,масаж на тяло ,кола маска ,почистване на вежди .Работа с Аква пилинг апаратира и Wish pro апарат.В салона фунционират фризьорски услуги ,маникюр , педикюр и масажен кабинет.Заплащане на заплата и процент ,трудов договор, 20 дни платена годишна отпуска.', 2050304012, '2022-08-17', 1, 0),
(45, 'Помощник сервитьор', '1100', 4, 28, 'Нашето предложение :\r\n\r\n1. Заплащане над конкурентното за пазара.\r\n\r\n2. Обучение от първият ден на договора.\r\n\r\n3. Система за израстване на ръководни позиции.\r\n\r\n4. Пълна униформа за работа.\r\n\r\n5. Допълнително здравно осигуряване – 5000 болнично лечение, 1000 лв. за прегледи, очила и зъболекар – „Лоялна програма за служители”.\r\n\r\n\r\nИзисквания :\r\n\r\n1. Желание за развитие\r\n\r\n2. Комуникативност\r\n\r\n3. Мотивация за работа в екип\r\n\r\n4. Ние ще ви научим на останалото\r\n\r\nНашите ценности са усмивка, грижа и уважение, както към клиента, така и към служителя!', 1010204444, '2022-08-09', 1, 0),
(46, 'Помощник готвач/ка', '1200', 4, 28, 'Нашето предложение :\r\n1. Заплащане над конкурентното за пазара.\r\n2. Обучение от първият ден на договора.\r\n3. Система за израстване на ръководни позиции.\r\n4. Пълна униформа за работа.\r\n5. Допълнително здравно осигуряване – 5000 болнично лечение, 1000 лв. за прегледи, очила и зъболекар – „Лоялна програма за служители”.\r\n\r\n\r\n\r\nИзисквания :\r\n1. Желание за развитие\r\n2. Комуникативност\r\n3. Мотивация за работа в екип\r\n4. Ние ще ви научим на останалото\r\n\r\nНашите ценности са усмивка, грижа и уважение, както към клиента, така и към служителя!', 1010204444, '2022-09-13', 1, 0),
(47, 'Бариста/Сладкар', '1200', 4, 28, 'Какво ти предлагаме?\r\n- Работа в удобна и здравословна работна среда, с най-модерно оборудване.\r\n- Достъп до професионално обучение.\r\n- Работа в млад екип от мотивирани хора.\r\n- Модерно и удобно работно облекло.\r\n- Атрактивно възнаграждение.\r\n- Разглеждане на представянето на служителите на всеки 6 месеца, което дава възможност за повишаване на заплащането.\r\n\r\nВ какво ще се състои работата ти?\r\nКато сладкар ще приготвяш, печеш и декорираш сладкишите ни. Ще отговаряш за качеството и вида им.\r\nКато бариста ти ще бъдеш лицето ни. Ще продаваш продуктите в пекарните, ще приемаш поръчки, ще информираш и консултираш клиентите за услугите и продуктите ни и ще приготвяш кафе напитките.', 1010204444, '2022-09-07', 1, 0),
(48, 'Готвач Студена кухня', '1300', 4, 28, 'Нашите изисквания:\r\n\r\n- Желания за работа;\r\n- Правилно съхранение на продуктите;\r\n- НЕ Е задължителен опит на подобна позиция\r\n- Висока хигиена, както лична, така и на работното място;\r\n- Отговорност и работа в екип с цел бързо облужване и изпълнение на поръчните;\r\n\r\nНашето предложение:\r\n\r\n- Заплащане 95 лв;\r\n- Коректно заплащане;\r\n- Работно време 2/2;\r\n- Осигурен транспорт след края на работния ден;\r\n- Обучението се заплаща;\r\n- Безплатна консумация по време на работа;', 1010204444, '2022-09-17', 1, 0),
(49, 'Продавач консултант', '750', 2, 12, 'Отговорен служител с опит в продаването на техника.', 2020202020, '2022-07-19', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_liked_jobs`
--

CREATE TABLE `tb_liked_jobs` (
  `id` int(11) NOT NULL,
  `profileid` int(11) NOT NULL,
  `jobid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_liked_jobs`
--

INSERT INTO `tb_liked_jobs` (`id`, `profileid`, `jobid`) VALUES
(14, 36, 35),
(21, 36, 36),
(8, 38, 42),
(22, 38, 44),
(9, 38, 45),
(7, 38, 47),
(18, 44, 34),
(19, 44, 45);

-- --------------------------------------------------------

--
-- Table structure for table `tb_register_client`
--

CREATE TABLE `tb_register_client` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(256) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_register_client`
--

INSERT INTO `tb_register_client` (`id`, `firstname`, `lastname`, `username`, `email`, `verified`, `token`) VALUES
(36, 'Dayana', 'Dimitrova', 'didityyyy', 'selena99selena@abv.bg', 1, '8a726f1e6d9c37e3cbc3208ff46804693907dfbace4956df0a9d91768b9762359893637f27cc15a45ec8319f81c2a547d1a5'),
(38, 'Стиляна', 'Стоева', 'sstoeva', 'sstoeva2000@gmail.com', 1, '70a019532ff5c808a4b6b634e01514730fa66d085c444ea2362b5e9581f69cd8c92961aaaf01ff8c9e670480ad34d45896db'),
(44, 'Nasko', 'Nikolov', 'Nasko99', 'nasko.s.nikolov@abv.bg', 1, 'ac58612d8ca73264f71ac1ec07d0e2ddaa060ee20ddb50c8469c12c13cdb973e8a1799d8a3504581b7351974748fded7d0e2'),
(47, '343242', '3432423', 'hello', 'hello@abv.bg', NULL, 'efffe3fd377389bb2186f777b050a0e9e5babddf24fdb44890a4e888133f3739e525a3db8f83f6f1bb238029fb6ff3550ae9');

-- --------------------------------------------------------

--
-- Table structure for table `tb_register_company`
--

CREATE TABLE `tb_register_company` (
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(256) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `companyname` varchar(50) DEFAULT NULL,
  `companyid` int(15) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `verified` int(11) DEFAULT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_register_company`
--

INSERT INTO `tb_register_company` (`firstname`, `lastname`, `username`, `phone`, `email`, `companyname`, `companyid`, `logo`, `verified`, `token`) VALUES
('Камелия', 'Йорданова', 'itweb', '0895512453', 'itweb@abv.bg', 'ИТ Уеб ЕООД', 1010202222, '1651413574ec347fcff8574bbeb2b62e3aaf5f2496.png', 1, 'e238f22cd3709952e5591d628fe0a15d041989c8d0a481bed89243c8d8b89360888455c11da2a010582816dd932b3ea87950'),
('Мерилин', 'Никова', 'merydi14ltd', '0988376808', 'merydi14ltd@abv.bg', 'Merydi 14 EOOD', 1010204444, '1653396957merydi14ltd.png', 1, 'e5594946de2eab65dc2a2650d5fc1d2f6ba064b33edd09a848f6f9326abcef7ea3156aa031d28b1e30f5d0456b83c5cb9c7e'),
('Наско', 'Николов', 'WarZone', '0897765689', 'warzone2404@gmail.com', 'warzone', 2020202020, '1655637140287226191_1475040089619625_4171855309387206592_n.png', 1, 'ae657c8dc003ace20fdb57f215a13e78dbb15d2d5d782afc5b87fae1ac2c2838e24f4043024eadde035b7c3390dce15889cf'),
('Христиана', 'Йорданова', 'hrisi.ood', '0898142536', 'hrisi.ood@abv.bg', 'Хриси ООД', 2050304012, '1653395641hrisi.ood.png', 1, '1737dabdb60e761f5cec5534f25cca7c7ea01f6cdca842003b625df934aa7f2bd341ba1564a4905b583d888afb311934672e'),
('Христо', 'Жеков', 'jekov.group', '0888254514', 'jekov.group@abv.bg', 'Жеков ГРУП ООД', 2147483647, '1653394903jekov.group.png', 1, '3fd0c90b57ff69959a68a0dfa06ffc918589ea89ad5bcdf9c0647fc4c502b7f4f83f0cad2b5aeeb6d63bb33dd6bd72e15f9b');

-- --------------------------------------------------------

--
-- Table structure for table `tb_used_saved_candidates`
--

CREATE TABLE `tb_used_saved_candidates` (
  `id_usc` int(11) NOT NULL,
  `id_cand` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `jobid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_used_saved_candidates`
--

INSERT INTO `tb_used_saved_candidates` (`id_usc`, `id_cand`, `id_profile`, `status`, `jobid`) VALUES
(1, 17, 36, 5, 35),
(2, 17, 36, 5, 40),
(3, 17, 36, 5, 42),
(4, 21, 44, 1, 35);

-- --------------------------------------------------------

--
-- Table structure for table `tm_role`
--

CREATE TABLE `tm_role` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_role`
--

INSERT INTO `tm_role` (`id`, `title`) VALUES
(1, 'HR'),
(2, 'ADMIN'),
(3, 'COMPANY'),
(4, 'CLIENT');

-- --------------------------------------------------------

--
-- Table structure for table `tm_status`
--

CREATE TABLE `tm_status` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_status`
--

INSERT INTO `tm_status` (`id`, `title`) VALUES
(1, 'Одобрен за интервю'),
(2, 'Интервюиран'),
(3, 'Отхвърлен'),
(4, 'Одобрен'),
(5, 'В изчакване');

-- --------------------------------------------------------

--
-- Table structure for table `tm_users`
--

CREATE TABLE `tm_users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_users`
--

INSERT INTO `tm_users` (`username`, `password`, `role_id`) VALUES
('admin', '54b53072540eeeb8f8e9343e71f28176', 2),
('didityyyy', 'e10adc3949ba59abbe56e057f20f883e', 4),
('hello', 'e10adc3949ba59abbe56e057f20f883e', 4),
('hrisi.ood', 'e10adc3949ba59abbe56e057f20f883e', 3),
('itweb', 'e10adc3949ba59abbe56e057f20f883e', 3),
('jekov.group', 'e10adc3949ba59abbe56e057f20f883e', 3),
('merydi14ltd', 'e10adc3949ba59abbe56e057f20f883e', 3),
('Nasko99', 'e10adc3949ba59abbe56e057f20f883e', 4),
('slujitel1', 'e10adc3949ba59abbe56e057f20f883e', 1),
('slujitel2', 'e10adc3949ba59abbe56e057f20f883e', 1),
('sstoeva', 'e10adc3949ba59abbe56e057f20f883e', 4),
('WarZone', 'e10adc3949ba59abbe56e057f20f883e', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_candidates`
--
ALTER TABLE `tb_candidates`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `tb_candidates_ibfk_1` (`status`),
  ADD KEY `tb_candidates_ibfk_2` (`profileid`),
  ADD KEY `tb_candidates_ibfk_3` (`jobid`),
  ADD KEY `tb_candidates_ibfk_4` (`city`);

--
-- Indexes for table `tb_category_profession`
--
ALTER TABLE `tb_category_profession`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `tb_city`
--
ALTER TABLE `tb_city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `tb_hr`
--
ALTER TABLE `tb_hr`
  ADD KEY `username` (`username`);

--
-- Indexes for table `tb_jobs`
--
ALTER TABLE `tb_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_jobs_ibfk_1` (`category`),
  ADD KEY `tb_jobs_ibfk_2` (`city`),
  ADD KEY `tb_jobs_ibfk_3` (`company`);

--
-- Indexes for table `tb_liked_jobs`
--
ALTER TABLE `tb_liked_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profileid` (`profileid`,`jobid`),
  ADD KEY `tb_liked_jobs_ibfk_2` (`jobid`);

--
-- Indexes for table `tb_register_client`
--
ALTER TABLE `tb_register_client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `tb_register_client_ibfk_1` (`username`);

--
-- Indexes for table `tb_register_company`
--
ALTER TABLE `tb_register_company`
  ADD PRIMARY KEY (`companyid`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `tb_register_company_ibfk_1` (`username`);

--
-- Indexes for table `tb_used_saved_candidates`
--
ALTER TABLE `tb_used_saved_candidates`
  ADD PRIMARY KEY (`id_usc`),
  ADD KEY `tb_used_saved_candidates_ibfk_1` (`id_cand`),
  ADD KEY `tb_used_saved_candidates_ibfk_2` (`id_profile`),
  ADD KEY `tb_used_saved_candidates_ibfk_3` (`status`),
  ADD KEY `tb_used_saved_candidates_ibfk_4` (`jobid`);

--
-- Indexes for table `tm_role`
--
ALTER TABLE `tm_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_status`
--
ALTER TABLE `tm_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_users`
--
ALTER TABLE `tm_users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `tm_users_ibfk_1` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_candidates`
--
ALTER TABLE `tb_candidates`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_category_profession`
--
ALTER TABLE `tb_category_profession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_city`
--
ALTER TABLE `tb_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_jobs`
--
ALTER TABLE `tb_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_liked_jobs`
--
ALTER TABLE `tb_liked_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_register_client`
--
ALTER TABLE `tb_register_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tb_used_saved_candidates`
--
ALTER TABLE `tb_used_saved_candidates`
  MODIFY `id_usc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tm_role`
--
ALTER TABLE `tm_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tm_status`
--
ALTER TABLE `tm_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_candidates`
--
ALTER TABLE `tb_candidates`
  ADD CONSTRAINT `tb_candidates_ibfk_1` FOREIGN KEY (`status`) REFERENCES `tm_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_candidates_ibfk_2` FOREIGN KEY (`profileid`) REFERENCES `tb_register_client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_candidates_ibfk_3` FOREIGN KEY (`jobid`) REFERENCES `tb_jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_candidates_ibfk_4` FOREIGN KEY (`city`) REFERENCES `tb_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_hr`
--
ALTER TABLE `tb_hr`
  ADD CONSTRAINT `tb_hr_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tm_users` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `tb_jobs`
--
ALTER TABLE `tb_jobs`
  ADD CONSTRAINT `tb_jobs_ibfk_1` FOREIGN KEY (`category`) REFERENCES `tb_category_profession` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jobs_ibfk_2` FOREIGN KEY (`city`) REFERENCES `tb_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jobs_ibfk_3` FOREIGN KEY (`company`) REFERENCES `tb_register_company` (`companyid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_liked_jobs`
--
ALTER TABLE `tb_liked_jobs`
  ADD CONSTRAINT `tb_liked_jobs_ibfk_1` FOREIGN KEY (`profileid`) REFERENCES `tb_register_client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_liked_jobs_ibfk_2` FOREIGN KEY (`jobid`) REFERENCES `tb_jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_register_client`
--
ALTER TABLE `tb_register_client`
  ADD CONSTRAINT `tb_register_client_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tm_users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_register_company`
--
ALTER TABLE `tb_register_company`
  ADD CONSTRAINT `tb_register_company_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tm_users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_used_saved_candidates`
--
ALTER TABLE `tb_used_saved_candidates`
  ADD CONSTRAINT `tb_used_saved_candidates_ibfk_1` FOREIGN KEY (`id_cand`) REFERENCES `tb_candidates` (`id_c`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_used_saved_candidates_ibfk_2` FOREIGN KEY (`id_profile`) REFERENCES `tb_register_client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_used_saved_candidates_ibfk_3` FOREIGN KEY (`status`) REFERENCES `tm_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_used_saved_candidates_ibfk_4` FOREIGN KEY (`jobid`) REFERENCES `tb_jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tm_users`
--
ALTER TABLE `tm_users`
  ADD CONSTRAINT `tm_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tm_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `expired_jobs` ON SCHEDULE EVERY 1 DAY STARTS '2022-05-01 23:59:59' ENDS '2023-09-13 16:58:54' ON COMPLETION NOT PRESERVE DISABLE COMMENT 'delete job if it has expired' DO DELETE FROM tb_jobs WHERE expire_date < NOW()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
