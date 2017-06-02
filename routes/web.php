<?php


Route::get('/', function () {
    return redirect('login');
    return view('welcome');
});

//Auth::routes();

Route::get('/home', 'HomeController@index');

// Login, Register, Logout
Route::get('/login', function() {
    return View::make('login.login');
});
Route::get('/registasi', function() {
    return View::make('register.registasi');
});
Route::get('/logout', function() {
    return View::make('logout.logout');
});

// Dashboard
Route::get('/dashboard', function() {
    return View::make('dashboard.dashboard');
});

// Kiosk
Route::get('/kiosk', function() {
    return View::make('kiosk.kiosk');
});

// Display Antrian
Route::get('/display', function() {
    return View::make('display.display');
});

// Loket
Route::get('/loket', function() {
    return View::make('loket.loket');
});
Route::get('/antrian', function() {
    return View::make('antrian.antrian');
});
Route::get('/pendaftaranPasien', function() {
    return View::make('pendaftaranPasien.pendaftaranPasien');
});
Route::get('/data_patient', function() {
    return View::make('dataPasien.dataPasien');
});

// Kasir
Route::get('/kasir', function() {
    return View::make('kasir.kasir');
});

// Penata Jasa Rawat Jalan
Route::get('/penata_jasa', function() {
    return View::make('rawatjalan.rawatjalan');
});
Route::get('/poli_anak', function() {
    return View::make('antrianRawatJalan.antrianPoli');
});
Route::get('/poli_gigi', function() {
    return View::make('antrianRawatJalan.antrianPoli');
});
Route::get('/poli_umum', function() {
    return View::make('antrianRawatJalan.antrianPoli');
});

// Apotek/Farmasi
Route::get('/apotek', function() {
    return View::make('farmasi.farmasi');
});
Route::get('/distributor', function() {
    return View::make('distributor.distributor');
});
Route::get('/resep', function() {
    return View::make('resep.resep');
});
Route::get('/pembelian_alkes', function() {
    return View::make('pembelian_alkes.pembelian_alkes');
});
Route::get('/alkes', function() {
    return View::make('alkes.alkes');
});
Route::get('/penjualan_alkes', function() {
    return View::make('penjualan_alkes.penjualan_alkes');
});
Route::get('/transfer_depo', function() {
    return View::make('transfer_depo.transfer_depo');
});
/* No Usage */
    Route::get('/createEditResep', function() {
        return View::make('resep.createEditResep');
    });
    Route::get('/pos_farmasi', function() {
        return View::make('pos_farmasi.pos_farmasi');
    });
    Route::get('/createEditNonAlkes', function() {
        return View::make('nonalkes.createEditNonAlkes');
    });
    Route::get('/createEditAlkes', function() {
        return View::make('alkes.createEditAlkes');
    });
/* -- End -- */

// Master Data
Route::get('/master_data', function() {
    return View::make('masterdata.masterdata');
});
    // Inventory
    Route::get('/nonAlkes', function() {
        return View::make('nonalkes.nonAlkes');
    });
    Route::get('/inventoryCategori', function() {
        return View::make('inventoryCategori.inventoryCategori');
    });
    // Master Poli
    Route::get('/poli', function() {
        return View::make('poli.poli');
    });
    Route::get('/depo', function() {
        return View::make('depo.depo');        
    });
    // Master Staff
    Route::get('/staff', function() {
        return View::make('staff.staff');
    });
    Route::get('/staffJob', function() {
        return View::make('staffJob.staffJob');
    });
    Route::get('/staffPosition', function() {
        return View::make('staffPosition.staffPosition');
    });
    Route::get('/jasaDokter', function() {
        return View::make('jasaDokter.jasaDokter');
    });
    // Master User
    Route::get('/user', function() {
        return View::make('user.user');
    });
    Route::get('/role', function() {
        return View::make('role.role');
    });
    // Master Layanan
    Route::get('/service', function() {
        return View::make('service.service');
    });
    Route::get('/categoryService', function() {
        return View::make('categoryService.categoryService');
    });

// Rawat Inap
Route::get('/rawat_inap', function() {
    return View::make('rawat_inap.rawat_inap');
});
Route::get('/rawatinap', function() {
    return View::make('rawatinap.rawatinap');
});
Route::get('/register_irna', function() {
    return View::make('register_irna.register_irna');
});
Route::get('/transaksiRawatInap', function() {
    return View::make('transaksiRawatInap.transaksiRawatInap');
});
Route::get('/infoRawatInap', function() {
    return View::make('infoRawatInap.infoRawatInap');
});
Route::get('/infoBed', function() {
    return View::make('infoBed.infoBed');
});

// Laboratorium
Route::get('/laboratorium', function() {
    return View::make('lab.lab');
});
Route::get('/antrianLab', function() {
    return View::make('lab.antrianLab');
});
Route::get('/registerLab', function() {
    return View::make('lab.registerLab');
});
Route::get('/pjasaIrJlnLab', function() {
    return View::make('lab.pjasaIrJlnLab');
});
Route::get('/pjasaIrnaLab', function() {
    return View::make('lab.pjasaIrnaLab');
});

// Radiologi
Route::get('/radiologi', function() {
    return View::make('radiologi.radiologi');
});
Route::get('/pjasa_irj_radiologi', function() {
    return View::make('radiologi.pjasa_irj_radiologi');
});
Route::get('/pjasa_irna_radiologi', function() {
    return View::make('radiologi.pjasa_irna_radiologi');
});
Route::get('/transaksi_radiologi', function() {
    return View::make('radiologi.transaksi_radiologi');
});

// Kepegawaian
Route::get('/kepegawaian', function() {
    return View::make('kepegawaian.kepegawaian');
});
 
/* Todo */
    Route::get('/inventori', function() {
        return View::make('inventori.inventori');
    });
    Route::get('/keuangan', function() {
        return View::make('keuangan.keuangan');
    });
    Route::get('/rekammedis', function() {
        return View::make('rekammedis.rekammedis');
    });
    Route::get('/managementUser', function() {
        return View::make('managementUser.managementUser');
    });
    Route::get('/createEditPendaftaranPasien', function() {
        return View::make('pendaftaranPasien.createEditPendaftaranPasien');
    });
    Route::get('/dataPengunjung', function() {
        return View::make('dataPengunjung.dataPengunjung');
    });
    Route::get('/pengunjungKasir', function() {
        return View::make('dataPengunjung.pengunjungKasir');
    });
    Route::get('/pengunjungLoket', function() {
        return View::make('dataPengunjung.pengunjungLoket');
    });
/* -- End -- */