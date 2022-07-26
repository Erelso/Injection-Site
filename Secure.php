<?php
session_start();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Store</title>
        <link rel="stylesheet" type="text/css" href="css/css-db.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800|Zilla+Slab:400,700&display=swap" rel="stylesheet">
    </head>

    <body>
        <div id="header-wrapper">
            <div id="header" class="container">
                <div id="logo">
                    <h1><a href="index.php">Grocery Store </a></h1>
                </div>
                <div id="menu">
                    <ul>
                         <li class="active"><a href="Secure.php">Secure Site</a></li>
                         <li><a href="multi.php">Really Bad</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div id="page-wrapper">
            <div id="page" class="container">
                <div id="content">
                    <header>Grocery Products</header>
                    <form action="" method="POST" name="">
                        <table>
                            <tr>
                                <td><input type="text" name="search" value="" placeholder="Enter your search keywords" style="width: 500px;"/></td>
                                <td><input type="submit" name="btn" value="Search" /></td>
                            </tr>
                        </table>
                    </form>
                    <div class=donortable>
                    
<?php
                        


$host = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "inj";
                        
                
                        
// Create connection
$conn = mysqli_connect ( $host, $dbusername, $dbpassword, $dbname );

                        
 //get search term from input                       
if (isset($_POST['search'])) {
    
    //bind input to param
    $search = $_POST['search'];  
    
    //prepared statement
    $sql = "SELECT * FROM product WHERE PRODUCT_NAME LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $search);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

       // display the header for the display table
	echo '<table class="search">';
    
    echo "<table><tr><th>ID</th><th>Name</th><th>PRICE</th><th>QUANTITY</th></tr>";
	
	// loop though each of the results from the database and display them to the user
	
    while ($row = $result->fetch_assoc()) {
		echo "<tr>";
    echo "<td>".$row["PRODUCT_ID"]."</td>";
    echo "<td>".$row["PRODUCT_NAME"]."</td>";
    echo "<td>".$row["PRODUCT_PRICE"]."</td>";
    echo "<td>".$row["PRODUCT_QUANTITY"]."</td>";
    echo "</tr>";
	}
	
	// end the display of the table
	echo '</table>';

        echo "</table>";

    } else {
        echo "0 results";
    }
}                        
                        

$conn->close();

?>
                    </div>
                </div>
            </div>
        </div>
        <div id="copyright" class="container">
            <p>A Project by Erich Elshoff</p>
        </div>
    </body>

    </html>