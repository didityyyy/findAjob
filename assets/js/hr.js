$(document).ready(()=>{
    //TOGGLE TAB
    const tabs = document.querySelector(".tabs");
    const tabButton = document.querySelectorAll(".tab-toggle");
    const contents = document.querySelectorAll(".content");

    tabs.onclick = e => {
        const id = e.target.dataset.id;
        if (id) {
            tabButton.forEach(btn => {
                btn.classList.remove("active");
            });
            e.target.classList.add("active");
            contents.forEach(content => {
                content.classList.remove("active");
            });
            const element = document.getElementById(id);
            element.classList.add("active");
        }
    }
});