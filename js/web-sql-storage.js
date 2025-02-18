var WebSqlDB = function(successCallback, errorCallback) {

    this.initializeDatabase = function(successCallback, errorCallback) {

        // This here refers to this instance of the webSqlDb
        var self = this;

        // Open/create the database
        this.db = window.openDatabase("DBMerchant", "1.0", "Merchant DB", 200000);

        // WebSQL databases are tranaction based so all db querying must be done within a transaction
        this.db.transaction(
                function(tx) {

                    self.createTable(tx);
                    self.addSampleData(tx);
                },
                function(error) {
                    console.log('Transaction error: ' + error);
                    if (errorCallback) errorCallback();
                },
                function() {
                    console.log('DEBUG - 5. initializeDatabase complete');
                    if (successCallback) successCallback();
                }
        )
    }

    this.createTable = function(tx) {

        // This can be added removed/when testing
        tx.executeSql('DROP TABLE IF EXISTS tbmerchant');

        var sql = "CREATE TABLE IF NOT EXISTS tbmerchant ( " +
            "id INTEGER PRIMARY KEY AUTOINCREMENT, " +
            "nama, " +
            "alamat, " +
            "kategori, " +
            "phone, " +
            "diskon, " +
            "gambar, " +
            "keterangan)";
        tx.executeSql(sql, null,
                function() {            // Success callback
                    console.log('DEBUG - 3. DB Tables created succesfully');
                },
                function(tx, error) {   // Error callback
                    alert('Create table error: ' + error.message);
                });
    }

    this.addSampleData = function(tx, insmerchant) {

        // Array of objects
        var insmerchant = [
                {"id": 1, "nama": "PPS TEFLON BALI", "alamat": "Jl.Buluh Indah no.103 denpasar", "kategori": "automotif", "phone": "0361428665", "diskon": "Discount 20%","gambar": "PPS TEFLON BALI.jpg", "keterangan": "Discount 20% utk Teflon Paint protection all pelanggan Tsel 27 Feb 2013"},
                {"id": 2, "nama": "RUST EVADER", "alamat": "Jl.Buluh Indah no.103 denpasar", "kategori": "automotif", "phone": "0361428665", "diskon": "Discount 20%","gambar": "RUST EVADER.jpg", "keterangan": "discount 20%  untuk treatment kendaraan Anti Karat elektrik Durasi kerjasama sampai 27 peb 2013"},
                {"id": 3, "nama": "PRIMAGAMA KUPANG", "alamat": "Jl . Ahmad Yani-Kupang", "kategori": "education", "phone": "0380827171", "diskon": "Discount 23%","gambar": "PRIMAGAMA KUPANG.jpg", "keterangan": "Discount 25% untuk pendaftaran sampai dengan 08 Oktober 2013"},
                {"id": 4, "nama": "LPK MATARAM", "alamat": "Jl. Diponegoro No. 43 Sayang-sayang Cakranegara Mataram", "kategori": "education", "phone": "082340478700", "diskon": "Discount 20%","gambar": "LPK MATARAM.jpg", "keterangan": "Discount sebesar 20% utk pendaftaran baru yang menggunakan Tsel, sampai 23 Januari 2013"},
                {"id": 5, "nama": "ALAS DAUN BALI", "alamat": "Jl Teuku Umar 220 Denpasar", "kategori": "kuliner", "phone": "0361254899", "diskon": "Discount 30%","gambar": "ALAS DAUN BALI.jpg", "keterangan": "Nikmati Discount 30% untuk Paket Ayam Goreng Berlaku Hingga 31 Desember 2012"},
                {"id": 6, "nama": "BUMBU DESA", "alamat": "Jalan Raya Puputan No. 42 ,Renon, Denpasar, Bali", "kategori": "kuliner", "phone": "0361221850", "diskon": "Discount 15%","gambar": "BUMBU DESA.jpg", "keterangan": "Discount 15% untuk pelanggan Telkomsel sampai dengan 20 Oktober 2013"},
                {"id": 7, "nama": "BAD ROMANCE", "alamat": "Jl. Waturenggong No. 131 Panjer", "kategori": "mart", "phone": "0830827171", "diskon": "Discount 15%","gambar": "BAD ROMANCE.jpg", "keterangan": "Discount 15% utk all item, berlaku sampai 26 Januari 2013"},
                {"id": 8, "nama": "BUTIK NABITA", "alamat": "Jl. Sriwijaya No. 177 Mataram", "kategori": "mart", "phone": "08123750425", "diskon": "Discount up to 50%","gambar": "BUTIK NABITA.jpg", "keterangan": "Discount up to 50% special item Berlaku sampai 04 agustus 2013"},
                {"id": 9, "nama": "ERHA CLINIC", "alamat": "Jl. Hayam Wuruk No.199 denpasar Bali", "kategori": "medical", "phone": "0361231131", "diskon": "Discount 20%","gambar": "ERHA CLINIC.jpg", "keterangan": "Discount 20% Untuk Facial, berlaku sampai 2 Januari 2013"},
                {"id": 10, "nama": "PRODIA", "alamat": "Jl. Diponegoro 192 Denpasar", "kategori": "medical", "phone": "0361261001", "diskon": "Discount 10%","gambar": "PRODIA.jpg", "keterangan": "Nikmati 10% Diskon Semua Pemeriksaan  Berlaku Hingga 6 pebruari 2013 Dengan transaksi minimal Rp.500.000"},
                {"id": 11, "nama": "CIRCUS WATER PARK BALI", "alamat": " Jl Kediri Kuta Bali", "kategori": "recreation", "phone": "0361764003", "diskon": "Discount 35%","gambar": "CIRCUS WATER PARK BALI.jpg", "keterangan": "Nikmati Discount 35% Berlaku hingga 20 Desember 2013"},
                {"id": 12, "nama": "MINIAPOLIS BALI", "alamat": "Beachwalk Mall kuta Lt3 Jl Pantai Kuta Bali", "kategori": "recreation", "phone": "0361760140", "diskon": "Discount 25 %","gambar": "MINIAPOLIS BALI.jpg", "keterangan": "Discount 25 % Untuk Tiket Masuk Berlaku Sampai Dengan 23 Juni 2014"},
                {"id": 13, "nama": "AXMI BEAUTY SALON", "alamat": "Jl. Hayam Wuruk No. 82 Denpasar Bali ", "kategori": "resortspa", "phone": "0361231442", "diskon": "discount 25%","gambar": "AXMI BEAUTY SALON.jpg", "keterangan": "discount 25% Untuk all item, mulai 02 Juli 2012 s/d 02 Januari 2013"},
                {"id": 14, "nama": "BALI KHAMA", "alamat": "Jl Pratama tanjung benoa Nusa Dua Bali", "kategori": "resortspa", "phone": "0361261001", "diskon": "Spesial price","gambar": "BALI KHAMA.jpg", "keterangan": "Spesial price utk pelanggan Telkomsel sampai dengan 01 Oktober 2013"},
                {"id": 15, "nama": "KUTA STATION PARADISO BOWLING AND BILIARD", "alamat": "Jalan kartika plaza 8x Kuta", "kategori": "sport", "phone": "0361758828", "diskon": "Discount 20%","gambar": "KUTA STATION PARADISO BOWLING AND BILIARD.jpg", "keterangan": "Discount 20% untuk setiap transaksi minimal Rp. 200.000 Berlaku Hingga 20 Juni 2013"},
                {"id": 16, "nama": "MEAZZA FUTSAL", "alamat": "Jl Marlboro Barat 88 Z Denpasar", "kategori": "sport", "phone": "03618089700", "diskon": "Discount 50%","gambar": "MEAZZA FUTSAL.jpg", "keterangan": "Nikmati Discount 50% Biaya Sewa Lapangan Futsal Berlaku hingga 31 Maret 2014"},
                {"id": 17, "nama": "TOMS YAMAHA MUSIC SCHOOL", "alamat": "Jl. by pass Ngurah Rai 88x kuta", "kategori": "education", "phone": "0361766788", "diskon": "discount 20%","gambar": "TOMS YAMAHA MUSIC SCHOOL.jpg", "keterangan": "Discount 20 % untuk biaya pendaftaran sampai 15 April 2013"},
                {"id": 18, "nama": "DONAT MADU", "alamat": "Jl.Nusa Kambangan No. 20 Denpasar, Bali Indonesia 80113", "kategori": "kuliner", "phone": "085339101466", "diskon": "Discount 10%","gambar": "DONAT MADU.jpg", "keterangan": "Dapatkan Discount 10% untuk setiap pembelian minimal selusin donat"},
                {"id": 19, "nama": "FLORENCE BAKERY", "alamat": "Jl. Raya puputan renon no 56 denpasar", "kategori": "kuliner", "phone": "0361234122", "diskon": "Discount 10%","gambar": "FLORENCE BAKERY.jpg", "keterangan": "Discount 10 % all item ke pelanggan Telkomsel. Berlaku 2 juli 2012 s/d januari 2013"},
                {"id": 20, "nama": "PECEL LELE LELA", "alamat": "jl. Teuku umar no.251 denpasar", "kategori": "kuliner", "phone": "03617880505", "diskon": "Discount 20%","gambar": "PECEL LELE LELA.jpg", "keterangan": "Discount 20% untuk semua pelanggan TELKOMSEL, Berlaku hingga 17 january 2013"},
                {"id": 21, "nama": "PONDOK KURING", "alamat": "Jl. Raya puputan renon no 56 denpasar", "kategori": "kuliner", "phone": "0361234122", "diskon": "Discount 15 %","gambar": "PONDOK KURING.jpg", "keterangan": "Discount 15 % all item Berlaku Hingga 2 Januari 2013"},
                {"id": 22, "nama": "SITARA INDIAN RESTAURANT", "alamat": "Jl. Teuku Umar No. 137 B Denpasar Bali", "kategori": "kuliner", "phone": "03618406552", "diskon": "Discount 20%","gambar": "SITARA INDIAN RESTAURANT.jpg", "keterangan": "Nikmati Discount 20% (food only) Berlaku hingga 11 Januari 2013"},
                {"id": 23, "nama": "THE GAROUPA SEAFOOD AND DINE", "alamat": "Jl. Raya Kuta Br. Abian Base No 21 a,b,c", "kategori": "kuliner", "phone": "0361764925", "diskon": "Discount 10%","gambar": "THE GAROUPA SEAFOOD AND DINE.jpg", "keterangan": "Discount 10% all pelanggan Telkomsel sampai 24 september 2013"},
                {"id": 24, "nama": "VI AI PI", "alamat": "Jl Legian 88 kuta Bali", "kategori": "kuliner", "phone": "0361750425", "diskon": "Discount 20%","gambar": "VI AI PI.jpg", "keterangan": "Discount 20% Untuk beverage dan 25% food all item sampai 31 maret 2014"},
                {"id": 25, "nama": "PONDOK KURING", "alamat": "Jl. Raya puputan renon no 56 denpasar", "kategori": "kuliner", "phone": "0361234122", "diskon": "Discount 15 %","gambar": "PONDOK KURING.jpg", "keterangan": "Discount 15 % all item Berlaku Hingga 2 Januari 2013"},
                {"id": 26, "nama": "WARUNG BENDEGA", "alamat": "Jl Cok Agung Tresna 37 A, Renon", "kategori": "kuliner", "phone": "0361249555", "diskon": "Discount 25%","gambar": "WARUNG BENDEGA.jpg", "keterangan": "Discount 25% all pelanggan Telkomsel untuk Menu tertentu Sampai Dengan 30 April 2013"},
                {"id": 27, "nama": "ZUHIYA MODERN JAPANESE DINING", "alamat": "Jl Raya Seminyak 14 Kuta", "kategori": "kuliner", "phone": "081288888227", "diskon": "Discount 20%","gambar": "ZUHIYA MODERN JAPANESE DINING.jpg", "keterangan": "Discount 20 % untuk all F&B sampai dengan 5 Mei 2013"},
                {"id": 28, "nama": "CAH AYU", "alamat": "Jl. Raya Batubulan No. 99 denpasar", "kategori": "mart", "phone": "0361298951", "diskon": "Discount 20%","gambar": "CAH AYU.jpg", "keterangan": "discoount 20% sampai dengan 13 Agustus 2013"},
                {"id": 29, "nama": "DC SHOP", "alamat": "Jl. Dr. Soetomo Kr Baru Mataram", "kategori": "mart", "phone": "081339757575", "diskon": "Diskon 20%","gambar": "DC SHOP.jpg", "keterangan": " Parfum paket beli 1 gratis 1 @paket Rp. 160.000, Paket pengiriman Platinum Logistic Discount 5% Berlaku Sampau dengan 10 Pebruari 2014"},
                {"id": 30, "nama": "PADI COLLECTION UBUD", "alamat": "Jl. Raya Ubud, Ubud", "kategori": "mart", "phone": "0361970720", "diskon": "Discount 10%","gambar": "PADI COLLECTION UBUD.jpg", "keterangan": "Nikmati Disc 10% Purchased untuk Semua pelanggan Telkomsel Berlaku hingga 31 Agustus 2012"},
                {"id": 31, "nama": "TOMS YAMAHA MUSIC AND SOUND", "alamat": "Jalan By Pass Ngurah Rai 88x Kuta", "kategori": "mart", "phone": "0361766788", "diskon": "Discount 50%","gambar": "TOMS YAMAHA MUSIC AND SOUND.jpg", "keterangan": "Discount 50% special item dengan merk FORTE sampai dengan 15 April 2013"},
                {"id": 32, "nama": "NAKAMURA THE HEALING TOUCH", "alamat": "Jl Gatot subroto Timur", "kategori": "medical", "phone": "0361430101", "diskon": "Discount 35%","gambar": "NAKAMURA THE HEALING TOUCH.jpg", "keterangan": "Discount 35% utk pelanggan Telkomsel (syarat & ketentuan Berlaku) sampai 03 Februari 2013"},
                {"id": 33, "nama": "Klinik D I Skin Center", "alamat": "Jl. Raya Puputan No. 70 Denpasar", "kategori": "medical", "phone": "0361430101", "diskon": "Discount 25%","gambar": "DI Skin Center.jpg", "keterangan": "Discount 25% all treatment sampai dengan 1 Oktober 2013"},
                {"id": 34, "nama": "BALI ORCHID SPA", "alamat": "Jl. By pass ngurah rai no. 108 Suwung kauh Kuta", "kategori": "resortspa", "phone": "03619290770", "diskon": "Discount 30%","gambar": "BALI ORCHID SPA.jpg", "keterangan": "Dapatkan Discount 30% utk all item treatment"},
                {"id": 35, "nama": "BALI RATU", "alamat": "Jl. Kartika Plaza No.18 Tuban-Kuta", "kategori": "resortspa", "phone": "0361753464", "diskon": "Discount 20%","gambar": "BALI RATU.jpg", "keterangan": "Dapatkan Discount 20% (semua pelanggan TELKOMSEL) berlaku hingga 15 maret 2013"},
                {"id": 36, "nama": "DENBUKIT SUITE AND RESIDENCE JIMBARAN", "alamat": "Jl. Wisma Udayana Jimbaran", "kategori": "resortspa", "phone": "03618953646", "diskon": "Discount 40%","gambar": "DENBUKIT.jpg", "keterangan": "Discount 40% Nett Untuk All Customer Telkomsel dan Return Airport Transfer Free Berlaku Sampai Dengan 31 Maret 2014"},
                {"id": 33, "nama": "Klinik D I Skin Center", "alamat": "Jl. Raya Puputan No. 70 Denpasar", "kategori": "medical", "phone": "0361430101", "diskon": "Discount 25%","gambar": "DI Skin Center.jpg", "keterangan": "Discount 25% all treatment sampai dengan 1 Oktober 2013"},
                {"id": 34, "nama": "BALI ORCHID SPA", "alamat": "Jl. By pass ngurah rai no. 108 Suwung kauh Kuta", "kategori": "resortspa", "phone": "03619290770", "diskon": "Discount 30%","gambar": "BALI ORCHID SPA.jpg", "keterangan": "Dapatkan Discount 30% utk all item treatment"},
                {"id": 35, "nama": "BALI RATU", "alamat": "Jl. Kartika Plaza No.18 Tuban-Kuta", "kategori": "resortspa", "phone": "0361753464", "diskon": "Discount 20%","gambar": "BALI RATU.jpg", "keterangan": "Dapatkan Discount 20% (semua pelanggan TELKOMSEL) berlaku hingga 15 maret 2013"},
                {"id": 36, "nama": "DENBUKIT SUITE AND RESIDENCE JIMBARAN", "alamat": "Jl. Wisma Udayana Jimbaran", "kategori": "resortspa", "phone": "03618953646", "diskon": "Discount 40%","gambar": "DENBUKIT.jpg", "keterangan": "Discount 40% Nett Untuk All Customer Telkomsel dan Return Airport Transfer Free Berlaku Sampai Dengan 31 Maret 2014"},
                {"id": 37, "nama": "ESSENCE SPA", "alamat": "Jl. sunset road no 88 Denpasar", "kategori": "resortspa", "phone": "03618725588", "diskon": "Discount 40%","gambar": "ESSENCE SPA.jpg", "keterangan": "Discount 40% all pelanggan TELKOMSEL sampai dengan 31 Juni 2013"},
                {"id": 38, "nama": "FAVE HOTEL DENPASAR", "alamat": "Jl Teuku Umar no 175-179 Denpasar", "kategori": "resortspa", "phone": "03618422299", "diskon": "Discount 50%","gambar": "FAVE HOTEL DENPASAR.jpg", "keterangan": "Discount 50% Room Rate Dari Publish Rate Berlaku Hingga : 31 Desember 2013"},
                {"id": 39, "nama": "INNA GRAND BALI BEACH HOTEL", "alamat": "Jl. Hangtuah Sanur Bali", "kategori": "resortspa", "phone": "0361288511", "diskon": "Discount 50%","gambar": "INNA GRAND BALI BEACH HOTEL.jpg", "keterangan": "50% discount untuk room rate, 10% F&B di seluruh restorant dan Bar Inna grand Bali Beach sampai Oktober 2013"},
                {"id": 40, "nama": "INNA GRAND BALI BEACH SPA", "alamat": "Jl. Hang Tuah,Sanur - Bali 80032", "kategori": "resortspa", "phone": "0361288511", "diskon": "Discount 75%","gambar": "INNA GRAND BALI BEACH SPA.jpg", "keterangan": "Nikmati Discount 75% untuk pelanggan TELKOMSEL Berlaku Hingga 1 Maret 2013"},
                {"id": 41, "nama": "MACA VILLAS AND SPA", "alamat": "Jl Lebak Sari no & Petitenget, Seminyak", "kategori": "resortspa", "phone": "0361739090", "diskon": "Discount 50%","gambar": "MACA VILLAS AND SPA.jpg", "keterangan": "Discount 50% dari harga publish Sampai Dengan 4 Maret 2014"},
                {"id": 42, "nama": "RAMADA RESORT", "alamat": "Jl. Pura bagus teruna, legian kaja, Kuta, Bali", "kategori": "resortspa", "phone": "0361752877", "diskon": "Discount 25%","gambar": "RAMADA RESORT.jpg", "keterangan": "Dapatkan discount 25% room rate from publish rate, Discount 20% F&B di resto hotel, Discount 25% spa treatment at salila spa. Hingga 1 Agustus 2013"},
                {"id": 43, "nama": "ROI N REINE", "alamat": "Jl. Raya Puputan Renon no 20G Denpasar Bali 80226", "kategori": "resortspa", "phone": "0361261133", "diskon": "Discount 30%","gambar": "ROI N REINE.jpg", "keterangan": "Nikmati Discount 30% untuk semua pelanggan TELKOMSEL Berlaku sampai 31 Desember 2012"},
                {"id": 44, "nama": "RUMAH LULUR BALI TANGI", "alamat": "Jl. Sunset road No 18 Kuta bali", "kategori": "resortspa", "phone": "0361763574", "diskon": "Discount 15%","gambar": "RUMAH LULUR BALI TANGI.jpg", "keterangan": "Discount 15% all pelangggan TELKOMSEL sampai 20 Maret 2013"},
                {"id": 45, "nama": "SWISS-BEL HOTEL", "alamat": "Jl. Kebo iwa, taman mumbul, Nusa dua, Bali 80000", "kategori": "resortspa", "phone": "03617809437", "diskon": "Discount 75%","gambar": "INNA GRAND BALI BEACH SPA.jpg", "keterangan": "Nikmati Discount 75% untuk pelanggan TELKOMSEL Berlaku Hingga 1 Maret 2013"},
                {"id": 46, "nama": "THE VILLAS BALI", "alamat": "Jl.Kunti 118X Seminyak BALI", "kategori": "resortspa", "phone": "0361730840", "diskon": "Discount 20%","gambar": "THE VILLAS BALI.jpg", "keterangan": "Nikmati Discount 20% untuk Pelanggan Priority TELKOMSEL"}
            ]
            ;

        var l = insmerchant.length;

        var sql = "INSERT OR REPLACE INTO tbmerchant " +
            "(id, nama, alamat, kategori, phone, diskon, gambar, keterangan) " +
            "VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        var m;

        // Loop through sample data array and insert into db
        for (var i = 0; i < l; i++) {
            m = insmerchant[i];
            tx.executeSql(sql, [m.id, m.nama, m.alamat, m.kategori, m.phone, m.diskon, m.gambar, m.keterangan],
                    function() {            // Success callback
                        console.log('DEBUG - 4. Sample data DB insert success');
                    },
                    function(tx, error) {   // Error callback
                        alert('INSERT error: ' + error.message);
                    });
        }

    }

    this.findAuto = function(callback) {

        this.db.transaction(
            function(tx) {
                var sql = "SELECT * FROM tbmerchant WHERE kategori='automotif' ";

                tx.executeSql(sql, [], function(tx, results) {
                    var len = results.rows.length,
                        insmerchant = [],
                        i = 0;

                    // Semicolon at the start is to skip the initialisation of vars as we already initalise i above.
                    for (; i < len; i = i + 1) {
                        insmerchant[i] = results.rows.item(i);
                    }

                    // Passes a array with values back to calling function
                    callback(insmerchant);
                });
            },
            function(error) {
                alert("Transaction Error findAuto: " + error.message);
            }
        );
    }

     this.findEdu = function(callback) {

        this.db.transaction(
            function(tx) {
                var sql = "SELECT * FROM tbmerchant WHERE kategori='education' ";

                tx.executeSql(sql, [], function(tx, results) {
                    var len = results.rows.length,
                        insmerchant = [],
                        i = 0;

                    // Semicolon at the start is to skip the initialisation of vars as we already initalise i above.
                    for (; i < len; i = i + 1) {
                        insmerchant[i] = results.rows.item(i);
                    }

                    // Passes a array with values back to calling function
                    callback(insmerchant);
                });
            },
            function(error) {
                alert("Transaction Error findEdu: " + error.message);
            }
        );
    }


    this.findKuli = function(callback) {

        this.db.transaction(
            function(tx) {
                var sql = "SELECT * FROM tbmerchant WHERE kategori='kuliner' ";

                tx.executeSql(sql, [], function(tx, results) {
                    var len = results.rows.length,
                        insmerchant = [],
                        i = 0;

                    // Semicolon at the start is to skip the initialisation of vars as we already initalise i above.
                    for (; i < len; i = i + 1) {
                        insmerchant[i] = results.rows.item(i);
                    }

                    // Passes a array with values back to calling function
                    callback(insmerchant);
                });
            },
            function(error) {
                alert("Transaction Error findKuli: " + error.message);
            }
        );
    }


    this.findMart = function(callback) {

        this.db.transaction(
            function(tx) {
                var sql = "SELECT * FROM tbmerchant WHERE kategori='mart' ";

                tx.executeSql(sql, [], function(tx, results) {
                    var len = results.rows.length,
                        insmerchant = [],
                        i = 0;

                    // Semicolon at the start is to skip the initialisation of vars as we already initalise i above.
                    for (; i < len; i = i + 1) {
                        insmerchant[i] = results.rows.item(i);
                    }

                    // Passes a array with values back to calling function
                    callback(insmerchant);
                });
            },
            function(error) {
                alert("Transaction Error findMart: " + error.message);
            }
        );
    }

this.findMedic = function(callback) {

        this.db.transaction(
            function(tx) {
                var sql = "SELECT * FROM tbmerchant WHERE kategori='medical' ";

                tx.executeSql(sql, [], function(tx, results) {
                    var len = results.rows.length,
                        insmerchant = [],
                        i = 0;

                    // Semicolon at the start is to skip the initialisation of vars as we already initalise i above.
                    for (; i < len; i = i + 1) {
                        insmerchant[i] = results.rows.item(i);
                    }

                    // Passes a array with values back to calling function
                    callback(insmerchant);
                });
            },
            function(error) {
                alert("Transaction Error findMedic: " + error.message);
            }
        );
    }


    this.findRecreation = function(callback) {

        this.db.transaction(
            function(tx) {
                var sql = "SELECT * FROM tbmerchant WHERE kategori='recreation' ";

                tx.executeSql(sql, [], function(tx, results) {
                    var len = results.rows.length,
                        insmerchant = [],
                        i = 0;

                    // Semicolon at the start is to skip the initialisation of vars as we already initalise i above.
                    for (; i < len; i = i + 1) {
                        insmerchant[i] = results.rows.item(i);
                    }

                    // Passes a array with values back to calling function
                    callback(insmerchant);
                });
            },
            function(error) {
                alert("Transaction Error findRecreation: " + error.message);
            }
        );
    }


    this.findResort = function(callback) {

        this.db.transaction(
            function(tx) {
                var sql = "SELECT * FROM tbmerchant WHERE kategori='resortspa' ";

                tx.executeSql(sql, [], function(tx, results) {
                    var len = results.rows.length,
                        insmerchant = [],
                        i = 0;

                    // Semicolon at the start is to skip the initialisation of vars as we already initalise i above.
                    for (; i < len; i = i + 1) {
                        insmerchant[i] = results.rows.item(i);
                    }

                    // Passes a array with values back to calling function
                    callback(insmerchant);
                });
            },
            function(error) {
                alert("Transaction Error findResort: " + error.message);
            }
        );
    }


     this.findSport = function(callback) {

        this.db.transaction(
            function(tx) {
                var sql = "SELECT * FROM tbmerchant WHERE kategori='sport' ";

                tx.executeSql(sql, [], function(tx, results) {
                    var len = results.rows.length,
                        insmerchant = [],
                        i = 0;

                    // Semicolon at the start is to skip the initialisation of vars as we already initalise i above.
                    for (; i < len; i = i + 1) {
                        insmerchant[i] = results.rows.item(i);
                    }

                    // Passes a array with values back to calling function
                    callback(insmerchant);
                });
            },
            function(error) {
                alert("Transaction Error findSport: " + error.message);
            }
        );
    }


    this.findById = function(id, callback) {

        this.db.transaction(
            function(tx) {

                var sql = "SELECT * FROM tbmerchant WHERE id=?";

                tx.executeSql(sql, [id], function(tx, results) {

                    // This callback returns the first results.rows.item if rows.length is 1 or return null
                    callback(results.rows.length === 1 ? results.rows.item(0) : null);
                });
            },
            function(error) {
                alert("Transaction Error: " + error.message);
            }
        );
    }




    this.initializeDatabase(successCallback, errorCallback);
}