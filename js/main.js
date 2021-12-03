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

    let dark_theme_class = 'dark';

    if(sessionStorage.getItem('decoMode') == 'medalRewarded'){
        dark_theme_class = 'marine'}
    else
        dark_theme_class = 'dark';

    if(sessionStorage.getItem('active') == 'true')
        body.classList.add(dark_theme_class)
    else if(sessionStorage.getItem('decoMode') == 'medalRewarded' && sessionStorage.getItem('active') == null){
        body.classList.add('gold')
    }




    toggle_btn.onclick = function(){
        console.log(Math.random());
        if (body.classList.contains(dark_theme_class)) {
            body.classList.remove(dark_theme_class);
            if(sessionStorage.getItem('decoMode') == 'medalRewarded'){
                body.classList.add('gold')
            }
            sessionStorage.removeItem('active')
        }
        else{
            if(sessionStorage.getItem('decoMode') == 'medalRewarded'){
                dark_theme_class = 'marine'}
            else
                dark_theme_class = 'dark';
            body.classList.add(dark_theme_class);
            body.classList.remove('gold')
            sessionStorage.setItem('active', 'true')
        }

    };
})