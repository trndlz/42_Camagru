// Canvas & Filters 
var video = document.getElementById('videoElement');
var filter = 'none'; 
var canvas = document.getElementById("canvas");
var canvas_copy = document.getElementById("canvas_copy");
var overlay_image = document.getElementById("overlay");
var final_image = document.getElementById("modal_result");

// Closing modal
window.onclick = function(event) {
    if (event.target == final_image) {
        final_image.style.display = "none";
    }
}

// Hidden forms
var upload = document.getElementById('upload');
var ctx = canvas.getContext('2d');
var videoWidth, videoHeight;
var form_filter = document.getElementById('filter');
videoWidth = 640;
videoHeight = 480;

// Changes class of selected tree
var header = document.getElementById("div_choose_trees");
var i_trees = header.getElementsByClassName("i_trees");
for (var i = 0; i < i_trees.length; i++) {
  i_trees[i].addEventListener("click", function() {
    active_photo = document.getElementsByClassName("active");
    active_photo[0].className = active_photo[0].className.replace(" active", "");
    this.className += " active";
  });
}

// Return currently selected tree
function treeSelector() {
    var header = document.getElementById("div_choose_trees");
    var selected_tree = header.getElementsByClassName("active");
    return selected_tree[0];
}

// Upload file
document.getElementById('file').onchange = function(e) {
    var img = new Image();
    img.onload = draw;
    img.onerror = failed;
    img.src = URL.createObjectURL(this.files[0]);
  };

  // Draw in canvas_copy uploaded file
function draw() {
    canvas.width = videoWidth;
    canvas.height = videoHeight;
    canvas_copy.width = videoWidth;
    canvas_copy.height = videoHeight;
    ctx.drawImage(this, 0, 0);
    canvas_copy.getContext('2d').drawImage(this, 0,0);
    ctx.drawImage(treeSelector(), 0, 0, videoWidth, videoHeight, 0, 0, videoWidth, videoHeight);
    var selected_tree = treeSelector();
    document.getElementById('tree').value = selected_tree.src;
    console.log(selected_tree.src);
    canvas.getContext('2d').drawImage(selected_tree, 0, 0, videoWidth, videoHeight, 0, 0, videoWidth, videoHeight);
    final_image.style.display = "block";
    upload.disabled = false;
}
function failed() {
    alert("Only image files are accepted. Preferably in 640x480 !");
}

function createImg() {
    var canvas = document.getElementById('canvas_copy');
    document.getElementById('inp_img').value = canvas.toDataURL();
 }