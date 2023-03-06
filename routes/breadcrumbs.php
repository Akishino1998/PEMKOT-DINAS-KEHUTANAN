<?php 

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});
// Master
Breadcrumbs::for('master', function (BreadcrumbTrail $trail) {
    $trail->push('Master', route('master'));
});
// Master > Jenis Dinas
Breadcrumbs::for('jenis_dinas', function (BreadcrumbTrail $trail) {
    $trail->parent('master');
    $trail->push('Jenis Dinas', route('master.jenis-dinas.index'));
});
// Master > Jabatan
Breadcrumbs::for('jabatan', function (BreadcrumbTrail $trail) {
    $trail->parent('master');
    $trail->push('Jabatan', route('master.jabatan.index'));
});
// Master > Dinas
Breadcrumbs::for('dinas', function (BreadcrumbTrail $trail) {
    $trail->parent('master');
    $trail->push('Dinas', route('master.dinas.index'));
});
// Master > Pegawai
Breadcrumbs::for('pegawai', function (BreadcrumbTrail $trail) {
    $trail->parent('master');
    $trail->push('Pegawai', route('master.pegawai.index'));
});
// Master > Surat
Breadcrumbs::for('surat', function (BreadcrumbTrail $trail) {
    $trail->parent('master');
    $trail->push('Surat', route('master.surat.index'));
});

Breadcrumbs::for('surat2', function (BreadcrumbTrail $trail) {
    $trail->parent('master');
    $trail->push('Surat', route('surat.index'));
});