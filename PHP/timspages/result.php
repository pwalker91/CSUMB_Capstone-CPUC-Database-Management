<html>
<head>
<title>Results</title>
<?php
    $servername = "localhost";
    $username = "dyck5795";
    $password = "guest";
    $dbname = "dyck5795";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>

</head>
<body>
<center>
<h1>results</h1>
<table border=1>
<tr>
<td rowspan="2">

<?php
    $sql = "SELECT *
    FROM PageResults
    WHERE PageHash=\"$_GET[d]\"
    ";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
    echo '<img src="http://hosting.otterlabs.org/classes/dycktimothya/cpuc/'.$row["ImagePath"]. '"/>';
    
    
        $json = json_decode($row["CalculatedData"]);
       // echo json_encode($json);
       // echo "<br>";
        $moo = json_decode($row["MetaInfo"]);
        //echo "<br>";
        //echo json_encode($moo);
        
        
        }
    echo "<br>";

//echo json_encode($moo);
    echo "<table border=1>";
    foreach($moo->columnNames as $item){
            echo "<tr><td>";
        echo $item;
            echo "</td>";
        foreach($json->$item as $test){
            echo "<td>" . $test . "</td>";
        }
            echo "</tr>";
    }
    echo "</table>";

    
    
    
    ?>
</td>
<td >
raw data<br/>
<?php
echo json_encode($moo);


    $conn->close();
    ?>
</td>
</tr>
<tr>
<td>
email yourself<br/>
help<br/>
related searches
</td>
</tr>
</table>
</center>
</body>
</html>