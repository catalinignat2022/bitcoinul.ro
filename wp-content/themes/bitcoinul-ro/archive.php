<?php
/**
 * Template pentru arhive (categorii, tag-uri, autor, etc.)
 * Optimizat pentru SEO și navigare
 */

get_header(); ?>

<main class="site-content">
    <div class="container">
        
        <!-- Header arhivă cu SEO optimizat -->
        <header class="archive-header" style="text-align: center; padding: 3rem 0; background: linear-gradient(135deg, var(--light-bg), #ffffff); border-radius: 15px; margin-bottom: 3rem; border: 2px solid var(--bitcoin-orange);">
            
            <?php if (is_category()) : ?>
                <div style="display: inline-block; background: var(--bitcoin-orange); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.9rem; font-weight: 600; margin-bottom: 1rem;">
                    📂 CATEGORIE
                </div>
                <h1 style="font-size: 2.5rem; color: var(--text-primary); margin-bottom: 1rem;">
                    <?php single_cat_title(); ?>
                </h1>
                <?php if (category_description()) : ?>
                    <div style="font-size: 1.1rem; color: var(--text-secondary); max-width: 600px; margin: 0 auto;">
                        <?php echo category_description(); ?>
                    </div>
                <?php else : ?>
                    <p style="font-size: 1.1rem; color: var(--text-secondary);">
                        Toate articolele din categoria <strong><?php single_cat_title(); ?></strong> - 
                        Informații actualizate despre Bitcoin și criptomonede în România.
                    </p>
                <?php endif; ?>
                
            <?php elseif (is_tag()) : ?>
                <div style="display: inline-block; background: var(--success-green); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.9rem; font-weight: 600; margin-bottom: 1rem;">
                    🏷️ TAG
                </div>
                <h1 style="font-size: 2.5rem; color: var(--text-primary); margin-bottom: 1rem;">
                    #<?php single_tag_title(); ?>
                </h1>
                <?php if (tag_description()) : ?>
                    <div style="font-size: 1.1rem; color: var(--text-secondary); max-width: 600px; margin: 0 auto;">
                        <?php echo tag_description(); ?>
                    </div>
                <?php else : ?>
                    <p style="font-size: 1.1rem; color: var(--text-secondary);">
                        Articole etichetate cu <strong><?php single_tag_title(); ?></strong> - 
                        Ghiduri și resurse despre Bitcoin și investiții crypto.
                    </p>
                <?php endif; ?>
                
            <?php elseif (is_author()) : ?>
                <div style="display: inline-block; background: var(--bitcoin-dark); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.9rem; font-weight: 600; margin-bottom: 1rem;">
                    👤 AUTOR
                </div>
                <h1 style="font-size: 2.5rem; color: var(--text-primary); margin-bottom: 1rem;">
                    Articole de <?php the_author(); ?>
                </h1>
                <?php if (get_the_author_meta('description')) : ?>
                    <div style="font-size: 1.1rem; color: var(--text-secondary); max-width: 600px; margin: 0 auto;">
                        <?php echo get_the_author_meta('description'); ?>
                    </div>
                <?php else : ?>
                    <p style="font-size: 1.1rem; color: var(--text-secondary);">
                        Toate articolele scrise de <strong><?php the_author(); ?></strong> - 
                        Expert în Bitcoin și criptomonede România.
                    </p>
                <?php endif; ?>
                
            <?php elseif (is_date()) : ?>
                <div style="display: inline-block; background: var(--text-secondary); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.9rem; font-weight: 600; margin-bottom: 1rem;">
                    📅 ARHIVĂ
                </div>
                <h1 style="font-size: 2.5rem; color: var(--text-primary); margin-bottom: 1rem;">
                    <?php
                    if (is_year()) {
                        echo 'Articole din ' . get_the_date('Y');
                    } elseif (is_month()) {
                        echo 'Articole din ' . get_the_date('F Y');
                    } elseif (is_day()) {
                        echo 'Articole din ' . get_the_date('j F Y');
                    }
                    ?>
                </h1>
                <p style="font-size: 1.1rem; color: var(--text-secondary);">
                    Arhiva articolelor despre Bitcoin și criptomonede din această perioadă.
                </p>
                
            <?php else : ?>
                <div style="display: inline-block; background: var(--text-primary); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.9rem; font-weight: 600; margin-bottom: 1rem;">
                    📚 ARHIVĂ
                </div>
                <h1 style="font-size: 2.5rem; color: var(--text-primary); margin-bottom: 1rem;">
                    <?php the_archive_title(); ?>
                </h1>
                <?php if (get_the_archive_description()) : ?>
                    <div style="font-size: 1.1rem; color: var(--text-secondary); max-width: 600px; margin: 0 auto;">
                        <?php the_archive_description(); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Statistici arhivă -->
            <div style="margin-top: 2rem; display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap; font-size: 0.9rem; color: var(--text-secondary);">
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    📊 <?php echo $wp_query->found_posts; ?> articole găsite
                </div>
                <?php if (is_category()) : 
                    $category = get_queried_object();
                    ?>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        🆔 ID categorie: <?php echo $category->term_id; ?>
                    </div>
                <?php endif; ?>
            </div>
            
        </header>

        <!-- Breadcrumbs pentru SEO -->
        <nav class="breadcrumbs" aria-label="Breadcrumb" style="margin-bottom: 2rem;">
            <ol style="display: flex; gap: 0.5rem; font-size: 0.9rem; color: var(--text-secondary);">
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Acasă</a></li>
                <li>›</li>
                <?php if (is_category()) : ?>
                    <li aria-current="page">Categoria: <?php single_cat_title(); ?></li>
                <?php elseif (is_tag()) : ?>
                    <li aria-current="page">Tag: <?php single_tag_title(); ?></li>
                <?php elseif (is_author()) : ?>
                    <li aria-current="page">Autor: <?php the_author(); ?></li>
                <?php elseif (is_date()) : ?>
                    <li aria-current="page">Arhivă: <?php echo get_the_date('F Y'); ?></li>
                <?php else : ?>
                    <li aria-current="page">Arhivă</li>
                <?php endif; ?>
            </ol>
        </nav>

        <!-- Filtere și sortare -->
        <div class="archive-filters" style="background: var(--white); padding: 1.5rem; border-radius: 10px; box-shadow: var(--shadow); margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
            
            <div class="filter-options" style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                <span style="color: var(--text-secondary); font-weight: 500;">Sortează după:</span>
                <select onchange="window.location.href=this.value" style="padding: 0.5rem; border: 1px solid var(--border-light); border-radius: 5px; background: white;">
                    <option value="<?php echo esc_url(add_query_arg('orderby', 'date')); ?>" <?php selected(get_query_var('orderby'), 'date'); ?>>
                        Cele mai recente
                    </option>
                    <option value="<?php echo esc_url(add_query_arg('orderby', 'title')); ?>" <?php selected(get_query_var('orderby'), 'title'); ?>>
                        Titlu A-Z
                    </option>
                    <option value="<?php echo esc_url(add_query_arg('orderby', 'comment_count')); ?>" <?php selected(get_query_var('orderby'), 'comment_count'); ?>>
                        Cele mai comentate
                    </option>
                </select>
            </div>
            
            <div class="view-options" style="display: flex; gap: 0.5rem;">
                <button onclick="toggleView('grid')" id="grid-view" class="view-btn active" style="padding: 0.5rem 1rem; border: 1px solid var(--bitcoin-orange); background: var(--bitcoin-orange); color: white; border-radius: 5px; cursor: pointer;">
                    ⊞ Grid
                </button>
                <button onclick="toggleView('list')" id="list-view" class="view-btn" style="padding: 0.5rem 1rem; border: 1px solid var(--bitcoin-orange); background: white; color: var(--bitcoin-orange); border-radius: 5px; cursor: pointer;">
                    ☰ Listă
                </button>
            </div>
            
        </div>

        <!-- Articolele din arhivă -->
        <?php if (have_posts()) : ?>
            <div class="articles-container" id="articles-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem;">
                
                <?php while (have_posts()) : the_post(); ?>
                    <article class="article-card fade-in-up" style="background: var(--white); border-radius: 15px; box-shadow: var(--shadow); overflow: hidden; transition: all 0.3s ease; opacity: 0; transform: translateY(30px);">
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="article-thumbnail" style="position: relative; height: 200px; overflow: hidden;">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php the_post_thumbnail('article-thumbnail', array('alt' => get_the_title(), 'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;')); ?>
                                </a>
                                
                                <!-- Badge pentru articole noi -->
                                <?php if (get_the_time('U') > (current_time('timestamp') - 7 * 24 * 60 * 60)) : ?>
                                    <span style="position: absolute; top: 10px; left: 10px; background: var(--bitcoin-orange); color: white; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">
                                        🆕 NOU
                                    </span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="article-content" style="padding: 1.5rem;">
                            
                            <?php 
                            $categories = get_the_category();
                            if ($categories) : ?>
                                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="article-category" style="display: inline-block; background-color: var(--bitcoin-orange); color: var(--white); padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.8rem; font-weight: 600; margin-bottom: 1rem; text-transform: uppercase; text-decoration: none;">
                                    <?php echo esc_html($categories[0]->name); ?>
                                </a>
                            <?php endif; ?>
                            
                            <h3 class="article-title" style="font-size: 1.3rem; font-weight: 600; margin-bottom: 0.5rem; line-height: 1.4;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--text-primary); text-decoration: none; transition: color 0.3s ease;" title="<?php the_title_attribute(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            
                            <div class="article-meta" style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 1rem; display: flex; gap: 1rem; flex-wrap: wrap;">
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
                            </div>
                            
                            <div class="article-excerpt" style="color: var(--text-secondary); line-height: 1.6; margin-bottom: 1rem;">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more" style="color: var(--bitcoin-orange); text-decoration: none; font-weight: 600; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px; display: inline-flex; align-items: center; gap: 0.5rem;" title="Citește: <?php the_title_attribute(); ?>">
                                Citește mai mult <span style="transition: transform 0.3s ease;">→</span>
                            </a>
                            
                        </div>
                    </article>
                <?php endwhile; ?>
                
            </div>

            <!-- Paginare -->
            <div class="pagination-container" style="margin-top: 3rem; text-align: center;">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '← Pagina anterioară',
                    'next_text' => 'Pagina următoare →',
                    'before_page_number' => '<span class="sr-only">Pagina </span>',
                ));
                ?>
            </div>

        <?php else : ?>
            
            <!-- Mesaj când nu sunt articole -->
            <div class="no-posts" style="text-align: center; padding: 4rem 2rem; background: var(--light-bg); border-radius: 15px;">
                <div style="font-size: 4rem; margin-bottom: 1rem;">😔</div>
                <h2 style="color: var(--text-primary); margin-bottom: 1rem;">
                    Nu am găsit articole în această arhivă
                </h2>
                <p style="color: var(--text-secondary); margin-bottom: 2rem; font-size: 1.1rem;">
                    Încearcă să cauți în alte categorii sau revino mai târziu pentru conținut nou.
                </p>
                
                <!-- Sugestii categorii -->
                <div style="margin-top: 2rem;">
                    <h3 style="color: var(--text-primary); margin-bottom: 1rem;">
                        Explorează alte categorii:
                    </h3>
                    <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                        <?php
                        $categories = get_categories(array('number' => 5, 'orderby' => 'count', 'order' => 'DESC'));
                        foreach ($categories as $category) :
                            if ($category->count > 0) :
                        ?>
                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                               style="background: var(--bitcoin-orange); color: white; padding: 0.8rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 500; transition: all 0.3s ease;">
                                <?php echo esc_html($category->name); ?> (<?php echo $category->count; ?>)
                            </a>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </div>
                </div>
                
                <div style="margin-top: 2rem;">
                    <a href="<?php echo esc_url(home_url('/')); ?>" 
                       style="display: inline-block; background: var(--success-green); color: white; padding: 1rem 2rem; border-radius: 25px; text-decoration: none; font-weight: 600;">
                        🏠 Înapoi la pagina principală
                    </a>
                </div>
            </div>

        <?php endif; ?>

        <!-- Widget exchange-uri la final -->
        <div class="archive-exchanges" style="margin-top: 4rem; background: linear-gradient(135deg, var(--light-bg), #ffffff); padding: 3rem 2rem; border-radius: 15px; text-align: center; border: 2px solid var(--bitcoin-orange);">
            <h3 style="color: var(--text-primary); margin-bottom: 1rem; font-size: 1.8rem;">
                🚀 Gata să începi investiția în Bitcoin?
            </h3>
            <p style="color: var(--text-secondary); margin-bottom: 2rem; font-size: 1.1rem;">
                Alege una din platformele recomandate și începe să cumperi Bitcoin astăzi
            </p>
            
            <?php echo do_shortcode('[exchanges_list limit="3" show_features="false"]'); ?>
            
            <div style="margin-top: 2rem;">
                <a href="<?php echo esc_url(home_url('/#exchange-uri-bitcoin')); ?>" 
                   style="display: inline-block; background: linear-gradient(135deg, var(--bitcoin-orange), var(--bitcoin-dark)); color: white; padding: 1rem 2rem; border-radius: 25px; text-decoration: none; font-weight: 600; box-shadow: var(--shadow);">
                    Vezi toate Exchange-urile →
                </a>
            </div>
        </div>

    </div>
