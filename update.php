<?php

	require 'include/dbConfig.php';

	$id = null;
	if ( !empty($_GET['id']))
            {
		$id = $_REQUEST['id'];
            }

	if ( null==$id )
            {
		header("Location: index.php");
            }

	if ( !empty($_POST))
            {

		$nameErro = null;
		$addressErro = null;
		$phoneErro = null;
                $emailErro = null;
                $ganderErro = null;

		$name = $_POST['name'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
                $email = $_POST['email'];
                $gander = $_POST['gander'];

		//Validação
		$validacao = true;
		if (empty($name))
                {
                    $nameErro = 'Por favor digite o name!';
                    $validacao = false;
                }

		if (empty($email))
                {
                    $emailErro = 'Por favor digite o email!';
                    $validacao = false;
		}
                else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) )
                {
                    $emailErro = 'Enter a Valid E-Mail Address!';
                    $validacao = false;
		}

		if (empty($address))
                {
                    $address = 'Address Required!';
                    $validacao = false;
		}

                if (empty($phone))
                {
                    $phone = 'Phone Required!';
                    $validacao = false;
		}

                if (empty($address))
                {
                    $address = 'Address Required!';
                    $validacao = false;
		}

		// update data
		if ($validacao)
                {
                    $pdo = Config::connector();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE app  set name = ?, address = ?, phone = ?, email = ?, gander = ? WHERE id = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($name,$address,$phone,$email,$gander,$id));
                    Config::disconnect();
                    header("Location: index.php");
		}
	}
        else
            {
                $pdo = Config::connector();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM app where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$name = $data['name'];
                $address = $data['address'];
                $phone = $data['phone'];
		$email = $data['email'];
		$gander = $data['gander'];
		Config::disconnect();
	}
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/custom.css">
				<title>Atualizar Contato</title>
    </head>

    <body>
        <div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Navbar</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="create.php">Add</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="search.php">Search </a>
              </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              &nbsp; &nbsp;     <!-- 2 spaces between the search button and the profile button  -->
              <!-- Example split danger button -->
              <div class="btn-group">
                  <button type="button" class="btn btn-danger">Reben88</button>
                  <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="profile.php">My Profile</a>
                      <a class="dropdown-item" href="edit.php">Edit Profile</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="logout.php"> Sign Out</a>
                  </div>
              </div>
          </form>
      </div>
  </nav>
  <div class="clear-fix"><br></div>

            <div class="span10 offset1">
							<div class="card">
								<div class="card-header bg-warning ">
                    <h3 class="well"> Updating  <?php echo $name;?> Details...</h3>
                </div>
								<div class="card-body bg-edit">
                <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">

                    <div class="control-group <?php echo !empty($nameErro)?'error':'';?>">
                        <label class="control-label">name</label>
                        <div class="controls">
                            <input name="name" class="form-control" size="50" type="text" placeholder="name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameErro)): ?>
                                <span class="help-inline"><?php echo $nameErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($addressErro)?'error':'';?>">
                        <label class="control-label">Endereço</label>
                        <div class="controls">
                            <input name="address" class="form-control" size="80" type="text" placeholder="Endereço" value="<?php echo !empty($address)?$address:'';?>">
                            <?php if (!empty($addressErro)): ?>
                                <span class="help-inline"><?php echo $addressErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($phoneErro)?'error':'';?>">
                        <label class="control-label">phone</label>
                        <div class="controls">
                            <input name="phone" class="form-control" size="30" type="text" placeholder="phone" value="<?php echo !empty($phone)?$phone:'';?>">
                            <?php if (!empty($phoneErro)): ?>
                                <span class="help-inline"><?php echo $phoneErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($email)?'error':'';?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" class="form-control" size="40" type="text" placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailErro)): ?>
                                <span class="help-inline"><?php echo $emailErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($ganderErro)?'error':'';?>">
                        <label class="control-label">gander</label>
                        <div class="controls">
                            <div class="form-check">
                                <p class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gander" id="gander" value="M" <?php echo ($gander=="M" ) ? "checked" : null; ?>/> Male
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gander" id="gander" value="F" <?php echo ($gander=="F" ) ? "checked" : null; ?>/> Female
                            </div>
                            </p>
                            <?php if (!empty($ganderErro)): ?>
                                <span class="help-inline"><?php echo $ganderErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Save Change</button>
                        <a href="index.php" type="btn" class="btn btn-default">Cancel</a>
                    </div>
                </form>
							</div>
						</div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
    </body>

    </html>
