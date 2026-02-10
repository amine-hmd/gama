<?php
if (isset($_POST['photo'])) {
    $data = $_POST['photo'];

    // Supprimer "data:image/png;base64," pour ne garder que les données
    list($type, $data) = explode(';', $data);
    list(, $data) = explode(',', $data);

    $data = base64_decode($data);

    $filename = 'photos/photo_' . time() . '.png';

    // Créer le dossier photos si n'existe pas
    if (!is_dir('photos')) {
        mkdir('photos', 0777, true);
    }

    if (file_put_contents($filename, $data)) {
        echo "Photo envoyée avec succès !";
    } else {
        echo "Erreur lors de l'enregistrement de la photo.";
    }
} else {
    echo "Aucune photo reçue.";
}
?>
