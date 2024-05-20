<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            * { box-sizing: border-box; }
            body { margin: 0; font-family: 'Figtree', sans-serif; }
            .min-h-screen { min-height: 100vh; }
            .flex { display: flex; }
            .flex-col { flex-direction: column; }
            .items-center { align-items: center; }
            .justify-center { justify-content: center; }
            .relative { position: relative; }
            .absolute { position: absolute; }
            .top-0 { top: 0; }
            .right-0 { right: 0; }
            .left-20 { left: 20px; }
            .p-6 { padding: 1.5rem; }
            .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
            .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
            .bg-gray-50 { background-color: #f9fafb; }
            .bg-black { background-color: #000; }
            .dark\:bg-black { background-color: #000; }
            .dark\:text-white\/50 { color: rgba(255, 255, 255, 0.5); }
            .text-black\/50 { color: rgba(0, 0, 0, 0.5); }
            .text-lg { font-size: 1.125rem; line-height: 1.75rem; }
            .text-4xl { font-size: 2.25rem; line-height: 2.5rem; }
            .text-5xl { font-size: 3rem; line-height: 1; }
            .font-semibold { font-weight: 600; }
            .font-sans { font-family: Figtree, sans-serif; }
            .leading-relaxed { line-height: 1.625; }
            .underline { text-decoration: underline; }
            .hover\:text-black:hover { color: #000; }
            .hover\:text-white:hover { color: #fff; }
            .ring-1 { box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1); }
            .ring-white\/10 { box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.1); }
            .outline-red-500 { outline-color: #ef4444; }
            .grid { display: grid; }
            .grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .gap-2 { gap: 0.5rem; }
            .lg\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .lg\:col-span-2 { grid-column: span 2 / span 2; }
            .lg\:justify-end { justify-content: flex-end; }
            .lg\:gap-x-8 { column-gap: 2rem; }
            .lg\:px-8 { padding-left: 2rem; padding-right: 2rem; }
            .lg\:text-left { text-align: left; }
            .lg\:flex-row { flex-direction: row; }
            .lg\:items-end { align-items: flex-end; }
            @media (min-width: 1024px) {
                .lg\:h-16 { height: 4rem; }
                .lg\:p-6 { padding: 1.5rem; }
                .lg\:pb-0 { padding-bottom: 0; }
                .lg\:pt-0 { padding-top: 0; }
                .lg\:text-xl { font-size: 1.25rem; line-height: 1.75rem; }
                .lg\:leading-tight { line-height: 1.375; }
                .lg\:max-w-7xl { max-width: 80rem; }
                .lg\:block { display: block; }
                .lg\:mt-0 { margin-top: 0; }
                .lg\:overflow-visible { overflow: visible; }
            }
        </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="Background Image"/>
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257693 12.8046 0.21111 12.9821 0.211109C13.1596 0.211109 13.3346 0.257693 13.4863 0.345059L25.4519 7.07389L37.4267 0.345059C37.5784 0.257693 37.7534 0.211109 37.9309 0.211109C38.1084 0.211109 38.2834 0.257693 38.4351 0.345059L61.3887 14.1379C61.5282 14.2207 61.6473 14.3409 61.7462 14.4855C61.7711 14.522 61.7998 14.5536 61.8223 14.5901C61.8266 14.5971 61.8311 14.6037 61.8355 14.6106C61.8455 14.6273 61.8521 14.6464 61.8615 14.6627C61.849 14.6098 61.844 14.5547 61.8548 14.5051V14.6253Z" fill="currentColor"></path>
                            </svg>
                        </div>
                        
                        <div class="lg:hidden flex justify-end gap-2">
                            <a href="/login" class="text-sm font-semibold leading-6 text-black/50 dark:text-white/50 hover:text-black dark:hover:text-white">Login</a>
                            <a href="/register" class="text-sm font-semibold leading-6 text-black/50 dark:text-white/50 hover:text-black dark:hover:text-white">Register</a>
                        </div>
                    </header>
                 
                </div>
            </div>
        </div>
    </body>
</html>
