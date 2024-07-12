var OneSignal = window.OneSignal || [];
OneSignal.push(function() {
    OneSignal.init({
        appId: "806c20e1-fd8f-4fff-81c0-3b253754ba4c",
        safari_web_id: "web.onesignal.auto.5dcf04a7-d9b5-4793-8717-b5ec1870e3bb",
        notifyButton: {
            enable: true,
        },
        subdomainName: "appemanafeth",
        serviceWorkerParam: { scope: '/' },
        serviceWorkerPath: 'OneSignalSDKWorker.js',
        serviceWorkerUpdaterPath: 'OneSignalSDKUpdaterWorker.js',
    });
    OneSignal.on('subscriptionChange', function (isSubscribed) {
        if (isSubscribed) {
            OneSignal.getUserId(function (userId) {
                console.log(userId);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/admin/users/save-player-id',
                    type: 'POST',
                    data: {
                        player_id: userId
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        localStorage.setItem('playerId', userId);
                        console.log('Player ID saved successfully.');
                    },
                    error: function (err) {
                        console.log('User Player ID Error'+ err);
                    },
                });
            });
        }
    });
});
