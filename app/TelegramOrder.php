<?php

namespace amin;

use Illuminate\Database\Eloquent\Model;

class TelegramOrder extends Model
{
    public function mainOrder()
    {
        return $this->morphOne('amin\MainOrder', 'socialNetwork');
    }

    public function page()
    {
        return TelegramChannel::find($this->telegram_channel_id);
    }

   public function plan()
    {
        return TelegramPlan::find($this->telegram_plan_id);
    }
}
