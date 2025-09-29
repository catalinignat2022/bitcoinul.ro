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
            'affiliate_link' => '#binance-affiliate',
            'description' => 'Cea mai mare platformă de tranzacționare crypto din lume'
        ),
        array(
            'name' => 'Coinbase Pro',
            'logo' => 'C',
            'rating' => 4.6,
            'badge' => 'Cel mai sigur',
            'features' => array(
                'Cea mai mare siguranță din lume',
                'Reglementat în SUA și Europa',
                'Interfață perfectă pentru începători',
                'Asigurare fonduri până la $250,000',
                'Card de debit Bitcoin gratuit',
                'Câștigă 4% APY pe staking'
            ),
            'affiliate_link' => '#coinbase-affiliate',
            'description' => 'Exchange-ul cel mai de încredere pentru începători'
        ),
        array(
            'name' => 'eToro România',
            'logo' => 'e',
            'rating' => 4.2,
            'badge' => 'Social Trading',
            'features' => array(
                'Copy Trading - copiază traderii profesioniști',
                'Platformă reglementată CySEC',
                'Depunere minimă doar 50$',
                'Fără comisioane la cumpărarea Bitcoin',
                'Portofoliu diversificat crypto',
                'Comunitate activă de traderi'
            ),
            'affiliate_link' => '#etoro-affiliate',
            'description' => 'Platforma ideală pentru social trading'
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
                        <a href="<?php echo esc_url($exchange['affiliate_link']); ?>" class="exchange-cta" rel="nofollow sponsored">
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
        'has_archive'  => true,
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'    => 'dashicons-chart-line',
        'rewrite'      => array('slug' => 'exchange-uri'),
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
            // Dacă pagina există, actualizează template-ul
            if (isset($page_data['template'])) {
                update_post_meta($existing_page->ID, '_wp_page_template', $page_data['template']);
            }
        }
    }
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
 * Funcție pentru debug - forțează recrearea paginilor
 * Rulează această funcție în admin pentru a recrea paginile
 */
function bitcoinul_ro_force_recreate_pages() {
    // Șterge paginile existente
    $pages_to_delete = array('exchange-uri', 'ghiduri', 'stiri');
    
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
        bitcoinul_ro_recreate_pages();
        
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