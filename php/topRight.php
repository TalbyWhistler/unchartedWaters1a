<?php 

    // top right section with client id panel and testing output 
    
    $table1=' <table id=\'table0\'>
        <tbody>
            <tr id="row0">
            <!--   <th>PHP_SELF</th> -->
                <th>SERVER_NAME</th>
                <th>REQUEST_METHOD</th>
                <th>REMOTE_ADDR</th>
            </tr>
            <tr>
                <!-- <td>' . $_SERVER['PHP_SELF']. '</td> -->
                <td>' . $_SERVER['SERVER_NAME']. '</td>
                <td>' . $_SERVER['REQUEST_METHOD']. '</td>
                <td>' . $_SERVER['REMOTE_ADDR']. ' </td>
            </tr>
        </tbody>
    </table>';
    $output='<h2>Ha Ha Ha!</h2>';
    //$output=$output . $_SERVER['PHP_SELF'] . ":" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['REQUEST_METHOD'] . ":" . $_SERVER['REMOTE_ADDR'];
    
    $output=$output . '<h2>Hi There!</h2><p>Welcome to the php practice page of STeve Tatone, let\'s see what kind of mischief we get up to!</p>';
    echo $table1;

    require 'php/dbConnect.php';
    // require 'php/dbTest.php';
    
?>