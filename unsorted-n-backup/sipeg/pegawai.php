<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";

if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "sipeg/pegawai/";
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
		function doSearchdatapegawai(){
            $('#dgdatapegawai').datagrid('load',{
				jenisdatapegawaicari: $('#jenisdatapegawaicari').combobox('getValue'),
                aktifdatapegawaicari: $('#aktifdatapegawaicari').combobox('getValue'),
                namadatapegawaicari: $('#namadatapegawaicari').textbox('getValue')
			});
		}

        function aksidatapegawai(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            var userhris = "<?=$userhris;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update Data" onclick="editdatapegawai(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                // var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus Data" onclick="destroydatapegawai(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                // var c = '<a href="javascript:void(0)" title="Riwayat" onclick="detaildatapegawai(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:8px !important;"></i></button></a>';
                // var d = '<a href="javascript:void(0)" title="Cetak CV" onclick="cvdatapegawai(\''+row.nipdatapegawai+'\')"><button class="easyui-linkbutton c1" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-user" style="font-size:8px !important;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                // var c = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:10px;"></i></button></a>';
                // var d = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-user" style="font-size:8px !important;"></i></button></a>';
            }
            //var c = '<br/><a href="javascript:void(0)" title="Riwayat datapegawai" onclick="detaildatapegawai(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:100%;min-height:25px;font-size:10.5px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;padding:5px;">RIWAYAT</button></a>';
            return a+b;
        }  

        function setGrade(){
            const nip = $("#nipdatapegawai").textbox('getValue');
            const filter = ['PCN', 'HPI', 'PRO'];
            if(nip.indexOf('PCN')!==-1 || nip.indexOf('HPI')!==-1 || nip.indexOf('PRO')!==-1){
                $("#gradedatapegawai").combobox('reload',"<?=$foldernya;?>get_grade.php");
            } else {
                $("#gradedatapegawai").combobox('reload',"<?=$foldernya;?>get_person_grade.php");
            }
        }  

        function ttlnya(value,row,index){
            var a = row.tempat_lahirdatapegawai;
            a += '<br/><span style="color:#337ab7;">'+row.tgl_lahir2datapegawai+'</span>';
            return a;
        }  

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#penempatandatapegawai').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#atasan_langsungdatapegawai').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        $('#atasan_atasan_langsungdatapegawai').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        $('#kd_project_sapdatapegawai').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#penempatandatapegawai').combobox({
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
        $('#atasan_langsungdatapegawai').combobox({
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
        $('#atasan_atasan_langsungdatapegawai').combobox({
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
        $('#kd_project_sapdatapegawai').combobox({
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
        // $('#ttd2user').filebox({
        //     buttonText: 'Pilih File',
        //     buttonAlign: 'left'
        // })        
    });
    </script>
    <table id="dgdatapegawai" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_datapegawai.php" pageSize="20"        
    		toolbar="#toolbardatapegawai" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
		<thead data-options="frozen:true">
			<tr>
                <th field="aksidatapegawai" width="110" align="center" halign="center" data-options="formatter:aksidatapegawai,styler:styler1">Aksi</th>
    			<th field="nipdatapegawai" width="120" align="center" halign="center" data-options="styler:styler1">No Induk</th>
    			<th field="namadatapegawai" width="200" align="left" halign="left" data-options="styler:styler1">Nama</th>
			</tr>
		</thead>
    	<thead>
    		<tr>
                <th field="jenisdatapegawai" width="120" align="center" halign="center" data-options="styler:styler1">Jenis</th>
                <th field="jenis_mutasidatapegawai" width="120" align="center" halign="center" data-options="styler:styler1">Jenis Mutasi</th>
                <th field="aksesdatapegawai" width="120" align="center" halign="center" data-options="styler:styler1">Akses</th>
                <th field="ttlnya" width="160" align="center" halign="center" data-options="formatter:ttlnya,styler:styler1">T T L</th>
                <th field="jabatandatapegawai" width="250" align="center" halign="center" data-options="styler:styler1">Jabatan</th>
                <th field="penempatandatapegawai" width="200" align="center" halign="center" data-options="styler:styler1">Penempatan</th>
                <th field="nama_gradedatapegawai" width="140" align="center" halign="center" data-options="styler:styler1">Grade</th>
                <th field="pendidikandatapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Pendidikan</th>
                <th field="jurusandatapegawai" width="160" align="center" halign="center" data-options="styler:styler1">Jurusan</th>
                <th field="nama_bankdatapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Bank</th>
                <th field="no_rekeningdatapegawai" width="120" align="center" halign="center" data-options="styler:styler1">No Rekening</th>
                <th field="nama_rekeningdatapegawai" width="180" align="center" halign="center" data-options="styler:styler1">Atas Nama</th>
                <th field="tgl_masuk2datapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Tgl.Masuk</th>
                <th field="tgl_capeg2datapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Tgl.Capeg</th>
                <th field="tgl_pegawai2datapegawai" width="100" align="center" halign="center" data-options="styler:styler1">Tgl.Pegawai</th>
                <th field="kd_project_sapdatapegawai" width="160" align="center" halign="center" data-options="styler:styler1">Project</th>
                <th field="emaildatapegawai" width="160" align="center" halign="center" data-options="styler:styler1">Email 1</th>
                <th field="email2datapegawai" width="160" align="center" halign="center" data-options="styler:styler1">Email 2</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbardatapegawai" style="background-color:#fff;padding:5px;">
    	<div id="tbdatapegawai" style="padding:3px">
            <table>
            <tr>
                <td>Jenis</td>
                <td>
                    <input class="easyui-combobox"
                        id="jenisdatapegawaicari" value="semua"
                        name="jenisdatapegawaicari" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 140px;" 
                        data-options=" 
                            url:'<?=$foldernya;?>get_jenis_pegawaicari.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">                                                
                </td>
                <td>&nbsp;</td>
                <td>Status</td>
                <td>
                    <select id="aktifdatapegawaicari" name="aktifdatapegawaicari" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 100px;">
                        <option value="1" selected>Aktif</option>
                        <option value="0">Non Aktif</option>
                    </select>                                                                                                    
                </td> 
                <td>&nbsp;</td>
                <td style="padding-right:5px;">NIP/Nama</td>
                <td style="padding-right:10px;">
                    <input class="easyui-textbox" id="namadatapegawaicari" name="namadatapegawaicari" data-options="required:false,prompt:'search'" style="width: 160px;">
                </td>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchdatapegawai()" style="min-width:90px;">Search</a>
                </td>
            </tr>
            </table>
    	</div>        
        <?php if($akses_proses=="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="adddatapegawai()" style="min-width:90px;">Tambah</a>
        <a target="_blank" href="template/template_pegawai.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template datapegawai</a>
        <!-- // digunakan untuk menyimpan data dari contoh template excel yg sudah diisi ke dalam database -->
        <!-- <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatepeg()" style="min-width:90px;">Upload Template</a>      -->
        <?php } ?>
    </div>
    
    <div id="dlgtemplatepeg" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatepeg">
    	<form id="fmtemplatepeg" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template datapegawai</td>                    
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
    
    <div id="dlgdatapegawai" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:5px 20px 10px 10px;top:40px;"
    		closed="true" buttons="#dlg-buttonsdatapegawai">
    	<form id="fmdatapegawai" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
        <table>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>No Induk</label></div>
                        <input class="easyui-textbox" id="nipdatapegawai" name="nipdatapegawai" data-options="onChange:setGrade,required:true" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>No Induk Lama</label></div>
                        <input class="easyui-textbox" id="niplamadatapegawai" name="niplamadatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Jenis Mutasi</label></div>
                        <select id="jenis_mutasidatapegawai" name="jenis_mutasidatapegawai" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 100%;">
                            <option value="BARU">Pegawai Baru</option>
                            <option value="MUTASI">Pegawai Mutasi</option>
                        </select>                                                                                                    
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Jenis Device</label></div>
                        <select id="aksesdatapegawai" name="aksesdatapegawai" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 100%;">
                            <option value="android">Android</option>
                            <option value="ios">IOS</option>
                        </select>                                                                                                    
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Jenis Pegawai</label></div>
                        <input class="easyui-combobox"
                            id="jenisdatapegawai"
                            name="jenisdatapegawai" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_jenis_pegawai.php',                           
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">                                                
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Nomor SK</label></div>
                        <input class="easyui-textbox" id="no_skdatapegawai" name="no_skdatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Nama Pegawai</label></div>
                        <input class="easyui-textbox" id="namadatapegawai" name="namadatapegawai" data-options="required:true" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Jenis Kelamin</label></div>
                        <select id="jenis_kelamindatapegawai" name="jenis_kelamindatapegawai" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 100%;">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>                                                                                                        
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Tempat Lahir</label></div>
                        <input class="easyui-textbox" id="tempat_lahirdatapegawai" name="tempat_lahirdatapegawai" data-options="required:true" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Tanggal lahir</label></div>
                        <input class="easyui-datebox" id="tgl_lahirdatapegawai" name="tgl_lahirdatapegawai" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td colspan="3">
                    <div>
                        <div class="labelfor"><label>Alamat</label></div>
                        <input class="easyui-textbox" id="alamatdatapegawai" name="alamatdatapegawai" data-options="required:true,multiline:true" style="width: 100%;height:40px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td colspan="3">
                    <div>
                        <div class="labelfor"><label>Alamat Domisili</label></div>
                        <input class="easyui-textbox" id="alamat_domisilidatapegawai" name="alamat_domisilidatapegawai" data-options="required:true,multiline:true" style="width: 100%;height:40px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td colspan="3">
                    <div>
                        <div class="labelfor"><label>Jabatan</label></div>
                        <input class="easyui-textbox" id="jabatandatapegawai" name="jabatandatapegawai" data-options="required:true,multiline:true" style="width: 100%;height:40px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Divisi</label></div>
                        <input class="easyui-combobox"
                            id="divisidatapegawai"
                            name="divisidatapegawai" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_divisi.php',                           
                                required:false,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">                        
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Penempatan</label></div>
                        <input class="easyui-combobox"
                            id="penempatandatapegawai"
                            name="penempatandatapegawai" missingMessage="Harus di isi" editable="true"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_penempatan.php',                           
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
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Bidang</label></div>
                        <input class="easyui-textbox" id="bidangdatapegawai" name="bidangdatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Sub Bidang</label></div>
                        <input class="easyui-textbox" id="sub_bidangdatapegawai" name="sub_bidangdatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Grade</label></div>
                        <input class="easyui-combobox"
                            id="gradedatapegawai"
                            name="gradedatapegawai" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_grade.php',                           
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">                        
                        <!-- <input class="easyui-combobox"
                            id="gradedatapegawai"
                            name="gradedatapegawai" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'',                           
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">                         -->
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Skala Grade</label></div>
                        <input class="easyui-textbox" id="skala_gradedatapegawai" name="skala_gradedatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Pendidikan</label></div>
                        <select id="pendidikandatapegawai" name="pendidikandatapegawai" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 100%;">
                            <option value="-">-</option>
                            <option value="SD">SD/Sederajat</option>
                            <option value="SMP">SMP/Sederajat</option>
                            <option value="SMA">SMA/Sederajat</option>
                            <option value="D1">Diploma I</option>
                            <option value="D2">Diploma II</option>
                            <option value="D3">Diploma III</option>
                            <option value="S1">S-1</option>
                            <option value="S2">S-2</option>
                            <option value="S3">S-3</option>
                        </select>                                                                                                    
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Jurusan</label></div>
                        <input class="easyui-textbox" id="jurusandatapegawai" name="jurusandatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Nomor KTP</label></div>
                        <input class="easyui-textbox" id="nikdatapegawai" name="nikdatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Nomor KK</label></div>
                        <input class="easyui-textbox" id="no_kkdatapegawai" name="no_kkdatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Status Kawin</label></div>
                        <select id="statusdatapegawai" name="statusdatapegawai" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 100%;">
                            <option value="-">-</option>
                            <option value="TK0">Tidak Kawin</option>
                            <option value="K0">Kawin</option>
                            <option value="K1">Kawin Anak 1</option>
                            <option value="K2">Kawin Anak 2</option>
                            <option value="K3">Kawin Anak 3</option>
                            <option value="TK1">Duda/Janda Anak 1</option>
                            <option value="TK2">Duda/Janda Anak 2</option>
                            <option value="TK3">Duda/Janda Anak 3</option>
                        </select>                                                                                                    
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Agama</label></div>
                        <select id="agamadatapegawai" name="agamadatapegawai" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 100%;">
                            <option value="I">ISLAM</option>
                            <option value="P">KRISTEN</option>
                            <option value="K">KHATOLIK</option>
                            <option value="H">HINDU</option>
                            <option value="B">BUDHA</option>
                            <option value="-">LAINNYA</option>
                        </select>                                                                                                    
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Telepon</label></div>
                        <input class="easyui-textbox" id="telepondatapegawai" name="telepondatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Email 1</label></div>
                        <input class="easyui-textbox" id="emaildatapegawai" name="emaildatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Email 2</label></div>
                        <input class="easyui-textbox" id="email2datapegawai" name="email2datapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Golongan Darah</label></div>
                        <select id="gol_darahdatapegawai" name="gol_darahdatapegawai" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:false" style="width: 100%;">
                            <option value="-">-</option>
                            <option value="O">GOl Darah O</option>
                            <option value="A">GOl Darah A</option>
                            <option value="A+">GOl Darah A+</option>
                            <option value="B">GOl Darah B</option>
                            <option value="B+">GOl Darah B+</option>
                            <option value="AB">GOl Darah AB</option>
                        </select>                                                                                                    
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Nomor NPWP</label></div>
                        <input class="easyui-textbox" id="npwpdatapegawai" name="npwpdatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>KPP</label></div>
                        <input class="easyui-combobox"
                            id="kppdatapegawai"
                            name="kppdatapegawai" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_kpp.php',                           
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'auto'
                        ">                        
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Level SPPD</label></div>
                        <input class="easyui-combobox"
                            id="level_sppddatapegawai"
                            name="level_sppddatapegawai" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_level_sppd.php',                           
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
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Approval 1</label></div>
                        <input class="easyui-combobox"
                            id="atasan_langsungdatapegawai"
                            name="atasan_langsungdatapegawai" missingMessage="Harus di isi" editable="true"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_atasan_langsung.php',                           
                                required:true,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">                        
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Approval 2</label></div>
                        <input class="easyui-combobox"
                            id="atasan_atasan_langsungdatapegawai"
                            name="atasan_atasan_langsungdatapegawai" missingMessage="Harus di isi" editable="true"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_atasan.php',                           
                                required:false,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">                        
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Tanggal Masuk / Aktif</label></div>
                        <input class="easyui-datebox" id="tgl_masukdatapegawai" name="tgl_masukdatapegawai" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Tanggal Capeg</label></div>
                        <input class="easyui-datebox" id="tgl_capegdatapegawai" name="tgl_capegdatapegawai" editable="true" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td>
                    <div>
                        <div class="labelfor"><label>Tanggal Pegawai Tetap</label></div>
                        <input class="easyui-datebox" id="tgl_pegawaidatapegawai" name="tgl_pegawaidatapegawai" editable="true" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td> 
                <td></td>
                <td>
                    <div>
                        <div class="labelfor"><label>Project</label></div>
                        <input class="easyui-combobox"
                            id="kd_project_sapdatapegawai"
                            name="kd_project_sapdatapegawai" missingMessage="Harus di isi" editable="true"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_project.php',                           
                                required:false,
                                method:'get',
                                valueField:'value',
                                textField:'text',
                                panelHeight:'140px'
                        ">                        
                    </div>                    
                </td> 
            </tr>

            <tr>
                <td colspan="3">
                    <label style="font-weight:bold;font-size:11px;color:#0062c2;margin-top:10px;">REKENING PAYROLL</label>
                </td>
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor1"><label>Nama Bank</label></div>
                        <input class="easyui-textbox" id="nama_bankdatapegawai" name="nama_bankdatapegawai" data-options="required:true" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor1"><label>Nomor Rekening</label></div>
                        <input class="easyui-textbox" id="no_rekeningdatapegawai" name="no_rekeningdatapegawai" data-options="required:true" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td colspan="3">
                    <div>
                        <div class="labelfor"><label>Atas Nama</label></div>
                        <input class="easyui-textbox" id="nama_rekeningdatapegawai" name="nama_rekeningdatapegawai" data-options="required:true" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td colspan="3">
                    <label style="font-weight:bold;font-size:11px;color:#0062c2;margin-top:10px;">DATA DPLK</label>
                </td>
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor1"><label>Nama Bank DPLK</label></div>
                        <input class="easyui-textbox" id="nama_bankdplkdatapegawai" name="nama_bankdplkdatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor1"><label>Nomor Rekening DPLK</label></div>
                        <input class="easyui-textbox" id="no_rekeningdplkdatapegawai" name="no_rekeningdplkdatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td colspan="3">
                    <div>
                        <div class="labelfor"><label>Nomor CIF</label></div>
                        <input class="easyui-textbox" id="no_cifdplkdatapegawai" name="no_cifdplkdatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td colspan="3">
                    <label style="font-weight:bold;font-size:11px;color:#0062c2;margin-top:10px;">PERLINDUNGAN SOSIAL</label>
                </td>
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor1"><label>No BPJS Kesehatan</label></div>
                        <input class="easyui-textbox" id="no_bpjs_kesdatapegawai" name="no_bpjs_kesdatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor1"><label>Tanggal Terdaftar</label></div>
                        <input class="easyui-datebox" id="tgl_bpjs_kesdatapegawai" name="tgl_bpjs_kesdatapegawai" editable="true" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td colspan="3">
                    <div>
                        <div class="labelfor1"><label>Nomor VA</label></div>
                        <input class="easyui-textbox" id="va_bpjs_kesdatapegawai" name="va_bpjs_kesdatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>No BPJS TK</label></div>
                        <input class="easyui-textbox" id="no_bpjs_tkdatapegawai" name="no_bpjs_tkdatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Tanggal Terdaftar</label></div>
                        <input class="easyui-datebox" id="tgl_bpjs_tkdatapegawai" name="tgl_bpjs_tkdatapegawai" editable="true" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td colspan="3">
                    <div>
                        <div class="labelfor1"><label>Nomor VA</label></div>
                        <input class="easyui-textbox" id="va_bpjs_tkdatapegawai" name="va_bpjs_tkdatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Nomor Inhealth</label></div>
                        <input class="easyui-textbox" id="no_inhealthdatapegawai" name="no_inhealthdatapegawai" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Tanggal Terdaftar</label></div>
                        <input class="easyui-datebox" id="tgl_inhealthdatapegawai" name="tgl_inhealthdatapegawai" editable="true" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td colspan="3">
                    <label style="font-weight:bold;font-size:11px;color:#0062c2;margin-top:10px;">STATUS AKTIF</label>
                </td>
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor1"><label>Status</label></div>
                        <select id="aktifdatapegawai" name="aktifdatapegawai" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 100%;">
                            <option value="1">Aktif</option>
                            <option value="2">Resign / Menundurkan Diri</option>
                            <option value="3">Masa Tugas Karya Selesai</option>
                            <option value="4">Masa Tugas Kerja Selesai</option>
                            <option value="5">Kembali Ke Holding</option>
                            <option value="6">Mutasi Ke Perusahaan Lain</option>
                            <option value="7">Diberhentikan</option>
                        </select>                                                                                                    
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label style="color:red;">Tanggal Non Aktif</label></div>
                        <input class="easyui-datebox" id="tgl_berhentidatapegawai" name="tgl_berhentidatapegawai" editable="true" data-options="required:false,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td> 
            </tr>
        </table>
        </form>
    </div>
    <div id="dlg-buttonsdatapegawai">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savedatapegawai()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgdatapegawai').dialog('close')" style="min-width:90px">Batal</a>
    </div>

    <!--
    <div id="dlgatasan1" class="easyui-dialog" modal="true" style="width:600px;height:400px;padding:5px 5px" closed="true" buttons="#dlg-buttonsatasan1">
        <table id="dgatasan1" title="" style="width:100%;height:100%"	
            url="" pageSize="20" remoteSort="false"        
            toolbar="#" pagination="false" nowrap="false" method="post"   
            rownumbers="false" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th data-options="field:'ck',checkbox:true"></th>
                <th field="nipatasan1" width="100" align="left" halign="left" data-options="">NIP</th>
                <th field="namaatasan1" width="400" align="left" halign="center" data-options="">NAMA</th>
            </tr>
        </thead>
        </table>
        <script>
            $('#dgatasan1').datagrid().datagrid('enableFilter');
        </script>
    </div>
    <div id="dlg-buttonsatasan1">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-check" onclick="pilihatasan1()" style="min-width:90px">Pilih</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgatasan1').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgatasan2" class="easyui-dialog" modal="true" style="width:600px;height:400px;padding:5px 5px" closed="true" buttons="#dlg-buttonsatasan2">
        <table id="dgatasan2" title="" style="width:100%;height:100%"	
            url="" pageSize="20" remoteSort="false"        
            toolbar="#" pagination="false" nowrap="false" method="post"   
            rownumbers="false" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th data-options="field:'ck',checkbox:true"></th>
                <th field="nipatasan2" width="100" align="left" halign="left" data-options="">NIP</th>
                <th field="namaatasan2" width="400" align="left" halign="center" data-options="">NAMA</th>
            </tr>
        </thead>
        </table>
        <script>
            $('#dgatasan2').datagrid().datagrid('enableFilter');
        </script>
    </div>
    <div id="dlg-buttonsatasan2">        
    	<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-check" onclick="pilihatasan2()" style="min-width:90px">Pilih</a>
    	<a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgatasan2').dialog('close')" style="min-width:90px">Batal</a>
    </div> -->
    
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
        // function loadatasan1(){
        //     $('#dlgatasan1').dialog('open').dialog('setTitle','Pilih datapegawai');
        //     $('#dgatasan1').datagrid('loadData',[]);
        //     $('#dgatasan1').datagrid('load','get_atasan1.php');
        // }
        // function pilihatasan1(){
        //     var row = $('#dgatasan1').datagrid('getSelected');
        //     var nipatasan1 = row.nipatasan1;
        //     var namaatasan1 = row.namaatasan1;
        //     $('#dlgatasan1').dialog('close');
        //     $("#nipatasan1").val(nipatasan1);
        //     $("#atasan_langsung2datapegawai").textbox('setValue',namaatasan1);
        // }

        // function loadatasan2(){
        //     $('#dlgatasan2').dialog('open').dialog('setTitle','Pilih datapegawai');
        //     $('#dgatasan2').datagrid('loadData',[]);
        //     $('#dgatasan2').datagrid('load','get_atasan2.php');
        // }
        // function pilihatasan2(){
        //     var row = $('#dgatasan2').datagrid('getSelected');
        //     var nipatasan2 = row.nipatasan2;
        //     var namaatasan2 = row.namaatasan2;
        //     $('#dlgatasan2').dialog('close');
        //     $("#nipatasan2").val(nipatasan2);
        //     $("#atasan_atasan_langsung2datapegawai").textbox('setValue',namaatasan2);
        // }
        
        // function loadregion(){
        //     $('#dlgregion').dialog('open').dialog('setTitle','Pilih datapegawai');
        //     $('#dgregion').datagrid('loadData',[]);
        //     $('#dgregion').datagrid('load','get_atasan1.php');
        // }
        // function pilihregion(){
        //     var row = $('#dgatasan1').datagrid('getSelected');
        //     var nipatasan1 = row.nipatasan1;
        //     var namaatasan1 = row.namaatasan1;
        //     $('#dlgatasan1').dialog('close');
        //     $("#nipatasan1").val(nipatasan1);
        //     $("#atasan_langsung2datapegawai").textbox('setValue',namaatasan1);
        // }

        // function loadarea(){
        //     $('#dlgatasan2').dialog('open').dialog('setTitle','Pilih datapegawai');
        //     $('#dgatasan2').datagrid('loadData',[]);
        //     $('#dgatasan2').datagrid('load','get_atasan2.php');
        // }
        // function piliharea(){
        //     var row = $('#dgatasan2').datagrid('getSelected');
        //     var nipatasan2 = row.nipatasan2;
        //     var namaatasan2 = row.namaatasan2;
        //     $('#dlgatasan2').dialog('close');
        //     $("#nipatasan2").val(nipatasan2);
        //     $("#atasan_atasan_langsung2datapegawai").textbox('setValue',namaatasan2);
        // }

    	function adddatapegawai(){
    		$('#dlgdatapegawai').dialog('open').dialog('setTitle','Input Data Pegawai');
    		$('#fmdatapegawai').form('clear');
            $("#nipdatapegawai").textbox('readonly',false);
            $("#aktifdatapegawai").combobox('setValue',1);
            $("#aktifdatapegawai").combobox('readonly',true);
            $("#tgl_berhentidatapegawai").datebox('readonly',true);
    		url = '<?=$foldernya;?>save_datapegawai.php';
    	}
    	function editdatapegawai(index){
            var row = $('#dgdatapegawai').datagrid('getRow', index);
    		if (row){
                $('#dlgdatapegawai').dialog('open').dialog('setTitle','Update Data Pegawai');
                $('#fmdatapegawai').form('clear');
    			$('#fmdatapegawai').form('load',row);  
                $("#nipdatapegawai").textbox('readonly',true); 
                $("#aktifdatapegawai").combobox('readonly',false);
                $("#tgl_berhentidatapegawai").datebox('readonly',false);
                url = '<?=$foldernya;?>update_datapegawai.php?id='+row.iddatapegawai;  
            }          
    	}
    	function savedatapegawai(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmdatapegawai').form('submit',{
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
                        $('#dlgdatapegawai').dialog('close');
                        $('#dgdatapegawai').datagrid('reload');
                    }
                }
            });
    	}
    	function destroydatapegawai(index){
            var row = $('#dgdatapegawai').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data pegawai "'+row.namadatapegawai+'"?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_datapegawai.php',{id:row.iddatapegawai},function(result){
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

        // digunakan untuk menyimpan data excel ke dalam database
    	// function uploadtemplatepeg(){
    	// 	$('#dlgtemplatepeg').dialog('open').dialog('setTitle','Upoad Template datapegawai');
        //     $('#fmtemplatepeg').form('clear');
    	// 	url = 'save_templatepeg.php';
    	// }
    	// function savetemplatepeg(){
        //     $.messager.progress({height:75, text:'Proses import Data'});
    	// 	$('#fmtemplatepeg').form('submit',{
    	// 		url: url,
    	// 		onSubmit: function(){
        //             //return $(this).form('enableValidation').form('validate');
        //             var v=$(this).form('validate');
        //             if(!v) $.messager.progress('close');
        //             return v;                    
    	// 		},
    	// 		success: function(result){
        //             //alert(result);
        //             $.messager.progress('close');
        //             $.post('updatedata/update_datapegawai.php',{},function(result){},'json');
        //             $('#dlgtemplatepeg').dialog('close');
    	// 			$('#dgdatapegawai').datagrid('reload');
        //             $.messager.show({
        //                 title: 'Result',
        //                 msg: result.successMsg
        //             });
        //             /*
    	// 			if (result.errorMsg){
    	// 				$.messager.show({
    	// 					title: 'Error',
    	// 					msg: result.errorMsg
    	// 				});
    	// 			} else {
    	// 				$('#dlgtemplatepeg').dialog('close');
    	// 				$('#dgdatapegawai').datagrid('reload');
    	// 			}
        //             */
    	// 		}
    	// 	});
    	// }
        
    	// function detaildatapegawai(index){
        //     var row = $('#dgdatapegawai').datagrid('getRow', index);
    	// 	if (row){
        //         if ($('#tt').tabs('exists','Riwayat datapegawai')){
        //             $('#tt').tabs('select','Riwayat datapegawai');
        //             var tab = $('#tt').tabs('getSelected');
        //             tab.panel('refresh', 'datapegawai2.php?nip='+row.nipdatapegawai+'&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
        //         } else {
        //             $('#tt').tabs('add',{
        //                 title: 'Riwayat datapegawai',
        //                 href: 'datapegawai2.php?nip='+row.nipdatapegawai+'&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
        //                 closable: true
        //             });
        //         }
    	// 	}
    	// }
        
    	// function cvdatapegawai(nip){
    	// 	if (nip!==""){
        //         window.open("cetakcv.php?nip="+nip,"_blank");
    	// 	}
    	// }

        // function importsipeg(){
        //     $.messager.confirm('Konfirmasi','Proses ini akan melakukan import data datapegawai dari sipeg ke hris, lanjutkan?',function(r){
        //         if (r){
        //             $.messager.progress({height:75, text:'Proses import Data'});
        //             $.post('import_datapegawai.php',{},function(result){
        //                 $.messager.progress('close');
        //                 $.messager.alert('Result',result.errorMsg,'info');
        //                 /*
        //                 if (result.success){
        //                     $('#dgdatapegawai').datagrid('reload');	// reload the user data
        //                 } else {
        //                     $.messager.show({
        //                         title: 'Error',
        //                         msg: result.errorMsg
        //                     });
        //                 }
        //                 */
        //             },'json');
        //         }
        //     });

        // }

        // $("#dgdatapegawai").height($(window).height() - 0);
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
        /* .labelfor {
            font-weight:normal;
            color:#646565;
            font-size:12px;
            margin-bottom:3px !important;
            margin-top:5px !important;
        } */

    </style>
<?php    
}
?>