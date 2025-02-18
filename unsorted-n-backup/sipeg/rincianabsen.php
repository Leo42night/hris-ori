<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = "1";
$akses_view = "1";
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {    
    include "koneksi.php";
    include "koneksi_sipeg.php";
    $foldernya = "sipeg/";
    $datanya = $_REQUEST['datanya'];
    $data2 = explode("|",$datanya);
    $nip2 = $data2[0];
    $blth2 = $data2[1];
    ?>
    <!--<script type="text/javascript" src="datagrid-filter.js"></script>-->
	<script type="text/javascript">                     
        function aksirincianabsen(value,row,index){            
            var a = '<a href="javascript:void(0)" title="Update Data" onclick="editrincianabsen(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
            // if(row.keteranganrincianabsen==="Tidak Absen"){
            //     var a = '<a href="javascript:void(0)" title="Update Data" onclick="editrincianabsen(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
            // } else {
            //     var a = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
            // }
            return a;
        }  

        function keterangannyarincianabsen(value,row,index){            
            var a = '';
            if(row.keteranganrincianabsen==="Absen"){
                a += '<span style="color:blue;">'+row.keteranganrincianabsen+'</span>';
            } else if(row.keteranganrincianabsen==="Tidak Absen"){
                a += '<span style="color:red;">'+row.keteranganrincianabsen+'</span>';
            } else {
                a += '<span>'+row.keteranganrincianabsen+'</span>';
            }
            return a;
        }  

		function cellStylerRow(value,rincianabsen,index){
			if (rincianabsen.statusrincianabsen == "1"){
                return 'background-color:red;color:white;';
			} else {
                return 'background-color:green;color:white;';
			}
		}

		function cellStyler(value,rincianabsen,index){
			return 'vertical-align:middle;';
		}

        function formatrp2(val,rincianabsen){
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

        function formatrp3(val,rincianabsen){
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

        function formatrp4(val,rincianabsen){
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
        function onSelectregionalrincianabsencari(){
            var nilai1 = $('#kd_regionalrincianabsencari').combobox('getValue');
            var url2 = 'get_unitrincianabsencari.php?kd_regional='+nilai1;
            $('#kd_unitrincianabsencari').combobox('enable');
            $('#kd_unitrincianabsencari').combobox('clear'); 
            $('#kd_unitrincianabsencari').combobox('reload',url2);
    	}
        */

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
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
        $("#dgrincianabsen").datagrid();
    });
    </script>
    <table id="dgrincianabsen" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_rincianabsen.php?nip=<?=$nip2;?>&blth=<?=$blth2;?>" pageSize="20"        
    		toolbar="#toolbarrincianabsen" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true" showFooter="true"
            >
    	<thead>
    		<tr>
    			<th rowspan="2" field="aksirincianabsen" width="50" align="center" halign="center" data-options="formatter:aksirincianabsen">Aksi</th>
    			<!-- <th rowspan="2" field="niprincianabsen" width="120" align="center" halign="center">NIP</th> -->
    			<!-- <th rowspan="2" field="namarincianabsen" width="200" align="left" halign="center">NAMA</th> -->
    			<th rowspan="2" field="keterangannyarincianabsen" width="200" align="left" halign="center" data-options="formatter:keterangannyarincianabsen">KETERANGAN</th>
                <th rowspan="2" field="tgl_absen2rincianabsen" width="110" align="center" halign="center">TANGGAL</th>
                <th colspan="4">ABSEN MASUK</th>
                <th colspan="4">ABSEN PULANG</th>
    			<th rowspan="2" field="durasirincianabsen" width="100" align="center" halign="center">DURASI</th>
    			<th rowspan="2" field="status2rincianabsen" width="100" align="center" halign="center">STATUS</th>
    		</tr>
            <tr>
    			<th field="jam_masukrincianabsen" width="80" align="center" halign="center">JAM</th>
    			<th field="lat_masukrincianabsen" width="140" align="center" halign="center">LATITUDE</th>
    			<th field="lon_masukrincianabsen" width="140" align="center" halign="center">LONGITUDE</th>
    			<th field="jarak_masuk2rincianabsen" width="80" align="center" halign="center">JARAK</th>
    			<th field="jam_pulangrincianabsen" width="80" align="center" halign="center">JAM</th>
    			<th field="lat_pulangrincianabsen" width="140" align="center" halign="center">LATITUDE</th>
    			<th field="lon_pulangrincianabsen" width="140" align="center" halign="center">LONGITUDE</th>
    			<th field="jarak_pulang2rincianabsen" width="80" align="center" halign="center">JARAK</th>
            </tr>
    	</thead>
    </table>
    <div id="toolbarrincianabsen">
    	<div id="tbrincianabsen" style="padding:3px">            
            <table>            
            <tr>   
                <td>NIP : </td>
                <td><?=$nip2;?></td>
                <td>&nbsp;</td>
                <td>BULAN : </td>
                <td><?=$blth2;?></td>
            </tr>
            </table>
    	</div>
    </div>
    
    <div id="dlgrincianabsen" class="easyui-dialog" modal="true" style="min-width:120px;min-height:80px;"
    		closed="true" buttons="#dlg-buttonsrincianabsen">
    	<form id="fmrincianabsen" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor1"><label>Nip</label></div>
                            <input class="easyui-textbox" id="niprincianabsen" name="niprincianabsen" missingMessage="Harus di isi" data-options="required:true" style="width: 200px;" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor1"><label>Tanggal</label></div>
                            <input class="easyui-textbox" id="tgl_absenrincianabsen" name="tgl_absenrincianabsen" missingMessage="Harus di isi" data-options="required:true"  style="width: 200px;" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Jam Masuk</label></div>
                            <input class="easyui-textbox" id="jam_masukrincianabsen" name="jam_masukrincianabsen" missingMessage="Harus di isi" data-options="required:false,prompt:'hh:mm'" style="width: 200px;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Jam Pulang</label></div>
                            <input class="easyui-textbox" id="jam_pulangrincianabsen" name="jam_pulangrincianabsen" missingMessage="Harus di isi" data-options="required:false,prompt:'hh:mm'" style="width: 200px;">
                        </div>
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsrincianabsen">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="saverincianabsen()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgrincianabsen').dialog('close')" style="min-width:90px">Batal</a>
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
        function editrincianabsen(index){
            var row = $('#dgrincianabsen').datagrid('getRow', index);
    		if (row){
                $('#dlgrincianabsen').dialog('open').dialog('setTitle','Update Absensi');
                $('#fmrincianabsen').form('clear');
    			$('#fmrincianabsen').form('load',row);  
                $("#niprincianabsen").textbox('setValue',row.niprincianabsen);   
                $("#tgl_absenrincianabsen").textbox('setValue',row.tanggalrincianabsen);   
                url = '<?=$foldernya;?>update_rincianabsen.php?id='+row.idrincianabsen;  
            }
        } 
    	function saverincianabsen(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmrincianabsen').form('submit',{
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
                        $('#dlgrincianabsen').dialog('close');
                        $('#dgrincianabsen').datagrid('reload');
                    }
                }
            });
    	}

    	function destroyrincianabsen(index){ 
            var row = $('#dgrincianabsen').datagrid('getRow', index);
    		if (row){
                $.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
                    if (r){
                        $.post('destroy_rincianabsen.php',{id:row.idrincianabsen},function(result){
                            if (result.success){
                                $('#dgrincianabsen').datagrid('reload');
                            } else {
                                $.messager.alert('ERROR',result.errorMsg,'warning');
                            }
                        },'json');
                    }
                });
    		}
    	}

        function cetakabsensi(){
			var kelompoknya2 = $('#kelompokrincianabsencari').combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
			var kd_regionnya = $('#kd_regionrincianabsencari').combobox('getValue');
			var nama_regionnya = $('#kd_regionrincianabsencari').combobox('getText');            
			var kd_cabangnya = $('#kd_cabangrincianabsencari').combobox('getValue');
			var nama_cabangnya = $('#kd_cabangrincianabsencari').combobox('getText');            
			var kd_unitnya = $('#kd_unitrincianabsencari').combobox('getValue');
			var no_spknya = $('#no_spkrincianabsencari').textbox('getText');
            var tanggalnya = $('#tanggalrincianabsencari').datebox('getValue');
            //window.open("laprincianabsen.php?tanggal="+tanggalnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya+"&kd_unit="+kd_unitnya+"&nip_nama="+nip_namanya,"_blank");
            window.open("laprincianabsen.php?tanggal="+tanggalnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya+"&kd_unit="+kd_unitnya+"&no_spk="+no_spknya,"_blank");
        } 

        function downloadabsensi(){
            var kd_wilayah = $('#kd_wilayahrincianabsencari').combobox('getValue');
            var kd_up3 = $('#kd_up3rincianabsencari').combobox('getValue');
            var kd_unit = $('#kd_unitrincianabsencari').combobox('getValue');
            var tanggal = $('#tanggalrincianabsencari').datebox('getValue');	
            var kd_unit = kd_unit.replace(",", "|");		
            window.open("download_rincianabsen.php?tanggal="+tanggal+"&kd_wilayah="+kd_wilayah+"&kd_up3="+kd_up3+"&kd_unit="+kd_unit,"_blank");
        } 

        $("#dgrincianabsen").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmrincianabsen{
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
        .labelfor {
            font-weight:bold;
            font-size:11.5px;
            margin-bottom:3px !important;
            margin-top:5px !important;
        }
        .labelfor1 {
            font-weight:bold;
            font-size:11.5px;
            margin-bottom:3px !important;
            margin-top:0px !important;
        }

    </style>
<?php
}
?>