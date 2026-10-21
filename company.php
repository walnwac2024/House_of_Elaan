<?php
require __DIR__ . '/companies.php';
require __DIR__ . '/seo.php';
function company_escape($value) { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); }
$id = isset($_GET['company']) && is_string($_GET['company']) ? $_GET['company'] : '';
$company = null;
$companyIndex = 0;
foreach ($brands as $index => $candidate) {
 if ($candidate['id'] === $id) { $company = $candidate; $companyIndex = $index; break; }
}
if (!$company) {
 http_response_code(404);
 header('Content-Type: text/html; charset=UTF-8');
 echo '<!doctype html><html lang="en"><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Company not found | House of Elaan</title><body><main style="max-width:700px;margin:12vh auto;padding:24px;font-family:Arial,sans-serif"><h1>Company not found</h1><p>This company page is not available.</p><a href="./#businesses">Explore our businesses</a></main></body></html>';
 exit;
}
$phone = $companyPhones[$id];
$gallery = $companyGalleries[$id];
$galleryAlt = array(
 'images/architecture.jpg'=>'Modern glass architecture',
 'images/creative.jpg'=>'Creative design materials and studio work',
 'images/hospitality.jpg'=>'Contemporary hospitality setting',
 'images/investment.jpg'=>'Financial charts on a workstation',
 'images/team.jpg'=>'Professionals collaborating together',
 'images/technology.jpg'=>'Technology and development workspace'
);
$brandColors = array(
 'marketing'=>'#d43632', 'consultancy'=>'#383539', 'kreators'=>'#ed6b20',
 'research'=>'#168e62', 'dynamics'=>'#3263c8', 'investo'=>'#19735f',
 'comfort'=>'#ab8e62', 'etcetera'=>'#168d85', 'production'=>'#bb3344'
);
$pageUrl = $siteUrl.'company.php?company='.rawurlencode($id);
$pageTitle = $company['name'].' | House of Elaan';
$pageDescription = $company['intro'];
$next = $brands[($companyIndex + 1) % count($brands)];
?>
<!doctype html>
<html lang="en">
<head>
 <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
 <title><?php echo company_escape($pageTitle); ?></title>
 <meta name="description" content="<?php echo company_escape($pageDescription); ?>">
 <meta name="theme-color" content="#c93932">
 <link rel="canonical" href="<?php echo company_escape($pageUrl); ?>">
 <link rel="icon" type="image/svg+xml" href="assets/icons/hoe-favicon.svg">
 <meta property="og:type" content="website"><meta property="og:title" content="<?php echo company_escape($pageTitle); ?>"><meta property="og:description" content="<?php echo company_escape($pageDescription); ?>"><meta property="og:url" content="<?php echo company_escape($pageUrl); ?>"><meta property="og:image" content="<?php echo company_escape($siteUrl.'assets/'.$gallery[0]); ?>">
 <link rel="preload" href="assets/fonts/Gilroy-SemiBold.woff" as="font" type="font/woff" crossorigin>
 <link rel="stylesheet" href="assets/css/company.css?v=<?php echo filemtime(__DIR__ . '/assets/css/company.css'); ?>">
 <link rel="stylesheet" href="assets/css/shared-footer-icons.css?v=<?php echo filemtime(__DIR__ . '/assets/css/shared-footer-icons.css'); ?>">
</head>
<body>
<a class="skip" href="#company-main">Skip to company information</a>
<header class="company-header"><div class="company-wrap company-header-inner">
 <a class="company-home" href="./" aria-label="House of Elaan home"><img src="assets/logos/hoe-logo-web.svg" alt="House of Elaan" width="184" height="56"></a>
 <nav aria-label="Company navigation"><a href="./#businesses">All businesses</a><a href="./#contact">Contact</a></nav>
