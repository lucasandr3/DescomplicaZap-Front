<!-- Content -->
<div class="content">

    <div class="page-header">
        <div class="page-title">
            <h3><?=$title?></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">

                <?php if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])) : ?>
                <?php echo $_SESSION['alert']; ?>
                <?php $_SESSION['alert'] = ''; ?>
                <?php endif; ?>

                <form action="<?=BASE_URL?>menu/novo_prato_action" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Categoria do produto</label>
                                <select name="category" class="form-control">
                                    <option>Escolha a categoria</option>
                                    <?php foreach($categories as $c): ?>
                                        <option value="<?=$c['name_category']?>"><?=$c['name_category']?></option>
                                    <?php endforeach; ?>    
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome do produto</label>
                                <input type="text" class="form-control" name="name_product"
                                    aria-describedby="emailHelp" placeholder="Digite o nome do produto"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ingredientes</label>
                                <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Digite os ingredientes aqui..."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Preço</label>
                                <input type="number" class="form-control" name="actual_price"
                                    aria-describedby="emailHelp" placeholder="0.00"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Imagem do produto</label>
                                <input type="file" class="form-control" name="arquivo"/>
                                <div style="margin-top: 20px;">
                                    <img src="<?=BASE_URL?><?=$data_store['logo']?>" alt="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control">
                                    <option value="0">Publicar</option>
                                    <option value="1">Não Publicar</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-success btn-block">Cadastrar Produto</button>
                        </form>

                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->