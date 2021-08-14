$("#mesSelectResumido").on("change", function(){
    var mes = $(this).val().split(",");
    
    data1 = mes[0];
    data2 = mes[1];

    let ma = data1.substr(5, 2);

    $.ajax({
        type: "POST",
        url: "https://raphasfit.com.br/dashboard/ajax/datas",
        data: {data1:data1,data2:data2},
        dataType: "JSON",
        beforeSend: function() {
            $("#load").removeClass("hide");
        },
        success: function(res) {

            let data = [];

            data.push({
                entradas: res.entradas,
                despesas: res.despesas,
                tpedido: res.tpedido,
                vpedido: res.vpedido
            });

            var html = '';

            data.map((item, index) => {

                let entrada = '';
                let despesa = '';
                let valorpedido = '';

                if(item.vpedido.total_day == null) {
                    valorpedido = '0,00';
                } else {
                    valorpedido = item.vpedido.total_day;
                }

                if(item.entradas.total == null) {
                    entrada = '0,00';
                } else {
                    entrada = item.entradas.total;
                }

                if(item.despesas.total == null) {
                    despesa = '0,00';
                } else {
                    despesa = item.despesas.total;
                }

                let moedaEntrada = parseInt(entrada);
                let moedaDespesa = parseInt(despesa);
                let moedaVpedido = parseInt(valorpedido);

                html += `
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-body">
                        <p class="d-flex justify-content-between mb-2">
                            <span class="">Total de pedidos</span>
                        </p>
                        <h2 class="mb-3">${item.tpedido.total} <small>pedidos</small></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-body">
                        <p class="d-flex justify-content-between mb-2">
                            <span class="">Valor total de pedidos</span>
                        </p>
                        <h2 class="mb-3 text-success">${(moedaVpedido).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-body">
                        <p class="d-flex justify-content-between mb-2">
                            <span class="">Entradas</span>
                        </p>
                        <h2 class="mb-3 text-success">${(moedaEntrada).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-body">
                        <p class="d-flex justify-content-between mb-2">
                            <span class="">Saídas</span>
                        </p>
                        <h2 class="mb-3 text-danger">${(moedaDespesa).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</h2>
                    </div>
                </div>
                `;
            $('#blockcontent').html(html);
            $('#res-me').html(`Resumo do Mês de ${moment(ma).format('MMMM')}`);
            });

            $('#blockcontent').html(html);
            $("#load").addClass("hide");
        },
        error: function(res) {
            console.log('deu errado');
        }
    });
});

function diario() {

    let data = document.querySelector('#inpi-data-rel').value;

    $.ajax({
        type: "POST",
        url: "https://raphasfit.com.br/dashboard/ajax/diario",
        data: {data:data},
        dataType: "json"
    }).then(function(res){

        let vpedidos = '';
        if (res.valor_pedidos.total_pedidos == null) {
            vpedidos = 'R$ 0,00';
        } else {
            vpedidos = parseInt(res.valor_pedidos.total_pedidos);
        }

        let entradas = '';
        if(res.entrada.total_entrada == null) {
            entradas = 'R$ 0,00';
        } else {
            entradas = parseInt(res.entrada.total_entrada);
        }

        let despesa = '';
        if (res.despesa.total_despesa == null) { 
            despesa = 'R$ 0,00';
        } else {
            despesa = parseInt(res.despesa.total_despesa);
        }

        let vdia = `
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card card-body">
                    <p class="d-flex justify-content-between mb-2">
                        <span class="">Total de pedidos</span>
                    </p>
                    <h2 class="mb-3">${res.pedidos.total_pedidos} <small>pedidos</small></h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card card-body">
                    <p class="d-flex justify-content-between mb-2">
                        <span class="">Valor Total dos pedidos</span>
                    </p>
                    <h2 class="mb-3 text-success">${(vpedidos).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card card-body">
                    <p class="d-flex justify-content-between mb-2">
                        <span class="">Entradas</span>
                    </p>
                    <h2 class="mb-3 text-success">${(entradas).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card card-body">
                    <p class="d-flex justify-content-between mb-2">
                        <span class="">Despesas</span>
                    </p>
                    <h2 class="mb-3 text-danger">${(despesa).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</h2>
                </div>
            </div>
        `;

        $('#block-v-dia').html(vdia);
        $('#v-dia').html(`Vendas do dia - ${moment(data).format('DD/MM/YYYY')}`);
       
    });
      
}

function semanal() {
    
    let data = document.querySelector('#inpi-data-sem').value;

    console.log(data)
}

function dadosIniciaisReceitas() {

    var d_ini = dt_inicial;
    var d_fin = dt_final;
    
    $.ajax({
        type: "POST",
        url: "/rapha/dashboard/receitas/datas",
        data: {d_ini:d_ini,d_fin:d_fin},
        dataType: "JSON",
        beforeSend: function() {
            $("#load").removeClass("hide");
        },
        success: function(res) {

            var html = '';

            res.map((item, index) => {

                var moeda = parseInt(item.valor);

                html += '<tr>'+
                '<td class="text-capitalize">'+item.descricao+'</td>'+
                '<td class="text-green">'+
                '<strong>'+(moeda).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })+'</strong>'+
                '</td>'+
                '<td>'+moment(item.data_d).format("DD/MM/YYYY")+'</td>'+
                '<td>'+
                '<img src="https://raphasfit.com.br/dashboard/assets/img/cat/as.png"'+ 
                'style="width:18px;border-radius:30px;">'+' '+item.nome+'</td>'+
                '<td>'+item.conta+'</td>'+
            '</tr>';
            $('#bodytable').html(html);
            });

            $('#bodytable').html(html);
            $("#load").addClass("hide");
        },
        error: function(res) {
            console.log('deu errado');
        }
    });
}