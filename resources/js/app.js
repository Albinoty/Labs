require('./bootstrap');


//Script du Labs
require('jquery/dist/jquery');
require('bootstrap/dist/js/bootstrap.bundle');
require('magnific-popup/dist/jquery.magnific-popup');
require('./owl.carousel.min.js');
require('jquery-circle-progress/dist/circle-progress');
require('./main');

// substr()
    
if (window.location.href == "http://127.0.0.1:8000/?page=1" || window.location.href == "http://127.0.0.1:8000/service?page=2"|| window.location.href == "http://127.0.0.1:8000/?page=2"|| window.location.href == "http://127.0.0.1:8000/service?page=1"){
    window.location = '#service';
}

let contact = document.querySelector('#msg')
let newsletter = document.querySelector('#newsletter')

if(contact != null)
    window.location = "#con_form"
// if(newsletter != null)
//     window.location = "#news"