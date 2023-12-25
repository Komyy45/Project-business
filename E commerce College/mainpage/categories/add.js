let arrayOfProds = [];
let addBtns = document.querySelectorAll('.add');
let  products = document.getElementsByClassName('prod');


addBtns.forEach((e) => {
    e.onclick = function(){
        storeProdInLocalStorage(e.value);
    }
})

window.onload = function(){
if(localStorage.getItem("products")){    
    arrayOfProds = JSON.parse(localStorage.getItem("products"));
    }
}

function storeProdInLocalStorage(val){
    let prodImage = document.querySelector(`.image${val}`);
    let prodPrice = document.getElementById(`prodPrice${val}`);
    let prodName = document.getElementById(`prodName${val}`);


    let tempObj = {
        "name" : prodName.innerHTML,
        "price" : prodPrice.innerHTML,
        "image" : prodImage
    }

    console.log(tempObj)
    arrayOfProds.push(tempObj)
    localStorage.setItem("products" , JSON.stringify(arrayOfProds));

}



