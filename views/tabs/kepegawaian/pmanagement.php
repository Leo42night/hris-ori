<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/kepegawaian/"
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
		function doSearchpmanagement(){
            $('#dgpmanagement').datagrid('load',{
				nama_posisipmanagementcari: $('#nama_posisipmanagementcari').textbox('getValue')
			});
		}
        function aksipmanagement(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editpmanagement(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroypmanagement(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsipmanagement(){
            var nilai1 = $('#id_provinsipmanagement').combobox('getValue');
            var url1 = '<?=$foldernya;?>get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatenpmanagement').combobox('enable');
            $('#id_kabupatenpmanagement').combobox('clear'); 
            $('#id_kabupatenpmanagement').combobox('reload',url1);
    	}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#id_provinsipmanagement').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenpmanagement').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#id_provinsipmanagement').combobox({
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
        $('#id_kabupatenpmanagement').combobox({
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
        $("#dgpmanagement").datagrid({
        });
    });
    </script>
    <table id="dgpmanagement" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_pmanagement.php" pageSize="20"        
    		toolbar="#toolbarpmanagement" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksipmanagement" width="80" align="center" halign="center" data-options="formatter:aksipmanagement,styler:styler1">Aksi</th>
    			<th field="kode_posisipmanagement" width="110" align="left" halign="center" data-options="styler:styler1">Kode Posisi</th>
    			<th field="nama_posisipmanagement" width="180" align="left" halign="center" data-options="styler:styler1">Nama Posisi</th>
    			<th field="statuspmanagement" width="100" align="center" halign="center" data-options="styler:styler1">Status</th>
    			<th field="start_date2pmanagement" width="140" align="center" halign="center" data-options="styler:styler1">Start Date</th>
    			<th field="end_date2pmanagement" width="140" align="center" halign="center" data-options="styler:styler1">End Date</th>
    			<th field="nippmanagement" width="140" align="center" halign="center" data-options="styler:styler1">NIP</th>
    			<th field="job_keypmanagement" width="140" align="center" halign="center" data-options="styler:styler1">Job Key</th>
    			<th field="job_levelpmanagement" width="140" align="center" halign="center" data-options="styler:styler1">Job levl</th>
    			<th field="ftkpmanagement" width="50" align="center" halign="center" data-options="styler:styler1">FTK</th>
    			<th field="posisi_kunci2pmanagement" width="140" align="center" halign="center" data-options="styler:styler1">Posisi Kunci</th>
    			<th field="kode_posisi_atasanpmanagement" width="140" align="center" halign="center" data-options="styler:styler1">Kode Posisi<br/>Atasan Langsung</th>
    			<th field="nama_posisi_atasanpmanagement" width="140" align="center" halign="center" data-options="styler:styler1">Nama Posisi<br/>Atasan Langsung</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarpmanagement" style="background-color:#fff;padding:5px;">
    	<div id="tbpegawai" style="padding:3px">
            <table>
            <tr>
                <td style="padding-right:5px;">NIP/NAMA</td>
                <td style="padding-right:10px;">
                    <input class="easyui-textbox" id="nama_posisipmanagementcari" name="nama_posisipmanagementcari" data-options="required:false,prompt:'search'" style="width: 160px;">
                </td>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchpmanagement()" style="min-width:90px;">Search</a>
                </td>
            </tr>
            </table>
    	</div>        
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addpmanagement()" style="min-width:90px;">Tambah</a>
        <a target="_blank" href="template/template_pmanagement.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Download Template</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatepmanagement()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatepmanagement" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatepmanagement">
    	<form id="fmtemplatepmanagement" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template pmanagement</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatepmanagement" name="file_templatepmanagement" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatepmanagement">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatepmanagement()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatepmanagement').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgpmanagement" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonspmanagement">
    	<form id="fmpmanagement" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            
            <table>
            <tr>
                <td style="width:250px;">
                    <div style="margin-bottom:5px;">
                        <label for="kode_posisipmanagement" style="">Kode Posisi</label>
                        <input class="easyui-textbox" id="kode_posisipmanagement" name="kode_posisipmanagement" missingMessage="Harus di isi" data-options="required:true" style="width:100%;">
                    </div>				
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td style="width:250px;">
                    <div style="margin-bottom:5px;">
                        <label for="statuspmanagement" style="">Status</label>
                        <select id="statuspmanagement" name="statuspmanagement" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 100%;">
                        <option value="Active" selected>Active</option>
                        <option value="Inactive">Inactive</option>
                        </select>                            
                    </div>				
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div style="margin-bottom:5px;">
                        <label for="nama_posisipmanagement" style="">Nama Posisi</label>
                        <input class="easyui-textbox" id="nama_posisipmanagement" name="nama_posisipmanagement" missingMessage="Harus di isi" data-options="required:true" style="width:100%;">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label for="start_datepmanagement" style="">Start Date</label>
                        <input class="easyui-datebox" id="start_datepmanagement" name="start_datepmanagement" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>				
                </td>
                <td>&nbsp;</td>
                <td>
                    <div style="margin-bottom:5px;">
                        <label for="end_datepmanagement" style="">End Date</label>
                        <input class="easyui-datebox" id="end_datepmanagement" name="end_datepmanagement" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>				
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label for="nippmanagement" style="">NIP</label>
                        <input class="easyui-textbox" id="nippmanagement" name="nippmanagement" missingMessage="Harus di isi" data-options="required:false" style="width:100%;">
                    </div>				
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td>
                    <div style="margin-bottom:5px;">
                        <label for="ftkpmanagement" style="">FTK</label>
                        <input class="easyui-numberbox" id="ftkpmanagement" name="ftkpmanagement" missingMessage="Harus di isi" data-options="required:true,min:1" style="width:100%;">
                    </div>				
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div style="margin-bottom:5px;">
                        <label for="job_keypmanagement" style="">Job Key</label>
                        <input class="easyui-textbox" id="job_keypmanagement" name="job_keypmanagement" missingMessage="Harus di isi" data-options="required:false" style="width:100%;">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div style="margin-bottom:5px;">
                        <label for="job_levelpmanagement" style="">Job Level</label>
                        <input class="easyui-textbox" id="job_levelpmanagement" name="job_levelpmanagement" missingMessage="Harus di isi" data-options="required:true" style="width:100%;">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label for="posisi_kuncipmanagement" style="">Posisi Kunci</label>
                        <input class="easyui-combobox"
                            id="posisi_kuncipmanagement"
                            name="posisi_kuncipmanagement" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_posisi_kunci.php',                           
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'auto'
                        ">
                    </div>				
                </td>
                <td>&nbsp;</td>
                <td>
                    <div style="margin-bottom:5px;">
                        <label for="kode_posisi_atasanpmanagement" style="">Kode Posisi Atasan Langsung</label>
                        <input class="easyui-textbox" id="kode_posisi_atasanpmanagement" name="kode_posisi_atasanpmanagement" missingMessage="Harus di isi" data-options="required:true" style="width:100%;">
                    </div>				
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div style="margin-bottom:5px;">
                        <label for="nama_posisi_atasanpmanagement" style="">Nama Posisi Atasan Langsung</label>
                        <input class="easyui-textbox" id="nama_posisi_atasanpmanagement" name="nama_posisi_atasanpmanagement" missingMessage="Harus di isi" data-options="required:true" style="width:100%;">
                    </div>
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonspmanagement">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savepmanagement()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgpmanagement').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addpmanagement(){
    		$('#dlgpmanagement').dialog('open').dialog('setTitle','Input Data Position Management');
    		$('#fmpmanagement').form('clear');
            $("#end_datepmanagement").datebox('setValue','9999-12-31');
            $("#ftkpmanagement").textbox('setValue',1);
            $("#statuspmanagement").combobox('setValue','Active');
    		url = '<?=$foldernya;?>save_pmanagement.php';
    	}
    	function editpmanagement(index){
            var row = $('#dgpmanagement').datagrid('getRow', index);
    		if (row){
                $('#dlgpmanagement').dialog('open').dialog('setTitle','Update Data Position Management');
                $('#fmpmanagement').form('clear');
    			$('#fmpmanagement').form('load',row);                 
                url = '<?=$foldernya;?>update_pmanagement.php?id='+row.idpmanagement;  
            }          
    	}
    	function savepmanagement(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmpmanagement').form('submit',{
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
                        $.post('<?=$foldernya;?>update_pmanagement.php',{},function(result){},'json');
                        $('#dlgpmanagement').dialog('close');
                        $('#dgpmanagement').datagrid('reload');
                    }
                }
            });
    	}
    	function destroypmanagement(index){
            var row = $('#dgpmanagement').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_pmanagement.php',{id:row.idpmanagement},function(result){
    						if (result.success){
    							$('#dgpmanagement').datagrid('reload');	// reload the user data
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

    	function uploadtemplatepmanagement(){
    		$('#dlgtemplatepmanagement').dialog('open').dialog('setTitle','Upoad Template Position Management');
            $('#fmtemplatepmanagement').form('clear');
    		url = '<?=$foldernya;?>save_templatepmanagement.php';
    	}
    	function savetemplatepmanagement(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatepmanagement').form('submit',{
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
                        $.post('<?=$foldernya;?>update_pmanagement.php',{},function(result){},'json');
    					$('#dlgtemplatepmanagement').dialog('close');
    					$('#dgpmanagement').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgpmanagement").height($(window).height() - 0);
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