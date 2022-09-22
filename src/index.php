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
	/**
	 * Make sure the module base internal class is not
	 * declared in the php global scope defore creating
	 * it.
	 */
	if (!class_exists ('Sammy\Packs\IncludeAll\Base')) {
	/**
	 * @class Base
	 * Base internal class for the
	 * IncludeAll module.
	 * -
	 * This is (in the ils environment)
	 * an instance of the php module,
	 * wich should contain the module
	 * core functionalities that should
	 * be extended.
	 * -
	 * For extending the module, just create
	 * an 'exts' directory in the module directory
	 * and boot it by using the ils directory boot.
	 * -
	 */
	class Base {
		/**
		 * [inCurrentDir]
		 * @return null
		 */
		public function inCurrentDir () {
			$backTrace = debug_backtrace ();

			$traceFileDir = dirname ($backTrace [0] ['file']);

			return $this->includeAll ($traceFileDir);
		}

		public function includeAll ($dir, $trace = null) {
			$backTrace = $this->isTrace ($trace) ? $trace : (
				debug_backtrace ()
			);
			$dir = $this->readDirTRC ([$dir], $backTrace);

      if ( !is_dir ($dir) ) { # IncludeDirectory
        throw new \Exception ($dir);
      }

			$dirRe = $dir . ( '/*' );
			$dirRe2 = $dir . '\.*';

			$dirContent = array_merge (glob ($dirRe), glob($dirRe2));

			foreach ($dirContent as $content) {
				$fileName = pathinfo ($content, PATHINFO_FILENAME);

				if (preg_match ('/((\\\|\/)\.+)$/', $content)) {
					continue;
				}
				/**
				 * Alternate The Current directory
				 * content type: (file | dir)
				 */
				if (is_dir ($content)) {
					$this->includeAll ($content);
				} elseif (is_file($content) && $this->isPHPFile ($content)) {
					include_once $content;
				}
			}
		}

		private function readDirTRC ($datas, $trace = null) {
			$ds = DIRECTORY_SEPARATOR;
			$trace = $this->isTrace ($trace) ? $trace : debug_backtrace ();

			list ($dir) = $datas;

			if (preg_match ('/^(\.+\/)/', $dir)) {
				/**
				 * [$dir Directory Absolute Path]
				 * @var string
				 */
				$dir = dirname ($trace[0]['file']) . $ds . (
					$dir
				);
			}

			return preg_replace ('/(\/|\\\)+$/', '', $dir);
		}

		private function isTrace ($trace) {
			return ( boolean ) (
				is_array ($trace) &&
				isset ($trace [ 0 ]) &&
				is_array ($trace [ 0 ]) &&
				isset ($trace [ 0 ]['file']) &&
				is_string ($trace [ 0 ]['file'])
			);
		}

		private function isPHPFile ($file) {
			return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), preg_split('/\s+/', 'php php5 phtml php7'));
		}
	}}

	$InPHPModuleContext = ( boolean )(
		isset ($module) &&
		is_object ($module) &&
		$module instanceof phpmodule
	);
	/**
	 * Alternate the returning way
	 */
	if ( $InPHPModuleContext ) {
		$module->exports = ( new Base );
	}

  return ( new Base );
}
