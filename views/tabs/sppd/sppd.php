<?php
// Rincian SPPD
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses != "1" && $akses_view != "1")) {
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";
} else {
    $foldernya = "api/sppd/";
    ?>
    <script type="text/javascript">
        function doSearchsppd() {
            $('#dgsppd').datagrid('load', {
                statussppdcari: $('#statussppdcari').combobox('getValue'),
                nipsppdcari: $('#nipsppdcari').textbox('getValue'),
                jenis_sppdsppdcari: $('#jenis_sppdsppdcari').combobox('getValue'),
            });
        }

        function onSelectkelompoksppdcari() {
            var nilai1 = $('#kelompoksppdcari').combobox('getValue');
            var nilai2 = $('#kd_regionsppdcari').combobox('getValue');
            var nilai3 = $('#kd_cabangsppdcari').combobox('getValue');
            // file tidak ada
            var url1 = 'get_spksppdcari.php?kelompok=' + nilai1 + '&kd_region=' + nilai2 + '&kd_cabang=' + nilai3;
            //alert(url1);
            $('#no_spksppdcari').combogrid('clear');
            $('#no_spksppdcari').combogrid('grid').datagrid('reload', url1);
            $('#no_spksppdcari').combogrid('setValue', 'SEMUA');
        }

        function onSelectregionsppdcari() {
            var nilai1 = $('#kelompoksppdcari').combobox('getValue');
            var nilai2 = $('#kd_regionsppdcari').combobox('getValue');
            var nilai3 = $('#kd_cabangsppdcari').combobox('getValue');
            var url1 = 'get_spksppdcari.php?kelompok=' + nilai1 + '&kd_region=' + nilai2 + '&kd_cabang=' + nilai3;
            var url2 = 'get_cabangsppdcari.php?kd_region=' + nilai2;
            //alert(url1);
            $('#kd_cabangsppdcari').combobox('enable');
            $('#kd_cabangsppdcari').combobox('clear');
            $('#kd_cabangsppdcari').combobox('reload', url2);
            $('#kd_cabangsppdcari').combobox('setValue', '000');

            $('#no_spksppdcari').combogrid('clear');
            $('#no_spksppdcari').combogrid('grid').datagrid('reload', url1);
            $('#no_spksppdcari').combogrid('setValue', 'SEMUA');
        }

        function onSelectcabangsppdcari() {
            var nilai1 = $('#kelompoksppdcari').combobox('getValue');
            var nilai2 = $('#kd_regionsppdcari').combobox('getValue');
            var nilai3 = $('#kd_cabangsppdcari').combobox('getValue');
            var url1 = 'get_spksppdcari.php?kelompok=' + nilai1 + '&kd_region=' + nilai2 + '&kd_cabang=' + nilai3;
            //alert(url1);
            $('#no_spksppdcari').combogrid('clear');
            $('#no_spksppdcari').combogrid('grid').datagrid('reload', url1);
            $('#no_spksppdcari').combogrid('setValue', 'SEMUA');
        }

        function onSelectjenissppd() {
            var nilai1 = $('#jenis_sppdsppd').combobox('getValue');
            var url1 = '<?= $foldernya; ?>get_sub_jenis_sppd.php?jenis_sppd=' + nilai1;
            $('#sub_jenis_sppdsppd').combobox('clear');
            $('#sub_jenis_sppdsppd').combobox('reload', url1);
            // $('#sub_jenis_sppdsppd').combobox('setValue','-');
        }

        function hariIni(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            //return [year, month, day].join('-');
            return [year, month].join('-');
        }

        function onSelectblthsppdcari() {
            var nilai1 = $('#blthsppdcari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
        }

        function onSelectkelompoksppd() {
            var nilai1 = $('#kelompoksppd').combobox('getValue');
            var nilai2 = $('#kd_regionsppd').combobox('getValue');
            var nilai3 = $('#kd_cabangsppd').combobox('getValue');
            var url1 = 'get_spksppd.php?kelompok=' + nilai1 + '&kd_region=' + nilai2 + '&kd_cabang=' + nilai3;
            //alert(url1);
            $('#no_spksppd').combogrid('clear');
            $('#no_spksppd').combogrid('grid').datagrid('reload', url1);
            $('#no_spksppd').combogrid('setValue', 'SEMUA');
        }

        function onSelectregionsppd() {
            var nilai1 = $('#kelompoksppd').combobox('getValue');
            var nilai2 = $('#kd_regionsppd').combobox('getValue');
            var nilai3 = $('#kd_cabangsppd').combobox('getValue');
            var url1 = 'get_spksppd.php?kelompok=' + nilai1 + '&kd_region=' + nilai2 + '&kd_cabang=' + nilai3;
            var url2 = 'get_cabangsppd.php?kd_region=' + nilai2;
            $('#kd_cabangsppd').combobox('enable');
            $('#kd_cabangsppd').combobox('clear');
            $('#kd_cabangsppd').combobox('reload', url2);
            $('#kd_cabangsppd').combobox('setValue', '000');

            $('#no_spksppd').combogrid('clear');
            $('#no_spksppd').combogrid('grid').datagrid('reload', url1);
            $('#no_spksppd').combogrid('setValue', 'SEMUA');
        }

        function onSelectcabangsppd() {
            var nilai1 = $('#kelompoksppd').combobox('getValue');
            var nilai2 = $('#kd_regionsppd').combobox('getValue');
            var nilai3 = $('#kd_cabangsppd').combobox('getValue');
            var url1 = 'get_spksppd.php?kelompok=' + nilai1 + '&kd_region=' + nilai2 + '&kd_cabang=' + nilai3;
            $('#no_spksppd').combogrid('clear');
            $('#no_spksppd').combogrid('grid').datagrid('reload', url1);
            $('#no_spksppd').combogrid('setValue', 'SEMUA');
        }

        function onSelectregionsppd2() {
            var nilai1 = $('#kd_regionsppd2').combobox('getValue');
            var url2 = 'get_cabangsppd2.php?kd_region=' + nilai1;
            $('#kd_cabangsppd2').combobox('enable');
            $('#kd_cabangsppd2').combobox('clear');
            $('#kd_cabangsppd2').combobox('reload', url2);
            $('#kd_cabangsppd2').combobox('setValue', '000');
        }

        function onSelectprojectsppd() {
            var nilai1 = $('#kd_projectsppd').combobox('getValue');
            var url2 = 'get_unitsppd.php?kd_project=' + nilai1;
            $('#kd_unitsppd').combobox('enable');
            $('#kd_unitsppd').combobox('clear');
            $('#kd_unitsppd').combobox('reload', url2);
        }

        function onSelectprojectsppd2() {
            var nilai1 = $('#kd_projectsppd2').combobox('getValue');
            var url2 = 'get_unitsppd2.php?kd_project=' + nilai1;
            $('#kd_unitsppd2').combobox('enable');
            $('#kd_unitsppd2').combobox('clear');
            $('#kd_unitsppd2').combobox('reload', url2);
        }

        function formatrp2(val, row) {
            if (val === "") {
                return "";
            } else {
                return number_format2(val, 0, ',', '.');
            }
        };

        function number_format2(num, dig, dec, sep) {
            x = new Array();
            s = (num < 0 ? "-" : "");
            num = Math.abs(num).toFixed(dig).split(".");
            r = num[0].split("").reverse();
            for (var i = 1; i <= r.length; i++) { x.unshift(r[i - 1]); if (i % 3 == 0 && i != r.length) x.unshift(sep); }
            //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
            return s + x.join("") + (num[1] ? dec + num[1] : "");
        }

        // function formatrp3(val, row) {
        //     if (val === "") {
        //         return "";
        //     } else {
        //         return number_format3(val, 3, ',', '.');
        //     }
        // };

        // function number_format3(num, dig, dec, sep) {
        //     x = new Array();
        //     s = (num < 0 ? "-" : "");
        //     num = Math.abs(num).toFixed(dig).split(".");
        //     r = num[0].split("").reverse();
        //     for (var i = 1; i <= r.length; i++) { x.unshift(r[i - 1]); if (i % 3 == 0 && i != r.length) x.unshift(sep); }
        //     //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
        //     return s + x.join("") + (num[1] ? dec + num[1] : "");
        // }

        // function formatrp4(val, row) {
        //     if (val === "") {
        //         return "";
        //     } else {
        //         return number_format4(val, 2, ',', '.');
        //     }
        // };

        // function number_format4(num, dig, dec, sep) {
        //     x = new Array();
        //     s = (num < 0 ? "-" : "");
        //     num = Math.abs(num).toFixed(dig).split(".");
        //     r = num[0].split("").reverse();
        //     for (var i = 1; i <= r.length; i++) { x.unshift(r[i - 1]); if (i % 3 == 0 && i != r.length) x.unshift(sep); }
        //     //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
        //     return s + x.join("") + (num[1] ? dec + num[1] : "");
        // }

        function aksisppd(value, row, index) {
            var akses_proses = "<?= $akses_proses; ?>";
            // console.log("akses_proses : ", akses_proses);
            // console.log("row : ", row);
            // console.log("index : ", index);
            // // cek apakah nilai hanya 0 atau 1
            // console.log("row.totalsppd : ", row.totalsppd); 
            // console.log("row.validasi_biayasppd : ", row.validasi_biayasppd); 
            // console.log("row.bayarsppd : ", row.bayarsppd); 
            // console.log("row.bayarsppd : ", row.bayarsppd); 
            // console.log("-------------------------------");
            if (parseInt(akses_proses) === 1) {
                // Total SPPD: (tabel biaya_sppd['total']) Biaya untuk Perjalanan SPPD, diinputkan ketika?
                // jika totalsppd = 0, validasi_biayasppd = 0, bayarsppd = 0
                // fungsi on: edit, hapus, pengikut, resetsdm
                // fungsi off: VALIDASI, RESETVALIDASI
                // Approve SDM 2 berarti sudah 
                if (parseFloat(row.totalsppd) === 0 && parseFloat(row.validasi_biayasppd) === 0 && parseFloat(row.bayarsppd) === 0) {
                    // bisa edit jika belum bayar SPPD
                    var edit = '<a href="javascript:void(0)" title="Edit Data" onclick="editsppd(\'' + index + '\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;"><i class="fa fa-pencil-alt"></i></button></a>';
                    var hapus = '<a href="javascript:void(0)" title="Hapus Data" onclick="destroysppd(\'' + index + '\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;"><i class="fa fa-times"></i></button></a>';
                    var pengikut = '<a href="javascript:void(0)" title="Pengikut" onclick="pengikutsppd(\'' + index + '\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;"><i class="fa fa-user"></i></button></a>';
                    var resetSDM = '<a href="javascript:void(0)" title="Reset Approval SDM" onclick="resetsdm(\'' + index + '\')"><button class="easyui-linkbutton info" style="width:90px;height:25px;font-size:.7rem !important">RESET SDM</button></a>';
                    var validasi = '<a><button class="easyui-linkbutton c2" style="width:90px;height:25px;">VALIDASI</button></a>';
                    var resetValidasi = '<a><button class="easyui-linkbutton c2" style="width:90px;min-height:25px;">RESET VALIDASI</button></a>';
                } else {
                    var edit = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                    var hapus = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                    var pengikut = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;"><i class="fa fa-user"></i></button></a>';
                    var resetSDM = '<a><button class="easyui-linkbutton c2" style="width:90px;height:25px;font-size:.7rem !important">RESET SDM</button></a>';
                    // dibawah aktif jika total sppd agendasppd
                    if (parseFloat(row.bayarsppd) === 0) {
                        if (parseFloat(row.validasi_biayasppd) === 0) {
                            // Validasi Aktif jika belum bayarsppd, tapi totalsppd == 1, atau validasi_biayasppd === 1 
                            var validasi = '<a href="javascript:void(0)" title="Validasi Biaya" onclick="validasi(\'' + index + '\')"><button class="easyui-linkbutton c1" style="width:90px;height:25px;">VALIDASI BIAYA</button></a>';
                            var resetValidasi = '<a><button class="easyui-linkbutton c2" style="width:90px;min-height:25px;">RESET VALIDASI</button></a>';
                        } else {
                            // Reset validasi dilakukan ketika sudah validasi biaya (vaiidasi)
                            var validasi = '<a><button class="easyui-linkbutton c2" style="width:90px;height:25px;">VALIDASI</button></a>';
                            var resetValidasi = '<a href="javascript:void(0)" title="Reset Validasi Biaya" onclick="resetvalidasi(\'' + index + '\')"><button class="easyui-linkbutton c5" style="width:90px;min-height:25px;">RESET VALIDASI</button></a>';
                        }
                    } else {
                        // Jika sudah Bayar (tidak bisa validasi ataupun )
                        var validasi = '<a><button class="easyui-linkbutton c2" style="width:90px;height:25px;">VALIDASI</button></a>';
                        var resetValidasi = '<a><button class="easyui-linkbutton c2" style="width:90px;min-height:25px;">RESET VALIDASI</button></a>';
                    }
                }
            } else {
                var edit = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var hapus = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                var pengikut = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;"><i class="fa fa-user"></i></button></a>';
                var resetSDM = '<a><button class="easyui-linkbutton c2" style="width:90px;height:25px;font-size:.7rem !important">RESET SDM</button></a>';
                var validasi = '<a><button class="easyui-linkbutton c2" style="width:90px;height:25px;">VALIDASI</button></a>';
                var resetValidasi = '<a><button class="easyui-linkbutton c2" style="width:90px;min-height:25px;">RESET VALIDASI</button></a>';
            }
            return edit + hapus + pengikut + "<br/>" + resetSDM + "<br/>" + validasi + "<br/>" + resetValidasi;
        }

        function biayasppd(value, row, index) {
            var akses_proses = "<?= $akses_proses; ?>";
            if (parseInt(akses_proses) === 1) {
                if (parseInt(row.validasi_biayasppd) === 0 && parseInt(row.approvesdmsppd) === 2) {
                    var hitungBiaya = '<a href="javascript:void(0)" title="Hitung Biaya" onclick="hitungbiaya(\'' + index + '\')"><button class="easyui-linkbutton c1" style="width:28px;height:25px;"><i class="fa fa-cog" style="font-size:8px !important;"></i></button></a>';
                    var resetBiaya = '<a href="javascript:void(0)" title="Reset Biaya" onclick="resetbiaya(\'' + index + '\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                } else {
                    var hitungBiaya = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;"><i class="fa fa-cog" style="font-size:10px;"></i></button></a>';
                    var resetBiaya = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                }
                // Total SPPD harus diatas 1 agar bisa di ajukan validasi biaya
                // Untuk sekarang dibuat always true karena kita tidak tau kapan memang rincian dan cetak tidak digunakan??
                // Cetak Hanya bisa dilakuan ketika sudah di validasi biaya nya
                // if (parseFloat(row.totalsppd) == 0) {
                // } else {
                //     // Form hanya dapat dicetak jika Sudah divalidasi oleh semua ORG (Admin SPPD)
                //     var rincianBiaya = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;"><i class="fa fa-credit-card" style="font-size:8px !important;"></i></button></a>';
                // }
                var rincianBiaya = '<a href="javascript:void(0)" title="Rincian Biaya" onclick="rincianbiaya(\'' + index + '\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;"><i class="fa fa-credit-card" style="font-size:8px !important;"></i></button></a>';
                if (parseFloat(row.totalsppd) > 0) {
                    var cetakForm = '<a href="javascript:void(0)" title="Cetak Form SPPD" onclick="cetaksppd(\'' + index + '\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;"><i class="fa fa-print" style="font-size:8px !important;"></i></button></a>';
                } else {
                    var cetakForm = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;"><i class="fa fa-print" style="font-size:8px !important;"></i></button></a>';
                }
            } else {
                var hitungBiaya = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var resetBiaya = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                var rincianBiaya = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;"><i class="fa fa-cog" style="font-size:8px !important;"></i></button></a>';
                var cetakForm = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;"><i class="fa fa-print" style="font-size:8px !important;"></i></button></a>';
            }
            // jika biaya sudah divalidasi maka cukup berikan icon centang ✅
            if (parseInt(row.validasi_biayasppd) === 1) {
                var setApproval = '<button class="easyui-linkbutton c1" style="width:40px;height:40px;font-size:16px;border:none;cursor:pointer;border-radius:50%;margin-top:5px;pointer-events: none;"><i class="fa fa-check"></i></button>';
            } else {
                // kita bisa melakukan setapproval jika biaya belum di validasi
                // var e = '';
                var setApproval = '<a href="javascript:void(0)" title="Set Approval" onclick="setapprovalsppd(\'' + index + '\')"><button class="easyui-linkbutton c7" style="width:54px;height:25px;font-size:9.5px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;">APROVAL</button></a>';
            }
            return hitungBiaya + resetBiaya + "<br/>" + rincianBiaya + cetakForm + "<br/>" + setApproval;
        }

        function timelinesppd(value, row, index) {
            var a = '<div style="overflow-y:scroll;overflow-x:none;height:120px;text-align:left;padding:5px;background-color:#f7f6f6;color:#000;margin-bottom:5px;white-space:normal !important;">';
            a += '<span style="font-size:10px;white-space:normal;">' + row.timelinesppd + '<span>';
            a += '</div>';
            return a;
        }

        function namanyasppd(value, row, index) {
            var a = '<span style="font-weight:bold;">' + row.nipsppd + '</span>';
            a += '<br/>'
            a += row.namasppd;
            a += '<br/>'
            a += row.tingkat_sppd2sppd;
            a += '<br/>'
            a += '<span style="font-weight:bold;">' + row.jenis_sppd2sppd + '</span>';
            a += '<br/>'
            a += row.level_sppd2sppd;
            return a;
        }

        function maksudnyasppd(value, row, index) {
            var a = '<span style="font-size:11px;font-weight:bold;">' + row.idsppdsppd + '</span>';
            a += '<br/><span style="color:blue;font-size:11px;">' + row.no_sppdsppd + '</span>';
            a += '<br/>' + row.maksudsppd;
            if (row.kd_project_sapsppd !== "") {
                a += '<br/>Cost Center :';
                a += '<br/>' + row.kd_project_sapsppd;
                a += '<br/>' + row.nama_project_sapsppd;
            }
            return a;
        }

        function biayanyasppd(value, row, index) {
            var a = 'Total Biaya SPPD :';
            a += '<br/><span style="font-weight:bold;font-size:14px;">' + row.total2sppd + '</span>';
            a += '<br/><br/>Total Restitusi :';
            a += '<br/><span style="font-weight:bold;font-size:14px;">' + row.restitusi2sppd + '</span>';
            return a;
        }

        function jenisnyasppd(value, row, index) {
            var a = row.tingkat_sppd2sppd;
            a += '<br/>'
            a += '<span style="font-weight:bold;">' + row.jenis_sppd2sppd + '</span>';
            a += '<br/>'
            a += row.level_sppd2sppd;
            return a;
        }

        function kedudukannyasppd(value, row, index) {
            var a = row.kedudukansppd;
            a += '<hr/>'
            a += row.tujuansppd;
            return a;
        }

        function projectnyasppd(value, row, index) {
            var a = row.kedudukansppd;
            a += '<hr/>'
            a += row.tujuansppd;
            return a;
        }

        function validasitanggal() {
            //alert('tes');
            //$("#tgl_akhirsppd").datebox({'disabled':false});
            var tgl_awal = $("#tgl_awalsppd").datebox('getValue');
            var datanya = tgl_awal.split("-");
            var tahun = parseInt(datanya[0]);
            var bulan = parseInt(datanya[1]) - 1;
            var hari = parseInt(datanya[2]);
            $('#tgl_akhirsppd').datebox().datebox('calendar').calendar({
                validator: function (date) {
                    var now = new Date(tahun, bulan, hari);
                    if (date >= now) {
                        return true;
                    } else {
                        return false;
                    }
                }
            });
        }

        function hitunghari() {
            var tgl_awal = $("#tgl_awalsppd").datebox('getValue');
            var tgl_akhir = $("#tgl_akhirsppd").datebox('getValue');
            if (tgl_awal !== "" && tgl_akhir !== "") {
                var datanya1 = tgl_awal.split("-");
                var tahun1 = parseInt(datanya1[0]);
                var bulan1 = parseInt(datanya1[1]) - 1;
                var hari1 = parseInt(datanya1[2]);
                var tanggal1 = new Date(tahun1, bulan1, hari1);

                var datanya2 = tgl_akhir.split("-");
                var tahun2 = parseInt(datanya2[0]);
                var bulan2 = parseInt(datanya2[1]) - 1;
                var hari2 = parseInt(datanya2[2]);
                var tanggal2 = new Date(tahun2, bulan2, hari2);

                var hari = 24 * 60 * 60 * 1000;
                var Difference_In_Time = tanggal2.getTime() - tanggal1.getTime();
                var jumlah_hari = (Difference_In_Time / (1000 * 3600 * 24)) + 1;
                $("#harisppd").numberbox('setValue', jumlah_hari);
            } else {
                $("#harisppd").numberbox('setValue', 0);
            }
        }

        function hitungtotalbiaya() {
            var transportasi = $("#transportasibiaya").numberbox('getValue');
            var transportasi_lokal = $("#transportasi_lokalbiaya").numberbox('getValue');
            var airport_tax = $("#airport_taxbiaya").numberbox('getValue');
            var total_konsumsi1 = $("#total_konsumsi1biaya").numberbox('getValue');
            var total_laundry1 = $("#total_laundry1biaya").numberbox('getValue');
            var total_penginapan1 = $("#total_penginapan1biaya").numberbox('getValue');
            var total_konsumsi2 = $("#total_konsumsi2biaya").numberbox('getValue');
            var total_laundry2 = $("#total_laundry2biaya").numberbox('getValue');
            var total_penginapan2 = $("#total_penginapan2biaya").numberbox('getValue');
            var total_pegawai = $("#total_pegawaibiaya").numberbox('getValue');
            var total_keluarga = $("#total_keluargabiaya").numberbox('getValue');
            var total_pengantar = $("#total_pengantarbiaya").numberbox('getValue');
            var total_suamiistri = $("#total_suamiistribiaya").numberbox('getValue');
            var total_anak = $("#total_anakbiaya").numberbox('getValue');
            var total_pengepakan = $("#total_pengepakanbiaya").numberbox('getValue');
            var jumlah_total = parseFloat(transportasi) + parseFloat(transportasi_lokal) + parseFloat(airport_tax) + parseFloat(total_konsumsi1) + parseFloat(total_laundry1) + parseFloat(total_penginapan1) + parseFloat(total_konsumsi2) + parseFloat(total_laundry2) + parseFloat(total_penginapan2) + parseFloat(total_pegawai) + parseFloat(total_keluarga) + parseFloat(total_pengantar) + parseFloat(total_suamiistri) + parseFloat(total_anak) + parseFloat(total_pengepakan);
            $("#totalbiaya").numberbox('setValue', jumlah_total);
        }

        function hitungkonsumsi1() {
            var hari_konsumsi1 = $("#hari_konsumsi1biaya").val();
            // var persen_konsumsi1 = $("#persen_konsumsi1biaya").numberbox('getValue');
            var persen_konsumsi1 = $("#persen_konsumsi1biaya").val();
            var nilai_konsumsi1 = $("#nilai_konsumsi12biaya").val();
            var total_konsumsi1 = Math.round((parseFloat(hari_konsumsi1) * parseFloat(nilai_konsumsi1) * parseFloat(persen_konsumsi1)) / 100);
            $("#total_konsumsi1biaya").numberbox('setValue', total_konsumsi1);
        }

        function hitunglaundry1() {
            var hari_laundry1 = $("#hari_laundry1biaya").val();
            // var persen_laundry1 = $("#persen_laundry1biaya").numberbox('getValue');
            var persen_laundry1 = $("#persen_laundry1biaya").val();
            var nilai_laundry1 = $("#nilai_laundry12biaya").val();
            var total_laundry1 = Math.round((parseFloat(hari_laundry1) * parseFloat(nilai_laundry1) * parseFloat(persen_laundry1)) / 100);
            $("#total_laundry1biaya").numberbox('setValue', total_laundry1);
        }

        function hitungpenginapan1() {
            var hari_penginapan1 = $("#hari_penginapan1biaya").val();
            // var persen_penginapan1 = $("#persen_penginapan1biaya").numberbox('getValue');
            var persen_penginapan1 = $("#persen_penginapan1biaya").val();
            var nilai_penginapan1 = $("#nilai_penginapan12biaya").val();
            var total_penginapan1 = Math.round((parseFloat(hari_penginapan1) * parseFloat(nilai_penginapan1) * parseFloat(persen_penginapan1)) / 100);
            $("#total_penginapan1biaya").numberbox('setValue', total_penginapan1);
        }

        function hitungkonsumsi2() {
            var hari_konsumsi2 = $("#hari_konsumsi2biaya").val();
            // var persen_konsumsi2 = $("#persen_konsumsi2biaya").numberbox('getValue');
            var persen_konsumsi2 = $("#persen_konsumsi2biaya").val();
            var nilai_konsumsi2 = $("#nilai_konsumsi22biaya").val();
            var total_konsumsi2 = Math.round((parseFloat(hari_konsumsi2) * parseFloat(nilai_konsumsi2) * parseFloat(persen_konsumsi2)) / 100);
            $("#total_konsumsi2biaya").numberbox('setValue', total_konsumsi2);
        }

        function hitunglaundry2() {
            var hari_laundry2 = $("#hari_laundry2biaya").val();
            // var persen_laundry2 = $("#persen_laundry2biaya").numberbox('getValue');
            var persen_laundry2 = $("#persen_laundry2biaya").val();
            var nilai_laundry2 = $("#nilai_laundry22biaya").val();
            var total_laundry2 = Math.round((parseFloat(hari_laundry2) * parseFloat(nilai_laundry2) * parseFloat(persen_laundry2)) / 100);
            $("#total_laundry2biaya").numberbox('setValue', total_laundry2);
        }

        function hitungpenginapan2() {
            var hari_penginapan2 = $("#hari_penginapan2biaya").val();
            // var persen_penginapan2 = $("#persen_penginapan2biaya").numberbox('getValue');
            var persen_penginapan2 = $("#persen_penginapan2biaya").val();
            var nilai_penginapan2 = $("#nilai_penginapan22biaya").val();
            var total_penginapan2 = Math.round((parseFloat(hari_penginapan2) * parseFloat(nilai_penginapan2) * parseFloat(persen_penginapan2)) / 100);
            $("#total_penginapan2biaya").numberbox('setValue', total_penginapan2);
        }

        function hitungpegawai() {
            var hari_pegawai = $("#hari_pegawaibiaya").val();
            // var persen_pegawai = $("#persen_pegawaibiaya").numberbox('getValue');
            var persen_pegawai = $("#persen_pegawaibiaya").val();
            var nilai_pegawai = $("#nilai_pegawai2biaya").val();
            var total_pegawai = Math.round((parseFloat(nilai_pegawai) * parseFloat(persen_pegawai)) / 100);
            $("#total_pegawaibiaya").numberbox('setValue', total_pegawai);
        }

        function hitungkeluarga() {
            var hari_keluarga = $("#hari_keluargabiaya").val();
            // var persen_keluarga = $("#persen_keluargabiaya").numberbox('getValue');
            var persen_keluarga = $("#persen_keluargabiaya").val();
            var nilai_keluarga = $("#nilai_keluarga2biaya").val();
            var total_keluarga = Math.round((parseFloat(hari_keluarga) * parseFloat(nilai_keluarga) * parseFloat(persen_keluarga)) / 100);
            $("#total_keluargabiaya").numberbox('setValue', total_keluarga);
        }

        function hitungpengantar() {
            var hari_pengantar = $("#hari_pengantarbiaya").val();
            // var persen_pengantar = $("#persen_pengantarbiaya").numberbox('getValue');
            var persen_pengantar = $("#persen_pengantarbiaya").val();
            var nilai_pengantar = $("#nilai_pengantar2biaya").val();
            var total_pengantar = Math.round((parseFloat(hari_pengantar) * parseFloat(nilai_pengantar) * parseFloat(persen_pengantar)) / 100);
            $("#total_pengantarbiaya").numberbox('setValue', total_pengantar);
        }

        function hitungsuamiistri() {
            var hari_suamiistri = $("#hari_suamiistribiaya").val();
            // var persen_suamiistri = $("#persen_suamiistribiaya").numberbox('getValue');
            var persen_suamiistri = $("#persen_suamiistribiaya").val();
            var nilai_suamiistri = $("#nilai_suamiistri2biaya").val();
            var total_suamiistri = Math.round((parseFloat(hari_suamiistri) * parseFloat(nilai_suamiistri) * parseFloat(persen_suamiistri)) / 100);
            $("#total_suamiistribiaya").numberbox('setValue', total_suamiistri);
        }

        function hitunganak() {
            var hari_anak = $("#hari_anakbiaya").val();
            // var persen_anak = $("#persen_anakbiaya").numberbox('getValue');
            var persen_anak = $("#persen_anakbiaya").val();
            var nilai_anak = $("#nilai_anak2biaya").val();
            var total_anak = Math.round((parseFloat(hari_anak) * parseFloat(nilai_anak) * parseFloat(persen_anak)) / 100);
            $("#total_anakbiaya").numberbox('setValue', total_anak);
        }

        function slip(value, row, index) {
            var by2 = '<a href="javascript:void(0)" onclick="cetakslip(\'' + row.nipsppd + '|' + row.blthsppd + '\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple" style="margin-top:3px;margin-bottom:3px;"></i></a>';
            return by2;
        }
        function stylerpendapatan(value, row, index) {
            return 'background: #93CAED;';
        }
        function stylerbenefit(value, row, index) {
            return 'background: #C7E4EE;';
        }
        function stylerupah(value, row, index) {
            return 'background: #ACD1AF;';
        }
        function stylerpotongan(value, row, index) {
            return 'background: #F47174;';
        }

        function styler1(value, row, index) {
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
        }
        $('#kd_project_sapsppd').combobox({
            filter: function (q, row) {
                var opts = $(this).combobox('options');
                return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
            }
        });

    </script>
    <script>
        $('#kd_project_sapsppd').combobox({
            inputEvents: $.extend({}, $.fn.combogrid.defaults.inputEvents, {
                blur: function (e) {
                    var target = e.data.target;
                    var rows = $(target).combobox('getData');
                    var vv = [];
                    $.map($(target).combobox('getValues'), function (v) {
                        if (getRowIndex(target, v) >= 0) {
                            vv.push(v);
                        }
                    });
                    $(target).combobox('setValues', vv);

                    function getRowIndex(target, value) {
                        var state = $.data(target, 'combobox');
                        var opts = state.options;
                        var data = state.data;
                        for (var i = 0; i < data.length; i++) {
                            if (data[i][opts.idField] == value) {
                                return i;
                            }
                        }
                        return -1;
                    }
                }
            })
        });
    </script>

    <script type="text/javascript">
        $(function () {
            $("#dgsppd").datagrid({
                onDblClickRow: function () {
                    //editsppd();
                }
            });
        });
    </script>
    <table id="dgsppd" title="" class="easyui-datagrid" style="width:100%;height:100%;padding-right:20px;"
        url="<?= $foldernya; ?>get_master_sppd.php" pageSize="20" toolbar="#toolbarsppd" pagination="true" nowrap="false"
        method="post" rownumbers="false" fitColumns="false" singleSelect="true">
        <thead frozen="true">
            <tr>
                <th field="aksisppd" width="110" align="center" halign="center"
                    data-options="formatter:aksisppd,styler:styler1">Aksi</th>
                <th field="biayasppd" width="90" align="center" halign="center"
                    data-options="formatter:biayasppd,styler:styler1">Perhitungan<br />Biaya</th>
                <th field="timelinesppd" width="250" align="center" halign="center"
                    data-options="formatter:timelinesppd,styler:styler1">Timeline</th>
                <th field="namanyasppd" width="100"align="left" halign="center"
                    data-options="formatter:namanyasppd,styler:styler1">Nama</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th field="maksudnyasppd" width="240" align="left" halign="center"
                    data-options="formatter:maksudnyasppd,styler:styler1">Nomor SPPDa<br />Maksud Perjalanan Dinas</th>
                <th field="biayanyasppd" width="160" align="center" halign="center"
                    data-options="formatter:biayanyasppd,styler:styler1">Biaya SPPD</th>
                <th field="kedudukannyasppd" width="160" align="center" halign="center"
                    data-options="formatter:kedudukannyasppd,styler:styler1">Kedudukans</th>
                <th field="tujuansppd" width="160" align="center" halign="center" data-options="styler:styler1">Tujuan</th>
                <th field="transportasisppd" width="160" align="center" halign="center" data-options="styler:styler1">
                    Transportasi</th>
                <th field="jaraksppd" width="80" align="center" halign="center"
                    data-options="formatter:formatrp2,styler:styler1">Jarak<br />(KM)</th>
                <th field="tgl_awal2sppd" width="100" align="center" halign="center" data-options="styler:styler1">
                    Tanggal<br />Berangkat</th>
                <th field="tgl_akhir2sppd" width="100" align="center" halign="center" data-options="styler:styler1">
                    Tanggal<br />Kembali</th>
                <th field="harisppd" width="80" align="center" halign="center"
                    data-options="formatter:formatrp2,styler:styler1">Jumlah<br />Hari</th>
            </tr>
        </thead>
    </table>

    <div id="toolbarsppd">
        <div id="tbsppd" style="padding:3px">
            <table>
                <tr>
                    <td>STATUS</td>
                    <td>
                        <select id="statussppdcari" name="statussppdcari" class="easyui-combobox"
                            data-options="required:true,panelHeight:'auto'" style="width: 160px;">
                            <option value="9">Semua</option>
                            <option value="0" selected>Belum Terbayar</option>
                            <option value="1">Sudah Terbayar</option>
                        </select>
                    </td>
                    <td>&nbsp;</td>
                    <td>NIP/NAMA</td>
                    <td>
                        <input class="easyui-textbox" id="nipsppdcari" name="nipsppdcari"
                            data-options="required:false,prompt:''" style="width: 160px;">
                    </td>
                </tr>
                <tr>
                    <td>JENIS SPPD</td>
                    <td>
                        <input class="easyui-combobox" id="jenis_sppdsppdcari" name="jenis_sppdsppdcari"
                            value="semua" style="padding: 2px; width: 160px;" data-options="
                            url:'<?= $foldernya; ?>get_jenis_sppdcari.php',
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                    </td>
                    <td>&nbsp;</td>
                    <td colspan="2">
                        <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search"
                            onclick="doSearchsppd()" style="min-width:90px;">Search</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus" onclick="addsppd()"
                            style="min-width:90px;">Pengajuan SPPD</a>
                    </td>
                </tr>
            </table>
        </div>
        <!--
        <a href="#" class="easyui-linkbutton c1" plain="true" iconCls="fa fa-print" onclick="cetakslip2()" style="min-width:90px;">Slip Kolektif</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" onclick="gajipegawai()" style="min-width:90px;margin-left:10px;">Gaji Pegawai</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-file-excel" onclick="potpegawai()" style="min-width:90px;">Potongan Pegawai</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" onclick="gajihonor()" style="min-width:90px;margin-left:10px;">Gaji Honor</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-file-excel" onclick="pothonor()" style="min-width:90px;">Potongan Honor</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="fa fa-file-excel" onclick="gajirekap()" style="min-width:90px;margin-left:10px;">Rekapitulasi</a>
        -->
    </div>

    <div id="dlgsppd" class="easyui-dialog" modal="true"
        style="min-width:200px;min-height:200px;max-height:500px;padding-left:5px;padding-right:10px;top:30px;"
        closed="true" buttons="#dlg-buttonssppd">
        <form id="fmsppd" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="approval1sppd" name="approval1sppd">
            <input type="hidden" id="approval2sppd" name="approval2sppd">
            <!-- <input type="hidden" id="level_sppdsppd" name="level_sppdsppd"> -->
            <table>
                <tr>
                    <td style="width:300px;">
                        <div>
                            <div class="labelfor"><label>Pegawai</label></div>
                            <input class="easyui-textbox" id="nipsppd" name="nipsppd"
                                style="width: 265px;">
                            <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search"
                                onclick="loadpegawai()" style="width:30px;"></a>
                        </div>
                    </td>
                    <td style="width:300px;padding-left:10px;">
                        <div>
                            <div class="labelfor"><label>Nama</label></div>
                            <input class="easyui-textbox" id="namasppd" name="namasppd"
                                style="width: 100%;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:300px;">
                        <div>
                            <div class="labelfor"><label>Jabatan</label></div>
                            <input class="easyui-textbox" id="jabatansppd" name="jabatansppd"
                                data-options="multiline:true" style="width: 100%;height: 40px;">
                        </div>
                    </td>
                    <td style="width:300px;padding-left:10px;">
                        <div>
                            <div class="labelfor"><label>Level SPPD</label></div>
                            <input class="easyui-textbox" id="level_sppdsppd" name="level_sppdsppd"
                                data-options="multiline:true" style="width: 100%;height: 40px;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:300px;">
                        <div>
                            <div class="labelfor"><label>Atasan Langsung</label></div>
                            <input class="easyui-textbox" id="jabatan_approval1sppd" name="jabatan_approval1sppd"
                                data-options="multiline:true" style="width: 100%;height: 40px;">
                        </div>
                    </td>
                    <td style="width:300px;padding-left:10px;">
                        <div>
                            <div class="labelfor"><label>Atasan</label></div>
                            <input class="easyui-textbox" id="jabatan_approval2sppd" name="jabatan_approval2sppd"
                                data-options="multiline:true" style="width: 100%;height: 40px;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:300px;">
                        <div>
                            <div class="labelfor"><label>Tingkat SPPD</label></div>
                            <input class="easyui-combobox" id="tingkat_sppdsppd" name="tingkat_sppdsppd"
                                style="padding: 2px; width: 100%;" data-options="
                                url:'<?= $foldernya; ?>get_tingkat_sppd.php',
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'auto'
                        ">
                        </div>
                    </td>
                    <td style="width:300px;padding-left:10px;">
                        <div>
                            <div class="labelfor"><label>Jenis SPPD</label></div>
                            <input class="easyui-combobox" id="jenis_sppdsppd" name="jenis_sppdsppd"
                                style="padding: 2px; width: 100%;" data-options="
                                onChange:onSelectjenissppd,
                                url:'<?= $foldernya; ?>get_jenis_sppd.php',
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'auto'
                        ">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:300px;">
                        <div>
                            <div class="labelfor"><label>Sub Jenis SPPD</label></div>
                            <input class="easyui-combobox" id="sub_jenis_sppdsppd"
                                name="sub_jenis_sppdsppd" style="padding: 2px; width: 100%;" data-options="
                                url:'',
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'auto'
                        ">
                        </div>
                    </td>
                    <td style="width:300px;padding-left:10px;">
                        <div>
                            <div class="labelfor"><label>Cost Center</label></div>
                            <input class="easyui-combobox" id="kd_project_sapsppd" editable="true" name="kd_project_sapsppd"
                                style="padding: 2px; width: 100%;" data-options="                                
                                url:'<?= $foldernya; ?>get_project.php',
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>
                            <div class="labelfor"><label>Maksud Perjalanan Dinas</label></div>
                            <input class="easyui-textbox" id="maksudsppd" name="maksudsppd"
                                data-options="multiline:true" style="width: 100%;height: 40px;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>
                            <div class="labelfor"><label>Agenda Kegiatan</label></div>
                            <input class="easyui-textbox" id="agendasppd" name="agendasppd"
                                data-options="multiline:true" style="width: 100%;height: 40px;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:300px;">
                        <div>
                            <div class="labelfor"><label>Kota Kedudukan</label></div>
                            <input class="easyui-textbox" id="kedudukansppd" name="kedudukansppd"
                                data-options="multiline:true" style="width: 265px;height:40px;">
                            <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search"
                                onclick="loadkedudukan()" style="width:30px;"></a>
                        </div>
                    </td>
                    <td style="width:300px;padding-left:10px;">
                        <div>
                            <div class="labelfor"><label>Kota Tujuan</label></div>
                            <input class="easyui-textbox" id="tujuansppd" name="tujuansppd"
                                data-options="multiline:true" style="width: 265px;height:40px;">
                            <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search"
                                onclick="loadtujuan()" style="width:30px;"></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:300px;">
                        <div style="margin-top:5px;">
                            <div class="labelfor"><label>Transportasi</label></div>
                            <select id="transportasisppd" name="transportasisppd" class="easyui-combogrid"
                                style="width:100%;" data-options="
                                panelHeight:'auto',
                                multiple: true,
                                multiline:false,
                                nowrap:false,                            
                                idField: 'value',
                                textField: 'text',
                                url: '<?= $foldernya; ?>get_transportasi.php',
                                method: 'get',
                                columns: [[
                                    {id:'col1', field:'ck',checkbox:true},
                                    {id:'col1', field:'text',title:'Jenis Transportasi',width:200}
                                ]],
                                fitColumns: true
                            ">
                            </select>'
                        </div>
                    </td>
                    <td style="width:300px;padding-left:10px;vertical-align:top;">
                        <div>
                            <div class="labelfor"><label>Jarak</label></div>
                            <input class="easyui-numberbox" id="jaraksppd" name="jaraksppd"
                                data-options="min:0,value:0" style="width: 100px;">&nbsp;KM
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>
                            <div class="labelfor"><label>Lama Perjalanan Dinas</label></div>
                            <input class="easyui-datebox" id="tgl_awalsppd" name="tgl_awalsppd"
                                data-options="onChange:validasitanggal,formatter:myformatter,parser:myparser"
                                style="width: 110px;">
                            &nbsp;s.d&nbsp;
                            <input class="easyui-datebox" id="tgl_akhirsppd" name="tgl_akhirsppd"
                                data-options="onChange:hitunghari,formatter:myformatter,parser:myparser"
                                style="width: 110px;">
                            &nbsp;=&nbsp;
                            <input class="easyui-numberbox" id="harisppd" name="harisppd" data-options="required:true,min:0"
                                style="width: 50px;">&nbsp;Hari
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="dlg-buttonssppd">
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savesppd()"
            style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle"
            onclick="javascript:$('#dlgsppd').dialog('close')" style="min-width:90px">Batal</a>
    </div>

    <div id="dlgnipsppd" class="easyui-dialog" modal="true" style="width:600px;height:400px;padding:5px 5px" closed="true"
        buttons="#dlg-buttonsnipsppd">
        <table id="dgnipsppd" title="" style="width:100%;height:100%" url="" pageSize="20" remoteSort="false" toolbar="#"
            pagination="false" nowrap="false" method="post" rownumbers="false" fitColumns="true" singleSelect="true">
            <thead>
                <tr>
                    <th data-options="field:'ck',checkbox:true"></th>
                    <th field="nip9" width="100" align="left" halign="left" data-options="">NIP</th>
                    <th field="nama9" width="400" align="left" halign="center" data-options="">NAMA</th>
                </tr>
            </thead>
        </table>
        <script>
            $('#dgnipsppd').datagrid().datagrid('enableFilter');
        </script>
    </div>
    <div id="dlg-buttonsnipsppd">
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-check" onclick="pilihnip()"
            style="min-width:90px">Pilih</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle"
            onclick="javascript:$('#dlgnipsppd').dialog('close')" style="min-width:90px">Batal</a>
    </div>

    <div id="dlgkedudukansppd" class="easyui-dialog" modal="true" style="width:400px;height:400px;padding:5px 5px"
        closed="true" buttons="#dlg-buttonskedudukansppd">
        <input type="hidden" id="kedudukannya" name="kedudukannya" width="100%">
        <table id="dgkedudukansppd" title="" style="width:100%;height:100%" url="" pageSize="20" remoteSort="false"
            toolbar="#" pagination="false" nowrap="false" method="post" rownumbers="false" fitColumns="true"
            singleSelect="false">
            <thead>
                <tr>
                    <th data-options="field:'ck',checkbox:true"></th>
                    <th field="kota" width="100" align="left" halign="left" data-options="">Kabupaten / Kota</th>
                </tr>
            </thead>
        </table>
        <script>
            $('#dgkedudukansppd').datagrid({
                checkOnSelect: true,
                selectOnCheck: true,
                onLoadSuccess: function (data) {
                    if (data) {
                        for (i = 0; i < data.rows.length; ++i) {
                            var kedudukannya = $("#kedudukannya").val();
                            var kotanya = data.rows[i].kota;
                            if (kedudukannya.includes(kotanya) == true) {
                                $(this).datagrid('checkRow', i);
                            }
                        }
                    }
                },
                onCheck: function (index, row) {
                    var kedudukannya = $("#kedudukannya").val();
                    var kotanya = row.kota;
                    if (kedudukannya.includes(kotanya) !== true) {
                        kedudukannya += "|" + row.kota;
                    }
                    $("#kedudukannya").val(kedudukannya);
                },
                onUncheck: function (index, row) {
                    var kedudukannya = $("#kedudukannya").val();
                    kedudukannya = kedudukannya.replace("|" + row.kota, "");
                    //kedudukannya += "|"+row.kota;
                    $("#kedudukannya").val(kedudukannya);
                },
                onCheckAll: function (index, row) {
                },
                onUncheckAll: function (index, row) {
                },
            }).datagrid('enableFilter');
            $('#dgkedudukansppd').datagrid('getPanel').find('div.datagrid-header input[type=checkbox]').attr('disabled', 'disabled');      
        </script>
    </div>
    <div id="dlg-buttonskedudukansppd">
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-check" onclick="pilihkedudukan()"
            style="min-width:90px">Pilih</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-save" onclick="resetkedudukan()"
            style="min-width:90px">Reset</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-times-circle"
            onclick="javascript:$('#dlgkedudukansppd').dialog('close')" style="min-width:90px">Tutup</a>
    </div>

    <div id="dlgtujuansppd" class="easyui-dialog" modal="true" style="width:400px;height:400px;padding:5px 5px"
        closed="true" buttons="#dlg-buttonstujuansppd">
        <input type="hidden" id="tujuannya" name="tujuannya">
        <table id="dgtujuansppd" title="" style="width:100%;height:100%" url="" pageSize="20" remoteSort="false" toolbar="#"
            pagination="false" nowrap="false" method="post" rownumbers="false" fitColumns="true" singleSelect="false">
            <thead>
                <tr>
                    <th data-options="field:'ck',checkbox:true"></th>
                    <th field="kota" width="100" align="left" halign="left" data-options="">Kabupaten / Kota</th>
                </tr>
            </thead>
        </table>
        <script>
            $('#dgtujuansppd').datagrid({
                checkOnSelect: true,
                selectOnCheck: true,
                onLoadSuccess: function (data) {
                    if (data) {
                        for (i = 0; i < data.rows.length; ++i) {
                            var tujuannya = $("#tujuannya").val();
                            var kotanya = data.rows[i].kota;
                            if (tujuannya.includes(kotanya) == true) {
                                $(this).datagrid('checkRow', i);
                            }
                        }
                    }
                },
                onCheck: function (index, row) {
                    var tujuannya = $("#tujuannya").val();
                    var kotanya = row.kota;
                    if (tujuannya.includes(kotanya) !== true) {
                        tujuannya += "|" + row.kota;
                    }
                    $("#tujuannya").val(tujuannya);
                },
                onUncheck: function (index, row) {
                    var tujuannya = $("#tujuannya").val();
                    tujuannya = tujuannya.replace("|" + row.kota, "");
                    //kedudukannya += "|"+row.kota;
                    $("#tujuannya").val(tujuannya);
                },
                onCheckAll: function (index, row) {
                },
                onUncheckAll: function (index, row) {
                },
            }).datagrid('enableFilter');
            $('#dgtujuansppd').datagrid('getPanel').find('div.datagrid-header input[type=checkbox]').attr('disabled', 'disabled');      
        </script>
    </div>
    <div id="dlg-buttonstujuansppd">
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-check" onclick="pilihtujuan()"
            style="min-width:90px">Pilih</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-save" onclick="resettujuan()"
            style="min-width:90px">Reset</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-times-circle"
            onclick="javascript:$('#dlgtujuansppd').dialog('close')" style="min-width:90px">Batal</a>
    </div>

    <div id="dlgpengikut" class="easyui-dialog" modal="true" style="width:600px;height:500px;padding:5px 5px" closed="true"
        buttons="#dlg-buttonspengikut">
        <input type="hidden" id="idsppdpengikut" name="idsppdpengikut">
        <div>
            <table>
                <tr>
                    <td>No.Induk</td>
                    <td>:</td>
                    <td><label id="lblnippegawai" style="font-weight:bold;"></label></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><label id="lblnamapegawai" style="font-weight:bold;"></label></td>
                </tr>
            </table>
        </div>
        <table id="dgpengikut" title="" style="width:100%;height:370px" url="" pageSize="20" remoteSort="false"
            toolbar="#toolbarpengikut" pagination="true" nowrap="false" method="post" rownumbers="false" fitColumns="true"
            singleSelect="true">
            <thead>
                <tr>
                    <th field="aksipengikut" width="90" align="center" halign="center"
                        data-options="formatter:aksipengikut">Aksi</th>
                    <th field="nama2pengikut" width="250" align="left" halign="left" data-options="">Nama Pengikut</th>
                    <th field="hubungan2pengikut" width="100" align="center" halign="center" data-options="">
                        Hubungan<br />Keluarga</th>
                </tr>
            </thead>
        </table>
        <div id="toolbarpengikut">
            <div id="tbpengikut" style="padding:3px">
                <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus" onclick="addpengikut()"
                    style="min-width:90px;">Tambah</a>
            </div>
        </div>
        <script>
            $('#dgpengikut').datagrid().datagrid('enableFilter');
            function aksipengikut(value, row, index) {
                var akses_proses = "<?= $akses_proses; ?>";
                if (parseInt(akses_proses) === 1) {
                    var a = '<a href="javascript:void(0)" title="Edit Data" onclick="editpengikut(\'' + index + '\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                    var b = '<a href="javascript:void(0)" title="Hapus Data" onclick="destroypengikut(\'' + index + '\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                } else {
                    var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                    var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                }
                return a + b;
            }
        </script>
    </div>
    <div id="dlg-buttonspengikut">
        <a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-times-circle"
            onclick="javascript:$('#dlgpengikut').dialog('close')" style="min-width:90px">Tutup</a>
    </div>

    <div id="dlgpengikut2" class="easyui-dialog" modal="true"
        style="min-width:200px;min-height:160px;padding-left:5px;padding-right:5px;" closed="true"
        buttons="#dlg-buttonspengikut2">
        <form id="fmpengikut2" class="easyui-form" method="post" data-options="novalidate:true"
            enctype="multipart/form-data">
            <input type="hidden" id="idsppdpengikut2" name="idsppdpengikut2">
            <table>
                <tr>
                    <td style="width:300px;">
                        <div>
                            <div class="labelfor"><label>Nama Pengikut</label></div>
                            <input class="easyui-textbox" id="namapengikut2" name="namapengikut2"
                                data-options="required:true" style="width: 100%;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:300px;">
                        <div>
                            <div class="labelfor"><label>Hubungan Keluarga</label></div>
                            <input class="easyui-combobox" id="hubunganpengikut2" name="hubunganpengikut2"
                                style="padding: 2px; width: 100%;" data-options="
                                url:'<?= $foldernya; ?>get_hubungan.php',
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'auto'
                        ">
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="dlg-buttonspengikut2">
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savepengikut2()"
            style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle"
            onclick="javascript:$('#dlgpengikut2').dialog('close')" style="min-width:90px">Batal</a>
    </div>

    <div id="dlgbiaya" class="easyui-dialog" modal="true" style="width:600px;min-height:160px;padding:10px;top:100px;"
        closed="true" buttons="#dlg-buttonsbiaya">
        <form id="fmbiaya" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="idsppdbiaya" name="idsppdbiaya">
            <label style="font-weight:bold;">Transportasi</label>
            <table style="width:100%;">
                <tr>
                    <td><label id="lbltransportasi"></lable>
                    </td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="transportasibiaya" name="transportasibiaya"
                            data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                            style="width: 100%;text-align:right;">
                    </td>
                </tr>
                <tr>
                    <td><label>Dari rumah ke bandara/stasiun/pelabuhan pp</lable>
                    </td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="transportasi_lokalbiaya" name="transportasi_lokalbiaya"
                            data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                            style="width: 100%;text-align:right;">
                    </td>
                </tr>
                <tr>
                    <td><label>Airport Tax</lable>
                    </td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="airport_taxbiaya" name="airport_taxbiaya"
                            data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                            style="width: 100%;text-align:right;">
                    </td>
                </tr>
            </table>

            <input type="hidden" id="hari_konsumsi1biaya" name="hari_konsumsi1biaya">
            <input type="hidden" id="nilai_konsumsi12biaya" name="nilai_konsumsi12biaya">
            <input type="hidden" id="hari_laundry1biaya" name="hari_laundry1biaya">
            <input type="hidden" id="nilai_laundry12biaya" name="nilai_laundry12biaya">
            <input type="hidden" id="hari_penginapan1biaya" name="hari_penginapan1biaya">
            <input type="hidden" id="nilai_penginapan12biaya" name="nilai_penginapan12biaya">
            <input type="hidden" id="hari_konsumsi2biaya" name="hari_konsumsi2biaya">
            <input type="hidden" id="nilai_konsumsi22biaya" name="nilai_konsumsi22biaya">
            <input type="hidden" id="hari_laundry2biaya" name="hari_laundry2biaya">
            <input type="hidden" id="nilai_laundry22biaya" name="nilai_laundry22biaya">
            <input type="hidden" id="hari_penginapan2biaya" name="hari_penginapan2biaya">
            <input type="hidden" id="nilai_penginapan22biaya" name="nilai_penginapan22biaya">
            <input type="hidden" id="hari_pegawaibiaya" name="hari_pegawaibiaya">
            <input type="hidden" id="nilai_pegawai2biaya" name="nilai_pegawai2biaya">
            <input type="hidden" id="hari_keluargabiaya" name="hari_keluargabiaya">
            <input type="hidden" id="nilai_keluarga2biaya" name="nilai_keluarga2biaya">
            <input type="hidden" id="hari_pengantarbiaya" name="hari_pengantarbiaya">
            <input type="hidden" id="nilai_pengantar2biaya" name="nilai_pengantar2biaya">
            <input type="hidden" id="hari_suamiistribiaya" name="hari_suamiistribiaya">
            <input type="hidden" id="nilai_suamiistri2biaya" name="nilai_suamiistri2biaya">
            <input type="hidden" id="hari_anakbiaya" name="hari_anakbiaya">
            <input type="hidden" id="nilai_anak2biaya" name="nilai_anak2biaya">

            <div id="divsppd1">
                <label style="font-weight:bold;">Akomodasi PD Umum / Detasering Bulan Pertama</label>
                <table style="width:100%;">
                    <tr>
                        <td style="width:100px;"><label>Konsumsi</lable>
                        </td>
                        <td style="width:70px;"><label id="lblhari_konsumsi1"></lable>
                        </td>
                        <!-- <td style="width:70px;"><input class="easyui-numberbox" id="persen_konsumsi1biaya" name="persen_konsumsi1biaya" data-options="onChange:hitungkonsumsi1,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;"></td> -->
                        <td style="width:70px;"><input type="text" id="persen_konsumsi1biaya" name="persen_konsumsi1biaya"
                                onkeypress="allowNumbersOnly(event)" onChange="hitungkonsumsi1()"
                                style="width: 60px;text-align:right;"></td>
                        <td><label id="lblnilai_konsumsi1"></lable>
                        </td>
                        <td style="width:80px;">
                            <input class="easyui-numberbox" id="total_konsumsi1biaya" name="total_konsumsi1biaya"
                                data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                                style="width: 100%;text-align:right;">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Laundry</lable>
                        </td>
                        <td><label id="lblhari_laundry1"></lable>
                        </td>
                        <!-- <td><input class="easyui-numberbox" id="persen_laundry1biaya" name="persen_laundry1biaya" data-options="onChange:hitunglaundry1,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;"></td> -->
                        <td style="width:70px;"><input type="text" id="persen_laundry1biaya" name="persen_laundry1biaya"
                                onkeypress="allowNumbersOnly(event)" onChange="hitunglaundry1()"
                                style="width: 60px;text-align:right;"></td>
                        <td><label id="lblnilai_laundry1"></lable>
                        </td>
                        <td style="width:80px;">
                            <input class="easyui-numberbox" id="total_laundry1biaya" name="total_laundry1biaya"
                                data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                                style="width: 100%;text-align:right;">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Penginapan</lable>
                        </td>
                        <td><label id="lblhari_penginapan1"></lable>
                        </td>
                        <!-- <td><input class="easyui-numberbox" id="persen_penginapan1biaya" name="persen_penginapan1biaya" data-options="onChange:hitungpenginapan1,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;"></td> -->
                        <td style="width:70px;"><input type="text" id="persen_penginapan1biaya"
                                name="persen_penginapan1biaya" onkeypress="allowNumbersOnly(event)"
                                onChange="hitungpenginapan1()" style="width: 60px;text-align:right;"></td>
                        <td><label id="lblnilai_penginapan1"></lable>
                        </td>
                        <td style="width:80px;">
                            <input class="easyui-numberbox" id="total_penginapan1biaya" name="total_penginapan1biaya"
                                data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                                style="width: 100%;text-align:right;">
                        </td>
                    </tr>
                </table>
            </div>

            <div id="divsppd2">
                <label style="font-weight:bold;">Akomodasi PD Umum / Detasering Bulan Berikutnya</label>
                <table style="width:100%;">
                    <tr>
                        <td style="width:100px;"><label>Konsumsi</lable>
                        </td>
                        <td style="width:70px;"><label id="lblhari_konsumsi2"></lable>
                        </td>
                        <!-- <td style="width:70px;"><input class="easyui-numberbox" id="persen_konsumsi2biaya" name="persen_konsumsi2biaya" data-options="onChange:hitungkonsumsi2,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;"></td> -->
                        <td style="width:70px;"><input type="text" id="persen_konsumsi2biaya" name="persen_konsumsi2biaya"
                                onkeypress="allowNumbersOnly(event)" onChange="hitungkonsumsi2()"
                                style="width: 60px;text-align:right;"></td>
                        <td><label id="lblnilai_konsumsi2"></lable>
                        </td>
                        <td style="width:80px;">
                            <input class="easyui-numberbox" id="total_konsumsi2biaya" name="total_konsumsi2biaya"
                                data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                                style="width: 100%;text-align:right;">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Laundry</lable>
                        </td>
                        <td><label id="lblhari_laundry2"></lable>
                        </td>
                        <!-- <td><input class="easyui-numberbox" id="persen_laundry2biaya" name="persen_laundry2biaya" data-options="onChange:hitunglaundry2,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;"></td> -->
                        <td style="width:70px;"><input type="text" id="persen_laundry2biaya" name="persen_laundry2biaya"
                                onkeypress="allowNumbersOnly(event)" onChange="hitunglaundry2()"
                                style="width: 60px;text-align:right;"></td>
                        <td><label id="lblnilai_laundry2"></lable>
                        </td>
                        <td style="width:80px;">
                            <input class="easyui-numberbox" id="total_laundry2biaya" name="total_laundry2biaya"
                                data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                                style="width: 100%;text-align:right;">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Penginapan</lable>
                        </td>
                        <td><label id="lblhari_penginapan2"></lable>
                        </td>
                        <!-- <td><input class="easyui-numberbox" id="persen_penginapan2biaya" name="persen_penginapan2biaya" data-options="onChange:hitungpenginapan2,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;"></td> -->
                        <td style="width:70px;"><input type="text" id="persen_penginapan2biaya"
                                name="persen_penginapan2biaya" onkeypress="allowNumbersOnly(event)"
                                onChange="hitungpenginapan2()" style="width: 60px;text-align:right;"></td>
                        <td><label id="lblnilai_penginapan2"></lable>
                        </td>
                        <td style="width:80px;">
                            <input class="easyui-numberbox" id="total_penginapan2biaya" name="total_penginapan2biaya"
                                data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                                style="width: 100%;text-align:right;">
                        </td>
                    </tr>
                </table>
            </div>

            <div id="divsppd3">
                <label style="font-weight:bold;">Akomodasi PD Perawatan Kesehatan / Perpanjangan</label>
                <table style="width:100%;">
                    <tr>
                        <td style="width:100px;"><label>Pegawai</lable>
                        </td>
                        <td style="width:70px;"><label id="lblhari_pegawai"></lable>
                        </td>
                        <!-- <td style="width:70px;"><input class="easyui-numberbox" id="persen_pegawaibiaya" name="persen_pegawaibiaya" data-options="onChange:hitungpegawai,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;"></td> -->
                        <td style="width:70px;"><input type="text" id="persen_pegawaibiaya" name="persen_pegawaibiaya"
                                onkeypress="allowNumbersOnly(event)" onChange="hitungpegawai()"
                                style="width: 60px;text-align:right;"></td>
                        <td><label id="lblnilai_pengawai"></lable>
                        </td>
                        <td style="width:80px;">
                            <input class="easyui-numberbox" id="total_pegawaibiaya" name="total_pegawaibiaya"
                                data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                                style="width: 100%;text-align:right;">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Keluarga</lable>
                        </td>
                        <td><label id="lblhari_keluarga"></lable>
                        </td>
                        <!-- <td><input class="easyui-numberbox" id="persen_keluargabiaya" name="persen_keluargabiaya" data-options="onChange:hitungkeluarga,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;"></td> -->
                        <td style="width:70px;"><input type="text" id="persen_keluargabiaya" name="persen_keluargabiaya"
                                onkeypress="allowNumbersOnly(event)" onChange="hitungkeluarga()"
                                style="width: 60px;text-align:right;"></td>
                        <td><label id="lblnilai_keluarga"></lable>
                        </td>
                        <td style="width:80px;">
                            <input class="easyui-numberbox" id="total_keluargabiaya" name="total_keluargabiaya"
                                data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                                style="width: 100%;text-align:right;">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Pengantar</lable>
                        </td>
                        <td><label id="lblhari_pengantar"></lable>
                        </td>
                        <!-- <td><input class="easyui-numberbox" id="persen_pengantarbiaya" name="persen_pengantarbiaya" data-options="onChange:hitungpengantar,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;"></td> -->
                        <td style="width:70px;"><input type="text" id="persen_pengantarbiaya" name="persen_pengantarbiaya"
                                onkeypress="allowNumbersOnly(event)" onChange="hitungpengantar()"
                                style="width: 60px;text-align:right;"></td>
                        <td><label id="lblnilai_pengantar"></lable>
                        </td>
                        <td style="width:80px;">
                            <input class="easyui-numberbox" id="total_pengantarbiaya" name="total_pengantarbiaya"
                                data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                                style="width: 100%;text-align:right;">
                        </td>
                    </tr>
                </table>
            </div>

            <div id="divsppd4">
                <label style="font-weight:bold;">Bantuan Pindah (Max 14 hari)</label>
                <table style="width:100%;">
                    <tr>
                        <td style="width:100px;"><label>Istri/Suami</lable>
                        </td>
                        <td style="width:70px;"><label id="lblhari_suamiistri"></lable>
                        </td>
                        <td style="width:70px;"><input class="easyui-numberbox" id="persen_suamiistribiaya"
                                name="persen_suamiistribiaya"
                                data-options="onChange:hitungsuamiistri,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'"
                                style="width: 60px;text-align:right;"></td>
                        <td><label id="lblnilai_suamiistri"></lable>
                        </td>
                        <td style="width:80px;">
                            <input class="easyui-numberbox" id="total_suamiistribiaya" name="total_suamiistribiaya"
                                data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                                style="width: 100%;text-align:right;">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Anak Pegawai</lable>
                        </td>
                        <td><label id="lblhari_anak"></lable>
                        </td>
                        <td><input class="easyui-numberbox" id="persen_anakbiaya" name="persen_anakbiaya"
                                data-options="onChange:hitunganak,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'"
                                style="width: 60px;text-align:right;"></td>
                        <td><label id="lblnilai_anak"></lable>
                        </td>
                        <td style="width:80px;">
                            <input class="easyui-numberbox" id="total_anakbiaya" name="total_anakbiaya"
                                data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                                style="width: 100%;text-align:right;">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4"><label>Bantuan Pengepakan</lable>
                        </td>
                        <td style="width:80px;">
                            <input class="easyui-numberbox" id="total_pengepakanbiaya" name="total_pengepakanbiaya"
                                data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                                style="width: 100%;text-align:right;">
                        </td>
                    </tr>
                </table>
            </div>
            <hr />
            <table style="width:100%;">
                <tr>
                    <td><label style="font-weight:bold;">Total Biaya SPPD</lable>
                    </td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="totalbiaya" name="totalbiaya"
                            data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'"
                            style="width: 100%;text-align:right;">
                    </td>
                </tr>
            </table>

        </form>
    </div>
    <div id="dlg-buttonsbiaya">
        <a id="btnsavebiaya" href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save"
            onclick="savebiaya()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle"
            onclick="javascript:$('#dlgbiaya').dialog('close')" style="min-width:90px">Batal</a>
    </div>

    <div id="dlgapprovalsppd" class="easyui-dialog" modal="true"
        style="width:500px;min-height:160px;padding:10px;top:100px;" closed="true" buttons="#dlg-buttonsapprovalsppd">
        <form id="fmapprovalsppd" class="easyui-form" method="post" data-options="novalidate:true"
            enctype="multipart/form-data">
            <!-- <input type="hidden" id="idapproval" name="idapproval"> -->
            <table style="width:95%;">
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Nomor Induk</label></div>
                            <input class="easyui-textbox" id="nipapproval" name="nipapproval" data-options="required:true"
                                style="width: 100%;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Nama Pegawai</label></div>
                            <input class="easyui-textbox" id="namaapproval" name="namaapproval" data-options="required:true"
                                style="width: 100%;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Approval 1</label></div>
                            <input class="easyui-combobox" id="approval1approval" name="approval1approval"
                                missingMessage="Harus di isi" editable="true" style="padding: 2px; width: 100%;"
                                data-options=" 
                                url:'<?= $foldernya; ?>get_atasan.php',                           
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Approval 2</label></div>
                            <input class="easyui-combobox" id="approval2approval" name="approval2approval"
                                missingMessage="Harus di isi" editable="true" style="padding: 2px; width: 100%;"
                                data-options=" 
                                url:'<?= $foldernya; ?>get_atasan.php',                           
                                required:false,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!-- Jika Approve SDM = 2, maka data ditampilkan di menu Validasi SPPD -->
                        <div>
                            <div class="labelfor"><label>Approval SDM</label></div>
                            <input class="easyui-combobox" id="approvalsdmapproval" name="approvalsdmapproval"
                                missingMessage="Harus di isi" editable="true" style="padding: 2px; width: 100%;"
                                data-options=" 
                                url:'<?= $foldernya; ?>get_sdm.php',                           
                                required:false,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Approval Keuangan</label></div>
                            <input class="easyui-combobox" id="approvalbayarapproval" name="approvalbayarapproval"
                                missingMessage="Harus di isi" editable="true" style="padding: 2px; width: 100%;"
                                data-options=" 
                                url:'<?= $foldernya; ?>get_keuangan.php',                           
                                required:false,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="dlg-buttonsapprovalsppd">
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="saveapproval()"
            style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle"
            onclick="javascript:$('#dlgapprovalsppd').dialog('close')" style="min-width:90px">Batal</a>
    </div>

    <div id="dlgslip" class="easyui-dialog" modal="true" style="width:1200px;height:500px;padding:0px;" closed="true"
        buttons="">
        <iframe id="panelslip" src="#" style="width: 100%; height: 460px; border: none;"></iframe>
    </div>

    <div id="dlgslip2" class="easyui-dialog" modal="true" style="width:1200px;height:500px;padding:0px;" closed="true"
        buttons="">
        <iframe id="panelslip2" src="#" style="width: 100%; height: 460px; border: none;"></iframe>
    </div>

    <div id="dlglist" class="easyui-dialog" modal="true" style="width:1200px;height:600px;padding:0px;" closed="true"
        buttons="">
        <iframe id="panellist" src="#" style="width: 100%; height: 550px; border: none;"></iframe>
    </div>

    <!-- Formatter and Parser -->
    <script type="text/javascript">
        function myformatter(date) {
            var y = date.getFullYear();
            var m = date.getMonth() + 1;
            var d = date.getDate();
            return y + '-' + (m < 10 ? ('0' + m) : m) + '-' + (d < 10 ? ('0' + d) : d);
        }
        function myparser(s) {
            if (!s) return new Date();
            var ss = (s.split('-'));
            var y = parseInt(ss[0], 10);
            var m = parseInt(ss[1], 10);
            var d = parseInt(ss[2], 10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
                return new Date(y, m - 1, d);
            } else {
                return new Date();
            }
        }

        function myformatter2(date) {
            var y = date.getFullYear();
            var m = date.getMonth() + 1;
            var d = date.getDate();
            //return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
            return y + '-' + (m < 10 ? ('0' + m) : m);
        }
        function myparser2(s) {
            if (!s) return new Date();
            var ss = (s.split('-'));
            var y = parseInt(ss[0], 10);
            var m = parseInt(ss[1], 10);
            if (!isNaN(y) && !isNaN(m)) {
                return new Date(y, m - 1);
            } else {
                return new Date();
            }
        }
    </script>

    <!-- Function CRUD -->
    <script type="text/javascript">
        var url, url2;
        function addsppd() {
            $('#dlgsppd').dialog('open').dialog('setTitle', 'Pengajuan SPPD');
            $('#fmsppd').form('clear');
            url = '<?= $foldernya; ?>save_sppd.php';
        }
        function editsppd(index) {
            var row = $('#dgsppd').datagrid('getRow', index);
            if (row) {
                $('#dlgsppd').dialog('open').dialog('setTitle', 'Update SPPD');
                $('#fmsppd').form('clear');
                $('#fmsppd').form('load', row);
                url = '<?= $foldernya; ?>update_sppd.php?id=' + row.idsppd;
            }
        }
        function savesppd() {
            var transportasinya = $('#transportasisppd').combogrid('getValues').join('|');
            //alert(url);            
            $('#fmsppd').form('submit', {
                url: url + '?transportasinya=' + transportasinya,
                onSubmit: function () {
                    //return $(this).form('enableValidation').form('validate');
                    var v = $(this).form('validate');
                    if (!v) $.messager.progress('close');
                    return v;
                },
                success: function (result) {
                    //$.messager.progress('close');
                    if (result.errorMsg) {
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        // alert(result);
                        console.log(result);
                        $('#dlgsppd').dialog('close');
                        $('#dgsppd').datagrid('reload');
                    }
                }
            });

        }
        function loadpegawai() {
            $('#dlgnipsppd').dialog('open').dialog('setTitle', 'Pilih Pegawai');
            $('#dgnipsppd').datagrid('loadData', []);
            $('#dgnipsppd').datagrid('load', '<?= $foldernya; ?>get_data_pegawai.php');

        }
        function pilihnip() {
            var row = $('#dgnipsppd').datagrid('getSelected');
            var nip9 = row.nip9;
            var nama9 = row.nama9;
            var jabatan9 = row.jabatan9;
            var approval19 = row.approval19;
            var jabatan_approval19 = row.jabatan_approval19;
            var approval29 = row.approval29;
            var jabatan_approval29 = row.jabatan_approval29;
            // var level_sppd9 = row.level_sppd9;
            // var nama_level9 = row.nama_level9;
            $('#dlgnipsppd').dialog('close');
            $("#nipsppd").textbox('setValue', nip9);
            $("#namasppd").textbox('setValue', nama9);
            $("#jabatansppd").textbox('setValue', jabatan9);
            $("#approval1sppd").val(approval19);
            $("#approval2sppd").val(approval29);
            // $("#level_sppdsppd").val(level_sppd9);
            $("#jabatan_approval1sppd").textbox('setValue', jabatan_approval19);
            $("#jabatan_approval2sppd").textbox('setValue', jabatan_approval29);
            // $("#level_sppd2sppd").textbox('setValue', nama_level9);
        }
        function loadkedudukan() {
            var kedudukannya = $("#kedudukansppd").textbox('getValue');
            if (kedudukannya !== "") {
                kedudukannya = "|" + kedudukannya;
            }
            kedudukannya = kedudukannya.replaceAll(",", "|");
            $('#dlgkedudukansppd').dialog('open').dialog('setTitle', 'Pilih Kota');
            $('#dgkedudukansppd').datagrid('loadData', []);
            $('#dgkedudukansppd').datagrid('load', '<?= $foldernya; ?>get_master_kota.php');
            $("#kedudukannya").val(kedudukannya);
        }
        function pilihkedudukan() {
            var kedudukannya = $("#kedudukannya").val();
            var kedudukannya = kedudukannya.slice(1);
            kedudukannya = kedudukannya.replaceAll("|", ",");
            $('#dlgkedudukansppd').dialog('close');
            $("#kedudukansppd").textbox('setValue', kedudukannya);
        }
        function resetkedudukan() {
            var rows = $('#dgkedudukansppd').datagrid('getChecked');
            for (var i = 0; i < rows.length; i++) {
                $("#dgkedudukansppd").datagrid('uncheckRow', i);
            }
            $("#kedudukannya").val("");
            $("#dgkedudukansppd").datagrid('reload');
        }
        function loadtujuan() {
            var tujuannya = $("#tujuansppd").textbox('getValue');
            if (tujuannya !== "") {
                tujuannya = "|" + tujuannya;
            }
            tujuannya = tujuannya.replaceAll(",", "|");
            $('#dlgtujuansppd').dialog('open').dialog('setTitle', 'Pilih Kota');
            $('#dgtujuansppd').datagrid('loadData', []);
            $('#dgtujuansppd').datagrid('load', '<?= $foldernya; ?>get_master_kota.php');
            $("#tujuannya").val(tujuannya);
        }
        function pilihtujuan() {
            var tujuannya = $("#tujuannya").val();
            var tujuannya = tujuannya.slice(1);
            tujuannya = tujuannya.replaceAll("|", ",");
            $('#dlgtujuansppd').dialog('close');
            $("#tujuansppd").textbox('setValue', tujuannya);
        }
        function resettujuan() {
            var rows = $('#dgtujuansppd').datagrid('getChecked');
            for (var i = 0; i < rows.length; i++) {
                $("#dgtujuansppd").datagrid('uncheckRow', i);
            }
            $("#tujuannya").val("");
            $("#dgtujuansppd").datagrid('reload');
        }
        
        function destroysppd(index) {
            var row = $('#dgsppd').datagrid('getRow', index);
            if (row) {
                $.messager.confirm('Konfirmasi', 'Yakin menghapus data sppd ini?', function (r) {
                    if (r) {
                        $.post('<?= $foldernya; ?>destroy_sppd.php', { id: row.idsppd, idsppd: row.idsppdsppd }, function (result) {
                            if (result.success) {
                                $('#dgsppd').datagrid('reload');
                            } else {
                                $.messager.show({
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }
        function hitungbiaya(index) {
            var row = $('#dgsppd').datagrid('getRow', index);
            if (row) {
                $.messager.confirm('Konfirmasi', 'Proses perhitungan biaya SPPD, Lanjutkan?', function (r) {
                    if (r) {
                        $.post('<?= $foldernya; ?>hitung_biaya.php', { idsppd: row.idsppdsppd }, function (result) {
                            if (result.success) {
                                $('#dgsppd').datagrid('reload');
                            } else {
                                $.messager.show({
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }
        function resetbiaya(index) {
            var row = $('#dgsppd').datagrid('getRow', index);
            if (row) {
                $.messager.confirm('Konfirmasi', 'Reset perhitungan biaya SPPD, Lanjutkan?', function (r) {
                    if (r) {
                        $.post('<?= $foldernya; ?>reset_biaya.php', { idsppd: row.idsppdsppd }, function (result) {
                            if (result.success) {
                                $('#dgsppd').datagrid('reload');
                            } else {
                                $.messager.show({
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }

        function rincianbiaya(index) {
            var row = $('#dgsppd').datagrid('getRow', index);
            if (row) {
                $('#dlgbiaya').dialog('open').dialog('setTitle', 'Rincian Biaya SPPD');
                $('#fmbiaya').form('clear');
                $('#fmbiaya').form('load', row);
                $("#lbltransportasi").html(row.kedudukansppd + ' - ' + row.tujuansppd + ' (<span style="font-weight:bold;">' + row.transportasisppd + '</span>)');
                $("#lblhari_konsumsi1").html(row.hari_konsumsi1biaya + " hari");
                $("#lblnilai_konsumsi1").html(" X Rp. " + row.nilai_konsumsi1biaya);
                $("#lblhari_laundry1").html(row.hari_laundry1biaya + " hari");
                $("#lblnilai_laundry1").html(" X Rp. " + row.nilai_laundry1biaya);
                $("#lblhari_penginapan1").html(row.hari_penginapan1biaya + " hari");
                $("#lblnilai_penginapan1").html(" X Rp. " + row.nilai_penginapan1biaya);
                $("#lblhari_konsumsi2").html(row.hari_konsumsi2biaya + " hari");
                $("#lblnilai_konsumsi2").html(" X Rp. " + row.nilai_konsumsi2biaya);
                $("#lblhari_laundry2").html(row.hari_laundry2biaya + " hari");
                $("#lblnilai_laundry2").html(" X Rp. " + row.nilai_laundry2biaya);
                $("#lblhari_penginapan2").html(row.hari_penginapan2biaya + " hari");
                $("#lblnilai_penginapan2").html(" X Rp. " + row.nilai_penginapan2biaya);

                $("#lblhari_pengawai").html(row.hari_pegawaibiaya + " hari");
                $("#lblnilai_pengawai").html(" X Rp. " + row.nilai_pegawaibiaya);
                $("#lblhari_keluarga").html(row.hari_keluargabiaya + " hari");
                $("#lblnilai_keluarga").html(" X Rp. " + row.nilai_keluargabiaya);
                $("#lblhari_pengantar").html(row.hari_pengantarbiaya + " hari");
                $("#lblnilai_pengantar").html(" X Rp. " + row.nilai_pengantarbiaya);

                $("#lblhari_suamiistri").html(row.hari_suamiistribiaya + " hari");
                $("#lblnilai_suamiistri").html(" X Rp. " + row.nilai_suamiistribiaya);
                $("#lblhari_anak").html(row.hari_anakbiaya + " hari");
                $("#lblnilai_anak").html(" X Rp. " + row.nilai_anakbiaya);

                $("#divsppd1").hide();
                $("#divsppd2").hide();
                $("#divsppd3").hide();
                $("#divsppd4").hide();
                if (parseInt(row.jenis_sppdsppd) == 1 || parseInt(row.jenis_sppdsppd) == 4) {
                    $("#divsppd1").show();
                } else if (parseInt(row.jenis_sppdsppd) == 2) {
                    $("#divsppd2").show();
                } else if (parseInt(row.jenis_sppdsppd) == 3) {
                    $("#divsppd1").show();
                    $("#divsppd4").show();
                }
                if (parseInt(row.validasi_biayasppd) === 0) {
                    $('#btnsavebiaya').linkbutton('enable');
                } else {
                    $('#btnsavebiaya').linkbutton('disable');
                }
                $('#dlgbiaya').dialog('resize');
                url = '<?= $foldernya; ?>update_biaya.php?idsppd=' + row.idsppdsppd;
            }
        }
        function savebiaya() {
            //alert(url);
            $('#fmbiaya').form('submit', {
                url: url,
                onSubmit: function () {
                    //return $(this).form('enableValidation').form('validate');
                    var v = $(this).form('validate');
                    if (!v) $.messager.progress('close');
                    return v;
                },
                success: function (result) {
                    //alert(result);    
                    //$.messager.progress('close');
                    if (result.errorMsg) {
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        console.log(result);
                        $('#dlgbiaya').dialog('close');
                        $('#dgsppd').datagrid('reload');
                    }
                }
            });
        }

        function validasi(index) {
            var row = $('#dgsppd').datagrid('getRow', index);
            if (row) {
                $.messager.confirm('Konfirmasi', 'Validasi perhitungan biaya SPPD, Lanjutkan?', function (r) {
                    if (r) {
                        $.post('<?= $foldernya; ?>validasi.php', { idsppd: row.idsppdsppd }, function (result) {
                            if (result.success) {
                                $('#dgsppd').datagrid('reload');
                            } else {
                                $.messager.show({
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }
        function resetvalidasi(index) {
            var row = $('#dgsppd').datagrid('getRow', index);
            if (row) {
                if (parseInt(row.approvebayarsppd) === 2) {
                    var keterangan = ". Proses ini sekaligus akan melakukan reset approval pembayaran";
                } else {
                    var keterangan = "";
                }
                $.messager.confirm('Konfirmasi', 'Reset validasi perhitungan biaya SPPD' + keterangan + ', Lanjutkan?', function (r) {
                    if (r) {
                        $.post('<?= $foldernya; ?>reset_validasi.php', { idsppd: row.idsppdsppd }, function (result) {
                            if (result.success) {
                                $('#dgsppd').datagrid('reload');
                            } else {
                                $.messager.show({
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }

        function resetsdm(index) {
            var row = $('#dgsppd').datagrid('getRow', index);
            if (row) {
                $.messager.confirm('Konfirmasi', 'Reset Approval SDM?', function (r) {
                    if (r) {
                        $.post('<?= $foldernya; ?>reset_sdm.php', { idsppd: row.idsppdsppd }, function (result) {
                            if (result.success) {
                                $('#dgsppd').datagrid('reload');
                            } else {
                                $.messager.show({
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }

        function pengikutsppd(index) {
            var row = $('#dgsppd').datagrid('getRow', index);
            if (row) {
                $('#dlgpengikut').dialog('open').dialog('setTitle', 'Pengikut SPPD');
                $('#dgpengikut').datagrid('loadData', []);
                $('#dgpengikut').datagrid('load', '<?= $foldernya; ?>get_data_pengikut.php?idsppd=' + row.idsppdsppd);
                $("#lblnippegawai").text(row.nipsppd);
                $("#lblnamapegawai").text(row.namasppd);
                $("#idsppdpengikut").val(row.idsppdsppd);
            }
        }

        function addpengikut() {
            var idsppdnya = $("#idsppdpengikut").val();
            $('#dlgpengikut2').dialog('open').dialog('setTitle', 'Input Data Pengikut');
            $('#fmpengikut2').form('clear');
            $("#idsppdpengikut2").val(idsppdnya);
            $("#hubunganpengikut2").combobox('reload', '<?= $foldernya; ?>get_hubungan.php?idsppd=' + idsppdnya);
            url = '<?= $foldernya; ?>save_pengikut2.php';
        }

        function editpengikut(index) {
            var row = $('#dgpengikut').datagrid('getRow', index);
            if (row) {
                $('#dlgpengikut2').dialog('open').dialog('setTitle', 'Edit Data Pengikut');
                $('#fmpengikut2').form('clear');
                $('#fmpengikut2').form('load', row);
                $("#hubunganpengikut2").combobox('reload', '<?= $foldernya; ?>get_hubungan.php?idsppd=' + row.idsppdpengikut);
                url = '<?= $foldernya; ?>update_pengikut2.php?id=' + row.idpengikut;
            }
        }
        function savepengikut2() {
            $('#fmpengikut2').form('submit', {
                url: url,
                onSubmit: function () {
                    //return $(this).form('enableValidation').form('validate');
                    var v = $(this).form('validate');
                    if (!v) $.messager.progress('close');
                    return v;
                },
                success: function (result) {
                    //alert(result);    
                    //$.messager.progress('close');
                    if (result.errorMsg) {
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlgpengikut2').dialog('close');
                        $('#dgpengikut').datagrid('reload');
                    }
                }
            });

        }
        function destroypengikut(index) {
            var row = $('#dgpengikut').datagrid('getRow', index);
            if (row) {
                $.messager.confirm('Konfirmasi', 'Yakin menghapus data pengikut ini?', function (r) {
                    if (r) {
                        $.post('<?= $foldernya; ?>destroy_pengikut2.php', { id: row.idpengikut }, function (result) {
                            //alert(result);
                            if (result.success) {
                                $('#dgpengikut').datagrid('reload');
                            } else {
                                $.messager.show({
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }
        function cetaksppd(index) {
            var row = $('#dgsppd').datagrid('getRow', index);
            if (row) {
                window.open('<?= $foldernya; ?>formsppd.php?idsppd=' + row.idsppdsppd, '_blank');
            }
        }

        function setapprovalsppd(index) {
            var row = $('#dgsppd').datagrid('getRow', index);
            if (row) {
                $('#dlgapprovalsppd').dialog('open').dialog('setTitle', 'Update Approval');
                $('#fmapprovalsppd').form('clear');
                $('#fmapprovalsppd').form('load', row);
                // alert(row.nipsppd + " " + row.namasppd);
                $("#nipapproval").textbox('setValue', row.nipsppd);
                $("#namaapproval").textbox('setValue', row.namasppd);
                $("#approval1approval").combobox('setValue', row.approval1sppd);
                $("#approval2approval").combobox('setValue', row.approval2sppd);
                $("#approvalsdmapproval").combobox('setValue', row.approvalsdmsppd);
                $("#approvalbayarapproval").combobox('setValue', row.approvalbayarsppd);
                url = '<?= $foldernya; ?>update_approvalsppd.php?id=' + row.idsppd;
            }
        }
        function saveapproval() {
            $('#fmapprovalsppd').form('submit', {
                url: url,
                onSubmit: function () {
                    //return $(this).form('enableValidation').form('validate');
                    var v = $(this).form('validate');
                    if (!v) $.messager.progress('close');
                    return v;
                },
                success: function (result) {
                    //alert(result);    
                    //$.messager.progress('close');
                    if (result.errorMsg) {
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlgapprovalsppd').dialog('close');
                        $('#dgsppd').datagrid('reload');
                    }
                }
            });
        }

        //$("#dgsppd").height($(window).height() - 0);
    </script>

    <!-- CSS -->
    <style type="text/css">
        #fmsppd {
            margin: 0;
            padding: 10px 10px;
        }

        .ftitle {
            font-size: 14px;
            font-weight: bold;
            padding: 5px 0;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
        }

        .fitemsppd {
            margin-bottom: 5px;
        }

        .fitemsppd label {
            display: inline-block;
            width: 100px;
        }

        .fitemsppd input {
            width: 200px;
        }

        #fmsppd.numberbox input {
            text-align: right;
        }

        .brxsmall1 {
            display: block;
            margin-bottom: -.5em !important;
        }

        .brxsmall2 {
            display: block;
            margin-bottom: -.7em !important;
        }

        #fmbiaya .numberbox .textbox-text {
            text-align: right;
        }

        hr {
            border: none;
            border-top: 2px dotted #999;
            color: #999;
            background-color: #fff;
            height: 1px;
            margin: 10px 10px;
        }
    </style>
    <?php
}
?>