<?php
/**
 * Template pentru afișarea articolelor individuale
 * Optimizat pentru SEO și conversii affiliate
 */

get_header(); ?>

<main class="site-content">
    <div class="container">
        
        <?php while (have_posts()) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-article'); ?>>
                
                <!-- Breadcrumbs pentru SEO -->
                <nav class="breadcrumbs" aria-label="Breadcrumb">
                    <ol style="display: flex; gap: 0.5rem; margin-bottom: 2rem; font-size: 0.9rem; color: var(--text-secondary);">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Acasă</a></li>
                        <li>›</li>
                        <?php 
                        $categories = get_the_category();
                        if ($categories) : ?>
                            <li><a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a></li>
                            <li>›</li>
                        <?php endif; ?>
                        <li aria-current="page"><?php the_title(); ?></li>
                    </ol>
                </nav>

                <!-- Header articol -->
                <header class="article-header" style="margin-bottom: 2rem; text-align: center;">
                    
                    <?php if ($categories) : ?>
                        <span class="article-category" style="display: inline-block; background-color: var(--bitcoin-orange); color: var(--white); padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.9rem; font-weight: 600; margin-bottom: 1rem; text-transform: uppercase;">
                            <?php echo esc_html($categories[0]->name); ?>
                        </span>
                    <?php endif; ?>
                    
                    <h1 class="article-title" style="font-size: 2.5rem; font-weight: 700; color: var(--text-primary); margin-bottom: 1rem; line-height: 1.2;">
                        <?php the_title(); ?>
                    </h1>
                    
                    <div class="article-meta" style="display: flex; justify-content: center; align-items: center; gap: 2rem; flex-wrap: wrap; color: var(--text-secondary); margin-bottom: 2rem;">
                        <time datetime="<?php echo get_the_date('c'); ?>" style="display: flex; align-items: center; gap: 0.5rem;">
                            📅 Publicat pe <?php echo get_the_date('j F Y'); ?>
                        </time>
                        
                        <?php if (get_the_date() !== get_the_modified_date()) : ?>
                            <time datetime="<?php echo get_the_modified_date('c'); ?>" style="display: flex; align-items: center; gap: 0.5rem;">
                                🔄 Actualizat pe <?php echo get_the_modified_date('j F Y'); ?>
                            </time>
                        <?php endif; ?>
                        
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            👤 de <strong><?php the_author(); ?></strong>
                        </div>
                        
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            ⏱️ <?php echo bitcoinul_ro_reading_time(); ?> min citire
                        </div>
                    </div>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="featured-image" style="margin: 2rem 0; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow-hover);">
                            <?php 
                            the_post_thumbnail('hero-image', array(
                                'alt' => get_the_title(),
                                'loading' => 'eager'
                            )); 
                            ?>
                        </div>
                    <?php endif; ?>
                    
                </header>

                <!-- Cuprins (Table of Contents) pentru articole lungi -->
                <div id="table-of-contents" style="background: var(--light-bg); padding: 2rem; border-radius: 15px; margin-bottom: 2rem; border-left: 4px solid var(--bitcoin-orange);">
                    <h3 style="color: var(--bitcoin-orange); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                        📋 Cuprins
                    </h3>
                    <div id="toc-content">
                        <!-- Va fi populat cu JavaScript -->
                    </div>
                </div>

                <!-- Conținutul articolului -->
                <div class="article-content" style="font-size: 1.1rem; line-height: 1.8; color: var(--text-primary);">
                    <?php the_content(); ?>
                </div>

                <!-- Exchange-uri recomandate în articol -->
                <div class="in-article-exchanges" style="background: linear-gradient(135deg, var(--light-bg), #ffffff); padding: 3rem 2rem; border-radius: 15px; margin: 3rem 0; border: 2px solid var(--bitcoin-orange); position: relative;">
                    <div style="position: absolute; top: -15px; left: 2rem; background: var(--bitcoin-orange); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-weight: 600; font-size: 0.9rem;">
                        💰 Exchange-uri Recomandate
                    </div>
                    
                    <h3 style="text-align: center; margin-bottom: 2rem; color: var(--text-primary); font-size: 1.5rem;">
                        Începe să investești în Bitcoin astăzi
                    </h3>
                    
                    <?php echo do_shortcode('[exchanges_list limit="2" show_features="true"]'); ?>
                    
                    <div style="text-align: center; margin-top: 2rem;">
                        <a href="<?php echo esc_url(home_url('/#exchange-uri-bitcoin')); ?>" class="btn" style="display: inline-block; background: linear-gradient(135deg, var(--bitcoin-orange), var(--bitcoin-dark)); color: white; padding: 1rem 2rem; border-radius: 25px; text-decoration: none; font-weight: 600; box-shadow: var(--shadow);">
                            Vezi toate Exchange-urile →
                        </a>
                    </div>
                </div>

                <!-- Tags și Share -->
                <footer class="article-footer" style="margin-top: 3rem; padding-top: 2rem; border-top: 2px solid var(--border-light);">
                    
                    <?php 
                    $tags = get_the_tags();
                    if ($tags) : ?>
                        <div class="article-tags" style="margin-bottom: 2rem;">
                            <h4 style="color: var(--text-primary); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                                🏷️ Etichete:
                            </h4>
                            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                                <?php foreach ($tags as $tag) : ?>
                                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" 
                                       style="background: var(--light-bg); color: var(--text-secondary); padding: 0.5rem 1rem; border-radius: 20px; text-decoration: none; font-size: 0.9rem; border: 1px solid var(--border-light); transition: all 0.3s ease;">
                                        #<?php echo esc_html($tag->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Butoane de share -->
                    <div class="share-buttons" style="margin-bottom: 2rem;">
                        <h4 style="color: var(--text-primary); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                            📤 Distribuie articolul:
                        </h4>
                        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" 
                               rel="noopener"
                               style="background: #3b5998; color: white; padding: 0.8rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 500; display: flex; align-items: center; gap: 0.5rem;"
                               onclick="window.open(this.href, 'facebook', 'width=600,height=400'); return false;">
                                📘 Facebook
                            </a>
                            
                            <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" 
                               rel="noopener"
                               style="background: #1da1f2; color: white; padding: 0.8rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 500; display: flex; align-items: center; gap: 0.5rem;"
                               onclick="window.open(this.href, 'twitter', 'width=600,height=400'); return false;">
                                🐦 Twitter
                            </a>
                            
                            <a href="https://t.me/share/url?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                               target="_blank" 
                               rel="noopener"
                               style="background: #0088cc; color: white; padding: 0.8rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 500; display: flex; align-items: center; gap: 0.5rem;">
                                ✈️ Telegram
                            </a>
                            
                            <button onclick="copyToClipboard('<?php echo esc_js(get_permalink()); ?>')" 
                                    style="background: var(--text-secondary); color: white; padding: 0.8rem 1.5rem; border-radius: 25px; border: none; font-weight: 500; cursor: pointer; display: flex; align-items: center; gap: 0.5rem;">
                                📋 Copiază Link
                            </button>
                        </div>
                    </div>

                    <!-- Autor info -->
                    <div class="author-info" style="background: var(--light-bg); padding: 2rem; border-radius: 15px; display: flex; align-items: center; gap: 1.5rem;">
                        <div class="author-avatar" style="width: 80px; height: 80px; border-radius: 50%; background: var(--bitcoin-orange); display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 700; flex-shrink: 0;">
                            <?php echo strtoupper(substr(get_the_author(), 0, 1)); ?>
                        </div>
                        <div>
                            <h4 style="color: var(--text-primary); margin-bottom: 0.5rem;">
                                Despre <?php the_author(); ?>
                            </h4>
                            <p style="color: var(--text-secondary); margin-bottom: 1rem; line-height: 1.6;">
                                <?php echo get_the_author_meta('description') ?: 'Expert în criptomonede și investiții Bitcoin. Pasionat de tehnologia blockchain și educația financiară.'; ?>
                            </p>
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" 
                               style="color: var(--bitcoin-orange); text-decoration: none; font-weight: 600;">
                                Vezi toate articolele →
                            </a>
                        </div>
                    </div>

                </footer>

            </article>

            <!-- Articole similare -->
            <?php 
            $related_posts = get_posts(array(
                'category__in' => wp_get_post_categories($post->ID),
                'numberposts'  => 3,
                'post__not_in' => array($post->ID)
            ));

            if ($related_posts) : ?>
                <section class="related-articles" style="margin-top: 4rem; padding-top: 3rem; border-top: 2px solid var(--border-light);">
                    <h3 style="text-align: center; color: var(--text-primary); margin-bottom: 2rem; font-size: 2rem;">
                        Articole similare
                    </h3>
                    
                    <div class="articles-grid">
                        <?php foreach ($related_posts as $related_post) : 
                            setup_postdata($related_post); ?>
                            
                            <article class="article-card">
                                <?php if (has_post_thumbnail($related_post)) : ?>
                                    <div class="article-thumbnail">
                                        <a href="<?php echo esc_url(get_permalink($related_post)); ?>">
                                            <?php echo get_the_post_thumbnail($related_post, 'article-thumbnail', array('alt' => get_the_title($related_post))); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="article-content">
                                    <?php 
                                    $post_categories = get_the_category($related_post);
                                    if ($post_categories) : ?>
                                        <span class="article-category"><?php echo esc_html($post_categories[0]->name); ?></span>
                                    <?php endif; ?>
                                    
                                    <h4 class="article-title">
                                        <a href="<?php echo esc_url(get_permalink($related_post)); ?>">
                                            <?php echo get_the_title($related_post); ?>
                                        </a>
                                    </h4>
                                    
                                    <div class="article-meta">
                                        <time datetime="<?php echo get_the_date('c', $related_post); ?>">
                                            <?php echo get_the_date('j F Y', $related_post); ?>
                                        </time>
                                    </div>
                                    
                                    <div class="article-excerpt">
                                        <?php echo wp_trim_words(get_the_excerpt($related_post), 15, '...'); ?>
                                    </div>
                                    
                                    <a href="<?php echo esc_url(get_permalink($related_post)); ?>" class="read-more">
                                        Citește mai mult →
                                    </a>
                                </div>
                            </article>
                            
                        <?php endforeach; 
                        wp_reset_postdata(); ?>
                    </div>
                </section>
            <?php endif; ?>

            <!-- Comentarii -->
            <?php if (comments_open() || get_comments_number()) : ?>
                <section class="comments-section" style="margin-top: 4rem; padding-top: 3rem; border-top: 2px solid var(--border-light);">
                    <?php comments_template(); ?>
                </section>
            <?php endif; ?>

        <?php endwhile; ?>

    </div>
