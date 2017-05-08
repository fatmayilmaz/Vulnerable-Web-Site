<form action="" method="get"> <!-- Get metodunun kullanıldığı bir form oluşturuyoruz bu form action kısmı boş 
      //filtreli
                                      bırakıldığından aynı sayfa içerisinde işlenecek-->
    <?php                            
        if($_GET){ //Eğer get işlemi varsa(form oluşturulurken get metodu kullanıldığından)
		$alinanDegerler=array("ad"=>FILTER_SANITIZE_STRING, /*Dizi içerisinde ad ve yorum değişkenleri filtrelenerek
                                                             (etiketler ve özel karakterler temizlenerek) tutulur
		                   dizide tutulan değerler $alinanDegerler değişkenine ata*/ 
		"yorum"=>FILTER_SANITIZE_STRING); 
		$filtrelenmisDegerler=filter_input_array(INPUT_GET,$alinanDegerler); /*Get metodu ile gelen değerler filtrelenerek
                                                                             filter_input_array dizisinde tutulur */
		echo "Ad:".$filtrelenmisDegerler["ad"]; //Filtrelenmiş ad değişkenini yaz
		echo"<br/";
		echo"Yorum:".$filtrelenmisDegerler["yorum"]; //Filtrelenmiş yorum değişkenini yaz
		exit(); //get işlemi yapıldıktan sonra alttaki değerlerle karışmaması için kullanıldı
		
		}	
		
    ?>
    Ad:</br><input type="text" name="ad" ></br> <!--Kullanıcıdan $girilenAd değişkenine yazılması gereken değeri al-->
    Yorum:</br> <textarea name="yorum" rows="10"></textarea></br> <!--Kullanıcıdan $girilenYorum değişkenine yazılması 
                                                                   gereken değeri al-->
    <input type="submit" name="git" value="Gonder" > <!--Gonder butonuna tıklandığında değerler alınacak-->
    </form>