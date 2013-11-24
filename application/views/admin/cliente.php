<div class="search row">
    <div class="col-md-5">
        <form class="navbar-form" role="search" action="<?=base_url()?>admin/cliente/index">
            <div class="input-group">

                <input type="text" class="form-control" placeholder="Buscar cliente" name="cliente" id="cliente">

                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <p class="text-right">
            <a href="<?=base_url()?>admin/cliente/modificar" class="btn btn-success text-center"><i class="glyphicon glyphicon-plus"></i> Agregar</a>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <!-- Table -->
        <table class="table table-bordered table-hover text-center">
            <thead class="row_color">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">NOMBRES</th>
                    <th class="text-center">APELLIDOS</th>
                    <th class="text-center">EMAIL</th>
                    <th class="text-center">DIRECCION</th>
                    <th class="text-center">TELEFONO</th>
                    <th class="text-center">ESTADO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $c) { ?>
                    <tr>
                        <td><?=$c->id?></td>
                        <td class="text-center"><?=$c->Nombre?></td>
                        <td class="text-center"><?=$c->Apellidos?></td>
                        <td class="text-center"><?=$c->EMail?></td>
                        <td class="text-center"><?=$c->Direccion?></td>
                        <td class="text-center"><?=$c->Telefono?></td>
                        <td class="text-center">
                            <a href="#" class="active" title="Click para inactivar">
                                <span class="badge badge-info">Active</span>
                            </a>
                            
                        </td>
                        <td class="media-body"><a href="<?=base_url()?>admin/cliente/modificar/<?=$c->id?>" class="btn btn-sm btn-primary text-center"><span class="glyphicon glyphicon-pencil"></span></a> 
                            <a href="<?=base_url()?>admin/cliente/eliminar/<?=$c->id?>"  class="btn btn-sm btn-danger text-center"><span class="glyphicon glyphicon-remove"></span></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <ul class="pagination">
                <li><a href="<?=base_url()?>admin/cliente/<?=($this->uri->segment(3)-1)>=0?$this->uri->segment(3)-1:0?>">&laquo;</a></li>
                <?php for ($index = 0; $index < $total; $index++) { ?>
                    <li <?php if ($this->uri->segment(3)== $index) {
                    echo 'class="active"';
                } ?>><a href="<?=base_url()?>admin/cliente/<?=$index?>"><?=($index+1)?></a></li>
<?php } ?>
                    
                <li><a href="<?=base_url()?>admin/cliente/<?=($this->uri->segment(3)+1)<=$total-1?($this->uri->segment(3)+1):($total-1)?>">&raquo;</a></li>
            </ul>
        </div>
    </div>
</div>
</div>
