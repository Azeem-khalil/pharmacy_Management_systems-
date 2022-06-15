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

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">



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

<body class="" onload="All_DATA_Fetch()">
    <div class="">
        <?php include "sidebar.php" ?>

        <div class="main-panel">

            <?php include "navbar.php" ?>


            <div class="">
                <!-- Navbar -->

                <section class=" h-custom" style="background-color: #eee;">

                    <div class="container py-5">

                        <div class="row d-flex justify-content-center align-items-center ">
                            <div class="col">
                                <div class="card">
                                    <h3 style="text-align: center; color:Blacck"><b>REPORT</b></h3>

                                    <div class="card-body ">

                                        <div class="">

                                            <div id="Products">


                                                <table class="table table-striped" id="paginationSimpleNumbers">
                                                    <thead class="table-dark ">

                                                        <tr>
                                                            <th scope="col" class="th-sm">ID</th>
                                                            <th scope="col" class="th-sm">Name</th>
                                                            <th scope="col" class="th-sm">PhoneNumber</th>
                                                            <th scope="col" class="th-sm">DateTime</th>
                                                            <th scope="col" class="th-sm">SubTotal</th>
                                                            <th scope="col" class="th-sm">Total</th>

                                                        </tr>

                                                    </thead>
                                                    <tbody id="ex-table">




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




            </div>
        </div>

        <!--   Core JS Files   -->


        <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-database.js"></script>
        <script type="module">
        var content = "";
        var TotalEarn_for_Daily_report = 0;
        var index = 0;
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
                {

                    ///get id 
                    var baseUrl = (window.location).href; // You can also use document.URL
                    var picId = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
                    //alert(picId)


                    const users = firebase.auth().currentUser;
                    var name = user.name;
                    var email = user.email;
                    console.log(user.email);
                    console.log(name);
                    var pharmacyID = user.uid;

                    console.log(pharmacyID);

                    var C_date = new Date();

                    let CURENTdate = date_formateChange(C_date);



                    //getting the name of the login pharmacy and showing in the html elements  
                    firebase.database().ref('Pills/pharmcies').orderByChild("email").equalTo(email).once(
                            'value')
                        .then(function(snapshot) {
                            if (snapshot.exists()) {
                                snapshot.forEach(function(data) {
                                    var type = data.val().type;
                                    var name = data.val().name;
                                    //console.log(CURENTdate);
                                    document.getElementById("name").innerText = "" + name;

                                })
                            } else {
                                window.alert("Email does not exist in pharmacy details");
                            }
                        })



                    //showing the alert message about the new order recieved in the specific pharmacy
                    let ref = firebase.database().ref('Pills/pharmcies').orderByChild("email").equalTo(email)
                        .on(
                            "child_changed", (snapshot) => {
                                window.alert("New order has arrived");
                            });


                    //var database = firebase.database().ref().child("Pills/Orders");
                    // var database = firebase.database().ref("Pills").child("-MwWypM8lxNs85MqWsXB/SellOrder").orderByChild("pharmacyEmail").equalTo(email);;;
                    var database_ref = firebase.database().ref("Pills").child("-MwWypM8lxNs85MqWsXB/SellOrder");

                    var color = picId;

                    switch (color) {
                        case "d":
                            //alert("d");
                            fetc_ALL_data(database_ref, CURENTdate, email);
                            break;
                        case "w":
                            //alert("w");
                            let week_days = Last7Days();
                            //alert(week_days);
                            for (var i = 0; i < 7; i++) {
                                //alert(week_days[i]);
                                fetc_ALL_data(database_ref, week_days[i], email);

                            }
                            if (i == 7) {
                                // alert(i);

                                content += "";
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


                    // $(document).on("click", ".update", function () {
                    //   var ids = $(this).attr("id");
                    //   console.log(ids);

                    //   window.location.href = "./UpdateOrders.html?userid=" + ids;
                    // });
                }
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
            //console.log(Last7Days());

            function fetc_ALL_data(database, CURENTdate, email) {
                database.once("value", function(snapshot) {


                    if (snapshot.exists()) {
                        //consol.log(snapshot.key);

                        var count = 0;

                        //console.log("count "+count);
                        //console.log("snapshot"+snapshot.key);
                        snapshot.forEach(childsnapshot => {
                            //console.log("childsnapshot"+childsnapshot.key);

                            childsnapshot.forEach(pdata => {
                                //console.log("pdata"+pdata.key);
                                pdata.forEach(data => {
                                    if (data.val().pharmacyEmail == email &&
                                        data.val().currentDate == CURENTdate
                                    ) {
                                        //console.log("data"+data.key);
                                        //console.log(currentDate);
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
                                        TotalEarn_for_Daily_report +=
                                            parseFloat(data.val().total);

                                        //TotalEarn_for_Daily_report+= data.val().total;


                                        console.log(
                                            "TotalEarn_for_Daily_report " +
                                            data.val().total);
                                        if (index % 2 == 0) {
                                            console.log("wd wedfwe we wer");
                                            content += "<tr  >";
                                        } else {
                                            content += "<tr>";
                                        }

                                        content += "<tr>";
                                        content += "<th scope='row'>" + ++
                                        index + "</th>";
                                        content += "<td>" + userName +
                                            "</td>"; //column1
                                        content += "<td>" +
                                            userPhoneNumber +
                                            "</td>";
                                        content += "<td>" + currentDate +
                                            "<br>" + currentTime + "</td>";
                                        content += "<td>" + subTotal +
                                            "</td>";

                                        content += "<td>" + total + "</td>";


                                        content += "</tr>";

                                        // console.log(content);
                                        //content = "";
                                        // content += "<td>" + userName + "</td>";
                                        // content += "<td>" + userEmail + "</td>";
                                        // content += "<td>" + userAddress + "</td>";
                                        //   // onclick=\"location.href='./detail.html'\" 
                                        //content += "<td>    <button type='button'     name='Orderdetail'    data-toggle='modal' data-target='#exampleModal'   class='orderdetail btn btn-primary'   id='" + userid +"' ><i class=''aria-hidden='true'></i>Order Detail</button></td>";











                                    }

                                });
                            });
                        });
                        // content += "<tr  class='table-dark' style='color: brown;'><th colspan='5'  >TOTAL PAYMENT</th><th>"+TotalEarn_for_Daily_report+"</th></tr>";

                        //console.log("TotalEarn_for_Daily_report "+TotalEarn_for_Daily_report);

                        // $(document).on("click", ".orderdetail", function () {

                        //   var ids = $(this).attr("id");

                        //   window.location.href = "./sell_order_detail.html?orderid=" + ids;
                        //   //window.location.href = "./detail.php?orderid=" + "03230115793";

                        // });//end order detail



                        $("#ex-table").append(content);

                        content = "";
                        document.getElementById('total_earn').innerText = TotalEarn_for_Daily_report;

                        //delete
                        // $(document).on("click", ".deleteOrder", function () {
                        //   if (
                        //     confirm(
                        //       "Are you sure you want to Delete this Record from the Database"
                        //     )
                        //   ) {
                        //     var ids = $(this).attr("id");
                        //     console.log(ids);

                        //     firebase
                        //       .database()
                        //       .ref("Pills/-MwWypM8lxNs85MqWsXB/SellOrder/" + ids)
                        //       .remove();
                        //     window.location.href = "./Sell.html";
                        //   } else {
                        //     console.log("not deleted");
                        //   }
                        // });
                    }
                });
            }

        });



        // $(document).ready(function() {

        //     //   //Pagination numbers
        //     $('#paginationSimpleNumbers').DataTable({
        //         "pagingType": "simple_numbers"
        //     });
        //     // setTimeout(function(){
        //     //                          //Pagination numbers
        //     //                          alert("aa");
        //     //                          $('#paginationSimpleNumbers').DataTable({
        //     //                                 "pagingType": "simple_numbers"
        //     //                            });
        //     //                         }, 3000);
        // });
        </script>

        <!-- plugin of pagination -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
        </script>

        <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>







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
                        var new_image_full_page = $(".fixed-plugin li.active .img-holder")
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
                        var new_image_full_page = $(".fixed-plugin li.active .img-holder")
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

                        $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar();
                    } else {
                        $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar(
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