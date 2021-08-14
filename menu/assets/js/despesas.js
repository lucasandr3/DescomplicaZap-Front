$("#mesDesSelect").on("change", function(){
    var mes = $(this).val().split(",");

    data1 = mes[0];
    data2 = mes[1];

    let ma = data1.substr(5, 2);

    $.ajax({
        type: "POST",
        url: "https://raphasfit.com.br/dashboard/ajax/datasSaida",
        data: {data1:data1,data2:data2},
        dataType: "JSON",
        beforeSend: function() {
            // document.querySelector("#loadd").style.display = "block";
        },
        success: function(res) {

            var html = '';

            res.map((item, index) => {

                var moeda = parseInt(item.valor);

                html += '<tr>'+
                '<td class="text-capitalize">'+item.descricao+'</td>'+
                '<td class="text-danger">'+
                '<strong>'+(moeda).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })+'</strong>'+
                '</td>'+
                '<td>'+moment(item.data_d).format("DD/MM/YYYY")+'</td>'+
                '<td>'+
                '<img src="https://raphasfit.com.br/dashboard/assets/img/cat/ali.png"'+ 
                'style="width:18px;border-radius:30px;">'+' '+item.nome+'</td>'+
                '<td>'+item.conta+'</td>'+
            '</tr>';
            $('#bodytabled').html(html);
            $('#en-mes-s').html(`Entradas do Mês de ${moment(ma).format('MMMM')}`);
            });
            $('#en-mes-s').html(`Entradas do Mês de ${moment(ma).format('MMMM')}`);
            $('#bodytabled').html(html);
            // document.querySelector("#loadd").style.display = "none";
        },
        error: function(res) {
            console.log('deu errado');
        }
    });
});

function dadosIniciaisDespesas() {

    var d_ini = dt_inicial;
    var d_fin = dt_final;
    
    $.ajax({
        type: "POST",
        url: "/financeiro/despesas/datas",
        data: {d_ini:d_ini,d_fin:d_fin},
        dataType: "JSON",
        beforeSend: function() {
            $("#loadd").removeClass("hide");
        },
        success: function(res) {

            var html = '';
            
            res.map((item, index) => {
                
                var moeda = parseInt(item.valor);
            
                html += '<tr>'+
                '<td class="text-capitalize">'+item.descricao+'</td>'+
                '<td class="text-danger">'+
                '<strong>'+(moeda).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })+'</strong>'+
                '</td>'+
                '<td>'+moment(item.data_d).format("DD/MM/YYYY")+'</td>'+
                '<td>'+
                '<img src="https://raphasfit.com.br/dashboard/assets/img/cat/as.png"'+ 
                'style="width:18px;border-radius:30px;">'+' '+item.nome+'</td>'+
                '<td>'+item.conta+'</td>'+
            '</tr>';
            $('#bodytabled').html(html);
            });

            $('#bodytabled').html(html);
            $("#loadd").addClass("hide");
        },
        error: function(res) {
            console.log('deu errado');
        }
    });
}