<?php include("header.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
 
<body>

    <!-- -->
   <div align="left" style="padding-left:550px">
    <form action="" method="get"> <!-- Get metodunun kullanıldığı bir form 
                                    oluşturuyoruz bu form action kısmı boş 
                            bırakıldığından aynı sayfa içerisinde işlenecek-->
    <?php                            
	if($_GET){ //Eğer get işlemi varsa(form oluşturulurken get metodu 
	           //kullanıldığından)
		$girilenAd=$_GET['ad']; //$girilenAd değişkenine adı ata
		$girilenYorum=$_GET['yorum']; //$girilenYorum değişkenine 
		                             //yorumu ata
		echo "Hosgeldiniz ".$girilenAd; /*Gonder butonuna tıklandığında 
		                    "Hosgeldiniz " ifadesinin yanına $girilenAd 
		                                  değişkenini ekleyerek ekrana yaz*/ 
		echo"</br></br>";
		echo"Yorumunuz:".$girilenYorum; /*Gonder butonuna tıklandığında 
		                      "Yorumunuz:" ifadesinin yanına $girilenYorum 
		                                  değişkenini ekleyerek ekrana yaz*/
		echo"</br></br>";
		}	
		
    ?>
    Ad:</br><input type="text" name="ad" ></br> <!--Kullanıcıdan $girilenAd değişkenine yazılması gereken değeri al-->
    Yorum:</br> <textarea name="yorum" rows="8" style="width:250px"></textarea></br> <!--Kullanıcıdan $girilenYorum değişkenine yazılması 
                                                                   gereken değeri al-->
    <input type="submit" name="git" value="Gonder" > <!--Gonder butonuna tıklandığında değerler alınacak-->
    </form>
    
  

   
  

<br /><br /><br /><br />


<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Yardım!    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">  XSS(Cross Site Scripting, CSS) </h4>
      </div>
      <div class="modal-body">
      Nedir?<br />
       XSS (Siteler arası betik çalıştırma) zafiyeti, saldırganın html, css, javascript ile hazırlamış olduğu zararlı kod parçalarının hedef kullanıcının browserında izinsiz olarak çalıştırmasına imkan tanıyan bir web uygulama güvenliği zafiyetidir. Bir web uygulamasının girdi olarak kabul ettiği kodu filtrelemeden kullanıcıya sunması sonucunda ortaya çıkmaktadır. Saldırgan, hedef kullanıcının oturum bilgilerini, ekran görüntüsünü, tuş girişleri gibi bilgileri alabilir, uygulama içeriği üzerinde değişiklikler yapabilir. Bu zafiyet istismar edilirken bazen kullanıcının insiyatifine bağlı olurken(Reflected ve DOM based türlerinde) bazen de saldırgan, kullanıcıyla muhattap olmadan da zafiyetten etkilenmesini sağlayabilir(persistent türünde).

        <br /><br />
Neden Kaynaklanır?<br />
 <img src="../xss.jpg" width="644" height="346"> <br />
Yukarıdaki kodu incelediğimizde alınan "ad" ve "yorum" değişkenlerine herhangi bir filtreleme uygulanmadığı görülüyor.Herhangi bir kontrol ve filtreleme uygulanmaması durumunda kötü niyetli kullanıcı ad veya yorum kısmına html,css,javascript ile hazırlamış olduğu zararlı kod parçalarını yerleştirebilir,bu kod parçaları bizim programımızda bulunmamasına rağmen kontrol olmadığından bizim programımızda varmış gibi gözükür ve kullanıcı tarafından yazılan her kod sorunsuz bir şekilde çalışır.If içerisinde değişkenlere atama işlemi yapılırken filtreleme işlemi gerçekleşmediğinden bu açık ortaya çıkmıştır.

<br /><br />


Açığın Önlenmesi<br />
<img src="../xssOnleme.jpg" width="765" height="291"><br /><br />
Yukarıdaki kodu incelediğimizde alınan "ad" ve "yorum" değişkenleri bir dizi içerisinde tutuluyor.FILTER_SANITIZE_STRING kontrol ve filtreleme uygulanmasıyla çeşitli html,css,javascript etiketleri ve özel karakterler engellenmiş oluyor bu sayede kötü niyetli kullanıcı ad veya yorum kısmına html,css,javascript ile hazırlamış olduğu zararlı kod parçalarını yerleştirse bile bu kod parçaları filtrelemeler ile dönüştürülerek işlevselliğini 
yitiriyor.Filtreleme ve kontrol sayesinde program içerisinde bulunmayan kod parçaları çalışmıyor.<br /><br />

Javascript Sömürüsü<br />
http://localhost/yazlab/includes/xss.php?ad=&yorum=%3Cscript%3Ealert%28%27ZAFIYET%27%29%3C%2Fscript%3E&git=Gonder </br><br />
HTML Sömürüsü<br />
http://localhost/yazlab/includes/xss.php?ad=&yorum=%3Ci%3Eay%C5%9Feg%C3%BCl%3C%2Fi%3E%0D%0A%3Ch1%3Efatma%3C%2Fh1%3E&git=Gonder <br />



<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
      
</div>
    </div>
  </div>
</div>
</div>
 </div>
 </div>

</body>
</html>