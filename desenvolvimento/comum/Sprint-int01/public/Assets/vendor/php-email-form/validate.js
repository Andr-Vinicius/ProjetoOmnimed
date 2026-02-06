/**
* PHP Email Form Validation - v3.2
* URL: https://bootstrapmade.com/php-email-form/
* Author: BootstrapMade.com
*/
(function () {
  "use strict";

  let forms = document.querySelectorAll('.php-email-form'); // Pega todos os forms com a classe especificada

  forms.forEach( function(e) { // Itera pelos formulários
    e.addEventListener('submit', function(event) { // Ao dar submit, trigga o a função, recebendo o evento
      event.preventDefault(); // Intercepta o funcionamento normal do submit

      let thisForm = this; // Formulário atual

      let action = thisForm.getAttribute('action'); // Salva o action do formulário atual
      let recaptcha = thisForm.getAttribute('data-recaptcha-site-key'); // Pega o captcha
      
      if( ! action ) { // Caso não tenha um atributo action, lança o erro
        displayError(thisForm, 'The form action property is not set!')
        return;
      }

      // Exibe a div de loading, ocultando a de erro e de concluído
      thisForm.querySelector('.loading').classList.add('d-block');
      thisForm.querySelector('.error-message').classList.remove('d-block');
      thisForm.querySelector('.sent-message').classList.remove('d-block');

      let formData = new FormData( thisForm ); // Recebe os dados do formulário

      if ( recaptcha ) { // Caso possua um captcha (não utilizado atualmente)
        if(typeof grecaptcha !== "undefined" ) {
          grecaptcha.ready(function() {
            try {
              grecaptcha.execute(recaptcha, {action: 'php_email_form_submit'})
              .then(token => {
                formData.set('recaptcha-response', token);
                php_email_form_submit(thisForm, action, formData);
              })
            } catch(error) {
              displayError(thisForm, error)
            }
          });
        } else {
          displayError(thisForm, 'The reCaptcha javascript API url is not loaded!')
        }
      } else {
        // Chama a função de submit, passando o formulário, sua acion e os dados
        php_email_form_submit(thisForm, action, formData);
      }
    });
  });

  function php_email_form_submit(thisForm, action, formData) {
    fetch(action, {
      method: 'POST',
      body: formData,
      headers: {'X-Requested-With': 'XMLHttpRequest'}
    })
    .then(response => {
      if( response.ok ) {
        return response.text()
      } else {
        throw new Error(`${response.status} ${response.statusText} ${response.url}`); 
      }
    })
    .then(data => {
      thisForm.querySelector('.loading').classList.remove('d-block');
      if (data.trim() == 'OK') {
        thisForm.querySelector('.sent-message').classList.add('d-block');
        thisForm.reset(); 
      }else if(data.trim() == 'upd_pass'){
        window.location.href = 'http://localhost:8080/';
      }else if(data.trim() == 'ME'){
        window.location.href = 'http://localhost:8080/medicos/logado';
      }else if(data.trim() == 'AD'){
        window.location.href = 'http://localhost:8080/administrativo/logado';
      }else if(data.trim() == 'EN'){
        window.location.href = 'http://localhost:8080/enfermagem/logado';
      }else if(data.trim() == 'CO'){
        window.location.href = 'http://localhost:8080/contabilidade/logado';
      }else if(data.trim() == 'PAC'){
        window.location.href = 'http://localhost:8080/pacientes/logado';
      }else {
        throw new Error(data ? data : 'Form submission failed and no error message returned from: ' + action); 
      }
    })
    .catch((error) => {
      displayError(thisForm, error);
    });
  }

  function displayError(thisForm, error) {
    thisForm.querySelector('.loading').classList.remove('d-block');
    thisForm.querySelector('.error-message').innerHTML = error;
    thisForm.querySelector('.error-message').classList.add('d-block');
  }

})();
