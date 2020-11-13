<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Teachers
Breadcrumbs::for('teachers.index', function ($trail) {
    $trail->push('Teachers', route('teachers.index'));
});

Breadcrumbs::for('teachers.edit', function ($trail, $teachers) {
    $trail->parent('teachers.index', $teachers);
    $trail->push('Edit teacher', route('teachers.edit', $teachers));
});

Breadcrumbs::for('teachers.create', function ($trail) {
    $trail->parent('teachers.index');
    $trail->push('Create teacher', route('teachers.create'));
});

Breadcrumbs::for('teachers.show', function ($trail, $teachers) {
    $trail->parent('teachers.index', $teachers);
    $trail->push('Show teacher', route('teachers.show', $teachers));
});

// Pupils
Breadcrumbs::for('pupils.index', function ($trail) {
    $trail->push('Pupils', route('teachers.index'));
});

Breadcrumbs::for('pupils.edit', function ($trail, $pupils) {
    $trail->parent('pupils.index', $pupils);
    $trail->push('Edit pupil', route('pupils.edit', $pupils));
});

Breadcrumbs::for('pupils.create', function ($trail) {
    $trail->parent('pupils.index');
    $trail->push('Create pupil', route('pupils.create'));
});

Breadcrumbs::for('pupils.show', function ($trail, $pupils) {
    $trail->parent('pupils.index', $pupils);
    $trail->push('Show pupil', route('pupils.show', $pupils));
});

// Institutions
Breadcrumbs::for('institutions.index', function ($trail) {
    $trail->push('Institutions', route('institutions.index'));
});

Breadcrumbs::for('institutions.edit', function ($trail, $institutions) {
    $trail->parent('institutions.index', $institutions);
    $trail->push('Edit institution', route('institutions.edit', $institutions));
});

Breadcrumbs::for('institutions.create', function ($trail) {
    $trail->parent('institutions.index');
    $trail->push('Create institution', route('institutions.create'));
});

Breadcrumbs::for('institutions.show', function ($trail, $institutions) {
    $trail->parent('institutions.index', $institutions);
    $trail->push('Show institution', route('institutions.show', $institutions));
});

// Groups
Breadcrumbs::for('groups.index', function ($trail) {
    $trail->push('Groups', route('groups.index'));
});

Breadcrumbs::for('groups.edit', function ($trail, $groups) {
    $trail->parent('groups.index', $groups);
    $trail->push('Edit group', route('groups.edit', $groups));
});

Breadcrumbs::for('groups.create', function ($trail) {
    $trail->parent('groups.index');
    $trail->push('Create group', route('groups.create'));
});

Breadcrumbs::for('groups.show', function ($trail, $groups) {
    $trail->parent('groups.index', $groups);
    $trail->push('Show group', route('groups.show', $groups));
});

// Communities
Breadcrumbs::for('communities.index', function ($trail) {
    $trail->push('Communities', route('communities.index'));
});

Breadcrumbs::for('communities.edit', function ($trail, $communities) {
    $trail->parent('communities.index', $communities);
    $trail->push('Edit community', route('communities.edit', $communities));
});

Breadcrumbs::for('communities.create', function ($trail) {
    $trail->parent('communities.index');
    $trail->push('Create community', route('communities.create'));
});

Breadcrumbs::for('communities.show', function ($trail, $communities) {
    $trail->parent('communities.index', $communities);
    $trail->push('Show community', route('communities.show', $communities));
});

// Countries
Breadcrumbs::for('countries.index', function ($trail) {
    $trail->push('Countries', route('countries.index'));
});

Breadcrumbs::for('countries.edit', function ($trail, $countries) {
    $trail->parent('countries.index', $countries);
    $trail->push('Edit country', route('countries.edit', $countries));
});

Breadcrumbs::for('countries.create', function ($trail) {
    $trail->parent('countries.index');
    $trail->push('Create country', route('countries.create'));
});

Breadcrumbs::for('countries.show', function ($trail, $countries) {
    $trail->parent('countries.index', $countries);
    $trail->push('Show country', route('countries.show', $countries));
});

// Regions
Breadcrumbs::for('regions.index', function ($trail) {
    $trail->push('Regions', route('regions.index'));
});

Breadcrumbs::for('regions.edit', function ($trail, $regions) {
    $trail->parent('regions.index', $regions);
    $trail->push('Edit region', route('regions.edit', $regions));
});

Breadcrumbs::for('regions.create', function ($trail) {
    $trail->parent('regions.index');
    $trail->push('Create region', route('regions.create'));
});

Breadcrumbs::for('regions.show', function ($trail, $regions) {
    $trail->parent('regions.index', $regions);
    $trail->push('Show region', route('regions.show', $regions));
});

// Districts
Breadcrumbs::for('districts.index', function ($trail) {
    $trail->push('Districts', route('districts.index'));
});

Breadcrumbs::for('districts.edit', function ($trail, $districts) {
    $trail->parent('districts.index', $districts);
    $trail->push('Edit district', route('districts.edit', $districts));
});

Breadcrumbs::for('districts.create', function ($trail) {
    $trail->parent('districts.index');
    $trail->push('Create district', route('districts.create'));
});

Breadcrumbs::for('districts.show', function ($trail, $districts) {
    $trail->parent('districts.index', $districts);
    $trail->push('Show district', route('districts.show', $districts));
});

// Education Degrees
Breadcrumbs::for('educationDegrees.index', function ($trail) {
    $trail->push('Education degrees', route('educationDegrees.index'));
});

Breadcrumbs::for('educationDegrees.edit', function ($trail, $education_degrees) {
    $trail->parent('educationDegrees.index', $education_degrees);
    $trail->push('Edit education degree', route('educationDegrees.edit', $education_degrees));
});

Breadcrumbs::for('educationDegrees.create', function ($trail) {
    $trail->parent('educationDegrees.index');
    $trail->push('Create education degree', route('educationDegrees.create'));
});

Breadcrumbs::for('educationDegrees.show', function ($trail, $education_degrees) {
    $trail->parent('educationDegrees.index', $education_degrees);
    $trail->push('Show education degree', route('educationDegrees.show', $education_degrees));
});

// Users
Breadcrumbs::for('users.index', function ($trail) {
    $trail->push('Users', route('users.index'));
});

Breadcrumbs::for('users.edit', function ($trail, $users) {
    $trail->parent('users.index', $users);
    $trail->push('Edit user', route('users.edit', $users));
});

Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push('Create user', route('users.create'));
});

Breadcrumbs::for('users.show', function ($trail, $users) {
    $trail->parent('users.index', $users);
    $trail->push('Show user', route('users.show', $users));
});
