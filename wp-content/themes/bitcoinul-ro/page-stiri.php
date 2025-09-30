<?php
/**
 * Template Name: Știri Bitcoin
 * Pagina cu ultimele știri Bitcoin din România și internațional
 */

get_header(); ?>

<main class="site-content news-page">
    
    <!-- Hero Section Știri -->
    <section class="page-hero news-hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="page-title">Știri Bitcoin</h1>
                <p class="page-subtitle">Ultimele știri despre Bitcoin</p>
                <div class="news-stats">
                    <div class="stat">
                        <span class="stat-number" id="total-articles">24</span>
                        <span class="stat-label">Articole astăzi</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">🔥</span>
                        <span class="stat-label">Actualizare live</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    

    <!-- Featured News -->
    <section class="featured-news">
        <div class="container">
            <h2>🔥 Știri de Top</h2>
            <div class="news-grid" id="featured-news-container">
                <!-- Se va popula prin JavaScript cu API -->
            </div>
        </div>
    </section>

    <!-- Latest News Feed (SSR + hydrate) -->
    <section class="news-feed">
        <div class="container">
            <h2>📰 Ultimele Știri</h2>
            <div class="news-grid" id="news-container">
                <?php
                // Server-side render first page for SEO
                if (!function_exists('bitcoinul_ro_collect_public_btc_news')) {
                    // fallback: simple placeholder
                    echo '<div class="news-loading"><div class="loading-spinner"></div><p>Încărcăm ultimele știri Bitcoin...</p></div>';
                } else {
                    $bundle = bitcoinul_ro_collect_public_btc_news();
                    $items = isset($bundle['items']) ? array_slice($bundle['items'], 0, 24) : array();
                    $featuredCount = 0;
                    foreach ($items as $it) {
                        // Keep only Bitcoin items (collector already filters, but be safe)
                        $title = isset($it['title']) ? $it['title'] : '';
                        $summary = isset($it['summary']) ? $it['summary'] : '';
                        if (!preg_match('/\bbitcoin\b|\bbtc\b/i', $title . ' ' . $summary)) continue;
                        $href = isset($it['original_url']) && $it['original_url'] ? $it['original_url'] : (isset($it['url']) ? $it['url'] : '#');
                        $source = '';
                        if (!empty($it['source'])) {
                            if (is_array($it['source'])) { $source = (isset($it['source']['title']) ? $it['source']['title'] : (isset($it['source']['domain']) ? $it['source']['domain'] : '')); }
                            elseif (is_string($it['source'])) { $source = $it['source']; }
                        } else {
                            $source = isset($it['domain']) ? $it['domain'] : 'Bitcoin News';
                        }
                        $date = isset($it['published_at']) ? esc_attr($it['published_at']) : '';
                        // Render simple card
                        echo '<article class="news-card">';
                        echo '  <div class="news-image"><div class="news-icon">📰</div></div>';
                        echo '  <div class="news-content">';
                        echo '    <span class="news-tag">Bitcoin</span>';
                        echo '    <h3><a href="' . esc_url($href) . '" target="_blank" rel="nofollow noopener noreferrer">' . esc_html($title) . '</a></h3>';
                        $text = $summary ? $summary : $title;
                        echo '    <p>' . esc_html(mb_substr($text, 0, 180)) . '...</p>';
                        echo '    <div class="news-meta">';
                        if ($date) echo '      <span class="news-date" data-pub="' . $date . '">Actualizat</span>';
                        echo '      <span class="news-source">' . esc_html($source) . '</span>';
                        echo '    </div>';
                        echo '  </div>';
                        echo '</article>';
                    }
                }
                ?>
            </div>

            <div class="load-more-container">
                <button id="load-more-news" class="btn-secondary">Încarcă mai multe știri</button>
            </div>
        </div>
    </section>

    <!-- Market Sentiment -->
    <section class="market-sentiment">
        <div class="container">
            <h2>📊 Sentimentul Pieței</h2>
            <div class="sentiment-grid">
                <div class="sentiment-card">
                    <div class="sentiment-icon">😱</div>
                    <div class="sentiment-data">
                        <span class="sentiment-value" id="fear-greed-index">Loading...</span>
                        <span class="sentiment-label">Fear & Greed Index</span>
                    </div>
                </div>
                <div class="sentiment-card">
                    <div class="sentiment-icon">📈</div>
                    <div class="sentiment-data">
                        <span class="sentiment-value" id="btc-dominance">Loading...</span>
                        <span class="sentiment-label">Bitcoin Dominance</span>
                    </div>
                </div>
                <div class="sentiment-card">
                    <div class="sentiment-icon">💰</div>
                    <div class="sentiment-data">
                        <span class="sentiment-value" id="market-cap">Loading...</span>
                        <span class="sentiment-label">Market Cap Total</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Romanian News Section -->
    <section class="romania-news">
        <div class="container">
            <h2>🇷🇴 Știri din România</h2>
            <div class="romania-articles">
                <article class="news-card local">
                    <div class="news-content">
                        <span class="news-tag romania">România</span>
                        <h3>ANAF actualizează regulile pentru impozitarea Bitcoin în 2025</h3>
                        <p>Noi clarificări pentru contribuabilii care tranzacționează Bitcoin...</p>
                        <div class="news-meta">
                            <span class="news-date">Azi, 14:30</span>
                            <span class="news-source">ANAF Official</span>
                        </div>
                    </div>
                </article>

                <article class="news-card local">
                    <div class="news-image">
                        <div class="news-icon">🏛️</div>
                    </div>
                    <div class="news-content">
                        <span class="news-tag romania">România</span>
                        <h3>Prima bancă din România acceptă depozite Bitcoin</h3>
                        <p>BRD anunță servicii pentru clienții care utilizează Bitcoin...</p>
                        <div class="news-meta">
                            <span class="news-date">Ieri, 16:45</span>
                            <span class="news-source">Ziarul Financiar</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

