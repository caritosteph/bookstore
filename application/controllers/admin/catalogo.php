<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of catalogo
 *
 * @author Sadhu
 */
class Catalogo extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('admin/catalogo_model');
    }
    
    public function index($pag=0) {
        /*
        if(!isset($_POST['titulo'])){
            
            
        }
        else{
            $datos['libros']= $this->catalogo_model->get_libros($this->uri->segment(3), $this->uri->segment(4));
            $config['total_rows'] = $this->catalogo_model->get_total($_POST['titulo']);
            $config['base_url'] = base_url() . 'admin/catalogo/'. $_POST['titulo'];
        }
        */
        
        $datos['libros']= $this->catalogo_model->get_libros(NULL,$pag);
        
        $config['base_url'] = base_url() . 'admin/catalogo';
       
        /************ Configuracion de la paginacion *************************/
        
        $config['total_rows'] = $this->catalogo_model->get_total();
        $this->pagination->initialize($config);
        $config['uri_segment'] = 3;

        /********************************************************************/
        
        
        $menu['activo']='catalogo';
        $this->load->view('plantilla_admin/header', $menu);
        $this->load->view('admin/catalogo', $datos);
        $this->load->view('plantilla_admin/footer');
        
    }
    
    public function do_buscar() {
        redirect(base_url() . 'admin/catalogo/buscar/' . $_POST['titulo'].'/0');
    }
    
    public function buscar() {
       
        $datos['libros']= $this->catalogo_model->get_libros($this->uri->segment(4), $this->uri->segment(5));
        
        $config['base_url'] = base_url() . 'admin/catalogo/buscar/'. $this->uri->segment(4);
        
                /************ Configuracion de la paginacion *************************/
        
        $config['total_rows'] = $this->catalogo_model->get_total($this->uri->segment(4));
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);

        /********************************************************************/
        
        
        $menu['activo']='catalogo';
        $this->load->view('plantilla_admin/header', $menu);
        $this->load->view('admin/catalogo', $datos);
        $this->load->view('plantilla_admin/footer');
    }








    public function eliminar($id) {
        $this->catalogo_model->eliminar($id);
        
        $this->index();
        
    }
    
    
    
    public function modificar($id=NULL) {
        $menu['activo']='catalogo';
     
        if(!isset($_POST['titulo'])){
            if($id===  NULL){
                $datos['titulo']='NUEVO LIBRO';
            }
            else{
                $datos['titulo']='MODIFICAR LIBRO';
                $datos['libro']=  $this->catalogo_model->get($id);
            }
            
            $datos['categorias']=$this->catalogo_model->get_categorias();
            
            $this->load->view('plantilla_admin/header',$menu);
            $this->load->view('admin/modificar_libro',$datos);
            $this->load->view('plantilla_admin/footer');
        }
        else{
            $s="{$_SERVER['DOCUMENT_ROOT']}/{$this->config->item('dirPrincipal')}/photo/".$_FILES['imagen']['name'];
            
            move_uploaded_file($_FILES['imagen']['tmp_name'],$s);
            if($id==  NULL){
                $this->catalogo_model->insertar();
            }
            else{
                $this->catalogo_model->actualizar($id);
            }
            $this->index();
         
         
        }
        
    }


}

?>
