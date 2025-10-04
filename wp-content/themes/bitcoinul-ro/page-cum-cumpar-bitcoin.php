<?php
/*
Template Name: Cum cumpăr Bitcoin (Tutorial Spot)
*/
if (!defined('ABSPATH')) exit;

get_header();
?>
<style>
.cumpara-page{--bg:#0f172a;--brand:#f7931a;--text:#0f172a;--muted:#6b7280;--card:#ffffff;--border:#e5e7eb;}
.cumpara-hero{padding:48px 0;background:linear-gradient(180deg,#0f172a 0%,#1f2937 100%);color:#fff}
.cumpara-hero .wrap{max-width:1100px;margin:0 auto;padding:0 16px;display:flex;gap:24px;align-items:center}
.cumpara-hero h1{font-size:40px;line-height:1.1;margin:0}
.cumpara-hero p{color:#e5e7eb;font-size:18px;margin-top:12px}
.cumpara-cta{display:flex;gap:12px;flex-wrap:wrap;margin-top:20px}
.cumpara-cta a{background:linear-gradient(135deg,#f7931a,#ff6b00);color:#fff;padding:12px 16px;border-radius:12px;text-decoration:none;font-weight:700}
.cumpara-grid{max-width:1100px;margin:32px auto;padding:0 16px;display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}
.cumpara-card{background:var(--card);border:1px solid var(--border);border-radius:14px;padding:18px}
.cumpara-card h3{margin:0 0 8px;font-size:20px}
.cumpara-card p{color:#374151}
.step{display:flex;gap:14px;margin:12px 0}
.step .n{flex:0 0 36px;height:36px;border-radius:10px;background:#111827;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800}
.step .b{flex:1}
.exchange-tutorial{max-width:1100px;margin:24px auto;padding:0 16px}
.exchange{border:1px solid var(--border);background:var(--card);border-radius:14px;padding:18px;margin-top:16px}
.exchange h2{display:flex;align-items:center;gap:10px;margin:0 0 8px}
.exchange small{color:#6b7280}
.exchange .actions{margin-top:10px;display:flex;gap:10px;flex-wrap:wrap}
.exchange .actions a{border:1px solid var(--border);border-radius:10px;padding:10px 12px;text-decoration:none;color:#111827;font-weight:600}
.exchange .actions a.exchange-cta{background:linear-gradient(135deg,#f7931a,#ff6b00);color:#fff;border:none}
.note{background:#fff7ed;border:1px solid #fed7aa;color:#7c2d12;border-radius:10px;padding:12px;margin-top:10px}
@media(max-width:900px){.cumpara-grid{grid-template-columns:1fr}}
</style>
<div class="cumpara-page">
  <section class="cumpara-hero">
    <div class="wrap">
      <div style="flex:1">
        <h1>Cum cumpăr Bitcoin în România (Spot) – ghid pas cu pas</h1>
        <p>Următorul tutorial te ghidează, ca începător, să cumperi BTC pe spot rapid și în siguranță la costuri mici, pe platformele: Binance, Bybit și Revolut.</p>
        <div class="cumpara-cta">
          <a href="/exchange-uri/">Vezi comparația exchange‑urilor →</a>
          <a href="/calculatoare-bitcoin/">Calculează cost mediu (DCA) →</a>
        </div>
      </div>
      <div style="flex:1;min-height:140px;display:flex;align-items:center;justify-content:center">
        <div style="background:#111827;border-radius:16px;padding:18px;color:#e5e7eb;max-width:460px">
          <div style="display:flex;gap:10px;align-items:center"><div style="font-size:22px">🧭</div><strong>Pe scurt</strong></div>
          <ul style="margin:10px 0 0 18px">
            <li>Deschizi cont, faci KYC</li>
            <li>Depui RON (card/transfer)</li>
            <li>Cumperi BTC pe spot</li>
            <li>Opțional: muți în portofelul tău</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="cumpara-grid" aria-label="Pași generali">
    <div class="cumpara-card">
      <h3>1) Creează cont și KYC</h3>
      <p>Pe orice platformă reglementată vei trece printr-o verificare de identitate (KYC). Ține aproape un act (CI/pașaport) și fă o poză clară.</p>
      <div class="step"><div class="n">1</div><div class="b">Creează cont cu un email la care ai acces.</div></div>
      <div class="step"><div class="n">2</div><div class="b">Activează 2FA (Google Authenticator) imediat după înregistrare.</div></div>
      <div class="step"><div class="n">3</div><div class="b">Finalizează KYC conform instrucțiunilor platformei.</div></div>
    </div>
    <div class="cumpara-card">
      <h3>2) Depune RON</h3>
      <p>Depunerea prin card este de obicei instant, iar transferul bancar are comisioane mici. Verifică limitele contului tău.</p>
      <div class="step"><div class="n">1</div><div class="b">Alege metoda: card bancar sau transfer (SEPA).</div></div>
      <div class="step"><div class="n">2</div><div class="b">Depune suma pe care vrei să o investești.</div></div>
      <div class="step"><div class="n">3</div><div class="b">Așteaptă confirmarea depunerii (de regulă instant pe card).</div></div>
    </div>
    <div class="cumpara-card">
      <h3>3) Cumpără BTC pe spot</h3>
      <p>Caută perechea BTC/RON sau BTC/USDT și plasează un ordin <em>market</em> (instant) sau <em>limit</em> (la un preț ales).</p>
      <div class="step"><div class="n">1</div><div class="b">Mergi la piața spot a platformei.</div></div>
      <div class="step"><div class="n">2</div><div class="b">Introdu suma și confirmă tranzacția.</div></div>
      <div class="step"><div class="n">3</div><div class="b">Verifică balanța ta BTC după achiziție.</div></div>
    </div>
  </section>

  <section class="exchange-tutorial" aria-label="Exemple pe platforme">
    <article class="exchange" id="binance">
      <h2>Binance <small>– comisioane mici, lichiditate mare</small></h2>
      <ol>
        <li>Deschide cont: <a href="https://accounts.binance.com/en/register?ref=21315882" class="exchange-cta" data-exchange="Binance" target="_blank" rel="nofollow sponsored noopener">Înregistrează-te pe Binance</a></li>
        <li>Finalizează KYC și activează 2FA.</li>
        <li>Depune RON prin card sau transfer (SEPA → convertești din EUR în RON/USDT la nevoie).</li>
        <li>Accesează Spot, caută BTC/RON sau BTC/USDT.</li>
        <li>Plasează ordin Market (instant) sau Limit (preț țintă).</li>
        <li>După cumpărare, poți retrage în portofelul tău pentru custodie proprie.</li>
      </ol>
      <div class="note">Sfat: fii atent la comisionul de taker/maker (≈0.1%). Poți reduce costul folosind BNB pentru taxe sau volume mai mari.</div>
      <div class="actions">
        <a href="/calculatoare-bitcoin/">Calculează cost mediu DCA</a>
        <a href="https://accounts.binance.com/en/register?ref=21315882" class="exchange-cta" data-exchange="Binance" target="_blank" rel="nofollow sponsored noopener">Cumpără pe Binance →</a>
      </div>
    </article>

    <article class="exchange" id="bybit">
      <h2>Bybit <small>– simplu pe spot, opțiuni avansate ulterior</small></h2>
      <ol>
        <li>Cont nou: <a href="https://www.bybit.com/en/invite/?ref=ZW6OLQ" class="exchange-cta" data-exchange="Bybit" target="_blank" rel="nofollow sponsored noopener">Înregistrează-te pe Bybit</a></li>
        <li>KYC + 2FA. Pentru începători, rămâi pe Spot (fără levier).</li>
        <li>Depunere card sau transfer. Poți folosi și rampă fiat → USDT.</li>
        <li>La Markets, caută BTC/USDT sau BTC/EUR.</li>
        <li>Ordin Market pentru simplitate; Limit dacă ai un preț țintă.</li>
        <li>Verifică istoricul de ordine și balanța BTC.</li>
      </ol>
      <div class="note">Atenție: derivatele sunt pentru avansați; evită levierul dacă ești la început. Rămâi pe Spot.</div>
      <div class="actions">
        <a href="/exchange-uri/">Compară exchange‑uri</a>
        <a href="https://www.bybit.com/en/invite/?ref=ZW6OLQ" class="exchange-cta" data-exchange="Bybit" target="_blank" rel="nofollow sponsored noopener">Cumpără pe Bybit →</a>
      </div>
    </article>

    <article class="exchange" id="revolut">
      <h2>Revolut <small>– cumpărare foarte rapidă în aplicație</small></h2>
      <ol>
        <li>Deschide cont: <a href="https://revolut.com/referral/?referral-code=cataliuiy!SEP1-25-AR-H3&geo-redirect" class="exchange-cta" data-exchange="Revolut" target="_blank" rel="nofollow sponsored noopener">Descarcă și creează cont Revolut</a></li>
        <li>Verifică identitatea (KYC) și adaugă un card.</li>
        <li>Din aplicație, mergi la Crypto → caută Bitcoin (BTC).</li>
        <li>Alege suma și confirmă cumpărarea instantă.</li>
        <li>Reține: comisioanele și spread-ul sunt mai mari decât pe un exchange clasic.</li>
        <li>Opțional: transfer către un portofel extern (dacă e disponibil pe planul tău).</li>
      </ol>
      <div class="note">Revolut e excelent pentru simplitate. Pentru costuri minime pe termen lung, folosește un exchange dedicat (de ex. Binance/Bybit) + DCA.</div>
      <div class="actions">
        <a href="/calculatoare-bitcoin/">Simulează DCA lunar</a>
        <a href="https://revolut.com/referral/?referral-code=cataliuiy!SEP1-25-AR-H3&geo-redirect" class="exchange-cta" data-exchange="Revolut" target="_blank" rel="nofollow sponsored noopener">Cumpără în Revolut →</a>
      </div>
    </article>
  </section>

  <section class="exchange-tutorial" aria-label="Întrebări frecvente">
    <div class="exchange">
      <h2>Întrebări frecvente</h2>
      <details>
        <summary>Ce este un ordin Market vs Limit?</summary>
        <p>Market execută imediat la cel mai bun preț disponibil. Limit așteaptă până când piața atinge prețul setat de tine.</p>
      </details>
      <details>
        <summary>Trebuie să mut BTC într-un portofel propriu?</summary>
        <p>Recomandat pentru sume mari sau pe termen lung. Învață despre custodie și securitate înainte de a muta.</p>
      </details>
      <details>
        <summary>Ce strategie de achiziție recomandăm?</summary>
        <p><strong>DCA</strong> – cumperi o sumă fixă periodic, indiferent de preț, pentru a reduce impactul volatilității.</p>
      </details>
    </div>
  </section>

  <section class="exchange-tutorial" aria-label="FAQ – Schema pentru rich results">
    <div class="exchange">
      <div class="faq-badge"><span class="emoji">❓</span><span>FAQ</span></div>
      <h2 style="margin:.5rem 0 0">FAQ – răspunsuri rapide</h2>
      <?php echo do_shortcode('[faq_list title="Cum cumpăr Bitcoin – întrebări frecvente"]
      [faq_item question="Care sunt comisioanele când cumpăr BTC?" answer="Pe exchange-urile mari comisioanele spot sunt ~0.1% (taker/maker). În plus, unele metode (card) au fee suplimentar."]
      [faq_item question="Pot cumpăra sume mici?" answer="Da, poți începe și cu sume foarte mici. Verifică totuși limitele minime ale platformei."]
      [faq_item question="Am nevoie de portofel hardware?" answer="Nu este obligatoriu la început, dar este recomandat pentru sume mai mari sau păstrare pe termen lung (self‑custody)."]
      [faq_item question="Strategia DCA e potrivită pentru începători?" answer="Da, DCA reduce impactul volatilității cumpărând periodic o sumă fixă, indiferent de preț."]
      [faq_item question="Trebuie să declar taxele?" answer="Câștigurile din cripto sunt impozabile în România. Informează‑te și păstrează un istoric al tranzacțiilor."]
      [/faq_list]'); ?>
    </div>
  </section>
</div>

<script>
// Asigură evenimentul GA4 click_exchange_cta
window.addEventListener('DOMContentLoaded', function(){
  function fire(ev, exchange, url){
    try{ if(window.gtag){ gtag('event','click_exchange_cta',{exchange_name: exchange, link_url: url}); } }catch(e){}
  }
  document.querySelectorAll('a.exchange-cta').forEach(function(a){
    a.addEventListener('click', function(){ fire('click', this.dataset.exchange||this.textContent.trim(), this.href); }, {capture:true});
  });
});
</script>
<?php get_footer(); ?>
