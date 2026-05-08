<?php 

    $servername="localhost";
    $username = "webUser1";
    $password = "watersWeb";
    $dbName = "unchartedWaters";
    $conn = new mysqli($servername,$username,$password,$dbName);

    $message='';
    $status='Ok';
    $payload='';

    $postCity=$_POST['city'];
    
    if(isset($_POST['city']))
        {

        }
        else 
            {
                $status='Error';
                $message='Input Error';
            }


    if ($conn->connect_error)
        {
            $status='Error';
            $message='Connection Error';
            die();
        }

    $stmt=$conn->prepare("select commodity,buyingPrice,sellingPrice from commodities where city=?");

    if ($stmt)
        {
            $stmt->bind_param("s",$postCity);
        }
        else 
            {
                $status='Error';
                $message='Statment error';
            }
    

    if ($stmt->execute())
        {
            $message='Statement Executed';
        }  
        else 
            {
                $status='Error';
                $message='Statement Execution Problem';
            }
    
    $result=$stmt->get_result();
    while($row=$result->fetch_assoc())
        {
            $payload=$payload.$row["commodity"].','.$row["buyingPrice"].','.$row["sellingPrice"].',';
        }
   // $input = json_decode(file_get_contents('php://input',true));
    //$dummy = 'testo2';
    $output = '{
                    "payloadB":"'.$postCity.','.$payload.'",
                    "statusB":"'.$status.'",
                    "messageB":"'.$message.'"
                    
                }';
    echo $output;


?>