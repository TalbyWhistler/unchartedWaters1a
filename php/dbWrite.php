<?php 
function testEcho($inputString)
{
    echo $inputString;
};





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


    
$sql="insert into commodities values('Madrid','Grain',20,21);";
if ($conn->query($sql)===TRUE)
    {
        echo "Write complete";
    }
    else 
        {
            echo "write error";
        }

$conn->close(); 
?>