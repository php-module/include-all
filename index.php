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
  use php\module as phpmodule;

  include_once __DIR__ . '/autoload.php';
	/**
	 * Make sure the module base internal class is not
	 * declared in the php global scope defore creating
	 * it.
	 */
  $InPHPModuleContext = ( boolean )(
    isset ($module) &&
    is_object ($module) &&
    $module instanceof phpmodule
  );
  /**
   * Alternate the returning way
   */
  if ( $InPHPModuleContext ) {
    $module->exports = requires ('./src');
  }

	return require ( __DIR__ . '/src/index.php' );
}
