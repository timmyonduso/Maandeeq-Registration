<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('includes/config.php');

function validate_phone_number($phone)
{
    // Allow +, - and . in phone number
    $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    // Remove "-" from number
    $phone_to_check = str_replace("-", "", $filtered_phone_number);
    // Check the length of number
    // This can be customized if you want phone number from a specific country
    if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        return false;
    } else {
        return true;
    }
}

 if(isset($_POST['submit'])){
     $firstName      = $_POST['firstName'];
     $surname        = $_POST['surname'];
     $lastName       = $_POST['lastName'];
     $nationality    = $_POST['nationality'];
     $gender         = $_POST['gender'];
     $age            = $_POST['age'];
     $fms            = $_POST['fms'];
     $district       = $_POST['district'];
     $mobile         = $_POST['mobile'];
     $email          = $_POST['email'];
//     $cv             =$_POST['cv'];
     $cv             =$_FILES["cv"]["name"];
     $cover          =$_POST['cover'];

//          $fileName = $_POST['name'];
     $name = $_FILES["cv"]["tmp_name"];
     $targetDir = "uploads/";
//     $targetFile = $targetDir.basename($_FILES['cv']['name']);

     $fileTe = pathinfo($cv, PATHINFO_EXTENSION);
     $fileType = strtolower($fileTe);


//     $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
     $extensions_arr= array("pdf","doc","docx");
     if( in_array($fileType,$extensions_arr) ){
         $file_name = uniqid("PDF-".$cv, true).'.'.$fileType;

         // Insert record
//         $query = " INSERT into `tblenrollment` (`cv`) values('$name')";
//         mysqli_query($con,$query);
         // Upload file

//         $cv=md5($cv).time().$cv;
//         move_uploaded_file($tname, $uploads_dir.'/'.$pname);
         $file_upload_path = 'uploads/'.$file_name;


         move_uploaded_file($name,$file_upload_path);

     } else echo "";





     if (validate_phone_number($mobile)) {
         echo "";

     } else {
         echo "<script>alert('Invalid mobile number. Please write in the (+252 0123 456) format .');</script>";
         echo "<script type='text/javascript'> document.location = 'enrollment.php'; </script>";
         exit;

     }


     $query=mysqli_query($con,"INSERT INTO tblenrollment(firstName,surname,lastName,nationality,gender,age,fms,district,mobile,email,cv,cover) values('$firstName','$surname','$lastName','$nationality','$gender','$age','$fms','$district','$mobile','$email','$cv','$cover')");
     if($query){
         echo "<script>alert('Enrollment Details sent successfully.');</script>";
         echo "<script type='text/javascript'> document.location = 'about.php'; </script>";
     } else {
         echo "<script>alert('Something went wrong. Please try again.');</script>";
     }
     $sql = "SELECT  `cv` FROM `tblenrollment` WHERE `cv`= '$name'";
     $result = mysqli_query($con,$sql);
     $row = mysqli_fetch_array($result);
     $image = $row['cv'];
     $image_src = "uploads/".$image;

 }

?>
<img src='<?php echo $image_src; ?>' >

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Registration Enrollment System </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

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
            <div class="navbar-nav mx-auto" style="position:absolute; left: 0; margin-top: 10vh;">
                <a href="javascript:void (0)" class="nav-item nav-link ">Home</a>
                <a href="" class="nav-item nav-link active">Registration/Admission</a>&nbsp;&nbsp;
            </div>
    </nav>

        <!-- Page Header End -->
        <div class="container-xxl py-5 position-relative mb-5" style="background: url(img/niceone.jpg)">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Program Enrollment</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="about.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Program Enrollment</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Appointment Start -->
         <div class="container-xxl py-5">
             <div class="container">
                 <div class="bg-light rounded">
                     <div class="row g-0">
                         <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                             <div class="h-100 d-flex flex-column justify-content-center p-5">
                                 <h1 class="mb-4">Register Here</h1>


                                 <form action="" method="post" enctype="multipart/form-data">
                                     <div class="row g-3">
                                         <div class="col-sm-6">
                                             <div class="form-floating">
                                                 <input type="text" class="form-control border-0" id="firstName" name="firstName" placeholder="Father Name" required>
                                                 <label for="gname">First Name</label>
                                             </div>
                                         </div>

                                         <div class="col-sm-6">
                                             <div class="form-floating">
                                                 <input type="text" class="form-control border-0" id="surname" name="surname" placeholder="Father Name" >
                                                 <label for="gname">Middle Name (optional)</label>
                                             </div>
                                         </div>

                                         <div class="col-sm-6">
                                             <div class="form-floating">
                                                 <input type="text" class="form-control border-0" id="lastName" name="lastName" placeholder="Father Name" required>
                                                 <label for="gname">Last Name</label>
                                             </div>
                                         </div>

                                         <div class="col-sm-6">
                                             <div class="form-floating">
                                                 <input type="text" class="form-control border-0" id="nationality" name="nationality" placeholder="Father Name" required>
                                                 <label for="gname">Nationality</label>
                                             </div>
                                         </div>

                                         <div class="col-sm-6">
                                             <div class="form-floating">
                                                 <select class="form-control" id="gender" name="gender"  required>
                                                     <option value="">Select</option>
                                                     <option value="male">Male</option>
                                                     <option value="female">Female</option>
                                                 </select>
                                                 <label for="cage">Gender</label>
                                             </div>
                                         </div>

