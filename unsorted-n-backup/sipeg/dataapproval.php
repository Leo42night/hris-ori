<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "sipeg/";    
    include "koneksi.php";
    ?>
    <script type="text/javascript">                     
		function doSearchdataapproval(){
            $('#dgdataapproval').datagrid('load',{
				nipdataapprovalcari: $('#nipdataapprovalcari').textbox('getValue'),
			});
		}
        
        function onSelectkelompokdataapprovalcari(){
            var nilai1 = $('#kelompokdataapprovalcari').combobox('getValue');
            var nilai2 = $('#kd_regiondataapprovalcari').combobox('getValue');
            var nilai3 = $('#kd_cabangdataapprovalcari').combobox('getValue');
            var url1 = 'get_spkdataapprovalcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkdataapprovalcari').combogrid('clear');
            $('#no_spkdataapprovalcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkdataapprovalcari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiondataapprovalcari(){
            var nilai1 = $('#kelompokdataapprovalcari').combobox('getValue');
            var nilai2 = $('#kd_regiondataapprovalcari').combobox('getValue');
            var nilai3 = $('#kd_cabangdataapprovalcari').combobox('getValue');
            var url1 = 'get_spkdataapprovalcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangdataapprovalcari.php?kd_region='+nilai2;
			//alert(url1);
            $('#kd_cabangdataapprovalcari').combobox('enable');
            $('#kd_cabangdataapprovalcari').combobox('clear'); 
            $('#kd_cabangdataapprovalcari').combobox('reload',url2);
            $('#kd_cabangdataapprovalcari').combobox('setValue','000');

            $('#no_spkdataapprovalcari').combogrid('clear');
            $('#no_spkdataapprovalcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkdataapprovalcari').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangdataapprovalcari(){
            var nilai1 = $('#kelompokdataapprovalcari').combobox('getValue');
            var nilai2 = $('#kd_regiondataapprovalcari').combobox('getValue');
            var nilai3 = $('#kd_cabangdataapprovalcari').combobox('getValue');
            var url1 = 'get_spkdataapprovalcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkdataapprovalcari').combogrid('clear');
            $('#no_spkdataapprovalcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkdataapprovalcari').combogrid('setValue','SEMUA');
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
        
        function onSelectblthdataapprovalcari(){
            var nilai1 = $('#blthdataapprovalcari').datebox('getValue');
            //alert(nilai1);
            var d = new Date();
            var bulan_ini = hariIni(d);
            //alert(bulan_ini);
            //if(nilai1!==)
    	}
        
        function onSelectkelompokdataapproval(){
            var nilai1 = $('#kelompokdataapproval').combobox('getValue');
            var nilai2 = $('#kd_regiondataapproval').combobox('getValue');
            var nilai3 = $('#kd_cabangdataapproval').combobox('getValue');
            var url1 = 'get_spkdataapproval.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			//alert(url1);
            $('#no_spkdataapproval').combogrid('clear');
            $('#no_spkdataapproval').combogrid('grid').datagrid('reload',url1);
            $('#no_spkdataapproval').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiondataapproval(){
            var nilai1 = $('#kelompokdataapproval').combobox('getValue');
            var nilai2 = $('#kd_regiondataapproval').combobox('getValue');
            var nilai3 = $('#kd_cabangdataapproval').combobox('getValue');
            var url1 = 'get_spkdataapproval.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangdataapproval.php?kd_region='+nilai2;
            $('#kd_cabangdataapproval').combobox('enable');
            $('#kd_cabangdataapproval').combobox('clear'); 
            $('#kd_cabangdataapproval').combobox('reload',url2);
            $('#kd_cabangdataapproval').combobox('setValue','000');
			
            $('#no_spkdataapproval').combogrid('clear');
            $('#no_spkdataapproval').combogrid('grid').datagrid('reload',url1);
            $('#no_spkdataapproval').combogrid('setValue','SEMUA');
    	}
        
        function onSelectcabangdataapproval(){
            var nilai1 = $('#kelompokdataapproval').combobox('getValue');
            var nilai2 = $('#kd_regiondataapproval').combobox('getValue');
            var nilai3 = $('#kd_cabangdataapproval').combobox('getValue');
            var url1 = 'get_spkdataapproval.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            $('#no_spkdataapproval').combogrid('clear');
            $('#no_spkdataapproval').combogrid('grid').datagrid('reload',url1);
            $('#no_spkdataapproval').combogrid('setValue','SEMUA');
    	}
        
        function onSelectregiondataapproval2(){
            var nilai1 = $('#kd_regiondataapproval2').combobox('getValue');
            var url2 = 'get_cabangdataapproval2.php?kd_region='+nilai1;
            $('#kd_cabangdataapproval2').combobox('enable');
            $('#kd_cabangdataapproval2').combobox('clear'); 
            $('#kd_cabangdataapproval2').combobox('reload',url2);
            $('#kd_cabangdataapproval2').combobox('setValue','000');
    	}
        
        function onSelectprojectdataapproval(){
            var nilai1 = $('#kd_projectdataapproval').combobox('getValue');
            var url2 = 'get_unitdataapproval.php?kd_project='+nilai1;
            $('#kd_unitdataapproval').combobox('enable');
            $('#kd_unitdataapproval').combobox('clear'); 
            $('#kd_unitdataapproval').combobox('reload',url2);
    	}
        
        function onSelectprojectdataapproval2(){
            var nilai1 = $('#kd_projectdataapproval2').combobox('getValue');
            var url2 = 'get_unitdataapproval2.php?kd_project='+nilai1;
            $('#kd_unitdataapproval2').combobox('enable');
            $('#kd_unitdataapproval2').combobox('clear'); 
            $('#kd_unitdataapproval2').combobox('reload',url2);
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

		function aksidataapproval(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                if(parseFloat(row.bayardataapproval)===0){
                    if(parseFloat(row.totaldataapproval)>0){
                        if(parseFloat(row.validasi_biayadataapproval)===0){
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
            if(parseFloat(row.validasi_biayadataapproval)===0){
                var c = '<a href="javascript:void(0)" title="Set Approval" onclick="setapproval(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:54px;height:25px;font-size:9.5px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;">APROVAL</button></a>';
            } else {
                var c = '<a><button class="easyui-linkbutton c2" style="width:54px;height:25px;font-size:9.5px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;">APROVAL</button></a>';
            }
            return a+b+"<br/>"+c;
		}

		function biayadataapproval(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                if(parseInt(row.validasi_biayadataapproval)===0 && parseInt(row.approvesdmdataapproval)===2){
                    var a = '<a href="javascript:void(0)" title="Hitung Biaya" onclick="hitungbiaya(\''+index+'\')"><button class="easyui-linkbutton c1" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-cog" style="font-size:8px !important;"></i></button></a>';
                    var b = '<a href="javascript:void(0)" title="Reset Biaya" onclick="resetbiaya(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:8px !important;"></i></button></a>';
                } else {
                    var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-cog" style="font-size:10px;"></i></button></a>';
                    var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                }
                if(parseFloat(row.totaldataapproval)>0){
                    var c = '<a href="javascript:void(0)" title="Rincian Biaya" onclick="rincianbiaya(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-credit-card" style="font-size:8px !important;"></i></button></a>';
                    var d = '<a href="javascript:void(0)" title="Cetak Form dataapproval" onclick="cetakdataapproval(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-print" style="font-size:8px !important;"></i></button></a>';
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
            /*
            if(parseInt(row.validasi_biayadataapproval)===1){
                var e = '<button class="easyui-linkbutton c1" style="width:40px;height:40px;font-size:16px;border:none;cursor:pointer;border-radius:50%;margin-top:5px;pointer-events: none;"><i class="fa fa-check"></i></button>';
            } else {
                var e = '';
            }
            */
            return a+b+"<br/>"+c+d;
		}

        function timelinedataapproval(value,row,index){
            var a = '<div style="overflow-y:scroll;height:120px;text-align:left;padding:5px;background-color:#f7f6f6;color:#000;margin-bottom:5px;">';
            a += '<span style="font-size:10px;white-space:nowrap;">'+row.timelinedataapproval+'<span>';
            a += '</div>';
            return a;
        }  

        function namanyadataapproval(value,row,index){
            var a = '<span style="font-weight:bold;font-size:11px;">'+row.nipdataapproval+'</span>';
            a += '<br/>'
            a += '<span style="font-size:11px;">'+row.namadataapproval;
            // a += '<br/>'
            // a += row.tingkat_sppd2dataapproval+'</span>';
            a += '<br/>'
            a += '<span style="font-weight:bold;font-size:11px;">'+row.jenis_sppd2dataapproval+'</span>';
            a += '<br/>'
            a += '<span style="font-size:11px;">'+row.level_sppd2dataapproval+'</span>';
            return a;
        }  

        function maksudnyadataapproval(value,row,index){
            var a = '<span style="font-size:11px;font-weight:bold;">'+row.idsppddataapproval+'</span>';
            a += '<br/><span style="color:blue;font-size:11px;">'+row.no_sppddataapproval+'</span>';
            a += '<br/>'
            a += row.maksuddataapproval;
            return a;
        }  

        function rutenyadataapproval(value,row,index){
            var a = '<span style="font-size:11px;">'+row.kedudukandataapproval+'</span>';
            a += '<br/><span style="color:blue;font-size:11px;">'+row.tujuandataapproval+'</span>';
            return a;
        }  

        function waktunyadataapproval(value,row,index){
            var a = '<span style="font-size:11px;">'+row.tgl_awal2dataapproval+'</span>';
            a += '<br/><span style="font-size:11px;"> s.d </span>';
            a += '<br/><span style="font-size:11px;">'+row.tgl_akhir2dataapproval+'</span>';
            a += '<br/><span style="color:blue;font-size:13px;">'+row.haridataapproval+' hari</span>';
            return a;
        }  

        function approval1nyadataapproval(value,row,index){
            var a = '<span style="font-weight:bold;font-size:11px;">'+row.nama_approval1dataapproval+'</span>';
            a += '<br/><span style="font-size:10px;">'+row.jabatan_approval1dataapproval+'</span>';
            if(parseInt(row.approve1dataapproval)===2){
                a += '<br/><span style="font-size:11px;color:blue;">Approved : '+row.tgl_approve12dataapproval+'</span>';                
            } else if(parseInt(row.approve1dataapproval)===1){
                a += '<br/><span style="font-size:11px;color:red;">Reject : '+row.tgl_approve12dataapproval+'</span>';                
            } else {
                a += '<br/><span style="font-size:11px;color:red;">Menunggu Approval</span>';
            }
            return a;
        }  

        function approval2nyadataapproval(value,row,index){
            if(row.approval2dataapproval!=="" && row.approval2dataapproval!==null && row.approval2dataapproval!=="undefined"){
                var a = '<span style="font-weight:bold;font-size:11px;">'+row.nama_approval2dataapproval+'</span>';
                a += '<br/><span style="font-size:10px;">'+row.jabatan_approval2dataapproval+'</span>';
                if(parseInt(row.approve2dataapproval)===2){
                    a += '<br/><span style="font-size:11px;color:blue;">Approved : '+row.tgl_approve22dataapproval+'</span>';                
                } else if(parseInt(row.approve2dataapproval)===1){
                    a += '<br/><span style="font-size:11px;color:red;">Reject : '+row.tgl_approve22dataapproval+'</span>';                
                } else {
                    a += '<br/><span style="font-size:11px;color:red;">Menunggu Approval</span>';
                }
            } else {
                var a = '-';
            }
            return a;
        }  

        function approvalsdmnyadataapproval(value,row,index){
            var a = '<span style="font-weight:bold;font-size:11px;">'+row.nama_approvalsdmdataapproval+'</span>';
            a += '<br/><span style="font-size:10px;">'+row.jabatan_approvalsdmdataapproval+'</span>';
            if(parseInt(row.approvesdmdataapproval)===2){
                a += '<br/><span style="font-size:11px;color:blue;">Approved : '+row.tgl_approvesdm2dataapproval+'</span>';                
            } else if(parseInt(row.approvesdmdataapproval)===1){
                a += '<br/><span style="font-size:11px;color:red;">Reject : '+row.tgl_approvesdm2dataapproval+'</span>';                
            } else {
                a += '<br/><span style="font-size:11px;color:red;">Menunggu Approval</span>';
            }
            return a;
        }  

        function approvalbayarnyadataapproval(value,row,index){
            var a = '<span style="font-weight:bold;font-size:11px;">'+row.nama_approvalbayardataapproval+'</span>';
            a += '<br/><span style="font-size:10px;">'+row.jabatan_approvalbayardataapproval+'</span>';
            if(parseInt(row.approvebayardataapproval)===2){
                a += '<br/><span style="font-size:11px;color:blue;">Approved : '+row.tgl_approvebayar2dataapproval+'</span>';                
            } else if(parseInt(row.approvebayardataapproval)===1){
                a += '<br/><span style="font-size:11px;color:red;">Reject : '+row.tgl_approvebayar2dataapproval+'</span>';                
            } else {
                a += '<br/><span style="font-size:11px;color:red;">Menunggu Approval</span>';
            }
            return a;
        }  

        function biayanyadataapproval(value,row,index){
            var a = 'Total Biaya SPPD :';
            a += '<br/><span style="font-weight:bold;font-size:14px;">'+row.total2dataapproval+'</span>';
            a += '<br/>Validasi Biaya :';            
            if(parseInt(row.validasi_biayadataapproval)===1){
                a += '<br/><button class="easyui-linkbutton c1" style="width:25px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:50%;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-check fa-lg"></i></button>';
            } else {
                a += '<br/><button class="easyui-linkbutton c5" style="width:25px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:50%;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times fa-lg"></i></button>';
            }
            return a;
        }  

        function jenisnyadataapproval(value,row,index){
            var a = row.tingkat_dataapproval2dataapproval;
            a += '<br/>'
            a += '<span style="font-weight:bold;">'+row.jenis_dataapproval2dataapproval+'</span>';
            a += '<br/>'
            a += row.level_dataapproval2dataapproval;
            return a;
        }  

        function validasitanggal(){
            //alert('tes');
            //$("#tgl_akhirdataapproval").datebox({'disabled':false});
            var tgl_awal = $("#tgl_awaldataapproval").datebox('getValue');
            var datanya = tgl_awal.split("-");
            var tahun = parseInt(datanya[0]);
            var bulan = parseInt(datanya[1])-1;
            var hari = parseInt(datanya[2]);
            $('#tgl_akhirdataapproval').datebox().datebox('calendar').calendar({
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
            var tgl_awal = $("#tgl_awaldataapproval").datebox('getValue');
            var tgl_akhir = $("#tgl_akhirdataapproval").datebox('getValue');
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
                $("#haridataapproval").numberbox('setValue',jumlah_hari);
            } else {
                $("#haridataapproval").numberbox('setValue',0);
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
            // var persen_konsumsi1 = $("#persen_konsumsi1biaya").numberbox('getValue');
            var persen_konsumsi1 = $("#persen_konsumsi1biaya").val();
            var nilai_konsumsi1 = $("#nilai_konsumsi12biaya").val();
            var total_konsumsi1 = Math.round((parseFloat(hari_konsumsi1)*parseFloat(nilai_konsumsi1)*parseFloat(persen_konsumsi1))/100);
            $("#total_konsumsi1biaya").numberbox('setValue',total_konsumsi1);
        }

        function hitunglaundry1(){
            var hari_laundry1 = $("#hari_laundry1biaya").val();
            // var persen_laundry1 = $("#persen_laundry1biaya").numberbox('getValue');
            var persen_laundry1 = $("#persen_laundry1biaya").val();
            var nilai_laundry1 = $("#nilai_laundry12biaya").val();
            var total_laundry1 = Math.round((parseFloat(hari_laundry1)*parseFloat(nilai_laundry1)*parseFloat(persen_laundry1))/100);
            $("#total_laundry1biaya").numberbox('setValue',total_laundry1);
        }

        function hitungpenginapan1(){
            var hari_penginapan1 = $("#hari_penginapan1biaya").val();
            // var persen_penginapan1 = $("#persen_penginapan1biaya").numberbox('getValue');
            var persen_penginapan1 = $("#persen_penginapan1biaya").val();
            var nilai_penginapan1 = $("#nilai_penginapan12biaya").val();
            var total_penginapan1 = Math.round((parseFloat(hari_penginapan1)*parseFloat(nilai_penginapan1)*parseFloat(persen_penginapan1))/100);
            $("#total_penginapan1biaya").numberbox('setValue',total_penginapan1);
        }

        function hitungkonsumsi2(){
            var hari_konsumsi2 = $("#hari_konsumsi2biaya").val();
            // var persen_konsumsi2 = $("#persen_konsumsi2biaya").numberbox('getValue');
            var persen_konsumsi2 = $("#persen_konsumsi2biaya").val();
            var nilai_konsumsi2 = $("#nilai_konsumsi22biaya").val();
            var total_konsumsi2 = Math.round((parseFloat(hari_konsumsi2)*parseFloat(nilai_konsumsi2)*parseFloat(persen_konsumsi2))/100);
            $("#total_konsumsi2biaya").numberbox('setValue',total_konsumsi2);
        }

        function hitunglaundry2(){
            var hari_laundry2 = $("#hari_laundry2biaya").val();
            // var persen_laundry2 = $("#persen_laundry2biaya").numberbox('getValue');
            var persen_laundry2 = $("#persen_laundry2biaya").val();
            var nilai_laundry2 = $("#nilai_laundry22biaya").val();
            var total_laundry2 = Math.round((parseFloat(hari_laundry2)*parseFloat(nilai_laundry2)*parseFloat(persen_laundry2))/100);
            $("#total_laundry2biaya").numberbox('setValue',total_laundry2);
        }

        function hitungpenginapan2(){
            var hari_penginapan2 = $("#hari_penginapan2biaya").val();
            // var persen_penginapan2 = $("#persen_penginapan2biaya").numberbox('getValue');
            var persen_penginapan2 = $("#persen_penginapan2biaya").val();
            var nilai_penginapan2 = $("#nilai_penginapan22biaya").val();
            var total_penginapan2 = Math.round((parseFloat(hari_penginapan2)*parseFloat(nilai_penginapan2)*parseFloat(persen_penginapan2))/100);
            $("#total_penginapan2biaya").numberbox('setValue',total_penginapan2);
        }

        function hitungpegawai(){
            var hari_pegawai = $("#hari_pegawaibiaya").val();
            // var persen_pegawai = $("#persen_pegawaibiaya").numberbox('getValue');
            var persen_pegawai = $("#persen_pegawaibiaya").val();
            var nilai_pegawai = $("#nilai_pegawai2biaya").val();
            var total_pegawai = Math.round((parseFloat(nilai_pegawai)*parseFloat(persen_pegawai))/100);
            $("#total_pegawaibiaya").numberbox('setValue',total_pegawai);
        }

        function hitungkeluarga(){
            var hari_keluarga = $("#hari_keluargabiaya").val();
            // var persen_keluarga = $("#persen_keluargabiaya").numberbox('getValue');
            var persen_keluarga = $("#persen_keluargabiaya").val();
            var nilai_keluarga = $("#nilai_keluarga2biaya").val();
            var total_keluarga = Math.round((parseFloat(hari_keluarga)*parseFloat(nilai_keluarga)*parseFloat(persen_keluarga))/100);
            $("#total_keluargabiaya").numberbox('setValue',total_keluarga);
        }

        function hitungpengantar(){
            var hari_pengantar = $("#hari_pengantarbiaya").val();
            // var persen_pengantar = $("#persen_pengantarbiaya").numberbox('getValue');
            var persen_pengantar = $("#persen_pengantarbiaya").val();
            var nilai_pengantar = $("#nilai_pengantar2biaya").val();
            var total_pengantar = Math.round((parseFloat(hari_pengantar)*parseFloat(nilai_pengantar)*parseFloat(persen_pengantar))/100);
            $("#total_pengantarbiaya").numberbox('setValue',total_pengantar);
        }

        function hitungsuamiistri(){
            var hari_suamiistri = $("#hari_suamiistribiaya").val();
            // var persen_suamiistri = $("#persen_suamiistribiaya").numberbox('getValue');
            var persen_suamiistri = $("#persen_suamiistribiaya").val();
            var nilai_suamiistri = $("#nilai_suamiistri2biaya").val();
            var total_suamiistri = Math.round((parseFloat(hari_suamiistri)*parseFloat(nilai_suamiistri)*parseFloat(persen_suamiistri))/100);
            $("#total_suamiistribiaya").numberbox('setValue',total_suamiistri);
        }

        function hitunganak(){
            var hari_anak = $("#hari_anakbiaya").val();
            // var persen_anak = $("#persen_anakbiaya").numberbox('getValue');
            var persen_anak = $("#persen_anakbiaya").val();
            var nilai_anak = $("#nilai_anak2biaya").val();
            var total_anak = Math.round((parseFloat(hari_anak)*parseFloat(nilai_anak)*parseFloat(persen_anak))/100);
            $("#total_anakbiaya").numberbox('setValue',total_anak);
        }

		function slip(value,row,index){
            var by2 = '<a href="javascript:void(0)" onclick="cetakslip(\''+row.nipdataapproval+'|'+row.blthdataapproval+'\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple" style="margin-top:3px;margin-bottom:3px;"></i></a>';
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
        // $('#persen_konsumsi1biaya').numberbox('fix');
        // $('#persen_konsumsi1biaya').numberbox({
        //     formatter:function(value){
        //         var opts= $(this).numberbox('options');
        //         var s = $.fn.numberbox.defaults.formatter.call(this, value);
        //         var idx = s.indexOf(opts.decimalSeparator+'00');
        //         if (idx >= 0){
        //             s = s.substr(0, idx);
        //         }
        //         return s;
        //     }
        // });
        function allowNumbersOnly(e) {
            var code = (e.which) ? e.which : e.keyCode;
            // if (code > 31 && (code < 48 || code > 57)) {
            if (code > 31 && (code < 48 || code > 57) && code!=46) {
                e.preventDefault();
            }
        }

    </script>
    
    <script type="text/javascript">
    $(function(){
        $("#dgdataapproval").datagrid({
            onDblClickRow: function() {
                //editdataapproval();
            }
        });

    });
    </script>
    <table id="dgdataapproval" title="" class="easyui-datagrid" style="width:100%;height:100%;padding-right:20px;"	
            url="<?=$foldernya;?>get_master_dataapproval.php" pageSize="20"        
    		toolbar="#toolbardataapproval" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead frozen="true">
    		<tr>
                <!-- <th field="aksidataapproval" width="80" align="center" halign="center" data-options="formatter:aksidataapproval,styler:styler1">Aksi</th> -->
                <!-- <th field="biayadataapproval" width="90" align="center" halign="center" data-options="formatter:biayadataapproval,styler:styler1">Perhitungan<br/>Biaya</th> -->
                <!-- <th field="biayanyadataapproval" width="160" align="center" halign="center" data-options="formatter:biayanyadataapproval,styler:styler1">Biaya SPPD</th> -->
    			<th field="namanyadataapproval" width="220" align="left" halign="left" data-options="formatter:namanyadataapproval,styler:styler1">Data SPPD</th>
                <th field="maksudnyadataapproval" width="240" align="left" halign="center" data-options="formatter:maksudnyadataapproval,styler:styler1">Nomor SPPD<br/>Maksud Perjalanan Dinas</th>
    	<thead>
    		<tr>
                <th field="rutenyadataapproval" width="160" align="center" halign="center" data-options="formatter:rutenyadataapproval,styler:styler1">Kedudukan/Tujuan</th>
                <th field="waktunyadataapproval" width="160" align="center" halign="center" data-options="formatter:waktunyadataapproval,styler:styler1">Periode SPPD</th>
                <th field="approval1nyadataapproval" width="200" align="center" halign="center" data-options="formatter:approval1nyadataapproval,styler:styler1">Approval Atasan (1)</th>
                <th field="approval2nyadataapproval" width="200" align="center" halign="center" data-options="formatter:approval2nyadataapproval,styler:styler1">Approval Atasan (2)</th>
                <th field="approvalsdmnyadataapproval" width="200" align="center" halign="center" data-options="formatter:approvalsdmnyadataapproval,styler:styler1">Approval SDM</th>
                <th field="approvalbayarnyadataapproval" width="200" align="center" halign="center" data-options="formatter:approvalbayarnyadataapproval,styler:styler1">Approval SDM</th>
    		</tr>
    	</thead>
    </table>
    
    <div id="toolbardataapproval">
    	<div id="tbdataapproval" style="padding:3px">
            <table>
            <tr>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="nipdataapprovalcari" name="nipdataapprovalcari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchdataapproval()" style="min-width:90px;">Search</a>
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
    
    <div id="dlgdataapproval" class="easyui-dialog" modal="true" style="min-width:200px;min-height:200px;padding-left:5px;padding-right:5px;top:50px;" closed="true" buttons="#dlg-buttonsdataapproval">
    	<form id="fmdataapproval" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="approval1dataapproval" name="approval1dataapproval">
            <input type="hidden" id="approval2dataapproval" name="approval2dataapproval">
            <input type="hidden" id="level_dataapprovaldataapproval" name="level_dataapprovaldataapproval">
            <table>
            <tr>
                <td style="width:300px;">
                    <div>
                        <div class="labelfor"><label>Pegawai</label></div>
                        <input class="easyui-textbox" id="nipdataapproval" name="nipdataapproval" data-options="required:true" style="width: 265px;" readonly>
                        <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="loadpegawai()" style="width:30px;"></a>
                    </div>
                </td> 
                <td style="width:300px;padding-left:10px;">
                    <div>
                        <div class="labelfor"><label>Nama</label></div>
                        <input class="easyui-textbox" id="namadataapproval" name="namadataapproval" data-options="required:true" style="width: 100%;" readonly>
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:300px;">
                    <div>
                        <div class="labelfor"><label>Jabatan</label></div>
                        <input class="easyui-textbox" id="jabatandataapproval" name="jabatandataapproval" data-options="required:true,multiline:true" style="width: 100%;height: 40px;" readonly>
                    </div>
                </td> 
                <td style="width:300px;padding-left:10px;">
                    <div>
                        <div class="labelfor"><label>Level dataapproval</label></div>
                        <input class="easyui-textbox" id="level_dataapproval2dataapproval" name="level_dataapproval2dataapproval" data-options="required:true,multiline:true" style="width: 100%;height: 40px;" readonly>
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:300px;">
                    <div>
                        <div class="labelfor"><label>Atasan Langsung</label></div>
                        <input class="easyui-textbox" id="jabatan_approval1dataapproval" name="jabatan_approval1dataapproval" data-options="required:true,multiline:true" style="width: 100%;height: 40px;" readonly>
                    </div>
                </td> 
                <td style="width:300px;padding-left:10px;">
                    <div>
                        <div class="labelfor"><label>Atasan</label></div>
                        <input class="easyui-textbox" id="jabatan_approval2dataapproval" name="jabatan_approval2dataapproval" data-options="required:false,multiline:true" style="width: 100%;height: 40px;" readonly>
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:300px;">
                    <div>
                        <div class="labelfor"><label>Tingkat dataapproval</label></div>
                        <input class="easyui-combobox"
                            id="tingkat_dataapprovaldataapproval" editable="false"
                            name="tingkat_dataapprovaldataapproval"
                            style="padding: 2px; width: 100%;" 
                            data-options="
                                url:'<?=$foldernya;?>get_tingkat_dataapproval.php',
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'auto'
                        ">
                    </div>
                </td> 
                <td style="width:300px;padding-left:10px;">
                    <div>
                        <div class="labelfor"><label>Jenis dataapproval</label></div>
                        <input class="easyui-combobox"
                            id="jenis_dataapprovaldataapproval" editable="false"
                            name="jenis_dataapprovaldataapproval"
                            style="padding: 2px; width: 100%;" 
                            data-options="
                                url:'<?=$foldernya;?>get_jenis_dataapproval.php',
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
                <td colspan="2">
                    <div>
                        <div class="labelfor"><label>Maksud Perjalanan Dinas</label></div>
                        <input class="easyui-textbox" id="maksuddataapproval" name="maksuddataapproval" data-options="required:true,multiline:true" style="width: 100%;height: 40px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td colspan="2">
                    <div>
                        <div class="labelfor"><label>Agenda Kegiatan</label></div>
                        <input class="easyui-textbox" id="agendadataapproval" name="agendadataapproval" data-options="required:true,multiline:true" style="width: 100%;height: 40px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:300px;">
                    <div>
                        <div class="labelfor"><label>Kota Kedudukan</label></div>
                        <input class="easyui-textbox" id="kedudukandataapproval" name="kedudukandataapproval" data-options="required:true,multiline:true" style="width: 265px;height:40px;" readonly>
                        <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="loadkedudukan()" style="width:30px;"></a>
                    </div>
                </td> 
                <td style="width:300px;padding-left:10px;">
                    <div>
                        <div class="labelfor"><label>Kota Tujuan</label></div>
                        <input class="easyui-textbox" id="tujuandataapproval" name="tujuandataapproval" data-options="required:true,multiline:true" style="width: 265px;height:40px;" readonly>
                        <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="loadtujuan()" style="width:30px;"></a>
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:300px;">
                    <div style="margin-top:5px;">
                        <div class="labelfor"><label>Transportasi</label></div>
                        <select id="transportasidataapproval" name="transportasidataapproval" editable="false" class="easyui-combogrid" style="width:100%;" data-options="
                                panelHeight:'auto',
                                multiple: true,
                                required:true,
                                multiline:false,
                                nowrap:false,                            
                                idField: 'value',
                                textField: 'text',
                                url: '<?=$foldernya;?>get_transportasi.php',
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
                        <input class="easyui-numberbox" id="jarakdataapproval" name="jarakdataapproval" data-options="required:true,min:0,value:0" style="width: 100px;">&nbsp;KM
                    </div>
                </td> 
            </tr>
            <tr>
                <td colspan="2">
                    <div>
                        <div class="labelfor"><label>Lama Perjalanan Dinas</label></div>
                        <input class="easyui-datebox" id="tgl_awaldataapproval" name="tgl_awaldataapproval" editable="false" data-options="onChange:validasitanggal,required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                        &nbsp;s.d&nbsp;
                        <input class="easyui-datebox" id="tgl_akhirdataapproval" name="tgl_akhirdataapproval" editable="false" data-options="onChange:hitunghari,required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                        &nbsp;=&nbsp;
                        <input class="easyui-numberbox" id="haridataapproval" name="haridataapproval" data-options="required:true,min:0" style="width: 50px;">&nbsp;Hari
                    </div>
                </td> 
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsdataapproval">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savedataapproval()" style="min-width:90px">Simpan</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgdataapproval').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgnipdataapproval" class="easyui-dialog" modal="true" style="width:600px;height:400px;padding:5px 5px" closed="true" buttons="#dlg-buttonsnipdataapproval">
        <table id="dgnipdataapproval" title="" style="width:100%;height:100%"	
            url="" pageSize="20" remoteSort="false"        
            toolbar="#" pagination="false" nowrap="false" method="post"   
            rownumbers="false" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th data-options="field:'ck',checkbox:true"></th>
                <th field="nip9" width="100" align="left" halign="left" data-options="">NIP</th>
                <th field="nama9" width="400" align="left" halign="center" data-options="">NAMA</th>
            </tr>
        </thead>
        </table>
        <script>
            $('#dgnipdataapproval').datagrid().datagrid('enableFilter');
        </script>
    </div>
    <div id="dlg-buttonsnipdataapproval">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-check" onclick="pilihnip()" style="min-width:90px">Pilih</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgnipdataapproval').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgkedudukandataapproval" class="easyui-dialog" modal="true" style="width:400px;height:400px;padding:5px 5px" closed="true" buttons="#dlg-buttonskedudukandataapproval">
        <input type="hidden" id="kedudukannya" name="kedudukannya" width="100%" >
        <table id="dgkedudukandataapproval" title="" style="width:100%;height:100%"	
            url="" pageSize="20" remoteSort="false"        
            toolbar="#" pagination="false" nowrap="false" method="post"   
            rownumbers="false" fitColumns="true" singleSelect="false">
        <thead>
            <tr>
                <th data-options="field:'ck',checkbox:true"></th>
                <th field="kota" width="100" align="left" halign="left" data-options="">Kabupaten / Kota</th>
            </tr>
        </thead>
        </table>
        <script>
            $('#dgkedudukandataapproval').datagrid({
                checkOnSelect: true,
                selectOnCheck: true,
                onLoadSuccess:function(data){
                    if(data){
                        for (i = 0; i < data.rows.length; ++i) {
                            var kedudukannya = $("#kedudukannya").val();
                            var kotanya = data.rows[i].kota;                                
                            if(kedudukannya.includes(kotanya)==true){
                                $(this).datagrid('checkRow', i);
                            }                                
                        }
                    } 
                },      
                onCheck: function(index,row){
                    var kedudukannya = $("#kedudukannya").val();
                    var kotanya = row.kota;                                
                    if(kedudukannya.includes(kotanya)!==true){
                        kedudukannya += "|"+row.kota;
                    }                                
                    $("#kedudukannya").val(kedudukannya);
                },
                onUncheck: function(index,row){
                    var kedudukannya = $("#kedudukannya").val();
                    kedudukannya = kedudukannya.replace("|"+row.kota, "");
                    //kedudukannya += "|"+row.kota;
                    $("#kedudukannya").val(kedudukannya);
                },
                onCheckAll: function(index,row){
                },
                onUncheckAll: function(index,row){
                }, 
            }).datagrid('enableFilter');  
            $('#dgkedudukandataapproval').datagrid('getPanel').find('div.datagrid-header input[type=checkbox]').attr('disabled','disabled');      
        </script>
    </div>
    <div id="dlg-buttonskedudukandataapproval">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-check" onclick="pilihkedudukan()" style="min-width:90px">Pilih</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-save" onclick="resetkedudukan()" style="min-width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgkedudukandataapproval').dialog('close')" style="min-width:90px">Tutup</a>
    </div>
    
    <div id="dlgtujuandataapproval" class="easyui-dialog" modal="true" style="width:400px;height:400px;padding:5px 5px" closed="true" buttons="#dlg-buttonstujuandataapproval">
        <input type="hidden" id="tujuannya" name="tujuannya" >
        <table id="dgtujuandataapproval" title="" style="width:100%;height:100%"	
            url="" pageSize="20" remoteSort="false"        
            toolbar="#" pagination="false" nowrap="false" method="post"   
            rownumbers="false" fitColumns="true" singleSelect="false">
        <thead>
            <tr>
                <th data-options="field:'ck',checkbox:true"></th>
                <th field="kota" width="100" align="left" halign="left" data-options="">Kabupaten / Kota</th>
            </tr>
        </thead>
        </table>
        <script>
            $('#dgtujuandataapproval').datagrid({
                checkOnSelect: true,
                selectOnCheck: true,
                onLoadSuccess:function(data){
                    if(data){
                        for (i = 0; i < data.rows.length; ++i) {
                            var tujuannya = $("#tujuannya").val();
                            var kotanya = data.rows[i].kota;                                
                            if(tujuannya.includes(kotanya)==true){
                                $(this).datagrid('checkRow', i);
                            }                                
                        }
                    } 
                },      
                onCheck: function(index,row){
                    var tujuannya = $("#tujuannya").val();
                    var kotanya = row.kota;                                
                    if(tujuannya.includes(kotanya)!==true){
                        tujuannya += "|"+row.kota;
                    }                                
                    $("#tujuannya").val(tujuannya);
                },
                onUncheck: function(index,row){
                    var tujuannya = $("#tujuannya").val();
                    tujuannya = tujuannya.replace("|"+row.kota, "");
                    //kedudukannya += "|"+row.kota;
                    $("#tujuannya").val(tujuannya);
                },
                onCheckAll: function(index,row){
                },
                onUncheckAll: function(index,row){
                }, 
            }).datagrid('enableFilter');  
            $('#dgtujuandataapproval').datagrid('getPanel').find('div.datagrid-header input[type=checkbox]').attr('disabled','disabled');      
        </script>
    </div>
    <div id="dlg-buttonstujuandataapproval">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-check" onclick="pilihtujuan()" style="min-width:90px">Pilih</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-save" onclick="resettujuan()" style="min-width:90px">Reset</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtujuandataapproval').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgpengikut" class="easyui-dialog" modal="true" style="width:600px;height:500px;padding:5px 5px" closed="true" buttons="#dlg-buttonspengikut">
        <input type="hidden" id="iddataapprovalpengikut" name="iddataapprovalpengikut">
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
        <table id="dgpengikut" title="" style="width:100%;height:370px"	
            url="" pageSize="20" remoteSort="false"        
            toolbar="#toolbarpengikut" pagination="true" nowrap="false" method="post"   
            rownumbers="false" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="aksipengikut" width="90" align="center" halign="center" data-options="formatter:aksipengikut">Aksi</th>
                <th field="nama2pengikut" width="250" align="left" halign="left" data-options="">Nama Pengikut</th>
                <th field="hubungan2pengikut" width="100" align="center" halign="center" data-options="">Hubungan<br/>Keluarga</th>
            </tr>
        </thead>
        </table>    
        <div id="toolbarpengikut">
            <div id="tbpengikut" style="padding:3px">
                <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus" onclick="addpengikut()" style="min-width:90px;">Tambah</a>
            </div>		
        </div>
        <script>
            $('#dgpengikut').datagrid().datagrid('enableFilter');  
            function aksipengikut(value,row,index){
                var akses_proses = "<?=$akses_proses;?>";
                if(parseInt(akses_proses)===1){
                    var a = '<a href="javascript:void(0)" title="Edit Data" onclick="editpengikut(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                    var b = '<a href="javascript:void(0)" title="Hapus Data" onclick="destroypengikut(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                } else {
                    var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                    var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                }
                return a+b;
            }
        </script>
    </div>
    <div id="dlg-buttonspengikut">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c2" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgpengikut').dialog('close')" style="min-width:90px">Tutup</a>
    </div>
    
    <div id="dlgpengikut2" class="easyui-dialog" modal="true" style="min-width:200px;min-height:160px;padding-left:5px;padding-right:5px;" closed="true" buttons="#dlg-buttonspengikut2">
    	<form id="fmpengikut2" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="iddataapprovalpengikut2" name="iddataapprovalpengikut2">
            <table>
            <tr>
                <td style="width:300px;">
                    <div>
                        <div class="labelfor"><label>Nama Pengikut</label></div>
                        <input class="easyui-textbox" id="namapengikut2" name="namapengikut2" data-options="required:true" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:300px;">
                    <div>
                        <div class="labelfor"><label>Hubungan Keluarga</label></div>
                        <input class="easyui-combobox"
                            id="hubunganpengikut2" editable="false"
                            name="hubunganpengikut2"
                            style="padding: 2px; width: 100%;" 
                            data-options="
                                url:'<?=$foldernya;?>get_hubungan.php',
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
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savepengikut2()" style="min-width:90px">Simpan</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgpengikut2').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgbiayadataapproval" class="easyui-dialog" modal="true" style="width:650px;min-height:160px;padding:10px;top:100px;" closed="true" buttons="#dlg-buttonsbiaya">
    	<form id="fmbiayadataapproval" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <input type="hidden" id="iddataapprovalbiaya" name="iddataapprovalbiaya">
            <label style="font-weight:bold;">Transportasi</label>
            <table style="width:100%;">
            <tr>
                <td><label id="lbltransportasi"></lable></td>
                <td style="width:80px;">
                    <input class="easyui-numberbox" id="transportasibiaya" name="transportasibiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">                    
                </td> 
            </tr>
            <tr>
                <td><label>Dari rumah ke bandara/stasiun/pelabuhan pp</lable></td>
                <td style="width:80px;">
                    <input class="easyui-numberbox" id="transportasi_lokalbiaya" name="transportasi_lokalbiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">
                </td> 
            </tr>
            <tr>
                <td><label>Airport Tax</lable></td>
                <td style="width:80px;">
                    <input class="easyui-numberbox" id="airport_taxbiaya" name="airport_taxbiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">
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

            <div id="divdataapproval1">                
                <label style="font-weight:bold;">Akomodasi PD Umum / Detasering Bulan Pertama</label>
                <table style="width:100%;">
                <tr>
                    <td style="width:100px;"><label>Konsumsi</lable></td>
                    <td style="width:70px;"><label id="lblhari_konsumsi1"></lable></td>
                    <!-- <td style="width:70px;"><input class="easyui-numberbox" id="persen_konsumsi1biaya" name="persen_konsumsi1biaya" data-options="onChange:hitungkonsumsi1,required:true" style="width: 60px;text-align:right;"></td> -->
                    <td style="width:70px;"><input type="text" id="persen_konsumsi1biaya" name="persen_konsumsi1biaya" onkeypress="allowNumbersOnly(event)" onChange="hitungkonsumsi1()" style="width: 60px;text-align:right;"></td>
                    <td><label id="lblnilai_konsumsi1"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_konsumsi1biaya" name="total_konsumsi1biaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">
                    </td> 
                </tr>
                <tr>
                    <td><label>Laundry</lable></td>
                    <td><label id="lblhari_laundry1"></lable></td>
                    <!-- <td><input class="easyui-numberbox" id="persen_laundry1biaya" name="persen_laundry1biaya" data-options="onChange:hitunglaundry1,required:true" style="width: 60px;text-align:right;"></td> -->
                    <td style="width:70px;"><input type="text" id="persen_laundry1biaya" name="persen_laundry1biaya" onkeypress="allowNumbersOnly(event)" onChange="hitunglaundry1()" style="width: 60px;text-align:right;"></td>
                    <td><label id="lblnilai_laundry1"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_laundry1biaya" name="total_laundry1biaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">
                    </td> 
                </tr>
                <tr>
                    <td><label>Penginapan</lable></td>
                    <td><label id="lblhari_penginapan1"></lable></td>
                    <!-- <td><input class="easyui-numberbox" id="persen_penginapan1biaya" name="persen_penginapan1biaya" data-options="onChange:hitungpenginapan1,required:true" style="width: 60px;text-align:right;"></td> -->
                    <td style="width:70px;"><input type="text" id="persen_penginapan1biaya" name="persen_penginapan1biaya" onkeypress="allowNumbersOnly(event)" onChange="hitungpenginapan1()" style="width: 60px;text-align:right;"></td>
                    <td><label id="lblnilai_penginapan1"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_penginapan1biaya" name="total_penginapan1biaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">
                    </td> 
                </tr>
                </table>
            </div>
            
            <div id="divdataapproval2">
                <label style="font-weight:bold;">Akomodasi PD Umum / Detasering Bulan Berikutnya</label>
                <table style="width:100%;">
                <tr>
                    <td style="width:100px;"><label>Konsumsi</lable></td>
                    <td style="width:70px;"><label id="lblhari_konsumsi2"></lable></td>
                    <!-- <td style="width:70px;"><input class="easyui-numberbox" id="persen_konsumsi2biaya" name="persen_konsumsi2biaya" data-options="onChange:hitungkonsumsi2,required:true" style="width: 60px;text-align:right;"></td> -->
                    <td style="width:70px;"><input type="text" id="persen_konsumsi2biaya" name="persen_konsumsi2biaya" onkeypress="allowNumbersOnly(event)" onChange="hitungkonsumsi2()" style="width: 60px;text-align:right;"></td>
                    <td><label id="lblnilai_konsumsi2"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_konsumsi2biaya" name="total_konsumsi2biaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">
                    </td> 
                </tr>
                <tr>
                    <td><label>Laundry</lable></td>
                    <td><label id="lblhari_laundry2"></lable></td>
                    <!-- <td><input class="easyui-numberbox" id="persen_laundry2biaya" name="persen_laundry2biaya" data-options="onChange:hitunglaundry2,required:true" style="width: 60px;text-align:right;"></td> -->
                    <td style="width:70px;"><input type="text" id="persen_laundry2biaya" name="persen_laundry2biaya" onkeypress="allowNumbersOnly(event)" onChange="hitunglaundry2()" style="width: 60px;text-align:right;"></td>
                    <td><label id="lblnilai_laundry2"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_laundry2biaya" name="total_laundry2biaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">
                    </td> 
                </tr>
                <tr>
                    <td><label>Penginapan</lable></td>
                    <td><label id="lblhari_penginapan2"></lable></td>
                    <!-- <td><input class="easyui-numberbox" id="persen_penginapan2biaya" name="persen_penginapan2biaya" data-options="onChange:hitungpenginapan2,required:true" style="width: 60px;text-align:right;"></td> -->
                    <td style="width:70px;"><input type="text" id="persen_penginapan2biaya" name="persen_penginapan2biaya" onkeypress="allowNumbersOnly(event)" onChange="hitungpenginapan2()" style="width: 60px;text-align:right;"></td>
                    <td><label id="lblnilai_penginapan2"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_penginapan2biaya" name="total_penginapan2biaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">
                    </td> 
                </tr>
                </table>
            </div>
            
            <div id="divdataapproval3">
                <label style="font-weight:bold;">Akomodasi PD Perawatan Kesehatan / Perpanjangan</label>
                <table style="width:100%;">
                <tr>
                    <td style="width:100px;"><label>Pegawai</lable></td>
                    <td style="width:70px;"><label id="lblhari_pegawai"></lable></td>
                    <!-- <td style="width:70px;"><input class="easyui-numberbox" id="persen_pegawaibiaya" name="persen_pegawaibiaya" data-options="onChange:hitungpegawai,required:true" style="width: 60px;text-align:right;"></td> -->
                    <td style="width:70px;"><input type="text" id="persen_pegawaibiaya" name="persen_pegawaibiaya" onkeypress="allowNumbersOnly(event)" onChange="hitungpegawai()" style="width: 60px;text-align:right;"></td>
                    <td><label id="lblnilai_pengawai"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_pegawaibiaya" name="total_pegawaibiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">
                    </td> 
                </tr>
                <tr>
                    <td><label>Keluarga</lable></td>
                    <td><label id="lblhari_keluarga"></lable></td>
                    <!-- <td><input class="easyui-numberbox" id="persen_keluargabiaya" name="persen_keluargabiaya" data-options="onChange:hitungkeluarga,required:true" style="width: 60px;text-align:right;"></td> -->
                    <td style="width:70px;"><input type="text" id="persen_keluargabiaya" name="persen_keluargabiaya" onkeypress="allowNumbersOnly(event)" onChange="hitungkeluarga()" style="width: 60px;text-align:right;"></td>
                    <td><label id="lblnilai_keluarga"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_keluargabiaya" name="total_keluargabiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">
                    </td> 
                </tr>
                <tr>
                    <td><label>Pengantar</lable></td>
                    <td><label id="lblhari_pengantar"></lable></td>
                    <!-- <td><input class="easyui-numberbox" id="persen_pengantarbiaya" name="persen_pengantarbiaya" data-options="onChange:hitungpengantar,required:true" style="width: 60px;text-align:right;"></td> -->
                    <td style="width:70px;"><input type="text" id="persen_pengantarbiaya" name="persen_pengantarbiaya" onkeypress="allowNumbersOnly(event)" onChange="hitungpengantar()" style="width: 60px;text-align:right;"></td>
                    <td><label id="lblnilai_pengantar"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_pengantarbiaya" name="total_pengantarbiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">
                    </td> 
                </tr>
                </table>
            </div>
            
            <div id="divdataapproval4">
                <label style="font-weight:bold;">Bantuan Pindah (Max 14 hari)</label>
                <table style="width:100%;">
                <tr>
                    <td style="width:100px;"><label>Istri/Suami</lable></td>
                    <td style="width:70px;"><label id="lblhari_suamiistri"></lable></td>
                    <!-- <td style="width:70px;"><input class="easyui-numberbox" id="persen_suamiistribiaya" name="persen_suamiistribiaya" data-options="onChange:hitungsuamiistri,required:true" style="width: 60px;text-align:right;"></td> -->
                    <td style="width:70px;"><input type="text" id="persen_suamiistribiaya" name="persen_suamiistribiaya" onkeypress="allowNumbersOnly(event)" onChange="hitungsuamiistri()" style="width: 60px;text-align:right;"></td>
                    <td><label id="lblnilai_suamiistri"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_suamiistribiaya" name="total_suamiistribiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">
                    </td> 
                </tr>
                <tr>
                    <td><label>Anak Pegawai</lable></td>
                    <td><label id="lblhari_anak"></lable></td>
                    <!-- <td><input class="easyui-numberbox" id="persen_anakbiaya" name="persen_anakbiaya" data-options="onChange:hitunganak,required:true" style="width: 60px;text-align:right;"></td> -->
                    <td style="width:70px;"><input type="text" id="persen_anakbiaya" name="persen_anakbiaya" onkeypress="allowNumbersOnly(event)" onChange="hitunganak()" style="width: 60px;text-align:right;"></td>
                    <td><label id="lblnilai_anak"></lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_anakbiaya" name="total_anakbiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">
                    </td> 
                </tr>
                <tr>
                    <td colspan="4"><label>Bantuan Pengepakan</lable></td>
                    <td style="width:80px;">
                        <input class="easyui-numberbox" id="total_pengepakanbiaya" name="total_pengepakanbiaya" data-options="onChange:hitungtotalbiaya,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;">
                    </td> 
                </tr>
                </table>
            </div>
            <hr/>
            <table style="width:100%;">
            <tr>
                <td><label style="font-weight:bold;">Total Biaya dataapproval</lable></td>
                <td style="width:80px;">
                    <input class="easyui-numberbox" id="totalbiaya" name="totalbiaya" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;text-align:right;" readonly>
                </td> 
            </tr>
            </table>

    	</form>
    </div>
    <div id="dlg-buttonsbiaya">        
    	<a id="btnsavebiaya" href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savebiaya()" style="min-width:90px">Simpan</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgbiayadataapproval').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgapproval" class="easyui-dialog" modal="true" style="width:500px;min-height:160px;padding:10px;top:100px;" closed="true" buttons="#dlg-buttonsapproval">
    	<form id="fmapproval" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <!-- <input type="hidden" id="idapproval" name="idapproval"> -->
            <table style="width:95%;">
            <tr>
                <td>
                    <div>
                        <div class="labelfor"><label>Nomor Induk</label></div>
                        <input class="easyui-textbox" id="nipapproval" name="nipapproval" data-options="required:true" style="width: 100%;" readonly>
                    </div>
                </td> 
            </tr>
            <tr>
                <td>
                    <div>
                        <div class="labelfor"><label>Nama Pegawai</label></div>
                        <input class="easyui-textbox" id="namaapproval" name="namaapproval" data-options="required:true" style="width: 100%;" readonly>
                    </div>
                </td> 
            </tr>
            <tr>
                <td>
                    <div>
                        <div class="labelfor"><label>Approval 1</label></div>
                        <input class="easyui-combobox"
                            id="approval1approval"
                            name="approval1approval" missingMessage="Harus di isi" editable="true"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_atasan_langsung.php',                           
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
                        <input class="easyui-combobox"
                            id="approval2approval"
                            name="approval2approval" missingMessage="Harus di isi" editable="true"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_atasan.php',                           
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
    <div id="dlg-buttonsapproval">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="saveapproval()" style="min-width:90px">Simpan</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgapproval').dialog('close')" style="min-width:90px">Batal</a>
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
    	function adddataapproval(){
    		$('#dlgdataapproval').dialog('open').dialog('setTitle','Pengajuan dataapproval');
    		$('#fmdataapproval').form('clear');
    		url = '<?=$foldernya;?>save_dataapproval.php?id=0';
    	}
    	function editdataapproval(index){
            var row = $('#dgdataapproval').datagrid('getRow', index);
    		if (row){
                $('#dlgdataapproval').dialog('open').dialog('setTitle','Update dataapproval');
                $('#fmdataapproval').form('clear');
                $('#fmdataapproval').form('load',row);      
                url = '<?=$foldernya;?>update_dataapproval.php?id='+row.iddataapproval;
            }
    	}
        function loadpegawai(){
            $('#dlgnipdataapproval').dialog('open').dialog('setTitle','Pilih Pegawai');
            $('#dgnipdataapproval').datagrid('loadData',[]);
            $('#dgnipdataapproval').datagrid('load','<?=$foldernya;?>get_data_pegawai.php');

        }
        function pilihnip(){
            var row = $('#dgnipdataapproval').datagrid('getSelected');
            var nip9 = row.nip9;
            var nama9 = row.nama9;
            var jabatan9 = row.jabatan9;
            var approval19 = row.approval19;
            var jabatan_approval19 = row.jabatan_approval19;
            var approval29 = row.approval29;
            var jabatan_approval29 = row.jabatan_approval29;
            var level_dataapproval9 = row.level_dataapproval9;
            var nama_level9 = row.nama_level9;
            $('#dlgnipdataapproval').dialog('close');
            $("#nipdataapproval").textbox('setValue',nip9);
            $("#namadataapproval").textbox('setValue',nama9);
            $("#jabatandataapproval").textbox('setValue',jabatan9);
            $("#approval1dataapproval").val(approval19);
            $("#approval2dataapproval").val(approval29);
            $("#level_dataapprovaldataapproval").val(level_dataapproval9);
            $("#jabatan_approval1dataapproval").textbox('setValue',jabatan_approval19);
            $("#jabatan_approval2dataapproval").textbox('setValue',jabatan_approval29);
            $("#level_dataapproval2dataapproval").textbox('setValue',nama_level9);
        }
        function loadkedudukan(){
            var kedudukannya = $("#kedudukandataapproval").textbox('getValue');
            if(kedudukannya!==""){
                kedudukannya = "|"+kedudukannya;
            }
            kedudukannya = kedudukannya.replaceAll(",","|");
            $('#dlgkedudukandataapproval').dialog('open').dialog('setTitle','Pilih Kota');
            $('#dgkedudukandataapproval').datagrid('loadData',[]);
            $('#dgkedudukandataapproval').datagrid('load','<?=$foldernya;?>get_master_kota.php');
            $("#kedudukannya").val(kedudukannya);
        }
        function pilihkedudukan(){
            var kedudukannya = $("#kedudukannya").val();
            var kedudukannya = kedudukannya.slice(1);
            kedudukannya = kedudukannya.replaceAll("|",",");
            $('#dlgkedudukandataapproval').dialog('close');
            $("#kedudukandataapproval").textbox('setValue',kedudukannya);
        }
        function resetkedudukan(){
            var rows = $('#dgkedudukandataapproval').datagrid('getChecked');
            for(var i=0; i<rows.length; i++){
                $("#dgkedudukandataapproval").datagrid('uncheckRow',i);
            } 
            $("#kedudukannya").val("");
            $("#dgkedudukandataapproval").datagrid('reload');
        }
        function loadtujuan(){
            var tujuannya = $("#tujuandataapproval").textbox('getValue');
            if(tujuannya!==""){
                tujuannya = "|"+tujuannya;
            }
            tujuannya = tujuannya.replaceAll(",","|");
            $('#dlgtujuandataapproval').dialog('open').dialog('setTitle','Pilih Kota');
            $('#dgtujuandataapproval').datagrid('loadData',[]);
            $('#dgtujuandataapproval').datagrid('load','<?=$foldernya;?>get_master_kota.php');
            $("#tujuannya").val(tujuannya);
        }
        function pilihtujuan(){
            var tujuannya = $("#tujuannya").val();
            var tujuannya = tujuannya.slice(1);
            tujuannya = tujuannya.replaceAll("|",",");
            $('#dlgtujuandataapproval').dialog('close');
            $("#tujuandataapproval").textbox('setValue',tujuannya);
        }
        function resettujuan(){
            var rows = $('#dgtujuandataapproval').datagrid('getChecked');
            for(var i=0; i<rows.length; i++){
                $("#dgtujuandataapproval").datagrid('uncheckRow',i);
            } 
            $("#tujuannya").val("");
            $("#dgtujuandataapproval").datagrid('reload');
        }
    	function savedataapproval(){
			var transportasinya = $('#transportasidataapproval').combogrid('getValues').join('|');
            //alert(url);            
            $('#fmdataapproval').form('submit',{
                url: url+'&transportasinya='+transportasinya,
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
                        $('#dlgdataapproval').dialog('close');
                        $('#dgdataapproval').datagrid('reload');
                    }
                }
            });
            
    	}
    	function destroydataapproval(index){
            var row = $('#dgdataapproval').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data dataapproval ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_dataapproval.php',{id:row.iddataapproval,iddataapproval:row.iddataapprovaldataapproval},function(result){
    						if (result.success){
    							$('#dgdataapproval').datagrid('reload');
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

    	function setapproval(index){
            var row = $('#dgdataapproval').datagrid('getRow', index);
    		if (row){
                $('#dlgapproval').dialog('open').dialog('setTitle','Update Approval');
                $('#fmapproval').form('clear');
                $('#fmapproval').form('load',row); 
                $("#nipapproval").textbox('setValue',row.nipdataapproval);
                $("#namaapproval").textbox('setValue',row.namadataapproval);
                $("#approval1approval").combobox('setValue',row.approval1dataapproval);
                $("#approval2approval").combobox('setValue',row.approval2dataapproval);
                url = '<?=$foldernya;?>update_approvaldataapproval.php?id='+row.iddataapproval;
            }
    	}
    	function saveapproval(){
            $('#fmapproval').form('submit',{
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
                        $('#dlgapproval').dialog('close');
                        $('#dgdataapproval').datagrid('reload');
                    }
                }
            });            
    	}

    	function hitungbiaya(index){
            var row = $('#dgdataapproval').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Proses perhitungan biaya sppd, Lanjutkan?',function(r){
    				if (r){
                        $.messager.progress({height:75, text:'Proses hitung biaya...'});
    					$.post('<?=$foldernya;?>hitung_biaya.php',{idsppd:row.idsppddataapproval},function(result){
                            // alert(result);
                            $.messager.progress('close');
    						if (result.success){
    							$('#dgdataapproval').datagrid('reload');
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
    	function resetbiaya(index){
            var row = $('#dgdataapproval').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Reset perhitungan biaya dataapproval, Lanjutkan?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>reset_biaya.php',{idsppd:row.idsppddataapproval},function(result){
    						if (result.success){
    							$('#dgdataapproval').datagrid('reload');
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
        
    	function rincianbiaya(index){
            var superadmin = "<?=$superadminhris;?>";
            var row = $('#dgdataapproval').datagrid('getRow', index);
    		if (row){
                $('#dlgbiayadataapproval').dialog('open').dialog('setTitle','Rincian Biaya SPPD');
                $('#fmbiayadataapproval').form('clear');
                $('#fmbiayadataapproval').form('load',row);
                $("#lbltransportasi").html(row.kedudukandataapproval+' - '+row.tujuandataapproval+' (<span style="font-weight:bold;">'+row.transportasidataapproval+'</span>)');
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

                $("#divdataapproval1").hide();
                $("#divdataapproval2").hide();
                $("#divdataapproval3").hide();
                $("#divdataapproval4").hide();
                if(parseInt(row.jenis_sppddataapproval)==1 || parseInt(row.jenis_sppddataapproval)==4){
                    $("#divdataapproval1").show();
                } else if(parseInt(row.jenis_sppddataapproval)==2){
                    $("#divdataapproval2").show();
                } else if(parseInt(row.jenis_sppddataapproval)==3){
                    $("#divdataapproval1").show();
                    $("#divdataapproval4").show();
                }
                if(parseInt(row.validasi_biayadataapproval)===0){                    
                    $('#btnsavebiaya').linkbutton('enable');
                } else {
                    if(parseInt(superadmin)===1 && parseInt(row.bayardataapproval)===0){
                        $('#btnsavebiaya').linkbutton('enable');
                    } else {
                        $('#btnsavebiaya').linkbutton('disable');
                    }
                }
                $('#dlgbiayadataapproval').dialog('resize');
                url = '<?=$foldernya;?>update_biaya.php?idsppd='+row.idsppddataapproval;
            }
    	}
    	function savebiaya(){
            $.messager.progress({height:75, text:'Proses update biaya...'});
            $('#fmbiayadataapproval').form('submit',{
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
                        $('#dlgbiayadataapproval').dialog('close');
                        $('#dgdataapproval').datagrid('reload');
                    }
                }
            });
            
    	}

    	function validasi(index){
            var row = $('#dgdataapproval').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Validasi perhitungan biaya sppd, Lanjutkan?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>validasi.php',{idsppd:row.idsppddataapproval},function(result){
    						if (result.success){
    							$('#dgdataapproval').datagrid('reload');
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
            var row = $('#dgdataapproval').datagrid('getRow', index);
    		if (row){
                if(parseInt(row.approvebayardataapproval)===2){
                    var keterangan = ". Proses ini sekaligus akan melakukan reset approval pembayaran";
                } else {
                    var keterangan = "";
                }
    			$.messager.confirm('Konfirmasi','Reset validasi perhitungan biaya sppd'+keterangan+', Lanjutkan?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>reset_validasi.php',{idsppd:row.idsppddataapproval},function(result){
    						if (result.success){
    							$('#dgdataapproval').datagrid('reload');
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
            var row = $('#dgdataapproval').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Reset Approval SDM?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>reset_sdm.php',{iddataapproval:row.iddataapprovaldataapproval},function(result){
    						if (result.success){
    							$('#dgdataapproval').datagrid('reload');
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

        function pengikutdataapproval(index){
            var row = $('#dgdataapproval').datagrid('getRow', index);
    		if (row){
                $('#dlgpengikut').dialog('open').dialog('setTitle','Pengikut dataapproval');
                $('#dgpengikut').datagrid('loadData',[]);
                $('#dgpengikut').datagrid('load','<?=$foldernya;?>get_data_pengikut.php?iddataapproval='+row.iddataapprovaldataapproval);
                $("#lblnippegawai").text(row.nipdataapproval);
                $("#lblnamapegawai").text(row.namadataapproval);
                $("#iddataapprovalpengikut").val(row.iddataapprovaldataapproval);
            }
        }

        function addpengikut(){
            var iddataapprovalnya = $("#iddataapprovalpengikut").val();
            $('#dlgpengikut2').dialog('open').dialog('setTitle','Input Data Pengikut');
            $('#fmpengikut2').form('clear');
            $("#iddataapprovalpengikut2").val(iddataapprovalnya);
            $("#hubunganpengikut2").combobox('reload','<?=$foldernya;?>get_hubungan.php?iddataapproval='+iddataapprovalnya);
            url = '<?=$foldernya;?>save_pengikut2.php';
        }

        function editpengikut(index){
            var row = $('#dgpengikut').datagrid('getRow', index);
    		if (row){
                $('#dlgpengikut2').dialog('open').dialog('setTitle','Edit Data Pengikut');
                $('#fmpengikut2').form('clear');
                $('#fmpengikut2').form('load',row);
                $("#hubunganpengikut2").combobox('reload','<?=$foldernya;?>get_hubungan.php?iddataapproval='+row.iddataapprovalpengikut);
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
    	function cetakdataapproval(index){
            var row = $('#dgdataapproval').datagrid('getRow', index);
    		if (row){
                window.open('<?=$foldernya;?>formsppd.php?idsppd='+row.idsppddataapproval,'_blank');
            }
        }

        //$("#dgdataapproval").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmdataapproval{
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
    	.fitemdataapproval{
    		margin-bottom:5px;
    	}
    	.fitemdataapproval label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemdataapproval input{
    		width:200px;
    	}
    	#fmdataapproval.numberbox input{
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

        #fmbiayadataapproval .numberbox .textbox-text{
            text-align: right;
        }        
        .persenbiaya{
            text-align: right !important;
        }        
        /* .persenbiaya */
    </style>
<?php
}
?>