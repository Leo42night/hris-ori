<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $nip = $_REQUEST['nip'];
    ?>
    <script>
        $.extend($.fn.tabs.methods,{
        	disableTab: function(jq, which){
        		return jq.each(function(){
        			var tab = $(this).tabs('getTab', which).panel('options').tab;
        			tab.addClass('tabs-disabled').unbind('.tabs');
        			tab.find('a.tabs-close').unbind('.tabs');
        		});
        	},
        	enableTab: function(jq, which){
        		return jq.each(function(){
        			var target = this;
        			var panel = $(target).tabs('getTab', which);
        			var tab = panel.panel('options').tab;
        			tab.removeClass('tabs-disabled').unbind('.tabs').bind('click.tabs', {p:panel}, function(e){
        				var index = $(target).tabs('getTabIndex', e.data.p);
        				$(target).tabs('select', index);
        			}).bind('contextmenu.tabs', {p:panel}, function(e){
        				var opts = $(target).tabs('options');
        				var index = $(target).tabs('getTabIndex', e.data.p);
        				opts.onContextMenu.call(target, e, e.data.p.panel('options').title, index);
        			});
        			tab.find('a.tabs-close').unbind('.tabs').bind('click.tabs', {p:panel}, function(e){
        				var index = $(target).tabs('getTabIndex', e.data.p);
        				$(target).tabs('close', index);
        				return false;
        			});
        		});
        	}
        });
        $.extend($.fn.combobox.defaults.inputEvents, {
			focus: function(e){
				var target = this;
				var len = $(target).val().length;
				setTimeout(function(){
					if (target.setSelectionRange){
						target.setSelectionRange(0, len);
					} else if (target.createTextRange){
						var range = target.createTextRange();
						range.collapse();
						range.moveEnd('character', len);
						range.moveStart('character', 0);
						range.select();
					}
				},0);
			}
		})   
        $.extend($.fn.validatebox.defaults.rules,{
        inList:{
                validator:function(value,param){
                        var c = $(param[0]);
                        var opts = c.combobox('options');
                        var data = c.combobox('getData');
                        var exists = false;
                        for(var i=0; i<data.length; i++){
                                if (value == data[i][opts.textField]){
                                    exists = true;
                                    break;
                                }
                        }
                        return exists;
                },
                message:'invalid value.'
            }
        });
    </script>

    <script type="text/javascript">                     
		function doSearchdiklat(){
            $('#dgdiklat').datagrid('load',{
				namadiklatcari: $('#namadiklatcari').textbox('getValue')
			});
		}
        function aksidiklat(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editdiklat(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroydiklat(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsidiklat(){
            var nilai1 = $('#id_provinsidiklat').combobox('getValue');
            var url1 = 'get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatendiklat').combobox('enable');
            $('#id_kabupatendiklat').combobox('clear'); 
            $('#id_kabupatendiklat').combobox('reload',url1);
    	}

        function onselectnipdiklat(){
			var nipnya = $('#nip_diklat').combobox('getValue');            
			$.ajax({
				type: 'POST',
				url: 'get_jabatan_diklat.php',
				data: {'nip':nipnya},
				success: function(result){
					//alert(result);
					var result = eval('('+result+')');
					$("#jabatan_diklat").textbox('setValue',result.jabatan);
				}
			});
			
    	}		

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#jenis_diklat').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#kode_diklat').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatendiklat').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#jenis_diklat').combobox({
            inputEvents: $.extend({}, $.fn.combogrid.defaults.inputEvents, {
                blur: function(e){
                    var target = e.data.target;
                    var rows = $(target).combobox('getData');
                    var vv = [];
                    $.map($(target).combobox('getValues'), function(v){
                        if (getRowIndex(target, v) >= 0){
                            vv.push(v);
                        }
                    });
                    $(target).combobox('setValues', vv);

                    function getRowIndex(target, value){
                        var state = $.data(target, 'combobox');
                        var opts = state.options;
                        var data = state.data;
                        for(var i=0; i<data.length; i++){
                            if (data[i][opts.idField] == value){
                                return i;
                            }
                        }
                        return -1;
                    }
                }
            })
        });
        $('#kode_diklat').combobox({
            inputEvents: $.extend({}, $.fn.combogrid.defaults.inputEvents, {
                blur: function(e){
                    var target = e.data.target;
                    var rows = $(target).combobox('getData');
                    var vv = [];
                    $.map($(target).combobox('getValues'), function(v){
                        if (getRowIndex(target, v) >= 0){
                            vv.push(v);
                        }
                    });
                    $(target).combobox('setValues', vv);

                    function getRowIndex(target, value){
                        var state = $.data(target, 'combobox');
                        var opts = state.options;
                        var data = state.data;
                        for(var i=0; i<data.length; i++){
                            if (data[i][opts.idField] == value){
                                return i;
                            }
                        }
                        return -1;
                    }
                }
            })
        });
        $('#id_kabupatendiklat').combobox({
            inputEvents: $.extend({}, $.fn.combogrid.defaults.inputEvents, {
                blur: function(e){
                    var target = e.data.target;
                    var rows = $(target).combobox('getData');
                    var vv = [];
                    $.map($(target).combobox('getValues'), function(v){
                        if (getRowIndex(target, v) >= 0){
                            vv.push(v);
                        }
                    });
                    $(target).combobox('setValues', vv);

                    function getRowIndex(target, value){
                        var state = $.data(target, 'combobox');
                        var opts = state.options;
                        var data = state.data;
                        for(var i=0; i<data.length; i++){
                            if (data[i][opts.idField] == value){
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
    $(function(){
        $("#dgdiklat").datagrid({
        });
    });
    </script>
    <table id="dgdiklat" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_diklat.php?nip=<?=$nip;?>" pageSize="20"        
    		toolbar="#toolbardiklat" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksidiklat" width="80" align="center" halign="center" data-options="formatter:aksidiklat,styler:styler1">Aksi</th>
                <th field="start_date2diklat" width="100" align="center" halign="center" data-options="styler:styler1">Start<br/>Date</th>
                <th field="end_date2diklat" width="100" align="center" halign="center" data-options="styler:styler1">End<br/>Date</th>
    			<th field="sifat_diklat2" width="160" align="center" halign="center" data-options="styler:styler1">Sifat Diklat</th>
    			<th field="kode_diklat2" width="250" align="center" halign="center" data-options="styler:styler1">Kode Diklat</th>
    			<th field="judul_diklat" width="450" align="left" halign="center" data-options="styler:styler1">Judul Diklat</th>
                <!--
    			<th field="tingkat_acara2diklat" width="200" align="center" halign="center" data-options="styler:styler1">Tingkat Acara</th>
    			<th field="kode_dahan_profesidiklat" width="200" align="center" halign="center" data-options="styler:styler1">Kode Dahan<br/>Profesi</th>
    			<th field="dahan_profesidiklat" width="200" align="center" halign="center" data-options="styler:styler1">Dahan Profesi</th>
    			<th field="kode_diklatdiklat" width="200" align="center" halign="center" data-options="styler:styler1">Kode Diklat</th>
    			<th field="judul_diklatdiklat" width="200" align="center" halign="center" data-options="styler:styler1">Judul Diklat</th>
    			<th field="udiklat2diklat" width="200" align="center" halign="center" data-options="styler:styler1">Udiklat</th>
    			<th field="jenis_pelaksanaan2diklat" width="200" align="center" halign="center" data-options="styler:styler1">Jenis Pelaksanaan</th>
    			<th field="jenis_sertifikasi2diklat" width="200" align="center" halign="center" data-options="styler:styler1">Jenis Sertifikat</th>
    			<th field="sifat_diklat2diklat" width="200" align="center" halign="center" data-options="styler:styler1">Sifat Diklat</th>
                -->
    		</tr>
    	</thead>
    </table>
    <div id="toolbardiklat" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="adddiklat()" style="min-width:90px;">Tambah</a>
        <a target="_blank" href="template/template_diklat.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template diklat</a>
        <!--<a class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template diklat</a>-->
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatediklat()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatediklat" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatediklat">
    	<form id="fmtemplatediklat" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template diklat</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatediklat" name="file_templatediklat" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatediklat">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatediklat()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatediklat').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgdiklat" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsdiklat">
    	<form id="fmdiklat" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <!--<tr><td colspan="5"><span style="font-weight:bold;">Data Utama</span></td></tr>-->
            <tr>
                <td style="width:110px;">No Induk</td>
                <td><input class="easyui-textbox" id="nipdiklat" name="nipdiklat" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;" readonly></td>
                <td style="width:10px;"></td>
                <td style="width:100px;"></td>
            </tr>  
            <tr>
                <td>Start Date</td>
                <td><input class="easyui-datebox" id="start_datediklat" name="start_datediklat" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td style="width:10px;"></td>
                <td>End Date</td>
                <td><input class="easyui-datebox" id="end_datediklat" name="end_datediklat" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Jenis Diklat</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="jenis_diklat"
                        name="jenis_diklat" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_jenis_diklat.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Kode Diklat</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="kode_diklat"
                        name="kode_diklat" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_kode_diklat.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td style="vertical-align:top;padding-top:5px;">Judul Diklat</td>
                <td colspan="4"><input class="easyui-textbox" id="judul_diklat" name="judul_diklat" data-options="required:false,multiline:true" style="width: 425px;height:40px;"></td>
            </tr>  
            <tr>
                <td>Penyelenggaraan</td>
                <td>
                    <input class="easyui-combobox"
                        id="penyelenggaraandiklat"
                        name="penyelenggaraandiklat" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_jenis_penyelenggaraan.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td style="width:10px;"></td>
                <td>Kode Profesi</td>
                <td>
                    <input class="easyui-combobox"
                        id="kode_profesidiklat"
                        name="kode_profesidiklat" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_profesi.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Level Profesiensi</td>
                <td>
                    <input class="easyui-combobox"
                        id="level_profesiensidiklat"
                        name="level_profesiensidiklat" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_level_profesiensi.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Nama Institusi</td>
                <td colspan="4"><input class="easyui-textbox" id="nama_institusidiklat" name="nama_institusidiklat" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Kota Institusi</td>
                <td>
                    <input class="easyui-combobox"
                        id="kota_institusidiklat"
                        name="kota_institusidiklat" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_kabupaten.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px;'
                    ">
                </td>
                <td></td>
                <td>Kota Lainnya</td>
                <td><input class="easyui-textbox" id="kota_lainnyadiklat" name="kota_lainnyadiklat" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Negara Institusi</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="negara_institusidiklat"
                        name="negara_institusidiklat" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_negara.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Lama Diklat</td>
                <td><input class="easyui-textbox" id="lama_diklat" name="lama_diklat" data-options="required:false" style="width: 150px;"></td>
                <td></td>
                <td>Satuan</td>
                <td>
                    <input class="easyui-combobox"
                        id="satuan_diklat"
                        name="satuan_diklat" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_satuan.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Nilai</td>
                <td><input class="easyui-textbox" id="nilaidiklat" name="nilaidiklat" data-options="required:false" style="width: 150px;"></td>
                <td style="width:10px;"></td>
                <td>Grade Nilai</td>
                <td><input class="easyui-textbox" id="grade_nilaidiklat" name="grade_nilaidiklat" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Jenis Pelaksanaan</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenis_pelaksanaandiklat"
                        name="jenis_pelaksanaandiklat" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_jenis_pelaksanaan.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td></td>
                <td>Jenis Sertifikasi</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenis_sertifikasidiklat"
                        name="jenis_sertifikasidiklat" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_jenis_sertifikasi.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Sifat Diklat</td>
                <td>
                    <input class="easyui-combobox"
                        id="sifat_diklat"
                        name="sifat_diklat" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_sifat_diklat.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td></td>
                <td>Konfirmasi Kehadiran</td>
                <td><input class="easyui-textbox" id="konfirmasi_kehadirandiklat" name="konfirmasi_kehadirandiklat" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Keterangan Lulus</td>
                <td><input class="easyui-textbox" id="keterangan_lulusdiklat" name="keterangan_lulusdiklat" data-options="required:false" style="width: 150px;"></td>
                <td></td>
                <td>Kode Sertifikat</td>
                <td><input class="easyui-textbox" id="kode_sertifikatdiklat" name="kode_sertifikatdiklat" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Tanggal Terbit</td>
                <td><input class="easyui-datebox" id="tgl_terbitdiklat" name="tgl_terbitdiklat" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td style="width:10px;"></td>
                <td>Tanggal Selesai</td>
                <td><input class="easyui-datebox" id="tgl_selesaidiklat" name="tgl_selesaidiklat" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Udiklat</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="udiklatdiklat"
                        name="udiklatdiklat" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_udiklat.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Keterangan Realisasi</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="keterangan_realisasidiklat" name="keterangan_realisasidiklat" data-options="required:false" style="width: 425px;">
                </td>
            </tr>  
            <tr>
                <td>Keterangan Penyelesaian</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="keterangan_penyelesaiandiklat" name="keterangan_penyelesaiandiklat" data-options="required:false" style="width: 425px;">
                </td>
            </tr>  
            <tr>
                <td>Dahan Profesi</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="kode_dahan_profesidiklat"
                        name="kode_dahan_profesidiklat" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_dahan_profesi.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Kode Transaksi</td>
                <td colspan="4"><input class="easyui-textbox" id="kode_transaksidiklat" name="kode_transaksidiklat" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsdiklat">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savediklat()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgdiklat').dialog('close')" style="min-width:90px">Batal</a>
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
    	function adddiklat(){
    		$('#dlgdiklat').dialog('open').dialog('setTitle','Input Riwayat diklat');
    		$('#fmdiklat').form('clear');
            $("#nipdiklat").textbox('setValue','<?=$nip;?>');            
    		url = 'save_diklat.php';
    	}
    	function editdiklat(index){
            var row = $('#dgdiklat').datagrid('getRow', index);
    		if (row){
                $('#dlgdiklat').dialog('open').dialog('setTitle','Update Riwayat diklat');
                $('#fmdiklat').form('clear');
    			$('#fmdiklat').form('load',row); 
                url = 'update_diklat.php?id='+row.iddiklat;  
            } 
    	}
    	function savediklat(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmdiklat').form('submit',{
                url: url,
                onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
                },
                success: function(result){
                    $.messager.progress('close');
                    // alert(result);
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $.post('updatedata/update_diklat.php',{},function(result){},'json');
                        $('#dlgdiklat').dialog('close');
                        $('#dgdiklat').datagrid('reload');
                    }
                }
            });
    	}
    	function destroydiklat(index){
            var row = $('#dgdiklat').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('destroy_diklat.php',{id:row.iddiklat},function(result){
    						if (result.success){
    							$('#dgdiklat').datagrid('reload');	// reload the user data
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

    	function uploadtemplatediklat(){
    		$('#dlgtemplatediklat').dialog('open').dialog('setTitle','Upoad Template Riwayat diklat');
            $('#fmtemplatediklat').form('clear');
    		url = 'save_templatediklat.php';
    	}
    	function savetemplatediklat(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatediklat').form('submit',{
    			url: url,
    			onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
    			},
    			success: function(result){
                    $.messager.progress('close');
                    //alert(result);
    				if (result.errorMsg){
    					$.messager.show({
    						title: 'Error',
    						msg: result.errorMsg
    					});
    				} else {
                        $.post('updatedata/update_diklat.php',{},function(result){},'json');
    					$('#dlgtemplatediklat').dialog('close');
    					$('#dgdiklat').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgdiklat").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmuser{
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
    	.fitem{
    		margin-bottom:5px;
    	}
    	.fitem label{
    		display:inline-block;
    		width:100px;
    	}
    	.fitem input{
    		width:200px;
    	}
    </style>
<?php    
}
?>