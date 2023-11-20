var snackName = localStorage.getItem("snack_name");

if (snackName) {
    var nav = document.getElementById("nav");
    var navList = nav.querySelector("ul");

    while (navList.firstChild) {
        navList.removeChild(navList.firstChild);
    }

    var li = document.createElement("li");
    li.textContent = snackName + "님 반갑습니다!";
    navList.appendChild(li);

    // localStorage.removeItem("snack_name");
}