<?php

/**
 * Created by PhpStorm.
 * User: Cicolae
 * Date: 07-Jun-17
 * Time: 11:37 AM
 */
class userModel extends DAO{
    /**
     * @var
     */
    private static $instance;

    /**
     * @return userModel
     */
    public function newInstance() {
        if(!self::$instance instanceof self)
            self::$instance = new self;
        return self::$instance;
    }

    /**
     * User Model constructor
     */
    public function construct () {
        parrent::_construct();
        $this->setTabelName ('userTable');
        $this->setPrimaryKey ('fk_i_user_id');
        $this->setField ('v_userName');
        $this->setField ('v_password');
        $this->setField ('i_score');
    }
}