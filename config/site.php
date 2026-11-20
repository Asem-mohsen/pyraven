<?php

/*
|--------------------------------------------------------------------------
| Marketing site structure
|--------------------------------------------------------------------------
| Non-translatable facts and page structure. All visible copy lives in
| lang/{en,ar}/site.php. Contact details come from config/app.php (.env).
| Only verifiable facts belong on the site — no client counts, ratings,
| awards or years-in-business unless they can be backed up.
*/

return [
    'locales' => ['en', 'ar'],

    // Order = display order. Copy for each slug: lang/*/site.php → services.{slug}
    'services' => ['custom-software', 'mobile-apps', 'saas-integrations'],

    'city' => 'Cairo',
    'country_code' => 'EG',

    'gymivida_url' => 'https://gymivida.com/en',
    'gymivida_url_ar' => 'https://gymivida.com/ar',
];
