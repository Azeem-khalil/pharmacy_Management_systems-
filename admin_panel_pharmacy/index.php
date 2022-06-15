<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Numans');

    html,
    body {
        background-image: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bWVkaWNhbHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
    }

    .container {
        height: 100%;
        align-content: center;
    }

    .card {
        height: 370px;
        margin-top: auto;
        margin-bottom: auto;
        width: 400px;
        background-color: rgba(0, 0, 0, 0.5) !important;
    }

    .social_icon span {
        font-size: 60px;
        margin-left: 10px;
        color: #FFC312;
    }

    .social_icon span:hover {
        color: white;
        cursor: pointer;
    }

    .card-header h3 {
        color: white;
    }

    .social_icon {
        position: absolute;
        right: 20px;
        top: -45px;
    }

    .input-group-prepend span {
        width: 50px;
        background-color: #FFC312;
        color: black;
        border: 0 !important;
    }

    input:focus {
        outline: 0 0 0 0 !important;
        box-shadow: 0 0 0 0 !important;

    }

    .remember {
        color: white;
    }

    .remember input {
        width: 20px;
        height: 20px;
        margin-left: 15px;
        margin-right: 5px;
    }

    /* .login_btn{
                color: black;
                background-color: #FFC312;
                width: 100px;
                } */

    .login_btn:hover {
        color: black;
        background-color: white;
    }

    .links {
        color: white;
    }

    .links a {
        margin-left: 4px;
    }
    </style>
</head>

<body>


    <!----Success message--->



    <div class="container">

        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Admin Login</h3>

                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter the your Email" name="email">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="password" name="password">
                        </div>

                        <div class="form-group">
                            <input type="button" name="submit" id="submit" value="Login"
                                class="btn btn-warning btn-block">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
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
    </script>

    <script>
    $("#submit").click(function() {
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        let ref = firebase.database().ref('Pills/AdminDetails').orderByChild("email").equalTo(email).once(
            'value').then(function(snapshot) {
            if (snapshot.exists()) {
                snapshot.forEach(function(data) {
                    var type = data.val().type;
                    console.log(type);
                    var name = data.val().name;
                    if (type == "Admin") {
                        window.location.href = "./Pages/index.php"
                    } else if (EnteredEmail.exist()) {
                        window.alert("Please enter correct detail");
                        window.location.href = "./Pages/index.php"
                    }

                })
            } else {
                window.alert("Email does not exist in Admin details");
                window.location.href = "./Pages/index.php"
            }
        });


    });
    </script>
    ------->




</body>

</html>