window.addEventListener('load', function(){
    let dropdowns = document.querySelectorAll(".dropdown");
    for(let dropdown of dropdowns) {
        let content = dropdown.querySelector(".dropdown_content");
        dropdown.addEventListener("mouseover", () => {
            content.classList.remove("hidden");
        })
        dropdown.addEventListener("mouseout", () => {
            content.classList.add("hidden");
        })
    }
    const toggle_btn = document.querySelector('#theme-btn');

    const body = document.querySelector('body');

    const dark_theme_class = 'dark';

    if(sessionStorage.getItem('active') == 'true')
        body.classList.add(dark_theme_class)

    toggle_btn.onclick = function(){
        console.log(Math.random());
        if (body.classList.contains(dark_theme_class)) {
            body.classList.remove(dark_theme_class);
            sessionStorage.removeItem('active')
        }
        else{
            body.classList.add('dark');
            sessionStorage.setItem('active', 'true')
        }

    };
})