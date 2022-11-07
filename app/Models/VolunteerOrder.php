<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerOrder extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function date()
    {
        return mb_substr($this->created_at, 0, -3);
    }
}
