<?php
/**
 * Template pentru rezultatele căutării
 * Optimizat pentru a ajuta utilizatorii să găsească informații despre Bitcoin
 */

get_header(); ?>

<main class="site-content">
    <div class="container">
        
        <!-- Header căutare -->
        <header class="search-header" style="text-align: center; padding: 3rem 2rem; background: linear-gradient(135deg, var(--light-bg), #ffffff); border-radius: 15px; margin-bottom: 3rem; border: 2px solid var(--bitcoin-orange);">
            
            <div style="font-size: 3rem; margin-bottom: 1rem;">🔍</div>
            
            <?php if (have_posts()) : ?>
                <h1 style="font-size: 2.5rem; color: var(--text-primary); margin-bottom: 1rem; font-weight: 700;">
                    Rezultate pentru "<?php echo get_search_query(); ?>"
                </h1>
                
                <p style="font-size: 1.1rem; color: var(--text-secondary); margin-bottom: 2rem;">
                    Am găsit <?php echo $wp_query->found_posts; ?> 
                    <?php echo ($wp_query->found_posts == 1) ? 'rezultat' : 'rezultate'; ?> 
                    pentru căutarea ta despre Bitcoin și criptomonede.
                </p>
            <?php else : ?>
                <h1 style="font-size: 2.5rem; color: var(--text-primary); margin-bottom: 1rem; font-weight: 700;">
                    Niciun rezultat pentru "<?php echo get_search_query(); ?>"
                </h1>
                
                <p style="font-size: 1.1rem; color: var(--text-secondary); margin-bottom: 2rem;">
                    Ne pare rău, dar nu am găsit niciun articol care să corespundă căutării tale. 
                    Încearcă cu alte cuvinte cheie sau explorează categoriile noastre.
                </p>
            <?php endif; ?>
            
            <!-- Formularul de căutare îmbunătățit -->
            <div style="max-width: 500px; margin: 0 auto;">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" style="display: flex; gap: 0.5rem; position: relative;">
                    <div style="position: relative; flex: 1;">
                        <input type="search" 
                               name="s" 
                               value="<?php echo get_search_query(); ?>" 
                               placeholder="Caută articole despre Bitcoin, exchange-uri, ghiduri..." 
                               style="width: 100%; padding: 1rem 1rem 1rem 3rem; border: 2px solid var(--border-light); border-radius: 25px; font-size: 1rem; outline: none; transition: border-color 0.3s ease;"
                               onfocus="this.style.borderColor='var(--bitcoin-orange)'"
                               onblur="this.style.borderColor='var(--border-light)'">
                        <span style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--text-secondary); font-size: 1.2rem;">🔍</span>
                    </div>
                    <button type="submit" 
                            style="background: var(--bitcoin-orange); color: white; border: none; padding: 1rem 1.5rem; border-radius: 25px; cursor: pointer; font-weight: 600; transition: all 0.3s ease; white-space: nowrap;">
                        Caută din nou
                    </button>
                </form>
            </div>
            
            <!-- Sugestii de căutare populare -->
            <div style="margin-top: 2rem;">
                <p style="color: var(--text-secondary); margin-bottom: 1rem; font-size: 0.9rem;">
                    Căutări populare:
                </p>
                <div style="display: flex; justify-content: center; gap: 0.5rem; flex-wrap: wrap;">
                    <?php
                    $popular_searches = array(
                        'bitcoin romania', 'binance', 'coinbase', 'cum cumpăr bitcoin', 
                        'exchange sigur', 'wallet bitcoin', 'comisioane bitcoin', 'taxe crypto'
                    );
                    foreach ($popular_searches as $search_term) : ?>
                        <a href="<?php echo esc_url(home_url('/?s=' . urlencode($search_term))); ?>" 
                           style="background: rgba(247, 147, 26, 0.1); color: var(--bitcoin-orange); padding: 0.5rem 1rem; border-radius: 20px; text-decoration: none; font-size: 0.9rem; border: 1px solid rgba(247, 147, 26, 0.3); transition: all 0.3s ease;">
                            <?php echo esc_html($search_term); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            
        </header>

        <!-- Breadcrumbs -->
        <nav class="breadcrumbs" aria-label="Breadcrumb" style="margin-bottom: 2rem;">
            <ol style="display: flex; gap: 0.5rem; font-size: 0.9rem; color: var(--text-secondary);">
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Acasă</a></li>
                <li>›</li>
                <li aria-current="page">Căutare: "<?php echo esc_html(get_search_query()); ?>"</li>
            </ol>
        </nav>

        <?php if (have_posts()) : ?>
            
            <!-- Filtere pentru rezultate -->
            <div class="search-filters" style="background: var(--white); padding: 1.5rem; border-radius: 10px; box-shadow: var(--shadow); margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                
                <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                    <span style="color: var(--text-secondary); font-weight: 500;">Sortează:</span>
                    <select onchange="window.location.href=this.value" style="padding: 0.5rem; border: 1px solid var(--border-light); border-radius: 5px; background: white;">
                        <option value="<?php echo esc_url(add_query_arg(array('orderby' => 'relevance', 's' => get_search_query()))); ?>">
                            Relevantă
                        </option>
                        <option value="<?php echo esc_url(add_query_arg(array('orderby' => 'date', 's' => get_search_query()))); ?>" <?php selected(get_query_var('orderby'), 'date'); ?>>
                            Cea mai recentă
                        </option>
                        <option value="<?php echo esc_url(add_query_arg(array('orderby' => 'title', 's' => get_search_query()))); ?>" <?php selected(get_query_var('orderby'), 'title'); ?>>
                            Alfabetic
                        </option>
                    </select>
                </div>
                
                <div style="color: var(--text-secondary); font-size: 0.9rem;">
                    Rezultatele <?php echo ($wp_query->query_vars['paged'] ? (($wp_query->query_vars['paged'] - 1) * get_option('posts_per_page') + 1) : 1); ?>-<?php echo min($wp_query->found_posts, ($wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1) * get_option('posts_per_page')); ?> din <?php echo $wp_query->found_posts; ?>
                </div>
                
            </div>

            <!-- Rezultatele căutării -->
            <div class="search-results">
                
                <?php while (have_posts()) : the_post(); ?>
                    
                    <article class="search-result-item" style="background: var(--white); border-radius: 15px; box-shadow: var(--shadow); padding: 2rem; margin-bottom: 2rem; transition: all 0.3s ease; border-left: 4px solid var(--bitcoin-orange);">
                        
                        <div style="display: flex; gap: 2rem; align-items: flex-start;">
                            
                            <!-- Thumbnail -->
                            <?php if (has_post_thumbnail()) : ?>
                                <div style="flex-shrink: 0; width: 120px; height: 120px; overflow: hidden; border-radius: 10px;">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', array(
                                            'alt' => get_the_title(),
                                            'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;'
                                        )); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Conținut -->
                            <div style="flex: 1;">
                                
                                <!-- Categoria și tipul postării -->
                                <div style="display: flex; gap: 1rem; align-items: center; margin-bottom: 1rem; flex-wrap: wrap;">
                                    <?php 
                                    $categories = get_the_category();
                                    if ($categories) : ?>
                                        <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" 
                                           style="background: var(--bitcoin-orange); color: white; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.8rem; font-weight: 600; text-decoration: none; text-transform: uppercase;">
                                            <?php echo esc_html($categories[0]->name); ?>
                                        </a>
                                    <?php endif; ?>
                                    
                                    <span style="background: var(--light-bg); color: var(--text-secondary); padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.8rem;">
                                        <?php echo get_post_type() === 'page' ? '📄 Pagină' : '📰 Articol'; ?>
                                    </span>
                                </div>
                                
                                <!-- Titlul -->
                                <h2 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 0.5rem; line-height: 1.4;">
                                    <a href="<?php the_permalink(); ?>" style="color: var(--text-primary); text-decoration: none; transition: color 0.3s ease;">
                                        <?php 
                                        // Evidențiază termenii căutați în titlu
                                        $title = get_the_title();
                                        $search_query = get_search_query();
                                        if ($search_query) {
                                            $title = preg_replace('/(' . preg_quote($search_query, '/') . ')/i', '<mark style="background: var(--bitcoin-orange); color: white; padding: 0.2rem 0.4rem; border-radius: 3px;">$1</mark>', $title);
                                        }
                                        echo $title;
                                        ?>
                                    </a>
                                </h2>
                                
                                <!-- Meta informații -->
                                <div style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 1rem; display: flex; gap: 1.5rem; flex-wrap: wrap;">
                                    <time datetime="<?php echo get_the_date('c'); ?>" style="display: flex; align-items: center; gap: 0.3rem;">
                                        📅 <?php echo get_the_date('j M Y'); ?>
                                    </time>
                                    
                                    <div style="display: flex; align-items: center; gap: 0.3rem;">
                                        👤 <?php the_author(); ?>
                                    </div>
                                    
                                    <?php if (get_comments_number()) : ?>
                                        <div style="display: flex; align-items: center; gap: 0.3rem;">
                                            💬 <?php comments_number('0 comentarii', '1 comentariu', '% comentarii'); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div style="display: flex; align-items: center; gap: 0.3rem;">
                                        ⏱️ <?php echo bitcoinul_ro_reading_time(); ?> min citire
                                    </div>
                                </div>
                                
                                <!-- Excerpt cu highlight -->
                                <div style="color: var(--text-secondary); line-height: 1.6; margin-bottom: 1rem; font-size: 1rem;">
                                    <?php 
                                    $excerpt = get_the_excerpt();
                                    $search_query = get_search_query();
                                    if ($search_query && $excerpt) {
                                        $excerpt = preg_replace('/(' . preg_quote($search_query, '/') . ')/i', '<mark style="background: var(--bitcoin-orange); color: white; padding: 0.2rem 0.4rem; border-radius: 3px;">$1</mark>', $excerpt);
                                    }
                                    echo wp_trim_words($excerpt, 30, '...');
                                    ?>
                                </div>
                                
                                <!-- Link către articol -->
                                <a href="<?php the_permalink(); ?>" 
                                   style="color: var(--bitcoin-orange); text-decoration: none; font-weight: 600; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px; display: inline-flex; align-items: center; gap: 0.5rem;">
                                    Citește mai mult <span style="transition: transform 0.3s ease;">→</span>
                                </a>
                                
                            </div>
                        </div>
                        
                    </article>
                    
                <?php endwhile; ?>
                
            </div>

            <!-- Paginare -->
            <div class="pagination-container" style="margin-top: 3rem; text-align: center;">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '← Anterioare',
                    'next_text' => 'Următoare →',
                    'before_page_number' => '<span class="sr-only">Pagina </span>',
                ));
                ?>
            </div>

        <?php else : ?>
            
            <!-- Când nu sunt rezultate -->
            <div class="no-search-results" style="text-align: center; padding: 3rem 2rem; background: var(--light-bg); border-radius: 15px; margin-bottom: 3rem;">
                
                <div style="font-size: 4rem; margin-bottom: 1rem;">🤷‍♂️</div>
                
                <h2 style="color: var(--text-primary); margin-bottom: 1rem; font-size: 2rem;">
                    Niciun rezultat găsit
                </h2>
                
                <p style="color: var(--text-secondary); margin-bottom: 2rem; font-size: 1.1rem; line-height: 1.6;">
                    Nu ne descurajăm! Iată câteva sugestii pentru a găsi informațiile despre Bitcoin pe care le cauți:
                </p>
                
                <!-- Sugestii pentru căutări mai bune -->
                <div style="background: white; padding: 2rem; border-radius: 10px; margin: 2rem 0; text-align: left;">
                    <h3 style="color: var(--bitcoin-orange); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                        💡 Sfaturi pentru căutare mai bună:
                    </h3>
                    
                    <ul style="color: var(--text-secondary); line-height: 1.8; list-style: none; padding: 0;">
                        <li style="margin-bottom: 0.5rem; display: flex; align-items: flex-start; gap: 0.5rem;">
                            ✓ <span>Încearcă cuvinte mai simple: "bitcoin", "exchange", "cumpăr"</span>
                        </li>
                        <li style="margin-bottom: 0.5rem; display: flex; align-items: flex-start; gap: 0.5rem;">
                            ✓ <span>Verifică ortografia cuvintelor căutate</span>
                        </li>
                        <li style="margin-bottom: 0.5rem; display: flex; align-items: flex-start; gap: 0.5rem;">
                            ✓ <span>Folosește sinonime: "platformă" în loc de "exchange"</span>
                        </li>
                        <li style="margin-bottom: 0.5rem; display: flex; align-items: flex-start; gap: 0.5rem;">
                            ✓ <span>Caută termeni mai generali, apoi filtrează rezultatele</span>
                        </li>
                    </ul>
                </div>
                
            </div>

        <?php endif; ?>

        <!-- Sugestii de conținut relevant -->
        <div class="search-suggestions" style="margin-top: 3rem;">
            <h2 style="text-align: center; color: var(--text-primary); margin-bottom: 2rem; font-size: 2rem;">
                📚 Poate te interesează:
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                
                <!-- Ghiduri populare -->
                <div style="background: linear-gradient(135deg, var(--success-green), #1abc9c); color: white; padding: 2rem; border-radius: 15px; text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">📖</div>
                    <h3 style="margin-bottom: 1rem;">Ghiduri Bitcoin</h3>
                    <p style="margin-bottom: 1.5rem; opacity: 0.9; line-height: 1.6;">
                        Învață pas cu pas cum să investești în Bitcoin în siguranță
                    </p>
                    <a href="<?php echo esc_url(home_url('/ghid-bitcoin-incepatori/')); ?>" 
                       style="display: inline-block; background: white; color: var(--success-green); padding: 0.8rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 600;">
                        Citește ghidurile
                    </a>
                </div>

                <!-- Exchange-uri -->
                <div style="background: linear-gradient(135deg, var(--bitcoin-orange), var(--bitcoin-dark)); color: white; padding: 2rem; border-radius: 15px; text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">💱</div>
                    <h3 style="margin-bottom: 1rem;">Exchange-uri recomandate</h3>
                    <p style="margin-bottom: 1.5rem; opacity: 0.9; line-height: 1.6;">
                        Platformele cele mai sigure pentru cumpărarea Bitcoin în România
                    </p>
                    <a href="<?php echo esc_url(home_url('/#exchange-uri-bitcoin')); ?>" 
                       style="display: inline-block; background: white; color: var(--bitcoin-orange); padding: 0.8rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 600;">
                        Vezi exchange-urile
                    </a>
                </div>

                <!-- Știri Bitcoin -->
                <div style="background: linear-gradient(135deg, var(--text-primary), #34495e); color: white; padding: 2rem; border-radius: 15px; text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">📰</div>
                    <h3 style="margin-bottom: 1rem;">Știri Bitcoin</h3>
                    <p style="margin-bottom: 1.5rem; opacity: 0.9; line-height: 1.6;">
                        Cele mai importante evenimente din lumea criptomonedelor
                    </p>
                    <a href="<?php echo esc_url(home_url('/stiri/')); ?>" 
                       style="display: inline-block; background: white; color: var(--text-primary); padding: 0.8rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 600;">
                        Citește știrile
                    </a>
                </div>

            </div>
        </div>

    </div>
