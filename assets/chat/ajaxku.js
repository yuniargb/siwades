$(document).ready(function () {
	//load pesan
	function ambilpesan() {
		$(".boxpesan").load("ambilchat");
		var con = document.getElementById("boxpesan");
		// con.scrollTop = con.scrollHeight;
	}
	setInterval(ambilpesan, 99999);

	//kirim pesan chat
	$("#formpesan").submit(function () {
		var pesan = $(".input-xlarge").val();
		$.ajax({
			url: baseUrl + "kirimchat",
			type: 'POST',
			data: 'pesan=' + pesan,
			success: function (pesan) {
				// html5 DOM audio play
				var suara = document.getElementById("suara");
				suara.play();
				if (pesan == "terkirim") {
					$(".input-xlarge").val("");
				} else {
					return false;
				}
			},
		});
		return false;

	});
	//hide html audio
	var audio = $('#suara');
	audio.hide();
	//load pesan chat
	function ambilpesan() {
		$("#boxpesan").load(baseUrl + "ambilchat");
		var con = document.getElementById("boxpesan");
		// con.scrollTop = con.scrollHeight;
	}
	setInterval(ambilpesan, 1000);

	//load emoticon
	$("#emott").popover({
		html: true,
		content: function () {
			// emoticon from www.animated-gifs.eu
			return "<img src='" + baseUrl + "assets/chat/emot/akasmaran.gif' title='[kasmaran]' onClick=\"addemot('[kasmaran]')\">" +
				"<img src='" + baseUrl + "assets/chat/emot/akedip.gif' title='[kedip]' onClick=\"addemot('[kedip]')\">" +
				"<img src='" + baseUrl + "assets/chat/emot/aketawa.gif' title='[ketawa]' onClick=\"addemot('[ketawa]')\">" +
				"<img src='" + baseUrl + "assets/chat/emot/amarah.gif' title='[marah]' onClick=\"addemot('[marah]')\">" +
				"<img src='" + baseUrl + "assets/chat/emot/amelet.gif' title='[melet]' onClick=\"addemot('[melet]')\">" +
				"<img src='" + baseUrl + "assets/chat/emot/anangis.gif' title='[nangis]' onClick=\"addemot('[nangis]')\">" +
				"<img src='" + baseUrl + "assets/chat/emot/asakit.gif' title='[sakit]' onClick=\"addemot('[sakit]')\">" +
				"<img src='" + baseUrl + "assets/chat/emot/bye.gif' title='[bye]' onClick=\"addemot('[bye]')\">" +
				"<img src='" + baseUrl + "assets/chat/emot/maki-maki.gif' title='[maki-maki]' onClick=\"addemot('[maki-maki]')\">" +
				"<img src='" + baseUrl + "assets/chat/emot/marah.gif' title='[cmarah]' onClick=\"addemot('[cmarah]')\">" +
				"<img src='" + baseUrl + "assets/chat/emot/murung.gif' title='[cmurung]' onClick=\"addemot('[cmurung]')\">" +
				"<img src='" + baseUrl + "assets/chat/emot/nangis.gif' title='[cnangis]' onClick=\"addemot('[cnangis]')\">" +
				"<img src='" + baseUrl + "assets/chat/emot/sedih.gif' title='[csedih]' onClick=\"addemot('[csedih]')\">" +
				"<img src='" + baseUrl + "assets/chat/emot/smile.gif' title='[csenyum]' onClick=\"addemot('[csenyum]')\">" +
				"<img src='" + baseUrl + "assets/chat/emot/bonus.png' title='[bonus]' onClick=\"addemot('[bonus]')\">";
		}
	});


});
// function add emot to chat form
function addemot(emot) {
	document.forms[0].pesan.value += " " + emot;
}
