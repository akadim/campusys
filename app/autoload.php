<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

/*
$loader->registerPrefixes(array(
    'Html2Pdf_'        => __DIR__.'/../vendor/html2pdf/lib',
));
*/

$loader->add('Html2Pdf_', __DIR__.'/../vendor/html2pdf/lib');
set_include_path(__DIR__.'/../vendor/html2pdf/lib'.PATH_SEPARATOR.get_include_path());


return $loader;
