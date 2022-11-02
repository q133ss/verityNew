<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Certificate extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return HasOne
     */
    public function getContributor()
    {
        return $this->hasOne(Contributor::class, 'id','contributor_id');
    }

    static function make($contributor_id)
    {
        return Self::create([
            'number' => self::generateNumber(),
            'contributor_id' => $contributor_id
        ]);
    }

    /**
     * @param $count
     * @return string
     */
    private static function generateNumber($count = 12) : string
    {
         $number = '';
         while($count > 0){
             $count--;
             $number .= rand(0,9);
         }
         if(self::where('number', $number)->exists()){
             return self::generateNumber($count);
         }

         return $number;
    }
}
