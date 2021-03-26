@if(config('app.env') === 'production')
    console.log = function() {};
@endif

{{--//This is the service worker with the combined offline experience (Offline page + Offline copy of pages)--}}

let CACHE_NAME = '{{ $name }}';

let CACHE_FILES = [
    '{!! implode("', '", $cacheFiles) !!}',
    '{{ $offlineUrl }}',
];

const START_URL = '{{ $startUrl }}'
const OFFLINE_URL = '{{ $offlineUrl }}';
const NOT_FOUND_URL = '{{ $notFoundUrl }}';

{!! $sw !!}