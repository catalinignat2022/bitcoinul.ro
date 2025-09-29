<?php
/**
 * Template pentru pagina 404 - Pagina nu a fost găsită
 * Optimizat pentru a redirecționa utilizatorii către conținut relevant
 */

get_header(); ?>

<main class="site-content">
    <div class="container">
        
        <!-- Header 404 -->
        <div class="error-404-header" style="text-align: center; padding: 4rem 2rem; background: linear-gradient(135deg, var(--light-bg), #ffffff); border-radius: 15px; margin-bottom: 3rem; border: 2px solid var(--warning-red);">
            
            <div style="font-size: 6rem; margin-bottom: 1rem; color: var(--warning-red);">🔍</div>
            
            <h1 style="font-size: 3rem; color: var(--text-primary); margin-bottom: 1rem; font-weight: 700;">
                404 - Pagina nu a fost găsită
            </h1>
            
            <p style="font-size: 1.2rem; color: var(--text-secondary); max-width: 600px; margin: 0 auto 2rem; line-height: 1.6;">
                Ne pare rău, dar pagina pe care o căutați nu există sau a fost mutată. 
                Poate linkul este incorect sau pagina a fost ștearsă.
            </p>
            
            <!-- Caută în site -->
            <div style="max-width: 400px; margin: 0 auto;">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" style="display: flex; gap: 0.5rem;">
                    <input type="search" 
                           name="s" 
                           value="<?php echo get_search_query(); ?>" 
                           placeholder="Caută pe bitcoinul.ro..." 
                           style="flex: 1; padding: 1rem; border: 2px solid var(--border-light); border-radius: 25px; font-size: 1rem; outline: none; transition: border-color 0.3s ease;"
                           onfocus="this.style.borderColor='var(--bitcoin-orange)'"
                           onblur="this.style.borderColor='var(--border-light)'">
                    <button type="submit" 
                            style="background: var(--bitcoin-orange); color: white; border: none; padding: 1rem 1.5rem; border-radius: 25px; cursor: pointer; font-weight: 600; transition: all 0.3s ease;">
                        🔍
                    </button>
                </form>
            </div>
            
        </div>

        <!-- Acțiuni rapide -->
        <div class="quick-actions" style="margin-bottom: 3rem;">
            <h2 style="text-align: center; color: var(--text-primary); margin-bottom: 2rem; font-size: 2rem;">
                Ce poți face în schimb:
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                
                <!-- Acțiune 1: Pagina principală -->
                <div style="background: var(--white); padding: 2rem; border-radius: 15px; box-shadow: var(--shadow); text-align: center; transition: all 0.3s ease; border: 1px solid var(--border-light);">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🏠</div>
                    <h3 style="color: var(--text-primary); margin-bottom: 1rem;">Pagina principală</h3>
                    <p style="color: var(--text-secondary); margin-bottom: 1.5rem; line-height: 1.6;">
                        Începe de la început și descoperă cele mai bune exchange-uri Bitcoin.
                    </p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" 
                       style="display: inline-block; background: var(--bitcoin-orange); color: white; padding: 0.8rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                        Mergi acasă
                    </a>
                </div>

                <!-- Acțiune 2: Exchange-uri -->
                <div style="background: var(--white); padding: 2rem; border-radius: 15px; box-shadow: var(--shadow); text-align: center; transition: all 0.3s ease; border: 1px solid var(--border-light);">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">💱</div>
                    <h3 style="color: var(--text-primary); margin-bottom: 1rem;">Exchange-uri Bitcoin</h3>
                    <p style="color: var(--text-secondary); margin-bottom: 1.5rem; line-height: 1.6;">
                        Vezi comparația completă a platformelor de tranzacționare.
                    </p>
                    <a href="<?php echo esc_url(home_url('/#exchange-uri-bitcoin')); ?>" 
                       style="display: inline-block; background: var(--success-green); color: white; padding: 0.8rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                        Vezi Exchange-urile
                    </a>
                </div>

                <!-- Acțiune 3: Ghiduri -->
                <div style="background: var(--white); padding: 2rem; border-radius: 15px; box-shadow: var(--shadow); text-align: center; transition: all 0.3s ease; border: 1px solid var(--border-light);">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">📖</div>
                    <h3 style="color: var(--text-primary); margin-bottom: 1rem;">Ghiduri Bitcoin</h3>
                    <p style="color: var(--text-secondary); margin-bottom: 1.5rem; line-height: 1.6;">
                        Învață cum să investești în Bitcoin pas cu pas.
                    </p>
                    <a href="<?php echo esc_url(home_url('/ghid-bitcoin-incepatori/')); ?>" 
                       style="display: inline-block; background: var(--bitcoin-dark); color: white; padding: 0.8rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                        Citește ghidurile
                    </a>
                </div>

            </div>
        </div>

        <!-- Conținut popular -->
        <div class="popular-content" style="margin-bottom: 3rem;">
            <h2 style="text-align: center; color: var(--text-primary); margin-bottom: 2rem; font-size: 2rem;">
                📈 Conținut popular pe bitcoinul.ro
            </h2>
            
            <?php
            // Obține articolele cele mai populare (după numărul de comentarii și vizualizări)
            $popular_posts = get_posts(array(
                'numberposts' => 6,
                'orderby' => 'comment_count',
                'order' => 'DESC',
                'post_status' => 'publish'
            ));
            
            if ($popular_posts) : ?>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                    
                    <?php foreach ($popular_posts as $post) : 
                        setup_postdata($post); ?>
                        
                        <article style="background: var(--white); border-radius: 15px; box-shadow: var(--shadow); overflow: hidden; transition: all 0.3s ease; border: 1px solid var(--border-light);">
                            
                            <?php if (has_post_thumbnail()) : ?>
                                <div style="height: 150px; overflow: hidden;">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('article-thumbnail', array(
                                            'alt' => get_the_title(),
                                            'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;'
                                        )); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div style="padding: 1.5rem;">
                                
                                <?php 
                                $categories = get_the_category();
                                if ($categories) : ?>
                                    <span style="display: inline-block; background: var(--bitcoin-orange); color: white; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.8rem; font-weight: 600; margin-bottom: 1rem;">
                                        <?php echo esc_html($categories[0]->name); ?>
                                    </span>
                                <?php endif; ?>
                                
                                <h3 style="font-size: 1.2rem; font-weight: 600; margin-bottom: 0.5rem; line-height: 1.4;">
                                    <a href="<?php the_permalink(); ?>" style="color: var(--text-primary); text-decoration: none;">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                
                                <div style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 1rem;">
                                    📅 <?php echo get_the_date('j M Y'); ?>
                                    <?php if (get_comments_number()) : ?>
                                        • 💬 <?php comments_number('0', '1', '%'); ?>
                                    <?php endif; ?>
                                </div>
                                
                                <p style="color: var(--text-secondary); line-height: 1.6; margin-bottom: 1rem; font-size: 0.95rem;">
                                    <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                                </p>
                                
                                <a href="<?php the_permalink(); ?>" 
                                   style="color: var(--bitcoin-orange); text-decoration: none; font-weight: 600; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                                    Citește mai mult <span style="transition: transform 0.3s ease;">→</span>
                                </a>
                            </div>
                        </article>
                        
                    <?php endforeach; 
                    wp_reset_postdata(); ?>
                    
                </div>
            <?php endif; ?>
        </div>

        <!-- Categorii populare -->
        <div class="popular-categories" style="margin-bottom: 3rem;">
            <h2 style="text-align: center; color: var(--text-primary); margin-bottom: 2rem; font-size: 2rem;">
                🗂️ Explorează categoriile noastre
            </h2>
            
            <?php
            $categories = get_categories(array(
                'orderby' => 'count',
                'order' => 'DESC',
                'number' => 8,
                'hide_empty' => true
            ));
            
            if ($categories) : ?>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center;">
                    <?php foreach ($categories as $category) : ?>
                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                           style="background: linear-gradient(135deg, var(--light-bg), #ffffff); color: var(--text-primary); padding: 1rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 500; border: 2px solid var(--border-light); transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 0.5rem;">
                            📂 <?php echo esc_html($category->name); ?>
                            <span style="background: var(--bitcoin-orange); color: white; padding: 0.2rem 0.6rem; border-radius: 10px; font-size: 0.8rem;">
                                <?php echo $category->count; ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Contact și suport -->
        <div class="error-contact" style="background: linear-gradient(135deg, var(--dark-bg), #2c3e50); color: white; padding: 3rem 2rem; border-radius: 15px; text-align: center;">
            <h2 style="color: var(--bitcoin-orange); margin-bottom: 1rem; font-size: 2rem;">
                🤝 Ai nevoie de ajutor?
            </h2>
            
            <p style="font-size: 1.1rem; margin-bottom: 2rem; opacity: 0.9; line-height: 1.6;">
                Dacă nu găsești ce cauți sau ai întrebări despre Bitcoin și investiții, 
                nu ezita să ne contactezi. Echipa noastră este aici să te ajute!
            </p>
            
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" 
                   style="background: var(--bitcoin-orange); color: white; padding: 1rem 2rem; border-radius: 25px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                    📧 Contactează-ne
                </a>
                
                <a href="https://t.me/bitcoinulro" 
                   target="_blank" 
                   rel="noopener"
                   style="background: transparent; color: white; padding: 1rem 2rem; border-radius: 25px; text-decoration: none; font-weight: 600; border: 2px solid white; transition: all 0.3s ease;">
                    ✈️ Telegram
                </a>
            </div>
        </div>

        <!-- Informații tehnice pentru debug (doar pentru administratori) -->
        <?php if (current_user_can('manage_options')) : ?>
            <div style="margin-top: 2rem; padding: 1rem; background: #f8f9fa; border-radius: 10px; border-left: 4px solid #6c757d; font-family: monospace; font-size: 0.9rem;">
                <strong>Debug info (doar pentru administratori):</strong><br>
                URL solicitat: <?php echo esc_html($_SERVER['REQUEST_URI']); ?><br>
                Referrer: <?php echo esc_html($_SERVER['HTTP_REFERER'] ?? 'Direct access'); ?><br>
                User Agent: <?php echo esc_html(substr($_SERVER['HTTP_USER_AGENT'], 0, 100)) . '...'; ?><br>
                Timestamp: <?php echo date('Y-m-d H:i:s'); ?>
            </div>
        <?php endif; ?>

    </div>
