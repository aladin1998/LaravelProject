<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bonjour {{$user->name}}</h1>
    <p>
    Bonjour,
 Cet email vous a été envoyé automatiquement suite à votre  demande de réinitialisation de mot de passe de l'application e-cours.
    Votre code de verification est <strong>{{$code}}</strong><br>
    Si vous croyez que vous avez reçu cet email par erreur, il  suffit de l'ignorer. <br>
Cordialement<br>
 E-COURS
    </p>
</body>
</html>