/**
 * Created by Daymel on 14/10/2016.
 */
$(document).ready(function ()
{
		$('ul.tabs').tabs({swipeable: true});
		var url = "/movil/getMovile";
		var moviles = {};
		Materialize.showStaggeredList('#row_prod');
		$.get(url, function (data)
		{
				//success data
				moviles = data.resultado;
				$('input.autocomplete').autocomplete({
						data: moviles
				});
		})
		Materialize.updateTextFields();
		$(".dropdown-button").dropdown({
				outDuration: 10, belowOrigin: true
		});
		// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
		$('.modal-trigger').leanModal();
});