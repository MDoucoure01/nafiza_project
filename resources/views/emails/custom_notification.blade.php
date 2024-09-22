<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }
        .email-body {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }
        .email-header {
            background-color: #F9B71A; /* Nouveau jaune */
            height: 200px;
            width: 100%;
        }
        .email-content {
            background-color: white;
            padding: 50px; /* Augmenté de 20px à 30px */
            margin: -80px auto 30px;
            width: 80%;
            border-radius: 8px;
            /* Shadow supprimé */
        }
        .email-footer {
            background-color: #F9B71A; /* Nouveau jaune */
            color: black;
            padding: 1px; /* Réduit de 5px à 3px */
            text-align: center;
            font-size: 10px; /* Réduit de 12px à 10px */
            width: 100%;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 120px;
        }
        .email-text {
            color: black;
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