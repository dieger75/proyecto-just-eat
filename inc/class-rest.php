<?php
class Rest {

    public $id_rest = 0;
    public $name_rest = '';
    public $dir_rest = '';
    public $tel_rest = 0;
    public $mail_rest = '';
    public $web_rest = '';
    public $logo_rest = '';
    public $type_eat = '';

    public function __construct($id_rest, $name_rest, $dir_rest, $tel_rest, $mail_rest, $web_rest, $logo_rest, $type_eat){
        $this->id_rest = $id_rest;
        $this->name_rest = $name_rest;
        $this->dir_rest = $dir_rest;
        $this->tel_rest = $tel_rest;
        $this->mail_rest = $mail_rest;
        $this->web_rest = $web_rest;
        $this->logo_rest = $logo_rest;
        $this->type_eat = $type_eat;
    }

    //---------------------------METODOS GET----------------------//
    public function get_id_rest(){
        return $this->id_rest;
    }
    public function get_name_rest(){
        return $this->name_rest;
    }
    public function get_dir_rest(){
        return $this->dir_rest;
    }
    public function get_tel_rest(){
        return $this->tel_rest;
    }
    public function get_mail_rest(){
        return $this->mail_rest;
    }
    public function get_web_rest(){
        return $this->web_rest;
    }
    public function get_logo_rest(){
        return $this->logo_rest;
    }
    public function get_type_eat(){
        return $this->type_eat;
    }

    //---------------------------METODOS SET----------------------//
    public function set_id_rest( $id_rest ){
        $this->id_rest = $id_rest;
    }
    public function set_name_rest( $name_rest ){
        $this->name_rest = $name_rest;
    }
    public function set_dir_rest( $dir_rest ){
        $this->dir_rest = $dir_rest;
    }
    public function set_tel_rest( $tel_rest ){
        $this->tel_rest = $tel_rest;
    }
    public function set_mail_rest( $mail_rest ){
        $this->mail_rest = $mail_rest;
    }
    public function set_web_rest( $web_rest ){
        $this->web_rest = $web_rest;
    }
    public function set_logo_rest( $logo_rest ){
        $this->logo_rest = $logo_rest;
    }
    public function set_type_eat( $type_eat ){
        $this->type_eat = $type_eat;
    }

}


class Product {

    public $id_producto = 0;
    public $producto = '';
    public $descripcion = '';
    public $img_product = '';
    public $precio = 0;
    public $rest_id = 0;
    public $name_rest = '';

    public function __construct($id_producto, $producto, $descripcion, $img_product, $precio, $rest_id, $name_rest){
        $this->id_producto = $id_producto;
        $this->producto = $producto;
        $this->descripcion = $descripcion;
        $this->img_product = $img_product;
        $this->precio = $precio;
        $this->rest_id = $rest_id;
        $this->name_rest = $name_rest;
    }

    //---------------------------METODOS GET----------------------//
    public function get_id_producto(){
        return $this->id_producto;
    }
    public function get_producto(){
        return $this->producto;
    }
    public function get_descripcion(){
        return $this->descripcion;
    }
    public function get_img_product(){
        return $this->img_product;
    }
    public function get_precio(){
        return $this->precio;
    }
    public function get_pass_user(){
        return $this->password_user;
    }
    public function get_rest_id(){
        return $this->rest_id;
    }
    public function get_name_rest(){
        return $this->name_rest;
    }

    //---------------------------METODOS SET----------------------//
    public function set_id_producto( $id_producto ){
        $this->id_producto = $id_producto;
    }
    public function set_producto( $producto ){
        $this->producto = $producto;
    }
    public function set_descripcion( $descripcion ){
        $this->descripcion = $descripcion;
    }
    public function set_img_product( $img_product ){
        $this->img_product = $img_product;
    }
    public function set_precio( $precio ){
        $this->precio = $precio;
    }
    public function set_pass_user( $password_user ){
        $this->password_user = $password_user;
    }
    public function set_rest_id( $rest_id ){
        $this->rest_id = $rest_id;
    }
    public function set_name_rest( $name_rest ){
        $this->name_rest = $name_rest;
    }
}


class Pedidos {

    public $id_pedido = 0;
    public $date_pedido = '';
    public $sub_tot_pedido = 0;
    public $envio = 0;
    public $total_pedido = 0;
    public $metod_pago = 0;
    public $rest_id = 0;
    public $user_id = 0;

    public function __construct($id_pedido, $date_pedido, $sub_tot_pedido, $envio, $total_pedido, $metod_pago, $rest_id, $user_id){
        $this->id_pedido = $id_pedido;
        $this->date_pedido = $date_pedido;
        $this->sub_tot_pedido = $sub_tot_pedido;
        $this->envio = $envio;
        $this->total_pedido = $total_pedido;
        $this->metod_pago = $metod_pago;
        $this->rest_id = $rest_id;
        $this->user_id = $user_id;
    }

    //---------------------------METODOS GET----------------------//
    public function get_id_pedido(){
        return $this->id_pedido;
    }
    public function get_date_pedido(){
        return $this->date_pedido;
    }
    public function get_sub_tot_pedido(){
        return $this->sub_tot_pedido;
    }
    public function get_envio(){
        return $this->envio;
    }
    public function get_total_pedido(){
        return $this->total_pedido;
    }
    public function get_metod_pago(){
        return $this->metod_pago;
    }
    public function get_rest_id_ped(){
        return $this->rest_id;
    }
    public function get_user_id_ped(){
        return $this->user_id;
    }

    //---------------------------METODOS SET----------------------//
    public function set_id_pedido( $id_pedido ){
        $this->id_pedido = $id_pedido;
    }
    public function set_date_pedido( $date_pedido ){
        $this->date_pedido = $date_pedido;
    }
    public function set_sub_tot_pedido( $sub_tot_pedido ){
        $this->sub_tot_pedido = $sub_tot_pedido;
    }
    public function set_envio( $envio ){
        $this->envio = $envio;
    }
    public function set_total_pedido( $total_pedido ){
        $this->total_pedido = $total_pedido;
    }
    public function set_metod_pedido( $metod_pedido ){
        $this->metod_pedido = $metod_pedido;
    }
    public function set_rest_id_ped( $rest_id ){
        $this->rest_id = $rest_id;
    }
    public function set_user_id_ped( $user_id ){
        $this->user_id = $user_id;
    }

}


class Product_Pedidos {

    public $pedido_id = 0;
    public $name_product = '';
    public $precio = 0;
    public $cant_product = 0;

    public function __construct($pedido_id, $name_product, $precio, $cant_product){
        $this->pedido_id = $pedido_id;
        $this->name_product = $name_product;
        $this->precio = $precio;
        $this->cant_product = $cant_product;
    }

    //---------------------------METODOS GET----------------------//
    public function get_pedido_id_pp(){
        return $this->pedido_id;
    }
    public function get_name_product_pp(){
        return $this->name_product;
    }
    public function get_precio_pp(){
        return $this->precio;
    }
    public function get_cant_product(){
        return $this->cant_product;
    }

    //---------------------------METODOS SET----------------------//
    public function set_pedido_id_pp( $pedido_id ){
        $this->pedido_id = $pedido_id;
    }
    public function set_name_product_pp( $name_product ){
        $this->name_product = $name_product;
    }
    public function set_precio_pp( $precio ){
        $this->precio = $precio;
    }
    public function set_cant_product( $cant_product ){
        $this->cant_product = $cant_product;
    }

}