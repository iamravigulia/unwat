<?php
namespace Edgewizz\Unwat\Models;

use Illuminate\Database\Eloquent\Model;

class UnwatQues extends Model{
    public function answers(){
        return $this->hasMany('Edgewizz\Unwat\Models\UnwatAns', 'question_id');
    }
    protected $table = 'fmt_unjumble_words_at_ques';
}