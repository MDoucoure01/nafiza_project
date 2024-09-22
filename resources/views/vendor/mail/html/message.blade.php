<!-- 
<!DOCTYPE html>
<html>
<head>
    <style>
        .email-body {
            font-family: Arial, sans-serif;
            background-color: #f5f8fa;
            padding: 20px;
        }
        .email-header, .email-footer {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .email-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }
        .email-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="email-body">
        <div class="email-header">
            <h1>Inscription à Naafiza</h1>
        </div>

        <div class="email-content">
            @yield('content')
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Naafiza. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
    <style>
        .email-body {
            font-family: Arial, sans-serif;
            background-color: #f5f8fa;
            padding: 20px;
        }
        .email-header, .email-footer {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .email-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }
        .email-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="email-body">
        <div class="email-header">
            <h1>{{ $title }}</h1>
        </div>

        <div class="email-content">
            <p>{{ $content }}</p> <!-- Contenu dynamique -->
            <a href="{{ $actionUrl }}" class="email-button">{{ $actionText }}</a> <!-- Bouton dynamique -->
        </div>
        
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Naafiza. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
