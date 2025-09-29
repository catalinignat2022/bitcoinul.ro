<?php
/**
 * Template Name: Ghiduri Bitcoin
 * Pagină cu ghiduri curate și filtrabile
 */

if (!defined('ABSPATH')) exit;

get_header(); ?>

<main class="site-content guides-page">
    <style>
        .guides-hero { padding: 4rem 0 2rem; }
        .guides-hero h1 { font-size: 2.4rem; margin: 0; color: var(--text-primary); text-align: center; }
        .guides-hero p { color: var(--text-secondary); text-align: center; margin: .75rem auto 0; max-width: 720px; }

        .guide-filters { display: flex; gap: .5rem; flex-wrap: wrap; justify-content: center; margin: 1.5rem 0 2rem; }
        .guide-filters .filter-btn { background: #fff; border: 1px solid #e5e7eb; border-radius: 999px; padding: .55rem 1rem; font-weight: 600; cursor: pointer; }
        .guide-filters .filter-btn.active { background: #111827; color: #fff; border-color: #111827; }

        .guides-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem; }
        .guide-card { background: #fff; border-radius: 18px; box-shadow: var(--shadow); overflow: hidden; display: flex; flex-direction: column; }
        .guide-media { height: 140px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg,#f8fafc,#ffffff); }
        .guide-media .emoji { font-size: 3rem; }
        .guide-body { padding: 1.1rem 1.25rem 1.25rem; }
        .guide-title { font-size: 1.15rem; font-weight: 700; color: var(--text-primary); margin: 0 0 .35rem; }
        .guide-excerpt { color: var(--text-secondary); font-size: .95rem; line-height: 1.6; margin: 0 0 .9rem; }
        .guide-meta { display: flex; gap: .5rem; flex-wrap: wrap; margin-bottom: .9rem; }
        .guide-meta .chip { background: #f3f4f6; color: #111827; border-radius: 999px; padding: .25rem .6rem; font-size: .8rem; font-weight: 600; }
        .guide-cta { display: inline-flex; align-items: center; gap: .5rem; background: linear-gradient(135deg,#f7931a,#ff6b00); color: #fff; padding: .7rem 1rem; border-radius: 999px; font-weight: 700; text-decoration: none; transition: transform .15s ease; }
        .guide-cta:hover { transform: translateY(-1px); }
        .guides-empty { text-align: center; padding: 2rem 0; color: var(--text-secondary); }

        @media (max-width: 480px){
            .guides-hero h1 { font-size: 2rem; }
        }
    </style>

    <section class="guides-hero">
        <div class="container">
            <h1>📚 Ghiduri Bitcoin România</h1>
            <p>Începe cu bazele, continuă cu securitatea și treci la strategii. Am strâns ghiduri utile pentru cititorii bitcoinul.ro.</p>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="guide-filters">
                <button class="filter-btn active" onclick="filterGuides('all')">Toate</button>
                <button class="filter-btn" onclick="filterGuides('incepatori')">Începători</button>
                <button class="filter-btn" onclick="filterGuides('securitate')">Securitate</button>
                <button class="filter-btn" onclick="filterGuides('investitii')">Investiții</button>
                <button class="filter-btn" onclick="filterGuides('trading')">Trading</button>
            </div>

            <div id="guides-container" class="guides-grid">
                <?php
                // Curated recommended guides (safe: show only if they exist)
                $curated = [
                    [
                        'title' => 'Ghid Bitcoin pentru începători',
                        'path'  => 'ghid-bitcoin-incepatori',
                        'desc'  => 'Ce este Bitcoin, cum funcționează și cum să începi în siguranță.',
                        'chip'  => ['Începători','Educație'],
                        'cat'   => 'incepatori',
                        'emoji' => '🎓',
                    ],
                    [
                        'title' => 'Cum să cumperi Bitcoin în România',
                        'path'  => 'cum-sa-cumperi-bitcoin-in-romania',
                        'desc'  => 'Metode rapide, comisioane, KYC și recomandări practice pentru România.',
                        'chip'  => ['Începători','Cumpărare'],
                        'cat'   => 'incepatori',
                        'emoji' => '🛒',
                    ],
                    [
                        'title' => 'Securitate: Portofele și custodie',
                        'path'  => 'securitate-portofele-si-custodie',
                        'desc'  => 'Seed phrase, cold storage, hardware wallet și bune practici.',
                        'chip'  => ['Securitate','Wallet'],
                        'cat'   => 'securitate',
                        'emoji' => '🔐',
                    ],
                    [
                        'title' => 'Strategii de investiții în Bitcoin',
                        'path'  => 'strategii-de-investitii-in-bitcoin',
                        'desc'  => 'DCA, rebalansare, orizont de timp și psihologia pieței.',
                        'chip'  => ['Investiții','Strategii'],
                        'cat'   => 'investitii',
                        'emoji' => '📈',
                    ],
                    [
                        'title' => 'Trading responsabil: Spot vs. Derivate',
                        'path'  => 'trading-spot-vs-derivate-bitcoin',
                        'desc'  => 'Riscuri, levier și managementul pozițiilor pentru traderi.',
                        'chip'  => ['Trading','Risc'],
                        'cat'   => 'trading',
                        'emoji' => '📊',
                    ],
                    [
                        'title' => 'Fiscalitate: cum declari câștigurile',
                        'path'  => 'fiscalitate-declarare-castiguri-crypto',
                        'desc'  => 'Noțiuni esențiale despre taxe și declarații pentru crypto în România.',
                        'chip'  => ['Fiscalitate','Legal'],
                        'cat'   => 'investitii',
                        'emoji' => '🧾',
                    ],
                ];

                foreach ($curated as $g) {
                    // Try to resolve path to a post/page; if not found skip to avoid 404 links
                    $post = get_page_by_path($g['path'], OBJECT, ['post','page']);
                    if (!$post) continue;
                    $url = get_permalink($post);
                    ?>
                    <article class="guide-card" data-cat="<?php echo esc_attr($g['cat']); ?>" style="transition:transform .15s ease, box-shadow .15s ease;">
                        <div class="guide-media" style="position:relative;overflow:hidden;">
                            <div class="emoji" style="transition: transform .3s ease;"><?php echo esc_html($g['emoji']); ?></div>
                        </div>
                        <div class="guide-body">
                            <h3 class="guide-title"><?php echo esc_html($g['title']); ?></h3>
                            <p class="guide-excerpt"><?php echo esc_html($g['desc']); ?></p>
                            <div class="guide-meta">
                                <?php foreach ($g['chip'] as $chip): ?>
                                    <span class="chip"><?php echo esc_html($chip); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <a href="<?php echo esc_url($url); ?>" class="guide-cta" onclick="window.trackEvent && trackEvent('cta_click','guides','<?php echo esc_js($g['title']); ?>'); return true;">
                                Deschide ghidul →
                            </a>
                        </div>
                    </article>
                    <?php
                }

                // If nothing curated resolved, show a helpful empty state
                $printed = did_action('loop_start'); // rough indicator something printed
                ?>
            </div>

            <?php
            // If no curated items matched, show a CTA and optionally latest posts
            $container_html = ob_get_contents();
            ?>
            <div class="guides-empty" id="guides-empty" style="display:none;">
                Nu am găsit ghiduri publicate încă. Revino curând sau vezi articolele recente din blog.
            </div>
        </div>
    </section>

    <script>
    function filterGuides(cat) {
        const buttons = document.querySelectorAll('.guide-filters .filter-btn');
        buttons.forEach(b => b.classList.remove('active'));
        const btn = Array.from(buttons).find(b => (b.getAttribute('onclick')||'').includes(`filterGuides('${cat}')`));
        if (btn) btn.classList.add('active');

        const cards = document.querySelectorAll('#guides-container .guide-card');
        let visible = 0;
        cards.forEach(card => {
            const show = (cat==='all') || (card.dataset.cat===cat);
            card.style.display = show ? '' : 'none';
            if (show) visible++;
        });
        const empty = document.getElementById('guides-empty');
        if (empty) empty.style.display = visible ? 'none' : '';
    }
    document.addEventListener('DOMContentLoaded', function(){ filterGuides('all'); });

    // micro interacțiuni
    document.addEventListener('mouseover', function(e){
        const card = e.target.closest('.guide-card');
        if (!card) return;
        card.style.transform = 'translateY(-2px)';
        card.style.boxShadow = 'var(--shadow-hover)';
        const emoji = card.querySelector('.emoji');
        if (emoji) emoji.style.transform = 'scale(1.1)';
    });
    document.addEventListener('mouseout', function(e){
        const card = e.target.closest('.guide-card');
        if (!card) return;
        card.style.transform = '';
        card.style.boxShadow = '';
        const emoji = card.querySelector('.emoji');
        if (emoji) emoji.style.transform = '';
    });
    </script>

</main>

<?php get_footer(); ?>