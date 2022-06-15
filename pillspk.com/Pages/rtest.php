<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <script src="//code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous">
    </script>
    </script>
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <meta name="author" content="PillsPk" />
    <title>PillsPk - Admin</title>

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
            <section class=" h-custom" style="background-color: #eee;">

                <div class="container py-5">







                    <div class="row d-flex justify-content-center align-items-center ">
                        <div class="col">
                            <div class="card">
                                <h3 style="text-align: center; color:Blacck"><b>REPORT</b></h3>

                                <div class="card-body ">

                                    <div class="">

                                        <div id="Products">


                                            <table class="table table-fluid" id="example">
                                                <thead class="table-dark ">

                                                    <tr>
                                                        <!-- //class="th-sm" -->
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">PhoneNumber</th>
                                                        <th scope="col">DateTime</th>
                                                        <th scope="col">SubTotal</th>
                                                        <th scope="col">Total</th>

                                                    </tr>

                                                </thead>
                                                <tbody id="ex-table">

                                                    <!-- <tr>
                                                        <td>6</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>

                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>

                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>

                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>

                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>

                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>

                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>23232l</td>
                                                        <td>Table cell</td>

                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>
                                                        <td>Table cell</td>

                                                    </tr> -->


                                                </tbody>
                                                <tr class='table-dark' style='color: brown;'>
                                                    <th colspan='5'>TOTAL PAYMENT</th>
                                                    <th id='total_earn'></th>
                                                </tr>

                                            </table>
                                            <div class="col-md-12 text-center">
                                                <ul class="pagination pagination-lg pager" id="myPager"></ul>
                                            </div>







                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </section>

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
            var TotalEarn_for_Daily_report = 0;
            var index = 0;
            var baseUrl = (window.location).href; // You can also use document.URL
            var picId = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
            var C_date = new Date();
            let CURENTdate = date_formateChange(C_date);
            var content = "";

            function FetchAllUsers() {
                //var database = firebase.database().ref().child("Pills/Orders");
                var database_ref = firebase.database().ref("Pills").child("-MwWypM8lxNs85MqWsXB/SellOrder");
                var color = picId;
                //var color = "w";

                switch (color) {
                    case "d":
                        //alert("d");
                        fetc_ALL_data(database_ref, CURENTdate);
                        break;
                    case "w":
                        //alert("w");
                        let week_days = Last7Days();
                        //alert(week_days);
                        for (var i = 0; i < 7; i++) {
                            //alert(week_days[i]);
                            fetc_ALL_data(database_ref, week_days[i]);

                        }
                        if (i == 7) {
                            // alert(i);

                            content = "";
                            $("#ex-table").append(content);
                            content = "";
                        }
                        break;
                    case "m":
                        //alert("m");
                        fetc_ALL_data(database_ref, CURENTdate, email);
                        break;
                    default:
                        alert("Unknown");
                }


            }





            function fetc_ALL_data(database, CURENTdate) {
                //var database = firebase.database().ref().child("Pills/Orders");
                database.once("value", function(snapshot) {

                    if (snapshot.exists()) {


                        //consol.log(snapshot.key);

                        var count = 0;
                        snapshot.forEach(childsnapshot => {
                            childsnapshot.forEach(pdata => {
                                pdata.forEach(data => {
                                    // if (data.val().userPhoneNumber != null)
                                    {
                                        if (
                                            data.val().currentDate == CURENTdate
                                        ) {
                                            console.log(data.val().currentDate);

                                            var userPhoneNumber = data.val()
                                                .userContactNo; //user phone number
                                            var userName = data.val()
                                                .userName; //user userName
                                            var subTotal = data.val()
                                                .subTotal; //user userEmail
                                            var total = data.val()
                                                .total; //user userAddress
                                            var currentDate = data.val()
                                                .currentDate; //user currentDate
                                            var currentTime = data.val()
                                                .currentTime; //user currentTime
                                            TotalEarn_for_Daily_report += parseFloat(
                                                data.val().total);

                                            //TotalEarn_for_Daily_report+= data.val().total;


                                            console.log("TotalEarn_for_Daily_report " +
                                                data.val().total);


                                            content += "<tr>";
                                            content += "<th scope='row'>" + ++index +
                                                "</th>";
                                            content += "<td>" + userName +
                                                "</td>"; //column1
                                            content += "<td>" + userPhoneNumber +
                                                "</td>";
                                            content += "<td>" + currentDate + "<br>" +
                                                currentTime + "</td>";
                                            content += "<td>" + subTotal + "</td>";

                                            content += "<td>" + total + "</td>";


                                            content += "</tr>";

                                            // console.log(content);
                                            //content = "";
                                            // content += "<td>" + userName + "</td>";
                                            // content += "<td>" + userEmail + "</td>";
                                            // content += "<td>" + userAddress + "</td>";
                                            //   // onclick=\"location.href='./detail.php'\" 
                                            //content += "<td>    <button type='button'     name='Orderdetail'    data-toggle='modal' data-target='#exampleModal'   class='orderdetail btn btn-primary'   id='" + userid +"' ><i class=''aria-hidden='true'></i>Order Detail</button></td>";







                                        }
                                    }
                                });
                            });
                        });


                        $("#ex-table").append(content);

                        content = "";
                        document.getElementById('total_earn').innerText = TotalEarn_for_Daily_report;






                        $(document).ready(function() {

                            //   //Pagination numbers
                            $('#example').DataTable({
                                "pagingType": "full_numbers"
                            });
                            // setTimeout(function(){
                            //                          //Pagination numbers
                            //                          alert("aa");
                            //                          $('#paginationSimpleNumbers').DataTable({
                            //                                 "pagingType": "simple_numbers"
                            //                            });
                            //                         }, 3000);
                        });
                        $(document).on("click", ".orderdetail", function() {

                            var ids = $(this).attr("id");

                            window.location.href = "./sell_order_detail.php?orderid=" + ids;
                            //window.location.href = "./detail.php?orderid=" + "03230115793";

                        }); //end order detail




                        //delete
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
                                    .ref("Pills/-MwWypM8lxNs85MqWsXB/SellOrder/" + ids)
                                    .remove();
                                window.location.href = "./Sell.php";
                            } else {
                                console.log("not deleted");
                            }
                        });
                    }
                });



            }



            function date_formateChange(dateObj) {


                var month = dateObj.getUTCMonth(); //months from 1-12
                var day = dateObj.getUTCDate();
                var year = dateObj.getUTCFullYear();
                const daymis = ["1", "2", "3", "4", "5", "6", "7", "8", "9"];
                const monthsShort = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept',
                    'Oct',
                    'Nov', 'Dec'
                ];
                for (var i = 0; i < 12; i++) {
                    if (i == month) {
                        month = monthsShort[i];
                        break;
                    }
                }
                for (var i = 0; i < 12; i++) {
                    if (day == daymis[i]) {
                        day = "0" + daymis[i];
                        break;
                    }
                }


                let date_formate = month + " " + day + ", " + year;
                return date_formate;
            }


            function Last7Days() {
                var result = [];
                for (var i = 0; i < 7; i++) {
                    var d = new Date();
                    d.setDate(d.getDate() - i);
                    result.push(date_formateChange(d))
                }

                return (result);
            }



            //$(document).on("click", ".update", function () {
            //    var ids = $(this).attr("id");
            //    console.log(ids);
            //    window.location.href = "./UpdateOrders.php?userid=" + ids;
            //});
            </script>


            <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
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