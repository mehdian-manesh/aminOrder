<?php

namespace amin;

use Illuminate\Database\Eloquent\Model;

class MainOrder extends Model
{
    // any order must have a MainOrder
    // all fields of a MainOrder:
    //      id
    //      customer_id
    //      social_network_type
    //      social_network_id
    //      ad_date
    //      off
    //      final_price
    //      payment_date
    //      payment_confirmed
    //      timestamps

    protected $fillable=[
        'ad_date',
        'off',
        'final_price',//??????????????????
        'payment_date',
        'payment_confirmed'
    ];
    
    
    public function socialNetwork()
    {
        return $this->morphTo();
    }

    public function customer()
    {
        return $this->belongsTo('amin\Customer');
    }

    public function unitName()
    {
    	//sa`at or K
        //
        if ($this->social_network_type=='amin\TelegramOrder') {
            return 'K';
        }
        return 'ساعت';
    }

    public function socialNetworkApp()
    {
        if ($this->social_network_type=='amin\TelegramOrder') {
            return SocialAppConfig::find(2);//2 is the index of Telegram in table
        }
        return SocialAppConfig::find(1);//2 is the index of Telegram in table
    }

//     public static function create(array $attributes = [])
// {
//     $model = static::query()->create($attributes);

//     // ...

//     return $model;
// }

    public function allFields()
    {
        if ($this->social_network_type=='amin\TelegramOrder') {
            return [
                'نام کانال' => $this->socialNetwork->page()->name,
                'تعداد بازدید (K)'=> $this->socialNetwork->views ,
                'نام نرخ'       => $this->socialNetwork->plan()->name,
                'مبلغ هر K' => $this->socialNetwork->plan()->unit_price,
            ];
        }
        return [
            'نام پیج'   => $this->socialNetwork->page()->name,
            'مدت تبلیغ (ساعت)' => $this->socialNetwork->ad_duration ,
            'مبلغ هر ساعت' => $this->socialNetwork->page()->unit_price,
        ];
    }
}
