<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('resources/css/form-style.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Scripts -->
    <script type="text/javascript" src="{{ URL::asset('resources/js/app.js') }}" ></script>
</head>
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            User Avatar
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Add or Update User Avatar
        </p>
    </header>


    @if (session('avatar'))
        <div class="alert alert-success bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-4" role="alert">
            {{ session('avatar') }}
        </div>        
    @endif

    <form method="POST" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        
        {{-- <input type="hidden" name="_method" value="PATCH"> --}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="mt-4 space-y-4">
            <x-input-label for="name" value="Avatar" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>
            

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
