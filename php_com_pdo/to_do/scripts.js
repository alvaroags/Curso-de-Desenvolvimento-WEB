function Requisicoes (url, id, t_url) {
    // location.href = "http://localhost/php_com_pdo/to_do/req.php"
    if(t_url == 1)
        history.pushState({}, "", "http://localhost/php_com_pdo/to_do/req.php")
        fetch(url).then(Response => Response.text()).then(data =>{
        document.getElementById('conteudo').innerHTML = data
        mudaCorBotao(id)
        verificaURL()
    })
}
function mudaCorBotao(id){
    resetaBotao()
    if(document.getElementById(id))
        document.getElementById(id).classList.add('active')

}

function resetaBotao() {
    if(document.getElementById('pendente'))
        document.getElementById('pendente').classList.remove('active')
    if(document.getElementById('nova'))
        document.getElementById('nova').classList.remove('active')
    if(document.getElementById('todas'))
        document.getElementById('todas').classList.remove('active')

}
function verificaURL(){
    var url = location.href
    var pattern = /inclusao/
    console.log(url)
    if(pattern.test(url)){
        let div = document.createElement('div')
        div.className = 'bg-success pt-2 text-white d-flex justify-content-center'
        div.innerHTML = '<h5>Tarefa inserida com sucesso!</h5>'
    }
}  