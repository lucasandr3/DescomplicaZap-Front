
<div class="navigation">
                <!-- Logo -->
                <div class="navigation-header">
                    <a class="navigation-logo" href="<?=BASE_URL?>" style="display:flex;align-items:center;">
                        <!-- <img class="logo" src="<?=BASE_URL?>assets/media/image/logo/logo.png" alt="logo"> -->
                        <img class="logo" src="<?=BASE_URL?>assets/img/logo/fav.jpg" alt="rapha's fit" style="width:40px;height:auto;margin-right:10px;">
                        <span class="logo" style="font-size:25px;"><?=getUser()->company_name?></span>
                        <!-- <img class="dark-logo" src="<?=BASE_URL?>assets/media/image/logo/dark-logo.png" alt="dark logo"> -->
                        <!-- <img class="small-logo" src="<?=BASE_URL?>assets/img/logo/fav.jpg"
                            alt="small logo"> -->
                        <!-- <img class="small-dark-logo" src="<?=BASE_URL?>assets/media/image/logo/small-dark-logo.png"
                            alt="small dark logo"> -->
                    </a>
                    <a href="#" class="small-navigation-toggler"></a>
                    <a href="#" class="btn btn-success mobile-navigation-toggler">
                        <i class="ti-close"></i>
                    </a>
                </div>
                <!-- ./ Logo -->

                <!-- Menu wrapper -->
                <div class="navigation-menu-wrapper">
                    <!-- Menu tab -->
                    <div class="navigation-menu-tab">
                        <ul>
                            <li>
                                <a href="#" data-menu-target="#dashboards">
                                    <span class="menu-tab-icon">
                                        <i data-feather="pie-chart"></i>
                                    </span>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-menu-target="#apps">
                                    <span class="menu-tab-icon">
                                        <i class="fa fa-cutlery" style="font-size: 20px;"></i>
                                    </span>
                                    <span>Cardápio</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-menu-target="#components">
                                    <span class="menu-tab-icon">
                                        <i class="ti-receipt" style="font-size: 20px;"></i>
                                    </span>
                                    <span>Pedidos</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-menu-target="#forms">
                                    <span class="menu-tab-icon">
                                        <i class="ti-money" style="font-size:20px;"></i>
                                    </span>
                                    <span>Financeiro</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-menu-target="#plugins">
                                    <span class="menu-tab-icon">
                                        <i class="ti-time" style="font-size:20px;"></i>
                                    </span>
                                    <span>Horários</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-menu-target="#pages">
                                    <span class="menu-tab-icon">
                                        <i class="ti-location-pin" style="font-size:20px;"></i>
                                    </span>
                                    <span>Taxa Entrega</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-menu-target="#star">
                                    <span class="menu-tab-icon">
                                        <i class="ti-star" style="font-size:20px;"></i>
                                    </span>
                                    <span>Avaliações</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-menu-target="#relatorios">
                                    <span class="menu-tab-icon">
                                        <i class="ti-file" style="font-size:20px;"></i>
                                    </span>
                                    <span>Relatórios</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-menu-target="#other">
                                    <span class="menu-tab-icon">
                                        <i class="fa fa-product-hunt" style="font-size:20px;"></i>
                                    </span>
                                    <span>Perfil</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- ./ Menu tab -->

                    <!-- Menu body -->
                    <div class="navigation-menu-body">
                        <ul id="dashboards">
                            <li class="navigation-divider">Dashboard</li>
                            <li>
                                <a href="<?=BASE_URL?>"  class="<?= ($viewData['menu'] == 'home')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Início</span>
                                </a>
                            </li>
                        </ul>
                        <ul id="apps">
                            <li class="navigation-divider">Gestão do Cardápio</li>
                            <li class="">
                                <a href="<?=BASE_URL?>menu" class="<?= ($viewData['subactive'] == 'cardapio')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Cardápio</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>menu/novo_prato" class="<?= ($viewData['subactive'] == 'novoprato')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Novo Prato</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>menu/editPrato" class="<?= ($viewData['subactive'] == 'novopratoedit')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Editar Prato</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>categoria" class="<?= ($viewData['menu'] == 'categoria')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Categoria de Prato</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>adicional" class="<?= ($viewData['menu'] == 'adicional')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Adicionais de Prato</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>itens" class="<?= ($viewData['menu'] == 'item')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Itens Adicionais</span>
                                </a>
                            </li>
                        </ul>
                        <ul id="components">
                            <li class="navigation-divider">Pedidos</li>
                            <li>
                                <a href="<?=BASE_URL?>pedido" class="<?= ($viewData['menu'] == 'pedido')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Pedidos em Andamento</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>pedido/finalizados" class="<?= ($viewData['menu'] == 'pedidof')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Pedidos Finalizados</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>pedido/cancelados" class="<?= ($viewData['menu'] == 'pedidoc')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Pedidos Cancelados</span>
                                </a>
                            </li>
                        </ul>
                        <ul id="forms">
                            <li class="navigation-divider">Financeiro</li>
                            <li>
                                <a href="<?=BASE_URL?>entrada" class="<?= ($viewData['menu'] == 'entrada')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Entradas</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>entrada/recorrente" class="<?= ($viewData['menu'] == 'entrada_recorrente')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Entradas recorrentes</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>saida" class="<?= ($viewData['menu'] == 'saida')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Despesas</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>saida/recorrente" class="<?= ($viewData['menu'] == 'saida_recorrente')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Despesas recorrentes</span>
                                </a>
                            </li>
                        </ul>
                        <ul id="plugins">
                            <li class="navigation-divider">Gestão de Horários</li>
                            <li>
                                <a href="<?=BASE_URL?>schedules" class="<?= ($viewData['menu'] == 'schedules')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Horários</span>
                                </a>
                            </li>
                        </ul>
                        <ul id="pages">
                            <li class="navigation-divider">Taxa de entrega</li>
                            <li>
                                <a href="<?=BASE_URL?>delivery" class="<?= ($viewData['menu'] == 'bairros')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Bairros - (taxa de entrega)</span>
                                </a>
                            </li>
                        </ul>
                        <ul id="star">
                            <li class="navigation-divider">Avaliações</li>
                            <li style="padding:15px;">
                                <span>Funcionalidade em Desenvolvimento</span>
                            </li>
                        </ul>
                        <ul id="relatorios">
                            <li class="navigation-divider">Relatórios</li>
                            <li>
                                <a href="<?=BASE_URL?>relatorios" class="<?= ($viewData['menu'] == 'rel')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Resumido</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>relatorios/diario" class="<?= ($viewData['menu'] == 'reld')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Venda diário</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>relatorios/maisvendidos" class="<?= ($viewData['menu'] == 'resm')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Mais Vendidos</span>
                                </a>
                            </li>
                        </ul>
                        <ul id="other">
                            <li class="navigation-divider">Informações da loja</li>
                            <li>
                                <a href="<?=BASE_URL?>store" class="<?= ($viewData['menu'] == 'store')?'active': ''; ?>">
                                    <span class="fa fa-chevron-right nav-link-icon"></span>
                                    <span>Perfil da loja</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- ./ Menu body -->
                </div>
                <!-- ./ Menu wrapper -->
            </div>