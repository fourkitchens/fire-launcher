<?php

/**
 * @file
 * Fire launcher loader.
 */

use DrupalFinder\DrupalFinder;

set_time_limit(0);
define('FIRE_LAUNCHER_VERSION', '0.1');
$autoloaders = [
  __DIR__ . '/../../../autoload.php',
  __DIR__ . '/../vendor/autoload.php'
];

foreach ($autoloaders as $file) {
  if (file_exists($file)) {
    $autoloader = $file;
    break;
  }
}

if (isset($autoloader)) {
  require_once $autoloader;
}
else {
  echo 'You must set up the project dependencies using `composer install`' . PHP_EOL;
  exit(1);
}

$version = FALSE;
$version_launcher = FALSE;
$fire_version = NULL;
$root = FALSE;
$init = FALSE;

if (isset($_SERVER['argv'][1])) {
  $arg = $_SERVER['argv'][1];
  switch ($arg) {
    case "--version":
      $version = true;
      break;

    case "--launcher-version":
      $version_launcher = true;
      break;
  }
}
$cwd = getcwd();
/* @var DrupalFinder\DrupalFinder */
$drupalFinder = new DrupalFinder();

if ($drupalFinder->locateRoot($cwd)) {

  $localRoot = explode('/', $drupalFinder->getDrupalRoot());
  array_pop($localRoot);
  $localRoot = implode('/', $localRoot);

  if ($version_launcher) {
    echo "Fire Launcher Version: " . FIRE_LAUNCHER_VERSION . PHP_EOL;
    exit(0);
  }


  $vendor_dir = $drupalFinder->getVendorDir() ;
  if (file_exists($vendor_dir . '/fourkitchens/fire/')) {
      require_once $vendor_dir . '/fourkitchens/fire/bin/fire';
  }
  else {
    echo 'The FIRE launcher could not find a Fire instalation, please run:' . PHP_EOL;
    echo '- Run \'composer require --dev fourkitchens/fire\' in project root' . PHP_EOL;
    exit(1);
  }
}
else {
  echo 'The FIRE launcher could not find a Drupal site to operate on. Please do *one* of the following:' . PHP_EOL;
  echo '- Navigate to any where within your Drupal project and try again.' . PHP_EOL;
  echo '- Run \'composer require --dev fourkitchens/fire\' in project root' . PHP_EOL;
  exit(1);
}
