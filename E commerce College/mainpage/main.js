let parentBlock = document.getElementById('slider')
let urls = ["./main page images/2204_w018_n001_957b_p15_957.jpg" , "./main page images/biswajit-giri-adidas-shoe.jpg" ,  "./main page images/1877.jpg" ]
let bulletContainer = document.querySelector('.bullets')


let currentIndex = 0;
function showImgs(imageUrl){
    let img = document.createElement('img')
    let imageContainer = document.createElement('div')


    img.src = imageUrl;
    img.alt = 'slider image'

    imageContainer.classList.add('image')
    imageContainer.appendChild(img)
    parentBlock.appendChild(imageContainer)
}

function createSlide(){
    for( url of urls){
        showImgs(url);
    }
    createBullets(urls.length);
}
function showSlide(index){
    if(index < 0){
        currentIndex = urls.length -1;
    }else if(index >= urls.length){
        currentIndex = 0;
    }
    else{
        currentIndex = index;
    }
    parentBlock.style.cssText = `transform: translateX(calc(${currentIndex} * -100%))`
}
function createBullets(length){
    for(let i = 0; i < length ;i++){
        let bullet = document.createElement('div');

        bullet.classList.add('bullet');
        bullet.id = i;
        if(i === 0){
            bullet.classList.add('active');
        }
        bulletContainer.appendChild(bullet);
    }
}




createSlide()



let bullets = document.querySelectorAll('.bullet')

bullets.forEach(bullet => {
    bullet.onclick = function(){
        bullets.forEach(e => {
            e.classList.remove('active')
        })
        bullet.classList.add('active')
        showSlide(Number(bullet.id))
    }
})

setInterval(() => {
    showSlide(currentIndex+1)
    bullets.forEach(bul => {
        bul.classList.remove('active')
        if(bul.id == currentIndex){
            bul.classList.add('active')
        }
})
} , 5000)






