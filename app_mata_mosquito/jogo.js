var altura = 0 
var largura = 0
var vidas = 1
var tempo = 5

function ajustaTamanhoPalcoJogo() {
    altura = window.innerHeight
    largura = window.innerWidth
}

var cronometro = setInterval(function(){
    tempo -= 1
    if(tempo < 0){
        clearInterval(cronometro)
        clearInterval(criaMosquito)
        window.location.href = 'vitoria.html'
    }else
        document.getElementById('cronometro').innerHTML = tempo
}, 1000)

ajustaTamanhoPalcoJogo()

function posicaoRandomica() {

    // remover o mosquito anterior (caso exista)

    if(document.getElementById('mosquito')){
        document.getElementById('mosquito').remove()
        
        if(vidas > 3){
            window.location.href = 'fim_de_jogo.html'
            return false
        }else{
            document.getElementById('v' + vidas).src = 'imagens/coracao_vazio.png'
            vidas++
        }
    }

    var posicaoX = Math.floor(Math.random() * largura) - 90
    var posicaoY = Math.floor(Math.random() * altura) - 90

    posicaoX = posicaoX < 0 ? 0 : posicaoX // se a posição X for menor que 0, recebe 0, se não recebe a posição X
    posicaoY = posicaoY < 0 ? 0 : posicaoY // se a posição Y for menor que 0, recebe 0, se não recebe a posição Y

    // criar o mosquito

    var mosquito = document.createElement('img')
    mosquito.src = 'imagens/mosquito.png'
    mosquito.className = tamanhoRandomico() + ' ' + ladoRandomico()
    mosquito.style.left = posicaoX + 'px'
    mosquito.style.top = posicaoY + 'px'
    mosquito.style.position = 'absolute'
    mosquito.id = 'mosquito'
    document.body.appendChild(mosquito)
    mosquito.onclick = function(){
        this.remove()
    }
}

function tamanhoRandomico(){
    var classe = Math.floor(Math.random() * 3)
    switch(classe){
        case 0:
            return 'mosquito1'
        case 1:
            return 'mosquito2'
        case 2:
            return 'mosquito3'
    }
}

function ladoRandomico(){
    var classe = Math.floor(Math.random() * 2)
    switch(classe){
        case 0:
            return 'ladoA'
        case 1:
            return 'ladoB'
    }
}
