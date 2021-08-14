fetch('http://localhost/descomplicazap/portal/ajax/pedidos')
.then((r) => r.json())
.then(json => {
    
    let pedidosHtml = '';
    let htmlPrepare = '';
    let htmlDespacho = '';
    let entregap = '';

    console.log(json)
    
    json.map((item, key) => {
        
        let enderecop = JSON.parse(item.endereco);

        if(enderecop[0].tipo == 'Entregar') {

            entregap = enderecop[0].taxa;

        } else {

            entregap = 'retirada';
        }
        
        let dateEl = new Date(item.data_pedido);
        let year = dateEl.getFullYear();
        let month = dateEl.getMonth() + 1;
        let day = dateEl.getDate() + 1;

        month = month < 10 ? '0'+month : month;
        day = day < 10 ? '0'+day : day;
        
        let dataForma = `${day}/${month}/${year}`; 
 console.log(dataForma)
       
        if (item.status_do_pedido == 0) {
            
            
            pedidosHtml += `
            <tr>
               
                <td style="text-transform: capitalize;">${(enderecop[0].cliente == '') ? 'não informado' : enderecop[0].cliente }</td>
                <td>
                    <span class="badge bg-secondary-bright text-secondary">Confirmar</span>
                </td>
                <td>${item.pagamento}</td>
                <td>${(parseInt(item.troco)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</td>
                <td>${(parseInt(item.subtotal)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</td>
                <td>${(entregap == 'retirada') ? '<span>Retirada</span>' : (parseInt(entregap)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</td>
                <td>${dataForma} às ${item.hora_pedido}</td>
                <td>
                    <button class="btn btn-outline-success btn-sm btn-floating" data-toggle="tooltip" title="Mudar Status" onclick="changeStatus(${item.id})">
                        <i class="ti-pencil"></i>
                    </button>
                    <button onclick="detailsOrder(${item.id})" class="btn btn-outline-primary btn-sm btn-floating ml-2" data-toggle="tooltip" title="Detalhes do pedido" onclick="cancelOrder(${item.id})">
                        <i class="ti-receipt"></i>
                    </button>
                </td>
            </tr>
            `;
            document.querySelector('#table-pedidos').innerHTML = pedidosHtml;

        } else if(item.status_do_pedido == 2) {

            htmlPrepare += `
            <tr>
             
                <td style="text-transform: capitalize;">${(enderecop[0].cliente == '') ? 'não informado' : enderecop[0].cliente }</td>
                <td>
                    <span class="badge bg-warning-bright text-warning">Em preparo...</span>
                </td>
                <td>${item.pagamento}</td>
                <td>${(parseInt(item.troco)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</td>
                <td>${(parseInt(item.subtotal)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</td>
                <td>${(entregap == 'retirada') ? '<span>Retirada</span>' : (parseInt(entregap)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</td>
                <td>${moment(item.data_pedido).format('L')} às ${item.hora_pedido}</td>
                <td>
                    <button class="btn btn-outline-success btn-sm btn-floating" data-toggle="tooltip" title="Mudar Status" onclick="changeStatus(${item.id})">
                    <i class="ti-pencil"></i>
                    </button>
                    <button onclick="detailsOrder(${item.id})" class="btn btn-outline-primary btn-sm btn-floating ml-2" data-toggle="tooltip" title="Detalhes do pedido" onclick="cancelOrder(${item.id})">
                        <i class="ti-receipt"></i>
                    </button>
                </td>
            </tr>
            `;
            document.querySelector('#table-pedidos-prepare').innerHTML = htmlPrepare;

        } else if(item.status_do_pedido == 1) {

            htmlDespacho += `
            <tr>
               
                <td style="text-transform: capitalize;">${(enderecop[0].cliente == '') ? 'não informado' : enderecop[0].cliente }</td>
                <td>
                    <span class="badge bg-success-bright text-success">Despachado</span>
                </td>
                <td>${item.pagamento}</td>
                <td>${(parseInt(item.troco)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</td>
                <td>${(parseInt(item.subtotal)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</td>
                <td>${(entregap == 'retirada') ? '<span>Retirada</span>' : (parseInt(entregap)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</td>
                <td>${moment(item.data_pedido).format('L')} às ${item.hora_pedido}</td>
                <td>
                    <button class="btn btn-outline-success btn-sm btn-floating" data-toggle="tooltip" title="Mudar Status" onclick="changeStatus(${item.id})">
                    <i class="ti-pencil"></i>
                    </button>
                    <button onclick="detailsOrder(${item.id})" class="btn btn-outline-primary btn-sm btn-floating ml-2" data-toggle="tooltip" title="Detalhes do pedido" onclick="cancelOrder(${item.id})">
                        <i class="ti-receipt"></i>
                    </button>
                </td>
            </tr>
            `;
            document.querySelector('#table-pedidos-despacho').innerHTML = htmlDespacho;

        }
        
    })
})

