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
                <div class="container py-5">
                    <table class=" table table-dark  table-responsive-lg  table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Order Phonenumber</th>
                                <th scope="col">discount</th>
                                <th scope="col">discountpercentage</th>
                                <th scope="col">subtotal</th>
                                <th scope="col">total</th>
                            </tr>
                        </thead>

                        <tbody id="ex-table">
                        </tbody>
                    </table>




                    <div class="row d-flex justify-content-center align-items-center ">
                        <div class="col">
                            <div class="card">
                                <h3 style="text-align: center; color:Blacck"><b>ORDER PRODUCTS</b></h3>

                                <div class="card-body ">

                                    <div class="row">

                                        <div id="Products" class="col-lg-10">
                                            <hr>








                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
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
            </script>

            <script>
            function FetchAllUsers() {
                //var database = firebase.database().ref().child("Pills/Orders");
                var baseUrl = (window.location).href; // You can also use document.URL
                var koopId = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
                var checknum = koopId.substring(koopId.lastIndexOf('/') + 1);

                //alert(checknum)
                // console.log(checknum);
                var saveid = "";
                var database = firebase.database().ref("Pills").child("-MwWypM8lxNs85MqWsXB/CancelOrder");
                database.once("value", function(snapshot) {
                    snapshot.forEach(child_snapshot => {
                        console.log(child_snapshot.key);
                        child_snapshot.forEach(pdata => {
                            pdata.forEach(data => {


                                if (data.exists()) {
                                    //console.log(checknum);
                                    if (checknum == data.key) {
                                        saveid = child_snapshot.key;
                                        var i = 0;
                                        console.log("saveid:" + saveid);

                                        var database = firebase.database().ref("Pills")
                                            .child("-MwWypM8lxNs85MqWsXB/CancelOrder")
                                            .child(saveid).child(koopId);
                                        database.once("value", function(data) {



                                            if (data.exists()) {

                                                var content = "";
                                                var orderdetail = "";
                                                var Phonenumber = data.val()
                                                    .userContactNo;

                                                var discount = data.val()
                                                    .discount
                                                var discountpercentage = data
                                                    .val().discountPercentage;
                                                var subtotal = data.val()
                                                    .subTotal;
                                                var total = data.val().total;
                                                var cart = data.val().cart;

                                                console.log(data.key);
                                                if (subtotal != null && total !=
                                                    null) {
                                                    content += "<tr>";
                                                    content += "<td>" +
                                                        Phonenumber + "</td>";
                                                    content += "<td>" +
                                                        discount +
                                                        "</td>"; //column1
                                                    content += "<td>" +
                                                        discountpercentage +
                                                        "</td>"; //column2
                                                    content += "<td>" +
                                                        subtotal +
                                                        "</td>"; //column2
                                                    content += "<td>" + total +
                                                        "</td>"; //column2

                                                    content += "</tr>";


                                                    data.forEach(function(
                                                        cart_data
                                                        ) { //For get Cart detail
                                                        cart_data
                                                            .forEach(
                                                                function(
                                                                    child_cart_data
                                                                    ) { //get all item of cart

                                                                    //console.log(child_cart_data.key+": "+child_cart_data.val().name);
                                                                    var image_link =
                                                                        child_cart_data
                                                                        .val()
                                                                        .image;
                                                                    var name =
                                                                        child_cart_data
                                                                        .val()
                                                                        .name;
                                                                    var mg =
                                                                        child_cart_data
                                                                        .val()
                                                                        .mg;
                                                                    var price =
                                                                        child_cart_data
                                                                        .val()
                                                                        .price;
                                                                    var quantity =
                                                                        child_cart_data
                                                                        .val()
                                                                        .quantity;



                                                                    orderdetail
                                                                        +=
                                                                        "<div class='card mb-3'><div class='card-body'> <div class='d-flex justify-content-between'> <div class='d-flex flex-row align-items-center'>";
                                                                    orderdetail
                                                                        +=
                                                                        "<div><img src='" +
                                                                        image_link +
                                                                        "'class='img-fluid rounded-3' alt='Shopping item' style='width: 65px;'> </div>";
                                                                    orderdetail
                                                                        +=
                                                                        "<div class='ms-3'> <h5 style='color:blue'>" +
                                                                        name +
                                                                        "</h5><p class='small mb-0'>" +
                                                                        mg +
                                                                        "</p> </div> </div>";
                                                                    orderdetail
                                                                        +=
                                                                        "<div class='d-flex flex-row align-items-center'> <div style='width: 50px;'><h5 class='fw-normal mb-0'>" +
                                                                        quantity +
                                                                        "</h5> </div> <div style='width: 80px;'> <h5 class='mb-0' style='color:red' >RS." +
                                                                        price +
                                                                        "</h5> </div></div></div>  </div></div>";


                                                                });

                                                    });
                                                }

                                                $("#ex-table").append(content);
                                                $("#Products").append(
                                                    orderdetail);

                                            } else {
                                                console.log("NO data found");
                                            }
                                        });
                                    }

                                }

                            });
                        });
                    });
                });





            }
            </script>


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