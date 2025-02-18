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
		function doSearchrestitusi(){
            $('#dgrestitusi').datagrid('load',{
				statusrestitusicari: $('#statusrestitusicari').combobox('getValue'),
				niprestitusicari: $('#niprestitusicari').textbox('getValue'),
			});
		}
        
        function onSelectkelompokrestitusicari(){
            var nilai1 = $('#kelompokrestitusicari').combobox('getValue');
            var nilai2 = $('#kd_regionrestitusicari').combobox('getValue');
            var nilai3 = $('#kd_cabangrestitusicari').combobox('getValue');
            var url1 = 'get_spkrestitusicari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkrestitusicari').combogrid('clear');
            $('#no_spkrestitusicari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrestitusicari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionrestitusicari(){
            var nilai1 = $('#kelompokrestitusicari').combobox('getValue');
            var nilai2 = $('#kd_regionrestitusicari').combobox('getValue');
            var nilai3 = $('#kd_cabangrestitusicari').combobox('getValue');
            var url1 = 'get_spkrestitusicari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangrestitusicari.php?kd_region='+nilai2;
			//alert(url1);
            $('#kd_cabangrestitusicari').combobox('enable');
            $('#kd_cabangrestitusicari').combobox('clear'); 
            $('#kd_cabangrestitusicari').combobox('reload',url2);
            $('#kd_cabangrestitusicari').combobox('setValue','000');

            $('#no_spkrestitusicari').combogrid('clear');
            $('#no_spkrestitusicari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrestitusicari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangrestitusicari(){
            var nilai1 = $('#kelompokrestitusicari').combobox('getValue');
            var nilai2 = $('#kd_regionrestitusicari').combobox('getValue');
            var nilai3 = $('#kd_cabangrestitusicari').combobox('getValue');
            var url1 = 'get_spkrestitusicari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkrestitusicari').combogrid('clear');
            $('#no_spkrestitusicari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrestitusicari').combogrid('setValue','SEMUA');
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
        
        function onSelectblthrestitusicari(){
            var nilai1 = $('#blthrestitusicari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectkelompokrestitusi(){
            var nilai1 = $('#kelompokrestitusi').combobox('getValue');
            var nilai2 = $('#kd_regionrestitusi').combobox('getValue');
            var nilai3 = $('#kd_cabangrestitusi').combobox('getValue');
            var url1 = 'get_spkrestitusi.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkrestitusi').combogrid('clear');
            $('#no_spkrestitusi').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrestitusi').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionrestitusi(){
            var nilai1 = $('#kelompokrestitusi').combobox('getValue');
            var nilai2 = $('#kd_regionrestitusi').combobox('getValue');
            var nilai3 = $('#kd_cabangrestitusi').combobox('getValue');
            var url1 = 'get_spkrestitusi.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangrestitusi.php?kd_region='+nilai2;
            $('#kd_cabangrestitusi').combobox('enable');
            $('#kd_cabangrestitusi').combobox('clear'); 
            $('#kd_cabangrestitusi').combobox('reload',url2);
            $('#kd_cabangrestitusi').combobox('setValue','000');
			
            $('#no_spkrestitusi').combogrid('clear');
            $('#no_spkrestitusi').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrestitusi').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangrestitusi(){
            var nilai1 = $('#kelompokrestitusi').combobox('getValue');
            var nilai2 = $('#kd_regionrestitusi').combobox('getValue');
            var nilai3 = $('#kd_cabangrestitusi').combobox('getValue');
            var url1 = 'get_spkrestitusi.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            $('#no_spkrestitusi').combogrid('clear');
            $('#no_spkrestitusi').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrestitusi').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregionrestitusi2(){
            var nilai1 = $('#kd_regionrestitusi2').combobox('getValue');
            var url2 = 'get_cabangrestitusi2.php?kd_region='+nilai1;
            $('#kd_cabangrestitusi2').combobox('enable');
            $('#kd_cabangrestitusi2').combobox('clear'); 
            $('#kd_cabangrestitusi2').combobox('reload',url2);
            $('#kd_cabangrestitusi2').combobox('setValue','000');
    	}
        
        function onSelectprojectrestitusi(){
            var nilai1 = $('#kd_projectrestitusi').combobox('getValue');
            var url2 = 'get_unitrestitusi.php?kd_project='+nilai1;
            $('#kd_unitrestitusi').combobox('enable');
            $('#kd_unitrestitusi').combobox('clear'); 
            $('#kd_unitrestitusi').combobox('reload',url2);
    	}
        
        function onSelectprojectrestitusi2(){
            var nilai1 = $('#kd_projectrestitusi2').combobox('getValue');
            var url2 = 'get_unitrestitusi2.php?kd_project='+nilai1;
            $('#kd_unitrestitusi2').combobox('enable');
            $('#kd_unitrestitusi2').combobox('clear'); 
            $('#kd_unitrestitusi2').combobox('reload',url2);
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

		function aksirestitusinya(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                if(parseInt(row.bayar_restitusirestitusi)===0){
                    if(parseInt(row.validasi_restitusirestitusi)===0){
                        var a = '<a href="javascript:void(0)" title="Validasi Restitusi" onclick="validasirestitusi(\''+index+'\')"><button class="easyui-linkbutton c1" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-check" style="font-size:8px !important;"></i></button></a>';
                        var b = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:8px !important;"></i></button></a>';
                    } else {
                        var a = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-check" style="font-size:8px !important;"></i></button></a>';
                        var b = '<a href="javascript:void(0)" title="Reset Validasi Biaya" onclick="resetvalidasirestitusi(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:8px !important;"></i></button></a>';
                    }
                } else {
                    var a = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-check" style="font-size:8px !important;"></i></button></a>';
                    var b = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:8px !important;"></i></button></a>';
                }
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-check" style="font-size:8px !important;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:8px !important;"></i></button></a>';
            }
            //var c = row.bayarvalsppd+" "+row.totalvalsppd;
            return a+b;
		}

		function aksirestitusi(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                if(parseFloat(row.restitusirestitusi)===0){
                    var a = '<a href="javascript:void(0)" title="Restitusi" onclick="prosesrestitusi(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-share" style="font-size:8px !important;"></i></button></a>';
                    var b = '<a href="javascript:void(0)" title="Form Restitusi" onclick="cetakrestitusi(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;"><i class="fa fa-print" style="font-size:8px !important;"></i></button></a>';
                    if(parseInt(row.bayar_restitusirestitusi)===0){
                        var c = '<a href="javascript:void(0)" title="Decline Data" onclick="declinerestitusi(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:54px;height:25px;font-size:10px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;">DECLINE</button></a>';
                    } else {
                        if(row.tgl_bayar_restitusirestitusi===""){
                            var c = '<a href="javascript:void(0)" title="Klaim Data" onclick="klaimrestitusi(\''+index+'\')"><button class="easyui-linkbutton c1" style="width:54px;height:25px;font-size:10px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;">KLAIM</button></a>';
                        } else {
                            var c = '';
                        }
                    }
                } else {
                    var a = '<a href="javascript:void(0)" title="Restitusi" onclick="prosesrestitusi(\''+index+'\')"><button class="easyui-linkbutton c1" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-share" style="font-size:8px !important;"></i></button></a>';
                    var b = '<a href="javascript:void(0)" title="Form Restitusi" onclick="cetakrestitusi(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;"><i class="fa fa-print" style="font-size:8px !important;"></i></button></a>';
                    var c = '';
                }
            } else {
                var a = '<a><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;"><i class="fa fa-share" style="font-size:8px !important;margin-right:3px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Form Restitusi" onclick="cetakrestitusi(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;"><i class="fa fa-print" style="font-size:8px !important;"></i></button></a>';
                var c = '';
            }
            return a+b+"<br/>"+c;
		}

		function biayarestitusi(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                if(parseInt(row.validasi_biayarestitusi)===0 && parseInt(row.approvesdmrestitusi)===2){
                    var a = '<a href="javascript:void(0)" title="Hitung Biaya" onclick="hitungbiaya(\''+index+'\')"><button class="easyui-linkbutton c1" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-cog" style="font-size:8px !important;"></i></button></a>';
                    var b = '<a href="javascript:void(0)" title="Reset Biaya" onclick="resetbiaya(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                } else {
                    var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-cog" style="font-size:10px;"></i></button></a>';
                    var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                }
                if(parseFloat(row.totalrestitusi)>0){
                    var c = '<a href="javascript:void(0)" title="Rincian Biaya" onclick="rincianbiaya(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-credit-card" style="font-size:8px !important;"></i></button></a>';
                    var d = '<a href="javascript:void(0)" title="Cetak Form restitusi" onclick="cetakrestitusi(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-print" style="font-size:8px !important;"></i></button></a>';
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
            if(parseInt(row.validasi_biayarestitusi)===1){
                var e = '<button class="easyui-linkbutton c1" style="width:40px;height:40px;font-size:16px;border:none;cursor:pointer;border-radius:50%;margin-top:5px;pointer-events: none;"><i class="fa fa-check"></i></button>';
            } else {
                var e = '';
            }
            return a+b+"<br/>"+c+d+"<br/>"+e;
		}

        function timelinerestitusi(value,row,index){
            var a = '<div style="overflow-y:scroll;height:120px;text-align:left;padding:5px;background-color:#f7f6f6;color:#000;margin-bottom:5px;">';
            a += '<span style="font-size:10px;white-space:nowrap;">'+row.timelinerestitusi+'<span>';
            a += '</div>';
            return a;
        }  

        function namanyarestitusi(value,row,index){
            var a = '<span style="font-weight:bold;">'+row.niprestitusi+'</span>';
            a += '<br/>'
            a += row.namarestitusi;
            //a += '<br/>'
            //a += row.tingkat_sppd2restitusi;
            a += '<br/>'
            a += '<span style="">'+row.jenis_sppd2restitusi+'</span>';
            //a += '<br/>'
            //a += row.level_sppd2restitusi;
            return a;
        }  

        function maksudnyarestitusi(value,row,index){
            var a = '<span style="font-size:11px;">'+row.idsppdrestitusi+'</span>';
            a += '<br/><span style="color:blue;font-size:11px;">'+row.no_sppdrestitusi+'</span>';
            // a += '<br/>'
            a += row.maksudrestitusi;
            return a;
        }  

        function biayanyarestitusi(value,row,index){
            var a = 'Total Restitusi :';
            a += '<br/><span style="font-weight:bold;font-size:14px;">'+row.restitusi2restitusi+'</span>';
            if(parseInt(row.bayar_restitusirestitusi)===1){
                a += '<br/><span style="color:blue;font-size:12px;">Terbayar</span>';
            } else {
                a += '<br/><span style="color:red;font-size:12px;">Belum Terbayar</span>';
            }
            if(row.tgl_bayar_restitusirestitusi!==""){
                a += '<br/><span style="color:red;font-size:12px;">Tgl : '+row.tgl_bayar_restitusi2restitusi+'</span>';
            }
            return a;
        }  

        function jenisnyarestitusi(value,row,index){
            var a = row.tingkat_restitusi2restitusi;
            a += '<br/>'
            a += '<span style="font-weight:bold;">'+row.jenis_restitusi2restitusi+'</span>';
            a += '<br/>'
            a += row.level_restitusi2restitusi;
            return a;
        }  

        function validasitanggal(){
            //alert('tes');
            //$("#tgl_akhirrestitusi").datebox({'disabled':false});
            var tgl_awal = $("#tgl_awalrestitusi").datebox('getValue');
            var datanya = tgl_awal.split("-");
            var tahun = parseInt(datanya[0]);
            var bulan = parseInt(datanya[1])-1;
            var hari = parseInt(datanya[2]);
            $('#tgl_akhirrestitusi').datebox().datebox('calendar').calendar({
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
            var tgl_awal = $("#tgl_awalrestitusi").datebox('getValue');
            var tgl_akhir = $("#tgl_akhirrestitusi").datebox('getValue');
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
                $("#harirestitusi").numberbox('setValue',jumlah_hari);
            } else {
                $("#harirestitusi").numberbox('setValue',0);
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
            var by2 = '<a href="javascript:void(0)" onclick="cetakslip(\''+row.niprestitusi+'|'+row.blthrestitusi+'\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple" style="margin-top:3px;margin-bottom:3px;"></i></a>';
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
        $("#dgrestitusi").datagrid({
            onDblClickRow: function() {
                //editrestitusi();
            }
        });
    });
    </script>
    <table id="dgrestitusi" title="" class="easyui-datagrid" style="width:100%;height:100%;padding-right:20px;"	
            url="<?=$foldernya;?>get_master_restitusi.php" pageSize="20"        
    		toolbar="#toolbarrestitusi" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead frozen="true">
    		<tr>
                <th field="aksirestitusinya" width="90" align="center" halign="center" data-options="formatter:aksirestitusinya,styler:styler1">Validasi</th>
                <th field="aksirestitusi" width="90" align="center" halign="center" data-options="formatter:aksirestitusi,styler:styler1">Aksi</th>
                <!--
                <th field="biayarestitusi" width="90" align="center" halign="center" data-options="formatter:biayarestitusi,styler:styler1">Perhitungan<br/>Biaya</th>
                <th field="timelinerestitusi" width="250" align="center" halign="center" data-options="formatter:timelinerestitusi,styler:styler1">Timeline</th>
                -->
    			<th field="namanyarestitusi" width="220" align="left" halign="center" data-options="formatter:namanyarestitusi,styler:styler1">Nama</th>
    	<thead>
    		<tr>
                <th field="maksudnyarestitusi" width="320" align="left" halign="center" data-options="formatter:maksudnyarestitusi,styler:styler1">Nomor SPPD<br/>Maksud Perjalanan Dinas</th>
                <th field="biayanyarestitusi" width="160" align="center" halign="center" data-options="formatter:biayanyarestitusi,styler:styler1">Biaya restitusi</th>
                <th field="kedudukanrestitusi" width="160" align="center" halign="center" data-options="styler:styler1">Kedudukan</th>
                <th field="tujuanrestitusi" width="160" align="center" halign="center" data-options="styler:styler1">Tujuan</th>
                <th field="transportasirestitusi" width="160" align="center" halign="center" data-options="styler:styler1">Transportasi</th>
                <!--<th field="jarakrestitusi" width="80" align="center" halign="center" data-options="formatter:formatrp2,styler:styler1">Jarak<br/>(KM)</th>-->
                <th field="tgl_awal2restitusi" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Berangkat</th>
                <th field="tgl_akhir2restitusi" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Kembali</th>
                <th field="harirestitusi" width="80" align="center" halign="center" data-options="formatter:formatrp2,styler:styler1">Jumlah<br/>Hari</th>
    		</tr>
    	</thead>
    </table>
    
    <div id="toolbarrestitusi">
    	<div id="tbrestitusi" style="padding:3px">
            <table>
            <tr>
                <td>STATUS</td>
                <td>
                    <select id="statusrestitusicari" name="statusrestitusicari" class="easyui-combobox" editable="false" data-options="required:true,panelHeight:'auto'" style="width: 160px;">
                        <option value="9">Semua</option>
                        <option value="0" selected>Belum Validasi</option>
                        <option value="1">Sudah Validasi</option>
                    </select>                            
                </td>
                <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="niprestitusicari" name="niprestitusicari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchrestitusi()" style="min-width:90px;">Search</a>
                    <!--
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus" onclick="addrestitusi()" style="min-width:90px;">Pengajuan restitusi</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-file-excel" onclick="downloadrestitusi()" style="min-width:90px;">Download</a>
                    -->
                </td>
            </tr>
            </table>
    	</div>		
    </div>
    
    <div id="dlgrestitusi" class="easyui-dialog" modal="true" style="width:800px;height:500px;padding:5px 10px 10px 10px;top:50px;" closed="true" buttons="#dlg-buttonsrestitusi">
        <input type="hidden" id="idsppdrestitusi" name="idsppdrestitusi">
        <div>
            <table>
                <tr>
                    <td>No.Induk</td>
                    <td>:</td>
                    <td><label id="lblniprestitusi" style="font-weight:bold;"></label></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><label id="lblnamarestitusi" style="font-weight:bold;"></label></td>
                </tr>
                <tr>
                    <td>No.SPPD</td>
                    <td>:</td>
                    <td><label id="lblno_sppdrestitusi" style="font-weight:bold;"></label></td>
                </tr>
            </table>
        </div>
        <table id="dgrestitusi2" title="" style="width:100%;height:350px"	
            url="" pageSize="20" remoteSort="false"        
            toolbar="#toolbarrestitusi2" pagination="true" nowrap="false" method="post"   
            rownumbers="false" fitColumns="false" singleSelect="true" showFooter="true">
        <thead>
            <tr>
                <th field="aksirestitusi2" width="80" align="center" halign="center" data-options="formatter:aksirestitusi2,styler:styler1">Aksi</th>
                <th field="lampirannyarestitusi2" width="250" align="center" halign="center" data-options="styler:styler1">Lampiran</th>
                <th field="jenis_restitusirestitusi2" width="120" align="center" halign="center" data-options="styler:styler1">Jenis Restitusi</th>
                <th field="nilairestitusi2" width="110" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
                <th field="keteranganrestitusi2" width="240" align="left" halign="left" data-options="styler:styler1">Keterangan</th>
            </tr>
        </thead>
        </table>    
        <div id="toolbarrestitusi2">
            <div id="tbrestitusi2" style="padding:3px">
                <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus" onclick="addrestitusi2()" style="min-width:90px;">Tambah</a>
            </div>		
        </div>
        <script>
            //$('#dgrestitusi2').datagrid().datagrid('enableFilter');  
            $('#dgrestitusi2').datagrid();  
            function aksirestitusi2(value,row,index){
                var akses_proses = "<?=$akses_proses;?>";
                if(row.idrestitusi2){
                    if(parseInt(akses_proses)===1){
                        var a = '<a href="javascript:void(0)" title="Edit Data" onclick="editrestitusi2(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                        var b = '<a href="javascript:void(0)" title="Hapus Data" onclick="destroyrestitusi2(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                    } else {
                        var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                        var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                    }
                    if(row.lampiranrestitusi2!==""){
                        var c = '<a target="_blank" href="'+row.lampiranrestitusi2+'"><button class="easyui-linkbutton c1" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-eye" style="font-size:8px !important;"></i></button></a>';
                    } else {
                        var c = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-eye" style="font-size:8px !important;"></i></button></a>';
                    }
                    return a+b;
                } else {
                    return '';
                }
            }
        </script>
    </div>
    <div id="dlg-buttonsrestitusi">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgrestitusi').dialog('close')" style="min-width:90px">Tutup</a>
    </div>
    
    <div id="dlgrestitusi2" class="easyui-dialog" modal="true" style="min-width:200px;min-height:160px;padding:5px 10px 10px 10px;top:50px;" closed="true" buttons="#dlg-buttonsrestitusi2">
    	<form id="fmrestitusi2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="idsppdrestitusi2" name="idsppdrestitusi2">
            <input type="hidden" id="idrestitusirestitusi2" name="idrestitusirestitusi2">
            <table>
            <tr>
                <td style="width:300px;">
                    <div>
                        <div class="labelfor"><label>Jenis Restitusi</label></div>
                        <input class="easyui-combobox"
                            id="jenis_restitusirestitusi2" editable="false"
                            name="jenis_restitusirestitusi2"
                            style="padding: 2px; width: 100%;" 
                            data-options="
                                url:'<?=$foldernya;?>get_jenis_restitusi.php',
                                required:true,
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
                        <div class="labelfor"><label>Rupiah</label></div>
                        <input class="easyui-numberbox" id="nilairestitusi2" name="nilairestitusi2" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:300px;">
                    <div>
                        <div class="labelfor"><label>Keterangan</label></div>
                        <input class="easyui-textbox" id="keteranganrestitusi2" name="keteranganrestitusi2" data-options="required:false,multiline:true" style="width: 100%;height:40px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:300px;">
                    <div>
                        <div class="labelfor"><label>Lampiran</label></div>
                        <input class="easyui-filebox" id="lampiran2restitusi21" name="lampiran2restitusi2[]" buttonAlign="left" buttonText="Upload" editable="false" data-options="required:false,prompt:''" style="width:100%">
                        <input class="easyui-filebox" id="lampiran2restitusi22" name="lampiran2restitusi2[]" buttonAlign="left" buttonText="Upload" editable="false" data-options="required:false,prompt:''" style="width:100%">
                        <input class="easyui-filebox" id="lampiran2restitusi23" name="lampiran2restitusi2[]" buttonAlign="left" buttonText="Upload" editable="false" data-options="required:false,prompt:''" style="width:100%">
                        <input class="easyui-filebox" id="lampiran2restitusi24" name="lampiran2restitusi2[]" buttonAlign="left" buttonText="Upload" editable="false" data-options="required:false,prompt:''" style="width:100%">
                        <input class="easyui-filebox" id="lampiran2restitusi25" name="lampiran2restitusi2[]" buttonAlign="left" buttonText="Upload" editable="false" data-options="required:false,prompt:''" style="width:100%">
                    </div>
                </td> 
            </tr>            
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsrestitusi2">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="saverestitusi2()" style="min-width:90px">Simpan</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgrestitusi2').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgslip" class="easyui-dialog" modal="true" style="width:1200px;height:500px;padding:0px;" closed="true" buttons="">
        <iframe id="panelslip" src="#" style="width: 100%; height: 460px; border: none;"></iframe>
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
        function prosesrestitusi(index){
            var row = $('#dgrestitusi').datagrid('getRow', index);
    		if (row){
                $('#dlgrestitusi').dialog('open').dialog('setTitle','Restitusi Biaya');
                $('#dgrestitusi2').datagrid('loadData',[]);
                $('#dgrestitusi2').datagrid('load','<?=$foldernya;?>get_data_restitusi2.php?idsppd='+row.idsppdrestitusi);
                $("#lblniprestitusi").text(row.niprestitusi);
                $("#lblnamarestitusi").text(row.namarestitusi);
                $("#lblno_sppdrestitusi").text(row.no_sppdrestitusi);
                $("#idsppdrestitusi").val(row.idsppdrestitusi);
            }
        }

    	function declinerestitusi(index){
            var row = $('#dgrestitusi').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Deline Restitusi.<br/><span style="font-size:9px;color:red;">Sistem akan melakukan update status validasi dan pembayaran. Lanjutkan?</span>',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>decline_restitusi.php',{id:row.idrestitusi},function(result){
                            //alert(result);
    						if (result.success){
                                $('#dgrestitusi').datagrid('reload');
    						} else {
                                result = eval('('+result+')');
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

    	function klaimrestitusi(index){
            var row = $('#dgrestitusi').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Klaim Restitusi.<br/><span style="font-size:9px;color:red;">Sistem akan melakukan reset status validasi dan pembayaran. Lanjutkan?</span>',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>klaim_restitusi.php',{id:row.idrestitusi},function(result){
                            //alert(result);
    						if (result.success){
                                $('#dgrestitusi').datagrid('reload');
    						} else {
                                result = eval('('+result+')');
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

        function addrestitusi2(){
            var idsppdnya = $("#idsppdrestitusi").val();
            $('#dlgrestitusi2').dialog('open').dialog('setTitle','Input Data Restitusi');
            $('#fmrestitusi2').form('clear');
            $("#idsppdrestitusi2").val(idsppdnya);
            $("#lampiran2restitusi21").filebox('clear');
            $("#lampiran2restitusi22").filebox('clear');
            $("#lampiran2restitusi23").filebox('clear');
            $("#lampiran2restitusi24").filebox('clear');
            $("#lampiran2restitusi25").filebox('clear');
            //$("#hubunganrestitusi2").combobox('reload','<?=$foldernya;?>get_hubungan.php?idrestitusi='+idrestitusinya);
            url = '<?=$foldernya;?>save_restitusi2.php';
        }

        function editrestitusi2(index){
            var row = $('#dgrestitusi2').datagrid('getRow', index);
    		if (row){
                $('#dlgrestitusi2').dialog('open').dialog('setTitle','Edit Data Restitusi');
                $('#fmrestitusi2').form('clear');
                $('#fmrestitusi2').form('load',row);
                var datanya = row.lampirannya2restitusi2.split(';');
                for (var i = 0; i < datanya.length; i++) {
                    $('#lampiran2restitusi2'+(i+1)).filebox({prompt: datanya[i].split("/").pop()});
                }
                url = '<?=$foldernya;?>update_restitusi2.php?id='+row.idrestitusi2;
            }
        }
    	function saverestitusi2(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmrestitusi2').form('submit',{
                url: url,
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
                        $('#dlgrestitusi2').dialog('close');
                        $('#dgrestitusi2').datagrid('reload');
                        $('#dgrestitusi').datagrid('reload');
                    }
                }
            });
            
    	}
    	function destroyrestitusi2(index){
            var row = $('#dgrestitusi2').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data restitusi ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_restitusi2.php',{id:row.idrestitusi2},function(result){
                            //alert(result);
    						if (result.success){
    							$('#dgrestitusi2').datagrid('reload');
                                $('#dgrestitusi').datagrid('reload');
    						} else {
                                result = eval('('+result+')');
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
    	function cetakrestitusi(index){
            var row = $('#dgrestitusi').datagrid('getRow', index);
    		if (row){
                window.open('<?=$foldernya;?>formrestitusi.php?idsppd='+row.idsppdrestitusi,'_blank');
            }
        }

    	function validasirestitusi(index){
            var row = $('#dgrestitusi').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Validasi restitusi sppd, Lanjutkan?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>validasirestitusi.php',{idsppd:row.idsppdrestitusi},function(result){
    						if (result.success){
    							$('#dgrestitusi').datagrid('reload');
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
    	function resetvalidasirestitusi(index){
            var row = $('#dgrestitusi').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Reset validasi restitusi sppd, Lanjutkan?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>reset_validasirestitusi.php',{idsppd:row.idsppdrestitusi},function(result){
    						if (result.success){
    							$('#dgrestitusi').datagrid('reload');
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
        

        //$("#dgrestitusi").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmrestitusi{
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
    	.fitemrestitusi{
    		margin-bottom:5px;
    	}
    	.fitemrestitusi label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemrestitusi input{
    		width:200px;
    	}
    	#fmrestitusi.numberbox input{
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

        #fmbiaya .numberbox .textbox-text{
            text-align: right;
        }        
        .datagrid-footer .datagrid-row{
            /*background: #ddd;*/
            font-weight:bold;
        }        
    </style>
<?php
}
?>