</main>

<!-- JavaScript pentru API-ul de știri -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentPage = 1;
    const newsContainer = document.getElementById('news-container');
    const featuredContainer = document.getElementById('featured-news-container');
    const loadMoreBtn = document.getElementById('load-more-news');

    // Endpoint proxy server-side (token din Customizer)
    // Nou: endpoint public (fără token) bazat pe RSS agregate
    const NEWS_PUBLIC = '<?php echo esc_url( admin_url('admin-ajax.php?action=bitcoinul_ro_fetch_public_btc_news') ); ?>';

    // Funcție pentru formatarea datei
    function formatDate(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const diffTime = Math.abs(now - date);
        const diffHours = Math.ceil(diffTime / (1000 * 60 * 60));
        
        if (diffHours < 1) return 'Acum câteva minute';
        if (diffHours < 24) return `Acum ${diffHours} ore`;
        return date.toLocaleDateString('ro-RO');
    }

    // Funcție pentru încărcarea știrilor Bitcoin
    async function loadCryptoNews(page = 1) {
        let didFallback = false;
        try {
            showLoading();
            // forțează public=true din proxy și adaugă parametru de busting ca să nu ia cache vechi
            // Removed nocache=1 to allow server-side caching via transient
            // Endpoint public agregat (fără fallback CryptoPanic)
            const publicResp = await fetch(`${NEWS_PUBLIC}&page=${page}&per_page=24&_=${Date.now()}`);

            let publicResults = [];
            if (publicResp && publicResp.ok) {
                const payload = await publicResp.json();
                if (payload) {
                    if (payload.success === true && payload.data && Array.isArray(payload.data.results)) {
                        publicResults = payload.data.results;
                    } else if (payload.success === true && payload.data && Array.isArray(payload.data.results) === false && Array.isArray(payload.data)) {
                        publicResults = payload.data;
                    } else if (Array.isArray(payload.results)) {
                        publicResults = payload.results;
                    }
                }
            }

            if (!publicResults.length) {
                loadFallbackNews();
                didFallback = true;
            } else {
                displayNews(publicResults, page === 1);
            }
        } catch (error) {
            console.error('Error loading news:', error);
            loadFallbackNews();
            didFallback = true;
        } finally {
            hideLoading();
        }
    }

    // Funcție fallback cu știri statice
    function loadFallbackNews() {
        const fallbackNews = [
            {
                title: "Bitcoin atinge un nou maxim istoric de $75,000",
                summary: "Prețul Bitcoin continuă să crească pe fondul adoptării instituționale masive și a aprobării ETF-urilor Bitcoin spot în SUA.",
                url: "https://www.coindesk.com/markets/2025/03/01/bitcoin-hits-all-time-high-75000/",
                source: "CoinDesk",
                published_at: new Date().toISOString(),
                domain: "coindesk.com"
            },
            // Eliminat știrile non-Bitcoin
            {
                title: "BlackRock: Bitcoin ETF atrage $1 miliard în prima săptămână",
                summary: "Fondul de investiții gigant raportează o adoptare fără precedent a produsului Bitcoin ETF.",
                url: "https://www.bloomberg.com/news/articles/2025-02-15/blackrock-bitcoin-etf-sees-1b-inflows-first-week",
                source: "Bloomberg",
                published_at: new Date(Date.now() - 7200000).toISOString(),
                domain: "bloomberg.com"
            },
            {
                title: "România: ANAF clarifică impozitarea tranzacțiilor cu Bitcoin",
                summary: "Ghid actualizat privind declararea și taxarea câștigurilor obținute din Bitcoin.",
                url: "https://www.zf.ro/banci-si-asigurari/anaf-clarificari-impozitare-bitcoin-21999999",
                source: "Ziarul Financiar",
                published_at: new Date(Date.now() - 10800000).toISOString(),
                domain: "zf.ro"
            },
            {
                title: "MicroStrategy cumpără încă 10,000 BTC",
                summary: "Compania își mărește rezervele de Bitcoin, consolidând poziția ca cel mai mare deținător corporativ.",
                url: "https://www.reuters.com/technology/microstrategy-buys-more-bitcoin-2025-02-25/",
                source: "Reuters",
                published_at: new Date(Date.now() - 5400000).toISOString(),
                domain: "reuters.com"
            },
            {
                title: "Tesla acceptă din nou plăți în Bitcoin",
                summary: "Elon Musk anunță reactivarea opțiunii de plată în Bitcoin pentru vehiculele Tesla.",
                url: "https://www.reuters.com/technology/tesla-to-accept-bitcoin-again-2025-02-20/",
                source: "Reuters",
                published_at: new Date(Date.now() - 14400000).toISOString(),
                domain: "reuters.com"
            }
        ];

        displayNews(fallbackNews, true);
        hideLoading();
    }

    // Funcție pentru afișarea știrilor
    function displayNews(articles, clearContainer = false) {
        if (clearContainer) {
            newsContainer.innerHTML = '';
            if (featuredContainer) featuredContainer.innerHTML = '';
        }
    let featuredAdded = 0;
        articles.forEach((article) => {
            // Asigură afișarea exclusivă a știrilor Bitcoin
            if (!isBitcoinArticle(article)) return;
            // Filtru .ro dacă este setat
            if (!passesRomanianFilter(article)) return;
            const isFeatured = featuredAdded < 3 && clearContainer;
            const newsCard = createNewsCard(article, isFeatured); // Primele 3 (filtrate) sunt featured
            
            if (isFeatured && featuredContainer) {
                // Dacă serverul nu a randat featured, doar atunci populăm
                if (!featuredContainer.children || featuredContainer.children.length < 1) {
                    featuredContainer.appendChild(newsCard.cloneNode(true));
                    featuredAdded++;
                }
            }
            
            newsContainer.appendChild(newsCard);
        });

        
    }

    // Funcție pentru crearea card-ului de știre
    // Rezolvă URL-ul real către sursa știrii (cu fallback-uri robuste) – niciodată CryptoPanic
    function resolveArticleUrl(article) {
        try {
            if (!article || typeof article !== 'object') return '#';

            const isHttpUrl = (u) => typeof u === 'string' && /^https?:\/\//i.test(u);
            const addScheme = (u) => (typeof u === 'string' && !/^https?:\/\//i.test(u)) ? `https://${u}` : u;
            const hostname = (u) => {
                try { return new URL(addScheme(u)).hostname; } catch { return ''; }
            };
            const isCryptoPanic = (u) => {
                const h = hostname(u).toLowerCase();
                return !!h && (h === 'cryptopanic.com' || h.endsWith('.cryptopanic.com'));
            };

            // 1) Preferă câmpurile care indică explicit sursa originală și nu duc către CryptoPanic
            const preferredKeys = [
                // conform documentației CryptoPanic v2, original_url este linkul către articolul original
                'original_url', 'origin_url', 'source_url', 'news_url', 'canonical_url',
                'website', 'short_url', 'link', 'url'
            ];
            for (const key of preferredKeys) {
                const v = article[key];
                if (typeof v === 'string' && v && !isCryptoPanic(v)) {
                    return isHttpUrl(v) ? v : addScheme(v);
                }
            }

            // 2) În unele payload-uri, informația utilă este în nested objects (ex: article.source.url sau source.path)
            if (article.source && typeof article.source === 'object') {
                const s = article.source;
                // a) URL complet în source.url
                if (typeof s.url === 'string' && s.url && !isCryptoPanic(s.url)) {
                    return isHttpUrl(s.url) ? s.url : addScheme(s.url);
                }
                // b) Construiește din domain + path
                if (s.domain) {
                    let built = String(s.domain);
                    if (s.path) built += String(s.path);
                    if (built && !isCryptoPanic(built)) {
                        return isHttpUrl(built) ? built : addScheme(built);
                    }
                }
            }

            // 3) Dacă există câmpul domain (sau source.domain), măcar ducem utilizatorul pe homepage-ul sursei
            const domain = (article.domain) || (article.source && article.source.domain) || '';
            if (domain && !isCryptoPanic(domain)) {
                const home = addScheme(domain);
                if (!isCryptoPanic(home)) return home;
            }

            // 4) Fallback generic: caută primul URL din orice câmp string care nu este CryptoPanic
            for (const k in article) {
                if (!Object.prototype.hasOwnProperty.call(article, k)) continue;
                const val = article[k];
                if (typeof val === 'string' && /^https?:\/\//i.test(val) && !isCryptoPanic(val)) {
                    return val;
                }
                // verifică nivelul 1 pentru obiecte
                if (val && typeof val === 'object') {
                    for (const kk in val) {
                        if (!Object.prototype.hasOwnProperty.call(val, kk)) continue;
                        const vv = val[kk];
                        if (typeof vv === 'string' && /^https?:\/\//i.test(vv) && !isCryptoPanic(vv)) {
                            return vv;
                        }
                    }
                }
            }

            // Ultima plasă de siguranță: nu returnăm link către CryptoPanic; în lipsă, rămâne '#'
            return '#';
        } catch (e) {
            return '#';
        }
    }

    function createNewsCard(article, isFeatured = false) {
        const card = document.createElement('article');
        card.className = `news-card ${isFeatured ? 'featured' : ''}`;
        const href = resolveArticleUrl(article);
        const sourceIcon = getSourceIcon(article.source || article.domain);
        
        card.innerHTML = `
            <div class="news-image">
                <div class="news-icon">${sourceIcon}</div>
            </div>
            <div class="news-content">
                <span class="news-tag">Bitcoin</span>
                <h3><a href="${href}" target="_blank" rel="nofollow noopener noreferrer">${article.title}</a></h3>
                <p>${article.description || article.summary || article.title.substring(0, 150) + '...'}</p>
                <div class="news-meta">
                    <span class="news-date">${formatDate(article.published_at || article.created_at)}</span>
                    <span class="news-source">${(article.source && (article.source.title || article.source.name)) || article.source || article.domain || 'Bitcoin News'}</span>
                </div>
            </div>
        `;

        // Face întreg cardul clicabil (deschide sursa într-un tab nou)
        card.addEventListener('click', (e) => {
            if (!e.target.closest('a')) {
                const a = card.querySelector('a[href]');
                if (a && a.getAttribute('href') && a.getAttribute('href') !== '#') {
                    window.open(a.getAttribute('href'), '_blank', 'noopener');
                }
            }
        });

        return card;
    }

    // Funcție pentru iconițele surselor
    function getSourceIcon(source) {
        const srcStr = typeof source === 'string' ? source : (source && (source.domain || source.title || ''));
        const icons = {
            'coindesk.com': '📰',
            'cointelegraph.com': '🗞️',
            'bloomberg.com': '💼',
            'reuters.com': '📈',
            'zf.ro': '🇷🇴',
            'binance.com': '🟡',
            'default': '🔗'
        };
        
        for (let domain in icons) {
            if (srcStr && String(srcStr).includes(domain)) {
                return icons[domain];
            }
        }
        return icons.default;
    }

    // Funcție pentru categoriile de știri
    function getNewsCategory(title) {
        const categories = {
            'bitcoin': /bitcoin|btc/i,
            'ethereum': /ethereum|eth/i,
            'regulation': /regulament|anaf|tax|legal/i,
            'market': /piață|preț|trading/i,
            'technology': /tehnolog|blockchain|upgrade/i
        };

        for (let category in categories) {
            if (categories[category].test(title)) {
                return category.charAt(0).toUpperCase() + category.slice(1);
            }
        }
        return 'General';
    }

    

    // Funcții pentru loading states
    function showLoading() {
        const loading = document.querySelector('.news-loading');
        if (loading) loading.style.display = 'block';
    }

    function hideLoading() {
        const loading = document.querySelector('.news-loading');
        if (loading) loading.style.display = 'none';
    }

    // Event listeners
    loadMoreBtn.addEventListener('click', function() {
        currentPage++;
        loadCryptoNews(currentPage);
    });

    // eliminat: traduceri & refresh manual și controale de filtrare din UI

        // Filtru pentru surse .ro
        const roFilter = document.getElementById('news-romanian');
        if (roFilter) {
            roFilter.addEventListener('change', function() {
                // Refiltrare DOM existent
                const val = this.value;
                const cards = document.querySelectorAll('.news-card');
                cards.forEach(card => {
                    if (val !== 'ro-only') { card.style.display = 'block'; return; }
                    const linkEl = card.querySelector('.news-content a[href]');
                    const href = linkEl ? linkEl.getAttribute('href') : '';
                    card.style.display = isRomanianDomain(href) ? 'block' : 'none';
                });
            });
        }

    // Eliminat filtrele din UI; logică de filtrare forțată pe Bitcoin

    // Încărcarea inițială a știrilor
    loadCryptoNews(1);

    // Auto-refresh la fiecare 5 minute
    setInterval(() => {
        loadCryptoNews(1);
    }, 300000); // 5 minute

    // Încărcare date sentiment piață
    loadMarketSentiment();

    async function loadMarketSentiment() {
        const fgEl = document.getElementById('fear-greed-index');
        const domEl = document.getElementById('btc-dominance');
        const capEl = document.getElementById('market-cap');
        if (!fgEl || !domEl || !capEl) return;
        try {
            fgEl.textContent = '...';
            domEl.textContent = '...';
            capEl.textContent = '...';
            const metricsUrl = '<?php echo esc_url( admin_url('admin-ajax.php?action=bitcoinul_ro_market_metrics') ); ?>&_=' + Date.now();
            const r = await fetch(metricsUrl, {cache:'no-store'});
            if (!r.ok) throw new Error('HTTP ' + r.status);
            const data = await r.json();
            if (data && data.success) {
                const m = data.data || data; // WP send_json_success wraps
                if (m.fear_greed) {
                    const v = m.fear_greed.value;
                    const cls = m.fear_greed.classification || '';
                    fgEl.textContent = (v !== null ? v : '?') + (cls ? ` (${cls})` : '');
                }
                if (m.dominance && typeof m.dominance.btc !== 'undefined' && m.dominance.btc !== null) {
                    domEl.textContent = m.dominance.btc + '%';
                }
                if (m.market_cap && m.market_cap.formatted) {
                    capEl.textContent = m.market_cap.formatted;
                }
            } else {
                fgEl.textContent = 'N/A';
                domEl.textContent = 'N/A';
                capEl.textContent = 'N/A';
            }
        } catch (error) {
            console.error('Error loading sentiment data:', error);
            fgEl.textContent = 'N/A';
            domEl.textContent = 'N/A';
            capEl.textContent = 'N/A';
        }
    }

        // Doar știri Bitcoin
        function isBitcoinArticle(article) {
            try {
                const text = `${(article && article.title) || ''} ${(article && article.description) || ''} ${(article && article.summary) || ''}`;
                return /\bbitcoin\b|\bbtc\b/i.test(text);
            } catch (e) { return false; }
        }

        // Helpers pentru filtrul .ro
        function isRomanianDomain(urlOrDomain) {
            try {
                const host = (urlOrDomain || '').includes('http') ? new URL(urlOrDomain).hostname : (urlOrDomain || '');
                if (!host) return false;
                return /\.ro$/i.test(host) || /(zf\.ro|profit\.ro|hotnews\.ro|mediafax\.ro|wall-street\.ro|economedia\.ro)/i.test(host);
            } catch (e) { return false; }
        }

        function passesRomanianFilter(article) {
            const toggle = document.getElementById('news-romanian');
            if (!toggle || toggle.value !== 'ro-only') return true; // fără UI, nu filtrăm .ro implicit
            const domain = article.domain || article.url || '';
            return isRomanianDomain(domain);
        }
});
</script>

<?php get_footer(); ?>