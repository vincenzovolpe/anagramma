$(document).ready(function(){
    
    $('#form_anagramma').submit(function(e) {
            e.preventDefault();
            $.ajax({
              type: "POST",
              url: "anagramma.php",
              data: $(this).serialize(),
              success: function(response)
              {
                var jsonData = JSON.parse(response);
                if (jsonData.success == "1") {
                    // alert('Anagrammi trovati');
                    // console.log(jsonData.anagramma_due);
                    var messaggio = 'Anagrammando la stringa <b>'+jsonData.stringa_uno+'</b> si può trovare una occorrenza di <b>'+jsonData.anagramma_trovato+'</b> nella stringa <b>'+jsonData.stringa_due+'</b>';
                    $.confirm({
                      title: 'Anagrammi trovati!',
                      content: messaggio,
                      type: 'green',
                      typeAnimated: true,
                      buttons: {
                          chiudi: {
                            text: 'chiudi',
                            btnClass: 'btn-green',
                            close: function(){
                            }
                        }
                      },
                      onClose: function () {
                        
                        $("#form_anagramma")[0].reset();
                      }
                  });
                } else if(jsonData.maggiore == "1") {
                    $.confirm({
                      title: 'Anagrammi non trovati!',
                      content: 'La prima stringa ha una lunghezza maggiore della seconda.<br>Riprova inserendo la prima stringa con una lunghezza uguale o inferiore alla seconda stringa',
                      type: 'red',
                      typeAnimated: true,
                      buttons: {
                          chiudi: {
                            text: 'chiudi',
                            btnClass: 'btn-red',
                            close: function(){
                            }
                        }
                      },
                      onClose: function () {
                        $("#form_anagramma")[0].reset();
                      }
                  });
                } else {
                  $.confirm({
                    title: 'Anagrammi non trovati!',
                    content: 'Riprova inserendo nuove stringhe',
                    type: 'orange',
                    typeAnimated: true,
                    buttons: {
                        chiudi: {
                          text: 'chiudi',
                          btnClass: 'btn-orange',
                          close: function(){
                          }
                      }
                    },
                    onClose: function () {
                      $("#form_anagramma")[0].reset();
                    }
                });
                }
              }  
            });
        
          });
    
});
