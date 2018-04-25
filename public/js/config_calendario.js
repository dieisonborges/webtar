/* Javascript */
$('#mes_ano_dia').focus(function(){
	$(this).calendario({
		top:0,
		left:130,
		target :'#mes_ano_dia',								
		dateDefault:$(this).val(),
	});
});