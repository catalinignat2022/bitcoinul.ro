<?php
/**
 * Template Name: Exchange-uri Bitcoin
 * Pagina cu lista completă de exchange-uri Bitcoin din România
 * Optimizată pentru afilierea și conversiile
 */

get_header(); ?>
<!-- using template: page-exchange-uri.php -->

<main class="site-content exchange-page">
    
    <!-- Hero Section Exchange-uri -->
    <style>
        /* Lightweight page-scoped styles for consistent logos and grid */
        .site-content.exchange-page { padding-top: 3.5rem; }
        .exchanges { padding-top: 4rem; }
        .exchange-filters { display: flex; gap: .5rem; flex-wrap: wrap; margin: 1rem 0 1.5rem; }
        .exchange-filters .filter-btn { background: var(--white); border: 1px solid #e5e7eb; border-radius: 999px; padding: .5rem 1rem; font-weight: 600; cursor: pointer; }
        .exchange-filters .filter-btn.active { background: #111827; color: #fff; border-color: #111827; }
        .exchanges-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1rem; }
        .exchange-card { overflow: visible; }
    /* Keep logos square, icon-only sizing to prevent visual overlap with titles */
    .exchange-card .logo { width: 56px; height: 56px; display: flex; align-items: center; justify-content: center; flex: 0 0 56px; overflow: hidden; }
    .exchange-card .logo img { width: 100%; height: 100%; max-width: 100%; max-height: 100%; object-fit: contain; display: block; }
        .badge-container { z-index: 2; }
        /* Ensure badges aren't clipped */
        .exchanges-grid { overflow: visible; }
        /* Normalize header layout inside cards (override any global styles) */
        .exchanges .exchange-header { padding: 0 !important; text-align: left !important; background: none !important; }
    </style>

    <section class="exchanges">
        <div class="container">
            <header style="margin: 0 0 1rem;">
                <h1 style="margin: 0; font-size: 2rem;">₿ Top exchange-uri Bitcoin 2025</h1>
                <p style="margin: .25rem 0 0; color: var(--text-secondary);">Alege un exchange și apasă „Cumpără Bitcoin”.</p>
            </header>
            <div class="exchange-filters">
                <button class="filter-btn active" onclick="filterExchanges('all')">Toate</button>
                <button class="filter-btn" onclick="filterExchanges('recommended')">Recomandate</button>
                <button class="filter-btn" onclick="filterExchanges('low-fees')">Comisioane mici</button>
                <button class="filter-btn" onclick="filterExchanges('beginners')">Pentru începători</button>
            </div>
            <div id="exchanges-container" class="exchanges-grid">

                <!-- Binance - Recomandat #1 (moved first) -->
                <div class="exchange-card low-fees recommended" data-name="binance" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position:absolute;top:-10px;left:20px;background:#f59e0b;color:#fff;padding:.5rem 1.5rem;border-radius:20px;font-size:.8rem;font-weight:700;">⭐ Recomandat</div>
                    <div class="exchange-header" style="display:flex;align-items:center;gap:1rem;margin:1rem 0 1.5rem;">
                        <div class="logo"><img src="https://cdn.simpleicons.org/binance/f59e0b" alt="Binance logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size:1.5rem;font-weight:700;color:var(--text-primary);">Binance</h3>
                            <div class="rating" style="color:#ffd700;font-size:1.1rem;">★★★★★ <span style="color:var(--text-secondary);font-size:.9rem;">(4.8/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom:1.5rem;color:var(--text-secondary);">Comisioane 0.1%, lichiditate maximă.</div>
                    <div class="action-container" style="text-align:center;">
                        <a href="https://accounts.binance.com/en/register?ref=21315882" target="_blank" rel="sponsored nofollow noopener noreferrer" style="display:inline-block;background:linear-gradient(135deg,#f59e0b,#ef4444);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Binance','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- Bybit - Derivate (moved second) -->
                <div class="exchange-card low-fees" data-name="bybit" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #f59e0b; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">📈 DERIVATE</div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin: 1rem 0 1.5rem;">
                        <div class="logo"><img src="<?= get_stylesheet_directory_uri(); ?>/assets/img/bybit-logo.svg" alt="Bybit logo" loading="lazy" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary);">Bybit</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★★☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(4.3/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem; color: var(--text-secondary);">Specialist în derivate, execuție rapidă.</div>
                    <div class="action-container" style="text-align: center;">
                        <a href="https://www.bybit.com/en/invite/?ref=ZW6OLQ" target="_blank" rel="sponsored nofollow noopener noreferrer" style="display:inline-block;background:linear-gradient(135deg,#f59e0b,#ef4444);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Bybit','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <div class="exchange-card low-fees" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); transition: all 0.3s ease; position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #24d0ff; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">
                        🎯 ALTCOINS
                    </div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; margin-top: 1rem;">
                        <div class="logo">
                            <img src="https://cryptologos.cc/logos/kucoin-token-kcs-logo.png" alt="KuCoin logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';">
                        </div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.3rem;">KuCoin</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★★☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(4.1/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem;">
                        <div style="color: var(--text-secondary); margin-bottom: 1rem; font-size: 0.95rem; line-height: 1.6;">
                            Exchange cu cea mai mare selecție de altcoins și gem-uri noi.
                        </div>
                        <div class="feature-list" style="display: grid; gap: 0.5rem;">
                            <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--success-green); font-size: 0.9rem;">✓ 700+ criptomonede</div>
                            <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--success-green); font-size: 0.9rem;">✓ Comisioane 0.1%</div>
                            <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--success-green); font-size: 0.9rem;">✓ Spot și futures trading</div>
                        </div>
                    </div>
                    <div class="action-container" style="text-align: center;">
                        <a href="https://kucoin.com/ucenter/signup?rcode=BITCOIN_RO" target="_blank" rel="sponsored nofollow" 
                           style="display: inline-block; background: linear-gradient(135deg, #24d0ff, #0ea5e9); color: white; padding: 1rem 2rem; border-radius: 30px; text-decoration: none; font-weight: 700; font-size: 1rem; text-transform: uppercase; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(36, 208, 255, 0.3);"
                           onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(36, 208, 255, 0.4)'"
                           onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(36, 208, 255, 0.3)'"
                           onclick="trackAffiliateClick('KuCoin', 'cta_click')">
                            Cumpără Bitcoin →
                        </a>
                        <div style="margin-top: 0.8rem; font-size: 0.8rem; color: var(--text-secondary);">
                            💎 Descoperă următorul 1000x coin
                        </div>
                    </div>
                </div>

                <!-- 13. OKX - Ecosistem complet -->
                <div class="exchange-card low-fees" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #111827; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">🌐 ECOSISTEM</div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin: 1rem 0 1.5rem;">
                        <div class="logo"><img src="https://cryptologos.cc/logos/okb-okb-logo.png" alt="OKX logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary);">OKX</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★★☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(4.2/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem; color: var(--text-secondary);">
                        Exchange complet cu Web3 wallet și DeFi integrate.
                    </div>
                    <div class="action-container" style="text-align: center;">
                        <a href="https://okx.com/register?ref=BITCOIN_RO" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#111827,#1f2937);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('OKX','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>


                <!-- 15. Bitvavo - UE comisioane mici -->
                <div class="exchange-card low-fees recommended" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #2563eb; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">🇪🇺 UE</div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin: 1rem 0 1.5rem;">
                        <div class="logo"><img src="https://seeklogo.com/images/B/bitvavo-logo-0F79B6B0A9-seeklogo.com.png" alt="Bitvavo logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary);">Bitvavo</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★★☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(4.2/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem; color: var(--text-secondary);">Exchange olandez cu comisioane foarte mici.</div>
                    <div class="action-container" style="text-align: center;">
                        <a href="https://bitvavo.com/?ref=BITCOIN_RO" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Bitvavo','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 16. Revolut - Cumpărare rapidă (must be 3rd overall) -->
                <div class="exchange-card beginners" data-name="revolut" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #0ea5e9; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">💳 RAPID</div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin: 1rem 0 1.5rem;">
                        <div class="logo"><img src="https://cdn.simpleicons.org/revolut/0ea5e9" alt="Revolut logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary);">Revolut</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★☆☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(3.8/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem; color: var(--text-secondary);">Cumpărări rapide în aplicație, simplu pentru începători.</div>
                    <div class="action-container" style="text-align: center;">
                        <a href="https://revolut.com/referral/?referral-code=cataliuiy!SEP1-25-AR-H3&amp;geo-redirect" target="_blank" rel="sponsored nofollow noopener noreferrer" style="display:inline-block;background:linear-gradient(135deg,#0ea5e9,#3b82f6);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Revolut','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 17. Kraken Pro - Pro tools -->
                <div class="exchange-card low-fees" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #6d28d9; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">🛠️ PRO</div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin: 1rem 0 1.5rem;">
                        <div class="logo"><img src="https://cryptologos.cc/logos/kraken-kraken-logo.png" alt="Kraken Pro logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary);">Kraken Pro</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★★☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(4.4/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem; color: var(--text-secondary);">Comisioane mai mici, instrumente avansate.</div>
                    <div class="action-container" style="text-align: center;">
                        <a href="https://kraken.com/pro?ref=BITCOIN_RO" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#6d28d9,#8b5cf6);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Kraken Pro','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 18. Bitget - Copy trading -->
                <div class="exchange-card recommended beginners" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #10b981; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">👥 COPY</div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin: 1rem 0 1.5rem;">
                        <div class="logo"><img src="https://seeklogo.com/images/B/bitget-logo-7B4C0F0A01-seeklogo.com.png" alt="Bitget logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary);">Bitget</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★☆☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(3.9/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem; color: var(--text-secondary);">Copy trading pentru începători.</div>
                    <div class="action-container" style="text-align: center;">
                        <a href="https://bitget.com/referral/BITCOIN_RO" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#10b981,#22c55e);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Bitget','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 19. MEXC - Altcoins multe -->
                <div class="exchange-card low-fees" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #14b8a6; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">🧩 ALTCOINS</div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin: 1rem 0 1.5rem;">
                        <div class="logo"><img src="https://seeklogo.com/images/M/mexc-global-logo-79B6D0CFA3-seeklogo.com.png" alt="MEXC logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary);">MEXC</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★☆☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(3.9/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem; color: var(--text-secondary);">Selecție uriașă de monede.</div>
                    <div class="action-container" style="text-align: center;">
                        <a href="https://mexc.com/signup?ref=BITCOIN_RO" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#14b8a6,#0ea5e9);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('MEXC','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 20. Kraken Futures -->
                <div class="exchange-card low-fees" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #7c3aed; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">📊 FUTURES</div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin: 1rem 0 1.5rem;">
                        <div class="logo"><img src="https://cryptologos.cc/logos/kraken-kraken-logo.png" alt="Kraken Futures logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary);">Kraken Futures</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★★☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(4.3/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem; color: var(--text-secondary);">Derivate pe Kraken cu reputație solidă.</div>
                    <div class="action-container" style="text-align: center;">
                        <a href="https://kraken.com/futures?ref=BITCOIN_RO" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#7c3aed,#6d28d9);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Kraken Futures','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 21. Uphold - Multi asset -->
                <div class="exchange-card beginners" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #16a34a; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">🟢 MULTI-ASSET</div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin: 1rem 0 1.5rem;">
                        <div class="logo"><img src="https://cdn.simpleicons.org/uphold/16a34a" alt="Uphold logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary);">Uphold</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★☆☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(3.9/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem; color: var(--text-secondary);">Crypto + acțiuni + metale prețioase.</div>
                    <div class="action-container" style="text-align: center;">
                        <a href="https://uphold.com/register?ref=BITCOIN_RO" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#16a34a,#22c55e);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Uphold','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 22. Nexo - Dobânzi -->
                <div class="exchange-card beginners" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #2563eb; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">💸 DOBÂNZI</div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin: 1rem 0 1.5rem;">
                        <div class="logo"><img src="https://cryptologos.cc/logos/nexo-nexo-logo.png" alt="Nexo logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary);">Nexo</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★★☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(4.1/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem; color: var(--text-secondary);">Dobânzi pe crypto și card cu cashback.</div>
                    <div class="action-container" style="text-align: center;">
                        <a href="https://nexo.io/register?ref=BITCOIN_RO" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Nexo','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 23. Swissborg - Investiții simple -->
                <div class="exchange-card beginners recommended" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #0ea5e9; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">🇨🇭 SIMPLU</div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin: 1rem 0 1.5rem;">
                        <div class="logo"><img src="https://seeklogo.com/images/S/swissborg-logo-7B0E41A68D-seeklogo.com.png" alt="Swissborg logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary);">Swissborg</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★☆☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(3.8/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem; color: var(--text-secondary);">Investiții ușoare cu portofolii inteligente.</div>
                    <div class="action-container" style="text-align: center;">
                        <a href="https://swissborg.com/app?ref=BITCOIN_RO" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#0ea5e9,#22d3ee);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Swissborg','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 24. Ledger Live - Self-custody buy -->
                <div class="exchange-card beginners" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #111827; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">🔐 SELF-CUSTODY</div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin: 1rem 0 1.5rem;">
                        <div class="logo"><img src="https://seeklogo.com/images/L/ledger-logo-1D4C6C62ED-seeklogo.com.png" alt="Ledger logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary);">Ledger Live</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★☆☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(3.7/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem; color: var(--text-secondary);">Cumpără direct în aplicația Ledger, păstrezi cheile.</div>
                    <div class="action-container" style="text-align: center;">
                        <a href="https://shop.ledger.com/?ref=BITCOIN_RO" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#111827,#374151);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Ledger','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 11. Gate.io - Trading avansat -->
                <div class="exchange-card" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); transition: all 0.3s ease; position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #6366f1; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">
                        🔄 DeFi
                    </div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; margin-top: 1rem;">
                        <div class="logo">
                            <img src="https://cryptologos.cc/logos/gate-token-gt-logo.png" alt="Gate.io logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';">
                        </div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.3rem;">Gate.io</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★★☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(3.9/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem;">
                        <div style="color: var(--text-secondary); margin-bottom: 1rem; font-size: 0.95rem; line-height: 1.6;">
                            Exchange cu focus pe DeFi și trading derivate avansat.
                        </div>
                        <div class="feature-list" style="display: grid; gap: 0.5rem;">
                            <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--success-green); font-size: 0.9rem;">✓ DeFi și NFT marketplace</div>
                            <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--success-green); font-size: 0.9rem;">✓ 1400+ criptomonede</div>
                            <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--success-green); font-size: 0.9rem;">✓ Copy trading disponibil</div>
                        </div>
                    </div>
                    
                

                    <div class="action-container" style="text-align: center;">
                        <a href="https://gate.io/signup/BITCOIN_RO" target="_blank" rel="sponsored nofollow" 
                           style="display: inline-block; background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white; padding: 1rem 2rem; border-radius: 30px; text-decoration: none; font-weight: 700; font-size: 1rem; text-transform: uppercase; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);"
                           onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(99, 102, 241, 0.4)'"
                           onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(99, 102, 241, 0.3)'"
                           onclick="trackAffiliateClick('Gate.io', 'cta_click')">
                            Cumpără Bitcoin →
                        </a>
                        <div style="margin-top: 0.8rem; font-size: 0.8rem; color: var(--text-secondary);">
                            🌐 Ecosistem crypto complet
                        </div>
                    </div>
                </div>

                <!-- 12. Crypto.com - Card și rewards -->
                <div class="exchange-card recommended beginners" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); transition: all 0.3s ease; position: relative;">
                    <div class="badge-container" style="position: absolute; top: -10px; left: 20px; background: #003cdc; color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">
                        💳 CARD CRYPTO
                    </div>
                    <div class="exchange-header" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; margin-top: 1rem;">
                        <div class="logo">
                            <img src="https://cryptologos.cc/logos/cronos-cro-logo.png" alt="Crypto.com logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';">
                        </div>
                        <div>
                            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.3rem;">Crypto.com</h3>
                            <div class="rating" style="color: #ffd700; font-size: 1.1rem;">★★★★☆ <span style="color: var(--text-secondary); font-size: 0.9rem;">(4.2/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom: 1.5rem;">
                        <div style="color: var(--text-secondary); margin-bottom: 1rem; font-size: 0.95rem; line-height: 1.6;">
                            Platforma cu cel mai bun card crypto și program de recompense.
                        </div>
                        <div class="feature-list" style="display: grid; gap: 0.5rem;">
                            <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--success-green); font-size: 0.9rem;">✓ Card Visa cu cashback 8%</div>
                            <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--success-green); font-size: 0.9rem;">✓ Staking rewards până la 14.5%</div>
                            <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--success-green); font-size: 0.9rem;">✓ App mobilă premiată</div>
                        </div>
                    </div>
                    <div class="action-container" style="text-align: center;">
                        <a href="https://crypto.com/app/BITCOIN_RO" target="_blank" rel="sponsored nofollow" 
                           style="display: inline-block; background: linear-gradient(135deg, #003cdc, #1e40af); color: white; padding: 1rem 2rem; border-radius: 30px; text-decoration: none; font-weight: 700; font-size: 1rem; text-transform: uppercase; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0, 60, 220, 0.3);"
                           onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(0, 60, 220, 0.4)'"
                           onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0, 60, 220, 0.3)'"
                           onclick="trackAffiliateClick('Crypto.com', 'cta_click')">
                            Cumpără Bitcoin →
                        </a>
                        <div style="margin-top: 0.8rem; font-size: 0.8rem; color: var(--text-secondary);">
                            🎁 Bonus $25 + card gratuit
                        </div>
                    </div>
                </div>


                <!-- 02. Coinbase - Începători -->
                <div class="exchange-card beginners recommended" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position:absolute;top:-10px;left:20px;background:#2563eb;color:#fff;padding:.5rem 1.5rem;border-radius:20px;font-size:.8rem;font-weight:700;">🧭 Începători</div>
                    <div class="exchange-header" style="display:flex;align-items:center;gap:1rem;margin:1rem 0 1.5rem;">
                        <div class="logo"><img src="https://cryptologos.cc/logos/coinbase-coin-logo.png" alt="Coinbase logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size:1.5rem;font-weight:700;color:var(--text-primary);">Coinbase</h3>
                            <div class="rating" style="color:#ffd700;font-size:1.1rem;">★★★★☆ <span style="color:var(--text-secondary);font-size:.9rem;">(4.5/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom:1.5rem;color:var(--text-secondary);">Cea mai simplă experiență pentru începători.</div>
                    <div class="action-container" style="text-align:center;">
                        <a href="https://coinbase.com/join/romania" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Coinbase','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 03. Kraken - Securitate -->
                <div class="exchange-card low-fees" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position:absolute;top:-10px;left:20px;background:#6b7280;color:#fff;padding:.5rem 1.5rem;border-radius:20px;font-size:.8rem;font-weight:700;">🛡️ Securitate</div>
                    <div class="exchange-header" style="display:flex;align-items:center;gap:1rem;margin:1rem 0 1.5rem;">
                        <div class="logo"><img src="https://cryptologos.cc/logos/kraken-kraken-logo.png" alt="Kraken logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size:1.5rem;font-weight:700;color:var(--text-primary);">Kraken</h3>
                            <div class="rating" style="color:#ffd700;font-size:1.1rem;">★★★★☆ <span style="color:var(--text-secondary);font-size:.9rem;">(4.4/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom:1.5rem;color:var(--text-secondary);">Reputație excelentă și comisioane competitive.</div>
                    <div class="action-container" style="text-align:center;">
                        <a href="https://kraken.com/sign-up?ref=romania" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#6b7280,#111827);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Kraken','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 04. eToro - Social Trading -->
                <div class="exchange-card beginners" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position:absolute;top:-10px;left:20px;background:#10b981;color:#fff;padding:.5rem 1.5rem;border-radius:20px;font-size:.8rem;font-weight:700;">👥 Social</div>
                    <div class="exchange-header" style="display:flex;align-items:center;gap:1rem;margin:1rem 0 1.5rem;">
                        <div class="logo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/EToro_logo.svg/200px-EToro_logo.svg.png" alt="eToro logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size:1.5rem;font-weight:700;color:var(--text-primary);">eToro</h3>
                            <div class="rating" style="color:#ffd700;font-size:1.1rem;">★★★★☆ <span style="color:var(--text-secondary);font-size:.9rem;">(4.3/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom:1.5rem;color:var(--text-secondary);">Copy trading și portofolii smart.</div>
                    <div class="action-container" style="text-align:center;">
                        <a href="https://etoro.tw/romania-bitcoin" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#10b981,#059669);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('eToro','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 05. Bitpanda - European -->
                <div class="exchange-card beginners recommended" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position:absolute;top:-10px;left:20px;background:#dc2626;color:#fff;padding:.5rem 1.5rem;border-radius:20px;font-size:.8rem;font-weight:700;">🇪🇺 European</div>
                    <div class="exchange-header" style="display:flex;align-items:center;gap:1rem;margin:1rem 0 1.5rem;">
                        <div class="logo"><img src="https://cryptologos.cc/logos/bitpanda-ecosystem-token-best-logo.png" alt="Bitpanda logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size:1.5rem;font-weight:700;color:var(--text-primary);">Bitpanda</h3>
                            <div class="rating" style="color:#ffd700;font-size:1.1rem;">★★★★☆ <span style="color:var(--text-secondary);font-size:.9rem;">(4.2/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom:1.5rem;color:var(--text-secondary);">Reglementat în UE, app foarte bună.</div>
                    <div class="action-container" style="text-align:center;">
                        <a href="https://bitpanda.com/?ref=romania" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#dc2626,#ef4444);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Bitpanda','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 06. Bitstamp - Din 2011 -->
                <div class="exchange-card low-fees" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position:absolute;top:-10px;left:20px;background:#16a34a;color:#fff;padding:.5rem 1.5rem;border-radius:20px;font-size:.8rem;font-weight:700;">🏛️ Din 2011</div>
                    <div class="exchange-header" style="display:flex;align-items:center;gap:1rem;margin:1rem 0 1.5rem;">
                        <div class="logo"><img src="https://cryptologos.cc/logos/bitstamp-logo.png" alt="Bitstamp logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size:1.5rem;font-weight:700;color:var(--text-primary);">Bitstamp</h3>
                            <div class="rating" style="color:#ffd700;font-size:1.1rem;">★★★★☆ <span style="color:var(--text-secondary);font-size:.9rem;">(4.1/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom:1.5rem;color:var(--text-secondary);">Reputație excelentă, SEPA rapid.</div>
                    <div class="action-container" style="text-align:center;">
                        <a href="https://bitstamp.net/account/register/?ref=romania" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#16a34a,#22c55e);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Bitstamp','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 07. Gemini - Trustworthy -->
                <div class="exchange-card beginners" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position:absolute;top:-10px;left:20px;background:#0ea5e9;color:#fff;padding:.5rem 1.5rem;border-radius:20px;font-size:.8rem;font-weight:700;">🔒 Siguranță</div>
                    <div class="exchange-header" style="display:flex;align-items:center;gap:1rem;margin:1rem 0 1.5rem;">
                        <div class="logo"><img src="https://cryptologos.cc/logos/gemini-dollar-gusd-logo.png" alt="Gemini logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size:1.5rem;font-weight:700;color:var(--text-primary);">Gemini</h3>
                            <div class="rating" style="color:#ffd700;font-size:1.1rem;">★★★★☆ <span style="color:var(--text-secondary);font-size:.9rem;">(4.0/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom:1.5rem;color:var(--text-secondary);">Reglementat în New York, custodie sigură.</div>
                    <div class="action-container" style="text-align:center;">
                        <a href="https://gemini.com/register?ref=romania" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#0ea5e9,#0284c7);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Gemini','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 08. Huobi - Global -->
                <div class="exchange-card low-fees" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position:absolute;top:-10px;left:20px;background:#111827;color:#fff;padding:.5rem 1.5rem;border-radius:20px;font-size:.8rem;font-weight:700;">🌍 Global</div>
                    <div class="exchange-header" style="display:flex;align-items:center;gap:1rem;margin:1rem 0 1.5rem;">
                        <div class="logo"><img src="https://cryptologos.cc/logos/huobi-token-ht-logo.png" alt="Huobi logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size:1.5rem;font-weight:700;color:var(--text-primary);">Huobi</h3>
                            <div class="rating" style="color:#ffd700;font-size:1.1rem;">★★★★☆ <span style="color:var(--text-secondary);font-size:.9rem;">(4.0/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom:1.5rem;color:var(--text-secondary);">Lichiditate mare, produse variate.</div>
                    <div class="action-container" style="text-align:center;">
                        <a href="https://huobi.com/register?ref=romania" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#111827,#374151);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Huobi','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 09. Bitfinex - Profesional -->
                <div class="exchange-card low-fees" style="background: var(--white); border-radius: 20px; padding: 2rem; box-shadow: var(--shadow); position: relative;">
                    <div class="badge-container" style="position:absolute;top:-10px;left:20px;background:#22c55e;color:#fff;padding:.5rem 1.5rem;border-radius:20px;font-size:.8rem;font-weight:700;">💼 Profesional</div>
                    <div class="exchange-header" style="display:flex;align-items:center;gap:1rem;margin:1rem 0 1.5rem;">
                        <div class="logo"><img src="https://cryptologos.cc/logos/bitfinex-leo-leo-logo.png" alt="Bitfinex logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';"></div>
                        <div>
                            <h3 style="font-size:1.5rem;font-weight:700;color:var(--text-primary);">Bitfinex</h3>
                            <div class="rating" style="color:#ffd700;font-size:1.1rem;">★★★★☆ <span style="color:var(--text-secondary);font-size:.9rem;">(4.0/5)</span></div>
                        </div>
                    </div>
                    <div class="features" style="margin-bottom:1.5rem;color:var(--text-secondary);">Trading avansat, lichiditate mare.</div>
                    <div class="action-container" style="text-align:center;">
                        <a href="https://bitfinex.com/register?ref=romania" target="_blank" rel="sponsored nofollow" style="display:inline-block;background:linear-gradient(135deg,#22c55e,#16a34a);color:#fff;padding:1rem 2rem;border-radius:30px;font-weight:700" onclick="trackAffiliateClick('Bitfinex','cta_click')">Cumpără Bitcoin →</a>
                    </div>
                </div>

                <!-- 10. KuCoin (altcoins) already listed above; skipping duplicate to keep total at 24 -->

            </div> <!-- /#exchanges-container -->
        </div>
    </section>

    <script>
    // Fallback: define tracker if theme JS hasn't loaded yet
    window.trackAffiliateClick = window.trackAffiliateClick || function(exchangeName, action) {
        try {
            var href = '';
            try {
                if (this && this.tagName === 'A') { href = this.getAttribute('href') || this.href || ''; }
            } catch (e) {}
            if (!href && document.activeElement && document.activeElement.tagName === 'A') {
                href = document.activeElement.getAttribute('href') || document.activeElement.href || '';
            }
            if (typeof gtag === 'function') {
                gtag('event', 'click_exchange_cta', {
                    event_category: 'engagement',
                    event_label: exchangeName,
                    exchange_name: exchangeName || 'Unknown',
                    link_url: href || ''
                });
            } else if (window.dataLayer && Array.isArray(window.dataLayer)) {
                window.dataLayer.push({
                    event: 'click_exchange_cta',
                    exchange_name: exchangeName || 'Unknown',
                    link_url: href || ''
                });
            }
        } catch (e) { /* no-op */ }
        return true;
    };
    </script>

    <script>
    // Filtrare client-side pentru cardurile de exchange
    function filterExchanges(filter) {
        try {
            const container = document.getElementById('exchanges-container');
            if (!container) return;
            const buttons = document.querySelectorAll('.exchange-filters .filter-btn');

            // Active button state
            buttons.forEach(btn => btn.classList.remove('active'));
            const activeBtn = Array.from(buttons).find(b => (b.getAttribute('onclick') || '').includes(`filterExchanges('${filter}')`));
            if (activeBtn) activeBtn.classList.add('active');

            // Collect cards and keep original order snapshot on first run
            if (!container._originalOrder) {
                container._originalOrder = Array.from(container.children);
            }
            const allCards = Array.from(container._originalOrder);

            // Priority names (must be included and top for ANY filter)
            const priority = ['binance', 'bybit', 'revolut'];

            // Helper to check visibility for filter
            const passes = (card) => {
                const name = (card.dataset.name || '').toLowerCase();
                if (filter === 'all') return true;
                // Priority trio always visible regardless of filter
                if (priority.includes(name)) return true;
                return card.classList.contains(filter);
            };

            // Build new ordered list
            const ordered = [];
            // Add priority cards that pass filter
            priority.forEach(name => {
                const card = allCards.find(c => (c.dataset.name || '').toLowerCase() === name);
                if (card && passes(card)) ordered.push(card);
            });
            // Add the rest, preserving original order
            allCards.forEach(card => {
                const name = (card.dataset.name || '').toLowerCase();
                if (priority.includes(name)) return; // already handled
                if (passes(card)) ordered.push(card);
            });

            // Clear and re-append
            container.innerHTML = '';
            ordered.forEach(card => container.appendChild(card));
        } catch (e) {
            console && console.warn && console.warn('Filter error', e);
        }
    }

    // Setează filtrul implicit la încărcare
    document.addEventListener('DOMContentLoaded', function() {
        filterExchanges('all');

        // Set referrerPolicy and fallback for logos that may be blocked or missing
        try {
            const placeholder = '<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';
            // Icon-only sources (SimpleIcons) to avoid wordmark logos
            const iconMap = {
                binance: 'https://cdn.simpleicons.org/binance/f59e0b',
                bybit: '<?= get_stylesheet_directory_uri(); ?>/assets/img/bybit-logo.svg',
                revolut: 'https://cdn.simpleicons.org/revolut/0ea5e9',
                kucoin: 'https://cdn.simpleicons.org/kucoin/24d0ff',
                okx: 'https://cdn.simpleicons.org/okx/111827',
                bitvavo: 'https://cdn.simpleicons.org/bitvavo/2563eb',
                kraken: 'https://cdn.simpleicons.org/kraken/6d28d9',
                mexc: 'https://cdn.simpleicons.org/mexc/14b8a6',
                bitget: 'https://cdn.simpleicons.org/bitget/10b981',
                bitpanda: 'https://cdn.simpleicons.org/bitpanda/dc2626',
                bitstamp: 'https://cdn.simpleicons.org/bitstamp/16a34a',
                gemini: 'https://cdn.simpleicons.org/gemini/0ea5e9',
                huobi: 'https://cdn.simpleicons.org/huobi/111827',
                bitfinex: 'https://cdn.simpleicons.org/bitfinex/22c55e',
                gateio: 'https://cdn.simpleicons.org/gateio/6366f1',
                cryptocom: 'https://cdn.simpleicons.org/cryptocom/003cdc',
                coinbase: 'https://cdn.simpleicons.org/coinbase/2563eb',
                etoro: 'https://cdn.simpleicons.org/etoro/10b981',
                swissborg: 'https://cdn.simpleicons.org/swissborg/0ea5e9',
                ledger: 'https://cdn.simpleicons.org/ledger/111827',
                uphold: 'https://cdn.simpleicons.org/uphold/16a34a',
                nexo: 'https://cdn.simpleicons.org/nexo/2563eb'
            };
            const toRootDomain = (hostname) => {
                try {
                    const parts = hostname.split('.');
                    if (parts.length <= 2) return hostname;
                    // handle co.uk and similar tlds naively by taking last 2 by default
                    const tld2 = parts.slice(-2).join('.');
                    // if tld is like co.uk, take last 3
                    if (/(^co\.|^com\.|^org\.|^net\.)/.test(parts.slice(-2)[0] + '.')) {
                        return parts.slice(-3).join('.');
                    }
                    return tld2;
                } catch { return hostname; }
            };
            document.querySelectorAll('.exchange-card .logo img').forEach(img => {
                if (!img.getAttribute('referrerpolicy')) img.setAttribute('referrerpolicy', 'no-referrer');
                if (!img.getAttribute('crossorigin')) img.setAttribute('crossorigin', 'anonymous');
                // Try to proactively swap to icon-only for known brands
                try {
                    const card = img.closest('.exchange-card');
                    const title = (card && card.querySelector('h3') ? card.querySelector('h3').textContent : '').trim().toLowerCase();
                    let key = (card && card.dataset.name ? card.dataset.name : title).toLowerCase().replace(/\s+/g,'').replace(/\./g,'');
                    // Normalize some variants
                    if (key.includes('kraken')) key = 'kraken';
                    if (key.includes('crypto')) key = 'cryptocom';
                    if (key.includes('gateio') || key.includes('gate')) key = 'gateio';
                    if (iconMap[key]) {
                        img.src = iconMap[key];
                    }
                } catch(_) {}
                img.addEventListener('error', function onErr() {
                    img.removeEventListener('error', onErr);
                    // Try to find CTA link in the same card and build a favicon (icon-only) fallback
                    try {
                        const card = img.closest('.exchange-card');
                        const cta = card && card.querySelector('.action-container a[href]');
                        if (cta) {
                            const url = new URL(cta.getAttribute('href'));
                            const root = toRootDomain(url.hostname.replace(/^www\./,'').replace(/^accounts\./,'').replace(/^app\./,'').replace(/^shop\./,''));
                            const favicon = 'https://www.google.com/s2/favicons?domain=' + root + '&sz=64';
                            const probe = new Image();
                            probe.onload = () => { img.src = favicon; };
                            probe.onerror = () => { img.src = placeholder; };
                            probe.referrerPolicy = 'no-referrer';
                            probe.crossOrigin = 'anonymous';
                            probe.src = favicon;
                            return;
                        }
                    } catch(_) {}
                    img.src = placeholder;
                }, { once: true });
            });
        } catch (e) {
            console && console.warn && console.warn('Logo hardening error', e);
        }
    });
    </script>

    <!-- FAQ Exchange-uri -->
    <section class="container" style="margin:2rem auto 3rem;">
        <div class="faq-badge"><span class="emoji">❓</span><span>FAQ</span></div>
        <?php echo do_shortcode('[faq_list title="Întrebări despre exchange-uri Bitcoin în România"]
        [faq_item q="Care este exchange-ul cu cele mai mici comisioane?" a="De regulă Binance și Bybit oferă comisioane spot în jur de 0.1%. Verifică mereu tarifele actuale în contul tău."]
        [faq_item q="Pot cumpăra Bitcoin cu cardul în RON?" a="Da, multe platforme acceptă carduri românești. Alternativ, poți depune prin transfer bancar (SEPA) și converti în USDT/BTC."]
        [faq_item q="Este necesar KYC?" a="Da, pentru platformele reglementate KYC este obligatoriu. Acesta ajută la securitate și limite mai mari de tranzacționare."]
        [/faq_list]'); ?>
    </section>

    <!-- Ghid Rapid -->
    <section class="quick-guide">
        <div class="container">
            <h2>🚀 Cum să cumperi Bitcoin în România - Ghid Rapid</h2>
            <div class="steps-grid">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Alege Exchange-ul</h3>
                    <p>Selectează o platformă din lista de mai sus. Pentru începători recomandăm Coinbase, pentru traderi Binance.</p>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Creează Cont</h3>
                    <p>Înregistrează-te cu email-ul și completează verificarea KYC (necesită CI/pașaport).</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Depune Bani</h3>
                    <p>Transferă EUR prin card bancar sau transfer SEPA. Depozitele sunt instant sau 1-2 zile.</p>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <h3>Cumpără Bitcoin</h3>
                    <p>Plasează ordinul de cumpărare. Poți cumpăra cu Market Order (instant) sau Limit Order.</p>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>