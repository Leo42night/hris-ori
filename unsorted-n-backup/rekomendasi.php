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
		function doSearchrekomendasi(){
            $('#dgrekomendasi').datagrid('load',{
				namarekomendasicari: $('#namarekomendasicari').textbox('getValue')
			});
		}
        function aksirekomendasi(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editrekomendasi(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroyrekomendasi(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsirekomendasi(){
            var nilai1 = $('#id_provinsirekomendasi').combobox('getValue');
            var url1 = 'api/hxms-api/get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatenrekomendasi').combobox('enable');
            $('#id_kabupatenrekomendasi').combobox('clear'); 
            $('#id_kabupatenrekomendasi').combobox('reload',url1);
    	}

        function onselectniprekomendasi(){
			var nipnya = $('#nip_rekomendasi').combobox('getValue');            
			$.ajax({
				type: 'POST',
				url: 'get_jabatan_rekomendasi.php',
				data: {'nip':nipnya},
				success: function(result){
					//alert(result);
					var result = eval('('+result+')');
					$("#jabatan_rekomendasi").textbox('setValue',result.jabatan);
				}
			});
			
    	}		

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#streamrekomendasi').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenrekomendasi').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#streamrekomendasi').combobox({
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
        $('#id_kabupatenrekomendasi').combobox({
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
        $("#dgrekomendasi").datagrid({
        });
    });
    </script>
    <table id="dgrekomendasi" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$api_path?>get_master_rekomendasi.php?nip=<?=$nip;?>" pageSize="20"        
    		toolbar="#toolbarrekomendasi" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksirekomendasi" width="80" align="center" halign="center" data-options="formatter:aksirekomendasi,styler:styler1">Aksi</th>
                <th field="start_date2rekomendasi" width="100" align="center" halign="center" data-options="styler:styler1">Start<br/>Date</th>
                <th field="end_date2rekomendasi" width="100" align="center" halign="center" data-options="styler:styler1">End<br/>Date</th>
    			<th field="assesmentrekomendasi" width="200" align="center" halign="center" data-options="styler:styler1">Assesment</th>
    			<th field="tipe2rekomendasi" width="200" align="center" halign="center" data-options="styler:styler1">Tipe</th>
    			<th field="stream2rekomendasi" width="200" align="center" halign="center" data-options="styler:styler1">Stream</th>
    			<th field="rekomendasi_kompetensirekomendasi" width="200" align="center" halign="center" data-options="styler:styler1">Rekomendasi Kompetensi</th>
    			<th field="rekomendasi_psikologrekomendasi" width="200" align="center" halign="center" data-options="styler:styler1">Rekomendasi Psikolog</th>
    			<th field="rekomendasi_gabunganrekomendasi" width="200" align="center" halign="center" data-options="styler:styler1">Rekomendasi Gabungan</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarrekomendasi" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addrekomendasi()" style="min-width:90px;">Tambah</a>
        <!--<a target="_blank" href="template/template_rekomendasi.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template rekomendasi</a>-->
        <a class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template rekomendasi</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplaterekomendasi()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplaterekomendasi" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplaterekomendasi">
    	<form id="fmtemplaterekomendasi" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template rekomendasi</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templaterekomendasi" name="file_templaterekomendasi" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplaterekomendasi">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplaterekomendasi()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplaterekomendasi').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgrekomendasi" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsrekomendasi">
    	<form id="fmrekomendasi" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <!--<tr><td colspan="5"><span style="font-weight:bold;">Data Utama</span></td></tr>-->
            <tr>
                <td style="width:110px;">No Induk</td>
                <td><input class="easyui-textbox" id="niprekomendasi" name="niprekomendasi" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;" readonly></td>
                <td style="width:10px;"></td>
                <td style="width:100px;"></td>
            </tr>  
            <tr>
                <td>Start Date</td>
                <td><input class="easyui-datebox" id="start_daterekomendasi" name="start_daterekomendasi" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td style="width:10px;"></td>
                <td>End Date</td>
                <td><input class="easyui-datebox" id="end_daterekomendasi" name="end_daterekomendasi" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Assesment</td>
                <td colspan="4"><input class="easyui-textbox" id="assesmentrekomendasi" name="assesmentrekomendasi" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Tipe</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="tiperekomendasi"
                        name="tiperekomendasi" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_tipe.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Stream</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="streamrekomendasi"
                        name="streamrekomendasi" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_stream.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'150px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Rekomendasi Kompetensi</td>
                <td colspan="4"><input class="easyui-textbox" id="rekomendasi_kompetensirekomendasi" name="rekomendasi_kompetensirekomendasi" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Rekomendasi Psikolog</td>
                <td colspan="4"><input class="easyui-textbox" id="rekomendasi_psikologrekomendasi" name="rekomendasi_psikologrekomendasi" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Rekomendasi Gabungan</td>
                <td colspan="4"><input class="easyui-textbox" id="rekomendasi_gabunganrekomendasi" name="rekomendasi_gabunganrekomendasi" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsrekomendasi">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="saverekomendasi()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgrekomendasi').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addrekomendasi(){
    		$('#dlgrekomendasi').dialog('open').dialog('setTitle','Input rekomendasi');
    		$('#fmrekomendasi').form('clear');
            $("#niprekomendasi").textbox('setValue','<?=$nip;?>');            
    		url = 'save_rekomendasi.php';
    	}
    	function editrekomendasi(index){
            var row = $('#dgrekomendasi').datagrid('getRow', index);
    		if (row){
                $('#dlgrekomendasi').dialog('open').dialog('setTitle','Update rekomendasi');
                $('#fmrekomendasi').form('clear');
    			$('#fmrekomendasi').form('load',row); 
                url = 'update_rekomendasi.php?id='+row.idrekomendasi;  
            } 
    	}
    	function saverekomendasi(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmrekomendasi').form('submit',{
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
                        $('#dlgrekomendasi').dialog('close');
                        $('#dgrekomendasi').datagrid('reload');
                    }
                }
            });
    	}
    	function destroyrekomendasi(index){
            var row = $('#dgrekomendasi').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('destroy_rekomendasi.php',{id:row.idrekomendasi},function(result){
    						if (result.success){
    							$('#dgrekomendasi').datagrid('reload');	// reload the user data
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

    	function uploadtemplaterekomendasi(){
    		$('#dlgtemplaterekomendasi').dialog('open').dialog('setTitle','Upoad Template Riwayat rekomendasi');
            $('#fmtemplaterekomendasi').form('clear');
    		url = 'save_templaterekomendasi.php';
    	}
    	function savetemplaterekomendasi(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplaterekomendasi').form('submit',{
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
    					$('#dlgtemplaterekomendasi').dialog('close');
    					$('#dgrekomendasi').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgrekomendasi").height($(window).height() - 0);
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