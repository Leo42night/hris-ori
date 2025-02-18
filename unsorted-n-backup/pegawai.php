<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";

// echo "<script>console.log('$userhris');console.log('$akses_proses');console.log('$akses_view');</script>";
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/sipeg/"
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
            var gelar_depan = $("#gelar_depanpegawai").combobox('getText');
            var gelar_belakang = $("#gelar_belakangpegawai").combobox('getText');
            var nama_lengkap = $("#nama_lengkappegawai").textbox('getValue');
            var know_as = "";            
            if(gelar_depan!=="" && gelar_depan!=="-"){
                know_as += gelar_depan+" ";
            }            
            know_as += nama_lengkap;
            if(gelar_belakang!=="" && gelar_belakang!=="-"){
                know_as += " "+gelar_belakang;
            }
            $("#know_aspegawai").textbox('setValue',know_as);
        }
    </script>

    <script type="text/javascript">                     
		function doSearchpegawai(){
            $('#dgpegawai').datagrid('load',{
				namapegawaicari: $('#namapegawaicari').textbox('getValue')
			});
		}
        function aksipegawai(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editpegawai(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroypegawai(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                var c = '<a href="javascript:void(0)" title="Riwayat" onclick="detailpegawai(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:8px !important;"></i></button></a>';
                var d = '<a href="javascript:void(0)" title="Cetak CV" onclick="cvpegawai(\''+row.nippegawai+'\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-user" style="font-size:8px !important;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                var c = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:10px;"></i></button></a>';
                var d = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-user" style="font-size:8px !important;"></i></button></a>';
            }
            //var c = '<br/><a href="javascript:void(0)" title="Riwayat Pegawai" onclick="detailpegawai(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:100%;min-height:25px;font-size:10.5px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;padding:5px;">RIWAYAT</button></a>';
            return a+b+"<br/>"+c+d;
        }  
        function aksipegawai2(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            var a = '<a href="javascript:void(0)" title="Riwayat Pegawai" onclick="detailpegawai(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:100%;min-height:25px;font-size:10.5px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;padding:5px;">RIWAYAT</button></a>';
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
        $("#dgpegawai").datagrid({
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
    <table id="dgpegawai" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="api/get_master_pegawai.php" pageSize="20"        
    		toolbar="#toolbarpegawai" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
		<thead data-options="frozen:true">
			<tr>
                <th field="aksipegawai" width="110" align="center" halign="center" data-options="formatter:aksipegawai,styler:styler1">Aksi</th>
    			<th field="nippegawai" width="120" align="center" halign="center" data-options="styler:styler1">No Induk</th>
    			<th field="nama_lengkappegawai" width="160" align="left" halign="center" data-options="styler:styler1">Nama Lengkap</th>
			</tr>
		</thead>
    	<thead>
    		<tr>
                <th field="start_date2pegawai" width="100" align="center" halign="center" data-options="styler:styler1">Start Date</th>
                <th field="end_date2pegawai" width="100" align="center" halign="center" data-options="styler:styler1">End Date</th>
    			<th field="tempat_lahirpegawai" width="160" align="center" halign="center" data-options="styler:styler1">Tempat Lahir</th>
    			<th field="tgl_lahir2pegawai" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Lahir</th>
                <th field="jenis_kelamin2pegawai" width="100" align="center" halign="center" data-options="styler:styler1">Jenis<br/>Kelamin</th>
                <th field="nama_agamapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Agama</th>
                <th field="gol_darah2pegawai" width="100" align="center" halign="center" data-options="styler:styler1">Golongan<br/>Darah</th>
                <th field="status_nikah2pegawai" width="100" align="center" halign="center" data-options="styler:styler1">Status<br/>Nikah</th>
                <th field="tgl_masuk2pegawai" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Masuk</th>
                <th field="tgl_capeg2pegawai" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Capeg</th>
                <th field="tgl_tetap2pegawai" width="100" align="center" halign="center" data-options="styler:styler1">Tanggal<br/>Tetap</th>
                <th field="title2pegawai" width="50" align="center" halign="center" data-options="styler:styler1">Title</th>
                <th field="gelar_depan2pegawai" width="80" align="center" halign="center" data-options="styler:styler1">Gelar<br/>Depan</th>
                <th field="gelar_belakang2pegawai" width="80" align="center" halign="center" data-options="styler:styler1">Gelar<br/>Belakang</th>
                <th field="bank_dplkpegawai" width="80" align="center" halign="center" data-options="styler:styler1">Bank DPLK</th>
                <th field="id_dplkpegawai" width="140" align="center" halign="center" data-options="styler:styler1">ID DPLK</th>
                <th field="no_bpjs_kespegawai" width="140" align="center" halign="center" data-options="styler:styler1">BPJS Kes</th>
                <th field="no_bpjs_tkpegawai" width="140" align="center" halign="center" data-options="styler:styler1">BPJS TK</th>
                <th field="bank_payrollpegawai" width="80" align="center" halign="center" data-options="styler:styler1">Bank<br/>Payroll</th>
                <th field="no_rek_payrollpegawai" width="140" align="center" halign="center" data-options="styler:styler1">No Rekening<br/>Payroll</th>
                <th field="an_payrollpegawai" width="160" align="center" halign="center" data-options="styler:styler1">Atas Nama</th>
                <th field="status_integrasi2pegawai" width="120" align="center" halign="center" data-options="styler:styler1">Status<br/>Integrasi</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarpegawai" style="background-color:#fff;padding:5px;">
    	<div id="tbpegawai" style="padding:3px">
            <table>
            <tr>
                <td style="padding-right:5px;">NIP/NAMA</td>
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
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addpegawai()" style="min-width:90px;">Tambah</a>
        <a target="_blank" href="template/template_pegawai.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template Pegawai</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatepeg()" style="min-width:90px;">Upload Template</a>     
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
    
    <div id="dlgpegawai" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;top:50px;"
    		closed="true" buttons="#dlg-buttonspegawai">
    	<form id="fmpegawai" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table style="margin-right:10px;">
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>No Induk</label></div>
                        <input class="easyui-textbox" id="nippegawai" name="nippegawai" data-options="required:true" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Tanggal Masuk</label></div>
                        <input class="easyui-datebox" id="tgl_masukpegawai" name="tgl_masukpegawai" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td>
                    <div>
                        <div class="labelfor"><label>Start Date</label></div>
                        <input class="easyui-datebox" id="start_datepegawai" name="start_datepegawai" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td> 
                <td></td>
                <td>
                    <div>
                        <div class="labelfor"><label>End Date</label></div>
                        <input class="easyui-datebox" id="end_datepegawai" name="end_datepegawai" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td>
                    <div>
                        <div class="labelfor"><label>Tanggal Capeg</label></div>
                        <input class="easyui-datebox" id="tgl_capegpegawai" name="tgl_capegpegawai" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td> 
                <td></td>
                <td>
                    <div>
                        <div class="labelfor"><label>Tanggal Pegawai Tetap</label></div>
                        <input class="easyui-datebox" id="tgl_tetappegawai" name="tgl_tetappegawai" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td>
                    <div class="labelfor"><label>Keterangan Mutasi</label></div>
                    <input class="easyui-combobox"
                        id="keterangan_mutasipegawai"
                        name="keterangan_mutasipegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 100%;" 
                        data-options=" 
                            url:'api/get_keterangan_mutasi.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td>&nbsp;</td>
                <td>
                    <div class="labelfor"><label>Person Grade</label></div>
                    <input class="easyui-combobox"
                        id="person_gradepegawai"
                        name="person_gradepegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 100%;" 
                        data-options=" 
                            url:'api/get_person_grade.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>  
            <tr>
                <td>
                    <div class="labelfor"><label>Title</label></div>
                    <input class="easyui-combobox"
                        id="titlepegawai"
                        name="titlepegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 100%;" 
                        data-options="                             
                            url:'api/get_title.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
                <td></td>
                <td>
                    <div class="labelfor"><label>Nama Lengkap</label></div>
                    <input class="easyui-textbox" id="nama_lengkappegawai" name="nama_lengkappegawai" missingMessage="Harus di isi" data-options="onChange:changeknowas,required:true" style="width: 100%;">
                </td>
            </tr>  
            <tr>
                <td>
                    <div class="labelfor"><label>Gelar Depan</label></div>
                    <input class="easyui-combobox"
                        id="gelar_depanpegawai"
                        name="gelar_depanpegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 100%;" 
                        data-options=" 
                            onChange:changeknowas,
                            url:'api/get_gelar_depan.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td></td>
                <td>
                    <div class="labelfor"><label>Gelar Belakang</label></div>
                    <input class="easyui-combobox"
                        id="gelar_belakangpegawai"
                        name="gelar_belakangpegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 100%;" 
                        data-options=" 
                            onChange:changeknowas,
                            url:'api/get_gelar_belakang.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="labelfor"><label>Know As</label></div>
                    <input class="easyui-textbox" id="know_aspegawai" name="know_aspegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                </td>
            </tr>  
            <tr>
                <td>
                    <div class="labelfor"><label>Tempat Lahir</label></div>
                    <input class="easyui-textbox" id="tempat_lahirpegawai" name="tempat_lahirpegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                </td>
                <td></td>
                <td>
                    <div class="labelfor"><label>Tanggal Lahir</label></div>
                    <input class="easyui-datebox" id="tgl_lahirpegawai" name="tgl_lahirpegawai" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100%;">
                </td>
            </tr>  
            <tr>
                <td>
                    <div class="labelfor"><label>Negara Kelahiran</label></div>
                    <input class="easyui-combobox"
                        id="kode_negarapegawai"
                        name="kode_negarapegawai" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 100%;" 
                        data-options=" 
                            url:'api/get_negara.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
                <td></td>
                <td>
                    <div class="labelfor"><label>Jenis Kelamin</label></div>
                    <input class="easyui-combobox"
                        id="jenis_kelaminpegawai"
                        name="jenis_kelaminpegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 100%;" 
                        data-options=" 
                            url:'api/get_jenis_kelamin.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>
            <tr>
                <td>
                    <div class="labelfor"><label>Agama</label></div>
                    <input class="easyui-combobox"
                        id="id_agamapegawai"
                        name="id_agamapegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 100%;" 
                        data-options=" 
                            url:'api/get_agama.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
                <td></td>
                <td>
                    <div class="labelfor"><label>Status Nikah</label></div>
                    <input class="easyui-combobox"
                        id="status_nikahpegawai"
                        name="status_nikahpegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 100%;" 
                        data-options=" 
                            url:'api/get_status_nikah.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>
            <tr>
                <td>
                    <div class="labelfor"><label>Tanggal Nikah</label></div>
                    <input class="easyui-datebox" id="tgl_nikahpegawai" name="tgl_nikahpegawai" editable="true" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 100%;">
                </td>
                <td></td>
                <td>
                    <div class="labelfor"><label>Warganegara</label></div>
                    <input class="easyui-combobox"
                        id="status_warganegarapegawai"
                        name="status_warganegarapegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 100%;" 
                        data-options=" 
                            url:'api/get_status_warganegara.php',                           
                            required:true,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>
            <tr>
                <td>
                    <div class="labelfor"><label>Gol Darah</label></div>
                    <input class="easyui-combobox"
                        id="gol_darahpegawai"
                        name="gol_darahpegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 100%;" 
                        data-options=" 
                            url:'api/get_gol_darah.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
                <td></td>
                <td>
                    <div class="labelfor"><label>Suku</label></div>
                    <input class="easyui-combobox"
                        id="sukupegawai"
                        name="sukupegawai" missingMessage="Harus di isi" editable="true"
                        style="padding: 2px; width: 100%;" 
                        data-options=" 
                            url:'api/get_suku.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">
                </td>
            </tr>
            <tr><td colspan="3" style="padding-top:10px;"><span style="font-weight:bold;">Nomor Telepon</span></td></tr>
            <tr>
                <td>
                    <div class="labelfor"><label>Utama</label></div>
                    <input class="easyui-textbox" id="telepon_utamapegawai" name="telepon_utamapegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                </td>
                <td></td>
                <td>
                    <div class="labelfor"><label>Cadangan 1</label></div>
                    <input class="easyui-textbox" id="telepon_cadangan1pegawai" name="telepon_cadangan1pegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 100%;">
                </td>
            </tr>  
            <tr>
                <td>
                    <div class="labelfor"><label>Cadangan 2</label></div>
                    <input class="easyui-textbox" id="telepon_cadangan2pegawai" name="telepon_cadangan2pegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 100%;">
                </td>
                <td></td>
                <td>
                    <div class="labelfor"><label>Cadangan 3</label></div>
                    <input class="easyui-textbox" id="telepon_cadangan3pegawai" name="telepon_cadangan3pegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 100%;">
                </td>
            </tr>  
            <tr>
                <td>
                    <div class="labelfor"><label>Darurat</label></div>
                    <input class="easyui-textbox" id="telepon_daruratpegawai" name="telepon_daruratpegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 100%;">
                </td>
            </tr>  
            <tr><td colspan="3" style="padding-top:10px;"><span style="font-weight:bold;">NIK & NPWP</span></td></tr>
            <tr>
                <td>
                    <div class="labelfor"><label>NIK (Nomor KTP)</label></div>
                    <input class="easyui-textbox" id="nikpegawai" name="nikpegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                </td>
                <td></td>
                <td>
                    <div class="labelfor"><label>NPWP</label></div>
                    <input class="easyui-textbox" id="npwppegawai" name="npwppegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                </td>
            </tr>  
            <tr><td colspan="3" style="padding-top:10px;"><span style="font-weight:bold;">Data DPLK</span></td></tr>
            <tr>
                <td colspan="3">
                    <div class="labelfor"><label>Jenis DPLK</label></div>
                    <input class="easyui-combobox"
                        id="jenis_dplkpegawai"
                        name="jenis_dplkpegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 100%;" 
                        data-options=" 
                            url:'api/get_jenis_dplk.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'auto'
                    ">
                </td>
            </tr>  
            <tr>
                <td>
                    <div class="labelfor"><label>ID DPLK</label></div>
                    <input class="easyui-textbox" id="id_dplkpegawai" name="id_dplkpegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 100%;">
                </td>
                <td></td>
                <td>
                    <div class="labelfor"><label>Bank DPLK</label></div>
                    <input class="easyui-textbox" id="bank_dplkpegawai" name="bank_dplkpegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 100%;">
                </td>
            </tr>  
            <tr><td colspan="3" style="padding-top:10px;"><span style="font-weight:bold;">Data BPJS</span></td></tr>
            <tr>
                <td>
                    <div class="labelfor"><label>No BPJS Kesehatan</label></div>
                    <input class="easyui-textbox" id="no_bpjs_kespegawai" name="no_bpjs_kespegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 100%;">
                </td>
                <td>&nbsp;</td>
                <td>
                    <div class="labelfor"><label>No BPJS Ketenagakerjaan</label></div>
                    <input class="easyui-textbox" id="no_bpjs_tkpegawai" name="no_bpjs_tkpegawai" missingMessage="Harus di isi" data-options="required:false" style="width: 100%;">
                </td>
            </tr>  
            <tr><td colspan="3" style="padding-top:10px;"><span style="font-weight:bold;">Data Bank Payroll</span></td></tr>
            <tr>
                <td>
                    <div class="labelfor"><label>Bank Payroll</label></div>
                    <input class="easyui-textbox" id="bank_payrollpegawai" name="bank_payrollpegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                </td>
                <td></td>
                <td>
                    <div class="labelfor"><label>No Rekening</label></div>
                    <input class="easyui-textbox" id="no_rek_payrollpegawai" name="no_rek_payrollpegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                </td>
            </tr>  
            <tr>
                <td colspan="3">
                    <div class="labelfor"><label>Atas Nama</label></div>
                    <input class="easyui-textbox" id="an_payrollpegawai" name="an_payrollpegawai" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                </td>
            </tr>  
            <tr>
                <td colspan="3">
                    <div class="labelfor"><label>Status Integrasi</label></div>
                    <input class="easyui-combobox"
                        id="status_integrasipegawai"
                        name="status_integrasipegawai" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 100%;" 
                        data-options=" 
                            url:'api/get_status_integrasi.php',                           
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
    <div id="dlg-buttonspegawai">
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
            $("#end_datepegawai").datebox('setValue','9999-12-31');
    		url = 'save_pegawai.php';
    	}
    	function editpegawai(index){
            var row = $('#dgpegawai').datagrid('getRow', index);
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
                    // alert(result);
                    $.messager.progress('close');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $.post('updatedata/update_pegawai.php',{},function(result){},'json');
                        $('#dlgpegawai').dialog('close');
                        $('#dgpegawai').datagrid('reload');
                    }
                }
            });
    	}
    	function destroypegawai(index){
            var row = $('#dgpegawai').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data pegawai "'+row.nama_lengkappegawai+'"?',function(r){
    				if (r){
    					$.post('destroy_pegawai.php',{id:row.idpegawai,nip:row.nippegawai},function(result){
    						if (result.success){
    							$('#dgpegawai').datagrid('reload');	// reload the user data
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
                    $.post('updatedata/update_pegawai.php',{},function(result){},'json');
                    $('#dlgtemplatepeg').dialog('close');
    				$('#dgpegawai').datagrid('reload');
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
    					$('#dgpegawai').datagrid('reload');
    				}
                    */
    			}
    		});
    	}
        
    	function detailpegawai(index){
            var row = $('#dgpegawai').datagrid('getRow', index);
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
        
    	function cvpegawai(nip){
            // var blthnya = $("#blthsptcari").datebox('getValue');
            // var kelompoknya2 = $("#kelompoksptcari").combobox('getValue');
            // var kelompoknya = kelompoknya2.replace(" ", "_");
            // var kd_regionnya = $("#kd_regionsptcari").combobox('getValue');
            // var kd_cabangnya = $("#kd_cabangsptcari").combobox('getValue');
            //alert(kd_regionnya+" "+kd_cabangnya);
            window.open("<?=$foldernya;?>cetakcv.php?nip="+nip,"_blank");
        }

        //$("#dgpegawai").height($(window).height() - 0);
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