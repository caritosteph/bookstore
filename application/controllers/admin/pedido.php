<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pedido
 *
 * @author Carito
 */
class Pedido extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $menu['activo'] = 'pedido';

        $this->load->view('plantilla_admin/header', $menu);
        $this->load->view('admin/pedido');
        $this->load->view('plantilla_admin/footer');
    }

}

?>