//Install stage sets up the offline page in the cache and opens a new cache
self.addEventListener('install', function (event) {
    event.waitUntil(preLoad());
});

var preLoad = function () {
    return caches.open(CACHE_NAME).then(function (cache) {
        return cache.addAll(CACHE_FILES);
    });
}

self.addEventListener('fetch', function (event) {
    let clone = event.request.clone();
    if (clone.method !== 'GET') {
        return false;
    }

    event.respondWith(checkResponse(clone).catch(function () {
            return returnFromCache(event.request)
        }
    ));

    event.waitUntil(addToCache(event.request));
});

let checkResponse = function (request) {
    return new Promise(function (fulfill, reject) {
        fetch(request).then(function (response) {
            if (response.status !== 404) {
                fulfill(response);
            } else {
                reject();
            }
        }).catch(function (response) {
            if (!request.url.endsWith(START_URL)) {
                reject();
            }

            console.log(response);
        });
    });
};

let addToCache = function (request) {
    return caches.open(CACHE_NAME).then(function (cache) {
        return fetch(request).then(function (response) {
            return cache.put(request, response);
        }).catch(function (response) {
            console.log(response);
        });
    });
};

let returnFromCache = function (request) {
    return caches.open(CACHE_NAME).then(function (cache) {
        return cache.match(request).then(function (matching) {
            if (!matching && navigator.onLine) {
                return false;
            }

            if (!matching) {
                return cache.match(OFFLINE_URL);
            }

            return matching;
        });
    });
};

self.addEventListener('activate', function (event) {
    event.waitUntil(function () {
        caches.keys().then(function (cacheNames) {
            return Promise.all(
                cacheNames.map(function (cacheName) {
                    if (cacheName !== CACHE_NAME) {
                        return caches.delete(cacheName);
                    }
                })
            );
        });
    });
});