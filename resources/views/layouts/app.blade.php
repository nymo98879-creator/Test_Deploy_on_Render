<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modern CRUD Image</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4F46E5;
            --primary-hover: #4338CA;
            --danger: #EF4444;
            --danger-hover: #DC2626;
            --bg-color: #F3F4F6;
            --card-bg: #FFFFFF;
            --text-main: #111827;
            --text-muted: #6B7280;
            --border: #E5E7EB;
            --radius-md: 8px;
            --radius-lg: 12px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            line-height: 1.5;
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-main);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: var(--radius-md);
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
        }

        .btn-danger {
            background-color: var(--danger);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .btn-danger:hover {
            background-color: var(--danger-hover);
            transform: translateY(-1px);
        }

        .btn-outline {
            background-color: white;
            color: var(--text-main);
            border: 1px solid var(--border);
        }

        .btn-outline:hover {
            background-color: var(--bg-color);
        }

        .card {
            background-color: var(--card-bg);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            padding: 2rem;
        }

        .alert {
            padding: 1rem;
            border-radius: var(--radius-md);
            margin-bottom: 1.5rem;
            font-weight: 500;
        }
        
        .alert-success {
            background-color: #D1FAE5;
            color: #065F46;
            border: 1px solid #A7F3D0;
        }

        .alert-error {
            background-color: #FEE2E2;
            color: #991B1B;
            border: 1px solid #FECACA;
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background-color: #F9FAFB;
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 1rem;
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #F9FAFB;
        }

        .img-thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-main);
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 1rem;
            font-family: inherit;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
        
        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
