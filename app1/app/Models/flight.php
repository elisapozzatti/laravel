<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class flight extends Model
{
    public function normal() {
        return 'funzione normale';
    }

    public static function statica() {
        return 'funzione statica';
    }
}
