<?php 

    // validates input to make sure it's all letters and not blank 

    function validateCity($cityValue)
    {
        if (ctype_alpha($cityValue)==False)
            {
                return False;
            } 
        if (strlen($cityValue)<2)
            {
                return False;
            };
        return True;
    };

    // validates input to make sure it's all digits and not blank

    function validatePrice($priceValue)
    {
        if (ctype_digit($priceValue)==False)
            {
                return False;
            }
        if (strlen($priceValue)<2)
            {
                return False;
            }
        else 
            {
                return True;
            }
    }

    $inputOk=False;
    
    // checks to see that the post variables are there, and if not they're blank 

    $city=isset($_POST["city"])?$_POST["city"]:"";
    $commodity=isset($_POST["commodity"])?$_POST["commodity"]:"";
    $buyPrice=isset($_POST["buyPrice"])?$_POST["buyPrice"]:"";
    $sellPrice=isset($_POST["sellPrice"])?$_POST["sellPrice"]:"";

    // if all 4 of the inputs validate, then load the payload string with the values (else with a 1 for the successful values)
    
    if (validateCity($city) and validateCity($commodity) and validatePrice($buyPrice) and validatePrice($sellPrice))
        {
             $payloadStatus="Ok";
              $payloadString=
                    $city .','. $commodity .','. $buyPrice .','.  $sellPrice;
            $inputOk=True;
           
        }
    else 
        {
            $payloadStatus="Error";
            $payloadString=validateCity($city).",".validateCity($commodity).",".validatePrice($buyPrice).",".validatePrice($sellPrice);
            $inputOk=False;    
        }
    
   
    

   
    // if the input has been validated, head on to the db section 
    if ($inputOk)
        {
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

      //  $city = "Lisbon";
      //  $commodity="Grain";
      //  $buyPrice=50;
      //  $sellPrice=51;

        // to check if the commodity and city values are present in the database or not

        $stmt=$conn->prepare("SELECT city,commodity,buyingPrice,sellingPrice from commodities where city=? and commodity=?");
        if ($stmt)
            {
                $stmt->bind_param("ss",$city,$commodity);
              //  $payloadStatus="OkCheck";
            }
            else 
                {
                   // $payloadStatus="NotOkCheck";
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
                //$payloadStatus="OkCheck3";

            }
            else 
                {
                    echo '</br> no existing record for ' . $city . " and " . $commodity;
                    //$payloadStatus="NotOkCheck3";
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
                
                if ($stmt)
                    {
                                $stmt->bind_param("ssii",$city,$commodity,$buyPrice,$sellPrice);
                                echo "</br>There's a statment";
                                $payloadStatus="OkCheck2";
                    }
                    else 
                        {
                            echo "</br>no statement";
                        }
                
                if ($stmt->execute())
                    {
                        echo '</br>successfully added';
                        $payloadStatus="OkCheck5";
                        $conn->close();
                    }
                    else 
                        {
                            echo "record add failed";
                        }
                
            }   
        }
        
        $form = 
                '
                    <form id="superForm" action="../index.php" method="post">
                        <input type="hidden" value='.$payloadStatus.' id="status" name="status">
                        <input type="hidden" value='.$payloadString .' id="payload" name="payload">

                    </form>
                    <script>document.getElementById("superForm").submit()</script>
                ';
                echo $form;


?>