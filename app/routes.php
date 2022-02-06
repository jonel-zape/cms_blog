<?php

defaultRoute('auth', REQUEST_PAGE);

addRoute('sign-in', 'auth', REQUEST_PAGE, EXCLUDE_AUTH);
addRoute('guest/authenticate', 'auth', REQUEST_JSON, EXCLUDE_AUTH);
addRoute('auth/logout', 'auth', REQUEST_PAGE);

addRoute('dashboard', 'dashboard', REQUEST_PAGE);

addRoute('upload/image', 'upload', REQUEST_JSON);

addRoute('authors', 'authors', REQUEST_PAGE);
addRoute('authors/create', 'authors', REQUEST_PAGE);
addRoute('authors/edit/$', 'authors', REQUEST_PAGE);
addRoute('authors/save', 'authors', REQUEST_JSON);
addRoute('authors/find', 'authors', REQUEST_JSON);
addRoute('authors/delete', 'authors', REQUEST_JSON);

addRoute('posts', 'posts', REQUEST_PAGE);
addRoute('posts/create', 'posts', REQUEST_PAGE);
addRoute('posts/edit/$', 'posts', REQUEST_PAGE);
addRoute('posts/save', 'posts', REQUEST_JSON);
addRoute('posts/find', 'posts', REQUEST_JSON);
addRoute('posts/delete', 'posts', REQUEST_JSON);

addRoute('settings', 'settings', REQUEST_PAGE);
addRoute('settings/loginAttempt', 'settings', REQUEST_JSON);
addRoute('settings/loginAttemptCount', 'settings', REQUEST_JSON);
addRoute('settings/clearLoginAttemptCount', 'settings', REQUEST_JSON);
addRoute('settings/updateUsername', 'settings', REQUEST_JSON);
addRoute('settings/updatePassword', 'settings', REQUEST_JSON);
addRoute('settings/clearData', 'settings', REQUEST_JSON);

addRoute('user/all', 'user', REQUEST_JSON);