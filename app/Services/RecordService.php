<?php


namespace App\Services;


use App\Models\User;

class RecordService extends BaseService
{

    /**
     * @return mixed
     * get top 10 record
     */
    public function getTop10Records()
    {
        $users = User::orderBy('record', 'desc')->take(10)->get(['first_name', 'record']);
        return $users;
    }
}
