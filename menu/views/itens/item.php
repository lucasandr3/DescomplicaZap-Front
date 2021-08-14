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

                    <a data-toggle="modal" data-target="#exampleModalAdd" class="btn btn-success mb-3" style="border-radius:5px;color:#FFF;">
                       Adicionar item &nbsp;&nbsp; <i class="fa fa-plus"></i>
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
                                    <th>Nome do Item Adicional</th>
                                    <th>Item do produto</th>
                                    <th>Item da categoria</th>
                                    <th>Preço</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody id="bodytabled">
                                <?php foreach($itens as $item): ?>
                                <tr>
                                    <td><?=$item['name_option']?></td>
                                    <td><?=$item['name_product']?></td>
                                    <td><?=$item['category_name_option']?></td>
                                    <td>
                                        <?php if($item['price_option'] == null): ?>
                                            <span>R$ 0,00</span>
                                        <?php else: ?>
                                            <span>R$ <?=number_format($item['price_option'],2,',','.')?></span>
                                        <?php endif; ?> 
                                    </td>
                                    <td>
                                        <?php if($item['available'] == "0"): ?>
                                            <span class="badge badge-success">Ativo</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger">Inativo</span>
                                        <?php endif; ?>    
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?=BASE_URL?>itens/edit/<?=$item['id_option']?>" class="btn bg-facebook btn-sm" 
                                                style="border-radius:5px;display:flex;justify-content: space-evenly;margin-right:5px;">
                                                <i class="fa fa-pencil"></i>  Editar
                                            </a>
                                            <a href="<?=BASE_URL?>itens/del/<?=$item['id_option']?>" class="btn btn-danger btn-sm" 
                                                style="border-radius:5px;display:flex;justify-content: space-evenly;">
                                                <i class="fa fa-trash"></i>  Excluir
                                            </a>
                                        </div>
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
    <div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success">
            <h5 class="modal-title" id="exampleModalLabe">Cadastro de item Adicional</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="ti-close"></i>
            </button>
        </div>
        <div class="modal-body">
            <form action="<?=BASE_URL?>itens/addAction" method="post">

            <div class="form-group">
                                <label for="exampleInputEmail1">Nome do item Adicional</label>
                                <input type="text" class="form-control" name="name_option"
                                    aria-describedby="emailHelp" placeholder="Digite o nome aqui..."
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Categoria do item adicional</label>
                                <select name="id_category_option" class="form-control">
                                    <?php foreach($adicionais as $a): ?>
                                        <option value="<?=$a['id_category_option']?>"><?=$a['category_name_option']?></option>
                                    <?php endforeach; ?>       
                                </select>
                            </div>

            <div class="form-group">
                                <label for="exampleInputEmail1">Produto do item adicional</label>
                                <select name="id_product" class="form-control">
                                    <?php foreach($produtos as $p): ?>
                                        <option value="<?=$p['id_product']?>"><?=$p['name_product']?></option>
                                    <?php endforeach; ?>       
                                </select>
                            </div>

            <div class="form-group">
                                <label for="exampleInputEmail1">Preço do item Adicional</label>
                                <input type="number" class="form-control" name="price_option"
                                    aria-describedby="emailHelp" placeholder="0.00" value="0.00"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="available" class="form-control">
                                        <option value="0">Ativo</option>
                                        <option value="1">Inativo</option>  
                                </select>
                            </div>            
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius:5px;">Cancelar
            </button>
            <button type="submit" class="btn btn-success" style="border-radius:5px;">Cadastrar item adicional</button>
        </div>
        </form>
        </div>
    </div>
    </div>

</div>
<!-- ./ Content -->