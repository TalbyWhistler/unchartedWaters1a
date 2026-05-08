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



function cityButton(cityValue)
{
    console.log("City button hit with city value " + cityValue);
    console.log(`{'city':'`+cityValue+`'}`);
    fetch
    ('php/handleInputB.php',
        {
            method:'POST',
            headers:{'Content-Type':'application/x-www-form-urlencoded'},
            body:new URLSearchParams({city:cityValue})
        }
    )
    .then(r=>r.json())
    .then(data=>console.log(data));
}