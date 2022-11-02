<?php
namespace App\Http\Services\VolunteerController;

use App\Models\User;

class SortService{
    /**
     * @param $field
     * @return mixed
     */
    static function sort($field) {
        switch ($field){
            case 'lastname':
                $volunteers = User::where('is_admin', false)->orderBy('lastname')->get()
                    ->groupBy(function($item) {
                        return mb_substr($item->lastname, 0, 1);
                    });
                break;
            case 'patronymic':
                $volunteers = User::where('is_admin', false)->orderBy('patronymic')->get()
                    ->groupBy(function($item) {
                        return mb_substr($item->patronymic, 0, 1);
                    });
                break;
            default:
                $volunteers = User::where('is_admin', false)->orderBy('name')->get()
                    ->groupBy(function($item) {
                        return mb_substr($item->name, 0, 1);
                    });
                break;
        }
        return $volunteers;
    }

    static function adminSort($field) {
        switch ($field){
            case 'lastname':
                $volunteers = User::where('is_admin', false)->orderBy('lastname')->get();
                break;
            case 'patronymic':
                $volunteers = User::where('is_admin', false)->orderBy('patronymic')->get();
                break;
            default:
                $volunteers = User::where('is_admin', false)->orderBy('name')->get();
                break;
        }
        return $volunteers;
    }
}
