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
            background-color: #F9B71A;
            height: 200px;
            width: 100%;
        }
        .email-content {
            background-color: white;
            padding: 30px;
            margin: -80px auto 30px;
            width: 80%;
            border-radius: 8px;
        }
        .email-footer {
            background-color: #F9B71A;
            color: black;
            padding: 3px;
            text-align: center;
            font-size: 10px;
            width: 100%;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 120px;
        }
        .email-text {
            color: black;
            text-align: center; /* Centrer tout le texte */
        }
        h4 {
            color: #F9B71A;
            text-align: center;
        }
        .email-button {
            background-color: #007AFF;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
        .button-container {
            text-align: center; /* Centrer le contenu */
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
                <div class="button-container">
                    <a href="{{ $actionUrl }}" class="email-button">{{ $actionText }}</a>
                </div>
            </div>
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Naafiza. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>