</main>

<!-- JavaScript pentru funcționalități -->
<script>
// Animații fade-in pe scroll
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.article-card').forEach(card => {
        observer.observe(card);
    });
});

// Funcție pentru schimbarea view-ului (grid/listă)
function toggleView(viewType) {
    const articlesContainer = document.getElementById('articles-grid');
    const gridBtn = document.getElementById('grid-view');
    const listBtn = document.getElementById('list-view');
    
    if (viewType === 'list') {
        articlesContainer.style.gridTemplateColumns = '1fr';
        articlesContainer.style.gap = '1rem';
        
        // Stilizare pentru view listă
        const articles = articlesContainer.querySelectorAll('.article-card');
        articles.forEach(article => {
            article.style.display = 'flex';
            article.style.height = 'auto';
            
            const thumbnail = article.querySelector('.article-thumbnail');
            if (thumbnail) {
                thumbnail.style.width = '200px';
                thumbnail.style.height = '130px';
                thumbnail.style.flexShrink = '0';
            }
        });
        
        // Actualizează butoanele
        listBtn.classList.add('active');
        listBtn.style.background = 'var(--bitcoin-orange)';
        listBtn.style.color = 'white';
        gridBtn.classList.remove('active');
        gridBtn.style.background = 'white';
        gridBtn.style.color = 'var(--bitcoin-orange)';
        
    } else {
        articlesContainer.style.gridTemplateColumns = 'repeat(auto-fit, minmax(350px, 1fr))';
        articlesContainer.style.gap = '2rem';
        
        // Resetează stilurile pentru view grid
        const articles = articlesContainer.querySelectorAll('.article-card');
        articles.forEach(article => {
            article.style.display = 'block';
            article.style.height = 'auto';
            
            const thumbnail = article.querySelector('.article-thumbnail');
            if (thumbnail) {
                thumbnail.style.width = '100%';
                thumbnail.style.height = '200px';
                thumbnail.style.flexShrink = 'unset';
            }
        });
        
        // Actualizează butoanele
        gridBtn.classList.add('active');
        gridBtn.style.background = 'var(--bitcoin-orange)';
        gridBtn.style.color = 'white';
        listBtn.classList.remove('active');
        listBtn.style.background = 'white';
        listBtn.style.color = 'var(--bitcoin-orange)';
    }
    
    // Salvează preferința în localStorage
    localStorage.setItem('archiveView', viewType);
}

