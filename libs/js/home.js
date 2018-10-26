$(document).ready(function(){
	function mask() {
		$('#telefone').mask('(00) 0000-0000');
		$("#rg").mask("99.999.999-9");
	}

	function validation_form() {
		$.validator.addMethod('regex', function(value, element, param) {
			return this.optional(element) ||
			value.match(typeof param == 'string' ? new RegExp(param) : param);
		},
		'Telefone inválido.');
		$("#form-rpm").validate({
			rules: {
				'nome': {
					required: true
				},
				'email': {
					required: true,
					email: true
				},
				'senha': {
					required: true,
					minlength: 6
				},
				'confsenha': {
					required: true,
					minlength: 6,
					equalTo: "#senha"
				},
				'cep': {
					required: true,
					minlength: 8
				},
				'telefone': {
					required: true,
					regex: /^\([1-9]{2}\) [2-9][0-9]{3,4}\-[0-9]{4}$/
				},
				'rg': {
					required: true
				}
			}
		});
	}

	mask(); //Mascara Inputs
	validation_form(); //Validação input
})