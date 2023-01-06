<?php

namespace App\helpers\cart;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartService
{
    protected $cart;
    protected $name = 'webtop';

    public function __construct()
    {
//        $this->cart = session()->get('cart') ?? collect();
        $this->cart = collect(json_decode(request()->cookie($this->name) , true)) ?? collect()  ;

    }

    public function put(array $value , $obj = null)
    {
        if (! is_null($obj) && $obj instanceof Model){
            $value = array_merge($value , [
                'id' => Str::random(10),
                'subject_id' => $obj->id,
                'subject_type' => get_class($obj)
            ]);
        } else if (! isset($value['id'])){
            $value = array_merge($value , [
                'id' => Str::random(10)
            ]);
        }
        $this->cart->put($value['id'] , $value);
//        session()->put('cart' , $this->cart);
        Cookie::queue($this->name , $this->cart->toJson() , 60 * 24 * 7);
        return $this;
    }

    public function update($key , $oprtions)
    {
        $item = collect($this->get($key , false));
        if (is_numeric($oprtions)){
            $item = $item->merge([
                'quantity' => $item['quantity'] + $oprtions
            ]);
        }
        if (is_array($oprtions)){
            $item = $item->merge($oprtions);
        }

        $this->put($item->toArray());
        return $this;
    }

    public function has($key)
    {
        if ($key instanceof Model)
        {
            return ! is_null( $this->cart->where('subject_id' , $key->id)->where('subject_type' , get_class($key))->first());
        }
        return ! is_null($this->cart->firstWhere('id' , $key));
    }

    public function get($key , $WithRelation = true)
    {
        $item = $key instanceof Model
                ? $this->cart->where('subject_id' , $key->id)->where('subject_type' , get_class($key))->first()
                : $this->cart->firstWhere('id' , $key);

        return $WithRelation ?  $this->WithRelation($item) : $item;
    }

    public function all()
    {
        $cart = $this->cart;
        $cart = $cart->map(function ($item){
            return $this->WithRelation($item);
        });
        return $cart;
    }

    public function count($key)
    {
        if (! $this->has($key)) return 0;
        return $this->get($key)['quantity'];
    }

    protected function WithRelation(mixed $item)
    {
        if (isset($item['subject_id']) && isset($item['subject_type'])){
            $class = $item['subject_type'];
            $subject = (new $class())->find($item['subject_id']);
            $item[strtolower(class_basename($class))] = $subject;
            unset($item['subject_id']);
            unset($item['subject_type']);
            return $item;
        }
        return $item;
    }

    public function delete($key)
    {
        if ($this->has($key)){
            $this->cart = $this->cart->filter(function ($item) use ($key){
                if ($key instanceof Model){
                 return ( $item['subject_id'] != $key->id ) && ( $item['subject_type'] != get_class($key) );
                }
                return $key != $item['id'];
            });
//            session()->put('cart' , $this->cart);
            Cookie::queue($this->name , $this->cart->toJson() , 60 * 24 * 7);

            return true;
        }
        return false;
    }

    public function instance(String $name)
    {
        $this->cart = collect(json_decode(request()->cookie($name) , true)) ?? collect()  ;
        $this->name = $name;
        return $this;
    }

}

