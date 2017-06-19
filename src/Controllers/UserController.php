<?php


class UserController {

	protected function auth() {
		if ( ! auth_is_logged() ) {
			redirect( '/' );
		}
	}

	public function index() {
		$this->auth();
		$scores = auth()->getScores();
        view( 'profile', [ 'scores' => $scores ] );
    }

	public function profilePublic() {
		$request = request();
		$id      = $request->get( 'user' );
		$format  = $request->get( 'format' );
		$user    = ( new User() )->find( [ 'id' => $id ], [ 'username', 'id', 'high_score' ] )->first();

		$scores = $user->getScores( $id );

		switch ( $format ) {
			case 'json':
				header( 'Content-Type: application/json' );
				$jo = array_map( function ( $user ) {
					return $user->score;
				}, $scores->toArray() );
				echo json_encode( $jo );
				die();
				break;
			default:
				view( 'public-profile', [ 'scores' => $scores, 'user' => $user ] );
				break;
		}
	}

	public function changePassword() {
		$this->auth();
		$request          = request();
		$current_password = $request->get( 'current_password' );
		$password         = $request->get( 'password' );
		$password2        = $request->get( 'password2' );

		if ( $password !== $password2 ) {
			$message = 'Passwords don\'t match.';
			back();
		}

		$username = auth()->username;
		$user     = ( new User() )->find( [ 'username' => $username ] )->first();
		//dd( $user->password === md5( $current_password ) );
		if ( ! $user || $user->password !== md5( $current_password ) ) {
			$message = 'Current password is wrong';
			back();
		} else {
			$message        = 'Password changed with success';
			$user->password = md5( $password );
			$user->update( [ 'username' => $username ] );

			back();
		}

	}

}