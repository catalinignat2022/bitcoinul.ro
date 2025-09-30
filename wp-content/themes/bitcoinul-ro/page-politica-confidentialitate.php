<?php
/**
 * Template Name: Politica de confidențialitate
 */
get_header(); ?>

<main class="site-content legal-page">
  <section class="page-hero" style="padding:2rem 0 1rem;border-bottom:1px solid var(--border-light,#ececec)">
    <div class="container">
      <h1>Politica de confidențialitate</h1>
      <p style="color:#6b7280">Ultima actualizare: <?php echo date('d.m.Y'); ?></p>
      <p>Protecția datelor dvs. personale este importantă. Această politică explică modul în care colectăm, utilizăm și protejăm datele în conformitate cu Regulamentul (UE) 2016/679 (GDPR) și legislația română aplicabilă.</p>
    </div>
  </section>

  <section class="container" style="padding:1.25rem 0 3rem;max-width:920px">
    <nav class="legal-toc" aria-label="Cuprins" style="margin:1rem 0 2rem">
      <strong>Cuprins</strong>
      <ol style="margin:.5rem 0 0;padding-left:1.25rem">
        <li><a href="#operator">Operatorul de date</a></li>
        <li><a href="#ce-date">Ce date colectăm</a></li>
        <li><a href="#temei">Temeiuri legale</a></li>
        <li><a href="#scopuri">Scopuri și durată</a></li>
        <li><a href="#cookies">Cookie-uri și tehnologii similare</a></li>
        <li><a href="#partajare">Partajarea datelor</a></li>
        <li><a href="#drepturi">Drepturile dvs.</a></li>
        <li><a href="#securitate">Securitatea datelor</a></li>
        <li><a href="#transfer">Transfer în afara SEE</a></li>
        <li><a href="#modificari">Modificări</a></li>
        <li><a href="#contact">Contact DPO</a></li>
      </ol>
    </nav>

    <article class="legal-body">
      <section id="operator" class="legal-section">
        <h2>1. Operatorul de date</h2>
        <p>Operatorul site-ului bitcoinul.ro („Operatorul”). Date de contact: vor fi indicate în această pagină imediat ce compartimentul responsabil este desemnat (DPO, dacă este cazul).</p>
      </section>

      <section id="ce-date" class="legal-section">
        <h2>2. Ce date colectăm</h2>
        <ul>
          <li>Date tehnice: adresă IP, identificatori cookie, tipul dispozitivului, sistem de operare, agent utilizator, pagini vizualizate.</li>
          <li>Date comportamentale agregate: evenimente analitice (de ex. clicuri pe linkuri de afiliere) – în mod agregat/anonomizat acolo unde e posibil.</li>
          <li>Date furnizate voluntar: mesaje trimise prin formulare de contact (dacă/atunci când sunt disponibile).</li>
        </ul>
      </section>

      <section id="temei" class="legal-section">
        <h2>3. Temeiuri legale</h2>
        <ul>
          <li>Art. 6(1)(a) GDPR – consimțământ (ex. cookie-uri de analiză/marketing).</li>
          <li>Art. 6(1)(b) GDPR – executarea unui contract (dacă ne solicitați servicii specifice).</li>
          <li>Art. 6(1)(f) GDPR – interes legitim (securitate, prevenirea fraudelor, funcționarea Site-ului).</li>
        </ul>
      </section>

      <section id="scopuri" class="legal-section">
        <h2>4. Scopuri și durată</h2>
        <ul>
          <li>Funcționarea și îmbunătățirea Site-ului (durată: conform politicii de retenție loguri și cookie-uri).</li>
          <li>Analiză de trafic, măsurarea performanței conținutului.</li>
          <li>Marketing afiliat – urmărirea evenimentelor legate de linkurile de afiliere.</li>
        </ul>
      </section>

      <section id="cookies" class="legal-section">
        <h2>5. Cookie-uri și tehnologii similare</h2>
        <p>Site-ul poate folosi cookie-uri strict necesare, de performanță și/sau marketing. Puteți administra preferințele din bannerul de cookie-uri. Pentru detalii tehnice, consultați pagina „Politica de cookie-uri” (dacă este disponibilă) sau secțiunea dedicată din această Politică.</p>
      </section>

      <section id="partajare" class="legal-section">
        <h2>6. Partajarea datelor</h2>
        <p>Putem partaja date către furnizori de servicii (ex. găzduire, analiză), parteneri de afiliere și autorități, atunci când există o obligație legală. Încheiem acorduri de prelucrare cu împuterniciții conform art. 28 GDPR.</p>
      </section>

      <section id="drepturi" class="legal-section">
        <h2>7. Drepturile dvs.</h2>
        <ul>
          <li>Dreptul de acces, rectificare, ștergere („dreptul de a fi uitat”), restricționare, opoziție și portabilitate;</li>
          <li>Dreptul de a vă retrage consimțământul oricând;</li>
          <li>Dreptul de a depune plângere la ANSPDCP.</li>
        </ul>
        <p>Pentru exercitarea drepturilor, utilizați datele de la secțiunea „Contact”.</p>
      </section>

      <section id="securitate" class="legal-section">
        <h2>8. Securitatea datelor</h2>
        <p>Implementăm măsuri tehnice și organizatorice rezonabile pentru a proteja datele împotriva accesului neautorizat, alterării, divulgării sau distrugerii.</p>
      </section>

      <section id="transfer" class="legal-section">
        <h2>9. Transfer în afara SEE</h2>
        <p>În cazul transferurilor către furnizori din afara SEE, ne asigurăm că există garanții adecvate (SCC sau mecanisme echivalente) conform cap. V GDPR.</p>
      </section>

      <section id="modificari" class="legal-section">
        <h2>10. Modificări</h2>
        <p>Putem actualiza periodic această politică. Versiunea curentă este întotdeauna disponibilă pe această pagină.</p>
      </section>

      <section id="contact" class="legal-section">
        <h2>11. Contact DPO</h2>
        <p>Pentru întrebări privind protecția datelor sau pentru exercitarea drepturilor, ne puteți contacta la adresa indicată pe această pagină sau în pagina de contact (atunci când va fi disponibilă).</p>
      </section>
    </article>
  </section>
</main>

<?php get_footer();
