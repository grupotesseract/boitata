@extends ('master')

@section ('content')

		
	<section id="contato">

		<div class="container">
		
			<div class="col-md-6 col-xs-12">
			</div>

			<div class="col-md-6 col-xs-12 inicioc">
				<div class="col-md-6 col-xs-12col">
					<h2>fale conosco</h2>
				</div>
				
				<div class="col-md-12 col-xs-12">
					<p>Ainda não sabe bem do que você ou sua empresa precisam?<br>
					Vamos conversar e ver qual a melhor maneira de atendê-los</p>		
				</div>
			</div>

			<!--contatos, boitata, thom e carol-->
			<div class="col-md-6 col-xs-12 pessoas">
				@include ('contato.people')				
			</div>

			<!--ajuste de quebra-->
			<div class="clearfix visible-xs-block"></div>

			<!--descrição e caixa de email-->
			<div class="col-xs-12 col-sm-6 formemail">
				@include ('contato.emailcontato')
			</div>

		</div>

	</section>
	
@endsection 