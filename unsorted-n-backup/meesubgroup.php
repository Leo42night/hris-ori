<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    include "koneksi.php";
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
		function doSearchmeesubgroup(){
            $('#dgmeesubgroup').datagrid('load',{
				namameesubgroupcari: $('#namameesubgroupcari').textbox('getValue')
			});
		}
        function aksimeesubgroup(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update Data" onclick="editmeesubgroup(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus Data" onclick="destroymeesubgroup(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsimeesubgroup(){
            var nilai1 = $('#id_provinsimeesubgroup').combobox('getValue');
            var url1 = 'get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatenmeesubgroup').combobox('enable');
            $('#id_kabupatenmeesubgroup').combobox('clear'); 
            $('#id_kabupatenmeesubgroup').combobox('reload',url1);
    	}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#id_provinsimeesubgroup').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenmeesubgroup').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#id_provinsimeesubgroup').combobox({
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
        $('#id_kabupatenmeesubgroup').combobox({
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
        $("#dgmeesubgroup").datagrid({
        });
    });
    </script>
    <table id="dgmeesubgroup" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_meesubgroup.php" pageSize="20"        
    		toolbar="#toolbarmeesubgroup" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksimeesubgroup" width="80" align="center" halign="center" data-options="formatter:aksimeesubgroup,styler:styler1">Aksi</th>
                <th field="ee_groupmeesubgroup" width="200" align="left" halign="center" data-options="styler:styler1">EE Group</th>
    			<th field="kodemeesubgroup" width="100" align="center" halign="center" data-options="styler:styler1">Kode</th>
                <th field="labelmeesubgroup" width="200" align="left" halign="left" data-options="styler:styler1">EE Sub Group</th>
                <th field="keteranganmeesubgroup" width="400" align="left" halign="left" data-options="styler:styler1">Keterangan</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarmeesubgroup" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addmeesubgroup()" style="min-width:90px;">Tambah</a>
        <!--
        <a target="_blank" href="template/template_meesubgroup.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatemeesubgroup()" style="min-width:90px;">Upload Template</a>     
        -->
        <?php } ?>
    </div>
    
    <div id="dlgtemplatemeesubgroup" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatemeesubgroup">
    	<form id="fmtemplatemeesubgroup" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatemeesubgroup" name="file_templatemeesubgroup" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatemeesubgroup">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatemeesubgroup()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatemeesubgroup').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgmeesubgroup" class="easyui-dialog" modal="true" style="min-width:200px;min-height:80px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsmeesubgroup">
    	<form id="fmmeesubgroup" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td style="width:120px;">EE Group</td>
                <td>
                    <input class="easyui-combobox"
                        id="kode_ee_groupmeesubgroup"
                        name="kode_ee_groupmeesubgroup" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 400px;" 
                        data-options=" 
                            url:'get_ee_group.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">

            </tr>  
            <tr>
                <td>Kode</td>
                <td><input class="easyui-textbox" id="kodemeesubgroup" name="kodemeesubgroup" missingMessage="Harus di isi" data-options="required:true" style="width: 100px;"></td>
            </tr>  
            <tr>
                <td>EE Sub Group</td>
                <td><input class="easyui-textbox" id="labelmeesubgroup" name="labelmeesubgroup" missingMessage="Harus di isi" data-options="required:true" style="width: 400px;"></td>
            </tr>  
            <tr>
                <td>Keterangan</td>
                <td><input class="easyui-textbox" id="keteranganmeesubgroup" name="keteranganmeesubgroup" missingMessage="Harus di isi" data-options="required:false,multiline:true" style="width: 400px;height:40px;"></td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsmeesubgroup">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savemeesubgroup()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgmeesubgroup').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addmeesubgroup(){
    		$('#dlgmeesubgroup').dialog('open').dialog('setTitle','Input Data');
    		$('#fmmeesubgroup').form('clear');
    		url = 'save_meesubgroup.php';
    	}
    	function editmeesubgroup(index){
            var row = $('#dgmeesubgroup').datagrid('getRow', index);
    		if (row){
                $('#dlgmeesubgroup').dialog('open').dialog('setTitle','Update Data');
                $('#fmmeesubgroup').form('clear');
    			$('#fmmeesubgroup').form('load',row); 
                url = 'update_meesubgroup.php?id='+row.idmeesubgroup;  
            }          
    	}
    	function savemeesubgroup(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmmeesubgroup').form('submit',{
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
                        $('#dlgmeesubgroup').dialog('close');
                        $('#dgmeesubgroup').datagrid('reload');
                    }
                }
            });
    	}
    	function destroymeesubgroup(index){
            var row = $('#dgmeesubgroup').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('destroy_meesubgroup.php',{id:row.idmeesubgroup},function(result){
    						if (result.success){
    							$('#dgmeesubgroup').datagrid('reload');	// reload the user data
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

    	function uploadtemplatemeesubgroup(){
    		$('#dlgtemplatemeesubgroup').dialog('open').dialog('setTitle','Upoad Template');
            $('#fmtemplatemeesubgroup').form('clear');
    		url = 'save_templatemeesubgroup.php';
    	}
    	function savetemplatemeesubgroup(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatemeesubgroup').form('submit',{
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
    					$('#dlgtemplatemeesubgroup').dialog('close');
    					$('#dgmeesubgroup').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgmeesubgroup").height($(window).height() - 0);
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