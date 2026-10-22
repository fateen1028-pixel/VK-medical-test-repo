<?php
/* Shared head meta: title, description, canonical + Open Graph.
   Explicit pages set $seo_title / $seo_desc / $seo_canon before including this.
   Service pages set only $seo_cat (DB `cat` name) - metadata comes from the map below.
   Canonical forms = clean production URLs verified on live site. */
$seo_site    = "VK Medical Centre - Diagnostic Service Centre in Chennai";
$seo_image   = "https://vkmedicalcentre.com/favicon.png";
$seo_cat     = isset($seo_cat) ? trim($seo_cat) : null;

/* Single source of truth for the 12 service pages, keyed by trimmed DB `cat`.
   entry = array(title, description, H1). Canonical slug derives from the key. */
$seo_services = array(
 'Digital Laboratory' => array('Blood Test Centre & Digital Laboratory in Chennai | VK Medical Centre', 'Fully automated digital laboratory in Chennai for blood tests - CBC, diabetes, thyroid, kidney, liver and anaemia panels with same-day results for routine tests.', 'Blood Test Centre in Chennai - Digital Laboratory'),
 'Digital ECG' => array('ECG Testing Centre in Chennai | Digital ECG | VK Medical Centre', 'Digital 12-lead ECG in Chennai with instant reports, performed in a quiet, hygienic environment for routine and emergency heart screening.', 'ECG Testing Centre in Chennai'),
 'Digital X-Ray' => array('Digital X-Ray Centre in Chennai | VK Medical Centre', 'Digital X-ray centre in Chennai - chest, musculoskeletal, skull, spine and dental X-rays with minimal radiation, walk-in service and digital reports.', 'Digital X-Ray Centre in Chennai'),
 'Advance USG Sacn' => array('Ultrasound (USG) Scan Centre in Chennai | VK Medical Centre', 'Ultrasound (USG) scan centre in Chennai - abdominal, pelvic, thyroid and pregnancy scans with 2D, 3D and Doppler imaging by experienced radiologists.', 'Ultrasound (USG) Scan Centre in Chennai'),
 'Echo Cardiogram' => array('Echocardiography (2D Echo) Centre in Chennai | VK Medical Centre', 'Echocardiography (2D echo) in Chennai - real-time assessment of heart function with colour Doppler, for chest pain, high blood pressure and murmur follow-up.', 'Echocardiography (2D Echo) Centre in Chennai'),
 'Colour Doppler' => array('Colour Doppler Scan Centre in Chennai | VK Medical Centre', 'Colour Doppler scan centre in Chennai - real-time blood-flow imaging to detect clots, blockages and varicose veins, safe for pregnancy monitoring.', 'Colour Doppler Scan Centre in Chennai'),
 'Pulmonary Function Testing (PFT)' => array('Pulmonary Function Testing (PFT) Centre in Chennai | VK Medical Centre', 'Pulmonary Function Testing (PFT) in Chennai - measures lung volume and capacity for asthma and COPD detection, pre-op fitness and long-term monitoring.', 'Pulmonary Function Testing (PFT) Centre in Chennai'),
 'Audiometry' => array('Audiometry Testing Centre in Chennai | VK Medical Centre', 'Audiometry (hearing test) centre in Chennai - pure tone and speech audiometry for all age groups, covering air and bone conduction testing.', 'Audiometry Testing Centre in Chennai'),
 'Uroflowmetry' => array('Uroflowmetry Test Centre in Chennai | VK Medical Centre', 'Uroflowmetry test in Chennai - fast, painless urine-flow measurement to detect urinary blockages and prostate issues, with no hospital stay needed.', 'Uroflowmetry Test Centre in Chennai'),
 'Treadmill Test (TMT)' => array('Treadmill Test (TMT) Centre in Chennai | VK Medical Centre', 'Treadmill test (TMT) in Chennai - cardiologist-supervised cardiac stress test that reveals hidden heart issues and helps prevent heart attacks.', 'Treadmill Test (TMT) Centre in Chennai'),
 'Pre-Employment Medical Checkup' => array('Pre-Employment Medical Checkup in Chennai | VK Medical Centre', 'Pre-employment medical checkup in Chennai - lab tests, scans and fitness assessments tailored to job-specific requirements.', 'Pre-Employment Medical Checkup in Chennai'),
 'Blood Collection Home Visit' => array('Blood Test Home Collection in Chennai | VK Medical Centre', 'Blood sample collection at home in Chennai by certified phlebotomists, with same-day pickup and digital report access - ideal for seniors, kids and chronic care.', 'Blood Collection Home Visit in Chennai'),
);

if (!isset($seo_title, $seo_desc, $seo_canon) && isset($seo_cat, $seo_services[$seo_cat])) {
	$m = $seo_services[$seo_cat];
	$seo_title = $m[0];
	$seo_desc  = $m[1];
	$seo_canon = "https://vkmedicalcentre.com/" . preg_replace("/\\s+/", "_", $seo_cat) . "/";
	$seo_h1    = $m[2];
}
if (isset($seo_cat) && !isset($seo_services[$seo_cat])) {
	// Unknown service id (junk / empty page) - keep it out of the index, no canonical.
	$seo_title = "Page Not Found | VK Medical Centre";
	$seo_desc  = "The page you requested could not be found. Explore diagnostic services at VK Medical Centre, Chennai.";
	$seo_canon = null;
} else {
	$seo_title  = $seo_title ?? "VK Medical Centre - Diagnostic Centre in Chennai";
	$seo_desc   = $seo_desc ?? "Looking for a Diagnostic Centre in Chennai? Get X-ray, ECG, Ultrasound and Full-body tests with secure Home sample collection and fast digital reporting.";
	$seo_canon  = $seo_canon ?? "https://vkmedicalcentre.com/";
}
?>
<?php if ($seo_canon === null) { ?>
<meta name="robots" content="noindex,follow">
<meta name="description" content="<?php echo htmlspecialchars($seo_desc, ENT_QUOTES, "UTF-8"); ?>">
<?php } else { ?>
<title><?php echo htmlspecialchars($seo_title, ENT_QUOTES, "UTF-8"); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($seo_desc, ENT_QUOTES, "UTF-8"); ?>">
<link rel="canonical" href="<?php echo htmlspecialchars($seo_canon, ENT_QUOTES, "UTF-8"); ?>">
<meta property="og:locale" content="en_US">
<meta property="og:site_name" content="<?php echo $seo_site; ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo htmlspecialchars($seo_title, ENT_QUOTES, "UTF-8"); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($seo_desc, ENT_QUOTES, "UTF-8"); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($seo_canon, ENT_QUOTES, "UTF-8"); ?>">
<meta property="og:image" content="<?php echo $seo_image; ?>">
<meta property="og:image:secure_url" content="<?php echo $seo_image; ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($seo_title, ENT_QUOTES, "UTF-8"); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($seo_desc, ENT_QUOTES, "UTF-8"); ?>">
<meta name="twitter:image" content="<?php echo $seo_image; ?>">
<?php } ?>
