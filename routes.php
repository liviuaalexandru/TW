<?php

return [
	'' => 'PagesController@index',
	'top' => 'PagesController@top',

	// AUTH
	'register'      => 'AuthController@showRegister',
	'register/user' => 'AuthController@register',
	'login'         => 'AuthController@login',
	'logout'         => 'AuthController@logout',

	'user/profile' => 'UserController@index',
	'user/profile/public' => 'UserController@profilePublic',
	'user/change-password' => 'UserController@changePassword',


	// GAME
	'game' => 'GameController@index',
	'game/answer' => 'GameController@answer',
];
