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
		function doSearchsertifikat(){
            $('#dgsertifikat').datagrid('load',{
				namasertifikatcari: $('#namasertifikatcari').textbox('getValue')
			});
		}
        function aksisertifikat(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editsertifikat(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroysertifikat(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsisertifikat(){
            var nilai1 = $('#id_provinsisertifikat').combobox('getValue');
            var url1 = 'api/hxms-api/get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatensertifikat').combobox('enable');
            $('#id_kabupatensertifikat').combobox('clear'); 
            $('#id_kabupatensertifikat').combobox('reload',url1);
    	}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#kota_institusisertifikat').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#negara_institusisertifikat').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatensertifikat').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#kota_institusisertifikat').combobox({
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
        $('#negara_institusisertifikat').combobox({
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
        $('#id_kabupatensertifikat').combobox({
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
        $("#dgsertifikat").datagrid({
        });
    });
    </script>
    <table id="dgsertifikat" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$api_path?>get_master_sertifikat.php?nip=<?=$nip;?>" pageSize="20"        
    		toolbar="#toolbarsertifikat" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksisertifikat" width="80" align="center" halign="center" data-options="formatter:aksisertifikat,styler:styler1">Aksi</th>
                <th field="start_date2sertifikat" width="100" align="center" halign="center" data-options="styler:styler1">Start<br/>Date</th>
                <th field="end_date2sertifikat" width="100" align="center" halign="center" data-options="styler:styler1">End<br/>Date</th>
    			<th field="jenis_lembaga2sertifikat" width="160" align="center" halign="center" data-options="styler:styler1">Jenis Lembaga</th>
    			<th field="judul_sertifikasisertifikat" width="300" align="left" halign="center" data-options="styler:styler1">Judul Sertifikasi</th>
    			<th field="nama_institusisertifikat" width="200" align="center" halign="center" data-options="styler:styler1">Nama Institusi</th>
    			<th field="kota_institusisertifikat" width="200" align="center" halign="center" data-options="styler:styler1">Kota Institusi</th>
    			<th field="nama_level_profesiensisertifikat" width="140" align="center" halign="center" data-options="styler:styler1">Level Profesiensi</th>
    			<th field="lama_sertifikasisertifikat" width="100" align="center" halign="center" data-options="styler:styler1">Lama<br/>Sertifikasi</th>
    			<th field="satuan_sertifikasi2sertifikat" width="120" align="center" halign="center" data-options="styler:styler1">Satuan Lama<br/>Sertifikasi</th>
    			<th field="nilai_sertifikasisertifikat" width="120" align="center" halign="center" data-options="styler:styler1">Nilai<br/>Sertifikasi</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarsertifikat" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addsertifikat()" style="min-width:90px;">Tambah</a>
        <a target="_blank" href="template/template_sertifikat.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template sertifikat</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatesertifikat()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatesertifikat" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatesertifikat">
    	<form id="fmtemplatesertifikat" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template sertifikat</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatesertifikat" name="file_templatesertifikat" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatesertifikat">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatesertifikat()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatesertifikat').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgsertifikat" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonssertifikat">
    	<form id="fmsertifikat" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <!--<tr><td colspan="5"><span style="font-weight:bold;">Data Utama</span></td></tr>-->
            <tr>
                <td style="width:100px;">No Induk</td>
                <td><input class="easyui-textbox" id="nipsertifikat" name="nipsertifikat" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;" readonly></td>
                <td style="width:10px;">&nbsp;</td>
                <td style="width:100px;"></td>
            </tr>  
            <tr>
                <td>Start Date</td>
                <td><input class="easyui-datebox" id="start_datesertifikat" name="start_datesertifikat" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td></td>
                <td>End Date</td>
                <td><input class="easyui-datebox" id="end_datesertifikat" name="end_datesertifikat" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Jenis Lembaga</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="jenis_lembagasertifikat"
                        name="jenis_lembagasertifikat" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_jenis_lembaga.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Judul Sertifikasi</td>
                <td colspan="4"><input class="easyui-textbox" id="judul_sertifikasisertifikat" name="judul_sertifikasisertifikat" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>No Sertifikasi</td>
                <td colspan="4"><input class="easyui-textbox" id="no_sertifikasisertifikat" name="no_sertifikasisertifikat" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Kode Profesi Judul Sertifikasi</td>
                <td colspan="4"><input class="easyui-textbox" id="kode_profesi_sertifikasisertifikat" name="kode_profesi_sertifikasisertifikat" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Profesi Judul Sertifikasi</td>
                <td colspan="4"><input class="easyui-textbox" id="profesi_sertifikasisertifikat" name="profesi_sertifikasisertifikat" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Level Profesiensi</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="level_profesiensisertifikat"
                        name="level_profesiensisertifikat" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 425px;" 
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
                <td colspan="4"><input class="easyui-textbox" id="nama_institusisertifikat" name="nama_institusisertifikat" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>
            <tr>
                <td>Kota Institusi</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="kota_institusisertifikat"
                        name="kota_institusisertifikat" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_kabupaten.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">

                </td>
            </tr>  
            <tr>
                <td>Kota Institusi Sertifikasi</td>
                <td colspan="4"><input class="easyui-textbox" id="kota_institusi_sertifikasisertifikat" name="kota_institusi_sertifikasisertifikat" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>
            <tr>
                <td>Negara Institusi</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="negara_institusisertifikat"
                        name="negara_institusisertifikat" missingMessage="Harus di isi" editable="true"
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
                <td>Tanggal Mulai</td>
                <td><input class="easyui-datebox" id="tgl_mulaisertifikat" name="tgl_mulaisertifikat" editable="true" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td></td>
                <td>Tanggal Selesai</td>
                <td><input class="easyui-datebox" id="tgl_selesaisertifikat" name="tgl_selesaisertifikat" editable="true" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Nilai</td>
                <td><input class="easyui-textbox" id="nilai_sertifikasisertifikat" name="nilai_sertifikasisertifikat" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
                <td></td>
                <td>Level Sertifikasi</td>
                <td>
                    <input class="easyui-combobox"
                        id="level_sertifikasisertifikat"
                        name="level_sertifikasisertifikat" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_level_sertifikasi.php',
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>
            <tr>
                <td>Lama Sertifikasi</td>
                <td><input class="easyui-numberbox" id="lama_sertifikasisertifikat" name="lama_sertifikasisertifikat" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
                <td></td>
                <td>Satuan</td>
                <td>
                    <input class="easyui-combobox"
                        id="satuan_sertifikasisertifikat"
                        name="satuan_sertifikasisertifikat" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_satuan_sertifikasi.php',
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>
            <tr>
                <td>Tanggal Expire</td>
                <td><input class="easyui-datebox" id="tgl_expiresertifikat" name="tgl_expiresertifikat" editable="true" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td></td>
                <td>Kode Transaksi</td>
                <td><input class="easyui-datebox" id="kode_transaksisertifikat" name="kode_transaksisertifikat" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonssertifikat">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savesertifikat()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgsertifikat').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addsertifikat(){
    		$('#dlgsertifikat').dialog('open').dialog('setTitle','Input Data sertifikat');
    		$('#fmsertifikat').form('clear');
            $("#nipsertifikat").textbox('setValue','<?=$nip;?>');            
    		url = 'save_sertifikat.php';
    	}
    	function editsertifikat(index){
            var row = $('#dgsertifikat').datagrid('getRow', index);
    		if (row){
                $('#dlgsertifikat').dialog('open').dialog('setTitle','Update Data sertifikat');
                $('#fmsertifikat').form('clear');
    			$('#fmsertifikat').form('load',row); 
                url = 'update_sertifikat.php?id='+row.idsertifikat;  
            }          
    	}
    	function savesertifikat(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmsertifikat').form('submit',{
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
                        $.post('updatedata/update_sertifikat.php',{},function(result){},'json');
                        $('#dlgsertifikat').dialog('close');
                        $('#dgsertifikat').datagrid('reload');
                    }
                }
            });
    	}
    	function destroysertifikat(index){
            var row = $('#dgsertifikat').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('destroy_sertifikat.php',{id:row.idsertifikat},function(result){
    						if (result.success){
    							$('#dgsertifikat').datagrid('reload');	// reload the user data
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

    	function uploadtemplatesertifikat(){
    		$('#dlgtemplatesertifikat').dialog('open').dialog('setTitle','Upoad Template sertifikat');
            $('#fmtemplatesertifikat').form('clear');
    		url = 'save_templatesertifikat.php';
    	}
    	function savetemplatesertifikat(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatesertifikat').form('submit',{
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
                        $.post('updatedata/update_sertifikat.php',{},function(result){},'json');
    					$('#dlgtemplatesertifikat').dialog('close');
    					$('#dgsertifikat').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgsertifikat").height($(window).height() - 0);
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