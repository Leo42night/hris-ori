<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    include "koneksi.php";
	$foldernya = "https://36.94.223.222/teams/app/api/";
	$kode = "HRIS to TEAMS 2023\n";
	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$encryption_iv = '1234567891011121';
	$encryption_key = "HRIS#2#TEAMS@2023";
	$encryption = openssl_encrypt($kode, $ciphering,$encryption_key, $options, $encryption_iv);
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
				//namampenempatancari: $('#namampenempatancari').textbox('getValue')
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

        function onSelectregionmpenempatan(){
            var nilai1 = $('#kd_regionmpenempatan').combobox('getValue');
            var url1 = '<?=$foldernya;?>hris_get_area.php?kd_region='+nilai1;
            $('#kd_areampenempatan').combobox('enable');
            $('#kd_areampenempatan').combobox('clear'); 
            $('#kd_areampenempatan').combobox('reload',url1);
    	}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#kd_areampenempatan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenmpenempatan').combobox({
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
        $('#id_kabupatenmpenempatan').combobox({
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
        $("#dgmpenempatan").datagrid({
        });
    });
    </script>
    <table id="dgmpenempatan" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_mpenempatan.php" pageSize="20"        
    		toolbar="#toolbarmpenempatan" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksimpenempatan" width="80" align="center" halign="center" data-options="formatter:aksimpenempatan,styler:styler1">Aksi</th>
    			<th field="kd_penempatanmpenempatan" width="200" align="center" halign="center" data-options="styler:styler1">Kode Penempatan</th>
    			<th field="penempatanmpenempatan" width="350" align="left" halign="center" data-options="styler:styler1">Penempatan</th>
    			<th field="waktumpenempatan" width="80" align="center" halign="center" data-options="styler:styler1">Waktu</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarmpenempatan" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addmpenempatan()" style="min-width:90px;">Tambah</a>
        <a target="_blank" href="template/template_mpenempatan.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template mpenempatan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatempenempatan()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgmpenempatan" class="easyui-dialog" modal="true" style="min-width:400px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsmpenempatan">
    	<form id="fmmpenempatan" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label for="username" style="font-weight: 900 !important;font-size:12px;">Region</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-combobox"
                            id="kd_regionmpenempatan"
                            name="kd_regionmpenempatan" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 400px;" 
                            data-options=" 
                                onChange:onSelectregionmpenempatan,
                                url:'<?=$foldernya;?>hris_get_region.php', 
                                multiline:false,
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label for="username" style="font-weight: 900 !important;font-size:12px;">Area/Site</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-combobox"
                            id="kd_areampenempatan"
                            name="kd_areampenempatan" missingMessage="Harus di isi" editable="true"
                            style="padding: 2px; width: 400px;" 
                            data-options=" 
                                url:'<?=$foldernya;?>hris_get_area.php', 
                                multiline:false,
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label for="username" style="font-weight: 900 !important;font-size:12px;">Waktu</label>
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
    		url = 'save_mpenempatan.php';
    	}
    	function editmpenempatan(index){
            var row = $('#dgmpenempatan').datagrid('getRow', index);
    		if (row){
                $('#dlgmpenempatan').dialog('open').dialog('setTitle','Update Data Penempatan');
                $('#fmmpenempatan').form('clear');
    			$('#fmmpenempatan').form('load',row); 
                //$('#id_kabupatenmpenempatan').combobox('reload','get_kabupaten.php?id_provinsi='+row.id_provinsimpenempatan);
                url = 'update_mpenempatan.php?id='+row.idmpenempatan;  
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
    			$.messager.confirm('Konfirmasi','Yakin menghapus data Penempatan ini?',function(r){
    				if (r){
    					$.post('destroy_mpenempatan.php',{id:row.idmpenempatan},function(result){
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
    		url = 'save_templatempenempatan.php';
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