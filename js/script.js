
$(function(){
   $( "#moduloAccesibilidad" ).hide();
   $( "#moduloAccesibilidad2" ).hide();
   if (readCookie('abrirAccesible') !=null || readCookie('comandos') !=null || readCookie('voz') !=null) {
    setTimeout(function() {
      if (readCookie('comandos') != null) {
      ejecutaComandos();
      $( "#reconocimientoVozV2" ).addClass( "active-accesibil" );
    }
    if (readCookie('voz') != null) {
      $( "#lecturaSeleccionV2" ).addClass( "active-accesibil" );
      ejecutaVoz();
    }
    }, 1000);
    
    mostrarAccesible('no');
   }

    $('.accesibilidad').on("click",function(){
          mostrarAccesible('si');
    });
    $('.accesibilidadM').on("click",function(){
          mostrarAccesible('no');
    });

    $( "#accesible1" ).click(function() {
      $( "#moduloAccesibilidad2" ).hide(); 
    });

    $('#_biggtxt').on('click', function() {
      
      $( "#changewidht" ).addClass( "aumentawidth" );
      $( "#_biggtxt" ).addClass( "active-accesibil" );
      var fontSize = $('html').css('font-size');
      var newFontSize = parseInt(fontSize)+1;
  
      $('html').css('font-size', newFontSize+'px');
      
    })

$('#_smalltxt').on('click', function() {
  $( "#changewidht" ).removeClass( "aumentawidth" );
  $("#_biggtxt").removeClass("active-accesibil");
  var fontSize = $('html').css('font-size');
  if (parseInt(fontSize) == 16) {
    fontSize = parseInt(fontSize)+1;
  }
  var newFontSize = parseInt(fontSize)-1;
  
  $('html').css('font-size', newFontSize+'px')
})

$(".despliega").on('click', function(){
      $(".ultransparencia").toggle("fast");
});

});


function animateCSS(element, animationName, callback) {
    const node = document.querySelector(element)
    node.classList.add('animated', animationName)

    function handleAnimationEnd() {
        node.classList.remove('animated', animationName)
        node.removeEventListener('animationend', handleAnimationEnd)

        if (typeof callback === 'function') callback()
    }

    node.addEventListener('animationend', handleAnimationEnd)
}

function ejecutaVoz(){
    $("a,label,h1,h2,p,span").mouseenter(function() {
      var text = $(this).text();
      if (readCookie('voz') != null) {
        responsiveVoice.speak(text,"Spanish Latin American Female");
      }
      
    }); 

}

