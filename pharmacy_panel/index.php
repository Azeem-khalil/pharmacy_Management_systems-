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


// Initialize Firebase                    

firebase.initializeApp(firebaseConfig);


firebase.auth().onAuthStateChanged(function(user) {

    if (user) {

        window.location.href = "./Pages/orders.php";

    } else {
        window.location.href = "./Pages/login.php";
    }

});
</script>