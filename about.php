<?php require_once('config.php')?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
 <title>About us</title>
      </head>
<body>
<?php include(ROOT_PATH . '/includes/navbar.php') ?>

    <div class="grup">
      <div class="box">
          <h2>Aplicatia web are ca tema un magazin online de electronice.</h1>
<p>In aplicatia web doresc sa implementez un model simplu de magazin de electronice in care un utilizator sa poata accesa cu usurita produse din categoria dorita, sa poata alcatui un cos de cumparaturi si sa poata sa trimita o comanda</p>
<li>Din bara de navigatie vom putea alege : Home, Cont utilizator, Cos de cumparaturi, Cautare avansanta, About us </li>
<li>In Home vom gasi cateva produse aflate la oferta din fiecare categorie, in partea din stanga se va gasi si o lista cu mai multe categorii de produse.</li>
<li>La alegerea unei categorii vom fi redirectionati catre o pagina cu produse din categoria selectata. Vom putea sorta elementele categoriei dupa pret, denumire, vom putea adauga in cos.</li>
<li>In Cont utilizator vor fi prezentate date de cont ale utilizatorului. Putem creea un cont nou, ne putem loga sau modifica contul.</li>
<li>In cosul de cumparaturi vor aparea produsele adugate in cos. Aici vom putea selecta numarul de elemente din cos, elimina un produs din cos. tot aici se va face si primul pas pentru plasarea unei comenzi.</li>
<li>Pentru a plasa o comanda utilizatorul trebui sa fie logat.</li>
<li>In cautare avansata utilizatorul va putea alege mai multe filtre(categoria, intervalul de pret, denumirea) pentru a cauta produsul dorit.</li>
<li>Pentru partea de administrare va exista o pagina speciala pentru logare.</li>
<li>Odata logat ca administrator vei avea un meniu in care vei putea adauga, modifica sau sterge orice produs sau categorie, vizualiza comenzi, confirma comenzi. Tot aici puteti creea conturi noi de administrator/clienti.</li>
<li>In About us vom avea detalii despre aplicatia web, inclusiv aceste informatii.</li>
<h2>Baza de date</h2>
<p>Baza de date pentru aplicatia web ar avea nevoie de 5 tabele:</p>
<li>utilizator(#id_utilizator, username, password, nume, prenume, telefon, mail, judet, oras, strada, numar, cod_postal, statut, vkey, verificat, createdate)</li>
<li>categorie(#id_cat, nume)</li>
<li>Produs(#id_produs, id_cat, nume, descriere, pret, img, oferta)</li>
<li>Comanda(#id_comanda, id_utilizator, valoare, data, confirmare)</li>
<li>Produs_comanda(#id_comanda, #id_produs, nr_produs)</li>
          </div>
          
<?php include(ROOT_PATH . '/includes/footer.php') ?>