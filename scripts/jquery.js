function myFunction(x) {
    x.classList.toggle("change");
}

const menu = document.querySelector('.ham-icon');
menu.addEventListener('click', function() {
    myFunction(this);
}, false);



