<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'question',
        'point',
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
