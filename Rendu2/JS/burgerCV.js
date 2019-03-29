count = 0
function burger(){
    var app = document.querySelector("aside")
    if (count == 0){
        app.classList.add("apparition")
        count += 1
    }
    else {
        app.classList.remove("apparition")
        count -= 1
    }
}