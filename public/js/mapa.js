((g) => {
    var h,
        a,
        k,
        p = "The Google Maps JavaScript API",
        c = "google",
        l = "importLibrary",
        q = "__ib__",
        m = document,
        b = window;
    b = b[c] || (b[c] = {});
    var d = b.maps || (b.maps = {}),
        r = new Set(),
        e = new URLSearchParams(),
        u = () =>
            h ||
            (h = new Promise(async (f, n) => {
                await (a = m.createElement("script"));
                e.set("libraries", [...r] + "");
                for (k in g)
                    e.set(
                        k.replace(/[A-Z]/g, (t) => "_" + t[0].toLowerCase()),
                        g[k]
                    );
                e.set("callback", c + ".maps." + q);
                a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                d[q] = f;
                a.onerror = () => (h = n(Error(p + " could not load.")));
                a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                m.head.append(a);
            }));
    d[l]
        ? console.warn(p + " only loads once. Ignoring:", g)
        : (d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)));
})({ key: "AIzaSyBjjbhqsrHWXH_u-3hJmG8v6cs0vd7zsO8", v: "weekly" });

// Instanciar o mapa e exibir em tela
let map;
let currentMarker = null; // Variável para armazenar o marcador atual

async function initMap() {
    let lat = -34.397;
    let lng = 150.644;

    const options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0,
    };

    async function success(pos) {
        const crd = pos.coords;

        lat = crd.latitude;
        lng = crd.longitude;

        const { Map } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary(
            "marker"
        );
        const position = { lat, lng };

        map = new Map(document.getElementById("map"), {
            center: position,
            zoom: 17,
            mapId: "google_map_web_2024_a",
            mapTypeControlOptions: {
                position: google.maps.ControlPosition.TOP_RIGHT,
            },
            fullscreenControl: false,
        });

        const markerOptions = {
            map: map,
            position: position,
            title: "Current location",
        };

        // Adiciona o marcador inicial
        currentMarker = new AdvancedMarkerElement(markerOptions);

        map.addListener("click", (mapsMouseEvent) => {
            const clickPosition = mapsMouseEvent.latLng;

            // Remove o marcador atual, se existir
            if (currentMarker) {
                currentMarker.setMap(null); // Remove o marcador do mapa
            }

            // Adiciona o novo marcador
            currentMarker = new AdvancedMarkerElement({
                ...markerOptions,
                position: clickPosition,
            });
        });
    }

    function error(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
    }

    navigator.geolocation.getCurrentPosition(success, error, options);
}

initMap();
// Final mapa