</main>

<!-- JavaScript pentru funcționalități -->
<script>
// Generare automată Table of Contents
document.addEventListener('DOMContentLoaded', function() {
    const content = document.querySelector('.article-content');
    const tocContent = document.getElementById('toc-content');
    const headings = content.querySelectorAll('h2, h3, h4');
    
    if (headings.length > 2) {
        let tocHtml = '<ol style="list-style: decimal; padding-left: 2rem; line-height: 1.8;">';
        
        headings.forEach((heading, index) => {
            const id = 'heading-' + index;
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
        document.getElementById('table-of-contents').style.display = 'none';
    }
});

// Funcție pentru copierea link-ului
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Feedback vizual
        const button = event.target;
        const originalText = button.innerHTML;
        button.innerHTML = '✅ Copiat!';
        button.style.background = 'var(--success-green)';
        
        setTimeout(() => {
            button.innerHTML = originalText;
            button.style.background = 'var(--text-secondary)';
        }, 2000);
    }).catch(function(err) {
        console.error('Eroare la copierea în clipboard: ', err);
    });
}

// Evidențiere heading activ în TOC pe scroll
window.addEventListener('scroll', function() {
    const headings = document.querySelectorAll('.article-content h2, .article-content h3, .article-content h4');
    const tocLinks = document.querySelectorAll('#toc-content a');
    
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

// Animație fade-in pentru elementele pe scroll
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

// Aplică animația la elementele relevante
document.querySelectorAll('.related-articles .article-card, .in-article-exchanges').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});
</script>

<?php get_footer(); ?>

<?php
// Funcție helper pentru timpul de citire
function bitcoinul_ro_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // 200 cuvinte pe minut
    return max(1, $reading_time);
}
?>