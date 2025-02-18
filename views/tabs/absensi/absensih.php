<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {    
    $foldernya = "api/absensi/";
    ?>
    <!--<script type="text/javascript" src="datagrid-filter.js"></script>-->
	<script type="text/javascript">                     
		function doSearchabsensih(){
            //kosongkan();
            $('#dgabsensih').datagrid('load',{                
                tanggalabsensihcari: $('#tanggalabsensihcari').datebox('getValue'),			
                nipabsensihcari: $('#nipabsensihcari').textbox('getValue'),			
			});                        
		}
        
        function getdatapegawai(){
            var nipnya = $("#nipabsensih").textbox('getValue');
            $.ajax({
                type : "POST",
                url  : "get_datapegawai.php",
                dataType : "JSON",
                data : {"nip": nipnya},
                cache:false,
                success: function(data){
                    $.each(data,function(){
                        $("#namaabsensih").textbox('setValue',data.nama);
                    });                    
                    
                }
            });
            //return false;            
            
        }
        
        $('#kd_unitabsensihcari').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        /*
        $('#no_spkabsensihcari').combogrid({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        */
        function onSelectwilayahcari(){
            var kd_wilayah = $('#kd_wilayahabsensihcari').combobox('getValue');
            var url1 = 'get_up3cari.php[not_found]?kd_wilayah='+kd_wilayah;
            $('#kd_up3absensihcari').combobox('clear');
            $('#kd_up3absensihcari').combobox('reload',url1);
    	}
        function onSelectup3cari(){
            var kd_wilayah = $('#kd_wilayahabsensihcari').combobox('getValue');
            var kd_up3 = $('#kd_up3absensihcari').combobox('getValue');
            var url1 = 'get_unitcari.php[not_found]?kd_wilayah='+kd_wilayah+'&kd_up3='+kd_up3;
            $('#kd_unitabsensihcari').combobox('clear');
            $('#kd_unitabsensihcari').combobox('reload',url1);
            $('#kd_unitabsensihcari').combobox('setValue','semua');
    	}
        /*
        function onSelectspkcari(){
            var no_spknya = $('#no_spkabsensihcari').combogrid('getValues').join('|');
            alert(no_spknya);
            //var no_spknya = $('#no_spkabsensihcari').combogrid('getValues');
            var url1 = 'get_unitcari.php[not_found]?no_spk='+no_spknya;
            $('#kd_unitabsensihcari').combobox('clear');
            $('#kd_unitabsensihcari').combobox('reload',url1);
    	}
        */

        function onSelectregionabsensihcari(){
            var nilai1 = $('#kelompokabsensihcari').combobox('getValue');
            var nilai2 = $('#kd_regionabsensihcari').combobox('getValue');
            var nilai3 = $('#kd_cabangabsensihcari').combobox('getValue');
            //var kelompoknya = nilai1.replace(" ", "_");
            //var url1 = 'get_spkabsensihcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangcari.php[not_found]?kd_region='+nilai2;
            var url3 = 'get_unitcari.php[not_found]?kd_region='+nilai2;
            $('#kd_cabangabsensihcari').combobox('clear');
            $('#kd_cabangabsensihcari').combobox('reload',url2);
            $('#kd_cabangabsensihcari').combobox('setValue','000');

            $('#kd_unitabsensihcari').combobox('clear');
            $('#kd_unitabsensihcari').combobox('reload',url3);
            $('#kd_unitabsensihcari').combobox('setValue','semua');
            /*
            $('#no_spkabsensihcari').combogrid('clear');
            $('#no_spkabsensihcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkabsensihcari').combogrid('setValue','SEMUA');
            */
    	}
        
        function onSelectcabangabsensihcari(){
            var nilai1 = $('#kelompokabsensihcari').combobox('getValue');
            var nilai2 = $('#kd_regionabsensihcari').combobox('getValue');
            var nilai3 = $('#kd_cabangabsensihcari').combobox('getValue');
            //var url1 = 'get_spkabsensihcari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_unitcari.php[not_found]?kd_region='+nilai2+'&kd_cabang='+nilai3;

            $('#kd_unitabsensihcari').combobox('clear');
            $('#kd_unitabsensihcari').combobox('reload',url2);
            $('#kd_unitabsensihcari').combobox('setValue','semua');
            /*
            $('#no_spkabsensihcari').combogrid('clear');
            $('#no_spkabsensihcari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkabsensihcari').combogrid('setValue','SEMUA');
            */
    	}
        /*
        function reloadunit(){
            var nilai1 = $('#jenisabsensihcari').combobox('getValue');
            var nilai2 = $('#kd_projectabsensihcari').combobox('getValue');
            var url2 = 'get_unitabsensihcari.php?jenis='+nilai1+'&kd_project='+nilai2;
            //$('#kd_unitabsensihcari').combobox('enable');
            //$('#kd_unitabsensihcari').combobox('clear'); 
            $('#kd_unitabsensihcari').combogrid('clear');
            $('#kd_unitabsensihcari').combogrid('grid').datagrid('reload',url2);
    	}
        */
        function aksiabsensih(value,row,index){            
            var a = '<a href="javascript:void(0)" title="Update Data" onclick="editabsensih(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
            var b = '<a href="javascript:void(0)" title="Hapus Data" onclick="destroyabsensih(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-top:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';            
            return a+b;
        }  

		function cellStylerRow(value,absensih,index){
			if (absensih.statusabsensih == "1"){
                return 'background-color:red;color:white;';
			} else {
                return 'background-color:green;color:white;';
			}
		}

		function cellStyler(value,absensih,index){
			return 'vertical-align:middle;';
		}

        function formatrp2(val,absensih){
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

        function formatrp3(val,absensih){
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

        function formatrp4(val,absensih){
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
        function onSelectregionalabsensihcari(){
            var nilai1 = $('#kd_regionalabsensihcari').combobox('getValue');
            var url2 = 'get_unitabsensihcari.php?kd_regional='+nilai1;
            $('#kd_unitabsensihcari').combobox('enable');
            $('#kd_unitabsensihcari').combobox('clear'); 
            $('#kd_unitabsensihcari').combobox('reload',url2);
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
        $("#dgabsensih").datagrid();
    });
    </script>
    <table id="dgabsensih" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_absensih.php" pageSize="20"        
    		toolbar="#toolbarabsensih" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true" showFooter="true"
            >
    	<thead>
    		<tr>
    			<!-- <th rowspan="2" field="aksiabsensih" width="90" align="center" halign="center" data-options="formatter:aksiabsensih">Aksi</th> -->
    			<th rowspan="2" field="nipabsensih" width="120" align="center" halign="center">NIP</th>
    			<th rowspan="2" field="namaabsensih" width="200" align="left" halign="center">NAMA</th>
    			<th rowspan="2" field="jabatanabsensih" width="250" align="left" halign="center">JABATAN</th>
                <th rowspan="2" field="tgl_absen2absensih" width="110" align="center" halign="center">TANGGAL</th>
                <th colspan="4">ABSEN MASUK</th>
                <th colspan="4">ABSEN PULANG</th>
    			<th rowspan="2" field="durasiabsensih" width="100" align="center" halign="center">DURASI</th>
    			<th rowspan="2" field="status2absensih" width="100" align="center" halign="center">STATUS</th>
    		</tr>
            <tr>
    			<th field="jam_masukabsensih" width="80" align="center" halign="center">JAM</th>
    			<th field="lat_masukabsensih" width="140" align="center" halign="center">LATITUDE</th>
    			<th field="lon_masukabsensih" width="140" align="center" halign="center">LONGITUDE</th>
    			<th field="jarak_masuk2absensih" width="80" align="center" halign="center">JARAK</th>
    			<th field="jam_pulangabsensih" width="80" align="center" halign="center">JAM</th>
    			<th field="lat_pulangabsensih" width="140" align="center" halign="center">LATITUDE</th>
    			<th field="lon_pulangabsensih" width="140" align="center" halign="center">LONGITUDE</th>
    			<th field="jarak_pulang2absensih" width="80" align="center" halign="center">JARAK</th>
            </tr>
    	</thead>
    </table>
    <div id="toolbarabsensih">
    	<div id="tbabsensih" style="padding:3px">            
            <table>            
            <tr>   
                <td>TGL ABSEN</td>
                <td>
                    <input class="easyui-datebox" id="tanggalabsensihcari" name="tanggalabsensihcari" value="<?=date('Y-m-d');?>" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                </td>
                <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="nipabsensihcari" name="nipabsensihcari" data-options="required:false" style="width: 140px;">
                </td>
                <td>&nbsp;</td>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="false" iconCls="fa fa-search" onclick="doSearchabsensih()" style="min-width:90px;">Search</a>
                    <a href="#" class="easyui-linkbutton c1" plain="false" iconCls="fa fa-file-excel" onclick="downloadabsensi()">Download</a>
                </td>                
            </tr>
            </table>
    	</div>
    </div>
    
    <div id="dlgabsensih" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;"
    		closed="true" buttons="#dlg-buttonsabsensih">
    	<form id="fmabsensih" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor1"><label>NIP</label></div>
                            <input class="easyui-textbox" id="nipabsensih" name="nipabsensih" missingMessage="Harus di isi" data-options="onChange:getdatapegawai,required:true" style="width: 300px;" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Nama</label></div>
                            <input class="easyui-textbox" id="namaabsensih" name="namaabsensih" missingMessage="Harus di isi" data-options="required:true" style="width: 300px;" readonly>
                        </div>
                    </td>
                </tr>
                <!--
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Status</label></div>
                            <select id="statusabsensih" name="statusabsensih" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 300px;">
                                <option value="WFO">WFO</option>
                                <option value="WFH">WFH</option>
                            </select>                            
                        </div>
                    </td>
                </tr>
                -->
                <tr>
                    <td>
                        <div>
                            <div class="labelfor"><label>Tanggal</label></div>
                            <input class="easyui-datebox" id="tgl_absenabsensih" name="tgl_absenabsensih" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="margin-top:10px;">
                            <div><label style="color:#1E90FF;font-weight:bold;">Absen Masuk</label></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>                        
                        <table>
                            <tr>
                                <td>
                                    <div>
                                        <div class="labelfor"><label>Jam</label></div>
                                        <input class="easyui-timespinner" id="jam_masukabsensih" name="jam_masukabsensih" editable="true" data-options="required:true,showSeconds:false" style="width: 80px;">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="labelfor"><label>Latitude</label></div>
                                        <input class="easyui-textbox" id="lat_masukabsensih" name="lat_masukabsensih" missingMessage="Harus di isi" data-options="required:false" style="width: 105px;">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="labelfor"><label>Longitude</label></div>
                                        <input class="easyui-textbox" id="lon_masukabsensih" name="lon_masukabsensih" missingMessage="Harus di isi" data-options="required:false" style="width: 105px;">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="margin-top:10px;">
                            <div><label style="color:#1E90FF;font-weight:bold;">Absen Pulang</label></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <div>
                                        <div class="labelfor"><label>Jam</label></div>
                                        <input class="easyui-timespinner" id="jam_pulangabsensih" name="jam_pulangabsensih" editable="true" data-options="required:true,showSeconds:false" style="width: 80px;">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="labelfor"><label>Latitude</label></div>
                                        <input class="easyui-textbox" id="lat_pulangabsensih" name="lat_pulangabsensih" missingMessage="Harus di isi" data-options="required:false" style="width: 105px;">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="labelfor"><label>Longitude</label></div>
                                        <input class="easyui-textbox" id="lon_pulangabsensih" name="lon_pulangabsensih" missingMessage="Harus di isi" data-options="required:false" style="width: 105px;">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsabsensih">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="saveabsensih()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgabsensih').dialog('close')" style="min-width:90px">Batal</a>
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
        function addabsensih(){
            $('#dlgabsensih').dialog('open').dialog('setTitle','Buat Absensi');
            $('#fmabsensih').form('clear');
            $("#nipabsensih").textbox('readonly',false);
            url = '<?=$foldernya;?>save_absensih.php';  
        } 
        function editabsensih(index){
            var row = $('#dgabsensih').datagrid('getRow', index);
    		if (row){
                $('#dlgabsensih').dialog('open').dialog('setTitle','Update Absensi');
                $('#fmabsensih').form('clear');
    			$('#fmabsensih').form('load',row);  
                $("#nipabsensih").textbox('readonly',true);   
                url = '<?=$foldernya;?>update_absensih.php?id='+row.idabsensih;  
            }
        } 
    	function saveabsensih(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmabsensih').form('submit',{
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
                        $('#dlgabsensih').dialog('close');
                        $('#dgabsensih').datagrid('reload');
                    }
                }
            });
    	}

    	function destroyabsensih(index){ 
            var row = $('#dgabsensih').datagrid('getRow', index);
    		if (row){
                $.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
                    if (r){
                        $.post('<?=$foldernya;?>destroy_absensih.php',{id:row.idabsensih},function(result){
                            if (result.success){
                                $('#dgabsensih').datagrid('reload');
                            } else {
                                $.messager.alert('ERROR',result.errorMsg,'warning');
                            }
                        },'json');
                    }
                });
    		}
    	}

        function cetakabsensi(){
			var kelompoknya2 = $('#kelompokabsensihcari').combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
			var kd_regionnya = $('#kd_regionabsensihcari').combobox('getValue');
			var nama_regionnya = $('#kd_regionabsensihcari').combobox('getText');            
			var kd_cabangnya = $('#kd_cabangabsensihcari').combobox('getValue');
			var nama_cabangnya = $('#kd_cabangabsensihcari').combobox('getText');            
			var kd_unitnya = $('#kd_unitabsensihcari').combobox('getValue');
			var no_spknya = $('#no_spkabsensihcari').textbox('getText');
            var tanggalnya = $('#tanggalabsensihcari').datebox('getValue');
            //window.open("lapabsensih.php[not_found]?tanggal="+tanggalnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya+"&kd_unit="+kd_unitnya+"&nip_nama="+nip_namanya,"_blank");
            window.open("lapabsensih.php[not_found]?tanggal="+tanggalnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya+"&kd_unit="+kd_unitnya+"&no_spk="+no_spknya,"_blank");
        } 

        function downloadabsensi(){
            var kd_wilayah = $('#kd_wilayahabsensihcari').combobox('getValue');
            var kd_up3 = $('#kd_up3absensihcari').combobox('getValue');
            var kd_unit = $('#kd_unitabsensihcari').combobox('getValue');
            var tanggal = $('#tanggalabsensihcari').datebox('getValue');	
            var kd_unit = kd_unit.replace(",", "|");		
            window.open("download_absensih.php[not_found]?tanggal="+tanggal+"&kd_wilayah="+kd_wilayah+"&kd_up3="+kd_up3+"&kd_unit="+kd_unit,"_blank");
        } 

        $("#dgabsensih").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmabsensih{
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