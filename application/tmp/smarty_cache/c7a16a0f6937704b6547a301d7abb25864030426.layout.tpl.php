<?php /*%%SmartyHeaderCode:1042207051550197323a1eb1-51632986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7a16a0f6937704b6547a301d7abb25864030426' => 
    array (
      0 => '/private/var/www/Zend-Basic/application/layouts/scripts/layout.tpl',
      1 => 1426167601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1042207051550197323a1eb1-51632986',
  'variables' => 
  array (
    'this' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5501973243f1c6_23314810',
  'cache_lifetime' => '14400',
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5501973243f1c6_23314810')) {function content_5501973243f1c6_23314810($_smarty_tpl) {?><html>
<head>
	<meta charset="utf-8">
	<title>Password Manager</title>
	<link  href="favicon.ico" rel="shortcut icon" />
	<link  href="css/style.css" rel="stylesheet" type="text/css" />
	<link  href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery.min.js"></script>
	<script src="js/functions.js"></script>
</head>
<body>
	
	<div class="global_wrapper">
		
		<br/>
		<hr />
		<div class="orangeBox">
<div class="title">login</div>
<div class="content">
	<form action="" method="post">
		<table>
				<thead><tr><td class="w50">username</td><td class="w50">password</td></tr></thead>			

		<tr>
		<td><input type="text" name="username" value="" placeholder="username" autocomplete="off"></td><td><input type="password" autocomplete="off" name="password" placeholder="password"></inpt></td></tr>
		</table>
		<br />
		<input type="submit" name="submit" value="login"></br>
	</form>
	</div>
</div>
		<hr />
		<a href="https://github.com/batman/priarea" target="_blank">github.com/batman/priarea</a><br/>
		Michael Raschke
	</div>
</body>
</html>
<?php }} ?>
