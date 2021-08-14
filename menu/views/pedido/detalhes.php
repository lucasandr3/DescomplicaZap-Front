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

                    <?php if($pedido['status_do_pedido'] == 0): ?>
                        <a href="<?=BASE_URL?>pedido" class="btn bg-facebook mb-3" style="border-radius:5px;">
                            <i class="fa fa-arrow-left"></i> &nbsp;&nbsp;Voltar
                        </a>
                    <?php elseif($pedido['status_do_pedido'] == 1): ?>
                        <a href="<?=BASE_URL?>pedido" class="btn bg-facebook mb-3" style="border-radius:5px;">
                            <i class="fa fa-arrow-left"></i> &nbsp;&nbsp;Voltar
                        </a>
                    <?php elseif($pedido['status_do_pedido'] == 2): ?> 
                        <a href="<?=BASE_URL?>pedido" class="btn bg-facebook mb-3" style="border-radius:5px;">
                            <i class="fa fa-arrow-left"></i> &nbsp;&nbsp;Voltar
                        </a>
                    <?php elseif($pedido['status_do_pedido'] == 3): ?> 
                        <a href="<?=BASE_URL?>pedido/cancelados" class="btn bg-facebook mb-3" style="border-radius:5px;">
                            <i class="fa fa-arrow-left"></i> &nbsp;&nbsp;Voltar
                        </a>
                    <?php elseif($pedido['status_do_pedido'] == 4): ?> 
                        <a href="<?=BASE_URL?>pedido/finalizados" class="btn bg-facebook mb-3" style="border-radius:5px;">
                            <i class="fa fa-arrow-left"></i> &nbsp;&nbsp;Voltar
                        </a>
                    <?php endif; ?>

                    <div class="card card-body" style="margin-bottom:0.875em;">
                        <div style="display: flex;justify-content: space-between;align-items: center;">
                            <div>
                                <p><strong>Id do Pedido: </strong>#<?=$pedido['id']?></p>
                                <p style="margin:0;"><strong>Status do Pedido: </strong>
                                    <?php if($pedido['status_do_pedido'] == 0): ?>
                                        <span class="badge bg-secondary-bright text-secondary">Confirmar</span>
                                    <?php elseif($pedido['status_do_pedido'] == 1): ?>
                                        <span class="badge bg-success-bright text-success">Despachado</span>
                                    <?php elseif($pedido['status_do_pedido'] == 2): ?> 
                                        <span class="badge bg-warning-bright text-warning">Em preparo...</span>
                                    <?php elseif($pedido['status_do_pedido'] == 3): ?> 
                                        <span class="badge bg-danger-bright text-danger">Cancelado</span>
                                    <?php elseif($pedido['status_do_pedido'] == 4): ?> 
                                        <span class="badge bg-success-bright text-success">Finalizado</span>
                                    <?php endif; ?>
                                </p>    
                            </div>
                            <div>
                                <p><strong>Data do Pedido: </strong><?=date('d/m/Y', strtotime($pedido['data_pedido']))?></p>
                                <p style="margin:0;"><strong>Hora do Pedido: </strong><?=date('H:i:s', strtotime($pedido['hora_pedido']))?> hs</p>
                            </div>
                            <div>
                                <p><strong>Subtotal: </strong><span class="text-success font-weight-bold">R$ <?=number_format($pedido['subtotal'],2,',','.')?></span></p>
                                <p style="margin:0;"><strong>Total do Pedido: </strong><span class="text-success font-weight-bold">R$ <?=number_format($pedido['total'],2,',','.')?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">                   
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 style="color:#222;">Endereço de entrega</h3> 
                    <div class="card card-body" style="margin-bottom:0.875em;">
                        <div style="display: flex;justify-content: space-between;align-items: center;">
                            <?php foreach(json_decode($pedido['endereco']) as $end): ?>
                                <div>
                                    <p><strong>Bairro: </strong><?=$end->bar?></p>
                                    <p><strong>Endereço: </strong><?=$end->rua?> hs</p>
                                    <p style="margin:0;"><strong>Referência: </strong><?=($end->ref == "") ? 'Sem ponto de referência': $end->ref?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">                   
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 style="color:#222;">Pagamento</h3> 
                    <div class="card card-body" style="margin-bottom:0.875em;">
                        <div style="display: flex;justify-content: space-between;align-items: center;">
                            <div>
                                <p><strong>Meio de pagamento: </strong><span><?=$pedido['pagamento']?></span></p>
                                <p><strong>troco: </strong><span class="text-success font-weight-bold">R$ <?=number_format($pedido['troco'],2,',','.')?></span></p>
                                <p style="margin:0;"><strong>Entrega: </strong><span class="text-success font-weight-bold">R$ <?=number_format($pedido['entrega'],2,',','.')?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">                   
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 style="color:#222;">Produtos do pedido</h3> 
                    <div class="card card-body" style="margin-bottom:0.875em;">
                    <?php foreach(json_decode($pedido['pedido']) as $prod): ?>
                        <div style="display: flex;justify-content: space-between;align-items: center;">
                            
                                <div>
                                    <p><strong>Nome do produto: </strong><?=$prod->name_product?></p>
                                    <p style="margin:0;"><strong>Preço: </strong>R$ <?=number_format($prod->price_product,2,',','.')?></p>
                                </div>
                                <div>
                                    <p><strong>Quantidade: </strong><?=($prod->quantity == "1") ? $prod->quantity.' unidade' : $prod->quantity.' unidades'?></p>
                                    <p style="margin:0;"><strong>Observação: </strong><?=($prod->note == "") ? 'sem observação' : $prod->note?></p>
                                </div>
                            
                        </div>
                        <hr style="border-color: #c7c7c7 !important;border-top: 2px solid rgba(0,0,0,.1);" />
                        <?php endforeach; ?>    
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ./ Content -->

<script type="text/javascript">
    var dt_inicial = <?php echo json_encode($viewData['data_inicial']); ?>;
    var dt_final = <?php echo json_encode($viewData['data_final']); ?>;
</script>