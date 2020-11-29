<?php


namespace App\Services;


use App\Models\Question;

class GameService extends BaseService
{
    /**
     * @param $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     * get random question,
     * @throws \Exception
     */
    public function getRandomQuestion($data)
    {
        $ids = [];
        if (!empty($data['ids'])){
            $ids = explode(',',$data['ids']);
        }
        $question = Question::with('answers')->whereNotIn('id', $ids)->inRandomOrder()->first();
        if (!$question){
            throw new \Exception('question not fount');
        }
        return $question;
    }

    /**
     * @param $data
     * @return bool
     * update user record, update if new record > old
     * @throws \Exception
     */
    public function updateUserRecord($data)
    {
        $user = auth()->user();
        if ($user->record > $data['record']){
            return true;
        }
        $update = auth()->user()->update(['record'=>$data['record']]);
        if (!$update){
            throw new \Exception('not update user record');
        }
        return true;
    }
}
