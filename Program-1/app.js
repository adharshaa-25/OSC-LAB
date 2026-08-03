let image = ["./assets/img1.jpg", "./assets/img2.jpg", "./assets/img3.jpg"];
let slide_show = document.getElementById('slideshow');
let index = 0;
let changeImage = () => {
    index++;
    if (index >= image.length) 
        {
        index = 0;
    }
    slide_show.src = image[index];
}
setInterval(changeImage, 2000);