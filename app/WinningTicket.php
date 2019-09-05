<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WinningTicket extends Model
{
    protected $table = 'winning_numbers';

    protected $fillable = ['id', 'member_id', 'value'];

    public function member() {
        return $this->belongsTo('App\Member');
    }
}
