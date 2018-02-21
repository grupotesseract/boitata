
<section id="secao-video">

{{--
<video autoplay muted playsinline>
  <source src="http://res.cloudinary.com/tesseract/video/upload/v1507440713/home_video.mp4" type="video/mp4">
  <source src="http://res.cloudinary.com/tesseract/video/upload/v1519179755/home_video_qpqlye.ogv" type="video/ogv">
</video>
--}}

<video autoplay="autoplay" @if( isset($isMobile) && $isMobile ) controls @endif muted poster="html5video/home_video.jpg" style="width:100%" title="home_video">
    <source src="html5video/home_video.m4v" type="video/mp4" />
    <source src="html5video/home_video.webm" type="video/webm" />
    <object type="application/x-shockwave-flash" data="html5video/flashfox.swf" width="1920" height="850" style="position:relative;">
        <param name="movie" value="html5video/flashfox.swf" />
        <param name="allowFullScreen" value="true" />
        <param name="flashVars" value="autoplay=true&amp;controls=false&amp;fullScreenEnabled=false&amp;posterOnEnd=true&amp;loop=false&amp;poster=html5video/home_video.jpg&amp;src=home_video.m4v" />
         <embed src="html5video/flashfox.swf" width="1920" height="850" style="position:relative;"  flashVars="autoplay=true&amp;controls=false&amp;fullScreenEnabled=false&amp;posterOnEnd=true&amp;loop=false&amp;poster=html5video/home_video.jpg&amp;src=home_video.m4v"	allowFullScreen="true" wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_en" />
        <img alt="home_video" src="html5video/home_video.jpg" style="position:absolute;left:0;" width="100%" title="Video playback is not supported by your browser" />
    </object>
</video>

</section>
