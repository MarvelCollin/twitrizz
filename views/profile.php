<!-- <?php
@session_start();

$title = "Profile";
$navbar = "false";
require_once '../controller/auth/checkauth.php';
require_once '../links.php';
require_once '../conn.php';
require_once 'navbar.php';


// get session username
$username = $_SESSION['username'];
// lansung filter 
$profile = mysqli_query($conn, "select * from users where username like '%" . $username . "%'");
$echoprofile = mysqli_fetch_assoc($profile);

?>

<body>
    <button class="btn btn-danger font-weight-bold mt-3 ml-3"><a href="explore.php"
            class="text-white">CANCEL</a></button>

    <div style=" min-height: 90vh;" class="d-flex justify-content-center align-items-center text-center ">

        <div style="width:500px;">
            <img src="../images/<?= $echoprofile['image'];  ?>" class="rounded-circle mb-3 border border-primary"
                style="width:30vh; height:auto;" alt="">
            <div class="textareas">
                <div class="text-center">
                    <textarea name="username" placeholder="<?php echo $echoprofile['username'];?>"
                        class="mt-3 form-control textareas align-center border border-primary" id="textAreaExample1"
                        rows="1 " ></textarea>
                </div>
            </div>
            <div class="textareas">
                <div class="text-center">
                    <textarea name="email" placeholder="<?php echo $echoprofile['email'] ?>"
                        class="mt-3 form-control textareas align-center border border-primary" id="textAreaExample1"
                        rows="1" readonly></textarea>
                </div>
            </div>
            <div class="textareas">
                <div class="text-center">
                    <textarea name="bio"
                        placeholder="“<?= $echoprofile['bio']; ?>”"
                        class="mt-3 form-control textareas align-center border border-primary" id="textAreaExample1"
                        rows="3" readonly></textarea>
                </div>
            </div>
            <div class="mt-3 text-left">
                <a href="editprofile.php" class="btn btn-warning mr-3 font-weight-bold text-white" style="width:100px"
                    name="post"> EDIT</a>

            </div>
        </div>
        </form>
    </div>
</body> -->