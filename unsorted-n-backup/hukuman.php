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
		function doSearchhukuman(){
            $('#dghukuman').datagrid('load',{
				namahukumancari: $('#namahukumancari').textbox('getValue')
			});
		}
        function aksihukuman(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="edithukuman(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroyhukuman(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsihukuman(){
            var nilai1 = $('#id_provinsihukuman').combobox('getValue');
            var url1 = 'get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatenhukuman').combobox('enable');
            $('#id_kabupatenhukuman').combobox('clear'); 
            $('#id_kabupatenhukuman').combobox('reload',url1);
    	}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#negara_institusihukuman').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenhukuman').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#negara_institusihukuman').combobox({
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
        $('#id_kabupatenhukuman').combobox({
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
        $("#dghukuman").datagrid({
        });
    });
    </script>
    <table id="dghukuman" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_hukuman.php?nip=<?=$nip;?>" pageSize="20"        
    		toolbar="#toolbarhukuman" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksihukuman" width="80" align="center" halign="center" data-options="formatter:aksihukuman,styler:styler1">Aksi</th>
                <th field="start_date2hukuman" width="100" align="center" halign="center" data-options="styler:styler1">Start<br/>Date</th>
                <th field="end_date2hukuman" width="100" align="center" halign="center" data-options="styler:styler1">End<br/>Date</th>
    			<th field="jenis_grievances2hukuman" width="160" align="center" halign="center" data-options="styler:styler1">Jenis</th>
    			<th field="reason_grievances2hukuman" width="160" align="center" halign="center" data-options="styler:styler1">Reason</th>
    			<th field="status_grievances2hukuman" width="200" align="center" halign="center" data-options="styler:styler1">Status</th>
    			<th field="stage_grievances2hukuman" width="200" align="center" halign="center" data-options="styler:styler1">Stage</th>
    			<th field="result_grievances2hukuman" width="200" align="center" halign="center" data-options="styler:styler1">Result</th>
    			<th field="pasal_pelanggaranhukuman" width="200" align="left" halign="center" data-options="styler:styler1">Pasal yg dilanggar</th>
    			<th field="rupiah2hukuman" width="140" align="right" halign="center" data-options="styler:styler1">Rupiah</th>
    			<th field="hukumanhukuman" width="200" align="left" halign="center" data-options="styler:styler1">Hukuman</th>
    			<th field="keteranganhukuman" width="200" align="left" halign="center" data-options="styler:styler1">Keterangan</th>
                <th field="no_sk_hukuman" width="160" align="center" halign="center" data-options="styler:styler1">No SK Hukuman</th>
                <th field="tgl_sk_hukuman2" width="110" align="center" halign="center" data-options="styler:styler1">Tanggal SK<br/>Hukuman</th>
                <th field="no_sk_terkaithukuman" width="160" align="center" halign="center" data-options="styler:styler1">No SK Terkait</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarhukuman" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addhukuman()" style="min-width:90px;">Tambah</a>
        <a target="_blank" href="template/template_hukuman.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template Grievances</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatehukuman()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatehukuman" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatehukuman">
    	<form id="fmtemplatehukuman" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template hukuman</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatehukuman" name="file_templatehukuman" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatehukuman">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatehukuman()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatehukuman').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlghukuman" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonshukuman">
    	<form id="fmhukuman" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <!--<tr><td colspan="5"><span style="font-weight:bold;">Data Utama</span></td></tr>-->
            <tr>
                <td style="width:100px;">No Induk</td>
                <td><input class="easyui-textbox" id="niphukuman" name="niphukuman" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;" readonly></td>
                <td style="width:10px;">&nbsp;</td>
                <td style="width:100px;"></td>
            </tr>  
            <tr>
                <td>Start Date</td>
                <td><input class="easyui-datebox" id="start_datehukuman" name="start_datehukuman" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td></td>
                <td>End Date</td>
                <td><input class="easyui-datebox" id="end_datehukuman" name="end_datehukuman" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Jenis</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenis_grievanceshukuman"
                        name="jenis_grievanceshukuman" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_jenis_hukuman.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
                <td></td>
                <td>Reason</td>
                <td>
                    <input class="easyui-combobox"
                        id="reason_grievanceshukuman"
                        name="reason_grievanceshukuman" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_reason_hukuman.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Nip Atasan</td>
                <td><input class="easyui-textbox" id="nip_atasanhukuman" name="nip_atasanhukuman" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
                <td></td>
                <td>Nama Atasan</td>
                <td><input class="easyui-textbox" id="nama_atasanhukuman" name="nama_atasanhukuman" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Status</td>
                <td>
                    <input class="easyui-combobox"
                        id="status_grievanceshukuman"
                        name="status_grievanceshukuman" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_status_hukuman.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td></td>
                <td>Stage</td>
                <td>
                    <input class="easyui-combobox"
                        id="stage_grievanceshukuman"
                        name="stage_grievanceshukuman" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_stage_hukuman.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Result</td>
                <td>
                    <input class="easyui-combobox"
                        id="result_grievanceshukuman"
                        name="result_grievanceshukuman" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_result_hukuman.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td></td>
                <td>Rupiah</td>
                <td><input class="easyui-numberbox" id="rupiahhukuman" name="rupiahhukuman" missingMessage="Harus di isi" data-options="required:false,min:0" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>No SK Hukuman</td>
                <td colspan="4"><input class="easyui-textbox" id="no_sk_hukuman" name="no_sk_hukuman" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Tgl.SK Hukuman</td>
                <td><input class="easyui-datebox" id="tgl_sk_hukuman" name="tgl_sk_hukuman" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Pasal yang dilanggar</td>
                <td colspan="4"><input class="easyui-textbox" id="pasal_pelanggaranhukuman" name="pasal_pelanggaranhukuman" missingMessage="Harus di isi" data-options="required:false,multiline:true" style="width: 425px;height:40px;"></td>
            </tr>  
            <tr>
                <td>Hukuman</td>
                <td colspan="4"><input class="easyui-textbox" id="hukumanhukuman" name="hukumanhukuman" missingMessage="Harus di isi" data-options="required:false,multiline:true" style="width: 425px;height:40px;"></td>
            </tr>  
            <tr>
                <td>Keterangan</td>
                <td colspan="4"><input class="easyui-textbox" id="keteranganhukuman" name="keteranganhukuman" missingMessage="Harus di isi" data-options="required:false,multiline:true" style="width: 425px;height:40px;"></td>
            </tr>  
            <tr>
                <td>No SK Terkait</td>
                <td colspan="4"><input class="easyui-textbox" id="no_sk_terkaithukuman" name="no_sk_terkaithukuman" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonshukuman">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savehukuman()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlghukuman').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addhukuman(){
    		$('#dlghukuman').dialog('open').dialog('setTitle','Input Grievances');
    		$('#fmhukuman').form('clear');
            $("#niphukuman").textbox('setValue','<?=$nip;?>');            
    		url = 'save_hukuman.php';
    	}
    	function edithukuman(index){
            var row = $('#dghukuman').datagrid('getRow', index);
    		if (row){
                $('#dlghukuman').dialog('open').dialog('setTitle','Update Grievances');
                $('#fmhukuman').form('clear');
    			$('#fmhukuman').form('load',row); 
                url = 'update_hukuman.php?id='+row.idhukuman;  
            }          
    	}
    	function savehukuman(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmhukuman').form('submit',{
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
                        $.post('updatedata/update_jabatan.php',{},function(result){},'json');
                        $('#dlghukuman').dialog('close');
                        $('#dghukuman').datagrid('reload');
                    }
                }
            });
    	}
    	function destroyhukuman(index){
            var row = $('#dghukuman').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('destroy_hukuman.php',{id:row.idhukuman},function(result){
    						if (result.success){
    							$('#dghukuman').datagrid('reload');	// reload the user data
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

    	function uploadtemplatehukuman(){
    		$('#dlgtemplatehukuman').dialog('open').dialog('setTitle','Upoad Template hukuman');
            $('#fmtemplatehukuman').form('clear');
    		url = 'save_templatehukuman.php';
    	}
    	function savetemplatehukuman(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatehukuman').form('submit',{
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
                        $.post('updatedata/update_jabatan.php',{},function(result){},'json');                      
    					$('#dlgtemplatehukuman').dialog('close');
    					$('#dghukuman').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dghukuman").height($(window).height() - 0);
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