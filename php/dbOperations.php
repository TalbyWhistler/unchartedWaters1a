<?php 
    function dbConnect()
    {
        $servername="localhost";
        $username = "webUser1";
        $password = "watersWeb";
        $dbName = "unchartedWaters";

        $conn = new mysqli($servername,$username,$password,$dbName);

        if ($conn->connect_error)
        {
            die("Connection failed");
        }
        echo "Connected Successfully";
    }


    function dbDisconnect()
    {
        $conn->close();
    }


?> 