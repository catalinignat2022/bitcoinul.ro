<?php
/**
 * Template Name: Exchange-uri Bitcoin
 * Pagina cu lista completă de exchange-uri Bitcoin din România
 */

get_header(); ?>

<main class="site-content exchange-page">
    
    <!-- Hero Section Exchange-uri -->
    <section class="page-hero exchanges-hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="page-title">
                    <span class="btc-icon">₿</span>
                    Exchange-uri Bitcoin România 2025
                </h1>
                <p class="page-subtitle">
                    Cele mai sigure și de încredere platforme pentru cumpărarea și vânzarea Bitcoin în România. 
                    Comparăm comisioane, securitate, metode de plată și ușurința de utilizare.
                </p>
            </div>
        </div>
    </section>

    <!-- Filtru și Sortare -->
    <section class="container">
        <div class="exchange-filters">
            <div class="filter-group">
                <label>Sortează după:</label>
                <select id="sort-exchanges" 
                        onchange="trackEvent('filter_change', 'user_interaction', 'sort_exchanges_' + this.value);">
                    <option value="rating">Rating</option>
                    <option value="fees">Comisioane</option>
                    <option value="volume">Volum tranzacții</option>
                    <option value="established">Anul înființării</option>
                </select>
            </div>
            <div class="filter-group">
                <label>Tipul schimbului:</label>
                <select id="filter-type">
                    <option value="all">Toate</option>
                    <option value="centralized">Centralizate</option>
                    <option value="p2p">Peer-to-Peer</option>
                    <option value="instant">Schimb Instant</option>
                </select>
            </div>
        </div>
    </section>

    <!-- Lista Exchange-urilor - Design Nou cu Tile-uri Compacte -->
    <section class="exchanges-grid-section">
        <div class="container">
            <div class="exchanges-compact-grid" id="exchanges-container">
                
                <!-- Binance - Recomandat #1 -->
                <div class="exchange-tile featured" data-rating="4.8" data-fees="0.1" data-type="centralized">
                    <div class="tile-badge recommended">Recomandat #1</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/binance-coin-bnb-logo.png" alt="Binance România">
                    </div>
                    <h3 class="exchange-name">Binance<span class="country-flag">🇷🇴</span></h3>
                    <div class="rating-stars">★★★★★</div>
                    <div class="key-features">
                        <div class="feature">✓ Comision 0.1% - cel mai mic din România</div>
                        <div class="feature">✓ Depunere gratuită prin card bancar</div>
                        <div class="feature">✓ Retragere rapidă în RON</div>
                        <div class="feature">✓ Aplicație mobilă premium</div>
                        <div class="feature">✓ Suport clienți în română</div>
                        <div class="feature">✓ Licență oficială în UE</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://accounts.binance.com/register?ref=ROMANIA" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('Binance', 'tile_click');">
                            ÎNCEPE PE BINANCE →
                        </a>
                    </div>
                </div>

                <!-- Coinbase Pro - Cel mai sigur -->
                <div class="exchange-tile popular" data-rating="4.5" data-fees="0.5" data-type="centralized">
                    <div class="tile-badge secure">Cel mai sigur</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/coinbase-coin-logo.png" alt="Coinbase Pro">
                    </div>
                    <h3 class="exchange-name">Coinbase Pro</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Cea mai mare siguranță din lume</div>
                        <div class="feature">✓ Reglementat în SUA și Europa</div>
                        <div class="feature">✓ Interfață perfectă pentru începători</div>
                        <div class="feature">✓ Asigurare fonduri până la $250,000</div>
                        <div class="feature">✓ Card de debit Bitcoin gratuit</div>
                        <div class="feature">✓ Câștigi 4% APY pe staking</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://coinbase.com/join/romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('Coinbase', 'tile_click');">
                            ÎNCEARCĂ COINBASE →
                        </a>
                    </div>
                </div>

                <!-- eToro - Social Trading -->
                <div class="exchange-tile social" data-rating="4.3" data-fees="1.0" data-type="social">
                    <div class="tile-badge social">Social Trading</div>
                    <div class="tile-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/EToro_logo.svg/200px-EToro_logo.svg.png" alt="eToro România">
                    </div>
                    <h3 class="exchange-name">eToro România</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Copy Trading - copiază traderii profesioniști</div>
                        <div class="feature">✓ Platformă reglementată CySEC</div>
                        <div class="feature">✓ Depunere minimă doar 50$</div>
                        <div class="feature">✓ Fără comisione la cumpărarea Bitcoin</div>
                        <div class="feature">✓ Portofoliu diversificat crypto</div>
                        <div class="feature">✓ Comunitate activă de traderi</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://etoro.tw/romania-bitcoin" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('eToro', 'tile_click');">
                            DESCOPERĂ ETORO →
                        </a>
                    </div>
                </div>

                <!-- Kraken - Securitate maximă -->
                <div class="exchange-tile secure" data-rating="4.4" data-fees="0.26" data-type="centralized">
                    <div class="tile-badge secure">Securitate maximă</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/kraken-kraken-logo.png" alt="Kraken">
                    </div>
                    <h3 class="exchange-name">Kraken</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Niciodată hacked în 10+ ani</div>
                        <div class="feature">✓ Comisioane 0.16% - 0.26%</div>
                        <div class="feature">✓ Depozit minim doar 1 EUR</div>
                        <div class="feature">✓ Trading cu leverage până la 5x</div>
                        <div class="feature">✓ Staking cu recompense mari</div>
                        <div class="feature">✓ API pentru traderi avansați</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://kraken.com/sign-up?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('Kraken', 'tile_click');">
                            TRADING SECURIZAT →
                        </a>
                    </div>
                </div>

                <!-- Bitpanda - Austria -->
                <div class="exchange-tile european" data-rating="4.2" data-fees="1.49" data-type="centralized">
                    <div class="tile-badge european">European</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/bitpanda-ecosystem-token-best-logo.png" alt="Bitpanda">
                    </div>
                    <h3 class="exchange-name">Bitpanda</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Exchange european din Austria</div>
                        <div class="feature">✓ Reglementat în UE</div>
                        <div class="feature">✓ Suport în română</div>
                        <div class="feature">✓ Schimb instant Bitcoin</div>
                        <div class="feature">✓ Card crypto Bitpanda</div>
                        <div class="feature">✓ Investiții în metale prețioase</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://bitpanda.com/?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('Bitpanda', 'tile_click');">
                            ÎNCEARCĂ BITPANDA →
                        </a>
                    </div>
                </div>

                <!-- Bitstamp - Cel mai vechi -->
                <div class="exchange-tile established" data-rating="4.1" data-fees="0.5" data-type="centralized">
                    <div class="tile-badge established">Din 2011</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/bitstamp-logo.png" alt="Bitstamp">
                    </div>
                    <h3 class="exchange-name">Bitstamp</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Cel mai vechi exchange din Europa</div>
                        <div class="feature">✓ Licență bancară în Luxemburg</div>
                        <div class="feature">✓ Lichiditate foarte mare</div>
                        <div class="feature">✓ Comisioane competitive</div>
                        <div class="feature">✓ Transfer SEPA rapid</div>
                        <div class="feature">✓ Reputație excelentă</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://bitstamp.net/account/register/?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('Bitstamp', 'tile_click');">
                            ÎNCEPE PE BITSTAMP →
                        </a>
                    </div>
                </div>

                <!-- Gemini - Trustworthy -->
                <div class="exchange-tile trustworthy" data-rating="4.0" data-fees="1.49" data-type="centralized">
                    <div class="tile-badge trustworthy">De încredere</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/gemini-dollar-gusd-logo.png" alt="Gemini">
                    </div>
                    <h3 class="exchange-name">Gemini</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Fondat de gemenii Winklevoss</div>
                        <div class="feature">✓ Reglementat în New York</div>
                        <div class="feature">✓ Custodie instituțională</div>
                        <div class="feature">✓ Asigurare FDIC</div>
                        <div class="feature">✓ Interfață simplă</div>
                        <div class="feature">✓ Securitate militară</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://gemini.com/register?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('Gemini', 'tile_click');">
                            ÎNCEARCĂ GEMINI →
                        </a>
                    </div>
                </div>

                <!-- KuCoin - Altcoins -->
                <div class="exchange-tile altcoins" data-rating="4.2" data-fees="0.1" data-type="centralized">
                    <div class="tile-badge altcoins">500+ Cripto</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/kucoin-token-kcs-logo.png" alt="KuCoin">
                    </div>
                    <h3 class="exchange-name">KuCoin</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Over 500 criptomonede</div>
                        <div class="feature">✓ Comisioane foarte mici</div>
                        <div class="feature">✓ Trading cu futures</div>
                        <div class="feature">✓ KCS token rewards</div>
                        <div class="feature">✓ Fără KYC până la 5 BTC</div>
                        <div class="feature">✓ API avansat pentru botți</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://kucoin.com/register?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('KuCoin', 'tile_click');">
                            EXPLOREAZĂ KUCOIN →
                        </a>
                    </div>
                </div>

                <!-- Huobi - Global -->
                <div class="exchange-tile global" data-rating="4.0" data-fees="0.2" data-type="centralized">
                    <div class="tile-badge global">Global</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/huobi-token-ht-logo.png" alt="Huobi">
                    </div>
                    <h3 class="exchange-name">Huobi Global</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Top 3 exchange mondial</div>
                        <div class="feature">✓ Lichiditate enormă</div>
                        <div class="feature">✓ DeFi staking</div>
                        <div class="feature">✓ Margin trading</div>
                        <div class="feature">✓ Pool mining</div>
                        <div class="feature">✓ NFT marketplace</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://huobi.com/register?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('Huobi', 'tile_click');">
                            ÎNCEPE PE HUOBI →
                        </a>
                    </div>
                </div>

                <!-- Gate.io - Advanced -->
                <div class="exchange-tile advanced" data-rating="4.1" data-fees="0.2" data-type="centralized">
                    <div class="tile-badge advanced">Avansat</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/gate-token-gt-logo.png" alt="Gate.io">
                    </div>
                    <h3 class="exchange-name">Gate.io</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ 1000+ perechi trading</div>
                        <div class="feature">✓ Futures cu leverage 100x</div>
                        <div class="feature">✓ Copy trading</div>
                        <div class="feature">✓ Startup launchpad</div>
                        <div class="feature">✓ Yield farming</div>
                        <div class="feature">✓ Options trading</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://gate.io/register?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('Gate.io', 'tile_click');">
                            TRADING AVANSAT →
                        </a>
                    </div>
                </div>

                <!-- Bybit - Derivate -->
                <div class="exchange-tile derivatives" data-rating="4.3" data-fees="0.1" data-type="derivatives">
                    <div class="tile-badge derivatives">Derivate</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/bybit-bit-logo.png" alt="Bybit">
                    </div>
                    <h3 class="exchange-name">Bybit</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Specialist în derivate crypto</div>
                        <div class="feature">✓ Leverage până la 100x</div>
                        <div class="feature">✓ Execuție ultra-rapidă</div>
                        <div class="feature">✓ Bonus pentru noi utilizatori</div>
                        <div class="feature">✓ Trading competiții</div>
                        <div class="feature">✓ Analiza tehnică avansată</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://bybit.com/register?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('Bybit', 'tile_click');">
                            DERIVATE CRYPTO →
                        </a>
                    </div>
                </div>

                <!-- OKX - Complete -->
                <div class="exchange-tile complete" data-rating="4.2" data-fees="0.1" data-type="centralized">
                    <div class="tile-badge complete">Complet</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/okb-okb-logo.png" alt="OKX">
                    </div>
                    <h3 class="exchange-name">OKX</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Exchange complet cu toate features</div>
                        <div class="feature">✓ Web3 wallet integrat</div>
                        <div class="feature">✓ DeFi și NFT</div>
                        <div class="feature">✓ Staking cu recompense mari</div>
                        <div class="feature">✓ P2P trading</div>
                        <div class="feature">✓ Earn products</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://okx.com/register?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('OKX', 'tile_click');">
                            DESCOPERĂ OKX →
                        </a>
                    </div>
                </div>

                <!-- Crypto.com - Card crypto -->
                <div class="exchange-tile card" data-rating="4.1" data-fees="0.4" data-type="centralized">
                    <div class="tile-badge card">Card Crypto</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/cronos-cro-logo.png" alt="Crypto.com">
                    </div>
                    <h3 class="exchange-name">Crypto.com</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Card Visa cu cashback crypto</div>
                        <div class="feature">✓ CRO staking rewards</div>
                        <div class="feature">✓ Aplicație mobilă premium</div>
                        <div class="feature">✓ Sponsor F1 și fotbal</div>
                        <div class="feature">✓ DeFi Earn până la 14%</div>
                        <div class="feature">✓ NFT marketplace</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://crypto.com/register?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('Crypto.com', 'tile_click');">
                            CARD CRYPTO →
                        </a>
                    </div>
                </div>

                <!-- FTX EU - Rebuild -->
                <div class="exchange-tile rebuild" data-rating="3.8" data-fees="0.2" data-type="centralized">
                    <div class="tile-badge rebuild">Reconstruit</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/ftx-token-ftt-logo.png" alt="FTX EU">
                    </div>
                    <h3 class="exchange-name">FTX EU</h3>
                    <div class="rating-stars">★★★☆☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Reconstruit pentru Europa</div>
                        <div class="feature">✓ Interfață inovativă</div>
                        <div class="feature">✓ Reglementat în UE</div>
                        <div class="feature">✓ Trading avansat</div>
                        <div class="feature">✓ Subaccounts</div>
                        <div class="feature">✓ API profesional</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://ftx.eu/register?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('FTX EU', 'tile_click');">
                            ÎNCEPE PE FTX EU →
                        </a>
                    </div>
                </div>

                <!-- Bitfinex - Profesional -->
                <div class="exchange-tile professional" data-rating="4.0" data-fees="0.2" data-type="centralized">
                    <div class="tile-badge professional">Profesional</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/bitfinex-leo-leo-logo.png" alt="Bitfinex">
                    </div>
                    <h3 class="exchange-name">Bitfinex</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Trading profesional avansat</div>
                        <div class="feature">✓ Lichiditate foarte mare</div>
                        <div class="feature">✓ Margin funding</div>
                        <div class="feature">✓ OTC desk</div>
                        <div class="feature">✓ Lending cu dobândă</div>
                        <div class="feature">✓ Analiza on-chain</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://bitfinex.com/register?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('Bitfinex', 'tile_click');">
                            TRADING PROFESIONAL →
                        </a>
                    </div>
                </div>

                <!-- Binance.US - SUA -->
                <div class="exchange-tile usa" data-rating="4.4" data-fees="0.1" data-type="centralized">
                    <div class="tile-badge usa">Pentru SUA</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/binance-usd-busd-logo.png" alt="Binance.US">
                    </div>
                    <h3 class="exchange-name">Binance.US</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Versiunea US a Binance</div>
                        <div class="feature">✓ Reglementat în SUA</div>
                        <div class="feature">✓ Comisioane mici</div>
                        <div class="feature">✓ Staking rewards</div>
                        <div class="feature">✓ Dollar cost averaging</div>
                        <div class="feature">✓ Debit card crypto</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://binance.us/register?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('Binance.US', 'tile_click');">
                            BINANCE SUA →
                        </a>
                    </div>
                </div>

                <!-- Coinlist - Early access -->
                <div class="exchange-tile early" data-rating="4.0" data-fees="0.5" data-type="centralized">
                    <div class="tile-badge early">Early Access</div>
                    <div class="tile-logo">
                        <img src="https://images.crunchbase.com/image/upload/c_lpad,f_auto,q_auto:eco,dpr_1/erkxwhl1gd48xfhe2yld" alt="CoinList">
                    </div>
                    <h3 class="exchange-name">CoinList</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Acces timpuriu la token-uri noi</div>
                        <div class="feature">✓ Reglementat în SUA</div>
                        <div class="feature">✓ KYC strict pentru calitate</div>
                        <div class="feature">✓ Token sales exclusive</div>
                        <div class="feature">✓ Custody institutional</div>
                        <div class="feature">✓ Proiecte verificate</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://coinlist.co/register?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('CoinList', 'tile_click');">
                            ACCES TIMPURIU →
                        </a>
                    </div>
                </div>

                <!-- Uphold - Multi-asset -->
                <div class="exchange-tile multiasset" data-rating="3.9" data-fees="0.8" data-type="centralized">
                    <div class="tile-badge multiasset">Multi-Asset</div>
                    <div class="tile-logo">
                        <img src="https://cdn.worldvectorlogo.com/logos/uphold.svg" alt="Uphold">
                    </div>
                    <h3 class="exchange-name">Uphold</h3>
                    <div class="rating-stars">★★★☆☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Crypto + acțiuni + metale prețioase</div>
                        <div class="feature">✓ Fără comisioane trading</div>
                        <div class="feature">✓ Conversia automată</div>
                        <div class="feature">✓ Reward cards</div>
                        <div class="feature">✓ Anything-to-anything</div>
                        <div class="feature">✓ Transparent rezerve</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://uphold.com/register?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('Uphold', 'tile_click');">
                            MULTI-ASSET →
                        </a>
                    </div>
                </div>

                <!-- Nexo - Banking -->
                <div class="exchange-tile banking" data-rating="4.1" data-fees="0" data-type="banking">
                    <div class="tile-badge banking">Crypto Banking</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/nexo-nexo-logo.png" alt="Nexo">
                    </div>
                    <h3 class="exchange-name">Nexo</h3>
                    <div class="rating-stars">★★★★☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Primul crypto bank din lume</div>
                        <div class="feature">✓ Dobândă până la 16% pe crypto</div>
                        <div class="feature">✓ Împrumuturi cu crypto colateral</div>
                        <div class="feature">✓ Card Nexo cu cashback</div>
                        <div class="feature">✓ Asigurare $375M BitGo</div>
                        <div class="feature">✓ Licențe bancare complete</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://nexo.io/register?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('Nexo', 'tile_click');">
                            CRYPTO BANKING →
                        </a>
                    </div>
                </div>

                <!-- BlockFi - Lending -->
                <div class="exchange-tile lending" data-rating="3.7" data-fees="1" data-type="lending">
                    <div class="tile-badge lending">Împrumuturi</div>
                    <div class="tile-logo">
                        <img src="https://cryptologos.cc/logos/blockfi-logo.png" alt="BlockFi">
                    </div>
                    <h3 class="exchange-name">BlockFi</h3>
                    <div class="rating-stars">★★★☆☆</div>
                    <div class="key-features">
                        <div class="feature">✓ Specialist în împrumuturi crypto</div>
                        <div class="feature">✓ Dobândă competitivă</div>
                        <div class="feature">✓ Credit card cu Bitcoin rewards</div>
                        <div class="feature">✓ Fără comisioane trading</div>
                        <div class="feature">✓ FDIC insurance (USD)</div>
                        <div class="feature">✓ Dollar cost averaging</div>
                    </div>
                    <div class="tile-actions">
                        <a href="https://blockfi.com/register?ref=romania" class="btn-cta" target="_blank" rel="sponsored nofollow" onclick="trackAffiliateClick('BlockFi', 'tile_click');">
                            ÎMPRUMUTURI CRYPTO →
                        </a>
                    </div>
                </div>

            </div>
        </div>
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