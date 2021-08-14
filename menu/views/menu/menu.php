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
                    <!-- <div class="toolbar">
                        <div class="btn-group">
                            <a href="<?=BASE_URL?>menu/novo_prato" class="btn btn-success">Novo prato</a>
                        </div>
                    </div> -->
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                            width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Imagem</th>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Cardápio</th>
                                    <th>Preço</th>
                                    <th>Adicionais</th>
                                    <th class="disabled-sorting text-left">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($produtos as $produto): ?>
                                <tr> 
                                    <td>
                                        <img src="https://raphasfit.com.br/dashboard/<?=$produto['image']?>" alt=""
                                            style="width:80px;height:50px;border-radius:10px;">
                                    </td>
                                    <td><?=$produto['name_product']?></td>
                                    <td><?=$produto['category']?></td>
                                    <td><?=$produto['cardapio']?></td>
                                    <td><?=moeda($produto['actual_price'])?></td>
                                    <td class="text-left">
                                        <button class="btn btn-sm btn-warning btn-round"
                                            onclick="options(<?=$produto['id_product'];?>)">
                                            Adicionais
                                        </button>
                                    </td>
                                    <td class="text-left">
                                        <?php if($produto['status'] == "0"): ?>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-round"
                                                id="btn-i-one_<?=$produto['id_product'];?>"
                                                onclick="indisponivelone(<?=$produto['id_product'];?>)">pausado</button>
                                            <button class="btn btn-success btn-sm btn-round"
                                                id="btn-d-one_<?=$produto['id_product'];?>"
                                                onclick="disponivelone(<?=$produto['id_product'];?>)">disponível</button>
                                        </div>
                                        <?php else : ?>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm btn-round"
                                                id="btn-i-two_<?=$produto['id_product'];?>"
                                                onclick="indisponiveltwo(<?=$produto['id_product'];?>)">pausado</button>
                                            <button class="btn btn-sm btn-round"
                                                id="btn-d-two_<?=$produto['id_product'];?>"
                                                onclick="disponiveltwo(<?=$produto['id_product'];?>)">disponível</button>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <!-- Classic Modal -->
                                <div class="modal fade" id="myModal<?=$produto['id_product'];?>" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Adicionais do produto</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="body-modal-options<?=$produto['id_product'];?>">



                                            </div>
                                            <div class="modal-footer" style="justify-content: space-between;">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    data-dismiss="modal">Fechar</button>
                                            </div>

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

</div>
<!-- ./ Content -->

<!-- Classic Modal -->
<div class="modal fade" id="newCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nova Categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?=BASE_URL?>menu/categoryAction" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Nome da categoria (obrigatório)</label>
                        <input type="text" class="form-control" id="exampleInput1" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Tempo de espera (obrigatório)</label>
                        <input type="text" class="form-control" id="exampleInput1" name="waiting" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Observação da categoria
                            (obrigatório)</label>
                        <input type="text" class="form-control" id="exampleInput1" name="obs" required>
                    </div>

                    <div class="form-group select-wizard">
                        <label>Status</label>
                        <select class="selectpicker" data-size="7" data-style="select-with-transition" name="status">
                            <option> Escolha uma opção </option>
                            <option value="0"> Publicar </option>
                            <option value="1"> Rascunho </option>
                        </select>
                    </div>

                    <h6 class="description" style="margin-top:20px;">Escolha uma foto para categoria</h6>
                    <div class="picture">
                        <input type="file" name="arquivo" id="wizard-picture">
                    </div>

            </div>
            <div class="modal-footer" style="justify-content: space-between;">
                <button type="submit" class="btn btn-success btn-sm">Cadastrar categoria</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--  End Modal -->

<script src="<?=BASE_URL?>assets/js/managemenu.js"></script>