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
                OneSignal.getTags(function(tags) {
                    console.log(tags);
                });
                navigator.serviceWorker.ready.then(function(registration) {
                    registration.pushManager.getSubscription().then(function(subscription) {
                        if (subscription) {
                            const subscriptionDetails = subscription.toJSON();
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: '/admin/users/save-player-id',
                                type: 'POST',
                                data: {
                                    player_id: userId,
                                    subscription: JSON.stringify(subscriptionDetails)
                                },
                                dataType: 'JSON',
                                success: function (response) {
                                    localStorage.setItem('playerId', userId);
                                    console.log('Player ID and subscription details saved successfully.');
                                },
                                error: function (err) {
                                    console.log('User Player ID Error: ' + err);
                                },
                            });
                        } else {
                            console.log('No subscription found.');
                        }
                    }).catch(function(err) {
                        console.log('Error getting subscription: ', err);
                    });
                });
            });
        } else {
            console.log('User has unsubscribed from notifications.');
        }
    });
});

function showOneSignalPrompt() {
    console.log('btn works');
    OneSignal.push(function() {
        OneSignal.showSlidedownPrompt();
    });
}
