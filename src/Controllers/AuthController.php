<?php


class AuthController {

	protected function redirectIfLogged() {
		if ( auth_is_logged() ) {
			redirect( 'user/profile' );
		}
	}

	public function showRegister() {
		$this->redirectIfLogged();
		view( 'auth.register' );
	}

	public function login() {
		$this->redirectIfLogged();
		$username = request()->get( 'username' );
		$password = request()->get( 'password' );

		$user = ( new User() )->find( [ 'username' => $username ] )->get();
		if ( ! $user || $user->password !== md5( $password ) ) {
			// Return username or password are wrong or user does\t exists
			back();
		} else {
			session()->put( 'auth', $user );
			redirect( 'user/profile' );
		}
	}

	public function register() {
		$this->redirectIfLogged();

		$request   = request();
		$username  = $request->get( 'username' );
		$password  = $request->get( 'password' );
		$password2 = $request->get( 'password2' );
		if ( $password !== $password2 ) {
			//password and password2 are not strong equal
			back();
			return;
		}

		$model  = new User();
		$result = $model->find( [ 'username' => $username ] )->first();
		if ( $result ) {
			// user already exist
            back();
			return;
		}

		$model->username = $username;
		$model->password = md5( $password );

		$result = $model->create();

		if ( ! $result ) {
            //account could not be created
		    back();
		} else {
			//registered succesfull
			redirect( '/' );
		}
	}

	public function logout() {
		session()->remove( 'auth' );
		redirect( '/' );
	}
}