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
                
                    <a href="<?=BASE_URL?>adicional" class="btn bg-facebook mb-3" style="border-radius:5px;">
                        <i class="fa fa-arrow-left"></i> &nbsp;&nbsp;Voltar
                    </a>

                    <div class="card card-body">

                        <?php if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])) : ?>
                        <?php echo $_SESSION['alert']; ?>
                        <?php $_SESSION['alert'] = ''; ?>
                        <?php endif; ?>
                    
                        <form action="<?=BASE_URL?>adicional/editAction" method="POST">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome do adicional</label>
                                <input type="text" class="form-control" name="category_name_option"
                                    aria-describedby="emailHelp" placeholder="Digite o nome aqui..."
                                    value="<?=($adicional['category_name_option'] === "") ? '' : $adicional['category_name_option']?>"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Produtos</label>
                                <select name="id_product" class="form-control">
                                    <optgroup label="Produto Atual">
                                        <option value="<?=$adicional['id_product']?>"><?=$adicional['name_product']?></option>
                                    </optgroup>
                                    <optgroup label="Trocar Produto">
                                        <?php foreach($produtos as $p): ?>
                                            <option value="<?=$p['id_product']?>"><?=$p['name_product']?></option>
                                        <?php endforeach; ?>  
                                    </optgroup>  
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="active" class="form-control">
                                    <?php if($adicional['active'] == "0"): ?>
                                        <option value="0">Ativo</option>
                                    <?php else: ?>
                                        <option value="1">Inativo</option>
                                    <?php endif; ?> 
                                    <?php if($adicional['active'] == "0"): ?>
                                        <option value="1">Inativo</option>
                                    <?php else: ?>
                                        <option value="0">Ativo</option>
                                    <?php endif; ?>    
                                </select>
                            </div>

                            <input type="hidden" name="id_category_option" value="<?=$adicional['id_category_option']?>">
                            
                            <button type="submit" class="btn btn-success btn-block">Salvar alterações</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->
