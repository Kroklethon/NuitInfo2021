let dropdowns = document.querySelectorAll(".dropdown");
for(let dropdown of dropdowns) {
    let content = dropdown.querySelector(".dropdown_content");
    console.log(content)
    dropdown.addEventListener("mouseover", () => {
        content.classList.remove("hidden");
    })
    dropdown.addEventListener("mouseout", () => {
        content.classList.add("hidden");
    })
}