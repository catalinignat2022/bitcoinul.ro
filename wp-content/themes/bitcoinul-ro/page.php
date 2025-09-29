<?php
/**
 * Template pentru paginile statice
 * Optimizat pentru conversion și SEO
 */

get_header(); ?>

<main class="site-content">
    <div class="container">
        
        <?php while (have_posts()) : the_post(); ?>
            
            <article id="page-<?php the_ID(); ?>" <?php post_class('static-page'); ?>>
                
                <!-- Breadcrumbs pentru SEO -->
                <nav class="breadcrumbs" aria-label="Breadcrumb" style="margin-bottom: 2rem;">
                    <ol style="display: flex; gap: 0.5rem; font-size: 0.9rem; color: var(--text-secondary);">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Acasă</a></li>
                        <li>›</li>
                        <?php
                        // Adaugă breadcrumb pentru pagina părinte dacă există
                        if ($post->post_parent) {
                            $parent = get_post($post->post_parent);
                            ?>
                            <li><a href="<?php echo esc_url(get_permalink($parent)); ?>"><?php echo esc_html($parent->post_title); ?></a></li>
                            <li>›</li>
                            <?php
                        }
                        ?>
                        <li aria-current="page"><?php the_title(); ?></li>
                    </ol>
                </nav>

                <!-- Header pagină -->
                <header class="page-header" style="text-align: center; padding: 3rem 0; background: linear-gradient(135deg, var(--light-bg), #ffffff); border-radius: 15px; margin-bottom: 3rem; border-left: 4px solid var(--bitcoin-orange);">
                    
                    <!-- Icon special pentru diferite tipuri de pagini -->
                    <?php
                    $page_slug = get_post_field('post_name', get_post());
                    $page_icon = '📄'; // icon default
                    
                    // Icons specifice bazate pe slug-ul paginii
                    if (strpos($page_slug, 'despre') !== false || strpos($page_slug, 'about') !== false) {
                        $page_icon = '👥';
                    } elseif (strpos($page_slug, 'contact') !== false) {
                        $page_icon = '📧';
                    } elseif (strpos($page_slug, 'ghid') !== false || strpos($page_slug, 'guide') !== false) {
                        $page_icon = '📖';
                    } elseif (strpos($page_slug, 'exchange') !== false) {
                        $page_icon = '💱';
                    } elseif (strpos($page_slug, 'termeni') !== false || strpos($page_slug, 'terms') !== false) {
                        $page_icon = '📋';
                    } elseif (strpos($page_slug, 'politica') !== false || strpos($page_slug, 'privacy') !== false) {
                        $page_icon = '🔒';
                    } elseif (strpos($page_slug, 'calculator') !== false) {
                        $page_icon = '🧮';
                    }
                    ?>
                    
                    <div style="font-size: 3rem; margin-bottom: 1rem;"><?php echo $page_icon; ?></div>
                    
                    <h1 style="font-size: 2.5rem; color: var(--text-primary); margin-bottom: 1rem; font-weight: 700;">
                        <?php the_title(); ?>
                    </h1>
                    
                    <?php if (has_excerpt()) : ?>
                        <div style="font-size: 1.2rem; color: var(--text-secondary); max-width: 600px; margin: 0 auto;">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Meta informații pentru pagină -->
                    <div style="margin-top: 1.5rem; font-size: 0.9rem; color: var(--text-secondary);">
                        <?php if (get_the_modified_date() !== get_the_date()) : ?>
                            <div style="display: flex; justify-content: center; align-items: center; gap: 0.5rem;">
                                🔄 Ultima actualizare: <?php echo get_the_modified_date('j F Y'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                </header>

                <!-- Cuprins pentru pagini lungi -->
                <?php 
                $content = get_the_content();
                $headings_count = preg_match_all('/<h[2-4][^>]*>(.+?)<\/h[2-4]>/', $content);
                if ($headings_count >= 3) : 
                ?>
                    <div id="page-table-of-contents" style="background: var(--light-bg); padding: 2rem; border-radius: 15px; margin-bottom: 2rem; border-left: 4px solid var(--bitcoin-orange);">
                        <h3 style="color: var(--bitcoin-orange); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                            📋 Cuprins
                        </h3>
                        <div id="page-toc-content">
                            <!-- Va fi populat cu JavaScript -->
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Conținutul paginii -->
                <div class="page-content" style="font-size: 1.1rem; line-height: 1.8; color: var(--text-primary);">
                    
                    <!-- Alertă specială pentru paginile importante -->
                    <?php if (in_array($page_slug, ['termeni-conditii', 'politica-confidentialitate', 'disclaimer-investitii'])) : ?>
                        <div style="background: linear-gradient(135deg, #fff3cd, #ffeaa7); padding: 1.5rem; border-radius: 10px; margin-bottom: 2rem; border-left: 4px solid #f39c12;">
                            <div style="display: flex; align-items: center; gap: 0.5rem; font-weight: 600; color: #8b6914; margin-bottom: 0.5rem;">
                                ⚠️ Informații importante
                            </div>
                            <p style="color: #8b6914; margin: 0; line-height: 1.6;">
                                <?php if ($page_slug === 'disclaimer-investitii') : ?>
                                    Bitcoin și criptomonedele sunt investiții cu risc ridicat. Acest conținut nu constituie sfaturi financiare. Investește responsabil și doar suma pe care îți permiți să o pierzi.
                                <?php elseif ($page_slug === 'politica-confidentialitate') : ?>
                                    Această pagină descrie cum colectăm, folosim și protejăm datele tale personale în conformitate cu GDPR.
                                <?php else : ?>
                                    Te rugăm să citești cu atenție termenii și condițiile de utilizare a acestui site.
                                <?php endif; ?>
                            </p>
                        </div>
                    <?php endif; ?>

                    <?php 
                    the_content(); 
                    
                    // Paginarea pentru pagini cu mai multe pagini
                    wp_link_pages(array(
                        'before' => '<div style="margin: 2rem 0; text-align: center;">',
                        'after'  => '</div>',
                        'link_before' => '<span style="display: inline-block; padding: 0.5rem 1rem; margin: 0 0.25rem; background: var(--bitcoin-orange); color: white; border-radius: 5px; text-decoration: none;">',
                        'link_after' => '</span>',
                    ));
                    ?>
                </div>

                <!-- Call-to-Action pentru conversion (doar pe anumite pagini) -->
                <?php if (!in_array($page_slug, ['termeni-conditii', 'politica-confidentialitate', 'contact'])) : ?>
                    <div class="page-cta" style="margin-top: 3rem; background: linear-gradient(135deg, var(--bitcoin-orange), var(--bitcoin-dark)); color: white; padding: 3rem 2rem; border-radius: 15px; text-align: center; position: relative; overflow: hidden;">
                        <div style="position: relative; z-index: 2;">
                            <h3 style="font-size: 2rem; margin-bottom: 1rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                                🚀 Gata să începi cu Bitcoin?
                            </h3>
                            <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9;">
                                Alege una din platformele noastre recomandate și începe să investești în Bitcoin astăzi
                            </p>
                            
                            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                                <a href="<?php echo esc_url(home_url('/#exchange-uri-bitcoin')); ?>" 
                                   style="background: white; color: var(--bitcoin-orange); padding: 1rem 2rem; border-radius: 25px; text-decoration: none; font-weight: 600; box-shadow: 0 4px 15px rgba(0,0,0,0.2); transition: all 0.3s ease;">
                                    Vezi Exchange-urile →
                                </a>
                                
                                <a href="<?php echo esc_url(home_url('/ghid-bitcoin-incepatori/')); ?>" 
                                   style="background: transparent; color: white; padding: 1rem 2rem; border-radius: 25px; text-decoration: none; font-weight: 600; border: 2px solid white; transition: all 0.3s ease;">
                                    📖 Ghid pentru începători
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Informații suplimentare pentru pagina de contact -->
                <?php if ($page_slug === 'contact') : ?>
                    <div class="contact-info" style="margin-top: 3rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                        
                        <div style="background: var(--light-bg); padding: 2rem; border-radius: 15px; text-align: center;">
                            <div style="font-size: 3rem; margin-bottom: 1rem;">📧</div>
                            <h4 style="color: var(--text-primary); margin-bottom: 0.5rem;">Email</h4>
                            <a href="mailto:contact@bitcoinul.ro" style="color: var(--bitcoin-orange); text-decoration: none; font-weight: 500;">
                                contact@bitcoinul.ro
                            </a>
                        </div>
                        
                        <div style="background: var(--light-bg); padding: 2rem; border-radius: 15px; text-align: center;">
                            <div style="font-size: 3rem; margin-bottom: 1rem;">💬</div>
                            <h4 style="color: var(--text-primary); margin-bottom: 0.5rem;">Telegram</h4>
                            <a href="https://t.me/bitcoinulro" target="_blank" rel="noopener" style="color: var(--bitcoin-orange); text-decoration: none; font-weight: 500;">
                                @bitcoinulro
                            </a>
                        </div>
                        
                        <div style="background: var(--light-bg); padding: 2rem; border-radius: 15px; text-align: center;">
                            <div style="font-size: 3rem; margin-bottom: 1rem;">⚡</div>
                            <h4 style="color: var(--text-primary); margin-bottom: 0.5rem;">Răspuns rapid</h4>
                            <p style="color: var(--text-secondary); margin: 0;">
                                24-48 ore în zilele lucrătoare
                            </p>
                        </div>
                        
                    </div>
                <?php endif; ?>

            </article>

            <!-- Comentarii pentru pagini (dacă sunt activate) -->
            <?php if (comments_open() || get_comments_number()) : ?>
                <section class="page-comments" style="margin-top: 4rem; padding-top: 3rem; border-top: 2px solid var(--border-light);">
                    <?php comments_template(); ?>
                </section>
            <?php endif; ?>

        <?php endwhile; ?>

        <!-- Pagini similare sau utile -->
        <?php
        $related_pages = get_pages(array(
            'exclude' => get_the_ID(),
            'number' => 3,
            'sort_column' => 'menu_order, post_title',
        ));
        
        if ($related_pages) : ?>
            <section class="related-pages" style="margin-top: 4rem; padding-top: 3rem; border-top: 2px solid var(--border-light);">
                <h3 style="text-align: center; color: var(--text-primary); margin-bottom: 2rem; font-size: 2rem;">
                    Pagini utile
                </h3>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                    <?php foreach ($related_pages as $page) : ?>
                        <div style="background: var(--white); border-radius: 15px; box-shadow: var(--shadow); overflow: hidden; transition: all 0.3s ease; border: 1px solid var(--border-light);">
                            
                            <div style="padding: 1.5rem;">
                                <h4 style="color: var(--text-primary); margin-bottom: 1rem; font-size: 1.2rem;">
                                    <a href="<?php echo esc_url(get_permalink($page)); ?>" style="text-decoration: none; color: inherit;">
                                        <?php echo esc_html($page->post_title); ?>
                                    </a>
                                </h4>
                                
                                <?php if ($page->post_excerpt) : ?>
                                    <p style="color: var(--text-secondary); line-height: 1.6; margin-bottom: 1rem; font-size: 0.95rem;">
                                        <?php echo wp_trim_words($page->post_excerpt, 15); ?>
                                    </p>
                                <?php endif; ?>
                                
                                <a class="read-more" href="<?php echo esc_url(get_permalink($page)); ?>" 
                                   style="color: var(--bitcoin-orange); text-decoration: none; font-weight: 600; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                                    Citește mai mult <span style="transition: transform 0.3s ease;">→</span>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

    </div>
</main>

<!-- JavaScript pentru funcționalități -->
<script>
// Generare Table of Contents pentru pagini
document.addEventListener('DOMContentLoaded', function() {
    const content = document.querySelector('.page-content');
    const tocContent = document.getElementById('page-toc-content');
    
    if (content && tocContent) {
        const headings = content.querySelectorAll('h2, h3, h4');
        
        if (headings.length > 2) {
            let tocHtml = '<ol style="list-style: decimal; padding-left: 2rem; line-height: 1.8;">';
            
            headings.forEach((heading, index) => {
                const id = 'page-heading-' + index;
                heading.id = id;
                
                const level = heading.tagName.toLowerCase();
                const indent = level === 'h3' ? 'margin-left: 1rem;' : level === 'h4' ? 'margin-left: 2rem;' : '';
                
                tocHtml += `<li style="${indent}"><a href="#${id}" style="color: var(--text-secondary); text-decoration: none;">${heading.textContent}</a></li>`;
            });
            
            tocHtml += '</ol>';
            tocContent.innerHTML = tocHtml;
            
            // Smooth scroll pentru TOC links
            tocContent.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        const headerHeight = document.querySelector('.site-header').offsetHeight;
                        const targetPosition = target.offsetTop - headerHeight - 20;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        } else {
            const tocContainer = document.getElementById('page-table-of-contents');
            if (tocContainer) {
                tocContainer.style.display = 'none';
            }
        }
    }
});

// Hover effects pentru paginile similare
document.addEventListener('DOMContentLoaded', function() {
    const relatedCards = document.querySelectorAll('.related-pages > div > div');
    
    relatedCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = 'var(--shadow-hover)';
            
            const arrow = this.querySelector('.read-more span');
            if (arrow) {
                arrow.style.transform = 'translateX(5px)';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'var(--shadow)';
            
            const arrow = this.querySelector('.read-more span');
            if (arrow) {
                arrow.style.transform = 'translateX(0)';
            }
        });
    });
});

