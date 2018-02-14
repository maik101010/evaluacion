<?php
use richardfan\widget\JSRegister;
?>




<?php JSRegister::begin(); ?>
<script>
	/* Carga de datos */
	var linkProfesiones = '<?= Url::to(['profesiones/index']) ?>'
	cargarDatos('personas-profesion', linkProfesiones, 'profesion_id', 'nombre')
	cargarDatos('personas-municipio', linkMunicipios, 'municipio_id', 'nombre')
	/* Cargar los datos */
	function cargarDatos(idElemento, link, indice, contenido) {
		/* Consulta de numero de paginas */
		$.ajax({
			url: link,
			type: 'head',
			headers: {
		        'Authorization': 'Bearer ' + '<?= $token ?>'
		    },
		    success: function(res, textStatus, request) {
		    	hacerPeticiones(idElemento, request.getResponseHeader('X-Pagination-Page-Count'), link, indice, contenido)
		    }
		})
	}
	function hacerPeticiones(idElemento, numeroPaginas, link, indice, contenido) {
		/* Consulta de los datos */
		for(var i=0; i<numeroPaginas; i++) {
			$.ajax({
				url: link + '?page=' + (i+1) + '&per-page=50',
				type: 'get',
				headers: {
			        'Authorization': 'Bearer ' + '<?= $token ?>'
			    },
			    success: function(res, textStatus, request) {
			    	for(dato in res) {
			    		$('#' + idElemento).append(`<option value="${eval('res[dato].' + indice)}">${eval('res[dato].' + contenido)}</option>`)
			    	}
			    }
			})
		}
	}
</script>
<?php JSRegister::end(); ?>