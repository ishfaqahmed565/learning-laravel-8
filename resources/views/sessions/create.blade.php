<x-layout>
    <section class="px-6 py-8">
       <x-panel>
            <h1 class="text-center font-bold text-xl">Login!</h1>
            <form method='POST' action='/login' class='mt-10'>
                @csrf
                <x-form.input name='email' type='email' autocomplete='username'/>
                <x-form.input name='password' type='password' autocomplete='new-password'/>
                <x-form.button>
                    Login
                </x-form.button>
            </form>
        </main>
    </x-panel>

</x-layout>