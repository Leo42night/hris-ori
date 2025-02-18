<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    include "koneksi.php";
    include "koneksi_sipeg.php";
    $foldernya = "sipeg/"
    ?>
    <!--<script type="text/javascript" src="datagrid-filter.js"></script>-->
	<script type="text/javascript">                     
		function doSearchmcuti(){
            //kosongkan();
            $('#dgmcuti').datagrid('load',{                
                nipmcuticari: $('#nipmcuticari').textbox('getValue'),
			});                        
		}
        
        $('#kd_unitmcuticari').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        /*
        $('#no_spkmcuticari').combogrid({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        */
        function onSelectkelompokmcuticari(){
            var nilai1 = $('#kelompokmcuticari').combobox('getValue');
            var nilai2 = $('#kd_regionmcuticari').combobox('getValue');
            var nilai3 = $('#kd_cabangmcuticari').combobox('getValue');
            var url1 = 'get_spkmcuticari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
			/*
            $('#no_spkmcuticari').combogrid('clear');
            $('#no_spkmcuticari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkmcuticari').combogrid('setValue','SEMUA');
            */
    	}

        function onSelectregionmcuticari(){
            var nilai1 = $('#kelompokmcuticari').combobox('getValue');
            var nilai2 = $('#kd_regionmcuticari').combobox('getValue');
            var nilai3 = $('#kd_cabangmcuticari').combobox('getValue');
            //var kelompoknya = nilai1.replace(" ", "_");
            //var url1 = 'get_spkmcuticari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_cabangcari.php[not_found]?kd_region='+nilai2;
            var url3 = 'get_unitcari.php[not_found]?kd_region='+nilai2;
            $('#kd_cabangmcuticari').combobox('clear');
            $('#kd_cabangmcuticari').combobox('reload',url2);
            $('#kd_cabangmcuticari').combobox('setValue','000');

            $('#kd_unitmcuticari').combobox('clear');
            $('#kd_unitmcuticari').combobox('reload',url3);
            $('#kd_unitmcuticari').combobox('setValue','semua');
            /*
            $('#no_spkmcuticari').combogrid('clear');
            $('#no_spkmcuticari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkmcuticari').combogrid('setValue','SEMUA');
            */
    	}
        
        function onSelectcabangmcuticari(){
            var nilai1 = $('#kelompokmcuticari').combobox('getValue');
            var nilai2 = $('#kd_regionmcuticari').combobox('getValue');
            var nilai3 = $('#kd_cabangmcuticari').combobox('getValue');
            //var url1 = 'get_spkmcuticari.php?kelompok='+nilai1+'&kd_region='+nilai2+'&kd_cabang='+nilai3;
            var url2 = 'get_unitcari.php[not_found]?kd_region='+nilai2+'&kd_cabang='+nilai3;

            $('#kd_unitmcuticari').combobox('clear');
            $('#kd_unitmcuticari').combobox('reload',url2);
            $('#kd_unitmcuticari').combobox('setValue','semua');
            /*
            $('#no_spkmcuticari').combogrid('clear');
            $('#no_spkmcuticari').combogrid('grid').datagrid('reload',url1);
            $('#no_spkmcuticari').combogrid('setValue','SEMUA');
            */
    	}
        /*
        function reloadunit(){
            var nilai1 = $('#jenismcuticari').combobox('getValue');
            var nilai2 = $('#kd_projectmcuticari').combobox('getValue');
            var url2 = 'get_unitmcuticari.php?jenis='+nilai1+'&kd_project='+nilai2;
            //$('#kd_unitmcuticari').combobox('enable');
            //$('#kd_unitmcuticari').combobox('clear'); 
            $('#kd_unitmcuticari').combogrid('clear');
            $('#kd_unitmcuticari').combogrid('grid').datagrid('reload',url2);
    	}
        */
        function aksimcuti(value,row,index){
            var a = '<a href="javascript:void(0)" title="Update Data" onclick="editmcuti(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
            var b = '<a href="javascript:void(0)" title="Hapus Data" onclick="destroymcuti(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
            return a+b;
        }  

        function namajabatanmcuti(value,row,index){
            var a = row.namamcuti;
            a += '<br/><span style="font-size:10px !important;color:blue;">'+row.jabatanmcuti+'</span>';
            return a;
        }  

        function approvalmcuti(value,row,index){
            var a = '<div style="width:100%;padding-bottom:10px;">';
            a += '<table style="width:100%;">';
            a += '<tr>';
            a += '<td style="width:50px;border:none;">Level I</td>';
            a += '<td style="width:10px;border:none;">:</td>';
            a += '<td style="border:none;">';
            if(parseInt(row.approve1mcuti)===2){
                a += '<span style="color:blue;">Approved</span> ('+row.nama_approval1mcuti+')'
            } else if(parseInt(row.approve1mcuti)===1){
                a += '<span style="color:red;">Rejected</span> ('+row.nama_approval1mcuti+')'
                a += '<span style="color:red;">'+row.alasan_reject1mcuti+'</span>'
            } else {
                a += '<span style="">Menunggu Approval</span>'
            }
            a += '</td>';
            a += '</tr>';
            a += '<tr>';
            a += '<td style="border:none;">Level II</td>';
            a += '<td style="border:none;">:</td>';
            a += '<td style="border:none;">';
            if(parseInt(row.approve2mcuti)===2){
                a += '<span style="color:blue;">Approved</span> ('+row.nama_approval2mcuti+')'
            } else if(parseInt(row.approve2mcuti)===1){
                a += '<span style="color:red;">Rejected</span> ('+row.nama_approval2mcuti+')'
                a += '<span style="color:red;">'+row.alasan_reject2mcuti+'</span>'
            } else {
                a += '<span style="">Menunggu Approval</span>'
            }
            a += '</td>';
            a += '</tr>';
            a += '</table>';
            a += '</div>';
            return a;
        }
        
        function getdatapegawai(){
            var nipnya = $("#nipmcuti").textbox('getValue');
            //alert(nipnya);
            $.ajax({
                type : "POST",
                url  : "get_datapegawai.php",
                dataType : "JSON",
                data : {"nip": nipnya},
                cache:false,
                success: function(data){
                    //alert(data);
                    
                    $.each(data,function(){
                        //alert(data.namanya);
                        $("#namamcuti").textbox('setValue',data.namanya);
                        /*
                        $('[name="nama"]').val(data.nama);
                        $('[name="jabatan"]').val(data.jabatan);
                        $('[name="grade"]').val(data.grade);
                        $('#approval1').select2().val(data.approval1).trigger('change');
                        $('#approval2').select2().val(data.approval2).trigger('change');
                        $('#level_sppd').select2().val(data.level_sppd).trigger('change');
                        */
                    });                    
                    
                }
            });
            //return false;            
            
        }

		function cellStylerRow(value,mcuti,index){
			if (mcuti.statusmcuti == "1"){
                return 'background-color:red;color:white;';
			} else {
                return 'background-color:green;color:white;';
			}
		}

		function cellStyler(value,mcuti,index){
			return 'vertical-align:middle;';
		}

        function formatrp2(val,mcuti){
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

        function formatrp3(val,mcuti){
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

        function formatrp4(val,mcuti){
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
        function onSelectregionalmcuticari(){
            var nilai1 = $('#kd_regionalmcuticari').combobox('getValue');
            var url2 = 'get_unitmcuticari.php?kd_regional='+nilai1;
            $('#kd_unitmcuticari').combobox('enable');
            $('#kd_unitmcuticari').combobox('clear'); 
            $('#kd_unitmcuticari').combobox('reload',url2);
    	}
        */

		function styler1(value,row,index){
            return 'padding-top:10px;padding-bottom:3px;vertical-align: top;';
		}

		function styler2(value,row,index){
            return 'padding-top:0px;padding-bottom:3px;vertical-align: top;';
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
        $("#dgmcuti").datagrid({
            
        });
    });
    </script>
    <table id="dgmcuti" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_mcuti.php" pageSize="20"        
    		toolbar="#toolbarmcuti" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true" showFooter="true"
            >
    	<thead>
    		<tr>            
    			<!--<th rowspan="2" field="aksimcuti" width="90" align="center" halign="center" data-options="formatter:aksimcuti,styler:styler1">Aksi</th>-->
    			<th rowspan="2" field="nipmcuti" width="120" align="center" halign="center" data-options="">Nip</th>
    			<th rowspan="2" field="namamcuti" width="220" align="left" halign="center" data-options="">Nama</th>
    			<th rowspan="2" field="jabatanmcuti" width="250" align="left" halign="center" data-options="">Jabatan</th>
                <th colspan="2">Periode Hak Cuti</th>
                <th colspan="2">Hak Cuti (hari)</th>
    		</tr>
            <tr>
    			<th field="batas_awal2mcuti" width="100" align="center" halign="center" data-options="">Awal</th>
                <th field="batas_akhir2mcuti" width="100" align="center" halign="center" data-options="">Akhir</th>
                <th field="jumlah_cutimcuti" width="100" align="center" halign="center" data-options="">Terpakai</th>
                <th field="sisa_cutimcuti" width="50" align="center" halign="center" data-options="">Sisa</th>
            </tr>
    	</thead>
    </table>
    <div id="toolbarmcuti">
    	<div id="tbmcuti" style="padding:3px">            
            <table>
            <tr>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="nipmcuticari" name="nipmcuticari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchmcuti()" style="min-width:90px;">Search</a>
                    <!--<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus" onclick="addmcuti()" style="min-width:90px;">Pengajuan Cuti</a>-->
                </td>
            </tr>
            </table>
    	</div>
    </div>
    
    <div id="dlgmcuti" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsmcuti">
    	<form id="fmmcuti" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>            
                <tr>
                    <td colspan="2">
                        <span style="color:red;font-size:10.5px !important;">*) Untuk ijin sakit lebih dari 2 hari, wajib melampirkan surat keterangan dokter</span>
                    </td>                    
                </tr>
                <tr>
                    <td>NIP</td>                    
                    <td><input class="easyui-textbox" id="nipmcuti" name="nipmcuti" missingMessage="Harus di isi" data-options="onChange:getdatapegawai,required:true" style="width: 360px;"></td>
                </tr>
                <tr>
                    <td>Nama</td>                    
                    <td><input class="easyui-textbox" id="namamcuti" name="namamcuti" missingMessage="Harus di isi" data-options="required:true" style="width: 360px;" readonly></td>
                </tr>
                <tr>
                    <td class="nowrap">Jenis Izin</td>
                    <td>
                        <select id="jenis_ijinmcuti" name="jenis_ijinmcuti" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 360px;">
                            <option value="Ijin Sakit">Ijin Sakit</option>
                            <option value="Ijin Lainnya">Ijin Lainnya</option>                            
                        </select>                            
                    </td>
                </tr>
                <tr>
                    <td>Awal</td>                    
                    <td>
                        <input class="easyui-datebox" id="tgl_awalmcuti" name="tgl_awalmcuti" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                    </td>
                </tr>
                <tr>
                    <td>Akhir</td>                    
                    <td>
                        <input class="easyui-datebox" id="tgl_akhirmcuti" name="tgl_akhirmcuti" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 110px;">
                    </td>
                </tr>
                <tr>
                    <td>Lama</td>                    
                    <td><input class="easyui-numberbox" id="harimcuti" name="harimcuti" missingMessage="Harus di isi" data-options="required:true,min:0" style="width: 40px;"> &nbsp;hari</td>
                </tr>
                <tr>
                    <td style="vertical-align:top;padding-top:5px;">Alasan Izin</td>                    
                    <td><input class="easyui-textbox" id="alasan_ijinmcuti" name="alasan_ijinmcuti" missingMessage="Harus di isi" data-options="required:true,multiline:true" style="width: 360px;height:40px;"></td>
                </tr>
                <tr>
                    <td style="vertical-align:top;padding-top:5px;">Surat Dokter</td>
                    <td style="vertical-align:top;">
                        <table>
                            <tr>
                                <td style="vertical-align:top;">                                
                                    <input type="hidden" id="extmcuti" name="extmcuti">
                                    <img id="evidenmcuti" src="" style="width:100px;height:100px">
                                    <div style="display:none">
                                        <input class="easyui-filebox" id="evidenmcuti2" name="evidenmcuti2" style="width:100px" data-options="
                                            prompt:'Choose a file...',
                                            onChange: function(value){
                                                var f = $(this).next().find('input[type=file]')[0];
                                                if (f.files && f.files[0]){
                                                    var name = $(this).filebox('getValue');
                                                    var ss = name.split('.');
                                                    var ext = ss.pop();
                                                    if(ext=='jpg' || ext=='jpeg' || ext=='png'){
                                                        $('#extmcuti').val(ext);
                                                    } else {
                                                        $('#extmcuti').val('');
                                                    }
                                                    var reader = new FileReader();
                                                    reader.onload = function(e){
                                                        if(ext=='jpg' || ext=='jpeg' || ext=='png'){
                                                            $('#evidenmcuti').attr('src', e.target.result);
                                                        } else {
                                                            $('#evidenmcuti').attr('src', '');
                                                        }
                                                    }
                                                    reader.readAsDataURL(f.files[0]);
                                                }
                                            }">                                    
                                    </div>                                
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
    	</form>
        <script>
            $('#evidenmcuti').click(function(){
                $('#evidenmcuti2').next().find('.textbox-value')[0].click();
            });
        </script>

    </div>
    <div id="dlg-buttonsmcuti">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savemcuti()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgmcuti').dialog('close')" style="min-width:90px">Batal</a>
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
        function addmcuti(){
            $('#dlgmcuti').dialog('open').dialog('setTitle','Input Izin Pegawai');
            $('#fmmcuti').form('clear');
            $("#nipmcuti").textbox('readonly',false);
            $("#evidenmcuti").attr('src', "");
            url = 'save_mcuti.php';  
        } 
        function editmcuti(index){
            var row = $('#dgmcuti').datagrid('getRow', index);
    		if (row){
                $('#dlgmcuti').dialog('open').dialog('setTitle','Update Izin Pegawai');
                $('#fmmcuti').form('clear');
    			$('#fmmcuti').form('load',row);   
                $("#nipmcuti").textbox('readonly',true);
                $("#evidenmcuti").attr('src', row.evidenmcuti);
                url = 'update_mcuti.php?id='+row.idmcuti;  
            }
        } 
    	function savemcuti(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmmcuti').form('submit',{
                url: url,
                onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
                },
                success: function(result){
                    alert(result);
                    $.messager.progress('close');
                    var result = eval('(' + result + ')');
                    if (result.errorMsg){
                        $.messager.alert('ERROR',result.errorMsg,'warning');
                        /*
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                        */
                    } else {
                        $('#dlgmcuti').dialog('close');
                        $('#dgmcuti').datagrid('reload');
                    }
                }
            });
    	}

        function cetakabsensi(){
			var kelompoknya2 = $('#kelompokmcuticari').combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
			var kd_regionnya = $('#kd_regionmcuticari').combobox('getValue');
			var nama_regionnya = $('#kd_regionmcuticari').combobox('getText');            
			var kd_cabangnya = $('#kd_cabangmcuticari').combobox('getValue');
			var nama_cabangnya = $('#kd_cabangmcuticari').combobox('getText');            
			var kd_unitnya = $('#kd_unitmcuticari').combobox('getValue');
			var no_spknya = $('#no_spkmcuticari').textbox('getText');
            var tanggalnya = $('#tanggalmcuticari').datebox('getValue');
            //window.open("lapmcuti.php?tanggal="+tanggalnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya+"&kd_unit="+kd_unitnya+"&nip_nama="+nip_namanya,"_blank");
            window.open("lapmcuti.php?tanggal="+tanggalnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya+"&kd_unit="+kd_unitnya+"&no_spk="+no_spknya,"_blank");
        } 

        function downloadabsensi(){
			var kelompoknya2 = $('#kelompokmcuticari').combobox('getValue');
            var kelompoknya = kelompoknya2.replace(" ", "_");
			var kd_regionnya = $('#kd_regionmcuticari').combobox('getValue');
			var nama_regionnya = $('#kd_regionmcuticari').combobox('getText');            
			var kd_cabangnya = $('#kd_cabangmcuticari').combobox('getValue');
			var nama_cabangnya = $('#kd_cabangmcuticari').combobox('getText');            
			var kd_unitnya = $('#kd_unitmcuticari').combobox('getValue');
			var no_spknya = $('#no_spkmcuticari').textbox('getText');
            var tanggalnya = $('#tanggalmcuticari').datebox('getValue');
            window.open("download_mcuti.php?tanggal="+tanggalnya+"&kelompok="+kelompoknya+"&kd_region="+kd_regionnya+"&kd_cabang="+kd_cabangnya+"&kd_unit="+kd_unitnya+"&no_spk="+no_spknya,"_blank");
        } 

        $("#dgmcuti").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmmcuti{
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
    </style>
<?php
}
?>