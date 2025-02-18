<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    include "koneksi.php";
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
		function doSearchpembicara(){
            $('#dgpembicara').datagrid('load',{
				namapembicaracari: $('#namapembicaracari').textbox('getValue')
			});
		}
        function aksipembicara(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editpembicara(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroypembicara(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsipembicara(){
            var nilai1 = $('#id_provinsipembicara').combobox('getValue');
            var url1 = 'get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatenpembicara').combobox('enable');
            $('#id_kabupatenpembicara').combobox('clear'); 
            $('#id_kabupatenpembicara').combobox('reload',url1);
    	}

        function onselectnippembicara(){
			var nipnya = $('#nip_pembicara').combobox('getValue');            
			$.ajax({
				type: 'POST',
				url: 'get_jabatan_pembicara.php',
				data: {'nip':nipnya},
				success: function(result){
					//alert(result);
					var result = eval('('+result+')');
					$("#jabatan_pembicara").textbox('setValue',result.jabatan);
				}
			});
			
    	}		

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#kode_diklatpembicara').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenpembicara').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#kode_diklatpembicara').combobox({
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
        $('#id_kabupatenpembicara').combobox({
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
        $("#dgpembicara").datagrid({
        });
    });
    </script>
    <table id="dgpembicara" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_pembicara.php?nip=<?=$nip;?>" pageSize="20"        
    		toolbar="#toolbarpembicara" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksipembicara" width="80" align="center" halign="center" data-options="formatter:aksipembicara,styler:styler1">Aksi</th>
                <th field="start_date2pembicara" width="100" align="center" halign="center" data-options="styler:styler1">Start<br/>Date</th>
                <th field="end_date2pembicara" width="100" align="center" halign="center" data-options="styler:styler1">End<br/>Date</th>
    			<th field="judul_acarapembicara" width="200" align="center" halign="center" data-options="styler:styler1">Acara/Tema</th>
    			<th field="penyelenggaraanpembicara" width="200" align="center" halign="center" data-options="styler:styler1">Penyelengaraan</th>
    			<th field="lokasipembicara" width="200" align="center" halign="center" data-options="styler:styler1">Lokasi</th>
    			<th field="pesertapembicara" width="200" align="center" halign="center" data-options="styler:styler1">Peserta</th>
    			<th field="tingkat_acara2pembicara" width="200" align="center" halign="center" data-options="styler:styler1">Tingkat Acara</th>
    			<th field="kode_dahan_profesipembicara" width="200" align="center" halign="center" data-options="styler:styler1">Kode Dahan<br/>Profesi</th>
    			<th field="dahan_profesipembicara" width="200" align="center" halign="center" data-options="styler:styler1">Dahan Profesi</th>
    			<th field="kode_diklat2pembicara" width="200" align="center" halign="center" data-options="styler:styler1">Kode Diklat</th>
    			<th field="judul_diklatpembicara" width="200" align="center" halign="center" data-options="styler:styler1">Judul Diklat</th>
    			<th field="udiklat2pembicara" width="200" align="center" halign="center" data-options="styler:styler1">Udiklat</th>
    			<th field="jenis_pelaksanaan2pembicara" width="200" align="center" halign="center" data-options="styler:styler1">Jenis Pelaksanaan</th>
    			<th field="jenis_sertifikasi2pembicara" width="200" align="center" halign="center" data-options="styler:styler1">Jenis Sertifikat</th>
    			<th field="sifat_diklat2pembicara" width="200" align="center" halign="center" data-options="styler:styler1">Sifat Diklat</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarpembicara" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addpembicara()" style="min-width:90px;">Tambah</a>
        <!--<a target="_blank" href="template/template_pembicara.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template pembicara</a>-->
        <a class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template pembicara</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatepembicara()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatepembicara" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatepembicara">
    	<form id="fmtemplatepembicara" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template pembicara</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatepembicara" name="file_templatepembicara" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatepembicara">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatepembicara()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatepembicara').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgpembicara" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonspembicara">
    	<form id="fmpembicara" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <!--<tr><td colspan="5"><span style="font-weight:bold;">Data Utama</span></td></tr>-->
            <tr>
                <td style="width:110px;">No Induk</td>
                <td><input class="easyui-textbox" id="nippembicara" name="nippembicara" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;" readonly></td>
                <td style="width:10px;"></td>
                <td style="width:100px;"></td>
            </tr>  
            <tr>
                <td>Start Date</td>
                <td><input class="easyui-datebox" id="start_datepembicara" name="start_datepembicara" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td style="width:10px;"></td>
                <td>End Date</td>
                <td><input class="easyui-datebox" id="end_datepembicara" name="end_datepembicara" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Judul Acara</td>
                <td colspan="4"><input class="easyui-textbox" id="judul_acarapembicara" name="judul_acarapembicara" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Penyelenggaraan</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="kode_penyelenggaraanpembicara"
                        name="kode_penyelenggaraanpembicara" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_jenis_penyelenggaraan.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Lokasi</td>
                <td colspan="4"><input class="easyui-textbox" id="lokasipembicara" name="lokasipembicara" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Peserta</td>
                <td><input class="easyui-textbox" id="pesertapembicara" name="pesertapembicara" data-options="required:false" style="width: 150px;"></td>
                <td style="width:10px;"></td>
                <td>Tingkat Acara</td>
                <td>
                    <input class="easyui-combobox"
                        id="tingkat_acarapembicara"
                        name="tingkat_acarapembicara" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_tingkat_acara.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Dahan Profesi</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="kode_dahan_profesipembicara"
                        name="kode_dahan_profesipembicara" missingMessage="Harus di isi" editable="false"
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
                <td>Kode Diklat</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="kode_diklatpembicara"
                        name="kode_diklatpembicara" missingMessage="Harus di isi" editable="true"
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
                <td>Judul Diklat</td>
                <td colspan="4"><input class="easyui-textbox" id="judul_diklatpembicara" name="judul_diklatpembicara" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Udiklat</td>
                <td>
                    <input class="easyui-combobox"
                        id="udiklatpembicara"
                        name="udiklatpembicara" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_udiklat.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td></td>
                <td>Jenis Pelaksanaan</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenis_pelaksanaanpembicara"
                        name="jenis_pelaksanaanpembicara" missingMessage="Harus di isi" editable="false"
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
            </tr>  
            <tr>
                <td>Jenis Sertifikat</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenis_sertifikasipembicara"
                        name="jenis_sertifikasipembicara" missingMessage="Harus di isi" editable="false"
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
                <td></td>
                <td>Sifat Diklat</td>
                <td>
                    <input class="easyui-combobox"
                        id="sifat_diklatpembicara"
                        name="sifat_diklatpembicara" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_sifat_diklat.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonspembicara">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savepembicara()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgpembicara').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addpembicara(){
    		$('#dlgpembicara').dialog('open').dialog('setTitle','Input Riwayat Pembicara');
    		$('#fmpembicara').form('clear');
            $("#nippembicara").textbox('setValue','<?=$nip;?>');            
    		url = 'save_pembicara.php';
    	}
    	function editpembicara(index){
            var row = $('#dgpembicara').datagrid('getRow', index);
    		if (row){
                $('#dlgpembicara').dialog('open').dialog('setTitle','Update Riwayat Pembicara');
                $('#fmpembicara').form('clear');
    			$('#fmpembicara').form('load',row); 
                url = 'update_pembicara.php?id='+row.idpembicara;  
            } 
    	}
    	function savepembicara(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmpembicara').form('submit',{
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
                        $.post('updatedata/update_pembicara.php',{},function(result){},'json');
                        $('#dlgpembicara').dialog('close');
                        $('#dgpembicara').datagrid('reload');
                    }
                }
            });
    	}
    	function destroypembicara(index){
            var row = $('#dgpembicara').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('destroy_pembicara.php',{id:row.idpembicara},function(result){
    						if (result.success){
    							$('#dgpembicara').datagrid('reload');	// reload the user data
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

    	function uploadtemplatepembicara(){
    		$('#dlgtemplatepembicara').dialog('open').dialog('setTitle','Upoad Template Riwayat Pembicara');
            $('#fmtemplatepembicara').form('clear');
    		url = 'save_templatepembicara.php';
    	}
    	function savetemplatepembicara(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatepembicara').form('submit',{
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
                        $.post('updatedata/update_pembicara.php',{},function(result){},'json');
    					$('#dlgtemplatepembicara').dialog('close');
    					$('#dgpembicara').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgpembicara").height($(window).height() - 0);
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