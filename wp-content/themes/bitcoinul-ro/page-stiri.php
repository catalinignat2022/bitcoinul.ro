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
                <h1 class="page-title">
                    📰 Știri Bitcoin & Crypto
                </h1>
                <p class="page-subtitle">
                    Ultimele știri din lumea Bitcoin și criptomonedelor. Rămâi la curent cu evoluțiile de pe piață, 
                    reglementările din România și analizele experților.
                </p>
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

    <!-- Breaking News -->
    <section class="breaking-news" id="breaking-news">
        <div class="container">
            <div class="breaking-header">
                <span class="breaking-label">🚨 BREAKING</span>
                <div class="breaking-ticker" id="breaking-ticker">
                    Încărcăm ultimele știri...
                </div>
            </div>
        </div>
    </section>

    <!-- Filtre Știri -->
    <section class="news-filters">
        <div class="container">
            <div class="filter-controls">
                <div class="filter-group">
                    <label>Categorie:</label>
                    <select id="news-category">
                        <option value="all">Toate știrile</option>
                        <option value="bitcoin">Bitcoin</option>
                        <option value="ethereum">Ethereum</option>
                        <option value="regulation">Reglementări</option>
                        <option value="market">Piață</option>
                        <option value="technology">Tehnologie</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Perioada:</label>
                    <select id="news-timeframe">
                        <option value="today">Astăzi</option>
                        <option value="week">Această săptămână</option>
                        <option value="month">Această lună</option>
                        <option value="all">Toate</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Surse:</label>
                    <select id="news-romanian">
                        <option value="any">Toate</option>
                        <option value="ro-only">Doar .ro</option>
                    </select>
                </div>
                <button id="refresh-news" class="refresh-btn">🔄 Actualizează</button>
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

    <!-- Latest News Feed -->
    <section class="news-feed">
        <div class="container">
            <h2>📰 Ultimele Știri</h2>
            <div class="news-grid" id="news-container">
                <!-- Loading state -->
                <div class="news-loading">
                    <div class="loading-spinner"></div>
                    <p>Încărcăm ultimele știri Bitcoin...</p>
                </div>
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
                    <div class="news-image">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 120'%3E%3Crect width='200' height='40' fill='%230052CC'/%3E%3Crect y='40' width='200' height='40' fill='%23FFCD00'/%3E%3Crect y='80' width='200' height='40' fill='%23CE1126'/%3E%3C/svg%3E" alt="România">
                    </div>
                    <div class="news-content">
                        <span class="news-tag romania">România</span>
                        <h3>ANAF actualizează regulile pentru impozitarea crypto în 2025</h3>
                        <p>Noi clarificări pentru contribuabilii care tranzacționează Bitcoin și alte criptomonede...</p>
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
                        <p>BRD anunță servicii crypto pentru clienții corporativi și individuali...</p>
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
    const refreshBtn = document.getElementById('refresh-news');

    // Endpoint proxy server-side (token din Customizer)
    const NEWS_PROXY = '<?php echo esc_url( admin_url('admin-ajax.php?action=bitcoinul_ro_fetch_news') ); ?>';

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

    // Funcție pentru încărcarea știrilor crypto
    async function loadCryptoNews(page = 1) {
        try {
            showLoading();
            
            // Folosim proxy-ul server-side pentru CryptoPanic
            const response = await fetch(`${NEWS_PROXY}&currencies=BTC,ETH&kind=news&page=${page}`);
            
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            
            const payload = await response.json();
            // Endpoint-ul nostru răspunde cu { success: true, data: { results: [...] } }
            const results = (payload && payload.success && payload.data && Array.isArray(payload.data.results))
                ? payload.data.results
                : (Array.isArray(payload?.results) ? payload.results : null);

            if (!results) throw new Error('Invalid news payload');

            displayNews(results, page === 1);
            hideLoading();
            
        } catch (error) {
            console.error('Error loading news:', error);
            // Fallback la știri statice
            loadFallbackNews();
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
            {
                title: "Ethereum pregătește următorul upgrade major",
                summary: "Dencun upgrade va reduce semnificativ costurile de tranzacție pentru layer 2 solutions.",
                url: "https://cointelegraph.com/news/ethereum-dencun-upgrade-explained",
                source: "CoinTelegraph",
                published_at: new Date(Date.now() - 3600000).toISOString(),
                domain: "cointelegraph.com"
            },
            {
                title: "BlackRock: Bitcoin ETF atrage $1 miliard în prima săptămână",
                summary: "Fondul de investiții gigant raportează o adoptare fără precedent a produsului Bitcoin ETF.",
                url: "https://www.bloomberg.com/news/articles/2025-02-15/blackrock-bitcoin-etf-sees-1b-inflows-first-week",
                source: "Bloomberg",
                published_at: new Date(Date.now() - 7200000).toISOString(),
                domain: "bloomberg.com"
            },
            {
                title: "România: Noile reglementări crypto intră în vigoare",
                summary: "ANAF publică ghidul final pentru impozitarea tranzacțiilor cu criptomonede în 2025.",
                url: "https://www.zf.ro/banci-si-asigurari/anaf-publica-ghidul-crypto-2025-21999999",
                source: "Ziarul Financiar",
                published_at: new Date(Date.now() - 10800000).toISOString(),
                domain: "zf.ro"
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
        }

        articles.forEach((article, index) => {
            // Filtru .ro dacă este setat
            if (!passesRomanianFilter(article)) return;
            const newsCard = createNewsCard(article, index < 3); // Primele 3 sunt featured
            
            if (index < 3 && clearContainer) {
                // Adaugă la featured
                featuredContainer.appendChild(newsCard.cloneNode(true));
            }
            
            newsContainer.appendChild(newsCard);
        });

        // Update breaking news
        if (articles.length > 0 && clearContainer) {
            updateBreakingNews(articles[0]);
        }
    }

    // Funcție pentru crearea card-ului de știre
    // Rezolvă URL-ul real către sursa știrii
    function resolveArticleUrl(article) {
        try {
            let candidate = article && (article.url ||
                (article.source && (article.source.url || article.source.path || (article.source.domain ? `https://${article.source.domain}` : ''))) ||
                (article.domain ? `https://${article.domain}` : ''));
            if (!candidate || candidate === '#') return '#';
            // Normalizează să aibă scheme http/https
            if (!/^https?:\/\//i.test(candidate)) candidate = `https://${candidate}`;
            return candidate;
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
                <span class="news-tag">${getNewsCategory(article.title)}</span>
                <h3><a href="${href}" target="_blank" rel="nofollow noopener noreferrer">${article.title}</a></h3>
                <p>${article.summary || article.title.substring(0, 150) + '...'}</p>
                <div class="news-meta">
                    <span class="news-date">${formatDate(article.published_at || article.created_at)}</span>
                    <span class="news-source">${(article.source && (article.source.title || article.source.name)) || article.source || article.domain || 'Crypto News'}</span>
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

    // Funcție pentru breaking news
    function updateBreakingNews(article) {
        const breakingTicker = document.getElementById('breaking-ticker');
        const href = resolveArticleUrl(article);
        breakingTicker.innerHTML = `
            <a href="${href}" target="_blank" rel="nofollow noopener noreferrer">
                ${article.title}
            </a>
        `;
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

    refreshBtn.addEventListener('click', function() {
        currentPage = 1;
        loadCryptoNews(1);
        refreshBtn.innerHTML = '🔄 Actualizând...';
        setTimeout(() => {
            refreshBtn.innerHTML = '🔄 Actualizează';
        }, 2000);
    });

    // Filtrele
    document.getElementById('news-category').addEventListener('change', function() {
        // Implementează filtrarea după categorie
        filterNewsByCategory(this.value);
    });

    document.getElementById('news-timeframe').addEventListener('change', function() {
        // Implementează filtrarea după timp
        filterNewsByTime(this.value);
    });

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

    function filterNewsByCategory(category) {
        const cards = document.querySelectorAll('.news-card');
        cards.forEach(card => {
            const tag = card.querySelector('.news-tag');
            if (category === 'all' || (tag && tag.textContent.toLowerCase().includes(category))) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function filterNewsByTime(timeframe) {
        // Implementează filtrarea după timp
        console.log('Filter by time:', timeframe);
    }

    // Încărcarea inițială a știrilor
    loadCryptoNews(1);

    // Auto-refresh la fiecare 5 minute
    setInterval(() => {
        loadCryptoNews(1);
    }, 300000); // 5 minute

    // Încărcare date sentiment piață
    loadMarketSentiment();

    async function loadMarketSentiment() {
        try {
            // Simulare date - înlocuiește cu API real
            document.getElementById('fear-greed-index').textContent = '67 (Greed)';
            document.getElementById('btc-dominance').textContent = '52.3%';
            document.getElementById('market-cap').textContent = '$2.1T';
        } catch (error) {
            console.error('Error loading sentiment data:', error);
        }
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
            if (!toggle || toggle.value !== 'ro-only') return true;
            const domain = article.domain || article.url || '';
            return isRomanianDomain(domain);
        }
});
</script>

<?php get_footer(); ?>