</main>

<!-- JavaScript pentru funcționalități -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Hover effects pentru rezultatele căutării
    document.querySelectorAll('.search-result-item').forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = 'var(--shadow-hover)';
            
            const arrow = this.querySelector('a span');
            if (arrow) {
                arrow.style.transform = 'translateX(5px)';
            }
            
            const thumbnail = this.querySelector('img');
            if (thumbnail) {
                thumbnail.style.transform = 'scale(1.05)';
            }
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'var(--shadow)';
            
            const arrow = this.querySelector('a span');
            if (arrow) {
                arrow.style.transform = 'translateX(0)';
            }
            
            const thumbnail = this.querySelector('img');
            if (thumbnail) {
                thumbnail.style.transform = 'scale(1)';
            }
        });
    });

    // Hover effects pentru sugestiile de căutare
    document.querySelectorAll('.search-header a, .search-suggestions a').forEach(link => {
        if (link.style.background === 'rgba(247, 147, 26, 0.1)') {
            link.addEventListener('mouseenter', function() {
                this.style.background = 'var(--bitcoin-orange)';
                this.style.color = 'white';
            });
            
            link.addEventListener('mouseleave', function() {
                this.style.background = 'rgba(247, 147, 26, 0.1)';
                this.style.color = 'var(--bitcoin-orange)';
            });
        }
    });

    // Focus pe câmpul de căutare
    const searchInput = document.querySelector('input[type="search"]');
    if (searchInput) {
        // Focus doar dacă nu am rezultate sau utilizatorul a venit direct pe pagina de căutare
        <?php if (!have_posts()) : ?>
            setTimeout(() => {
                searchInput.focus();
                searchInput.select();
            }, 300);
        <?php endif; ?>
    }

    // Tracking pentru căutări (Google Analytics)
    if (typeof gtag !== 'undefined') {
        gtag('event', 'search', {
            'search_term': '<?php echo esc_js(get_search_query()); ?>',
            'results_count': <?php echo $wp_query->found_posts; ?>,
            'custom_parameters': {
                'search_type': 'site_search',
                'has_results': <?php echo have_posts() ? 'true' : 'false'; ?>
            }
        });
    }
});

