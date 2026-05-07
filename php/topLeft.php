<?php 
   
    // left portion  
    $pageOpen = '<body>';
    $pageBulk = 
    '
        <form name="commodityInput" method="post" action="php\handleInput.php">
        <label for="city">City</label></br>
            <input id="city" name="city" label="City"></br>
         <label for="commodity">Commodity</label></br>
            <input id="commodity" name="commodity" label="Commodity"></br>
        <label for="buyPrice">Buying Price</label></br>
            <input id="buyPrice" name="buyPrice" label="Buying Price"></br>
            <label for="sellPrice">Selling Price</label></br>
            <input id="sellPrice" name="sellPrice" label="Selling Price"></br>
        
            
           
            
            
            <button type="submit">Submit</button>
        </form>
    ';
    $pageClose = '</body><script src="js/additionalScripts.js"></script></body>';
    echo $pageOpen . $pageBulk . $pageClose
?>