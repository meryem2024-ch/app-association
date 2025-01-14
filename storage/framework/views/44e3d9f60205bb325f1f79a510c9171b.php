<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villes avec Associations en Attente</title>
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
            padding: 20px 40px;
            max-width: 1200px;
            margin: auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #5c4631;
        }

        .city-card {
            background: #fff7f0;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .city-card h3 {
            margin-top: 0;
            color: #5c4631;
        }

        .association-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .association-item {
            background-color: #f8f1e8;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .association-item strong {
            color: #5c4631;
        }

        .btn-confirm {
            background-color: #82e0aa;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 10px;
        }

        .btn-confirm:hover {
            background-color: #66c28b;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-confirm i {
            margin-right: 5px;
        }

        .no-data {
            text-align: center;
            margin-top: 40px;
            font-size: 1.2em;
            color: #8c7156;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Villes avec Associations en Attente</h1>

        
        <?php $__currentLoopData = $villes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ville): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="city-card">
                <h3><?php echo e($ville->nom); ?></h3>

                <ul class="association-list">
                    
                    <?php $__currentLoopData = $ville->associations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $association): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($association->status == 'en attente'): ?>
                            <li class="association-item">
                                <strong><?php echo e($association->nom); ?></strong><br>
                                <em><?php echo e($association->description); ?></em><br>
                                <span>Contact: <?php echo e($association->contact); ?></span><br>

                                
                                <form action="<?php echo e(route('admin.association.confirm', $association->id)); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn-confirm">
                                        <i class="fas fa-check"></i> Confirmer
                                    </button>
                                </form>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($villes->isEmpty()): ?>
            <p class="no-data">Aucune ville avec des associations en attente.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\App\resources\views/admin/villes_associations.blade.php ENDPATH**/ ?>