// Evidențiere heading activ în TOC pe scroll (similar cu single.php)
window.addEventListener('scroll', function() {
    const headings = document.querySelectorAll('.page-content h2, .page-content h3, .page-content h4');
    const tocLinks = document.querySelectorAll('#page-toc-content a');
    
    let current = '';
    headings.forEach(heading => {
        const rect = heading.getBoundingClientRect();
        if (rect.top <= 100) {
            current = heading.id;
        }
    });
    
    tocLinks.forEach(link => {
        link.style.color = 'var(--text-secondary)';
        if (link.getAttribute('href') === '#' + current) {
            link.style.color = 'var(--bitcoin-orange)';
            link.style.fontWeight = '600';
        } else {
            link.style.fontWeight = '400';
        }
    });
});

// Animații pentru CTA hover
const ctaButtons = document.querySelectorAll('.page-cta a');
ctaButtons.forEach(button => {
    button.addEventListener('mouseenter', function() {
        if (this.style.background === 'white') {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = '0 8px 25px rgba(0,0,0,0.3)';
        } else {
            this.style.background = 'rgba(255,255,255,0.1)';
        }
    });
    
    button.addEventListener('mouseleave', function() {
        if (this.style.color === 'rgb(247, 147, 26)') {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 15px rgba(0,0,0,0.2)';
        } else {
            this.style.background = 'transparent';
        }
    });
});
</script>

