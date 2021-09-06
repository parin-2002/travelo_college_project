let darkmode = document.querySelector(".darkmodebtn");
darkmode.addEventListener("click", function (e) {
  document.querySelector(":root").classList.toggle("darkmode");
});
