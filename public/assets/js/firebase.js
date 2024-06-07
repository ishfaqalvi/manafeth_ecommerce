const firebaseConfig = {
    apiKey: "AIzaSyC-Te1QdXMPBYG9cqY5wiUmW5IfBhl7NEQ",
    authDomain: "e-manafeth-9bd48.firebaseapp.com",
    projectId: "e-manafeth-9bd48",
    storageBucket: "e-manafeth-9bd48.appspot.com",
    messagingSenderId: "928927421004",
    appId: "1:928927421004:web:ef6785ea67e493f6e35ae9",
    measurementId: "G-9X7GD0JDMC"
};
firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();
const existingToken = localStorage.getItem('fcmToken');
if (!existingToken) {
    initFirebaseMessagingRegistration();
}
messaging.onMessage(function(payload) {
    const noteTitle = payload.notification.title;
    const noteOptions = {
        body: payload.notification.body,
        icon: payload.notification.icon,
    };
    new Notification(noteTitle, noteOptions);
});
function initFirebaseMessagingRegistration() {
    messaging
    .requestPermission()
    .then(function () {
        return messaging.getToken()
    })
    .then(function(token) {
        console.log(token);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin/users/save-token',
            type: 'POST',
            data: {
                token: token
            },
            dataType: 'JSON',
            success: function (response) {
                localStorage.setItem('fcmToken', token);
                console.log('Token saved successfully.');
            },
            error: function (err) {
                console.log('User Chat Token Error'+ err);
            },
        });
    }).catch(function (err) {
        console.log('User Chat Token Getting Error'+ err);
    });
}
