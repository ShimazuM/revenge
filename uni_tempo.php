<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

			<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>
			<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js" integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log==" crossorigin=""></script>
			<link rel="stylesheet" href="screen.css" />
			<link rel="stylesheet" href="dist/MarkerCluster.css" />
			<link rel="stylesheet" href="dist/MarkerCluster.Default.css" />
			<script src="dist/leaflet.markercluster.js"></script>
			
			<style>
		.mycluster {
			width: 40px;
			height: 40px;
			background-color: greenyellow;
			text-align: center;
			font-size: 24px;
		}

	</style>

		<title>店舗検索-UNQLO</title>
	</head>
	<body>
		<div>
<?php include ('./conf/header.html'); ?>

		<!--店舗検索ができるようになる予定-->
		<select name="add_dool">
				<option value="">選択してください</option>
					<option value="4421">北海道</option>
					<option value="1519">青森県</option>
					<option value="2295">岩手県</option>
					<option value="2">宮城県</option>
					<option value="3641">秋田県</option>
					<option value="4188">山形県</option>
		</select>

		<input type="search" name="search" placeholder="文字を入れられます">
		<input type="submit" name="submit" value="検索">

		<!--ここから地図さん-->
		<div id="mapid" style="width: 600px; height: 600px;"></div>
		<script type="text/javascript">



		var mymap = L.map('mapid').setView([35.95021, 139.62389], 5);
		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
			id: 'mapbox.streets'
		}).addTo(mymap);

		var myIcon = L.icon({
			iconUrl: 'img/kitamurasakiuni.png',
			iconSize: [35, 35],
			iconAnchor: [17, 17],
			popupAnchor: [0, -15],
		});
		
		
		<!--↓ピン群↓-->
		<?php include ('./conf/pin_gun.html'); ?>
		<!--↑ピン群↑-->

		L.marker([27.59566, 148.09631],{icon:myIcon}).addTo(mymap)
			.bindPopup("うにをクリックしてください").openPopup();


			var popup = L.popup();

				function onMapClick(e) {
					popup
						.setLatLng(e.latlng)
						.setContent("You clicked the map at " + e.latlng.toString())
						.openOn(mymap);
				}

				mymap.on('click', onMapClick);

		</script>



		<!--ここまで地図さん-->



<br>

<?php include ('./conf/footer.html'); ?>

	</body>
</html>
