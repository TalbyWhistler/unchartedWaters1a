<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/additionalStyles.css"/>
</head>
<body>

<table id='headerTable'>
    <tbody>

    <tr>
        <td id="column0">
            <?php include 'php/topLeft.php' ?>
        </td>

 
    
        <td id="column1">
            <?php include 'php/topMiddle.php' ?>
        </td>
   
    
        <td id="column2">
            <?php include 'php/topRight.php' ?>
        </td>
    </tr>


    </tbody>
    
</table>
   
<div id="bigPage">
    <table id="pageTable">
        <tbody>
            <tr>
               
                    <td id="pageCol0">
                        <p>Data</p>
                        <?php include 'php/pageCol0.php' ?>
                        

                    </td>
                    <td id="pageCol1">
                        <p id="cityInfo" name="cityInfo">DataB</p>
                        <?php include 'php/pageCol1.php'?>
                    </td>
                    
                    <td id="pageCol2">
                        <p>DataC</p>
                    </td>              
            </tr>
        </tbody>
    </table>
</div>
<p id="cityInfoOut"></p>

    <script src="js/additionalScripts.js"></script>
</body>
</html>