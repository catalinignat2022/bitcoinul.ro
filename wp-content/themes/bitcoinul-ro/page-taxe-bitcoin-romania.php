<?php
/*
Template Name: Taxe Bitcoin în România – ghid explicat (informativ)
*/
if (!defined('ABSPATH')) exit;
get_header();
?>
<style>
.taxe-page{--bg:#0f172a;--accent:#f7931a;--card:#fff;--border:#e5e7eb;--muted:#6b7280}
.taxe-hero{padding:48px 0;background:linear-gradient(180deg,#0f172a 0%,#1f2937 100%);color:#fff}
.taxe-hero .wrap{max-width:1100px;margin:0 auto;padding:0 16px;display:flex;gap:24px;align-items:center}
.taxe-hero h1{margin:0;font-size:38px}
.taxe-hero p{margin:10px 0 0;color:#e5e7eb;font-size:18px}
.container{max-width:1100px;margin:28px auto;padding:0 16px}
.grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}
.card{background:#fff;border:1px solid var(--border);border-radius:14px;padding:18px}
.card h3{margin:0 0 10px}
.note{background:#ecfeff;border:1px solid #a5f3fc;color:#083344;border-radius:10px;padding:12px;margin:10px 0}
.warn{background:#fff7ed;border:1px solid #fed7aa;color:#7c2d12;border-radius:10px;padding:12px;margin:10px 0}
.section{margin:20px 0}
.table{width:100%;border-collapse:separate;border-spacing:0 8px}
.table th,.table td{background:#fff;padding:10px 12px;border:1px solid var(--border)}
.ref{color:#0ea5e9;text-decoration:none}
@media(max-width:900px){.grid{grid-template-columns:1fr}}
</style>
<div class="taxe-page">
  <section class="taxe-hero">
    <div class="wrap">
      <div style="flex:1">
        <h1>Taxe Bitcoin în România – ce trebuie să știi (informativ)</h1>
        <p>Acest ghid explică pe scurt tratamentul fiscal al câștigurilor din tranzacții cu criptomonede în România. Informațiile sunt informative; consultă un specialist fiscal pentru cazuri specifice.</p>
        <div style="margin-top:14px;display:flex;gap:12px;flex-wrap:wrap">
          <a href="/cum-cumpar-bitcoin/" style="background:linear-gradient(135deg,#f7931a,#ff6b00);color:#fff;padding:10px 14px;border-radius:12px;text-decoration:none;font-weight:700">Cum cumpăr Bitcoin →</a>
          <a href="/calculatoare-bitcoin/" style="background:#fff;color:#111827;padding:10px 14px;border-radius:12px;text-decoration:none;font-weight:700;border:1px solid #e5e7eb">Calculează P&L/DCA →</a>
        </div>
      </div>
      <div style="flex:1;min-height:140px;display:flex;align-items:center;justify-content:center">
        <div style="background:#111827;border-radius:16px;padding:18px;color:#e5e7eb;max-width:460px">
          <div style="display:flex;gap:10px;align-items:center"><div style="font-size:20px">📘</div><strong>Pe scurt</strong></div>
          <ul style="margin:10px 0 0 18px">
            <li>Profitul impozabil = Preț vânzare − Cost achiziție − Comisioane.</li>
            <li>Impozit pe venit și contribuții pot fi datorate în anumite condiții.</li>
            <li>Declarația Unică – termen anual (ANAF).</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <div class="section">
      <h2>Baza legală și ghiduri oficiale</h2>
      <p>Informațiile privind impozitarea câștigurilor din monede virtuale se regăsesc în <strong>Codul Fiscal</strong> și în materialele <strong>ANAF</strong>. Recomand consultarea surselor oficiale:</p>
      <ul>
        <li><a class="ref" href="https://static.anaf.ro/static/10/Anaf/AsistentaContribuabili_r/DU_2024_GHID.pdf" target="_blank" rel="noopener">Ghid Declarația Unică (ANAF)</a></li>
        <li><a class="ref" href="https://static.anaf.ro/static/10/Anaf/AsistentaContribuabili_r/Cod_fiscal_norme_2025.htm" target="_blank" rel="noopener">Codul Fiscal + Norme (ANAF)</a></li>
      </ul>
      <div class="note">Acest material este informativ și nu reprezintă consultanță fiscală. Reglementările pot suferi modificări. Verifică întotdeauna ultimele versiuni ale actelor normative.</div>
    </div>

    <div class="section">
      <h2>Cum se calculează câștigul impozabil</h2>
      <p>În linii mari, profitul se calculează ca diferență între prețul de vânzare și costul de achiziție (inclusiv comisioane). O metodă comună este <strong>FIFO</strong>.</p>
      <table class="table">
        <tr><th>Element</th><th>Explicație</th></tr>
        <tr><td>Preț vânzare</td><td>Suma în RON obținută la vânzarea BTC sau la conversia în fiat.</td></tr>
        <tr><td>Cost achiziție</td><td>Costul istoric al BTC cumpărat (în RON), incluzând comisioane.</td></tr>
        <tr><td>Profit/Pierdere</td><td>Preț vânzare − Cost achiziție − Comisioane suplimentare.</td></tr>
      </table>
      <div class="note">Ține evidența tranzacțiilor exportând istoricul din exchange-uri (Binance, Bybit, Revolut). Păstrează documentele justificative.</div>
    </div>

    <div class="section">
      <h2>Impozit pe venit și contribuții (orientativ)</h2>
      <p>Regimul fiscal poate include impozit pe venit și, în anumite condiții, contribuții. Valorile concrete și pragurile pot fi actualizate periodic prin lege.</p>
      <ul>
        <li><strong>Impozit pe venit</strong>: procent aplicat profitului impozabil.</li>
        <li><strong>Contribuții</strong>: pot deveni datorate dacă venitul net anual din activități independente depășește anumite praguri (vezi Codul Fiscal în vigoare).</li>
      </ul>
      <div class="warn">Verifică ghidurile ANAF și Codul Fiscal pentru procentele și pragurile aplicabile în anul curent. Dacă ai venituri din surse multiple, consultă un contabil.</div>
    </div>

    <div class="section">
      <h2>Declarația Unică</h2>
      <p>Câștigurile din tranzacții crypto se declară, de regulă, prin <strong>Declarația Unică</strong>. Termenele și modul de completare sunt prezentate în ghidul ANAF. Păstrează evidența tranzacțiilor și calculele justificative.</p>
      <ul>
        <li>Completezi veniturile nete obținute din transferul de monedă virtuală.</li>
        <li>Calculezi impozitul datorat conform regulilor în vigoare.</li>
        <li>Plătești impozitul până la termenul legal.</li>
      </ul>
    </div>

    <div class="section">
      <h2>Resurse utile</h2>
      <ul>
        <li><a class="ref" href="https://www.binance.com/en/my/wallet/history" target="_blank" rel="noopener">Export tranzacții – Binance</a></li>
        <li><a class="ref" href="https://www.bybit.com/user/assets/history" target="_blank" rel="noopener">Export tranzacții – Bybit</a></li>
        <li><a class="ref" href="https://www.revolut.com/help" target="_blank" rel="noopener">Export istorice – Revolut</a></li>
      </ul>
    </div>

    <div class="section" aria-label="FAQ Taxe Bitcoin România">
      <div class="faq-badge"><span class="emoji">❓</span><span>FAQ</span></div>
      <h2 style="margin:.5rem 0 0">Întrebări frecvente (informativ)</h2>
      <?php echo do_shortcode('[faq_list title="Taxe Bitcoin în România – întrebări frecvente (informativ)"]
      [faq_item q="Trebuie să declar câștigurile din crypto?" a="Da, în general câștigurile se declară prin Declarația Unică. Consultă ghidurile ANAF și un specialist pentru situația ta."]
      [faq_item q="Cum calculez profitul?" a="De regulă: preț vânzare − cost achiziție − comisioane. O metodă uzuală de alocare este FIFO."]
      [faq_item q="Există contribuții pe lângă impozit?" a="În anumite condiții, pot fi datorate contribuții. Verifică pragurile și regulile din Codul Fiscal în vigoare."]
      [faq_item q="Acest ghid este consultanță fiscală?" a="Nu. Materialul are caracter informativ. Pentru decizii fiscale, cere întotdeauna opinia unui specialist autorizat."]
      [/faq_list]'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