// Funcție pentru autocompletare căutare (opțional - se poate extinde)
function setupSearchAutocomplete() {
    const searchInput = document.querySelector('input[type="search"]');
    if (!searchInput) return;
    
    const suggestions = [
        'bitcoin romania', 'binance romania', 'coinbase', 'cum cumpăr bitcoin',
        'exchange sigur', 'wallet bitcoin', 'comisioane bitcoin', 'taxe crypto',
        'ethereum', 'blockchain', 'mining bitcoin', 'investiții crypto'
    ];
    
    // Implementarea poate fi extinsă pentru a afișa sugestii în timp real
}
</script>

<!-- CSS responsive pentru căutare -->
<style>
@media (max-width: 768px) {
    .search-header {
        padding: 2rem 1rem !important;
    }
    
    .search-header h1 {
        font-size: 2rem !important;
    }
    
    .search-header form {
        flex-direction: column !important;
        gap: 1rem !important;
    }
    
    .search-header button {
        width: 100%;
    }
    
    .search-filters {
        flex-direction: column !important;
        text-align: center;
    }
    
    .search-result-item > div {
        flex-direction: column !important;
        text-align: center;
    }
    
    .search-result-item img {
        width: 150px !important;
        height: 150px !important;
        margin: 0 auto;
    }
    
    .search-suggestions > div {
        grid-template-columns: 1fr !important;
    }
}

@media (max-width: 480px) {
    .search-header > div:last-child {
        flex-wrap: wrap;
        gap: 0.3rem !important;
    }
    
    .search-result-item {
        padding: 1.5rem !important;
    }
    
    .search-result-item h2 {
        font-size: 1.3rem !important;
    }
    
    .no-search-results {
        padding: 2rem 1rem !important;
    }
}

/* Stiluri pentru highlight-urile din căutare */
mark {
    background: var(--bitcoin-orange) !important;
    color: white !important;
    padding: 0.2rem 0.4rem !important;
    border-radius: 3px !important;
    font-weight: 600 !important;
}

/* Animații pentru rezultatele căutării */
.search-result-item {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<?php get_footer(); ?>

<?php
// Funcție helper pentru timpul de citire (pentru cazul când nu e definită în functions.php)
if (!function_exists('bitcoinul_ro_reading_time')) {
    function bitcoinul_ro_reading_time() {
        $content = get_post_field('post_content', get_the_ID());
        $word_count = str_word_count(strip_tags($content));
        $reading_time = ceil($word_count / 200); // 200 cuvinte pe minut
        return max(1, $reading_time);
    }
}
?>