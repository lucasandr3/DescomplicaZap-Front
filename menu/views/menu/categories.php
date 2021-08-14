<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-danger">
                <div class="card-icon">
                    <i class="material-icons">room_service</i>
                </div>
                <h4 class="card-title">Categorias</h4>
            </div>
            
            <div class="card-body">
                    <?php if($_SESSION['alert'] && !empty($_SESSION['alert'])) : ?>
                    <?php echo $_SESSION['alert']; ?>
                    <?php $_SESSION['alert'] = ''; ?>
                    <?php endif; ?>
                  <div class="toolbar">
                    <div class="btn-group">
                        <button class="btn btn-success" data-toggle="modal" data-target="#newCat">Nova Categoria</button>
                    </div>
                    </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                          <th>Nome da categoria</th>
                          <th>Tempo de entrega</th>
                          <th>Observação da categoria</th>
                          <th class="disabled-sorting text-left">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($categories as $category): ?>  
                        <tr>
                          <td><?=$category['name_category']?></td>
                          <td><?=$category['waiting']?></td>
                          <td><?=$category['obs_waiting']?></td>
                          <td class="text-left">
                            <button class="btn btn-link btn-warning btn-round" data-toggle="modal" data-target="#myModal<?=$category['id'];?>">
                                <i class="material-icons">create</i> editar
                            </button>
                          </td>
                        </tr>

                        <!-- Classic Modal -->
                        <div class="modal fade" id="myModal<?=$category['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Editar Categoria</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="<?=BASE_URL?>menu/categoryEditAction" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInput1" class="bmd-label-floating">Nome da categoria (obrigatório)</label>
                                            <input type="text" class="form-control" id="exampleInput1" name="name" value="<?=$category['name_category'];?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInput1" class="bmd-label-floating">Tempo de espera (obrigatório)</label>
                                            <input type="text" class="form-control" id="exampleInput1" name="waiting" value="<?=$category['waiting'];?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInput1" class="bmd-label-floating">Observação da categoria (obrigatório)</label>
                                            <input type="text" class="form-control" id="exampleInput1" name="obs" value="<?=$category['obs_waiting'];?>">
                                        </div>

                                        <div class="form-group" style="display:none;">
                                            <label for="exampleInput1" class="bmd-label-floating">cover</label>
                                            <input type="text" class="form-control" id="exampleInput1" name="cover" value="<?=$category['cover'];?>">
                                        </div>

                                        <div class="form-group" style="display:none;">
                                            <label for="exampleInput1" class="bmd-label-floating">cover</label>
                                            <input type="text" class="form-control" id="exampleInput1" name="id_cat" value="<?=$category['id'];?>">
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInput1">Status</label>
                                        <select class="selectpicke form-control" data-size="12" data-style="select-with-transition" name="status" id="exampleInput1">
                                            <?php if($category['name_category'] == "0"): ?>
                                                <option value="0"> Publicada </option>
                                                <option value="1"> Rascunho </option>
                                            <?php else : ?>
                                                <option value="1"> Rascunho </option>
                                                <option value="0"> Publicar </option>
                                            <?php endif; ?>    
                                        </select>
                                        </div>
                                      
                                        <h6 class="description" style="margin-top:20px;">Foto atual</h6>
                                        <div style="margin-bottom:15px;">
                                            <img src="<?=BASE_URL?><?=$category['cover']?>" alt="" style="width: 150px;height: 120px;">
                                        </div>

                                        <h6 class="description" style="margin-top:20px;">Escolha uma foto para categoria</h6>
                                        <div class="picture">
                                            <input type="file" name="arquivo" id="wizard-picture">
                                        </div>
                                
                                    </div>
                                    <div class="modal-footer" style="justify-content: space-between;">
                                    <button type="submit" class="btn btn-success btn-sm">Salvar alterações</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        <!--  End Modal -->

                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</div>

<!-- Classic Modal -->
<div class="modal fade" id="newCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Nova Categoria</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                </button>
                                </div>
                                <div class="modal-body">
                                
                                    <form action="<?=BASE_URL?>menu/categoryAction" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInput1" class="bmd-label-floating">Nome da categoria (obrigatório)</label>
                                            <input type="text" class="form-control" id="exampleInput1" name="name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInput1" class="bmd-label-floating">Tempo de espera (obrigatório)</label>
                                            <input type="text" class="form-control" id="exampleInput1" name="waiting" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInput1" class="bmd-label-floating">Observação da categoria (obrigatório)</label>
                                            <input type="text" class="form-control" id="exampleInput1" name="obs" required>
                                        </div>

                                        <div class="form-group select-wizard">
                                        <label>Status</label>
                                        <select class="selectpicker" data-size="7" data-style="select-with-transition" name="status">
                                            <option> Escolha uma opção </option>
                                            <option value="0"> Publicar </option>
                                            <option value="1"> Rascunho </option>
                                        </select>
                                        </div>
                                      
                                        <h6 class="description" style="margin-top:20px;">Escolha uma foto para categoria</h6>
                                        <div class="picture">
                                            <input type="file" name="arquivo" id="wizard-picture">
                                        </div>
                                        
                                </div>
                                <div class="modal-footer" style="justify-content: space-between;">
                                <button type="submit" class="btn btn-success btn-sm">Cadastrar categoria</button>
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        <!--  End Modal -->