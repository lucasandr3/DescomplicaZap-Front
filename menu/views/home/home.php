<!-- Content -->
<div class="content">

    <div class="page-header">
        <div class="page-title">
            <h3>Dashboard</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-body">
                        <p class="d-flex justify-content-between mb-2">
                            <span class="">Pratos Cadastrados</span>
                        </p>
                        <h2 class="mb-3"><?=$total_pratos['total']?></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-body">
                        <p class="d-flex justify-content-between mb-2">
                            <span class="">Total de pedidos</span>
                        </p>
                        <h2 class="mb-3"><?=$total_pedido['total']?></h2>
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

    <div class="row">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title mb-0">Últimos Pedidos</h6>
        </div>
        <div class="table-responsive">
            <table id="datatables" class="table table-lg">
                <thead>
                <tr>
                    <!--<th>Pedido</th>-->
                    <th>Cliente</th>
                    <th>Status</th>
                    <th>Pgto</th>
                    <th>Troco</th>
                    <th>Valor</th>
                    <th>Tax. Entrega</th>
                    <th>Data</th>
                    <th class="text-right">Ações</th>
                </tr>
                </thead>
                <tbody id="table-pedidos">
                
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <div class="row">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title mb-0">Pedidos em Preparo</h6>
        </div>
        <div class="table-responsive">
            <table id="datatables" class="table table-lg">
                <thead>
                <tr>
                    <!--<th>Pedido</th>-->
                    <th>Cliente</th>
                    <th>Status</th>
                    <th>Pgto</th>
                    <th>Troco</th>
                    <th>Valor</th>
                    <th>Tax. Entrega</th>
                    <th>Data</th>
                    <th class="text-right">Ações</th>
                </tr>
                </thead>
                <tbody id="table-pedidos-prepare">
                
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <div class="row">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title mb-0">Pedidos despachados</h6>
        </div>
        <div class="table-responsive">
            <table id="datatables" class="table table-lg">
                <thead>
                <tr>
                    <!--<th>Pedido</th>-->
                    <th>Cliente</th>
                    <th>Status</th>
                    <th>Pgto</th>
                    <th>Troco</th>
                    <th>Valor</th>
                    <th>Tax. Entrega</th>
                    <th>Data</th>
                    <th class="text-right">Ações</th>
                </tr>
                </thead>
                <tbody id="table-pedidos-despacho">
                
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h6 class="card-title mb-3">Plataforma de Acesso do Usuário</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Plataforma</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($platforms as $p) : ?>
                            <tr>
                                <td>
                                    <?php if($p['platform'] == 'mobile') : ?>
                                        <i class="fa fa-mobile"></i>
                                    <?php elseif($p['platform'] == 'tablet') : ?>
                                        <i class="fa fa-tablet"></i>
                                    <?php else : ?>
                                        <i class="fa fa-desktop"></i>
                                    <?php endif; ?>    
                                </td>
                                <td class="text-capitalize"><?=$p['platform'];?></td>
                                <td><?=$p['total_platform'];?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal-loading"></div>
    <div id="modal-pedido"></div>
    <div id="modal-pedido-impressao"></div>
</div>
<!-- ./ Content -->
