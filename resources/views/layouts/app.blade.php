<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion des parcelles')</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            background-color: #f4f6f2;
            color: #2b2b2b;
            margin: 0;
        }
        header {
            background-color: #2e7d32;
            color: white;
            padding: 1rem 2rem;
        }
        header h1 { margin: 0; font-size: 1.4rem; }
        header a { color: white; text-decoration: none; }
        main {
            max-width: 960px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .card {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 0.6rem 0.5rem;
            border-bottom: 1px solid #e0e0e0;
        }
        th { color: #555; font-size: 0.85rem; text-transform: uppercase; }
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
        }
        .btn-primary { background-color: #2e7d32; color: white; }
        .btn-secondary { background-color: #e0e0e0; color: #333; }
        .btn-danger { background-color: #c62828; color: white; }
        .badge {
            padding: 0.25rem 0.6rem;
            border-radius: 12px;
            font-size: 0.75rem;
            color: white;
        }
        .badge-en_culture { background-color: #43a047; }
        .badge-en_jachere { background-color: #fb8c00; }
        .badge-recoltee { background-color: #757575; }
        .alert {
            padding: 0.8rem 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }
        .alert-success { background-color: #dff0d8; color: #3c763d; }
        .alert-danger { background-color: #f8d7da; color: #842029; }
        form label { display: block; margin-top: 1rem; font-weight: 600; font-size: 0.9rem; }
        form input, form select {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.3rem;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .error { color: #c62828; font-size: 0.85rem; margin-top: 0.2rem; }
        .actions form { display: inline; }
        .toolbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <header>
        <h1><a href="{{ route('parcelles.index') }}">🌾 Coopérative — Suivi des parcelles</a></h1>
    </header>

    <main>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>
