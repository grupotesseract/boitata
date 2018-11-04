/**
 * Função para dar trocar as classes de CSS que fazem a animação do menu principal
 */
window.playAnimacaoMenu = function() {

    let borda = $('.borda-menu-principal');

    //Tirando clase escondida e adicionando classe da animacao
    borda.removeClass('escondida').addClass('play-animacao-borda');

    setTimeout(function() {
        $('.logo-menu-principal').removeClass('escondida').addClass('play-animacao-logo');
    }, 600);

};


$(function () {
    //Se estiver acessando algo diferente da HOME, o efeito é no Onload
    if (location.pathname != "/") {
        setTimeout(playAnimacaoMenu(), 1500);
    }

    //Se for a HOME, bindar no scroll
    else {
        $(window).scroll(function () {
           var scrollTop = $(window).scrollTop();
           if (scrollTop > 400) {
               playAnimacaoMenu();
           }
        });
    }

    // Quem Somos
    let quemSomos = $('.quem-somos');
    if (quemSomos.length) {
        let quemSomosTarefas = $('.quem-somos-tarefas');
        quemSomosTarefas.find('.item').on('click', function (event) {
            let item;
            if ($(event.target).is('.item')) {
                item = $(event.target);
            } else {
                item = $(event.target).parents('.item');
            }

            if (item.hasClass('clicked')) {
                item.find('.text').removeClass('show-text');
                item.removeClass('clicked');
            } else {
                item.addClass('clicked');
                item.find('.text').addClass('show-text');
            }
        });
    }
});
