<?php

namespace App\helpers\cart;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;
use phpDocumentor\Reflection\Types\Collection;

/**
 * @method static bool has($id)
 * @method static collection all($id)
 * @method static Array get($id)
 * @method static Cart put(array $value , Model $obj = null)
 * @method static Collection count($obje)
 * @method static Array|number update($key , $option)
 * @method static String instance($name)
 * @method static collection delete($id)
 */
class Cart extends Facade
{
   protected static function getFacadeAccessor()
   {
       return 'cart';
   }
}
