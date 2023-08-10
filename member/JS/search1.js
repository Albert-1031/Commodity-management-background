var plus = document.querySelector('#plusicon');
var minus = document.querySelector('#minusicon');
var zoom = document.querySelector('.zoom');


plus.addEventListener('click',()=>{
    zoom.classList.remove('display')
    minus.classList.remove('display')
    plus.classList.add('display')
})
minus.addEventListener('click',()=>{
    zoom.classList.add('display')
    minus.classList.add('display')
    plus.classList.remove('display')
})