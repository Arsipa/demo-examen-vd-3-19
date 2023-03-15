const slider_track = document.querySelector(".slider__track");
const slide_width = document.querySelector(".slide").offsetWidth;
const gap = 50;
const prev = document.querySelector(".prev");
const next = document.querySelector(".next");
const move_position = slide_width + gap;
let position = 0;

checkButtons();

function checkButtons() {
    if (position == 0) {
        prev.classList.add("disabled");
    } else {
        prev.classList.remove("disabled");
    }
    if (position == -(slider_track.scrollWidth - move_position + gap)) {
        next.classList.add("disabled");
    } else {
        next.classList.remove("disabled");
    }
}

prev.onclick = () => {
    position += move_position;
    slider_track.style.transform = `translateX(${position}px)`;
    checkButtons();
};
next.onclick = () => {
    position -= move_position;
    slider_track.style.transform = `translateX(${position}px)`;
    checkButtons();
};
