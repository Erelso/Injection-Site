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
                        <li><a href="Secure.php">Secure Site</a></li>
                        <li><a href="multi.php">Really Bad</a></li>
                        

                    </ul>
                </div>
            </div>
        </div>
        <div id="page-wrapper">
            <div id="page" class="container">
                <div id="content">
                    <header>Grocery Products</header>
                    <form action="" method="GET" name="">
                        <table>
                            <tr>
                               
                                <td><input type="text" name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ''; ?>" placeholder="Enter your search keywords" style="width: 500px;"/></td>
                                <td><input type="submit" name="" value="Search" /></td>
                            </tr>
                        </table>
                    </form>
                    <div class=donortable>
                    
<?php
                        


$host = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "inj";
                        
// get the search terms from the url
$k = isset($_GET['k']) ? $_GET['k'] : '';

// create the base variables for building the search query
$query_string = "SELECT * FROM product WHERE PRODUCT_NAME LIKE '%$k%'";
                                                     
// Create connection
$conn = mysqli_connect ( $host, $dbusername, $dbpassword, $dbname );
                        
// run the query in the db and search through each of the records returned
$query = mysqli_query($conn, $query_string);
$result_count = mysqli_num_rows($query);
                        
// check if the search query returned any results
if ($result_count > 0){

	// display the header for the display table
	echo '<table class="search">';
    
    echo "<table><tr><th>ID</th><th>Name</th><th>PRICE</th><th>QUANTITY</th></tr>";
	
	// loop though each of the results from the database and display them to the user
	while ($row = mysqli_fetch_assoc($query)){
		echo "<tr>";
    echo "<td>".$row["PRODUCT_ID"]."</td>";
    echo "<td>".$row["PRODUCT_NAME"]."</td>";
    echo "<td>".$row["PRODUCT_PRICE"]."</td>";
    echo "<td>".$row["PRODUCT_QUANTITY"]."</td>";
    echo "</tr>";
	}
	
	// end the display of the table
	echo '</table>';
}
else
	echo 'There were no results for your search. Try searching for something else.';


//display the query string to user   
echo "<tr>";
echo $query_string;
                        
                        

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