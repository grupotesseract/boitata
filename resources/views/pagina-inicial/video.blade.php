
<section id="secao-video">

    {{-- Se for Desktop ou Tablet, mostrar video que ta OK --}}
    @if (\Agent::isDesktop() || \Agent::isTablet())
        <video autoplay muted playsinline @if( isset($isMobile) && $isMobile ) controls @endif>
            <source src="https://res.cloudinary.com/tesseract/video/upload/v1507440713/home_video.mp4" type="video/mp4">
                <source src="https://res.cloudinary.com/tesseract/video/upload/v1519179755/home_video_qpqlye.ogv" type="video/ogv">
        </video>

    {{-- Se for Celular, mostrar imagem pra nao cortar na economia de banda--}}
    @else
        <img class="img-responsive" src="https://res.cloudinary.com/tesseract/image/upload/c_scale,q_auto,w_1000/v1540849431/boitata/Frame_do_V%C3%ADdeo_para_Mobile-01.jpg" alt="Capa com logo e slogan 'Ideias que tomam forma'">
    @endif
</section>
