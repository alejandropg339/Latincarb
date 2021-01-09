<?php
include_once('includes/db.php');

session_start();

if (isset($_SESSION['rol'])) {
	switch ($_SESSION['rol']) {
		case 1:
			header('location: index-admin.php');
			break;
		case 2:
			header('location: index-admin.php');
			break;
		case 3:
			header('location: index-operario.php');
			break;
		case 4:
			header('location: index-usuario.php');
			break;

		default:
			header('location:index.php');
	}
}

if (isset($_POST['username']) && ($_POST['password'])) {
	$GLOBALS['username'] = $_POST['username'];
	$password = md5($_POST['password']);
	//$GLOBALS['usuarioG']=$username;

	$db = new db();

	$query = $db->connect()->prepare('SELECT * FROM usuario  where username = :username AND contrasena = :password');
	$query->execute(['username' => $username, 'password' => $password]);

	$row = $query->fetch(PDO::FETCH_NUM);
	if ($row == true) {
		$rol = $row[7];
		$_SESSION['rol'] = $rol;
		switch ($_SESSION['rol']) {
			case 1:
				header('location: index-admin.php');
				break;
			case 2:
				header('location: index-admin.php');
				break;
			case 3:
				header('location: index-operario.php');
				break;
			case 4:
				header('location: index-usuario.php');
				break;

			default:
				header('location:index.php');
		}
		
	} else {

        /*echo "<p style='color:red;>Usuario y/o contraseña incorrectas</p>";*/
		echo'<script type="text/javascript">
    alert("Usuario y/o contraseña incorrectas");
    window.location.href="index-d.php";
	</script>
	';

	echo '<div class="modal fade" id="contenidoModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<p class="h1">Error al iniciar</p>
			<button type="button" class="close" data-dismiss="modal">
			<span>&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<p>Usuario y/o contraseña incorrecta</p>
			</div>
		</div>
	</div>
</div>';

	echo '<link rel="stylesheet" href="css/bootstrap.min.css">
	<div class="alert alert-succses" role="alert">
		Usuario y/o contraseña incorrecta
		</div>';

?>

<?php
	}
}
?>