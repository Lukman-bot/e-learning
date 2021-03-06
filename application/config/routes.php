<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route Admin
$route['admin/Kelas']                       ='admin/Kelas';
$route['admin/Kelas/Simpan']                ='admin/Kelas/Add';
$route['admin/Kelas/Perbaharui']            ='admin/Kelas/Update';
$route['admin/Kelas/Hapus']                 ='admin/Kelas/Delete';

$route['admin/Siswa']                       ='admin/Siswa';
$route['admin/Siswa/Simpan']                ='admin/Siswa/Add';
$route['admin/Siswa/Perbaharui']            ='admin/Siswa/Update';
$route['admin/Siswa/Hapus']                 ='admin/Siswa/Delete';

$route['admin/Tahun_pelajaran']             ='admin/Tahun_pelajaran';
$route['admin/Tahun_pelajaran/Simpan']      ='admin/Tahun_pelajaran/Add';
$route['admin/Tahun_pelajaran/Hapus']       ='admin/Tahun_pelajaran/Delete';

$route['admin/Guru']                        ='admin/Guru';
$route['admin/Guru/Simpan']                 ='admin/Guru/Add';
$route['admin/Guru/Perbaharui']             ='admin/Guru/Edit';

$route['admin/Mat_pel']                     ='admin/Mat_pel';
$route['admin/Mat_pel/Simpan']              ='admin/Mat_pel/Add';
$route['admin/Mat_pel/Perbaharui']          ='admin/Mat_pel/Update';
$route['admin/Mat_pel/Updater/(:num)']      ='admin/Mat_pel/Edit/$1';
$route['admin/Mat_pel/Hapus']               ='admin/Mat_pel/Delete';

$route['admin/Materi/Simpan/(:num)']        ='admin/Materi/Save/$1';
$route['admin/Materi/Add/(:num)']           ='admin/Materi/Add/$1';
$route['admin/Materi/List_Materi/(:num)']   ='admin/Materi/list_materi_mapel/$1';
$route['admin/Materi/Hapus/(:num)/(:num)']  ='admin/Materi/Delete/$1/$2';

$route['admin/List_materi']                 ='admin/List_materi';
$route['admin/List_materi/Detil/(:num)']    ='admin/List_materi/Detail/$1';
$route['admin/List_materi/Perbaharui']      ='admin/List_materi/Update';
$route['admin/List_materi/Hapus']           ='admin/List_materi/Delete';