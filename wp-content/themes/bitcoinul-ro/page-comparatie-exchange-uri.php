<?php
/*
Template Name: Comparație Exchange-uri Bitcoin
*/
?>
<?php get_header(); ?>

<style>
/***** Compare Page Styles *****/
:root {
  --cmp-card-bg: #0f172a; /* dark slate */
  --cmp-card-border: rgba(255,255,255,0.08);
  --cmp-muted: rgba(255,255,255,0.7);
  --cmp-accent: var(--bitcoin-orange, #f7931a);
  --cmp-accent-2: var(--bitcoin-dark, #ff6b00);
}

.compare-hero {
  max-width: 1100px;
  margin: 0 auto 1.5rem;
  /* Add top padding to account for sticky header so the H1 isn't hidden */
  padding: calc(72px + 1rem) 1.25rem 0;
}
.compare-hero h1 { /* also ensure anchor jumps don't hide the title */
  font-size: clamp(1.8rem, 3vw, 2.4rem);
  margin-bottom: .35rem;
  scroll-margin-top: 84px;
}
.compare-hero h1 {
  font-size: clamp(1.8rem, 3vw, 2.4rem);
  margin-bottom: .35rem;
}
.compare-hero p {
  color: var(--cmp-muted);
}

.compare-grid {
  max-width: 1100px;
  margin: 0 auto 2rem;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 1.2rem;
}
.compare-card {
  background: linear-gradient(180deg, rgba(255,255,255,.05), rgba(255,255,255,.02));
  border: 1px solid var(--cmp-card-border);
  border-radius: 16px;
  padding: 1.1rem;
  position: relative;
  overflow: hidden;
}
.compare-card.featured {
  border-color: rgba(247,147,26,0.6);
  box-shadow: 0 12px 30px rgba(247, 147, 26, 0.12);
}
.compare-card .badge {
  position: absolute;
  top: .75rem;
  right: .75rem;
  background: linear-gradient(135deg, var(--cmp-accent), var(--cmp-accent-2));
  color: #fff;
  font-weight: 700;
  padding: .28rem .6rem;
  border-radius: 999px;
  font-size: .78rem;
}
.compare-card .logo {
  display: flex; align-items: center; gap: .6rem; margin-bottom: .6rem;
}
.compare-card .logo img{ width: 28px; height: 28px; border-radius: 6px; }
.compare-card h3 { margin: 0; font-size: 1.1rem; }
.compare-card .desc { color: var(--cmp-muted); font-size: .95rem; margin-top: .25rem; }

.compare-metrics { display: grid; grid-template-columns: 1fr 1fr; gap: .6rem; margin: .8rem 0; }
.metric {
  background: rgba(255,255,255,0.04);
  border: 1px solid var(--cmp-card-border);
  border-radius: 10px;
  padding: .6rem .7rem;
}
.metric .label { color: var(--cmp-muted); font-size: .8rem; }
.metric .value { font-weight: 700; font-size: 1rem; }

.compare-actions { display: flex; gap: .6rem; flex-wrap: wrap; margin-top: .5rem; }
.btn-primary { background: linear-gradient(135deg, var(--cmp-accent), var(--cmp-accent-2)); color: #fff; border: 0; padding: .7rem .9rem; border-radius: 10px; font-weight: 800; text-decoration: none; display: inline-flex; gap: .4rem; align-items: center; }
.btn-secondary { background: transparent; color: #fff; border: 1px solid var(--cmp-card-border); padding: .7rem .9rem; border-radius: 10px; text-decoration: none; }
.btn-primary:hover { filter: brightness(1.05); }
.btn-secondary:hover { border-color: rgba(255,255,255,0.25); }

/* Keep CTA text on one line in the comparison table */
.compare-table .btn-primary { white-space: nowrap; }

/* Table view */
.compare-table-wrapper{ max-width: 1100px; margin: 0 auto 2.5rem; overflow: hidden; border:1px solid var(--cmp-card-border); border-radius:16px; }
.compare-table { width: 100%; border-collapse: collapse; background: rgba(255,255,255,0.02); }
.compare-table th, .compare-table td { padding: .85rem; border-bottom: 1px solid var(--cmp-card-border); text-align: left; }
.compare-table th { background: rgba(255,255,255,0.04); font-weight: 700; }
.compare-table tr:hover td { background: rgba(255,255,255,0.03); }
.compare-table .best { color: var(--cmp-accent); font-weight: 800; }

/* Notes */
.compare-notes { max-width: 1100px; margin: 0 auto 2rem; color: var(--cmp-muted); font-size: .95rem; }
.compare-notes li{ margin:.3rem 0; }

/* Responsive tweaks */
@media (max-width: 640px){
  .compare-metrics{ grid-template-columns: 1fr; }
  /* Slightly reduce top padding on small screens */
  .compare-hero{ padding-top: calc(56px + .75rem); }
}
</style>

<div class="compare-hero">
  <h1>Comparație Exchange-uri Bitcoin — România</h1>
  <p>Am selectat platformele pe care le folosim și le recomandăm. Vezi comisioanele, metodele de plată și avantajele.
     Recomandatele noastre: <strong>Binance</strong>, <strong>Bybit</strong>, <strong>Revolut</strong>.</p>
</div>

<?php
// Helper: local SVG avatar fallback when remote logo fails/hotlink-protected
function btc_cmp_svg_data_uri($letter = 'X', $bg = '#2c3e50', $fg = '#ffffff'){
  $letter = strtoupper(substr(trim($letter), 0, 1));
  $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" role="img" aria-label="logo">'
       . '<rect width="28" height="28" rx="6" ry="6" fill="' . $bg . '"/>'
       . '<text x="50%" y="52%" dominant-baseline="middle" text-anchor="middle" fill="' . $fg . '" font-family="Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif" font-size="14" font-weight="700">' . htmlspecialchars($letter) . '</text>'
       . '</svg>';
  return 'data:image/svg+xml;utf8,' . rawurlencode($svg);
}

// Define data (could be wired to CPT later). Affiliate links taken from footer section you already use.
$exchanges = [
  [
    'key' => 'binance', 'name' => 'Binance România',
    'logo' => 'https://cdn.simpleicons.org/binance/f59e0b',
    'initial' => 'B', 'color' => '#f7931a',
    'desc' => 'Comisioane mici, lichiditate mare, ofertă variată.',
    'fees' => 'Spot de la 0.1%', 'payment' => 'Card, Transfer bancar', 'security' => 'SAFU, 2FA, adresă permisă',
    'featured' => true,
    'cta' => 'https://accounts.binance.com/en/register?ref=21315882',
    'learn' => home_url('/exchange-uri/#binance')
  ],
  [
    'key' => 'bybit', 'name' => 'Bybit',
    'logo' => get_stylesheet_directory_uri() . '/assets/img/bybit-logo.svg',
    'initial' => 'B', 'color' => '#f7931a',
    'desc' => 'Interfață clară și lichiditate foarte bună.',
    'fees' => 'Spot ~0.1% (reduceri cu puncte)', 'payment' => 'Card, P2P', 'security' => '2FA, whitelisting',
    'featured' => true,
    'cta' => 'https://www.bybit.com/en/invite/?ref=ZW6OLQ',
    'learn' => home_url('/exchange-uri/#bybit')
  ],
  [
    'key' => 'revolut', 'name' => 'Revolut',
    'logo' => 'https://cdn.simpleicons.org/revolut/0ea5e9',
    'initial' => 'R', 'color' => '#0075EB',
    'desc' => 'Cumpărare instantă în aplicație; simplu pentru începători.',
    'fees' => 'Spread variabil', 'payment' => 'Card/cont Revolut', 'security' => 'Bank-grade, 2FA',
    'featured' => true,
    'cta' => 'https://revolut.com/referral/?referral-code=cataliuiy!SEP1-25-AR-H3&geo-redirect',
    'learn' => home_url('/exchange-uri/#revolut')
  ],
  [
    'key' => 'kraken', 'name' => 'Kraken',
    'logo' => get_stylesheet_directory_uri() . '/assets/img/kraken-logo.svg',
    'initial' => 'K', 'color' => '#5841D8',
    'desc' => 'Reputație bună, opțiuni avansate.',
    'fees' => 'Maker 0.16% / Taker 0.26%', 'payment' => 'SEPA (în anumite regiuni)', 'security' => '2FA, cold storage',
    'featured' => false,
    'cta' => '#kraken-affiliate', 'learn' => home_url('/exchange-uri/#kraken')
  ],
  [
    'key' => 'cryptocom', 'name' => 'Crypto.com',
    'logo' => get_stylesheet_directory_uri() . '/assets/img/crypto-com-logo.svg',
    'initial' => 'C', 'color' => '#103F68',
    'desc' => 'App prietenoasă, carduri cu cashback.',
    'fees' => 'Spot ~0.075-0.1%', 'payment' => 'Card, Transfer', 'security' => '2FA, rezervaţie publică',
    'featured' => false,
    'cta' => '#crypto-com-affiliate', 'learn' => home_url('/exchange-uri/#crypto-com')
  ],
];
?>

<div class="compare-grid">
  <?php foreach ($exchanges as $ex): ?>
    <div class="compare-card <?php echo $ex['featured'] ? 'featured' : ''; ?>">
      <?php if ($ex['featured']): ?><span class="badge">Recomandat</span><?php endif; ?>
      <div class="logo">
        <?php 
          $fallback = btc_cmp_svg_data_uri($ex['initial'] ?? substr($ex['name'],0,1), $ex['color'] ?? '#2c3e50');
          $placeholder = get_stylesheet_directory_uri() . '/assets/img/exchange-placeholder.svg';
        ?>
        <?php if (in_array($ex['key'], ['kraken','cryptocom'], true)) : ?>
          <img src="<?php echo esc_url($ex['logo']); ?>" alt="<?php echo esc_attr($ex['name']); ?> logo" loading="lazy" width="28" height="28" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null; this.src='<?php echo esc_url($placeholder); ?>';">
        <?php else: ?>
          <img src="<?php echo esc_url($ex['logo']); ?>" alt="<?php echo esc_attr($ex['name']); ?> logo" loading="lazy" width="28" height="28" referrerpolicy="no-referrer" crossorigin="anonymous" onerror="this.onerror=null;this.src='<?php echo esc_attr($fallback); ?>'" />
        <?php endif; ?>
        <div>
          <h3><?php echo esc_html($ex['name']); ?></h3>
          <div class="desc"><?php echo esc_html($ex['desc']); ?></div>
        </div>
      </div>

      <div class="compare-metrics">
        <div class="metric"><div class="label">Comisioane</div><div class="value"><?php echo esc_html($ex['fees']); ?></div></div>
        <div class="metric"><div class="label">Metode de plată</div><div class="value"><?php echo esc_html($ex['payment']); ?></div></div>
        <div class="metric"><div class="label">Securitate</div><div class="value"><?php echo esc_html($ex['security']); ?></div></div>
        <div class="metric"><div class="label">Popularitate</div><div class="value"><?php echo $ex['featured'] ? '★★★★★' : '★★★★☆'; ?></div></div>
      </div>

      <div class="compare-actions">
        <a class="btn-primary" href="<?php echo esc_url($ex['cta']); ?>" target="_blank" rel="nofollow sponsored noopener">
          Începe pe <?php echo esc_html($ex['name']); ?> →
        </a>
        <a class="btn-secondary" href="<?php echo esc_url($ex['learn']); ?>">
          Vezi detalii
        </a>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<div class="compare-table-wrapper">
  <table class="compare-table">
    <thead>
      <tr>
        <th>Platformă</th>
        <th>Comisioane</th>
        <th>Metode de plată</th>
        <th>Securitate</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($exchanges as $ex): ?>
        <tr>
          <td><?php echo esc_html($ex['name']); ?> <?php if ($ex['featured']): ?><span class="best">(Recomandat)</span><?php endif; ?></td>
          <td><?php echo esc_html($ex['fees']); ?></td>
          <td><?php echo esc_html($ex['payment']); ?></td>
          <td><?php echo esc_html($ex['security']); ?></td>
          <td><a class="btn-primary" style="padding:.5rem .7rem; border-radius:8px; font-size:.9rem;" href="<?php echo esc_url($ex['cta']); ?>" target="_blank" rel="nofollow sponsored noopener">Deschide cont</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<div class="compare-notes">
  <ul>
    <li>Informațiile de mai sus sunt orientative; verifică întotdeauna comisioanele la zi pe site-ul fiecărei platforme.</li>
    <li>Linkurile marcate pot fi de afiliere. Sprijini proiectul folosindu-le, fără costuri suplimentare pentru tine.</li>
    <li>Nu este un sfat financiar. Investițiile în active digitale implică risc ridicat. Investește responsabil.</li>
  </ul>
</div>

<?php get_footer(); ?>
