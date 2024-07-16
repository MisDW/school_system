const btn_dropdown = document.querySelector(".container__dropdown__user")
let count = 0

const user__box = document.querySelector(".user__box")
.addEventListener("click", (e) => {
    if ( count < 1 ){
        btn_dropdown.style.display = "block"
        count++
    }else{
        btn_dropdown.style.display = "none"
        count = 0
    }
});