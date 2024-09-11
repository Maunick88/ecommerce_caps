gsap.registerPlugin(ScrollTrigger)

gsap.from('.logo div',{
    opacity:0,
    delay:1,
    x:20
} )
document.addEventListener("DOMContentLoaded", function() {
    const textos = [
        "DISFRUTA <strong>ENVÍO GRATIS</strong> A PARTIR DE <strong>$649</strong> ",
        "<STRONG>DESCUENTOS </STRONG>ESPECIALES ESTE MES",
        "NUEVA COLECCIÓN DISPONIBLE <STRONG>AHORA</STRONG>",
        "COMPRA <STRONG>MÁS</STRONG>, AHORRA <STRONG>MÁS</STRONG>"
    ];

    let indice = 0;
    const span = document.getElementById("cambio-texto");

    setInterval(() => {
        // Mueve el texto actual hacia arriba
        span.style.transform = 'translateY(-200%)';

        setTimeout(() => {
            // Cambia el texto después de la animación de salida
            indice = (indice + 1) % textos.length;
            span.innerHTML = textos[indice];
            // Mueve el texto nuevo desde abajo
            span.style.transform = 'translateY(100%)';
            
            // Luego, regresa a su posición original para que se vea la animación de entrada
            setTimeout(() => {
                span.style.transform = 'translateY(0)';
            }, 100); // Espera un poquito antes de moverlo a la posición original
        }, 1000); // Duración de la animación de salida (debe coincidir con la transición en CSS)
    }, 3000); // Cambia cada 3 segundos
});


const menu_items = document.querySelector('.menu-items')
gsap.from(menu_items.children ,{
    opacity:0,
    x:0,
    duration:1,
    delay:1.5,
    stagger:{
        amount:1
    }
})
// scripts.js


gsap.utils.toArray('.star').forEach(star=>{
    gsap.fromTo(star,{
        rotation:450,
        opacity:0,
        y:100
    },{
        rotation:0,
        opacity:1,
        y:0,
        duration:1,
        delay:1.5,
        scrollTrigger:star
    })
})


gsap.utils.toArray('.title').forEach(title=>{
    gsap.fromTo(title,{
        letterSpacing:'10px',
        opacity:0,
        x:300,
        skewX:65
    },{
        letterSpacing:'0',
        opacity:1,
        x:0,
        skewX:0,
        duration:1,
        delay:.5,
        scrollTrigger:title
    })
})

gsap.utils.toArray('p').forEach(p=>{
    gsap.fromTo(p,{
        opacity:0,
        x:150,
        skewX:30
    },{
        opacity:1,
        x:0,
        skewX:0,
        duration:1,
        delay:.5,
        scrollTrigger:p

    })
})


gsap.utils.toArray('button').forEach(button=>{
    gsap.fromTo(button,{
        opacity:0,
    },{
        opacity:1,
        duration:1,
        delay:1,
        scrollTrigger:button

    })
})


gsap.from('.pyramid' ,{
    opacity:0,
    scale:.5,
    duration:1,
    delay:.5
})

gsap.fromTo('.hand',{
    scale:.2,
    opacity:0,
    skewY:30
},{
    scale:1,
    opacity:1,
    skewY:0,
    duration:1,
    delay:.5,
    scrollTrigger:'.hand'
})



gsap.utils.toArray('.line').forEach(line=>{
    gsap.fromTo(line,{
        opacity:0,
        width:'0%'
    },{
        opacity:1,
        width:'100%',
        duration:1,
        delay:1,
        scrollTrigger:line

    })
})


gsap.utils.toArray('.rotation').forEach(rotate=>{
    gsap.fromTo(rotate,{
        opacity:0,
        rotation:350,
        scale:.2
    },{
        opacity:1,
        rotation:0,
        scale:1,
        duration:1,
        delay:1,
        scrollTrigger:rotate

    })
})


gsap.fromTo('.card' ,{
    opacity:0,
    scale:.1,
},{
    opacity:1,
    scale:1,
    duration:1,
    delay:.5,
    stagger:{
        amount:1
    },
    scrollTrigger:'.card'
})

const menu = document.querySelector('.menu')


gsap.from(menu.children,{
    opacity:0,
    x:50,
    duration:1,
    delay:.5,
    stagger:{
        amount:1
    },
    scrollTrigger:{
        trigger:menu.children
    }
})