<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria
 *
 * @author Carito
 */
class Categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('admin/categoria_model', 'c');
    }

    public function index($pag=0) {
        
        $menu['activo'] = 'categoria';
        
        $datos['categorias'] = $this->c->get_categorias("",0);
        
        /************ Configuracion de la paginacion *************************/
        
        $config['base_url'] = base_url() . 'admin/categoria';
        $config['total_rows'] = $this->c->get_total();
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        

        /********************************************************************/

        $this->load->view('plantilla_admin/header', $menu);
        $this->load->view('admin/categoria', $datos);
        $this->load->view('plantilla_admin/footer');
    }

    public function eliminar($id) {
        if ($this->c->eliminar($id) == true)
            $this->index();
        else
            echo 'Esta categoria esta siendo utiliazada';
    }
    public function nuevo() {
        $data['activo'] = 'categoria';
        $data['titulo'] = 'NUEVA CATEGORIA';
        $data['contenido'] = 'admin/modificar_categoria';
        $this->load->view('plantilla_admin/plantilla', $data);
    }

    public function modificar($id) {
        $data['activo'] = 'categoria';
        $data['titulo'] = 'MODIFICAR CATEGORIA';
        $data['categoria']=  $this->c->get($id);
        $data['contenido'] = 'admin/modificar_categoria';
        $this->load->view('plantilla_admin/plantilla', $data);
    }

    public function insertar() {
        $this->c->insertar();
        $this->index();
    }

    public function editar($id) {
        $this->c->actualizar($id);
        $this->index();
    }

}

?>
