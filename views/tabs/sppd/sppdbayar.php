<?php
// Data yang pembayarannya sudah di approve
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
		function doSearchsppdbayar(){
            $('#dgsppdbayar').datagrid('load',{
                statussppdbayarcari: $('#statussppdbayarcari').combobox('getValue'),
				nipsppdbayarcari: $('#nipsppdbayarcari').textbox('getValue'),
			});
		}
        
        function onSelectkelompoksppdbayarcari(){
            var nilai1 = $('#kelompoksppdbayarcari').combobox('getValue');
            var nilai2 = $('#kd_regionsppdbayarcari').combobox('getValue');
            var nilai3 = $('#kd_cabangsppdbayarcari').combobox('getValue');
            var url1 = 'get_spksppdbayarcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spksppdbayarcari').combogrid('clear');
            $('#no_spksppdbayarcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spksppdbayarcari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionsppdbayarcari(){
            var nilai1 = $('#kelompoksppdbayarcari').combobox('getValue');
            var nilai2 = $('#kd_regionsppdbayarcari').combobox('getValue');
            var nilai3 = $('#kd_cabangsppdbayarcari').combobox('getValue');
            var url1 = 'get_spksppdbayarcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangsppdbayarcari.php?kd_region='+nilai2;
			//alert(url1);
            $('#kd_cabangsppdbayarcari').combobox('enable');
            $('#kd_cabangsppdbayarcari').combobox('clear'); 
            $('#kd_cabangsppdbayarcari').combobox('reload',url2);
            $('#kd_cabangsppdbayarcari').combobox('setValue','000');

            $('#no_spksppdbayarcari').combogrid('clear');
            $('#no_spksppdbayarcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spksppdbayarcari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangsppdbayarcari(){
            var nilai1 = $('#kelompoksppdbayarcari').combobox('getValue');
            var nilai2 = $('#kd_regionsppdbayarcari').combobox('getValue');
            var nilai3 = $('#kd_cabangsppdbayarcari').combobox('getValue');
            var url1 = 'get_spksppdbayarcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spksppdbayarcari').combogrid('clear');
            $('#no_spksppdbayarcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spksppdbayarcari').combogrid('setValue','SEMUA');
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
        
        function onSelectblthsppdbayarcari(){
            var nilai1 = $('#blthsppdbayarcari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectkelompoksppdbayar(){
            var nilai1 = $('#kelompoksppdbayar').combobox('getValue');
            var nilai2 = $('#kd_regionsppdbayar').combobox('getValue');
            var nilai3 = $('#kd_cabangsppdbayar').combobox('getValue');
            var url1 = 'get_spksppdbayar.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spksppdbayar').combogrid('clear');
            $('#no_spksppdbayar').combogrid('grid').datagrid('reload',url1);
            $('#no_spksppdbayar').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionsppdbayar(){
            var nilai1 = $('#kelompoksppdbayar').combobox('getValue');
            var nilai2 = $('#kd_regionsppdbayar').combobox('getValue');
            var nilai3 = $('#kd_cabangsppdbayar').combobox('getValue');
            var url1 = 'get_spksppdbayar.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangsppdbayar.php?kd_region='+nilai2;
            $('#kd_cabangsppdbayar').combobox('enable');
            $('#kd_cabangsppdbayar').combobox('clear'); 
            $('#kd_cabangsppdbayar').combobox('reload',url2);
            $('#kd_cabangsppdbayar').combobox('setValue','000');
			
            $('#no_spksppdbayar').combogrid('clear');
            $('#no_spksppdbayar').combogrid('grid').datagrid('reload',url1);
            $('#no_spksppdbayar').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangsppdbayar(){
            var nilai1 = $('#kelompoksppdbayar').combobox('getValue');
            var nilai2 = $('#kd_regionsppdbayar').combobox('getValue');
            var nilai3 = $('#kd_cabangsppdbayar').combobox('getValue');
            var url1 = 'get_spksppdbayar.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            $('#no_spksppdbayar').combogrid('clear');
            $('#no_spksppdbayar').combogrid('grid').datagrid('reload',url1);
            $('#no_spksppdbayar').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionsppdbayar2(){
            var nilai1 = $('#kd_regionsppdbayar2').combobox('getValue');
            var url2 = 'get_cabangsppdbayar2.php?kd_region='+nilai1;
            $('#kd_cabangsppdbayar2').combobox('enable');
            $('#kd_cabangsppdbayar2').combobox('clear'); 
            $('#kd_cabangsppdbayar2').combobox('reload',url2);
            $('#kd_cabangsppdbayar2').combobox('setValue','000');
    	}
        
        function onSelectprojectsppdbayar(){
            var nilai1 = $('#kd_projectsppdbayar').combobox('getValue');
            var url2 = 'get_unitsppdbayar.php?kd_project='+nilai1;
            $('#kd_unitsppdbayar').combobox('enable');
            $('#kd_unitsppdbayar').combobox('clear'); 
            $('#kd_unitsppdbayar').combobox('reload',url2);
    	}
        
        function onSelectprojectsppdbayar2(){
            var nilai1 = $('#kd_projectsppdbayar2').combobox('getValue');
            var url2 = 'get_unitsppdbayar2.php?kd_project='+nilai1;
            $('#kd_unitsppdbayar2').combobox('enable');
            $('#kd_unitsppdbayar2').combobox('clear'); 
            $('#kd_unitsppdbayar2').combobox('reload',url2);
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

		function aksisppdbayar(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                if(parseFloat(row.bayarsppdbayar)===0){
                    if(parseFloat(row.totalsppdbayar)>0){
                        if(parseFloat(row.validasi_biayasppdbayar)===0){
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
            //var c = row.bayarsppdbayar+" "+row.totalsppdbayar;
            return a+b;
		}

		function biayasppdbayar(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                if(parseInt(row.bayarsppdbayar)===0 && parseInt(row.approvebayarsppdbayar)===2){
                    var a = '<a href="javascript:void(0)" title="Proses Pembayaran" onclick="editsppdbayar(\''+index+'\')"><button class="easyui-linkbutton c1" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-cog" style="font-size:8px !important;"></i></button></a>';
                    var b = '<a title="Reset Pembayaran"><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:10px;"></i></button></a>';
                } else {
                    var a = '<a title="Proses Pembayaran"><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-cog" style="font-size:10px;"></i></button></a>';
                    var b = '<a href="javascript:void(0)" title="Reset Pembayaran" onclick="destroysppdbayar(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:8px !important;"></i></button></a>';
                }
                if(parseFloat(row.totalsppdbayar)>0){
                    var c = '<a href="javascript:void(0)" title="Rincian Biaya" onclick="rincianbiayasppd(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-credit-card" style="font-size:8px !important;"></i></button></a>';
                    var d = '<a href="javascript:void(0)" title="Cetak Form sppdbayar" onclick="cetaksppdbayar(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-print" style="font-size:8px !important;"></i></button></a>';
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

        function timelinesppdbayar(value,row,index){
            var a = '<div style="overflow-y:scroll;height:120px;text-align:left;padding:5px;background-color:#f7f6f6;color:#000;margin-bottom:5px;">';
            a += '<span style="font-size:10px;white-space:nowrap;">'+row.timelinesppdbayar+'<span>';
            a += '</div>';
            return a;
        }  

        function namanyasppdbayar(value,row,index){
            var a = '<span style="font-weight:bold;font-size:11px;">'+row.nipsppdbayar+'</span>';
            a += '<br/>'
            a += '<span style="font-size:11px;">'+row.namasppdbayar;
            a += '<br/>'
            a += row.tingkat_sppd2sppdbayar+'</span>';
            a += '<br/>'
            a += '<span style="font-weight:bold;font-size:11px;">'+row.jenis_sppd2sppdbayar+'</span>';
            a += '<br/>'
            a += '<span style="font-size:11px;">'+row.level_sppd2sppdbayar+'</span>';
            return a;
        }  

        function maksudnyasppdbayar(value,row,index){
            var a = '<span style="font-size:11px;font-weight:bold;">'+row.idsppdsppdbayar+'</span>';
            a += '<br/><span style="color:blue;font-size:11px;">'+row.no_sppdsppdbayar+'</span>';
            a += '<br/>'+row.maksudsppdbayar;
            return a;
        }  

        function biayanyasppdbayar(value,row,index){
            var a = 'Total Biaya SPPD :';
            a += '<br/><span style="font-weight:bold;font-size:14px;">'+row.total2sppdbayar+'</span>';
            a += '<br/><span style="font-size:10px;color:blue;">Approve : '+row.tgl_approvebayar2sppdbayar+'</span>';
            if(parseInt(row.bayarsppdbayar)===1){
                a += '<br/><span style="font-size:13px;font-weight:bold;color:blue;">Terbayar</span>';
            } else {
                a += '<br/><span style="font-size:13px;font-weight:bold;color:red;">Belum Terbayar</span>';
            }
            if(row.tgl_bayarsppdbayar!==""){
                a += '<br/>'+row.tgl_bayar2sppdbayar;
            }
            return a;
        }  

        function jenisnyasppdbayar(value,row,index){
            var a = row.tingkat_sppdbayar2sppdbayar;
            a += '<br/>'
            a += '<span style="font-weight:bold;">'+row.jenis_sppdbayar2sppdbayar+'</span>';
            a += '<br/>'
            a += row.level_sppdbayar2sppdbayar;
            return a;
        }  

        function validasitanggal(){
            //alert('tes');
            //$("#tgl_akhirsppdbayar").datebox({'disabled':false});
            var tgl_awal = $("#tgl_awalsppdbayar").datebox('getValue');
            var datanya = tgl_awal.split("-");
            var tahun = parseInt(datanya[0]);
            var bulan = parseInt(datanya[1])-1;
            var hari = parseInt(datanya[2]);
            $('#tgl_akhirsppdbayar').datebox().datebox('calendar').calendar({
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
            var tgl_awal = $("#tgl_awalsppdbayar").datebox('getValue');
            var tgl_akhir = $("#tgl_akhirsppdbayar").datebox('getValue');
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
                $("#harisppdbayar").numberbox('setValue',jumlah_hari);
            } else {
                $("#harisppdbayar").numberbox('setValue',0);
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
            var by2 = '<a href="javascript:void(0)" onclick="cetakslip(\''+row.nipsppdbayar+'|'+row.blthsppdbayar+'\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple" style="margin-top:3px;margin-bottom:3px;"></i></a>';
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
        $("#dgsppdbayar").datagrid({
            onLoadSuccess: function(data){
                $('#dgsppdbayar').datagrid('getPanel').find('div.datagrid-header input[type=checkbox]').attr('disabled','disabled');
            },
            onCheck: function(index,row){
                if(parseInt(row.bayarsppdbayar)===1){
                    $(this).datagrid('uncheckRow', index);
                    $(this).datagrid('unselectRow', index);
                }
            },
            onUncheck: function(index,row){
            },
            onCheckAll: function(index,row){
            },
            onUncheckAll: function(index,row){
            }, 
            onSelect:function(index, row){
                if(parseInt(row.bayarsppdbayar)===1){
                    $(this).datagrid('uncheckRow', index);
                    $(this).datagrid('unselectRow', index);
                }
            },
            onBeforeSelect: function(index,row){
                var row = $(this).datagrid('getRows')[index];
                return row._selecting;
            },
            onClickCell: function(index,field,value){
                var row = $(this).datagrid('getRows')[index];
                if (field == 'biayasppdbayar'){
                    row._selecting = true;
                    $(this).datagrid('selectRow', index);
                } else {
                    row._selecting = false;
                }
            }
        });
    });
    </script>
    <table id="dgsppdbayar" title="" class="easyui-datagrid" style="width:100%;height:100%;padding-right:20px;"	
            url="<?=$foldernya;?>get_master_sppdbayar.php" pageSize="20"        
    		toolbar="#toolbarsppdbayar" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="false"
            >
    	<thead frozen="true">
    		<tr>
                <!-- <th field="aksisppdbayar" width="80" align="center" halign="center" data-options="formatter:aksisppdbayar,styler:styler1">Aksi</th> -->
                <th field="ck" checkbox="true"></th>
                <th field="biayasppdbayar" width="90" align="center" halign="center" data-options="formatter:biayasppdbayar,styler:styler1">Aksi</th>
                <th field="biayanyasppdbayar" width="160" align="center" halign="center" data-options="formatter:biayanyasppdbayar,styler:styler1">Biaya SPPD</th>
    			<th field="namanyasppdbayar" width="220" align="left" halign="left" data-options="formatter:namanyasppdbayar,styler:styler1">Data SPPD</th>
    	<thead>
    		<tr>
                <th field="maksudnyasppdbayar" width="240" align="left" halign="center" data-options="formatter:maksudnyasppdbayar,styler:styler1">Nomor SPPD<br/>Maksud Perjalanan Dinas</th>
                <th field="kedudukansppdbayar" width="160" align="center" halign="center" data-options="styler:styler1">Kedudukan</th>
                <th field="tujuansppdbayar" width="160" align="center" halign="center" data-options="styler:styler1">Tujuan</th>
                <th field="transportasisppdbayar" width="160" align="center" halign="center" data-options="styler:styler1">Transportasi</th>
                <th field="jaraksppdbayar" width="80" align="center" halign="center" data-options="formatter:formatrp2,styler:styler1">Jarak<br/>(KM)</th>
                <th field="tgl_awal2sppdbayar" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Berangkat</th>
                <th field="tgl_akhir2sppdbayar" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Kembali</th>
                <th field="harisppdbayar" width="80" align="center" halign="center" data-options="formatter:formatrp2,styler:styler1">Jumlah<br/>Hari</th>
    		</tr>
    	</thead>
    </table>
    
    <div id="toolbarsppdbayar">
    	<div id="tbsppdbayar" style="padding:3px">
            <table>
            <tr>
                <td>STATUS</td>
                <td>
                    <select id="statussppdbayarcari" name="statussppdbayarcari" class="easyui-combobox" editable="false" data-options="required:true,panelHeight:'auto'" style="width: 160px;">
                        <option value="9">Semua</option>
                        <option value="0" selected>Belum Terbayar</option>
                        <option value="1">Sudah Terbayar</option>
                    </select>                            
                </td>
                <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="nipsppdbayarcari" name="nipsppdbayarcari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchsppdbayar()" style="min-width:90px;">Search</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-check-circle" plain="false" onclick="bayarkolektif()" style="min-width:90px;">Proses Bayar Kolektif</a>
                    <!--
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus" onclick="addsppdbayar()" style="min-width:90px;">Pengajuan sppdbayar</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" onclick="downloadsppdbayar()" style="min-width:90px;">Download</a>
                    -->
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
    
    <div id="dlgsppdbayar" class="easyui-dialog" modal="true" style="min-width:250px;min-height:100px;padding:10px;" closed="true" buttons="#dlg-buttonssppdbayar">
        <form id="fmsppdbayar" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table style="width:100%;">
                <tr>
                    <td><label>Tanggal</lable></td>
                    <td>
                        <input class="easyui-datebox" id="tgl_bayarsppdbayar" name="tgl_bayarsppdbayar" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="dlg-buttonssppdbayar">        
    	<a id="btnsavebiaya" href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savesppdbayar()" style="min-width:90px">Simpan</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgsppdbayar').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgsppdbayar2" class="easyui-dialog" modal="true" style="min-width:250px;min-height:100px;padding:10px;" closed="true" buttons="#dlg-buttonssppdbayar2">
        <form id="fmsppdbayar2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="idsnya" name="idsnya">
            <table style="width:100%;">
                <tr>
                    <td><label>Tanggal</lable></td>
                    <td>
                        <input class="easyui-datebox" id="tgl_bayarsppdbayar2" name="tgl_bayarsppdbayar2" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="dlg-buttonssppdbayar2">        
    	<a id="btnsavebiaya" href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savesppdbayar2()" style="min-width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgsppdbayar2').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgbiayasppd" class="easyui-dialog" modal="true" style="width:600px;min-height:160px;padding:10px;top:100px;" closed="true" buttons="#dlg-buttonsbiaya">
    	<form id="fmbiayasppd" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="idsppdbayarbiaya" name="idsppdbayarbiaya">
            <label style="font-weight:bold;">Transportasi</label>
            <table style="width:100%;">
            <tr>
                <td><label id="lbltransportasi"></lable></td>
                <td style="width:80px;">
                    <input class="easyui-numberbox" id="transportasibiaya" name="transportasibiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                </td> 
            </tr>
            <tr>
                <td><label>Dari rumah ke bandara/stasiun/pelabuhan pp</lable></td>
                <td style="width:80px;">
                    <input class="easyui-numberbox" id="transportasi_lokalbiaya" name="transportasi_lokalbiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                </td> 
            </tr>
            <tr>
                <td><label>Airport Tax</lable></td>
                <td style="width:80px;">
                    <input class="easyui-numberbox" id="airport_taxbiaya" name="airport_taxbiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
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

            <div id="divsppdbayar1">                
                <label style="font-weight:bold;">Akomodasi PD Umum / Detasering Bulan Pertama</label>
                <table style="width:100%;">
                <tr>
                    <td style="width:100px;"><label>Konsumsi</lable></td>
                    <td style="width:70px;"><label id="lblhari_konsumsi1"></lable></td>
                    <td style="width:70px;"><input class="easyui-numberbox" id="persen_konsumsi1biaya" name="persen_konsumsi1biaya" data-options="onChange:hitungkonsumsi1,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;" readonly></td>
                    <td><label id="lblnilai_konsumsi1"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_konsumsi1biaya" name="total_konsumsi1biaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                    </td> 
                </tr>
                <tr>
                    <td><label>Laundry</lable></td>
                    <td><label id="lblhari_laundry1"></lable></td>
                    <td><input class="easyui-numberbox" id="persen_laundry1biaya" name="persen_laundry1biaya" data-options="onChange:hitunglaundry1,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;" readonly></td>
                    <td><label id="lblnilai_laundry1"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_laundry1biaya" name="total_laundry1biaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                    </td> 
                </tr>
                <tr>
                    <td><label>Penginapan</lable></td>
                    <td><label id="lblhari_penginapan1"></lable></td>
                    <td><input class="easyui-numberbox" id="persen_penginapan1biaya" name="persen_penginapan1biaya" data-options="onChange:hitungpenginapan1,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;" readonly></td>
                    <td><label id="lblnilai_penginapan1"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_penginapan1biaya" name="total_penginapan1biaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                    </td> 
                </tr>
                </table>
            </div>
            
            <div id="divsppdbayar2">
                <label style="font-weight:bold;">Akomodasi PD Umum / Detasering Bulan Berikutnya</label>
                <table style="width:100%;">
                <tr>
                    <td style="width:100px;"><label>Konsumsi</lable></td>
                    <td style="width:70px;"><label id="lblhari_konsumsi2"></lable></td>
                    <td style="width:70px;"><input class="easyui-numberbox" id="persen_konsumsi2biaya" name="persen_konsumsi2biaya" data-options="onChange:hitungkonsumsi2,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;" readonly></td>
                    <td><label id="lblnilai_konsumsi2"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_konsumsi2biaya" name="total_konsumsi2biaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                    </td> 
                </tr>
                <tr>
                    <td><label>Laundry</lable></td>
                    <td><label id="lblhari_laundry2"></lable></td>
                    <td><input class="easyui-numberbox" id="persen_laundry2biaya" name="persen_laundry2biaya" data-options="onChange:hitunglaundry2,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;" readonly></td>
                    <td><label id="lblnilai_laundry2"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_laundry2biaya" name="total_laundry2biaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                    </td> 
                </tr>
                <tr>
                    <td><label>Penginapan</lable></td>
                    <td><label id="lblhari_penginapan2"></lable></td>
                    <td><input class="easyui-numberbox" id="persen_penginapan2biaya" name="persen_penginapan2biaya" data-options="onChange:hitungpenginapan2,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;" readonly></td>
                    <td><label id="lblnilai_penginapan2"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_penginapan2biaya" name="total_penginapan2biaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                    </td> 
                </tr>
                </table>
            </div>
            
            <div id="divsppdbayar3">
                <label style="font-weight:bold;">Akomodasi PD Perawatan Kesehatan / Perpanjangan</label>
                <table style="width:100%;">
                <tr>
                    <td style="width:100px;"><label>Pegawai</lable></td>
                    <td style="width:70px;"><label id="lblhari_pegawai"></lable></td>
                    <td style="width:70px;"><input class="easyui-numberbox" id="persen_pegawaibiaya" name="persen_pegawaibiaya" data-options="onChange:hitungpegawai,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;" readonly></td>
                    <td><label id="lblnilai_pengawai"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_pegawaibiaya" name="total_pegawaibiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                    </td> 
                </tr>
                <tr>
                    <td><label>Keluarga</lable></td>
                    <td><label id="lblhari_keluarga"></lable></td>
                    <td><input class="easyui-numberbox" id="persen_keluargabiaya" name="persen_keluargabiaya" data-options="onChange:hitungkeluarga,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;" readonly></td>
                    <td><label id="lblnilai_keluarga"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_keluargabiaya" name="total_keluargabiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                    </td> 
                </tr>
                <tr>
                    <td><label>Pengantar</lable></td>
                    <td><label id="lblhari_pengantar"></lable></td>
                    <td><input class="easyui-numberbox" id="persen_pengantarbiaya" name="persen_pengantarbiaya" data-options="onChange:hitungpengantar,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;" readonly></td>
                    <td><label id="lblnilai_pengantar"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_pengantarbiaya" name="total_pengantarbiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                    </td> 
                </tr>
                </table>
            </div>
            
            <div id="divsppdbayar4">
                <label style="font-weight:bold;">Bantuan Pindah (Max 14 hari)</label>
                <table style="width:100%;">
                <tr>
                    <td style="width:100px;"><label>Istri/Suami</lable></td>
                    <td style="width:70px;"><label id="lblhari_suamiistri"></lable></td>
                    <td style="width:70px;"><input class="easyui-numberbox" id="persen_suamiistribiaya" name="persen_suamiistribiaya" data-options="onChange:hitungsuamiistri,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;" readonly></td>
                    <td><label id="lblnilai_suamiistri"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_suamiistribiaya" name="total_suamiistribiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                    </td> 
                </tr>
                <tr>
                    <td><label>Anak Pegawai</lable></td>
                    <td><label id="lblhari_anak"></lable></td>
                    <td><input class="easyui-numberbox" id="persen_anakbiaya" name="persen_anakbiaya" data-options="onChange:hitunganak,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.',suffix:'%'" style="width: 60px;text-align:right;" readonly></td>
                    <td><label id="lblnilai_anak"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_anakbiaya" name="total_anakbiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                    </td> 
                </tr>
                <tr>
                    <td colspan="4"><label>Bantuan Pengepakan</lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_pengepakanbiaya" name="total_pengepakanbiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                    </td> 
                </tr>
                </table>
            </div>
            <hr/>
            <table style="width:100%;">
            <tr>
                <td><label style="font-weight:bold;">Total Biaya SPPD</lable></td>
                <td style="width:80px;">
                    <input class="easyui-numberbox" id="totalbiaya" name="totalbiaya" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                </td> 
            </tr>
            </table>

    	</form>
    </div>
    <div id="dlg-buttonsbiaya">        
    	<!-- <a id="btnsavebiaya" href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savebiaya()" style="min-width:90px">Simpan</a> -->
    	<a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgbiayasppd').dialog('close')" style="min-width:90px">Tutup</a>
    </div>
    
    <div id="dlgslip2" class="easyui-dialog" modal="true" style="width:1200px;height:500px;padding:0px;" closed="true" buttons="">
        <iframe id="panelslip2" src="#" style="width: 100%; height: 460px; border: none;"></iframe>
    </div>
    
    <div id="dlglist" class="easyui-dialog" modal="true" style="width:1200px;height:600px;padding:0px;" closed="true" buttons="">
        <iframe id="panellist" src="#" style="width: 100%; height: 550px; border: none;"></iframe>
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
    	function editsppdbayar(index){
            var row = $('#dgsppdbayar').datagrid('getRow', index);
    		if (row){
                $('#dlgsppdbayar').dialog('open').dialog('setTitle','Update Pembayaran');
                $('#fmsppdbayar').form('clear');
                $('#fmsppdbayar').form('load',row);
                $("#tgl_bayarsppdbayar").datebox('setValue','<?=date("Y-m-d");?>');
                url = '<?=$foldernya;?>update_sppdbayar.php?id='+row.idsppdbayar;
            }
    	}
    	function savesppdbayar(){
            $.messager.progress({height:75, text:'Update Pembayaran...'});
            $('#fmsppdbayar').form('submit',{
                url: url,
                onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
                },
                success: function(result){
                    //alert(result);    
                    $.messager.progress('close');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlgsppdbayar').dialog('close');
                        $('#dgsppdbayar').datagrid('reload');
                    }
                }
            });
            
    	}
    	function destroysppdbayar(index){
            var row = $('#dgsppdbayar').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Rese pembayaran SPPD ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_sppdbayar.php',{id:row.idsppdbayar},function(result){
    						if (result.success){
    							$('#dgsppdbayar').datagrid('reload');
    						} else {
    							$.messager.show({
    								title: 'Error',
    								msg: result.errorMsg
    							});
    						}
    					},'json');
    				}
    			});
    		}
    	}

    	function bayarkolektif(index){
            var ids = [];
            var rows = $('#dgsppdbayar').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idsppdbayar);
            }
            var ids2 = ids.join(';');
            $("#idsnya").val(ids2);
    		if (jumlah>0){
                $('#dlgsppdbayar2').dialog('open').dialog('setTitle','Update Pembayaran Kolektif');
                $('#dlgsppdbayar2').form('clear');
                // $('#dlgsppdbayar2').form('load',row);
                $("#idsnya").val(ids2);
                $("#tgl_bayarsppdbayar2").datebox('setValue','<?=date("Y-m-d");?>');
                url = '<?=$foldernya;?>update_sppdbayar2.php?id=0';
            } else {
                alert("Tidak ada data yang dipilih!");
            }
    	}
    	function savesppdbayar2(){
            var idsnya = $("#idsnya").val();
            $.messager.progress({height:75, text:'Update Pembayaran berdasarkan pilihan...'});
            $('#fmsppdbayar2').form('submit',{
                url: url+'&idsnya='+idsnya,
                onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
                },
                success: function(result){
                    // alert(result);    
                    $.messager.progress('close');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlgsppdbayar2').dialog('close');
                        $('#dgsppdbayar').datagrid('reload');
                    }
                }
            });
            
    	}
        
    	function rincianbiayasppd(index){
            var row = $('#dgsppdbayar').datagrid('getRow', index);
    		if (row){
                $('#dlgbiayasppd').dialog('open').dialog('setTitle','Rincian Biaya SPPD');
                $('#fmbiayasppd').form('clear');
                $('#fmbiayasppd').form('load',row);
                $("#lbltransportasi").html(row.kedudukansppdbayar+' - '+row.tujuansppdbayar+' (<span style="font-weight:bold;">'+row.transportasisppdbayar+'</span>)');
                $("#lblhari_konsumsi1").html(row.hari_konsumsi1biaya+" hari");
                $("#lblnilai_konsumsi1").html(" X Rp. "+row.nilai_konsumsi1biaya);
                $("#lblhari_laundry1").html(row.hari_laundry1biaya+" hari");
                $("#lblnilai_laundry1").html(" X Rp. "+row.nilai_laundry1biaya);
                $("#lblhari_penginapan1").html(row.hari_penginapan1biaya+" hari");
                $("#lblnilai_penginapan1").html(" X Rp. "+row.nilai_penginapan1biaya);
                $("#lblhari_konsumsi2").html(row.hari_konsumsi2biaya+" hari");
                $("#lblnilai_konsumsi2").html(" X Rp. "+row.nilai_konsumsi2biaya);
                $("#lblhari_laundry2").html(row.hari_laundry2biaya+" hari");
                $("#lblnilai_laundry2").html(" X Rp. "+row.nilai_laundry2biaya);
                $("#lblhari_penginapan2").html(row.hari_penginapan2biaya+" hari");
                $("#lblnilai_penginapan2").html(" X Rp. "+row.nilai_penginapan2biaya);
                
                $("#lblhari_pengawai").html(row.hari_pegawaibiaya+" hari");
                $("#lblnilai_pengawai").html(" X Rp. "+row.nilai_pegawaibiaya);
                $("#lblhari_keluarga").html(row.hari_keluargabiaya+" hari");
                $("#lblnilai_keluarga").html(" X Rp. "+row.nilai_keluargabiaya);
                $("#lblhari_pengantar").html(row.hari_pengantarbiaya+" hari");
                $("#lblnilai_pengantar").html(" X Rp. "+row.nilai_pengantarbiaya);

                $("#lblhari_suamiistri").html(row.hari_suamiistribiaya+" hari");
                $("#lblnilai_suamiistri").html(" X Rp. "+row.nilai_suamiistribiaya);
                $("#lblhari_anak").html(row.hari_anakbiaya+" hari");
                $("#lblnilai_anak").html(" X Rp. "+row.nilai_anakbiaya);

                $("#divsppdbayar1").hide();
                $("#divsppdbayar2").hide();
                $("#divsppdbayar3").hide();
                $("#divsppdbayar4").hide();
                if(parseInt(row.jenis_sppdsppdbayar)==1 || parseInt(row.jenis_sppdsppdbayar)==4){
                    $("#divsppdbayar1").show();
                } else if(parseInt(row.jenis_sppdsppdbayar)==2){
                    $("#divsppdbayar2").show();
                } else if(parseInt(row.jenis_sppdsppdbayar)==3){
                    $("#divsppdbayar1").show();
                    $("#divsppdbayar4").show();
                }
                if(parseInt(row.validasi_biayasppdbayar)===0){                    
                    $('#btnsavebiaya').linkbutton('enable');
                } else {
                    $('#btnsavebiaya').linkbutton('disable');
                }
                $('#dlgbiayasppd').dialog('resize');
                url = '<?=$foldernya;?>update_biaya.php?idsppdbayar='+row.idsppdsppdbayar;
            }
    	}
    	function savebiaya(){
            //alert(url);
            $('#fmbiaya').form('submit',{
                url: url,
                onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
                },
                success: function(result){
                    //alert(result);    
                    //$.messager.progress('close');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlgbiayasppd').dialog('close');
                        $('#dgsppdbayar').datagrid('reload');
                    }
                }
            });
            
    	}

    	function validasi(index){
            var row = $('#dgsppdbayar').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Validasi perhitungan biaya sppd, Lanjutkan?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>validasi.php',{idsppd:row.idsppdsppdbayar},function(result){
    						if (result.success){
    							$('#dgsppdbayar').datagrid('reload');
    						} else {
    							$.messager.show({
    								title: 'Error',
    								msg: result.errorMsg
    							});
    						}
    					},'json');
    				}
    			});
    		}
    	}        
    	function resetvalidasi(index){
            var row = $('#dgsppdbayar').datagrid('getRow', index);
    		if (row){
                if(parseInt(row.approvebayarsppdbayar)===2){
                    var keterangan = ". Proses ini sekaligus akan melakukan reset approval pembayaran";
                } else {
                    var keterangan = "";
                }
    			$.messager.confirm('Konfirmasi','Reset validasi perhitungan biaya sppd'+keterangan+', Lanjutkan?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>reset_validasi.php',{idsppd:row.idsppdbayarsppdbayar},function(result){
    						if (result.success){
    							$('#dgsppdbayar').datagrid('reload');
    						} else {
    							$.messager.show({
    								title: 'Error',
    								msg: result.errorMsg
    							});
    						}
    					},'json');
    				}
    			});
    		}
    	}        

    	function resetsdm(index){
            var row = $('#dgsppdbayar').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Reset Approval SDM?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>reset_sdm.php',{idsppdbayar:row.idsppdbayarsppdbayar},function(result){
    						if (result.success){
    							$('#dgsppdbayar').datagrid('reload');
    						} else {
    							$.messager.show({
    								title: 'Error',
    								msg: result.errorMsg
    							});
    						}
    					},'json');
    				}
    			});
    		}
    	}                

        function pengikutsppdbayar(index){
            var row = $('#dgsppdbayar').datagrid('getRow', index);
    		if (row){
                $('#dlgpengikut').dialog('open').dialog('setTitle','Pengikut sppdbayar');
                $('#dgpengikut').datagrid('loadData',[]);
                $('#dgpengikut').datagrid('load','<?=$foldernya;?>get_data_pengikut.php?idsppdbayar='+row.idsppdbayarsppdbayar);
                $("#lblnippegawai").text(row.nipsppdbayar);
                $("#lblnamapegawai").text(row.namasppdbayar);
                $("#idsppdbayarpengikut").val(row.idsppdbayarsppdbayar);
            }
        }

        function addpengikut(){
            var idsppdbayarnya = $("#idsppdbayarpengikut").val();
            $('#dlgpengikut2').dialog('open').dialog('setTitle','Input Data Pengikut');
            $('#fmpengikut2').form('clear');
            $("#idsppdbayarpengikut2").val(idsppdbayarnya);
            $("#hubunganpengikut2").combobox('reload','<?=$foldernya;?>get_hubungan.php?idsppdbayar='+idsppdbayarnya);
            url = '<?=$foldernya;?>save_pengikut2.php';
        }

        function editpengikut(index){
            var row = $('#dgpengikut').datagrid('getRow', index);
    		if (row){
                $('#dlgpengikut2').dialog('open').dialog('setTitle','Edit Data Pengikut');
                $('#fmpengikut2').form('clear');
                $('#fmpengikut2').form('load',row);
                $("#hubunganpengikut2").combobox('reload','<?=$foldernya;?>get_hubungan.php?idsppdbayar='+row.idsppdbayarpengikut);
                url = '<?=$foldernya;?>update_pengikut2.php?id='+row.idpengikut;
            }
        }
    	function savepengikut2(){
            $('#fmpengikut2').form('submit',{
                url: url,
                onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
                },
                success: function(result){
                    //alert(result);    
                    //$.messager.progress('close');
                    if (result.errorMsg){
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
    	function destroypengikut(index){
            var row = $('#dgpengikut').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data pengikut ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_pengikut2.php',{id:row.idpengikut},function(result){
                            //alert(result);
    						if (result.success){
    							$('#dgpengikut').datagrid('reload');
    						} else {
    							$.messager.show({
    								title: 'Error',
    								msg: result.errorMsg
    							});
    						}
    					},'json');
    				}
    			});
    		}
    	}
    	function cetaksppdbayar(index){
            var row = $('#dgsppdbayar').datagrid('getRow', index);
    		if (row){
                window.open('<?=$foldernya;?>formsppd.php?idsppd='+row.idsppdsppdbayar,'_blank');
            }
        }

        //$("#dgsppdbayar").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmsppdbayar{
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
    	.fitemsppdbayar{
    		margin-bottom:5px;
    	}
    	.fitemsppdbayar label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemsppdbayar input{
    		width:200px;
    	}
    	#fmsppdbayar.numberbox input{
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