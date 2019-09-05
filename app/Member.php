<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['id', 'name'];

    public function winningTickets() {
        return $this->hasMany('App\WinningTicket');
    }
}