</main>

<!-- JavaScript pentru funcționalități -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hover effects pentru cardurile de acțiuni
    document.querySelectorAll('.quick-actions > div > div, .popular-content article').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = 'var(--shadow-hover)';
            
            const arrow = this.querySelector('a span');
            if (arrow) {
                arrow.style.transform = 'translateX(5px)';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'var(--shadow)';
            
            const arrow = this.querySelector('a span');
            if (arrow) {
                arrow.style.transform = 'translateX(0)';
            }
        });
    });

    // Hover effects pentru categorii
    document.querySelectorAll('.popular-categories a').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.borderColor = 'var(--bitcoin-orange)';
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = 'var(--shadow)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.borderColor = 'var(--border-light)';
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // Hover effects pentru butoanele de contact
    document.querySelectorAll('.error-contact a').forEach(button => {
        button.addEventListener('mouseenter', function() {
            if (this.style.background === 'transparent') {
                this.style.background = 'rgba(255,255,255,0.1)';
            } else {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 8px 25px rgba(0,0,0,0.3)';
            }
        });
        
        button.addEventListener('mouseleave', function() {
            if (this.style.color === 'white' && this.style.background !== 'rgb(247, 147, 26)') {
                this.style.background = 'transparent';
            } else {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'none';
            }
        });
    });

    // Tracking pentru 404 (pentru Google Analytics)
    if (typeof gtag !== 'undefined') {
        gtag('event', 'page_view', {
            'page_title': '404 Error',
            'page_location': window.location.href,
            'custom_parameters': {
                'error_type': '404',
                'referrer': document.referrer
            }
        });
    }

    // Focus pe câmpul de căutare pentru UX mai bun
    const searchInput = document.querySelector('input[type="search"]');
    if (searchInput) {
        setTimeout(() => {
            searchInput.focus();
        }, 500);
    }
});

