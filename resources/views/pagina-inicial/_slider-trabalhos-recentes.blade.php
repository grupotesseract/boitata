  <div id="tesseract-carousel" class="carousel slide carousel-fade" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
    @foreach ($trabalhosRecentes as $key => $TrabalhoRecente)
      <li data-target="#tesseract-carousel" data-slide-to="{{$key}}" class="@if($TrabalhoRecente->ordem==1) active @endif"></li>
    @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

    @foreach ($trabalhosRecentes as $key => $TrabalhoRecente)

      <div class="item @if ($TrabalhoRecente->ordem == 1) active @endif">
        <img src="http://res.cloudinary.com/tesseract/image/upload/c_scale,g_center,h_450,w_800/v1508033622/{{ $TrabalhoRecente->foto->cloudinary_id }}.jpg" alt="{{ $TrabalhoRecente->titulo }}">
          <h3>{{ $TrabalhoRecente->titulo }}</h3>
      </div>

    @endforeach

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#tesseract-carousel" role="button" data-slide="prev">
    </a>
    <a class="right carousel-control" href="#tesseract-carousel" role="button" data-slide="next">
    </a>

  </div>
