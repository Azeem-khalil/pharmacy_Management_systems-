<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PillsPk - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <style>
    .row {
        margin-top: 2px;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">PillsPk Admin Panel</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li> -->
                    <li><a class="dropdown-item" name="submit" id="submit">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "side_bar.php" ?>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <!-- <h3 class="text-center text-primary">Update the Pharmacies Data</h3> -->
                <div class="row">
                    <div class="col-md-8 mb-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h3 class="mb-0 text-center">Add Pharmacies</h3>
                            </div>
                            <div class="card-body">
                                <form onsubmit="return false;">
                                    <!-- 2 column grid layout with text inputs for the first and last names -->


                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form6Example1">Pharmacy name</label>
                                        <input type="text" name="name" id="name" class="form-control" required />
                                    </div>

                                    <!-- Text input -->


                                    <!-- Text input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form6Example4">Address Line 1</label>
                                        <input type="text" name="Address1" id="Address1" class="form-control"
                                            required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form6Example4">Address Line 2</label>
                                        <input type="text" name="Address2" id="Address2" class="form-control"
                                            required />
                                    </div>



                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form6Example4">Province</label>
                                        <input type="text" name="province" id="province" class="form-control"
                                            required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form6Example4">Country</label>
                                        <input type="text" name="country" id="country" class="form-control" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form6Example5">Phone Number</label>
                                        <input type="number" id="number" name="number" class="form-control" required />
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form6Example5">Email</label>
                                        <input type="email"
                                            pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"
                                            id="email" class="form-control" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form6Example5">Password</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            required />
                                    </div>



                                    <!-- Number input -->


                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-center mb-2">
                                        <input type="button" value="Add" name="Add" id="Add"
                                            class="btn btn-primary btn-block btn-group-lg">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

            </main>

            <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-app.js"></script>
            <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-auth.js"></script>
            <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-database.js"></script>
            <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js"></script>

            <script type="module">
            // Import the functions you need from the SDKs you need
            // TODO: Add SDKs for Firebase products that you want to use
            // https://firebase.google.com/docs/web/setup#available-libraries

            // Your web app's Firebase configuration
            const firebaseConfig = {
                apiKey: "AIzaSyB5n0JbJ_Ytv5sMcNVkl3Vb7Qxi-UAOCi0",
                authDomain: "pills-3b347.firebaseapp.com",
                databaseURL: "https://pills-3b347.firebaseio.com",
                projectId: "pills-3b347",
                storageBucket: "pills-3b347.appspot.com",
                messagingSenderId: "700364791755",
                appId: "1:700364791755:web:5805ef690c409e632fa04e",
            };

            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);

            // navigator.serviceWorker.register("/index.js").then((registration) => {
            //   firebase.messaging().useServiceWorker(registration);
            // });

            // const messaging = firebase.messaging();
            // messaging.onBackgroundMessage((payload) => {
            //   console.log(
            //     "[firebase-messaging-sw.js] Received background message ",
            //     payload
            //   );
            //   // Customize notification here
            //   const notificationTitle = "Background Message Title";
            //   const notificationOptions = {
            //     body: "Background Message body.",
            //     icon: "/firebase-logo.png",
            //   };

            //   self.registration.showNotification(
            //     notificationTitle,
            //     notificationOptions,
            //     console.log(notificationTitle)
            //   );
            // });


            $("#submit").click(function() {
                firebase
                    .auth()
                    .signOut()
                    .then(
                        function() {
                            window.location.href = "../index.php";
                        },
                        function(error) {
                            console.error("Sign Out Error", error);
                        }
                    );
            });

            $("#Add").click(function(e) {
                e.preventDefault();
                var name = document.getElementById("name").value;
                var Address1 = document.getElementById("Address1").value;
                var Address2 = document.getElementById("Address2").value;
                var province = document.getElementById("province").value;
                var country = document.getElementById("country").value;
                var number = document.getElementById("number").value;
                var email = document.getElementById("email").value;
                email = email.toLowerCase();

                var password = document.getElementById("password").value;


                if (name == "" || Address1 == "" || Address2 == "" || province == "" || country == "" ||
                    email == "" || password == "" || number == "") {
                    window.alert("Please enter All the Details");
                } else {
                    console.log(name);
                    firebase.auth().createUserWithEmailAndPassword(email, password)
                        .then(userCredential => {
                            var user = firebase.auth().currentUser;
                            var uid = user.uid;

                            //set data into User database
                            firebase.database().ref('Pills/pharmcies' + "/" + uid).set({
                                name: name,
                                Address1: Address1,
                                Address2: Address2,
                                province: province,
                                country: country,
                                number: number,
                                email: email,
                                password: password,
                                uid: uid,
                                order_id: "",
                                type: "pharmacy"

                            }).then(success => {

                                window.alert("Success:The Pharmacies Data is Entered");
                                window.location.href = "./Addpharmacies.php";

                            });

                        })
                        .catch(function(error) {

                            var errorCode = error.code;
                            var errorMessage = error.message;

                            window.alert("Error : " + errorMessage);
                        });
                }



            });
            </script>




            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript">
            </script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
                crossorigin="anonymous"></script>
            <script src="../js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
            </script>
            <script src="assets/demo/chart-area-demo.js"></script>
            <script src="assets/demo/chart-bar-demo.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
            <script src="js/datatables-simple-demo.js"></script>
</body>

</html>