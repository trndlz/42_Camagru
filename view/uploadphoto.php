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
                header("Location: ?action=add&message=The webcam image could not be saved :( You can now login&message_type=failure");
            $imgcpy = imagecreatefrompng($file);
            $treecpy = imagecreatefrompng($tree_url);
            imagealphablending($treecpy, true);
            imagesavealpha($treecpy, true);
            imagecopy($imgcpy, $treecpy, 0, 0, 0, 0, 640, 480);
            imagepng($imgcpy, $file);
            if ($_POST['filter'] == 'grayscale') {
                imagefilter($imgcpy, IMG_FILTER_GRAYSCALE);
            }
            if ($_POST['filter'] == 'invert') {
                imagefilter($imgcpy, IMG_FILTER_NEGATE);
            }
            if ($_POST['filter'] == 'sepia') {
                imagefilter($imgcpy,IMG_FILTER_GRAYSCALE);
                imagefilter($imgcpy,IMG_FILTER_BRIGHTNESS, -30);
                imagefilter($imgcpy,IMG_FILTER_COLORIZE, 90, 55, 30);
            }
            imagepng($imgcpy, $file);
            $db = new photosManager();
            $db->addPhoto($_SESSION['user'], $file);
            header("Location: ?message=Your image was successfully saved !&message_type=success");
        }        
        ?>
        <h1 class="cam_titles">Photo upload</h1>
        <h1 class="cam_titles">Chose a tree !</h1>
        <div id="div_choose_trees">
        
            <img src="public/img/tree1.png" class="i_trees active" width="25%">
            <img src="public/img/tree2.png" class="i_trees" width="25%">
            <img src="public/img/tree3.png" class="i_trees" width="25%">
        </div>
        <div id="div_upload_files">
            <h1 class="cam_titles">Chose a photo !</h1>
            <p class="button_p">
                <label for="file" class="webcam-button">Choose file</label>
                <input id="file" class="input-file" type="file">
            </p>
        </div>
        <div id="modal_result">
            <div id="div_final_result">
                <h1 class="cam_titles">Happy with this picture ?</h1>
                <canvas id="canvas" width="300" height="300"></canvas>
                <form method="POST" action="" onsubmit="createImg();">
                        <input id="inp_img" name="img" type="hidden" value="">
                        <input id="tree" name="tree" type="hidden" value="">
                        <input id="filter" name="filter" type="hidden" value="none">
                        <input id="upload" class="webcam-button" type="Submit" value="Upload" id="label-file" disabled="true">
                </form>
            </div>
        </div>
        <canvas id="canvas_copy" width="300" height="300"></canvas>
        <canvas id="canvas_tree" width="300" height="300"></canvas>
        <script src="public/js/upload.js"></script>