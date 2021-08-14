$("#mesSelect").on("change", function(){
    var mes = $(this).val().split(",");

    data1 = mes[0];
    data2 = mes[1]; 

    let ma = data1.substr(5, 2);

    $.ajax({
        type: "POST",
        url: "https://raphasfit.com.br/dashboard/ajax/datasEntrada",
        data: {data1:data1,data2:data2},
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
                '<td class="text-success">'+
                '<strong>'+(moeda).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })+'</strong>'+
                '</td>'+
                '<td>'+moment(item.data_d).format("DD/MM/YYYY")+'</td>'+
                '<td>'+
                '<img src="https://raphasfit.com.br/dashboard/assets/img/cat/ali.png"'+ 
                'style="width:18px;border-radius:30px;">'+' '+item.nome+'</td>'+
                '<td>'+item.conta+'</td>'+
            '</tr>';
            $('#bodytabled').html(html);
            $('#en-mes').html(`Entradas do Mês de ${moment(ma).format('MMMM')}`);
            });
            $('#en-mes').html(`Entradas do Mês de ${moment(ma).format('MMMM')}`);
            $('#bodytabled').html(html);
            $("#load").addClass("hide");
        },
        error: function(res) {
            console.log('deu errado');
        }
    });
});

function dadosIniciaisReceitas() {

    var d_ini = dt_inicial;
    var d_fin = dt_final;
    
    $.ajax({
        type: "POST",
        url: "/financeiro/receitas/datas",
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

const receitaHome = document.querySelector('#addReceitaHome');

receitaHome.addEventListener('click', (e) => {

    e.preventDefault();
    let descricao = document.querySelector('#desc-home').value;
    let valor     = document.querySelector('#val-home').value;
    let data_d    = document.querySelector('#data-home').value;
    let conta     = document.querySelector('#conta-home').value;
    let id_cat    = document.querySelector('#cat-home').value;
    

    $.ajax({
        type: "POST",
        url: "https://raphasfit.com.br/dashboard/entrada/entradabalcao",
        data: {
            descricao,
            valor,
            data_d,
            conta,
            id_cat
        },
        dataType: "JSON",
        beforeSend: function() {
            document.querySelector('#title-atual-home').style.display = "none";
            document.querySelector('#title-loading-home').style.display = "flex";
        },
        success: function(res) {

           if (res.code == 0) {
            
            document.querySelector('#title-atual-home').style.display = "block";
            document.querySelector('#title-loading-home').style.display = "none";
            document.querySelector('#msg-entrada-home').innerHTML = `<div class="alert alert-success" role="alert">${res.msg}</div>`;
            receitaHome.style.display = "none";


           } else {
                document.querySelector('#msg-entrada-home').innerHTML = `<div class="alert alert-danger" role="alert">${res.msg}</div>`;
           }

        }
    });
    
});

const fechaEntrada = document.querySelector('#close-entrada');

fechaEntrada.addEventListener('click', (e) => {

    document.location.reload(true)
});

