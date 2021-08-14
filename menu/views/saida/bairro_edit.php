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
                
                    <a href="<?=BASE_URL?>delivery" class="btn bg-facebook mb-3" style="border-radius:5px;">
                        <i class="fa fa-arrow-left"></i> &nbsp;&nbsp;Voltar
                    </a>

                    <div class="card card-body">

                        <?php if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])) : ?>
                        <?php echo $_SESSION['alert']; ?>
                        <?php $_SESSION['alert'] = ''; ?>
                        <?php endif; ?>
                    
                        <form action="<?=BASE_URL?>delivery/editAction" method="POST">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome do Bairro</label>
                                <input type="text" class="form-control" name="nome_bairro"
                                    aria-describedby="emailHelp" placeholder="Digite o nome aqui..."
                                    value="<?=($bairro['nome_bairro'] === "") ? '' : $bairro['nome_bairro']?>"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Taxa de entrega</label>
                                <input type="number" class="form-control" name="taxa_entrega"
                                    aria-describedby="emailHelp" placeholder="Ex: Rua Tertuliano Goulart"
                                    value="<?=($bairro['taxa_entrega'] === "") ? '' : $bairro['taxa_entrega']?>"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Bairro</label>
                                <input type="number" class="form-control" name="retirada"
                                    aria-describedby="emailHelp" placeholder="Digite o bairro aqui..."
                                    value="<?=($bairro['retirada'] === "") ? '' : $bairro['retirada']?>"
                                    />
                            </div>

                            <input type="hidden" name="id" value="<?=$bairro['id']?>">
                            
                            <button type="submit" class="btn btn-success btn-block">Salvar alterações</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->