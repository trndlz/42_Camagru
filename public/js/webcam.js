

navigator.mediaDevices.getUserMedia({ audio: false, video: true })
.then(function(stream) {
    var video = document.getElementById('videoElement');
    var snap = document.getElementById('snap');
    var canvas = document.getElementById("canvas");
    var start = document.getElementById("start_rec");
    var stop = document.getElementById("freeze_rec");
    
    video.srcObject = stream;
    video.onloadedmetadata = function() {
        snap.disabled = false;
        start.onclick = function() {
            video.play();
            on = 1;
        }
        stop.onclick = function() {
            video.pause();
            on = 0;
        }
        snap.onclick = function() {
            canvas.getContext("2d").drawImage(video, 0, 0, 300, 300, 0, 0, 300, 300);
            var img = canvas.toDataURL("image/png");
            console.log(img);
        }
    };
})
.catch(function(err) {
  console.log(err.name + ": " + err.message);
});