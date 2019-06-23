const buttonHome = document.querySelector('.home');
buttonHome.addEventListener('click', form_home);

const buttonAbout = document.querySelector('.about');
buttonAbout.addEventListener('click', form_about);

const buttonProject = document.querySelector('.project');
buttonProject.addEventListener('click', form_project);



countHome = 0
function form_home() {
    var form_home = document.querySelector(".form_home");
    var main =  document.querySelector("main");
    if (countHome == 0) {
        form_home.classList.add("display_form");
        main.classList.add("blurring");
        countHome += 1;
    }
    else {
        form_home.classList.remove("display_form");
        main.classList.remove("blurring");
        countHome -= 1;
    }
}

countAbout = 0
function form_about() {
    var form_about = document.querySelector(".form_about");
    var main = document.querySelector("main");
    if (countAbout == 0){
        form_about.classList.add("display_form");
        main.classList.add("blurring");
        countAbout += 1;
    }
    else{
        form_about.classList.remove("display_form");
        main.classList.remove("blurring");
        countAbout -= 1
    }
}

countProject = 0
function form_project() {
    var form_project = document.querySelector(".form_project");
    var main = document.querySelector("main");
    if (countProject == 0){
        form_project.classList.add("display_form");
        main.classList.add("blurring");
        countProject += 1;
    }
    else{
        form_project.classList.remove("display_form");
        main.classList.remove("blurring");
        countProject -= 1
    }
}

