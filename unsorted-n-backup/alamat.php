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
    $rs2 = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip'");
    $hasil2 = mysqli_fetch_array($rs2);
    $start_date = stripslashes ($hasil2['start_date']);
    $end_date = stripslashes ($hasil2['end_date']);
    $nama_lengkap = stripslashes ($hasil2['nama_lengkap']);
    $kode_negara = stripslashes ($hasil2['kode_negara']);
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
		function doSearchalamat(){
            $('#dgalamat').datagrid('load',{
				namaalamatcari: $('#namaalamatcari').textbox('getValue')
			});
		}
        function aksialamat(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editalamat(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroyalamat(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsialamat(){
            var nilai1 = $('#id_provinsialamat').combobox('getValue');
            var url1 = 'get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatenalamat').combobox('enable');
            $('#id_kabupatenalamat').combobox('clear'); 
            $('#id_kabupatenalamat').combobox('reload',url1);
    	}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#negaraalamat').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_provinsialamat').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenalamat').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#negaraalamat').combobox({
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
        $('#id_provinsialamat').combobox({
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
        $('#id_kabupatenalamat').combobox({
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
        $("#dgalamat").datagrid({
        });
    });
    </script>
    <table id="dgalamat" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_alamat.php?nip=<?=$nip;?>" pageSize="20"        
    		toolbar="#toolbaralamat" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksialamat" width="80" align="center" halign="center" data-options="formatter:aksialamat,styler:styler1">Aksi</th>
    			<th field="jenis_alamat2alamat" width="120" align="center" halign="center" data-options="styler:styler1">Jenis Alamat</th>
    			<th field="rumah_atas_namaalamat" width="180" align="center" halign="center" data-options="styler:styler1">Rumah Atas Nama</th>
    			<th field="alamat_lengkapalamat" width="250" align="left" halign="center" data-options="styler:styler1">Alamat Lengkap</th>
    			<th field="nama_provinsialamat" width="180" align="center" halign="center" data-options="styler:styler1">Provinsi</th>
                <th field="nama_kabupatenalamat" width="180" align="center" halign="center" data-options="styler:styler1">Kabupaten</th>
                <th field="negara2alamat" width="160" align="center" halign="center" data-options="styler:styler1">Negara</th>
                <th field="kode_posalamat" width="80" align="center" halign="center" data-options="styler:styler1">Kode Pos</th>
                <th field="jarak2alamat" width="100" align="right" halign="center" data-options="styler:styler1">Jarak</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbaralamat" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addalamat()" style="min-width:90px;">Tambah</a>
        <a target="_blank" href="template/template_alamat.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template alamat</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatealamat()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatealamat" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatealamat">
    	<form id="fmtemplatealamat" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template Alamat</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatealamat" name="file_templatealamat" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatealamat">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatealamat()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatealamat').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgalamat" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsalamat">
    	<form id="fmalamat" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <!--<tr><td colspan="5"><span style="font-weight:bold;">Data Utama</span></td></tr>-->
            <tr>
                <td style="width:100px;">No Induk</td>
                <td><input class="easyui-textbox" id="nipalamat" name="nipalamat" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;" readonly></td>
            </tr>  
            <tr>
                <td>Start Date</td>
                <td><input class="easyui-datebox" id="start_datealamat" name="start_datealamat" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>End Date</td>
                <td><input class="easyui-datebox" id="end_datealamat" name="end_datealamat" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Jenis Alamat</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenis_alamatalamat"
                        name="jenis_alamatalamat" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_jenis_alamat.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Rumah AN.</td>
                <td><input class="easyui-textbox" id="rumah_atas_namaalamat" name="rumah_atas_namaalamat" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>
            <tr>
                <td>Alamat Lengkap</td>
                <td><input class="easyui-textbox" id="alamat_lengkapalamat" name="alamat_lengkapalamat" missingMessage="Harus di isi" data-options="required:true,multiline:true" style="width: 425px;height:40px;"></td>
            </tr>  
            <tr>
                <td>Provinsi</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="id_provinsialamat"
                        name="id_provinsialamat" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            onSelect:onSelectprovinsialamat,
                            url:'get_provinsi.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'160px'
                    ">
                </td>
            </tr>
            <tr>
                <td>Kab./Kota</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="id_kabupatenalamat"
                        name="id_kabupatenalamat" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'160px'
                    ">
                </td>
            </tr>
            <tr>
                <td>Kode Pos</td>
                <td><input class="easyui-textbox" id="kode_posalamat" name="kode_posalamat" missingMessage="Harus di isi" data-options="required:true" style="width: 80px;"></td>
            </tr>
            <tr>
                <td>Negara</td>
                <td>
                    <input class="easyui-combobox"
                        id="negaraalamat"
                        name="negaraalamat" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_negara.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Jarak</td>
                <td colspan="4"><input class="easyui-numberbox" id="jarakalamat" name="jarakalamat" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 60px;">&nbsp;KM (dari kantor)</td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsalamat">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savealamat()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgalamat').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addalamat(){
    		$('#dlgalamat').dialog('open').dialog('setTitle','Input Data Alamat');
    		$('#fmalamat').form('clear');
            $("#nipalamat").textbox('setValue','<?=$nip;?>');
            $("#start_datealamat").datebox('setValue','<?=$start_date;?>');
            $("#end_datealamat").datebox('setValue','<?=$end_date;?>');
            $("#negaraalamat").textbox('setValue','Indonesia');
    		url = 'save_alamat.php';
    	}
    	function editalamat(index){
            var row = $('#dgalamat').datagrid('getRow', index);
    		if (row){
                $('#dlgalamat').dialog('open').dialog('setTitle','Update Data Alamat');
                $('#fmalamat').form('clear');
    			$('#fmalamat').form('load',row); 
                $('#id_kabupatenalamat').combobox('reload','get_kabupaten.php?id_provinsi='+row.id_provinsialamat);
                url = 'update_alamat.php?id='+row.idalamat;  
            }          
    	}
    	function savealamat(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmalamat').form('submit',{
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
                        $.post('updatedata/update_alamat.php',{},function(result){},'json');
                        $('#dlgalamat').dialog('close');
                        $('#dgalamat').datagrid('reload');
                    }
                }
            });
    	}
    	function destroyalamat(index){
            var row = $('#dgalamat').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data alamat ini?',function(r){
    				if (r){
    					$.post('destroy_alamat.php',{id:row.idalamat},function(result){
    						if (result.success){
    							$('#dgalamat').datagrid('reload');	// reload the user data
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

    	function uploadtemplatealamat(){
    		$('#dlgtemplatealamat').dialog('open').dialog('setTitle','Upoad Template Alamat');
            $('#fmtemplatealamat').form('clear');
    		url = 'save_templatealamat.php';
    	}
    	function savetemplatealamat(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatealamat').form('submit',{
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
                        $.post('updatedata/update_alamat.php',{},function(result){},'json');
    					$('#dlgtemplatealamat').dialog('close');
    					$('#dgalamat').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgalamat").height($(window).height() - 0);
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