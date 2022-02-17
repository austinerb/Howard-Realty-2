// set google map height to property image height
let img = document.querySelector("#item-img");
let map = document.querySelector("#item-map");

setMapHeight();

function setMapHeight() {
  map.style.height = img.offsetHeight + "px";
}

window.addEventListener("resize", function() {
  setMapHeight();
});
