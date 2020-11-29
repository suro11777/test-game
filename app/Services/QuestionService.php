<?php


namespace App\Services;


use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionService extends BaseService
{

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * show all question, paginate 15
     */
    public function index()
    {
        $questions = Question::with('answers')->paginate(15, ['id', 'question', 'point']);
        return $questions;
    }

    /**
     * @param $data
     * @return bool
     * save question and answers
     * @throws \Exception
     */
    public function store($data)
    {
        DB::beginTransaction();
        $question = Question::create($data);
        if (!$question){
            DB::rollBack();
            throw new \Exception('question not create');
        }
        $dat = $this->changeData($data['answers']);
        if (!$question->answers()->createMany($dat)){
            DB::rollBack();
            throw new \Exception('question answers not create');
        }

        DB::commit();
        return true;
    }

    /**
     * @param $data
     * correct data
     * @return mixed
     */
    public function changeData($data)
    {
        foreach ($data as $key => $datum) {
            if ($key === 'correct_answer'){
                $dat[$datum]['correct_answer'] = true;
            }else{
                $dat[$key] = $datum;
                $dat[$key]['correct_answer'] = false;
            }
        }
        return $dat;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     * @throws \Exception
     */
    public function edit($id)
    {
        $question =  Question::with('answers')->find($id);
        if (!$question){
            throw new \Exception('question not fount by id:'.$id);
        }

        return $question;
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     * update quetion by id, update answer
     * @throws \Exception
     */
    public function update($id, $data)
    {
        $question = Question::find($id);
        if (!$question){
            throw new \Exception('question not fount by id:'.$id);
        }
        DB::beginTransaction();
        $update = $question->update($data);
        if (!$update){
            DB::rollBack();
            throw new \Exception('question not updaet');
        }
        //change data, correct for update
        $dat = $this->changeData($data['answers']);
        foreach ($question->answers as $k => $asnwer){
            if (!$asnwer->update($dat[$k])){
                DB::rollBack();
                throw new \Exception('question answers not update');
            }
        }
        DB::commit();
        return true;
    }

    /**
     * @param $id
     * @return bool
     * delete question by id
     * @throws \Exception
     */
    public function delete($id)
    {
        $question = Question::find($id);
        if (!$question){
            throw new \Exception('qestion not fount by id:'.$id);
        }
        if (!$question->delete()){
            throw new \Exception('question not delete');
        }
        return true;
    }
}
