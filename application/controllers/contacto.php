<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contactanos
 *
 * @author Carito
 */
class contacto extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['contenido'] = 'visitante/contacto';
        $data['activo'] = 'contactanos';
        $this->load->view('plantilla/plantilla', $data);
    }

}

?>