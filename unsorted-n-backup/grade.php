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
		function doSearchgrade(){
            $('#dggrade').datagrid('load',{
				namagradecari: $('#namagradecari').textbox('getValue')
			});
		}
        function aksigrade(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editgrade(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroygrade(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsigrade(){
            var nilai1 = $('#id_provinsigrade').combobox('getValue');
            var url1 = 'api/hxms-api/get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatengrade').combobox('enable');
            $('#id_kabupatengrade').combobox('clear'); 
            $('#id_kabupatengrade').combobox('reload',url1);
    	}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#negara_institusigrade').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatengrade').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#negara_institusigrade').combobox({
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
        $('#id_kabupatengrade').combobox({
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
        $("#dggrade").datagrid({
        });
    });
    </script>
    <table id="dggrade" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$api_path?>get_master_grade.php?nip=<?=$nip;?>" pageSize="20"        
    		toolbar="#toolbargrade" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksigrade" width="80" align="center" halign="center" data-options="formatter:aksigrade,styler:styler1">Aksi</th>
                <th field="start_date2grade" width="100" align="center" halign="center" data-options="styler:styler1">Start Date</th>
                <th field="end_date2grade" width="100" align="center" halign="center" data-options="styler:styler1">End Date</th>
    			<th field="nama_grade" width="200" align="center" halign="center" data-options="styler:styler1">Grade</th>
    			<th field="reasongrade" width="240" align="left" halign="center" data-options="styler:styler1">Reason</th>
    			<th field="subtypegrade" width="180" align="left" halign="center" data-options="styler:styler1">Subtype</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbargrade" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addgrade()" style="min-width:90px;">Tambah</a>
        <a target="_blank" href="template/template_grade.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-download" plain="false" style="min-width:90px;">Template Grade</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-upload" plain="false" onclick="uploadtemplategrade()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplategrade" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplategrade">
    	<form id="fmtemplategrade" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template Grade</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templategrade" name="file_templategrade" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplategrade">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplategrade()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplategrade').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlggrade" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsgrade">
    	<form id="fmgrade" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <!--<tr><td colspan="5"><span style="font-weight:bold;">Data Utama</span></td></tr>-->
            <tr>
                <td style="width:100px;">No Induk</td>
                <td><input class="easyui-textbox" id="nipgrade" name="nipgrade" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;" readonly></td>
                <td style="width:10px;">&nbsp;</td>
            </tr>  
            <tr>
                <td>Start Date</td>
                <td><input class="easyui-datebox" id="start_dategrade" name="start_dategrade" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td></td>
                <td>End Date</td>
                <td><input class="easyui-datebox" id="end_dategrade" name="end_dategrade" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Grade</td>
                <td>
                    <input class="easyui-combobox"
                        id="grade"
                        name="grade" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_grade.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td>Level PHDP</td>
                <td><input class="easyui-textbox" id="level_phdpgrade" name="level_phdpgrade" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Reason</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="kode_reasongrade"
                        name="kode_reasongrade" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_reason.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Subtype</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="kode_subtypegrade"
                        name="kode_subtypegrade" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_subtype.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsgrade">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savegrade()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlggrade').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addgrade(){
    		$('#dlggrade').dialog('open').dialog('setTitle','Input Data Grade');
    		$('#fmgrade').form('clear');
            $("#nipgrade").textbox('setValue','<?=$nip;?>');            
    		url = 'save_grade.php';
    	}
    	function editgrade(index){
            var row = $('#dggrade').datagrid('getRow', index);
    		if (row){
                $('#dlggrade').dialog('open').dialog('setTitle','Update Data Grade');
                $('#fmgrade').form('clear');
    			$('#fmgrade').form('load',row); 
                url = 'update_grade.php?id='+row.idgrade;  
            }          
    	}
    	function savegrade(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmgrade').form('submit',{
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
                        $.post('updatedata/update_grade.php',{},function(result){},'json');
                        $('#dlggrade').dialog('close');
                        $('#dggrade').datagrid('reload');
                    }
                }
            });
    	}
    	function destroygrade(index){
            var row = $('#dggrade').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('destroy_grade.php',{id:row.idgrade},function(result){
    						if (result.success){
    							$('#dggrade').datagrid('reload');	// reload the user data
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

    	function uploadtemplategrade(){
    		$('#dlgtemplategrade').dialog('open').dialog('setTitle','Upoad Template grade');
            $('#fmtemplategrade').form('clear');
    		url = 'save_templategrade.php';
    	}
    	function savetemplategrade(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplategrade').form('submit',{
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
                        $.post('updatedata/update_grade.php',{},function(result){},'json');
    					$('#dlgtemplategrade').dialog('close');
    					$('#dggrade').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dggrade").height($(window).height() - 0);
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