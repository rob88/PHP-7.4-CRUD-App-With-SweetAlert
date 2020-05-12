<?php
require_once('include/dbConfig.php');

$id = 0;

if(!empty($_GET['id']))
{
    $id = $_REQUEST['id'];
}

if(!empty($_POST))
{
    $id = $_POST['id'];

    //Delete record from database:
    $pdo = Config::connector();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM app where id =".$_GET['id'];
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Config::disconnect();
    //header("Location: index.php");
}
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <title>Delete Record</title>
    </head>

    <body>
        <div class="container">
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well">Warning You Are About To delete A Record</h3>
                </div>

                           <form action="delete.php" method="POST">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <button class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()">
            <i class="fa fa-archive"></i>
                Delete
        </button> <br>

        <button type="submit" class="btn btn-danger" onclick="archiveFunction()">Yes</button>
</form>



               <!--  <form class="form-horizontal" action="delete.php" method="post">
                   <input type="hidden" name="id" value="<?php //echo $id;?>" />
               
                   <div class="alert alert-danger"> Are You Sure You want Delete This Record?
                   </div>
                   <div class="form actions">
                       <button type="submit" class="btn btn-danger">Yes</button>
                       <a href="index.php" type="btn" class="btn btn-default">No</a>
                   </div>
               </form> -->

                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">



            </div>
        </div>
      
       

        <!-- Latest compiled and minified JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <form action="delete.php" method="POST">
            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
            <button class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()">
                <i class="fa fa-archive"></i>
                    Delete
            </button>
    </form>
         <script>
             


             function archiveFunction() {
             event.preventDefault(); // prevent form submit
             var form = event.target.form; // storing the form
                     swal({
                 title: "Are you sure You Want Delete ?",
               text: "Record Can't Be Restored !!.",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Yes, archive it!",
               cancelButtonText: "No, cancel please!",
               closeOnConfirm: false,
               closeOnCancel: false
             },
             function(isConfirm){
               if (isConfirm) {
                 form.submit();          // submitting the form when user press yes
               } else {
                 swal("Cancelled", "Your imaginary file is safe :)", "error");
               }
             });
             }
         </script>
    </body>

    </html>