// Restaurează view-ul salvat
document.addEventListener('DOMContentLoaded', function() {
    const savedView = localStorage.getItem('archiveView');
    if (savedView === 'list') {
        toggleView('list');
    }
});

// Hover effects pentru carduri
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.article-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = 'var(--shadow-hover)';
            
            const readMoreArrow = this.querySelector('.read-more span');
            if (readMoreArrow) {
                readMoreArrow.style.transform = 'translateX(5px)';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'var(--shadow)';
            
            const readMoreArrow = this.querySelector('.read-more span');
            if (readMoreArrow) {
                readMoreArrow.style.transform = 'translateX(0)';
            }
        });
    });
});
</script>

<!-- CSS suplimentar pentru responsive -->
<style>
@media (max-width: 768px) {
    .archive-filters {
        flex-direction: column !important;
        text-align: center;
    }
    
    .filter-options, .view-options {
        justify-content: center;
    }
    
    #articles-grid {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }
    
    .archive-header {
        padding: 2rem 1rem !important;
    }
    
    .archive-header h1 {
        font-size: 2rem !important;
    }
}

@media (max-width: 480px) {
    .article-meta {
        flex-direction: column !important;
        gap: 0.5rem !important;
    }
    
    .breadcrumbs ol {
        flex-wrap: wrap;
    }
}
</style>

<?php get_footer(); ?>