<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-danger">
                <div class="card-icon">
                    <i class="material-icons">room_service</i>
                </div>
                <h4 class="card-title">Itens de adicionais</h4>
            </div>
            
            <div class="card-body">
                    <?php if($_SESSION['alert'] && !empty($_SESSION['alert'])) : ?>
                    <?php echo $_SESSION['alert']; ?>
                    <?php $_SESSION['alert'] = ''; ?>
                    <?php endif; ?>
                  <div class="toolbar">
                    <div class="btn-group">
                        <button class="btn btn-success" data-toggle="modal" data-target="#newCat">Novo item Adicional</button>
                    </div>
                    </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                          <th>Nome do item</th>
                          <th>Categoria adicional</th>
                          <th>Produto</th>
                          <th>Preço</th>
                          <th class="disabled-sorting text-left">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($itens as $item): ?>  
                        <tr>
                          <td><?=$item['name_option']?></td>
                          <td><strong><?=$item['category_name_option']?></strong></td>
                          <td><strong><?=$item['name_product']?></strong></td>
                          <td>
                              <?php if($item['price_option'] == ''): ?>
                                <span>Não tem preço</span>
                              <?php else : ?>
                                <?=moeda($item['price_option'])?>
                              <?php endif; ?>    
                          </td>
                          <td class="text-left">
                          <button class="btn btn-link btn-warning" data-toggle="modal" data-target="#myModal<?=$item['id_option'];?>"><i class="material-icons">create</i> Editar</button>    
                          <?php if($item['available'] == "0"): ?>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-round" id="btn-itemi-one_<?=$item['id_option'];?>" onclick="indisponivelone(<?=$item['id_option'];?>)">pausado</button>
                                    <button class="btn btn-success btn-sm btn-round" id="btn-itemd-one_<?=$item['id_option'];?>" onclick="disponivelone(<?=$item['id_option'];?>)">disponível</button>
                                </div>
                            <?php else : ?>
                                <div class="btn-group">
                                    <button class="btn btn-danger btn-sm btn-round" id="btn-itemi-two_<?=$item['id_option'];?>" onclick="indisponiveltwo(<?=$item['id_option'];?>)">pausado</button>
                                    <button class="btn btn-sm btn-round" id="btn-itemd-two_<?=$item['id_option'];?>" onclick="disponiveltwo(<?=$item['id_option'];?>)">disponível</button>
                                </div>
                            <?php endif; ?> 
                          </td>
                        </tr>

                        <!-- Classic Modal -->
                        <div class="modal fade" id="myModal<?=$item['id_option'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Editar Item</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="<?=BASE_URL?>itens/editAction" method="POST">
                                    
                                        <div class="form-group">
                                            <label for="exampleInput1" class="bmd-label-floating">Nome do item (obrigatório)</label>
                                            <input type="text" class="form-control" id="exampleInput1" name="nome" value="<?=$item['name_option'];?>" required>
                                        </div>

                                        <div class="form-group">
                                        <select class="selectpicke form-control" data-size="12" data-style="select-with-transition" name="id_category" id="exampleInput1">
                                            <option value="<?=$item['id_category_option'];?>"> <?=$item['category_name_option'];?> </option>
                                            <?php foreach($adicionais as $adicional): ?>
                                            <option value="<?=$adicional['id_category_option'];?>"> <?=$adicional['category_name_option'];?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div>

                                        <div class="form-group">
                                        <select class="selectpicke form-control" data-size="12" data-style="select-with-transition" name="id_product" id="exampleInput1">
                                            <option value="<?=$item['id_product'];?>"> <?=$item['name_product'];?> </option>
                                            <?php foreach($produtos as $prod): ?>
                                            <option value="<?=$prod['id_product'];?>"> <?=$prod['name_product'];?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInput1" class="bmd-label-floating">Preço do item</label>
                                            <input type="text" class="form-control" id="exampleInput1" name="price_option" value="<?=$item['price_option'];?>" required>
                                        </div>

                                        <div class="form-group" style="display:none;">
                                            <input type="text" class="form-control" id="exampleInput1" name="id_option" value="<?=$item['id_option'];?>" required>
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
                                <h4 class="modal-title">Novo Adicional</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                </button>
                                </div>
                                <div class="modal-body">
                                
                                    <form action="<?=BASE_URL?>itens/addAction" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInput1" class="bmd-label-floating">Nome do item (obrigatório)</label>
                                            <input type="text" class="form-control" id="exampleInput1" name="nome" required>
                                        </div>

                                        <div class="form-group">
                                        <select class="selectpicke form-control" data-size="12" data-style="select-with-transition" name="id_category" id="exampleInput1">
                                            <option> Escolha um adicional </option>
                                            <?php foreach($adicionais as $adicional): ?>
                                            <option value="<?=$adicional['id_category_option'];?>"> <?=$adicional['category_name_option'];?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div><br><br>

                                        <div class="form-group">
                                        <select class="selectpicke form-control" data-size="12" data-style="select-with-transition" name="id_product" id="exampleInput1">
                                            <option> Escolha um produto </option>
                                            <?php foreach($produtos as $prod): ?>
                                            <option value="<?=$prod['id_product'];?>"> <?=$prod['name_product'];?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div><br><br>

                                        <div class="form-group">
                                            <label for="exampleInput1" class="bmd-label-floating">Preço do item</label>
                                            <input type="text" class="form-control" id="exampleInput1" name="price_option" required>
                                        </div>

                                        <div class="form-group">
                                        <select class="selectpicke form-control" data-size="12" data-style="select-with-transition" name="available" id="exampleInput1">
                                            <option value="0"> Publicar </option>
                                            <option value="1"> Rascunho </option>  
                                        </select>
                                        </div><br>

                                                                              
                                </div>
                                <div class="modal-footer" style="justify-content: space-between;">
                                <button type="submit" class="btn btn-success btn-sm">Cadastrar adicional</button>
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        <!--  End Modal -->
<script src="<?=BASE_URL?>assets/js/manageitem.js"></script>