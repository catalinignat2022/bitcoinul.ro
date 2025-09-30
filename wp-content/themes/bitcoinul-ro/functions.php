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
    // Configurează titlul și tagline-ul site-ului pentru SEO (rulează la after_setup_theme încă o dată)
    add_action('after_setup_theme', 'bitcoinul_ro_set_site_info');

    // Suport pentru traduceri
    load_theme_textdomain('bitcoinul-ro', get_template_directory() . '/languages');

    // Suport pentru feed-uri automate
    add_theme_support('automatic-feed-links');

    // Suport pentru title tag dinamic
    add_theme_support('title-tag');

    // Suport pentru imagini featured
    add_theme_support('post-thumbnails');

    // Dimensiuni personalizate pentru imagini
    add_image_size('exchange-logo', 300, 200, true);
    add_image_size('article-thumbnail', 400, 250, true);
    add_image_size('hero-image', 1200, 600, true);

    // Suport HTML5
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style'
    ));

    // Logo personalizat
    add_theme_support('custom-logo', array(
        'height' => 80,
        'width'  => 300,
        'flex-width' => true,
        'flex-height'=> true,
    ));

    // Meniuri
    register_nav_menus(array(
        'primary'  => 'Meniu Principal',
        'footer'   => 'Meniu Footer',
        'exchanges'=> 'Meniu Exchange-uri'
    ));

    // Gutenberg styles & wide align
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');

    // Paletă culori editor
    add_theme_support('editor-color-palette', array(
        array('name' => 'Bitcoin Orange','slug'=>'bitcoin-orange','color'=>'#f7931a'),
        array('name' => 'Bitcoin Dark','slug'=>'bitcoin-dark','color'=>'#ff6b00'),
        array('name' => 'Success Green','slug'=>'success-green','color'=>'#16a085'),
    ));
}
add_action('after_setup_theme', 'bitcoinul_ro_setup');

/**
 * Înregistrează și încarcă scripturile și stilurile temei
 */
