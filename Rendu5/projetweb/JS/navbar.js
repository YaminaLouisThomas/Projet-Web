
window.addEventListener('scroll', () =>{
    var nav = document.querySelector("nav")
    // const scrollable = document.documentElement.scrollHeight - 2381;
    const scrolled = window.scrollY;
    console.log(scrolled);
    if (scrolled > 0){
        nav.classList.add("fixe");
    }
    else {
        nav.classList.remove("fixe");
    }
})

