<?php

namespace App\Models;

class Buyer extends User
{
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
