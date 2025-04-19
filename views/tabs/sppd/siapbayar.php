<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/sppd/";    
    ?>
    <script type="text/javascript">                     
		function doSearchsiapbayar(){
            $('#dgsiapbayar').datagrid('load',{
				tgl_approve1cari: $('#tgl_approve1cari').combobox('getValue'),
                tgl_approve2cari: $('#tgl_approve2cari').combobox('getValue'),
			});
		}
        
        function onSelectkelompoksiapbayarcari(){
            var nilai1 = $('#kelompoksiapbayarcari').combobox('getValue');
            var nilai2 = $('#kd_regionsiapbayarcari').combobox('getValue');
            var nilai3 = $('#kd_cabangsiapbayarcari').combobox('getValue');
            var url1 = 'get_spksiapbayarcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spksiapbayarcari').combogrid('clear');
            $('#no_spksiapbayarcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spksiapbayarcari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionsiapbayarcari(){
            var nilai1 = $('#kelompoksiapbayarcari').combobox('getValue');
            var nilai2 = $('#kd_regionsiapbayarcari').combobox('getValue');
            var nilai3 = $('#kd_cabangsiapbayarcari').combobox('getValue');
            var url1 = 'get_spksiapbayarcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangsiapbayarcari.php?kd_region='+nilai2;
			//alert(url1);
            $('#kd_cabangsiapbayarcari').combobox('enable');
            $('#kd_cabangsiapbayarcari').combobox('clear'); 
            $('#kd_cabangsiapbayarcari').combobox('reload',url2);
            $('#kd_cabangsiapbayarcari').combobox('setValue','000');

            $('#no_spksiapbayarcari').combogrid('clear');
            $('#no_spksiapbayarcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spksiapbayarcari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangsiapbayarcari(){
            var nilai1 = $('#kelompoksiapbayarcari').combobox('getValue');
            var nilai2 = $('#kd_regionsiapbayarcari').combobox('getValue');
            var nilai3 = $('#kd_cabangsiapbayarcari').combobox('getValue');
            var url1 = 'get_spksiapbayarcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spksiapbayarcari').combogrid('clear');
            $('#no_spksiapbayarcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spksiapbayarcari').combogrid('setValue','SEMUA');
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
        
        function onSelectblthsiapbayarcari(){
            var nilai1 = $('#blthsiapbayarcari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectkelompoksiapbayar(){
            var nilai1 = $('#kelompoksiapbayar').combobox('getValue');
            var nilai2 = $('#kd_regionsiapbayar').combobox('getValue');
            var nilai3 = $('#kd_cabangsiapbayar').combobox('getValue');
            var url1 = 'get_spksiapbayar.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spksiapbayar').combogrid('clear');
            $('#no_spksiapbayar').combogrid('grid').datagrid('reload',url1);
            $('#no_spksiapbayar').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionsiapbayar(){
            var nilai1 = $('#kelompoksiapbayar').combobox('getValue');
            var nilai2 = $('#kd_regionsiapbayar').combobox('getValue');
            var nilai3 = $('#kd_cabangsiapbayar').combobox('getValue');
            var url1 = 'get_spksiapbayar.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangsiapbayar.php?kd_region='+nilai2;
            $('#kd_cabangsiapbayar').combobox('enable');
            $('#kd_cabangsiapbayar').combobox('clear'); 
            $('#kd_cabangsiapbayar').combobox('reload',url2);
            $('#kd_cabangsiapbayar').combobox('setValue','000');
			
            $('#no_spksiapbayar').combogrid('clear');
            $('#no_spksiapbayar').combogrid('grid').datagrid('reload',url1);
            $('#no_spksiapbayar').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangsiapbayar(){
            var nilai1 = $('#kelompoksiapbayar').combobox('getValue');
            var nilai2 = $('#kd_regionsiapbayar').combobox('getValue');
            var nilai3 = $('#kd_cabangsiapbayar').combobox('getValue');
            var url1 = 'get_spksiapbayar.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            $('#no_spksiapbayar').combogrid('clear');
            $('#no_spksiapbayar').combogrid('grid').datagrid('reload',url1);
            $('#no_spksiapbayar').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionsiapbayar2(){
            var nilai1 = $('#kd_regionsiapbayar2').combobox('getValue');
            var url2 = 'get_cabangsiapbayar2.php?kd_region='+nilai1;
            $('#kd_cabangsiapbayar2').combobox('enable');
            $('#kd_cabangsiapbayar2').combobox('clear'); 
            $('#kd_cabangsiapbayar2').combobox('reload',url2);
            $('#kd_cabangsiapbayar2').combobox('setValue','000');
    	}
        
        function onSelectprojectsiapbayar(){
            var nilai1 = $('#kd_projectsiapbayar').combobox('getValue');
            var url2 = 'get_unitsiapbayar.php?kd_project='+nilai1;
            $('#kd_unitsiapbayar').combobox('enable');
            $('#kd_unitsiapbayar').combobox('clear'); 
            $('#kd_unitsiapbayar').combobox('reload',url2);
    	}
        
        function onSelectprojectsiapbayar2(){
            var nilai1 = $('#kd_projectsiapbayar2').combobox('getValue');
            var url2 = 'get_unitsiapbayar2.php?kd_project='+nilai1;
            $('#kd_unitsiapbayar2').combobox('enable');
            $('#kd_unitsiapbayar2').combobox('clear'); 
            $('#kd_unitsiapbayar2').combobox('reload',url2);
    	}
        
        function formatrp2(val,row){
            if(val===""){
                return "";
            } else {
                return number_format2(val,0,',','.');
            }
        };
        
        function number_format2(num,dig,dec,sep) {
            x=new Array();
            s=(num<0?"-":"");
            num=Math.abs(num).toFixed(dig).split(".");
            r=num[0].split("").reverse();
            for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
            //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
            return s+x.join("")+(num[1]?dec+num[1]:"");
        }
        
        function formatrp3(val,row){
            if(val===""){
                return "";
            } else {
                return number_format3(val,3,',','.');
            }
        };
        
        function number_format3(num,dig,dec,sep) {
            x=new Array();
            s=(num<0?"-":"");
            num=Math.abs(num).toFixed(dig).split(".");
            r=num[0].split("").reverse();
            for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
            //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
            return s+x.join("")+(num[1]?dec+num[1]:"");
        }
        
        function formatrp4(val,row){
            if(val===""){
                return "";
            } else {
                return number_format4(val,2,',','.');
            }
        };
        
        function number_format4(num,dig,dec,sep) {
            x=new Array();
            s=(num<0?"-":"");
            num=Math.abs(num).toFixed(dig).split(".");
            r=num[0].split("").reverse();
            for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
            //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
            return s+x.join("")+(num[1]?dec+num[1]:"");
        }

		function aksisiapbayar(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                if(parseFloat(row.bayarsiapbayar)===0){ // sspd1.bayar
                    if(parseFloat(row.totalsiapbayar)>0){ // biaya_sppd1.total
                        if(parseFloat(row.validasi_biayasiapbayar)===0){ // sppd1.validasi_biaya
                            var a = '<a href="javascript:void(0)" title="Validasi Biaya" onclick="validasi(\''+index+'\')"><button class="easyui-linkbutton c1" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-check" style="font-size:8px !important;"></i></button></a>';
                            var b = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                        } else {
                            var a = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-check" style="font-size:8px !important;"></i></button></a>';
                            var b = '<a href="javascript:void(0)" title="Reset Validasi Biaya" onclick="resetvalidasi(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                        }
                    } else {
                        var a = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-check" style="font-size:8px !important;"></i></button></a>';
                        var b = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                    }
                } else {
                    var a = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-check" style="font-size:8px !important;"></i></button></a>';
                    var b = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                }
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-check" style="font-size:8px !important;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
            }
            //var c = row.bayarsiapbayar+" "+row.totalsiapbayar;
            return a+b;
		}

		function biayasiapbayar(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                if(parseInt(row.bayarsiapbayar)===0 && parseInt(row.approvebayarsiapbayar)===2){ // sspd1.bayar & biaya_sppd1.approvebayar
                    var a = '<a href="javascript:void(0)" title="Proses Pembayaran" onclick="editsiapbayar(\''+index+'\')"><button class="easyui-linkbutton c1" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-cog" style="font-size:8px !important;"></i></button></a>';
                    var b = '<a title="Reset Pembayaran"><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:10px;"></i></button></a>';
                } else {
                    var a = '<a title="Proses Pembayaran"><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-cog" style="font-size:10px;"></i></button></a>';
                    var b = '<a href="javascript:void(0)" title="Reset Pembayaran" onclick="destroysiapbayar(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:8px !important;"></i></button></a>';
                }
                if(parseFloat(row.totalsiapbayar)>0){ // biaya_sppd1.total
                    var c = '<a href="javascript:void(0)" title="Rincian Biaya" onclick="rincianbiayasppd(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-credit-card" style="font-size:8px !important;"></i></button></a>';
                    var d = '<a href="javascript:void(0)" title="Cetak Form siapbayar" onclick="cetaksiapbayar(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-print" style="font-size:8px !important;"></i></button></a>';
                } else {
                    var c = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-credit-card" style="font-size:8px !important;"></i></button></a>';
                    var d = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-print" style="font-size:8px !important;"></i></button></a>';
                }
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                var c = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-cog" style="font-size:8px !important;"></i></button></a>';
                var d = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-print" style="font-size:8px !important;"></i></button></a>';
            }
            return a+b+"<br/>"+c+d;
		}

        function tglsiapbayar(value,row,index){
            var a = '<span style="font-size:14px;font-weight:normal;">'+row.tgl_approvebayar2siapbayar+'<span>';
            return a;
        }  

        function timelinesiapbayar(value,row,index){
            var a = '<div style="overflow-y:scroll;height:120px;text-align:left;padding:5px;background-color:#f7f6f6;color:#000;margin-bottom:5px;">';
            a += '<span style="font-size:10px;white-space:nowrap;">'+row.timelinesiapbayar+'<span>';
            a += '</div>';
            return a;
        }  

        function namanyasiapbayar(value,row,index){
            var a = '<span style="font-weight:bold;font-size:11px;">'+row.nipsiapbayar+'</span>';
            a += '<br/>'
            a += '<span style="font-size:11px;">'+row.namasiapbayar;
            a += '<br/>'
            a += row.tingkat_sppd2siapbayar+'</span>';
            a += '<br/>'
            a += '<span style="font-weight:bold;font-size:11px;">'+row.jenis_sppd2siapbayar+'</span>';
            a += '<br/>'
            a += '<span style="font-size:11px;">'+row.level_sppd2siapbayar+'</span>';
            return a;
        }  

        function maksudnyasiapbayar(value,row,index){
            var a = '<span style="font-size:11px;font-weight:bold;">'+row.idsppdsiapbayar+'</span>';
            a += '<br/><span style="color:blue;font-size:11px;">'+row.no_sppdsiapbayar+'</span>';
            a += '<br/>'+row.maksudsiapbayar;
            return a;
        }  

        function biayanyasiapbayar(value,row,index){
            var a = 'Total Biaya SPPD :';
            a += '<br/><span style="font-weight:bold;font-size:14px;">'+row.total2siapbayar+'</span>';
            a += '<br/><span style="font-size:13px;font-weight:bold;color:red;">Belum Terbayar</span>';
            return a;
        }  

        function jenisnyasiapbayar(value,row,index){
            var a = row.tingkat_siapbayar2siapbayar;
            a += '<br/>'
            a += '<span style="font-weight:bold;">'+row.jenis_siapbayar2siapbayar+'</span>';
            a += '<br/>'
            a += row.level_siapbayar2siapbayar;
            return a;
        }  

        function validasitanggal(){
            //alert('tes');
            //$("#tgl_akhirsiapbayar").datebox({'disabled':false});
            var tgl_awal = $("#tgl_awalsiapbayar").datebox('getValue');
            var datanya = tgl_awal.split("-");
            var tahun = parseInt(datanya[0]);
            var bulan = parseInt(datanya[1])-1;
            var hari = parseInt(datanya[2]);
            $('#tgl_akhirsiapbayar').datebox().datebox('calendar').calendar({
                validator: function(date){
                    var now = new Date(tahun,bulan,hari);
                    if (date >= now){
                        return true;
                    } else {
                        return false;
                    }
                }
            });
        }

        function hitunghari(){
            var tgl_awal = $("#tgl_awalsiapbayar").datebox('getValue');
            var tgl_akhir = $("#tgl_akhirsiapbayar").datebox('getValue');
            if(tgl_awal!=="" && tgl_akhir!==""){
                var datanya1 = tgl_awal.split("-");
                var tahun1 = parseInt(datanya1[0]);
                var bulan1 = parseInt(datanya1[1])-1;
                var hari1 = parseInt(datanya1[2]);
                var tanggal1 = new Date(tahun1,bulan1,hari1);

                var datanya2 = tgl_akhir.split("-");
                var tahun2 = parseInt(datanya2[0]);
                var bulan2 = parseInt(datanya2[1])-1;
                var hari2 = parseInt(datanya2[2]);
                var tanggal2 = new Date(tahun2,bulan2,hari2);
                
                var hari = 24*60*60*1000;
                var Difference_In_Time = tanggal2.getTime() - tanggal1.getTime();
                var jumlah_hari = (Difference_In_Time / (1000 * 3600 * 24))+1;
                $("#harisiapbayar").numberbox('setValue',jumlah_hari);
            } else {
                $("#harisiapbayar").numberbox('setValue',0);
            }
        }

        function hitungtotalbiaya(){
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
            var jumlah_total = parseFloat(transportasi)+parseFloat(transportasi_lokal)+parseFloat(airport_tax)+parseFloat(total_konsumsi1)+parseFloat(total_laundry1)+parseFloat(total_penginapan1)+parseFloat(total_konsumsi2)+parseFloat(total_laundry2)+parseFloat(total_penginapan2)+parseFloat(total_pegawai)+parseFloat(total_keluarga)+parseFloat(total_pengantar)+parseFloat(total_suamiistri)+parseFloat(total_anak)+parseFloat(total_pengepakan);
            $("#totalbiaya").numberbox('setValue',jumlah_total);
        }

        function hitungkonsumsi1(){
            var hari_konsumsi1 = $("#hari_konsumsi1biaya").val();
            var persen_konsumsi1 = $("#persen_konsumsi1biaya").numberbox('getValue');
            var nilai_konsumsi1 = $("#nilai_konsumsi12biaya").val();
            var total_konsumsi1 = Math.round((parseFloat(hari_konsumsi1)*parseFloat(nilai_konsumsi1)*parseFloat(persen_konsumsi1))/100);
            $("#total_konsumsi1biaya").numberbox('setValue',total_konsumsi1);
        }

        function hitunglaundry1(){
            var hari_laundry1 = $("#hari_laundry1biaya").val();
            var persen_laundry1 = $("#persen_laundry1biaya").numberbox('getValue');
            var nilai_laundry1 = $("#nilai_laundry12biaya").val();
            var total_laundry1 = Math.round((parseFloat(hari_laundry1)*parseFloat(nilai_laundry1)*parseFloat(persen_laundry1))/100);
            $("#total_laundry1biaya").numberbox('setValue',total_laundry1);
        }

        function hitungpenginapan1(){
            var hari_penginapan1 = $("#hari_penginapan1biaya").val();
            var persen_penginapan1 = $("#persen_penginapan1biaya").numberbox('getValue');
            var nilai_penginapan1 = $("#nilai_penginapan12biaya").val();
            var total_penginapan1 = Math.round((parseFloat(hari_penginapan1)*parseFloat(nilai_penginapan1)*parseFloat(persen_penginapan1))/100);
            $("#total_penginapan1biaya").numberbox('setValue',total_penginapan1);
        }

        function hitungkonsumsi2(){
            var hari_konsumsi2 = $("#hari_konsumsi2biaya").val();
            var persen_konsumsi2 = $("#persen_konsumsi2biaya").numberbox('getValue');
            var nilai_konsumsi2 = $("#nilai_konsumsi22biaya").val();
            var total_konsumsi2 = Math.round((parseFloat(hari_konsumsi2)*parseFloat(nilai_konsumsi2)*parseFloat(persen_konsumsi2))/100);
            $("#total_konsumsi2biaya").numberbox('setValue',total_konsumsi2);
        }

        function hitunglaundry2(){
            var hari_laundry2 = $("#hari_laundry2biaya").val();
            var persen_laundry2 = $("#persen_laundry2biaya").numberbox('getValue');
            var nilai_laundry2 = $("#nilai_laundry22biaya").val();
            var total_laundry2 = Math.round((parseFloat(hari_laundry2)*parseFloat(nilai_laundry2)*parseFloat(persen_laundry2))/100);
            $("#total_laundry2biaya").numberbox('setValue',total_laundry2);
        }

        function hitungpenginapan2(){
            var hari_penginapan2 = $("#hari_penginapan2biaya").val();
            var persen_penginapan2 = $("#persen_penginapan2biaya").numberbox('getValue');
            var nilai_penginapan2 = $("#nilai_penginapan22biaya").val();
            var total_penginapan2 = Math.round((parseFloat(hari_penginapan2)*parseFloat(nilai_penginapan2)*parseFloat(persen_penginapan2))/100);
            $("#total_penginapan2biaya").numberbox('setValue',total_penginapan2);
        }

        function hitungpegawai(){
            var hari_pegawai = $("#hari_pegawaibiaya").val();
            var persen_pegawai = $("#persen_pegawaibiaya").numberbox('getValue');
            var nilai_pegawai = $("#nilai_pegawai2biaya").val();
            var total_pegawai = Math.round((parseFloat(nilai_pegawai)*parseFloat(persen_pegawai))/100);
            $("#total_pegawaibiaya").numberbox('setValue',total_pegawai);
        }

        function hitungkeluarga(){
            var hari_keluarga = $("#hari_keluargabiaya").val();
            var persen_keluarga = $("#persen_keluargabiaya").numberbox('getValue');
            var nilai_keluarga = $("#nilai_keluarga2biaya").val();
            var total_keluarga = Math.round((parseFloat(hari_keluarga)*parseFloat(nilai_keluarga)*parseFloat(persen_keluarga))/100);
            $("#total_keluargabiaya").numberbox('setValue',total_keluarga);
        }

        function hitungpengantar(){
            var hari_pengantar = $("#hari_pengantarbiaya").val();
            var persen_pengantar = $("#persen_pengantarbiaya").numberbox('getValue');
            var nilai_pengantar = $("#nilai_pengantar2biaya").val();
            var total_pengantar = Math.round((parseFloat(hari_pengantar)*parseFloat(nilai_pengantar)*parseFloat(persen_pengantar))/100);
            $("#total_pengantarbiaya").numberbox('setValue',total_pengantar);
        }

        function hitungsuamiistri(){
            var hari_suamiistri = $("#hari_suamiistribiaya").val();
            var persen_suamiistri = $("#persen_suamiistribiaya").numberbox('getValue');
            var nilai_suamiistri = $("#nilai_suamiistri2biaya").val();
            var total_suamiistri = Math.round((parseFloat(hari_suamiistri)*parseFloat(nilai_suamiistri)*parseFloat(persen_suamiistri))/100);
            $("#total_suamiistribiaya").numberbox('setValue',total_suamiistri);
        }

        function hitunganak(){
            var hari_anak = $("#hari_anakbiaya").val();
            var persen_anak = $("#persen_anakbiaya").numberbox('getValue');
            var nilai_anak = $("#nilai_anak2biaya").val();
            var total_anak = Math.round((parseFloat(hari_anak)*parseFloat(nilai_anak)*parseFloat(persen_anak))/100);
            $("#total_anakbiaya").numberbox('setValue',total_anak);
        }

		function slip(value,row,index){
            var by2 = '<a href="javascript:void(0)" onclick="cetakslip(\''+row.nipsiapbayar+'|'+row.blthsiapbayar+'\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple" style="margin-top:3px;margin-bottom:3px;"></i></a>';
            return by2;
		}
        function stylerpendapatan(value,row,index){
            return 'background: #93CAED;';
		}
        function stylerbenefit(value,row,index){
            return 'background: #C7E4EE;';
		}
        function stylerupah(value,row,index){
            return 'background: #ACD1AF;';
		}
        function stylerpotongan(value,row,index){
            return 'background: #F47174;';
		}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}

    </script>
    
    <script type="text/javascript">
    $(function(){
        $("#dgsiapbayar").datagrid({
        });
    });
    </script>
    <table id="dgsiapbayar" title="" class="easyui-datagrid" style="width:100%;height:100%;padding-right:20px;"	
            url="<?=$foldernya;?>get_master_siapbayar.php" pageSize="20"        
    		toolbar="#toolbarsiapbayar" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="false"
            >
    	<thead frozen="true">
    		<tr>
                <!-- <th field="aksisiapbayar" width="80" align="center" halign="center" data-options="formatter:aksisiapbayar,styler:styler1">Aksi</th> -->
                <!-- <th field="ck" checkbox="true"></th> -->
                <!-- <th field="biayasiapbayar" width="90" align="center" halign="center" data-options="formatter:biayasiapbayar,styler:styler1">Aksi</th> -->
                <th field="tglsiapbayar" width="110" align="center" halign="center" data-options="formatter:tglsiapbayar,styler:styler1">Tanggal<br/>Approve</th>
                <th field="biayanyasiapbayar" width="160" align="center" halign="center" data-options="formatter:biayanyasiapbayar,styler:styler1">Biaya SPPD</th>
    			<th field="namanyasiapbayar" width="220" align="left" halign="left" data-options="formatter:namanyasiapbayar,styler:styler1">Data SPPD</th>
    	<thead>
    		<tr>
                <th field="maksudnyasiapbayar" width="240" align="left" halign="center" data-options="formatter:maksudnyasiapbayar,styler:styler1">Nomor SPPD<br/>Maksud Perjalanan Dinas</th>
                <th field="kedudukansiapbayar" width="160" align="center" halign="center" data-options="styler:styler1">Kedudukan</th>
                <th field="tujuansiapbayar" width="160" align="center" halign="center" data-options="styler:styler1">Tujuan</th>
                <th field="transportasisiapbayar" width="160" align="center" halign="center" data-options="styler:styler1">Transportasi</th>
                <th field="jaraksiapbayar" width="80" align="center" halign="center" data-options="formatter:formatrp2,styler:styler1">Jarak<br/>(KM)</th>
                <th field="tgl_awal2siapbayar" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Berangkat</th>
                <th field="tgl_akhir2siapbayar" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Kembali</th>
                <th field="harisiapbayar" width="80" align="center" halign="center" data-options="formatter:formatrp2,styler:styler1">Jumlah<br/>Hari</th>
    		</tr>
    	</thead>
    </table>    
    <div id="toolbarsiapbayar">
    	<div id="tbsiapbayar" style="padding:3px">
            <table>
            <tr>
                <td>Periode Approval</td>
                <td>
                    <input class="easyui-combobox"
                        id="tgl_approve1cari" editable="false"
                        name="tgl_approve1cari"
                        style="padding: 2px; width: 100px;" 
                        data-options="                                
                            url:'<?=$foldernya;?>get_tgl_approve.php',
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td>&nbsp;s/d&nbsp;</td>
                <td>
                    <input class="easyui-combobox"
                        id="tgl_approve2cari" editable="false"
                        name="tgl_approve2cari"
                        style="padding: 2px; width: 100px;" 
                        data-options="                                
                            url:'<?=$foldernya;?>get_tgl_approve.php',
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <!-- <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="nipsiapbayarcari" name="nipsiapbayarcari" data-options="required:false,prompt:''" style="width: 160px;">
                </td> -->
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchsiapbayar()" style="min-width:90px;">Search</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" plain="false" onclick="downloadsiapbayar()" style="min-width:90px;">Download</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c4" iconCls="fa fa-file-pdf" plain="false" onclick="formsiapbayar()" style="min-width:90px;">Form Kolektif</a>
                </td>
            </tr>
            </table>
    	</div>		
    </div>
    
    <script type="text/javascript">
    	function myformatter(date){
    		var y = date.getFullYear();
    		var m = date.getMonth()+1;
    		var d = date.getDate();
    		return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
    	}
    	function myparser(s){
    		if (!s) return new Date();
    		var ss = (s.split('-'));
    		var y = parseInt(ss[0],10);
    		var m = parseInt(ss[1],10);
    		var d = parseInt(ss[2],10);
    		if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
    			return new Date(y,m-1,d);
    		} else {
    			return new Date();
    		}
    	}

    	function myformatter2(date){
    		var y = date.getFullYear();
    		var m = date.getMonth()+1;
    		var d = date.getDate();
    		//return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
    		return y+'-'+(m<10?('0'+m):m);
    	}
    	function myparser2(s){
    		if (!s) return new Date();
    		var ss = (s.split('-'));
    		var y = parseInt(ss[0],10);
    		var m = parseInt(ss[1],10);
    		if (!isNaN(y) && !isNaN(m)){
    			return new Date(y,m-1);
    		} else {
    			return new Date();
    		}
    	}
    </script>
    <script type="text/javascript">
    	var url, url2;
        function downloadsiapbayar(){
            var tanggal1 = $('#tgl_approve1cari').combobox('getValue');
            var tanggal2 = $('#tgl_approve2cari').combobox('getValue');
            window.open("<?=$foldernya;?>download_siapbayar.php?tanggal1="+tanggal1+"&tanggal2="+tanggal2,"_blank");
            // window.open("<?=$foldernya;?>download_siapbayar.php","_blank");
        }
        function formsiapbayar(){
            var tanggal1 = $('#tgl_approve1cari').combobox('getValue');
            var tanggal2 = $('#tgl_approve2cari').combobox('getValue');
            if(tanggal1!=="" && tanggal2!==""){
                window.open("<?=$foldernya;?>formsppd2.php?tanggal1="+tanggal1+"&tanggal2="+tanggal2,"_blank");
            } else {
                alert("Pilih Periode Approval");
            }            
        }

        //$("#dgsiapbayar").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmsiapbayar{
    		margin:0;
    		padding:10px 10px;
    	}
    	.ftitle{
    		font-size:14px;
    		font-weight:bold;
    		padding:5px 0;
    		margin-bottom:10px;
    		border-bottom:1px solid #ccc;
    	}
    	.fitemsiapbayar{
    		margin-bottom:5px;
    	}
    	.fitemsiapbayar label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemsiapbayar input{
    		width:200px;
    	}
    	#fmsiapbayar.numberbox input{
    		text-align:right;
    	}
        .brxsmall1 {
            display: block;
            margin-bottom: -.5em !important;
        }
        .brxsmall2 {
            display: block;
            margin-bottom: -.7em !important;
        }
        .labelfor {
            font-weight:bold;
            font-size:11.5px;
            margin-bottom:3px !important;
            margin-top:5px !important;
        }

        #fmbiayasppd .numberbox .textbox-text{
            text-align: right;
        }        
    </style>
<?php
}
?>