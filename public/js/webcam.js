var header = document.getElementById("trees");
var i_trees = header.getElementsByClassName("i_trees");
for (var i = 0; i < i_trees.length; i++) {
  i_trees[i].addEventListener("click", function() {
    active_photo = document.getElementsByClassName("active");
    active_photo[0].className = active_photo[0].className.replace(" active", "");
    this.className += " active";
  });
}

function createImg() {
    var canvas = document.getElementById('canvas_copy');
    document.getElementById('inp_img').value = canvas.toDataURL();
 }

navigator.mediaDevices.getUserMedia({ audio: false, video: true })
.then(function(stream) {
    var video = document.getElementById('videoElement');
    var snap = document.getElementById('snap');
    var canvas = document.getElementById("canvas");
    var canvas_tree = document.getElementById("canvas_tree");
    var canvas_copy = document.getElementById("canvas_copy");
    var gray = document.getElementById("gray");
    var no_effect = document.getElementById("no_effect");
    var invert = document.getElementById("invert");
    var upload = document.getElementById('upload');
    var ctx = canvas.getContext('2d');
    var videoWidth, videoHeight;
    var filter = 'none';
    
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
            var header = document.getElementById("trees");
            var selected_tree = header.getElementsByClassName("active");
            document.getElementById('tree').value = selected_tree[0].src;
            canvas.getContext('2d').drawImage(video, 0, 0, videoWidth, videoHeight, 0, 0, videoWidth, videoHeight);
            canvas.getContext('2d').drawImage(selected_tree[0], 0, 0, videoWidth, videoHeight, 0, 0, videoWidth, videoHeight);
            canvas_copy.getContext('2d').drawImage(video, 0, 0, videoWidth, videoHeight, 0, 0, videoWidth, videoHeight);
        }
        gray.onclick = function() {
            filter = 'grayscale(100%)';
            video.style.filter = filter;
        }
        no_effect.onclick = function() {
            filter = 'none';
            video.style.filter = filter;
        }
        invert.onclick = function() {
            filter = 'invert(100%)';
            video.style.filter = filter;
        }
    };
})
.catch(function(err) {
  console.log(err.name + ": " + err.message);
});