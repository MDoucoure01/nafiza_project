<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F0F0F0; /* Fond gris pour tout le mail */
            font-size: 16px;
        }
        .email-body {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            padding-bottom: 150px; /* Espacement entre le contenu et le pied de page */
        }
        .email-header {
            background-color: #F9B71A; /* Nouveau jaune */
            height: 250px;
            width: 100%;
        }
        .email-content {
            background-color: white;
            padding: 50px; /* Augmenté de 20px à 30px */
            margin: -80px auto 0; /* Suppression de la marge inférieure */
            width: 80%;
            border-radius: 8px;
            /* Shadow supprimé */
        }
        .email-footer {
            background-color: #F9B71A; /* Nouveau jaune */
            color: white;
            text-align: center;
            font-size: 8px; /* Réduit de 12px à 10px */
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 120px;
        }
        .email-text {
            color: black;
            font-size: 16px;
        }
        h4 {
            color: #F9B71A;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-body">
        <div class="email-header">
            <!-- Header jaune -->
        </div>
        <div class="email-content">
            <img src="{{ asset('images/Frame 642.png') }}" alt="Logo" class="logo">
            <div class="email-text">
                <h4>{{ $title }}</h4>
                <p>{{ $content }}</p>
                <a href="{{ $actionUrl }}" class="email-button">{{ $actionText }}</a>

                <!-- Autres éléments de contenu -->
            </div>
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Naafiza. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>