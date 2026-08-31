<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', config('app.name', 'AgriGest'))</title>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                body { font-family: system-ui, sans-serif; margin: 0; background: #fafaf9; color: #1b1b18; }
                header { background: #1b1b18; color: #fff; padding: 0.75rem 1.5rem; }
                header a { color: #fff; text-decoration: none; font-weight: 600; }
                main { max-width: 60rem; margin: 0 auto; padding: 1.5rem; }
                form { display: flex; flex-wrap: wrap; gap: 0.75rem; align-items: center; margin-bottom: 1.25rem; }
                input, select, button { padding: 0.5rem 0.75rem; border: 1px solid #d6d3d1; border-radius: 0.25rem; font-size: 0.9rem; }
                button, .btn { background: #1b1b18; color: #fff; border: none; cursor: pointer; }
                a.btn { display: inline-block; text-decoration: none; }
                .btn-danger { background: #b91c1c; }
                .btn-danger:hover { background: #991b1b; }
                .btn-secondary { background: #57534e; }
                a.btn-secondary { text-decoration: none; }
                .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem; }
                .page-header h1 { margin: 0; }
                .form-group { display: flex; flex-direction: column; gap: 0.25rem; flex: 1 1 100%; }
                .form-group label { font-size: 0.85rem; font-weight: 600; }
                .form-actions { display: flex; gap: 0.75rem; align-items: center; margin-top: 0.5rem; }
                .alert { padding: 0.75rem 1rem; border-radius: 0.25rem; margin-bottom: 1.25rem; }
                .alert-success { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
                .alert-error { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }
                .alert-error ul { margin: 0; padding-left: 1.25rem; }
                table { width: 100%; border-collapse: collapse; background: #fff; }
                th, td { text-align: left; padding: 0.6rem 0.75rem; border-bottom: 1px solid #e7e5e4; }
                th { background: #f5f5f4; }
                .empty { padding: 1.25rem; background: #fff; border: 1px solid #e7e5e4; border-radius: 0.25rem; }
            </style>
        @endif
    </head>
    <body>
        <header>
            <a href="{{ route('parcelles.index') }}">AgriGest</a>
        </header>
        <main>
            @yield('content')
        </main>
    </body>
</html>