/*Script customizado*/
$(document).ready((e)=>{

	//lógica executada ao clicar no botão "baixar"
	$('button').on('click',(e)=>{
		
		e.preventDefault();
		
		let dados = $('form').serialize();

		$.ajax({
			type: 'POST',
			url: 'ExportadorController.php',
			contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
				data: dados, //s-www-form-urlencoded
				dataType: 'json',
				success: dados =>{ 
					//exibir msg erro para "período inválido" ou "registro não encontrado"
					if(dados.erro == 'periodoInvalido'){
						Swal.fire({
							icon: 'error',
							title: 'Intervalo inválido!',
							text: 'O período permitido para pesquisa deve compreender no máximo 31 dias, entre as datas inicial e final.'
						})
					}else if(dados.erro == 'registroNaoEncontrado'){
						Swal.fire({
							icon: 'error',
							title: 'Registro não encontrado!',
							text: 'Revise o período selecionado, pois é possível que não existam registros para o intervalo.'
						})
					}else{
						//gerar CSV
						let t = json2CSV(dados);
					}
					
				},
				error: erro => { console.log(erro) }
		});//ajax

});//button


	//Exibir loading sempre que uma função ajax for executada/finalizada
	$(document).on({

		ajaxStart: function(){$('body').addClass('loading')},
		ajaxStop: function(){$('body').removeClass('loading')}

	});//loading
		
});

//JSON2CSV and DOWNLOAD
function json2CSV(dados){
	
	var csv = dados;
	var x = new CSVExport(csv);
	//return false;

}