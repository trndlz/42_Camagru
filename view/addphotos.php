        <?php

        require('model/photosmanager.php');

        if (isset($_POST['tree']) && isset($_POST['img'])) {
            $img = $_POST['img'];
            $tree_url = $_POST['tree'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = 'public/upload/'.date("YmdHis").'.png';
            if (!file_put_contents($file, $data))
                echo "<p>The webcam image could not be saved</p>";
            $imgcpy = imagecreatefrompng($file);
            $treecpy = imagecreatefrompng($tree_url);
            imagealphablending($treecpy, true);
            imagesavealpha($treecpy, true);
            imagecopy($imgcpy, $treecpy, 0, 0, 0, 0, 640, 480);
            imagepng($imgcpy, $file);
            $db = new photosManager();
            $db->addPhoto('1', $file);
        }        
        ?>
        
        <h1 id="cam_titles">Choose your tree !</h1>
        <div id="trees">
            <img src="public/img/tree1.png" class="i_trees active" width="25%">
            <img src="public/img/tree2.png" class="i_trees" width="25%">
            <img src="public/img/tree3.png" class="i_trees" width="25%">
        </div>
        <h1 id="cam_titles">Take a photo !</h1>
            <video id="videoElement"></video>
        <p class="button_p">
            <input id="snap" type="button" disabled="true" value="Snapshot" class="webcam-button">
            <input id="no_effect" type="button" value="No effect" class="webcam-button">
            <input id="gray" type="button" value="Gray scale" class="webcam-button">
            <input id="invert" type="button" value="Invert" class="webcam-button">
        </p>
        <h1 id="cam_titles">Add filters ?</h1>
        <canvas id="canvas" width="300" height="300"></canvas>
        <h1 id="cam_titles">Happy ?</h1>
        <p class="button_p">
            <form method="POST" action="" onsubmit="createImg();">
                <input id="inp_img" name="img" type="hidden" value="">
                <input id="tree" name="tree" type="hidden" value="">
                <input id="upload" type="Submit" value="Upload" class="webcam-button" disabled="true">
            </form>
        </p>
        <canvas id="canvas_copy" width="300" height="300"></canvas>
        <canvas id="canvas_tree" width="300" height="300"></canvas>
        <script src="public/js/webcam.js"></script>