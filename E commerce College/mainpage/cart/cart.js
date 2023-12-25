let cartProducts = document.getElementById("cartProds");
let totalPrice = document.querySelector(".total");
let total = 0;
let delBtns;
let arrayOfProds = [];

window.onload = function(){
        if(localStorage.getItem("products")){
        arrayOfProds = JSON.parse(localStorage.getItem("products"))
        showProds(JSON.parse(localStorage.getItem("products")));
        calcTotalPrice();
        delBtns = document.querySelectorAll(".delete");
            
        delBtns.forEach(btn => {
            btn.onclick = del(btn.id);
        })
    

    }else{
        totalPrice.innerHTML = 0;
    }
        
}



    function calcTotalPrice(){
        let prices = document.querySelectorAll(".price");
        prices.forEach(e => {
            total += +(e.innerText);
        })
        totalPrice.innerHTML = total + "$";
    }


function showProds(arr){
    cartProducts.innerHTML = "";
    
    arr.forEach(el => {
        let prod = document.createElement('li');
        prod.classList.add('prod');
    
        let imageContainer = document.createElement('div');
        imageContainer.classList.add('image');
    
        prod.appendChild(imageContainer);
    
        let textDiv = document.createElement('div');
        textDiv.classList.add('text');
        
        let rightDiv = document.createElement('div');
        let leftDiv = document.createElement('div');
    
    
        let name = document.createElement('h2');
        name.innerHTML = el['name'];
        name.classList.add("name");
    
        let price = document.createElement('p');
        price.innerHTML = el['price'];
        price.classList.add("price");
    
        leftDiv.appendChild(name);
        leftDiv.appendChild(price);
    
        let btnPlus = document.createElement('button');
        btnPlus.innerHTML = "Delete";
        btnPlus.classList.add("delete");
        btnPlus.id = arr.indexOf(el);

        rightDiv.appendChild(btnPlus);
    
    
        textDiv.appendChild(leftDiv);
        textDiv.appendChild(rightDiv);
    
        prod.appendChild(textDiv);
        cartProducts.appendChild(prod);
    })
}
    
    


    console.log(delBtns)



function del(elClass){
    arrayOfProds.splice(elClass , elClass);
    localStorage.setItem("products" , JSON.stringify(arrayOfProds));
    showProds(arrayOfProds);
}   