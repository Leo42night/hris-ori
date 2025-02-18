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
		function doSearchpendidikan(){
            $('#dgpendidikan').datagrid('load',{
				namapendidikancari: $('#namapendidikancari').textbox('getValue')
			});
		}
        function aksipendidikan(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editpendidikan(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroypendidikan(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsipendidikan(){
            var nilai1 = $('#id_provinsipendidikan').combobox('getValue');
            var url1 = 'get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatenpendidikan').combobox('enable');
            $('#id_kabupatenpendidikan').combobox('clear'); 
            $('#id_kabupatenpendidikan').combobox('reload',url1);
    	}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#kota_institusipendidikan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#kota_institusi_lainnyapendidikan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#negara_institusipendidikan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenpendidikan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#kota_institusipendidikan').combobox({
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
        $('#kota_institusi_lainnyapendidikan').combobox({
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
        $('#negara_institusipendidikan').combobox({
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
        $('#id_kabupatenpendidikan').combobox({
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
        $("#dgpendidikan").datagrid({
        });
    });
    </script>
    <table id="dgpendidikan" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_pendidikan.php?nip=<?=$nip;?>" pageSize="20"        
    		toolbar="#toolbarpendidikan" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksipendidikan" width="80" align="center" halign="center" data-options="formatter:aksipendidikan,styler:styler1">Aksi</th>
                <th field="start_date2pendidikan" width="100" align="center" halign="center" data-options="styler:styler1">Start<br/>Date</th>
                <th field="end_date2pendidikan" width="100" align="center" halign="center" data-options="styler:styler1">End<br/>Date</th>
    			<th field="keterangan_pendidikan2" width="160" align="center" halign="center" data-options="styler:styler1">Keterangan</th>
    			<th field="jenis_pendidikan2" width="160" align="left" halign="center" data-options="styler:styler1">Jenis Pendidikan</th>
    			<th field="jurusanpendidikan" width="140" align="center" halign="center" data-options="styler:styler1">Jurusan</th>
                <th field="kota_institusi2pendidikan" width="160" align="center" halign="center" data-options="styler:styler1">Kota Institusi</th>
    			<th field="nama_institusipendidikan" width="160" align="left" halign="center" data-options="styler:styler1">Nama Institusi</th>
    			<th field="lama_pendidikan2" width="140" align="center" halign="center" data-options="styler:styler1">Lama<br/>Pendidikan</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarpendidikan" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addpendidikan()" style="min-width:90px;">Tambah</a>
        <a target="_blank" href="template/template_pendidikan.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template pendidikan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatependidikan()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatependidikan" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatependidikan">
    	<form id="fmtemplatependidikan" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template pendidikan</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatependidikan" name="file_templatependidikan" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatependidikan">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatependidikan()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatependidikan').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgpendidikan" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonspendidikan">
    	<form id="fmpendidikan" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <!--<tr><td colspan="5"><span style="font-weight:bold;">Data Utama</span></td></tr>-->
            <tr>
                <td style="width:100px;">No Induk</td>
                <td><input class="easyui-textbox" id="nippendidikan" name="nippendidikan" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;" readonly></td>
                <td style="width:10px;">&nbsp;</td>
            </tr>  
            <tr>
                <td>Start Date</td>
                <td><input class="easyui-datebox" id="start_datependidikan" name="start_datependidikan" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td></td>
                <td>End Date</td>
                <td><input class="easyui-datebox" id="end_datependidikan" name="end_datependidikan" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Ket pendidikan</td>
                <td>
                    <input class="easyui-combobox"
                        id="keterangan_pendidikan"
                        name="keterangan_pendidikan" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_keterangan_pendidikan.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td>Jenis pendidikan</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenis_pendidikan"
                        name="jenis_pendidikan" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_jenis_pendidikan.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Jurusan</td>
                <td colspan="4"><input class="easyui-textbox" id="jurusanpendidikan" name="jurusanpendidikan" missingMessage="Harus di isi" data-options="required:true" style="width: 455px;"></td>
            </tr>
            <tr>
                <td>Nama Institusi</td>
                <td colspan="4"><input class="easyui-textbox" id="nama_institusipendidikan" name="nama_institusipendidikan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>
            <tr>
                <td>Kota Institusi</td>
                <td>
                    <input class="easyui-combobox"
                        id="kota_institusipendidikan"
                        name="kota_institusipendidikan" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_kabupaten.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td></td>
                <td>Kota Institusi Lainnya</td>
                <td>
                    <input class="easyui-combobox"
                        id="kota_institusi_lainnyapendidikan"
                        name="kota_institusi_lainnyapendidikan" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 150px;" 
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
                <td>Negara</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="negara_institusipendidikan"
                        name="negara_institusipendidikan" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 455px;" 
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
                <td>Lama Pendidikan</td>
                <td><input class="easyui-numberbox" id="lama_pendidikan" name="lama_pendidikan" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
                <td></td>
                <td>Satuan</td>
                <td>
                    <input class="easyui-combobox"
                        id="satuan_lama_pendidikan"
                        name="satuan_lama_pendidikan" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_satuan_pendidikan.php',
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
                <td><input class="easyui-numberbox" id="nilaipendidikan" name="nilaipendidikan" missingMessage="Harus di isi" data-options="required:false,min:0,precision:2" style="width: 150px;"></td>
            </tr>
            <tr>
                <td>Kode Transaksi</td>
                <td colspan="4"><input class="easyui-textbox" id="kode_transaksipendidikan" name="kode_transaksipendidikan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonspendidikan">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savependidikan()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgpendidikan').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addpendidikan(){
    		$('#dlgpendidikan').dialog('open').dialog('setTitle','Input Data Pendidikan');
    		$('#fmpendidikan').form('clear');
            $("#nippendidikan").textbox('setValue','<?=$nip;?>');            
    		url = 'save_pendidikan.php';
    	}
    	function editpendidikan(index){
            var row = $('#dgpendidikan').datagrid('getRow', index);
    		if (row){
                $('#dlgpendidikan').dialog('open').dialog('setTitle','Update Data Pendidikan');
                $('#fmpendidikan').form('clear');
    			$('#fmpendidikan').form('load',row); 
                url = 'update_pendidikan.php?id='+row.idpendidikan;  
            }          
    	}
    	function savependidikan(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmpendidikan').form('submit',{
                url: url,
                onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
                },
                success: function(result){
                    //alert(result);
                    $.messager.progress('close');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $.post('updatedata/update_pendidikan.php',{},function(result){},'json');
                        $('#dlgpendidikan').dialog('close');
                        $('#dgpendidikan').datagrid('reload');
                    }
                }
            });
    	}
    	function destroypendidikan(index){
            var row = $('#dgpendidikan').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('destroy_pendidikan.php',{id:row.idpendidikan},function(result){
    						if (result.success){
    							$('#dgpendidikan').datagrid('reload');	// reload the user data
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

    	function uploadtemplatependidikan(){
    		$('#dlgtemplatependidikan').dialog('open').dialog('setTitle','Upoad Template pendidikan');
            $('#fmtemplatependidikan').form('clear');
    		url = 'save_templatependidikan.php';
    	}
    	function savetemplatependidikan(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatependidikan').form('submit',{
    			url: url,
    			onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
    			},
    			success: function(result){
                    $.messager.progress('close');
                    alert(result);
    				if (result.errorMsg){
    					$.messager.show({
    						title: 'Error',
    						msg: result.errorMsg
    					});
    				} else {
                        $.post('updatedata/update_pendidikan.php',{},function(result){},'json');
    					$('#dlgtemplatependidikan').dialog('close');
    					$('#dgpendidikan').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgpendidikan").height($(window).height() - 0);
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