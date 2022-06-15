<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PillsPk - Admin</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
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
                <h1 class="text-center text-primary">ORDER</h1>
                <table class="table table-fluid" id="example">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">PhoneNumber</th>
                            <th scope="col"> Name</th>
                            <th scope="col"> Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Pharmacy Name</th>
                            <th scope="col">Date/Time</th>


                            <th scope="col" width="0%">Actions</th>
                        </tr>
                    </thead>

                    <tbody id="ex-table"></tbody>
                </table>

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
            var content = "";

            function FetchAllUsers() {
                var database = firebase.database().ref().child("Pills/Orders");
                database.once("value", function(snapshot) {
                    if (snapshot.exists()) {

                        var count = 0;

                        snapshot.forEach(childsnapshot => {


                            childsnapshot.forEach(data => {

                                console.log(data.key);
                                //if (data.val().userContactNo != null) 
                                {
                                    var userPhoneNumber = data.val()
                                        .userContactNo; //user phone number
                                    var userName = data.val().userName; //user userName
                                    var userEmail = data.val().userEmail; //user userEmail
                                    var userAddress = data.val().userAddress; //user userAddress
                                    var pharmacyName = data.val()
                                        .pharmacyName; //user userAddress
                                    var currentDate = data.val().currentDate; //user currentDate
                                    var currentTime = data.val().currentTime; //user currentTime


                                    content += "<tr>";
                                    content += "<td>" + ++count + "</td>"; //column1
                                    content += "<td>" + userPhoneNumber + "</td>"; //column1
                                    content += "<td>" + userName + "</td>";
                                    content += "<td>" + userEmail + "</td>";
                                    content += "<td>" + userAddress + "</td>";
                                    content += "<td>" + pharmacyName + "</td>";
                                    content += "<td>" + currentDate + "<br>" + currentTime +
                                        "</td>";



                                    // console.log(snapshot.key + "/" + userPhoneNumber + "/" + data.key);
                                    // content += "<td>" + userName + "</td>";
                                    // content += "<td>" + userEmail + "</td>";
                                    // content += "<td>" + userAddress + "</td>";
                                    //   // onclick=\"location.href='./detail.php'\" 
                                    //content += "<td>    <button type='button'     name='Orderdetail'    data-toggle='modal' data-target='#exampleModal'   class='orderdetail btn btn-primary'   id='" + userid +"' ><i class=''aria-hidden='true'></i>Order Detail</button></td>";
                                    content +=
                                        "<td><button name='deleteOrder' class='deleteOrder btn btn-danger btn-sm rounded-0' type='button' data-toggle='tooltip' data-placement='top' title='Delete'id='";
                                    content += userPhoneNumber + "/" + data.key;
                                    content += "'><i class='fa fa-trash'></i></button> ";

                                    content +=
                                        "<button name='orderdetail' class='orderdetail btn btn-danger btn-sm rounded-0' type='button' data-toggle='tooltip' data-placement='top' title='Detail'id='";
                                    content += userPhoneNumber + "/" + data.key;
                                    content += "'><i >Detail</i></button> </td>";

                                    content += "</tr>";
                                }
                            });
                        });

                        $("#ex-table").append(content);
                        // order detail
                        $(document).ready(function() {

                            //   //Pagination numbers
                            $('#example').DataTable({

                                "pagingType": "full_numbers",
                                stateSave: true,
                                "bDestroy": true,


                            });
                        });

                        $(document).on("click", ".orderdetail", function() {

                            var ids = $(this).attr("id");

                            window.location.href = "./order_detail.php?orderid=" + ids;
                            //window.location.href = "./detail.php?orderid=" + "03230115793";

                        }); //end order detail



                        $(document).on("click", ".deleteOrder", function() {
                            if (
                                confirm(
                                    "Are you sure you want to Delete this Record from the Database"
                                )
                            ) {
                                var ids = $(this).attr("id");
                                console.log(ids);

                                firebase
                                    .database()
                                    .ref("Pills/Orders/" + ids)
                                    .remove();
                                window.location.href = "./Orders.php";
                            } else {
                                console.log("not deleted");
                            }
                        });
                    }
                });






                $(document).on("click", ".update", function() {
                    var ids = $(this).attr("id");
                    console.log(ids);

                    window.location.href = "./UpdateOrders.php?userid=" + ids;
                });
            }
            </script>
            <script>

            </script>


            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
                integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
                integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
                crossorigin="anonymous">
            </script>

            <script src="http://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

            <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>





            <<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
                crossorigin="anonymous">
                </script>
                <script src="../js/scripts.js"></script>

</body>

</html>