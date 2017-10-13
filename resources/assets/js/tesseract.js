
/**
 * Função para dar trocar as classes de CSS que fazem a animação do menu principal
 */
window.playAnimacaoMenu = function() {
    
    let borda = $('.borda-menu-principal');
    
    //Tirando clase escondida e adicionando classe da animacao
    borda.toggleClass('escondida').addClass('play-animacao-borda');

    setTimeout(function() {
        $('.logo-menu-principal').toggleClass('escondida').addClass('play-animacao-logo');
    }, 600);

};

