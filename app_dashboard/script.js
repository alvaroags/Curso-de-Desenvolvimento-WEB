$(document).ready(() => {
	$('#documentacao').on('click', () =>{
        $('#pagina').load('documentacao.html')
    })

	$('#suporte').on('click', () =>{
        $('#pagina').load('suporte.html')
    })

    $('#index').on('click', () => {
        $('body').load('index.html')
    })

    $('#competencia').on('change', e => {

        let competencia = $(e.target).val()

        $.ajax({
            type: 'GET',
            url: 'app.php',
            data: `competencia=${competencia}`,
            dataType: 'json',
            success: dados => {
                $('#display_num_vendas').html(dados.numeroVendas)
                $('#display_total_vendas').html(dados.totalVendas)
                $('#display_cliente_ativo').html(dados.clientes_ativos)
                $('#display_cliente_inativo').html(dados.clientes_inativos)
                $('#display_reclamacoes').html(dados.reclamacoes)
                $('#display_elogios').html(dados.elogios)
                $('#display_sugestoes').html(dados.sugestoes)
                $('#display_despesas').html(dados.despesas)
                console.log(dados)
            },
            // error: erro => {console.log(erro)}
        })
    })
})