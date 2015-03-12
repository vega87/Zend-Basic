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
  'variables' => 
  array (
    'this' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5501970f9cd153_10763388',
  'cache_lifetime' => '14400',
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5501970f9cd153_10763388')) {function content_5501970f9cd153_10763388($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Zend Framework Default Application</title>
</head>
<body>
  <h1>An error occurred</h1>
  <h2>Application error</h2>

      
  <h3>Exception information:</h3>
  <p>
      <b>Message:</b> script 'layout.tpl' not found in path (/private/var/www/Zend-Basic/application/layouts/scripts/:/private/var/www/Zend-Basic/application/views/templates/:/private/var/www/Zend-Basic/application/views/scripts/)
  </p>

  <h3>Stack trace:</h3>
  <pre>#0 /private/var/www/Zend-Basic/library/Zend/View/Abstract.php(884): Zend_View_Abstract->_script('layout.tpl')
#1 /private/var/www/Zend-Basic/library/Zend/Layout.php(796): Zend_View_Abstract->render('layout.tpl')
#2 /private/var/www/Zend-Basic/library/Zend/Layout/Controller/Plugin/Layout.php(143): Zend_Layout->render()
#3 /private/var/www/Zend-Basic/library/Zend/Controller/Plugin/Broker.php(333): Zend_Layout_Controller_Plugin_Layout->postDispatch(Object(Zend_Controller_Request_Http))
#4 /private/var/www/Zend-Basic/library/Zend/Controller/Front.php(965): Zend_Controller_Plugin_Broker->postDispatch(Object(Zend_Controller_Request_Http))
#5 /private/var/www/Zend-Basic/library/Zend/Application/Bootstrap/Bootstrap.php(105): Zend_Controller_Front->dispatch()
#6 /private/var/www/Zend-Basic/library/Zend/Application.php(382): Zend_Application_Bootstrap_Bootstrap->run()
#7 /private/var/www/Zend-Basic/public/index.php(26): Zend_Application->run()
#8 {main}
  </pre>

  <h3>Request Parameters:</h3>
  <pre>array (
  'controller' =&gt; 'index',
  'action' =&gt; 'index',
  'module' =&gt; 'default',
  'layoutContent' =&gt; '&lt;div class=&quot;orangeBox&quot;&gt;
&lt;div class=&quot;title&quot;&gt;login&lt;/div&gt;
&lt;div class=&quot;content&quot;&gt;
	&lt;form action=&quot;&quot; method=&quot;post&quot;&gt;
		&lt;table&gt;
				&lt;thead&gt;&lt;tr&gt;&lt;td class=&quot;w50&quot;&gt;username&lt;/td&gt;&lt;td class=&quot;w50&quot;&gt;password&lt;/td&gt;&lt;/tr&gt;&lt;/thead&gt;			

		&lt;tr&gt;
		&lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;username&quot; value=&quot;&quot; placeholder=&quot;username&quot; autocomplete=&quot;off&quot;&gt;&lt;/td&gt;&lt;td&gt;&lt;input type=&quot;password&quot; autocomplete=&quot;off&quot; name=&quot;password&quot; placeholder=&quot;password&quot;&gt;&lt;/inpt&gt;&lt;/td&gt;&lt;/tr&gt;
		&lt;/table&gt;
		&lt;br /&gt;
		&lt;input type=&quot;submit&quot; name=&quot;submit&quot; value=&quot;login&quot;&gt;&lt;/br&gt;
	&lt;/form&gt;
	&lt;/div&gt;
&lt;/div&gt;',
)
  </pre>

 
</body>
</html>
<?php }} ?>
