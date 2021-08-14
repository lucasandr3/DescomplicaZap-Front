<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="http://localhost/mixpdv/public/logo/logo.png" />
    <title><?=$viewData['title'];?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=BASE_URL?>assets/img/logo/fav.jpg" />

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?=BASE_URL?>assets/pdv/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?=BASE_URL?>assets/pdv/css/bootstrap-select.min.css" type="text/css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?=BASE_URL?>assets/pdv/css/font-awesome.min.css" type="text/css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,500,700">

    <link rel="stylesheet" href="http://localhost/mixpdv/public/css/style.default.css" id="theme-stylesheet"
        type="text/css">
    <link rel="stylesheet" href="http://localhost/mixpdv/public/css/dropzone.css">
    <link rel="stylesheet" href="http://localhost/mixpdv/public/css/style.css">
    <style>
        .pdv-list-prods {
            background-color: #fff;
            border: 1px solid #9999;
            border-radius: 5px;
            padding: 1px;
            margin: 10px;
            cursor: pointer;
        }
        .pdv-img-prod {
            width: 100%;
            border-radius: 5px;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
        }
        .pdv-list-prods:hover {
            opacity: 0.7;
            box-shadow: 1px 2px 7px 0px #999;
        }
        .pdv-title-prod {
            color: #555;
            letter-spacing: 1px;
        }
        .pdv-price-prod {
            color: #555;
            font-weight: bold;
        }
        .pdv-area-cat {
            background-color: #4CAF50;
            border-radius: 5px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }
        .pdv-area-cat p {
            color: #fff;
            margin: 0;
        }
        .form-order {
            width: 30px;
            text-align: center;
            outline: 0;
        }
        .form-qt-order {
            display: flex;
        }
        .btn-menos {
            border: none;
            background-color: #ddd;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            width: 30px;
        }
        .btn-mais {
            border: none;
            background-color: #ddd;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            width: 30px;
        }
    </style>

    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?=BASE_URL?>assets/pdv/css/custom-default.css" type="text/css"
        id="custom-style">
