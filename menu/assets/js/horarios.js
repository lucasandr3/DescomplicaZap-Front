let BASE = 'https://raphasfit.com.br/dashboard/schedules'

function salvaHora(horario, name) {

    console.log(horario, name)
   
    $.ajax({
        type: "POST",
        url:   BASE+'/atualizaHorario/',
        data: {horario: horario, name:name},
        dataType: "json",
        beforeSend: function() {
            //loading();
        },
        success: function(res) {

            mensagem(res.code, name, res.msg);
        }
    });
}

function hora_segunda(action) {

    let abre  = document.querySelector('#hsa').value;
    let fecha = document.querySelector('#hsf').value;
    let name  = document.querySelector('#hsa').name;

    let horario = '';
    
    switch (action) {
        case 'apagar':
            horario = 'Fechado';
            salvaHora(horario, name);
            document.querySelector('#hsa').value = '';
            document.querySelector('#hsf').value = '';
            break;
    
        default:
            horario = `${abre} às ${fecha}`;
            salvaHora(horario, name);
            document.querySelector('#hsa').value = abre;
            document.querySelector('#hsf').value = fecha;
            break;
    }
}

function hora_terca(action) {

    let abre  = document.querySelector('#hta').value;
    let fecha = document.querySelector('#htf').value;
    let name  = document.querySelector('#hta').name;
    
    let horario = '';
    
    switch (action) {
        case 'apagar':
            horario = 'Fechado';
            salvaHora(horario, name);
            document.querySelector('#hta').value = '';
            document.querySelector('#htf').value = '';
            break;
    
        default:
            horario = `${abre} às ${fecha}`;
            salvaHora(horario, name);
            document.querySelector('#hta').value = abre;
            document.querySelector('#htf').value = fecha;
            break;
    }
}

function hora_quarta(action) {

    let abre  = document.querySelector('#hqa').value;
    let fecha = document.querySelector('#hqf').value;
    let name  = document.querySelector('#hqa').name;

    let horario = '';
    
    switch (action) {
        case 'apagar':
            horario = 'Fechado';
            salvaHora(horario, name);
            document.querySelector('#hqa').value = '';
            document.querySelector('#hqf').value = '';
            break;
    
        default:
            horario = `${abre} às ${fecha}`;
            salvaHora(horario, name);
            document.querySelector('#hqa').value = abre;
            document.querySelector('#hqf').value = fecha;
            break;
    }
}

function hora_quinta(action) {

    let abre  = document.querySelector('#hquia').value;
    let fecha = document.querySelector('#hquif').value;
    let name  = document.querySelector('#hquia').name;

    console.log(abre)

    let horario = '';
    
    switch (action) {
        case 'apagar':
            horario = 'Fechado';
            salvaHora(horario, name);
            document.querySelector('#hquia').value = '';
            document.querySelector('#hquif').value = '';
            break;
    
        default:
            horario = `${abre} às ${fecha}`;
            salvaHora(horario, name);
            document.querySelector('#hquia').value = abre;
            document.querySelector('#hquif').value = fecha;
            break;
    }
}

function hora_sexta(action) {

    let abre  = document.querySelector('#hsea').value;
    let fecha = document.querySelector('#hsef').value;
    let name  = document.querySelector('#hsea').name;

    console.log(abre)

    let horario = '';
    
    switch (action) {
        case 'apagar':
            horario = 'Fechado';
            salvaHora(horario, name);
            document.querySelector('#hsea').value = '';
            document.querySelector('#hsef').value = '';
            break;
    
        default:
            horario = `${abre} às ${fecha}`;
            salvaHora(horario, name);
            document.querySelector('#hsea').value = abre;
            document.querySelector('#hsef').value = fecha;
            break;
    }
}

function hora_sabado(action) {

    let abre  = document.querySelector('#hsaa').value;
    let fecha = document.querySelector('#hsaf').value;
    let name  = document.querySelector('#hsaa').name;

    console.log(abre)

    let horario = '';
    
    switch (action) {
        case 'apagar':
            horario = 'Fechado';
            salvaHora(horario, name);
            document.querySelector('#hsaa').value = '';
            document.querySelector('#hsaf').value = '';
            break;
    
        default:
            horario = `${abre} às ${fecha}`;
            salvaHora(horario, name);
            document.querySelector('#hsaa').value = abre;
            document.querySelector('#hsaf').value = fecha;
            break;
    }
}