<!-- CSS responsive pentru pagini -->
<style>
@media (max-width: 768px) {
    .page-header {
        padding: 2rem 1rem !important;
    }
    
    .page-header h1 {
        font-size: 2rem !important;
    }
    
    .page-content {
        font-size: 1rem !important;
    }
    
    .page-cta {
        padding: 2rem 1rem !important;
    }
    
    .page-cta h3 {
        font-size: 1.5rem !important;
    }
    
    .contact-info {
        grid-template-columns: 1fr !important;
    }
    
    .related-pages > div {
        grid-template-columns: 1fr !important;
    }
}

@media (max-width: 480px) {
    .breadcrumbs ol {
        flex-wrap: wrap;
        gap: 0.3rem !important;
    }
    
    .page-cta div {
        flex-direction: column !important;
    }
}

/* Stiluri pentru conținutul paginii */
.page-content h2 {
    color: var(--text-primary);
    font-size: 1.8rem;
    margin-top: 3rem;
    margin-bottom: 1rem;
    border-bottom: 2px solid var(--bitcoin-orange);
    padding-bottom: 0.5rem;
}

.page-content h3 {
    color: var(--text-primary);
    font-size: 1.5rem;
    margin-top: 2.5rem;
    margin-bottom: 1rem;
}

.page-content h4 {
    color: var(--text-primary);
    font-size: 1.3rem;
    margin-top: 2rem;
    margin-bottom: 0.8rem;
}

.page-content ul, .page-content ol {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.page-content li {
    margin-bottom: 0.5rem;
    line-height: 1.6;
}

.page-content blockquote {
    background: var(--light-bg);
    border-left: 4px solid var(--bitcoin-orange);
    padding: 1.5rem 2rem;
    margin: 2rem 0;
    font-style: italic;
    border-radius: 0 10px 10px 0;
}

.page-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 2rem 0;
    box-shadow: var(--shadow);
    border-radius: 10px;
    overflow: hidden;
}

.page-content th, .page-content td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid var(--border-light);
}

.page-content th {
    background: var(--bitcoin-orange);
    color: white;
    font-weight: 600;
}

.page-content tr:hover {
    background: var(--light-bg);
}
</style>

<?php get_footer(); ?>