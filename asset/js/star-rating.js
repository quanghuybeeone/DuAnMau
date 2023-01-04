const starsUL = document.querySelector('.stars')
const stars = document.querySelectorAll('.star')
stars.forEach((star, index) => {
    star.starValue = (index + 1)
    star.addEventListener('click', starRate)
});
function starRate(e) {
    stars.forEach((star, index) => {
        if (index < e.target.starValue) {
            star.classList.add("orange")
        } else {
            star.classList.remove("orange")
        }
    });
}