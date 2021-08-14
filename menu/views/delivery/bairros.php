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

                    <a data-toggle="modal" data-target="#exampleModal" class="btn btn-success mb-3" style="border-radius:5px;color:#FFF;">
                       Adicionar bairro &nbsp;&nbsp; <i class="fa fa-plus"></i>
                    </a>

                    <div class="card card-body">

                        <?php if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])) : ?>
                        <?php echo $_SESSION['alert']; ?>
                        <?php $_SESSION['alert'] = ''; ?>
                        <?php endif; ?>
                    
                        <form class="needs-validation" novalidate>
                        <?php foreach($bairros as $bairro): ?>
                            <div class="form-row">

                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01"><strong>Bairro:</strong></label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Nome do bairro" value="<?=$bairro['nome_bairro']?>" required readonly>
                                </div>

                                <div class="col-md-2 mb-3">
                                <label for="validationCustomUsername"><strong>Taxa de entrega:</strong></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">R$</span>
                                    </div>
                                    <input type="number" class="form-control" id="validationCustomUsername" placeholder="Taxa de entrega" value="<?=$bairro['taxa_entrega']?>" aria-describedby="inputGroupPrepend" required>
                                </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                <label for="validationCustomUsername"><strong>Retirada no local:</strong></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">R$</span>
                                    </div>
                                    <input type="number" class="form-control" id="validationCustomUsername" placeholder="Retirada no local" value="<?=$bairro['retirada']?>" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                    Please choose a username.
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4 btn-group">
                                    <a href="<?=BASE_URL?>delivery/edit/<?=$bairro['id']?>" class="btn bg-facebook btn-block" type="submit" 
                                        style="margin-top:29px;border-radius:5px;display:flex;justify-content: space-evenly;height:35px;border-top-right-radius: 0px;border-bottom-right-radius: 0px;">
                                        <i class="fa fa-pencil"></i>  Editar
                                    </a>
                                    <a href="<?=BASE_URL?>delivery/del/<?=$bairro['id']?>" class="btn btn-danger btn-block" type="submit" 
                                        style="margin-top:29px;border-radius:5px;display:flex;justify-content: space-evenly;height:35px;border-top-left-radius: 0px;border-bottom-left-radius: 0px;">
                                        <i class="fa fa-trash"></i>  Excluir
                                    </a>
                                </div>  
                            </div>
                            <hr/>
                            <?php endforeach; ?>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success">
            <h5 class="modal-title" id="exampleModalLabe">Cadastro de novo Bairro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="ti-close"></i>
            </button>
        </div>
        <div class="modal-body">
            <form action="<?=BASE_URL?>delivery/addAction" method="post">

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nome do bairro:</label>
                    <input type="text" class="form-control" placeholder="Digite o nome do bairro" name="nome_bairro" style="border-radius:5px;">
                </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Taxa de entrega:</label>
                    <input type="number" class="form-control" placeholder="0.00" name="taxa_entrega" style="border-radius:5px;">
                </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Retirada no local:</label>
                    <input type="number" class="form-control" placeholder="Digite a taxa de retirada" value="0.00" name="retirada" style="border-radius:5px;">
                </div>
            
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius:5px;">Cancelar
            </button>
            <button type="submit" class="btn btn-success" style="border-radius:5px;">Cadastrar bairro</button>
        </div>
        </form>
        </div>
    </div>
    </div>

</div>
<!-- ./ Content -->