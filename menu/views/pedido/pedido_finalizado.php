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

                        <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                            width="100%" style="width:100%">
                            <thead>
                                <tr>
                                  <th>Id do pedido</th>
                                  <th>Data do pedido</th>
                                  <th>Hora do pedido</th>
                                  <th>Total do pedido</th>
                                  <th>Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($pedidos as $pedido): ?>
                              <tr>
                                <td>#<?=$pedido['id'] ?></td>
                                <td><?=date('d/m/Y', strtotime($pedido['data_pedido'])) ?></td>
                                <td><?=date('H:i:s', strtotime($pedido['hora_pedido'])) ?> hs</td>
                                <td width="90" class="text-success"> 
                                  <strong>
                                    <?= 'R$ '.number_format($pedido['total'],2,',','.') ?>
                                  </strong>
                                </td>
                                <td>
                                  <a href="<?=BASE_URL?>pedido/detalhesf/<?=$pedido['id'];?>" class="btn bg-facebook btn-sm" style="margin-right:-4px;margin-left:3px;border-radius:5px;">
                                     <i class="fa fa-file"></i> &nbsp;&nbsp;Detalhes do pedido
                                  </a>
                                </td>
                              </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="modalEntradaRecorrente" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success">
            <h5 class="modal-title" id="exampleModalLabe">Cadastro de entrada</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="ti-close"></i>
            </button>
        </div>
        <div class="modal-body">

          <form action="<?php echo BASE_URL ?>entrada/addReco" method="POST">
                <div class="row">
                  <div class="form-group col-md-3">
                  <label>Descrição:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-pencil"></i></span>
                      </div>
                      <input type="text" class="form-control pull-right" name="descricao" autofocus>
                    </div>
                  </div>

                  <div class="form-group col-md-3">
                  <label>Valor:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-money"></i></span>
                      </div>
                      <input type="text" class="form-control pull-right" name="valor" id="valordes" placeholder="0.00">
                    </div>
                  </div>

                  <div class="form-group col-md-3">
                  <label>V.Entrada:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-money"></i></span>
                      </div>
                      <input type="text" class="form-control pull-right" name="ventrada" value="0.00"  id="valorendes" placeholder="0.00">
                    </div>
                  </div>

                  <div class="form-group col-md-3">
                  <label>Juros:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i>%</i></span>
                      </div>
                      <input type="text" class="form-control pull-right" name="juro" value="0.0" id="jurodes" placeholder="0.0">
                    </div>
                  </div>
                </div>

                <div class="row">
                <div class="form-group col-md-6">
                  <label>Data de Vencimento:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input type="date" class="form-control pull-right" id="" name="data_parc" placeholder="00/00/0000">
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                  <label>Qtd Parcelas:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-file-text-o"></i></span>
                      </div>
                      <input type="text" class="form-control pull-right" name="qtd_parc">
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
