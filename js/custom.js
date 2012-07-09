//Listner for Contact Me Button
jQuery("#contsub").live('click', function() { $('#contme').submit(); } );
jQuery("#contme").live("submit", function() {
		
			var $thform = jQuery(this);
			$thform.find('.help-inline').html('').hide();
			var err = false;
			
			var $nameinp = $thform.find('input[name="name"]');
			var nameval = $nameinp.val();
			
			if (nameval.length < 1) {
				$nameinp.parent().find('.help-inline').html('*Please enter your name').fadeIn();
				err = true;
			}
			
			var evalidate = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
			var $emailcont = $thform.find('input[name="email"]');
			var emailv = $emailcont.val();
		
			if (emailv.length < 1) {
				$emailcont.parent().find('.help-inline').html('*Please enter your email').fadeIn();
				err = true;
			} else if (!(evalidate.test(emailv))) {
				$emailcont.parent().find('.help-inline').html('*Please enter a valid email').fadeIn();
				err = true;
			}
			
			if(err == true) return false;
			var $elbtn = jQuery('#contsub');
			$elbtn.button('loading');
			var dta = jQuery(this).serializeArray();
		jQuery.ajax({
				type	: "POST",
				cache	: false,
				url		: "/jp/script/sendmail.php",
				data	: dta,
				success: function(data) {
					$('#contactme').modal('toggle');
					$elbtn.button('reset');
				},
				error: function(jqXHR,txtst,errThrwn) { 
					$elbtn.button('reset');
					alert(txtst);alert(errThrwn);
				}
			});

			return false;
		});
		
//QuickSand Code for Work page
jQuery(document).ready(function() {

	function portfolio_quicksand() {

		var $filter;
		var $container;
		var $containerClone;
		var $filterLink;
		var $filteredItems;
		
		$filter = $('.filter button.active').attr('class');
		$filterLink = $('.filter button');
		$container = $('ul.filterable-grid');
		$containerClone = $container.clone();
		
		$filterLink.click(function(e) {

			$container.find('li p[class^="excpt"]').removeClass('vis').hide();
			
			$('.filter button').removeClass('active');
			$filter = $(this).find('span').attr('class').split(' ');
			$(this).addClass('active');
			
			if ($filter == 'all') {
				$filteredItems = $containerClone.find('li');
			} else {
				$filteredItems = $containerClone.find('li[data-type~=' + $filter + ']');
			}
			
				$container.quicksand($filteredItems,
				{
					duration: 750,
					easing: 'easeInOutCirc',
					adjustHeight: 'dynamic'
				});

		});

	}

	if(jQuery().quicksand) {

		portfolio_quicksand();

	}
	
	$('.filterable-grid > li').live("hover", function() {
	
		var $pexcpt = $(this).find('p[class^="excpt"]');
		$pexcpt.stop(true, true);
		if ($pexcpt.hasClass('vis')) {
			$pexcpt.removeClass('vis').fadeOut();
		} else {
			$pexcpt.addClass('vis').fadeTo("fast", .85);
		}
	
	});
	
	if ($("[rel=tooltip]").length) {
     $("[rel=tooltip]").tooltip();
     }

});