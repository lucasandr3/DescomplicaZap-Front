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
                        <?php
                            $dia = date('d/m/Y');
                        ?>
                        <div style="margin-top:8px;"><h5 id="v-dia">Vendas do dia - <?=$dia;?></h5></div>
                        <div class="ml-md-auto py-2 py-md-0" style="display:flex;">
									<input type="date" id="inpi-data-rel" placeholder="filtrar por data..." style="height: 44px;
										border-radius: 5px;border: 1px solid #9999;outline: none;padding: 10px;border-top-right-radius: 0px;
										border-bottom-right-radius: 0px;" 
									/>
									<button onclick="diario()" class="btn btn-success" style="border-radius:5px;border-top-left-radius:0px;border-bottom-left-radius:0px;background-color:#4CAF50!important;border:#4CAF50!important;color:white;">Filtrar por dia</button>
							</div>

                    </div>
                </div>
            </div>

            <div class="row" id="block-v-dia">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-body">
                        <p class="d-flex justify-content-between mb-2">
                            <span class="">Total de pedidos</span>
                        </p>
                        <h2 class="mb-3"><?=$total_pedido['total_day']?> <small>pedidos</small></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-body">
                        <p class="d-flex justify-content-between mb-2">
                            <span class="">Valor total de pedidos</span>
                        </p>
                        <h2 class="mb-3 text-success">R$ <?=number_format($valor_pedido['total_day'],2,',','.')?></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-body">
                        <p class="d-flex justify-content-between mb-2">
                            <span class="">Entradas</span>
                        </p>
                        <h2 class="mb-3 text-success">R$ <?=number_format($total_entrada['total_day'],2,',','.')?></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-body">
                        <p class="d-flex justify-content-between mb-2">
                            <span class="">Saídas</span>
                        </p>
                        <h2 class="mb-3 text-danger">R$ <?=number_format($total_despesa['total_day'],2,',','.')?></h2>
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