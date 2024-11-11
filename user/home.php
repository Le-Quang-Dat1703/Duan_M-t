<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>


    <header class="header">

        <section class="flex">

            <a href="index.php" class="logo">User</a>

            <form action="search_page.php" method="post" class="search-form">
                <input type="text" name="search" placeholder="search here..." required maxlength="100">
                <button type="submit" class="fas fa-search" name="search_btn"></button>
            </form>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="search-btn" class="fas fa-search"></div>
                <div id="user-btn" class="fas fa-user"></div>
                <div id="toggle-btn" class="fas fa-sun"></div>
            </div>

            <div class="profile">
                <img src="../uploaded_files" alt="">
                <h3><?= $fetch_profile['name']; ?></h3>
                <span><?= $fetch_profile['profession']; ?></span>
                <a href="profile.php" class="btn">view profile</a>
                <div class="flex-btn">
                    <a href="login.php" class="option-btn">login</a>
                    <a href="register.php" class="option-btn">register</a>
                </div>
                <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');"
                    class="delete-btn">logout</a>

                <h3>please login or register</h3>
                <div class="flex-btn">
                    <a href="login.php" class="option-btn">login</a>
                    <a href="register.php" class="option-btn">register</a>
                </div>
            </div>

        </section>

    </header>

    <!-- header section ends -->

    <!-- side bar section starts  -->

    <div class="side-bar">

        <div id="close-bar">
            <i class="fas fa-times"></i>
        </div>

        <div class="profile">

            <h3>please login or register</h3>
            <div class="flex-btn">
                <a href="login.php" class="option-btn">login</a>
                <a href="register.php" class="option-btn">register</a>
            </div>
        </div>

        <nav class="navbar">
            <a href="index.php"><i class="fas fa-home"></i><span>home</span></a>
            <a href="playlists.php"><i class="fa-solid fa-bars-staggered"></i><span>playlists</span></a>
            <a href="contents.php"><i class="fas fa-graduation-cap"></i><span>contents</span></a>
            <a href="comments.php"><i class="fas fa-comment"></i><span>comments</span></a>
            <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');"><i
                    class="fas fa-right-from-bracket"></i><span>logout</span></a>
        </nav>

    </div>

    <section class="dashboard">

        <h1 class="heading">Basic Course</h1>

        <div class="box-container">

            <div class="box">
                <div class="free">
                    <img src="images/1.png" alt="">
                </div>
                <h3>Html/Css</h3>
                <img class="image" src="images/post-1-2.png" alt="">
                <div class="content">
                    <span>HTML is the standard markup language for creating Web pages HTML is the standard markup
                        language for creating Web pagesHTML is the standard markup language for creating Web pagesHTML
                        is the standard markup language for creating Web pagesHTML is the standard markup language for
                        creating Web pagesHTML is the standard markup language for creating Web pagesHTML is the
                        standard markup language for creating Web pagesHTML is the standard markup language for creating
                        Web pagesHTML is the standard markup language for creating Web pages.</span>
                </div>
                <div class="f">
                    <a href="profile.php" class="btn">view</a>
                </div>
            </div>


            <div class="box">
                <div class="free">
                    <img src="images/1.png" alt="">
                </div>
                <h3>Html/Css</h3>
                <img class="image" src="images/post-1-2.png" alt="">
                <div class="content">
                    <span>HTML is the standard markup language for creating Web pages HTML is the standard markup
                        language for creating Web pagesHTML is the standard markup language for creating Web pagesHTML
                        is the standard markup language for creating Web pagesHTML is the standard markup language for
                        creating Web pagesHTML is the standard markup language for creating Web pagesHTML is the
                        standard markup language for creating Web pagesHTML is the standard markup language for creating
                        Web pagesHTML is the standard markup language for creating Web pages.</span>
                </div>
                <div class="f">
                    <a href="profile.php" class="btn">view</a>
                </div>
            </div>

            <div class="box">
                <div class="free">
                    <img src="images/1.png" alt="">
                </div>
                <h3>Html/Css</h3>
                <img class="image" src="images/post-1-2.png" alt="">
                <div class="content">
                    <span>HTML is the standard markup language for creating Web pages HTML is the standard markup
                        language for creating Web pagesHTML is the standard markup language for creating Web pagesHTML
                        is the standard markup language for creating Web pagesHTML is the standard markup language for
                        creating Web pagesHTML is the standard markup language for creating Web pagesHTML is the
                        standard markup language for creating Web pagesHTML is the standard markup language for creating
                        Web pagesHTML is the standard markup language for creating Web pages.</span>
                </div>
                <div class="f">
                    <a href="profile.php" class="btn">view</a>
                </div>
            </div>
            <div class="box">
                <div class="free">
                    <img src="images/1.png" alt="">
                </div>
                <h3>Html/Css</h3>
                <img class="image" src="images/post-1-2.png" alt="">
                <div class="content">
                    <span>HTML is the standard markup language for creating Web pages HTML is the standard markup
                        language for creating Web pagesHTML is the standard markup language for creating Web pagesHTML
                        is the standard markup language for creating Web pagesHTML is the standard markup language for
                        creating Web pagesHTML is the standard markup language for creating Web pagesHTML is the
                        standard markup language for creating Web pagesHTML is the standard markup language for creating
                        Web pagesHTML is the standard markup language for creating Web pages.</span>
                </div>
                <div class="f">
                    <a href="profile.php" class="btn">view</a>
                </div>
            </div>
            <div class="box">
                <div class="free">
                    <img src="images/1.png" alt="">
                </div>
                <h3>Html/Css</h3>
                <img class="image" src="images/post-1-2.png" alt="">
                <div class="content">
                    <span>HTML is the standard markup language for creating Web pages HTML is the standard markup
                        language for creating Web pagesHTML is the standard markup language for creating Web pagesHTML
                        is the standard markup language for creating Web pagesHTML is the standard markup language for
                        creating Web pagesHTML is the standard markup language for creating Web pagesHTML is the
                        standard markup language for creating Web pagesHTML is the standard markup language for creating
                        Web pagesHTML is the standard markup language for creating Web pages.</span>
                </div>
                <div class="f">
                    <a href="profile.php" class="btn">view</a>
                </div>
            </div>
            <div class="box">
                <div class="free">
                    <img src="images/1.png" alt="">
                </div>
                <h3>Html/Css</h3>
                <img class="image" src="images/post-1-2.png" alt="">
                <div class="content">
                    <span>HTML is the standard markup language for creating Web pages HTML is the standard markup
                        language for creating Web pagesHTML is the standard markup language for creating Web pagesHTML
                        is the standard markup language for creating Web pagesHTML is the standard markup language for
                        creating Web pagesHTML is the standard markup language for creating Web pagesHTML is the
                        standard markup language for creating Web pagesHTML is the standard markup language for creating
                        Web pagesHTML is the standard markup language for creating Web pages.</span>
                </div>
                <div class="f">
                    <a href="profile.php" class="btn">view</a>
                </div>
            </div>



        </div>

    </section>
    <section class="dashboard">

        <h1 class="heading">Premium</h1>

        <div class="box-container">

            <div class="box">
                <div class="free">
                    <img src="images/2.png" alt="">
                </div>
                <h3>Html/Css</h3>
                <img class="image" src="images/post-1-2.png" alt="">
                <div class="content">
                    <span>HTML is the standard markup language for creating Web pages HTML is the standard markup
                        language for creating Web pagesHTML is the standard markup language for creating Web pagesHTML
                        is the standard markup language for creating Web pagesHTML is the standard markup language for
                        creating Web pagesHTML is the standard markup language for creating Web pagesHTML is the
                        standard markup language for creating Web pagesHTML is the standard markup language for creating
                        Web pagesHTML is the standard markup language for creating Web pages.</span>
                </div>
                <div class="f">
                    <a href="profile.php" class="btn">view</a>
                </div>
            </div>


            <div class="box">
                <div class="free">
                    <img src="images/2.png" alt="">
                </div>
                <h3>Html/Css</h3>
                <img class="image" src="images/post-1-2.png" alt="">
                <div class="content">
                    <span>HTML is the standard markup language for creating Web pages HTML is the standard markup
                        language for creating Web pagesHTML is the standard markup language for creating Web pagesHTML
                        is the standard markup language for creating Web pagesHTML is the standard markup language for
                        creating Web pagesHTML is the standard markup language for creating Web pagesHTML is the
                        standard markup language for creating Web pagesHTML is the standard markup language for creating
                        Web pagesHTML is the standard markup language for creating Web pages.</span>
                </div>
                <div class="f">
                    <a href="profile.php" class="btn">view</a>
                </div>
            </div>

            <div class="box">
                <div class="free">
                    <img src="images/2.png" alt="">
                </div>
                <h3>Html/Css</h3>
                <img class="image" src="images/post-1-2.png" alt="">
                <div class="content">
                    <span>HTML is the standard markup language for creating Web pages HTML is the standard markup
                        language for creating Web pagesHTML is the standard markup language for creating Web pagesHTML
                        is the standard markup language for creating Web pagesHTML is the standard markup language for
                        creating Web pagesHTML is the standard markup language for creating Web pagesHTML is the
                        standard markup language for creating Web pagesHTML is the standard markup language for creating
                        Web pagesHTML is the standard markup language for creating Web pages.</span>
                </div>
                <div class="f">
                    <a href="profile.php" class="btn">view</a>
                </div>
            </div>
            <div class="box">
                <div class="free">
                    <img src="images/2.png" alt="">
                </div>
                <h3>Html/Css</h3>
                <img class="image" src="images/post-1-2.png" alt="">
                <div class="content">
                    <span>HTML is the standard markup language for creating Web pages HTML is the standard markup
                        language for creating Web pagesHTML is the standard markup language for creating Web pagesHTML
                        is the standard markup language for creating Web pagesHTML is the standard markup language for
                        creating Web pagesHTML is the standard markup language for creating Web pagesHTML is the
                        standard markup language for creating Web pagesHTML is the standard markup language for creating
                        Web pagesHTML is the standard markup language for creating Web pages.</span>
                </div>
                <div class="f">
                    <a href="profile.php" class="btn">view</a>
                </div>
            </div>
            <div class="box">
                <div class="free">
                    <img src="images/2.png" alt="">
                </div>
                <h3>Html/Css</h3>
                <img class="image" src="images/post-1-2.png" alt="">
                <div class="content">
                    <span>HTML is the standard markup language for creating Web pages HTML is the standard markup
                        language for creating Web pagesHTML is the standard markup language for creating Web pagesHTML
                        is the standard markup language for creating Web pagesHTML is the standard markup language for
                        creating Web pagesHTML is the standard markup language for creating Web pagesHTML is the
                        standard markup language for creating Web pagesHTML is the standard markup language for creating
                        Web pagesHTML is the standard markup language for creating Web pages.</span>
                </div>
                <div class="f">
                    <a href="profile.php" class="btn">view</a>
                </div>
            </div>
            <div class="box">
                <div class="free">
                    <img src="images/2.png" alt="">
                </div>
                <h3>Html/Css</h3>
                <img class="image" src="images/post-1-2.png" alt="">
                <div class="content">
                    <span>HTML is the standard markup language for creating Web pages HTML is the standard markup
                        language for creating Web pagesHTML is the standard markup language for creating Web pagesHTML
                        is the standard markup language for creating Web pagesHTML is the standard markup language for
                        creating Web pagesHTML is the standard markup language for creating Web pagesHTML is the
                        standard markup language for creating Web pagesHTML is the standard markup language for creating
                        Web pagesHTML is the standard markup language for creating Web pages.</span>
                </div>
                <div class="f">
                    <a href="profile.php" class="btn">view</a>
                </div>
            </div>

            <div class="box">
                <h3>quick select</h3>
                <p>login or register</p>
                <div class="flex-btn">
                    <a href="login.php" class="option-btn">login</a>
                    <a href="register.php" class="option-btn">register</a>
                </div>
            </div>
        </div>

    </section>

    <section class="footer">
        &copy; copyright @ <?= date('Y'); ?> by <span>Anh Đạt cuto</span> | all right resered!
    </section>


    <script src="js/admin_script.js"></script>

</body>

</html>