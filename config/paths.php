<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Use the DS to separate the directories in other defines
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

/**
 * These defines should only be edited if you have cake installed in
 * a directory layout other than the way it is distributed.
 * When using custom settings be sure to use the DS and do not add a trailing DS.
 */

/**
 * The full path to the directory which holds "src", WITHOUT a trailing DS.
 */
define('ROOT', dirname(__DIR__));

/**
 * The actual directory name for the application directory. Normally
 * named 'src'.
 */
define('APP_DIR', 'src');

/**
 * Path to the application's directory.
 */
define('APP', ROOT . DS . APP_DIR . DS);

/**
 * Path to the config directory.
 */
define('CONFIG', ROOT . DS . 'config' . DS);

/**
 * File path to the webroot directory.
 */
define('WWW_ROOT', ROOT . DS . 'webroot' . DS);

/**
 * Path to the tests directory.
 */
define('TESTS', ROOT . DS . 'tests' . DS);

/**
 * Path to the temporary files directory.
 */
define('TMP', ROOT . DS . 'tmp' . DS);

/**
 * Path to the logs directory.
 */
define('LOGS', ROOT . DS . 'logs' . DS);

/**
 * Path to the cache files directory. It can be shared between hosts in a multi-server setup.
 */
define('CACHE', TMP . 'cache' . DS);

/**
 * The absolute path to the "cake" directory, WITHOUT a trailing DS.
 *
 * CakePHP should always be installed with composer, so look there.
 */
define('CAKE_CORE_INCLUDE_PATH', ROOT . DS . 'vendor' . DS . 'cakephp' . DS . 'cakephp');

/**
 * Path to the cake directory.
 */
define('CORE_PATH', CAKE_CORE_INCLUDE_PATH . DS);

define('CAKE', CORE_PATH . 'src' . DS);
//******//
define('DOT', '.');

define('VENDOR', ROOT.DS.'Vendor'.DS);

define('IMAGE', WWW_ROOT.'img'.DS);

define('AVATARS', WWW_ROOT.'img'.DS.'avatars'.DS);

define('THUMBNAILS', WWW_ROOT.'img'.DS.'thumbnails'.DS);
define('ARTICLES', WWW_ROOT.'img'.DS.'articles'.DS);

define('PRODUCTS', WWW_ROOT.'img'.DS.'products'.DS);
define('CATEGORIES', WWW_ROOT.'img'.DS.'categories'.DS);

// TCPDF
define('TCPDF_CONFIG', ROOT.DS.'Vendor'.DS.'TCPDF'.DS.'config'.DS);
// ARO 
define('ARO_ADMIN', '1');
// ACO
define('ACO_CONTROLLER', '1');
// GROUP:
define('ADMIN', '1');
define('CUSTOMERS', '4');
define('SUPPLIERS', '3');
// Product: Active - Deactive
define('PRODUCT_ACTIVE', 1);
define('PRODUCT_DEACTIVE', 0);

// Customer:
define('CUSTOMER_VIP', 0);
define('CUSTOMER_WHOLESALE', 1); // wholesale
define('CUSTOMER_RETAIL', 2); // retail
//## LIMIT ##//
define('LIMIT', 20);
//## echo number_format($invoice->customers_paid, DECIMALS) ##/
define('DECIMALS', 0); 

//## echo 'SP.'.str_pad($product->id, ZEROFILL, ZERO, STR_PAD_LEFT); ##//
define('ZERO', 0);
define('ZEROFILL', 5);

define('STOCK', 'SK.');
define('PRODUCT', 'SP.');
define('INVOICE', 'IN.');
// EMAIL
define('ROOT_CHANGE_PASSWORD', 'http://192.168.4.108/users/changepassword/');
define('ROOT_ACTIVE_ACC', 'http://192.168.4.108/users/activeacc/');
// TYPE CATEGORIES
define('VERTICAL', 0);
define('HORIZONTAL', 1);

define('ACTIVED', 1);
define('DEACTIVED', 0);

// TYPE ARTICLES 
define('ARTICLE_SIGNLE', 0);
define('ARTICLE_CATEGORIES', 1);
define('ARTICLE_HELP', 2);
define('ARTICLE_SNJ', 3);
define('ARTICLE_MYACCOUNT', 4);