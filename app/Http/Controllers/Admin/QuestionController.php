<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\QuestionRequest;
use App\Services\QuestionService;
use Illuminate\Http\Request;

/**
 * Class QuestionController
 * @package App\Http\Controllers\Admin
 */
class QuestionController extends BaseController
{
    /**
     * QuestionController constructor.
     * @param QuestionService $questionService
     */
    public function __construct(QuestionService $questionService)
    {
        $this->baseService = $questionService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $questions = $this->baseService->index();
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.questions.create');
    }

    /**
     * @param QuestionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(QuestionRequest $request)
    {dd($request->all());
        $this->baseService->store($request->all());
        return redirect()->route('admin.questions.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function edit($id)
    {
        $question = $this->baseService->edit($id);
        return view('admin.questions.edit', compact('question'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $this->baseService->update($id, $request->all());
        return redirect()->route('admin.questions.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete($id)
    {
        $this->baseService->delete($id);
        return redirect()->route('admin.questions.index');
    }



}