function ejecutaComandos(){
  var altodoc = $(document).height();
  var bajar =0;
        if (annyang) {
     // Let's define our first command. First the text we expect, and then the function it should call
     var commands = {
     // Se puede agregar mas comandos y cambiar las url de las redes sociales
     'inicio': function() {
         window.location.href="index.php"
      },
      'eventos': function() {
         window.location.href="https://agendacultural.guanajuato.gob.mx/"
      },
      'noticias': function() {
         window.location.href="https://noticias.guanajuato.gob.mx/"
      },
      'facebook': function() {
         window.location.href="https://www.facebook.com/gobiernogto/?ref=br_rs"
      },
      'twitter': function() {
         window.location.href="https://twitter.com/gobiernogto"
      },
      'instagram': function() {
         window.location.href="https://www.instagram.com/gobiernogto/"
      },
      'youtube': function() {
         window.location.href="https://www.youtube.com/user/gobiernoguanajuato"
      },
      'Whatsapp': function() {
         window.location.href="https://api.whatsapp.com/send?phone=524772745825&text=Bienvenido a Gobierno del Estado de Guanajuato en que te podemos apoyar, envía este texto con tu pregunta:"
      },
      'inicio de pagina': function(){
              //window.scrollTo(0, 0);
              $("html, body").animate({ scrollTop: 0 }, 100);
      },
      'fin de pagina': function(){
              $("html, body").animate({ scrollTop: $(document).height() }, 100);
      },
      'baja': function(){
              if(altodoc > bajar){
                bajar = $(window).scrollTop();
                bajar = bajar+300;
              }
              $("html, body").animate({ scrollTop: bajar }, 100);
      },
      'sube': function(){
              if(0 < bajar){
                bajar = $(window).scrollTop();
                bajar = bajar-300;
              }
              $("html, body").animate({ scrollTop: bajar }, 100);
      }

     };

     // Add our commands to annyang
     annyang.setLanguage("es-MX");
     annyang.addCommands(commands);

     // Start listening. You can call this here, or attach this call to an event, button, etc.
     annyang.start();
   
}
}

      function detenerComandos(){
        if (annyang) {
          annyang.abort();
        }
      }

      function createCookie(name,value,days) {
          if (days) {
              var date = new Date();
              date.setTime(date.getTime()+(days*24*60*60*1000));
              var expires = "; expires="+date.toGMTString();
          }
          else var expires = "";
          document.cookie = name+"="+value+expires+"; path=/";
      }

      function readCookie(name) {
          var nameEQ = name + "=";
          var ca = document.cookie.split(';');
          for(var i=0;i < ca.length;i++) {
              var c = ca[i];
              while (c.charAt(0)==' ') c = c.substring(1,c.length);
              if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
          }
          return null;
      }

      function eraseCookie(name) {
          createCookie(name,"",-1);
      }

      function mostrarAccesible(animacion){
        var aumentadoCont=0;
        createCookie('abrirAccesible', '1', 1);
        $( "body" ).addClass( "only-top-mobil" );
          
          //$('#moduloAccesibilidad2').html('');
          $("#reconocimientoVozV2").css("margin-left","0px");
          //$('#moduloAccesibilidad2').fadeTo(500,1);
          if (animacion=='si') {
            animateCSS('#moduloAccesibilidad2', 'fadeInDown')
          }
          
          $( "#moduloAccesibilidad2" ).show(); 
         $('#cerrarAccesibleT').on("click",function(){
             //$('#moduloAccesibilidad2').fadeTo(500,0);
             
             animateCSS('#moduloAccesibilidad2', 'fadeOutDown', function() {
                $( "#moduloAccesibilidad2" ).hide(); 
                $( "body" ).removeClass( "only-top-mobil" ); 
                eraseCookie('abrirAccesible');
             })

         });

         
          $('#reconocimientoVozV2').click(function () {
            if (readCookie('comandos') === null){
              createCookie('comandos', '1', 1);
              ejecutaComandos();
              $( "#reconocimientoVozV2" ).addClass( "active-accesibil" );
            }else{
              eraseCookie('comandos');
              detenerComandos();
              $( "#reconocimientoVozV2" ).removeClass( "active-accesibil" );
            }
            
          });


          $('#zoominV2').on("click", function () {
            $( "#zoominV2" ).addClass( "active-accesibil" );
            if (aumentadoCont == 0) {
              $("body").removeClass("aumentado2 aumentado3");
              $("body").addClass("aumentado");
            }
            if (aumentadoCont == 1) {
              $("body").removeClass("aumentado aumentado3");
              $("body").addClass("aumentado2");
            }
            if (aumentadoCont == 2) {
              $("body").removeClass("aumentado aumentado2");
              $("body").addClass("aumentado3");
              aumentadoCont = -1;
            }
            aumentadoCont++
              

          });
          $('#zoomoutV2').on("click", function () {
              $("body").removeClass("aumentado aumentado2 aumentado3");
              $("#zoominV2").removeClass("active-accesibil"); 

          });


          $('#lecturaSeleccionV2').click(function () {
            if (readCookie('voz') === null){
              createCookie('voz', '1', 1);
              $( "#lecturaSeleccionV2" ).addClass( "active-accesibil" );
              ejecutaVoz();
            }else{
              eraseCookie('voz');
              $("#lecturaSeleccionV2").removeClass("active-accesibil");
            }
            
          });
          
      
      }

