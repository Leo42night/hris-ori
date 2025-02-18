<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/master/";
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
		function doSearchmpenempatan(){
            $('#dgmpenempatan').datagrid('load',{
				penempatanmpenempatancari: $('#penempatanmpenempatancari').textbox('getValue')
			});
		}
        function aksimpenempatan(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editmpenempatan(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroympenempatan(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;';
		}
        
        $('#kd_areampenempatan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#nama_unitmpenempatan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#kd_areampenempatan').combobox({
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
        $('#nama_unitmpenempatan').combobox({
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
                        return i;
                    }
                }
            })
        });
    </script>

    <script type="text/javascript">
    $(function(){
        $("#dgmpenempatan").datagrid({
        });
    });
    </script>
    <table id="dgmpenempatan" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_mpenempatan.php" pageSize="20"        
    		toolbar="#toolbarmpenempatan" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksimpenempatan" width="80" align="center" halign="center" data-options="formatter:aksimpenempatan,styler:styler1">Aksi</th>
    			<th field="penempatanmpenempatan" width="200" align="left" halign="center" data-options="styler:styler1">Penempatan</th>
    			<th field="latmpenempatan" width="160" align="center" halign="center" data-options="styler:styler1">Latitude</th>
    			<th field="lonmpenempatan" width="160" align="center" halign="center" data-options="styler:styler1">Longitude</th>
    			<th field="waktumpenempatan" width="80" align="center" halign="center" data-options="styler:styler1">Waktu</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarmpenempatan" style="background-color:#fff;padding:5px;">
    	<div id="tbmpenempatan" style="padding:3px">
            <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addmpenempatan()" style="min-width:90px;">Tambah</a>
            <!--
            <table>
            <tr>
                <td style="padding-right:5px;">Penempatan</td>
                <td style="padding-right:10px;">
                    <input class="easyui-textbox" id="penempatanmpenempatancari" name="penempatanmpenempatancari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchmpenempatan()" style="min-width:90px;">Search</a>
                    <?php if($akses_proses==="1"){?>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addmpenempatan()" style="min-width:90px;">Tambah</a>
                    <?php } ?>
                </td>
            </tr>
            </table>
            -->
    	</div>        
    </div>
    
    <div id="dlgmpenempatan" class="easyui-dialog" modal="true" style="min-width:400px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsmpenempatan">
    	<form id="fmmpenempatan" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Penempatan</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-textbox" id="penempatanmpenempatan" name="penempatanmpenempatan" data-options="required:true" style="width: 400px;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Latitude</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-textbox" id="latmpenempatan" name="latmpenempatan" data-options="required:true" style="width: 400px;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Longitude</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-textbox" id="lonmpenempatan" name="lonmpenempatan" data-options="required:true" style="width: 400px;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label for="username" style="font-weight: normal !important;font-size:12px;">Waktu</label>
                        <span class="brxsmall1"></span>
                        <select id="waktumpenempatan" name="waktumpenempatan" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 150px;">
                            <option value="WIB">WIB</option>
                            <option value="WITA">WITA</option>
                            <option value="WIT">WIT</option>
                        </select>                            
                    </div>
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsmpenempatan">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savempenempatan()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgmpenempatan').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addmpenempatan(){
    		$('#dlgmpenempatan').dialog('open').dialog('setTitle','Input Data Penempatan');
    		$('#fmmpenempatan').form('clear');
    		url = '<?=$foldernya;?>save_mpenempatan.php?id=0';
    	}
    	function editmpenempatan(index){
            var row = $('#dgmpenempatan').datagrid('getRow', index);
    		if (row){
                $('#dlgmpenempatan').dialog('open').dialog('setTitle','Update Data Penempatan');
                $('#fmmpenempatan').form('clear');
    			$('#fmmpenempatan').form('load',row); 
                url = '<?=$foldernya;?>update_mpenempatan.php?id='+row.idmpenempatan;  
            }          
    	}
    	function savempenempatan(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmmpenempatan').form('submit',{
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
                        $('#dlgmpenempatan').dialog('close');
                        $('#dgmpenempatan').datagrid('reload');
                    }
                }
            });
    	}
    	function destroympenempatan(index){
            var row = $('#dgmpenempatan').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_mpenempatan.php',{id:row.idmpenempatan},function(result){
    						if (result.success){
    							$('#dgmpenempatan').datagrid('reload');	// reload the user data
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

    	function uploadtemplatempenempatan(){
    		$('#dlgtemplatempenempatan').dialog('open').dialog('setTitle','Upoad Template Penempatan');
            $('#fmtemplatempenempatan').form('clear');
    		url = 'save_templatempenempatan.php[not_found]';
    	}
    	function savetemplatempenempatan(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatempenempatan').form('submit',{
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
    					$('#dlgtemplatempenempatan').dialog('close');
    					$('#dgmpenempatan').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgmpenempatan").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmuser{
    		margin:0;
    		padding:10px 10px;
    	}
    	.ftitle{
    		font-size:14px;
    		font-weight:normal;
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
        .brxsmall {
            display: block;
            /*margin-bottom: -.1em !important;*/
            margin-bottom: 0.5em !important;
        }
        .brxsmall1 {
            display: block;
            margin-bottom: 0.2em !important;
        }
        .brxsmall2 {
            display: block;
            margin-bottom: -.0em !important;
        }
        .brxsmall3 {
            display: block;
            margin-bottom: -.2em !important;
        }

    </style>
<?php    
}
?>