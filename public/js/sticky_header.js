window.onscroll = function() {
	sticky_function()
};

var header = document.getElementById("stickyHeader");
var sticky = header.offsetTop;

function sticky_function() {
  if (window.pageYOffset > sticky) {
	header.classList.add("sticky");
  }
  else {
	header.classList.remove("sticky");
  }
}
