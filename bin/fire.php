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

    case "init":
       $init = TRUE;
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
    // Fire Init command.
    if ($init) {
      if (file_exists($vendor_dir . '/fourkitchens/fire/assets/templates/fire.yml')) {
        copy($vendor_dir . '/fourkitchens/fire/assets/templates/fire.yml', $localRoot . '/fire.yml');
        echo 'fire.yml file created in your directory' . PHP_EOL;
        echo 'Please edit the file and setup the required variables' . PHP_EOL;
        exit(0);
      }
      echo 'The FIRE launcher could not find the required template file.' . PHP_EOL;
      echo 'Please update your fire package instalation' . PHP_EOL;
      echo  '- Run \'composer update fourkitchens/fire\' into your project root.'. PHP_EOL;
      exit(1);
    }
    // Checking Fire package running requirements.
    if (file_exists($localRoot . '/fire.yml')) {
      require_once $vendor_dir . '/fourkitchens/fire/bin/fire';
    }
    else {
      echo 'The FIRE launcher could not find a fire.yml file, please follow these instructions:' . PHP_EOL;
      echo '- Run \'fire init\' in project root' . PHP_EOL;
      echo 'And configure the required varibles into the fire.yml file.' . PHP_EOL;
    }
    exit(0);
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
