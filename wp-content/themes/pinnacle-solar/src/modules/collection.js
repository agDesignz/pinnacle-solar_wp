

let resizeTimer;
window.addEventListener("resize", () => {
  console.log('resized');
  document.body.classList.add("u-resize-animation-stopper");
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(() => {
    document.body.classList.remove("u-resize-animation-stopper");
  }, 400);
});

