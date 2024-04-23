const canvas = document.querySelector("#canvas");
let target = document.querySelector("h4");
let ctx = canvas.getContext('2d');
7

canvas.height = window.innerHeight;
canvas.width = window.innerWidth;
const particleArray = [];
let hue = 0;
let color = ['red', 'green', 'blue', 'orange', 'lightgray', 'pink', 'purple'];
let selectedColor = '';



window.addEventListener('resize', function () {
    canvas.height = window.innerHeight;
    canvas.width = window.innerWidth;

})

let mouse = {
    x: null,
    y: null
}

//mouse click event 
canvas.addEventListener('click', event => {
    //console.log(`Mouse clicked at ${event.x},${event.y}`);
    mouse.x = event.x;
    mouse.y = event.y;
    // console.log(EvalErrorent);
    // selectedColor = color[Math.floor(Math.random() * 6)];
    init()
    // drawCircle();
})

// mose move event 
canvas.addEventListener("mousemove", event => {
    mouse.x = event.x;
    mouse.y = event.y;
    // selectedColor = color[Math.floor(Math.random() * 6)];
    init()
    // drawCircle();
})


// particale class 
class Perticale {
    constructor() {
        this.x = mouse.x;
        this.y = mouse.y;
        // this.x = Math.random() * canvas.width;
        // this.y = Math.random() * canvas.height;
        this.size = Math.random() * 5 + 1;
        this.speedx = Math.random() * 3 - 1.5;
        this.speedy = Math.random() * 3 - 1.5;
        this.color = 'hsl(' + hue + ' , 100%, 50%)';
        // this.color = color[Math.floor(Math.random() * 5)] 

    }

    update() {
        this.x += this.speedx;
        this.y += this.speedy;
        if (this.size > 0.5) this.size -= 0.2;
    }

    draw() {

        ctx.fillStyle = this.color;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fill();
    }
}

// init && test the function 
function init() {
    for (let index = 0; index < 5; index++) {
        particleArray.push(new Perticale());
    }
    // console.log(particleArray);
}


function handlePerticle() {
    for (let index = 0; index < particleArray.length; index++) {
        particleArray[index].update();
        particleArray[index].draw();
        //canvas.style.backgroundColor = particleArray[index].color;
        //console.log(particleArray[index].color);
        if (particleArray[index].size < 0.8) {
            particleArray.splice(index, 1);
            index--;
        }
    }
}


// animate funciton 
function clearCnavas() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    // ctx.fillStyle = 'rgba(0,0,0,0.08)';
    // ctx.fillRect(0, 0, canvas.width, canvas.height);
    handlePerticle();
    hue++;
    // document.body.style.backgroundColor = this.color;
    // canvas.style.backgroundColor = particleArray[index].color;


    requestAnimationFrame(clearCnavas)
}
clearCnavas();
