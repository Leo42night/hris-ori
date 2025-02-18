<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/kepegawaian/"
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
		function doSearchpemberhentian(){
            $('#dgpemberhentian').datagrid('load',{
				namapemberhentiancari: $('#namapemberhentiancari').textbox('getValue')
			});
		}

		function carinip(){
            var nip = $("#nip2pemberhentian").textbox('getValue');
            //alert(nip);
            $.post('<?=$foldernya;?>cari_pemberhentian.php',{nip:nip},function(result){                
                if (result.success===true){                    
                    $("#nippemberhentian").textbox('setValue',result.nip);
                    $("#namapemberhentian").textbox('setValue',result.nama);
                    $("#person_gradepemberhentian").combobox('setValue',result.person_grade);
                    $("#agamapemberhentian").combobox('setValue',result.agama);
                    $("#jenis_kelaminpemberhentian").combobox('setValue',result.jenis_kelamin);
                    $("#nikpemberhentian").textbox('setValue',result.nik);
                    $("#npwppemberhentian").textbox('setValue',result.npwp);
                    $("#tgl_lahirpemberhentian").datebox('setValue',result.tgl_lahir);
                    $("#tgl_masukpemberhentian").datebox('setValue',result.tgl_masuk);
                    $("#tgl_capegpemberhentian").datebox('setValue',result.tgl_capeg);
                    $("#tgl_tetappemberhentian").datebox('setValue',result.tgl_tetap);
                    $("#bank_dplkpemberhentian").textbox('setValue',result.bank_dplk);
                    $("#no_pesertapemberhentian").textbox('setValue',result.no_peserta);
                    $("#no_bpjs_kespemberhentian").textbox('setValue',result.no_bpjs_kes);
                    $("#no_bpjs_tkpemberhentian").textbox('setValue',result.no_bpjs_tk);
                } else {
                    /*
                    $.messager.show({
                        title: 'Error',
                        msg: result.errorMsg
                    });
                    */
                }
            },'json');
		}

        function aksipemberhentian(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editpemberhentian(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroypemberhentian(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a;
        }  

        function onSelectprovinsipemberhentian(){
            var nilai1 = $('#id_provinsipemberhentian').combobox('getValue');
            var url1 = '<?=$foldernya;?>get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatenpemberhentian').combobox('enable');
            $('#id_kabupatenpemberhentian').combobox('clear'); 
            $('#id_kabupatenpemberhentian').combobox('reload',url1);
    	}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#id_provinsipemberhentian').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenpemberhentian').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#id_provinsipemberhentian').combobox({
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
        $('#id_kabupatenpemberhentian').combobox({
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
        $("#dgpemberhentian").datagrid({
        });
    });
    </script>
    <table id="dgpemberhentian" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_pemberhentian.php" pageSize="20"        
    		toolbar="#toolbarpemberhentian" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksipemberhentian" width="50" align="center" halign="center" data-options="formatter:aksipemberhentian,styler:styler1">Aksi</th>
    			<th field="nippemberhentian" width="140" align="center" halign="center" data-options="styler:styler1">NIP</th>
    			<th field="namapemberhentian" width="200" align="left" halign="left" data-options="styler:styler1">Nama</th>
    			<th field="person_grade2pemberhentian" width="120" align="center" halign="center" data-options="styler:styler1">Person<br/>Grade</th>
                <th field="phdp_terakhirpemberhentian" width="120" align="center" halign="center" data-options="styler:styler1">PHDP<br/>Terakhir</th>
    			<th field="agama2pemberhentian" width="140" align="center" halign="center" data-options="styler:styler1">Agama</th>
    			<th field="jenis_kelamin2pemberhentian" width="140" align="center" halign="center" data-options="styler:styler1">Jenis<br/>Kelamin</th>
    			<th field="nikpemberhentian" width="160" align="center" halign="center" data-options="styler:styler1">NIK</th>
    			<th field="npwppemberhentian" width="160" align="center" halign="center" data-options="styler:styler1">NPWP</th>
                <th field="dplk_dapen2pemberhentian" width="120" align="center" halign="center" data-options="styler:styler1">DPLK/Dapen</th>
                <th field="no_pesertapemberhentian" width="120" align="center" halign="center" data-options="styler:styler1">No Peserta</th>
                <th field="bank_dplkpemberhentian" width="120" align="center" halign="center" data-options="styler:styler1">Bank DPLK</th>
                <th field="no_bpjs_kespemberhentian" width="160" align="center" halign="center" data-options="styler:styler1">Nomor BPJS<br/>Kesehatan</th>
                <th field="no_bpjs_tkpemberhentian" width="160" align="center" halign="center" data-options="styler:styler1">Nomor BPJS<br/>Ketenagakerjaan</th>
    			<th field="tgl_lahir2pemberhentian" width="100" align="center" halign="center" data-options="styler:styler1">Tgl Lahir</th>
    			<th field="tgl_masuk2pemberhentian" width="100" align="center" halign="center" data-options="styler:styler1">Tgl Masuk</th>
    			<th field="tgl_capeg2pemberhentian" width="100" align="center" halign="center" data-options="styler:styler1">Tgl Capeg</th>
    			<th field="tgl_tetap2pemberhentian" width="100" align="center" halign="center" data-options="styler:styler1">Tgl Tetap</th>
    			<th field="tgl_berhenti2pemberhentian" width="100" align="center" halign="center" data-options="styler:styler1">Tgl Berhenti</th>
                <th field="tahun_pemberhentianpemberhentian" width="100" align="center" halign="center" data-options="styler:styler1">Tahun<br/>pemberhentian</th>
                <th field="alasan_berhenti2pemberhentian" width="200" align="left" halign="left" data-options="styler:styler1">Alasan Berhenti</th>
            </tr>
    	</thead>
    </table>
    <div id="toolbarpemberhentian" style="background-color:#fff;padding:5px;">
    	<div id="tbpegawai" style="padding:3px">
            <table>
            <tr>
                <td style="padding-right:5px;">NIP/NAMA</td>
                <td style="padding-right:10px;">
                    <input class="easyui-textbox" id="namapemberhentiancari" name="namapemberhentiancari" data-options="required:false,prompt:'search'" style="width: 160px;">
                </td>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchpemberhentian()" style="min-width:90px;">Search</a>
                    <?php if($akses_proses==="1"){?>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addpemberhentian()" style="min-width:90px;">Tambah</a>
                    <?php } ?>
                </td>
            </tr>
            </table>
    	</div>        
    </div>
    
    <div id="dlgpemberhentian" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;top:50px;"
    		closed="true" buttons="#dlg-buttonspemberhentian">
    	<form id="fmpemberhentian" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">            
            <div id="divnipcari">
                <table>
                <tr>
                    <td colspan="3">
                        <div style="margin-bottom:5px;">
                            <div class="labelfor"><label>NIP Pencarian :</label></div>
                            <input class="easyui-textbox" id="nip2pemberhentian" name="nip2pemberhentian" missingMessage="Harus di isi" data-options="required:false" style="width:160px;">
                            <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="carinip()" style="min-width:90px;">Search</a>
                        </div>				                    
                    </td>
                </tr>
                </table>            
                <hr/>
            </div>
            <table>
            <tr>
                <td style="width:250px;">
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>NIP</label></div>
                        <input class="easyui-textbox" id="nippemberhentian" name="nippemberhentian" missingMessage="Harus di isi" data-options="required:true" style="width:100%;" readonly>
                    </div>				
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td style="width:250px;">
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Nama</label></div>
                        <input class="easyui-textbox" id="namapemberhentian" name="namapemberhentian" missingMessage="Harus di isi" data-options="required:true" style="width:100%;" readonly>
                    </div>				
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Person Grade</label></div>
                        <input class="easyui-combobox"
                            id="person_gradepemberhentian"
                            name="person_gradepemberhentian" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_person_grade.php',                           
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
                        <div class="labelfor"><label>PHDP Terakhir</label></div>
                        <input class="easyui-textbox" id="phdp_terakhirpemberhentian" name="phdp_terakhirpemberhentian" missingMessage="Harus di isi" data-options="required:true" style="width:100%;">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Agama</label></div>
                        <input class="easyui-combobox"
                            id="agamapemberhentian"
                            name="agamapemberhentian" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_agama.php',                           
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
                        <div class="labelfor"><label>Jenis Kelamin</label></div>
                        <input class="easyui-combobox"
                            id="jenis_kelaminpemberhentian"
                            name="jenis_kelaminpemberhentian" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_jenis_kelamin.php',                           
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'auto'
                        ">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>NIK</label></div>
                        <input class="easyui-textbox" id="nikpemberhentian" name="nikpemberhentian" missingMessage="Harus di isi" data-options="required:true" style="width:100%;">
                    </div>
                </td>
                <td>&nbsp;</td>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>NPWP</label></div>
                        <input class="easyui-textbox" id="npwppemberhentian" name="npwppemberhentian" missingMessage="Harus di isi" data-options="required:true" style="width:100%;">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Tanggal Lahir</label></div>
                        <input class="easyui-datebox" id="tgl_lahirpemberhentian" name="tgl_lahirpemberhentian" editable="false" missingMessage="Harus di isi" data-options="required:true,formatter:myformatter,parser:myparser" style="width:100%;">
                    </div>
                </td>
                <td>&nbsp;</td>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Tgl Masuk</label></div>
                        <input class="easyui-datebox" id="tgl_masukpemberhentian" name="tgl_masukpemberhentian" editable="false" missingMessage="Harus di isi" data-options="required:true,formatter:myformatter,parser:myparser" style="width:100%;">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Tanggal Capeg</label></div>
                        <input class="easyui-datebox" id="tgl_capegpemberhentian" name="tgl_capegpemberhentian" editable="false" missingMessage="Harus di isi" data-options="required:true,formatter:myformatter,parser:myparser" style="width:100%;">
                    </div>
                </td>
                <td>&nbsp;</td>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Tgl Tetap</label></div>
                        <input class="easyui-datebox" id="tgl_tetappemberhentian" name="tgl_tetappemberhentian" editable="false" missingMessage="Harus di isi" data-options="required:true,formatter:myformatter,parser:myparser" style="width:100%;">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Tanggal Berhenti</label></div>
                        <input class="easyui-datebox" id="tgl_berhentipemberhentian" name="tgl_berhentipemberhentian" editable="false" missingMessage="Harus di isi" data-options="required:true,formatter:myformatter,parser:myparser" style="width:100%;">
                    </div>
                </td>
                <td>&nbsp;</td>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Alasan Berhenti</label></div>
                        <input class="easyui-combobox"
                            id="alasan_berhentipemberhentian"
                            name="alasan_berhentipemberhentian" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_alasan_berhenti.php',                           
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
                        <div class="labelfor"><label>DPLK/Dapen</label></div>
                        <input class="easyui-combobox"
                            id="dplk_dapenpemberhentian"
                            name="dplk_dapenpemberhentian" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_jenis_asuransi.php',                           
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'auto'
                        ">
                    </div>
                </td>
                <td>&nbsp;</td>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Nomor Peserta</label></div>
                        <input class="easyui-textbox" id="no_pesertapemberhentian" name="no_pesertapemberhentian" missingMessage="Harus di isi" data-options="required:true" style="width:100%;">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Bank DPLK</label></div>
                        <input class="easyui-textbox" id="bank_dplkpemberhentian" name="bank_dplkpemberhentian" missingMessage="Harus di isi" data-options="required:false" style="width:100%;">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Nomor BPJS Kesehatan</label></div>
                        <input class="easyui-textbox" id="no_bpjs_kespemberhentian" name="no_bpjs_kespemberhentian" missingMessage="Harus di isi" data-options="required:true" style="width:100%;">
                    </div>
                </td>
                <td>&nbsp;</td>
                <td>
                    <div style="margin-bottom:5px;">
                        <div class="labelfor"><label>Nomor BPJS Ketenagakerjaan</label></div>
                        <input class="easyui-textbox" id="no_bpjs_tkpemberhentian" name="no_bpjs_tkpemberhentian" missingMessage="Harus di isi" data-options="required:true" style="width:100%;">
                    </div>
                </td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonspemberhentian">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savepemberhentian()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgpemberhentian').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addpemberhentian(){
    		$('#dlgpemberhentian').dialog('open').dialog('setTitle','Input Data Pemberhentian');
    		$('#fmpemberhentian').form('clear');
            $("#divnipcari").show();
    		url = '<?=$foldernya;?>save_pemberhentian.php';
    	}
    	function editpemberhentian(index){
            var row = $('#dgpemberhentian').datagrid('getRow', index);
    		if (row){
                $('#dlgpemberhentian').dialog('open').dialog('setTitle','Update Data pemberhentian');
                $('#fmpemberhentian').form('clear');
    			$('#fmpemberhentian').form('load',row);                 
                $("#divnipcari").hide();
                url = '<?=$foldernya;?>update_pemberhentian.php?id='+row.idpemberhentian;  
            }          
    	}
    	function savepemberhentian(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmpemberhentian').form('submit',{
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
                        $.post('<?=$foldernya;?>update_pemberhentian.php',{},function(result){},'json');
                        $('#dlgpemberhentian').dialog('close');
                        $('#dgpemberhentian').datagrid('reload');
                    }
                }
            });
    	}
    	function destroypemberhentian(index){
            var row = $('#dgpemberhentian').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_pemberhentian.php',{id:row.idpemberhentian},function(result){
    						if (result.success){
    							$('#dgpemberhentian').datagrid('reload');	// reload the user data
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

    	function uploadtemplatepemberhentian(){
    		$('#dlgtemplatepemberhentian').dialog('open').dialog('setTitle','Upoad Template Position Management');
            $('#fmtemplatepemberhentian').form('clear');
    		url = '<?=$foldernya;?>save_templatepemberhentian.php';
    	}
    	function savetemplatepemberhentian(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatepemberhentian').form('submit',{
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
                        $.post('<?=$foldernya;?>update_pemberhentian.php',{},function(result){},'json');
    					$('#dlgtemplatepemberhentian').dialog('close');
    					$('#dgpemberhentian').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgpemberhentian").height($(window).height() - 0);
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