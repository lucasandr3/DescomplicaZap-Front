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
                
                    <a href="<?=BASE_URL?>itens" class="btn bg-facebook mb-3" style="border-radius:5px;">
                        <i class="fa fa-arrow-left"></i> &nbsp;&nbsp;Voltar
                    </a>

                    <div class="card card-body">

                        <?php if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])) : ?>
                        <?php echo $_SESSION['alert']; ?>
                        <?php $_SESSION['alert'] = ''; ?>
                        <?php endif; ?>
                    
                        <form action="<?=BASE_URL?>itens/editAction" method="POST">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome do item adicional</label>
                                <input type="text" class="form-control" name="name_option"
                                    aria-describedby="emailHelp" placeholder="Digite o nome aqui..."
                                    value="<?=($item['name_option'] === "") ? '' : $item['name_option']?>"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Preço do item</label>
                                <input type="number" class="form-control" name="price_option"
                                    aria-describedby="emailHelp" placeholder=""
                                    value="<?=($item['price_option']) ? $item['price_option'] : '0.00'?>"
                                    />
                            </div>

                            <input type="hidden" name="id_category_option" value="<?=$item['id_category_option']?>">
                            <input type="hidden" name="id_product" value="<?=$item['id_product']?>">
                            <input type="hidden" name="id_option" value="<?=$item['id_option']?>">

                            <!-- <div class="form-group">
                                <label for="exampleInputEmail1">Produtos</label>
                                <select name="id_product" class="form-control">
                                    <optgroup label="Produto Atual">
                                        <option value="<?=$item['id_product']?>"><?=$item['name_product']?></option>
                                    </optgroup>
                                    <optgroup label="Trocar Produto">
                                        <?php foreach($produtos as $p): ?>
                                            <option value="<?=$p['id_product']?>"><?=$p['name_product']?></option>
                                        <?php endforeach; ?>  
                                    </optgroup>  
                                </select>
                            </div> -->

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="available" class="form-control">
                                    <?php if($item['available'] == "0"): ?>
                                        <option value="0">Ativo</option>
                                    <?php else: ?>
                                        <option value="1">Inativo</option>
                                    <?php endif; ?> 
                                    <?php if($item['available'] == "0"): ?>
                                        <option value="1">Inativo</option>
                                    <?php else: ?>
                                        <option value="0">Ativo</option>
                                    <?php endif; ?>    
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success btn-block">Salvar alterações</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->
