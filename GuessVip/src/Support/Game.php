<?php


class Game {

	/**
	 * @var int
	 */
	public $score = 0;
	/**
	 * @var int|null
	 */
	protected $quizz_id = null;
	/**
	 * @var Bag|array
	 */
	public $quizzes = [];

	public function __construct() {

		$this->reset();
	}


	protected function reset() {
		$this->score    = 0;
		$this->quizz_id = null;
		$this->quizzes  = ( new Quizz() )->all();

		return $this;
	}

	public function getQuizz() {
		$total = $this->quizzes->count();
		if ( $total == 0 ) {
			$this->end();

			return false;
		}

		do {
			$id = rand( 0, $total );
		} while ( $this->quizzes->notExists( $id ) );
		$this->quizz_id = $id;

		return $this->quizzes->get( $id );
	}

	/**
	 * @param $id
	 * @return Quizz
	 */
	protected function quizz( $id ) {
		return $this->quizzes->get( $id );
	}

	/**
	 * @param $answer
	 * @return bool
	 */
	public function answer( $answer ) {
		if ( ! $this->quizz( $this->quizz_id )->isCorrect( $answer ) ) {
			$this->end();

			return false;
		}

		$this->score += 10;
		$this->quizzes->remove( $this->quizz_id );

		return true;
	}

	public function end() {
		$user = auth();
		$id   = $user->id;
		if ( $this->score > $user->high_score ) {
			$user->high_score = $this->score;
			$user->update( [ 'id' => $id ] );
		}
		$result = db()->insert( 'user_scores', [ 'user_id' => $id, 'score' => $this->score ] );
		$this->reset();

		return $result;
	}

}