'use strict';

document.getElementById('btn').addEventListener("click", salvaCadastro);

function salvaCadastro(){
    document.getElementById('endereco').value = '';
    document.getElementById('bairro').value = '';
    document.getElementById('estado').value = '';
    document.getElementById('cidade').value = '';
    document.getElementById('nome').value = '';
    document.getElementById('email').value = '';
    document.getElementById('cep').value = '';
    document.getElementById('numero').value = '';
    document.getElementById('DDD').value = '';
}

const limpaCadastro = () => {
    document.getElementById('endereco').value = '';
    document.getElementById('bairro').value = '';
    document.getElementById('estado').value = '';
    document.getElementById('cidade').value = '';
    document.getElementById('DDD').value = '';
}
const preencheCadastro = (endereco) => {
    document.getElementById('endereco').value = endereco.logradouro;
    document.getElementById('bairro').value = endereco.bairro;
    document.getElementById('estado').value = endereco.uf;
    document.getElementById('cidade').value = endereco.localidade;
    document.getElementById('DDD').value = endereco.ddd
}

const verificaNumero = (numero) => /^[0-9]+$/.test(numero);
const verificaCep = (cep) => cep.length == 8 && verificaNumero(cep);

const pesquisarCep = async() => {
    const cep = document.getElementById('cep').value;
    const url = `http://viacep.com.br/ws/${cep}/json/`;
    limpaCadastro();

    if(verificaCep(cep)){
        const dados = await fetch(url);
        const endereco = await dados.json();
        console.log(endereco);
        if(endereco.hasOwnProperty('erro'))
            document.getElementById('endereco').value = 'CEP não encontrado';
        else
            preencheCadastro(endereco);
    }else if(cep == '')
        document.getElementById('endereco').value = '';
    else
        document.getElementById('endereco').value = 'CEP incorreto';
}

document.getElementById('cep').addEventListener('focusout', pesquisarCep);