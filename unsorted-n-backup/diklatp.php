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
		function doSearchdiklatp(){
            $('#dgdiklatp').datagrid('load',{
				namadiklatpcari: $('#namadiklatpcari').textbox('getValue')
			});
		}
        function aksidiklatp(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editdiklatp(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroydiklatp(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsidiklatp(){
            var nilai1 = $('#id_provinsidiklatp').combobox('getValue');
            var url1 = 'get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatendiklatp').combobox('enable');
            $('#id_kabupatendiklatp').combobox('clear'); 
            $('#id_kabupatendiklatp').combobox('reload',url1);
    	}

        function onselectnipdiklatp(){
			var nipnya = $('#nip_diklatp').combobox('getValue');            
			$.ajax({
				type: 'POST',
				url: 'get_jabatan_diklatp.php',
				data: {'nip':nipnya},
				success: function(result){
					//alert(result);
					var result = eval('('+result+')');
					$("#jabatan_diklatp").textbox('setValue',result.jabatan);
				}
			});
			
    	}		

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#jenis_diklatdiklatp').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#kode_diklatdiklatp').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatendiklatp').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#jenis_diklatdiklatp').combobox({
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
        $('#kode_diklatdiklatp').combobox({
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
        $('#id_kabupatendiklatp').combobox({
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
        $("#dgdiklatp").datagrid({
        });
    });
    </script>
    <table id="dgdiklatp" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_diklatp.php?nip=<?=$nip;?>" pageSize="20"        
    		toolbar="#toolbardiklatp" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksidiklatp" width="80" align="center" halign="center" data-options="formatter:aksidiklatp,styler:styler1">Aksi</th>
                <th field="start_date2diklatp" width="100" align="center" halign="center" data-options="styler:styler1">Start<br/>Date</th>
                <th field="end_date2diklatp" width="100" align="center" halign="center" data-options="styler:styler1">End<br/>Date</th>
    			<th field="jenis_diklat2diklatp" width="240" align="center" halign="center" data-options="styler:styler1">Jenis Diklat</th>
    			<th field="kode_diklat2diklatp" width="200" align="center" halign="center" data-options="styler:styler1">Kode Diklat</th>
    			<th field="judul_diklatdiklatp" width="300" align="center" halign="center" data-options="styler:styler1">Judul Diklat</th>
                <!--
    			<th field="tingkat_acara2diklatp" width="200" align="center" halign="center" data-options="styler:styler1">Tingkat Acara</th>
    			<th field="kode_dahan_profesidiklatp" width="200" align="center" halign="center" data-options="styler:styler1">Kode Dahan<br/>Profesi</th>
    			<th field="dahan_profesidiklatp" width="200" align="center" halign="center" data-options="styler:styler1">Dahan Profesi</th>
    			<th field="kode_diklatpdiklatp" width="200" align="center" halign="center" data-options="styler:styler1">Kode diklatp</th>
    			<th field="judul_diklatpdiklatp" width="200" align="center" halign="center" data-options="styler:styler1">Judul diklatp</th>
    			<th field="udiklatp2diklatp" width="200" align="center" halign="center" data-options="styler:styler1">Udiklatp</th>
    			<th field="jenis_pelaksanaan2diklatp" width="200" align="center" halign="center" data-options="styler:styler1">Jenis Pelaksanaan</th>
    			<th field="jenis_sertifikasi2diklatp" width="200" align="center" halign="center" data-options="styler:styler1">Jenis Sertifikat</th>
    			<th field="sifat_diklatp2diklatp" width="200" align="center" halign="center" data-options="styler:styler1">Sifat diklatp</th>
                -->
    		</tr>
    	</thead>
    </table>
    <div id="toolbardiklatp" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="adddiklatp()" style="min-width:90px;">Tambah</a>
        <!--<a target="_blank" href="template/template_diklatp.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template diklatp</a>-->
        <a class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template diklatp</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatediklatp()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatediklatp" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatediklatp">
    	<form id="fmtemplatediklatp" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template diklatp</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatediklatp" name="file_templatediklatp" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatediklatp">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatediklatp()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatediklatp').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgdiklatp" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsdiklatp">
    	<form id="fmdiklatp" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <!--<tr><td colspan="5"><span style="font-weight:bold;">Data Utama</span></td></tr>-->
            <tr>
                <td style="width:110px;">No Induk</td>
                <td><input class="easyui-textbox" id="nipdiklatp" name="nipdiklatp" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;" readonly></td>
                <td style="width:10px;"></td>
                <td style="width:100px;"></td>
            </tr>  
            <tr>
                <td>Start Date</td>
                <td><input class="easyui-datebox" id="start_datediklatp" name="start_datediklatp" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td style="width:10px;"></td>
                <td>End Date</td>
                <td><input class="easyui-datebox" id="end_datediklatp" name="end_datediklatp" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Jenis Diklat</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="jenis_diklatdiklatp"
                        name="jenis_diklatdiklatp" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_jenis_diklat.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Kode Diklat</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="kode_diklatdiklatp"
                        name="kode_diklatdiklatp" missingMessage="Harus di isi" editable="true"
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
                <td colspan="4"><input class="easyui-textbox" id="judul_diklatdiklatp" name="judul_diklatdiklatp" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Udiklat</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="udiklatdiklatp"
                        name="udiklatdiklatp" missingMessage="Harus di isi" editable="false"
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
                <td>Kode Profesi</td>
                <td>
                    <input class="easyui-combobox"
                        id="kode_profesidiklatp"
                        name="kode_profesidiklatp" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_profesi.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td style="width:10px;"></td>
                <td>Level Profesiensi</td>
                <td>
                    <input class="easyui-combobox"
                        id="level_profesiensidiklatp"
                        name="level_profesiensidiklatp" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_level_profesiensi.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Grade Nilai</td>
                <td><input class="easyui-textbox" id="grade_nilaidiklatp" name="grade_nilaidiklatp" data-options="required:false" style="width: 150px;"></td>
                <td style="width:10px;"></td>
                <td>Nilai</td>
                <td><input class="easyui-textbox" id="nilaidiklatp" name="nilaidiklatp" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Keterangan Lulus</td>
                <td><input class="easyui-textbox" id="keterangan_lulusdiklatp" name="keterangan_lulusdiklatp" data-options="required:false" style="width: 150px;"></td>
                <td></td>
                <td>Keterangan Penyelesaian</td>
                <td><input class="easyui-textbox" id="keterangan_penyelesaiandiklatp" name="keterangan_penyelesaiandiklatp" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Kode Sertifikat</td>
                <td><input class="easyui-textbox" id="kode_sertifikatdiklatp" name="kode_sertifikatdiklatp" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Tanggal Terbit</td>
                <td><input class="easyui-datebox" id="tgl_terbitdiklatp" name="tgl_terbitdiklatp" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td style="width:10px;"></td>
                <td>Tanggal Selesai</td>
                <td><input class="easyui-datebox" id="tgl_selesaidiklatp" name="tgl_selesaidiklatp" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Kode Transaksi</td>
                <td colspan="4"><input class="easyui-textbox" id="kode_transaksidiklatp" name="kode_transaksidiklatp" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsdiklatp">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savediklatp()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgdiklatp').dialog('close')" style="min-width:90px">Batal</a>
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
    	function adddiklatp(){
    		$('#dlgdiklatp').dialog('open').dialog('setTitle','Input Riwayat Diklat Penjenjangan');
    		$('#fmdiklatp').form('clear');
            $("#nipdiklatp").textbox('setValue','<?=$nip;?>');            
    		url = 'save_diklatp.php';
    	}
    	function editdiklatp(index){
            var row = $('#dgdiklatp').datagrid('getRow', index);
    		if (row){
                $('#dlgdiklatp').dialog('open').dialog('setTitle','Update Riwayat Diklat Penjenjangan');
                $('#fmdiklatp').form('clear');
    			$('#fmdiklatp').form('load',row); 
                url = 'update_diklatp.php?id='+row.iddiklatp;  
            } 
    	}
    	function savediklatp(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmdiklatp').form('submit',{
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
                        $.post('updatedata/update_diklatp.php',{},function(result){},'json');
                        $('#dlgdiklatp').dialog('close');
                        $('#dgdiklatp').datagrid('reload');
                    }
                }
            });
    	}
    	function destroydiklatp(index){
            var row = $('#dgdiklatp').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('destroy_diklatp.php',{id:row.iddiklatp},function(result){
    						if (result.success){
    							$('#dgdiklatp').datagrid('reload');	// reload the user data
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

    	function uploadtemplatediklatp(){
    		$('#dlgtemplatediklatp').dialog('open').dialog('setTitle','Upoad Template Riwayat diklatp');
            $('#fmtemplatediklatp').form('clear');
    		url = 'save_templatediklatp.php';
    	}
    	function savetemplatediklatp(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatediklatp').form('submit',{
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
                        $.post('updatedata/update_diklatp.php',{},function(result){},'json');
    					$('#dlgtemplatediklatp').dialog('close');
    					$('#dgdiklatp').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgdiklatp").height($(window).height() - 0);
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