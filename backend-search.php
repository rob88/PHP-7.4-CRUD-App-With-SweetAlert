<table class="table table-bordered tb">
    <thead class="th">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">phone</th>
            <th scope="col">Email</th>
            <th scope="col">Gander</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="tbody">
    </li>
    <li class="list-group-item">
        <?php
        /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        try{
        //$pdo = new PDO("mysql:host=localhost;dbname=course_db", "root", "");
        // Set the PDO error mode to exception
        //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        require 'include/dbConfig.php';
        $pdo = Config::connector();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
        }
        
        // Attempt search query execution
        try{
        if(isset($_REQUEST["term"])){
        // create prepared statement
        $sql = "SELECT * FROM app WHERE name LIKE :term";
        $stmt = $pdo->prepare($sql);
        $term = $_REQUEST["term"] . '%';
        // bind parameters to statement
        $stmt->bindParam(":term", $term);
        // execute the prepared statement
        $stmt->execute();
        if($stmt->rowCount() > 0){
        while($row = $stmt->fetch()){
        echo "<tr>";
            echo "<td>" . $row["name"] . " </td>";
            echo "<td>" . $row["address"] . "> </td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["email"] . "> </td>";
            echo "<td>" . $row["gander"] . " </td>";
            echo'
            <td width=200>
                
                <form action="delete.php?id='.$row['id'].'" method="POST">
                    <button class="btn btn-danger btn-sm" name="archive" type="submit" onclick="archiveFunction()">  Delete</button>
                    <input type="hidden" name="id" id="id" value='. $row['name'] .'>
                    <a class="btn btn-primary btn-sm" href="read.php?id='.$row['id'].'">View</a>
                    <a class="btn btn-warning btn-sm" href="update.php?id='.$row['id'].'">Edit</a>
                </td>';
                
            echo' </form>';
        echo "</tr>";
    echo "</li>
</ul>
</div>";
}
} else{
echo "<p class='alert alert-danger'>No matches found</p>";
}
}
} catch(PDOException $e){
die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
// Close statement
unset($stmt);
// Close connection
unset($pdo);
?>
</tbody>
</table>