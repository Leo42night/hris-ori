<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "sipeg/";
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
		function doSearchnatura(){
            $('#dgnatura').datagrid('load',{
				blthnaturacari: $('#blthnaturacari').datebox('getValue'),
				namanaturacari: $('#namanaturacari').textbox('getValue')
			});
		}
        function aksinatura(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editnatura(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroynatura(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsinatura(){
            var nilai1 = $('#id_provinsinatura').combobox('getValue');
            var url1 = 'get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatennatura').combobox('enable');
            $('#id_kabupatennatura').combobox('clear'); 
            $('#id_kabupatennatura').combobox('reload',url1);
    	}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#negaranatura').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_provinsinatura').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatennatura').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });
        
        function hitungnatura(){
            var cop = $("#copnatura").numberbox('getValue');
            var fasilitas_hp = $("#fasilitas_hpnatura").numberbox('getValue');
            var reimburse_kesehatan = $("#reimburse_kesehatannatura").numberbox('getValue');
            var asuransi_kesehatan = $("#asuransi_kesehatannatura").numberbox('getValue');
            var sarana_kerja = $("#sarana_kerjanatura").numberbox('getValue');
            var sppd_manual = $("#sppd_manualnatura").numberbox('getValue');
        }
        
        function formatrp2(val,row){
            if(val===""){
                return "";
            } else {
                return number_format2(val,0,',','.');
            }
        };
        
        function number_format2(num,dig,dec,sep) {
            x=new Array();
            s=(num<0?"-":"");
            num=Math.abs(num).toFixed(dig).split(".");
            r=num[0].split("").reverse();
            for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
            //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
            return s+x.join("")+(num[1]?dec+num[1]:"");
        }

    </script> 
    
    <script>        
        $('#negaranatura').combobox({
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
        $('#id_provinsinatura').combobox({
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
        $('#id_kabupatennatura').combobox({
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
        $("#dgnatura").datagrid({
        });
    });
    </script>
    <table id="dgnatura" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_natura.php" pageSize="20"        
    		toolbar="#toolbarnatura" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksinatura" width="80" align="center" halign="center" data-options="formatter:aksinatura,styler:styler1">Aksi</th>
    			<th field="nipnatura" width="120" align="center" halign="center" data-options="styler:styler1">NIP</th>
    			<th field="namanatura" width="240" align="left" halign="center" data-options="styler:styler1">Nama Pegawai</th>
                <th field="jabatannatura" width="240" align="left" halign="center" data-options="styler:styler1">Jabatan</th>
    			<th field="blthnatura" width="80" align="center" halign="center" data-options="styler:styler1">Bulan</th>
                <th field="copnatura" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">COP<br/>Kendaraan</th>
                <th field="fasilitas_hpnatura" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Fasilitas<br/>HP</th>
                <th field="reimburse_kesehatannatura" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Reimburse<br/>Kesehatan</th>
                <th field="asuransi_kesehatannatura" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Asuransi<br/>Kesehatan</th>
                <th field="sarana_kerjanatura" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Sarana<br/>Kerja</th>
                <th field="sppd_manualnatura" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">SPPD<br/>Manual</th>
                <th field="asuransi_purna_jabatannatura" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Asuransi<br/>Purna Jabatan</th>
                <th field="medical_checkupnatura" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Medical<br/>Check Up</th>
                <th field="non_rutin_penyesuaiannatura" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Non Rutin<br/>Penyesuaian</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarnatura" style="background-color:#fff;padding:5px;">
    	<div id="tbnatura" style="padding:3px">
            <table>
            <tr>
                <td>BULAN</td>
                <td>
                    <input class="easyui-datebox" id="blthnaturacari" name="blthnaturacari" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="namanaturacari" name="namanaturacari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchnatura()" style="min-width:90px;">Search</a>
                    <?php if($akses_proses==="1"){?>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addnatura()" style="min-width:90px;">Tambah</a>
                    <?php } ?>
                </td>
            </tr>
            </table>
    	</div>	
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="fa fa-file-excel" onclick="downloadtemplatenatura()" style="min-width:90px;">Download Template</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatenatura()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatenatura" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;top:50px;"
    		closed="true" buttons="#dlg-buttonstemplatenatura">
    	<form id="fmtemplatenatura" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatenatura" name="file_templatenatura" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatenatura">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatenatura()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatenatura').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgnatura" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;top:50px;"
    		closed="true" buttons="#dlg-buttonsnatura">
    	<form id="fmnatura" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>No Induk</label></div>
                        <input class="easyui-textbox" id="nipnatura" name="nipnatura" data-options="required:true" style="width: 190px;">
                    </div>
                </td> 
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Bulan</label></div>
                        <input class="easyui-datebox" id="blthnatura" name="blthnatura" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 190px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>COP Kendaraan</label></div>
                        <input class="easyui-numberbox" id="copnatura" name="copnatura" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Fasilitas HP</label></div>
                        <input class="easyui-numberbox" id="fasilitas_hpnatura" name="fasilitas_hpnatura" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Reimburse Kesehatan</label></div>
                        <input class="easyui-numberbox" id="reimburse_kesehatannatura" name="reimburse_kesehatannatura" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Asuransi Kesehatan</label></div>
                        <input class="easyui-numberbox" id="asuransi_kesehatannatura" name="asuransi_kesehatannatura" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Sarana Kerja</label></div>
                        <input class="easyui-numberbox" id="sarana_kerjanatura" name="sarana_kerjanatura" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>SPPD Manual</label></div>
                        <input class="easyui-numberbox" id="sppd_manualnatura" name="sppd_manualnatura" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Asuransi Purna Jabatan</label></div>
                        <input class="easyui-numberbox" id="asuransi_purna_jabatannatura" name="asuransi_purna_jabatannatura" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Medical Chekup</label></div>
                        <input class="easyui-numberbox" id="medical_checkupnatura" name="medical_checkupnatura" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Non Rutin Penyesuaian</label></div>
                        <input class="easyui-numberbox" id="non_rutin_penyesuaiannatura" name="non_rutin_penyesuaiannatura" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
                <td style="width:200px;">
                </td> 
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsnatura">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savenatura()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgnatura').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addnatura(){
    		$('#dlgnatura').dialog('open').dialog('setTitle','Input Data');
    		$('#fmnatura').form('clear');
            $("#nipnatura").textbox('readonly',false);
            $("#blthnatura").datebox('readonly',false);
    		url = '<?=$foldernya;?>save_natura.php';
    	}
    	function editnatura(index){
            var row = $('#dgnatura').datagrid('getRow', index);
    		if (row){
                $('#dlgnatura').dialog('open').dialog('setTitle','Update Data');
                $('#fmnatura').form('clear');
    			$('#fmnatura').form('load',row); 
                $("#nipnatura").textbox('readonly',true);
                $("#blthnatura").datebox('readonly',true);
                url = '<?=$foldernya;?>update_natura.php?id='+row.idnatura;  
            }          
    	}
    	function savenatura(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmnatura').form('submit',{
                url: url,
                onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
                },
                success: function(result){
                    // alert(result);
                    $.messager.progress('close');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlgnatura').dialog('close');
                        $('#dgnatura').datagrid('reload');
                    }
                }
            });
    	}
    	function destroynatura(index){
            var row = $('#dgnatura').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_natura.php',{id:row.idnatura},function(result){
    						if (result.success){
    							$('#dgnatura').datagrid('reload');	// reload the user data
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

    	function uploadtemplatenatura(){
    		$('#dlgtemplatenatura').dialog('open').dialog('setTitle','Upoad Template');
            $('#fmtemplatenatura').form('clear');
    		url = '<?=$foldernya;?>save_templatenatura.php';
    	}
    	function savetemplatenatura(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatenatura').form('submit',{
    			url: url,
    			onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
    			},
    			success: function(result){
                    // alert(result);
                    $.messager.progress('close');
    				if (result.errorMsg){
    					$.messager.show({
    						title: 'Error',
    						msg: result.errorMsg
    					});
    				} else {
    					$('#dlgtemplatenatura').dialog('close');
    					$('#dgnatura').datagrid('reload');
    				}
    			}
    		});
    	}

        function downloadtemplatenatura(){
            var blthnya = $('#blthnaturacari').datebox('getValue');
            window.open("<?=$foldernya;?>download_natura.php?blth="+blthnya,"_blank");
        }

        //$("#dgnatura").height($(window).height() - 0);
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
        .labelfor {
            font-weight:bold;
            font-size:11.5px;
            margin-bottom:3px !important;
            margin-top:5px !important;
        }

    </style>
<?php    
}
?>