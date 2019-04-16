<?php

namespace amin;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    //
    
    protected $fillable=[
    	'name'
    ];
    
    public function mainOrders()
    {
    	return $this->hasMany('amin\MainOrder');
    }
}