function bitcoinul_ro_scripts() {
    // Stil principal stylesheet (style.css)
    wp_enqueue_style(
        'bitcoinul-ro-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

    // Fonturi (dacă sunt necesare)
    wp_enqueue_style(
        'bitcoinul-ro-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Script principal
    wp_enqueue_script(
        'bitcoinul-ro-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        wp_get_theme()->get('Version'),
        true
    );

    // Localizare date AJAX (dacă js folosește)
    wp_localize_script('bitcoinul-ro-main', 'bitcoinul_ro_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('bitcoinul_ro_nonce'),
        'site_url' => home_url('/')
    ));

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bitcoinul_ro_scripts');

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
                        <a href="<?php echo esc_url($exchange['affiliate_link']); ?>" class="exchange-cta" data-exchange="<?php echo esc_attr($exchange['name']); ?>" target="_blank" rel="nofollow sponsored noopener noreferrer">
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
        ),
        'cum-cumpar-bitcoin' => array(
            'title' => 'Cum cumpăr Bitcoin? Tutorial (Spot)',
            'template' => 'page-cum-cumpar-bitcoin.php'
        ),
        'portofel-bitcoin-sigur' => array(
            'title' => 'Portofele Bitcoin sigure (Ledger & self-custody)',
            'template' => 'page-portofel-bitcoin-sigur.php'
        ),
        'taxe-bitcoin-romania' => array(
            'title' => 'Taxe Bitcoin în România – ghid explicat (informativ)',
            'template' => 'page-taxe-bitcoin-romania.php'
        ),
        'termeni-conditii' => array(
            'title' => 'Termeni și condiții',
            'template' => 'page-termeni-conditii.php'
        ),
        'politica-confidentialitate' => array(
            'title' => 'Politica de confidențialitate',
            'template' => 'page-politica-confidentialitate.php'
        ),
        'disclaimer-investitii' => array(
            'title' => 'Disclaimer investiții',
            'template' => 'page-disclaimer-investitii.php'
        ),
        'comparatie-exchange-uri' => array(
            'title' => 'Comparație Exchange-uri Bitcoin',
            'template' => 'page-comparatie-exchange-uri.php'
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
    // Configurează meniul de footer și leagă "Cum cumpăr Bitcoin?"
    bitcoinul_ro_setup_footer_menu_links();
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
 * Auto-seed: creează paginile legale o singură dată după deploy.
 */
function bitcoinul_ro_autoseed_legal_pages_once() {
    $k = 'bitcoinul_ro_legal_pages_seeded_v2';
    if (get_transient($k)) return;
    // Creează/actualizează paginile (idempotent)
    bitcoinul_ro_create_pages();
    set_transient($k, 1, 12 * HOUR_IN_SECONDS);
}
add_action('init', 'bitcoinul_ro_autoseed_legal_pages_once', 42);

/**
 * Creează/completează meniul de footer cu linkurile cheie (DCA/Calculatoare și tutorialul de cumpărare)
 */
function bitcoinul_ro_setup_footer_menu_links() {
    // Identifică meniul de footer prin locația 'footer' sau, dacă lipsește, prin nume/slug
    $footer_menu = null;
    $locations = get_nav_menu_locations();
    if (isset($locations['footer']) && $locations['footer']) {
        $footer_menu = wp_get_nav_menu_object($locations['footer']);
    }
    if (!$footer_menu) {
        // încearcă prin nume uzuale
        $footer_menu = wp_get_nav_menu_object('Footer Menu');
    }
    if (!$footer_menu) {
        $footer_menu = wp_get_nav_menu_object('footer-menu');
    }
    if (!$footer_menu) {
        // Creează meniul Footer și mapează la locația 'footer'
        $footer_menu_id = wp_create_nav_menu('Footer Menu');
        if ($footer_menu_id) {
            $locs = get_theme_mod('nav_menu_locations');
            $locs = is_array($locs) ? $locs : array();
            $locs['footer'] = $footer_menu_id;
            set_theme_mod('nav_menu_locations', $locs);
            $footer_menu = wp_get_nav_menu_object($footer_menu_id);
        }
    }

    if ($footer_menu) {
        $footer_menu_id = $footer_menu->term_id;
        // Linkuri de asigurat în footer
        $targets = array(
            array('title' => 'Știri Bitcoin', 'url' => home_url('/stiri/')),
            array('title' => 'Cum cumpăr Bitcoin?', 'url' => home_url('/cum-cumpar-bitcoin/')),
            array('title' => 'Calculatoare crypto', 'url' => home_url('/calculatoare-bitcoin/')),
            array('title' => 'Portofele Bitcoin sigure', 'url' => home_url('/portofel-bitcoin-sigur/')),
            array('title' => 'Taxe Bitcoin în România', 'url' => home_url('/taxe-bitcoin-romania/')),
            array('title' => 'Termeni și condiții', 'url' => home_url('/termeni-conditii/')),
            array('title' => 'Politica de confidențialitate', 'url' => home_url('/politica-confidentialitate/')),
            array('title' => 'Disclaimer investiții', 'url' => home_url('/disclaimer-investitii/')),
        );

        // Ia elementele existente
        $items = wp_get_nav_menu_items($footer_menu_id);
        $existing = array();
        if ($items) {
            foreach ($items as $it) {
                $existing[untrailingslashit($it->url)] = true;
            }
                // Corectează eventualul link greșit /stiri în /stiri
            foreach ($items as $it) {
                $url = untrailingslashit($it->url);
                $title = isset($it->title) ? $it->title : '';
                $isStiriTitle = (stripos($title, 'Știri') !== false) || (stripos($title, 'Stiri') !== false);
                if (preg_match('#/stiri$#', $url) || ($isStiriTitle && !preg_match('#/stiri/?$#', $url))) {
                    wp_update_nav_menu_item($footer_menu_id, $it->ID, array(
                        'menu-item-title' => $it->title,
                        'menu-item-url'   => home_url('/stiri/'),
                        'menu-item-status'=> 'publish',
                        'menu-item-type'  => 'custom'
                    ));
                    // marchează noul URL ca existent
                    $existing[untrailingslashit(home_url('/stiri/'))] = true;
                }
            }

            // Elimină exact „Despre noi” și „Contact” dacă există (pot fi adăugate de teme/plug-in-uri anterioare)
            if ($items) {
                foreach ($items as $it) {
                    $title = isset($it->title) ? trim($it->title) : '';
                    $title_norm = function_exists('mb_strtolower') ? mb_strtolower($title) : strtolower($title);
                    if ($title_norm === 'despre noi' || $title_norm === 'contact') {
                    wp_delete_post($it->ID, true);
                    }
                }
            }
        }

        foreach ($targets as $t) {
            $key = untrailingslashit($t['url']);
            if (!isset($existing[$key])) {
                wp_update_nav_menu_item($footer_menu_id, 0, array(
                    'menu-item-title' => $t['title'],
                    'menu-item-url'   => $t['url'],
                    'menu-item-status'=> 'publish',
                    'menu-item-type'  => 'custom'
                ));
            }
        }
    }
}

// Rulează o dată la 12h și pe medii existente (nu doar la activarea temei)
add_action('init', function(){
    $k = 'bitcoinul_ro_footer_menu_links_done_v5';
    if (get_transient($k)) return;
    bitcoinul_ro_setup_footer_menu_links();
    set_transient($k, 1, 12 * HOUR_IN_SECONDS);
}, 55);

/**
 * Filtrează elementele din meniul de footer la randare pentru a ascunde orice apariție
 * a titlurilor „Despre noi” și „Contact”, indiferent de persistența din DB.
 */
function bitcoinul_ro_filter_footer_menu_items($items, $args) {
    if (!isset($args->theme_location) || $args->theme_location !== 'footer') return $items;
    $filtered = array();
    foreach ((array)$items as $it) {
        $title = isset($it->title) ? trim($it->title) : '';
        $title_norm = function_exists('mb_strtolower') ? mb_strtolower($title) : strtolower($title);
        if ($title_norm === 'despre noi' || $title_norm === 'contact') {
            continue; // sar peste aceste item-uri
        }
        $filtered[] = $it;
    }
    return $filtered;
}
add_filter('wp_nav_menu_objects', 'bitcoinul_ro_filter_footer_menu_items', 20, 2);

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
        'cum-cumpar-bitcoin' => array(
            'title' => 'Cum cumpăr Bitcoin? Tutorial (Spot)',
            'template' => 'page-cum-cumpar-bitcoin.php',
        ),
        'comparatie-exchange-uri' => array(
            'title' => 'Comparație Exchange-uri Bitcoin',
            'template' => 'page-comparatie-exchange-uri.php',
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
    foreach (array('exchange-uri', 'ghiduri', 'stiri', 'calculatoare-bitcoin', 'cum-cumpar-bitcoin', 'portofel-bitcoin-sigur', 'taxe-bitcoin-romania', 'comparatie-exchange-uri') as $slug) {
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
    add_rewrite_rule('^cum-cumpar-bitcoin/?$', 'index.php?pagename=cum-cumpar-bitcoin', 'top');
    add_rewrite_rule('^portofel-bitcoin-sigur/?$', 'index.php?pagename=portofel-bitcoin-sigur', 'top');
    add_rewrite_rule('^taxe-bitcoin-romania/?$', 'index.php?pagename=taxe-bitcoin-romania', 'top');
    add_rewrite_rule('^comparatie-exchange-uri/?$', 'index.php?pagename=comparatie-exchange-uri', 'top');
    // Legal pages
    add_rewrite_rule('^termeni-conditii/?$', 'index.php?pagename=termeni-conditii', 'top');
    add_rewrite_rule('^politica-confidentialitate/?$', 'index.php?pagename=politica-confidentialitate', 'top');
    add_rewrite_rule('^disclaimer-investitii/?$', 'index.php?pagename=disclaimer-investitii', 'top');
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
 * Admin one-click: /wp-admin/?fix_footer=1
 * Forțează reconfigurarea meniului de footer (șterge transientul și rulează imediat).
 */
function bitcoinul_ro_fix_footer_admin() {
    if (!is_admin() || !current_user_can('manage_options')) return;
    if (!isset($_GET['fix_footer'])) return;
    delete_transient('bitcoinul_ro_footer_menu_links_done_v3');
    bitcoinul_ro_setup_footer_menu_links();
    add_action('admin_notices', function(){
        echo '<div class="notice notice-success is-dismissible"><p>Meniul de footer a fost recreat: linkurile legale au fost adăugate, iar „Despre noi” și „Contact” au fost eliminate.</p></div>';
    });
}
add_action('admin_init', 'bitcoinul_ro_fix_footer_admin');

/**
 * 404 rescue: if key slugs hit a 404 because of stale rewrites, redirect to the
 * non-pretty permalink that forces WordPress to load the correct page.
 */
function bitcoinul_ro_rescue_core_pages_on_404() {
    if (!is_404()) return;

    global $wp;
    $request = isset($wp->request) ? trim($wp->request, '/') : '';
    $core_slugs = array('exchange-uri', 'ghiduri', 'stiri', 'calculatoare-bitcoin');
    $core_slugs[] = 'cum-cumpar-bitcoin';
    $core_slugs[] = 'portofel-bitcoin-sigur';
    $core_slugs[] = 'taxe-bitcoin-romania';
    $core_slugs[] = 'comparatie-exchange-uri';

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
                'comparatie-exchange-uri' => 'Comparație Exchange-uri Bitcoin',
            );
            $templates = array(
                'exchange-uri' => 'page-exchange-uri.php',
                'ghiduri'      => 'page-ghiduri.php',
                'stiri'        => 'page-stiri.php',
                'calculatoare-bitcoin' => 'page-calculatoare-bitcoin.php',
                'comparatie-exchange-uri' => 'page-comparatie-exchange-uri.php',
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
    $mod_token = trim(get_theme_mod('bitcoinul_ro_news_api_token', ''));
    $const_token = defined('BITCOINUL_RO_CRYPTOPANIC_TOKEN') ? trim(constant('BITCOINUL_RO_CRYPTOPANIC_TOKEN')) : '';
    $token = $mod_token ?: $const_token;
    if (empty($token)) {
        wp_send_json_error(array('message' => 'Lipsește token-ul API (Customizer > Setări Bitcoinul.ro).'));
    }

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $kind = isset($_GET['kind']) ? sanitize_text_field($_GET['kind']) : 'news';
    $curr = isset($_GET['currencies']) ? preg_replace('/[^A-Z,]/', '', $_GET['currencies']) : 'BTC,ETH';
    // Permit optional override to force public mode (&public=1) otherwise we try private first for richer fields
    $force_public = isset($_GET['public']) && ( $_GET['public'] === '1' || strtolower($_GET['public']) === 'true');
    $debug_mode = isset($_GET['debug']) && ( $_GET['debug'] === '1' || strtolower($_GET['debug']) === 'true');
    $scrape_mode = isset($_GET['scrape']) && ( $_GET['scrape'] === '1' || strtolower($_GET['scrape']) === 'true');
    // Nu filtrăm pe limbi; păstrăm conținutul original din API
    $regions = '';

    // Cache agresiv: implicit 3 ore (configurabil prin constanta BITCOINUL_RO_NEWS_CACHE_TTL)
    $no_cache = isset($_GET['nocache']) && ($_GET['nocache'] === '1' || $_GET['nocache'] === 'true');
    $cache_ttl = defined('BITCOINUL_RO_NEWS_CACHE_TTL') ? max(60, (int) constant('BITCOINUL_RO_NEWS_CACHE_TTL')) : 3 * HOUR_IN_SECONDS; // minim 60s siguranță
    // Selectăm implicit API v1 conform cerinței; se poate forța v2 cu &v2=1 sau &use_v2=1
    $want_v2 = (
        (isset($_GET['v2']) && ( $_GET['v2']==='1' || strtolower($_GET['v2'])==='true')) ||
        (isset($_GET['use_v2']) && ( $_GET['use_v2']==='1' || strtolower($_GET['use_v2'])==='true'))
    );
    $api_version = $want_v2 ? 'v2' : 'v1';

    $cache_key = 'bitcoinul_ro_news_' . md5(serialize(array(
        'page'    => (int) $page,
        'kind'    => (string) $kind,
        'curr'    => (string) $curr,
        'regions' => (string) ($regions ?: ''),
        // include explicit public request flag (only the user intent, not fallback)
        'public'  => $force_public ? 'true' : 'false',
        // include metadata flag as we now request extra fields
        'metadata'=> 'true',
        'api_version' => $api_version,
    )));
    $cached = $no_cache ? false : get_transient($cache_key);
    if ($cached) {
        // Returnează exact payload-ul salvat anterior
        wp_send_json_success($cached);
    }

    // 1) CryptoPanic API: by default folosim v1 (/api/v1/posts/) conform cerinței; opțional forțăm v2 cu &v2=1
    $base_endpoint = $api_version === 'v2' ? 'https://cryptopanic.com/api/developer/v2/posts/' : 'https://cryptopanic.com/api/v1/posts/';
    $args = array('timeout' => 14, 'headers' => array('Accept' => 'application/json'));
    $code = 0; $body = ''; $last_url = ''; $mode = '';

    $primary_qs = array(
        'auth_token' => $token,
        'page'       => max(1, (int) $page),
        'kind'       => $kind,
        'currencies' => $curr,
    );
    // Menținem metadata=true pentru v2; pentru v1 îl adăugăm doar dacă planul îl suportă – lăsăm activ oricum (nu dă eroare, ignorat dacă nu e permis)
    $primary_qs['metadata'] = 'true';
    if ($force_public) {
        $primary_qs['public'] = 'true';
    }
    $url = add_query_arg($primary_qs, $base_endpoint);
    $last_url = $url;
    $resp = wp_remote_get($url, $args);
    $code = is_wp_error($resp) ? 0 : wp_remote_retrieve_response_code($resp);
    $body = is_wp_error($resp) ? '' : wp_remote_retrieve_body($resp);
    $mode = $force_public ? 'public_forced' : 'private_first';

    $normalized_results = array();
    if ($code === 200 && !empty($body)) {
        $data = json_decode($body, true);
        if (is_array($data)) {
            if (isset($data['results']) && is_array($data['results'])) {
                $normalized_results = $data['results'];
            } elseif (isset($data['data']['results']) && is_array($data['data']['results'])) {
                $normalized_results = $data['data']['results'];
            }
        }
    }

    // Dacă nu am forțat public și lipsesc câmpuri (original_url sau source) încercăm fallback public=true
    $fallback_used = false;
    if (!$force_public && $code === 200 && !empty($normalized_results)) {
        $probe = $normalized_results[0];
        $missing_key_fields = !isset($probe['original_url']) || !isset($probe['source']);
        if ($missing_key_fields) {
            $fallback_qs = $primary_qs;
            $fallback_qs['public'] = 'true';
            $fallback_url = add_query_arg($fallback_qs, $base_endpoint);
            $fallback_resp = wp_remote_get($fallback_url, $args);
            $fallback_code = is_wp_error($fallback_resp) ? 0 : wp_remote_retrieve_response_code($fallback_resp);
            if ($fallback_code === 200) {
                $fallback_body = is_wp_error($fallback_resp) ? '' : wp_remote_retrieve_body($fallback_resp);
                if (!empty($fallback_body)) {
                    $fb_data = json_decode($fallback_body, true);
                    if (is_array($fb_data)) {
                        $fb_results = array();
                        if (isset($fb_data['results']) && is_array($fb_data['results'])) {
                            $fb_results = $fb_data['results'];
                        } elseif (isset($fb_data['data']['results']) && is_array($fb_data['data']['results'])) {
                            $fb_results = $fb_data['data']['results'];
                        }
                        if (!empty($fb_results)) {
                            $normalized_results = $fb_results;
                            $last_url = $fallback_url;
                            $mode = 'public_fallback';
                            $fallback_used = true;
                        }
                    }
                }
            }
        }
    }

    // Metadate pentru debugging
    $meta = array(
        'endpoint' => $last_url,
        'plan' => $api_version === 'v2' ? 'developer-v2' : 'core-v1',
        'api_version' => $api_version,
        'mode' => $mode,
        'fallback_public_used' => $fallback_used,
        'cache_ttl' => $cache_ttl,
    );
    // verifică primul item pentru câmpuri v2
    if (!empty($normalized_results) && is_array($normalized_results)) {
        $first = $normalized_results[0];
        $meta['has_original_url'] = isset($first['original_url']);
        $meta['has_source'] = isset($first['source']);
    }

    // Dacă lipsesc câmpurile v2 (ex: original_url), încearcă un fallback cu RSS ca să extragem linkul sursei
    $needs_rss_enrichment = false;
    if (!empty($normalized_results)) {
        $probe = $normalized_results[0];
        if (!isset($probe['original_url'])) {
            $needs_rss_enrichment = true;
        }
    }

    // Înainte de RSS, încearcă să îmbogățești din FREE v1 (de obicei include url -> sursă originală)
    $needs_v1_enrichment = $needs_rss_enrichment;
    if ($needs_v1_enrichment) {
        $v1_url = add_query_arg(array(
            'auth_token' => $token,
            'page'       => max(1, (int) $page),
            'kind'       => $kind,
            'currencies' => $curr,
            'public'     => 'true'
        ), 'https://cryptopanic.com/api/v1/posts/');
        $v1_resp = wp_remote_get($v1_url, array('timeout' => 14, 'headers' => array('Accept' => 'application/json')));
        $v1_code = is_wp_error($v1_resp) ? 0 : wp_remote_retrieve_response_code($v1_resp);
        $v1_body = is_wp_error($v1_resp) ? '' : wp_remote_retrieve_body($v1_resp);
        $meta['v1_enrichment'] = array('attempted' => true, 'ok' => ($v1_code === 200 && !empty($v1_body)));
        if ($v1_code === 200 && !empty($v1_body)) {
            $v1_data = json_decode($v1_body, true);
            if (is_array($v1_data)) {
                $v1_results = array();
                if (isset($v1_data['results']) && is_array($v1_data['results'])) {
                    $v1_results = $v1_data['results'];
                } elseif (isset($v1_data['data']['results']) && is_array($v1_data['data']['results'])) {
                    $v1_results = $v1_data['data']['results'];
                }
                if (!empty($v1_results)) {
                    // indexare pe id cu original_url/source
                    $map = array();
                    foreach ($v1_results as $it) {
                        if (!isset($it['id'])) continue;
                        $oid = (int)$it['id'];
                        $orig = '';
                        if (isset($it['original_url']) && $it['original_url']) {
                            $orig = $it['original_url'];
                        } elseif (isset($it['source']['original_url']) && $it['source']['original_url']) {
                            $orig = $it['source']['original_url'];
                        } elseif (isset($it['url'])) {
                            $orig = $it['url'];
                        }
                        if ($orig) {
                            $map[$oid] = $orig;
                        }
                    }
                    if (!empty($map)) {
                        foreach ($normalized_results as &$row) {
                            if (!isset($row['original_url']) && isset($row['id'])) {
                                $rid = (int)$row['id'];
                                if (isset($map[$rid])) {
                                    $candidate = $map[$rid];
                                    $host = parse_url($candidate, PHP_URL_HOST);
                                    if ($host && stripos($host, 'cryptopanic.com') === false) {
                                        $row['original_url'] = $candidate;
                                    }
                                }
                            }
                        }
                        unset($row);
                        $first = $normalized_results[0];
                        $meta['has_original_url'] = isset($first['original_url']);
                    }
                }
            }
        }
    }

    if ($needs_rss_enrichment) {
        // Construiește URL RSS de la același endpoint, cu aceiași parametri + format=rss (max 20 items)
        $rss_url = add_query_arg(array('format' => 'rss'), $last_url);
        $rss_resp = wp_remote_get($rss_url, array('timeout' => 14));
        $rss_code = is_wp_error($rss_resp) ? 0 : wp_remote_retrieve_response_code($rss_resp);
        $rss_body = is_wp_error($rss_resp) ? '' : wp_remote_retrieve_body($rss_resp);
        $meta['rss_enrichment'] = array('attempted' => true, 'ok' => ($rss_code === 200 && !empty($rss_body)));

        if ($rss_code === 200 && !empty($rss_body)) {
            // Parse RSS (SimpleXML)
            $rss = @simplexml_load_string($rss_body);
                if ($rss && isset($rss->channel) && isset($rss->channel->item)) {
                    $map_exact = array();      // titlu normalizat complet
                    $map_slug  = array();      // slugificat
                    $map_prefix = array();     // prefix alfanumeric (primele 40)
                    $stats_matches = 0;
                    $rss_items_store = array(); // păstrăm info pentru debug/fuzzy
                    $slugify = function($str){
                        $s = strtolower(html_entity_decode($str, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
                        $s = preg_replace('/&[a-z0-9#]+;/', ' ', $s); // entități rămase
                        $s = preg_replace('/[^a-z0-9]+/','-', $s);
                        $s = preg_replace('/-+/','-', $s);
                        $s = trim($s,'-');
                        return $s;
                    };
                    $normalize_title = function($t){
                        $t_norm = html_entity_decode($t, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                        $t_norm = preg_replace('/\s+/',' ', $t_norm);
                        return strtolower(trim($t_norm));
                    };
                    $alnum_prefix = function($t){
                        $x = preg_replace('/[^a-z0-9]/i','', strtolower($t));
                        return substr($x,0,40);
                    };
                    foreach ($rss->channel->item as $item) {
                        $t = (string) $item->title;
                        $l = (string) $item->link;
                        $pd= (string) $item->pubDate; // ex: Mon, 30 Sep 2025 10:05:00 +0000
                        $ts = 0;
                        if ($pd) {
                            $ts_try = strtotime($pd);
                            if ($ts_try) $ts = $ts_try;
                        }
                        if ($t && $l) {
                            $exact = $normalize_title($t);
                            $slugv = $slugify($t);
                            $pref  = $alnum_prefix($t);
                            if ($exact) $map_exact[$exact] = $l;
                            if ($slugv) $map_slug[$slugv] = $l;
                            if ($pref)  $map_prefix[$pref][] = $l; // prefix poate coliziona, păstrăm listă
                            $rss_items_store[] = array(
                                'title' => $t,
                                'link'  => $l,
                                'slug'  => $slugv,
                                'exact' => $exact,
                                'pref'  => $pref,
                                'ts'    => $ts,
                            );
                        }
                    }
                    foreach ($normalized_results as &$row) {
                        if (isset($row['original_url']) && $row['original_url']) continue;
                        $row_title = isset($row['title']) ? $row['title'] : '';
                        $exact_row = $normalize_title($row_title);
                        $slug_row  = isset($row['slug']) ? strtolower($row['slug']) : $slugify($row_title);
                        $pref_row  = $alnum_prefix($row_title);
                        $published_at = isset($row['published_at']) ? strtotime($row['published_at']) : 0;
                        $chosen = '';
                        if ($exact_row && isset($map_exact[$exact_row])) {
                            $chosen = $map_exact[$exact_row];
                        } elseif ($slug_row && isset($map_slug[$slug_row])) {
                            $chosen = $map_slug[$slug_row];
                        } elseif ($pref_row && isset($map_prefix[$pref_row])) {
                            // dacă sunt multiple linkuri pe același prefix, alegem primul
                            $chosen = $map_prefix[$pref_row][0];
                        }
                        // Fuzzy fallback dacă tot nu avem chosen: scor Levenshtein/similar_text pe titluri RSS
                        if (!$chosen && $row_title && !empty($rss_items_store)) {
                            $bestScore = 0; $bestLink = '';
                            foreach ($rss_items_store as $rss_it) {
                                $score = 0;
                                if (function_exists('similar_text')) {
                                    similar_text(strtolower($row_title), strtolower($rss_it['title']), $score);
                                }
                                // Penalizează dacă published_at este prea departe (>15 minute)
                                if ($published_at && isset($rss_it['ts']) && $rss_it['ts']) {
                                    $delta = abs($published_at - $rss_it['ts']);
                                    if ($delta > 900) { // >15m
                                        $score *= 0.6; // reduce relevanța
                                    }
                                }
                                if ($score > $bestScore) {
                                    $bestScore = $score; $bestLink = $rss_it['link'];
                                }
                            }
                            if ($bestScore >= 70 && $bestLink) { // prag acceptabil
                                $chosen = $bestLink;
                            }
                        }
                        if ($chosen) {
                            // evită cryptopanic
                            $host = parse_url($chosen, PHP_URL_HOST);
                            if ($host && stripos($host,'cryptopanic.com') === false) {
                                $row['original_url'] = $chosen;
                                $stats_matches++;
                            }
                        }
                    }
                    unset($row);
                    $meta['rss_enrichment']['matches'] = $stats_matches;
                    if ($debug_mode) {
                        $meta['rss_enrichment']['rss_items_sample'] = array_slice($rss_items_store, 0, 5);
                    }
            }
        }
    }

    // Încercare suplimentară: enrich per-articol folosind Developer v2 detail endpoint (/posts/{id}/)
    // Acest pas completează original_url și source acolo unde lipsesc după v1/RSS, cu cache pe item pentru a limita apelurile.
    $detail_enriched = 0;
    $detail_requests = 0;
    $detail_cache_hits = 0;
    $detail_limit = 15; // max. articole per pagină pentru care facem detail lookup
    $detail_attempted = false;
    if (!empty($normalized_results)) {
        // strânge item-urile care încă nu au original_url
        $needs_detail = array();
        foreach ($normalized_results as $row) {
            if (!isset($row['original_url']) || empty($row['original_url'])) {
                if (isset($row['id']) && $row['id']) {
                    $needs_detail[] = (int)$row['id'];
                }
            }
        }

        if (!empty($needs_detail)) {
            $detail_attempted = true;
            $needs_detail = array_slice(array_unique($needs_detail), 0, $detail_limit);

            // index pentru acces rapid la $normalized_results by id (prin referință)
            $by_id =& $normalized_results; // vom itera cu referințe pe $normalized_results direct

            foreach ($needs_detail as $post_id) {
                // cache per item
                $dk = 'bitcoinul_ro_cp_post_' . $post_id . '_v2detail';
                $detail_obj = get_transient($dk);
                if ($detail_obj && is_array($detail_obj)) {
                    $detail_cache_hits++;
                } else {
                    $detail_url = 'https://cryptopanic.com/api/developer/v2/posts/' . rawurlencode((string)$post_id) . '/';
                    $detail_url = add_query_arg(array(
                        'auth_token' => $token,
                        // încercăm fără public pentru câmpuri complete
                        'metadata'   => 'true',
                    ), $detail_url);
                    $detail_resp = wp_remote_get($detail_url, array('timeout' => 12, 'headers' => array('Accept' => 'application/json')));
                    $detail_code = is_wp_error($detail_resp) ? 0 : wp_remote_retrieve_response_code($detail_resp);
                    $detail_body = is_wp_error($detail_resp) ? '' : wp_remote_retrieve_body($detail_resp);
                    // dacă lipsesc câmpuri cheie și nu avem 403/429, încercăm fallback public pentru detail
                    if ($detail_code === 200 && $detail_body) {
                        $tmp_parsed = json_decode($detail_body, true);
                        $check_arr = $tmp_parsed;
                        if (isset($tmp_parsed['data']) && is_array($tmp_parsed['data'])) $check_arr = $tmp_parsed['data'];
                        $missing_detail_fields = is_array($check_arr) && (!isset($check_arr['original_url']) || !isset($check_arr['source']));
                        if ($missing_detail_fields) {
                            $detail_url_public = add_query_arg(array(
                                'auth_token' => $token,
                                'public'     => 'true',
                                'metadata'   => 'true',
                            ), 'https://cryptopanic.com/api/developer/v2/posts/' . rawurlencode((string)$post_id) . '/');
                            $detail_resp_pub = wp_remote_get($detail_url_public, array('timeout' => 10, 'headers' => array('Accept' => 'application/json')));
                            $detail_code_pub = is_wp_error($detail_resp_pub) ? 0 : wp_remote_retrieve_response_code($detail_resp_pub);
                            if ($detail_code_pub === 200) {
                                $detail_body_pub = is_wp_error($detail_resp_pub) ? '' : wp_remote_retrieve_body($detail_resp_pub);
                                if ($detail_body_pub) {
                                    $detail_body = $detail_body_pub; // înlocuiește corpul
                                }
                            }
                        }
                    }
                    $detail_requests++;
                    if ($detail_code === 200 && !empty($detail_body)) {
                        $parsed = json_decode($detail_body, true);
                        // normalizează – unele implementări pot înveli obiectul în 'data' sau 'results'
                        if (is_array($parsed)) {
                            if (isset($parsed['id'])) {
                                $detail_obj = $parsed;
                            } elseif (isset($parsed['data']) && is_array($parsed['data']) && isset($parsed['data']['id'])) {
                                $detail_obj = $parsed['data'];
                            } elseif (isset($parsed['results']) && is_array($parsed['results'])) {
                                // ia primul element dacă e listă
                                $first = reset($parsed['results']);
                                if (is_array($first)) $detail_obj = $first;
                            }
                        }
                        if (is_array($detail_obj)) {
                            // cache 6 ore
                            set_transient($dk, $detail_obj, 6 * HOUR_IN_SECONDS);
                        }
                    }
                }

                if (is_array($detail_obj)) {
                    // aplică enrich pe itemul cu id-ul respectiv
                    for ($i = 0, $n = count($by_id); $i < $n; $i++) {
                        if ((int)$by_id[$i]['id'] === $post_id) {
                            $changed = false;
                            // completează source dacă lipsește
                            if (!isset($by_id[$i]['source']) && isset($detail_obj['source']) && is_array($detail_obj['source'])) {
                                $by_id[$i]['source'] = $detail_obj['source'];
                                $changed = true;
                            }
                            // stabilește original_url din detail, evitând cryptopanic.com
                            if (!isset($by_id[$i]['original_url']) || empty($by_id[$i]['original_url'])) {
                                $candidates = array();
                                if (isset($detail_obj['original_url'])) $candidates[] = $detail_obj['original_url'];
                                if (isset($detail_obj['url'])) $candidates[] = $detail_obj['url'];
                                if (isset($by_id[$i]['url'])) $candidates[] = $by_id[$i]['url'];
                                foreach ($candidates as $cand) {
                                    if (!is_string($cand) || $cand === '') continue;
                                    $host = parse_url($cand, PHP_URL_HOST);
                                    if ($host && stripos($host, 'cryptopanic.com') === false) {
                                        $by_id[$i]['original_url'] = $cand;
                                        $changed = true;
                                        break;
                                    }
                                }
                            }
                            if ($changed) {
                                $detail_enriched++;
                            }
                            break;
                        }
                    }
                }
            }
        }
    }

    if (!isset($meta['detail_enrichment'])) {
        $meta['detail_enrichment'] = array(
            'attempted'   => $detail_attempted,
            'enriched'    => $detail_enriched,
            'requests'    => $detail_requests,
            'cache_hits'  => $detail_cache_hits,
            'limit'       => $detail_limit,
            'limit_hit'   => isset($needs_detail) ? (count($needs_detail) > $detail_limit) : false,
        );
    }

    // Scraping fallback (opțional &scrape=1) – ca ultimă soluție: încercăm să extragem original_url din pagina publică CryptoPanic news/{slug}/
    // Îmbunătățit: parsează script-ul __NEXT_DATA__ (Next.js) și caută recursiv câmpul original_url; dacă nu, caută linkuri externe.
    $scrape_stats = array('attempted' => false, 'enriched' => 0, 'requests' => 0, 'cache_hits' => 0, 'limit' => 8, 'limit_hit' => false, 'next_data_hits' => 0, 'external_link_used' => 0);
    if ($scrape_mode && !empty($normalized_results)) {
        $scrape_stats['attempted'] = true;
        $to_scrape = array();
        foreach ($normalized_results as $row) {
            if (empty($row['original_url']) && isset($row['slug'])) {
                $to_scrape[] = $row['slug'];
            }
        }
        if (!empty($to_scrape)) {
            if (count($to_scrape) > $scrape_stats['limit']) {
                $scrape_stats['limit_hit'] = true;
                $to_scrape = array_slice($to_scrape, 0, $scrape_stats['limit']);
            }
            foreach ($to_scrape as $slug) {
                // cache per slug
                $ck = 'bitcoinul_ro_cp_scrape_' . md5($slug);
                $cached_link = get_transient($ck);
                if ($cached_link) {
                    $scrape_stats['cache_hits']++;
                    if ($cached_link !== 'none') {
                        // aplică în results
                        for ($i=0,$n=count($normalized_results);$i<$n;$i++) {
                            if ($normalized_results[$i]['slug'] === $slug && empty($normalized_results[$i]['original_url'])) {
                                $normalized_results[$i]['original_url'] = $cached_link;
                                $scrape_stats['enriched']++;
                                break;
                            }
                        }
                    }
                    continue;
                }
                // construiește URL pagină CP (slug-based). Pattern uzual: /news/{slug}/
                $page_url = 'https://cryptopanic.com/news/' . rawurlencode($slug) . '/';
                $resp = wp_remote_get($page_url, array('timeout' => 12, 'headers' => array('Accept' => 'text/html,application/xhtml+xml,application/xml')));
                $scrape_stats['requests']++;
                if (!is_wp_error($resp)) {
                    $html = wp_remote_retrieve_body($resp);
                    if (is_string($html) && strlen($html) > 200) {
                        $picked = '';
                        // 1) Încearcă să extragi JSON din __NEXT_DATA__
                        if (preg_match('/<script id="__NEXT_DATA__"[^>]*>(\{.*?\})<\/script>/s', $html, $mm)) {
                            $json_raw = $mm[1];
                            $json_dec = json_decode($json_raw, true);
                            if (is_array($json_dec)) {
                                // căutare recursivă original_url
                                $stack = array($json_dec);
                                $found_urls = array();
                                while ($stack) {
                                    $node = array_pop($stack);
                                    if (!is_array($node)) continue;
                                    foreach ($node as $k => $v) {
                                        if ($k === 'original_url' && is_string($v) && stripos($v, 'http') === 0) {
                                            $found_urls[] = $v;
                                        } elseif (is_array($v)) {
                                            $stack[] = $v;
                                        }
                                    }
                                }
                                if (!empty($found_urls)) {
                                    // alege primul non-cryptopanic
                                    foreach ($found_urls as $fu) {
                                        $host = parse_url($fu, PHP_URL_HOST);
                                        if ($host && stripos($host,'cryptopanic.com') === false) {
                                            $picked = $fu; break;
                                        }
                                    }
                                    if ($picked) {
                                        $scrape_stats['next_data_hits']++;
                                    }
                                }
                            }
                        }
                        // 2) Dacă nu a mers JSON, fallback la linkuri externe brute
                        if (!$picked) {
                            $found = array();
                            if (preg_match_all('/href=["\'](https?:\/\/[^"\' >]+)["\']/i', $html, $m)) {
                                foreach ($m[1] as $u) {
                                    $h = parse_url($u, PHP_URL_HOST);
                                    if ($h && stripos($h, 'cryptopanic.com') === false) {
                                        if (preg_match('/\.(png|jpe?g|gif|webp|svg|css|js)(\?|$)/i', $u)) continue;
                                        $found[] = $u;
                                    }
                                }
                            }
                            if (!empty($found)) {
                                usort($found, function($a,$b){return strlen($b) - strlen($a);});
                                $picked = $found[0];
                                if ($picked) $scrape_stats['external_link_used']++;
                            }
                        }
                        set_transient($ck, $picked ? $picked : 'none', 6 * HOUR_IN_SECONDS);
                        if ($picked) {
                            for ($i=0,$n=count($normalized_results);$i<$n;$i++) {
                                if ($normalized_results[$i]['slug'] === $slug && empty($normalized_results[$i]['original_url'])) {
                                    $normalized_results[$i]['original_url'] = $picked;
                                    $scrape_stats['enriched']++;
                                    break;
                                }
                            }
                        }
                    } else {
                        set_transient($ck, 'none', 3 * HOUR_IN_SECONDS);
                    }
                } else {
                    set_transient($ck, 'none', 2 * HOUR_IN_SECONDS); // eroare rețea
                }
            }
        }
    }
    if ($scrape_mode) {
        $meta['scrape_enrichment'] = $scrape_stats;
    }

    // Dacă request-ul la v2 a eșuat, explică problema
    if ($code !== 200 || empty($body)) {
        $err_msg = $api_version === 'v2'
            ? 'CryptoPanic Developer v2 a răspuns cu eroare sau fără conținut. Verifică token-ul și planul (ai nevoie minim de Developer).'
            : 'CryptoPanic Core v1 a răspuns cu eroare sau fără conținut. Verifică token-ul, parametrii și limita de rată. (Dacă mai vrei câmpuri suplimentare încearcă &v2=1)';
        $err = array(
            'message' => $err_msg,
            'http_code' => $code,
            'endpoint' => $last_url,
            'api_version' => $api_version,
        );
        wp_send_json_error($err, 502);
    }

    // Asigură original_url atunci când e posibil (fără a trimite către cryptopanic.com)
    if (!empty($normalized_results) && is_array($normalized_results)) {
        foreach ($normalized_results as &$row) {
            if (!isset($row['original_url']) || empty($row['original_url'])) {
                // a) dacă există url și nu e de pe CryptoPanic, folosește-l
                if (isset($row['url']) && is_string($row['url'])) {
                    $host = parse_url($row['url'], PHP_URL_HOST);
                    if ($host && stripos($host, 'cryptopanic.com') === false) {
                        $row['original_url'] = $row['url'];
                        continue;
                    }
                }
                // b) dacă avem domain (sau source.domain), folosește homepage-ul sursei
                $domain = '';
                if (isset($row['domain']) && is_string($row['domain'])) {
                    $domain = $row['domain'];
                } elseif (isset($row['source']['domain']) && is_string($row['source']['domain'])) {
                    $domain = $row['source']['domain'];
                }
                if ($domain) {
                    if (!preg_match('#^https?://#i', $domain)) {
                        $domain = 'https://' . $domain;
                    }
                    $host = parse_url($domain, PHP_URL_HOST);
                    if ($host && stripos($host, 'cryptopanic.com') === false) {
                        $row['original_url'] = $domain;
                    }
                }
            }
        }
        unset($row);
    }

    // Recalculează indicatorii meta după toate enrich-urile
    if (!empty($normalized_results) && is_array($normalized_results)) {
        $first_now = $normalized_results[0];
        $meta['has_original_url'] = isset($first_now['original_url']);
        $meta['has_source'] = isset($first_now['source']);
    }

    // DEBUG extras (opțional) – NU se cache-uiesc dacă debug activ
    if ($debug_mode) {
        $sample = array();
        foreach (array_slice($normalized_results,0,3) as $it) {
            $sample[] = array(
                'id' => isset($it['id']) ? $it['id'] : null,
                'slug' => isset($it['slug']) ? $it['slug'] : null,
                'title' => isset($it['title']) ? $it['title'] : null,
                'has_original_url' => isset($it['original_url']),
            );
        }
        $meta['debug'] = array(
            'sample_items' => $sample,
            'mode' => $mode,
            'fallback_used' => $fallback_used,
        );
    }

    // Return payload
    $payload = array(
        'results' => is_array($normalized_results) ? $normalized_results : array(),
        'meta' => $meta
    );
    if (!$no_cache && !$debug_mode && !$scrape_mode) set_transient($cache_key, $payload, $cache_ttl);
    wp_send_json_success($payload);
}
add_action('wp_ajax_bitcoinul_ro_fetch_news', 'bitcoinul_ro_fetch_news_ajax');
add_action('wp_ajax_nopriv_bitcoinul_ro_fetch_news', 'bitcoinul_ro_fetch_news_ajax');

/**
 * AJAX: Market metrics (Fear & Greed, BTC Dominance, Total Market Cap)
 * Fără API key – folosim surse publice:
 *  - Fear & Greed: https://api.alternative.me/fng/?limit=1&format=json (cache 1h)
 *  - Global market / dominance: https://api.coingecko.com/api/v3/global (cache 5m)
 * Endpoint: /wp-admin/admin-ajax.php?action=bitcoinul_ro_market_metrics
 */
function bitcoinul_ro_market_metrics_ajax() {
    // Allow public
    $now = time();
    $resp = array();
    $meta = array();

    // 1) Fear & Greed (1h cache)
    $fng_cache_key = 'bitcoinul_ro_fng_v1';
    $fng_cached = get_transient($fng_cache_key);
    $fng_fresh = false;
    if (!is_array($fng_cached)) {
        $fng_url = 'https://api.alternative.me/fng/?limit=1&format=json';
        $r = wp_remote_get($fng_url, array('timeout' => 12, 'headers' => array('Accept' => 'application/json')));
        $code = is_wp_error($r) ? 0 : wp_remote_retrieve_response_code($r);
        if ($code === 200) {
            $body = wp_remote_retrieve_body($r);
            $j = json_decode($body, true);
            if (isset($j['data'][0]) && is_array($j['data'][0])) {
                $row = $j['data'][0];
                $fng_cached = array(
                    'value' => isset($row['value']) ? (int)$row['value'] : null,
                    'classification' => isset($row['value_classification']) ? $row['value_classification'] : null,
                    'updated_at' => isset($row['timestamp']) ? gmdate('c', (int)$row['timestamp']) : gmdate('c'),
                    'source' => 'alternative.me'
                );
                set_transient($fng_cache_key, $fng_cached, HOUR_IN_SECONDS); // 1h
                $fng_fresh = true;
            }
        }
    }
    if (!is_array($fng_cached)) {
        // fallback static minimal if totally unavailable
        $fng_cached = array('value' => null, 'classification' => null, 'updated_at' => gmdate('c'), 'source' => 'alternative.me');
    }
    $meta['fng_cache_age'] = $fng_fresh ? 0 : ( isset($fng_cached['updated_at']) ? max(0, $now - strtotime($fng_cached['updated_at'])) : null );

    // 2) Global market (5m cache)
    $global_cache_key = 'bitcoinul_ro_global_metrics_v1';
    $global_cached = get_transient($global_cache_key);
    $global_fresh = false;
    if (!is_array($global_cached)) {
        $g_url = 'https://api.coingecko.com/api/v3/global';
        $gr = wp_remote_get($g_url, array('timeout' => 12, 'headers' => array('Accept' => 'application/json')));
        $gcode = is_wp_error($gr) ? 0 : wp_remote_retrieve_response_code($gr);
        if ($gcode === 200) {
            $gbody = wp_remote_retrieve_body($gr);
            $gj = json_decode($gbody, true);
            if (isset($gj['data']) && is_array($gj['data'])) {
                $d = $gj['data'];
                $btc_dom = isset($d['market_cap_percentage']['btc']) ? (float)$d['market_cap_percentage']['btc'] : null;
                $total_cap = isset($d['total_market_cap']['usd']) ? (float)$d['total_market_cap']['usd'] : null;
                $total_vol = isset($d['total_volume']['usd']) ? (float)$d['total_volume']['usd'] : null;
                $global_cached = array(
                    'btc_dominance' => $btc_dom,
                    'total_market_cap_usd' => $total_cap,
                    'total_volume_usd' => $total_vol,
                    'updated_at' => gmdate('c'),
                    'source' => 'coingecko'
                );
                set_transient($global_cache_key, $global_cached, 5 * MINUTE_IN_SECONDS);
                $global_fresh = true;
            }
        }
    }
    if (!is_array($global_cached)) {
        $global_cached = array('btc_dominance' => null, 'total_market_cap_usd' => null, 'total_volume_usd' => null, 'updated_at' => gmdate('c'), 'source' => 'coingecko');
    }
    $meta['global_cache_age'] = $global_fresh ? 0 : ( isset($global_cached['updated_at']) ? max(0, $now - strtotime($global_cached['updated_at'])) : null );

    // Format helpers
    $format_percentage = function($v){ return is_numeric($v) ? round($v, 2) : null; };
    $format_market_cap = function($v){
        if (!is_numeric($v) || $v <= 0) return null;
        if ($v >= 1e12) return '$' . round($v/1e12, 2) . 'T';
        if ($v >= 1e9)  return '$' . round($v/1e9, 2) . 'B';
        if ($v >= 1e6)  return '$' . round($v/1e6, 2) . 'M';
        return '$' . number_format($v, 0, '.', ',');
    };

    $resp['fear_greed'] = $fng_cached;
    $resp['dominance'] = array(
        'btc' => $format_percentage($global_cached['btc_dominance'])
    );
    $resp['market_cap'] = array(
        'usd' => $global_cached['total_market_cap_usd'],
        'formatted' => $format_market_cap($global_cached['total_market_cap_usd'])
    );
    $resp['volume_24h'] = array(
        'usd' => $global_cached['total_volume_usd'],
        'formatted' => $format_market_cap($global_cached['total_volume_usd'])
    );
    $resp['meta'] = $meta;

    wp_send_json_success($resp);
}
add_action('wp_ajax_bitcoinul_ro_market_metrics', 'bitcoinul_ro_market_metrics_ajax');
add_action('wp_ajax_nopriv_bitcoinul_ro_market_metrics', 'bitcoinul_ro_market_metrics_ajax');

/**
 * Public Bitcoin News Aggregator (fără API token)
 * Colectează știri din RSS-uri publice (doar titluri + link sursă) și normalizează.
 * Surse alese: CoinDesk, CoinTelegraph, Bitcoin Magazine, Bitcoinist, Bitcoin.com News.
 * Filtrare: reține doar articole care conțin "bitcoin" / "btc" în titlu sau care provin dintr-un domeniu bitcoin-focused.
 * Cache: 5 minute (agregat), paginare server-side.
 * Endpoint: /wp-admin/admin-ajax.php?action=bitcoinul_ro_fetch_public_btc_news&page=1
 */
function bitcoinul_ro_fetch_public_btc_news() {
    // Config
    $per_page = isset($_GET['per_page']) ? max(1, min(50, (int)$_GET['per_page'])) : 24;
    $page     = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    $keyword_filter = '/\bbitcoin\b|\bbtc\b/i';
    $cache_key = 'bitcoinul_ro_public_btc_news_v1';
    $cache_ttl = 5 * MINUTE_IN_SECONDS; // refresh suficient de des, dar limitează load-ul
    $now = time();

    $cached = get_transient($cache_key);
    $meta = array('cached' => true, 'cache_ttl' => $cache_ttl, 'generated_at' => null);
    if (!is_array($cached) || !isset($cached['items'])) {
        $meta['cached'] = false;
        // RSS feed list
        $feeds = array(
            array('id'=>'coindesk', 'title'=>'CoinDesk', 'url'=>'https://www.coindesk.com/arc/outboundfeeds/rss/'),
            array('id'=>'cointelegraph', 'title'=>'CoinTelegraph', 'url'=>'https://cointelegraph.com/rss'),
            array('id'=>'bitcoinmagazine', 'title'=>'Bitcoin Magazine', 'url'=>'https://bitcoinmagazine.com/feed'),
            array('id'=>'bitcoinist', 'title'=>'Bitcoinist', 'url'=>'https://bitcoinist.com/feed/'),
            array('id'=>'bitcoincom', 'title'=>'Bitcoin.com News', 'url'=>'https://news.bitcoin.com/feed/')
        );
        $all = array();
        foreach ($feeds as $f) {
            $rss_resp = wp_remote_get($f['url'], array('timeout' => 12));
            if (is_wp_error($rss_resp)) continue;
            $code = wp_remote_retrieve_response_code($rss_resp);
            if ($code !== 200) continue;
            $body = wp_remote_retrieve_body($rss_resp);
            if (!$body) continue;
            $xml = @simplexml_load_string($body);
            if (!$xml) continue;
            // Support RSS -> channel->item
            if (isset($xml->channel->item)) {
                foreach ($xml->channel->item as $it) {
                    $title = trim((string)$it->title);
                    $link  = trim((string)$it->link);
                    if (!$title || !$link) continue;
                    $pubDate = (string)$it->pubDate ?: (string)$it->date;
                    $ts = $pubDate ? strtotime($pubDate) : false;
                    $desc = isset($it->description) ? (string)$it->description : '';
                    // Filter by Bitcoin keyword unless domain is inherently Bitcoin centric
                    $host = parse_url($link, PHP_URL_HOST);
                    $is_bitcoin_domain = false;
                    if ($host) {
                        $h = strtolower($host);
                        if (strpos($h,'bitcoin') !== false) $is_bitcoin_domain = true; // bitcoin magazine / bitcoin.com etc.
                    }
                    if (!$is_bitcoin_domain && !preg_match($keyword_filter, $title . ' ' . $desc)) continue;
                    $clean_summary = '';
                    if ($desc) {
                        $clean_summary = wp_strip_all_tags(html_entity_decode($desc, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
                        if (strlen($clean_summary) > 280) $clean_summary = mb_substr($clean_summary,0,277) . '...';
                    }
                    $all[] = array(
                        'id' => md5($link),
                        'title' => $title,
                        'url' => $link,
                        'original_url' => $link,
                        'domain' => $host,
                        'source' => array('title'=>$f['title'], 'domain'=>$host, 'id'=>$f['id']),
                        'published_at' => $ts ? gmdate('c', $ts) : gmdate('c'),
                        'summary' => $clean_summary,
                    );
                }
            }
        }
        // Sort desc by published_at
        usort($all, function($a,$b){
            return strcmp($b['published_at'], $a['published_at']);
        });
        $cached = array(
            'items' => $all,
            'count' => count($all),
            'generated_at' => gmdate('c'),
        );
        set_transient($cache_key, $cached, $cache_ttl);
    }
    $meta['generated_at'] = isset($cached['generated_at']) ? $cached['generated_at'] : gmdate('c');
    $meta['total_items'] = isset($cached['count']) ? $cached['count'] : (isset($cached['items']) ? count($cached['items']) : 0);
    $meta['page'] = $page;
    $meta['per_page'] = $per_page;
    $meta['pages'] = $per_page ? ceil(max(1,$meta['total_items']) / $per_page) : 1;
    $meta['cache_age_sec'] = max(0, $now - strtotime($meta['generated_at']));

    $offset = ($page - 1) * $per_page;
    $slice = array();
    if (!empty($cached['items'])) {
        $slice = array_slice($cached['items'], $offset, $per_page);
    }

    $payload = array(
        'results' => $slice,
        'meta' => $meta
    );
    wp_send_json_success($payload);
}
add_action('wp_ajax_bitcoinul_ro_fetch_public_btc_news', 'bitcoinul_ro_fetch_public_btc_news');
add_action('wp_ajax_nopriv_bitcoinul_ro_fetch_public_btc_news', 'bitcoinul_ro_fetch_public_btc_news');

/**
 * XML Sitemap: sitemap.xml + parts (sitemap-pages.xml, sitemap-exchanges.xml, sitemap-taxonomies.xml)
 * - Includes: homepage, key pages (exchange-uri, ghiduri, stiri, calculatoare-bitcoin), all published pages, CPT 'exchange', taxonomy 'exchange_type'
 * - Adds featured images where available
 * - Adds robots.txt Sitemap: link
 */

// Register rewrite rules for sitemap endpoints
function bitcoinul_ro_add_sitemap_rewrites() {
    add_rewrite_rule('^sitemap\.xml$', 'index.php?bitcoinul_sitemap=1', 'top');
    add_rewrite_rule('^sitemap-([a-z0-9\-]+)\.xml$', 'index.php?bitcoinul_sitemap=1&bitcoinul_sitemap_type=$matches[1]', 'top');
}
add_action('init', 'bitcoinul_ro_add_sitemap_rewrites', 15);

// Allow custom query vars
function bitcoinul_ro_sitemap_query_vars($vars) {
    $vars[] = 'bitcoinul_sitemap';
    $vars[] = 'bitcoinul_sitemap_type';
    return $vars;
}
add_filter('query_vars', 'bitcoinul_ro_sitemap_query_vars');

// Escape helper for XML
function bitcoinul_ro_xml($str) {
    return htmlspecialchars($str, ENT_XML1 | ENT_COMPAT, 'UTF-8');
}

// Date helper (ISO8601 UTC)
function bitcoinul_ro_iso_utc($ts) {
    if (empty($ts)) return gmdate('c');
    $t = is_numeric($ts) ? (int)$ts : strtotime($ts . ' UTC');
    if ($t <= 0) $t = time();
    return gmdate('c', $t);
}

// Output sitemap XML and stop execution
function bitcoinul_ro_output_xml($xml) {
    if (!headers_sent()) {
        header('Content-Type: application/xml; charset=UTF-8');
        header('X-Content-Type-Options: nosniff');
    }
    echo $xml;
    exit;
}

// Build URL node with optional image
function bitcoinul_ro_build_url_node($loc, $lastmod = '', $changefreq = '', $priority = '', $image_url = '', $image_title = '') {
    $xmlns_image = '';
    $image_block = '';
    if ($image_url) {
        $image_block = "\n    <image:image>\n      <image:loc>" . bitcoinul_ro_xml($image_url) . "</image:loc>" . ($image_title ? "\n      <image:title>" . bitcoinul_ro_xml($image_title) . "</image:title>" : '') . "\n    </image:image>";
    }
    $node  = "  <url>\n";
    $node .= "    <loc>" . bitcoinul_ro_xml($loc) . "</loc>\n";
    if ($lastmod)    $node .= "    <lastmod>" . bitcoinul_ro_xml($lastmod) . "</lastmod>\n";
    if ($changefreq) $node .= "    <changefreq>" . bitcoinul_ro_xml($changefreq) . "</changefreq>\n";
    if ($priority !== '') $node .= "    <priority>" . bitcoinul_ro_xml($priority) . "</priority>\n";
    if ($image_block) $node .= $image_block . "\n";
    $node .= "  </url>\n";
    return $node;
}

// Generate sitemap index
function bitcoinul_ro_generate_sitemap_index() {
    $home = home_url('/');
    $parts = array('pages','posts','exchanges','taxonomies');
    $xml  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    $xml .= "<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
    foreach ($parts as $p) {
        $loc = home_url('/sitemap-' . $p . '.xml');
        $xml .= "  <sitemap>\n";
        $xml .= "    <loc>" . bitcoinul_ro_xml($loc) . "</loc>\n";
        $xml .= "    <lastmod>" . bitcoinul_ro_iso_utc(time()) . "</lastmod>\n";
        $xml .= "  </sitemap>\n";
    }
    $xml .= "</sitemapindex>\n";
    bitcoinul_ro_output_xml($xml);
}

// Generate pages sitemap (includes homepage and key pages first)
function bitcoinul_ro_generate_sitemap_pages() {
    bitcoinul_ro_custom_post_types(); // ensure CPTs are registered
    $home = home_url('/');

    // Collect URLs
    $urls = array();

    // Homepage
    $urls[] = array('loc' => $home, 'lastmod' => bitcoinul_ro_iso_utc(time()), 'changefreq' => 'daily', 'priority' => '1.0');

    // Key pages with higher priority and daily
    $key_slugs = array('exchange-uri','ghiduri','stiri','calculatoare-bitcoin','cum-cumpar-bitcoin','portofel-bitcoin-sigur','taxe-bitcoin-romania','comparatie-exchange-uri');
    // Pages whose content is primarily template-driven/dynamic -> use current time for lastmod
    $dynamic_slugs = array('stiri', 'exchange-uri', 'comparatie-exchange-uri');
    foreach ($key_slugs as $slug) {
        $page = get_page_by_path($slug);
        if ($page && $page->post_status === 'publish') {
            $urls[] = array(
                'loc' => get_permalink($page),
                // content is dynamic for unele pagini; folosim now ca lastmod logic
                'lastmod' => in_array($slug, $dynamic_slugs, true) ? bitcoinul_ro_iso_utc(time()) : bitcoinul_ro_iso_utc($page->post_modified_gmt ?: $page->post_date_gmt),
                'changefreq' => 'daily',
                'priority' => '0.9',
                'image' => has_post_thumbnail($page) ? get_the_post_thumbnail_url($page, 'full') : '',
                'image_title' => get_the_title($page),
            );
        }
    }

    // All published pages
    $pages = get_posts(array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'modified',
        'order' => 'DESC',
        'fields' => 'all',
        'suppress_filters' => true,
    ));
    foreach ($pages as $p) {
        $permalink = get_permalink($p);
        // Skip duplicates already added as key pages
        if (in_array(trim(parse_url($permalink, PHP_URL_PATH), '/'), $key_slugs, true)) continue;
        $urls[] = array(
            'loc' => $permalink,
            'lastmod' => bitcoinul_ro_iso_utc($p->post_modified_gmt ?: $p->post_date_gmt),
            'changefreq' => 'weekly',
            'priority' => '0.6',
            'image' => has_post_thumbnail($p) ? get_the_post_thumbnail_url($p, 'full') : '',
            'image_title' => get_the_title($p),
        );
    }

    // Render XML
    $xml  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    $xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:image=\"http://www.google.com/schemas/sitemap-image/1.1\">\n";
    foreach ($urls as $u) {
        $xml .= bitcoinul_ro_build_url_node($u['loc'], $u['lastmod'], $u['changefreq'], $u['priority'], isset($u['image']) ? $u['image'] : '', isset($u['image_title']) ? $u['image_title'] : '');
    }
    $xml .= "</urlset>\n";
    bitcoinul_ro_output_xml($xml);
}

// Generate exchanges sitemap (CPT 'exchange')
function bitcoinul_ro_generate_sitemap_exchanges() {
    bitcoinul_ro_custom_post_types();
    $posts = get_posts(array(
        'post_type' => 'exchange',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'modified',
        'order' => 'DESC',
        'fields' => 'all',
        'suppress_filters' => true,
    ));

    $xml  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    $xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:image=\"http://www.google.com/schemas/sitemap-image/1.1\">\n";
    foreach ($posts as $p) {
        $img = has_post_thumbnail($p) ? get_the_post_thumbnail_url($p, 'full') : '';
        $xml .= bitcoinul_ro_build_url_node(get_permalink($p), bitcoinul_ro_iso_utc($p->post_modified_gmt ?: $p->post_date_gmt), 'weekly', '0.7', $img, get_the_title($p));
    }
    $xml .= "</urlset>\n";
    bitcoinul_ro_output_xml($xml);
}

// Generate taxonomies sitemap (exchange_type terms)
function bitcoinul_ro_generate_sitemap_taxonomies() {
    $xml  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    $xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
    $taxes = array('exchange_type','category','post_tag');
    foreach ($taxes as $tax) {
        $terms = get_terms(array('taxonomy' => $tax, 'hide_empty' => true));
        if (is_wp_error($terms)) continue;
        foreach ($terms as $t) {
            $link = get_term_link($t);
            if (is_wp_error($link)) continue;
            $xml .= bitcoinul_ro_build_url_node($link, bitcoinul_ro_iso_utc(time()), 'weekly', '0.5');
        }
    }
    $xml .= "</urlset>\n";
    bitcoinul_ro_output_xml($xml);
}

// Router
function bitcoinul_ro_handle_sitemap_request() {
    if (!get_query_var('bitcoinul_sitemap')) return;
    $type = sanitize_title(get_query_var('bitcoinul_sitemap_type'));
    if (!$type) {
        bitcoinul_ro_generate_sitemap_index();
    } else {
        switch ($type) {
            case 'pages':
                bitcoinul_ro_generate_sitemap_pages();
                break;
            case 'posts':
                bitcoinul_ro_generate_sitemap_posts();
                break;
            case 'exchanges':
                bitcoinul_ro_generate_sitemap_exchanges();
                break;
            case 'taxonomies':
                bitcoinul_ro_generate_sitemap_taxonomies();
                break;
            default:
                status_header(404);
                bitcoinul_ro_output_xml('<?xml version="1.0" encoding="UTF-8"?><error>Not Found</error>');
        }
    }
}
add_action('template_redirect', 'bitcoinul_ro_handle_sitemap_request', 0);

// Add Sitemap line into robots.txt
function bitcoinul_ro_add_robots_sitemap($output, $public) {
    $sitemap_url = home_url('/sitemap.xml');
    if (strpos($output, 'Sitemap:') === false) {
        $output .= "\nSitemap: " . $sitemap_url . "\n";
    }
    return $output;
}
add_filter('robots_txt', 'bitcoinul_ro_add_robots_sitemap', 10, 2);

// Generate posts sitemap (blog articles)
function bitcoinul_ro_generate_sitemap_posts() {
    $posts = get_posts(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'modified',
        'order' => 'DESC',
        'fields' => 'all',
        'suppress_filters' => true,
    ));

    $xml  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    $xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:image=\"http://www.google.com/schemas/sitemap-image/1.1\">\n";
    foreach ($posts as $p) {
        $img = has_post_thumbnail($p) ? get_the_post_thumbnail_url($p, 'full') : '';
        $xml .= bitcoinul_ro_build_url_node(get_permalink($p), bitcoinul_ro_iso_utc($p->post_modified_gmt ?: $p->post_date_gmt), 'weekly', '0.7', $img, get_the_title($p));
    }
    $xml .= "</urlset>\n";
    bitcoinul_ro_output_xml($xml);
}

// Ensure we flush permalinks once if sitemap rules are missing
add_action('init', function() {
    if (is_admin()) return;
    $k = 'bitcoinul_ro_sitemap_rules_check_v1';
    if (get_transient($k)) return;
    $rules = get_option('rewrite_rules');
    $need_flush = false;
    if (!is_array($rules)) {
        $need_flush = true;
    } else {
        if (!isset($rules['^sitemap\.xml$']) || strpos($rules['^sitemap\.xml$'], 'bitcoinul_sitemap=1') === false) $need_flush = true;
        if (!isset($rules['^sitemap-([a-z0-9\-]+)\.xml$'])) $need_flush = true;
    }
    if ($need_flush) {
        bitcoinul_ro_custom_post_types();
        flush_rewrite_rules(false);
    }
    set_transient($k, 1, 12 * HOUR_IN_SECONDS);
}, 70);