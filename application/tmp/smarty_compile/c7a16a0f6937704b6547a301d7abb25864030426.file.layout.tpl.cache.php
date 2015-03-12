<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-12 14:40:02
         compiled from "/private/var/www/Zend-Basic/application/layouts/scripts/layout.tpl" */ ?>
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
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55019732425c56_32626784',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55019732425c56_32626784')) {function content_55019732425c56_32626784($_smarty_tpl) {?><html>
<head>
	<meta charset="utf-8">
	<title>Password Manager</title>
	<link  href="favicon.ico" rel="shortcut icon" />
	<link  href="css/style.css" rel="stylesheet" type="text/css" />
	<link  href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/functions.js"><?php echo '</script'; ?>
>
</head>
<body>
	<?php echo $_smarty_tpl->tpl_vars['this']->value->error;?>

	<div class="global_wrapper">
		
		<br/>
		<hr />
		<?php echo $_smarty_tpl->tpl_vars['this']->value->layout()->content;?>

		<hr />
		<a href="https://github.com/batman/priarea" target="_blank">github.com/batman/priarea</a><br/>
		Michael Raschke
	</div>
</body>
</html>
<?php }} ?>
