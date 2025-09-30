<?php
/*
Template Name: Portofele Bitcoin sigure (Ledger & self-custody)
*/
if (!defined('ABSPATH')) exit;
get_header();
?>
<style>
.pbs-page{--bg:#0f172a;--accent:#f7931a;--card:#fff;--border:#e5e7eb;--muted:#6b7280}
.pbs-hero{padding:48px 0;background:linear-gradient(180deg,#0f172a 0%,#1f2937 100%);color:#fff}
.pbs-hero .wrap{max-width:1100px;margin:0 auto;padding:0 16px;display:flex;gap:24px;align-items:center}
.pbs-hero h1{margin:0;font-size:40px}
.pbs-hero p{margin:10px 0 0;color:#e5e7eb;font-size:18px}
.pbs-grid{max-width:1100px;margin:28px auto;padding:0 16px;display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}
.card{background:var(--card);border:1px solid var(--border);border-radius:14px;padding:18px}
.card h3{margin:0 0 10px}
.step{display:flex;gap:12px;margin:10px 0}
.step .n{flex:0 0 34px;height:34px;border-radius:10px;background:#111827;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800}
.step .b{flex:1}
.section{max-width:1100px;margin:18px auto;padding:0 16px}
.exchange{border:1px solid var(--border);background:#fff;border-radius:14px;padding:18px;margin-top:18px}
.exchange h2{display:flex;gap:10px;align-items:center;margin:0 0 8px}
.exchange small{color:#6b7280}
.actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:10px}
.actions a{border:1px solid var(--border);border-radius:10px;padding:10px 12px;text-decoration:none;color:#111827;font-weight:600}
.actions a.exchange-cta{background:linear-gradient(135deg,#f7931a,#ff6b00);border:none;color:#fff}
.note{background:#fff7ed;border:1px solid #fed7aa;color:#7c2d12;border-radius:10px;padding:12px;margin-top:10px}
@media(max-width:900px){.pbs-grid{grid-template-columns:1fr}}
</style>
<div class="pbs-page">
  <section class="pbs-hero">
    <div class="wrap">
      <div style="flex:1">
        <h1>Portofele Bitcoin sigure: Ledger și self‑custody pas cu pas</h1>
        <p>Învață cum să îți ții BTC în siguranță pe portofele hardware (Ledger) și cum muți monede din exchange-uri (Binance, Bybit, Revolut) în custodia ta.</p>
        <div style="margin-top:16px;display:flex;gap:12px;flex-wrap:wrap">
          <a href="/cum-cumpar-bitcoin/" style="background:linear-gradient(135deg,#f7931a,#ff6b00);color:#fff;padding:10px 14px;border-radius:12px;text-decoration:none;font-weight:700">Cum cumpăr Bitcoin →</a>
          <a href="/calculatoare-bitcoin/" style="background:#fff;color:#111827;padding:10px 14px;border-radius:12px;text-decoration:none;font-weight:700;border:1px solid #e5e7eb">Calculează DCA →</a>
        </div>
      </div>
      <div style="flex:1;min-height:140px;display:flex;align-items:center;justify-content:center">
        <div style="background:#111827;border-radius:16px;padding:18px;color:#e5e7eb;max-width:460px">
          <div style="display:flex;gap:10px;align-items:center"><div style="font-size:20px">🔐</div><strong>Principii cheie</strong></div>
          <ul style="margin:10px 0 0 18px">
            <li>Nu cheile tale, nu monedele tale.</li>
            <li>Seed phrase offline, păstrat redundant.</li>
            <li>Verifică adresele pe ecranul hardware‑ului.</li>
            <li>Folosește 2FA pe conturile de exchange.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="pbs-grid">
    <div class="card">
      <h3>Tipuri de portofele</h3>
      <ul>
        <li><strong>Hardware</strong> (Ledger/Trezor): cel mai bun echilibru între securitate și uzabilitate.</li>
        <li><strong>Software</strong> (mobile/desktop): convenabile pentru sume mici.</li>
        <li><strong>Custodie la terți</strong> (exchange): comod, dar cu risc de contrapartidă.</li>
      </ul>
    </div>
    <div class="card">
      <h3>Ledger – setare inițială</h3>
      <div class="step"><div class="n">1</div><div class="b">Desigilează și conectează dispozitivul.</div></div>
      <div class="step"><div class="n">2</div><div class="b">Generează seed phrase-ul, notează-l pe hârtie/placă.</div></div>
      <div class="step"><div class="n">3</div><div class="b">Instalează aplicația Bitcoin, confirmă pe ecran.</div></div>
      <div class="step"><div class="n">4</div><div class="b">Instalează aplicația companion (Ledger Live) pentru adrese și verificări.</div></div>
    </div>
    <div class="card">
      <h3>Bune practici de securitate</h3>
      <ul>
        <li>Seed phrase offline, fără fotografii/cloud.</li>
        <li>Nu introduce seed-ul pe PC/telefon.</li>
        <li>Activează passphrase avansat dacă stochezi sume mari.</li>
        <li>Fă un test: trimite o sumă mică înainte de sume mari.</li>
      </ul>
    </div>
  </section>

  <section class="section">
    <article class="exchange" id="exemplu-ledger">
      <h2>Exemplu concret: cumperi pe Binance și transferi pe Ledger</h2>
      <ol>
        <li>Cumpără BTC pe spot pe Binance: <a href="https://accounts.binance.com/en/register?ref=21315882" class="exchange-cta" data-exchange="Binance" target="_blank" rel="nofollow sponsored noopener">creează cont pe Binance</a> și finalizează KYC + 2FA.</li>
        <li>Depune RON prin card sau transfer și cumpără <strong>BTC</strong> (BTC/RON sau BTC/USDT, ordin Market/Limit).</li>
        <li>Deschide Ledger Live → contul Bitcoin → <strong>Receive</strong>. Verifică adresa pe ecranul Ledger.</li>
        <li>În Binance → Wallet → Withdraw → selectează <strong>BTC</strong>, lipește adresa din Ledger Live, alege rețeaua <strong>BTC</strong> (on-chain), setează suma și confirmă cu 2FA.</li>
        <li>Așteaptă confirmările din rețea. Verifică în Ledger Live balanța nouă.</li>
      </ol>
      <div class="note">Atenție la rețele: pentru Bitcoin folosește rețeaua <strong>BTC</strong> (nu BEP20/altceva) când trimiți către Ledger.</div>
      <div class="actions">
        <a href="/cum-cumpar-bitcoin/">Vezi și ghidul de cumpărare spot</a>
        <a href="https://accounts.binance.com/en/register?ref=21315882" class="exchange-cta" data-exchange="Binance" target="_blank" rel="nofollow sponsored noopener">Cumpără pe Binance →</a>
      </div>
    </article>
  </section>

  <section class="section" aria-label="Mută BTC din alte exchange‑uri">
    <article class="exchange" id="bybit">
      <h2>Bybit → Ledger</h2>
      <ol>
        <li>Cumpără BTC pe Bybit: <a href="https://www.bybit.com/en/invite/?ref=ZW6OLQ" class="exchange-cta" data-exchange="Bybit" target="_blank" rel="nofollow sponsored noopener">creează cont pe Bybit</a> (KYC + 2FA).</li>
        <li>După achiziția pe Spot, mergi la Withdraw BTC.</li>
        <li>Lipește adresa verificată pe ecranul Ledger și selectează rețeaua BTC.</li>
        <li>Confirmă transferul (poate dura câteva zeci de minute).</li>
      </ol>
      <div class="actions">
        <a href="https://www.bybit.com/en/invite/?ref=ZW6OLQ" class="exchange-cta" data-exchange="Bybit" target="_blank" rel="nofollow sponsored noopener">Cumpără pe Bybit →</a>
      </div>
    </article>

    <article class="exchange" id="revolut">
      <h2>Revolut → Ledger</h2>
      <ol>
        <li>În aplicația Revolut, cumpără BTC rapid: <a href="https://revolut.com/referral/?referral-code=cataliuiy!SEP1-25-AR-H3&geo-redirect" class="exchange-cta" data-exchange="Revolut" target="_blank" rel="nofollow sponsored noopener">creează cont Revolut</a>.</li>
        <li>Verifică dacă ai transferuri crypto externe disponibile pe planul tău.</li>
        <li>Inițiază trimitere BTC către adresa Ledger (verifică rețeaua).</li>
      </ol>
      <div class="note">Revolut este rapid și simplu, dar are costuri mai mari. Pentru investiții pe termen lung, recomand un exchange dedicat + self‑custody.</div>
      <div class="actions">
        <a href="https://revolut.com/referral/?referral-code=cataliuiy!SEP1-25-AR-H3&geo-redirect" class="exchange-cta" data-exchange="Revolut" target="_blank" rel="nofollow sponsored noopener">Cumpără în Revolut →</a>
      </div>
    </article>
  </section>
</div>
<script>
// GA4 click_exchange_cta
window.addEventListener('DOMContentLoaded',function(){
  function fire(exchange,url){ try{ if(window.gtag){ gtag('event','click_exchange_cta',{exchange_name:exchange,link_url:url}); } }catch(e){} }
  document.querySelectorAll('a.exchange-cta').forEach(function(a){ a.addEventListener('click',function(){ fire(this.dataset.exchange||this.textContent.trim(), this.href); },{capture:true}); });
});
</script>
<?php get_footer(); ?>
