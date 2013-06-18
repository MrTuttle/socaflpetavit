<?php
if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['message'])){
	$nom = $_POST['nom'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	
	//on vérifie le nom
	if(empty($nom)){
		$errorNom = true;
		$messageNom = "Ce champ doit être rempli.";
	}
	
	//on vérifie l'email
	$syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
	if(empty($email)){
		$errorEmail = true;
		$messageEmail = "Ce champ doit être rempli.";
	} else if(!preg_match($syntaxe,$email)){
		$errorEmail = true;
		$messageEmail = "Adresse email incorrecte.";
	}
	
	//on vérifie le message
	if(empty($message)){
		$errorMessage = true;
		$messageMessage = "Ce champ doit être rempli.";
	}
	
	if(!isset($errorNom) && !isset($errorEmail) && !isset($errorMessage)){
		//on envoie le mail
		$destinataire="frederic_blandin@hotmail.com";
		mail($destinataire, 'Nouveau contact depuis votre site', "Nom : ".$nom."\r\n"."Email : ".$email."\r\n"."Message : ".$message, 'From: '.$email);
		$confirmation= "Votre message a bien été envoyé";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BTP</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- Le styles -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/btp.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Iceland' rel='stylesheet' type='text/css'>
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="../assets/ico/favicon.png">
</head>
<body>
<div class="container-narrow">
<div class="masthead">
  <ul class="nav nav-pills pull-right">
    <li><a href="/">Home</a></li>
    <li><a href="apropos">A propos</a></li>
    <li class="active"><a href="contact.php">Contact</a></li>
  </ul>
  <h3 class="muted"><a href="/"><img src="img/logo_btp_small.png" alt="Logo BTP" title="logo BTP"/></a></h3>
</div>
<hr/>
<div class="jumbotron">
  <div class="row-fluid">
    <div class="span2"> </div>
    <div class="span8">
      <h1>Contactez-nous</h1>
    </div>
    <div class="span2"> </div>
  </div>
  <div class="row-fluid">
    <div class="span2"> </div>
    <div class="span7">
      <form id="form-contact" class="form-horizontal" METHOD="POST" ACTION="contact.php">
        <div class="control-group">
          <label class="control-label" for="inputNom">Nom <sup>*</sup></label>
          <div class="controls">
            <input type="text" id="inputNom" name="nom" placeholder="Nom" value="<?php if(isset($nom)) echo $nom; ?>">
            <div id="errorNom" <?php if(!isset($errorNom)){echo 'style="display:none;"';}?> class="alert alert-error">
              <?php if(isset($errorNom)) echo $messageNom; ?>
            </div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputEmail">Email <sup>*</sup></label>
          <div class="controls">
            <input type="text" id="inputEmail" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>">
            <div id="errorEmail" <?php if(!isset($errorEmail)){echo 'style="display:none;"';}?> class="alert alert-error">
              <?php if(isset($errorEmail)) echo $messageEmail; ?>
            </div>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputMessage">Message <sup>*</sup></label>
          <div class="controls">
            <textarea rows="3" id="inputMessage" name="message" placeholder="Message"><?php if(isset($message)) echo $message; ?>
</textarea>
            <div id="errorMessage" <?php if(!isset($errorMessage)){echo 'style="display:none;"';}?> class="alert alert-error">
              <?php if(isset($errorMessage)) echo $messageMessage; ?>
            </div>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn">Envoyer</button>
          </div>
        </div>
      </form>
      <p class="lead"><? if (isset($confirmation)) {echo $confirmation;}?> </p>
    </div>
  </div>
  <div class="span3"> </div>
  <br/>
  <br/>
  <hr/>
  <div class="row-fluid marketing">
    <ul class="logos">
      <li><a href="teco.html"><img class="survol" src="img/bt_teco.png"/></a></li>
      <li><a href="me2co.html"><img class="survol" src="img/bt_me2co.png"/></a></li>
      <li><a href="socodere.html"><img class="survol" src="img/bt_socodere.png"/></a></li>
      <li><a href="sodeire.html"><img class="survol" src="img/bt_sodeire.png"/></a></li>
      <li><a href="seti.html"><img class="survol" src="img/bt_seti.png"/></a></li>
    </ul>
  </div>
  <hr/>
  <div class="footer">
    <p>&copy; Company 2013</p>
  </div>
</div>
<!-- /container -->
<!-- Le javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.9.0.min.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.4" media="screen" />
<script>
	$(document).ready(function() {
		$('.fancybox').fancybox();
	
		$("#inputNom").blur(function(){
			if($(this).val() == ""){
				$("#errorNom").text("Ce champ doit être rempli.");
				$("#errorNom").fadeIn();
			} else {
				$("#errorNom").fadeOut();
			}
		});

		$("#inputEmail").blur(function(){
			if($(this).val() == ""){
				$("#errorEmail").text("Ce champ doit être rempli.");
				$("#errorEmail").fadeIn();
			} else {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test($(this).val())){
					$("#errorEmail").text("Adresse email incorrecte.");
					$("#errorEmail").fadeIn();
				} else {
					$("#errorEmail").fadeOut();
				}
			}
		});
		$("#inputMessage").blur(function(){
			if($(this).val() == ""){
				$("#errorMessage").text("Ce champ doit être rempli.");
				$("#errorMessage").fadeIn();
			} else {
				$("#errorMessage").fadeOut();
			}
		});
	});
	</script>
</body>
</html>
