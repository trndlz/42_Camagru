// Canvas & Filters 
var video = document.getElementById('videoElement');
var filter = 'none'; 
var canvas = document.getElementById("canvas");
var canvas_tree = document.getElementById("canvas_tree");
var canvas_copy = document.getElementById("canvas_copy");
var overlay_image = document.getElementById("overlay");

// Buttons
var gray = document.getElementById("gray");
gray.style.filter = 'grayscale(100%)';
var no_effect = document.getElementById("no_effect");
var invert = document.getElementById("invert");
invert.style.filter = 'invert(100%)';
var sepia = document.getElementById("sepia");
sepia.style.filter = 'sepia(100%)';
var snap = document.getElementById('snap');

// Hidden forms
var upload = document.getElementById('upload');
var ctx = canvas.getContext('2d');
var videoWidth, videoHeight;
var form_filter = document.getElementById('filter');

// Changes class of selected tree
var header = document.getElementById("div_choose_trees");
var i_trees = header.getElementsByClassName("i_trees");
for (var i = 0; i < i_trees.length; i++) {
  i_trees[i].addEventListener("click", function() {
    active_photo = document.getElementsByClassName("active");
    active_photo[0].className = active_photo[0].className.replace(" active", "");
    this.className += " active";
    overlay_image.src = this.src;
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

// Hide any div
function hideDiv(x) {
    var x = document.getElementById(x);
    x.style.display = 'none';
}

// Show div
function showDiv(x) {
    var x = document.getElementById(x);
    x.style.display = 'flex';
}

// Draw in canvas_copy uploaded file
function draw() {
canvas.width = 640;
canvas.height = 480;
ctx.drawImage(this, 0,0);
canvas_copy.getContext('2d').drawImage(this, 0,0);
ctx.drawImage(treeSelector(), 0, 0, videoWidth, videoHeight, 0, 0, videoWidth, videoHeight);
var selected_tree = treeSelector();
document.getElementById('tree').value = selected_tree.src;
hideDiv('div_use_webcam');
showDiv('div_final_result');
upload.disabled = false;
}
function failed() {
    alert("Only image files are accepted. Preferably in 640x480 !");
}

// Gray snapshot
gray.onclick = function() {
    filter = 'grayscale(100%)';
    form_filter.value = 'grayscale';
    video.style.filter = filter;
    overlay_image.style.filter = filter;
}

// Sepia snapshot
sepia.onclick = function() {
    filter = 'sepia(100%)';
    form_filter.value = 'sepia';
    video.style.filter = filter;
    overlay_image.style.filter = filter;
}

// No effect snapshot
no_effect.onclick = function() {
    filter = 'none';
    form_filter.value = 'none';
    video.style.filter = filter;
    overlay_image.style.filter = filter;
}

// Inverse colors snapshot
invert.onclick = function() {
    filter = 'invert(100%)';
    form_filter.value = 'invert';
    video.style.filter = filter;
    overlay_image.style.filter = filter;
}

function createImg() {
    var canvas = document.getElementById('canvas_copy');
    document.getElementById('inp_img').value = canvas.toDataURL();
 }

navigator.mediaDevices.getUserMedia({ audio: false, video: true })
.then(function(stream) {
    video.srcObject = stream;
    video.onloadedmetadata = function() {
        snap.disabled = false;
        videoWidth = video.videoWidth;
        videoHeight = video.videoHeight;
        canvas.width  = videoWidth;
        canvas.height = videoHeight;
        canvas_copy.width  = videoWidth;
        canvas_copy.height = videoHeight;
        video.play();
        snap.onclick = function() {
            ctx.filter = filter;
            upload.disabled = false;
            var current_tree = treeSelector();
            document.getElementById('tree').value = current_tree.src;
            canvas.getContext('2d').drawImage(video, 0, 0, videoWidth, videoHeight, 0, 0, videoWidth, videoHeight);
            canvas.getContext('2d').drawImage(current_tree, 0, 0, videoWidth, videoHeight, 0, 0, videoWidth, videoHeight);
            canvas_copy.getContext('2d').drawImage(video, 0, 0, videoWidth, videoHeight, 0, 0, videoWidth, videoHeight);
            showDiv('div_final_result');
        }
    };
})
.catch(function(err) {
  console.log(err.name + ": " + err.message);
});