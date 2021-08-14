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
                       
                        <div style="margin-top:8px;"><h5 id="res-me">Resumo do Mês de <?=strftime('%B', strtotime('F'))?></h5></div>
                        <?php
                            $ano = date('Y'); 
                        ?>
                        <div>
                            <select class="form-control" name="mesSelect" id="mesSelectResumido" style="border: 1px solid #999;border-radius: 5px;">
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
                                <option value="<?=$ano.'-11-01'.','.$ano.'-11-30'?>"<?=(date('m') == '11')?'selected':'';?>>Novembro de <?=$ano?></option>
                                <option value="<?=$ano.'-12-01'.','.$ano.'-12-31'?>"<?=(date('m') == '12')?'selected':'';?>>Dezembro de <?=$ano?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="blockcontent">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-body">
                        <p class="d-flex justify-content-between mb-2">
                            <span class="">Total de pedidos</span>
                        </p>
                        <h2 class="mb-3"><?=$total_pedido['total']?> <small>pedidos</small></h2>
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
                        <h2 class="mb-3 text-success">R$ <?=number_format($total_entrada['total'],2,',','.')?></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-body">
                        <p class="d-flex justify-content-between mb-2">
                            <span class="">Saídas</span>
                        </p>
                        <h2 class="mb-3 text-danger">R$ <?=number_format($total_despesa['total'],2,',','.')?></h2>
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