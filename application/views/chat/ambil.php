<?php
include('chat.php');
$ch = new Chat();
$ambil = $ch->pesan();
foreach ($ambil as $ulangi):
	// this is emoticon's operation bro 
	$text_awal=$ulangi['pesan'];
	$symbol=array("[kasmaran]","[kedip]","[ketawa]","[marah]","[melet]","[nangis]",
				"[sakit]","[bye]","[maki-maki]","[cmarah]","[cmurung]","[cnangis]",
				"[csedih]","[csenyum]","[bonus]");
				
	$icon=array("<img src='".base_url('assets/chat/')."emot/akasmaran.gif' title='handup'>",
			"<img src='".base_url('assets/chat/')."emot/akedip.gif' title='bingung'>",
			"<img src='".base_url('assets/chat/')."emot/aketawa.gif' title='capek'>",
			"<img src='".base_url('assets/chat/')."emot/amarah.gif' title='cemen'>",
			"<img src='".base_url('assets/chat/')."emot/amelet.gif' title='cool'>",
			"<img src='".base_url('assets/chat/')."emot/anangis.gif' title='galau'>",
			"<img src='".base_url('assets/chat/')."emot/asakit.gif' title='hay'>",
			"<img src='".base_url('assets/chat/')."emot/bye.gif' title='kedip'>",
			"<img src='".base_url('assets/chat/')."emot/maki-maki.gif' title='kesetrum'>",
			"<img src='".base_url('assets/chat/')."emot/marah.gif' title='lol'>",
			"<img src='".base_url('assets/chat/')."emot/murung.gif' title='mewek'>",
			"<img src='".base_url('assets/chat/')."emot/nangis.gif' title='nangis'>",
			"<img src='".base_url('assets/chat/')."emot/sedih.gif' title='nyengir'>",
			"<img src='".base_url('assets/chat/')."emot/smile.gif' title='psimis'>",
			"<img src='".base_url('assets/chat/')."emot/bonus.png' title='rokok'>");
	$pesan=str_replace($symbol,$icon,$text_awal);
	
	
	// this is emoticon's operation bro 
?>
<?php
$ui = $ulangi['nik'];
include('../koneksi.php');
$f = $_mysqli->query("SELECT * FROM penduduk WHERE penduduk.nik = '$ui'");
$foto = mysqli_fetch_array($f);
$ft =  $foto['foto'];
if ($ulangi['nik'] == $_SESSION['userdata']) {
	echo "			
	<div align='right'>
		<p>
			<span class='label label-info text-center'>"
				.$ulangi['nama']."<img src='".base_url('assets/foto/')."$ft' alt='Avatar' class='img-circle '>
			</span><br>
			<small class='muted'>(".$ulangi['waktu'].")</small><br>
			<small>&nbsp;".nl2br($pesan)."</small>
		</p>
	</div>";	
}else{
    echo "			
	<div align='left'>
		<p>
			<span class='label label-warning text-center'>
				<img src='".base_url('assets/foto/')."$ft' alt='Avatar' class='img-circle '>".$ulangi['nama']."
			</span><br>
			<small class='muted'>(".$ulangi['waktu'].")</small><br>
			<small>&nbsp;".nl2br($pesan)."</small>
		</p>
	</div>";
}

endforeach;
?>