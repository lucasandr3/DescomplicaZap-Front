function showProductEdit() {

    let id = document.querySelector('#product_edit_id').value;
    let cat = categorias;
    let html = '';
    let cate = '';

    fetch('https://raphasfit.com.br/dashboard/menu/productid/'+id)
    .then((r) => r.json())
    .then((res) => {

        let status = '';

        if(res.produto.status == 0) {
            status = 'Publicado';
        } else {
            status = 'Nè´™o Publicado';
        }   

        document.querySelector('#cate-atual').innerHTML = `<option value="${res.produto.category}">${res.produto.category}</option>`;
        document.querySelector('#n-produto').value = res.produto.name_product;
        document.querySelector('#i-produto').value = res.produto.description;
        document.querySelector('#p-produto').value = res.produto.actual_price;
        document.querySelector('#sp-produto').value = res.produto.sale_price;
        document.querySelector('#p-id').value = res.produto.id_product;
        document.querySelector('#im-produto').innerHTML = `<img src="https://raphasfit.com.br/dashboard/${res.produto.image}" style="width:200px;height:auto;"/>`;
        document.querySelector('#s-atual').innerHTML = `<option value="${res.produto.status}">${status}</option>`;

        document.querySelector('#btnedit').removeAttribute('disabled')
    })
}

document.querySelector('#alter-cat').addEventListener('click', (e) => {

    e.preventDefault();
    document.querySelector('#a-categoria').style.display = 'none';
    document.querySelector('#v-categoria').style.display = 'block';
});

document.querySelector('#alter-st').addEventListener('click', (e) => {

    e.preventDefault();
    document.querySelector('#a-sta').style.display = 'none';
    document.querySelector('#s-alter').style.display = 'block';
});