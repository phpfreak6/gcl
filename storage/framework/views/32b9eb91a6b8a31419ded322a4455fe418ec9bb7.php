<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pickup Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        table td:first-child {
            font-weight: bold;
            color: #333;
            width: 40%;
        }
    </style>
</head>
<body>
    <h1>Pickup Request</h1>

    <table>
        <tr>
            <td>Date:</td>
            <td><?php echo e($pickup->date); ?></td>
        </tr>
        <tr>
            <td>Customer:</td>
            <td><?php echo e($pickup->customer->full_name); ?></td>
        </tr>
        <tr>
            <td>Earliest Time:</td>
            <td><?php echo e($pickup->earliest_time); ?></td>
        </tr>
        <tr>
            <td>Latest Time:</td>
            <td><?php echo e($pickup->latest_time); ?></td>
        </tr>
        <tr>
            <td>Instructions:</td>
            <td><?php echo e($pickup->instructions); ?></td>
        </tr>
        <tr>
            <td>No. of Packages:</td>
            <td><?php echo e($pickup->no_packages); ?></td>
        </tr>
        <tr>
            <td>Weight:</td>
            <td><?php echo e($pickup->weight); ?></td>
        </tr>
        <tr>
            <td>Length:</td>
            <td><?php echo e($pickup->length); ?></td>
        </tr>
        <tr>
            <td>Width:</td>
            <td><?php echo e($pickup->width); ?></td>
        </tr>
        <tr>
            <td>Height:</td>
            <td><?php echo e($pickup->height); ?></td>
        </tr>
    </table>
</body>
</html>

<?php /**PATH D:\Admin Panels\gcl\resources\views/emails/pickup.blade.php ENDPATH**/ ?>