<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Transaccion: {{ $transaction->code }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl lg:rounded-lg">
                {{-- <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
                        Welcome to your Jetstream application!
                    </h1>

                    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                        Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                        to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                        you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                        ecosystem to be a breath of fresh air. We hope you love it.
                    </p>
                </div> --}}

                <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

                    <div>
                        <div class="flex items-center">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Estado:
                            </h2>
                        </div>

                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-lg leading-relaxed">
                            {{ $transaction->status->name }}
                        </p>

                    </div>

                    <div>
                        <div class="flex items-center">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Monto Total:
                            </h2>
                        </div>

                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-lg leading-relaxed">
                            {{ $transaction->total_price }}
                        </p>

                    </div>

                    <div>
                        <div class="flex items-center">
                            <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">
                                Articulo/s:
                            </h2>
                        </div>
                        <div class="bg-white dark:bg-gray-700 shadow-md rounded my-6">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Precio
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Cantidad
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transaction->articles as $article)
                                        @if ($loop->last)
                                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="px-6 py-4">
                                                    {{ $article->name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $article->price }} Bs.
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $article->pivot->quantity }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $article->pivot->total_price }} Bs.
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="px-6 py-4">
                                                    {{ $article->name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $article->price }} Bs.
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $article->pivot->quantity }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $article->pivot->total_price }} Bs.
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td class="px-6 py-4 text-center text-xl" colspan="5">
                                                Su carrito esta vacio.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="text-right w-full p-2">
                                <button wire:click="enterPaymentRefModal()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Pago
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-dialog-modal wire:model.live="enterPaymentRef">
        <x-slot name="title">
            Pago
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

            <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                <div class="flex items-center">
                    <x-label for="name" value="{{ __('Name') }}" />
                </div>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model='name'  autofocus autocomplete="name" />

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('enterPaymentRef')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
 </div>
