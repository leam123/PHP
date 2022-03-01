
<?php
	session_start();
	include("function.php");
	if(isset($_POST['create'])){
		if(insert($_POST['lname'],$_POST['fname'],$_POST['cno'],$_POST['street'],$_POST['brgy'],$_POST['city'],$_POST['pcode'],$_POST['uname'],$_POST['email'],$_POST['password'])==1){
			echo "<script>
					alert('New record save.')
				</script>";
			header("location: index.php");
		}
		else{
			echo "<script>
					alert('Account already existing.')
				</script>";
		}		
	}	
?>

<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="CSS/register.css">
		<style>
			body{
				background-image: url("img/register.jpg");
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
			}
		</style>
	</head>
	<body>
			<div>
				<div><img src="img/account.png" height="80" width="80" class="centerpic"></div>
				<div class="font">Create Account</div>
				<div class="block">
					<div style="float:left; font-style:italic; font-weight:bold; font-size: 15px">Fields with asterisk(<span style="color: red">*</span>) are required.</div><br><br>
					<div>
						<form action="" method="post">
							<label class="centerfield"> Firstname <span style="color: red">*</span></label>
							<input type="text" name="fname" placeholder="Firstname" class="right size" required><br><br>
							<label class="centerfield"> Lastname <span style="color: red">*</span></label>
							<input type="text" name="lname" placeholder="Lastname" class="right size" required><br><br>
							<label class="centerfield"> Contact No. <span style="color: red">*</span></label>
							<input type="text" name="cno" placeholder="09123456789" maxlength="11" class="right size" required><br><br>
							<label class="centerfield"> Street <span style="color: red">*</span></label> 
							<input type="text" name="street" placeholder="Street" class="right size" required><br><br>
							<label class="centerfield"> Barangay <span style="color: red">*</span></label>
								<select name="brgy" placeholder="Barangay" class="right size" required>
									<option value="Adlaon">Adlaon</option>
									<option value="Agsungot">Agsungot</option>
									<option value="Apas">Apas</option>
									<option value="Babag">Babag</option>
									<option value="Bacayan">Bacayan</option>
									<option value="Banilad">Banilad</option>
									<option value="Basak Pardo">Basak Pardo	</option>
									<option value="Basak San Nicolas">Basak San Nicolas</option>
									<option value="Binaliw">Binaliw</option>
									<option value="Bonbon">Bonbon</option>
									<option value="Budlaan">Budlaan</option>
									<option value="Buhisan">Buhisan</option>
									<option value="Bulacao">Bulacao</option>
									<option value="Buot">Buot</option>
									<option value="Busay">Busay</option>
									<option value="Calamba">Calamba</option>
									<option value="Cambinocot">Cambinocot</option>
									<option value="Capitol Site">Capitol Site</option>
									<option value="Carreta">Carreta</option>
									<option value="Cogon Pardo">Cogon Pardo	</option>
									<option value="Cogon Ramos">Cogon Ramos</option>
									<option value="Day-as">Day-as</option>
									<option value="Duljo Fatima">Duljo Fatima</option>
									<option value="Ermita">Ermita</option>
									<option value="Guadalupe">Guadalupe</option>
									<option value="Guba">Guba</option>
									<option value="Hipodromo">Hipodromo</option>
									<option value="Inayawan">Inayawan</option>
									<option value="Kalubihan">Kalubihan</option>
									<option value="Kalunasan">Kalunasan</option>
									<option value="Kamagayan">Kamagayan</option>
									<option value="Kamputhaw">Kamputhaw</option>
									<option value="Kasambagan">Kasambagan</option>
									<option value="Kinasang-an Pardo">Kinasang-an Pardo</option>
									<option value="Labangon">Labangon</option>
									<option value="Lahug">Lahug</option>
									<option value="Ormoc">Ormoc</option>
									<option value="Lorega-San Miguel">Lorega-San Miguel</option>
									<option value="Lusaran">Lusaran</option>
									<option value="Luz">Luz</option>
									<option value="Mabini">Mabini</option>
									<option value="Mabolo">Mabolo</option>
									<option value="Malubog">Malubog</option>
									<option value="Mambaling">Mambaling</option>
									<option value="Pahina Central">Pahina Central</option>
									<option value="Pahina San Nicolas">Pahina San Nicolas</option>
									<option value="Pamutan">Pamutan</option>
									<option value="Pari-an">Pari-an</option>
									<option value="Paril">Paril</option>
									<option value="Pasil">Pasil</option>
									<option value="Pit-os">Pit-os</option>
									<option value="Poblacion Pardo">Poblacion Pardo</option>
									<option value="Pulangbato">Pulangbato</option>
									<option value="Pung-ol Sibugay">Pung-ol Sibugay</option>
									<option value="Punta Princesa">Punta Princesa</option>
									<option value="Quiot">Quiot</option>
									<option value="Sambag I">Sambag I</option>
									<option value="Sambag II">Sambag II	</option>
									<option value="San Antonio">San Antonio</option>
									<option value="San Jose">San Jose</option>
									<option value="San Nicolas Proper">San Nicolas Proper</option>
									<option value="San Roque">San Roque</option>
									<option value="Santa Cruz">Santa Cruz</option>
									<option value="Santo Niño">Santo Niño</option>
									<option value="Sapangdaku">Sapangdaku</option>
									<option value="Sawang Calero">Sawang Calero</option>
									<option value="Sinsin">Sinsin</option>
									<option value="Sirao">Sirao</option>
									<option value="Suba">Suba</option>
									<option value="Sudlon I">Sudlon I</option>
									<option value="Sudlon II">Sudlon II</option>
									<option value="T. Padilla">T. Padilla</option>
									<option value="Tabunan">Tabunan</option>
									<option value="Tagba-o">Tagba-o</option>
									<option value="Talamban">Talamban</option>
									<option value="Taptap">Taptap</option>
									<option value="Tejero">Tejero</option>
									<option value="Tinago">Tinago</option>
									<option value="Tisa">Tisa</option>
									<option value="To-ong">To-ong</option>
									<option value="Zapatera">Zapatera</option>
								</select><br><br>
							<label class="centerfield"> City <span style="color: red">*</span></label>
								<select name="city" placeholder="City" class="right size" required>
									<option value="Cebu">Cebu</option>
									<option value="Angeles">Angeles</option>
									<option value="Antipolo">Antipolo</option>
									<option value="Bacolod">Bacolod</option>
									<option value="Bacoor">Bacoor</option>
									<option value="Baguio">Baguio</option>
									<option value="Bataan">Bataan</option>
									<option value="Basilan">Basilan</option>
									<option value="Bohol">Bohol</option>
									<option value="Butuan City">Butuan City</option>
									<option value="Calamba">Calamba</option>
									<option value="Caloocan">Caloocan</option>
									<option value="Cagayan de Oro">Cagayan de Oro</option>
									<option value="Cotabato City">Cotabato City</option>
									<option value="Dagupan">Dagupan</option>
									<option value="Davao City">Davao City</option>
									<option value="Dasmarinas">Dasmarinas</option>
									<option value="Dumaguete">Dumaguete</option>
									<option value="General Santos City">General Santos City</option>
									<option value="Iligan City">Iligan City</option>
									<option value="Iloilo City">Iloilo City</option>
									<option value="Lapu-lapu City">Lapu-lapu City</option>
									<option value="Las Pinas">Las Pinas</option>
									<option value="Legazpi City">Legazpi City</option>
									<option value="Lucena">Lucena</option>
									<option value="Makati">Makati</option>
									<option value="Malabon">Malabon</option>
									<option value="Malolos">Malolos</option>
									<option value="Mandaluyong">Mandaluyong</option>
									<option value="Mandaue City">Mandaue City</option>
									<option value="Manila">Manila</option>
									<option value="Muntinlupa">Muntinlupa</option>
									<option value="Marikina">Marikina</option>
									<option value="Naga">Naga</option>
									<option value="Navotas">Navotas</option>
									<option value="Olongapo">Olongapo</option>
									<option value="Ormoc">Ormoc</option>
									<option value="Paranaque">Paranaque</option>
									<option value="Pasay">Pasay</option>
									<option value="Pasig">Pasig</option>
									<option value="Puerto Princesa">Puerto Princesa</option>
									<option value="Quezon City">Quezon City</option>
									<option value="Roxas City">Roxas City</option>
									<option value="San Juan">San Juan</option>
									<option value="Santiago">Santiago</option>
									<option value="Tacloban City">Tacloban City</option>
									<option value="Tagaytay">Tagaytay</option>
									<option value="Taguig">Taguig</option>
									<option value="Valenzuela">Valenzuela</option>
									<option value="Vigan City">Vigan City</option>
									<option value="Zamboanga">Zamboanga</option>
								</select><br><br>
							<label class="centerfield"> Postal Code <span style="color: red">*</span></label>
							<input type="text" name="pcode" value="6000" class="right size" required><br><br>
							<label class="centerfield"> Email <span style="color: red">*</span></label>
							<input type="email" name="email" vaLue="email@gmail.com" class="right size" required><br><br>
							<label class="centerfield"> Username <span style="color: red">*</span></label>
							<input type="text" name="uname" placeholder="Username" class="right size" required><br><br>
							<label class="centerfield"> Password <span style="color: red">*</span></label>
							<input type="password" name="password" placeholder="Password" class="right size" required><br><br>
							<!-- <label class="centerfield"> Confirm Password </label>
							<input type="password" name="confirm" placeholder="Confirm Password" id="confirm" onkeyup='check();' class="right size" required><br><br><br>-->
							<input type="submit" name="create" class="button" value="Create Account"><br>
							<!--<div style="font-size: 15px; color: #EBEB00; font-weight: bold"> Note: if the passwords don't match, account will not be created.</div>-->
						</form>
					</div>
				</div>
			</div>
		<!--<script>
		var check = function() {
			if (document.getElementById('confirm').value != document.getElementById('password').value){
				document.getElementById('create').disabled = true;
			} else {
				document.getElementById('create').disabled = false;
			}
		}
		</script>-->
	</body>
	
</html>