<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/pajak/";
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
        
        function formatrp3(val,row){
            if(val===""){
                return "";
            } else {
                return number_format3(val,2,',','.');
            }
        };
        
        function number_format3(num,dig,dec,sep) {
            x=new Array();
            s=(num<0?"-":"");
            num=Math.abs(num).toFixed(dig).split(".");
            r=num[0].split("").reverse();
            for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
            //return "Rp "+s+x.join("")+(num[1]?dec+num[1]:"");
            return s+x.join("")+(num[1]?dec+num[1]:"")+"%";
        }

        function onSelectdepartemen(){
            var nilai1 = $('#kode_departemenmappingpajak').combobox('getValue');
            var url1 = '<?=$foldernya;?>get_project_mapping.php?kode_departemen='+nilai1;
            $('#kode_projectmappingpajak').combobox('enable');
            $('#kode_projectmappingpajak').combobox('clear'); 
            $('#kode_projectmappingpajak').combobox('reload',url1);
    	}

        function changeknowas(){
            var gelar_depan = $("#gelar_depanmappingpajak").combobox('getValue');
            var gelar_belakang = $("#gelar_belakangmappingpajak").combobox('getValue');
            var nama_lengkap = $("#nama_lengkapmappingpajak").textbox('getValue');
            var know_as = "";
            if(gelar_depan!==""){
                know_as += gelar_depan+" ";
            }
            know_as += nama_lengkap;
            if(gelar_belakang!==""){
                know_as += " "+gelar_belakang;
            }
            $("#know_asmappingpajak").textbox('setValue',know_as);
        }
    </script>

    <script type="text/javascript">                     
		function doSearchmappingpajak(){
            $('#dgmappingpajak').datagrid('load',{
				namamappingpajakcari: $('#namamappingpajakcari').textbox('getValue')
			});
		}
        function aksimappingpajak(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editmappingpajak(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                //var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroymappingpajak(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                //var c = '<a href="javascript:void(0)" title="Riwayat" onclick="detailmappingpajak(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:8px !important;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                //var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                //var c = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:10px;"></i></button></a>';
            }
            //var c = '<br/><a href="javascript:void(0)" title="Riwayat mappingpajak" onclick="detailmappingpajak(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:100%;min-height:25px;font-size:10.5px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;padding:5px;">RIWAYAT</button></a>';
            //return a+b+c;
            return a;
        }  
        function aksimappingpajak2(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            var a = '<a href="javascript:void(0)" title="Riwayat mappingpajak" onclick="detailmappingpajak(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:100%;min-height:25px;font-size:10.5px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;padding:5px;">RIWAYAT</button></a>';
            return a;
        }  

        function namanya(value,row,index){
            var a = row.user_fullnameuser;
            var b = '<span style="color:#337ab7;">'+row.jabatanuser+'</span>';
            return a+"<br/>"+b;
        }  

		function styler1(value,row,index){
            //return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
            return 'padding-top:3px;padding-bottom:3px;';
		}
        
        $('#kode_negaramappingpajak').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#sukumappingpajak').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#kode_negaramappingpajak').combobox({
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
        $('#sukumappingpajak').combobox({
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
        $("#dgmappingpajak").datagrid({
            onDblClickRow: function() {
                //editUser();
            }            
        });
    });
    </script>
    <table id="dgmappingpajak" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_mappingpajak.php" pageSize="20"        
    		toolbar="#toolbarmappingpajak" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
		<thead data-options="frozen:true">
			<tr>
                <th field="aksimappingpajak" width="50" align="center" halign="center" data-options="formatter:aksimappingpajak,styler:styler1">Aksi</th>
    			<th field="nipmappingpajak" width="120" align="center" halign="center" data-options="styler:styler1">No Induk</th>
    			<th field="namamappingpajak" width="200" align="left" halign="left" data-options="styler:styler1">Nama Lengkap</th>                
			</tr>
		</thead>
    	<thead>
    		<tr>
                <th field="kode_departemenmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">Departemen</th>
                <th field="kode_projectmappingpajak" width="140" align="center" halign="center" data-options="styler:styler1">Kode Project</th>
                <th field="tarif_grademappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">Tarif Grade<br/>(P1)</th>
                <th field="honorariummappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">Honorarium</th>
                <th field="honorermappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">Honorer</th>
                <!-- <th field="tarif_grademappingpajak" width="100" align="right" halign="center" data-options="styler:styler1">Tarif Grade<br/>(P1)</th> -->
                <th field="tunjangan_posisimappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">T.Posisi<br/>(P2-1A)</th>
                <th field="p21bmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">T.Posisi<br/>(P2-1B)</th>
                <th field="tunjangan_kemahalanmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">T.Lokasi</th>
                <th field="tunjangan_perumahanmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">T.Perumahan</th>
                <th field="tunjangan_transportasimappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">T.Transportasi</th>
                <th field="bantuan_pulsamappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">T.Komunikasi</th>
                <th field="dplk_perseromappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">DPLK<br/>Persero</th>
                <th field="dplk_simponi_prmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">DPLK<br/>Perusahaan</th>
                <th field="bpjs_kes_ppmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">BPJS Kes</th>
                <th field="bpjs_tk_ppmappingpajak" width="110" align="center" halign="center" data-options="styler:styler1">BPJS TK (JP)</th>
                <th field="bpjs_tk_kpmappingpajak" width="110" align="center" halign="center" data-options="styler:styler1">BPJS TK (JKM)</th>
                <th field="bpjs_tk_kkpmappingpajak" width="110" align="center" halign="center" data-options="styler:styler1">BPJS TK (JKK)</th>
                <th field="bpjs_tk_htpmappingpajak" width="110" align="center" halign="center" data-options="styler:styler1">BPJS TK (JHT)</th>
                <th field="copmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">COP</th>
                <th field="fasilitas_hpmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">Fasilitas HP</th>
                <th field="reimburse_kesehatanmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">Reimburse<br/>Kesehatan</th>
                <th field="asuransi_kesehatanmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">Asuransi<br/>Kesehatan</th>
                <th field="sarana_kerjamappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">Sarana Kerja</th>
                <th field="asuransi_purna_jabatanmappingpajak" width="120" align="center" halign="center" data-options="styler:styler1">Asuransi<br/>Purna Jabatan</th>
                <th field="medical_checkupmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">Medical<br/>Checkup</th>
                <th field="beban_pph21mappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">Beban<br/>PPh 21</th>
                <th field="thrmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">THR</th>
                <th field="cutimappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">Cuti<br/>Tahunan</th>
                <th field="cuti_besarmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">Cuti<br/>Besar</th>
                <th field="winduanmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">Winduan</th>
                <th field="iksmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">IKS</th>
                <th field="ikpmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">IKP</th>
                <th field="sppd_pusatmappingpajak" width="120" align="center" halign="center" data-options="styler:styler1">SPPD<br/>Kantor Pusat</th>
                <th field="sppd_regionmappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">SPPD<br/>Region</th>
                <th field="sppd_mutasimappingpajak" width="100" align="center" halign="center" data-options="styler:styler1">SPPD Mutasi</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarmappingpajak" style="background-color:#fff;padding:5px;">
    	<div id="tbmappingpajak" style="padding:3px">
            <table>
            <tr>
                <td style="padding-right:5px;">NIP/NAMA</td>
                <td style="padding-right:10px;">
                    <input class="easyui-textbox" id="namamappingpajakcari" name="namamappingpajakcari" data-options="required:false,prompt:'search'" style="width: 160px;">
                </td>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchmappingpajak()" style="min-width:90px;">Search</a>
                </td>
            </tr>
            </table>
    	</div>        
    </div>
    
    <div id="dlgmappingpajak" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;top:50px;"
    		closed="true" buttons="#dlg-buttonsmappingpajak">
    	<form id="fmmappingpajak" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>No Induk</label></div>
                        <input class="easyui-textbox" id="nipmappingpajak" name="nipmappingpajak" data-options="required:true" style="width: 100%;" readonly>
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Nama Pegawai</label></div>
                        <input class="easyui-textbox" id="namamappingpajak" name="namamappingpajak" data-options="required:false" style="width: 100%;" readonly>
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Kode Departemen</label></div>
                        <input class="easyui-combobox"
                            id="kode_departemenmappingpajak"
                            name="kode_departemenmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                onChange:onSelectdepartemen,
                                url:'<?=$foldernya;?>get_departemen.php',                           
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
                        <div class="labelfor"><label>Kode Project</label></div>
                        <input class="easyui-combobox"
                            id="kode_projectmappingpajak"
                            name="kode_projectmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_project_mapping.php',                           
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
                        <div class="labelfor"><label>Tarif Grade (P1)</label></div>
                        <input class="easyui-combobox"
                            id="tarif_grademappingpajak"
                            name="tarif_grademappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=tarif_grade',                           
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
                        <div class="labelfor"><label>Honorarium</label></div>
                        <input class="easyui-combobox"
                            id="honorariummappingpajak"
                            name="honorariummappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=honorarium',                           
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
                        <div class="labelfor"><label>Honorer</label></div>
                        <input class="easyui-combobox"
                            id="honorermappingpajak"
                            name="honorermappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=honorer',                           
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
                        <div class="labelfor"><label>P2-1A</label></div>
                        <input class="easyui-combobox"
                            id="tunjangan_posisimappingpajak"
                            name="tunjangan_posisimappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=tunjangan_posisi',                           
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
                        <div class="labelfor"><label>P2-1B</label></div>
                        <input class="easyui-combobox"
                            id="p21bmappingpajak"
                            name="p21bmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=p21b',                           
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
                        <div class="labelfor"><label>P2-2B</label></div>
                        <input class="easyui-combobox"
                            id="p22bmappingpajak"
                            name="p22bmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=p22b',                           
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
                        <div class="labelfor"><label>Tunjangan Lokasi</label></div>
                        <input class="easyui-combobox"
                            id="tunjangan_kemahalanmappingpajak"
                            name="tunjangan_kemahalanmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=tunjangan_kemahalan',                           
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
                        <div class="labelfor"><label>Tunjangan Perumahan</label></div>
                        <input class="easyui-combobox"
                            id="tunjangan_perumahanmappingpajak"
                            name="tunjangan_perumahanmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=tunjangan_perumahan',                           
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
                        <div class="labelfor"><label>Tunjangan Transportasi</label></div>
                        <input class="easyui-combobox"
                            id="tunjangan_transportasimappingpajak"
                            name="tunjangan_transportasimappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=tunjangan_transportasi',                           
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
                        <div class="labelfor"><label>Bantuan Pulsa</label></div>
                        <input class="easyui-combobox"
                            id="bantuan_pulsamappingpajak"
                            name="bantuan_pulsamappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=bantuan_pulsa',                           
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
                        <div class="labelfor"><label>Tunjangan Kompetensi</label></div>
                        <input class="easyui-combobox"
                            id="tunjangan_kompetensimappingpajak"
                            name="tunjangan_kompetensimappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=tunjangan_kompetensi',                           
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
                        <div class="labelfor"><label>DPLK Persero</label></div>
                        <input class="easyui-combobox"
                            id="dplk_perseromappingpajak"
                            name="dplk_perseromappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=dplk_persero',                           
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
                        <div class="labelfor"><label>DPLK Perusahaan</label></div>
                        <input class="easyui-combobox"
                            id="dplk_simponi_prmappingpajak"
                            name="dplk_simponi_prmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=dplk_simponi_pr',                           
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
                        <div class="labelfor"><label>BPJS TK (JP)</label></div>
                        <input class="easyui-combobox"
                            id="bpjs_tk_ppmappingpajak"
                            name="bpjs_tk_ppmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=bpjs_tk_pp',                           
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
                        <div class="labelfor"><label>BPJS TK (JKM)</label></div>
                        <input class="easyui-combobox"
                            id="bpjs_tk_kpmappingpajak"
                            name="bpjs_tk_kpmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=bpjs_tk_kp',                           
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
                        <div class="labelfor"><label>BPJS TK (JKK)</label></div>
                        <input class="easyui-combobox"
                            id="bpjs_tk_kkpmappingpajak"
                            name="bpjs_tk_kkpmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=bpjs_tk_kkp',                           
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
                        <div class="labelfor"><label>BPJS TK (JHT)</label></div>
                        <input class="easyui-combobox"
                            id="bpjs_tk_htpmappingpajak"
                            name="bpjs_tk_htpmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=bpjs_tk_htp',                           
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
                        <div class="labelfor"><label>BPJS Kesehatan</label></div>
                        <input class="easyui-combobox"
                            id="bpjs_kes_ppmappingpajak"
                            name="bpjs_kes_ppmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=bpjs_kes_pp',                           
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
                        <div class="labelfor"><label>COP Kendaraan</label></div>
                        <input class="easyui-combobox"
                            id="copmappingpajak"
                            name="copmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=cop',                           
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
                        <div class="labelfor"><label>Fasilitas HP</label></div>
                        <input class="easyui-combobox"
                            id="fasilitas_hpmappingpajak"
                            name="fasilitas_hpmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=fasilitas_hp',                           
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
                        <div class="labelfor"><label>Reimburse Kesehatan</label></div>
                        <input class="easyui-combobox"
                            id="reimburse_kesehatanmappingpajak"
                            name="reimburse_kesehatanmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=reimburse_kesehatan',                           
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
                        <div class="labelfor"><label>Asuransi Kesehatan</label></div>
                        <input class="easyui-combobox"
                            id="asuransi_kesehatanmappingpajak"
                            name="asuransi_kesehatanmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=asuransi_kesehatan',                           
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
                        <div class="labelfor"><label>Sarana Kerja</label></div>
                        <input class="easyui-combobox"
                            id="sarana_kerjamappingpajak"
                            name="sarana_kerjamappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=sarana_kerja',                           
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
                        <div class="labelfor"><label>SPPD Manual</label></div>
                        <input class="easyui-combobox"
                            id="sppd_manualmappingpajak"
                            name="sppd_manualmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=sppd_manual',                           
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
                        <div class="labelfor"><label>Asuransi Purna Jabatan</label></div>
                        <input class="easyui-combobox"
                            id="asuransi_purna_jabatanmappingpajak"
                            name="asuransi_purna_jabatanmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=asuransi_purna_jabatan',                           
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
                        <div class="labelfor"><label>Medical Check-Up</label></div>
                        <input class="easyui-combobox"
                            id="medical_checkupmappingpajak"
                            name="medical_checkupmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=medical_checkup',                           
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
                        <div class="labelfor"><label>Beban PPh 21</label></div>
                        <input class="easyui-combobox"
                            id="beban_pph21mappingpajak"
                            name="beban_pph21mappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=beban_pph21',                           
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
                        <div class="labelfor"><label>THR</label></div>
                        <input class="easyui-combobox"
                            id="thrmappingpajak"
                            name="thrmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=thr',                           
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
                        <div class="labelfor"><label>Cuti Tahunan</label></div>
                        <input class="easyui-combobox"
                            id="cutimappingpajak"
                            name="cutimappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=cuti',                           
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
                        <div class="labelfor"><label>Cuti Besar</label></div>
                        <input class="easyui-combobox"
                            id="cuti_besarmappingpajak"
                            name="cuti_besarmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=cuti_besar',                           
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
                        <div class="labelfor"><label>Winduan</label></div>
                        <input class="easyui-combobox"
                            id="winduanmappingpajak"
                            name="winduanmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=winduan',                           
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
                        <div class="labelfor"><label>IKS</label></div>
                        <input class="easyui-combobox"
                            id="iksmappingpajak"
                            name="iksmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=iks',                           
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
                        <div class="labelfor"><label>IKP</label></div>
                        <input class="easyui-combobox"
                            id="ikpmappingpajak"
                            name="ikpmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=ikp',                           
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
                        <div class="labelfor"><label>SPPD Ktr Pusat</label></div>
                        <input class="easyui-combobox"
                            id="sppd_pusatmappingpajak"
                            name="sppd_pusatmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=sppd_pusat',                           
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
                        <div class="labelfor"><label>SPPD Non Ktr Pusat</label></div>
                        <input class="easyui-combobox"
                            id="sppd_regionmappingpajak"
                            name="sppd_regionmappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=sppd_region',                           
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
                        <div class="labelfor"><label>SPPD Mutasi</label></div>
                        <input class="easyui-combobox"
                            id="sppd_mutasimappingpajak"
                            name="sppd_mutasimappingpajak" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_akun_mapping.php?kolom=sppd_mutasi',                           
                                required:false,
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
    <div id="dlg-buttonsmappingpajak">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savemappingpajak()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgmappingpajak').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addmappingpajak(){
    		$('#dlgmappingpajak').dialog('open').dialog('setTitle','Input Mapping Pajak');
    		$('#fmmappingpajak').form('clear');
            $("#end_datemappingpajak").datebox('setValue','9999-12-31');
    		url = '<?=$foldernya;?>save_mappingpajak.php[not_found]';
    	}
    	function editmappingpajak(index){
            var row = $('#dgmappingpajak').datagrid('getRow', index);
    		if (row){
                $('#dlgmappingpajak').dialog('open').dialog('setTitle','Update Mapping Pajak');
                $('#fmmappingpajak').form('clear');
    			$('#fmmappingpajak').form('load',row);  
                // alert(row.kode_departemenmappingpajak);
                // $('#kode_projectmappingpajak').combobox('clear');  
                $('#kode_projectmappingpajak').combobox('reload','get_project_mapping.php?kode_departemen='+row.kode_departemenmappingpajak);  
                // $('#kode_projectmappingpajak').combobox('setValue',row.kode_projectmappingpajak);
                url = '<?=$foldernya;?>update_mappingpajak.php?id='+row.idmappingpajak;  
            }          
    	}
    	function savemappingpajak(){
            //var p21b = $("#p21bmappingpajak").numberbox('getValue');
            //alert(p21b);
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmmappingpajak').form('submit',{
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
                        $('#dlgmappingpajak').dialog('close');
                        $('#dgmappingpajak').datagrid('reload');
                    }
                }
            });
    	}
    	function destroymappingpajak(index){
            var row = $('#dgmappingpajak').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data mappingpajak "'+row.nama_lengkapmappingpajak+'"?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_mappingpajak.php[not_found]',{id:row.idmappingpajak},function(result){
    						if (result.success){
    							$('#dgmappingpajak').datagrid('reload');	// reload the user data
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
    		$('#dlgtemplatepeg').dialog('open').dialog('setTitle','Upoad Template mappingpajak');
            $('#fmtemplatepeg').form('clear');
    		url = '<?=$foldernya;?>save_templatepeg.php';
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
    				$('#dgmappingpajak').datagrid('reload');
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
    					$('#dgmappingpajak').datagrid('reload');
    				}
                    */
    			}
    		});
    	}
        
    	function detailmappingpajak(index){
            var row = $('#dgmappingpajak').datagrid('getRow', index);
    		if (row){
                if ($('#tt').tabs('exists','Riwayat mappingpajak')){
                    $('#tt').tabs('select','Riwayat mappingpajak');
                    var tab = $('#tt').tabs('getSelected');
                    tab.panel('refresh', '<?=$foldernya;?>mappingpajak2.php[not_found]?nip='+row.nipmappingpajak+'&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
                } else {
                    $('#tt').tabs('add',{
                        title: 'Riwayat mappingpajak',
                        href: 'mappingpajak2.php[not_found]?nip='+row.nipmappingpajak+'&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                        closable: true
                    });
                }
    		}
    	}

        //$("#dgmappingpajak").height($(window).height() - 0);
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
    	#fmmappingpajak .numberbox input{
    		text-align:right;
    	}
    </style>
<?php    
}
?>