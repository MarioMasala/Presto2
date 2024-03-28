import anime from 'animejs/lib/anime.es.js';



// codice relativo del paragrafo del footer (effetto cambio testo)
let pElement = document.getElementById("control-footer-p");

let testi = ["Vuoi lavorare con noi?", "Registrati e clicca qui sotto"];
let indice = 0;
let tempoDiVisualizzazione = 4000; // Tempo in millisecondi per ciascun testo

function cambiaTesto() {
    pElement.style.opacity = 0; // Fai svanire il testo
    setTimeout(function() {
        indice = (indice + 1) % testi.length; // Passa al testo successivo
        pElement.textContent = testi[indice]; // Imposta il nuovo testo
        pElement.style.opacity = 1; // Mostra il nuovo testo
    }, 500); // Aspetta 500 millisecondi prima di cambiare il testo
}

setInterval(cambiaTesto, tempoDiVisualizzazione); // Avvia il loop di testo




// codice per troncare il paragrafo descrizione delle card collegata alla classe .truncate
document.addEventListener("DOMContentLoaded", function() {
    let truncateElements = document.querySelectorAll('.truncate');
    truncateElements.forEach(function(element) {
        let maxLength = 50; // Imposta il numero massimo di caratteri
        let text = element.textContent;
        if (text.length > maxLength) {
            let truncatedText = text.slice(0, maxLength) + '...';
            element.textContent = truncatedText;
        }
    });
});


// codice per cambiare il colore delle icone del footer (ogni icona ha il suo specifico colore)
document.querySelectorAll('.icon-footer').forEach(icon => {
    icon.addEventListener('mouseenter', () => {
        switch (icon.id) {
            case 'linkedin':
            icon.style.color = '#126BC4';
            break;
            case 'github':
            icon.style.color = '#1F1F1F';
            break;
            case 'google':
            icon.style.color = '#4889F4';
            break;
            case 'youtube':
            icon.style.color = 'brown';
            break;
            default:
            break;
        }
    });
    icon.addEventListener('mouseleave', () => {
        icon.style.color = ''; // Ripristina il colore predefinito al passaggio del mouse
    });
});





















// codice di alberto (da aggiungere cosa fa questo script)
function Animation_top() {
    
const observe = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show-top");
      } else {
        entry.target.classList.remove("show-top");
      }
    });
  });

  const hiddenElement = document.querySelectorAll(".hidden-top");
  hiddenElement.forEach((el) => observe.observe(el));

}
Animation_top()

function Animation_right() {
    const observe = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show-r");
        } else {
          entry.target.classList.remove("show-r");
        }
      });
    });
  
    const hiddenElement = document.querySelectorAll(".hidden-r");
    hiddenElement.forEach((el) => observe.observe(el));
  }
  
  Animation_right();


  function Animation_left() {
    const observe = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show-l");
        } else {
          entry.target.classList.remove("show-l");
        }
      });
    });
  
    const hiddenElement = document.querySelectorAll(".hidden-l");
    hiddenElement.forEach((el) => observe.observe(el));
  }
  
  Animation_left();