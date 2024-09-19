var table = document.querySelectorAll("th")
var searchele = document.getElementById("search")
var productlist = product.querySelectorAll("tr")

searchele.addEventListener("keyup", function(){
        var enteredvlu = event.target.value.toUpperCase()

        for(count=0; count<productlist.length; count++)
            {
                var proname = productlist[count].querySelector("td").textContent

                if(proname.toUpperCase().indexOf(enteredvlu)< 0)
                {
                    productlist[count].style.display="none"
                }
                else{
                    productlist[count].style.display="block"
                }
            }
})