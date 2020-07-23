/* ---- particles.js config ---- */

particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 100,
      "density": {
        "enable": true,
        "value_area":700
      }
    },
    "color": {
      "value": ["#aa73ff", "#f8c210", "#83d238","#fff", "#33b1f8"]
    },
    
    "shape": {
      "type": "star",
      "stroke": {
        "width": 2,
        "color": "#f8c210"
      },
      "polygon": {
        "nb_sides": 8
      },
      "image": {
        "src": "../img/cpbit.png",
        "width": 200,
        "height": 200
      }
    },
    "opacity": {
      "value": 0.9,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 5,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 5,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
  },
 
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "grab"
      },
      "onclick": {
        "enable": false
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 200,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 5,
        "opacity": 5,
        "speed": 10
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});