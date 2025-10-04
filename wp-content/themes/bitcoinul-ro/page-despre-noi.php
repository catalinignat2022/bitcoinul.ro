<?php
/**
 * Template Name: Despre noi (SEO)
 * Template Post Type: page
 *
 * Template pentru pagina "Despre noi" (/despre-noi/)
 * Conținut orientat SEO, cu structură clară, linkuri interne și JSON-LD.
 */

get_header(); ?>

<main class="site-content">
    <section class="about-hero">
        <div class="container">
            <h1 class="about-title">Despre Bitcoinul.ro</h1>
            <p class="about-subtitle">
                Resursa ta în limba română pentru investiții responsabile în Bitcoin: comparam exchange-uri din România,
                explicăm comisioane și securitatea, oferim ghiduri practice și actualizări relevante.
            </p>
            <div class="about-meta">
                <?php if (function_exists('do_shortcode')) { echo do_shortcode('[actualizat prefix="Ultima actualizare: "]'); } ?>
            </div>
        </div>
    </section>

    <section class="about-content">
        <div class="container">
            <div class="about-grid">
                <article class="about-main">
                    <h2 id="misiune">Misiunea noastră</h2>
                    <p>
                        Bitcoinul.ro este un proiect educațional independent, creat pentru a ajuta comunitatea din România
                        să înțeleagă Bitcoin și să ia decizii informate. Nu oferim sfaturi financiare; promovăm
                        educația financiară, securitatea și gestionarea responsabilă a riscului.
                    </p>
                    <ul class="check-list">
                        <li>Explicăm concepte cheie despre Bitcoin într-un limbaj clar.</li>
                        <li>Comparăm <a href="/exchange-uri/">exchange-uri Bitcoin din România</a> pe criterii transparente.</li>
                        <li>Publicăm ghiduri despre <a href="/securitate-portofele-si-custodie/">securitate și auto-custodie</a>,
                            <a href="/fiscalitate-declarare-castiguri-crypto/">fiscalitate</a> și <a href="/strategii-de-investitii-in-bitcoin/">strategii DCA</a>.</li>
                    </ul>

                    <h2 id="cum-evaluam">Cum evaluăm exchange-urile</h2>
                    <p>
                        Evaluările noastre urmăresc criterii obiective, cu accent pe siguranță, costuri și ușurință în utilizare.
                        Actualizăm periodic fișele platformelor pentru a reflecta schimbări de comisioane sau produse.
                    </p>
                    <ol class="num-list">
                        <li><strong>Securitate:</strong> licențe, controale KYC/AML, protecție fonduri, audituri și istoric incident.</li>
                        <li><strong>Comisioane:</strong> taxe de tranzacționare (spot/derivate), depuneri/retrageri în RON și cripto.</li>
                        <li><strong>Depuneri și retrageri:</strong> card, transfer bancar, SEPA, limite și timpi de procesare.</li>
                        <li><strong>Experiență de utilizare:</strong> aplicație mobilă, suport în română, onboarding pentru începători.</li>
                        <li><strong>Transparență:</strong> termeni clari, comunicare proactivă, calitatea suportului.</li>
                    </ol>

                    <h2 id="principii">Principii editoriale</h2>
                    <p>
                        Publicăm conținut verificat, cu surse menționate, evităm senzaționalismul și corectăm prompt erorile.
                        Independența editorială este prioritară; recomandările sunt bazate pe criteriile de mai sus, nu pe compensații.
                    </p>
                    <ul class="dash-list">
                        <li><strong>Independență:</strong> separăm clar publicitatea de conținutul editorial.</li>
                        <li><strong>Transparență:</strong> marcăm vizibil legăturile de afiliere (rel="sponsored").</li>
                        <li><strong>Responsabilitate:</strong> promovăm investițiile responsabile și educația continuă.</li>
                    </ul>

                    <h2 id="finantare">Cum ne finanțăm</h2>
                    <p>
                        Platforma este gratuită. Unele linkuri pot fi de afiliere și sunt marcate ca atare. Folosirea lor nu
                        te costă nimic în plus și ne ajută să susținem proiectul. Nu vindem datele utilizatorilor și nu facem
                        recomandări personalizate.
                    </p>

                    <h2 id="ghiduri">Ghiduri esențiale</h2>
                    <p>
                        Îți recomandăm să începi cu aceste resurse:
                    </p>
                    <ul class="link-list">
                        <li><a href="/ghid-bitcoin-incepatori/">Ghid Bitcoin pentru începători</a></li>
                        <li><a href="/cum-sa-cumperi-bitcoin-in-romania/">Cum să cumperi Bitcoin în România</a></li>
                        <li><a href="/strategii-de-investitii-in-bitcoin/">Strategii de investiții (DCA, cost mediu)</a></li>
                        <li><a href="/securitate-portofele-si-custodie/">Securitate: portofele și auto-custodie</a></li>
                        <li><a href="/fiscalitate-declarare-castiguri-crypto/">Fiscalitate: declararea câștigurilor crypto</a></li>
                        <li><a href="/stiri/">Știri Bitcoin în limba română</a></li>
                    </ul>

                    <h2 id="contact">Contact</h2>
                    <p>
                        Ai întrebări sau feedback? Scrie-ne prin <a href="/contact/">formularul de contact</a>. Încurajăm corecturile,
                        sugestiile de subiecte și semnalarea rapidă a oricăror erori.
                    </p>

                    <div class="about-cta">
                        <h3>Vrei noutăți utile, fără spam?</h3>
                        <p>Abonează-te la newsletter pentru ghiduri practice și știri relevante.</p>
                        <a class="btn-orange" href="/\#newsletter" onclick="trackEvent('cta_click','about','newsletter_link');return true;">Mă abonez</a>
                    </div>

                    <div class="about-note">
                        <small><strong>Disclaimer:</strong> Informațiile au scop educațional și nu reprezintă recomandări de investiții.
                        Investițiile în active volatile, precum Bitcoin, implică riscuri. Nu investi mai mult decât îți permiți să pierzi.</small>
                    </div>

                    <?php if (function_exists('do_shortcode')): ?>
                        <div class="about-faq">
                            <?php echo do_shortcode('[faq_list title="Întrebări frecvente despre Bitcoinul.ro"]
                            [faq_item question="Ce este Bitcoinul.ro?" answer="O platformă educațională în limba română dedicată investițiilor responsabile în Bitcoin: ghiduri, comparații între exchange-uri și știri relevante."]
                            [faq_item question="Cum alegeți exchange-urile recomandate?" answer="Pe baza unui set de criterii: securitate, comisioane, metode de depunere/retragere în RON, experiență de utilizare și transparență."]
                            [faq_item question="Aveți legături de afiliere?" answer="Da, unele linkuri sunt marcate ca \"sponsored\". Acest lucru nu influențează evaluările noastre și nu te costă nimic în plus."]
                            [faq_item question="Oferiți sfaturi financiare?" answer="Nu. Conținutul este informativ. Pentru decizii de investiții, consultă un specialist autorizat."]
                            [/faq_list]'); ?>
                        </div>
                    <?php endif; ?>
                </article>

                <aside class="about-side">
                    <div class="side-card">
                        <h3>Echipa Bitcoinul.ro</h3>
                        <p>
                            Suntem o echipă mică, pasionată de Bitcoin, cu experiență în produse digitale și analiză.
                            Publicăm conținut verificat, actualizat și ușor de înțeles.
                        </p>
                        <ul class="dash-list small">
                            <li>Expertiză: educație financiară, cercetare produs, securitate de bază.</li>
                            <li>Fără paywall. Conținut gratuit pentru comunitate.</li>
                            <li>Deschiși la colaborări media și parteneriate etice.</li>
                        </ul>
                    </div>

                    <div class="side-card">
                        <h3>Linkuri utile</h3>
                        <ul class="link-list">
                            <li><a href="/exchange-uri/">Compară exchange-uri Bitcoin</a></li>
                            <li><a href="/politica-confidentialitate/">Politica de confidențialitate</a></li>
                            <li><a href="/termeni-si-conditii/">Termeni și condiții</a></li>
                            <li><a href="/contact/">Contact</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <style>
    .about-hero{padding:3rem 0 1rem}
    .about-title{font-size:clamp(1.6rem,2.8vw,2.25rem);font-weight:800;margin:0 0 .35rem;color:var(--text-primary,#111827)}
    .about-subtitle{max-width:68ch;color:var(--text-secondary,#374151);line-height:1.7;margin:0}
    .about-meta{margin-top:.5rem;color:#6b7280}
    .about-content{padding:1.5rem 0 3rem}
    .about-grid{display:grid;grid-template-columns:1fr;gap:1.5rem}
    @media(min-width:960px){.about-grid{grid-template-columns:2fr 1fr;gap:2rem}}
    .about-main h2{margin:1.25rem 0 .5rem;font-size:1.25rem;color:#111827}
    .check-list{list-style:none;padding:0;margin:.5rem 0 1rem}
    .check-list li{position:relative;padding-left:1.6rem;margin:.35rem 0}
    .check-list li:before{content:'✓';position:absolute;left:0;top:.1rem;width:1.05rem;height:1.05rem;border-radius:6px;display:inline-grid;place-items:center;background:linear-gradient(135deg,#f7931a,#ff6b00);color:#fff;font-size:.75rem}
    .dash-list{list-style:none;padding:0;margin:.5rem 0 1rem}
    .dash-list li{position:relative;padding-left:1.1rem;margin:.35rem 0}
    .dash-list li:before{content:'—';position:absolute;left:0;top:0;color:#9ca3af}
    .dash-list.small li{margin:.25rem 0}
    .num-list{counter-reset:step;margin:.5rem 0 1rem;padding:0}
    .num-list li{counter-increment:step;list-style:none;position:relative;padding-left:2rem;margin:.5rem 0}
    .num-list li:before{content:counter(step);position:absolute;left:0;top:0;width:1.4rem;height:1.4rem;border-radius:999px;background:#111827;color:#fff;display:inline-grid;place-items:center;font-weight:800;font-size:.85rem}
    .link-list{list-style:none;padding:0;margin:0 0 1rem}
    .link-list li{margin:.35rem 0}
    .link-list a{color:var(--bitcoin-orange,#f7931a);font-weight:600;text-decoration:none;border-bottom:1px dashed rgba(247,147,26,.5)}
    .link-list a:hover{border-bottom-color:transparent}
    .about-cta{margin:1.25rem 0;padding:1rem;border:1px solid #e5e7eb;border-radius:12px;background:#fff}
    .btn-orange{display:inline-block;background:linear-gradient(135deg,#f7931a,#ff6b00);color:#fff;border:none;border-radius:10px;padding:.6rem 1rem;font-weight:700;text-decoration:none}
    .about-note{margin-top:1rem;color:#6b7280}
    .about-faq{margin-top:1.5rem}
    .about-side .side-card{background:#fff;border:1px solid #e5e7eb;border-radius:12px;padding:1rem;margin:0 0 1rem}
    </style>

    <?php
    // JSON-LD: AboutPage + BreadcrumbList
    $site_name = get_bloginfo('name');
    $site_url  = home_url('/');
    $page_url  = get_permalink();
    $logo      = get_stylesheet_directory_uri() . '/assets/img/logo.png'; // înlocuiește dacă există alt logo
    $json_ld = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'BreadcrumbList',
                '@id'   => $page_url . '#breadcrumbs',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Acasă',
                        'item' => $site_url
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'Despre noi',
                        'item' => $page_url
                    ]
                ]
            ],
            [
                '@type' => 'AboutPage',
                '@id'   => $page_url,
                'url'   => $page_url,
                'name'  => 'Despre Bitcoinul.ro',
                'isPartOf' => [
                    '@type' => 'WebSite',
                    'name'  => $site_name,
                    'url'   => $site_url
                ],
                'publisher' => [
                    '@type' => 'Organization',
                    'name'  => $site_name,
                    'url'   => $site_url,
                    'logo'  => [
                        '@type' => 'ImageObject',
                        'url'   => $logo
                    ]
                ],
                'inLanguage' => 'ro-RO',
                'description' => 'Află cine suntem și cum te ajutăm să investești responsabil în Bitcoin: comparații între exchange-uri din România, ghiduri, securitate și fiscalitate.'
            ]
        ]
    ];
    ?>
    <script type="application/ld+json">
        <?php echo wp_json_encode($json_ld, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT); ?>
    </script>

    <noscript>
        <div class="container" style="margin-top:1rem;color:#6b7280">
            Pentru cea mai bună experiență pe această pagină, activează JavaScript.
        </div>
    </noscript>

    </main>

<?php get_footer(); ?>
