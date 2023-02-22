<?php
    @session_start();
    
    //title utk ganti title, navbar utk show atau tidak navbar
    $title = "Edit Profile";
    $navbar = "false";

    require_once '../conn.php';
    require_once 'navbar.php';
    require_once '../controller/auth/checkauth.php';
    // require_once 'navbar.php';

    // get session
    $username = $_SESSION['username'];
    // select from session using search
    $profile = mysqli_query($conn, "select * from users where username like '%" . $username . "%'");
    $echoprofile = mysqli_fetch_assoc($profile);
?>
<html>

<head>
    <?php 
            require_once '../links.php';
            ?>
    <title>Edit Profile</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/733/733579.png" />
</head>

<body>
    <button class="btn btn-danger text-weight-bold mt-3 ml-3"><a href="explore.php" class="text-white">CANCEL</a></button>

    <div style=" min-height: 90vh;" class="d-flex justify-content-center align-items-center text-center ">

        <form action="../controller/profile/update_profile.php" method="post" enctype="multipart/form-data" style="width:500px;">
            <img id="output" src="../profile_image/<?= $echoprofile['image'] ?>" class="crop rounded-circle mb-3 img-fluid rounded border border-primary" style="width: 300px; height: 300px; border-radius: 50%;" alt="">

            <div class="">
            </div>
            <div class="">
                <label for="customFile" class="text-center btn btn-primary">
                    <!-- UPLOAD YOUR FILE HERE -->
                    <input accept="image/*" type="file" class="form-control-file file-field" name="uploadfile"
                        id="upload"
                        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"
                        multiple>
                </label>
            </div>

            <div class="textareas">
                <div class="text-center">
                    <textarea name="username" placeholder="<?= $echoprofile['username'] ?>"
                        class="mt-3 form-control textareas align-center border border-primary" id="textAreaExample1"
                        rows="1 " readonly></textarea>
                </div>
            </div>
            <div class="textareas">
                <div class="text-center">
                    <textarea name="email" placeholder=" <?= $echoprofile['email'] ?> "
                        class="mt-3 form-control textareas align-center border border-primary" id="textAreaExample1"
                        rows="1" readonly></textarea>
                </div>
            </div>
            <div class="textareas">
                <div class="text-center">
                    <textarea name="bio" placeholder="<?= $echoprofile['bio'] ?>"
                        class="mt-3 form-control textareas align-center border border-primary" id="textAreaExample1"
                        rows="3" ></textarea>
                </div>
            </div>
            <div class="mt-3">
                <input type="submit" value="UPDATE" class="btn btn-success mr-3" name="post">

            </div>
    </div>
    </form>
    </div>
    <script>
        //show image (before update)
        $(function () {
            $('#upload').change(function () {
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" ||
                        ext == "jpg")) {

                    reader.onload = function (e) {
                        $('#img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    // $('#img').attr('src', '../images/avatarnull.jpg');
                }
            });

        });
    </script>
</body>

</html>