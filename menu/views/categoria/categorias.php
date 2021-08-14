<!-- Content -->
<div class="content">

    <div class="page-header">
        <div class="page-title">
            <h3><?=$title?></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <a data-toggle="modal" data-target="#exampleModalCat" class="btn btn-success mb-3" style="border-radius:5px;color:#FFF;">
                       Adicionar categoria &nbsp;&nbsp; <i class="fa fa-plus"></i>
                    </a>

                    <div class="card card-body">

                        <?php if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])) : ?>
                        <?php echo $_SESSION['alert']; ?>
                        <?php $_SESSION['alert'] = ''; ?>
                        <?php endif; ?>
                    
                        <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                            width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Imagem</th>
                                    <th>Nome</th>
                                    <th>T. de espera</th>
                                    <th>Observação</th>
                                    <th>Status</th>
                                    <th>Diário/Semanal</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody id="bodytabled">
                                <?php foreach($categorias as $categoria): ?>
                                <tr>
                                    <td>
                                        <img src="<?=$categoria['cover']?>" style="width: 50px;height: auto;"/>
                                    </td>
                                    <td><?=$categoria['name_category']?></td>
                                    <td><?=$categoria['waiting']?></td>
                                    <td><?=$categoria['obs_waiting']?></td>
                                    <td>
                                        <?php if($categoria['status'] == "0"): ?>
                                            <span class="badge badge-success">Ativo</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger">Inativo</span>
                                        <?php endif; ?>    
                                    </td>
                                    <td>
                                        <?php if($categoria['dia'] == "0"): ?>
                                            <span class="badge badge-success">Semanal</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger">Diário</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?=BASE_URL?>categoria/edit/<?=$categoria['id']?>" class="btn bg-facebook btn-sm" type="submit" 
                                            style="margin-top:29px;border-radius:5px;display:flex;justify-content: space-evenly;">
                                            <i class="fa fa-pencil"></i>  Editar
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="exampleModalCat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success">
            <h5 class="modal-title" id="exampleModalLabe">Cadastro de Categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="ti-close"></i>
            </button>
        </div>
        <div class="modal-body">
            <form action="<?=BASE_URL?>categoria/addAction" method="post" enctype="multipart/form-data">

            <div class="form-group">
                                <label for="exampleInputEmail1">Nome da Categoria</label>
                                <input type="text" class="form-control" name="name_category"
                                    aria-describedby="emailHelp" placeholder="Digite o nome aqui..."
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tempo de espera</label>
                                <input type="text" class="form-control" name="waiting"
                                    aria-describedby="emailHelp" placeholder="Digite o tempo de espera..."
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Observação</label>
                                <input type="text" class="form-control" name="obs_waiting"
                                    aria-describedby="emailHelp" placeholder="observação..."
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control">
                                        <option value="0">Ativo</option>
                                        <option value="1">Inativo</option>  
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Diário/Semanal</label>
                                <select name="dia" class="form-control">
                                        <option value="0">Semanal</option>
                                        <option value="1">Diário</option>   
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Imagem do produto</label>
                                <input type="file" class="form-control" name="arquivo"/>
                            </div>
            
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius:5px;">Cancelar
            </button>
            <button type="submit" class="btn btn-success" style="border-radius:5px;">Cadastrar categoria</button>
        </div>
        </form>
        </div>
    </div>
    </div>

</div>
<!-- ./ Content -->