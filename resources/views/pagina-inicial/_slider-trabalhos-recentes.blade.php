  <div id="tesseract-carousel" class="carousel slide carousel-fade" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
    @foreach ($trabalhosRecentes as $key => $TrabalhoRecente)
      <li data-target="#tesseract-carousel" data-slide-to="{{$key}}" class="@if($TrabalhoRecente->ordem==1) active @endif"></li>
    @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="">

    @foreach ($trabalhosRecentes as $key => $TrabalhoRecente)

      <div class="item @if ($key == 0) active @endif">
           <a href="{{ $TrabalhoRecente->url }}" target="_blank">
               <img src="{{ $TrabalhoRecente->foto->URLCloudinary }}" alt="{{ $TrabalhoRecente->titulo }}">
           </a>
          <h3>{{ $TrabalhoRecente->titulo }}</h3>
          @foreach ($TrabalhoRecente->categorias as $Categoria)
              <a href="/portfolio?categoria={{$Categoria->id}}"> <span class="tags">{{$Categoria->nome}}</span> </a>
          @endforeach
      </div>

    @endforeach

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#tesseract-carousel" role="button" data-slide="prev">
    </a>
    <a class="right carousel-control" href="#tesseract-carousel" role="button" data-slide="next">
    </a>

  </div>
