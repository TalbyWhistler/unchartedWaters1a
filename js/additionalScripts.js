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

// takes json input from handleInputB and displays the city and commodity information
function displayCityInfoPayload(jsonInput)
{
    
    let status=jsonInput["statusB"];
    let message=jsonInput["messageB"];
    let payload=jsonInput["payloadB"];

    let commoditiesArray=[];
    let buyingPriceArray=[];
    let sellingPriceArray=[];




    let payloadArray=payload.split(',');
    let outputBlock='';
    outputBlock='<h3>'+payloadArray[0]+'</h3></br>';

    for(let i=1;i<=(payloadArray.length-1);i++)
    {
       // console.log(payloadArray[i]);
        commoditiesArray.push(payloadArray[i]);
        i++;
        buyingPriceArray.push(payloadArray[i]);
       // console.log(payloadArray[i]);
        i++;
        sellingPriceArray.push(payloadArray[i]);
       // console.log(payloadArray[i]);
    }


    for (let i=0;i<commoditiesArray.length-1;i++)
    {

        console.log(commoditiesArray[i]);
        outputBlock+='</br>'+commoditiesArray[i];
        console.log(buyingPriceArray[i]);
        outputBlock+='</br>Buys at:'+buyingPriceArray[i];
        console.log(sellingPriceArray[i]);
        outputBlock+='</br>Sells at:'+sellingPriceArray[i];
        //console.log(payloadArray.length);
    }
    
   // console.log("Arraylength",payloadArray.length)
    
   

    
    document.getElementById("cityInfoOut").innerHTML=outputBlock;
   
    
}

function cityButton(cityValue)
{
    let dataPayload;
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
    .then(data=>displayCityInfoPayload(data));
    
    //.then(data=>document.getElementById("cityInfo").innerHTML=data["statusB"]);
   // .then(document.getElementById("cityInfo").innerHtml="testo");
   // .then(data=>document.getElementById("cityInfo").innerText=data)
   // .then(data=>console.log(data))
   // .then(data=>document.getElementById("cityInfo").innerText="testo");

}