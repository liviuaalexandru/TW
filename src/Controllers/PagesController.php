<?php

class PagesController {

	public function index() {

		view( 'welcome' );
	}

	public function top() {
		$players = ( new User() )->select( [ 'username', 'high_score' ] )
		                         ->orderBy( 'high_score', 'DESC' )
		                         ->limit( 10 )
		                         ->get()
		;
		//dd($players);
		view( 'top', [ 'players' => $players ] );
	}
}
