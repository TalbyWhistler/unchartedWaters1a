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
           
        }
    else 
        {
            $payloadStatus="Error";
            $payloadString=validateCity($city).",".validateCity($commodity).",".validatePrice($buyPrice).",".validatePrice($sellPrice);
        }
    
   
    // submits a form back to the index page with the payloadStatus and payloadString

    $form = 
    '
        <form id="superForm" action="../index.php" method="post">
            <input type="hidden" value='.$payloadStatus.' id="status" name="status">
            <input type="hidden" value='.$payloadString .' id="payload" name="payload">

        </form>
        <script>document.getElementById("superForm").submit()</script>
    ';

    // prints the form that takes us back to the index.php;
    echo $form;


?>