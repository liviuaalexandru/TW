CREATE TABLE /* TABLE PREFIX*/ usersTable {
  fk_i_user_id INT(10) UNSIGNED NOT NULL UNIQUE PRIMARY KEY ,
  v_userName VARCHAR(20) NOT NULL ,
  v_password VARCHAR (20) NOT NULL,
  i_score int(10) NOT NULL DEFAULT 0
};

CREATE TABLE /*TABLE PREFIX*/ quizTable {
  fk_i_quiz_id INT (10) UNSIGNED NOT NULL  UNIQUE PRIMARY KEY ,
  v_pictureLocation VARCHAR (20) NOT NULL ,
  v_quizAnswer VARCHAR (30) NOT NULL ,
};