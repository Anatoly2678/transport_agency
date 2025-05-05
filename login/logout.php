<?php
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
setcookie ("auth_token", "", time() - 3600,"/");
unset($_SESSION[$success_msg]); 
echo "<script type='text/javascript'>
			(function()
			{
  			if( window.localStorage )
  			{
    			if( !localStorage.getItem( 'firstLoad' ) )
    			{
      			localStorage[ 'firstLoad' ] = true;
      			window.location.reload();
    			}  

    			else
      			localStorage.removeItem( 'firstLoad' );
  			}
			})();
		</script>";
?>
<html lang="ru">
<?php $title ="Выход"; include( $_SERVER['DOCUMENT_ROOT']."/includes/head-contents.php");?>
<body>
    <?php
	if (class_exists('LoginModel') == false || isset($login) == false) {
        $login = new LoginModel();
    }

		$checkToken = $login->CheckToken(); 
		include($_SERVER['DOCUMENT_ROOT'] . "/includes/menu.php"); 
	?>   
    <div>
        <h2>Вы успешно вышли</h2>
    </div>
</body>

</html>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/footer-content.php"); ?>