<?php


class Quizz extends Model {
	protected $table = 'quizz';

	protected $fields = [
		'id',
		'image',
		'answer',
		'suggestions',
	];

	public function setSuggestions(array $list ) {
		$this->attributes['suggestions'] = json_encode($list);
		return $this;
	}

	public function getSuggestions() {
		return json_decode($this->attributes['suggestions']);
	}

	public function isCorrect( $answer ) {
		return $this->attributes['answer'] == $answer;
	}
}