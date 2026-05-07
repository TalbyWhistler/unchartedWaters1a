<?php 

// the database variables 
$servername="localhost";
$username = "webUser1";
$password = "watersWeb";
$dbName = "unchartedWaters";

// db connection
$conn = new mysqli($servername,$username,$password,$dbName);

if ($conn->connect_error)
    {
        die("Connection failed");
    }
    echo "Connected Successfully";

// test values to see if they exist
$valuesExist=False;

$city = "Lisbon";
$commodity="Grain";
$buyPrice=50;
$sellPrice=51;

// to check if the commodity and city values are present in the database or not

$stmt=$conn->prepare("SELECT city,commodity,buyingPrice,sellingPrice from commodities where city=? and commodity=?");
if ($stmt)
    {
        $stmt->bind_param("ss",$city,$commodity);
    }
if ($stmt->execute())
    {
        echo "</br>Statment executed";
    }
    else 
        {
            echo "</br>Statment not executed";
        }

$result = $stmt->get_result();
$assoc = $result->fetch_assoc();
if ($assoc)
    {
        echo '</br>Record for ' . $city . ' and ' . $commodity .'  Exists';
        $valuesExist=True;

    }
    else 
        {
            echo '</br> no existing record for ' . $city . " and " . $commodity;
        }


if ($valuesExist)
    {
        $stmt=$conn->prepare("UPDATE commodities set buyingPrice=?,sellingPrice=? where city=? and commodity=?");
        $stmt->bind_param("iiss",$buyPrice,$sellPrice,$city,$commodity);
        if ($stmt->execute())
            {
                echo '</br>successfully updated';
            }
        else 
            {
                echo '</br>update failed';
            }
    }
else 
    {
        $stmt=$conn->prepare("INSERT into commodities (city,commodity,buyingPrice,sellingPrice) values(?,?,?,?)");
        /*
        if ($stmt)
            {
                        $stmt->bind_param("ssii",$city,$commodity,$buyPrice,$sellPrice);
                        echo "</br>There's a statment";
            }
            else 
                {
                    echo "</br>no statement";
                }
        */
        if ($stmt->execute())
            {
                echo '</br>successfully added';
            }
            else 
                {
                    echo "record add failed";
                }
        
    }

?>