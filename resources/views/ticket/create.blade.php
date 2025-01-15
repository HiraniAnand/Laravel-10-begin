<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Ticket View</title>
</head>
<body>
    <div class="container text-white bg-dark p-1 mw-100 mt-6" style="display: flex; justify-content: space-around;">
        <div class="container-fluid text-white bg-dark p-1 mw-100 mt-6">
            <!-- Logo -->
            <div class="shrink-0 flex items-center d-inline">
                <a href="{{ route('dashboard') }}">
                    {{-- <x-application-logo class="d-inline h-9 w-auto fill-current text-gray-800 dark:text-gray-200" /> --}}
                    <x-application-logo class="dark:text-gray-800" style="height: 35px; width: 35px;" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex d-inline">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </div>
        </div>
        <div class="container flex justify-content-center text-white bg-dark p-1">
            <a href="{{ route('ticket.create') }}" class="ml-3 bg-white rounded-lg p-1 text-dark align-middle">
                Support Ticket
            </a>
        </div>
    </div>
</body>
</html>