    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <!-- Spinner End -->


        <!-- Navbar Start -->

        <div class="utility-nav d-none d-md-block" style="background-color: #1c65ad">
            <div class="container" >
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p class="small">
<!--                            <i class="bx bx-envelope"></i>-->
                            <p style="font-size: 1.1em;" class="text-white"><b>Applications: June 5, 2023 - June 16,2023</b></p>

                            <i class="bx bx-phone" style="margin-left: 70px;"></i>
                            <a href="javascript:void(0)"><b>Apply: sbi@maandeeqmh.org</b></a>
                    </div>
                </div>
            </div>
        </div>


        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-8 py-lg-0" style="height: 20vh;">
            <a href="javascript:void (0)" class="navbar-brand" style="margin-bottom: 10vh;">
                <img src="../img/Maandeeq.png" alt="Company Logo">
            </a>
<!--            <button type="button" style="position:absolute; left: 0; margin-top: 10vh; background-color: red" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">-->
<!--                <span class="navbar-toggler-icon"></span>-->
<!--            </button>-->
<!--            <div class="collapse navbar-collapse" id="navbarCollapse">-->
                <div class="navbar-nav mx-auto" style="position:absolute; left: 0; margin-top: 10vh;">
                    <a href="javascript:void (0)" class="nav-item nav-link ">Home</a>
                    <a href="" class="nav-item nav-link active">Registration/Admission</a>
                    <a href="enrollment.php"><button id="gettoknowus" class="btn">Enroll Here</button></a>

<!--                </div>-->
&nbsp;&nbsp;
<!--                    <a href="enrollment.php" class="btn btn-primary" style="height: 5vh; position: relative; margin-left: 25vh;">Enroll Now<i class="fa fa-arrow-right ms-3"></i></a>-->
                </div>
        </nav>
        <!-- Navbar End -->

        <style>
            /*New get to know us btn*/
            #gettoknowus {
                padding: 1.1em 2em;
                background: none;
                border: 2px solid #fff;
                font-size: 15px;
                color: #131313;
                cursor: pointer;
                position: relative;
                overflow: hidden;
                transition: all 0.3s;
                border-radius: 12px;
                background-color: #ecd448;
                font-weight: bolder;
                box-shadow: 0 2px 0 2px #000;
            }

            #gettoknowus:before {
                content: "";
                position: absolute;
                width: 100px;
                height: 120%;
                background-color: #ff6700;
                top: 50%;
                transform: skewX(30deg) translate(-150%, -50%);
                transition: all 0.5s;
            }

            #gettoknowus:hover {
                background-color: #4cc9f0;
                color: #fff;
                box-shadow: 0 2px 0 2px #0d3b66;
            }

            #gettoknowus:hover::before {
                transform: skewX(30deg) translate(150%, -50%);
                transition-delay: 0.1s;
            }

            #gettoknowus:active {
                transform: scale(0.9);
            }

        </style>