const API = 'https://raphasfit.com.br/dashboard';

function disponivelone(id) {
    
    document.querySelector('#btn-d-one_'+id).classList.add('btn-success');
    document.querySelector('#btn-i-one_'+id).classList.remove('btn-danger');

    fetch(`${API}/menu/active/${id}`)
    .then((r) => r.json())
    .then((result) => {console.log(result)});
}

function indisponivelone(id) {
    
    document.querySelector('#btn-d-one_'+id).classList.remove('btn-success');
    document.querySelector('#btn-i-one_'+id).classList.add('btn-danger');

    fetch(`${API}/menu/inactive/${id}`)
    .then((r) => r.json())
    .then((result) => {console.log(result)});
}



function disponiveltwo(id) {
    
    document.querySelector('#btn-d-two_'+id).classList.add('btn-success');
    document.querySelector('#btn-i-two_'+id).classList.remove('btn-danger');

    fetch(`${API}/menu/active/${id}`)
    .then((r) => r.json())
    .then((result) => {console.log(result)});
}

function indisponiveltwo(id) {
    
    document.querySelector('#btn-d-two_'+id).classList.remove('btn-success');
    document.querySelector('#btn-i-two_'+id).classList.add('btn-danger');

    fetch(`${API}/menu/inactive/${id}`)
    .then((r) => r.json())
    .then((result) => {console.log(result)});
}

function options(id) {

    var htmlAdicionais = '';

    fetch(`${API}/menu/options/${id}`)
    .then((r) => r.json())
    .then((options) => {

        for (let key in options) {

            htmlAdicionais +=
            `
            <h5 class="p-options">${options[key].category_name_option}</h5><hr>
                `;
            for (let i in options[key].options) {
        
              if(options[key].price[i] == null) {
                  price = '';
              } else {
                  price = parseFloat(options[key].price[i]);
              }
              //console.log(price)

              if (options[key].available[i] == 0) {
                console.log(options[key].options[i])
                    htmlAdicionais += `
            
                
                    <div style="display:flex;justify-content:space-between;">
                    <label style="font-size:15px;white-space: normal;text-transform:capitalize;">${options[key].options[i]}</label>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-round"
                            id="btn-item-i${options[key].id_option[i]}"
                            onclick="itemIndisponivel('${options[key].id_option[i]}')">pausado</button>
                        <button class="btn btn-sm btn-round btn-success"
                            id="btn-item-d${options[key].id_option[i]}"
                            onclick="itemDisponivel('${options[key].id_option[i]}')">disponível</button>
                    </div>
                    </div>
                    <hr>
                    
                `;
              } else {
                htmlAdicionais += `
        
            
                <div style="display:flex;justify-content:space-between;">
                  <label style="font-size:15px;white-space: normal;text-transform:capitalize;">${options[key].options[i]}</label>
                  <div class="btn-group">
                    <button class="btn btn-sm btn-round btn-danger"
                        id="btn-item-i${options[key].id_option[i]}"
                        onclick="itemIndisponivel('${options[key].id_option[i]}')">pausado</button>
                    <button class="btn btn-sm btn-round"
                        id="btn-item-d${options[key].id_option[i]}"
                        onclick="itemDisponivel('${options[key].id_option[i]}')">disponível</button>
                  </div>
                </div>
                <hr>
                
              `;
              }

            }
        }

        document.querySelector('#body-modal-options'+id).innerHTML = htmlAdicionais;
    });
    
    $('#myModal'+id).modal(options);
}

function itemDisponivel(id) {
    
    document.querySelector('#btn-item-d'+id).classList.add('btn-success');
    document.querySelector('#btn-item-i'+id).classList.remove('btn-danger');

    fetch(`${API}/itens/active/${id}`)
    .then((r) => r.json())
    .then((result) => {console.log(result)});
}

function itemIndisponivel(id) {
    
    document.querySelector('#btn-item-d'+id).classList.remove('btn-success');
    document.querySelector('#btn-item-i'+id).classList.add('btn-danger');

    fetch(`${API}/itens/inactive/${id}`)
    .then((r) => r.json())
    .then((result) => {console.log(result)});
}