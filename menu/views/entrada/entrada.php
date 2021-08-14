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

                    <div class="div-finan">
                        <div>
                            <a data-toggle="modal" data-target="#modalDespesa" class="btn btn-success" style="border-radius:5px;color:#FFF;">
                            Adicionar entrada &nbsp;&nbsp; <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div style="margin-top:8px;"><h5 id="en-mes">Entradas do Mês de <?=strftime('%B', strtotime('F'))?></h5></div>
                        <?php
                            $ano = date('Y');
                        ?>
                        <div>
                            <select class="form-control" name="mesSelect" id="mesSelect" style="border: 1px solid #999;border-radius: 5px;">
                                <option value="<?=$ano.'-01-01'.','.$ano.'-01-31'?>"<?=(date('m') == '01')?'selected':'';?>>Janeiro de <?=$ano?></option>
                                <option value="<?=$ano.'-02-01'.','.$ano.'-02-29'?>"<?=(date('m') == '02')?'selected':'';?>>Fevereiro de <?=$ano?></option>
                                <option value="<?=$ano.'-03-01'.','.$ano.'-03-31'?>"<?=(date('m') == '03')?'selected':'';?>>Março de <?=$ano?></option>
                                <option value="<?=$ano.'-04-01'.','.$ano.'-04-30'?>"<?=(date('m') == '04')?'selected':'';?>>Abril de <?=$ano?></option>
                                <option value="<?=$ano.'-05-01'.','.$ano.'-05-30'?>"<?=(date('m') == '05')?'selected':'';?>>Maio de <?=$ano?></option>
                                <option value="<?=$ano.'-06-01'.','.$ano.'-06-30'?>"<?=(date('m') == '06')?'selected':'';?>>Junho de <?=$ano?></option>
                                <option value="<?=$ano.'-07-01'.','.$ano.'-07-31'?>"<?=(date('m') == '07')?'selected':'';?>>Julho de <?=$ano?></option>
                                <option value="<?=$ano.'-08-01'.','.$ano.'-08-31'?>"<?=(date('m') == '08')?'selected':'';?>>Agosto de <?=$ano?></option>
                                <option value="<?=$ano.'-09-01'.','.$ano.'-09-30'?>"<?=(date('m') == '09')?'selected':'';?>>Setembro de <?=$ano?></option>
                                <option value="<?=$ano.'-10-01'.','.$ano.'-10-31'?>"<?=(date('m') == '10')?'selected':'';?>>Outubro de <?=$ano?></option>
                                <option value="<?=$ano.'-11-01'.','.$ano.'-11-30'?>"<?=(date('m') == '11')?'selected':'';?>>novembro de <?=$ano?></option>
                                <option value="<?=$ano.'-12-01'.','.$ano.'-12-31'?>"<?=(date('m') == '12')?'selected':'';?>>Dezembro de <?=$ano?></option>
                            </select>
                        </div>
                    </div>

                    <div class="card card-body">

                        <?php if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])) : ?>
                        <?php echo $_SESSION['alert']; ?>
                        <?php $_SESSION['alert'] = ''; ?>
                        <?php endif; ?>

                        <div class="spinner-grow spinner-border-sm" role="status" id="loadd" style="display:none;">
                            <span class="sr-only">Loading...</span>
                        </div>
                    
                        <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                            width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>Data</th>
                                    <th>Categoria</th>
                                    <th>Conta</th>
                                </tr>
                            </thead>
                            <tbody id="bodytabled">
                                <?php foreach($entradas as $entrada): ?>
                                <tr>
                                    <td><?=$entrada['descricao']?></td>
                                    <td style="font-weight:bold;" class="text-success">R$ <?=number_format($entrada['valor'],2,',','.')?></td>
                                    <td><?=date('d/m/Y', strtotime($entrada['data_d']))?></td>
                                    <td>
                                        <img src="<?=BASE_URL?>assets/img/cat/ali.png" style="width: 20px;height: auto;"/>
                                        <?=$entrada['nome']?>
                                    </td>
                                    <td><?=$entrada['conta']?></td>
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
    <div class="modal fade" id="modalDespesa" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success">
            <h5 class="modal-title" id="exampleModalLabe">Cadastro de entrada</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="ti-close"></i>
            </button>
        </div>
        <div class="modal-body">
        <form action="<?=BASE_URL ?>entrada/add" method="POST">
        <div class="row">
          <div class="form-group col-md-12">
                  <label>Descrição:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-pencil"></i></span>
                      </div>
                      <input type="text" class="form-control pull-right" name="descricao" autofocus>
                    </div>
                  </div>
                </div>

                <div class="row">
                <div class="form-group col-md-6">
                  <label>Valor:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-money"></i></span>
                      </div>
                      <input type="text" class="form-control pull-right" name="valor" id="valordes" placeholder="0.00">
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                  <label>Data:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input type="date" class="form-control pull-right" name="data_d" id="" placeholder="00/00/0000">
                    </div>
                  </div>
                </div>

                <div class="row">
                <div class="form-group col-md-6">
                  <label>Conta:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-bank"></i></span>
                      </div>
                      <select name="conta" class="form-control">
                        <option>Escolha uma Conta</option>
                        <option value="Empresa">Empresa</option>
                        <option value="Pessoal">Pessoal</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                  <label>Categoria:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-sitemap"></i></span>
                      </div>
                      <select name="id_cat" class="form-control">
                        <option value="">Categorias</option>
                        <?php foreach($cat_rec as $cat):?>
                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['nome'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-square pull-left" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success btn-square pull-left">Salvar</button>
              </div>
              </form>
        </div>
    </div>
    </div>

</div>
<!-- ./ Content -->

<script type="text/javascript">
    var dt_inicial = <?php echo json_encode($viewData['data_inicial']); ?>;
    var dt_final = <?php echo json_encode($viewData['data_final']); ?>;
</script>