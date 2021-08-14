<!-- Content -->
<div class="content">

    <div class="page-header">
        <div class="page-title">
            <h3><?=$title?></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

                <div class="div-finan"> 
                    <div style="margin-top:8px;"><h5>Escolha o produto para editar</h5></div>
                    <div  style="display:flex;justify-content: center;align-items:center;">
                        <select class="form-control" id="product_edit_id" onChange="showProductEdit()" style="border: 1px solid #999;border-radius: 5px;width:250px;">
                            <option>Escolha o produto</option>    
                            <?php foreach($produtos as $p): ?>
                                <option value="<?=$p['id_product']?>"><?=$p['name_product']?></option>
                            <?php endforeach; ?>    
                        </select>
                    </div>
                </div>

            <div class="card">
                <div class="card-body">

                <?php if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])) : ?>
                <?php echo $_SESSION['alert']; ?>
                <?php $_SESSION['alert'] = ''; ?>
                <?php endif; ?>

                <form action="<?=BASE_URL?>menu/edit_prato_action" method="POST" enctype="multipart/form-data">
                            <div class="form-group" id="a-categoria">
                                <label for="exampleInputEmail1">Categoria atual - <button class="btn bg-facebook btn-sm" id="alter-cat">Alterar categoria</button></label>
                                <select name="category" class="form-control" id="cate-atual">
                                      <option>--</option> 
                                </select>
                            </div>

                            <div class="form-group" id="v-categoria" style="display:none;">
                                <label for="exampleInputEmail1">Categoria do produto</label>
                                <select name="category" class="form-control">
                                    <?php foreach($categories as $c): ?>
                                        <option value="<?=$c['name_category']?>"><?=$c['name_category']?></option>
                                    <?php endforeach; ?>    
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome do produto</label>
                                <input type="text" class="form-control" name="name_product"
                                    aria-describedby="emailHelp" placeholder="Digite o nome do produto" id="n-produto"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ingredientes</label>
                                <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Digite os ingredientes aqui..." id="i-produto"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Preço</label>
                                <input type="number" class="form-control" name="actual_price"
                                    aria-describedby="emailHelp" placeholder="0.00" id="p-produto"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Preço Promocional</label>
                                <input type="number" class="form-control" name="sale_price"
                                    aria-describedby="emailHelp" placeholder="0.00" value="0.00" id="sp-produto"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Imagem do produto</label>
                                <input type="file" class="form-control" name="arquivo"/>
                                <div style="margin-top: 20px;" id="im-produto">
                                    <img src="" alt="">
                                </div>
                            </div>

                            <div class="form-group" id="a-sta">
                                <label for="exampleInputEmail1">Status - <button class="btn bg-facebook btn-sm" id="alter-st">Alterar status</button></label>
                                <select name="status" class="form-control" id="s-atual">
                                    <option>--</option>
                                </select>
                            </div>

                            <div class="form-group" id="s-alter" style="display:none;">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control">
                                    <option value="0">Publicar</option>
                                    <option value="1">Não Publicar</option>
                                </select>
                            </div>

                            <input type="hidden" id="p-id" name="id_product">
                            
                            <button type="submit" class="btn btn-success btn-block" id="btnedit" disabled>Salvar alterações</button>
                        </form>

                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->

<script type="text/javascript">
    var categorias = <?php echo json_encode($categories); ?>;
</script>
<script src="<?=BASE_URL?>assets/js/edit_product.js"></script>