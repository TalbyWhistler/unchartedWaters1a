<?php 

function buttonEntry($entry)
{
    $button = 
    '
        <button onClick="cityButton(\''.addslashes($entry).'\')">'.htmlspecialchars($entry).'</button>
    ';
    
    return $button;
}


    $servername="localhost";
        $username = "webUser1";
        $password = "watersWeb";
        $dbName = "unchartedWaters";

        // db connection
        // $conn = new mysqli($servername,$username,$password,$dbName);
        $conn = new mysqli($servername,$username,$password,$dbName);
        if ($conn->connect_error)
            {
                echo "Connection error";
            }
            else 
                {
                    echo "Good connection";
                }
        $stmt = $conn->prepare("SELECT DISTINCT city FROM commodities;");
        if ($stmt)
            {
                echo "</br>Good statement";
            }
            else 
                {
                    echo "</br>Statement issues";
                }
        
        if ($stmt->execute())
            {
                echo "</br>Good execute";
            }
            else 
                {
                    echo"</br>Not good execute";
                }
        $result = $stmt->get_result();
        //$assoc = $result->fetch_assoc();
        $button0 = 
        '

        ';
        while  ($row = $result->fetch_assoc())
            {
                //echo '</br>' . $row["city"];
                echo '</br>' . buttonEntry($row["city"]);
            }
        //$echoOut = '</br>';
        
        

?>