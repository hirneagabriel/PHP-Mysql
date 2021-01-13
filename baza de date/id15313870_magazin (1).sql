-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost:3306
-- Timp de generare: ian. 13, 2021 la 12:49 PM
-- Versiune server: 10.3.16-MariaDB
-- Versiune PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `id15313870_magazin`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `nume` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nume`) VALUES
(1, 'Laptopuri'),
(2, 'Telefoane mobile'),
(3, 'Camere video'),
(7, 'Televizoare'),
(9, 'Imprimante');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comanda`
--

CREATE TABLE `comanda` (
  `id_comanda` int(11) NOT NULL,
  `id_utilizator` int(11) NOT NULL,
  `valoare` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `confirmare` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `comanda`
--

INSERT INTO `comanda` (`id_comanda`, `id_utilizator`, `valoare`, `data`, `confirmare`) VALUES
(1, 21, 3715, '2021-01-04 13:30:14', 1),
(2, 21, 2215, '2021-01-04 13:32:02', 1),
(3, 21, 1915, '2021-01-04 13:35:00', 0),
(4, 21, 1215, '2021-01-04 13:39:47', 1),
(5, 21, 615, '2021-01-04 14:10:21', 1),
(6, 21, 1215, '2021-01-12 09:01:17', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produs`
--

CREATE TABLE `produs` (
  `id_produs` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `nume` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descriere` text COLLATE utf8_unicode_ci NOT NULL,
  `pret` int(11) NOT NULL,
  `stoc` int(4) NOT NULL,
  `imagine` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `oferta` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `produs`
--

INSERT INTO `produs` (`id_produs`, `id_cat`, `nume`, `descriere`, `pret`, `stoc`, `imagine`, `oferta`) VALUES
(1, 1, 'Laptop 1', 'procesor placa video etc', 600, 1, 'img1.jpg', 1),
(2, 2, 'Telefon1 ', 'bla bla bla', 1000, 4, 'img2.jpg', 1),
(3, 7, 'Televizor1', 'chestiii', 600, 2, 'img3.jpg', 0),
(4, 3, 'Camera 2', 'Camera de filmat', 700, 3, 'img4.jpg', 0),
(5, 9, 'Imprimanta1', 'Imprimanta color', 700, 5, 'img5.jpg', 0),
(6, 1, 'Laptop Gaming ASUS TUF FX505DT', 'ASUS TUF Gaming FX505 combina cele mai recente procesoare AMD Ryzen™ si solutii grafice NVIDIA GeForce GTX™ cu un ecran NanoEdge de nivel IPS cu rate de reimprospatare de pana la 120Hz, permitandu-ti sa te bucuri de performante ridicate in jocuri si imagini foarte realiste la un nivel de pret accesibil. Este testat si certificat la standardele militare MIL-STD-810G, asigurand robustetea si durabilitatea de care ai nevoie in conditiile de utilizare zilnica.', 3299, 4, 'img10.jpg', 0),
(7, 1, 'ACER Aspire 3 A315-56-37LG', 'Urmareste videoclipuri rapid si fara intreruperi, navigheaza pe internet sau indeplineste-ti sarcinile cu procesorul Intel® Core™ i7 de generatia a 10-a(1) si placa grafica NVIDIA® GeForce® MX230(1). Aplicatiile se incarca mai rapid, elementele grafice au performanta mai buna si poti rezolva sarcini multiple simultan cu aceasta combinatie puternica si cei pana la 16 GB de memorie DDR4(1).', 2499, 4, 'img11.jpg', 1),
(8, 1, 'Lenovo Tb14-IIL I5', 'Conceput pentru cei mereu in mers, ThinkBook 14 \" are o grosime de numai 17,9 mm (0,7\"), astfel incat este usor sa-l strecurati intr-un rucsac sau sub brat. Si cu pana la Intel Core i7 gen 10 si Windows 10 Pro, acest laptop de 14” de afaceri va permite sa abordati orice task, oriunde. Afisajul FHD de 14 ”are margini inguste, ceea ce inseamna un raport ecran-corp de 80% si mai putine distrageri pentru dvs. Exista, de asemenea, doua difuzoare Dolby Audio ™ care ofera un sunet exceptional. Si exista optiunea de grafica discreta pentru lucrari vizuale de inalta rezolutie, videoclipuri sau chiar unele jocuri.', 3055, 3, 'img12.jpg', 0),
(9, 1, 'LENOVO IdeaPad 3 15ARH05', 'Rulati jocurile preferate fara probleme, in modul in care acestea au fost menit sa fie jucate cu NVIDIA ® GeForce ® GTX grafice, procesoare AMD Ryzen ™ 4000 H-Series, memorie DDR4, si optiuni de stocare M.2 NVMe PCIe SSD. Aceste caracteristici puternice va asigura ca puteti rula jocuri pe setari inalte, astfel incat veti avea intotdeauna avantajul de a vedea fiecare detaliu in mediul dvs. de joc.', 3699, 5, 'img13.jpg', 0),
(10, 1, 'HP 15s-fq1051nq', 'Rămâi conectat la ceea ce contează cel mai mult, cu o durată lungă de viaţă a bateriei1 şi un design suplu şi portabil, cu micro-margini. Conceput pentru ca tu să te distrezi şi să fii productiv de oriunde, laptopul HP cu diagonală de 39,6 cm (15,6\") are o performanţă fiabilă şi un ecran extins - oferindu-ţi posibilitatea de a reda în flux, a naviga şi a gestiona activităţile de dimineaţa până seara.', 3099, 2, 'img14.jpg', 0),
(11, 2, 'MOTOROLA Moto E6 Play', 'Filmele, jocurile si site-urile tale preferate prind viata pe ecranul imens. Cu o dimensiune de 5,5\" si un raport de aspect de 18:9, ecranul Max Vision HD+ iti ofera o experienta perfecta de vizionare.Moto E6 Play incape in palma si, datorita finisajului metalic, telefonul arata la fel de placut pe cat este de placuta utilizarea sa.', 359, 5, 'img16.jpg', 0),
(12, 2, 'APPLE iPhone 11', 'Captezi mai mult din ceea ce vezi cu noul sistem de camere. Poti face mai mult cu cel mai rapid chip de un smartphone, plus o durata de viata a bateriei care te rezista toata ziua. Iar amintirile tale vor arata mult mai bine datorita videoclipurilor de cea mai inalta calitate.Cu iPhone 11 realizati fotografii superbe cu noul sistem cu camera duala, fotografii wide si ultra wide. O interfata redesenata utilizeaza noua camera Ultra Wide pentru a va arata ce se intampla in afara cadrului si astfel puteti sa o capturati. Puteti filma si apoi edita videoclipurile la fel de usor ca si fotografiile. Cea mai populara camera din lumea acum cu o perspectiva cu totul noua.', 3199, 4, 'img17.jpg', 0),
(13, 2, 'HUAWEI P Smart 2021', 'Bucura-te de mult mai multe videoclipuri cu HUAWEI P Smart 2021. Cu ajutorul HUAWEI SuperCharge de 22,5 W in doar 10 minute HUAWEI PSmart 2021 se incarca pentru inca 2 ore de distractie. Mai eficient cu mai putine incarcari. mpreuna cu algoritmul inteligent de economisire a energiei, bateria mare de 5000mAh poate avea o autonomie de pana la 38.2 ore de apel 4G, 16.6 ore de redare video online si 12 ore de navigare pe internet 4G.', 899, 7, 'img18.jpg', 0),
(15, 2, 'SAMSUNG Galaxy A20e', 'Cu un afisaj infinity-V HD+ de 5.8\" poti vedea fiecare detaliu al continutului tau. Cel mai mare raport de afisaj, 19.5:9, iti permite sa te bucuri de jocuri si sa vezi si mai multe emisiuni preferate. Galaxy A20e are o camera duala formata din camera principala de 13MP (F1.9) si o camera cu unghi ultra-larg de 5 MP. Cu un camp de vizualizare la un unghi de 123 de grade, la fel ca si ochiul uman, acesta poate surprinde mai mult in fiecare fotografie.', 559, 6, 'img15.jpg', 0),
(16, 3, 'Sony Handycam HDR-CX405', 'Dincolo de tehnologia inalta, performanta Handycam® se bazeaza pe concentrarea atentiei asupra factorilor umani. Cum ar fi flexibilitatea de a crea, a forma, a partaja si a descoperi modalitati mai bune pentru ca imaginile sa va impresioneze cu adevarat. In plus, se acorda atentie atitudinii mai relaxante si totodata functionale pentru a ajunge in sufletul unui subiect. Integritatea cunostintelor Sony este dedicata filmarii mai incitante si mai distractive de la inceput pana la sfarsit. Asadar, aceasta este mai mult decat o simpla camera Handycam®, este un mod mai convenabil de a oferi momente deosebit de fericite - pentru aceasta generatie si cei norocosi care urmeaza.', 919, 4, 'img19.jpg', 0),
(17, 3, 'Panasonic HC-V380EP-K', 'Capturati cu usurinta obiecte aflate la distanta care sunt prea departe pentru a fi inregistrate cu functii conventionale de zoom, gratie caracteristicii de zoom inteligent 90x. De asemenea, puteti utiliza zoomul optic 50x pentru a mari subiectul si a adauga un plus de emotie si de dinamism inregistrarilor dvs. de amator. Cuprindeti in cadru mai multe persoane si un fundal mai larg - functia de unghi larg de 28 mm (echivalenta cu o camera foto de 35 mm) o face posibila. Acest lucru este util in special atunci cand doriti sa faceti o fotografie de grup intr-o incapere mica. Puteti incadra perfect obiectele chiar si atunci cand fotografiati de aproape; de asemenea, microfonul incorporat al camerei video va permite sa capturati chiar si sunetele slabe.', 1824, 3, 'img20.jpg', 0),
(18, 3, 'Sony Handycam FDR-AX43', 'Cu stabilizare optica SteadyShot™ echilibrata, care rivalizeaza cu sistemele cardanice ale concurentilor, inregistrare de filme 4K la inalta rezolutie si sunet de inalta calitate, cu un singur microfon, acest dispozitiv Handycam® pune la dispozitia oricarui utilizator functii profesionale de productie si optiuni simple de partajare a filmelor. Stabilizatorul optic SteadyShot™ echilibrat este o caracteristica unica, avand un mecanism cardanic intern care este de aproximativ 13 ori mai eficient decat alte sisteme optice si care permite fotografierea fara tremur, chiar si in timpul mersului.', 4680, 2, 'img221.jpg', 0),
(19, 7, 'VORTEX 32TD2070S', 'Alege televizorul LED HD Vortex si redefineste modul in care urmaresti programele tale preferate. Bucura-te de fiecare detaliu al culorilor si al sunetului imbunatatit prin tehnolgia de ultima generatie. Lasa-te purtat de un nou nivel al divertismentului la tine acasa. Redai orice tip de continut video, foto sau audio cu ajutorul porturilor USB si HDMI de pe dispozitivele tale portabile, fie ca este un laptop, hard extern sau stick.', 749, 4, 'img21.jpg', 0),
(20, 7, 'PHILIPS 43PUS7855/12', 'Fiecare moment se simte real cu Philips Ambilight. LED-urile inteligente care inconjoara televizorul reactioneaza la actiunile de pe ecran si stralucesc atat de impresionant incat te captiveaza. Experimentati-l o singura data si veti vedea de ce nu mai doriti un televizor fara Ambilight. Suporta sunete Dolby premium si formate video Dolby. Aceasta inseamna ca continutul HDR pe care il vizualizati arata deosebit de real in ceea ce priveste imaginea si sunetul.', 1749, 7, 'img22.jpg', 1),
(21, 7, 'Samsung 50TU7172', 'Televizor Samsung 50TU7172, 125 cm, Smart, 4K Ultra HD, LED. Cu o gama mai larga de culori imaginea se tranforma in realitatea ta. Crystal Display asigura optimizarea culorilor, astfel incat sa poti observa orice detaliu subtil. Calitatea imaginiilor care te impresioneaza, posibila printr-un singur procesor care prelucreaza culoarea, optimizeaza raportul de contrast ridicat si controleaza functia HDR.', 1799, 5, 'img23.jpg', 1),
(22, 7, 'Star-Light 32DM6700', 'Televizorul SMART de la Star-Light, cu un aspect subtire si modern, este potrivit oricarui spatiu de locuit. Puteti vedea detaliile fine din fiecare scena, atat in scenele luminioase cat si intunecoase datorita rezolutiei FullHD. Diagonala de 81 cm va permite sa vedeti imaginea in ansamblu, totul devenind foarte real pe un ecran mare. Aveti acces facil la continut si control simplificat printr-o singura telecomanda si sistemul sau de operare Android. Mai multe conexiuni si compatibilitati datorita celor 11 port-uri  si a tehnologiilor wireless integrate, ce va permit conectarea cu numeroase dispoztive apartinand si altor marci.', 749, 3, 'img24.jpg', 1),
(23, 7, 'LG 50UN73003LA', 'Televizorul cu 4K real pentru tot ce ai nevoie pentru divertisment. Televizorul UHD LG a fost creat pentru divertisment, aducand tot ce vrei sa urmaresti la un alt nivel. Fie ca este vorba de filme, sport sau jocuri, confera imagini 4K real, cu culori vii si detalii fine. Bucura-te de imagini mai pline de realism cu o rezolutie de patru ori mai mare decat cea Full HD.', 1899, 4, 'img25.jpg', 0),
(24, 9, 'HP Deskjet 2320', 'Cel mai simplu mod de a obtine imprimarile esentiale. Datorita configurarii fara probleme de pe PC si imprimarii fiabile, iti satisfaci nevoile zilnice de imprimare, scanare si copiere cu o imprimanta accesibila. Utilizezi aplicatia HP Smart pentru configurare simpla si esti gata sa incepi lucrul.Imprimanta cu capabilitati de securitate dinamica. Conceputa pentru a fi utilizata cu cartuse care utilizeaza numai circuite electronice originale HP. Cartusele cu circuite electronice modificate sau care nu provin de la HP pot sa nu functioneze, iar cele care functioneaza in prezent pot sa nu functioneze in viitor.', 199, 4, 'img26.jpg', 1),
(25, 9, 'Canon PIXMA TS205', 'Imprimanta pentru acasa simpla, accesibila si compacta pentru imprimare de inalta calitate si fara probleme a fotografiilor de 4x6” in culori vii si a documentelor clare. Cu un design compact si elegant si conectivitate simpla prin USB, aceasta imprimanta pentru uz cotidian este o alegere practica si rentabila pentru imprimarea fara efort a unor fotografii frumoase fara chenar, de 4x6\", si a unor documente de inalta calitate, chiar de acasa.', 189, 8, 'img27.jpg', 0),
(26, 9, 'Xerox B215', 'Ideile dumneavoastra nu se opresc niciodata. Imprimanta dumneavoastra ar trebui sa functioneze la fel. Perfecta pentru echipele mici sau pentru biroul de la domiciliu, imprimanta multifunctionala B215 Xerox® va asigura non-stop performantele si fiabilitatea pe care va puteti baza. Aceasta deoarece nimic nu trebuie sa stea in calea urmatoarei idei marete pe care o aveti. Imprimati in conditii de siguranta de pe dispozitivul mobil, laptop sau desktop cu asistenta nativa AirPrint, Google Cloud Print, Mopria si Android.', 1149, 3, 'img28.jpg', 0),
(27, 9, 'HP 107a', 'Bucura-te de o performanta de imprimare excelenta la un pret accesibil. Obtine rezultate de calitate ridicata si imprima si scaneaza de pe telefon. Imprimanta cu capabilitati de securitate dinamica. Se poate utiliza numai cu cartuse cu cip original HP. Cartusele cu cipuri care nu provin de la HP este posibil sa nu functioneze, iar cele care functioneaza in prezent pot sa nu functioneze in viitor.', 339, 6, 'img29.jpg', 0),
(28, 9, 'HP LaserJet Pro MFP M130a', 'Imprimati, scanati si copiati cu cel mai mic MFP LaserJet de la HP – conceput sa incapa in spatii de lucru restranse.Asteptati mai putin. Imprimati pana la 22 de pagini pe minut, primele pagini fiind gata in numai 7,3 secunde. Economisiti energia cu tehnologia HP Auto-On/Auto-Off. Produceti text clar, nuante intense de negru si imagini clare cu tonerul negru de precizie.', 599, 4, 'img30.jpg', 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produs_comanda`
--

CREATE TABLE `produs_comanda` (
  `id_comanda` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `nr_produse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `produs_comanda`
--

INSERT INTO `produs_comanda` (`id_comanda`, `id_produs`, `nr_produse`) VALUES
(1, 2, 3),
(1, 4, 1),
(2, 1, 2),
(2, 2, 1),
(3, 1, 2),
(3, 4, 1),
(4, 1, 2),
(5, 1, 1),
(6, 1, 2);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizator`
--

CREATE TABLE `utilizator` (
  `id_utilizator` int(11) NOT NULL,
  `username` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `nume` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prenume` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `judet` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `oras` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `strada` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `numar` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `cod_postal` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `vkey` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `verificat` tinyint(1) NOT NULL DEFAULT 0,
  `createdate` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `utilizator`
--

INSERT INTO `utilizator` (`id_utilizator`, `username`, `password`, `nume`, `prenume`, `telefon`, `mail`, `judet`, `oras`, `strada`, `numar`, `cod_postal`, `statut`, `vkey`, `verificat`, `createdate`) VALUES
(21, 'GMaster', '$2y$10$hrL7MRw0yZSyWnvoKt38IelD4EsEqfGcHfFJH76QXuJdDuYE5H7p6', 'Gabriel', 'Hirnea', '0732855380', 'hirneagabriel2000@hotmail.com', 'Vrancea', 'Plostina', 'Principala', '1', '627448', 1, '79dc78669fc647de18a3a780fe3a6d15', 1, '2020-11-17 11:28:12.026082'),
(24, '0W45pz4p', '$2y$10$kYr10gnNU4A42WrQG1jg9ueAdncP30raTdHVe8jGGq6v3CRgJizkC', 'ZAP', 'ZAP', 'ZAP', 'foo-bar@example.com', 'ZAP', 'ZAP', 'ZAP', 'ZAP', 'ZAP', 1, 'b0d26369ac65cf9754246fd84b43b338', 0, '2020-11-25 15:09:59.591852'),
(26, 'miercuri', '$2y$10$A4OMt/4NbxVH3.ts/g2DIu8SwYAVOGrzPITOzSBPGCzsKeb1We/U6', 'asd', 'asd', 'sdf', 'yenal56762@mmgaklan.com', 'asdas', 'asd', 'asdas', 'asd', 'aasd', 1, 'c70e3473c8119683eccd3db890fddedd', 1, '2020-12-23 16:46:27.797822'),
(27, 'proiect', '$2y$10$bJt.N5zR/jU9feF7UxsBq.7UDhsuMVEAymv/v2Qyr.XOuea5Ivz/q', 'admin', 'admin', '0732855380', 'asdas@mlp.ro', 'vrancea', 'asd', 'sda', 'asd', 'as', 1, '83342fe627b5b3025aa4f353de524235', 1, '2021-01-06 12:11:02.197267'),
(28, 'admin', '$2y$10$bDD.mknXZcRIiZwHpnt0oOIfU1d6Rfc66sYNEmqp9aEejeKz126.O', 'Hirnea', 'Gabriel', '0732855380', 'admin@electronice.ro', 'Vrancea', 'Plostina', '1', '1', '---', 0, '626c62d59d76b7ab6838dcc34ab64d52', 1, '2021-01-07 10:54:29.152541');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexuri pentru tabele `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`id_comanda`),
  ADD KEY `FK_id_utilizator` (`id_utilizator`);

--
-- Indexuri pentru tabele `produs`
--
ALTER TABLE `produs`
  ADD PRIMARY KEY (`id_produs`),
  ADD KEY `FK_id_cat` (`id_cat`);

--
-- Indexuri pentru tabele `produs_comanda`
--
ALTER TABLE `produs_comanda`
  ADD KEY `fk_id_comanda` (`id_comanda`),
  ADD KEY `fk_id_produs` (`id_produs`);

--
-- Indexuri pentru tabele `utilizator`
--
ALTER TABLE `utilizator`
  ADD PRIMARY KEY (`id_utilizator`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `comanda`
--
ALTER TABLE `comanda`
  MODIFY `id_comanda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `produs`
--
ALTER TABLE `produs`
  MODIFY `id_produs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pentru tabele `utilizator`
--
ALTER TABLE `utilizator`
  MODIFY `id_utilizator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `FK_id_utilizator` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizator` (`id_utilizator`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `produs`
--
ALTER TABLE `produs`
  ADD CONSTRAINT `FK_id_cat` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `produs_comanda`
--
ALTER TABLE `produs_comanda`
  ADD CONSTRAINT `fk_id_comanda` FOREIGN KEY (`id_comanda`) REFERENCES `comanda` (`id_comanda`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_produs` FOREIGN KEY (`id_produs`) REFERENCES `produs` (`id_produs`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
