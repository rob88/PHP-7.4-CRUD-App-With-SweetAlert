<?php
    require 'include/dbConfig.php';
$id = null;
if(!empty($_GET['id']))
{
$id = $_REQUEST['id'];
}
if(null==$id)
{
header("Location: index.php");
}
else
{
$pdo = Banco::connector();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM app where id = $id";
$q = $pdo->prepare($sql);
$q->execute(array($id));
$data = $q->fetch(PDO::FETCH_ASSOC);
Banco::disconnect();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <title>Record Details</title>
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
            
 <div class="clear-fix"><br>    </div>
<!-- display single record by ID -->
<div class="card">
<div class="card-header bg-warning">
    Viewing  <?php echo $data['name'];?> Details...
</div>
<div class="card-body  view-txt">
    <h2 class="card-title">Display Record ...</h2>
    <p class="card-text">
        
        <div class="container">
            <ul class="list-group list-group-flush flush">
              <li class="list-group-item flush">Name   : <?php echo $data['name'];?>    </li>
              <li class="list-group-item flush">Address: <?php echo $data['address'];?> </li>
              <li class="list-group-item flush">Phone  : <?php echo $data['phone'];?>   </li>
              <li class="list-group-item flush">E-Mail : <?php echo $data['email'];?>   </li>
              <li class="list-group-item flush">Gander : <?php echo $data['gander'];?>  </li>
            </ul>
            
                <br/>
                
            </div>
        </div>
    </div>
</div>
</p>
<a href="index.php" class="btn btn-primary"> <<< Go Back</a>
</div>
</div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>