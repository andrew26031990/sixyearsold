<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('message.home'), route('home'));
});

// Teachers
Breadcrumbs::for('teachers.index', function ($trail) {
    $trail->push(__('message.teachers'), route('teachers.index'));
});

Breadcrumbs::for('teachers.edit', function ($trail, $teachers) {
    $trail->parent('teachers.index', $teachers);
    $trail->push(__('message.teachers_edit'), route('teachers.edit', $teachers));
});

Breadcrumbs::for('teachers.create', function ($trail) {
    $trail->parent('teachers.index');
    $trail->push(__('message.teachers_create'), route('teachers.create'));
});

Breadcrumbs::for('teachers.show', function ($trail, $teachers) {
    $trail->parent('teachers.index', $teachers);
    $trail->push(__('message.teachers_show'), route('teachers.show', $teachers));
});

// Pupils
Breadcrumbs::for('pupils.index', function ($trail) {
    $trail->push(__('message.pupils'), route('teachers.index'));
});

Breadcrumbs::for('pupils.edit', function ($trail, $pupils) {
    $trail->parent('pupils.index', $pupils);
    $trail->push(__('message.pupils_edit'), route('pupils.edit', $pupils));
});

Breadcrumbs::for('pupils.create', function ($trail) {
    $trail->parent('pupils.index');
    $trail->push(__('message.pupils_create'), route('pupils.create'));
});

Breadcrumbs::for('pupils.show', function ($trail, $pupils) {
    $trail->parent('pupils.index', $pupils);
    $trail->push(__('message.pupils_show'), route('pupils.show', $pupils));
});

// Institutions
Breadcrumbs::for('institutions.index', function ($trail) {
    $trail->push(__('message.institutions'), route('institutions.index'));
});

Breadcrumbs::for('institutions.edit', function ($trail, $institutions) {
    $trail->parent('institutions.index', $institutions);
    $trail->push(__('message.institutions_edit'), route('institutions.edit', $institutions));
});

Breadcrumbs::for('institutions.create', function ($trail) {
    $trail->parent('institutions.index');
    $trail->push(__('message.institutions_create'), route('institutions.create'));
});

Breadcrumbs::for('institutions.show', function ($trail, $institutions) {
    $trail->parent('institutions.index', $institutions);
    $trail->push(__('message.institutions_show'), route('institutions.show', $institutions));
});

// Groups
Breadcrumbs::for('groups.index', function ($trail) {
    $trail->push(__('message.groups'), route('groups.index'));
});

Breadcrumbs::for('groups.edit', function ($trail, $groups) {
    $trail->parent('groups.index', $groups);
    $trail->push(__('message.groups_edit'), route('groups.edit', $groups));
});

Breadcrumbs::for('groups.create', function ($trail) {
    $trail->parent('groups.index');
    $trail->push(__('message.groups_create'), route('groups.create'));
});

Breadcrumbs::for('groups.show', function ($trail, $groups) {
    $trail->parent('groups.index', $groups);
    $trail->push(__('message.groups_show'), route('groups.show', $groups));
});

// Communities
Breadcrumbs::for('communities.index', function ($trail) {
    $trail->push(__('message.communities'), route('communities.index'));
});

Breadcrumbs::for('communities.edit', function ($trail, $communities) {
    $trail->parent('communities.index', $communities);
    $trail->push(__('message.communities_edit'), route('communities.edit', $communities));
});

Breadcrumbs::for('communities.create', function ($trail) {
    $trail->parent('communities.index');
    $trail->push(__('message.communities_create'), route('communities.create'));
});

Breadcrumbs::for('communities.show', function ($trail, $communities) {
    $trail->parent('communities.index', $communities);
    $trail->push(__('message.communities_show'), route('communities.show', $communities));
});

// Countries
Breadcrumbs::for('countries.index', function ($trail) {
    $trail->push(__('message.countries'), route('countries.index'));
});

Breadcrumbs::for('countries.edit', function ($trail, $countries) {
    $trail->parent('countries.index', $countries);
    $trail->push(__('message.countries_edit'), route('countries.edit', $countries));
});

Breadcrumbs::for('countries.create', function ($trail) {
    $trail->parent('countries.index');
    $trail->push(__('message.countries_create'), route('countries.create'));
});

Breadcrumbs::for('countries.show', function ($trail, $countries) {
    $trail->parent('countries.index', $countries);
    $trail->push(__('message.countries_show'), route('countries.show', $countries));
});

// Regions
Breadcrumbs::for('regions.index', function ($trail) {
    $trail->push(__('message.regions'), route('regions.index'));
});

Breadcrumbs::for('regions.edit', function ($trail, $regions) {
    $trail->parent('regions.index', $regions);
    $trail->push(__('message.regions_edit'), route('regions.edit', $regions));
});

Breadcrumbs::for('regions.create', function ($trail) {
    $trail->parent('regions.index');
    $trail->push(__('message.regions_create'), route('regions.create'));
});

Breadcrumbs::for('regions.show', function ($trail, $regions) {
    $trail->parent('regions.index', $regions);
    $trail->push(__('message.regions_show'), route('regions.show', $regions));
});

// Districts
Breadcrumbs::for('districts.index', function ($trail) {
    $trail->push(__('message.districts'), route('districts.index'));
});

Breadcrumbs::for('districts.edit', function ($trail, $districts) {
    $trail->parent('districts.index', $districts);
    $trail->push(__('message.districts_edit'), route('districts.edit', $districts));
});

Breadcrumbs::for('districts.create', function ($trail) {
    $trail->parent('districts.index');
    $trail->push(__('message.districts_create'), route('districts.create'));
});

Breadcrumbs::for('districts.show', function ($trail, $districts) {
    $trail->parent('districts.index', $districts);
    $trail->push(__('message.districts_show'), route('districts.show', $districts));
});

// Education Degrees
Breadcrumbs::for('educationDegrees.index', function ($trail) {
    $trail->push(__('message.education_degrees'), route('educationDegrees.index'));
});

Breadcrumbs::for('educationDegrees.edit', function ($trail, $education_degrees) {
    $trail->parent('educationDegrees.index', $education_degrees);
    $trail->push(__('message.educationDegrees_edit'), route('educationDegrees.edit', $education_degrees));
});

Breadcrumbs::for('educationDegrees.create', function ($trail) {
    $trail->parent('educationDegrees.index');
    $trail->push(__('message.educationDegrees_create'), route('educationDegrees.create'));
});

Breadcrumbs::for('educationDegrees.show', function ($trail, $education_degrees) {
    $trail->parent('educationDegrees.index', $education_degrees);
    $trail->push(__('message.educationDegrees_show'), route('educationDegrees.show', $education_degrees));
});

// Users
Breadcrumbs::for('users.index', function ($trail) {
    $trail->push(__('message.users'), route('users.index'));
});

Breadcrumbs::for('users.edit', function ($trail, $users) {
    $trail->parent('users.index', $users);
    $trail->push(__('message.users_edit'), route('users.edit', $users));
});

Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push(__('message.users_create'), route('users.create'));
});

Breadcrumbs::for('users.show', function ($trail, $users) {
    $trail->parent('users.index', $users);
    $trail->push(__('message.users_show'), route('users.show', $users));
});
