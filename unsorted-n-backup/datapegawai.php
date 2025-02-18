<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
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

        function changeknowas(){            
            var gelar_depan = $("#gelar_depandatapegawai").combobox('getText');
            var gelar_belakang = $("#gelar_belakangdatapegawai").combobox('getText');
            var nama_lengkap = $("#nama_lengkapdatapegawai").textbox('getValue');
            var know_as = "";            
            if(gelar_depan!=="" && gelar_depan!=="-"){
                know_as += gelar_depan+" ";
            }            
            know_as += nama_lengkap;
            if(gelar_belakang!=="" && gelar_belakang!=="-"){
                know_as += " "+gelar_belakang;
            }
            $("#know_asdatapegawai").textbox('setValue',know_as);
        }
    </script>

    <script type="text/javascript">                     
		function doSearchpegawai(){
            $('#dgdatapegawai').datagrid('load',{
				namapegawaicari: $('#namapegawaicari').textbox('getValue')
			});
		}
        function aksipegawai(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editpegawai(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroypegawai(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                var c = '<a href="javascript:void(0)" title="Riwayat" onclick="detailpegawai(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:8px !important;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                var c = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:10px;"></i></button></a>';
            }
            //var c = '<br/><a href="javascript:void(0)" title="Riwayat datapegawai" onclick="detailpegawai(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:100%;min-height:25px;font-size:10.5px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;padding:5px;">RIWAYAT</button></a>';
            return a+b+c;
        }  
        function aksipegawai2(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            var a = '<a href="javascript:void(0)" title="Riwayat datapegawai" onclick="detailpegawai(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:100%;min-height:25px;font-size:10.5px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;padding:5px;">RIWAYAT</button></a>';
            return a;
        }  

        function namanya(value,row,index){
            var a = row.user_fullnameuser;
            var b = '<span style="color:#337ab7;">'+row.jabatanuser+'</span>';
            return a+"<br/>"+b;
        }  

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#kode_negarapegawai').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#sukupegawai').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#kode_negarapegawai').combobox({
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
        $('#sukupegawai').combobox({
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
        $("#dgdatapegawai").datagrid({
            onDblClickRow: function() {
                //editUser();
            }            
        });
        $('#ttd2user').filebox({
            buttonText: 'Pilih File',
            buttonAlign: 'left'
        })        
    });
    </script>
    <table id="dgdatapegawai" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="get_master_datapegawai.php" pageSize="20"        
    		toolbar="#toolbardatapegawai" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
		<thead data-options="frozen:true">
			<tr>
                <th field="aksidatapegawai" width="110" align="center" halign="center" data-options="formatter:aksipegawai,styler:styler1">Aksi</th>
    			<th field="nipdatapegawai" width="120" align="center" halign="center" data-options="styler:styler1">No Induk</th>
    			<th field="nama_lengkapdatapegawai" width="160" align="left" halign="center" data-options="styler:styler1">Nama Lengkap</th>
			</tr>
		</thead>
    	<thead>
    		<tr>
                <th field="start_date2datapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Start Date</th>
                <th field="end_date2datapegawai" width="100" align="center" halign="center" data-options="styler:styler1">End Date</th>
    			<th field="tempat_lahirdatapegawai" width="160" align="center" halign="center" data-options="styler:styler1">Tempat Lahir</th>
    			<th field="tgl_lahir2datapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Lahir</th>
                <th field="jenis_kelamin2datapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Jenis<br/>Kelamin</th>
                <th field="nama_agamadatapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Agama</th>
                <th field="gol_darah2datapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Golongan<br/>Darah</th>
                <th field="status_nikah2datapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Status<br/>Nikah</th>
                <th field="tgl_masuk2datapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Masuk</th>
                <th field="tgl_capeg2datapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Capeg</th>
                <th field="tgl_tetap2datapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Tetap</th>
                <th field="title2datapegawai" width="50" align="center" halign="center" data-options="styler:styler1">Title</th>
                <th field="gelar_depan2datapegawai" width="80" align="center" halign="center" data-options="styler:styler1">Gelar<br/>Depan</th>
                <th field="gelar_belakang2datapegawai" width="80" align="center" halign="center" data-options="styler:styler1">Gelar<br/>Belakang</th>
                <th field="bank_dplkdatapegawai" width="80" align="center" halign="center" data-options="styler:styler1">Bank DPLK</th>
                <th field="id_dplkdatapegawai" width="140" align="center" halign="center" data-options="styler:styler1">ID DPLK</th>
                <th field="no_bpjs_kesdatapegawai" width="140" align="center" halign="center" data-options="styler:styler1">BPJS Kes</th>
                <th field="no_bpjs_tkdatapegawai" width="140" align="center" halign="center" data-options="styler:styler1">BPJS TK</th>
                <th field="bank_payrolldatapegawai" width="80" align="center" halign="center" data-options="styler:styler1">Bank<br/>Payroll</th>
                <th field="no_rek_payrolldatapegawai" width="140" align="center" halign="center" data-options="styler:styler1">No Rekening<br/>Payroll</th>
                <th field="an_payrolldatapegawai" width="160" align="center" halign="center" data-options="styler:styler1">Atas Nama</th>
                <th field="status_integrasi2datapegawai" width="120" align="center" halign="center" data-options="styler:styler1">Status<br/>Integrasi</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbardatapegawai" style="background-color:#fff;padding:5px;">
    	<div id="tbdatapegawai" style="padding:3px">
            <table>
            <tr>
                <td style="padding-right:5px;">NIP</td>
                <td style="padding-right:10px;">
                    <input class="easyui-textbox" id="namapegawaicari" name="namapegawaicari" data-options="required:false,prompt:'search'" style="width: 160px;">
                </td>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchpegawai()" style="min-width:90px;">Search</a>
                </td>
            </tr>
            </table>
    	</div>        
        <?php if($akses_proses==="1"){?>
        <!--
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addpegawai()" style="min-width:90px;">Tambah</a>
        <a target="_blank" href="template/template_pegawai.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template Pegawai</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatepeg()" style="min-width:90px;">Upload Template</a>     
        -->
        <?php } ?>
    </div>
    
    <div id="dlgtemplatepeg" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatepeg">
    	<form id="fmtemplatepeg" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template Pegawai</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatepeg" name="file_templatepeg" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatepeg">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatepeg()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatepeg').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgdatapegawai" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsdatapegawai">
    	<form id="fmdatapegawai" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <!--<tr><td colspan="5"><span style="font-weight:bold;">Data Utama</span></td></tr>-->
            <tr>
                <td style="width:100px;">No Induk</td>
                <td><input class="easyui-textbox" id="nipdatapegawai" name="nipdatapegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;"></td>
                <td style="width:10px;">&nbsp;</td>
                <td style="width:100px;">Start Date</td>
                <td><input class="easyui-datebox" id="start_datedatapegawai" name="start_datedatapegawai" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>End Date</td>
                <td><input class="easyui-datebox" id="end_datedatapegawai" name="end_datedatapegawai" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td style="width:10px;">&nbsp;</td>
                <td>Tanggal Masuk</td>
                <td><input class="easyui-datebox" id="tgl_masukdatapegawai" name="tgl_masukdatapegawai" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Tanggal Capeg</td>
                <td><input class="easyui-datebox" id="tgl_capegdatapegawai" name="tgl_capegdatapegawai" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td style="width:10px;">&nbsp;</td>
                <td>Tanggal Tetap</td>
                <td><input class="easyui-datebox" id="tgl_tetapdatapegawai" name="tgl_tetapdatapegawai" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Title</td>
                <td>
                    <input class="easyui-combobox"
                        id="titledatapegawai"
                        name="titledatapegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options="                             
                            url:'get_title.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td colspan="4"><input class="easyui-textbox" id="nama_lengkapdatapegawai" name="nama_lengkapdatapegawai" missingMessage="Harus di isi" data-options="onChange:changeknowas,required:true" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Gelar Depan</td>
                <td>
                    <input class="easyui-combobox"
                        id="gelar_depandatapegawai"
                        name="gelar_depandatapegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            onChange:changeknowas,
                            url:'get_gelar_depan.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td>Gelar Belakang</td>
                <td>
                    <input class="easyui-combobox"
                        id="gelar_belakangdatapegawai"
                        name="gelar_belakangdatapegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            onChange:changeknowas,
                            url:'get_gelar_belakang.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>
            <tr>
                <td>Know As</td>
                <td colspan="4"><input class="easyui-textbox" id="know_asdatapegawai" name="know_asdatapegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td>Tempat Lahir</td>
                <td><input class="easyui-textbox" id="tempat_lahirdatapegawai" name="tempat_lahirdatapegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;"></td>
                <td style="width:10px;">&nbsp;</td>
                <td>Tanggal Lahir</td>
                <td><input class="easyui-datebox" id="tgl_lahirdatapegawai" name="tgl_lahirdatapegawai" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Neg. Kelahiran</td>
                <td>
                    <input class="easyui-combobox"
                        id="kode_negaradatapegawai"
                        name="kode_negaradatapegawai" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_negara.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td>Jenis Kelamin</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenis_kelamindatapegawai"
                        name="jenis_kelamindatapegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_jenis_kelamin.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>
                    <input class="easyui-combobox"
                        id="id_agamadatapegawai"
                        name="id_agamadatapegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_agama.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td>Status Nikah</td>
                <td>
                    <input class="easyui-combobox"
                        id="status_nikahdatapegawai"
                        name="status_nikahdatapegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_status_nikah.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>
            <tr>
                <td>Tanggal Nikah</td>
                <td><input class="easyui-datebox" id="tgl_nikahdatapegawai" name="tgl_nikahdatapegawai" editable="true" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 150px;"></td>
                <td style="width:10px;">&nbsp;</td>
                <td>Warganegara</td>
                <td>
                    <input class="easyui-combobox"
                        id="status_warganegaradatapegawai"
                        name="status_warganegaradatapegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_status_warganegara.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>
            <tr>
                <td>Gol Darah</td>
                <td>
                    <input class="easyui-combobox"
                        id="gol_darahdatapegawai"
                        name="gol_darahdatapegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_gol_darah.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td>Suku</td>
                <td>
                    <input class="easyui-combobox"
                        id="sukudatapegawai"
                        name="sukudatapegawai" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 150px;" 
                        data-options=" 
                            url:'get_suku.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>
            <tr><td colspan="5" style="padding-top:10px;"><span style="font-weight:bold;">Nomor Telepon</span></td></tr>
            <tr>
                <td style="width:100px;">Utama</td>
                <td><input class="easyui-textbox" id="telepon_utamadatapegawai" name="telepon_utamadatapegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;"></td>
                <td style="width:10px;">&nbsp;</td>
                <td style="width:100px;">Cadangan 1</td>
                <td><input class="easyui-textbox" id="telepon_cadangan1datapegawai" name="telepon_cadangan1datapegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td style="width:100px;">Cadangan 2</td>
                <td><input class="easyui-textbox" id="telepon_cadangan2datapegawai" name="telepon_cadangan2datapegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
                <td style="width:10px;">&nbsp;</td>
                <td style="width:100px;">Cadangan 3</td>
                <td><input class="easyui-textbox" id="telepon_cadangan3datapegawai" name="telepon_cadangan3datapegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td style="width:100px;">Darurat</td>
                <td><input class="easyui-textbox" id="telepon_daruratdatapegawai" name="telepon_daruratdatapegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr><td colspan="5" style="padding-top:10px;"><span style="font-weight:bold;">Data DPLK</span></td></tr>
            <tr>
                <td style="width:100px;">Jenis DPLK</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="jenis_dplkdatapegawai"
                        name="jenis_dplkdatapegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_jenis_dplk.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td style="width:100px;">ID DPLK</td>
                <td><input class="easyui-textbox" id="id_dplkdatapegawai" name="id_dplkdatapegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
                <td style="width:10px;">&nbsp;</td>
                <td style="width:100px;">Bank DPLK</td>
                <td><input class="easyui-textbox" id="bank_dplkdatapegawai" name="bank_dplkdatapegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr><td colspan="5" style="padding-top:10px;"><span style="font-weight:bold;">Data BPJS</span></td></tr>
            <tr>
                <td style="width:100px;">No BPJS Kes</td>
                <td><input class="easyui-textbox" id="no_bpjs_kesdatapegawai" name="no_bpjs_kesdatapegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
                <td style="width:10px;">&nbsp;</td>
                <td style="width:100px;">No BPJS TK</td>
                <td><input class="easyui-textbox" id="no_bpjs_tkdatapegawai" name="no_bpjs_tkdatapegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 150px;"></td>
            </tr>  
            <tr><td colspan="5" style="padding-top:10px;"><span style="font-weight:bold;">Data Bank Payroll</span></td></tr>
            <tr>
                <td style="width:100px;">Bank Payroll</td>
                <td><input class="easyui-textbox" id="bank_payrolldatapegawai" name="bank_payrolldatapegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;"></td>
                <td style="width:10px;">&nbsp;</td>
                <td style="width:100px;">No Rekening</td>
                <td><input class="easyui-textbox" id="no_rek_payrolldatapegawai" name="no_rek_payrolldatapegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td style="width:100px;">Atas Nama</td>
                <td colspan="4"><input class="easyui-textbox" id="an_payrolldatapegawai" name="an_payrolldatapegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 425px;"></td>
            </tr>  
            <tr>
                <td style="width:100px;">Status Integrasi</td>
                <td colspan="4">
                    <input class="easyui-combobox"
                        id="status_integrasidatapegawai"
                        name="status_integrasidatapegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 425px;" 
                        data-options=" 
                            url:'get_status_integrasi.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsdatapegawai">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savepegawai()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgpegawai').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addpegawai(){
    		$('#dlgpegawai').dialog('open').dialog('setTitle','Input Data Pegawai');
    		$('#fmpegawai').form('clear');
            $("#end_datedatapegawai").datebox('setValue','9999-12-31');
    		url = 'save_pegawai.php';
    	}
    	function editpegawai(index){
            var row = $('#dgdatapegawai').datagrid('getRow', index);
    		if (row){
                $('#dlgpegawai').dialog('open').dialog('setTitle','Update Data Pegawai');
                $('#fmpegawai').form('clear');
    			$('#fmpegawai').form('load',row);      
                url = 'update_pegawai.php?id='+row.idpegawai;  
            }          
    	}
    	function savepegawai(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmpegawai').form('submit',{
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
                        $('#dlgpegawai').dialog('close');
                        $('#dgdatapegawai').datagrid('reload');
                    }
                }
            });
    	}
    	function destroypegawai(index){
            var row = $('#dgdatapegawai').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data pegawai "'+row.nama_lengkappegawai+'"?',function(r){
    				if (r){
    					$.post('destroy_pegawai.php',{id:row.idpegawai},function(result){
    						if (result.success){
    							$('#dgdatapegawai').datagrid('reload');	// reload the user data
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

    	function uploadtemplatepeg(){
    		$('#dlgtemplatepeg').dialog('open').dialog('setTitle','Upoad Template Pegawai');
            $('#fmtemplatepeg').form('clear');
    		url = 'save_templatepeg.php';
    	}
    	function savetemplatepeg(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatepeg').form('submit',{
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
                    $('#dlgtemplatepeg').dialog('close');
    				$('#dgdatapegawai').datagrid('reload');
                    $.messager.show({
                        title: 'Result',
                        msg: result.successMsg
                    });
                    /*
    				if (result.errorMsg){
    					$.messager.show({
    						title: 'Error',
    						msg: result.errorMsg
    					});
    				} else {
    					$('#dlgtemplatepeg').dialog('close');
    					$('#dgdatapegawai').datagrid('reload');
    				}
                    */
    			}
    		});
    	}
        
    	function detailpegawai(index){
            var row = $('#dgdatapegawai').datagrid('getRow', index);
    		if (row){
                if ($('#tt').tabs('exists','Riwayat Pegawai')){
                    $('#tt').tabs('select','Riwayat Pegawai');
                    var tab = $('#tt').tabs('getSelected');
                    tab.panel('refresh', 'pegawai2.php?nip='+row.nippegawai+'&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
                } else {
                    $('#tt').tabs('add',{
                        title: 'Riwayat Pegawai',
                        href: 'pegawai2.php?nip='+row.nippegawai+'&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                        closable: true
                    });
                }
    		}
    	}

        //$("#dgdatadatapegawai").height($(window).height() - 0);
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