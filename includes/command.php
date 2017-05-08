<?php 
include("header.php"); ?>
<br />
<form method="GET" >
<table align="center">
<tr>
<td>ip</td>
<td>:</td>
<td><input type="text" name="ip"></td>
</tr>
<tr> 
<td></td>
<td></td>
<td><input type="submit" value="Uygula" name="Uygula"></td>
</tr>
</table>
</form>


 <?php 
 error_reporting(E_ALL ^ E_NOTICE);
 if( isset( $_GET[ 'Uygula' ]  ) ) 
 {
 $hedef = $_GET[ 'ip' ]; 
 $cmd="ping $hedef	"; //ping atma kodu
 exec($cmd,$gelen); //kodun çalıştırılması 
 foreach($gelen as $veri)
 echo"$veri <br/>"; //ekrana ping kodlarının yazdırılması. 
 }
	 else
{}
 ?>
 <br /><br /><br /><br /><br /><br /><br /><br />
 <div align="left" style="padding-left:650px">
 <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Yardım!     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">  COMMAND INJECTION</h4>
      </div>
      <div class="modal-body">
      Nedir?<br />
      Command Injection, yani komut enjeksiyonu saldırganın zafiyet barındıran bir uygulama üzerinden hedef sistemde dilediği komutları çalıştırabilmesine denir. Komut ile kastedilen şey Windows'ta CMD ve Linux'ta Terminal pencerelerine girilen sistem komutlarıdır. 
        <br /><br />
Neden Kaynaklanır?<br />
<img src="../command.jpg" width="487" height="224"><br />
Command Injection saldırısı büyük oranda yetersiz input denetleme mekanizması nedeniyle gerçekleşmektedir.Örnekte görüldüğü gibi uygulama üzerindeki IP adresi parametresi, girilen işletim sistemi komutlarını filtrelemeden arka taraftaki sunucu üzerinde çalıştıracak şekilde ayarlanmıştır. Saldırganlar bu zafiyetten yararlanarak sunucuyu ele geçirebilirler.

<br /><br />

Açığın Önlenmesi<br />
<img src="../commandOnleme.jpg" width="640" height="336"><br /><br />
IP adresi parametresine girilen girdiler dörde bölündükten sonra tam sayımı diye kontrol edilirler. Eğer kullanıcı uygulamaya IP adresi formatının dışında bir girdi gönderirse uygulama kullanıcıyı geçersiz bir IP adresi girdiğine dair uyarır. Kullanıcıya verilen tek opsiyon ‘ping’ komutunu çalıştırmaktır. Böylece saldırganlar parametreyi kötüye kullanarak arka taraftaki sunucuya komut gönderemezler.<br /><br />

Dosyalara Ulaşmak İçin<br />
http://localhost/yazlab/includes/command.php?ip=localhost+%26%26+dir&Uygula=Submit </br><br />

Versiyon Öğrenmek İçin<br />
http://localhost/yazlab/includes/command.php?ip=localhost+%26%26+ver&Uygula=Submit <br /><br />

C diskinde olan belgeleri görüntülemek İçin(Üst dizine çıkma işlemi kullanılmıştır)<br />
http://localhost/yazlab/includes/command.php?ip=localhost+%26%26+cd..+%26%26+cd..+%26%26+DIR&Uygula=Submit <br />



<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
      
</div>
    </div>
  </div>
</div>
</div>
 </div>
 </div>