<!--                                         <div class="col-sm-6">-->
<!--                                             <div class="form-floating">-->
<!--                                                 <input type="text" class="form-control border-0" id="gender" name="gender" placeholder="Mother Name" required>-->
<!--                                                 <label for="gmail">Gender</label>-->
<!--                                             </div>-->
<!--                                         </div>-->

                                          <div class="col-sm-6">
                                             <div class="form-floating">
                                                 <input type="number" class="form-control border-0" id="age" name="age" placeholder="Parents Mobile No." required>
                                                 <label for="gname">Age</label>
                                             </div>
                                         </div>

                                         <div class="col-sm-6">
                                             <div class="form-floating">
                                                 <input type="text" class="form-control border-0" id="fms" name="fms" placeholder="Child Name" required>
                                                 <label for="cname">Federal Member State</label>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-floating">
                                                 <input type="text" class="form-control border-0" id="district" name="district" placeholder="Child Name" required>
                                                 <label for="cage">District</label>
                                             </div>
                                         </div>

                                         <div class="col-sm-12">
                                         <div class="form-floating">
                                             <input  type="text" class="form-control border-0" id="mobile" name="mobile" placeholder="Child Name" required>
                                             <label for="cage">Mobile eg (+2520123456)</label>
                                             </div>
                                         </div>

                                         <div class="col-sm-12">
                                             <div class="form-floating">
                                                 <input type="email" class="form-control border-0" id="email" name="email" placeholder="Parents Email" required>
                                                 <label for="gmail">Email</label>
                                             </div>
                                         </div>

                                         <div class="col-sm-12">
                                             <div class="form-floating">
                                                 <input type="file" class="form-control border-0" id="cv" name="cv" placeholder="Parents Email" accept=".pdf, .doc, .docx" required>
                                                 <label for="gmail">Attach your CV</label>
                                             </div>
                                         </div>

                                         <div class="col-12">
                                             <div class="form-floating">
                                                 <textarea class="form-control border-0" placeholder="Leave a message here" id="cover" style="height: 100px" name="cover" required></textarea>
                                                 <label for="cover">Cover Letter</label>
                                             </div>
                                         </div>

                                         <div class="col-12">
                                             <button class="btn btn-primary w-100 py-3" type="submit" name="submit">Submit</button>
                                         </div>
                                     </div>
                                 </form>

                                 <!-- Display response messages -->
<!--                                 --><?php //if(!empty($resMessage)) {?>
<!--                                     <div class="alert --><?php //echo $resMessage['status']?><!--">-->
<!--                                         --><?php //echo $resMessage['message']?>
<!--                                     </div>-->
<!--                                 --><?php //}?>

                             </div>
                         </div>
                         <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
<!--                             <div class="position-relative h-100">-->
<!--                                 <img class="position-absolute w-100 h-100 rounded" src="img/regg.jpeg" style="object-fit: cover;">-->
<!--                             </div>-->
                         </div>
                     </div>
                 </div>
             </div>
         </div>

        <!-- Appointment End -->


        <!-- Footer Start -->
            <?php include_once('includes/footer.php');?>       
             <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgPlaceholder').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $("#chooseFile").change(function () {
        readURL(this);
    });
</script>
</body>

</html>

