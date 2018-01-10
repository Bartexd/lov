<?php

use Models\Controllers\DateHelper;
use Models\Controllers\SidebarGalleryHelper;
use Models\Controllers\SiteRouteHelper;

return [
    ["asset", "url" . "/asset"],
    ["url", "url"],
    ["siter",  new SiteRouteHelper()],
    ["sidebar_gallery",  new SidebarGalleryHelper()],
    ["dh",  new DateHelper()],
];