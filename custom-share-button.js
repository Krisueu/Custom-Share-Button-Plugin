(function() {
    // Überprüfen, ob das Element mit der Klasse 'custom-share-button' existiert
    var custom_share_button = document.querySelector('.custom-share-button');

    // Wenn das Element nicht existiert, beende die Ausführung
    if (!custom_share_button) {
        return false;
    }

    // Funktion zum Teilen des Beitrags
    custom_share_button.onclick = function share() {
        // Überprüfen, ob der Browser die native Teilen-Funktion unterstützt
        if (navigator.share) {
            // Wenn der Browser die native Teilen-Funktion unterstützt, teile den Beitrag
            navigator.share({
                title: document.querySelector('title').textContent,
                url: document.querySelector('link[rel="canonical"]').getAttribute('href')
            });
        } else {
            // Wenn der Browser die native Teilen-Funktion nicht unterstützt, zeige alternative Optionen an
            var citation_options = document.getElementById('share-options');
            if (citation_options.style.display === 'none') {
                citation_options.style.display = 'block';
            } else {
                citation_options.style.display = 'none';
            }
        }
        // Verhindere das Standardverhalten des Links
        return false;
    };
})();
