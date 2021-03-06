<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <title>All Records</title>
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
            <div class="row">
                <div class="container">
                    <div class="clear-fix"><br></div>
                    <table class="table table-bordered tb">
                        <thead class="th">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Gander</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php
                            include 'include/dbConfig.php';
                            $pdo = Config::connector();
                            $sql = 'SELECT * FROM app ORDER BY id DESC';
                            foreach($pdo->query($sql)as $row)
                            {
                            echo '<tr>';
                                            echo '<td>'. $row['id'] . '</td>';
                                echo '<td>'. $row['name'] . '</td>';
                                echo '<td>'. $row['address'] . '</td>';
                                echo '<td>'. $row['phone'] . '</td>';
                                echo '<td>'. $row['email'] . '</td>';
                                echo '<td>'. $row['gander'] . '</td>';
                                
                                
                                //echo '<a class="btn btn-danger" href="delete.php"?id='.$row['id'].'">Delete</a>';
                                echo'
                                <td width=200>
                                   
                                    <form action="delete.php?id='.$row['id'].'" method="POST">
                                        <button class="btn btn-danger btn-sm" name="archive" type="submit" onclick="archiveFunction()">  Delete</button>
                                        <input type="hidden" name="id" id="id" value='. $row['name'] .'>
                                         <a class="btn btn-primary btn-sm" href="read.php?id='.$row['id'].'">View</a>
                                    <a class="btn btn-warning btn-sm" href="update.php?id='.$row['id'].'">Edit</a>
                                    </td>';
                                    
                                echo' </form>';
                                
                            echo '</tr>';
                            }
                            Config::disconnect();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <!-- Latest compiled and minified JavaScript -->
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
            
            <!-- deleting alert from sweet js library -->
            <script>


            function archiveFunction() {
            event.preventDefault(); // prevent form submit
            var form = event.target.form; // storing the form
            swal({

            title: "Are you sure You  ?",
            text: "Record Can't Be Restored, Once Deleted!!.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#c0392b",
            cancelButtonText: "#c0392b",
            cancelButtonColor: "#c0392b",
            confirmButtonText: "Yes, Delete it!",
            cancelButtonText: "No, cancel It Please!",
            closeOnConfirm: false,
            closeOnCancel: false
            },

            

            function(isConfirm){
            if (isConfirm) {
            form.submit(); // submitting the form when user press yes
              swal("Deleted!", "Your imaginary file has been deleted.", "success");
            } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
            });
            }
            </script>
        </body>
    </html>