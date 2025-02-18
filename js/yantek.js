var WebSqlDB = function(successCallback, errorCallback) {
    this.initializeDatabase = function(successCallback, errorCallback) {
        var self = this;
        this.db = window.openDatabase("DBYantek", "1.0", "Yantek DB", 200000);
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
        tx.executeSql('DROP TABLE IF EXISTS tbmerchant');
        var sql = "CREATE TABLE IF NOT EXISTS data_perintisan ( " +
            "id INTEGER PRIMARY KEY AUTOINCREMENT, " +
            "kd_unit, " +
            "tanggal, " +
            "penyulang, " +
            "lokasi, " +
            "jenis_line, " +
            "kms)";
        tx.executeSql(sql, null,
                function() {
                    console.log('sukses buat tabel');
                    alert('sukses buat tabel');
                },
                function(tx, error) {
                    alert('Gagal buat tabel : ' + error.message);
                });
    }
    this.initializeDatabase(successCallback, errorCallback);
}