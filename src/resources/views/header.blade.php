<!-- PWA -->
<link rel="manifest" href="{{ route('pwa.manifest') }}">
<meta name="theme-color" content="{{ config('pwa.manifest.theme_color') }}">

<!-- MS -->
<meta name="msapplication-TileColor" content="{{ config('pwa.manifest.theme_color') }}">
<meta name="msapplication-TileImage" content="{{ asset('/images/pwa/apple-touch-icon.png') }}">

<!-- IOS -->
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="{{ config('pwa.manifest.name') }}">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<link rel="apple-touch-icon" sizes="192x192" href="{{ asset('/images/pwa/apple-touch-icon.png') }}">
<link rel="mask-icon" href="{{ asset('/images/pwa/safari-pinned-tab.svg') }}" color="#FFFFFF">

<!-- TODO: splash screen to IOS -->

<style>
    .pwa-a2hs-install {
        background: {{ config('pwa.a2hs.background') }};
    }

    .pwa-a2hs-title, .pwa-a2hs-description {
        color: {{ config('pwa.a2hs.color') }};
    }

    .pwa-a2hs-button {
        background: {{ config('pwa.a2hs.color') }};
    }
</style>

<link rel="stylesheet" href="{{ asset('/css/pwa-a2hs.css') }}">

<script>
    function setupServiceWorker() {
        if (!('serviceWorker' in navigator)) {
            return;
        }

        window.addEventListener('load', function () {
            if (navigator.onLine) {
                return;
            }

            $('<style type=\'text/css\'>' +
                ' .is-online { display: none } ' +
                ' .is-offline { display: block } ' +
                '</style>')
                .appendTo('head');
        });

        if (navigator.serviceWorker.controller) {
            console.log('[PWA Builder] active service worker found, no need to register');

            return;
        }

        navigator.serviceWorker
            .register('{{ route('pwa.sw') }}')
            .then(function (reg) {
                console.log('Service worker has been registered for scope: ' + reg.scope);
            })
            .catch(function (err) {
                console.log('ServiceWorker registration failed: ', err);
            });
    }

    function setupA2hs() {

        window.addEventListener('load', function () {
            document.body.insertAdjacentHTML('beforeend', `@include('agenciafmd/pwa::banner')`);
        });


        let deferredPrompt;

        window.addEventListener('beforeinstallprompt', event => {

            // Prevent Chrome 67 and earlier from automatically showing the prompt
            event.preventDefault();

            // Stash the event so it can be triggered later.
            deferredPrompt = event;

            // Attach the install prompt to a user gesture
            document.querySelector('.pwa-a2hs-button').addEventListener('click', event => {

                // Show the prompt
                deferredPrompt.prompt();

                // Wait for the user to respond to the prompt
                deferredPrompt.userChoice
                    .then((choiceResult) => {
                        if (choiceResult.outcome === 'accepted') {
                            console.log('User accepted the A2HS prompt');
                        } else {
                            // close
                            console.log('User dismissed the A2HS prompt');
                        }
                        deferredPrompt = null;
                    });
            });

            // Update UI notify the user they can add to home screen
            let banner = document.querySelector('.pwa-a2hs-install')
            banner.style.display = 'flex';
            banner.style.bottom = '0';

            document.querySelector('.pwa-a2hs-close').addEventListener('click', event => {
                // TODO: implementar lifetime de cache para que o banner não apareça toda hora para fecharmos
                banner.style.display = 'none';
            });
        });
    }

    setupServiceWorker();
    setupA2hs();
</script>
