<?php
/**
 * @version 2.0
 * @author Sammy
 *
 * @keywords Samils, ils, php framework
 * -----------------
 * @namespace Sammy\Packs
 * - Autoload, application dependencies
 */
namespace Sammy\Packs {
  #use Sammy\Packs\IncludeAll\Base as IncludeAllBaseClass;
  /**
   * Make sure the module base internal class is not
   * declared in the php global scope defore creating
   * it.
   */
  class IncludeAll /* extends IncludeAllBaseClass */ {
  }
}
