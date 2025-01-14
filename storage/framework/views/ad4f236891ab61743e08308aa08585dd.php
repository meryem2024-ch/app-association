<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Associations non confirmées</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fdf5e6, #d4b89b);
            color: #5c4631;
        }

        .container {
            margin-top: 50px;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #5c4631;
            margin-bottom: 30px;
        }

        .btn-custom {
            background-color: #8c7156;
            color: white;
            border-radius: 8px;
        }

        .btn-custom:hover {
            background-color: #5c4631;
        }

        .badge-warning {
            background-color: #f0ad4e;
        }

        .badge-success {
            background-color: #5bc0de;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Associations Non Confirmées pour la Ville de <?php echo e($ville->nom); ?></h1>

        <?php if($associationsEnAttente->isEmpty()): ?>
            <p>Aucune association en attente de confirmation.</p>
        <?php else: ?>
            <div class="row">
                <?php $__currentLoopData = $associationsEnAttente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $association): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($association->nom); ?></h5>
                                <p class="card-text"><?php echo e($association->description); ?></p>
                                <p><strong>Contact:</strong> <?php echo e($association->contact); ?></p>
                                <p><strong>Status:</strong> 
                                    <span class="badge badge-warning">En attente</span>
                                </p>
                                <a href="<?php echo e(route('association.confirm', $association->id)); ?>" class="btn btn-custom">
                                    Confirmer l'association
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="<?php echo e(route('admin.logout')); ?>" class="btn btn-danger">Déconnexion</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\App\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>