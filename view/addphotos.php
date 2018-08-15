        <h1 id="cam_titles">Choose your tree !</h1>
        <div id="trees">
            <img src="public/img/tree1.png" class="i_trees active" width="25%">
            <img src="public/img/tree2.png" class="i_trees" width="25%">
        </div>
        <h1 id="cam_titles">Take a photo !</h1>
        <video id="videoElement"></video>
        <p class="button_p">
            <input id="snap" type="button" disabled="true" value="Snapshot" class="webcam-button"></input>
            <input id="no_effect" type="button" value="No effect" class="webcam-button"></input>
            <input id="gray" type="button" value="Gray scale" class="webcam-button"></input>
            <input id="invert" type="button" value="Invert" class="webcam-button"></input>
        </p>
        <h1 id="cam_titles">Add filters ?</h1>
        <canvas id="canvas" width="300" height="300"></canvas>
        <h1 id="cam_titles">Happy ?</h1>
        <p class="button_p">
            <input id="snap" type="button" disabled="true" value="Submit" class="webcam-button"></input>
        </p>
        <canvas id="canvas_copy" width="300" height="300"></canvas>
        <script src="public/js/webcam.js"></script>