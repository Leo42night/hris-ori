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
		function doSearchjabatan(){
            $('#dgjabatan').datagrid('load',{
				namajabatancari: $('#namajabatancari').textbox('getValue')
			});
		}
        function aksijabatan(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editjabatan(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroyjabatan(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectjenisjabatan(){
            var nilai1 = $('#jenis_jabatan').combobox('getValue');
            var url1 = 'get_jenjang_jabatan.php?kode_jenis_jabatan='+nilai1;
            $('#jenjang_jabatan').combobox('enable');
            $('#jenjang_jabatan').combobox('clear'); 
            $('#jenjang_jabatan').combobox('reload',url1);
    	}

        function onSelectprovinsijabatan(){
            var nilai1 = $('#id_provinsijabatan').combobox('getValue');
            var url1 = 'get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatenjabatan').combobox('enable');
            $('#id_kabupatenjabatan').combobox('clear'); 
            $('#id_kabupatenjabatan').combobox('reload',url1);
    	}

        function onselectpersonalarea(){
            var nilai1 = $('#personal_areajabatan').combobox('getValue');
            var url1 = 'get_personal_sub_area.php?personal_area='+nilai1;
            $('#personal_sub_areajabatan').combobox('enable');
            $('#personal_sub_areajabatan').combobox('clear'); 
            $('#personal_sub_areajabatan').combobox('reload',url1);
    	}
        
		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#personal_areajabatan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#personal_sub_areajabatan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#negara_institusijabatan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_provinsijabatan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenjabatan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#kode_profesijabatan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
    </script> 
    
    <script>        
        $('#personal_areajabatan').combobox({
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
        $('#personal_sub_areajabatan').combobox({
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
        $('#negara_institusijabatan').combobox({
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
        $('#id_provinsijabatan').combobox({
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
        $('#id_kabupatenjabatan').combobox({
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
        $('#kode_profesijabatan').combobox({
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
        $("#dgjabatan").datagrid({
        });
    });
    </script>
    <table id="dgjabatan" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_jabatan.php?nip=<?=$nip;?>" pageSize="20"        
    		toolbar="#toolbarjabatan" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksijabatan" width="80" align="center" halign="center" data-options="formatter:aksijabatan,styler:styler1">Aksi</th>
                <th field="start_date2jabatan" width="100" align="center" halign="center" data-options="styler:styler1">Start Date</th>
                <th field="end_date2jabatan" width="100" align="center" halign="center" data-options="styler:styler1">End Date</th>
    			<th field="ee_group2jabatan" width="180" align="center" halign="center" data-options="styler:styler1">EE Group</th>
    			<th field="ee_subgroup2jabatan" width="200" align="center" halign="center" data-options="styler:styler1">EE Sub Group</th>
    			<th field="jabatanjabatan" width="180" align="center" halign="center" data-options="styler:styler1">Jabatan</th>
                <!--<th field="organisasijabatan" width="300" align="left" halign="center" data-options="styler:styler1">Organisasi</th>-->
                <th field="jenis_jabatan2" width="180" align="center" halign="center" data-options="styler:styler1">Jenis Jabatan</th>
                <th field="jenjang_jabatan2" width="180" align="center" halign="center" data-options="styler:styler1">Jenjang Jabatan</th>
                <th field="jenis_jabatan_ap2jabatan" width="180" align="center" halign="center" data-options="styler:styler1">Jenis Jabatan AP</th>
                <th field="jenjang_jabatan_ap2jabatan" width="180" align="center" halign="center" data-options="styler:styler1">Jenjang Jabatan AP</th>
                <th field="kode_profesijabatan" width="100" align="center" halign="center" data-options="styler:styler1">Kode Profesi</th>
                <th field="nama_profesijabatan" width="180" align="left" halign="left" data-options="styler:styler1">Nama Profesi</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarjabatan" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addjabatan()" style="min-width:90px;">Tambah</a>
        <a target="_blank" href="template/template_jabatan.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-download" plain="false" style="min-width:90px;">Template jabatan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-upload" plain="false" onclick="uploadtemplatejabatan()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatejabatan" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatejabatan">
    	<form id="fmtemplatejabatan" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template jabatan</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatejabatan" name="file_templatejabatan" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatejabatan">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatejabatan()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatejabatan').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgjabatan" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsjabatan">
    	<form id="fmjabatan" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <!--<tr><td colspan="5"><span style="font-weight:bold;">Data Utama</span></td></tr>-->
            <tr>
                <td style="width:100px;">No Induk</td>
                <td><input class="easyui-textbox" id="nipjabatan" name="nipjabatan" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;" readonly></td>
                <td style="width:10px;">&nbsp;</td>
            </tr>  
            <tr>
                <td>Start Date</td>
                <td><input class="easyui-datebox" id="start_datejabatan" name="start_datejabatan" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td></td>
                <td>End Date</td>
                <td><input class="easyui-datebox" id="end_datejabatan" name="end_datejabatan" editable="false" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>EE Group</td>
                <td>
                    <input class="easyui-combobox"
                        id="ee_groupjabatan"
                        name="ee_groupjabatan" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_ee_group.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td>EE Sub Group</td>
                <td>
                    <input class="easyui-combobox"
                        id="ee_subgroupjabatan"
                        name="ee_subgroupjabatan" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_ee_subgroup.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Job Key</td>
                <td colspan="4"><input class="easyui-textbox" id="job_keyjabatan" name="job_keyjabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Jabatan</td>
                <td colspan="4"><input class="easyui-textbox" id="jabatanjabatan" name="jabatanjabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <!--
            <tr>
                <td>Organisasi</td>
                <td colspan="4"><input class="easyui-textbox" id="organisasijabatan" name="organisasijabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>
            -->  
            <tr>
                <td>Kota Organisasi</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="kota_organisasijabatan"
                        name="kota_organisasijabatan" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 425px;" 
                        data-options="  
                            url:'get_kabupaten.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Jenis Jabatan</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenis_jabatan"
                        name="jenis_jabatan" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_jenis_jabatan.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td>Jenjang Jabatan</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenjang_jabatan"
                        name="jenjang_jabatan" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_jenjang_jabatan.php',                           
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
                <td colspan="4">
                    <!--<input class="easyui-textbox" id="kode_profesijabatan" name="kode_profesijabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;">-->
                    <input class="easyui-combobox"
                        id="kode_profesijabatan"
                        name="kode_profesijabatan" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_profesi.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">

            </tr>  
            <!--
            <tr>
                <td>Nama Profesi</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="nama_profesijabatan" name="nama_profesijabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>
            </tr>  
            -->
            <tr>
                <td>Jenis Unit</td>
                <td><input class="easyui-textbox" id="jenis_unitjabatan" name="jenis_unitjabatan" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;"></td>
                <td style="width:10px;">&nbsp;</td>
                <td>Kelas Unit</td>
                <td><input class="easyui-textbox" id="kelas_unitjabatan" name="kelas_unitjabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Kode Daerah</td>
                <td><input class="easyui-textbox" id="kode_daerahjabatan" name="kode_daerahjabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
                <td style="width:10px;">&nbsp;</td>
                <td>Stream Business</td>
                <td><input class="easyui-textbox" id="stream_businessjabatan" name="stream_businessjabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <!--
            <tr>
                <td>Nip Atasan</td>
                <td colspan="4"><input class="easyui-textbox" id="nip_atasanjabatan" name="nip_atasanjabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Jabatan Atasan</td>
                <td colspan="4"><input class="easyui-textbox" id="jabatan_atasanjabatan" name="jabatan_atasanjabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;"></td>
            </tr> 
            -->
            <tr>
                <td>Achievements</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="achievementsjabatan" name="achievementsjabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>
            </tr>  
            <tr>
                <td>Tupoksi</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="tupoksijabatan" name="tupoksijabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Company Code</td>
                <td>
                    <!--<input class="easyui-textbox" id="company_codejabatan" name="company_codejabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;">-->
                    <input class="easyui-combobox"
                        id="company_codejabatan"
                        name="company_codejabatan" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_ccode.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td>Business Area</td>
                <td>
                    <!--<input class="easyui-textbox" id="business_areajabatan" name="business_areajabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;">-->
                    <input class="easyui-combobox"
                        id="business_areajabatan"
                        name="business_areajabatan" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_barea.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Personal Area</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="personal_areajabatan"
                        name="personal_areajabatan" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            onSelect:onselectpersonalarea,
                            url:'get_personal_area.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Personal Sub Area</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="personal_sub_areajabatan"
                        name="personal_sub_areajabatan" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Level Organisasi1</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi1jabatan" name="level_organisasi1jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Level Organisasi2</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi2jabatan" name="level_organisasi2jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Level Organisasi3</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi3jabatan" name="level_organisasi3jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Level Organisasi4</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi4jabatan" name="level_organisasi4jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Level Organisasi5</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi5jabatan" name="level_organisasi5jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Level Organisasi6</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi6jabatan" name="level_organisasi6jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Level Organisasi7</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi7jabatan" name="level_organisasi7jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Level Organisasi8</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi8jabatan" name="level_organisasi8jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Level Organisasi9</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi9jabatan" name="level_organisasi9jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Level Organisasi10</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi10jabatan" name="level_organisasi10jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Level Organisasi11</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi11jabatan" name="level_organisasi11jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Level Organisasi12</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi12jabatan" name="level_organisasi12jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Level Organisasi13</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi13jabatan" name="level_organisasi13jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Level Organisasi14</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi14jabatan" name="level_organisasi14jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Level Organisasi15</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="level_organisasi15jabatan" name="level_organisasi15jabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 425px;">
                </td>                
            </tr>  
            <tr>
                <td>Tingkat Pengalaman</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="tingkat_pengalamanjabatan"
                        name="tingkat_pengalamanjabatan" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_tingkat_pengalaman.php',
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Jenis Jabatan AP</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenis_jabatan_apjabatan"
                        name="jenis_jabatan_apjabatan" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_jenis_jabatan.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td>Jenjang Jabatan AP</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenjang_jabatan_apjabatan"
                        name="jenjang_jabatan_apjabatan" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_jenjang_jabatan.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>Kode Posisi</td>
                <td>
                    <input class="easyui-textbox" id="kode_posisijabatan" name="kode_posisijabatan" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;">
                </td>
            </tr>  

            </table>
    	</form>
    </div>
    <div id="dlg-buttonsjabatan">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savejabatan()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgjabatan').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addjabatan(){
    		$('#dlgjabatan').dialog('open').dialog('setTitle','Input Data jabatan');
    		$('#fmjabatan').form('clear');
            $("#nipjabatan").textbox('setValue','<?=$nip;?>');            
    		url = 'save_jabatan.php';
    	}
    	function editjabatan(index){
            var row = $('#dgjabatan').datagrid('getRow', index);
    		if (row){
                $('#dlgjabatan').dialog('open').dialog('setTitle','Update Data jabatan');
                $('#fmjabatan').form('clear');
    			$('#fmjabatan').form('load',row); 
                $('#personal_sub_areajabatan').combobox('reload','get_personal_sub_area.php?personal_area='+row.personal_areajabatan); 
                url = 'update_jabatan.php?id='+row.idjabatan;  
            }          
    	}
    	function savejabatan(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmjabatan').form('submit',{
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
                        $('#dlgjabatan').dialog('close');
                        $('#dgjabatan').datagrid('reload');
                    }
                }
            });
    	}
    	function destroyjabatan(index){
            var row = $('#dgjabatan').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('destroy_jabatan.php',{id:row.idjabatan},function(result){
    						if (result.success){
    							$('#dgjabatan').datagrid('reload');	// reload the user data
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

    	function uploadtemplatejabatan(){
    		$('#dlgtemplatejabatan').dialog('open').dialog('setTitle','Upoad Template jabatan');
            $('#fmtemplatejabatan').form('clear');
    		url = 'save_templatejabatan.php';
    	}
    	function savetemplatejabatan(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatejabatan').form('submit',{
    			url: url,
    			onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
    			},
    			success: function(result){
                    $.messager.progress('close');
    				if (result.errorMsg){
    					$.messager.show({
    						title: 'Error',
    						msg: result.errorMsg
    					});
    				} else {
                        $.post('updatedata/update_jabatan.php',{},function(result){},'json');
    					$('#dlgtemplatejabatan').dialog('close');
    					$('#dgjabatan').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgjabatan").height($(window).height() - 0);
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