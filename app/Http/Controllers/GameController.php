<?php


namespace App\Http\Controllers;


use App\Services\GameService;
use Illuminate\Http\Request;

class GameController extends BaseController
{

    public function __construct(GameService $gameSerice)
    {
        $this->baseService = $gameSerice;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('games.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function start(Request $request)
    {
        $question = $this->baseService->getRandomQuestion($request->all());
        return view('games.game', compact('question'));
    }

    /**
     * @param Request $request
     * @return bool
     * @throws \Exception
     */
    public function updateUserRecord(Request $request)
    {
        return $this->baseService->updateUserRecord($request->all());
    }
}
