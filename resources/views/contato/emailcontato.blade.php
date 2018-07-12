<!-- descrição, e quadrado do email -->
<div class="text-right premail">
    <p>Deixe sua mensagem ai embaixo ou,<br>
    se preferir, ligue pra a gente.</p>
</div>

<div class="caixa-email">
    @include('adminlte-templates::common.errors')
    @include('flash::message')
    
    <div>
        {!! Form::open(['route' => 'contato']) !!}

        <div class="form-group">
            <label for='name'>NOME</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for='email'>EMAIL</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="title">ASSUNTO</label>
            <input type="text" class="form-control" id="Assunto" name="title">
        </div>

        <div class="form-group input-lg-60">
            <label for="Mensagem">MENSAGEM</label>
            <textarea class="form-control" id="Mensagem" name="body"></textarea>
        </div>

        <div>	  	
            <button type="submit" class="btn btn-default">Enviar</button>
        </div>

        {!! Form::close() !!}
        
    </div>
</div>

<div id="borda-bot"></div>
