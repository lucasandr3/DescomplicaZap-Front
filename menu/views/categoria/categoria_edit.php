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
                
                    <a href="<?=BASE_URL?>categoria" class="btn bg-facebook mb-3" style="border-radius:5px;">
                        <i class="fa fa-arrow-left"></i> &nbsp;&nbsp;Voltar
                    </a>

                    <div class="card card-body">

                        <?php if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])) : ?>
                        <?php echo $_SESSION['alert']; ?>
                        <?php $_SESSION['alert'] = ''; ?>
                        <?php endif; ?>
                    
                        <form action="<?=BASE_URL?>categoria/editAction" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome da Categoria</label>
                                <input type="text" class="form-control" name="name_category"
                                    aria-describedby="emailHelp" placeholder="Digite o nome aqui..."
                                    value="<?=($categoria['name_category'] === "") ? '' : $categoria['name_category']?>"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tempo de espera</label>
                                <input type="text" class="form-control" name="waiting"
                                    aria-describedby="emailHelp" placeholder=""
                                    value="<?=($categoria['waiting'] === "") ? '' : $categoria['waiting']?>"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Observação</label>
                                <input type="text" class="form-control" name="obs_waiting"
                                    aria-describedby="emailHelp" placeholder=""
                                    value="<?=($categoria['obs_waiting'] === "") ? '' : $categoria['obs_waiting']?>"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control">
                                    <?php if($categoria['status'] == "0"): ?>
                                        <option value="0">Ativo</option>
                                    <?php else: ?>
                                        <option value="1">Inativo</option>
                                    <?php endif; ?> 
                                    <?php if($categoria['status'] == "0"): ?>
                                        <option value="1">Inativo</option>
                                    <?php else: ?>
                                        <option value="0">Ativo</option>
                                    <?php endif; ?>    
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Diário/Semanal</label>
                                <select name="dia" class="form-control">
                                    <?php if($categoria['dia'] == "0"): ?>
                                        <option value="0">Semanal</option>
                                    <?php else: ?>
                                        <option value="1">Diário</option>
                                    <?php endif; ?> 
                                    <?php if($categoria['dia'] == "0"): ?>
                                        <option value="1">Diário</option>
                                    <?php else: ?>
                                        <option value="0">Semanal</option>
                                    <?php endif; ?>    
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Imagem do produto</label>
                                <input type="file" class="form-control" name="arquivo"/>
                                <div style="margin-top: 20px;" id="im-produto">
                                    <img src="<?=$categoria['cover']?>" alt="" width="300">
                                </div>
                            </div>

                            <input type="hidden" name="id" value="<?=$categoria['id']?>">
                            
                            <button type="submit" class="btn btn-success btn-block">Salvar alterações</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->