function changeStatus(idpedido) {
   
    $.ajax({
        type: "GET",
        url: "https://raphasfit.com.br/dashboard/pedido/pedidoid/"+idpedido,
        dataType: "Json",
        beforeSend: function () {
          $('.modal-loading').show();  
        },
        success: function (res) {

            if (res.code == 0) {
                
                $('.modal-loading').hide();

                $('#modal-pedido').append(`<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Mudar Status do Pedido #${res.pedido.id}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="ti-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Escolha o novo status do pedido</label>
                                    <select class="form-control" style="border-radius:5px;" id="v-status-c">
                                        <option value="${res.pedido.status_do_pedido}">Escolha o novo status</option>
                                        <option value="2">Em preparo...</option>
                                        <option value="1">Despachado</option>
                                        <option value="3">Cancelar</option>
                                        <option value="4">Finalizado</option>
                                    </select>
                                </div>
                                <div id="res-change"></div>                               
                            </form>
                        </div>
                        <div class="modal-footer" id="btns-principal">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius:5px;">Cancelar
                            </button>
                            <button type="button" class="btn btn-success" style="border-radius:5px;" onclick="trocaStatus(${res.pedido.id})">Mudar Status</button>
                        </div>
                        <div class="modal-footer" id="btn-final" style="display:none;">
                            <button type="button" class="btn bg-facebook btn-block" onclick="reloadPage()" style="border-radius:5px;">Fechar janela
                            </button>
                        </div>
                        </div>
                    </div>
                    </div>`)

                $('#exampleModalCenter').modal('show');

                $('#exampleModalCenter').on('hidden.bs.modal', function (e) {

                    $(this).remove();

                });
                 
            } else {
                document.querySelector('#res-change').innerHTML = res.msg;
            }

        }
    });   
}

