<?php


namespace App\Http\Controllers;


use App\Services\RecordService;

class RecordController extends BaseController
{

    /**
     * RecordController constructor.
     * @param RecordService $recordService
     */
    public function __construct(RecordService $recordService)
    {
        $this->baseService = $recordService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function records()
    {
        $users = $this->baseService->getTop10Records();
        return view('records', compact('users'));
    }
}
