<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no" />
    <title><?php is_home() ? bloginfo('description') : wp_title(''); ?></title>

    <style>    
        .main-screen {
            background-image: url("<?php bloginfo('template_url')?>/images/main.jpg");
            min-height: 573px;
        }
        @font-face {
            font-family: "OpenSansCondensedLight";
            src: url("<?php bloginfo('template_url')?>/fonts/OpenSans-CondLight.ttf") format("truetype");
            font-style: normal;
            font-weight: normal;  
        }
    </style>

    <!-- BEGIN JIVOSITE CODE {literal} -->
    <script type='text/javascript'>
    (function(){ var widget_id = 'cvuOugk0Gb';var d=document;var w=window;function l(){
    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
    <!-- {/literal} END JIVOSITE CODE -->

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter40484805 = new Ya.Metrika({
                        id:40484805,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/40484805" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    
<?php wp_head(); ?>    
</head>
<body>

<div class="container-fluid visible-md-block visible-lg-block header">
    <div class="row to-fixed">
        <div class="col-md-12">
            <div class="header-left">
                <div class="header-logo">
                    <img src="<?php bloginfo('template_url');?>/images/logo-white.png" alt="">
                </div>
                <ul class="header-menu" id ="header-menu">
                    <?php dynamic_sidebar('menu-header'); ?>
                </ul> 
            </div>
            <div class="header-right">
                <div class="header-phone">
                    <div class="header-phone-img glyphicon glyphicon-earphone" aria-hidden="true">      
                    </div>
                    <div class="header-phone-digits">
                        +382 68 642 007
                    </div>
                </div>
                <div class="header-callback">
                    <div class="header-callback-email">
                        info@mybudva.com
                    </div>
                    <div class="header-callback-btn">
                        <button id="callback">ОБРАТНЫЙ ЗВОНОК</button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<div class="container-fluid visible-xs-block visible-sm-block header-mob" id="to-fixed-mob">
    <div class="row">
        <div class="col-md-12">
            <div id="menu-mob" class="menu-mob">
                <div class="block-in-menu-mob"></div>
                <div class="transp-block-in-menu-mob"></div>
                <div class="block-in-menu-mob"></div>
                <div class="transp-block-in-menu-mob"></div>
                <div class="block-in-menu-mob"></div>
                <div class="transp-block-in-menu-mob"></div>
                <div class="block-in-menu-mob"></div>
            </div>
            <div class="header-logo">
                <img width="80" height="40" src="<?php bloginfo('template_url'); ?>/images/logo-white.png" alt="">
            </div>
            <div class="header-phone-mob">
                <div class="header-phone-img-mob glyphicon glyphicon-earphone" aria-hidden="true">
                </div>
                <div class="header-phone-digits-mob">+382 68 642 007</div>
            </div>        
        </div>    
    </div>
</div>

