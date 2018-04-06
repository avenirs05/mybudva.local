<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Сообщение отправлено</title>
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
		(function (d, w, c) {
			(w[c] = w[c] || []).push(function() {
				try {
					w.yaCounter46639167 = new Ya.Metrika({
						id:46639167,
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
	<noscript><div><img src="https://mc.yandex.ru/watch/46639167" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
</head>
<body>
    <style>
        @media screen 
        and (max-device-width: 767px) {
            div {
                width: 90%;
            }
        }
    </style>
</body>
</html>

<?php

    if(!empty($_POST["phone"])){
        
        $name = trim(stripslashes(strip_tags($_POST["name"])));
        $phone = trim(stripslashes(strip_tags($_POST["phone"])));
        
        if(!empty($_POST["email"]) && !empty($_POST["message"])){
            $email = trim(stripslashes(strip_tags($_POST["email"])));
            $message = trim(stripslashes(strip_tags($_POST["message"])));
        } 
				else{
            $email = "No";
            $message = "";
        }
        
        $subject = "Новое сообщение с сайта mybudva.com";
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: С сайта <'.$email.'>' . "\r\n";
        
        $message = '
        <html>
            <head>
                <title>Новое сообщение с сайта</title>
            </head>
            <body style="font-family:Verdana,sans-serif;">
                <p><b>Имя:</b> "'.$name.'"</p>
                <p><b>E-mail:</b> "'.$email.'"</p>
                <p><b>Телефон:</b> "'.$phone.'"</p>
                <p><b>Сообщение:</b><br>"'.$message.'</p><br>----------<br>
            </body>
        </html>
        ';
        
        //SendMail($admin_email, $user_email, $subject, $msg, $headers);
        mail("aceking2032@gmail.com, avenirs05@gmail.com, mybudva@gmail.com", $subject, $message, $headers);
        
        echo 
        ' <div  
                    style="text-align: center;
                    background: #689DEC;
                    display: block;
                    margin: 10% auto 0;
                    width: 80%;
                    font-size: 36px;
                    padding: 2em;
                    color: #fff;
                    font-family: Verdana, sans-serif;
                    border-radius: 5px;">
            <p>Ваша заявка успешно отправлена! 
             Специалист свяжется с Вами в ближайшее время. Вернуться на <a style="color: #fff;" href="/">Главную</a></p>
          </div>    
        ';
    }

?>