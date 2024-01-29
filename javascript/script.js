document.addEventListener('DOMContentLoaded', function () {
    let popup = document.getElementById("popup");
    let addToCartButtons = document.querySelectorAll(".addToCartBtn");

    addToCartButtons.forEach(function (button) {
        button.onclick = function () {
            console.log("Button clicked");
            popup.classList.add("open-popup");
        };
    });

    function closePopup() {
        console.log("Popup closed");
        popup.classList.remove("open-popup");
        window.location.href = "signuppage.html";
    }

    function cancelPopup() {
        console.log("Popup canceled");
        popup.classList.remove("open-popup");
    }
});
