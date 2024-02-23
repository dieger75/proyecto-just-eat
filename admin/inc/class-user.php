<?php
class User {

    public $id_user = 0;
    public $name_user = '';
    public $dir_user = '';
    public $tel_user = '';
    public $mail_user = '';
    public $password_user = '';
    public $type_user = '';

    public function __construct($id_user, $name_user, $dir_user, $tel_user, $mail_user, $password_user, $type_user){
        $this->id_user = $id_user;
        $this->name_user = $name_user;
        $this->dir_user = $dir_user;
        $this->tel_user = $tel_user;
        $this->mail_user = $mail_user;
        $this->password_user = $password_user;
        $this->type_user = $type_user;
    }

    //---------------------------METODOS GET----------------------//
    public function get_id_user(){
        return $this->id_user;
    }
    public function get_name_user(){
        return $this->name_user;
    }
    public function get_dir_user(){
        return $this->dir_user;
    }
    public function get_tel_user(){
        return $this->tel_user;
    }
    public function get_mail_user(){
        return $this->mail_user;
    }
    public function get_pass_user(){
        return $this->password_user;
    }
    public function get_type_user(){
        return $this->type_user;
    }

    //---------------------------METODOS SET----------------------//
    public function set_id_user( $id_user ){
        $this->id_user = $id_user;
    }
    public function name_user( $name_user ){
        $this->name_user = $name_user;
    }
    public function set_dir_user( $dir_user ){
        $this->dir_user = $dir_user;
    }
    public function set_tel_user( $tel_user ){
        $this->tel_user = $tel_user;
    }
    public function set_mail_user( $mail_user ){
        $this->mail_user = $mail_user;
    }
    public function set_pass_user( $password_user ){
        $this->password_user = $password_user;
    }
    public function set_type_user( $type_user ){
        $this->type_user = $type_user;
    }

}


