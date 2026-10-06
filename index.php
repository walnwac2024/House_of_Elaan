<?php
$brands = array(
 array('id'=>'marketing','name'=>'Elaan Marketing','tag'=>'REAL ESTATE & DEVELOPMENT','title'=>'Extraordinary spaces.<br>Exceptional opportunities.','image'=>'architecture.jpg','alt'=>'Modern glass architecture rising toward the sky','intro'=>'Elaan Marketing is a premier real estate marketing firm with a diverse portfolio of ongoing projects spanning Islamabad and other key cities across Pakistan. We connect buyers with promising residential and commercial opportunities, from high-rise developments to expansive residential communities.','services'=>array('Residential & commercial properties'=>'Opportunities carefully curated around the needs and aspirations of our clients.','Sales & marketing'=>'A comprehensive approach grounded in integrity, innovation, and excellence.','A diverse project portfolio'=>'The Magnus Mall, GRC, Twin City Towers, and Islamabad Luxury Apartments.')),
 array('id'=>'consultancy','name'=>'Elaan Consultancy','tag'=>'EXPERTISE THAT MOVES YOU FORWARD','title'=>'A clear direction.<br>A trusted partner.','image'=>'team.jpg','alt'=>'Professionals collaborating around a table','intro'=>'Our consultancy arm brings international expertise, legal guidance, and financial insight together. We help businesses navigate complex challenges with practical solutions and a commitment to international standards.','services'=>array('International collaboration'=>'Facilitating B2B and G2G collaborations across 70 countries.','Legal consultancy'=>'A dedicated team offering legal solutions to complex issues.','Financial consultancy'=>'Round-the-clock financial advice for vendors and businesses.')),
 array('id'=>'kreators','name'=>'Kreators','tag'=>'CREATIVE & DIGITAL SOLUTIONS','title'=>'Ideas that stand out.<br>Brands that connect.','image'=>'creative.jpg','alt'=>'A colorful collection of creative design and branding work','intro'=>'Kreators is a full-service advertising agency offering design, digital marketing, SEO, photography, and videography. Our multidisciplinary approach creates cohesive strategies that drive engagement and business growth, elevating your brand online and offline.','services'=>array('Design & brand identity'=>'Visually compelling design and consistent communication across all media.','Photography & video'=>'Creative visual storytelling that brings your brand to life.','Digital marketing & SEO'=>'Strategies that strengthen your online presence and connect with your audience.')),
 array('id'=>'research','name'=>'Elaan Research Centre','tag'=>'KNOWLEDGE WITH PURPOSE','title'=>'Insight today.<br>Impact tomorrow.','image'=>'team.jpg','alt'=>'A diverse team exchanging ideas and insights','intro'=>'Based in Islamabad, Elaan Research Centre is a think tank focused on International Relations, Social Issues, and Cross-National Business Connectivity. Our network of experts and scholars studies geopolitical dynamics, societal challenges, and emerging business opportunities to support informed decisions in Pakistan and beyond.','services'=>array('International relations'=>'Research, dialogue, and internationally recognized contributions.','Social issues'=>'Strengthening societal roles, institutional contributions, and national infrastructure.','Connecting businesses'=>'Building meaningful connections between real estate and its related industries.')),
 array('id'=>'dynamics','name'=>'Elaan Dynamics','tag'=>'TECHNOLOGY FOR WHAT’S NEXT','title'=>'Digital possibilities.<br>Built around you.','image'=>'technology.jpg','alt'=>'Laptop and development workspace','intro'=>'Elaan Dynamics is a specialized software house focused on web development and SaaS solutions. Using HTML, CSS, jQuery, PHP, and MySQLi, we deliver tailored, scalable, secure, and efficient solutions that support business success.','services'=>array('Custom web development'=>'Responsive, user-friendly websites with a focus on performance and security.','SaaS product development'=>'Full-cycle development, from initial ideas to scalable multi-tenant products.','Maintenance & cloud migration'=>'Website maintenance, optimization, and transitions to cloud-based solutions.')),
 array('id'=>'investo','name'=>'Investo','tag'=>'INVESTMENT & WEALTH MANAGEMENT','title'=>'Your ambitions.<br>A considered strategy.','image'=>'investment.jpg','alt'=>'Financial charts and analysis on a workstation','intro'=>'Investo provides personalized investment management services for individuals and organizations. Our advisors use data-driven strategies to build portfolios around your financial goals, with a focus on both immediate opportunities and long-term financial security.','services'=>array('Asset management'=>'Personalized allocation across equities, bonds, and real estate, aligned with your goals and risk tolerance.','Retirement planning'=>'Long-term strategies shaped around your current situation and retirement ambitions.','Wealth advisory'=>'Holistic financial planning, including estate planning, tax optimization, and risk management.')),
 array('id'=>'comfort','name'=>'Comfort & Luxury','tag'=>'EXCEPTIONAL HOSPITALITY','title'=>'A little more comfort.<br>A lot more possibility.','image'=>'hospitality.jpg','alt'=>'Luxury hospitality setting with a swimming pool','intro'=>'Comfort & Luxury owns and manages a portfolio of luxury guest houses, combining first-rate amenities with bespoke service. We welcome individual travelers and corporate clients with a commitment to exceptional hospitality and thoughtfully curated experiences.','services'=>array('Luxury accommodations'=>'High-end amenities, private pools, entertainment systems, and personal concierge service.','Event hosting & planning'=>'Intimate weddings, anniversaries, and corporate gatherings, with planning from decor to catering.','Business retreat services'=>'Meeting rooms, high-speed internet, and welcoming spaces for teamwork and strategic planning.')),
 array('id'=>'etcetera','name'=>'Elaan Etcetera','tag'=>'EVERY DETAIL, TAKEN CARE OF','title'=>'Seamless journeys.<br>Memorable experiences.','image'=>'hospitality.jpg','alt'=>'Welcoming hospitality space for memorable gatherings','intro'=>'Elaan Etcetera brings transport, food services, and event hospitality together. With a comprehensive approach to logistics and hospitality, we deliver reliable, convenient solutions for individuals, groups, and businesses.','services'=>array('Transport management'=>'Airport transfers, corporate shuttles, and event transportation for individuals and groups.','Food services'=>'Corporate meal plans and event catering tailored to different tastes and dietary needs.','Event hospitality'=>'Food, beverages, and waitstaff, with coordination from setup to teardown.')),
 array('id'=>'production','name'=>'Elaan Production','tag'=>'STORIES WORTH SHARING','title'=>'Your story.<br>Brought to life.','image'=>'creative.jpg','alt'=>'Creative studio materials representing visual storytelling','intro'=>'Elaan Production creates content for Elaan TV and provides production services for other organizations. With a commitment to quality, innovation, and storytelling, we bring ideas to life through broadcast content and bespoke production solutions.','services'=>array('Broadcast production'=>'Content production for Elaan TV.','Corporate video production'=>'Bespoke visual content for organizations and brands.','Live event coverage'=>'Capturing the moments and stories of your events.'))
);
$companyLogos = array(
 'marketing'=>'elaan-marketing-logo.svg', 'consultancy'=>'elaan-consultancy-logo.svg',
 'kreators'=>'kreators-logo.svg', 'research'=>'elaan-research-logo.svg',
 'dynamics'=>'dynamics-logo.svg', 'investo'=>'investo-logo.svg',
 'comfort'=>'comfort-luxury-logo.svg', 'etcetera'=>'elaan-etcetera-logo.svg',
 'production'=>'elaan-production-logo.svg'
);
$serviceTags = array(
 'marketing'=>array('Properties','Sales & marketing','Project portfolio'),
 'consultancy'=>array('Global partnerships','Legal advice','Financial advice'),
 'kreators'=>array('Brand design','Photo & video','Marketing & SEO'),
 'research'=>array('Global relations','Social research','Business connections'),
 'dynamics'=>array('Web development','SaaS products','Cloud & maintenance'),
 'investo'=>array('Asset management','Retirement','Wealth advisory'),
 'comfort'=>array('Luxury stays','Event planning','Business retreats'),
 'etcetera'=>array('Transport','Food services','Event hospitality'),
 'production'=>array('Broadcast','Corporate video','Live coverage')
);
require __DIR__ . '/seo.php';
function e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
function wordmark() { echo '<span class="wordmark wordmark-original"><img src="assets/hoe-logo-web.svg" alt="House of Elaan" width="512" height="156"></span>'; }
?>
<!doctype html>
<html lang="en">
<head>
 <link rel="icon" type="image/svg+xml" sizes="any" href="assets/hoe-favicon.svg">
 <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
 <title><?php echo e($seoTitle); ?></title>
 <meta name="description" content="<?php echo e($seoDescription); ?>">
 <meta name="theme-color" content="#c93932"><link rel="canonical" href="<?php echo e($siteUrl); ?>">
 <meta name="robots" content="index,follow,max-image-preview:large">
 <meta property="og:title" content="<?php echo e($seoTitle); ?>">
 <meta property="og:description" content="<?php echo e($seoDescription); ?>">
 <meta property="og:type" content="website"><meta property="og:site_name" content="House of Elaan">
 <meta property="og:url" content="<?php echo e($siteUrl); ?>">
 <meta property="og:locale" content="en_PK">
 <meta property="og:image" content="<?php echo e($siteUrl); ?>assets/architecture.jpg">
 <meta property="og:image:alt" content="Modern architecture representing House of Elaan's real estate and business services">
 <meta name="twitter:card" content="summary_large_image">
 <meta name="twitter:title" content="<?php echo e($seoTitle); ?>">
 <meta name="twitter:description" content="<?php echo e($seoDescription); ?>">
 <meta name="twitter:image" content="<?php echo e($siteUrl); ?>assets/architecture.jpg">
 <link rel="stylesheet" href="assets/style.css?v=<?php echo filemtime(__DIR__ . '/assets/style.css'); ?>"><link rel="stylesheet" href="assets/hero.css?v=<?php echo filemtime(__DIR__ . '/assets/hero.css'); ?>"><link rel="stylesheet" href="assets/about.css?v=<?php echo filemtime(__DIR__ . '/assets/about.css'); ?>"><link rel="stylesheet" href="assets/businesses.css?v=<?php echo filemtime(__DIR__ . '/assets/businesses.css'); ?>"><link rel="preload" href="assets/Gilroy-SemiBold.woff" as="font" type="font/woff" crossorigin>
 <script type="application/ld+json"><?php echo json_encode($seoSchema, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?></script>
<link rel="stylesheet" href="assets/responsive.css?v=<?php echo filemtime(__DIR__ . '/assets/responsive.css'); ?>"><link rel="stylesheet" href="assets/device-layouts.css?v=<?php echo filemtime(__DIR__ . '/assets/device-layouts.css'); ?>"></head>
<body>
<a class="skip" href="#main">Skip to content</a>
<div class="hero-premium sticky-site-header"><header class="header container"><a class="logo" href="#home" aria-label="House of Elaan home"><?php wordmark(); ?></a><button class="menu-toggle" aria-label="Open navigation" aria-expanded="false" aria-controls="navigation">☰</button><nav id="navigation" aria-label="Main navigation"><a href="#home">Home</a><a href="#about">About Us</a><a href="#businesses">Our Businesses</a><a href="#values">Our Values</a><a href="#faq">FAQs</a></nav><a class="button white header-contact" href="#contact">Let’s Connect <span>↗</span></a></header></div>
<main id="main">
<div class="hero-shell hero-premium" id="home"><div class="site-header-space" aria-hidden="true"></div>

 <section class="hero-v2 container" aria-labelledby="hero-title">
 <div class="hero-v2-copy">
 <span class="hero-kicker"><span></span> HOUSE OF ELAAN · ISLAMABAD, PAKISTAN</span>
 <h1 id="hero-title" aria-label="Revolutionizing modern businesses."><span class="hero-title-line" aria-hidden="true"><span>Revolutionizing</span></span><span class="hero-title-line" aria-hidden="true"><span>modern</span></span><span class="hero-title-line" aria-hidden="true"><em>businesses.</em></span></h1>
 <p>Based in Islamabad, Pakistan, House of Elaan brings together real estate marketing, consultancy, technology, and creative services. We integrate local expertise with global best practices to be your one-stop solution.</p>
 <div class="hero-v2-actions"><a class="button white" href="#businesses">Explore Our Businesses <span>↗</span></a><a class="hero-story" href="#about">Discover House of Elaan <span>↗</span></a></div>
 <div class="hero-principles"><span>Innovation</span><span>Collaboration</span><span>Dedication</span></div><a class="hero-scroll-invite" href="#overview-title"><span class="hero-scroll-track" aria-hidden="true"><i></i></span><span>One house. Endless possibilities.<small>Scroll to discover</small></span><b aria-hidden="true">&#8595;</b></a>
 </div>
 <div class="hero-v2-visual">
 <div class="hero-visual-label"><span>LOCAL EXPERTISE. GLOBAL BEST PRACTICES.</span></div>
 <div class="hero-building"><img src="assets/architecture.jpg" width="1000" height="750" fetchpriority="high" alt="Modern architecture representing House of Elaan’s business vision"><div class="hero-image-caption"><span>OUR SHARED VISION</span><strong>Creating a better<br>future for all.</strong></div><a href="#about" class="hero-image-arrow" aria-label="Discover our vision">↗</a></div>
 <div class="hero-solution"><strong>360<span>°</span></strong><span>Solutions built<br>around your needs.</span><a href="#about" aria-label="Explore our integrated approach">↗</a></div>
 <div class="hero-visual-footer"><span>ONE GROUP. <b>NINE SPECIALIST BUSINESSES.</b></span><span>01 — 09</span></div>
 </div>
 </section>
 <div class="hero-sectors container"><span>EXPERTISE THAT CONNECTS</span><a href="#marketing">Real Estate</a><span class="sector-dot" aria-hidden="true">•</span><a href="#dynamics">Technology</a><span class="sector-dot" aria-hidden="true">•</span><a href="#consultancy">Consultancy</a><span class="sector-dot" aria-hidden="true">•</span><a href="#comfort">Hospitality</a><a class="all-businesses" href="#businesses">Discover all businesses ↗</a></div>
</div>
<section class="group-overview" aria-labelledby="overview-title">
 <div class="container">
  <h2 id="overview-title">A shared vision. A world of expertise.</h2>
  <div class="overview-pills">
   <a class="overview-pill overview-card" href="#businesses"><strong>9</strong><span>Specialist Businesses</span></a>
   <a class="overview-pill overview-card" href="#about"><strong>360°</strong><span>Integrated Solutions</span></a>
   <a class="overview-pill overview-card" href="#values"><strong>5</strong><span>Core Values</span></a>
   <a class="overview-pill overview-card" href="#contact"><strong>One</strong><span>Commitment to Excellence</span></a>
  </div>
 </div>
</section>
<section class="about-elaan" id="about" aria-labelledby="about-title">
 <div class="container">
  <div class="about-intro about-reveal">
   <div class="about-title"><span class="eyebrow">GET TO KNOW HOUSE OF ELAAN</span><h2 id="about-title">Many strengths.<br><span>One extraordinary<br>vision.</span></h2><div class="about-signature"><span aria-hidden="true"><svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><ellipse cx="12" cy="12" rx="4" ry="9"/><path d="M3 12h18"/></svg></span><p>Local expertise.<br><strong>Global best practices.</strong></p></div></div>
   <div class="about-description"><span class="about-overline">A DIVERSIFIED GROUP. A SHARED PURPOSE.</span><p>House of Elaan is a diversified conglomerate that specializes in multiple sectors including <strong>construction, sales and marketing, IT, and architecture.</strong></p><p>We are committed to providing financial and legal services that meet international standards. Our unique ability to integrate local expertise with global best practices makes us a <strong>one-stop solution for our clients.</strong></p></div>
  </div>
  <div class="about-purpose-grid">
   <article class="about-purpose about-reveal"><div class="about-purpose-top"><span class="about-icon target-icon" aria-hidden="true">◎</span><span class="about-step">01 / OUR PURPOSE</span></div><h3>Our Mission</h3><span class="about-card-line" aria-hidden="true"></span><p>Our mission is to <strong>revolutionize modern businesses</strong> by tackling today’s challenges and delivering progressive results. We employ unique strategies to offer 360° solutions that meet our customers’ needs.</p><p>Our core philosophy revolves around innovation, collaboration, and dedication to make a positive impact on our employees, customers, and the world.</p><div class="about-card-foot"><span>Innovation</span><span>Collaboration</span><span>Dedication</span></div></article>
   <article class="about-purpose about-reveal"><div class="about-purpose-top"><span class="about-icon" aria-hidden="true">↗</span><span class="about-step">02 / OUR DIRECTION</span></div><h3>Our Vision</h3><span class="about-card-line" aria-hidden="true"></span><p>We aspire to be <strong>the leading company in Islamabad and across the nation.</strong> Our focus is to excel in every facet of our business operations, including client satisfaction, team development, and profitability.</p><p>Our aim is to maintain the highest quality standards and deliver unparalleled services in real estate, consultancy, sales &amp; marketing, architecture, IT solutions, and media services.</p><div class="about-card-foot"><span>Quality</span><span>People</span><span>Progress</span></div></article>
  </div>
  <article class="about-support about-reveal"><div class="about-support-title"><span class="eyebrow">WITH YOU, BEYOND THE SALE</span><h3>Our commitment<br>continues.</h3><a href="#contact">Connect with our team <span aria-hidden="true">↗</span></a></div><div class="about-support-copy"><h4>After-Sales Services</h4><p>We offer comprehensive business management services aimed at boosting efficiency, growth, and performance. Our approach includes regular feedback and accountability mechanisms to cater to our clients’ needs.</p></div></article>
 </div>
</section>
<section class="elaan-values" id="values" aria-labelledby="values-title"><div class="container">
 <div class="values-heading"><span class="eyebrow">THE PRINCIPLES THAT GUIDE US</span><h2 id="values-title">Built on values.<br><span>Driven by people.</span></h2><p>Five core values. One shared standard of excellence.</p></div>
 <div class="values-collection">
 <?php $values=array('Quality'=>array('value-quality.svg','Our commitment to world-class service makes us a market leader.'),'Innovation'=>array('value-innovation.svg','We continually adapt to meet the modern demands of our clients.'),'Trust & Integrity'=>array('value-trust.svg','Upholding ethical standards fosters customer trust.'),'Retention'=>array('value-retention.svg','We aim for continuous development and an exceptional onboarding experience.'),'Teamwork'=>array('value-teamwork.svg','Our team’s collaboration and mutual support drive innovative solutions.')); $valueIndex=0; foreach($values as $name=>$v): $valueIndex++; ?>
 <article class="elaan-value about-reveal"><div class="value-card-top"><div class="value-hex"><span class="value-symbol" aria-hidden="true"><img src="assets/<?php echo e($v[0]); ?>" alt="" width="36" height="36" loading="lazy" decoding="async"></span><span class="value-count" aria-hidden="true"><?php echo sprintf('%02d',$valueIndex); ?></span></div></div><h3><?php echo e($name); ?></h3><p><?php echo e($v[1]); ?></p></article>
 <?php endforeach; ?>
 </div>
</div></section>
<section class="businesses section" id="businesses"><div class="container"><div class="section-heading compact"><span class="eyebrow">OUR FAMILY OF BUSINESSES</span><h2>Specialist expertise.<br>Extraordinary possibilities.</h2><p>Discover the businesses turning our shared vision into everyday impact.</p></div>
<div class="business-card-grid">
<?php foreach($brands as $i=>$brand): ?>
<article class="enterprise-card business-reveal" id="<?php echo e($brand['id']); ?>">
 <div class="enterprise-logo-panel"><img src="assets/<?php echo e($companyLogos[$brand['id']]); ?>" alt="<?php echo e($brand['name']); ?> logo" width="400" height="200" loading="lazy" decoding="async"></div>
 <div class="enterprise-content">
  <div class="enterprise-service-tags" aria-label="Services"><?php foreach(array_keys($brand['services']) as $serviceIndex=>$serviceLabel): ?><span title="<?php echo e($serviceLabel); ?>"><?php echo e($serviceTags[$brand['id']][$serviceIndex]); ?></span><?php endforeach; ?></div>
  <div class="enterprise-title"><h3><?php echo e($brand['name']); ?></h3><span class="enterprise-index" aria-hidden="true"><?php echo sprintf('%02d',$i+1); ?></span></div>
  <p class="enterprise-category"><?php echo e($brand['tag']); ?></p>
  <div class="enterprise-reading" tabindex="0" role="region" aria-label="<?php echo e($brand['name']); ?> details"><div class="enterprise-intro"><h4><?php echo strip_tags(str_replace('<br>', ' ', $brand['title'])); ?></h4><p><?php echo e($brand['intro']); ?></p></div>
  <details class="enterprise-services"><summary><span>Explore our services <small><?php echo count($brand['services']); ?></small></span><b aria-hidden="true">+</b></summary><dl><?php foreach($brand['services'] as $service=>$description): ?><div><dt><?php echo e($service); ?></dt><dd><?php echo e($description); ?></dd></div><?php endforeach; ?></dl></details>
  </div><a class="enterprise-contact" href="#contact">Let’s Talk <span aria-hidden="true">↗</span></a>
 </div>
</article>
<?php endforeach; ?>
</div>
</div></section>
<section class="elaan-network" aria-labelledby="network-title"><div class="container network-layout">
 <div class="network-copy about-reveal"><span class="eyebrow">CONNECTED BY PURPOSE</span><h2 id="network-title">One house.<br><span>A world of expertise.</span></h2><p>From your next investment to your next big idea, our family of businesses brings the right expertise together to help you move forward.</p><a class="button white" href="#contact">Build Your Future With Us <span aria-hidden="true">↗</span></a><div class="network-note"><strong>9</strong><span>Specialist businesses.<br>One shared vision.</span></div></div>
 <div class="network-map about-reveal" aria-label="Explore our nine connected businesses">
 <div class="network-track" aria-hidden="true"><span class="network-orbit-light"></span></div><div class="network-core"><?php wordmark(); ?><span>ONE CONNECTED GROUP</span></div>
 <?php foreach($brands as $i=>$brand): $angle=$i*2*pi()/9; $radius=($i % 2 === 0) ? 43 : 28; $x=50+$radius*sin($angle); $y=50-$radius*cos($angle); ?><a class="network-node" href="#<?php echo e($brand['id']); ?>" style="--node-x:<?php echo round($x,2); ?>%;--node-y:<?php echo round($y,2); ?>%"><span aria-hidden="true"><?php echo sprintf('%02d',$i+1); ?></span><?php if ($brand['id'] === 'marketing'): ?><img class="network-company-logo" src="assets/elaan-marketing-logo.svg" alt="Elaan Marketing" width="400" height="200"><?php elseif ($brand['id'] === 'consultancy'): ?><img class="network-company-logo" src="assets/elaan-consultancy-logo.svg" alt="Elaan Consultancy" width="400" height="200"><?php elseif ($brand['id'] === 'kreators'): ?><img class="network-company-logo" src="assets/kreators-logo.svg" alt="Kreators" width="400" height="200"><?php elseif ($brand['id'] === 'research'): ?><img class="network-company-logo" src="assets/elaan-research-logo.svg" alt="Elaan Research Centre" width="400" height="200"><?php elseif ($brand['id'] === 'dynamics'): ?><img class="network-company-logo" src="assets/dynamics-logo.svg" alt="Elaan Dynamics" width="400" height="200"><?php elseif ($brand['id'] === 'investo'): ?><img class="network-company-logo" src="assets/investo-logo.svg" alt="Investo" width="400" height="200"><?php elseif ($brand['id'] === 'comfort'): ?><img class="network-company-logo" src="assets/comfort-luxury-logo.svg" alt="Comfort &amp; Luxury" width="400" height="200"><?php elseif ($brand['id'] === 'etcetera'): ?><img class="network-company-logo" src="assets/elaan-etcetera-logo.svg" alt="Elaan Etcetera" width="400" height="200"><?php elseif ($brand['id'] === 'production'): ?><img class="network-company-logo" src="assets/elaan-production-logo.svg" alt="Elaan Production" width="400" height="200"><?php else: ?><strong><?php echo e(str_replace('Elaan ','',$brand['name'])); ?></strong><?php endif; ?><b aria-hidden="true">↗</b></a><?php endforeach; ?>
 </div>
</div></section>
<section class="faq-refresh" id="faq" aria-labelledby="faq-title"><div class="container faq-layout">
 <div class="faq-intro about-reveal"><span class="eyebrow">A LITTLE MORE ABOUT US</span><h2 id="faq-title">Good questions.<br><span>Clear answers.</span></h2><p>Get to know our businesses, our approach, and how we can work together.</p><div class="faq-help"><span class="faq-help-label">LET’S TALK</span><h3>Have something<br>else in mind?</h3><p>Our team can help you find the right expertise.</p><a href="tel:+923111222679">Call +92 3111 222 679 <span aria-hidden="true">↗</span></a></div></div><div class="faq-list"><details open><summary><b class="faq-question">What is House of Elaan?</b><span aria-hidden="true">+</span></summary><p>House of Elaan is a diversified group based in Islamabad, Pakistan. Our businesses span real estate, consultancy, creative services, research, technology, investment management, hospitality, transport, and media production.</p></details><details><summary><b class="faq-question">What services does House of Elaan offer?</b><span aria-hidden="true">+</span></summary><p>Our nine specialist businesses provide property marketing, legal and financial consultancy, branding, digital marketing, web and SaaS development, research, investment services, luxury accommodation, catering, transport, and media production.</p></details><details><summary><b class="faq-question">Can I work with more than one Elaan business?</b><span aria-hidden="true">+</span></summary><p>Our integrated approach brings expertise from across the group together. Contact us to discuss your needs so we can connect you with the relevant teams.</p></details><details><summary><b class="faq-question">Do you provide support after the sale?</b><span aria-hidden="true">+</span></summary><p>Yes. Our after-sales approach includes ongoing business management support, regular feedback, and accountability to support efficiency, performance, and long-term growth.</p></details><details><summary><b class="faq-question">How can I get in touch with your team?</b><span aria-hidden="true">+</span></summary><p>Call <a href="tel:+923111222679">+92 3111 222 679</a> or connect with House of Elaan through our official social channels below. Our team can help you find the right business for your needs.</p></details></div></div></section>
<section class="contact-finale" id="contact" aria-labelledby="contact-title"><div class="container finale-layout">
 <div class="finale-copy about-reveal"><span class="eyebrow">LET’S CREATE WHAT’S NEXT</span><h2 id="contact-title">Your next chapter.<br><span>Starts with<br>a conversation.</span></h2><p>Your ambition. Our collective expertise.<br>Let’s create a better future, together.</p><div class="finale-signature"><span aria-hidden="true">•</span><span>One house. Endless possibilities.</span></div></div>
 <div class="finale-panel about-reveal"><div class="finale-panel-heading"><span class="eyebrow">CONNECT WITH HOUSE OF ELAAN</span><h3>Let’s talk about<br>what’s next.</h3><p>Tell us what you have in mind. We’ll help you connect with the right team.</p></div><a class="finale-phone" href="tel:+923111222679"><span><small>CALL OUR TEAM</small><strong>+92 3111 222 679</strong></span><b aria-hidden="true">↗</b></a><a class="finale-linkedin" href="https://pk.linkedin.com/company/elaanmarketing" target="_blank" rel="noopener noreferrer"><span><b class="finale-linkedin-icon" aria-hidden="true">in</b> Connect on LinkedIn</span></a><div class="finale-location"><span class="finale-location-dot" aria-hidden="true"></span> Islamabad, Pakistan</div></div>
</div></section>
</main>
<footer class="elaan-footer"><div class="container">
 <div class="footer-statement"><p>Many strengths.<br><span>One house.</span></p></div>
 <div class="footer-columns">
  <div class="footer-identity"><a href="#home" aria-label="House of Elaan home"><span class="wordmark wordmark-original"><img src="assets/hoe-logo-footer.svg" alt="House of Elaan" width="512" height="156" loading="lazy"></span></a><p>Local expertise. Global perspective.<br>Creating a better future, together.</p><span class="footer-location">Islamabad, Pakistan</span></div>
  <nav class="footer-navigation" aria-label="Footer navigation"><h2>Discover</h2><a href="#about">About Us</a><a href="#values">Our Values</a><a href="#businesses">Our Businesses</a><a href="#faq">FAQs</a></nav>
  <nav class="footer-navigation" aria-label="Business expertise"><h2>Our Expertise</h2><a href="#marketing">Real Estate</a><a href="#consultancy">Consultancy</a><a href="#dynamics">Technology</a><a href="#comfort">Hospitality</a></nav>
  <div class="footer-connect"><h2>Let’s Connect</h2><a class="footer-phone" href="tel:+923111222679">+92 3111 222 679 <span aria-hidden="true">↗</span></a><p>Find the right team for your next idea.</p><div class="footer-social-links" aria-label="Our social channels"><a href="https://www.facebook.com/elaanmarketing/" target="_blank" rel="noopener noreferrer" aria-label="Elaan Marketing on Facebook" title="Facebook"><span class="social-facebook" aria-hidden="true">f</span></a><a href="https://www.instagram.com/elaanmarketing" target="_blank" rel="noopener noreferrer" aria-label="Elaan Marketing on Instagram" title="Instagram"><span class="social-instagram" aria-hidden="true"></span></a><a href="https://pk.linkedin.com/company/elaanmarketing" target="_blank" rel="noopener noreferrer" aria-label="Elaan Marketing on LinkedIn" title="LinkedIn"><span class="social-linkedin" aria-hidden="true">in</span></a><a class="social-youtube" href="https://www.youtube.com/elaanmarketing" target="_blank" rel="noopener noreferrer" aria-label="Elaan Marketing on YouTube" title="YouTube"><svg viewBox="0 0 24 24" width="25" height="25" aria-hidden="true"><path fill="currentColor" d="M21.6 7.2a3 3 0 0 0-2.1-2.1C17.7 4.6 12 4.6 12 4.6s-5.7 0-7.5.5a3 3 0 0 0-2.1 2.1A31 31 0 0 0 2 12a31 31 0 0 0 .4 4.8 3 3 0 0 0 2.1 2.1c1.8.5 7.5.5 7.5.5s5.7 0 7.5-.5a3 3 0 0 0 2.1-2.1A31 31 0 0 0 22 12a31 31 0 0 0-.4-4.8Z"/><path fill="#ff0000" d="m10 8.8 5.5 3.2-5.5 3.2Z"/></svg></a>
<a class="social-twitter" href="https://x.com/elaanmarketing" target="_blank" rel="noopener noreferrer" aria-label="Elaan Marketing on Twitter" title="Twitter"><svg viewBox="0 0 24 24" width="24" height="24" aria-hidden="true"><path fill="currentColor" d="M23.95 4.57a10 10 0 0 1-2.83.78 4.94 4.94 0 0 0 2.17-2.72 9.99 9.99 0 0 1-3.13 1.2 4.92 4.92 0 0 0-8.38 4.48A13.98 13.98 0 0 1 1.64 3.16a4.92 4.92 0 0 0 1.52 6.57 4.9 4.9 0 0 1-2.23-.62v.06a4.92 4.92 0 0 0 3.95 4.83 4.94 4.94 0 0 1-2.22.08 4.93 4.93 0 0 0 4.6 3.42A9.88 9.88 0 0 1 0 19.54a13.94 13.94 0 0 0 7.55 2.21c9.06 0 14.01-7.5 14.01-14.01l-.02-.64a10.01 10.01 0 0 0 2.46-2.55Z"/></svg></a></div></div>
 </div>
 <div class="footer-legal"><span>© <?php echo date('Y'); ?> House of Elaan. All rights reserved.</span><span><i aria-hidden="true"></i> One house. Endless possibilities.</span></div>
</div></footer>
<a class="floating-whatsapp" href="https://wa.me/923111222679?text=Hello%20House%20of%20Elaan!%20I'd%20like%20to%20know%20more%20about%20your%20services.%20Please%20connect%20me%20with%20the%20right%20team." target="_blank" rel="noopener noreferrer" aria-label="Chat with House of Elaan on WhatsApp (opens in a new tab)" title="Chat on WhatsApp"><img src="assets/whatsapp.png" alt="" width="512" height="512"></a>
<a class="floating-back-top" href="#home" aria-label="Back to top" title="Back to top"><span aria-hidden="true">↑</span></a>
<dialog class="inquiry-dialog call-dialog" aria-labelledby="inquiry-title" aria-describedby="inquiry-description">
 <button class="inquiry-close" type="button" aria-label="Close call options">&times;</button>
 <span class="inquiry-eyebrow">LET'S START A CONVERSATION</span>
 <h2 id="inquiry-title">Let's talk.</h2>
 <p class="inquiry-intro" id="inquiry-description">Call our team and we'll connect you with the right expertise.</p>
 <div class="call-business"><span>YOU'RE INTERESTED IN</span><strong class="inquiry-business">House of Elaan</strong></div>
 <a class="call-number" href="tel:+923111222679">+92 3111 222 679</a>
 <a class="inquiry-call-button" href="tel:+923111222679"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2A19.8 19.8 0 0 1 3.1 5.2 2 2 0 0 1 5.1 3h3a1 1 0 0 1 1 .9l.5 3a1 1 0 0 1-.3.9L7.8 9.3a16 16 0 0 0 6.9 6.9l1.5-1.5a1 1 0 0 1 .9-.3l3 .5a1 1 0 0 1 .9 1z"/></svg>Call now</a>
 <p class="call-hint">Opens your phone or calling app.</p>
</dialog>

<dialog class="nav-drawer" id="mobile-navigation" aria-labelledby="drawer-title">
 <div class="drawer-heading"><span id="drawer-title" class="drawer-brand"><img src="assets/hoe-logo-web.svg" alt="House of Elaan" width="512" height="156"></span><button class="drawer-close" type="button" aria-label="Close navigation">&times;</button></div>
 <nav class="drawer-links" aria-label="Mobile navigation"></nav>
 <div class="drawer-contact"><p>Let’s create what’s next.</p><a href="tel:+923111222679">+92 3111 222 679 <span aria-hidden="true">↗</span></a></div>
</dialog>
<script src="assets/script.js?v=<?php echo filemtime(__DIR__ . '/assets/script.js'); ?>" defer></script><script src="assets/business-scroll.js?v=<?php echo filemtime(__DIR__ . '/assets/business-scroll.js'); ?>" defer></script>
</body></html>
