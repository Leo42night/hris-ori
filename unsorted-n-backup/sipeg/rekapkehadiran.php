<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    include "koneksi.php";
    $foldernya = "sipeg/";
    ?>
    <script>       
        var myVarsetoranspk1,myVarrincianspk1,myVarpotonganspk1,myVarsetorangab1,myVarrinciangab1;
        
        function myStartFunctionsetoranspk1() {
            myVarsetoranspk1 = setInterval(function(){
                var filesetoranspk1 = $("#filesetoranspk1").val();
                $.ajax({
                    url:'absensi/'+filesetoranspk1,
                    type:'HEAD',
                    error: function(){                        
                        $(".boxsetoranspk1").html("");                        
                    },
                    success: function(){
                        myStopFunctionsetoranspk1();
                        $.messager.progress('close');
                        var linknya = 'laporan/'+filesetoranspk1;
                        var link = $("<a>");
                        link.attr("href", linknya);
                        link.attr("target", "_blank");
                        link.attr("title", "Setoran Bank");
                        link.text("Setoran Bank Per SPK");
                        link.addClass("link");
                        $(".boxsetoranspk1").html(link);
                    }
                });
            }, 2000);
        }
        function myStopFunctionsetoranspk1() {
            clearInterval(myVarsetoranspk1);
        }    
        
        function myStartFunctionrincianspk1() {
            myVarrincianspk1 = setInterval(function(){
                var filerincianspk1 = $("#filerincianspk1").val();
                $.ajax({
                    url:'laporan/'+filerincianspk1,
                    type:'HEAD',
                    error: function(){                        
                        $(".boxrincianspk1").html("");                        
                    },
                    success: function(){
                        myStopFunctionrincianspk1();
                        $.messager.progress('close');
                        var linknya = 'laporan/'+filerincianspk1;
                        var link = $("<a>");
                        link.attr("href", linknya);
                        link.attr("target", "_blank");
                        link.attr("title", "Rincian");
                        link.text("Rincian Per SPK");
                        link.addClass("link");
                        $(".boxrincianspk1").html(link);
                    }
                });
            }, 2000);
        }
        function myStopFunctionrincianspk1() {
            clearInterval(myVarrincianspk1);
        }    
        
        function myStartFunctionpotonganspk1() {
            myVarpotonganspk1 = setInterval(function(){
                var filepotonganspk1 = $("#filepotonganspk1").val();
                $.ajax({
                    url:'laporan/'+filepotonganspk1,
                    type:'HEAD',
                    error: function(){                        
                        $(".boxpotonganspk1").html("");                        
                    },
                    success: function(){
                        myStopFunctionpotonganspk1();
                        $.messager.progress('close');
                        var linknya = 'laporan/'+filepotonganspk1;
                        var link = $("<a>");
                        link.attr("href", linknya);
                        link.attr("target", "_blank");
                        link.attr("title", "Potongan");
                        link.text("Potongan Per SPK");
                        link.addClass("link");
                        $(".boxpotonganspk1").html(link);
                    }
                });
            }, 2000);
        }
        function myStopFunctionpotonganspk1() {
            clearInterval(myVarpotonganspk1);
        }    
        
        function myStartFunctionsetorangab1() {
            myVarsetorangab1 = setInterval(function(){
                var filesetorangab1 = $("#filesetorangab1").val();
                $.ajax({
                    url:'laporan/'+filesetorangab1,
                    type:'HEAD',
                    error: function(){                        
                        $(".boxsetorangab1").html("");                        
                    },
                    success: function(){
                        myStopFunctionsetorangab1();
                        $.messager.progress('close');
                        var linknya = 'laporan/'+filesetorangab1;
                        var link = $("<a>");
                        link.attr("href", linknya);
                        link.attr("target", "_blank");
                        link.attr("title", "Setoran Bank");
                        link.text("Setoran Bank Gabungan");
                        link.addClass("link");
                        $(".boxsetorangab1").html(link);
                    }
                });
            }, 2000);
        }
        function myStopFunctionsetorangab1() {
            clearInterval(myVarsetorangab1);
        }    
        
        function myStartFunctionrinciangab1() {
            myVarrinciangab1 = setInterval(function(){
                var filerinciangab1 = $("#filerinciangab1").val();
                $.ajax({
                    url:'laporan/'+filerinciangab1,
                    type:'HEAD',
                    error: function(){                        
                        $(".boxrinciangab1").html("");                        
                    },
                    success: function(){
                        myStopFunctionrinciangab1();
                        $.messager.progress('close');
                        var linknya = 'laporan/'+filerinciangab1;
                        var link = $("<a>");
                        link.attr("href", linknya);
                        link.attr("target", "_blank");
                        link.attr("title", "Rincian");
                        link.text("Rincian Gabungan");
                        link.addClass("link");
                        $(".boxrinciangab1").html(link);
                    }
                });
            }, 2000);
        }
        function myStopFunctionrinciangab1() {
            clearInterval(myVarrinciangab1);
        }    
        
        function myStartFunctionpotongangab1() {
            myVarpotongangab1 = setInterval(function(){
                var filepotongangab1 = $("#filepotongangab1").val();
                $.ajax({
                    url:'laporan/'+filepotongangab1,
                    type:'HEAD',
                    error: function(){                        
                        $(".boxpotongangab1").html("");                        
                    },
                    success: function(){
                        myStopFunctionpotongangab1();
                        $.messager.progress('close');
                        var linknya = 'laporan/'+filepotongangab1;
                        var link = $("<a>");
                        link.attr("href", linknya);
                        link.attr("target", "_blank");
                        link.attr("title", "Rincian");
                        link.text("Potongan Gabungan");
                        link.addClass("link");
                        $(".boxpotongangab1").html(link);
                    }
                });
            }, 2000);
        }
        function myStopFunctionpotongangab1() {
            clearInterval(myVarpotongangab1);
        }    
        
    </script>
    <script>
        $(document).ready(function () {
            $('#panelrekapkehadiran2').on('load', function () {
                $('#loadImg2').hide();
            });
        });
    </script>    
	<script type="text/javascript">                     
		function doSearchrekapkehadiran(){
            // kosongkan();
            $('#dgrekapkehadiran').datagrid('load',{                
				blth_awalrekapkehadirancari: $('#blth_awalrekapkehadirancari').datebox('getValue'),			
				blth_akhirrekapkehadirancari: $('#blth_akhirrekapkehadirancari').datebox('getValue'),			
                namarekapkehadirancari: $('#namarekapkehadirancari').textbox('getValue'),			
			});                        
		}
        
        $('#kd_unitrekapkehadirancari').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        /*
        $('#no_spkrekapkehadirancari').combogrid({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        */
        function onSelectwilayahcari(){
            var kd_wilayah = $('#kd_wilayahrekapkehadirancari').combobox('getValue');
            var url1 = 'get_up3cari.php?kd_wilayah='+kd_wilayah;
            $('#kd_up3rekapkehadirancari').combobox('clear');
            $('#kd_up3rekapkehadirancari').combobox('reload',url1);
    	}
        function onSelectup3cari(){
            var kd_wilayah = $('#kd_wilayahrekapkehadirancari').combobox('getValue');
            var kd_up3 = $('#kd_up3rekapkehadirancari').combobox('getValue');
            var url1 = 'get_unitcari.php[not_found]?kd_wilayah='+kd_wilayah+'&kd_up3='+kd_up3;
            $('#kd_unitrekapkehadirancari').combobox('clear');
            $('#kd_unitrekapkehadirancari').combobox('reload',url1);
            $('#kd_unitrekapkehadirancari').combobox('setValue','semua');
    	}
        
        function kosongkan(){
            $(".boxabsensi1").html("");
            $("#fileabsen1").val("");
        }

        function onSelectregionrekapkehadirancari(){
            var nilai1 = $('#kelompokrekapkehadirancari').combobox('getValue');
            var nilai2 = $('#kd_regionrekapkehadirancari').combobox('getValue');
            var nilai3 = $('#kd_cabangrekapkehadirancari').combobox('getValue');
            //var kelompoknya = nilai1.replace(" ", "_");
            //var url1 = 'get_spkrekapkehadirancari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangcari.php[not_found]?kd_region='+nilai2;
            var url3 = 'get_unitcari.php[not_found]?kd_region='+nilai2;
            $('#kd_cabangrekapkehadirancari').combobox('clear');
            $('#kd_cabangrekapkehadirancari').combobox('reload',url2);
            $('#kd_cabangrekapkehadirancari').combobox('setValue','000');

            $('#kd_unitrekapkehadirancari').combobox('clear');
            $('#kd_unitrekapkehadirancari').combobox('reload',url3);
            $('#kd_unitrekapkehadirancari').combobox('setValue','semua');
            /*
            $('#no_spkrekapkehadirancari').combogrid('clear');
            $('#no_spkrekapkehadirancari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrekapkehadirancari').combogrid('setValue','SEMUA');
            */
    	}
        
        function onSelectcabangrekapkehadirancari(){
            var nilai1 = $('#kelompokrekapkehadirancari').combobox('getValue');
            var nilai2 = $('#kd_regionrekapkehadirancari').combobox('getValue');
            var nilai3 = $('#kd_cabangrekapkehadirancari').combobox('getValue');
            //var url1 = 'get_spkrekapkehadirancari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_unitcari.php[not_found]?kd_region='+nilai2+'&kd_cabang='+nilai3;

            $('#kd_unitrekapkehadirancari').combobox('clear');
            $('#kd_unitrekapkehadirancari').combobox('reload',url2);
            $('#kd_unitrekapkehadirancari').combobox('setValue','semua');
            /*
            $('#no_spkrekapkehadirancari').combogrid('clear');
            $('#no_spkrekapkehadirancari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkrekapkehadirancari').combogrid('setValue','SEMUA');
            */
    	}
        /*
        function reloadunit(){
            var nilai1 = $('#jenisrekapkehadirancari').combobox('getValue');
            var nilai2 = $('#kd_projectrekapkehadirancari').combobox('getValue');
            var url2 = 'get_unitrekapkehadirancari.php?jenis='+nilai1+'&kd_project='+nilai2;
            //$('#kd_unitrekapkehadirancari').combobox('enable');
            //$('#kd_unitrekapkehadirancari').combobox('clear'); 
            $('#kd_unitrekapkehadirancari').combogrid('clear');
            $('#kd_unitrekapkehadirancari').combogrid('grid').datagrid('reload',url2);
    	}
        */
        
		function Aksi1(value,row,index){
            var by1 = '<img src="images/ohm.png" width="15px" style="padding-top:3px;"/>';
            return by1;
		}
        
		function Aksi2(value,row,index){
            var by2 = '<img src="images/ohm.png" width="15px" style="padding-top:3px;"/>';
            return by2;
		}

		function cellStylerRow(value,rekapkehadiran,index){
			if (rekapkehadiran.statusrekapkehadiran == "1"){
                return 'background-color:red;color:white;';
			} else {
                return 'background-color:green;color:white;';
			}
		}

		function cellStyler(value,rekapkehadiran,index){
			return 'vertical-align:middle;';
		}

        function formatrp2(val,rekapkehadiran){
            if(val==="" || val===NaN){
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

        function formatrp3(val,rekapkehadiran){
            return number_format3(val,3,',','.');
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

        function formatrp4(val,rekapkehadiran){
            return number_format4(val,2,',','.');
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
        /*
        function onSelectregionalrekapkehadirancari(){
            var nilai1 = $('#kd_regionalrekapkehadirancari').combobox('getValue');
            var url2 = 'get_unitrekapkehadirancari.php?kd_regional='+nilai1;
            $('#kd_unitrekapkehadirancari').combobox('enable');
            $('#kd_unitrekapkehadirancari').combobox('clear'); 
            $('#kd_unitrekapkehadirancari').combobox('reload',url2);
    	}
        */
        function fileExists(url){
            var http = new XMLHttpRequest();
            http.open('HEAD', url, false);
            http.send();
            return http.status!=404;
        }   
        
        function formatrp2(val,row){
            if(val===""){
                return "";
            } else {
                if(val!=0){
                    return number_format2(val,2,',','.');
                } else {
                    return 0;
                }
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

		function aksirekapkehadiran(value,row,index){
            var a = '<a href="javascript:void(0)" title="Update Data" onclick="rincianabsen(\''+row.niprekapkehadiran+'|'+row.blthrekapkehadiran+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-top:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
            return a;
		}

		function rincian1(value,row,index){
            //var by2 = '<a href="javascript:void(0)" onclick="rincian1(\''+row.niprekapkehadiran+'\')" title="Cetak Rincian Pegawai"><i class="fas fa-file-pdf purple" style="font-size:16px;"></i></a>';
            //var by2 = '<a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file-excel" onclick="downloadrincian(\''+row.niprekapkehadiran+'\')" style="width:100%;">Download Rekap</a>';
            var by2 = '<a href="javascript:void(0)" onclick="downloadrincian(\''+row.niprekapkehadiran+'\')"><button class="easyui-linkbutton c1" style="width:90%;height:25px;font-size:11px !important;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-top:3px;"><i class="fa fa-download" style="font-size:8px !important;margin-right:5px;"></i>RINCIAN</button></a>';
            return by2;
		}

		function rincian2(value,row,index){
            var blth = $('#blthrekapkehadirancari').datebox('getValue');
            //var by2 = '<a href="javascript:void(0)" onclick="rincian1(\''+row.nipviewpay+'|'+row.blthviewpay+'\')" title="Cetak Slip Gaji"><i class="fas fa-file-pdf fa-2x purple"></i></a>';
            //return by2;
            //alert(blth);
		}

	</script>
    <script type="text/javascript">
    $(function(){
        $.extend($.fn.textbox.methods, {
        	show: function(jq){
        		return jq.each(function(){
        			$(this).next().show();
        		})
        	},
        	hide: function(jq){
        		return jq.each(function(){
        			$(this).next().hide();
        		})
        	}
        });
    });
    </script>
    <script type="text/javascript">
    $(function(){
        $("#dgrekapkehadiran").datagrid({
            onDblClickRow: function(rekapkehadiranIndex) {
            }
        });
        //kosongkan();
    });
    </script>
    <table id="dgrekapkehadiran" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_rekapkehadiran.php" pageSize="20"        
    		toolbar="#toolbarrekapkehadiran" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true" showFooter="true"
            >
    	<thead>
    		<tr>
    			<!--<th field="norekapkehadiran" width="50" align="center" halign="center">No</th>-->
                <?php if(intval($superadminhris)==1 || $userhris=="92163198ZY"){?>
                <th field="aksirekapkehadiran" width="50" align="center" halign="center" data-options="formatter:aksirekapkehadiran">Aksi</th>
                <?php } ?>
                <!-- <th field="rincian1" width="120" align="center" halign="center" data-options="formatter:rincian1">Rincian</th> -->
                <!--<th field="rincian2" width="50" align="center" halign="center" data-options="formatter:rincian2">Rincian</th>-->
    			<th field="niprekapkehadiran" width="140" align="center" halign="center">NIP</th>
    			<th field="namarekapkehadiran" width="200" align="left" halign="center">Nama</th>
    			<th field="jabatanrekapkehadiran" width="350" align="left" halign="left">Jabatan</th>
    			<th field="jumlah_absenrekapkehadiran" width="120" align="center" halign="center">Absensi</th>
    			<!-- <th field="jumlah_pulangrekapkehadiran" width="120" align="center" halign="center">Absen Pulang</th> -->
                <th field="jumlah_cutirekapkehadiran" width="100" align="center" halign="center">Cuti</th>
    			<th field="jumlah_ijinrekapkehadiran" width="100" align="center" halign="center">Izin</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarrekapkehadiran">
    	<div id="tbrekapkehadiran" style="padding:3px">            
            <table>
            <tr>   
                <td>PERIODE</td>
                <td>
                    <input class="easyui-datebox" id="blth_awalrekapkehadirancari" name="blth_awalrekapkehadirancari" value="<?=date('Y-m');?>" editable="false" data-options="required:false,formatter:myformatter2,parser:myparser2" style="width: 100px;">
                    <input class="easyui-datebox" id="blth_akhirrekapkehadirancari" name="blth_akhirrekapkehadirancari" value="<?=date('Y-m');?>" editable="false" data-options="required:false,formatter:myformatter2,parser:myparser2" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="namarekapkehadirancari" name="namarekapkehadirancari" data-options="required:false" style="width: 160px;">
                </td>
                <td>&nbsp;</td>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="false" iconCls="fa fa-search" onclick="doSearchrekapkehadiran()" style="min-width:90px;">Search</a>
                    <a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file-excel" onclick="downloadrekapkehadiran()">Download Rekap</a>
                </td>                
            </tr>
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
        var url; 
        function cetakrekapkehadiransi(){
			var kd_wilayahnya = $('#kd_wilayahrekapkehadirancari').combobox('getValue');
			var nama_wilayahnya = $('#kd_wilayahrekapkehadirancari').combobox('getText');            
			var kd_up3nya = $('#kd_up3rekapkehadirancari').combobox('getValue');
			var nama_up3nya = $('#kd_up3rekapkehadirancari').combobox('getText');            
			var kd_unitnya = $('#kd_unitrekapkehadirancari').combobox('getValue');
            var blthnya = $('#blthrekapkehadirancari').datebox('getValue');
            window.open("laprekapkehadiran.php?blth="+blthnya+"&kd_wilayah="+kd_wilayahnya+"&kd_up3="+kd_up3nya+"&kd_unit="+kd_unitnya,"_blank");
        } 

        function downloadrekapkehadiran(){
            var blth_awal = $('#blth_awalrekapkehadirancari').datebox('getValue');
            var blth_akhir = $('#blth_akhirrekapkehadirancari').datebox('getValue');
            window.open("<?=$foldernya;?>download_kehadiran.php?blth_awal="+blth_awal+"&blth_akhir="+blth_akhir,"_blank");
        } 

        function downloadrincian(nipnya){
            //alert(nipnya);
            var blthnya = $('#blthrekapkehadirancari').datebox('getValue');
            window.open("<?=$foldernya;?>download_rabsensi.php?blth="+blthnya+"&nip="+nipnya,"_blank");
        } 
        
    	function rincianabsen(datanya){
            // var data2 = datanya.split("|");
            // var nipnya = data2[0];
            // var blthnya = data2[1];
            if ($('#tt').tabs('exists','Rincian Absen')){
                $('#tt').tabs('select','Rincian Absen');
                var p = $('#tt').tabs('getTab', 'Rincian Absen');
		        p.panel('refresh',"<?=$foldernya;?>rincianabsen.php?datanya="+datanya);

            } else {
    			$('#tt').tabs('add',{
    				title: 'Rincian Absen',                                
                    href: "<?=$foldernya;?>rincianabsen.php?datanya="+datanya,
    				closable: true
    			});
            }
        }
        
        $("#dgrekapkehadiran").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmrekapkehadiran{
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
    	.fitemupt{
    		margin-bottom:5px;
    	}
    	.fitemupt label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitemupt input{
    		width:200px;
    	}
        #loadImg2{position:absolute;z-index:99999999;}
        #loadImg2 div{display:table-cell;width:1200px;height:550px;background:#fff;text-align:center;vertical-align:middle;}        
    </style>
<?php
}
?>