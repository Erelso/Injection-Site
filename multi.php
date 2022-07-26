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
                    <li class="active"><a href="multi.php">Really Bad</a></li>


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

                            <td><input type="text" name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ''; ?>" placeholder="Enter your search keywords" style="width: 500px;" /></td>
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
                                                
echo $query_string;
                    
                    
//Use multi_query to combine multiple queries
if (mysqli_multi_query($conn, $query_string)){

    do{
        echo '<table class="search">';
    
    echo "<table><tr><th>ID</th><th>Name</th><th>PRICE</th><th>QUANTITY</th></tr>";
        if ($result=mysqli_store_result($conn)){
            while ($row=mysqli_fetch_row($result)){
                echo "<tr>";
    echo "<td>".$row[0]."</td>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".$row[2]."</td>";
    echo "<td>".$row[3]."</td>";
    echo "</tr>";
	}
    
   
    }
    }while (mysqli_next_result($conn));
    }
    mysqli_close($conn);                     



?>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>