</head>
<body >

    <div class="pos-page">

        <div id="content" class="animate-bottom">
            
            <div class="alert alert-danger" style="text-align:center;">
                Página ponto de venda em construção, em breve estará disponível. 
            </div>

            <section class="forms pos-section">
                <div class="container-fluid">
                    <div class="row">
                        <audio id="mysoundclip1" preload="auto">
                            <source src="http://localhost/mixpdv/public/beep/beep-timber.mp3">
                            </source>
                        </audio>
                        <audio id="mysoundclip2" preload="auto">
                            <source src="http://localhost/mixpdv/public/beep/beep-07.mp3">
                            </source>
                        </audio>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body" style="padding-bottom: 0;padding:2px 25px;">
                                    <form method="POST" action="http://localhost/mixpdv/sales" accept-charset="UTF-8"
                                        class="payment-form" enctype="multipart/form-data"><input name="_token"
                                            type="hidden" value="s7WlK3AgVt7wGQXI9gv1Bi6BIuhNV11ZbdVO00Bu">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <select required id="pdv-entrega" name="biller_id"
                                                                class="selectpicker form-control" data-live-search="true"
                                                                data-live-search-style="begins"
                                                                title="Entrega / Retirada..."
                                                                onChange="mostraBairros(this.value)">
                                                                <option value="retirada" selected>Retirada (balcão)</option>
                                                                <option value="entrega">Entrega</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="display:none;" id="pdv-bairros">
                                                        <div class="form-group">
                                                            <input type="hidden" name="biller_id_hidden" value="1">
                                                            <select required id="biller_id" name="biller_id"
                                                                class="selectpicker form-control" data-live-search="true"
                                                                data-live-search-style="begins"
                                                                title="Escolha o Bairro..."
                                                                onChange="defineBairro(this.value)">
                                                                <?php foreach($bairros as $bairro): ?>
                                                                <option value="<?=$bairro['nome_bairro']?>;<?=$bairro['taxa_entrega']?>"><?=$bairro['nome_bairro']?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="hidden" name="customer_id_hidden" value="1">
                                                            <div class="input-group pos">
                                                                <select required name="customer_id" id="customer_id"
                                                                    class="selectpicker form-control" data-live-search="true"
                                                                    data-live-search-style="begins"
                                                                    title="Escolha o Cliente..." style="width: 100px">
                                                                    <option value="1">Cliente Padrão (000001)</option>
                                                                    <option value="2">Mesa 01 (000001)</option>
                                                                    <option value="3">Mesa 02 (000002)</option>
                                                                    <option value="4">Mesa 03 (000003)</option>
                                                                    <option value="5">Mesa 04 (000004)</option>
                                                                    <option value="6">Mesa 05 (000005)</option>
                                                                    <option value="7">Mesa 06 (000006)</option>
                                                                    <option value="8">Mesa 07 (000007)</option>
                                                                    <option value="9">Mesa 08 (000008)</option>
                                                                    <option value="10">Mesa 09 (000009)</option>
                                                                    <option value="11">Mesa 10 (000010)</option>
                                                                </select>
                                                                <button type="button" class="btn btn-default btn-sm"
                                                                    data-toggle="modal" data-target="#addCustomer"><i
                                                                        class="fa fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="search-box form-group">
                                                            <input type="text" name="product_code_name"
                                                                onkeyup="searchProd(this.value)"
                                                                placeholder="Digitalizar / pesquisar produto por nome / código"
                                                                class="form-control" autofocus />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="table-responsive transaction-list">
                                                        <table id="myTable"
                                                            class="table table-hover table-striped order-list table-fixed">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-sm-4">Produtos</th>
                                                                    <th class="col-sm-2">Preço</th>
                                                                    <th class="col-sm-3">Quantidade</th>
                                                                    <th class="col-sm-3">Subtotal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="body-order">
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row" style="display: none;">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="hidden" name="total_qty" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="hidden" name="total_discount" value="0.00" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="hidden" name="total_tax" value="0.00" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="hidden" name="total_price" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="hidden" name="item" />
                                                            <input type="hidden" name="order_tax" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="hidden" name="grand_total" />
                                                            <input type="hidden" name="coupon_discount" />
                                                            <input type="hidden" name="sale_status" value="1" />
                                                            <input type="hidden" name="coupon_active">
                                                            <input type="hidden" name="coupon_id">
                                                            <input type="hidden" name="coupon_discount" />

                                                            <input type="hidden" name="pos" value="1" />
                                                            <input type="hidden" name="draft" value="0" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 totals"
                                                    style="border-top: 2px solid #e4e6fc; padding-top: 10px;">
                                                    <div class="row">
                                                        
                                                        <div class="col-sm-6">
                                                            <span class="totals-title">SubTotal</span><span
                                                                id="subtotal">R$ 0,00</span>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <span class="totals-title">Entrega</span><span
                                                                id="pdv-subtotal">R$ 0,00</span>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="payment-amount">
                                    <h2 style="color:#555;">Total <span id="grand-total">0,00</span></h2>
                                </div>
                                <div class="payment-options">
                                    <div class="column-5">
                                        <button style="background: #4CAF50" type="button"
                                            class="btn btn-custom payment-btn" data-toggle="modal"
                                            data-target="#add-payment">
                                            <i class="fa fa-thumbs-up"></i> Finalizar Venda
                                        </button>
                                    </div>
  
                                    <div class="column-5">
                                        <button style="background-color: #d63031;" type="button" class="btn btn-custom"
                                            id="cancel-btn" onclick="return confirmCancel()">
                                            <i class="fa fa-thumbs-down"></i>
                                            Cancelar Venda</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- payment modal -->
                        <div id="add-payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="exampleModalLabel" class="modal-title">Finalizar venda</h5>
                                        <button type="button" data-dismiss="modal" aria-label="Close"
                                            class="close"><span aria-hidden="true"><i
                                                    class="dripicons-cross"></i></span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6 mt-1">
                                                        <label>Quantidade recebida *</label>
                                                        <input type="text" name="paying_amount"
                                                            class="form-control numkey" required step="any">
                                                    </div>
                                                    <div class="col-md-6 mt-1">
                                                        <label>Quantia Pagante *</label>
                                                        <input type="text" name="paid_amount"
                                                            class="form-control numkey" step="any">
                                                    </div>
                                                    <div class="col-md-6 mt-1">
                                                        <label>mudança : </label>
                                                        <p id="change" class="ml-2">0.00</p>
                                                    </div>
                                                    <div class="col-md-6 mt-1">
                                                        <input type="hidden" name="paid_by_id">
                                                        <label>Pago pelo</label>
                                                        <select name="paid_by_id_select"
                                                            class="form-control selectpicker">
                                                            <option value="1">Dinheiro</option>

                                                            <option value="3">Cartão</option>



                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12 mt-3">
                                                        <div class="card-element form-control">
                                                        </div>
                                                        <div class="card-errors" role="alert"></div>
                                                    </div>
                                                    <div class="form-group col-md-12 gift-card">
                                                        <label> Cartão Presente *</label>
                                                        <input type="hidden" name="gift_card_id">
                                                        <select id="gift_card_id_select" name="gift_card_id_select"
                                                            class="selectpicker form-control" data-live-search="true"
                                                            data-live-search-style="begins"
                                                            title="Select Gift Card..."></select>
                                                    </div>
                                                    <div class="form-group col-md-12 cheque">
                                                        <label>Número de verificação *</label>
                                                        <input type="text" name="cheque_no" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Nota de pagamento</label>
                                                        <textarea id="payment_note" rows="2" class="form-control"
                                                            name="payment_note"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label>Nota de venda</label>
                                                        <textarea rows="3" class="form-control"
                                                            name="sale_note"></textarea>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label>Nota da equipe</label>
                                                        <textarea rows="3" class="form-control"
                                                            name="staff_note"></textarea>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <button id="submit-btn" type="submit"
                                                        class="btn btn-primary">Salvar</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2 qc" data-initial="1">
                                                <h4><strong>Dinheiro rápido</strong></h4>
                                                <button class="btn btn-block btn-primary qc-btn sound-btn"
                                                    data-amount="10" type="button">10</button>
                                                <button class="btn btn-block btn-primary qc-btn sound-btn"
                                                    data-amount="20" type="button">20</button>
                                                <button class="btn btn-block btn-primary qc-btn sound-btn"
                                                    data-amount="50" type="button">50</button>
                                                <button class="btn btn-block btn-primary qc-btn sound-btn"
                                                    data-amount="100" type="button">100</button>
                                                <button class="btn btn-block btn-primary qc-btn sound-btn"
                                                    data-amount="500" type="button">500</button>
                                                <button class="btn btn-block btn-primary qc-btn sound-btn"
                                                    data-amount="1000" type="button">1000</button>
                                                <button class="btn btn-block btn-danger qc-btn sound-btn"
                                                    data-amount="0" type="button">Claro</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- order_discount modal -->
                        <div id="order-discount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Desconto de encomenda</h5>
                                        <button type="button" data-dismiss="modal" aria-label="Close"
                                            class="close"><span aria-hidden="true"><i
                                                    class="dripicons-cross"></i></span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" name="order_discount" class="form-control numkey">
                                        </div>
                                        <button type="button" name="order_discount_btn" class="btn btn-primary"
                                            data-dismiss="modal">Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- coupon modal -->
                        <div id="coupon-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Código do cupom</h5>
                                        <button type="button" data-dismiss="modal" aria-label="Close"
                                            class="close"><span aria-hidden="true"><i
                                                    class="dripicons-cross"></i></span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" id="coupon-code" class="form-control"
                                                placeholder="Type Coupon Code...">
                                        </div>
                                        <button type="button" class="btn btn-primary coupon-check"
                                            data-dismiss="modal">Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- order_tax modal -->
                        <div id="order-tax" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Order Tax</h5>
                                        <button type="button" data-dismiss="modal" aria-label="Close"
                                            class="close"><span aria-hidden="true"><i
                                                    class="dripicons-cross"></i></span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" name="order_tax_rate">
                                            <select class="form-control" name="order_tax_rate_select">
                                                <option value="0">No Tax</option>
                                                <option value="3.5">Cartão Loja</option>
                                                <option value="4">Cartão Fornecedor</option>
                                            </select>
                                        </div>
                                        <button type="button" name="order_tax_btn" class="btn btn-primary"
                                            data-dismiss="modal">Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shipping_cost modal -->
                        <div id="shipping-cost-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Frete</h5>
                                        <button type="button" data-dismiss="modal" aria-label="Close"
                                            class="close"><span aria-hidden="true"><i
                                                    class="dripicons-cross"></i></span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" name="shipping_cost" class="form-control numkey"
                                                step="any">
                                        </div>
                                        <button type="button" name="shipping_cost_btn" class="btn btn-primary"
                                            data-dismiss="modal">Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </form>
                        <!-- product list -->
                        <div class="col-md-6">
                            <!-- navbar-->
                            
                            <div class="filter-window">
                                <div class="category mt-3">
                                    <div class="row ml-2 mr-2 px-2">
                                        <div class="col-7">Escolha a Categoria</div>
                                        <div class="col-5 text-right">
                                            <span class="btn btn-default btn-sm">
                                                <i class="dripicons-cross"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row ml-2 mt-3">
                                        <div class="col-md-3 category-img text-center" data-category="1">
                                            <img src="http://localhost/mixpdv/public/images/product/zummXD2dvAtI.png" />
                                            <p class="text-center">Tijelas</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="brand mt-3">
                                    <div class="row ml-2 mr-2 px-2">
                                        <div class="col-7">Escolha a Marca</div>
                                        <div class="col-5 text-right">
                                            <span class="btn btn-default btn-sm">
                                                <i class="dripicons-cross"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row ml-2 mt-3">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-block btn-primary" style="background-color:#4CAF50;border-color:#4CAF50;" id="category-filter-dia">Diário</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-block btn-primary" style="background-color:#4CAF50;border-color:#4CAF50;" id="category-filter-sem">Semanal</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-block btn-primary" style="background-color:#4CAF50;border-color:#4CAF50;" id="category-filter-com">Combos</button>
                                </div>
                                <div class="col-md-12 mt-1 table-container" style="text-align: center;">
                                    
                                    <div id="prods-no-search">
                                        <div style="display: grid;grid-template-columns: 1fr 1fr 1fr;" id="cat-diario">
                                            <?php foreach($produtos as $produto): ?> 
                                                <?php $dia = strftime('%A', strtotime('today')); ?>
                                                <?php if($produto['dia'] == '1' && $produto['category'] == ucfirst($dia).' Feira'): ?>
                                                    <div class="pdv-list-prods" onclick="addToCart('<?=$produto['id_product']?>')">
                                                        <div class="pdv-area-cat">
                                                            <p><?=$produto['category'];?></p>
                                                        </div>
                                                        <div>
                                                            <img src="<?=BASE_URL?><?=$produto['image'];?>" class="pdv-img-prod">
                                                        </div>
                                                        <div class="pdv-title-prod">
                                                            <?=$produto['name_product'];?>
                                                        </div>
                                                        <div class="pdv-price-prod">
                                                            R$ <?=number_format($produto['actual_price'],2,',','.');?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>    
                                            <?php endforeach; ?>
                                        </div>

                                        <div style="display: grid;grid-template-columns: 1fr 1fr 1fr;" id="cat-semanal">
                                            <?php foreach($produtos as $produto): ?>
                                                <?php if($produto['dia'] == '0' && $produto['status'] == '0'): ?>
                                                    <div class="pdv-list-prods" onclick="addToCart('<?=$produto['id_product']?>')">
                                                        <div class="pdv-area-cat">
                                                            <p><?=$produto['category'];?></p>
                                                        </div>
                                                        <div>
                                                            <img src="<?=BASE_URL?><?=$produto['image'];?>" class="pdv-img-prod">
                                                        </div>
                                                        <div class="pdv-title-prod">
                                                            <?=$produto['name_product'];?>
                                                        </div>
                                                        <div class="pdv-price-prod">
                                                            R$ <?=number_format($produto['actual_price'],2,',','.');?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>    
                                            <?php endforeach; ?>
                                        </div>
                                        

                                        <div style="display: grid;grid-template-columns: 1fr 1fr 1fr;" id="cat-combos">
                                            <?php foreach($produtos as $produto): ?>
                                                <?php if($produto['dia'] == '3'): ?>
                                                    <div class="pdv-list-prods" onclick="addToCart('<?=$produto['id_product']?>')">
                                                        <div class="pdv-area-cat">
                                                            <p><?=$produto['category'];?></p>
                                                        </div>
                                                        <div>
                                                            <img src="<?=BASE_URL?><?=$produto['image'];?>" class="pdv-img-prod">
                                                        </div>
                                                        <div class="pdv-title-prod">
                                                            <?=$produto['name_product'];?>
                                                        </div>
                                                        <div class="pdv-price-prod">
                                                            R$ <?=number_format($produto['actual_price'],2,',','.');?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>    
                                            <?php endforeach; ?>
                                        </div>                           
                                    </div>
                                    <div>
                                    <div id="prods-search" style="display: grid;grid-template-columns: 1fr 1fr 1fr;">
                                        
                                    </div>    
                                    </div>           

                                </div>
                            </div>
                        </div>
                        <!-- product edit modal -->
                        <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="modal_header" class="modal-title"></h5>
                                        <button type="button" data-dismiss="modal" aria-label="Close"
                                            class="close"><span aria-hidden="true"><i
                                                    class="dripicons-cross"></i></span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label>Quantidade</label>
                                                <input type="text" name="edit_qty" class="form-control numkey">
                                            </div>
                                            <div class="form-group">
                                                <label>Desconto unitário</label>
                                                <input type="text" name="edit_discount" class="form-control numkey">
                                            </div>
                                            <div class="form-group">
                                                <label>Preço unitário</label>
                                                <input type="text" name="edit_unit_price" class="form-control numkey"
                                                    step="any">
                                            </div>
                                            <div class="form-group">
                                                <label>Taxa de imposto</label>
                                                <select name="edit_tax_rate" class="form-control selectpicker">
                                                    <option value="0">No Tax</option>
                                                    <option value="1">Cartão Loja</option>
                                                    <option value="2">Cartão Fornecedor</option>
                                                </select>
                                            </div>
                                            <div id="edit_unit" class="form-group">
                                                <label>Unidade de produto</label>
                                                <select name="edit_unit" class="form-control selectpicker">
                                                </select>
                                            </div>
                                            <button type="button" name="update_btn"
                                                class="btn btn-primary">Atualizar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- add customer modal -->
                        <div id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="http://localhost/mixpdv/customer" accept-charset="UTF-8"
                                        enctype="multipart/form-data"><input name="_token" type="hidden"
                                            value="s7WlK3AgVt7wGQXI9gv1Bi6BIuhNV11ZbdVO00Bu">
                                        <div class="modal-header">
                                            <h5 id="exampleModalLabel" class="modal-title">Adicionar cliente</h5>
                                            <button type="button" data-dismiss="modal" aria-label="Close"
                                                class="close"><span aria-hidden="true"><i
                                                        class="dripicons-cross"></i></span></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="italic"><small>Os campos marcados com (*) são campos de entrada
                                                    obrigatórios.</small></p>
                                            <div class="form-group">
                                                <label>Grupo de clientes *</strong> </label>
                                                <select required class="form-control selectpicker"
                                                    name="customer_group_id">
                                                    <option value="1">Loja</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nome *</strong> </label>
                                                <input type="text" name="name" required class="form-control"
                                                    placeholder="Digite o nome do cliente">
                                            </div>
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="text" name="email" placeholder="exemplo@exemplo.com"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Número de telefone *</label>
                                                <input type="text" name="phone_number" required class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Endereço *</label>
                                                <input type="text" name="address" required class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Cidade *</label>
                                                <input type="text" name="city" required class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="pos" value="1">
                                                <input type="submit" value="Salvar" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- recent transaction modal -->
                        <div id="recentTransaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="exampleModalLabel" class="modal-title">Transação Recentes <div
                                                class="badge badge-primary">Mais recentes 10</div>
                                        </h5>
                                        <button type="button" data-dismiss="modal" aria-label="Close"
                                            class="close"><span aria-hidden="true"><i
                                                    class="dripicons-cross"></i></span></button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#sale-latest" role="tab"
                                                    data-toggle="tab">Venda</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#draft-latest" role="tab"
                                                    data-toggle="tab">Mesas</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane show active" id="sale-latest">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Data</th>
                                                                <th>Referência</th>
                                                                <th>Cliente</th>
                                                                <th>Total</th>
                                                                <th>Açao</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>05-12-2020</td>
                                                                <td>posr-20201205-010706</td>
                                                                <td>Cliente Padrão</td>
                                                                <td>R$ 120,00</td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="http://localhost/mixpdv/sales/10/edit"
                                                                            class="btn btn-success btn-sm"
                                                                            title="Edit"><i
                                                                                class="dripicons-document-edit"></i></a>&nbsp;
                                                                        <form method="POST"
                                                                            action="http://localhost/mixpdv/sales/10"
                                                                            accept-charset="UTF-8"><input name="_method"
                                                                                type="hidden" value="DELETE"><input
                                                                                name="_token" type="hidden"
                                                                                value="s7WlK3AgVt7wGQXI9gv1Bi6BIuhNV11ZbdVO00Bu">
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="return confirmDelete()"
                                                                                title="Delete"><i
                                                                                    class="dripicons-trash"></i></button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>05-12-2020</td>
                                                                <td>posr-20201205-010624</td>
                                                                <td>Cliente Padrão</td>
                                                                <td>R$ 120,00</td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="http://localhost/mixpdv/sales/9/edit"
                                                                            class="btn btn-success btn-sm"
                                                                            title="Edit"><i
                                                                                class="dripicons-document-edit"></i></a>&nbsp;
                                                                        <form method="POST"
                                                                            action="http://localhost/mixpdv/sales/9"
                                                                            accept-charset="UTF-8"><input name="_method"
                                                                                type="hidden" value="DELETE"><input
                                                                                name="_token" type="hidden"
                                                                                value="s7WlK3AgVt7wGQXI9gv1Bi6BIuhNV11ZbdVO00Bu">
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="return confirmDelete()"
                                                                                title="Delete"><i
                                                                                    class="dripicons-trash"></i></button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>05-12-2020</td>
                                                                <td>posr-20201205-123006</td>
                                                                <td>Cliente Padrão</td>
                                                                <td>R$ 120,00</td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="http://localhost/mixpdv/sales/8/edit"
                                                                            class="btn btn-success btn-sm"
                                                                            title="Edit"><i
                                                                                class="dripicons-document-edit"></i></a>&nbsp;
                                                                        <form method="POST"
                                                                            action="http://localhost/mixpdv/sales/8"
                                                                            accept-charset="UTF-8"><input name="_method"
                                                                                type="hidden" value="DELETE"><input
                                                                                name="_token" type="hidden"
                                                                                value="s7WlK3AgVt7wGQXI9gv1Bi6BIuhNV11ZbdVO00Bu">
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="return confirmDelete()"
                                                                                title="Delete"><i
                                                                                    class="dripicons-trash"></i></button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>04-12-2020</td>
                                                                <td>posr-20201204-025255</td>
                                                                <td>Cliente Padrão</td>
                                                                <td>R$ 120,00</td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="http://localhost/mixpdv/sales/7/edit"
                                                                            class="btn btn-success btn-sm"
                                                                            title="Edit"><i
                                                                                class="dripicons-document-edit"></i></a>&nbsp;
                                                                        <form method="POST"
                                                                            action="http://localhost/mixpdv/sales/7"
                                                                            accept-charset="UTF-8"><input name="_method"
                                                                                type="hidden" value="DELETE"><input
                                                                                name="_token" type="hidden"
                                                                                value="s7WlK3AgVt7wGQXI9gv1Bi6BIuhNV11ZbdVO00Bu">
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="return confirmDelete()"
                                                                                title="Delete"><i
                                                                                    class="dripicons-trash"></i></button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>04-12-2020</td>
                                                                <td>posr-20201204-025146</td>
                                                                <td>Cliente Padrão</td>
                                                                <td>R$ 120,00</td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="http://localhost/mixpdv/sales/6/edit"
                                                                            class="btn btn-success btn-sm"
                                                                            title="Edit"><i
                                                                                class="dripicons-document-edit"></i></a>&nbsp;
                                                                        <form method="POST"
                                                                            action="http://localhost/mixpdv/sales/6"
                                                                            accept-charset="UTF-8"><input name="_method"
                                                                                type="hidden" value="DELETE"><input
                                                                                name="_token" type="hidden"
                                                                                value="s7WlK3AgVt7wGQXI9gv1Bi6BIuhNV11ZbdVO00Bu">
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="return confirmDelete()"
                                                                                title="Delete"><i
                                                                                    class="dripicons-trash"></i></button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>04-12-2020</td>
                                                                <td>posr-20201204-025120</td>
                                                                <td>Cliente Padrão</td>
                                                                <td>R$ 120,00</td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="http://localhost/mixpdv/sales/5/edit"
                                                                            class="btn btn-success btn-sm"
                                                                            title="Edit"><i
                                                                                class="dripicons-document-edit"></i></a>&nbsp;
                                                                        <form method="POST"
                                                                            action="http://localhost/mixpdv/sales/5"
                                                                            accept-charset="UTF-8"><input name="_method"
                                                                                type="hidden" value="DELETE"><input
                                                                                name="_token" type="hidden"
                                                                                value="s7WlK3AgVt7wGQXI9gv1Bi6BIuhNV11ZbdVO00Bu">
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="return confirmDelete()"
                                                                                title="Delete"><i
                                                                                    class="dripicons-trash"></i></button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>21-09-2020</td>
                                                                <td>posr-20200921-043314</td>
                                                                <td>Mesa 01</td>
                                                                <td>R$ 45,00</td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="http://localhost/mixpdv/sales/2/edit"
                                                                            class="btn btn-success btn-sm"
                                                                            title="Edit"><i
                                                                                class="dripicons-document-edit"></i></a>&nbsp;
                                                                        <form method="POST"
                                                                            action="http://localhost/mixpdv/sales/2"
                                                                            accept-charset="UTF-8"><input name="_method"
                                                                                type="hidden" value="DELETE"><input
                                                                                name="_token" type="hidden"
                                                                                value="s7WlK3AgVt7wGQXI9gv1Bi6BIuhNV11ZbdVO00Bu">
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="return confirmDelete()"
                                                                                title="Delete"><i
                                                                                    class="dripicons-trash"></i></button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="draft-latest">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Data</th>
                                                                <th>Referência</th>
                                                                <th>Mesa</th>
                                                                <th>Total</th>
                                                                <th>Açao</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>21-09-2020</td>
                                                                <td>posr-20200921-055006</td>
                                                                <td>Cliente Padrão</td>
                                                                <td>R$ 60,00</td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="http://localhost/mixpdv/sales/4/create"
                                                                            class="btn btn-success btn-sm"
                                                                            title="Edit"><i
                                                                                class="dripicons-document-edit"></i></a>&nbsp;
                                                                        <form method="POST"
                                                                            action="http://localhost/mixpdv/sales/4"
                                                                            accept-charset="UTF-8"><input name="_method"
                                                                                type="hidden" value="DELETE"><input
                                                                                name="_token" type="hidden"
                                                                                value="s7WlK3AgVt7wGQXI9gv1Bi6BIuhNV11ZbdVO00Bu">
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="return confirmDelete()"
                                                                                title="Delete"><i
                                                                                    class="dripicons-trash"></i></button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>21-09-2020</td>
                                                                <td>posr-20200921-044303</td>
                                                                <td>Cliente Padrão</td>
                                                                <td>R$ 15,00</td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="http://localhost/mixpdv/sales/3/create"
                                                                            class="btn btn-success btn-sm"
                                                                            title="Edit"><i
                                                                                class="dripicons-document-edit"></i></a>&nbsp;
                                                                        <form method="POST"
                                                                            action="http://localhost/mixpdv/sales/3"
                                                                            accept-charset="UTF-8"><input name="_method"
                                                                                type="hidden" value="DELETE"><input
                                                                                name="_token" type="hidden"
                                                                                value="s7WlK3AgVt7wGQXI9gv1Bi6BIuhNV11ZbdVO00Bu">
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="return confirmDelete()"
                                                                                title="Delete"><i
                                                                                    class="dripicons-trash"></i></button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        </div>
    </div>
    <script type="text/javascript" src="<?=BASE_URL?>assets/pdv/js/jquery.min.js"></script>   
    <script type="text/javascript" src="http://localhost/mixpdv/public/vendor/popper.js/umd/popper.min.js"></script>
    <script type="text/javascript" src="http://localhost/mixpdv/public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://localhost/mixpdv/public/vendor/bootstrap/js/bootstrap-select.min.js"></script>
    <script src="<?=BASE_URL?>assets/pdv/js/functions.js"></script>
</body>

</html>