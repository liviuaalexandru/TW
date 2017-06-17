<?php


class User extends Model {

	protected $table = 'users';
	protected $fields = [
		'id',
		'username',
		'password',
		'high_score',
	];


	public function getScores( $id = null, $order = 'DESC' ) {
		if ( is_null( $id ) ) {
			$id = $this->attributes['id'] ?: auth()->id;
		}

		return db()->select( 'user_scores', 'score, id' )->where( 'user_id', $id )->orderBy( 'id', $order )->get();
	}

}