<?php
/**
 * Template Name: Calculatoare Crypto
 * Pagina cu calculatoare prietenoase pentru Bitcoin & Crypto
 */

get_header(); ?>

<main class="site-content">
  <section class="page-hero" style="padding:2.5rem 0 1rem;">
    <div class="container">
      <div class="hero-content">
        <h1 class="page-title">🧮 Calculatoare Crypto</h1>
        <p class="page-subtitle">Conversii BTC ↔ RON/EUR/USD, profit/pierdere cu comisioane, preț țintă pentru profitul dorit și estimare DCA simplă.</p>
      </div>
    </div>
  </section>

  <section class="calc-grid-wrap" style="padding:0 0 2rem;">
    <div class="container">
      <div class="calc-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1.25rem;">

        <!-- Converter BTC ↔ Fiat -->
        <article class="calc-card" style="background:#fff;border-radius:16px;box-shadow:var(--shadow);overflow:hidden;">
          <div style="padding:1.25rem 1.25rem 0.75rem;border-bottom:1px solid var(--border-light);display:flex;align-items:center;gap:.5rem;">
            <div style="font-size:1.4rem;">💱</div>
            <h2 style="font-size:1.25rem;margin:0;">Convertor BTC ↔ RON/EUR/USD</h2>
          </div>
          <div style="padding:1.25rem;display:flex;flex-direction:column;gap:.75rem;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:.5rem;">
              <div>
                <label for="btcAmount" style="font-weight:600;">BTC</label>
                <input id="btcAmount" type="number" step="0.00000001" placeholder="0.01" style="width:100%;padding:.8rem;border:1px solid var(--border-light);border-radius:12px;">
              </div>
              <div>
                <label for="fiatAmount" style="font-weight:600;">Fiat</label>
                <input id="fiatAmount" type="number" step="0.01" placeholder="1000" style="width:100%;padding:.8rem;border:1px solid var(--border-light);border-radius:12px;">
              </div>
            </div>
            <div style="display:flex;gap:.5rem;align-items:center;flex-wrap:wrap;">
              <select id="fiatCurrency" style="padding:.7rem;border:1px solid var(--border-light);border-radius:10px;">
                <option value="ron">RON</option>
                <option value="eur">EUR</option>
                <option value="usd">USD</option>
              </select>
              <button id="swapBtn" class="btn-slim" style="padding:.65rem 1rem;border-radius:10px;border:1px solid var(--border-light);background:#f9fafb;cursor:pointer;">↕️ Inversează</button>
              <button id="refreshPrice" class="btn-slim" style="padding:.65rem 1rem;border-radius:10px;border:1px solid var(--border-light);background:#f9fafb;cursor:pointer;">🔄 Actualizează preț</button>
              <span id="priceBadge" style="margin-left:auto;background:rgba(247,147,26,.1);color:#c25a00;padding:.4rem .6rem;border-radius:999px;font-size:.9rem;">BTC: —</span>
            </div>
            <small style="color:var(--text-secondary)">Sursă: CoinGecko (fără cheie). Poți edita manual valorile dacă API-ul nu răspunde.</small>
          </div>
        </article>

        <!-- Profit/Pierdere -->
        <article class="calc-card" style="background:#fff;border-radius:16px;box-shadow:var(--shadow);overflow:hidden;">
          <div style="padding:1.25rem 1.25rem 0.75rem;border-bottom:1px solid var(--border-light);display:flex;align-items:center;gap:.5rem;">
            <div style="font-size:1.4rem;">📈</div>
            <h2 style="font-size:1.25rem;margin:0;">Profit / Pierdere (cu comisioane)</h2>
          </div>
          <div style="padding:1.25rem;display:flex;flex-direction:column;gap:.75rem;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:.5rem;">
              <div>
                <label for="qtyBtc" style="font-weight:600;">Cantitate BTC</label>
                <input id="qtyBtc" type="number" step="0.00000001" placeholder="0.05" style="width:100%;padding:.8rem;border:1px solid var(--border-light);border-radius:12px;">
              </div>
              <div>
                <label for="buyPrice" style="font-weight:600;">Preț cumpărare</label>
                <input id="buyPrice" type="number" step="0.01" placeholder="30000" style="width:100%;padding:.8rem;border:1px solid var(--border-light);border-radius:12px;">
              </div>
              <div>
                <label for="sellPrice" style="font-weight:600;">Preț vânzare / curent</label>
                <input id="sellPrice" type="number" step="0.01" placeholder="45000" style="width:100%;padding:.8rem;border:1px solid var(--border-light);border-radius:12px;">
              </div>
              <div style="display:grid;grid-template-columns:1fr 1fr;gap:.5rem;">
                <div>
                  <label for="feeBuy" style="font-weight:600;">Comision cumpărare %</label>
                  <input id="feeBuy" type="number" step="0.01" placeholder="0.10" value="0.10" style="width:100%;padding:.8rem;border:1px solid var(--border-light);border-radius:12px;">
                </div>
                <div>
                  <label for="feeSell" style="font-weight:600;">Comision vânzare %</label>
                  <input id="feeSell" type="number" step="0.01" placeholder="0.10" value="0.10" style="width:100%;padding:.8rem;border:1px solid var(--border-light);border-radius:12px;">
                </div>
              </div>
            </div>
            <button id="calcPnL" class="btn" style="background:linear-gradient(135deg,var(--bitcoin-orange),var(--bitcoin-dark));color:#fff;padding:.85rem 1rem;border:none;border-radius:12px;cursor:pointer;font-weight:700;">Calculează</button>
            <div id="pnlResult" style="background:#f9fafb;border:1px solid var(--border-light);border-radius:12px;padding:1rem;display:grid;grid-template-columns:1fr 1fr;gap:.5rem;">
              <div>Total investit: <strong id="investedVal">—</strong></div>
              <div>Încasări (după taxe): <strong id="proceedsVal">—</strong></div>
              <div>P&amp;L: <strong id="pnlVal">—</strong></div>
              <div>Randament: <strong id="pnlPct">—</strong></div>
            </div>
          </div>
        </article>

        <!-- Țintă preț -->
        <article class="calc-card" style="background:#fff;border-radius:16px;box-shadow:var(--shadow);overflow:hidden;">
          <div style="padding:1.25rem 1.25rem 0.75rem;border-bottom:1px solid var(--border-light);display:flex;align-items:center;gap:.5rem;">
            <div style="font-size:1.4rem;">🎯</div>
            <h2 style="font-size:1.25rem;margin:0;">Țintă preț pentru profit dorit</h2>
          </div>
          <div style="padding:1.25rem;display:flex;flex-direction:column;gap:.75rem;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:.5rem;">
              <div>
                <label for="tpQty" style="font-weight:600;">Cantitate BTC</label>
                <input id="tpQty" type="number" step="0.00000001" placeholder="0.05" style="width:100%;padding:.8rem;border:1px solid var(--border-light);border-radius:12px;">
              </div>
              <div>
                <label for="tpBuyPrice" style="font-weight:600;">Preț cumpărare</label>
                <input id="tpBuyPrice" type="number" step="0.01" placeholder="30000" style="width:100%;padding:.8rem;border:1px solid var(--border-light);border-radius:12px;">
              </div>
              <div>
                <label for="tpProfitPct" style="font-weight:600;">Profit dorit %</label>
                <input id="tpProfitPct" type="number" step="0.1" placeholder="25" value="25" style="width:100%;padding:.8rem;border:1px solid var(--border-light);border-radius:12px;">
              </div>
            </div>
            <div id="tpResult" style="background:#f9fafb;border:1px solid var(--border-light);border-radius:12px;padding:1rem;">Preț țintă: <strong id="tpPrice">—</strong></div>
          </div>
        </article>

        <!-- DCA simplu -->
        <article class="calc-card" style="background:#fff;border-radius:16px;box-shadow:var(--shadow);overflow:hidden;">
          <div style="padding:1.25rem 1.25rem 0.75rem;border-bottom:1px solid var(--border-light);display:flex;align-items:center;gap:.5rem;">
            <div style="font-size:1.4rem;">⏳</div>
            <h2 style="font-size:1.25rem;margin:0;">Estimare DCA (preț mediu constant)</h2>
          </div>
          <div style="padding:1.25rem;display:flex;flex-direction:column;gap:.75rem;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:.5rem;">
              <div>
                <label for="dcaMonthly" style="font-weight:600;">Sumă lunară (RON)</label>
                <input id="dcaMonthly" type="number" step="1" placeholder="500" value="500" style="width:100%;padding:.8rem;border:1px solid var(--border-light);border-radius:12px;">
              </div>
              <div>
                <label for="dcaMonths" style="font-weight:600;">Luni</label>
                <input id="dcaMonths" type="number" step="1" min="1" placeholder="12" value="12" style="width:100%;padding:.8rem;border:1px solid var(--border-light);border-radius:12px;">
              </div>
              <div>
                <label for="dcaAvgPrice" style="font-weight:600;">Preț mediu estimat (RON/BTC)</label>
                <input id="dcaAvgPrice" type="number" step="0.01" placeholder="300000" value="300000" style="width:100%;padding:.8rem;border:1px solid var(--border-light);border-radius:12px;">
              </div>
            </div>
            <div id="dcaResult" style="background:#f9fafb;border:1px solid var(--border-light);border-radius:12px;padding:1rem;">
              <div>Total investit: <strong id="dcaInvested">—</strong></div>
              <div>BTC acumulat: <strong id="dcaBtc">—</strong></div>
              <div>Cost mediu/BTC: <strong id="dcaAvg">—</strong></div>
            </div>
          </div>
        </article>

      </div>

      <div class="guide-cta-bar" style="margin:1.5rem 0 0;display:flex;gap:.75rem;flex-wrap:wrap;">
        <a class="btn" href="/exchange-uri" style="background:linear-gradient(135deg,#f7931a,#ff6b00);color:#fff;padding:.9rem 1.2rem;border-radius:12px;text-decoration:none;font-weight:700;">Cumpără Bitcoin în siguranță →</a>
        <a class="btn" href="/ghid-bitcoin-incepatori/" style="background:#111827;color:#fff;padding:.9rem 1.2rem;border-radius:12px;text-decoration:none;font-weight:700;">Ghid pentru începători →</a>
      </div>

    </div>
  </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Helpers
  const fmt = (v, digits=2) => {
    if (v === null || isNaN(v)) return '—';
    return new Intl.NumberFormat('ro-RO', { maximumFractionDigits: digits }).format(Number(v));
  };

  // Converter
  const btc = document.getElementById('btcAmount');
  const fiat = document.getElementById('fiatAmount');
  const curSel = document.getElementById('fiatCurrency');
  const priceBadge = document.getElementById('priceBadge');
  const refreshBtn = document.getElementById('refreshPrice');
  const swapBtn = document.getElementById('swapBtn');
  let prices = { usd: 0, eur: 0, ron: 0 };

  async function fetchPrice() {
    try {
      const r = await fetch('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd,eur,ron',{cache:'no-store'});
      const j = await r.json();
      prices = j.bitcoin || prices;
    } catch(e) { console.warn('Price fetch failed', e); }
    updateBadge();
  }
  function updateBadge(){
    const k = curSel.value;
    const val = prices[k] || 0;
    priceBadge.textContent = `BTC: ${val?fmt(val):'—'} ${k.toUpperCase()}`;
  }
  function syncFromBtc(){
    const k = curSel.value; const p = prices[k] || 0; if(!p) return;
    const b = parseFloat(btc.value||0); fiat.value = (b*p).toFixed(2);
  }
  function syncFromFiat(){
    const k = curSel.value; const p = prices[k] || 0; if(!p) return;
    const f = parseFloat(fiat.value||0); btc.value = (f/p).toFixed(8);
  }
  btc.addEventListener('input', syncFromBtc);
  fiat.addEventListener('input', syncFromFiat);
  curSel.addEventListener('change',()=>{updateBadge(); syncFromBtc();});
  refreshBtn.addEventListener('click', fetchPrice);
  swapBtn.addEventListener('click', ()=>{
    if(document.activeElement===btc){ syncFromBtc(); }
    else { syncFromFiat(); }
  });
  fetchPrice();

  // P&L
  function calcPNL(){
    const q = parseFloat(document.getElementById('qtyBtc').value||0);
    const bp = parseFloat(document.getElementById('buyPrice').value||0);
    const sp = parseFloat(document.getElementById('sellPrice').value||0);
    const fb = parseFloat(document.getElementById('feeBuy').value||0)/100;
    const fs = parseFloat(document.getElementById('feeSell').value||0)/100;
    const invested = q*bp*(1+fb);
    const proceeds = q*sp*(1-fs);
    const pnl = proceeds - invested;
    const pct = invested>0 ? (pnl/invested)*100 : 0;
    document.getElementById('investedVal').textContent = fmt(invested);
    document.getElementById('proceedsVal').textContent = fmt(proceeds);
    document.getElementById('pnlVal').textContent = `${fmt(pnl)} ${pnl>=0?'✅':'❌'}`;
    document.getElementById('pnlPct').textContent = `${fmt(pct,2)}%`;
  }
  document.getElementById('calcPnL').addEventListener('click', calcPNL);

  // Țintă de preț
  function updateTarget(){
    const q = parseFloat(document.getElementById('tpQty').value||0);
    const bp = parseFloat(document.getElementById('tpBuyPrice').value||0);
    const profitPct = parseFloat(document.getElementById('tpProfitPct').value||0)/100;
    if(q<=0 || bp<=0){ document.getElementById('tpPrice').textContent='—'; return; }
    const invested = q*bp;
    const desired = invested*(1+profitPct);
    const tp = desired / q;
    document.getElementById('tpPrice').textContent = fmt(tp,2);
  }
  ['tpQty','tpBuyPrice','tpProfitPct'].forEach(id=>{
    const el = document.getElementById(id); el.addEventListener('input', updateTarget);
  });
  updateTarget();

  // DCA simplu (preț constant introdus de utilizator)
  function calcDCA(){
    const monthly = parseFloat(document.getElementById('dcaMonthly').value||0);
    const months = Math.max(1, parseInt(document.getElementById('dcaMonths').value||1,10));
    const price = parseFloat(document.getElementById('dcaAvgPrice').value||0);
    const invested = monthly*months;
    const btc = price>0 ? invested/price : 0;
    const avg = price>0 ? price : 0;
    document.getElementById('dcaInvested').textContent = fmt(invested);
    document.getElementById('dcaBtc').textContent = Number.isFinite(btc)?btc.toFixed(8):'—';
    document.getElementById('dcaAvg').textContent = fmt(avg,2);
  }
  ['dcaMonthly','dcaMonths','dcaAvgPrice'].forEach(id=>{
    const el = document.getElementById(id); el.addEventListener('input', calcDCA);
  });
  calcDCA();
});
</script>

<?php get_footer(); ?>