</div></header>
<main id="company-main">
 <div class="company-wrap"><nav class="company-breadcrumb" aria-label="Breadcrumb"><a href="./">Home</a><span aria-hidden="true">/</span><a href="./#businesses">Our businesses</a><span aria-hidden="true">/</span><span aria-current="page"><?php echo company_escape($company['name']); ?></span></nav></div>
 <section class="company-hero company-wrap" style="--brand-color:<?php echo company_escape($brandColors[$id]); ?>" aria-labelledby="company-title">
  <div class="company-hero-copy">
   <span class="company-eyebrow"><?php echo sprintf('%02d', $companyIndex + 1); ?> / HOUSE OF ELAAN</span>
   <p class="company-tag"><?php echo company_escape($company['tag']); ?></p>
   <h1 id="company-title"><?php echo company_escape($company['name']); ?></h1>
   <p class="company-lead"><?php echo company_escape(strip_tags(str_replace('<br>', ' ', $company['title']))); ?></p>
   <div class="company-hero-actions"><a class="company-button" href="tel:<?php echo company_escape($phone); ?>">Let's Talk <span aria-hidden="true">↗</span></a><a class="company-text-link" href="#company-services">Explore services <span aria-hidden="true">↓</span></a></div>
  </div>
  <div class="company-brand-hero" aria-label="<?php echo company_escape($company['name']); ?> logo and work">
   <span class="company-brand-orbit company-brand-orbit-one" aria-hidden="true"></span>
   <span class="company-brand-orbit company-brand-orbit-two" aria-hidden="true"></span>
   <div class="company-brand-mark"><img src="assets/<?php echo company_escape($companyLogos[$id]); ?>" alt="<?php echo company_escape($company['name']); ?> logo" width="400" height="200"></div>
   <div class="company-brand-wave" aria-hidden="true"></div>
   <span class="company-brand-label">01 / <?php echo company_escape($company['name']); ?></span>
  </div>
 </section>
 <section class="company-gallery company-wrap" aria-label="<?php echo company_escape($company['name']); ?> images">
  <?php foreach ($gallery as $imageIndex => $image): ?>
  <figure class="company-gallery-image"><img src="assets/<?php echo company_escape($image); ?>" alt="<?php echo company_escape($imageIndex === 0 ? $company['alt'] : $galleryAlt[$image]); ?>" width="1000" height="750" loading="lazy" decoding="async"></figure>
  <?php endforeach; ?>
 </section>
 <section class="company-about company-wrap" aria-labelledby="company-about-title"><div><span class="company-eyebrow">ABOUT THE BUSINESS</span><h2 id="company-about-title">Focused expertise.<br><em>One shared vision.</em></h2></div><p><?php echo company_escape($company['intro']); ?></p></section>
 <section class="company-services" id="company-services" aria-labelledby="company-services-title"><div class="company-wrap"><div class="company-section-heading"><div><span class="company-eyebrow">WHAT WE DO</span><h2 id="company-services-title">Services that move<br>you forward.</h2></div><span class="company-service-count"><?php echo sprintf('%02d', count($company['services'])); ?> SPECIALTIES</span></div><div class="company-service-grid"><?php $serviceNumber=0; foreach ($company['services'] as $service => $description): $serviceNumber++; ?><article class="company-service"><span><?php echo sprintf('%02d', $serviceNumber); ?></span><h3><?php echo company_escape($service); ?></h3><p><?php echo company_escape($description); ?></p></article><?php endforeach; ?></div></div></section>
 <section class="company-next company-wrap"><div><span class="company-eyebrow">KEEP EXPLORING</span><h2>One house. More possibilities.</h2><p>Discover another specialist business in the House of Elaan family.</p></div><a href="company.php?company=<?php echo rawurlencode($next['id']); ?>">Next: <?php echo company_escape($next['name']); ?> <span aria-hidden="true">↗</span></a></section>
</main>
<?php
$footerPrefix = './';
$footerTopTarget = '#company-main';
require __DIR__ . '/partials/site-footer.php';
?>
<script src="assets/js/company-detail.js?v=<?php echo filemtime(__DIR__ . '/assets/js/company-detail.js'); ?>" defer></script>
</body>
</html>
