<?php

return [
    ['GET', '/', ["Controllers\home", "index"]],
    ['GET', '/p/{id:\d+}', ["Controllers\home", "indexPage"]],
    ['GET', '/news/{id:\d+}', ["Controllers\\news", "index"]],
    ['GET', '/login', ["Controllers\\fblogin", "index"]],
    ['GET', '/logout', ["Controllers\\fblogin", "delete"]],
    ['POST', '/add-comment', ["Controllers\\comments", "post"]],

    ['GET', '/comments/{news_id:\d+}/{take:\d+}', ["Controllers\\comments", "get"]],
    ['GET', '/comments/{news_id:\d+}/{take:\d+}/{skip:\d+}', ["Controllers\\comments", "get"]],

    ['GET', '/{site}', ["Controllers\sites", 'get']],
//    ['GET', '/', ["Controllers\home", 'show']],
];