<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- icon  -->
    <link rel="icon"
        href="https://icons.iconarchive.com/icons/blackvariant/button-ui-requests-5/128/ToDo-List-icon.png">

    <!-- import css & js  -->
    @vite(['resources/js/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-900 scroll-smooth hover:scroll-auto p-5">
    <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
        <h1 class="font-bold text-center mb-8 text-4xl">Laravel + Tailwind
            <span
                class="before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-sky-500 relative inline-block hover:-translate-y-1.5 transition duration-150 ease-linear">
                <span class="relative text-white">Todo</span>
            </span>
        </h1>

        <div class="mb-6">
            <form class="flex flex-col space-y-4" action="/" method="POST">
                @csrf
                <input type="text" name="title" autocomplete="off" required placeholder="The Todo Title"
                    class="py-4 px-4 bg-gray-100 rounded-xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full  sm:text-sm focus:ring-1" />
                <textarea name="description" id="description" autocomplete="off" placeholder="The Todo Description"
                    class="py-4 px-4 bg-gray-100 rounded-xl border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full  sm:text-sm focus:ring-1"></textarea>

                <button class="w-28 flex py-4 px-8 bg-green-500 text-white rounded-xl">
                    Add <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 ml-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg>

                </button>
            </form>
        </div>
        <hr class="h-0.5 bg-blue-500 shadow-xl  shadow-blue-500/100 ">
        @foreach ($todos as $todo)
            <div class="mt-2">
                <div @class([
                    'py-4 px-3 flex items-center border-b border-gray-300 shadow-lg shadow-blue-100 hover:shadow-blue-300 transition duration-200 ease-in hover:ease-out rounded-md',
                    $todo->isDone ? 'bg-green-200' : '',
                ])>
                    <div class="flex-1 pr-8">
                        <h3 class="text-lg font-semibold">{{ $todo->title }}</h3>
                        <p class="text-gray-500">
                            {{ $todo->description }}
                        </p>
                        <div class="flex space-x-3 justify-end	">
                            <form action="/{{ $todo->id }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="py-2 px-2 bg-green-500 text-white rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                    </svg>
                                </button>
                            </form>
                            <form action="/{{ $todo->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="py-2 px-2 bg-red-500 text-white rounded-xl ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- <div class="flex justify-center items-center h-screen ">
        <h1 class="text-3xl text-purple-600 font-bold">Welcome , Ahmed </h1>
    </div> --}}
</body>

</html>
