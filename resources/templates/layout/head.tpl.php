<?php use function Tonik\Theme\App\asset_path; ?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<main id="app" class="app">
    <div class="hero" style="background-color: #0D2B56; width: 100%; min-height: 500px">
        <nav class="container mx-auto py-6 flex justify-between">
            <img src="<?php echo asset_path('images/logo-w.svg') ?>" width="100" height="50">
            <div class="text-white relative flex justify-between">
                <mega-menu id="Projektentwickler">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="p-2 flex flex-col">
                            <h3 class="text-bold mb-3">Ausschreiben</h3>
                            <p class="text-sm leading-tight pb-5">Schreiben Sie Ihr Projekt aus, egal in welcher Projektphase, wir finden den passenden digitalten Dienstleister für Sie.</p>
                            <a class="mt-auto py-2 block mt-3 bg-ivalublue text-white text-center">mehr...</a>
                        </div>
                        <div class="p-2 flex flex-col">
                            <h3 class="text-bold mb-3">Buchen</h3>
                            <p class="text-sm leading-tight pb-5">Finden Sie bestimmte Deinstleistungen für Ihr Projekt und buchen Sie direkt hier auf IVALU</p>
                            <a class="mt-auto py-2 block mt-3 bg-ivalublue text-white text-center">mehr...</a>
                        </div>
                        <div class="p-2 flex flex-col">
                            <h3 class="text-bold mb-3">Vermarkten</h3>
                            <p class="text-sm leading-tight pb-5">Wir helfen Ihenn mit allen Möglichkeiten desn On- und Offlinemerketing um Ihr Prjekt schnell und gewinnbringend zu vermarkten.</p>
                            <a class="mt-auto py-2 block mt-3 bg-ivalublue text-white text-center">mehr...</a>
                        </div>
                    </div>


                </mega-menu>




                <a href="#" class="px-3">Dienstleister</a>
                <a href="#" class="px-3">Über IVALU</a>
            </div>
            <div class="flex">
                <a href="#" class="text-white font-bold  mr-5">kostenlos registrieren</a>
                <div class="border border-white px-5 text-white rounded-l">login</div>
            </div>
        </nav>
        <div class="flex content-center justify-center h-full py-48">
            <h1 class="mx-auto text-5xl lg:w-1/3 text-center text-white font-bold">Digitale Projektentwicklung, <br>neu
                gedacht!</h1>
        </div>
    </div>
    <div class="relative -mt-48 container mx-auto h-64">
        <waving-disc
            x="0%"
            y="50%"
            text="Unser Wiki, die Wissensdatenbank zur Projektentwicklung"
        >
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 class="academic-cap w-16 h-16 text-blue-600 m-auto">
                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                <path
                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                      d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
            </svg>
        </waving-disc>
        <waving-disc
            x="25%"
            y="10%"
            text="Bleiben Sie auf dem Laufenden, wir sammeln News aus der Branche"
        >
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="newspaper w-16 h-16 text-blue-600 m-auto">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                      d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
            </svg>
        </waving-disc>
        <waving-disc
            x="60%"
            y="80%"
            text="Lassen Sie sich inspirieren, in unserem Projekt Showcase"
        >
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 class="light-bulb w-16 h-16 text-blue-600 m-auto">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                      d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
            </svg>
        </waving-disc>
        <waving-disc
            x="85%"
            y="20%"
            text="Nehmen Sie Kontakt auf, in userem Experten Netzwerk"
        >
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="share w-16 h-16 text-blue-600 m-auto">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                      d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
            </svg>
        </waving-disc>
    </div>
    <div class="h-48"></div>
