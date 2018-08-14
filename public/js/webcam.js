

navigator.mediaDevices.getUserMedia({ audio: false, video: { width: 640, height: 640 } })
.then(function(stream) {
    var video = document.getElementById('videoElement');
    var snap = document.getElementById('snap');
    var canvas = document.getElementById("canvas");
    var canvas_copy = document.getElementById("canvas_copy");
    var gray = document.getElementById("gray");
    var no_effect = document.getElementById("no_effect");
    var invert = document.getElementById("invert");
    var ctx = canvas.getContext('2d');
    var videoWidth, videoHeight;
    var filter = '';
    
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
            canvas.getContext('2d').drawImage(video, 0, 0, videoWidth, videoHeight, 0, 0, videoWidth, videoHeight);
            canvas_copy.getContext('2d').drawImage(video, 0, 0, videoWidth, videoHeight, 0, 0, videoWidth, videoHeight);
            // ctx.filter = 'grayscale(100%)';
            // canvas.getContext('2d').drawImage(video, 0, 0, videoWidth, videoHeight, 0, 0, videoWidth, videoHeight);
            // canvas_copy.getContext('2d').drawImage(video, 0, 0, videoWidth, videoHeight, 0, 0, videoWidth, videoHeight);
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