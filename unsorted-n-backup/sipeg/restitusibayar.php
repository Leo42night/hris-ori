<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "sipeg/";    
    include "koneksi.php";
    ?>
    <script type="text/javascript">                     
		function doSearchrestitusibayar(){
            $('#dgrestitusibayar').datagrid('load',{
                statusrestitusibayarcari: $('#statusrestitusibayarcari').combobox('getValue'),
				niprestitusibayarcari: $('#niprestitusibayarcari').textbox('getValue'),
			});
		}
        
        function onSelectkelompokrestitusibayarcari(){
            var nilai1 = $('#kelompokrestitusibayarcari').combobox('getValue');
            var nilai2 = $('#kd_regionrestitusibayarcari').combobox('getValue');
            var nilai3 = $('#kd_cabangrestitusibayarcari').combobox('getValue');
            var url1 = 'get_spkrestitusibayarcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkrestitusibayarcari').combogrid('clear');
            $('#no_spkrestitusibayarcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrestitusibayarcari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionrestitusibayarcari(){
            var nilai1 = $('#kelompokrestitusibayarcari').combobox('getValue');
            var nilai2 = $('#kd_regionrestitusibayarcari').combobox('getValue');
            var nilai3 = $('#kd_cabangrestitusibayarcari').combobox('getValue');
            var url1 = 'get_spkrestitusibayarcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangrestitusibayarcari.php?kd_region='+nilai2;
			//alert(url1);
            $('#kd_cabangrestitusibayarcari').combobox('enable');
            $('#kd_cabangrestitusibayarcari').combobox('clear'); 
            $('#kd_cabangrestitusibayarcari').combobox('reload',url2);
            $('#kd_cabangrestitusibayarcari').combobox('setValue','000');

            $('#no_spkrestitusibayarcari').combogrid('clear');
            $('#no_spkrestitusibayarcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrestitusibayarcari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangrestitusibayarcari(){
            var nilai1 = $('#kelompokrestitusibayarcari').combobox('getValue');
            var nilai2 = $('#kd_regionrestitusibayarcari').combobox('getValue');
            var nilai3 = $('#kd_cabangrestitusibayarcari').combobox('getValue');
            var url1 = 'get_spkrestitusibayarcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkrestitusibayarcari').combogrid('clear');
            $('#no_spkrestitusibayarcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrestitusibayarcari').combogrid('setValue','SEMUA');
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
        
        function onSelectblthrestitusibayarcari(){
            var nilai1 = $('#blthrestitusibayarcari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectkelompokrestitusibayar(){
            var nilai1 = $('#kelompokrestitusibayar').combobox('getValue');
            var nilai2 = $('#kd_regionrestitusibayar').combobox('getValue');
            var nilai3 = $('#kd_cabangrestitusibayar').combobox('getValue');
            var url1 = 'get_spkrestitusibayar.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkrestitusibayar').combogrid('clear');
            $('#no_spkrestitusibayar').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrestitusibayar').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionrestitusibayar(){
            var nilai1 = $('#kelompokrestitusibayar').combobox('getValue');
            var nilai2 = $('#kd_regionrestitusibayar').combobox('getValue');
            var nilai3 = $('#kd_cabangrestitusibayar').combobox('getValue');
            var url1 = 'get_spkrestitusibayar.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangrestitusibayar.php?kd_region='+nilai2;
            $('#kd_cabangrestitusibayar').combobox('enable');
            $('#kd_cabangrestitusibayar').combobox('clear'); 
            $('#kd_cabangrestitusibayar').combobox('reload',url2);
            $('#kd_cabangrestitusibayar').combobox('setValue','000');
			
            $('#no_spkrestitusibayar').combogrid('clear');
            $('#no_spkrestitusibayar').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrestitusibayar').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangrestitusibayar(){
            var nilai1 = $('#kelompokrestitusibayar').combobox('getValue');
            var nilai2 = $('#kd_regionrestitusibayar').combobox('getValue');
            var nilai3 = $('#kd_cabangrestitusibayar').combobox('getValue');
            var url1 = 'get_spkrestitusibayar.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            $('#no_spkrestitusibayar').combogrid('clear');
            $('#no_spkrestitusibayar').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrestitusibayar').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionrestitusibayar2(){
            var nilai1 = $('#kd_regionrestitusibayar2').combobox('getValue');
            var url2 = 'get_cabangrestitusibayar2.php?kd_region='+nilai1;
            $('#kd_cabangrestitusibayar2').combobox('enable');
            $('#kd_cabangrestitusibayar2').combobox('clear'); 
            $('#kd_cabangrestitusibayar2').combobox('reload',url2);
            $('#kd_cabangrestitusibayar2').combobox('setValue','000');
    	}
        
        function onSelectprojectrestitusibayar(){
            var nilai1 = $('#kd_projectrestitusibayar').combobox('getValue');
            var url2 = 'get_unitrestitusibayar.php?kd_project='+nilai1;
            $('#kd_unitrestitusibayar').combobox('enable');
            $('#kd_unitrestitusibayar').combobox('clear'); 
            $('#kd_unitrestitusibayar').combobox('reload',url2);
    	}
        
        function onSelectprojectrestitusibayar2(){
            var nilai1 = $('#kd_projectrestitusibayar2').combobox('getValue');
            var url2 = 'get_unitrestitusibayar2.php?kd_project='+nilai1;
            $('#kd_unitrestitusibayar2').combobox('enable');
            $('#kd_unitrestitusibayar2').combobox('clear'); 
            $('#kd_unitrestitusibayar2').combobox('reload',url2);
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

		function aksirestitusibayar(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                if(parseFloat(row.bayarrestitusibayar)===0){
                    if(parseFloat(row.totalrestitusibayar)>0){
                        if(parseFloat(row.validasi_biayarestitusibayar)===0){
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
            //var c = row.bayarrestitusibayar+" "+row.totalrestitusibayar;
            return a+b;
		}

		function biayarestitusibayar(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                // if(parseInt(row.bayar_restitusirestitusibayar)===0 && parseInt(row.approvebayarrestitusibayar)===2){
                if(parseInt(row.bayar_restitusirestitusibayar)===0){
                    var a = '<a href="javascript:void(0)" title="Proses Pembayaran" onclick="editrestitusibayar(\''+index+'\')"><button class="easyui-linkbutton c1" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-cog" style="font-size:8px !important;"></i></button></a>';
                    var b = '<a title="Reset Pembayaran"><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:10px;"></i></button></a>';
                } else {
                    var a = '<a title="Proses Pembayaran"><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-cog" style="font-size:10px;"></i></button></a>';
                    var b = '<a href="javascript:void(0)" title="Reset Pembayaran" onclick="destroyrestitusibayar(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:8px !important;"></i></button></a>';
                }
                if(parseFloat(row.restitusirestitusibayar)>0){
                    var c = '<a href="javascript:void(0)" title="Rincian Biaya" onclick="rincianbiayarestitusi(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-credit-card" style="font-size:8px !important;"></i></button></a>';
                    var d = '<a href="javascript:void(0)" title="Cetak Form Restitusi" onclick="cetakrestitusibayar(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-print" style="font-size:8px !important;"></i></button></a>';
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

        function timelinerestitusibayar(value,row,index){
            var a = '<div style="overflow-y:scroll;height:120px;text-align:left;padding:5px;background-color:#f7f6f6;color:#000;margin-bottom:5px;">';
            a += '<span style="font-size:10px;white-space:nowrap;">'+row.timelinerestitusibayar+'<span>';
            a += '</div>';
            return a;
        }  

        function namanyarestitusibayar(value,row,index){
            var a = '<span style="font-weight:bold;font-size:11px;">'+row.niprestitusibayar+'</span>';
            a += '<br/>'
            a += '<span style="font-size:11px;">'+row.namarestitusibayar;
            a += '<br/>'
            a += row.tingkat_sppd2restitusibayar+'</span>';
            a += '<br/>'
            a += '<span style="font-weight:bold;font-size:11px;">'+row.jenis_sppd2restitusibayar+'</span>';
            a += '<br/>'
            a += '<span style="font-size:11px;">'+row.level_sppd2restitusibayar+'</span>';
            return a;
        }  

        function maksudnyarestitusibayar(value,row,index){
            var a = '<span style="font-size:11px;font-weight:bold;">'+row.idsppdrestitusibayar+'</span>';
            a += '<br/><span style="color:blue;font-size:11px;">'+row.no_sppdrestitusibayar+'</span>';
            a += '<br/>'+row.maksudrestitusibayar;
            return a;
        }  

        function biayanyarestitusibayar(value,row,index){
            var a = 'Total Biaya Restitusi :';
            a += '<br/><span style="font-weight:bold;font-size:14px;">'+row.restitusi2restitusibayar+'</span>';
            if(parseInt(row.bayar_restitusirestitusibayar)===1){
                a += '<br/><span style="font-size:13px;font-weight:bold;color:blue;">Terbayar</span>';
            } else {
                a += '<br/><span style="font-size:13px;font-weight:bold;color:red;">Belum Terbayar</span>';
            }
            if(row.tgl_bayar_restitusirestitusibayar!==""){
                a += '<br/>'+row.tgl_bayar_restitusi2restitusibayar;
            }
            return a;
        }  

        function jenisnyarestitusibayar(value,row,index){
            var a = row.tingkat_restitusibayar2restitusibayar;
            a += '<br/>'
            a += '<span style="font-weight:bold;">'+row.jenis_restitusibayar2restitusibayar+'</span>';
            a += '<br/>'
            a += row.level_restitusibayar2restitusibayar;
            return a;
        }  

        function validasitanggal(){
            //alert('tes');
            //$("#tgl_akhirrestitusibayar").datebox({'disabled':false});
            var tgl_awal = $("#tgl_awalrestitusibayar").datebox('getValue');
            var datanya = tgl_awal.split("-");
            var tahun = parseInt(datanya[0]);
            var bulan = parseInt(datanya[1])-1;
            var hari = parseInt(datanya[2]);
            $('#tgl_akhirrestitusibayar').datebox().datebox('calendar').calendar({
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
            var tgl_awal = $("#tgl_awalrestitusibayar").datebox('getValue');
            var tgl_akhir = $("#tgl_akhirrestitusibayar").datebox('getValue');
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
                $("#harirestitusibayar").numberbox('setValue',jumlah_hari);
            } else {
                $("#harirestitusibayar").numberbox('setValue',0);
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
            var by2 = '<a href="javascript:void(0)" onclick="cetakslip(\''+row.niprestitusibayar+'|'+row.blthrestitusibayar+'\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple" style="margin-top:3px;margin-bottom:3px;"></i></a>';
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

        function disablecek(){
            var opts = $('#dgrestitusibayar').datagrid('options');
            var rows = $('#dgrestitusibayar').datagrid('getRows');
            for(var i=0; i < rows.length; i++){
                var row = rows[i];
                var tr = opts.finder.getTr($('#dgrestitusibayar')[0],i);
                if(parseInt(row.bayar_restitusirestitusibayar)===1){
                    tr.find('input[type=checkbox]').attr('disabled','disabled');
                } 
            }  
        }
    </script>
    
    <script type="text/javascript">
    $(function(){
        $("#dgrestitusibayar").datagrid({
            onLoadSuccess: function(data){
                $('#dgrestitusibayar').datagrid('getPanel').find('div.datagrid-header input[type=checkbox]').attr('disabled','disabled');
            },
            onCheck: function(index,row){
                if(parseInt(row.bayar_restitusirestitusibayar)===1){
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
                if(parseInt(row.bayar_restitusirestitusibayar)===1){
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
                if (field == 'biayanyarestitusibayar'){
                    row._selecting = true;
                    $(this).datagrid('selectRow', index);
                } else {
                    row._selecting = false;
                }
            }
        });
    });
    </script>
    <table id="dgrestitusibayar" title="" class="easyui-datagrid" style="width:100%;height:100%;padding-right:20px;"	
            url="<?=$foldernya;?>get_master_restitusibayar.php" pageSize="20"        
    		toolbar="#toolbarrestitusibayar" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="false"
            >
    	<thead frozen="true">
    		<tr>
                <!-- <th field="aksirestitusibayar" width="80" align="center" halign="center" data-options="formatter:aksirestitusibayar,styler:styler1">Aksi</th> -->
                <th field="ck" checkbox="true"></th>
                <th field="biayarestitusibayar" width="90" align="center" halign="center" data-options="formatter:biayarestitusibayar,styler:styler1">Aksi</th>
                <th field="biayanyarestitusibayar" width="160" align="center" halign="center" data-options="formatter:biayanyarestitusibayar,styler:styler1">Biaya Restitusi</th>
    			<th field="namanyarestitusibayar" width="220" align="left" halign="left" data-options="formatter:namanyarestitusibayar,styler:styler1">Data SPPD</th>
    	<thead>
    		<tr>
                <th field="maksudnyarestitusibayar" width="240" align="left" halign="center" data-options="formatter:maksudnyarestitusibayar,styler:styler1">Nomor SPPD<br/>Maksud Perjalanan Dinas</th>
                <th field="kedudukanrestitusibayar" width="160" align="center" halign="center" data-options="styler:styler1">Kedudukan</th>
                <th field="tujuanrestitusibayar" width="160" align="center" halign="center" data-options="styler:styler1">Tujuan</th>
                <th field="transportasirestitusibayar" width="160" align="center" halign="center" data-options="styler:styler1">Transportasi</th>
                <th field="jarakrestitusibayar" width="80" align="center" halign="center" data-options="formatter:formatrp2,styler:styler1">Jarak<br/>(KM)</th>
                <th field="tgl_awal2restitusibayar" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Berangkat</th>
                <th field="tgl_akhir2restitusibayar" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Kembali</th>
                <th field="harirestitusibayar" width="80" align="center" halign="center" data-options="formatter:formatrp2,styler:styler1">Jumlah<br/>Hari</th>
    		</tr>
    	</thead>
    </table>
    
    <div id="toolbarrestitusibayar">
    	<div id="tbrestitusibayar" style="padding:3px">
            <table>
            <tr>
                <td>STATUS</td>
                <td>
                    <select id="statusrestitusibayarcari" name="statusrestitusibayarcari" class="easyui-combobox" editable="false" data-options="required:true,panelHeight:'auto'" style="width: 160px;">
                        <option value="9">Semua</option>
                        <option value="0" selected>Belum Terbayar</option>
                        <option value="1">Sudah Terbayar</option>
                    </select>                            
                </td>
                <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="niprestitusibayarcari" name="niprestitusibayarcari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchrestitusibayar()" style="min-width:90px;">Search</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-check-circle" plain="false" onclick="bayarkolektif()" style="min-width:90px;">Proses Bayar Kolektif</a>
                    <!--
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus" onclick="addrestitusibayar()" style="min-width:90px;">Pengajuan restitusibayar</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" onclick="downloadrestitusibayar()" style="min-width:90px;">Download</a>
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
    
    <div id="dlgrestitusibayar" class="easyui-dialog" modal="true" style="min-width:250px;min-height:100px;padding:10px;" closed="true" buttons="#dlg-buttonsrestitusibayar">
        <form id="fmrestitusibayar" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table style="width:100%;">
                <tr>
                    <td><label>Tanggal</lable></td>
                    <td>
                        <input class="easyui-datebox" id="tgl_bayarrestitusibayar" name="tgl_bayarrestitusibayar" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="dlg-buttonsrestitusibayar">        
    	<a id="btnsavebiaya" href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="saverestitusibayar()" style="min-width:90px">Simpan</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgrestitusibayar').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgrestitusibayar2" class="easyui-dialog" modal="true" style="min-width:250px;min-height:100px;padding:10px;" closed="true" buttons="#dlg-buttonsrestitusibayar2">
        <form id="fmrestitusibayar2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="idsnya" name="idsnya">
            <table style="width:100%;">
                <tr>
                    <td><label>Tanggal</lable></td>
                    <td>
                        <input class="easyui-datebox" id="tgl_bayarrestitusibayar2" name="tgl_bayarrestitusibayar2" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="dlg-buttonsrestitusibayar2">        
    	<a id="btnsavebiaya" href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="saverestitusibayar2()" style="min-width:90px">Proses</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgrestitusibayar2').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgbiayarestitusi" class="easyui-dialog" modal="true" style="width:600px;min-height:160px;padding:10px;top:150px;" closed="true" buttons="#dlg-buttonsbiaya">
    	<form id="fmbiayarestitusi" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="idrestitusibayarbiaya" name="idrestitusibayarbiaya">
            <!-- <label style="font-weight:bold;">Transportasi</label> -->
            <table id="tbl_biaya1" style="width:100%;"></table>
            <hr/>
            <!-- <table id="tbl_biaya2" style="width:100%;"></table> -->
            <table style="width:100%;">
            <tr>
                <td style="width:160px;font-weight:bold;">TOTAL</td>
                <td style="width:300px;font-weight:bold;"></td>
                <td style="width:120px;text-align:right;font-weight:bold;"><label id="lblrestitusi"></label></td>
                <!-- <td style="width:80px;">
                    <input class="easyui-numberbox" id="totalrestitusi" name="totalbiaya" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                </td>  -->
            </tr>
            </table>

    	</form>
    </div>
    <div id="dlg-buttonsbiaya">        
    	<!-- <a id="btnsavebiaya" href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savebiaya()" style="min-width:90px">Simpan</a> -->
    	<a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgbiayarestitusi').dialog('close')" style="min-width:90px">Tutup</a>
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
    	function editrestitusibayar(index){
            var row = $('#dgrestitusibayar').datagrid('getRow', index);
    		if (row){
                $('#dlgrestitusibayar').dialog('open').dialog('setTitle','Update Pembayaran Restitusi');
                $('#fmrestitusibayar').form('clear');
                $('#fmrestitusibayar').form('load',row);
                $("#tgl_bayarrestitusibayar").datebox('setValue','<?=date("Y-m-d");?>');
                url = '<?=$foldernya;?>update_restitusibayar.php?id='+row.idrestitusibayar;
            }
    	}
    	function saverestitusibayar(){
            $.messager.progress({height:75, text:'Update Pembayaran restitusi...'});
            $('#fmrestitusibayar').form('submit',{
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
                        $('#dlgrestitusibayar').dialog('close');
                        $('#dgrestitusibayar').datagrid('reload');
                    }
                }
            });
            
    	}
    	function destroyrestitusibayar(index){
            var row = $('#dgrestitusibayar').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Reset pembayaran restitusi ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_restitusibayar.php',{id:row.idrestitusibayar},function(result){
    						if (result.success){
    							$('#dgrestitusibayar').datagrid('reload');
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
            var rows = $('#dgrestitusibayar').datagrid('getSelections');
            var jumlah = rows.length;
            for(var i=0; i<rows.length; i++){
                ids.push(rows[i].idrestitusibayar);
            }
            var ids2 = ids.join(';');
            $("#idsnya").val(ids2);
    		if (jumlah>0){
                $('#dlgrestitusibayar2').dialog('open').dialog('setTitle','Update Pembayaran Restitusi Kolektif');
                $('#dlgrestitusibayar2').form('clear');
                $("#idsnya").val(ids2);
                $("#tgl_bayarrestitusibayar2").datebox('setValue','<?=date("Y-m-d");?>');
                url = '<?=$foldernya;?>update_restitusibayar2.php?id=0';
            } else {
                alert("Tidak ada data yang dipilih!");
            }
    	}
    	function saverestitusibayar2(){
            var idsnya = $("#idsnya").val();
            $.messager.progress({height:75, text:'Update Pembayaran berdasarkan pilihan...'});
            $('#fmrestitusibayar2').form('submit',{
                url: url+'&idsnya='+idsnya,
                onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
                },
                success: function(result){
                    alert(result);    
                    $.messager.progress('close');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlgrestitusibayar2').dialog('close');
                        $('#dgrestitusibayar').datagrid('reload');
                    }
                }
            });
            
    	}
        
    	function rincianbiayarestitusi(index){
            var row = $('#dgrestitusibayar').datagrid('getRow', index);
    		if (row){
                $('#dlgbiayarestitusi').dialog('open').dialog('setTitle','Rincian Biaya SPPD');
                $('#fmbiayarestitusi').form('clear');
                $('#fmbiayarestitusi').form('load',row);
                $("#tbl_biaya1").empty();
                $("#tbl_biaya2").empty();
                $("#tbl_biaya1").append(row.datarestitusi);
                $("#lblrestitusi").text(row.restitusi2restitusibayar);
                // $("#tbl_biaya2").append(row.datarestitusi2);
                // $("#lbltransportasi").html(row.kedudukanrestitusibayar+' - '+row.tujuanrestitusibayar+' (<span style="font-weight:bold;">'+row.transportasirestitusibayar+'</span>)');
                // $("#lblhari_konsumsi1").html(row.hari_konsumsi1biaya+" hari");
                // $("#lblnilai_konsumsi1").html(" X Rp. "+row.nilai_konsumsi1biaya);
                // $("#lblhari_laundry1").html(row.hari_laundry1biaya+" hari");
                // $("#lblnilai_laundry1").html(" X Rp. "+row.nilai_laundry1biaya);
                // $("#lblhari_penginapan1").html(row.hari_penginapan1biaya+" hari");
                // $("#lblnilai_penginapan1").html(" X Rp. "+row.nilai_penginapan1biaya);
                // $("#lblhari_konsumsi2").html(row.hari_konsumsi2biaya+" hari");
                // $("#lblnilai_konsumsi2").html(" X Rp. "+row.nilai_konsumsi2biaya);
                // $("#lblhari_laundry2").html(row.hari_laundry2biaya+" hari");
                // $("#lblnilai_laundry2").html(" X Rp. "+row.nilai_laundry2biaya);
                // $("#lblhari_penginapan2").html(row.hari_penginapan2biaya+" hari");
                // $("#lblnilai_penginapan2").html(" X Rp. "+row.nilai_penginapan2biaya);
                
                // $("#lblhari_pengawai").html(row.hari_pegawaibiaya+" hari");
                // $("#lblnilai_pengawai").html(" X Rp. "+row.nilai_pegawaibiaya);
                // $("#lblhari_keluarga").html(row.hari_keluargabiaya+" hari");
                // $("#lblnilai_keluarga").html(" X Rp. "+row.nilai_keluargabiaya);
                // $("#lblhari_pengantar").html(row.hari_pengantarbiaya+" hari");
                // $("#lblnilai_pengantar").html(" X Rp. "+row.nilai_pengantarbiaya);

                // $("#lblhari_suamiistri").html(row.hari_suamiistribiaya+" hari");
                // $("#lblnilai_suamiistri").html(" X Rp. "+row.nilai_suamiistribiaya);
                // $("#lblhari_anak").html(row.hari_anakbiaya+" hari");
                // $("#lblnilai_anak").html(" X Rp. "+row.nilai_anakbiaya);

                // $("#divrestitusibayar1").hide();
                // $("#divrestitusibayar2").hide();
                // $("#divrestitusibayar3").hide();
                // $("#divrestitusibayar4").hide();
                // if(parseInt(row.jenis_sppdrestitusibayar)==1 || parseInt(row.jenis_sppdrestitusibayar)==4){
                //     $("#divrestitusibayar1").show();
                // } else if(parseInt(row.jenis_sppdrestitusibayar)==2){
                //     $("#divrestitusibayar2").show();
                // } else if(parseInt(row.jenis_sppdrestitusibayar)==3){
                //     $("#divrestitusibayar1").show();
                //     $("#divrestitusibayar4").show();
                // }
                // if(parseInt(row.validasi_biayarestitusibayar)===0){                    
                //     $('#btnsavebiaya').linkbutton('enable');
                // } else {
                //     $('#btnsavebiaya').linkbutton('disable');
                // }
                $('#dlgbiayarestitusi').dialog('resize');
                url = '<?=$foldernya;?>update_biaya.php?idrestitusibayar='+row.idsppdrestitusibayar;
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
                        $('#dlgbiayarestitusi').dialog('close');
                        $('#dgrestitusibayar').datagrid('reload');
                    }
                }
            });
            
    	}

    	function validasi(index){
            var row = $('#dgrestitusibayar').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Validasi perhitungan biaya sppd, Lanjutkan?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>validasi.php',{idsppd:row.idsppdrestitusibayar},function(result){
    						if (result.success){
    							$('#dgrestitusibayar').datagrid('reload');
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
            var row = $('#dgrestitusibayar').datagrid('getRow', index);
    		if (row){
                if(parseInt(row.approvebayarrestitusibayar)===2){
                    var keterangan = ". Proses ini sekaligus akan melakukan reset approval pembayaran";
                } else {
                    var keterangan = "";
                }
    			$.messager.confirm('Konfirmasi','Reset validasi perhitungan biaya sppd'+keterangan+', Lanjutkan?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>reset_validasi.php',{idsppd:row.idrestitusibayarrestitusibayar},function(result){
    						if (result.success){
    							$('#dgrestitusibayar').datagrid('reload');
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
            var row = $('#dgrestitusibayar').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Reset Approval SDM?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>reset_sdm.php',{idrestitusibayar:row.idrestitusibayarrestitusibayar},function(result){
    						if (result.success){
    							$('#dgrestitusibayar').datagrid('reload');
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

        function pengikutrestitusibayar(index){
            var row = $('#dgrestitusibayar').datagrid('getRow', index);
    		if (row){
                $('#dlgpengikut').dialog('open').dialog('setTitle','Pengikut restitusibayar');
                $('#dgpengikut').datagrid('loadData',[]);
                $('#dgpengikut').datagrid('load','<?=$foldernya;?>get_data_pengikut.php?idrestitusibayar='+row.idrestitusibayarrestitusibayar);
                $("#lblnippegawai").text(row.niprestitusibayar);
                $("#lblnamapegawai").text(row.namarestitusibayar);
                $("#idrestitusibayarpengikut").val(row.idrestitusibayarrestitusibayar);
            }
        }

        function addpengikut(){
            var idrestitusibayarnya = $("#idrestitusibayarpengikut").val();
            $('#dlgpengikut2').dialog('open').dialog('setTitle','Input Data Pengikut');
            $('#fmpengikut2').form('clear');
            $("#idrestitusibayarpengikut2").val(idrestitusibayarnya);
            $("#hubunganpengikut2").combobox('reload','<?=$foldernya;?>get_hubungan.php?idrestitusibayar='+idrestitusibayarnya);
            url = '<?=$foldernya;?>save_pengikut2.php';
        }

        function editpengikut(index){
            var row = $('#dgpengikut').datagrid('getRow', index);
    		if (row){
                $('#dlgpengikut2').dialog('open').dialog('setTitle','Edit Data Pengikut');
                $('#fmpengikut2').form('clear');
                $('#fmpengikut2').form('load',row);
                $("#hubunganpengikut2").combobox('reload','<?=$foldernya;?>get_hubungan.php?idrestitusibayar='+row.idrestitusibayarpengikut);
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
    	function cetakrestitusibayar(index){
            var row = $('#dgrestitusibayar').datagrid('getRow', index);
    		if (row){
                window.open('<?=$foldernya;?>formrestitusi.php?idsppd='+row.idsppdrestitusibayar,'_blank');
            }
        }

        //$("#dgrestitusibayar").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmrestitusibayar{
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
    	.fitemrestitusibayar{
    		margin-bottom:5px;
    	}
    	.fitemrestitusibayar label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemrestitusibayar input{
    		width:200px;
    	}
    	#fmrestitusibayar.numberbox input{
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

        #fmbiayarestitusi .numberbox .textbox-text{
            text-align: right;
        }        
        .r1 .datagrid-cell-check input{
            display: none;
        }
    </style>
<?php
}
?>