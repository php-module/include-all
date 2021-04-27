<?php
/**
 * @version 2.0
 * @author Sammy
 * 
 * @keywords Samils, ils, php framework
 * -----------------
 * @namespace Sammy\Packs\IncludeAll
 * - Autoload, application dependencies
 */
namespace Sammy\Packs\IncludeAll {
	defined('INCLUDE_ALL_ROOT') or define('INCLUDE_ALL_ROOT', __DIR__);
	/**
	 * Make sure the module base internal class is not
	 * declared in the php global scope defore creating 
	 * it.
	 */
	$includeAll = require (dirname (__FILE__) . '/core/index.php');
	/**
	 * Autoload includeAll extensions
	 */
	$includeAll->includeAll ('./core/exts');
}
