<?php


class GameController {

	/**
	 * UserController constructor.
	 */
	public function __construct() {
		if ( ! auth_is_logged() ) {
			redirect( '/' );
		}
	}

	public function index() {
		$quizz = game()->getQuizz();
		if(!$quizz){
			redirect('/user/profile');
		} else {
			view( 'game', [ 'quizz' => $quizz ] );
		}

	}

	public function answer() {
		$answer = request()->get( 'answer' );

		$correct = game()->answer( $answer );
		if ( $correct ) {
			back();
		} else {
			$message = 'Game finished';
			redirect( '/user/profile' );
		}
	}
}