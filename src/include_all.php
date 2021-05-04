<?php

function include_all ($path = '') {
	/**
	 * Make sure the module base internal class is not
	 * declared in the php global scope defore creating
	 * it.
	 */
	$includeAll = require (INCLUDE_ALL_ROOT . '/core/index.php');
	/**
	 * Autoload includeAll extensions
	 */
	$includeAll->includeAll ($path,
		debug_backtrace ()
	);
}
