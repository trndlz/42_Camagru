        <?php

        require('model/photosmanager.php');

        $db = new photosManager();

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
                imagefilter($imgcpy,IMG_FILTER_BRIGHTNESS,-30);
                imagefilter($imgcpy,IMG_FILTER_COLORIZE, 90, 55, 30);
            }
            imagepng($imgcpy, $file);
            $db->addPhoto($_SESSION['user'], $file);
            header("Location: ?action=add&message=Your image was successfully saved !&message_type=success");
        }
        
        if (isset($_POST['id_photo_delete']) && $_POST['id_photo_delete'] != '') {
            $db->deletePhoto($_POST['id_photo_delete']);
            header("Location: ?action=add&message=Your photo has been deleted successfully !&message_type=success");
        }
        ?>
    
        <div id="div_use_webcam">
            <h1 class="cam_titles">Create your image !</h1>
            <p class="button_p">
                <input id="no_effect" type="button" value="No effect" class="webcam-button">
                <input id="gray" type="button" value="Gray scale" class="webcam-button">
                <input id="invert" type="button" value="Invert" class="webcam-button">
                <input id="sepia" type="button" value="Sepia" class="webcam-button">
                <input id="snap" type="button" disabled="true" value="Snapshot" class="webcam-button">
            </p>
            <div id="live_div">
                <div ><img src="public/img/tree1.png" id="overlay"></div>
                <video id="videoElement"></video>
            </div>
            <div id="div_choose_trees">
                <img src="public/img/tree1.png" class="i_trees active" width="25%">
                <img src="public/img/tree2.png" class="i_trees" width="25%">
                <img src="public/img/tree3.png" class="i_trees" width="25%">
            </div>
        </div>
        <div id="mini_box">
            <h1 class="cam_titles">History</h1>
            <div id="mini">
            <?php
                $mini = $db->getPhotosUser($_SESSION['user']);
                foreach ($mini as $i) {
                    echo "<img src='".$i['link']."' class='mini_img' id='".$i['id_photo']."' onclick='deletePic(this.id);'>";
                }
                ?>
            </div>
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
        <p class="text">No webcam? You can upload your own photo <a href="?action=upload" class="textlink">here</a></p>
        <canvas id="canvas_copy" width="300" height="300"></canvas>
        <canvas id="canvas_tree" width="300" height="300"></canvas>
        <form method="POST" action="" id="photo_delete">
            <input id="id_photo_delete" name="id_photo_delete" type="hidden" value="">
        </form>
        <script src="public/js/webcam.js"></script>