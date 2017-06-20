<?php


class Quizz extends Model {
	protected $table = 'quizz';

	protected $fields = [
		'id',
		'image',
		'answer',
        'helper',
    ];

    /**
     * @return bool
     */
    public function isCorrect($answer ) {
		return $this->attributes['answer'] == $answer;
	}
}