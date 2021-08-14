// const intro = introJs();

// intro.setOptions({
//     steps: [
//         {
//             intro: 'Bem Vindo ao DescomplicaZap'
//         },
//         {
//             element: '#step-one',
//             intro: 'Aqui você navega pelas categorias'
//         }
//     ]
// });

// intro.start();
// intro.addHints();

//$(document).ready( function() {
    console.log("***** Demo template loaded!");
    
    //$(".ratings-axis-input input").rating();
    
    
    
    
    //initialize instance
  var enjoyhint_instance = new EnjoyHint({
      onStart:function(){
        console.log('aquiiiiii')   
      }
  });


  //simple config. 
  //Only one step - highlighting(with description) "New" button 
  //hide EnjoyHint after a click on the button.
  var enjoyhint_script_steps = [
    {
      'click #step-one' : 'Aqui você pode pesquisar por produtos',
      nextButton: {
          className:'btn-tour-next',
          text: 'Próximo'
      },
      skipButton: {
          className: 'btn-tour-skip',
          text: 'sair'
      },
      showNext:true
    },
    { 
      'click #step-two' : 'Aqui você navega pelas categorias',
        nextButton: {
            className:'btn-tour-next',
            text: 'Próximo'
        },
        skipButton: {
            className: 'btn-tour-skip',
            text: 'sair'
        },
        prevButton: {
            className:'myclass',
            text: 'voltar'
        },
        showPrev: true,
        showSkip: true,
        showNext:true
    },
    { 
      'click #step-three' : 'Aqui você clica no produto',
        nextButton: {
            className:'myclass',
            text: 'Próximo'
        },
        skipButton: {
            className: 'myclass',
            text: 'sair'
        },
        prevButton: {
            className:'myclass',
            text: 'voltar'
        },
        showNext:true,
        showSkip: true,
        showPrev: true,
    },
    // { 
    //   'click .ratings-axis:nth-child(3) .rating' : 'Enter a rating by clicking the stars or by selecting "Don\'t know"'
    // },
    // { 
    //   'click .ratings-axis:nth-child(4) .rating' : 'Enter a rating by clicking the stars or by selecting "Don\'t know"'
    // },
    // { 
    //   'click .ratings-axis:last-child .rating' : 'Enter a rating by clicking the stars or by selecting "Don\'t know"'
    // }
  ];
 
  //set script config
  enjoyhint_instance.set(enjoyhint_script_steps);
  
  //run Enjoyhint script
  function helpOrder() {
    enjoyhint_instance.run();
  }

  //});
