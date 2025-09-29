<?php
/**
 * Funcțiile principale ale temei Bitcoinul.ro
 * Optimizate pentru SEO și affiliate marketing
 */

// Previne accesul direct la fișier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Configurări de bază ale temei
 */
function bitcoinul_ro_setup() {
    
    // Configurează titlul și tagline-ul site-ului pentru SEO
    add_action('after_setup_theme', 'bitcoinul_ro_set_site_info');
    
    // Suport pentru traduceri
    load_theme_textdomain('bitcoinul-ro', get_template_directory() . '/languages');
    
    // Suport pentru feed-uri automate
    add_theme_support('automatic-feed-links');
    
    // Suport pentru title tag dinamic
    add_theme_support('title-tag');
    
    // Suport pentru imagini featured
    add_theme_support('post-thumbnails');
    
    // Dimensiuni personalizate pentru imagini (optimizate pentru SEO)
    add_image_size('exchange-logo', 300, 200, true);
    add_image_size('article-thumbnail', 400, 250, true);
    add_image_size('hero-image', 1200, 600, true);
    
    // Suport pentru HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style'
    ));
    
    // Suport pentru logo personalizat
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    
    // Suport pentru meniuri
    register_nav_menus(array(
        'primary' => 'Meniu Principal',
        'footer'  => 'Meniu Footer',
        'exchanges' => 'Meniu Exchange-uri'
    ));
    
    // Suport pentru editor de blocuri Gutenberg
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    
    // Suport pentru culori personalizate în editor
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => 'Bitcoin Orange',
            'slug'  => 'bitcoin-orange',
            'color' => '#f7931a',
        ),
        array(
            'name'  => 'Bitcoin Dark',
            'slug'  => 'bitcoin-dark',
            'color' => '#ff6b00',
        ),
        array(
            'name'  => 'Success Green',
            'slug'  => 'success-green',
            'color' => '#16a085',
        ),
    ));
}
add_action('after_setup_theme', 'bitcoinul_ro_setup');

/**
 * Înregistrează și încarcă scripturile și stilurile
 */
