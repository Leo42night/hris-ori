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
		function doSearchkeluarga(){
            $('#dgkeluarga').datagrid('load',{
				namakeluargacari: $('#namakeluargacari').textbox('getValue')
			});
		}
        function aksikeluarga(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editkeluarga(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroykeluarga(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsikeluarga(){
            var nilai1 = $('#id_provinsikeluarga').combobox('getValue');
            var url1 = 'api/hxms-api/get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatenkeluarga').combobox('enable');
            $('#id_kabupatenkeluarga').combobox('clear'); 
            $('#id_kabupatenkeluarga').combobox('reload',url1);
    	}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#id_provinsikeluarga').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenkeluarga').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#id_provinsikeluarga').combobox({
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
        $('#id_kabupatenkeluarga').combobox({
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
        $("#dgkeluarga").datagrid({
        });
    });
    </script>
    <table id="dgkeluarga" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$api_path?>get_master_keluarga.php?nip=<?=$nip;?>" pageSize="20"        
    		toolbar="#toolbarkeluarga" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksikeluarga" width="80" align="center" halign="center" data-options="formatter:aksikeluarga,styler:styler1">Aksi</th>
    			<th field="jenis_keluargakeluarga" width="110" align="left" halign="center" data-options="styler:styler1">Jenis keluarga</th>
    			<th field="namakeluarga" width="180" align="left" halign="center" data-options="styler:styler1">Nama</th>
    			<th field="jenis_kelamin2keluarga" width="100" align="center" halign="center" data-options="styler:styler1">Jenis<br/>Kelamin</th>
    			<th field="tempat_lahirkeluarga" width="140" align="center" halign="center" data-options="styler:styler1">Tempat Lahir</th>
                <th field="tgl_lahir2keluarga" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Lahir</th>
                <th field="npwpkeluarga" width="100" align="center" halign="center" data-options="styler:styler1">NPWP</th>
                <th field="no_bpjs_keskeluarga" width="100" align="center" halign="center" data-options="styler:styler1">Nomor BPJS<br/>Kesehatan</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarkeluarga" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addkeluarga()" style="min-width:90px;">Tambah</a>
        <a target="_blank" href="template/template_keluarga.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template keluarga</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatekeluarga()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatekeluarga" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatekeluarga">
    	<form id="fmtemplatekeluarga" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template Keluarga</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatekeluarga" name="file_templatekeluarga" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatekeluarga">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatekeluarga()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatekeluarga').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgkeluarga" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonskeluarga">
    	<form id="fmkeluarga" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <!--<tr><td colspan="5"><span style="font-weight:bold;">Data Utama</span></td></tr>-->
            <tr>
                <td style="width:100px;">No Induk</td>
                <td><input class="easyui-textbox" id="nipkeluarga" name="nipkeluarga" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;" readonly></td>
                <td style="width:10px;">&nbsp;</td>
                <td>Jenis keluarga</td>
                <td>
                    <input class="easyui-combobox"
                        id="id_jenis_keluargakeluarga"
                        name="id_jenis_keluargakeluarga" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_jenis_keluarga.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Start Date</td>
                <td><input class="easyui-datebox" id="start_datekeluarga" name="start_datekeluarga" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td></td>
                <td>End Date</td>
                <td><input class="easyui-datebox" id="end_datekeluarga" name="end_datekeluarga" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Urut</td>
                <td><input class="easyui-numberbox" id="no_urutkeluarga" name="no_urutkeluarga" missingMessage="Harus di isi" data-options="required:true,min:1" style="width: 60px;"></td>
                <td></td>
                <td>Jenis Kelamin</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenis_kelaminkeluarga"
                        name="jenis_kelaminkeluarga" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_jenis_kelamin.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Nama Lengkap</td>
                <td colspan="4"><input class="easyui-textbox" id="namakeluarga" name="namakeluarga" missingMessage="Harus di isi" data-options="required:true" style="width: 425px;"></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><input class="easyui-textbox" id="tempat_lahirkeluarga" name="tempat_lahirkeluarga" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;"></td>
                <td></td>
                <td>Tanggal Lahir</td>
                <td><input class="easyui-datebox" id="tgl_lahirkeluarga" name="tgl_lahirkeluarga" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Agama</td>
                <td>
                    <input class="easyui-combobox"
                        id="id_agamakeluarga"
                        name="id_agamakeluarga" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_agama.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
                <td></td>
                <td>Pekerjaan</td>
                <td>
                    <input class="easyui-combobox"
                        id="pekerjaankeluarga"
                        name="pekerjaankeluarga" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_pekerjaan.php',
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>
            <tr>
                <td>Bekerja di PLN Group</td>
                <td>
                    <select id="pln_groupkeluarga" name="pln_groupkeluarga" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 150px;">
                       <option value="TIDAK" selected>TIDAK</option>
                       <option value="YA">YA</option>
                    </select>                            
                </td>
            </tr>
            <tr>
                <td>Perusahaan</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="kode_perusahaankeluarga"
                        name="kode_perusahaankeluarga" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_perusahaan.php',
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'160px'
                    ">
                </td>
            </tr>
            <tr>
                <td>Nip keluarga</td>
                <td><input class="easyui-textbox" id="nip_keluargakeluarga" name="nip_keluargakeluarga" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
                <td></td>
                <td>Warganegara</td>
                <td>
                    <input class="easyui-combobox"
                        id="status_warganegarakeluarga"
                        name="status_warganegarakeluarga" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_status_warganegara.php',
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>
            <tr>
                <td>Jenis Alamat</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenis_alamatkeluarga"
                        name="jenis_alamatkeluarga" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150x;" 
                        data-options=" 
                            url:'get_jenis_alamat.php',
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td colspan="4"><input class="easyui-textbox" id="alamatkeluarga" name="alamatkeluarga" missingMessage="Harus di isi" data-options="required:true,multiline:true" style="width: 425px;height:40px;"></td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="id_provinsikeluarga"
                        name="id_provinsikeluarga" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            onSelect:onSelectprovinsikeluarga,
                            url:'get_provinsi.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>
            <tr>
                <td>Kab./Kota</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="id_kabupatenkeluarga"
                        name="id_kabupatenkeluarga" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>
            <tr>
                <td>Kode Pos</td>
                <td><input class="easyui-textbox" id="kode_poskeluarga" name="kode_poskeluarga" missingMessage="Harus di isi" data-options="required:true" style="width: 80px;"></td>
            </tr>
            <tr>
                <td>Nomor KK</td>
                <td><input class="easyui-textbox" id="no_kkkeluarga" name="no_kkkeluarga" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;"></td>
                <td></td>
                <td>nomor KTP</td>
                <td><input class="easyui-textbox" id="nikkeluarga" name="nikkeluarga" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>NPWP</td>
                <td><input class="easyui-textbox" id="npwpkeluarga" name="npwpkeluarga" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
                <td></td>
                <td>Telepon</td>
                <td><input class="easyui-textbox" id="teleponkeluarga" name="teleponkeluarga" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Gol Darah</td>
                <td>
                    <input class="easyui-combobox"
                        id="gol_darahkeluarga"
                        name="gol_darahkeluarga" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150x;" 
                        data-options=" 
                            url:'get_gol_darah.php',
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
                <td></td>
                <td>No BPJS Kes</td>
                <td><input class="easyui-textbox" id="no_bpjs_keskeluarga" name="no_bpjs_keskeluarga" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonskeluarga">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savekeluarga()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgkeluarga').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addkeluarga(){
    		$('#dlgkeluarga').dialog('open').dialog('setTitle','Input Data Keluarga');
    		$('#fmkeluarga').form('clear');
            $("#nipkeluarga").textbox('setValue','<?=$nip;?>');
            $("#end_datekeluarga").datebox('setValue','9999-12-31');
    		url = 'save_keluarga.php';
    	}
    	function editkeluarga(index){
            var row = $('#dgkeluarga').datagrid('getRow', index);
    		if (row){
                $('#dlgkeluarga').dialog('open').dialog('setTitle','Update Data keluarga');
                $('#fmkeluarga').form('clear');
    			$('#fmkeluarga').form('load',row); 
                $('#id_kabupatenkeluarga').combobox('reload','get_kabupaten.php?id_provinsi='+row.id_provinsikeluarga);
                url = 'update_keluarga.php?id='+row.idkeluarga;  
            }          
    	}
    	function savekeluarga(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmkeluarga').form('submit',{
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
                        $.post('updatedata/update_keluarga.php',{},function(result){},'json');
                        $('#dlgkeluarga').dialog('close');
                        $('#dgkeluarga').datagrid('reload');
                    }
                }
            });
    	}
    	function destroykeluarga(index){
            var row = $('#dgkeluarga').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data keluarga ini?',function(r){
    				if (r){
    					$.post('destroy_keluarga.php',{id:row.idkeluarga},function(result){
    						if (result.success){
    							$('#dgkeluarga').datagrid('reload');	// reload the user data
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

    	function uploadtemplatekeluarga(){
    		$('#dlgtemplatekeluarga').dialog('open').dialog('setTitle','Upoad Template keluarga');
            $('#fmtemplatekeluarga').form('clear');
    		url = 'save_templatekeluarga.php';
    	}
    	function savetemplatekeluarga(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatekeluarga').form('submit',{
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
                        $.post('updatedata/update_keluarga.php',{},function(result){},'json');
    					$('#dlgtemplatekeluarga').dialog('close');
    					$('#dgkeluarga').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgkeluarga").height($(window).height() - 0);
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