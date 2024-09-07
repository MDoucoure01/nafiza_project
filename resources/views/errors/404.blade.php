<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Erreur 404 - Session expirée</title>
    <!-- Ajoutez le lien vers Bootstrap CSS ici -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h1 class="display-4">Erreur 404</h1>
            <p class="lead">Page introuvable</p>
            <p>La page que vous demandez est introuvable. Veuillez retourner sur la page d'accueil pour continuer.</p>
            <a href="{{ route('home') }}" class="btn btn-warning">Page d'accueil</a>
        </div>
    </div>
</div>

<!-- Ajoutez le script Bootstrap JavaScript (et jQuery, si nécessaire) ici -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
