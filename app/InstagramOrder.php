<?php

namespace amin;

use Illuminate\Database\Eloquent\Model;

class InstagramOrder extends Model
{
    //
    //
    
    protected $fillable=[
    	'ad_duration',
        'instagram_page_id'
    ];

    public function mainOrder()
    {
        return $this->morphOne('amin\MainOrder', 'socialNetwork');
    }

    public function page()
    {
    	return InstagramPage::find($this->instagram_page_id);
    }

}
