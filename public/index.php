<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 16/03/15
 * Time: 21:09
 */

// Directory separator is set up here because separators are different on Linux and Windows operating systems 
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

define('APPLICATIONROOT', ROOT . DS . 'app');

require_once ROOT . '/vendor/autoload.php';
require_once APPLICATIONROOT . DS . 'config' . DS . 'config.php';

$bootstrap = new MyCustomStudyxMVCApp();
$bootstrap->run();
