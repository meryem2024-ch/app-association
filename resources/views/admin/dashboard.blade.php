<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styling */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #fdf5e6, #d4b89b); /* Beige gradient */
            color: #5c4631;
        }

        .container {
            max-width: 800px;
            margin: 80px auto;
            background: #fff7f0;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px 40px;
            text-align: center;
        }

        h1 {
            color: #5c4631;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1em;
            color: #5c4631;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background: #8c7156;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            text-decoration: none;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }

        .btn-primary {
            background: #8c7156;
        }

        .btn-primary:hover {
            background: #705a47;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-danger {
            background: #d9534f;
        }

        .btn-danger:hover {
            background: #c12e2a;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .text-end {
            text-align: end;
        }

        .text-center p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Tableau de Bord Administrateur</h1>
    <div class="text-end mb-3">
        <a href="{{ route('admin.logout') }}" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
    </div>
    <div class="text-center">
        <p>Bienvenue, administrateur.</p>
        <a href="{{ route('admin.associations.pending') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Voir les villes avec associations en attente</a>
    </div>
</div>
</body>
</html>
