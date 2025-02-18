<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    include "koneksi.php";
    //$nip = $_REQUEST['nip'];
    // $nip = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : "";
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
		function doSearchpengangkatan(){
            $('#dgpengangkatan').datagrid('load',{
				namapengangkatancari: $('#namapengangkatancari').textbox('getValue')
			});
		}
        function aksipengangkatan(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editpengangkatan(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroypengangkatan(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a;
        }  

        function onSelectprovinsipengangkatan(){
            var nilai1 = $('#id_provinsipengangkatan').combobox('getValue');
            var url1 = 'get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatenpengangkatan').combobox('enable');
            $('#id_kabupatenpengangkatan').combobox('clear'); 
            $('#id_kabupatenpengangkatan').combobox('reload',url1);
    	}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#id_provinsipengangkatan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenpengangkatan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#id_provinsipengangkatan').combobox({
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
        $('#id_kabupatenpengangkatan').combobox({
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
        $("#dgpengangkatan").datagrid({
        });
    });
    </script>
    <table id="dgpengangkatan" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_pengangkatan.php" pageSize="20"        
    		toolbar="#toolbarpengangkatan" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksipengangkatan" width="50" align="center" halign="center" data-options="formatter:aksipengangkatan,styler:styler1">Aksi</th>
    			<th field="nippengangkatan" width="140" align="center" halign="center" data-options="styler:styler1">NIP</th>
    			<th field="namapengangkatan" width="250" align="left" halign="left" data-options="styler:styler1">Nama</th>
    			<th field="tgl_lahir2pengangkatan" width="100" align="center" halign="center" data-options="styler:styler1">Tgl Lahir</th>
    			<th field="person_grade2pengangkatan" width="140" align="center" halign="center" data-options="styler:styler1">Person Grade</th>
    			<th field="agama2pengangkatan" width="140" align="center" halign="center" data-options="styler:styler1">Agama</th>
    			<th field="nikpengangkatan" width="160" align="center" halign="center" data-options="styler:styler1">NIK</th>
    			<th field="npwppengangkatan" width="160" align="center" halign="center" data-options="styler:styler1">NPWP</th>
    			<th field="tgl_masuk2pengangkatan" width="100" align="center" halign="center" data-options="styler:styler1">Tgl Masuk</th>
    			<th field="tgl_capeg2pengangkatan" width="100" align="center" halign="center" data-options="styler:styler1">Tgl Capeg</th>
    			<th field="tgl_tetap2pengangkatan" width="100" align="center" halign="center" data-options="styler:styler1">Tgl Tetap</th>
                <th field="tahun_pengangkatanpengangkatan" width="100" align="center" halign="center" data-options="styler:styler1">Tahun<br/>Pengangkatan</th>
                <th field="keterangan_mutasi2pengangkatan" width="200" align="left" halign="left" data-options="styler:styler1">Keterangan Mutasi</th>    		</tr>
    	</thead>
    </table>
    <div id="toolbarpengangkatan" style="background-color:#fff;padding:5px;">
    	<div id="tbpegawai" style="padding:3px">
            <table>
            <tr>
                <td style="padding-right:5px;">NIP/NAMA</td>
                <td style="padding-right:10px;">
                    <input class="easyui-textbox" id="namapengangkatancari" name="namapengangkatancari" data-options="required:false,prompt:'search'" style="width: 160px;">
                </td>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchpengangkatan()" style="min-width:90px;">Search</a>
                </td>
            </tr>
            </table>
    	</div>        
        <?php if($akses_proses==="1"){?>
        <!--
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addpengangkatan()" style="min-width:90px;">Tambah</a>
        <a target="_blank" href="template/template_pengangkatan.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Download Template</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatepengangkatan()" style="min-width:90px;">Upload Template</a>     
        -->
        <?php } ?>
    </div>
    
    <div id="dlgpengangkatan" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonspengangkatan">
    	<form id="fmpengangkatan" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            
            <table>
            <tr>
                <td style="width:250px;">
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>NIP</label></div>
                        <input class="easyui-textbox" id="nippengangkatan" name="nippengangkatan" missingMessage="Harus di isi" data-options="required:true" style="width:100%;" readonly>
                    </div>				
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td style="width:250px;">
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Nama</label></div>
                        <input class="easyui-textbox" id="namapengangkatan" name="namapengangkatan" missingMessage="Harus di isi" data-options="required:true" style="width:100%;" readonly>
                    </div>				
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Person Grade</label></div>
                        <input class="easyui-combobox"
                            id="person_gradepengangkatan"
                            name="person_gradepengangkatan" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'get_person_grade.php',                           
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">
                    </div>
                </td>
                <td>&nbsp;</td>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Agama</label></div>
                        <input class="easyui-combobox"
                            id="agamapengangkatan"
                            name="agamapengangkatan" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'get_agama.php',                           
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
                        <div class="labelfor"><label>Jenis Kelamin</label></div>
                        <input class="easyui-combobox"
                            id="jenis_kelaminpengangkatan"
                            name="jenis_kelaminpengangkatan" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'get_jenis_kelamin.php',                           
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">
                    </div>
                </td>
                <td>&nbsp;</td>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Agama</label></div>
                        <input class="easyui-combobox"
                            id="agamapengangkatan"
                            name="agamapengangkatan" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'get_agama.php',                           
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
                        <div class="labelfor"><label>NIK</label></div>
                        <input class="easyui-textbox" id="nikpengangkatan" name="nikpengangkatan" missingMessage="Harus di isi" data-options="required:true" style="width:100%;">
                    </div>
                </td>
                <td>&nbsp;</td>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>NPWP</label></div>
                        <input class="easyui-textbox" id="npwppengangkatan" name="npwppengangkatan" missingMessage="Harus di isi" data-options="required:true" style="width:100%;">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Tanggal Lahir</label></div>
                        <input class="easyui-datebox" id="tgl_lahirpengangkatan" name="tgl_lahirpengangkatan" editable="false" missingMessage="Harus di isi" data-options="required:true,formatter:myformatter,parser:myparser" style="width:100%;">
                    </div>
                </td>
                <td>&nbsp;</td>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Tgl Masuk</label></div>
                        <input class="easyui-datebox" id="tgl_masukpengangkatan" name="tgl_masukpengangkatan" editable="false" missingMessage="Harus di isi" data-options="required:true,formatter:myformatter,parser:myparser" style="width:100%;">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Tanggal Capeg</label></div>
                        <input class="easyui-datebox" id="tgl_capegpengangkatan" name="tgl_capegpengangkatan" editable="false" missingMessage="Harus di isi" data-options="required:true,formatter:myformatter,parser:myparser" style="width:100%;">
                    </div>
                </td>
                <td>&nbsp;</td>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Tgl Tetap</label></div>
                        <input class="easyui-datebox" id="tgl_tetappengangkatan" name="tgl_tetappengangkatan" editable="false" missingMessage="Harus di isi" data-options="required:true,formatter:myformatter,parser:myparser" style="width:100%;">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Keterangan Mutasi</label></div>
                        <input class="easyui-combobox"
                            id="keterangan_mutasipengangkatan"
                            name="keterangan_mutasipengangkatan" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'get_keterangan_mutasi.php',                           
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">
                    </div>
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonspengangkatan">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savepengangkatan()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgpengangkatan').dialog('close')" style="min-width:90px">Batal</a>
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
        /*
    	function addpengangkatan(){
    		$('#dlgpengangkatan').dialog('open').dialog('setTitle','Input Data Position Management');
    		$('#fmpengangkatan').form('clear');
            $("#end_datepengangkatan").datebox('setValue','9999-12-31');
            $("#ftkpengangkatan").textbox('setValue',1);
            $("#statuspengangkatan").combobox('setValue','Active');
    		url = 'save_pengangkatan.php';
    	}
        */
    	function editpengangkatan(index){
            var row = $('#dgpengangkatan').datagrid('getRow', index);
    		if (row){
                //alert(row.tgl_lahirpengangkatan);
                $('#dlgpengangkatan').dialog('open').dialog('setTitle','Update Data Pengangkatan');
                $('#fmpengangkatan').form('clear');
    			$('#fmpengangkatan').form('load',row);                 
                url = 'update_pengangkatan.php?id='+row.idpengangkatan;  
            }          
    	}
    	function savepengangkatan(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmpengangkatan').form('submit',{
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
                        $.post('updatedata/update_pengangkatan.php',{},function(result){},'json');
                        $('#dlgpengangkatan').dialog('close');
                        $('#dgpengangkatan').datagrid('reload');
                    }
                }
            });
    	}
    	function destroypengangkatan(index){
            var row = $('#dgpengangkatan').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('destroy_pengangkatan.php',{id:row.idpengangkatan},function(result){
    						if (result.success){
    							$('#dgpengangkatan').datagrid('reload');	// reload the user data
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

    	function uploadtemplatepengangkatan(){
    		$('#dlgtemplatepengangkatan').dialog('open').dialog('setTitle','Upoad Template Position Management');
            $('#fmtemplatepengangkatan').form('clear');
    		url = 'save_templatepengangkatan.php';
    	}
    	function savetemplatepengangkatan(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatepengangkatan').form('submit',{
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
                        $.post('updatedata/update_pengangkatan.php',{},function(result){},'json');
    					$('#dlgtemplatepengangkatan').dialog('close');
    					$('#dgpengangkatan').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgpengangkatan").height($(window).height() - 0);
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
        .labelfor{
            padding-bottom:3px !important;
            font-weight:bold;
        }
    </style>
<?php    
}
?>