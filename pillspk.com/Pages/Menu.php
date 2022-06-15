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
</head>

<body class="sb-nav-fixed" onload="FetchAllUsers()">
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
                <h1 class="text-center text-primary">Menu</h1>
                <table class="table table-responsive  table-dark table-white table-striped table-bordered"
                    id="ex-table">
                    <thead>
                        <tr>
                            <th scope="col">name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody></tbody>
                </table>

                <!-- Button trigger modal -->
            </main>

            <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-app.js"></script>
            <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-auth.js"></script>
            <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-database.js"></script>
            <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js"></script>
            <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-storage.js"></script>

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
            </script>

            <script>
            function FetchAllUsers() {
                var database = firebase.database().ref("Pills").child("menu");
                database.once("value", function(snapshot) {
                    if (snapshot.exists()) {
                        var content = "";

                        snapshot.forEach(function(data) {
                            // var id = data.val().value;
                            // console.log(id);
                            var name = data.val().name;
                            var price = data.val().price;
                            content += "<tr>";
                            content += "<td>" + name + "</td>"; //column1
                            content += "<td>" + price + "</td>";
                            content +=
                                "<td> <input type='button' name='same'  value='Delete'  class='hero btn btn-danger'   id='" +
                                data.val() +
                                "' />    </td>";

                            content += "</tr>";
                        });

                        $("#ex-table").append(content);

                        //  $(document).on("click", ".hero", function () {
                        //     var ids = $(this).attr("id");
                        //     console.log(ids);

                        //     // firebase
                        //     //   .database()
                        //     //   .ref("Pills/user/" + ids)
                        //     //   .remove();
                        //     // window.location.href = "./updatePharmacies.php?userid=" + ids;
                        //   });
                    }
                });
            }
            </script>
            <script></script>

            <script src="public/js/main.js"></script>
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