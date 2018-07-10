@extends ('master')

@section ('content')

    <section id="contato">
        <div class="container containerCont">

            <div class="col-md-6 col-xs-12">
            </div>

            <div class="col-md-6 col-xs-12 inicioc">
                <div class="col-md-6 col-xs-12col">
                    <h2>fale conosco</h2>
                </div>

                <div class="col-md-12 col-xs-12">
                    <p>Ainda não sabe bem do que você ou sua empresa precisam?</p>
                    <p>Vamos conversar e ver qual a melhor maneira de atendê-los</p>		
                </div>
            </div>

            <!--contatos, boitata, thom e carol-->
            <div class="col-md-6 col-xs-12 pessoas">
                @include ('contato.people')				
            </div>

            <!--descrição e caixa de email-->
            <div class="col-md-6 col-xs-12 formemail">
                @include ('contato.emailcontato')
            </div>

        </div>

    </section>

@endsection 
