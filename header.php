<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php wp_title(); ?></title>

	
	<?php wp_head(); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="shortcut icon" href="<?php echo ASSETS_URL; ?>/assets/images/ico/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo ASSETS_URL; ?>/assets/images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo ASSETS_URL; ?>/assets/images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo ASSETS_URL; ?>/assets/images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo ASSETS_URL; ?>/assets/images/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>