


<x-layout>
    <section class="px-6 py-8">
        <x-panel>
        <h1 class="text-center font-bold text-xl">Register!</h1>
            <form method='POST' action='/register' class='mt-10'>
                @csrf
                <x-form.input name='name' />
                <x-form.input name='username' />
                <x-form.input name='email' type='email' />
                <x-form.input name='password' type='password'/>
                <x-form.button>
                    Submit
                </x-form.button>
            </form>
        </x-panel>
    </section>

</x-layout>