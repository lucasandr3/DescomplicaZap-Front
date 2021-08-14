function statusOpenStore() {

    if (localStorage.getItem('checked') == 'false') {
   
      //localStorage.setItem('checked', false);
      labelCheck.innerText = 'Abrir Loja';
      icon.innerHTML =
      `<div style="display:flex;align-items:center;">
      <i class="fa fa-times-circle" style="font-size: 18px;padding: 5px;color:#555;"></i>
      </div>
      <div style="display:flex;flex-direction:column;">
      <span style="font-weight:bold;font-size:15px;margin-top:4px;color:#555;">Loja Fechada</span>                           
      </div>`;
      document.querySelector('#customSwitchfechar').checked = 'false';
    } else {
    
      // localStorage.setItem('open', 0);
      //localStorage.setItem('checked', true);
      labelCheck.innerText = 'Fechar Loja';
      icon.innerHTML = 
      `<div style="display:flex;align-items:center;">
      <i class="fa fa-check-circle text-success" style="font-size: 18px;padding: 5px;"></i>
      </div>
      <div style="display:flex;flex-direction:column;">
      <span class="text-success" style="font-weight:bold;font-size:15px;margin-top:4px;">Loja Aberta</span>                           
      </div>`;
      document.querySelector('#customSwitchfechar').checked = 'true';
    }
  }