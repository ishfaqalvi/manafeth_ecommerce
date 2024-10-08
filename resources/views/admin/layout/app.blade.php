<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>@include('admin.layout.head')</head>
    <body>
        <div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10 py-0">
            @include('admin.layout.navigation')
        </div>
        <div class="page-content">
            <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">
                <div class="sidebar-content">
                    <div class="sidebar-section">
                        <div class="sidebar-section-body d-flex justify-content-center">
                            <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigation</h5>
                            <div>
                                <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                                    <i class="ph-arrows-left-right"></i>
                                </button>
                                <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                                    <i class="ph-x"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-section">
                        <ul class="nav nav-sidebar" data-nav-type="accordion">
                            @include('admin.layout.sidebar')
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content-wrapper">
                <div class="content-inner">
                    <div class="page-header page-header-light shadow">
                        @yield('header')
                    </div>
                    <div class="content">
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                    <div class="navbar navbar-sm navbar-footer border-top">
                        @include('admin.layout.footer')
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="notifications">
            @include('admin.layout.notification')
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="demo_config">
            @include('admin.layout.configuration')
        </div>
        {{-- <script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
        <script>
            window.OneSignalDeferred = window.OneSignalDeferred || [];
            OneSignalDeferred.push(async function(OneSignal) {
                await OneSignal.init({
                    appId: "56de06b7-4138-4bff-801c-47ba922f4d92",
                });
                var userId = OneSignal.User.PushSubscription.id;
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
                        console.log('User Player ID Error: ' + err);
                    },
                });
            });
        </script> --}}
    </body>
</html>
