<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <meta name='author'
              content='Timothy Dyck'>
        <meta name="keywords"
              content="HTML, data analysis, cpuc, CPUC, csumb, CSUMB">
        <title>Results</title>

        <!-- Latest jQuery -->
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.js"></script>

        <!-- Some specialty styling -->
        <link rel="stylesheet" href="http://54.200.224.217/csdi/_csdi_style.css" />
    </head>
    <body>
        <div class='container' name='page_container' id='page_container'>
            <div class='row'>
                <div class='jumbotron text-center clear'>
                    <br/>
                    <img src="images/logo.png" height="100">
                    <h1>CalSPEED Data Imaging</h1>
                    <p>Tranforming the way you analyze California Cellular Network Performance</p>
                </div> <!-- end JUMBOTRON -->
            </div> <!-- end ROW -->

            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">CSDI</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="request.php">Request</a></li>
                            <li class="dropdown active">
                                <a href="#"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown"
                                   role="button"
                                   aria-expanded="false">Results<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Recent Results</a></li>
                                    <li><a href="#">Popular Results</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.php">Help/Contact</a></li>
                        </ul>
                        <!--
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                        -->
                    </div>
                </div> <!-- END CONTAINER -->
            </nav>
        </div>



        <?php
            include("_db_conn_default.php");
            $conn = getConn();

            $sql = "SELECT * "
                    ."FROM PageResults "
                    ."WHERE PageHash='".$_GET['h']."';";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $var = substr_replace($row["ImagePath"] ,"",0,59);
                echo '<table><img src="./images' .$var. '" style="width:304px;height:228px";/></table>';

                $json = json_decode($row["CalculatedData"]);
                $moo = json_decode($row["MetaInfo"]);
            }
	    echo "moo";
            echo "<br />";

            foreach ($moo->columnNames as $item) {
                echo "<tr>";
                echo "<table bgcolor = #FFFFFF align=left>";
                echo "<td>";
                echo $item;
                foreach ($json->$item as $test) {
                    echo "<td>" . $test;
                }
                echo "</td></td></table></tr>";
            }
        ?>


    </body>
</html>
