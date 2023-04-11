<?php
    if (isset($_GET['page'])) {
	    $page = $_GET['page'];
    } else {
	    $page = 'home';
    }
?>

<?php
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
    header("Pragma: no-cache"); // HTTP 1.0
    header("Expires: 0"); // Proxies
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/creux_favicon.png" type=“image/png”>
    <title>CREUX</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
         <?php
	        if ($page == 'home') {
	        	echo 'section#homepage {
	        		display: block;
	        	}';
	        	$menu_status = 'home';
            } else if ($page == 'mct') {
	        	echo 'section#mctpage{
	        		display: block;
	        	}';
	        	$menu_status = 'mct';
            } else if ($page == 'teams') {
	        	echo 'section#teamspage{
	        		display: block;
	        	}';
	        	$menu_status = 'teams';
            } else if ($page == 'partners') {
	        	echo 'section#partnerspage{
	        		display: block;
	        	}';
	        	$menu_status = 'partners';
            } else {
	        	echo 'section#homepage {
	        		display: block;
	        	}';
	        	$menu_status = 'home';
	        }
        ?>
    </style>
</head>
<body>
    <!--NAVIGATION-->
    <div id="nav"></div>

    <!-- POP NAV -->
    <div id="menu-ovl" class="close" style="display: none;">
        <div class="menu-cont">
            <div class="menu-cont-v2 <?php if ($menu_status == 'home') { echo 'active'; } ?>" onclick="location.href='?page=home'">
                <div class="menu-numb">01</div>
                <div class="menu-txt">HOME</div>
            </div>
            <div class="menu-cont-v2 <?php if ($menu_status == 'mct') { echo 'active'; } ?>" onclick="location.href='?page=mct'">
                <div class="menu-numb">02</div>
                <div class="menu-txt">MCT</div>
            </div>
            <div class="menu-cont-v2 <?php if ($menu_status == 'teams') { echo 'active'; } ?>" onclick="location.href='?page=teams'">
                <div class="menu-numb">03</div>
                <div class="menu-txt">TEAMS</div>
            </div>
            <div class="menu-cont-v2 <?php if ($menu_status == 'partners') { echo 'active'; } ?>" onclick="location.href='?page=partners'">
                <div class="menu-numb">04</div>
                <div class="menu-txt">PARTNERS</div>
            </div>
        </div>
    </div>

    <!-- ORIGINAL NAV -->
    <div class="nav-line"></div>
    <div class="nav-logo-sq">
        <div class="logo" style="background-image: url('assets/CREUX_logo_full color_SVG.svg'); background-size: cover;
        background-repeat: no-repeat;" onclick="location.href='?page=home'"></div>
    </div>
    <div id="on-off" class="menu-icon" style="background-image: url('assets/burger-menu.svg'); background-size: cover;
    background-repeat: no-repeat;" onclick="myFunction()"></div>
    <!--script open-close menu overlay-->
    <script>
        function myFunction() {
            var x = document.getElementById("menu-ovl");
            var y = document.getElementById("on-off");
            if (x.style.display === "none") {
              x.style.display = "block";
              x.style.animation="move 1s 1";
              y.style.backgroundImage="url(Assets/x-icon.svg)";
              y.style.animation="fadeIn 2s";
            } else {
              x.style.animation="move2 1s 1";
              setTimeout(function() {
                    x.style.display = "none";
                }, 1000);
              y.style.backgroundImage="url(Assets/burger-menu.svg)";
              y.style.animation="fadeIn2 2s";
            }
        }
    </script>
    
    <!-- PAGE: HOME -->
    <section id="homepage">

        <!-- carousel -->
        <div class="carousel">
            <div class="carousel-slide">
                <div class="img-cont">
                    <img id="desk" src="assets/BANNER LADIES COMMUNITY (1).jpg" alt="Image 1">
                    <img id="mobile"src="assets/BANNER LADIES COMMUNITY (1)-m.jpg" alt="Image 1">
                </div>

                <div class="img-cont">
                    <img id="desk" src="assets/BANNER LOCATION GAME HOUSE (1).jpg" alt="Image 2">
                    <img id="mobile"src="assets/BANNER LOCATION GAME HOUSE (1)-m.jpg" alt="Image 2">
                </div>
                
                <div class="img-cont">
                    <img id="desk" src="assets/banner coming soon mct (1).jpg" alt="Image 3">
                    <img id="mobile"src="assets/banner coming soon mct (1)-m.jpg" alt="Image 3">
                </div>
            </div>
            <div class="prevBtn" id="prev" style="background-image: url('Assets/left-icon.svg'); background-size: cover;
            background-repeat: no-repeat;object-fit: none;"></div>
            <div class="nextBtn" id="next" style="background-image: url('Assets/right-icon.svg'); background-size: cover;
            background-repeat: no-repeat;object-fit: none;"></div>
        </div>

        <script>
            const carouselSlide = document.querySelector('.carousel-slide');
            const carouselImages = document.querySelectorAll('.img-cont');

            // set the initial position of the slide
            let counter = 1;
            let size = carouselImages[0].clientWidth;
            if (window.innerWidth < 600) {
              size = window.innerWidth;
            }
            carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';

            // add event listeners to the navigation buttons
            const prevBtn = document.querySelector('#prev');
            const nextBtn = document.querySelector('#next');

            prevBtn.addEventListener('click', () => {
              if (counter <= 0) return;
              carouselSlide.style.transition = "transform 0.5s ease-in-out";
              counter--;
              carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
            });

            nextBtn.addEventListener('click', () => {
              if (counter >= carouselImages.length - 1) return;
              carouselSlide.style.transition = "transform 0.5s ease-in-out";
              counter++;
              carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
            });

            // reset the slide position when reaching the end
            carouselSlide.addEventListener('transitionend', () => {
              if (carouselImages[counter].id === 'lastClone') {
                carouselSlide.style.transition = "none";
                counter = carouselImages.length - 2;
                carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
              }
          
              if (carouselImages[counter].id === 'firstClone') {
                carouselSlide.style.transition = "none";
                counter = carouselImages.length - counter;
                carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
              }
            });

            // update size value on window resize
            window.addEventListener('resize', () => {
              if (window.innerWidth < 600) {
                size = window.innerWidth;
              } else {
                size = carouselImages[0].clientWidth;
              }
              carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
            });
        </script>

        <!-- background -->
        <div class="bg"> 
            <div class="bg-overlay-top"></div>
            <div class="bg-ornament" style="background-image: url('Assets/ornament_single color_cropped.svg'); background-size: cover;
            background-repeat: no-repeat;"></div>
            <div class="bg-ornament-mobile" style="background-image: url('Assets/ornament_single color_cropped.svg'); background-size: cover;
            background-repeat: no-repeat;"></div>
        </div>

        <!-- partners -->
        <div class="partners-title">PARTNERS</div>
        <div class="partners-line-left"></div>
        <div class="partners-car" id="scroll-h">
            <div class="pcar-indicator"></div> 
            <div class="pcar-inner">
                <div class="pcar-item" style="background-image: url('Assets/sekdeslogo.png'); background-size: cover;
                background-repeat: no-repeat;object-fit: none;"></div>
                <div class="pcar-item" style="background-image: url('Assets/garliclogo.png'); background-size: cover;
                background-repeat: no-repeat;object-fit: none;"></div>
                <div class="pcar-item" style="background-image: url('Assets/sekdesstudiologo.png'); background-size: cover;
                background-repeat: no-repeat;object-fit: none;"></div>
                <div class="pcar-item" style="background-image: url('Assets/soizeelogo.png'); background-size: cover;
                background-repeat: no-repeat;object-fit: none;"></div>
                <div class="pcar-item" style="background-image: url('Assets/ggwplogo.png'); background-size: cover;
                background-repeat: no-repeat;object-fit: none;"></div>
                <div class="pcar-item" style="background-image: url('Assets/ligagamelogo.png'); background-size: cover;
                background-repeat: no-repeat;object-fit: none;"></div>
                <div class="pcar-item" style="background-image: url('Assets/mettalogo.png'); background-size: cover;
                background-repeat: no-repeat;object-fit: none;"></div>
                <div class="pcar-item" style="background-image: url('Assets/ptpnlogo.png'); background-size: cover;
                background-repeat: no-repeat;object-fit: none;"></div>
                <div class="pcar-item" style="background-image: url('Assets/soloposlogo.png'); background-size: cover;
                background-repeat: no-repeat;object-fit: none;"></div>
                <div class="pcar-item" style="background-image: url('Assets/kenzologo.png'); background-size: cover;
                background-repeat: no-repeat;object-fit: none;"></div>
                <div class="pcar-item" style="background-image: url('Assets/unipinlogo.png'); background-size: cover;
                background-repeat: no-repeat;object-fit: none;"></div>
            </div>
        </div>
        <div class="partners-line-right"></div>
        <div class="partners-btn <?php if ($menu_status == 'partners') { echo 'active'; } ?>" onclick="location.href='?page=partners'">
            <div class="partners-btn-txt">SEE MORE</div>
        </div>

        <!-- about -->
        <div class="about-cont">
            <div class="about-img" style="background-image: url('Assets/ornamenthome.png'); background-size: cover;
            background-repeat: no-repeat;"></div>
            <div class="about-ttl">About</div>
            <div class="about-txt">Creux adalah tim yang bergerak di bidang esportainment, menyediakan wadah bagi komunitas setempat, turnament, tim esport profesional, hingga media influencer.
            Creux didesain agar dapat menjadi sarana komunitas pemain/atlit esport memiliki tempat untuk berkembang. #CREUXIFIED
            </div>
        </div>

        <!-- events -->
        <div class="events-title">Events</div>
        <div class="events-car" id="scroll-h">
            <div class="ecar-indicator"></div>
            <div class="ecar-inner">
                <div class="ecar-item <?php if ($menu_status == 'mct') { echo 'active'; } ?>" onclick="location.href='?page=mct'">
                    <div class="ecar-item-line"></div>
                    <div class="ecar-item-logo" style="background-image: url('Assets/mctlogo.png'); background-size: cover;
                    background-repeat: no-repeat;"></div>
                    <div class="ecar-item-title">
                        <h2>MCT Season 2</h2>
                    </div>
                    <div class="ecar-item-date">
                        <h3>Coming Soon</h3>
                    </div>
                    <div class="ecar-item-txt">
                        <h5>MCT (MLBB City Tournament) merupakan sebuah rangkaian tournament yang ditujukan sebagai wadah player di regional untuk belajar dan berkembang. Rangkaian acara ini bertujuan untuk memperkenalkan konsep e-sportstainment yang berkesinambungan dari regional menuju nasional. Saat ini MCT dimulai dari kota Solo.</h5>
                    </div>
                </div>
                <div class="ecar-item">
                    <div class="ecar-item-line"></div>
                    <div class="ecar-item-logo" style="background-image: url('Assets/fwblogo.png'); background-size: cover;
                    background-repeat: no-repeat;"></div>
                    <div class="ecar-item-title">
                        <h2>FWB (Fun With Bucin)</h2>
                    </div>
                    <div class="ecar-item-date">
                        <h3>Closed</h3>
                    </div>
                    <div class="ecar-item-txt">
                        <h5>FWB adalah turnamen tahunan yang diadakan pada saat hari Valentine. Ditujukan bagi pasangan-pasangan gamers atau jomblo gamers yang ingin mencari pasangan sesama gamers.</h5>
                    </div>
                </div>
                <div class="ecar-item">
                    <div class="ecar-item-line"></div>
                    <div class="ecar-item-logo" style="background-image: url('Assets/smalogo.png'); background-size: cover;
                    background-repeat: no-repeat;"></div>
                    <div class="ecar-item-title">
                        <h2>School Battles</h2>
                    </div>
                    <div class="ecar-item-date">
                        <h3>Coming Soon</h3>
                    </div>
                    <div class="ecar-item-txt">
                        <h5>Laga Esport antar SMA/SMK regional terbesar.</h5>
                    </div>
                </div>
                <div class="ecar-item">
                    <div class="ecar-item-line"></div>
                    <div class="ecar-item-logo" style="background-image: url('Assets/comingsoonlogo.png'); background-size: cover;
                    background-repeat: no-repeat;"></div>
                    <div class="ecar-item-title">
                        <h2>Office Battles</h2>
                    </div>
                    <div class="ecar-item-date">
                        <h3>Coming Soon</h3>
                    </div>
                    <div class="ecar-item-txt">
                        <h5>Laga Esport antar Kantor regional terbesar.</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- teams -->
        <div class="teams-title">Teams</div>
        <div class="teams-car" id="scroll-h">
            <div class="tcar-indicator"></div>
            <div class="tcar-inner">
                <div class="tcar-item" style="background-image: url('Assets/creux cowo.png'); background-size: cover;
                    background-repeat: no-repeat;">
                    <div class="tcar-item-logo" style="background-image: url('Assets/logo ml.png'); background-size: cover;
                    background-repeat: no-repeat;"></div>
                    <div class="tcar-item-title">
                        <h4>Mobile Legend Team</h4>
                    </div>
                </div>
                <div class="tcar-item" style="background-image: url('Assets/creux ladies.png'); background-size: cover;
                    background-repeat: no-repeat;">
                    <div class="tcar-item-logo" style="background-image: url('Assets/logo ml.png'); background-size: cover;
                    background-repeat: no-repeat;"></div>
                    <div class="tcar-item-title">
                        <h4>Creux Cattleya</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="teams-btn">
            <div class="teams-btn-txt <?php if ($menu_status == 'teams') { echo 'active'; } ?>" onclick="location.href='?page=teams'">SEE MORE</div>
        </div>

        <!-- management -->
        <div class="stt-ttl">Management Team</div>
        <div class="stt-img" style="background-image: url('Assets/managementfoto.png'); background-size: cover;
        background-repeat: no-repeat;"></div>
        <div class="bg-overlay-btm"></div>
    </section>
    <!-- <script>
      $(document).ready(function() {
        // Set the options for the carousel
        $('#main-car').carousel({
          interval: 5000, // Change every 5 seconds
          pause: 'hover', // Pause on mouse hover
          wrap: true // Wrap around at the end
        });

        // Enable the left and right controls to navigate the carousel
        $('.left-car-ctrl').click(function() {
          $('#main-car').carousel('prev');
        });
        $('.right-car-ctrl').click(function() {
          $('#main-car').carousel('next');
        });
      });
    </script> -->

    <!-- PAGE: MCT -->
    <section id="mctpage">
        <div class="mct-bg">
            <div class="mct-bg-ornament" style="background-image: url('assets/ornament_single color_cropped.svg'); background-size: cover;
            background-repeat: no-repeat;"></div>
        </div>
        <div class="mct-bg-overlay-btm"></div>
        <div class="mct-logo" style="background-image: url('assets/logo MCT full.png'); background-size: cover;
            background-repeat: no-repeat;"></div>
        <div class="coming-soon-txt">COMING SOON</div>
    </section>

    <!-- PAGE: TEAMS -->
    <section id="teamspage">
        <div class="teams-bg"  style="background-image: url('Assets/ornament_single color_cropped.svg'); background-size: cover;
        background-repeat: no-repeat;"></div>
        <div class="teams-bg-mobile"  style="background-image: url('Assets/ornament_single color_cropped.svg'); background-size: cover;
        background-repeat: no-repeat;"></div>
        <div class="teams-cont">
            <div class="game-teams-cont">
                <div class="g-teams-logo">
                    <img src="Assets/logo ml.png" alt="">
                </div>
                <div class="g-teams-ttl">Mobile Legends Team</div>
                <div class="g-teams-line"></div>
                <div class="g-teams-car-cont-ml">
                    <div class="g-teams-inner-cont">
                        <div class="g-teams-card">
                            <div class="g-teams-img">
                                <img src="Assets/baraa.png" height="100%">
                            </div>
                            <div class="g-teams-ovl"></div>
                            <div class="g-teams-name">Gerhana Bara Agni</div>
                            <div class="g-teams-nick">Baraa</div>
                            <div class="g-t-role-cont">
                                <div class="g-t-role-ttl">ROLE</div>
                                <div class="g-t-role-txt">Goldlaner</div>
                            </div>
                            <div class="g-t-flag-cont">
                                <div class="g-t-flag-ttl">NATIONALITY</div>
                                <div class="g-t-flag-img">
                                    <img src="Assets/indo-flag.png" alt="">
                                </div>
                            </div>
                            <div class="g-teams-accent"></div>
                        </div>
                        <div class="g-teams-card">
                            <div class="g-teams-img">
                                <img src="Assets/marzooo.png" height="100%">
                            </div>
                            <div class="g-teams-ovl"></div>
                            <div class="g-teams-name">Barka Via M.</div>
                            <div class="g-teams-nick">MARZOOO</div>
                            <div class="g-t-role-cont">
                                <div class="g-t-role-ttl">ROLE</div>
                                <div class="g-t-role-txt">Exp</div>
                            </div>
                            <div class="g-t-flag-cont">
                                <div class="g-t-flag-ttl">NATIONALITY</div>
                                <div class="g-t-flag-img">
                                    <img src="Assets/indo-flag.png" alt="">
                                </div>
                            </div>
                            <div class="g-teams-accent"></div>
                        </div>
                        <div class="g-teams-card">
                            <div class="g-teams-img">
                                <img src="Assets/mypan.png" height="100%">
                            </div>
                            <div class="g-teams-ovl"></div>
                            <div class="g-teams-name">Muhammad Irfan F.</div>
                            <div class="g-teams-nick">Dewa Mypan</div>
                            <div class="g-t-role-cont">
                                <div class="g-t-role-ttl">ROLE</div>
                                <div class="g-t-role-txt">Roamer</div>
                            </div>
                            <div class="g-t-flag-cont">
                                <div class="g-t-flag-ttl">NATIONALITY</div>
                                <div class="g-t-flag-img">
                                    <img src="Assets/indo-flag.png" alt="">
                                </div>
                            </div>
                            <div class="g-teams-accent"></div>
                        </div>
                        <div class="g-teams-card">
                            <div class="g-teams-img">
                                <img src="Assets/shireo z.png" height="100%">
                            </div>
                            <div class="g-teams-ovl"></div>
                            <div class="g-teams-name">Wisnu Adi N. P.</div>
                            <div class="g-teams-nick">Shireo Z</div>
                            <div class="g-t-role-cont">
                                <div class="g-t-role-ttl">ROLE</div>
                                <div class="g-t-role-txt">Midlaner </div>
                            </div>
                            <div class="g-t-flag-cont">
                                <div class="g-t-flag-ttl">NATIONALITY</div>
                                <div class="g-t-flag-img">
                                    <img src="Assets/indo-flag.png" alt="">
                                </div>
                            </div>
                            <div class="g-teams-accent"></div>
                        </div>
                        <div class="g-teams-card">
                            <div class="g-teams-img">
                                <img src="Assets/super xvenn.png" height="100%">
                            </div>
                            <div class="g-teams-ovl"></div>
                            <div class="g-teams-name">Dimas Satria M.</div>
                            <div class="g-teams-nick">Super Xvenn</div>
                            <div class="g-t-role-cont">
                                <div class="g-t-role-ttl">ROLE</div>
                                <div class="g-t-role-txt">Jungler</div>
                            </div>
                            <div class="g-t-flag-cont">
                                <div class="g-t-flag-ttl">NATIONALITY</div>
                                <div class="g-t-flag-img">
                                    <img src="Assets/indo-flag.png" alt="">
                                </div>
                            </div>
                            <div class="g-teams-accent"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="game-teams-cont">
                <div class="g-teams-logo">
                    <img src="Assets/logo ml.png" alt="">
                </div>
                <div class="g-teams-ttl">Creux Cattleya</div>
                <div class="g-teams-line"></div>
                <div class="g-teams-car-cont-ml-2">
                    <div class="g-teams-inner-cont">
                        <div class="g-teams-card">
                            <div class="g-teams-img">
                                <img src="Assets/evi.png" height="100%">
                            </div>
                            <div class="g-teams-ovl"></div>
                            <div class="g-teams-name">-</div>
                            <div class="g-teams-nick">EVI</div>
                            <div class="g-t-role-cont">
                                <div class="g-t-role-ttl">ROLE</div>
                                <div class="g-t-role-txt">-</div>
                            </div>
                            <div class="g-t-flag-cont">
                                <div class="g-t-flag-ttl">NATIONALITY</div>
                                <div class="g-t-flag-img">
                                    <img src="Assets/indo-flag.png" alt="">
                                </div>
                            </div>
                            <div class="g-teams-accent"></div>
                        </div>
                        <div class="g-teams-card">
                            <div class="g-teams-img">
                                <img src="Assets/ken.png" height="100%">
                            </div>
                            <div class="g-teams-ovl"></div>
                            <div class="g-teams-name">-</div>
                            <div class="g-teams-nick">KEN</div>
                            <div class="g-t-role-cont">
                                <div class="g-t-role-ttl">ROLE</div>
                                <div class="g-t-role-txt">-</div>
                            </div>
                            <div class="g-t-flag-cont">
                                <div class="g-t-flag-ttl">NATIONALITY</div>
                                <div class="g-t-flag-img">
                                    <img src="Assets/indo-flag.png" alt="">
                                </div>
                            </div>
                            <div class="g-teams-accent"></div>
                        </div>
                        <div class="g-teams-card">
                            <div class="g-teams-img">
                                <img src="Assets/meostic.png" height="100%">
                            </div>
                            <div class="g-teams-ovl"></div>
                            <div class="g-teams-name">-</div>
                            <div class="g-teams-nick">MEOSTIC</div>
                            <div class="g-t-role-cont">
                                <div class="g-t-role-ttl">ROLE</div>
                                <div class="g-t-role-txt">-</div>
                            </div>
                            <div class="g-t-flag-cont">
                                <div class="g-t-flag-ttl">NATIONALITY</div>
                                <div class="g-t-flag-img">
                                    <img src="Assets/indo-flag.png" alt="">
                                </div>
                            </div>
                            <div class="g-teams-accent"></div>
                        </div>
                        <div class="g-teams-card">
                            <div class="g-teams-img">
                                <img src="Assets/orang lain.png" height="100%">
                            </div>
                            <div class="g-teams-ovl"></div>
                            <div class="g-teams-name">-</div>
                            <div class="g-teams-nick">-</div>
                            <div class="g-t-role-cont">
                                <div class="g-t-role-ttl">ROLE</div>
                                <div class="g-t-role-txt">-</div>
                            </div>
                            <div class="g-t-flag-cont">
                                <div class="g-t-flag-ttl">NATIONALITY</div>
                                <div class="g-t-flag-img">
                                    <img src="Assets/indo-flag.png" alt="">
                                </div>
                            </div>
                            <div class="g-teams-accent"></div>
                        </div>
                        <div class="g-teams-card">
                            <div class="g-teams-img">
                                <img src="Assets/orang lain.png" height="100%">
                            </div>
                            <div class="g-teams-ovl"></div>
                            <div class="g-teams-name">-</div>
                            <div class="g-teams-nick">-</div>
                            <div class="g-t-role-cont">
                                <div class="g-t-role-ttl">ROLE</div>
                                <div class="g-t-role-txt">-</div>
                            </div>
                            <div class="g-t-flag-cont">
                                <div class="g-t-flag-ttl">NATIONALITY</div>
                                <div class="g-t-flag-img">
                                    <img src="Assets/indo-flag.png" alt="">
                                </div>
                            </div>
                            <div class="g-teams-accent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="teams-bg-overlay-btm"></div>
    </section>

    <!-- PAGE: PARTNERS -->
    <section id="partnerspage">
        <div class="pbg"></div>
        <div class="pbg-overlay-btm"></div>
        <div class="plogo-cont">
            <div class="plogo" style="background-image: url('Assets/sekdeslogo_sq.png'); background-size: cover;
            background-repeat: no-repeat;"></div>
            <div class="plogo" style="background-image: url('Assets/garliclogo_sq.png'); background-size: cover;
            background-repeat: no-repeat;"></div>
            <div class="plogo" style="background-image: url('Assets/sekdesstudiologo_sq.png'); background-size: cover;
            background-repeat: no-repeat;"></div>
            <div class="plogo" style="background-image: url('Assets/soizeelogo_sq.png'); background-size: cover;
            background-repeat: no-repeat;"></div>
            <div class="plogo" style="background-image: url('Assets/ggwplogo_sq.png'); background-size: cover;
            background-repeat: no-repeat;"></div>
            <div class="plogo" style="background-image: url('Assets/ligagamelogo_sq.png'); background-size: cover;
            background-repeat: no-repeat;"></div>
            <div class="plogo" style="background-image: url('Assets/mettalogo_sq.png'); background-size: cover;
            background-repeat: no-repeat;"></div>
            <div class="plogo" style="background-image: url('Assets/ptpnlogo_sq.png'); background-size: cover;
            background-repeat: no-repeat;"></div>
            <div class="plogo" style="background-image: url('Assets/soloposlogo_sq.png'); background-size: cover;
            background-repeat: no-repeat;"></div>
            <div class="plogo" style="background-image: url('Assets/kenzologo_sq.png'); background-size: cover;
            background-repeat: no-repeat;"></div>
            <div class="plogo" style="background-image: url('Assets/unipinlogo_sq.png'); background-size: cover;
            background-repeat: no-repeat;"></div>
        </div>
        <div class="ptitle">Our Partners</div>
        <div class="ptxt">Lorem ipsum dolor sit amet, consectetur adipiscing
        elit. Donec nuncligula, finibus eu est id, ornare solli
        citudin urna. Sed pulvinar mattis ornare. Pellentesque
        vel nunc erat. Donec quis cursus est. Vestibulumante
        ipsum primis in faucibus orci luctus et ultrices posuere
        cubilia curae.</div>
    </section>

    <!-- FOOTER -->
    <div class="footer">
        <div class="ftr-logo" style="background-image: url('Assets/CREUX_logo_all white_png.png'); background-size: cover;
        background-repeat: no-repeat;"></div>
        <div class="ftr-copyright">©creuxteam</div>
        <div class="socmed-cont">
            <div class="socmed-icon" style="background-image: url('Assets/yutub.svg'); background-size: cover;
            background-repeat: no-repeat;" onclick="window.location.href='https://youtube.com/@creuxteam';"></div>
            <div class="socmed-icon" style="background-image: url('Assets/dc.svg'); background-size: cover;
            background-repeat: no-repeat;" onclick="window.location.href='https://google.com';"></div>
            <div class="socmed-icon" style="background-image: url('Assets/ig.svg'); background-size: cover;
            background-repeat: no-repeat;" onclick="window.location.href='https://www.instagram.com/creuxteam/';"></div>
        </div>

        <div class="socmed-cont-mobile">
            <div class="socmed-icon" style="background-image: url('Assets/yutub.svg'); background-size: cover;
            background-repeat: no-repeat;" onclick="window.location.href='https://youtube.com/@creuxteam';"></div>
            <div class="socmed-icon" style="background-image: url('Assets/dc.svg'); background-size: cover;
            background-repeat: no-repeat;" onclick="window.location.href='https://google.com';"></div>
            <div class="socmed-icon" style="background-image: url('Assets/ig.svg'); background-size: cover;
            background-repeat: no-repeat;" onclick="window.location.href='https://www.instagram.com/creuxteam/';"></div>
        </div>
        <div class="ftr-email-txt">contact@creux.co</div>
        <div class="ftr-email-txt-mobile">contact@creux.co</div>

        <div class="contact-cont">
            <div class="map-cont">
                <div class="cmap">
                    <div class="mapouter">
                          <div class="gmap_canvas">
                            <iframe width="600" height="500" id="gmap_canvas"
                              src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"
                              frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                            </iframe>
                          </div>
                          <br>
                          <style>.mapouter{position:relative;text-align:right;height:100%;width:100%;}</style>
                          <style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style>
                    </div>
                </div>
            </div>

            <div class="c-add">Address</div>
            <div class="c-add-txt">JL. YOSODIPURO NO.108, MANGKUBUMEN, KEC. BANJARSARI,
            KOTA SURAKARTA, JAWA TENGAH 57139</div>
            <div class="c-partner">Partnership</div>
            <div class="c-p-phone">Phone Number</div>
            <div class="c-p-phone-txt">089621979922</div>
            <div class="c-p-email">Email</div>
            <div class="c-p-email-txt">contact@creux.co</div>
        </div>
    </div>

    <!-- horizontal scroll -->
    <script>
        const scrollContainer1 = document.querySelector(".partners-car");
        const scrollContainer2 = document.querySelector(".events-car");
        const scrollContainer3 = document.querySelector(".teams-car");
        const scrollContainer4 = document.querySelector(".g-teams-car-cont-ml");
        const scrollContainer5 = document.querySelector(".g-teams-car-cont-ml-2");
        const scrollContainer6 = document.querySelector(".g-teams-car-cont-ml-3");
        [scrollContainer1, scrollContainer2,
        scrollContainer3, scrollContainer4,
        scrollContainer5, scrollContainer6,].forEach((scrollContainer)=>{
            scrollContainer.addEventListener("wheel", (evt) => {
                evt.preventDefault();
                scrollContainer.scrollLeft += evt.deltaY;
            });
        });
    </script>
</body>