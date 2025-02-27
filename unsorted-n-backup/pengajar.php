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
		function doSearchpengajar(){
            $('#dgpengajar').datagrid('load',{
				namapengajarcari: $('#namapengajarcari').textbox('getValue')
			});
		}
        function aksipengajar(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editpengajar(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroypengajar(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsipengajar(){
            var nilai1 = $('#id_provinsipengajar').combobox('getValue');
            var url1 = 'api/hxms-api/get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatenpengajar').combobox('enable');
            $('#id_kabupatenpengajar').combobox('clear'); 
            $('#id_kabupatenpengajar').combobox('reload',url1);
    	}

        function onselectnippengajar(){
			var nipnya = $('#nip_pengajar').combobox('getValue');            
			$.ajax({
				type: 'POST',
				url: 'get_jabatan_pengajar.php',
				data: {'nip':nipnya},
				success: function(result){
					//alert(result);
					var result = eval('('+result+')');
					$("#jabatan_pengajar").textbox('setValue',result.jabatan);
				}
			});
			
    	}		

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#kode_diklatpengajar').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenpengajar').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#kode_diklatpengajar').combobox({
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
        $('#id_kabupatenpengajar').combobox({
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
        $("#dgpengajar").datagrid({
        });
    });
    </script>
    <table id="dgpengajar" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$api_path?>get_master_pengajar.php?nip=<?=$nip;?>" pageSize="20"        
    		toolbar="#toolbarpengajar" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksipengajar" width="80" align="center" halign="center" data-options="formatter:aksipengajar,styler:styler1">Aksi</th>
                <th field="start_date2pengajar" width="100" align="center" halign="center" data-options="styler:styler1">Start<br/>Date</th>
                <th field="end_date2pengajar" width="100" align="center" halign="center" data-options="styler:styler1">End<br/>Date</th>
    			<th field="kode_diklatpengajar" width="200" align="center" halign="center" data-options="styler:styler1">Kode Diklat</th>
    			<th field="judul_diklatpengajar" width="200" align="center" halign="center" data-options="styler:styler1">Judul Diklat</th>
                <!--
    			<th field="tingkat_acara2pengajar" width="200" align="center" halign="center" data-options="styler:styler1">Tingkat Acara</th>
    			<th field="kode_dahan_profesipengajar" width="200" align="center" halign="center" data-options="styler:styler1">Kode Dahan<br/>Profesi</th>
    			<th field="dahan_profesipengajar" width="200" align="center" halign="center" data-options="styler:styler1">Dahan Profesi</th>
    			<th field="kode_pengajarpengajar" width="200" align="center" halign="center" data-options="styler:styler1">Kode pengajar</th>
    			<th field="judul_pengajarpengajar" width="200" align="center" halign="center" data-options="styler:styler1">Judul pengajar</th>
    			<th field="upengajar2pengajar" width="200" align="center" halign="center" data-options="styler:styler1">Upengajar</th>
    			<th field="jenis_pelaksanaan2pengajar" width="200" align="center" halign="center" data-options="styler:styler1">Jenis Pelaksanaan</th>
    			<th field="jenis_sertifikasi2pengajar" width="200" align="center" halign="center" data-options="styler:styler1">Jenis Sertifikat</th>
    			<th field="sifat_pengajar2pengajar" width="200" align="center" halign="center" data-options="styler:styler1">Sifat pengajar</th>
                -->
    		</tr>
    	</thead>
    </table>
    <div id="toolbarpengajar" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addpengajar()" style="min-width:90px;">Tambah</a>
        <!--<a target="_blank" href="template/template_pengajar.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template pengajar</a>-->
        <a class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template pengajar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatepengajar()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatepengajar" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatepengajar">
    	<form id="fmtemplatepengajar" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template pengajar</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatepengajar" name="file_templatepengajar" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatepengajar">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatepengajar()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatepengajar').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgpengajar" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonspengajar">
    	<form id="fmpengajar" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <!--<tr><td colspan="5"><span style="font-weight:bold;">Data Utama</span></td></tr>-->
            <tr>
                <td style="width:110px;">No Induk</td>
                <td><input class="easyui-textbox" id="nippengajar" name="nippengajar" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;" readonly></td>
                <td style="width:10px;"></td>
                <td style="width:100px;"></td>
            </tr>  
            <tr>
                <td>Start Date</td>
                <td><input class="easyui-datebox" id="start_datepengajar" name="start_datepengajar" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td style="width:10px;"></td>
                <td>End Date</td>
                <td><input class="easyui-datebox" id="end_datepengajar" name="end_datepengajar" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Dahan Profesi</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="kode_dahan_profesipengajar"
                        name="kode_dahan_profesipengajar" missingMessage="Harus di isi" editable="false"
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
                <td>Kode Diklat</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="kode_diklatpengajar"
                        name="kode_diklatpengajar" missingMessage="Harus di isi" editable="true"
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
                <td colspan="4"><input class="easyui-textbox" id="judul_diklatpengajar" name="judul_diklatpengajar" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Udiklat</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="udiklatpengajar"
                        name="udiklatpengajar" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_udiklat.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Jenis Pelaksanaan</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenis_pelaksanaanpengajar"
                        name="jenis_pelaksanaanpengajar" missingMessage="Harus di isi" editable="false"
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
                <td></td>
                <td>Jenis Sertifikasi</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenis_sertifikasipengajar"
                        name="jenis_sertifikasipengajar" missingMessage="Harus di isi" editable="false"
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
            </tr>  
            <tr>
                <td>Sifat Diklat</td>
                <td>
                    <input class="easyui-combobox"
                        id="sifat_diklatpengajar"
                        name="sifat_diklatpengajar" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_sifat_diklat.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td></td>
                <td>Penyelenggaraan</td>
                <td>
                    <input class="easyui-combobox"
                        id="penyelenggaraanpengajar"
                        name="penyelenggaraanpengajar" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_jenis_penyelenggaraan.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Keterangan Pengajar</td>
                <td colspan="4"><input class="easyui-textbox" id="keterangan_pengajar" name="keterangan_pengajar" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonspengajar">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savepengajar()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgpengajar').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addpengajar(){
    		$('#dlgpengajar').dialog('open').dialog('setTitle','Input Riwayat pengajar');
    		$('#fmpengajar').form('clear');
            $("#nippengajar").textbox('setValue','<?=$nip;?>');            
    		url = 'save_pengajar.php';
    	}
    	function editpengajar(index){
            var row = $('#dgpengajar').datagrid('getRow', index);
    		if (row){
                $('#dlgpengajar').dialog('open').dialog('setTitle','Update Riwayat pengajar');
                $('#fmpengajar').form('clear');
    			$('#fmpengajar').form('load',row); 
                url = 'update_pengajar.php?id='+row.idpengajar;  
            } 
    	}
    	function savepengajar(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmpengajar').form('submit',{
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
                        $.post('updatedata/update_pengajar.php',{},function(result){},'json');
                        $('#dlgpengajar').dialog('close');
                        $('#dgpengajar').datagrid('reload');
                    }
                }
            });
    	}
    	function destroypengajar(index){
            var row = $('#dgpengajar').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('destroy_pengajar.php',{id:row.idpengajar},function(result){
    						if (result.success){
    							$('#dgpengajar').datagrid('reload');	// reload the user data
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

    	function uploadtemplatepengajar(){
    		$('#dlgtemplatepengajar').dialog('open').dialog('setTitle','Upoad Template Riwayat pengajar');
            $('#fmtemplatepengajar').form('clear');
    		url = 'save_templatepengajar.php';
    	}
    	function savetemplatepengajar(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatepengajar').form('submit',{
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
                        $.post('updatedata/update_pengajar.php',{},function(result){},'json');
    					$('#dlgtemplatepengajar').dialog('close');
    					$('#dgpengajar').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgpengajar").height($(window).height() - 0);
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