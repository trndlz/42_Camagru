

navigator.mediaDevices.getUserMedia({ audio: false, video: true })
.then(function(stream) {
    var video = document.getElementById('videoElement');
    var snap = document.getElementById('snap');
    var canvas = document.getElementById("canvas");
    var canvas_copy = document.getElementById("canvas_copy");
    var start = document.getElementById("start_rec");
    var stop = document.getElementById("freeze_rec");
    var gray = document.getElementById("gray");
    var no = document.getElementById("no_effect");
    var ctx = canvas.getContext('2d');
    
    video.srcObject = stream;
    video.onloadedmetadata = function() {
        snap.disabled = false;
        start.onclick = function() {
            video.play();
        }
        stop.onclick = function() {
            video.pause();
        }
        snap.onclick = function() {
            // if (!video.paused) {
            //     console.log("La video est lancée");
            // }
            canvas.getContext('2d').drawImage(video, 0, 0, 300, 300, 0, 0, 300, 300);
            canvas_copy.getContext('2d').drawImage(canvas, 0, 0, 300, 300, 0, 0, 300, 300);
        }
        gray.onclick = function() {
            
            ctx.filter = 'grayscale(100%)';
            canvas.getContext('2d').drawImage(video, 0, 0, 300, 300, 0, 0, 300, 300);
        }
        no_effect.onclick = function() {
            ctx.filter = 'none';
            canvas.getContext('2d').drawImage(canvas_copy, 0, 0, 300, 300, 0, 0, 300, 300);
        }
    };
})
.catch(function(err) {
  console.log(err.name + ": " + err.message);
});