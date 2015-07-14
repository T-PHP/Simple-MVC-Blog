<?php

use Helpers\Assets;
use Helpers\Url;

?>
<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>

	<!-- CSS -->
	<?php
	Assets::css(array(
		'//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css',
		Url::templatePath() . 'css/style.css',
        Url::templatePath() . 'css/login.css',
        Url::templatePath() . 'css/paddingmargin.css',
	));
	?>
    <style type="text/css">
        body, html {
            height: 100%;
            background-repeat: no-repeat;
            background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
        }
    </style>
</head>
<body>

<div class="container">
    
    <div class="row">