function bitcoinul_ro_scripts() {
    
    // Stilul principal
    wp_enqueue_style(
        'bitcoinul-ro-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );
    
    // Font-uri Google (optimizate pentru performanță)
    wp_enqueue_style(
        'bitcoinul-ro-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );
    
    // JavaScript pentru funcționalități interactive
    wp_enqueue_script(
        'bitcoinul-ro-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        wp_get_theme()->get('Version'),
        true
    );
    
    // Localizarea scripturilor pentru AJAX
    wp_localize_script('bitcoinul-ro-main', 'bitcoinul_ro_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('bitcoinul_ro_nonce'),
        'site_url' => home_url('/'),
    ));
    
    // Script pentru comentarii threaded (dacă sunt activate)
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bitcoinul_ro_scripts');

/**
 * Înregistrează zonele de widget-uri
 */
function bitcoinul_ro_widgets_init() {
    
    // Sidebar principal
    register_sidebar(array(
        'name'          => 'Sidebar Principal',
        'id'            => 'sidebar-1',
        'description'   => 'Sidebar-ul principal pentru articole și pagini',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    // Footer widgets
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => "Footer Widget $i",
            'id'            => "footer-widget-$i",
            'description'   => "Zona de widget-uri pentru footer, coloana $i",
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-widget-title">',
            'after_title'   => '</h3>',
        ));
    }
    
    // Widget special pentru prețul Bitcoin
    register_sidebar(array(
        'name'          => 'Bitcoin Price Widget',
        'id'            => 'bitcoin-price',
        'description'   => 'Widget pentru afișarea prețului Bitcoin în timp real',
        'before_widget' => '<div id="%1$s" class="bitcoin-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="bitcoin-widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'bitcoinul_ro_widgets_init');

/**
 * Optimizări SEO pentru meta description și keywords
 */
function bitcoinul_ro_meta_description() {
    if (is_home() || is_front_page()) {
        $description = "Cele mai bune exchange-uri Bitcoin din România. Comparații detaliate, recenzii și ghiduri pentru cumpărarea Bitcoin în siguranță cu comisioane mici.";
    } elseif (is_single()) {
        global $post;
        $description = wp_trim_words(get_the_excerpt($post), 25);
    } elseif (is_category()) {
        $description = "Articole despre " . single_cat_title('', false) . " - Ghiduri și știri Bitcoin România";
    } else {
        $description = get_bloginfo('description');
    }
    
    if (!empty($description)) {
        echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    }
}

/**
 * Adaugă keywords SEO pentru Bitcoin
 */
function bitcoinul_ro_meta_keywords() {
    $keywords = array('bitcoin romania', 'exchange bitcoin', 'cumpar bitcoin', 'vand bitcoin');
    
    if (is_single()) {
        $tags = get_the_tags();
        if ($tags) {
            foreach ($tags as $tag) {
                $keywords[] = $tag->name;
            }
        }
    }
    
    if (!empty($keywords)) {
        echo '<meta name="keywords" content="' . esc_attr(implode(', ', array_unique($keywords))) . '">' . "\n";
    }
}

/**
 * Funcție pentru afișarea exchange-urilor recomandate
 */
function get_recommended_exchanges() {
    $exchanges = array(
        array(
            'name' => 'Binance România',
            'logo' => 'B',
            'rating' => 4.8,
            'badge' => 'Recomandat #1',
            'features' => array(
                'Comision 0.1% - cel mai mic din România',
                'Depunere gratuită prin card bancar',
                'Retragere rapidă în RON',
                'Aplicație mobilă premium',
                'Suport clienți în română',
                'Licență oficială în UE'
            ),
            'affiliate_link' => 'https://accounts.binance.com/en/register?ref=21315882',
            'description' => 'Cea mai mare platformă de tranzacționare crypto din lume'
        ),
        array(
            'name' => 'Bybit',
            'logo' => 'Y',
            'rating' => 4.3,
            'badge' => 'Derivate',
            'features' => array(
                'Comisioane 0.1% pe spot',
                'Futures și derivate pentru traderi',
                'Lichiditate ridicată',
                'Execuție rapidă a ordinelor',
                'Aplicație mobilă performantă',
                'Promoții și bonusuri periodice'
            ),
            'affiliate_link' => 'https://www.bybit.com/en/invite/?ref=ZW6OLQ',
            'description' => 'Platformă populară pentru derivate și trading avansat'
        ),
        array(
            'name' => 'Revolut',
            'logo' => 'R',
            'rating' => 3.8,
            'badge' => 'Cumpărare rapidă',
            'features' => array(
                'Cumpărare instantă în aplicație',
                'Depuneri rapide cu card bancar',
                'IBAN european și transferuri SEPA',
                'Interfață simplă pentru începători',
                'Card fizic și virtual',
                'Schimb valutar rapid'
            ),
            'affiliate_link' => 'https://revolut.com/referral/?referral-code=cataliuiy!SEP1-25-AR-H3&geo-redirect',
            'description' => 'Cea mai simplă variantă pentru începători să cumpere rapid'
        )
    );
    
    return $exchanges;
}

/**
 * Shortcode pentru afișarea prețului Bitcoin
 */
function bitcoin_price_shortcode($atts) {
    $atts = shortcode_atts(array(
        'currency' => 'usd',
        'show_change' => 'true'
    ), $atts);
    
    ob_start();
    ?>
    <div class="bitcoin-price-widget" id="btc-shortcode-<?php echo uniqid(); ?>">
        <div class="price-label">Prețul Bitcoin</div>
        <div class="price-display">Încărcare...</div>
        <?php if ($atts['show_change'] === 'true'): ?>
            <div class="price-change">Calculând...</div>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('bitcoin_price', 'bitcoin_price_shortcode');

/**
 * Shortcode pentru afișarea exchange-urilor
 */
function exchanges_list_shortcode($atts) {
    $atts = shortcode_atts(array(
        'limit' => 3,
        'show_features' => 'true'
    ), $atts);
    
    $exchanges = get_recommended_exchanges();
    $exchanges = array_slice($exchanges, 0, intval($atts['limit']));
    
    ob_start();
    ?>
    <div class="exchanges-grid">
        <?php foreach ($exchanges as $exchange): ?>
            <div class="exchange-card">
                <div class="exchange-badge"><?php echo esc_html($exchange['badge']); ?></div>
                <div class="exchange-header">
                    <div class="exchange-logo"><?php echo esc_html($exchange['logo']); ?></div>
                    <h3 class="exchange-name"><?php echo esc_html($exchange['name']); ?></h3>
                    <div class="exchange-rating">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <span class="star"><?php echo $i <= $exchange['rating'] ? '★' : '☆'; ?></span>
                        <?php endfor; ?>
                        <small>(<?php echo number_format($exchange['rating'], 1); ?>/5)</small>
                    </div>
                </div>
                <?php if ($atts['show_features'] === 'true'): ?>
                    <div class="exchange-content">
                        <ul class="exchange-features">
                            <?php foreach ($exchange['features'] as $feature): ?>
                                <li><?php echo esc_html($feature); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?php echo esc_url($exchange['affiliate_link']); ?>" class="exchange-cta" target="_blank" rel="nofollow sponsored noopener noreferrer">
                            Începe pe <?php echo esc_html(explode(' ', $exchange['name'])[0]); ?> →
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('exchanges_list', 'exchanges_list_shortcode');

/**
 * Optimizează încărcarea imaginilor pentru SEO
 */
function bitcoinul_ro_lazy_loading($content) {
    if (!is_admin() && !is_feed()) {
        $content = preg_replace('/<img(.*?)src=/i', '<img$1loading="lazy" src=', $content);
    }
    return $content;
}
add_filter('the_content', 'bitcoinul_ro_lazy_loading');

/**
 * Adaugă schema.org markup pentru articole
 */
function bitcoinul_ro_article_schema() {
    if (is_single()) {
        global $post;
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => get_the_title(),
            'description' => wp_trim_words(get_the_excerpt(), 25),
            'author' => array(
                '@type' => 'Person',
                'name' => get_the_author()
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => get_bloginfo('name'),
                'logo' => array(
                    '@type' => 'ImageObject',
                    'url' => get_template_directory_uri() . '/assets/logo.png'
                )
            ),
            'datePublished' => get_the_date('c'),
            'dateModified' => get_the_modified_date('c'),
            'mainEntityOfPage' => get_permalink()
        );
        
        if (has_post_thumbnail()) {
            $schema['image'] = array(
                '@type' => 'ImageObject',
                'url' => get_the_post_thumbnail_url($post, 'full'),
                'width' => 1200,
                'height' => 630
            );
        }
        
        echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
    }
}
add_action('wp_head', 'bitcoinul_ro_article_schema');

/**
 * Optimizează titlurile pentru SEO
 */
function bitcoinul_ro_document_title_parts($title) {
    if (is_home() || is_front_page()) {
        $title['title'] = 'Cele mai bune Exchange-uri Bitcoin România 2025';
        $title['tagline'] = 'Comparații, Recenzii și Ghiduri Complete';
    }
    return $title;
}
add_filter('document_title_parts', 'bitcoinul_ro_document_title_parts');

/**
 * Adaugă clasa CSS pentru affiliate links
 */
function bitcoinul_ro_affiliate_links($content) {
    // Adaugă clasa "affiliate-link" la toate linkurile cu rel="sponsored"
    $content = preg_replace('/(<a[^>]*rel=["\'][^"\']*sponsored[^"\']*["\'][^>]*>)/', '$1', $content);
    return $content;
}
add_filter('the_content', 'bitcoinul_ro_affiliate_links');

/**
 * Funcție helper pentru tracking affiliate
 */
function bitcoinul_ro_track_affiliate_click() {
    if (isset($_POST['platform']) && wp_verify_nonce($_POST['nonce'], 'bitcoinul_ro_nonce')) {
        $platform = sanitize_text_field($_POST['platform']);
        
        // Aici poți adăuga logica pentru tracking în Google Analytics
        // sau salvarea în baza de date pentru statistici
        
        wp_die(json_encode(array('success' => true)));
    }
    wp_die(json_encode(array('success' => false)));
}
add_action('wp_ajax_track_affiliate', 'bitcoinul_ro_track_affiliate_click');
add_action('wp_ajax_nopriv_track_affiliate', 'bitcoinul_ro_track_affiliate_click');

/**
 * Optimizări de securitate
 */
// Ascunde versiunea WordPress
function remove_wp_version() {
    return '';
}
add_filter('the_generator', 'remove_wp_version');

// Dezactivează XML-RPC pentru securitate
add_filter('xmlrpc_enabled', '__return_false');

// Ascunde autor în REST API
function bitcoinul_ro_hide_author_rest() {
    if (!current_user_can('edit_posts')) {
        return new WP_Error('rest_user_cannot_view', 'Sorry, you are not allowed to view users.', array('status' => 401));
    }
}
add_action('rest_authentication_errors', 'bitcoinul_ro_hide_author_rest');

/**
 * Optimizări de performanță
 */
// Dezactivează emoji pentru performanță mai bună
function disable_wp_emojicons() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_wp_emojicons');

/**
 * Customizer pentru setări tema
 */
function bitcoinul_ro_customize_register($wp_customize) {
    
    // Secțiune pentru setări generale
    $wp_customize->add_section('bitcoinul_ro_general', array(
        'title'    => 'Setări Bitcoinul.ro',
        'priority' => 30,
    ));
    
    // Setare pentru affiliate disclaimer
    $wp_customize->add_setting('bitcoinul_ro_affiliate_disclaimer', array(
        'default'           => 'Această pagină conține linkuri de afiliere. Primim o comisiune dacă faci o achiziție prin aceste linkuri.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('bitcoinul_ro_affiliate_disclaimer', array(
        'label'    => 'Textul Affiliate Disclaimer',
        'section'  => 'bitcoinul_ro_general',
        'type'     => 'textarea',
    ));
    
    // Setare pentru Google Analytics ID
    $wp_customize->add_setting('bitcoinul_ro_ga_id', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('bitcoinul_ro_ga_id', array(
        'label'    => 'Google Analytics ID',
        'section'  => 'bitcoinul_ro_general',
        'type'     => 'text',
    ));

    // Setare pentru CryptoPanic API Token (știri)
    $wp_customize->add_setting('bitcoinul_ro_news_api_token', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('bitcoinul_ro_news_api_token', array(
        'label'    => 'CryptoPanic API Token (știri)',
        'section'  => 'bitcoinul_ro_general',
        'type'     => 'text',
        'description' => 'Cheie gratuită de pe cryptopanic.com (Free API). Folosită pentru pagina Știri.'
    ));
}
add_action('customize_register', 'bitcoinul_ro_customize_register');

/**
 * Adaugă Google Analytics dacă este configurat
 */
function bitcoinul_ro_google_analytics() {
    $ga_id = get_theme_mod('bitcoinul_ro_ga_id');
    if (!empty($ga_id) && !is_admin() && !current_user_can('manage_options')) {
        ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga_id); ?>"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', '<?php echo esc_attr($ga_id); ?>');
        </script>
        <?php
    }
}
add_action('wp_head', 'bitcoinul_ro_google_analytics');

/**
 * Limitează reviziile postărilor pentru performanță
 */
if (!defined('WP_POST_REVISIONS')) {
    define('WP_POST_REVISIONS', 3);
}

/**
 * Înregistrează tipuri de conținut personalizate pentru exchange-uri
 */
function bitcoinul_ro_custom_post_types() {
    
    // Custom post type pentru exchange-uri
    register_post_type('exchange', array(
        'labels' => array(
            'name'               => 'Exchange-uri',
            'singular_name'      => 'Exchange',
            'menu_name'          => 'Exchange-uri',
            'add_new'            => 'Adaugă Exchange',
            'add_new_item'       => 'Adaugă Exchange Nou',
            'edit_item'          => 'Editează Exchange',
            'new_item'           => 'Exchange Nou',
            'view_item'          => 'Vezi Exchange',
            'search_items'       => 'Caută Exchange-uri',
            'not_found'          => 'Niciun exchange găsit',
            'not_found_in_trash' => 'Niciun exchange în coș',
        ),
        'public'       => true,
        // Mutăm arhiva CPT pe un slug diferit pentru a evita conflictul cu pagina /exchange-uri/
        'has_archive'  => true,
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'    => 'dashicons-chart-line',
        // Folosim 'exchanges' ca slug pentru single-uri și arhivă: /exchanges/
        'rewrite'      => array('slug' => 'exchanges', 'with_front' => false),
    ));
    
    // Taxonomie pentru tipurile de exchange-uri
    register_taxonomy('exchange_type', 'exchange', array(
        'labels' => array(
            'name'              => 'Tipuri Exchange',
            'singular_name'     => 'Tip Exchange',
            'search_items'      => 'Caută Tipuri',
            'all_items'         => 'Toate Tipurile',
            'edit_item'         => 'Editează Tip',
            'update_item'       => 'Actualizează Tip',
            'add_new_item'      => 'Adaugă Tip Nou',
            'new_item_name'     => 'Nume Tip Nou',
            'menu_name'         => 'Tipuri Exchange',
        ),
        'hierarchical' => true,
        'public'       => true,
        'rewrite'      => array('slug' => 'tip-exchange'),
    ));
}
add_action('init', 'bitcoinul_ro_custom_post_types');

// Flush rewrite rules la activarea temei
function bitcoinul_ro_flush_rewrite_rules() {
    bitcoinul_ro_custom_post_types();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'bitcoinul_ro_flush_rewrite_rules');

/**
 * Configurează titlul și tagline-ul site-ului pentru SEO optim
 */
function bitcoinul_ro_set_site_info() {
    $site_title = 'Bitcoinul.ro';
    $tagline = 'Ghidul complet Bitcoin România - Exchange-uri verificate, Ghiduri SEO și Știri Crypto actualizate zilnic';
    
    // Actualizează doar dacă nu sunt deja setate custom
    $current_title = get_option('blogname');
    $current_tagline = get_option('blogdescription');
    
    if (empty($current_title) || $current_title === 'WordPress' || $current_title === 'My blog') {
        update_option('blogname', $site_title);
    }
    
    if (empty($current_tagline) || strpos($current_tagline, 'WordPress') !== false) {
        update_option('blogdescription', $tagline);
    }
}

/**
 * Creează automat paginile necesare pentru meniu
 */
function bitcoinul_ro_create_pages() {
    $pages = array(
        'exchange-uri' => array(
            'title' => 'Exchange-uri Bitcoin România',
            'template' => 'page-exchange-uri.php'
        ),
        'ghiduri' => array(
            'title' => 'Ghiduri Bitcoin & Crypto',
            'template' => 'page-ghiduri.php'
        ),
        'stiri' => array(
            'title' => 'Știri Bitcoin & Crypto',
            'template' => 'page-stiri.php'
        ),
        'calculatoare-bitcoin' => array(
            'title' => 'Calculatoare Crypto',
            'template' => 'page-calculatoare-bitcoin.php'
        )
    );
    
    foreach ($pages as $slug => $page_data) {
        // Verifică dacă pagina există deja
        $existing_page = get_page_by_path($slug);
        
        if (!$existing_page) {
            // Creează pagina
            $page_id = wp_insert_post(array(
                'post_title'     => $page_data['title'],
                'post_name'      => $slug,
                'post_content'   => '[Conținut generat automat de tema Bitcoinul.ro]',
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'post_author'    => 1,
            ));
            
            // Setează template-ul personalizat
            if ($page_id && isset($page_data['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page_data['template']);
            }
        } else {
            // Dacă pagina există, restaurează/publică și setează template-ul corect
            if ($existing_page->post_status === 'trash') {
                wp_untrash_post($existing_page->ID);
                $existing_page->post_status = 'draft';
            }
            if ($existing_page->post_status !== 'publish') {
                wp_update_post(array('ID' => $existing_page->ID, 'post_status' => 'publish'));
            }
            if (isset($page_data['template'])) {
                update_post_meta($existing_page->ID, '_wp_page_template', $page_data['template']);
            }
        }
    }

    // Creează și ghidurile curate (dacă lipsesc)
    bitcoinul_ro_create_guide_pages();
}

/**
 * Configurează meniul principal automat
 */
function bitcoinul_ro_setup_menu() {
    // Creează meniul principal dacă nu există
    $menu_exists = wp_get_nav_menu_object('primary-menu');
    
    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu('Primary Menu');
        
        if ($menu_id) {
            // Adaugă elementele de meniu
            $menu_items = array(
                array('title' => 'Acasă', 'url' => home_url('/')),
                array('title' => 'Exchange-uri', 'url' => home_url('/exchange-uri/')),
                array('title' => 'Ghiduri', 'url' => home_url('/ghiduri/')),
                array('title' => 'Știri', 'url' => home_url('/stiri/')),
            );
            
            foreach ($menu_items as $item) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => $item['title'],
                    'menu-item-url' => $item['url'],
                    'menu-item-status' => 'publish',
                    'menu-item-type' => 'custom'
                ));
            }
            
            // Asignează meniul la locația principală
            $locations = get_theme_mod('nav_menu_locations');
            $locations['primary'] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }
    }
}

// Rulează configurarea la activarea temei
function bitcoinul_ro_theme_activation() {
    bitcoinul_ro_set_site_info();
    bitcoinul_ro_create_pages();
    bitcoinul_ro_setup_menu();
    bitcoinul_ro_flush_rewrite_rules();
}
add_action('after_switch_theme', 'bitcoinul_ro_theme_activation');

/**
 * Creează ghiduri editoriale de bază (pagini) pentru filtrele: Începători, Securitate, Investiții, Trading.
 * Conținut în limba română, structurat pe secțiuni. Rulează idempotent: nu rescrie dacă există.
 */
function bitcoinul_ro_create_guide_pages() {
    if (!function_exists('wp_insert_post')) return;

    $guides = array(
        'ghid-bitcoin-incepatori' => array(
            'title' => 'Ghid Bitcoin pentru Începători (2025)',
            'content' => bitcoinul_ro_render_guide_content('incepatori'),
        ),
        'cum-sa-cumperi-bitcoin-in-romania' => array(
            'title' => 'Cum să cumperi Bitcoin în România: metode, comisioane, pași',
            'content' => bitcoinul_ro_render_guide_content('cumparare'),
        ),
        'securitate-portofele-si-custodie' => array(
            'title' => 'Securitate Bitcoin: Portofele, Custodie și Bune Practici',
            'content' => bitcoinul_ro_render_guide_content('securitate'),
        ),
        'strategii-de-investitii-in-bitcoin' => array(
            'title' => 'Strategii de investiții în Bitcoin: DCA, orizont, risc',
            'content' => bitcoinul_ro_render_guide_content('investitii'),
        ),
        'trading-spot-vs-derivate-bitcoin' => array(
            'title' => 'Trading Bitcoin: Spot vs. Derivate, riscuri și disciplină',
            'content' => bitcoinul_ro_render_guide_content('trading'),
        ),
        'fiscalitate-declarare-castiguri-crypto' => array(
            'title' => 'Fiscalitate Crypto în România: cum declari câștigurile',
            'content' => bitcoinul_ro_render_guide_content('fiscalitate'),
        ),
    );

    foreach ($guides as $slug => $data) {
        $existing = get_page_by_path($slug, OBJECT, array('page'));
        if ($existing) continue; // nu rescrie

        $page_id = wp_insert_post(array(
            'post_title'   => $data['title'],
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => $data['content'],
            'post_author'  => 1,
            'comment_status' => 'closed',
        ));

        if (!is_wp_error($page_id)) {
            // opțional: șablon implicit de pagină
            update_post_meta($page_id, '_wp_page_template', 'page.php');
        }
    }
}

/**
 * Generează conținut HTML pentru ghiduri în funcție de tip.
 */
function bitcoinul_ro_render_guide_content($type) {
    ob_start();
    ?>
    <div class="guide-body-pro" style="max-width:920px;margin:0 auto;">
        <div class="guide-hero" style="padding:1.5rem 0 1rem;margin-bottom:1rem;border-bottom:1px solid var(--border-light);">
            <div style="display:flex;gap:1rem;align-items:center;">
                <div style="font-size:2rem;">🎓</div>
                <div>
                    <p style="color:var(--text-secondary);margin:.25rem 0 0;">Ghid editorial bitcoinul.ro • Actualizat <?php echo date('M Y'); ?></p>
                </div>
            </div>
        </div>
        <?php if ($type==='incepatori'): ?>
            <h2>Ce este Bitcoin și de ce contează</h2>
            <p>Bitcoin este o rețea monetaryă descentralizată care permite transferul de valoare pe internet fără intermediar. Unitatea sa de cont, BTC, are ofertă limitată la 21 de milioane. Pentru începători, cel mai important este să înțeleagă principiile de bază: auto‑custodia, cheile private și tranzacțiile ireversibile.</p>
            <h3>Pașii esențiali pentru a începe</h3>
            <ol>
                <li>Înțelege riscurile și volatilitatea.</li>
                <li>Deschide un cont pe un exchange reglementat și verificat (KYC).</li>
                <li>Cumpără sume mici la început, preferabil prin <strong>DCA</strong>.</li>
                <li>Mută BTC într-un <em>wallet</em> pe care îl controlezi tu.</li>
                <li>Respectă igiena de securitate: seed phrase offline, 2FA, niciodată să nu o trimiți cuiva.</li>
            </ol>
            <blockquote>Amintește‑ți: „Nu cheile tale, nu monedele tale”.</blockquote>
            <h3>Resurse utile</h3>
            <ul>
                <li><a href="/exchange-uri" rel="nofollow">Comparația exchange‑urilor recomandate</a></li>
                <li><a href="/securitate-portofele-si-custodie/">Securitate și portofele</a></li>
                <li><a href="/strategii-de-investitii-in-bitcoin/">Strategii de investiții</a></li>
            </ul>
        <?php elseif ($type==='cumparare'): ?>
            <h2>Cum cumperi Bitcoin în România</h2>
            <p>Ai trei opțiuni populare: exchange‑uri centralizate (cel mai simplu), brokeri fintech (ex. super‑app), sau ATM‑uri BTC (comisioane mai mari). Recomandăm platforme cu lichiditate și costuri reduse.</p>
            <h3>Comparație pe scurt</h3>
            <table style="width:100%;border-collapse:separate;border-spacing:0 8px;">
                <tr><th>Metodă</th><th>Avantaje</th><th>Dezavantaje</th></tr>
                <tr><td>Exchange CEX</td><td>Comisioane mici, lichiditate</td><td>KYC, custodie la terț</td></tr>
                <tr><td>Fintech</td><td>UX simplu, cumpărare rapidă</td><td>Spread mai mare</td></tr>
                <tr><td>ATM BTC</td><td>Anonim parțial, cash</td><td>Comisioane ridicate</td></tr>
            </table>
            <h3>Pași practici</h3>
            <ol>
                <li>Crează cont și finalizează KYC.</li>
                <li>Depune RON prin card/transfer.</li>
                <li>Cumpără BTC pe spot.</li>
                <li>Transferă în wallet-ul tău.</li>
            </ol>
        <?php elseif ($type==='securitate'): ?>
            <h2>Portofele și custodie</h2>
            <p>Cheia privată îți conferă controlul absolut. Păstreaz-o offline, în siguranță. Hardware wallet-urile oferă un echilibru excelent între uzabilitate și securitate.</p>
            <h3>Bune practici</h3>
            <ul>
                <li>Scrie <em>seed phrase</em>-ul pe hârtie/placă, nu în cloud.</li>
                <li>Activează 2FA pe conturile de exchange.</li>
                <li>Verifică adresele cu atenție (clipboard malware există!).</li>
                <li>Ia în calcul <strong>multisig</strong> pentru sume mari.</li>
            </ul>
            <h3>Tipuri de wallet</h3>
            <p><strong>Hardware</strong> (ledger/trezor), <strong>software</strong> (mobile/desktop), <strong>paper</strong> (avansat). Pentru majoritatea, hardware + verificare adresă pe ecran este ideal.</p>
        <?php elseif ($type==='investitii'): ?>
            <h2>Strategii de investiții</h2>
            <p>Strategia populară este DCA: cumpărare periodică a aceleiași sume, indiferent de preț. Adaugă o regulă clară de <em>risk management</em> și un orizont minim de 4 ani.</p>
            <h3>Reguli cheie</h3>
            <ul>
                <li>Nu investi bani de care ai nevoie pe termen scurt.</li>
                <li>Automatizează achizițiile (DCA) pentru disciplină.</li>
                <li>Rebalansează portofoliul anual.</li>
                <li>Ține evidența costului mediu și a taxelor.</li>
            </ul>
            <h3>Greșeli frecvente</h3>
            <ul>
                <li>Levier fără experiență.</li>
                <li>Vânzare emoțională la scăderi temporare.</li>
                <li>Nesecurizarea seed phrase-ului.</li>
            </ul>
        <?php elseif ($type==='trading'): ?>
            <h2>Trading responsabil: spot vs. derivate</h2>
            <p>Derivatele sunt pentru traderi avansați. Levierul amplifică atât câștigurile, cât și pierderile. Dacă ești la început, rămâi pe spot și învață bazele analizei tehnice.</p>
            <h3>Checklist trader</h3>
            <ul>
                <li>Plan de tranzacționare clar: intrare, ieșire, invalidare.</li>
                <li>Risk per tranzacție ≤ 1–2% din capital.</li>
                <li>Fără overtrading; jurnal de tranzacționare.</li>
            </ul>
            <h3>Indicatori de bază</h3>
            <p>MA/EMA, RSI, nivele S/R, volum. Evită „magia” indicatorilor combinați fără testare.</p>
        <?php elseif ($type==='fiscalitate'): ?>
            <h2>Fiscalitate: cum declari câștigurile</h2>
            <p>În România, câștigurile din tranzacții crypto se declară în Declarația Unică. Ține evidența tranzacțiilor și a costului de achiziție. Informează-te periodic, reglementările se pot actualiza.</p>
            <h3>Pași practici</h3>
            <ol>
                <li>Exportă istoricul tranzacțiilor din exchange.</li>
                <li>Calculează câștigul/pierderea (FIFO cel mai uzual).</li>
                <li>Completează Declarația Unică în termen.</li>
            </ol>
            <p><em>Acest material are caracter informativ și nu reprezintă consultanță fiscală.</em></p>
        <?php endif; ?>
        <div class="guide-cta-bar" style="margin:2rem 0 0;display:flex;gap:.75rem;flex-wrap:wrap;">
            <a class="btn" href="/exchange-uri" style="background:linear-gradient(135deg,#f7931a,#ff6b00);color:#fff;padding:.9rem 1.2rem;border-radius:12px;text-decoration:none;font-weight:700;">Vezi Exchange-uri recomandate →</a>
            <a class="btn" href="/securitate-portofele-si-custodie/" style="background:#111827;color:#fff;padding:.9rem 1.2rem;border-radius:12px;text-decoration:none;font-weight:700;">Învață Securitatea →</a>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Auto-seed: creează ghidurile o singură dată după deploy, fără intervenție manuală.
 */
function bitcoinul_ro_autoseed_guides_once() {
    if (get_transient('bitcoinul_ro_guides_seeded')) return;
    // Creează ghidurile (idempotent)
    bitcoinul_ro_create_guide_pages();
    set_transient('bitcoinul_ro_guides_seeded', 1, 12 * HOUR_IN_SECONDS);
}
add_action('init', 'bitcoinul_ro_autoseed_guides_once', 40);

/**
 * Funcție pentru debug - forțează recrearea paginilor
 * Rulează această funcție în admin pentru a recrea paginile
 */
function bitcoinul_ro_force_recreate_pages() {
    // Șterge paginile existente
    $pages_to_delete = array('exchange-uri', 'ghiduri', 'stiri', 'calculatoare-bitcoin');
    
    foreach ($pages_to_delete as $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            wp_delete_post($page->ID, true);
        }
    }
    
    // Recreează paginile
    bitcoinul_ro_create_pages();
    
    // Flush rewrite rules
    flush_rewrite_rules();
}

/**
 * Permite recrearea paginilor prin URL
 */
function bitcoinul_ro_handle_page_recreation() {
    // Verifică dacă parametrul este prezent în URL și utilizatorul are permisiuni
    if (isset($_GET['recreate_pages']) && current_user_can('manage_options')) {
        // Corecție: apelează funcția existentă
        bitcoinul_ro_force_recreate_pages();
        
        // Redirect cu mesaj de succes
        wp_redirect(add_query_arg(array(
            'recreate_pages' => false,
            'pages_recreated' => 'success'
        ), admin_url()));
        exit;
    }
    
    // Afișează mesajul de succes
    if (isset($_GET['pages_recreated']) && $_GET['pages_recreated'] === 'success') {
        add_action('admin_notices', function() {
            echo '<div class="notice notice-success is-dismissible">';
            echo '<p><strong>Succes!</strong> Paginile au fost recreate cu succes. Meniul ar trebui să funcționeze acum.</p>';
            echo '</div>';
        });
    }
}
add_action('admin_init', 'bitcoinul_ro_handle_page_recreation');

// Înregistrează funcția pentru admin (optional - pentru debugging)
function bitcoinul_ro_admin_recreate_pages() {
    if (isset($_GET['recreate_pages']) && current_user_can('manage_options')) {
        bitcoinul_ro_force_recreate_pages();
        wp_redirect(admin_url('themes.php?pages_recreated=1'));
        exit;
    }
}
add_action('admin_init', 'bitcoinul_ro_admin_recreate_pages');

/**
 * Fix rapid pentru routing-ul paginii Exchange-uri pe producție
 * Accesează /wp-admin/?fix_exchanges_routing=1 ca admin pentru a rula.
 * - Se asigură că pagina cu slug-ul 'exchange-uri' există și are template-ul corect.
 * - Forțează flush la rewrite rules astfel încât /exchange-uri/ să trimită către pagină, nu către arhivă.
 */
function bitcoinul_ro_fix_exchanges_routing() {
    if (!is_admin() || !current_user_can('manage_options')) return;
    if (!isset($_GET['fix_exchanges_routing'])) return;

    // 1) Creează/actualizează pagina 'exchange-uri' cu template-ul corect
    $slug = 'exchange-uri';
    $title = 'Exchange-uri Bitcoin România';
    $template = 'page-exchange-uri.php';

    $page = get_page_by_path($slug);
    if (!$page) {
        $page_id = wp_insert_post(array(
            'post_title'   => $title,
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ));
        if ($page_id && !is_wp_error($page_id)) {
            update_post_meta($page_id, '_wp_page_template', $template);
        }
    } else {
        update_post_meta($page->ID, '_wp_page_template', $template);
    }

    // 2) Flush rewrite rules pentru a invalida cache-ul de permalinkuri
    bitcoinul_ro_custom_post_types();
    flush_rewrite_rules();

    // 3) Afișează un mesaj în admin
    add_action('admin_notices', function() {
        echo '<div class="notice notice-success is-dismissible"><p>Routing-ul pentru /exchange-uri/ a fost reparat. Dacă folosești cache (plugin/Cloudflare), golește-l.</p></div>';
    });
}
add_action('admin_init', 'bitcoinul_ro_fix_exchanges_routing');

/**
 * Auto-fix routing for /exchange-uri/ after deploying theme files.
 * If rewrite rules point /exchange-uri/ to the CPT archive instead of the page,
 * we flush rules once automatically so the page template takes precedence.
 */
function bitcoinul_ro_autofix_exchange_page_routing() {
    // Run only on front-end to avoid slowing down admin; ensure CPTs are registered first.
    if (is_admin()) return;

    // Avoid repeated flush within a short window
    if (get_transient('bitcoinul_ro_routing_fix_done')) return;

    $page = get_page_by_path('exchange-uri');
    if (!$page) return; // No page, nothing to fix automatically.

    // Read current rewrite rules
    $rules = get_option('rewrite_rules');
    if (!is_array($rules)) return;

    // If a rule for ^exchange-uri/?$ exists and routes to a post_type archive, flush.
    // Desired is index.php?pagename=exchange-uri; undesired is index.php?post_type=exchange
    foreach ($rules as $pattern => $target) {
        if ($pattern === '^exchange-uri/?$') {
            if (strpos($target, 'post_type=exchange') !== false && strpos($target, 'pagename=exchange-uri') === false) {
                // Make sure CPTs are registered, then flush once
                bitcoinul_ro_custom_post_types();
                flush_rewrite_rules(false);
                set_transient('bitcoinul_ro_routing_fix_done', 1, HOUR_IN_SECONDS);
            }
            break;
        }
    }
}
// Run late in init to ensure CPT registration already happened
add_action('init', 'bitcoinul_ro_autofix_exchange_page_routing', 50);

/**
 * Generic auto-fix for important pages (exchange-uri, ghiduri).
 * Ensures the pages exist with the right templates and that rewrite rules route
 * to the page, not to conflicting archives. Runs once per hour on frontend.
 */
function bitcoinul_ro_autofix_important_pages() {
    if (is_admin()) return; // avoid overhead in admin

    // Avoid repeated work in a short window
    // Bump the transient key to force one more pass after adding /stiri/ și /calculatoare-bitcoin/
    $autofix_key = 'bitcoinul_ro_pages_autofix_done_v3';
    if (get_transient($autofix_key)) return;

    $pages = array(
        'exchange-uri' => array(
            'title' => 'Exchange-uri Bitcoin România',
            'template' => 'page-exchange-uri.php',
        ),
        'ghiduri' => array(
            'title' => 'Ghiduri Bitcoin & Crypto',
            'template' => 'page-ghiduri.php',
        ),
        'stiri' => array(
            'title' => 'Știri Bitcoin & Crypto',
            'template' => 'page-stiri.php',
        ),
        'calculatoare-bitcoin' => array(
            'title' => 'Calculatoare Crypto',
            'template' => 'page-calculatoare-bitcoin.php',
        ),
    );

    $need_flush = false;

    // 1) Ensure pages exist and templates are set
    foreach ($pages as $slug => $info) {
        $page = get_page_by_path($slug);
        if (!$page) {
            $page_id = wp_insert_post(array(
                'post_title'  => $info['title'],
                'post_name'   => $slug,
                'post_status' => 'publish',
                'post_type'   => 'page',
            ));
            if ($page_id && !is_wp_error($page_id)) {
                update_post_meta($page_id, '_wp_page_template', $info['template']);
                $need_flush = true;
            }
        } else {
            // Restaurează din coș și publică dacă e nevoie
            if ($page->post_status === 'trash') {
                wp_untrash_post($page->ID);
                $page->post_status = 'draft';
            }
            if ($page->post_status !== 'publish') {
                wp_update_post(array('ID' => $page->ID, 'post_status' => 'publish'));
                $need_flush = true;
            }
            $current_tpl = get_post_meta($page->ID, '_wp_page_template', true);
            if ($current_tpl !== $info['template']) {
                update_post_meta($page->ID, '_wp_page_template', $info['template']);
                $need_flush = true;
            }
        }
    }

    // 2) Validate rewrite rules route to pages
    $rules = get_option('rewrite_rules');
    if (is_array($rules)) {
        foreach (array('exchange-uri', 'ghiduri', 'stiri', 'calculatoare-bitcoin') as $slug) {
            $pattern = '^' . preg_quote($slug, '#') . '/?$';
            foreach ($rules as $rule => $target) {
                if ($rule === $pattern) {
                    if (strpos($target, 'pagename=' . $slug) === false) {
                        // Not pointing at the page; schedule a flush
                        $need_flush = true;
                    }
                    break;
                }
            }
        }
    }

    if ($need_flush) {
        // Make sure CPTs are registered before flushing
        bitcoinul_ro_custom_post_types();
        flush_rewrite_rules(false);
        set_transient($autofix_key, 1, HOUR_IN_SECONDS);
    }
}
add_action('init', 'bitcoinul_ro_autofix_important_pages', 60);

/**
 * Add explicit rewrite rules for key pages to avoid CPT/archive conflicts.
 */
function bitcoinul_ro_add_core_page_rewrites() {
    // Ensure CPTs are registered first so WordPress knows all routes
    bitcoinul_ro_custom_post_types();
    add_rewrite_rule('^exchange-uri/?$', 'index.php?pagename=exchange-uri', 'top');
    add_rewrite_rule('^ghiduri/?$', 'index.php?pagename=ghiduri', 'top');
    add_rewrite_rule('^stiri/?$', 'index.php?pagename=stiri', 'top');
    add_rewrite_rule('^calculatoare-bitcoin/?$', 'index.php?pagename=calculatoare-bitcoin', 'top');
}
add_action('init', 'bitcoinul_ro_add_core_page_rewrites', 20);

/**
 * Admin one-click fix: /wp-admin/?fix_pages=1
 * Ensures important pages exist with the right templates and flushes permalinks.
 */
function bitcoinul_ro_fix_pages_admin() {
    if (!is_admin() || !current_user_can('manage_options')) return;
    if (!isset($_GET['fix_pages'])) return;

    // Create/update pages using existing helper (includes guides)
    bitcoinul_ro_create_pages();
    bitcoinul_ro_custom_post_types();
    flush_rewrite_rules();

    add_action('admin_notices', function() {
        echo '<div class="notice notice-success is-dismissible"><p>Paginile importante au fost verificate/creat și permalinks au fost reîmprospătate. Verifică /exchange-uri/, /ghiduri/, /stiri/ și /calculatoare-bitcoin/ pe frontend și golește cache-ul (plugin/CDN) dacă e cazul.</p></div>';
    });
}
add_action('admin_init', 'bitcoinul_ro_fix_pages_admin');

/**
 * 404 rescue: if key slugs hit a 404 because of stale rewrites, redirect to the
 * non-pretty permalink that forces WordPress to load the correct page.
 */
function bitcoinul_ro_rescue_core_pages_on_404() {
    if (!is_404()) return;

    global $wp;
    $request = isset($wp->request) ? trim($wp->request, '/') : '';
    $core_slugs = array('exchange-uri', 'ghiduri', 'stiri', 'calculatoare-bitcoin');

    // Acceptăm atât pretty URLs cât și /?pagename=...
    $pagename_qv = get_query_var('pagename');
    $target = '';
    if (in_array($request, $core_slugs, true)) {
        $target = $request;
    } elseif (!empty($pagename_qv) && in_array($pagename_qv, $core_slugs, true)) {
        $target = $pagename_qv;
    }

    if ($target) {
        // Creează/publică pagina dacă lipsește
        $page = get_page_by_path($target);
        if (!$page) {
            // Titluri implicite per slug
            $titles = array(
                'exchange-uri' => 'Exchange-uri Bitcoin România',
                'ghiduri'      => 'Ghiduri Bitcoin & Crypto',
                'stiri'        => 'Știri Bitcoin & Crypto',
                'calculatoare-bitcoin' => 'Calculatoare Crypto',
            );
            $templates = array(
                'exchange-uri' => 'page-exchange-uri.php',
                'ghiduri'      => 'page-ghiduri.php',
                'stiri'        => 'page-stiri.php',
                'calculatoare-bitcoin' => 'page-calculatoare-bitcoin.php',
            );
            $page_id = wp_insert_post(array(
                'post_title'  => isset($titles[$target]) ? $titles[$target] : ucfirst($target),
                'post_name'   => $target,
                'post_status' => 'publish',
                'post_type'   => 'page',
            ));
            if ($page_id && !is_wp_error($page_id)) {
                if (isset($templates[$target])) {
                    update_post_meta($page_id, '_wp_page_template', $templates[$target]);
                }
            }
        } else {
            if ($page->post_status === 'trash') {
                wp_untrash_post($page->ID);
                $page->post_status = 'draft';
            }
            if ($page->post_status !== 'publish') {
                wp_update_post(array('ID' => $page->ID, 'post_status' => 'publish'));
            }
        }

        // Asigură regulile și redirecționează către URL-ul frumos
        bitcoinul_ro_custom_post_types();
        flush_rewrite_rules(false);
        wp_redirect(home_url('/' . $target . '/'), 302);
        exit;
    }
}
add_action('template_redirect', 'bitcoinul_ro_rescue_core_pages_on_404', 0);

/**
 * AJAX proxy pentru CryptoPanic (știri) – evită CORS în browser și ascunde tokenul.
 * Endpoint: /wp-admin/admin-ajax.php?action=bitcoinul_ro_fetch_news&page=1&kind=news&currencies=BTC,ETH
 */
function bitcoinul_ro_fetch_news_ajax() {
    // Permite acces public (nu doar logat)
    $token = trim(get_theme_mod('bitcoinul_ro_news_api_token', ''));
    if (empty($token)) {
        wp_send_json_error(array('message' => 'Lipsește token-ul API (Customizer > Setări Bitcoinul.ro).'));
    }

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $kind = isset($_GET['kind']) ? sanitize_text_field($_GET['kind']) : 'news';
    $curr = isset($_GET['currencies']) ? preg_replace('/[^A-Z,]/', '', $_GET['currencies']) : 'BTC,ETH';

    $url = add_query_arg(array(
        'auth_token' => $token,
        'page'       => max(1, $page),
        'kind'       => $kind,
        'currencies' => $curr,
    ), 'https://cryptopanic.com/api/free/v1/posts/');

    $resp = wp_remote_get($url, array('timeout' => 12, 'headers' => array('Accept' => 'application/json')));
    if (is_wp_error($resp)) {
        wp_send_json_error(array('message' => $resp->get_error_message()));
    }

    $code = wp_remote_retrieve_response_code($resp);
    $body = wp_remote_retrieve_body($resp);
    if ($code !== 200) {
        wp_send_json_error(array('message' => 'API error', 'status' => $code, 'body' => $body));
    }

    $data = json_decode($body, true);
    if (!is_array($data)) {
        wp_send_json_error(array('message' => 'Invalid API response'));
    }

    wp_send_json_success($data);
}
add_action('wp_ajax_bitcoinul_ro_fetch_news', 'bitcoinul_ro_fetch_news_ajax');
add_action('wp_ajax_nopriv_bitcoinul_ro_fetch_news', 'bitcoinul_ro_fetch_news_ajax');