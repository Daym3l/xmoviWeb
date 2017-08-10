/**
 * Created by Daymel on 02/11/2016.
 */
jQuery.fn.reset = function ()
{
		$(this).each(function ()
		{
				this.reset();
		});
}
$(document).ready(function ()
{
	
		Materialize.showStaggeredList('#list_moviles');


		$('.modal-trigger').leanModal();
		$('select').material_select();


		//accion add
		$('#add_btn').on('click', function ()
		{
				$('#modal_add').openModal();
		})

		//Accion search
		$('#search_btn').on('click', function ()
		{
				$('#reload_btn').show();
				$('#modal_search').openModal();

		})

		//Cancelar
		$('#cancelar').on('click', function ()
		{
				$('#form_add').reset();

		})


		$('#aplicar').on('click', function ()
		{
				console.log( $('#form_add').getValue())
				// $('#form_add').submit();
		})
		//accion img
		$("img").on("click", function ()
		{
				$('#modal_img').openModal();
				$('#imagen_card').attr("src", this.src);
				Materialize.fadeInImage('#modal_img');
			
		});
		
});