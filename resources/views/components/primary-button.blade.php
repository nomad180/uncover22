<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center py-2 px-4 bg-secondary border border-transparent rounded-full font-semibold text-xs text-white tracking-widest hover:bg-primary focus:bg-primary active:bg-primary focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