function detailsOrder(idpedido) {
   
    $.ajax({
        type: "GET",
        url: "https://raphasfit.com.br/dashboard/pedido/pedidoid/"+idpedido,
        dataType: "Json",
        beforeSend: function () {
            $('.modal-loading').show();
        },
        success: function (res) {

            let endereco = JSON.parse(res.pedido.endereco);
            let produtos = JSON.parse(res.pedido.pedido);

            if (res.code == 0) {
                
                $('.modal-loading').hide();

                if(endereco[0].tipo == 'Entregar') {

                    rua = endereco[0].rua;
                    bairro = endereco[0].bar;
                    referencia = endereco[0].ref;
                    entrega = endereco[0].taxa;

                } else {

                    rua = endereco[0].rua_r;
                    bairro = endereco[0].bar_r;
                    referencia = endereco[0].ref_r;
                    entrega = 'retirada';
                }

                $('#modal-pedido-impressao').append(`<div class="modal fade" id="exampleModalCenterImprimir" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Mudar Status do Pedido #${idpedido}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="ti-close"></i>
                            </button>
                        </div>
                       
                        <div class="modal-body" id="m-b-print">
                            <div style="display: flex;justify-content: center;margin-bottom: 5px;">
                                <span>${(entrega == 'retirada') ? '<h2>Retirada no local</h2>' : '<h2>Entrega</h2>'}</span>
                            </div>
                            <div style="display: flex;flex-direction: column;">
                                <p style="margin-bottom: 0;"><strong>Nome do comerciante:</strong> Rapha's Fit</p>
                                <p style="margin-bottom: 0;"><strong>Telefone:</strong> (34) 98845-4606</p>
                                <p style="margin-bottom: 0;"><strong>Endereço:</strong> Rua Tertuliano Goulart Centro, 339</p>
                            </div>
                            <hr/ style="border-color: #5d5c5c;border-style: dashed;">
                            
                            <div style="display: flex;flex-direction: column;">
                                <p style="margin-bottom: 0;"><strong>Nº do pedido:</strong> #${idpedido}</p>
                                <p style="margin-bottom: 0;"><strong>Data do pedido:</strong> ${moment(res.pedido.data_pedido).format("DD/MM/YYYY")} às ${res.pedido.hora_pedido}</p>
                                <p style="margin-bottom: 0;"><strong>Endereço Entrega:</strong> ${rua}, ${bairro}</p>
                                <p style="margin-bottom: 0;"><strong>Ponto de referência:</strong> ${referencia}</p>
                                <p style="margin-bottom: 0;text-transform:capitalize;"><strong>Nome do Cliente:</strong> ${(endereco[0].cliente) ? endereco[0].cliente : '*****'}</p>
                                <p style="margin-bottom: 0;"><strong>Telefone:</strong> ${(endereco[0].telefone) ? endereco[0].telefone : '*****'}</p>
                                <p style="margin-bottom: 0;"><strong>Horário da entrega:</strong> ${(endereco[0].horario === undefined) ? '*****' : endereco[0].horario}</p>
                            </div>
                            <hr/ style="border-color: #5d5c5c;border-style: dashed;">
                
                            <p style="margin-bottom: 0;"><strong>Produtos:</strong></p>
                            ${produtos.map(prod => `
                            
                            <hr/ style="border-color: #5d5c5c;border-style: dashed;margin-top: 0px;margin-bottom: 5px;">
                            <div style="display: flex;flex-direction: column;">
                                <div style="display:flex;justify-content:space-between;">
                                    <p style="margin-bottom: 0;"><strong>Produto:</strong> ${prod.name_product}</p>
                                    <p style="margin-bottom: 0;"> ${prod.category}</p>
                                    <p style="margin-bottom: 0;"><strong>Preço:</strong> ${(parseInt(prod.price_product)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</p>
                                </div>
                                <span style="font-size:12px;"><strong>Observação:</strong> ${prod.note}</span>
                            </div>
                            
                            `).join('\n')}
                           
                            <hr/ style="border-color: #5d5c5c;border-style: dashed;">
                            
                            <p style="margin-bottom: 0;"><strong>Total:</strong></p>
                            <hr/ style="border-color: #5d5c5c;border-style: dashed;margin-top: 0px;margin-bottom: 5px;">
                            <hr/ style="border-color: #5d5c5c;border-style: dashed;margin-top: -8px;margin-bottom: 5px;">
                            <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                <p style="margin-bottom: 0;"><strong>Tipo de Pgto:</strong></p>
                                <span>${res.pedido.pagamento}</span>
                            </div>
                            <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                <p style="margin-bottom: 0;"><strong>Tax. de entrega:</strong></p>
                                <span>${(entrega == 'retirada') ? '<span>Retirada no local</span>' : (parseInt(entrega)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</span>
                            </div>
                            <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                <p style="margin-bottom: 0;"><strong>Subtotal:</strong></p>
                                <span>${(parseInt(res.pedido.subtotal)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</span>
                            </div>
                            <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                <p style="margin-bottom: 0;"><strong>Total do pedido:</strong></p>
                                <span>${(parseInt(res.pedido.total)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}</span>
                            </div>
                        </div>
                        <div class="modal-footer" style="justify-content: space-between !important;">
                            <button type="button" class="btn bg-facebook" style="border-radius:5px;" onclick="printJS('m-b-print', 'html', {font_size:'10pt'})">Imprimir pedido &nbsp;&nbsp;<i class="fa fa-print"></i></button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:5px;">Fechar
                            </button>
                        </div>
                        </div>
                    </div>
                    </div>`)

                $('#exampleModalCenterImprimir').modal('show');

                $('#exampleModalCenterImprimir').on('hidden.bs.modal', function (e) {

                    $(this).remove();

                });
                 
            } else {
                alert(res.msg);
            }

        }
    });
}

function trocaStatus(idpedido) {

    let status = document.querySelector('#v-status-c').value;

    $.ajax({
        type: "POST",
        url: "https://raphasfit.com.br/dashboard/pedido/changeStatus/",
        data: {id:idpedido, status:status},
        dataType: "Json",
        beforeSend: function () {
            $('.modal-loading').show();
        },
        success: function (res) {

            if (res.code == 0) {
                
                $('.modal-loading').hide();

                document.querySelector('#res-change').innerHTML = `<div class="alert alert-success" role="alert">${res.msg}</div>`;
                document.querySelector('#btns-principal').style.display = 'none';
                document.querySelector('#btn-final').style.display = 'block';

                // document.location.reload(true);
                 
            } else {

                document.querySelector('#res-change').innerHTML = `<div class="alert alert-danger" role="alert">${res.msg}</div>`;
                // document.location.reload(true);
            }

        }
    });
    
}

function reloadPage () {
    $('#exampleModalCenter').modal('hide');
    document.location.reload(true);
};
