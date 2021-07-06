$(function Menu(){
    //<i class="fas fa-times"></i>
    $('nav.menu-mobile').click(function(){
        let listMenu = $('nav.menu-mobile ul');
        let icon = $('.icon-mobile').find('i');

        if(listMenu.is(':hidden')){
            icon.removeClass('fa-bars');
            icon.addClass('fa-times');
            listMenu.slideToggle();
        }else{
            icon.removeClass('fa-times');
            icon.addClass('fa-bars');
            listMenu.slideToggle();
        }
        
    })    
});

if($('target').length > 0){
    let elemento = '#'+$('target').attr('target');
    let divScroll = $(elemento).offset().top;

    $('html.body').animate({scrollTop:divScroll},2000);
}

carregarDinamico();
	function carregarDinamico(){
		$('[realtime]').click(function(){
			var pagina = $(this).attr('realtime');
			$('.container-principal').hide();
			$('.container-principal').load(include_path+'pages/'+pagina+'.php');
			
			setTimeout(function(){
				initialize();
				addMarker(-27.609959,-48.576585,'',"Minha casa",undefined,false);

			},1000);

			$('.container-principal').fadeIn(1000);
			window.history.pushState('', '',pagina);

			return false;
		})
	}

