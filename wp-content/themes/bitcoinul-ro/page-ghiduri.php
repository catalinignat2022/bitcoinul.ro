<?php
/**
 * Template Name: Ghiduri Bitcoin
 * Pagina cu ghiduri complete despre Bitcoin și investiții crypto
 */

get_header(); ?>

<main class="site-content guides-page">
    
    <!-- Hero Section Ghiduri -->
    <section class="page-hero guides-hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="page-title">
                    📚 Ghiduri Bitcoin România
                </h1>
                <p class="page-subtitle">
                    Învață tot ce trebuie să știi despre Bitcoin: de la primul tău wallet până la strategii avansate de investiții. 
                    Ghiduri complete, actualizate și adaptate pentru piața din România.
                </p>
            </div>
        </div>
    </section>

    <!-- Categorii Ghiduri -->
    <section class="guides-categories">
        <div class="container">
            <div class="category-filters">
                <button class="filter-btn active" data-category="all">Toate Ghidurile</button>
                <button class="filter-btn" data-category="beginner">Începători</button>
                <button class="filter-btn" data-category="intermediate">Intermediar</button>
                <button class="filter-btn" data-category="advanced">Avansat</button>
                <button class="filter-btn" data-category="wallet">Wallet-uri</button>
                <button class="filter-btn" data-category="trading">Trading</button>
            </div>
        </div>
    </section>

    <!-- Lista Ghidurilor -->
    <section class="guides-grid-section">
        <div class="container">
            <div class="guides-grid">

                <!-- Ghid Începători -->
                <article class="guide-card featured" data-category="beginner">
                    <div class="guide-image">
                        <div class="guide-icon">🚀</div>
                    </div>
                    <div class="guide-content">
                        <div class="guide-meta">
                            <span class="difficulty beginner">Începător</span>
                            <span class="read-time">15 min citire</span>
                        </div>
                        <h3>Ce este Bitcoin? Ghidul complet pentru începători</h3>
                        <p>Descoperă totul despre Bitcoin: ce este, cum funcționează, de ce este valoros și cum poți începe să investești în siguranță din România.</p>
                        <div class="guide-highlights">
                            <span>✅ Concepte de bază</span>
                            <span>✅ Primul tău Bitcoin</span>
                            <span>✅ Securitate wallet</span>
                        </div>
                        <a href="#guide-ce-este-bitcoin" 
                           class="read-guide-btn"
                           onclick="trackGuideEngagement('Ce_este_Bitcoin', 'click_to_read'); return true;">
                           Citește Ghidul Complet
                        </a>
                    </div>
                </article>

                <!-- Ghid Wallet -->
                <article class="guide-card" data-category="wallet beginner">
                    <div class="guide-image">
                        <div class="guide-icon">🔐</div>
                    </div>
                    <div class="guide-content">
                        <div class="guide-meta">
                            <span class="difficulty beginner">Începător</span>
                            <span class="read-time">20 min citire</span>
                        </div>
                        <h3>Cum să alegi cel mai bun Wallet Bitcoin în 2025</h3>
                        <p>Comparație completă între wallet-urile hardware, software și mobile. Descoperă care este cel mai sigur pentru nevoile tale.</p>
                        <div class="guide-highlights">
                            <span>✅ Hardware vs Software</span>
                            <span>✅ Seed phrase securitate</span>
                            <span>✅ Recomandări România</span>
                        </div>
                        <a href="#guide-wallet-bitcoin" 
                           class="read-guide-btn"
                           onclick="trackGuideEngagement('Wallet_Bitcoin', 'click_to_read'); return true;">
                           Învață despre Wallet-uri
                        </a>
                    </div>
                </article>

                <!-- Ghid Trading -->
                <article class="guide-card" data-category="trading intermediate">
                    <div class="guide-image">
                        <div class="guide-icon">📈</div>
                    </div>
                    <div class="guide-content">
                        <div class="guide-meta">
                            <span class="difficulty intermediate">Intermediar</span>
                            <span class="read-time">30 min citire</span>
                        </div>
                        <h3>Analiza Tehnică Bitcoin: Strategii de Trading</h3>
                        <p>Învață să citești graficele Bitcoin, să identifici tendințele și să faci predicții informate pentru tranzacțiile tale.</p>
                        <div class="guide-highlights">
                            <span>✅ Indicatori tehnici</span>
                            <span>✅ Suport & Rezistență</span>
                            <span>✅ Risk management</span>
                        </div>
                        <a href="#guide-analiza-tehnica" class="read-guide-btn">Master Trading-ul</a>
                    </div>
                </article>

                <!-- Ghid Taxe -->
                <article class="guide-card" data-category="advanced">
                    <div class="guide-image">
                        <div class="guide-icon">💰</div>
                    </div>
                    <div class="guide-content">
                        <div class="guide-meta">
                            <span class="difficulty advanced">Avansat</span>
                            <span class="read-time">25 min citire</span>
                        </div>
                        <h3>Taxe Bitcoin în România: Tot ce trebuie să știi</h3>
                        <p>Ghid complet despre impozitarea Bitcoin în România: când plătești taxe, cum calculezi profitul și ce documente îți trebuie.</p>
                        <div class="guide-highlights">
                            <span>✅ ANAF reglementări</span>
                            <span>✅ Calculul taxelor</span>
                            <span>✅ Declarația unică</span>
                        </div>
                        <a href="#guide-taxe-bitcoin" class="read-guide-btn">Înțelege Taxele</a>
                    </div>
                </article>

                <!-- Ghid DCA -->
                <article class="guide-card" data-category="intermediate">
                    <div class="guide-image">
                        <div class="guide-icon">📊</div>
                    </div>
                    <div class="guide-content">
                        <div class="guide-meta">
                            <span class="difficulty intermediate">Intermediar</span>
                            <span class="read-time">18 min citire</span>
                        </div>
                        <h3>Strategia DCA (Dollar Cost Averaging) pentru Bitcoin</h3>
                        <p>Cum să investești în Bitcoin pe termen lung cu strategia DCA - metoda preferate de investitorii profesioniști.</p>
                        <div class="guide-highlights">
                            <span>✅ Investiții regulate</span>
                            <span>✅ Reducerea riscului</span>
                            <span>✅ Calculatoare DCA</span>
                        </div>
                        <a href="#guide-dca-strategy" class="read-guide-btn">Aplică Strategia DCA</a>
                    </div>
                </article>

                <!-- Ghid Securitate -->
                <article class="guide-card" data-category="wallet advanced">
                    <div class="guide-image">
                        <div class="guide-icon">🛡️</div>
                    </div>
                    <div class="guide-content">
                        <div class="guide-meta">
                            <span class="difficulty advanced">Avansat</span>
                            <span class="read-time">35 min citire</span>
                        </div>
                        <h3>Securitate maximă pentru Bitcoin: Ghid complet</h3>
                        <p>Protejează-ți investițiile Bitcoin cu cele mai bune practici de securitate: 2FA, multisig, cold storage și mai mult.</p>
                        <div class="guide-highlights">
                            <span>✅ Multi-signature</span>
                            <span>✅ Cold storage</span>
                            <span>✅ Backup strategies</span>
                        </div>
                        <a href="#guide-securitate-bitcoin" class="read-guide-btn">Securizează-ți Bitcoin</a>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- Ghid Rapid de Start -->
    <section class="quick-start-guide">
        <div class="container">
            <h2>🎯 Începe Investiția în Bitcoin - Pașii Esențiali</h2>
            <div class="quick-steps">
                <div class="quick-step">
                    <div class="step-icon">1️⃣</div>
                    <div class="step-content">
                        <h3>Educație de bază</h3>
                        <p>Citește ghidul "Ce este Bitcoin" pentru a înțelege fundamentele</p>
                        <a href="#guide-ce-este-bitcoin" class="step-link">Start aici →</a>
                    </div>
                </div>
                <div class="quick-step">
                    <div class="step-icon">2️⃣</div>
                    <div class="step-content">
                        <h3>Alege Exchange-ul</h3>
                        <p>Selectează o platformă sigură din lista noastră verificată</p>
                        <a href="/exchange-uri" class="step-link">Vezi exchange-urile →</a>
                    </div>
                </div>
                <div class="quick-step">
                    <div class="step-icon">3️⃣</div>
                    <div class="step-content">
                        <h3>Configurează Wallet-ul</h3>
                        <p>Învață să îți securizezi Bitcoin cu un wallet proper</p>
                        <a href="#guide-wallet-bitcoin" class="step-link">Setup wallet →</a>
                    </div>
                </div>
                <div class="quick-step">
                    <div class="step-icon">4️⃣</div>
                    <div class="step-content">
                        <h3>Prima investiție</h3>
                        <p>Începe cu o sumă mică și aplică strategia DCA</p>
                        <a href="#guide-dca-strategy" class="step-link">Învață DCA →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Bitcoin -->
    <section class="bitcoin-faq">
        <div class="container">
            <h2>❓ Întrebări Frecvente despre Bitcoin</h2>
            <div class="faq-grid">
                <div class="faq-item">
                    <h3>Este Bitcoin legal în România?</h3>
                    <p>Da, Bitcoin este complet legal în România. Trebuie să plătești taxe pe profit conform legislației ANAF.</p>
                </div>
                <div class="faq-item">
                    <h3>Cât Bitcoin pot cumpăra cu 100 RON?</h3>
                    <p>Depinde de prețul curent. La un preț de ~200,000 RON/BTC, cu 100 RON cumperi ~0.0005 BTC.</p>
                </div>
                <div class="faq-item">
                    <h3>Este sigur să țin Bitcoin pe exchange?</h3>
                    <p>Pentru sume mari, recomandăm wallet hardware. Pentru sume mici, exchange-urile reglementate sunt OK.</p>
                </div>
                <div class="faq-item">
                    <h3>Cum să nu cad în capcane crypto?</h3>
                    <p>Evită promisiuni de câștiguri rapide, verifică mereu adresele wallet și nu da seed phrase-ul nimănui.</p>
                </div>
            </div>
        </div>
    </section>

</main>

<script>
// Filtru pentru categorii
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const guideCards = document.querySelectorAll('.guide-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter cards
            guideCards.forEach(card => {
                if (category === 'all' || card.getAttribute('data-category').includes(category)) {
                    card.style.display = 'block';
                    setTimeout(() => card.classList.add('visible'), 10);
                } else {
                    card.classList.remove('visible');
                    setTimeout(() => card.style.display = 'none', 300);
                }
            });
        });
    });
});
</script>

<?php get_footer(); ?>