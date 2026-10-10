<?php
// Canonical production URL. Keep this in sync with robots.txt, sitemap.xml and .htaccess.
$siteUrl = 'https://houseofelaan.com/';
$seoTitle = 'House of Elaan | Real Estate, Technology & Consultancy Islamabad';
$seoDescription = 'Explore House of Elaan in Islamabad: nine businesses in real estate, consultancy, technology, creative services, research, investment and hospitality.';
$seoImage = $siteUrl.'assets/images/architecture.jpg';
$schemaGraph = array(
 array('@type'=>'Organization','@id'=>$siteUrl.'#organization','name'=>'House of Elaan','url'=>$siteUrl,
  'logo'=>$siteUrl.'assets/logos/hoe-logo-web.svg','image'=>$seoImage,'telephone'=>'+923111222679','description'=>$seoDescription,
  'address'=>array('@type'=>'PostalAddress','addressLocality'=>'Islamabad','addressCountry'=>'PK'),
  'contactPoint'=>array('@type'=>'ContactPoint','telephone'=>'+923111222679','contactType'=>'customer service')),
 array('@type'=>'WebSite','@id'=>$siteUrl.'#website','url'=>$siteUrl,'name'=>'House of Elaan','inLanguage'=>'en',
  'publisher'=>array('@id'=>$siteUrl.'#organization')),
 array('@type'=>'WebPage','@id'=>$siteUrl.'#webpage','url'=>$siteUrl,'name'=>$seoTitle,'description'=>$seoDescription,
  'isPartOf'=>array('@id'=>$siteUrl.'#website'),'about'=>array('@id'=>$siteUrl.'#organization'),'primaryImageOfPage'=>array('@id'=>$siteUrl.'#primaryimage'),'inLanguage'=>'en'),
 array('@type'=>'ImageObject','@id'=>$siteUrl.'#primaryimage','url'=>$seoImage,'contentUrl'=>$seoImage,
  'caption'=>'Modern architecture representing House of Elaan business services')
);
foreach ($brands as $seoBrand) {
 $schemaGraph[] = array('@type'=>'Organization','@id'=>$siteUrl.'#company-'.$seoBrand['id'],
  'name'=>$seoBrand['name'],'url'=>$siteUrl.'#'.$seoBrand['id'],'description'=>$seoBrand['intro'],
  'parentOrganization'=>array('@id'=>$siteUrl.'#organization'));
}
$seoSchema = array('@context'=>'https://schema.org','@graph'=>$schemaGraph);
