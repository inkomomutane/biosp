<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class synchronization extends Model
{
    public function synchronization()
    {
        return $this->morphTo();
    }
}
