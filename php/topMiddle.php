<?php 

    // top middle area with commodity information output 


    // takes an array with 4 values from the sql commodities table and outputs them in table form

    function priceTable($inputArray)
    {
        $output = 
        '
            <table>
                <tbody>
                    <tr>
                        <td>City:</td><td>'.$inputArray[0].'
                    </tr>
                    <tr>
                        <td>Commodity:</td><td>'.$inputArray[1].'
                    </tr>
                    <tr>
                        <td>Buying Price:</td><td>'.$inputArray[2].'
                    </tr>
                    <tr>
                        <td>Selling Price:</td><td>'.$inputArray[3].'
                    </tr>
                </tbody>
            </table>
        ';
        return $output;
    }

   // checks to see if status and payload are present, if so, use their values if not, error and blank respectively

    $postStatus=isset($_POST["status"])?$_POST["status"]:"Error";
    $postPayload=isset($_POST["payload"])?$_POST["payload"]:"";

    // may want to come up with something better for the first screen

    if ($postStatus=="Error")
    {
        $output='Invalid input '; // . $postPayload;
        outputThing($output);
    }
    else
        // if not an error, take the csv payload, separate it, and print a table. 
    {
        $payloadArray=explode(',',$postPayload);
        echo $postStatus . priceTable($payloadArray); 
    }



?>