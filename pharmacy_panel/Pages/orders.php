<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Customer Details</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <style>
    input[type="button"] {
        position: relative;
        margin-top: 100%;
    }
    </style>
</head>

<body class="">
    <div class="wrapper">
        <?php include "sidebar.php" ?>

        <div class="main-panel">
            <?php include "navbar.php" ?>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container py-5 content ">

                        <h3 class="text-center text-dark">Orders</h3>
                        <table class="   table table-dark  table-responsive-lg  table-striped table-bordered"
                            id="ex-table">
                            <thead>
                                <tr>
                                    <th scope="col">Order Phone Number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Date/Time</th>
                                    <!-- 
              <th scope="col">longitude</th> -->
                                    <!-- <th scope="col">shop</th>
              <th scope="col">status</th> -->
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <main>




                        <!--   Core JS Files   -->


                        <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-app.js"></script>
                        <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-auth.js"></script>
                        <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-database.js"></script>
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

                        $("#submit").click(function() {
                            firebase
                                .auth()
                                .signOut()
                                .then(
                                    function() {

                                        if (confirm('Are you sure you want to logout from the app')) {
                                            window.location.href = "../Pages/login.php";

                                        } else {
                                            console.log("not logout");

                                        }

                                    },
                                    function(error) {
                                        console.error("Sign Out Error", error);
                                    }
                                );
                        });

                        firebase.initializeApp(firebaseConfig);
                        var database = firebase.database();

                        firebase.auth().onAuthStateChanged(function(user) {
                            if (user) {
                                const users = firebase.auth().currentUser;
                                var name = user.name;
                                var email = user.email;
                                email = email.toLowerCase();
                                console.log(email);
                                console.log(user.email);
                                console.log(name);
                                var pharmacyID = user.uid;

                                console.log(pharmacyID);



                                //getting the name of the login pharmacy and showing in the html elements  
                                firebase.database().ref('Pills/pharmcies').orderByChild("email").equalTo(email)
                                    .once(
                                        'value').then(function(snapshot) {
                                        console.log(snapshot.key);
                                        if (snapshot.exists()) {
                                            snapshot.forEach(function(data) {
                                                var type = data.val().type;
                                                var name = data.val().name;
                                                console.log(name);
                                                document.getElementById("name").innerText = "" +
                                                    name;

                                            })
                                        } else {
                                            window.alert("Email does not exist in pharmacy ");
                                        }
                                    })



                                //showing the alert message about the new order recieved in the specific pharmacy
                                let ref = firebase.database().ref('Pills/pharmcies').orderByChild("email")
                                    .equalTo(
                                        email).on("child_changed", (snapshot) => {
                                        window.alert("New order has arrived");
                                    });

                                var fetchusers = [];
                                var udatabase = firebase.database().ref().child("Pills/user");
                                udatabase.once("value", function(snapshot) {
                                    if (snapshot.exists()) {
                                        var users = [];
                                        snapshot.forEach(childsnapshoot => {
                                            users.push(childsnapshoot.val());
                                            console.log("a");
                                        });
                                        ///copy list of user
                                        // fetchusers = users.reduce((newArray, element) => {
                                        //   newArray.push(element);

                                        //    return newArray;
                                        // }, []);
                                        fetchusers = users;

                                        ///////////////////////////////////////////////////////why not copy
                                        fetchusers.forEach(element => {
                                            console.log(element.phoneNumber);

                                            ////////Display of all order of selected phormacy email
                                            var database = firebase.database().ref().child(
                                                    "Pills/Orders/" + element.phoneNumber)
                                                .orderByChild(
                                                    "pharmacyEmail").equalTo(email);;

                                            //var database = firebase.database().ref().child("Pills/Orders").orderByChild("pharmacyEmail").equalTo(email);;
                                            // var database = firebase.database().ref("Pills/Orders");;

                                            //  databasechild=database.orderByChild("pharmacyEmail").equalTo(email);
                                            var temp = 0;

                                            database.once("value", function(snapshot) {
                                                if (snapshot.exists()) {
                                                    console.log("/////////////");
                                                    console.log(element.phoneNumber);
                                                    var content = "";

                                                    snapshot.forEach(function(data) {
                                                        console.log(
                                                            "///////////// key"
                                                        );
                                                        console.log(data.key);
                                                        //var userPhoneNumber =data.val().pharmacyEmail;//user phone number
                                                        console.log(
                                                            userPhoneNumber);
                                                        var userPhoneNumber =
                                                            data.val()
                                                            .userContactNo; //user phone number
                                                        var userName = data
                                                            .val()
                                                            .userName; //user userName
                                                        var userEmail = data
                                                            .val()
                                                            .userEmail; //user userEmail
                                                        var userAddress = data
                                                            .val()
                                                            .userAddress; //user userAddress 
                                                        var currentDate = data
                                                            .val()
                                                            .currentDate; //user currentDate
                                                        var currentTime = data
                                                            .val()
                                                            .currentTime; //user currentTime

                                                        content += "<tr>";
                                                        content += "<td>" +
                                                            userPhoneNumber +
                                                            "</td>"; //column1
                                                        content += "<td>" +
                                                            userName +
                                                            "</td>";
                                                        content += "<td>" +
                                                            userEmail +
                                                            "</td>";
                                                        content += "<td>" +
                                                            userAddress +
                                                            "</td>";
                                                        content += "<td>" +
                                                            currentDate +
                                                            "<br>" +
                                                            currentTime +
                                                            "</td>";

                                                        console.log(content);
                                                        // content += "<td>" + userName + "</td>";
                                                        // content += "<td>" + userEmail + "</td>";
                                                        // content += "<td>" + userAddress + "</td>";
                                                        //   // onclick=\"location.href='./detail.html'\" 
                                                        //content += "<td>    <button type='button'     name='Orderdetail'    data-toggle='modal' data-target='#exampleModal'   class='orderdetail btn btn-primary'   id='" + userid +"' ><i class=''aria-hidden='true'></i>Order Detail</button></td>";
                                                        content +=
                                                            "<td><button name='cancelOrder' class='cancelOrder btn btn-danger btn-sm rounded-0' type='button' data-toggle='tooltip' data-placement='top' title='Delete'id='";
                                                        content +=
                                                            userPhoneNumber +
                                                            "/" + data.key;
                                                        content +=
                                                            "'><i class='fa fa-trash'></i></button> ";
                                                        content +=
                                                            "<button name='ordersell' class='ordersell btn btn-danger btn-sm rounded-0' type='button' data-toggle='tooltip' data-placement='top' title='SELL'id='";
                                                        content +=
                                                            userPhoneNumber +
                                                            "/" + data.key;
                                                        content +=
                                                            "'><i >SELL</i></button> ";

                                                        content +=
                                                            "<button name='orderdetail' class='orderdetail btn btn-danger btn-sm rounded-0' type='button' data-toggle='tooltip' data-placement='top' title='Detail'id='";
                                                        content +=
                                                            userPhoneNumber +
                                                            "/" + data.key;
                                                        content +=
                                                            "'><i>Detail</i></button> </td>";

                                                        content += "</tr>";

                                                        console.log(content);


                                                    });
                                                    // snapshot.forEach(function (data) {
                                                    //   var id = data.val().id;
                                                    //   var name = data.val().pharmacyEmail;
                                                    //   var category = data.val().category;
                                                    //   var latitude = data.val().latitude;
                                                    //   var longitude = data.val().longitude;
                                                    //   var phoneNumber = data.val().phoneNumber;
                                                    //   var shop = data.val().shop;
                                                    //   var status = data.val().status;
                                                    //   var userid = data.val().userId;


                                                    //   content += "<tr>";
                                                    //   content += "<td>" + id + "</td>"; //column1
                                                    //   content += "<td>" + name + "</td>"; //column2
                                                    //   content += "<td>" + category + "</td>"; //column2
                                                    //   content += "<td>" + latitude + "</td>"; //column2
                                                    //   content += "<td>" + longitude + "</td>"; //column2
                                                    //   content += "<td>" + phoneNumber + "</td>";
                                                    //   content += "<td>" + shop + "</td>";
                                                    //   content += "<td>" + status + "</td>";
                                                    //   // onclick=\"location.href='./detail.html'\" 
                                                    //   content += "<td> </button>    <button type='button'     name='Orderdetail'    data-toggle='modal' data-target='#exampleModal'   class='orderdetail btn btn-primary'   id='" +
                                                    //     userid +
                                                    //     "' ><i class='' aria-hidden='true'></i>Order Detail</button> </td>";

                                                    //   content += "</tr>";



                                                    // });

                                                    $("#ex-table").append(content);
                                                    // order detail
                                                    $(document).on("click",
                                                        ".orderdetail",
                                                        function() {

                                                            var ids = $(this).attr(
                                                                "id");

                                                            window.location.href =
                                                                "./Order_detail.php?orderid=" +
                                                                "Orders" +
                                                                "/" +
                                                                ids;
                                                            //window.location.href = "./detail.php?orderid=" + "03230115793";

                                                        }); //end order detail



                                                    //genrate uniq id
                                                    function generatePushID() {

                                                        // Modeled after base64 web-safe chars, but ordered by ASCII.
                                                        var PUSH_CHARS =
                                                            '-0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';

                                                        // Timestamp of last push, used to prevent local collisions if you push twice in one ms.
                                                        var lastPushTime = 0;

                                                        // We generate 72-bits of randomness which get turned into 12 characters and appended to the
                                                        // timestamp to prevent collisions with other clients.  We store the last characters we
                                                        // generated because in the event of a collision, we'll use those same characters except
                                                        // "incremented" by one.
                                                        var lastRandChars = [];


                                                        var now = new Date().getTime();
                                                        var duplicateTime = (now ===
                                                            lastPushTime);
                                                        lastPushTime = now;

                                                        var timeStampChars = new Array(
                                                            8);
                                                        for (var i = 7; i >= 0; i--) {
                                                            timeStampChars[i] =
                                                                PUSH_CHARS
                                                                .charAt(now % 64);
                                                            // NOTE: Can't use << here because javascript will convert to int and lose the upper bits.
                                                            now = Math.floor(now / 64);
                                                        }
                                                        if (now !== 0) throw new Error(
                                                            'We should have converted the entire timestamp.'
                                                        );

                                                        var id = timeStampChars.join(
                                                            '');

                                                        if (!duplicateTime) {
                                                            for (i = 0; i < 12; i++) {
                                                                lastRandChars[i] = Math
                                                                    .floor(
                                                                        Math.random() *
                                                                        64);
                                                            }
                                                        } else {
                                                            // If the timestamp hasn't changed since last push, use the same random number, except incremented by 1.
                                                            for (i = 11; i >= 0 &&
                                                                lastRandChars[i] ===
                                                                63; i--) {
                                                                lastRandChars[i] = 0;
                                                            }
                                                            lastRandChars[i]++;
                                                        }
                                                        for (i = 0; i < 12; i++) {
                                                            id += PUSH_CHARS.charAt(
                                                                lastRandChars[i]);
                                                        }
                                                        if (id.length != 20)
                                                            throw new Error(
                                                                'Length should be 20.'
                                                            );

                                                        return id;
                                                    }


                                                    //cencle order and copy this order in cancelOrder table in firebase
                                                    async function moveFbRecord(oldRef,
                                                        newRef,
                                                        ids) {
                                                        try {
                                                            console.log("mo");
                                                            var snap = await oldRef
                                                                .once(
                                                                    'value');
                                                            await newRef.child(
                                                                generatePushID() +
                                                                "/" +
                                                                ids).set(snap
                                                                .val());
                                                            await oldRef.set(null);
                                                            console.log('Done!');
                                                            // window.location.href ="./Orders.php";
                                                        } catch (err) {
                                                            console.log(err
                                                                .message);
                                                        }
                                                    }



                                                    ////cancle order
                                                    $(document).on("click",
                                                        ".cancelOrder",
                                                        function() {
                                                            // if (confirm("Are you sure you want to cencle this Order"))
                                                            {
                                                                var ids = $(this)
                                                                    .attr(
                                                                        "id");
                                                                console.log(ids);

                                                                var oldref =
                                                                    firebase
                                                                    .database().ref(
                                                                        "Pills/Orders/" +
                                                                        ids);
                                                                var newref =
                                                                    firebase
                                                                    .database().ref(
                                                                        "Pills")
                                                                    .child(
                                                                        "-MwWypM8lxNs85MqWsXB/CancelOrder"
                                                                    );

                                                                console.log(
                                                                    "cencellllll"
                                                                );
                                                                moveFbRecord(oldref,
                                                                    newref,
                                                                    ids);

                                                            } //else 
                                                            {
                                                                console.log(
                                                                    "not Not Cancle"
                                                                );
                                                            }
                                                        });
                                                    /////////////////end cancel order


                                                    ///Sell Order 
                                                    $(document).on("click",
                                                        ".ordersell",
                                                        function() {
                                                            // if (confirm("Are you sure you want to cencle this Order"))
                                                            {
                                                                // if(temp==0){
                                                                var ids = $(this)
                                                                    .attr(
                                                                        "id");
                                                                console.log(ids);
                                                                temp++;
                                                                var oldref =
                                                                    firebase
                                                                    .database().ref(
                                                                        "Pills/Orders/" +
                                                                        ids);
                                                                var newref =
                                                                    firebase
                                                                    .database().ref(
                                                                        "Pills")
                                                                    .child(
                                                                        "-MwWypM8lxNs85MqWsXB/SellOrder"
                                                                    );

                                                                console.log(
                                                                    "selllll");
                                                                moveFbRecord(oldref,
                                                                    newref,
                                                                    ids);
                                                                // }
                                                            } //else 
                                                            {
                                                                console.log(
                                                                    "not Not Cancle"
                                                                );
                                                            }
                                                        });


                                                    ///end sell order
                                                } else {
                                                    console.log("NO data found");
                                                }

                                            });
                                        });
                                    } else {
                                        console.log("NO data found");
                                    }

                                });

                            }
                        });
                        </script>
                        <script src="../assets/js/core/jquery.min.js"></script>
                        <script src="../assets/js/core/popper.min.js"></script>
                        <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
                        <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
                        <!-- Plugin for the momentJs  -->
                        <script src="../assets/js/plugins/moment.min.js"></script>
                        <!--  Plugin for Sweet Alert -->
                        <script src="../assets/js/plugins/sweetalert2.js"></script>
                        <!-- Forms Validations Plugin -->
                        <script src="../assets/js/plugins/jquery.validate.min.js"></script>
                        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
                        <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
                        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
                        <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
                        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
                        <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
                        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
                        <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
                        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
                        <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
                        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
                        <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
                        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
                        <script src="../assets/js/plugins/fullcalendar.min.js"></script>
                        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
                        <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
                        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
                        <script src="../assets/js/plugins/nouislider.min.js"></script>
                        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
                        <!-- Library for adding dinamically elements -->
                        <script src="../assets/js/plugins/arrive.min.js"></script>
                        <!--  Google Maps Plugin    -->
                        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
                        <!-- Chartist JS -->
                        <script src="../assets/js/plugins/chartist.min.js"></script>
                        <!--  Notifications Plugin    -->
                        <script src="../assets/js/plugins/bootstrap-notify.js"></script>
                        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
                        <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
                        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
                        <script src="../assets/demo/demo.js"></script>
                        <script>
                        $(document).ready(function() {
                            $().ready(function() {
                                $sidebar = $(".sidebar");

                                $sidebar_img_container = $sidebar.find(".sidebar-background");

                                $full_page = $(".full-page");

                                $sidebar_responsive = $("body > .navbar-collapse");

                                window_width = $(window).width();

                                fixed_plugin_open = $(
                                    ".sidebar .sidebar-wrapper .nav li.active a p"
                                ).html();

                                if (window_width > 767 && fixed_plugin_open == "Dashboard") {
                                    if ($(".fixed-plugin .dropdown").hasClass("show-dropdown")) {
                                        $(".fixed-plugin .dropdown").addClass("open");
                                    }
                                }

                                $(".fixed-plugin a").click(function(event) {
                                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                                    if ($(this).hasClass("switch-trigger")) {
                                        if (event.stopPropagation) {
                                            event.stopPropagation();
                                        } else if (window.event) {
                                            window.event.cancelBubble = true;
                                        }
                                    }
                                });

                                $(".fixed-plugin .active-color span").click(function() {
                                    $full_page_background = $(".full-page-background");

                                    $(this).siblings().removeClass("active");
                                    $(this).addClass("active");

                                    var new_color = $(this).data("color");

                                    if ($sidebar.length != 0) {
                                        $sidebar.attr("data-color", new_color);
                                    }

                                    if ($full_page.length != 0) {
                                        $full_page.attr("filter-color", new_color);
                                    }

                                    if ($sidebar_responsive.length != 0) {
                                        $sidebar_responsive.attr("data-color", new_color);
                                    }
                                });

                                $(".fixed-plugin .background-color .badge").click(function() {
                                    $(this).siblings().removeClass("active");
                                    $(this).addClass("active");

                                    var new_color = $(this).data("background-color");

                                    if ($sidebar.length != 0) {
                                        $sidebar.attr("data-background-color", new_color);
                                    }
                                });

                                $(".fixed-plugin .img-holder").click(function() {
                                    $full_page_background = $(".full-page-background");

                                    $(this).parent("li").siblings().removeClass("active");
                                    $(this).parent("li").addClass("active");

                                    var new_image = $(this).find("img").attr("src");

                                    if (
                                        $sidebar_img_container.length != 0 &&
                                        $(".switch-sidebar-image input:checked").length != 0
                                    ) {
                                        $sidebar_img_container.fadeOut("fast", function() {
                                            $sidebar_img_container.css(
                                                "background-image",
                                                'url("' + new_image + '")'
                                            );
                                            $sidebar_img_container.fadeIn("fast");
                                        });
                                    }

                                    if (
                                        $full_page_background.length != 0 &&
                                        $(".switch-sidebar-image input:checked").length != 0
                                    ) {
                                        var new_image_full_page = $(
                                                ".fixed-plugin li.active .img-holder")
                                            .find("img")
                                            .data("src");

                                        $full_page_background.fadeOut("fast", function() {
                                            $full_page_background.css(
                                                "background-image",
                                                'url("' + new_image_full_page + '")'
                                            );
                                            $full_page_background.fadeIn("fast");
                                        });
                                    }

                                    if ($(".switch-sidebar-image input:checked").length == 0) {
                                        var new_image = $(".fixed-plugin li.active .img-holder")
                                            .find("img")
                                            .attr("src");
                                        var new_image_full_page = $(
                                                ".fixed-plugin li.active .img-holder")
                                            .find("img")
                                            .data("src");

                                        $sidebar_img_container.css(
                                            "background-image",
                                            'url("' + new_image + '")'
                                        );
                                        $full_page_background.css(
                                            "background-image",
                                            'url("' + new_image_full_page + '")'
                                        );
                                    }

                                    if ($sidebar_responsive.length != 0) {
                                        $sidebar_responsive.css(
                                            "background-image",
                                            'url("' + new_image + '")'
                                        );
                                    }
                                });

                                $(".switch-sidebar-image input").change(function() {
                                    $full_page_background = $(".full-page-background");

                                    $input = $(this);

                                    if ($input.is(":checked")) {
                                        if ($sidebar_img_container.length != 0) {
                                            $sidebar_img_container.fadeIn("fast");
                                            $sidebar.attr("data-image", "#");
                                        }

                                        if ($full_page_background.length != 0) {
                                            $full_page_background.fadeIn("fast");
                                            $full_page.attr("data-image", "#");
                                        }

                                        background_image = true;
                                    } else {
                                        if ($sidebar_img_container.length != 0) {
                                            $sidebar.removeAttr("data-image");
                                            $sidebar_img_container.fadeOut("fast");
                                        }

                                        if ($full_page_background.length != 0) {
                                            $full_page.removeAttr("data-image", "#");
                                            $full_page_background.fadeOut("fast");
                                        }

                                        background_image = false;
                                    }
                                });

                                $(".switch-sidebar-mini input").change(function() {
                                    $body = $("body");

                                    $input = $(this);

                                    if (md.misc.sidebar_mini_active == true) {
                                        $("body").removeClass("sidebar-mini");
                                        md.misc.sidebar_mini_active = false;

                                        $(".sidebar .sidebar-wrapper, .main-panel")
                                            .perfectScrollbar();
                                    } else {
                                        $(".sidebar .sidebar-wrapper, .main-panel")
                                            .perfectScrollbar(
                                                "destroy"
                                            );

                                        setTimeout(function() {
                                            $("body").addClass("sidebar-mini");

                                            md.misc.sidebar_mini_active = true;
                                        }, 300);
                                    }

                                    // we simulate the window Resize so the charts will get updated in realtime.
                                    var simulateWindowResize = setInterval(function() {
                                        window.dispatchEvent(new Event("resize"));
                                    }, 180);

                                    // we stop the simulation of Window Resize after the animations are completed
                                    setTimeout(function() {
                                        clearInterval(simulateWindowResize);
                                    }, 1000);
                                });
                            });
                        });
                        </script>
                        <script>
                        $(document).ready(function() {
                            // Javascript method's body can be found in assets/js/demos.js
                            md.initDashboardPageCharts();
                        });
                        </script>
</body>

</html>