// Animație pentru emoji-ul din header
const errorEmoji = document.querySelector('.error-404-header > div');
if (errorEmoji) {
    setInterval(() => {
        errorEmoji.style.transform = 'scale(1.1)';
        setTimeout(() => {
            errorEmoji.style.transform = 'scale(1)';
        }, 200);
    }, 3000);
}
</script>

<!-- CSS responsive pentru 404 -->
<style>
@media (max-width: 768px) {
    .error-404-header {
        padding: 3rem 1rem !important;
    }
    
    .error-404-header h1 {
        font-size: 2.2rem !important;
    }
    
    .quick-actions > div {
        grid-template-columns: 1fr !important;
    }
    
    .popular-content > div {
        grid-template-columns: 1fr !important;
    }
    
    .popular-categories > div {
        justify-content: center;
    }
    
    .error-contact {
        padding: 2rem 1rem !important;
    }
    
    .error-contact > div {
        flex-direction: column !important;
    }
}

@media (max-width: 480px) {
    .error-404-header > div {
        font-size: 4rem !important;
    }
    
    .error-404-header h1 {
        font-size: 1.8rem !important;
    }
    
    .error-404-header form {
        flex-direction: column !important;
    }
    
    .error-404-header button {
        width: 100%;
        margin-top: 0.5rem;
    }
}
</style>

<?php get_footer(); ?>