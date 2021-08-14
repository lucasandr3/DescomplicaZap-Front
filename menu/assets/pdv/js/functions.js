let cartPdv = [];
let productsPdv = [];
fetch(`https://raphasfit.com.br/api/products`)
    .then((r) => r.json())
    .then((products) => {
    sessionStorage.setItem('produtospdv', JSON.stringify(products));
    productsPdv = JSON.parse(sessionStorage.getItem('produtospdv'));
});
function mostraBairros(value) {

    if(value === 'entrega') {
        $('#pdv-bairros').show();
    } else {
        $('#pdv-bairros').hide();
        $('#pdv-subtotal').html('R$ 0,00');
    }
}

function defineBairro(value) {

    let val = value.split(';');
    let name_bairro = val[0];
    let taxa_entrega = val[1];
    
    $('#pdv-subtotal').html(`R$ ${taxa_entrega}`);
}

let diario = $('#cat-diario');
let semanal = $('#cat-semanal');
let combos = $('#cat-combos');

semanal.hide();
combos.hide();

$('#category-filter-dia').click(function () {
    diario.show();
    semanal.hide();
    combos.hide();
    $('#prods-no-search').show();
    $('#prods-search').hide();
}); 

$('#category-filter-sem').click(function () {
    diario.hide();
    semanal.show();
    combos.hide();
    $('#prods-no-search').show();
    $('#prods-search').hide();
}); 

$('#category-filter-com').click(function () {
    diario.hide();
    semanal.hide();
    combos.show();
    $('#prods-no-search').show();
    $('#prods-search').hide();
});

function searchProd(text) {

    if (text != '') {

        $.ajax({
            type: "GET",
            url: "http://localhost/rapha/dashboard/menu/busca/"+text,
            dataType: "Json",
            success: function (res) {
    
                let html = '';
    
                if (res.code == 0) {
                    
                    res.busca.map((item, index) => {

                        html += `
                       
                            <div class="pdv-list-prods" onclick="addToCart('${item.id_product}')">
                                <div class="pdv-area-cat">
                                    <p>${item.category}</p>
                                </div>
                                <div>
                                    <img src="http://localhost/rapha/dashboard/${item.image}" class="pdv-img-prod">
                                </div>
                                <div class="pdv-title-prod">
                                    ${item.name_product}
                                </div>
                                <div class="pdv-price-prod">
                                    R$ ${item.actual_price}
                                </div>
                            </div>
                          
                        `;
                    });
    
                    $('#prods-no-search').hide();
                    $('#prods-search').show();
                    $('#prods-search').html(html);
    
                } else {
                    alert(res.busca);
                }
    
            }
        });
        
    } else {
        $('#prods-no-search').show();
        $('#prods-search').hide();
    } 
}

function addToCart(prod) {

    let htmlCart = '';

    productCart = productsPdv.filter(p=>p.id_product == prod);

    htmlCart += `
        <tr>
            <td class="col-sm-4">${productCart[0].name_product}</td>
            <td class="col-sm-2">R$ ${productCart[0].actual_price}</td>
            <td class="col-sm-3">
                <div class="form-qt-order">
                    <button class="btn-menos">-</button>
                    <input type="text" value="1" class="form-order">
                    <button class="btn-mais">+</button>
                </div>
            </td>
            <td class="col-sm-3">R$ ${productCart[0].actual_price}</td>
        </tr>
    `;

    
    let id = productCart[0].id_product;
    let name = productCart[0].name_product;
    let price = productCart[0].actual_price;
    let qt = 2;

    let total = (price * qt);

    cartPdv.push({
        id,
        name,
        price,
        qt
    });

    //for (const c in cartPdv) {

        
    //

    $('#grand-total').html(total);
    $('#body-order').append(htmlCart);
    console.log(cartPdv);
}

function confirmCancel() {
    $('#grand-total').html('0,00');
    cartPdv = [];
}