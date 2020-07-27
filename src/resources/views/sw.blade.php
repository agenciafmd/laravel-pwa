@if(config('app.env') === 'production')
    console.log = function() {};
@endif

//This is the service worker with the combined offline experience (Offline page + Offline copy of pages)
var CACHE_NAME = '{{ $name }}-{{ date("YmdHis", filemtime(public_path('mix-manifest.json'))) }}';
var urlsToCache = [
    '{!! implode("', '", $files) !!}'
];

{!! $sw !!}