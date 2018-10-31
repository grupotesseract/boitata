<footer id="rodape-site">
    <div class="row">
        <div class="col-xs-12" id="infos-rodape">
            <div class="container-footer">
                <img class="logo-rodape" src="/logo_completo.png" alt="Boitatá - Design e Projetos">

                <div class="container-texto-rodape desktop">
                    <a href="mailto:contato@coletivoboitata.com.br"><b>contato@coletivoboitata.com.br</b></a>
                    <div class="wrapper-social-links">
                        @include ("partials.social-media-links", ['extraClasses' => 'filtro-preto'])
                    </div>
                </div>

                <div class="container-texto-rodape mobile">
                    <div class="wrapper-social-links">
                        @include ("partials.social-media-links", ['extraClasses' => 'filtro-preto'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
