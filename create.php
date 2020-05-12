

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!--  compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <title>Add New Records</title>
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
        <div clas="span10 offset1">
          <div class="card bg-edit">
            <div class="card-header bg-warning">
                <h3 class="well"> CRUD APP</h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="create.php" method="post">

                <div class="control-group <?php echo !empty($nameErro)?'error ' : '';?>">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="name" type="text" placeholder="name" required="" value="<?php echo !empty($name)?$name: '';?>">
                        <?php if(!empty($nameErro)): ?>
                            <span class="help-inline"><?php echo $nameErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($addressErro)?'error ': '';?>">
                    <label class="control-label">Address</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="address" type="text" placeholder="address" required="" value="<?php echo !empty($address)?$address: '';?>">
                        <?php if(!empty($emailErro)): ?>
                            <span class="help-inline"><?php echo $addressErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($phoneErro)?'error ': '';?>">
                    <label class="control-label">Phone</label>
                    <div class="controls">
                        <input size="35" class="form-control" name="phone" type="text" placeholder="phone" required="" value="<?php echo !empty($phone)?$phone: '';?>">
                        <?php if(!empty($emailErro)): ?>
                            <span class="help-inline"><?php echo $phoneErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($emailErro)?'error ': '';?>">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input size="40" class="form-control" name="email" type="text" placeholder="Email" required="" value="<?php echo !empty($email)?$email: '';?>">
                        <?php if(!empty($emailErro)): ?>
                            <span class="help-inline"><?php echo $emailErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($ganderErro)?'error ': '';?>">
                    <label class="control-label">gander</label>
                    <div class="controls">
                        <div class="form-check">
                            <p class="form-check-label">
                                <input class="form-check-input" type="radio" name="gander" id="gander" value="M" 
                                <?php echo ($gander="M" ) ? "checked" : null; ?>/> Male
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gander" id="gander" value="F" 
                            <?php echo ($gander=="F" ) ? "checked" : null; ?>/> Female
                        </div>
                        </p>
                        <?php if(!empty($ganderErro)): ?>
                            <span class="help-inline"><?php echo $ganderErro;?></span>
                            <?php endif;?>
                    </div>
                </div>
                <div class="form-actions">
                    <br/>

                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="index.php" type="btn" class="btn btn-default">Cancel</a>

                </div>
            </form>
          </div>
        </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Laapp compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>

<?php
    require 'include/dbConfig.php';

    if(!empty($_POST))
    {
        //Track validation errors
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

        //Field validation:
        $validator = true;
        if(empty($name))
        {
            $nameErro = 'name Required!';
            $validator = false;
        }

        if(empty($address))
        {
            $addressErro = 'Address Required!';
            $validator = false;
        }

        if(empty($phone))
        {
            $phoneErro = ' phone Number Required!';
            $validator = false;
        }

        if(empty($email))
        {
            $phoneErro = 'Enter a valid email ';
            $validator = false;
        }
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $emailError = 'Email Required!';
            $validator = false;
        }

        if(empty($gander))
        {
            $ganderErro = 'Gander Required!';
            $validator = false;
        }

        //Inserting data's
        if($validator)
        {
            $pdo = Config::connector();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO app (name, address, phone, email, gander) VALUES(?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$address,$phone,$email,$gander));
          //sweetAlert 
           echo '<script>
            swal({
                    title: "Wow!",
                    text: "Record Saved Succesfuly!",
                    type: "success"
                 }).then(function() {
                                        window.location = "index.php";
                                    });
            </script>';
            
            Config::disconnect();
          

         
        }
    }
?>
