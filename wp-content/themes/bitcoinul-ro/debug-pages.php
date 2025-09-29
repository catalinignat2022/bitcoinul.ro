<?php
/**
 * Fișier de debugging pentru paginile temei Bitcoinul.ro
 * Accesează: yoursite.com/wp-content/themes/bitcoinul-ro/debug-pages.php
 */

// Verifică dacă WordPress este încărcat
if (!defined('ABSPATH')) {
    // Încarcă WordPress dacă nu este încărcat
    $wp_load = dirname(__FILE__) . '/../../../wp-load.php';
    if (file_exists($wp_load)) {
        require_once($wp_load);
    } else {
        die('Nu s-a putut încărca WordPress');
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Debug Pagini - Bitcoinul.ro</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
        .warning { color: orange; font-weight: bold; }
        table { border-collapse: collapse; width: 100%; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .actions { margin: 20px 0; }
        .btn { padding: 10px 20px; margin: 5px; text-decoration: none; border-radius: 5px; }
        .btn-primary { background: #0073aa; color: white; }
        .btn-danger { background: #dc3545; color: white; }
        .btn-success { background: #28a745; color: white; }
    </style>
</head>
<body>

<h1>🔧 Debug Pagini Bitcoinul.ro</h1>

<?php
// Verifică dacă se solicită recrearea paginilor
if (isset($_GET['action']) && $_GET['action'] === 'recreate' && current_user_can('manage_options')) {
    if (function_exists('bitcoinul_ro_recreate_pages')) {
        bitcoinul_ro_recreate_pages();
        echo '<div class="success">✅ Paginile au fost recreate cu succes!</div>';
    }
}

// Lista paginilor necesare
$required_pages = array(
    'exchange-uri' => 'Exchange-uri Bitcoin România',
    'ghiduri' => 'Ghiduri Bitcoin & Crypto', 
    'stiri' => 'Știri Bitcoin & Crypto'
);
?>

<h2>📊 Status Pagini</h2>
<table>
    <thead>
        <tr>
            <th>Pagină</th>
            <th>Slug</th>
            <th>Status</th>
            <th>ID</th>
            <th>URL</th>
            <th>Template</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($required_pages as $slug => $title): 
            $page = get_page_by_path($slug);
            $template_file = "page-{$slug}.php";
            $template_exists = file_exists(get_template_directory() . '/' . $template_file);
        ?>
        <tr>
            <td><?php echo esc_html($title); ?></td>
            <td><?php echo esc_html($slug); ?></td>
            <td>
                <?php if ($page): ?>
                    <span class="success">✅ Există</span>
                <?php else: ?>
                    <span class="error">❌ Lipsește</span>
                <?php endif; ?>
            </td>
            <td>
                <?php echo $page ? $page->ID : 'N/A'; ?>
            </td>
            <td>
                <?php if ($page): ?>
                    <a href="<?php echo get_permalink($page); ?>" target="_blank">
                        <?php echo get_permalink($page); ?>
                    </a>
                <?php else: ?>
                    <span class="error">N/A</span>
                <?php endif; ?>
            </td>
            <td>
                <?php if ($template_exists): ?>
                    <span class="success">✅ <?php echo $template_file; ?></span>
                <?php else: ?>
                    <span class="error">❌ <?php echo $template_file; ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2>🎯 Meniu WordPress</h2>
<?php
$menu_locations = get_theme_mod('nav_menu_locations');
$primary_menu = wp_get_nav_menu_object($menu_locations['primary'] ?? 0);
?>
<p><strong>Meniu Principal:</strong> 
    <?php if ($primary_menu): ?>
        <span class="success">✅ <?php echo esc_html($primary_menu->name); ?></span>
    <?php else: ?>
        <span class="warning">⚠️ Nu este setat (se va folosi meniul implicit)</span>
    <?php endif; ?>
</p>

<h2>📂 Fișiere Template</h2>
<?php
$template_files = array(
    'page-exchange-uri.php' => 'Template Exchange-uri',
    'page-ghiduri.php' => 'Template Ghiduri',
    'page-stiri.php' => 'Template Știri',
    'header.php' => 'Header',
    'footer.php' => 'Footer',
    'functions.php' => 'Functions',
    'style.css' => 'CSS Principal'
);
?>
<table>
    <thead>
        <tr>
            <th>Fișier</th>
            <th>Descriere</th>
            <th>Status</th>
            <th>Mărime</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($template_files as $file => $description): 
            $filepath = get_template_directory() . '/' . $file;
            $exists = file_exists($filepath);
            $size = $exists ? size_format(filesize($filepath)) : 'N/A';
        ?>
        <tr>
            <td><?php echo esc_html($file); ?></td>
            <td><?php echo esc_html($description); ?></td>
            <td>
                <?php if ($exists): ?>
                    <span class="success">✅ Există</span>
                <?php else: ?>
                    <span class="error">❌ Lipsește</span>
                <?php endif; ?>
            </td>
            <td><?php echo $size; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="actions">
    <h2>🛠️ Acțiuni</h2>
    
    <?php if (current_user_can('manage_options')): ?>
        <a href="?action=recreate" class="btn btn-primary">
            🔄 Recreează Paginile
        </a>
        
        <a href="<?php echo admin_url('nav-menus.php'); ?>" class="btn btn-success">
            📝 Editează Meniurile
        </a>
        
        <a href="<?php echo admin_url('edit.php?post_type=page'); ?>" class="btn btn-success">
            📄 Vezi Toate Paginile
        </a>
    <?php else: ?>
        <p class="warning">⚠️ Trebuie să fii administrator pentru a accesa acțiunile de repair.</p>
        <a href="<?php echo wp_login_url($_SERVER['REQUEST_URI']); ?>" class="btn btn-primary">
            🔐 Loghează-te
        </a>
    <?php endif; ?>
</div>

<h2>📋 Informații Sistem</h2>
<ul>
    <li><strong>WordPress:</strong> <?php echo get_bloginfo('version'); ?></li>
    <li><strong>Tema:</strong> <?php echo wp_get_theme()->get('Name'); ?> v<?php echo wp_get_theme()->get('Version'); ?></li>
    <li><strong>URL Site:</strong> <?php echo home_url(); ?></li>
    <li><strong>Directorul Temei:</strong> <?php echo get_template_directory(); ?></li>
</ul>

<hr>
<p><small>💡 <strong>Tip:</strong> Dacă meniul afișează 404, folosește butonul "Recreează Paginile" de mai sus.</small></p>

</body>
</html>