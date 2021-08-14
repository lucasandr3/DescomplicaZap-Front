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
                    <div class="card card-body">

                        <?php if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])) : ?>
                        <?php echo $_SESSION['alert']; ?>
                        <?php $_SESSION['alert'] = ''; ?>
                        <?php endif; ?>
                    
                        <form action="<?=BASE_URL?>store/editLojaAction" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome da Loja</label>
                                <input type="text" class="form-control" name="nome"
                                    aria-describedby="emailHelp" placeholder="Digite o nome aqui..."
                                    value="<?=($data_store['nome'] === "") ? '' : $data_store['nome']?>"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Endereço</label>
                                <input type="text" class="form-control" name="rua"
                                    aria-describedby="emailHelp" placeholder="Ex: Rua Tertuliano Goulart"
                                    value="<?=($data_store['rua'] === "") ? '' : $data_store['rua']?>"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Bairro</label>
                                <input type="text" class="form-control" name="bairro"
                                    aria-describedby="emailHelp" placeholder="Digite o bairro aqui..."
                                    value="<?=($data_store['bairro'] === "") ? '' : $data_store['bairro']?>"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Cidade</label>
                                <input type="text" class="form-control" name="cidade"
                                    aria-describedby="emailHelp" placeholder="Digite a cidade aqui..."
                                    value="<?=($data_store['cidade'] === "") ? '' : $data_store['cidade']?>"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Número</label>
                                <input type="number" class="form-control" name="numero"
                                    aria-describedby="emailHelp" placeholder="Digite o número aqui..."
                                    value="<?=($data_store['numero'] === "") ? '' : $data_store['numero']?>"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Telefone</label>
                                <input type="tel" class="form-control" name="telefone"
                                    placeholder="(00) 00000-0000"
                                    value="<?=($data_store['telefone'] === "") ? '' : $data_store['telefone']?>"
                                    />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Logo no app</label>
                                <input type="file" class="form-control" name="arquivo"/>
                                <div style="margin-top: 20px;">
                                    <img src="<?=BASE_URL?><?=$data_store['logo']?>" alt="">
                                </div>
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