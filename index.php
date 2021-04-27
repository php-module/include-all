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
	/**
	 * Make sure the module base internal class is not
	 * declared in the php global scope defore creating
	 * it.
	 */
	return include_once (dirname (__FILE__) .
    '/core/index.php'
  );
}
