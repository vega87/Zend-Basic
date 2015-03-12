<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-12 14:39:27
         compiled from "/private/var/www/Zend-Basic/application/views/scripts/error/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9054587865501970f970852-78813224%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3d272fe3c0776f7c99bd24fdabe0924d9f41273' => 
    array (
      0 => '/private/var/www/Zend-Basic/application/views/scripts/error/error.tpl',
      1 => 1426167565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9054587865501970f970852-78813224',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5501970f9c36b7_72287245',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5501970f9c36b7_72287245')) {function content_5501970f9c36b7_72287245($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Zend Framework Default Application</title>
</head>
<body>
  <h1>An error occurred</h1>
  <h2><?php echo $_smarty_tpl->tpl_vars['this']->value->message;?>
</h2>

    <?php if ((isset($_smarty_tpl->tpl_vars['this']->value->exception))) {?>
  
  <h3>Exception information:</h3>
  <p>
      <b>Message:</b> <?php echo $_smarty_tpl->tpl_vars['this']->value->exception->getMessage();?>

  </p>

  <h3>Stack trace:</h3>
  <pre><?php echo $_smarty_tpl->tpl_vars['this']->value->exception->getTraceAsString();?>

  </pre>

  <h3>Request Parameters:</h3>
  <pre><?php echo $_smarty_tpl->tpl_vars['this']->value->escape(var_export($_smarty_tpl->tpl_vars['this']->value->request->getParams(),true));?>

  </pre>

 <?php }?>

</body>
</html>
<?php }} ?>
