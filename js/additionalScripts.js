function testFunction0()
{   
    output='<?php include php/php2a.php ?>';
    document.getElementById("outputArea0").innerText=output;
    
    console.log(output);
    
}



function pg2Print(nameOfElement,text)
{
    document.getElementsById(nameOfElement).innerText=text;

}