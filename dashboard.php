<?php
session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM users WHERE id=$user_id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

$username = $user["username"]; // username from users table

$subject_sql = "SELECT COUNT(DISTINCT subject) as subject_count FROM createclass WHERE username = '$username'";
$subject_result = $conn->query($subject_sql);
$subject_data = $subject_result->fetch_assoc();
$subject_count = $subject_data['subject_count'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>MJS_Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="./assets/graduation.png" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
</head>
<style>
    body {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        transition: background-image 1s ease-in-out;
        color: #fff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .profile-img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid #0d6efd;
        object-fit: cover;
        box-shadow: 0 0 10px rgba(13, 110, 253, 0.5);
    }

    .btn-shadow {
        padding: 10px 25px;
        border-radius: 30px;
        font-weight: 600;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease-in-out;
        text-transform: uppercase;
        letter-spacing: 1px;
        border: none;
    }

    .btn-shadow:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3);
    }


    .btn-custom {
        padding: 10px 30px;
        font-weight: 600;
        border-radius: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
        border: none;
    }

    .btn-custom-primary {
        background-color: #2575fc;
        color: white;
    }

    .btn-custom-primary:hover {
        background-color: #1a52d1;
        box-shadow: 0 6px 12px rgba(37, 117, 252, 0.6);
        transform: translateY(-3px);
    }

    .btn-custom-success {
        background-color: #28a745;
        color: white;
    }

    .btn-custom-success:hover {
        background-color: #1e7e34;
        box-shadow: 0 6px 12px rgba(40, 167, 69, 0.6);
        transform: translateY(-3px);
    }

    .btn-custom-info {
        background-color: #17a2b8;
        color: white;
    }

    .btn-custom-info:hover {
        background-color: #117a8b;
        box-shadow: 0 6px 12px rgba(23, 162, 184, 0.6);
        transform: translateY(-3px);
    }

    .btn-custom-warning {
        background-color: #ffc107;
        color: #333;
    }

    .btn-custom-warning:hover {
        background-color: #e0a800;
        box-shadow: 0 6px 12px rgba(255, 193, 7, 0.6);
        transform: translateY(-3px);
    }

    .card {
        background-color: rgba(255, 255, 255, 0.95);
        color: #333;
        border-radius: 15px;
    }

    .list-group-item {
        font-weight: 600;
        font-size: 1rem;
    }

    h5.text-white {
        color: #000 !important;
    }

    hr {
        border-color: #ddd;
    }
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="#"><img src="./assets/graduation.png" width="30px" alt="icon"> MJS_Classroom</a>
            <div class="d-flex">
                <a class="btn btn-outline-light" href="logout.php">Logout</a>
            </div>
            <div class="d-flex">
                <a class="btn btn-outline-light" href="http://localhost/virtualclassroom-php/register.php" target="_blank">Classroom</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg p-4">
                    <div class="text-center">
                        <img src="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg?semt=ais_hybrid&w=740" class="profile-img mb-3" alt="Profile Image">
                        <h3><?php echo $user["first_name"] . " " . $user["last_name"]; ?></h3>
                        <p class="text-muted">@<?php echo $user["username"]; ?></p>
                        <a href="edit_profile.php" class="btn btn-outline-primary btn-sm">Edit Profile</a>
                    </div>

                    <div class="d-flex justify-content-center gap-3 my-4 flex-wrap">
                        <button class="btn btn-primary btn-shadow"
                            onclick="openModal('Placement', 'College placement, a quintessential phase of the academic journey in India, serves as a crucial bridge between education and professional life. It is a structured process organized by universities and colleges where companies are invited to recruit students who are in their final year of study. This symbiotic relationship provides companies with fresh, young talent while offering students a coveted opportunity to secure a job even before they have officially graduated.', 'https:/t4.ftcdn.net/jpg/05/18/65/75/360_F_518657595_keQdDMCfv8SgYvjOgPMe8BCx7hkuplIf.jpg')">Placement</button>

                        <button class="btn btn-primary btn-shadow"
                            onclick="openModal('Payment', 'You can pay your fees here- manugupta75@axl  or SBI Account no - 40115781214',  '')">Payment </button>


                        <button class="btn btn-info btn-shadow"
                            onclick="openModal('Teachers', 'Suraj Chandra: Assistant Professor - Prof. Suraj Chandra is a dedicated Assistant Professor specializing in Compiler Design and Operating Systems. With a deep passion for system-level programming and language processing, he brings clarity to complex topics through practical demonstrations and real-world examples. His teaching emphasizes strong foundational knowledge, encouraging students to explore how software interacts with hardware at a deeper level. He is known for his engaging lectures and commitment to student success.', 'https:/via.placeholder.com/600x300')">Teachers</button>


                        <button class="btn btn-warning btn-shadow"
                            onclick="openModal('Library', 'You can access your all books and studey material on this link- https:/manuguptas.github.io/Resources-Repository/', 'https:/manuguptas.github.io/Resources-Repository/')">Library</button>
                    </div>




                    <hr>
                    <div class="row text-center">

                        <div class="col-md-4 mt-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <i class="bi bi-journal-bookmark-fill fs-2 text-primary mb-2"></i>
                                    <h6 class="card-title text-muted">
                                        Subjects Enrolled
                                    </h6>
                                    <p class="card-text"><?php echo $subject_count; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <i class="bi bi-envelope-fill fs-2 text-success mb-2"></i>
                                    <h6 class="card-title text-muted">

                                        Email
                                    </h6>
                                    <p class="card-text"><?php echo $user["email"]; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <i class="bi bi-telephone-fill fs-2 text-warning mb-2"></i>
                                    <h6 class="card-title text-muted">

                                        Phone
                                    </h6>
                                    <p class="card-text"><?php echo $user["phoneNumber"]; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <i class="bi bi-person-lines-fill fs-2 text-info mb-2"></i>
                                    <h6 class="card-title text-muted">
                                        Bio
                                    </h6>
                                    <p class="card-text"><?php echo $user["bio"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $subject_list_sql = "SELECT DISTINCT subject FROM createclass WHERE username = '$username'";
                    $subject_list_result = $conn->query($subject_list_sql);

                    if ($subject_list_result->num_rows > 0) {
                        echo "<div class='mt-4'><h5 class='text-white'>Subjects Enrolled:</h5><ul class='list-group'>";
                        while ($row = $subject_list_result->fetch_assoc()) {
                            echo "<li class='list-group-item'>" . $row['subject'] . "</li>";
                        }
                        echo "</ul></div>";
                    }
                    ?>

                </div>
                <hr>
                <p class="text-center text-muted mt-3">© 2025 Gupta ♥ Classroom &nbsp; &nbsp; <a href="http://localhost/virtualclassroom-php/student_dashboard/email.php" class="btns">Contact Us</a></p> 
            </div>
        </div>
    </div>
    </div>

    <!-- ===================================modal=============================================== -->

    <!-- <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBodyContent">
                     Dynamic content will be injected here 

                </div>
            </div>
        </div>
    </div> -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center gap-2" id="infoModalLabel">
                        <i class="bi bi-info-circle-fill text-primary"></i>
                        Modal Title
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="modalBodyContent">
                    <!-- Dynamic content goes here -->
                    <div class="text-center mb-3">
                        <img id="modalImage" src="" alt="Preview" class="img-fluid rounded shadow" style="max-height: 300px;">
                    </div>

                    <p id="modalDescription" class="fs-5"></p>

                    <div id="modalExtraInfo" class="bg-light rounded p-3 mt-3 d-none">
                        <h6>Additional Information:</h6>
                        <p class="mb-0">hello</p>
                    </div>
                </div>

                <div class="modal-footer">
                    <a id="modalActionLink" href="#" class="btn btn-primary d-none" target="_blank">
                        <i class="bi bi-box-arrow-up-right"></i> Visit Resource
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- =========================================================================== -->

    <script>
        function openModal(title, description, imageUrl, extraInfo = '', link = '') {
            document.getElementById('infoModalLabel').innerText = title;
            document.getElementById('modalImage').src = imageUrl;
            document.getElementById('modalDescription').innerText = description;

            // Handle extra info
            const extraInfoDiv = document.getElementById('modalExtraInfo');
            if (extraInfo) {
                extraInfoDiv.classList.remove('d-none');
                extraInfoDiv.querySelector('p').innerText = extraInfo;
            } else {
                extraInfoDiv.classList.add('d-none');
            }

            // Handle action link
            const actionLink = document.getElementById('modalActionLink');
            if (link) {
                actionLink.href = link;
                actionLink.classList.remove('d-none');
            } else {
                actionLink.classList.add('d-none');
            }

            const modal = new bootstrap.Modal(document.getElementById('infoModal'));
            modal.show();
        }
    </script>




    <!-- ==============background image=========================================================-->
    <script>
        const images = [
            'https://img.freepik.com/free-vector/school-kids-classroom-scene_1308-73687.jpg?t=st=1749016979~exp=1749020579~hmac=ad3f1a230c20f43e4a781b1fb3dba9776686b4f736ee48eebc63d500637bdf8c&w=826',
            'https://media.istockphoto.com/id/2162169941/photo/bookstore.jpg?s=1024x1024&w=is&k=20&c=99cyWfKkOOSISJkdVZEwEy4WGRRJzgQnuRKHpXkqs5w=',
            'https://t4.ftcdn.net/jpg/06/28/30/41/360_F_628304123_IDQBKBHPWPIu2lccIyaLbFAmbi0IoNMA.jpg'
        ];
        let index = 0;

        function changeBackground() {
            document.body.style.backgroundImage = `url('${images[index]}')`;
            index = (index + 1) % images.length;
        }
        changeBackground();
        setInterval(changeBackground, 5000);


        function openModal(title, content) {
            document.getElementById('infoModalLabel').textContent = title;
            document.getElementById('modalBodyContent').textContent = content;
            const modal = new bootstrap.Modal(document.getElementById('infoModal'));
            modal.show();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <script>
        const myTimeouts = setTimeout(myGreeting, 23000);

        function myGreeting() {
            alert('Facing payment issue contact this number - Manau gupta (9064837076)');
        }

        function myStopFunction() {
            clearTimeout(myTimeouts);
        }
    </script>
     <script>
        const myTimeout = setTimeout(myGreeting, 8000);

        function myGreeting() {
            alert('Today Class will start 5pm link - https://meet.google.com/hwk-chth-xvy');
        }

        function myStopFunction() {
            clearTimeout(myTimeout);
        }
    </script>
</body>

</html>