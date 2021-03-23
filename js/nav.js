var nav = document.getElementById('block-nav')

var btn_ham = document.getElementById('btn-ham')
btn_ham.addEventListener('click',affichageNav)


var stock = 1

function affichageNav(){


    if(stock == 1 ){

        nav.style.display = "none"
        stock--
        
    }else if(stock == 0){
        nav.style.display = "flex"
        stock++
        
    }else{
        stock = 0
    }

}

affichageNav()