function hora_domingo(action) {

    let abre  = document.querySelector('#hdoma').value;
    let fecha = document.querySelector('#hdomf').value;
    let name  = document.querySelector('#hdoma').name;

    console.log(abre)

    let horario = '';
    
    switch (action) {
        case 'apagar':
            horario = 'Fechado';
            salvaHora(horario, name);
            document.querySelector('#hdoma').value = '';
            document.querySelector('#hdomf').value = '';
            break;
    
        default:
            horario = `${abre} às ${fecha}`;
            salvaHora(horario, name);
            document.querySelector('#hdoma').value = abre;
            document.querySelector('#hdomf').value = fecha;
            break;
    }
}

function mensagem(code , dia, msg) {

    let resposta = '';

    if (code === 0 && dia === 'h_segunda') {
        
        resposta = `<span>${msg}</span>`;
        document.querySelector('#horario-msg-s').classList.add('msg-success');
        document.querySelector('#horario-msg-s').innerHTML = resposta;

    } else if(code === 0 && dia === 'h_terca') {

        resposta = `<span>${msg}</span>`;
        document.querySelector('#horario-msg-t').classList.add('msg-success');
        document.querySelector('#horario-msg-t').innerHTML = resposta;
        
    } else if(code === 0 && dia === 'h_quarta') {

        resposta = `<span>${msg}</span>`;
        document.querySelector('#horario-msg-q').classList.add('msg-success');
        document.querySelector('#horario-msg-q').innerHTML = resposta;

    } else if(code === 0 && dia === 'h_quinta') {

        resposta = `<span>${msg}</span>`;
        document.querySelector('#horario-msg-qui').classList.add('msg-success');
        document.querySelector('#horario-msg-qui').innerHTML = resposta;
 
    } else if(code === 0 && dia === 'h_sexta') {

        resposta = `<span>${msg}</span>`;
        document.querySelector('#horario-msg-sex').classList.add('msg-success');
        document.querySelector('#horario-msg-sex').innerHTML = resposta;

    } else if(code === 0 && dia === 'h_sabado') {

        resposta = `<span>${msg}</span>`;
        document.querySelector('#horario-msg-saa').classList.add('msg-success');
        document.querySelector('#horario-msg-saa').innerHTML = resposta;

    } else if(code === 0 && dia === 'h_domingo') {

        resposta = `<span>${msg}</span>`;
        document.querySelector('#horario-msg-dom').classList.add('msg-success');
        document.querySelector('#horario-msg-dom').innerHTML = resposta;

    }



    if (code === 1 && dia === 'h_segunda') {
        
        resposta = `<span>${msg}</span>`;
        document.querySelector('#horario-msg-s').classList.add('msg-danger');
        document.querySelector('#horario-msg-s').innerHTML = resposta;

    } else if(code === 1 && dia === 'h_terca') {

        resposta = `<span>${msg}</span>`;
        document.querySelector('#horario-msg-t').classList.add('msg-danger');
        document.querySelector('#horario-msg-t').innerHTML = resposta;
        
    } else if(code === 1 && dia === 'h_quarta') {

        resposta = `<span>${msg}</span>`;
        document.querySelector('#horario-msg-q').classList.add('msg-danger');
        document.querySelector('#horario-msg-q').innerHTML = resposta;

    } else if(code === 1 && dia === 'h_quinta') {

        resposta = `<span>${msg}</span>`;
        document.querySelector('#horario-msg-qui').classList.add('msg-danger');
        document.querySelector('#horario-msg-qui').innerHTML = resposta;
 
    } else if(code === 1 && dia === 'h_sexta') {

        resposta = `<span>${msg}</span>`;
        document.querySelector('#horario-msg-sex').classList.add('msg-danger');
        document.querySelector('#horario-msg-sex').innerHTML = resposta;

    } else if(code === 1 && dia === 'h_sabado') {

        resposta = `<span>${msg}</span>`;
        document.querySelector('#horario-msg-saa').classList.add('msg-danger');
        document.querySelector('#horario-msg-saa').innerHTML = resposta;

    } else if(code === 1 && dia === 'h_domingo') {

        resposta = `<span>${msg}</span>`;
        document.querySelector('#horario-msg-dom').classList.add('msg-danger');
        document.querySelector('#horario-msg-dom').innerHTML = resposta;

    }

    

    //         if (res.code === 0) {
                
    //             resposta = `<span>${res.msg}</span>`;
    //             document.querySelector('#horario-msg').classList.add('msg-success');
                
    //         } else {
                
    //             resposta = `<span>${res.msg}</span>`;
    //             document.querySelector('#horario-msg').classList.add('msg-danger');
    //         }

    //         document.querySelector('#horario-msg').innerHTML = resposta;
}