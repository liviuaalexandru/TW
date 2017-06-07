<?php

/**
 * Created by PhpStorm.
 * User: Cicolae
 * Date: 07-Jun-17
 * Time: 11:43 AM
 */
class quizModel extends DAO{


    /**
     * @var
     */
    public static $instance;

    /**
     * @return quizModel
     */
    public function newInstance() {
        if(!self::$instance instanceof self)
            self::$instance = new self;
        return self::$instance;
    }

    /**
     * Quiz Model constructor
     */
    public function construct () {
        parrent::_construct();
        $this->setTabelName ('quizTable');
        $this->setPrimaryKey ('fk_i_quiz_id');
        $this->setField ('v_pictureLocation');
        $this->setField ('v_quizAnswer');
    }
}