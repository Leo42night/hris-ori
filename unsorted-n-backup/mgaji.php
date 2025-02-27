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
            return s+x.join("")+(num[1]?dec+num[1]:"");
        }

        function changeknowas(){
            var gelar_depan = $("#gelar_depanmgaji").combobox('getValue');
            var gelar_belakang = $("#gelar_belakangmgaji").combobox('getValue');
            var nama_lengkap = $("#nama_lengkapmgaji").textbox('getValue');
            var know_as = "";
            if(gelar_depan!==""){
                know_as += gelar_depan+" ";
            }
            know_as += nama_lengkap;
            if(gelar_belakang!==""){
                know_as += " "+gelar_belakang;
            }
            $("#know_asmgaji").textbox('setValue',know_as);
        }
    </script>

    <script type="text/javascript">                     
		function doSearchmgaji(){
            $('#dgmgaji').datagrid('load',{
				namamgajicari: $('#namamgajicari').textbox('getValue')
			});
		}
        function aksimgaji(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editmgaji(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                //var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroymgaji(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                //var c = '<a href="javascript:void(0)" title="Riwayat" onclick="detailmgaji(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:8px !important;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                //var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
                //var c = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:10px;"></i></button></a>';
            }
            //var c = '<br/><a href="javascript:void(0)" title="Riwayat mgaji" onclick="detailmgaji(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:100%;min-height:25px;font-size:10.5px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;padding:5px;">RIWAYAT</button></a>';
            //return a+b+c;
            return a;
        }  
        function aksimgaji2(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            var a = '<a href="javascript:void(0)" title="Riwayat mgaji" onclick="detailmgaji(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:100%;min-height:25px;font-size:10.5px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;padding:5px;">RIWAYAT</button></a>';
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
        
        $('#kode_negaramgaji').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#sukumgaji').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#kode_negaramgaji').combobox({
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
        $('#sukumgaji').combobox({
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
        $("#dgmgaji").datagrid({
            onDblClickRow: function() {
                //editUser();
            }            
        });
    });
    </script>
    <table id="dgmgaji" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$api_path?>get_master_mgaji.php" pageSize="20"        
    		toolbar="#toolbarmgaji" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
		<thead data-options="frozen:true">
			<tr>
                <th field="aksimgaji" width="50" align="center" halign="center" data-options="formatter:aksimgaji,styler:styler1">Aksi</th>
    			<th field="nipmgaji" width="120" align="center" halign="center" data-options="styler:styler1">No Induk</th>
    			<th field="nama_lengkapmgaji" width="200" align="left" halign="left" data-options="styler:styler1">Nama Lengkap</th>                
			</tr>
		</thead>
    	<thead>
    		<tr>
                <th rowspan="2" field="gaji_dasarmgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Gaji Dasar</th>
                <th rowspan="2" field="honorariummgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Honorarium</th>
                <th rowspan="2" field="honorermgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Honorer</th>
                <th rowspan="2" field="tarif_grademgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Tarif Grade<br/>(P1)</th>
                <th rowspan="2" field="tunjangan_posisimgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">T.Posisi<br/>(P2)</th>
                <th rowspan="2" field="tunjangan_kemahalanmgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">T.Kemahalan</th>
                <th rowspan="2" field="tunjangan_perumahanmgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">T.Perumahan</th>
                <th rowspan="2" field="tunjangan_transportasimgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">T.Transportasi</th>
                <th rowspan="2" field="bantuan_pulsamgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">T.Komunikasi</th>
                <!--<th rowspan="2" field="dplk_perseromgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">DPLK<br/>(Persero)</th>-->
                <th rowspan="2" field="dplk_simponi_prmgaji" width="100" align="center" halign="center" data-options="formatter:formatrp3,styler:styler1">DPLK Dibayar<br/>(Perusahaan)</th>
                <th colspan="2">Tunj.Lainnya(1)</th>
                <th colspan="2">Tunj.Lainnya(2)</th>
                <th colspan="2">Tunj.Lainnya(3)</th>
                <th colspan="2">Tunj.Lainnya(4)</th>
                <th colspan="2">JP (Perusahaan)</th>
                <th colspan="2">JKM (Perusahaan)</th>
                <th colspan="2">JKK (Perusahaan)</th>
                <th colspan="2">JHT (Perusahaan)</th>
                <th rowspan="2" field="bpjs_kes_ppmgaji" width="100" align="center" halign="center" data-options="formatter:formatrp3,styler:styler1">BPJS Kes (%)<br/>(Perusahaan)</th>
                <th colspan="2">JP (Pegawai)</th>
                <th colspan="2">JHT (Pegawai)</th>
                <th rowspan="2" field="bpjs_kes_pkmgaji" width="100" align="center" halign="center" data-options="formatter:formatrp3,styler:styler1">BPJS Kes (%)<br/>(Pegawai)</th>
                <th rowspan="2" field="pot_koperasimgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Potongan<br/>Koperasi</th>
                <th rowspan="2" field="pot_bazismgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Potongan<br/>Bazis</th>
                <th rowspan="2" field="dplk_perseromgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">DPLK<br/>Persero</th>
                <th rowspan="2" field="dplk_simponimgaji" width="100" align="center" halign="center" data-options="formatter:formatrp3,styler:styler1">DPLK Dibayar<br/>Pegawai (%)</th>
                <th rowspan="2" field="pot_dplk_pribadimgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Pot DPLK<br/>Pribadi</th>
                <th rowspan="2" field="cop_kendaraanmgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">COP<br/>Kendaraan</th>
                <th rowspan="2" field="iuran_pesertamgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Iuran<br/>Peserta</th>
                <th rowspan="2" field="brprmgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Potongan<br/>BRPR</th>
                <th rowspan="2" field="sewa_messmgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Sewa Mess</th>
                <th rowspan="2" field="qurbanmgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Potongan<br/>Qurban</th>
                <th rowspan="2" field="arisanmgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Potongan<br/>Arisan</th>
                <th colspan="2">Pot.Lainnya(1)</th>
                <th colspan="2">Pot.Lainnya(2)</th>
                <th colspan="2">Pot.Lainnya(3)</th>
                <th colspan="2">Pot.Lainnya(4)</th>
    		</tr>
    		<tr>
                <th field="nama_tunjangan1mgaji" width="140" align="left" halign="center" data-options="styler:styler1">Uraian</th>
                <th field="tunjangan1mgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
                <th field="nama_tunjangan2mgaji" width="140" align="left" halign="center" data-options="styler:styler1">Uraian</th>
                <th field="tunjangan2mgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
                <th field="nama_tunjangan3mgaji" width="140" align="left" halign="center" data-options="styler:styler1">Uraian</th>
                <th field="tunjangan3mgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
                <th field="nama_tunjangan4mgaji" width="140" align="left" halign="center" data-options="styler:styler1">Uraian</th>
                <th field="tunjangan4mgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
                <th field="bpjs_tk_ppmgaji" width="80" align="center" halign="center" data-options="formatter:formatrp3,styler:styler1">%</th>
                <th field="rp_bpjs_tk_ppmgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
                <th field="bpjs_tk_kpmgaji" width="80" align="center" halign="center" data-options="formatter:formatrp3,styler:styler1">%</th>
                <th field="rp_bpjs_tk_kpmgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
                <th field="bpjs_tk_kkpmgaji" width="80" align="center" halign="center" data-options="formatter:formatrp3,styler:styler1">%</th>
                <th field="rp_bpjs_tk_kkpmgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
                <th field="bpjs_tk_htpmgaji" width="80" align="center" halign="center" data-options="formatter:formatrp3,styler:styler1">%</th>
                <th field="rp_bpjs_tk_htpmgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
                <th field="bpjs_tk_pkmgaji" width="80" align="center" halign="center" data-options="formatter:formatrp3,styler:styler1">%</th>
                <th field="rp_bpjs_tk_pkmgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
                <th field="bpjs_tk_jhtkmgaji" width="80" align="center" halign="center" data-options="formatter:formatrp3,styler:styler1">%</th>
                <th field="rp_bpjs_tk_jhtkmgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
                <th field="nama_potongan1mgaji" width="140" align="left" halign="center" data-options="styler:styler1">Uraian</th>
                <th field="potongan1mgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
                <th field="nama_potongan2mgaji" width="140" align="left" halign="center" data-options="styler:styler1">Uraian</th>
                <th field="potongan2mgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
                <th field="nama_potongan3mgaji" width="140" align="left" halign="center" data-options="styler:styler1">Uraian</th>
                <th field="potongan3mgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
                <th field="nama_potongan4mgaji" width="140" align="left" halign="center" data-options="styler:styler1">Uraian</th>
                <th field="potongan4mgaji" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Rupiah</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarmgaji" style="background-color:#fff;padding:5px;">
    	<div id="tbmgaji" style="padding:3px">
            <table>
            <tr>
                <td style="padding-right:5px;">NIP/NAMA</td>
                <td style="padding-right:10px;">
                    <input class="easyui-textbox" id="namamgajicari" name="namamgajicari" data-options="required:false,prompt:'search'" style="width: 160px;">
                </td>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchmgaji()" style="min-width:90px;">Search</a>
                </td>
            </tr>
            </table>
    	</div>        
        <?php if($akses_proses==="1"){?>
        <!--<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addmgaji()" style="min-width:90px;">Tambah</a>-->
        <a target="_blank" href="template/template_mgaji.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template mgaji</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatepeg()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatepeg" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatepeg">
    	<form id="fmtemplatepeg" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template mgaji</td>                    
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
    
    <div id="dlgmgaji" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsmgaji">
    	<form id="fmmgaji" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td style="width:140px;">No Induk</td>
                <td><input class="easyui-textbox" id="nipmgaji" name="nipmgaji" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;" readonly></td>
                <td style="width:10px;">&nbsp;</td>
                <td style="width:140px;">End Date</td>
                <td><input class="easyui-datebox" id="end_datemgaji" name="end_datemgaji" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 150px;" readonly></td>
            </tr>  
            <tr>
                <td style="width:100px;">Nama</td>
                <td colspan="4">
                    <input class="easyui-textbox" id="nama_lengkapmgaji" name="nama_lengkapmgaji" data-options="required:true" style="width: 460px;" readonly>
                </td>
            </tr>  
            <tr>
                <td colspan="2" style="text-align:center;">
                    <div style="background-color:#5cb85c;color:#fff;height:22px;border-radius:5px;padding-top:5px;margin-top:3px;margin-bottom:3px;">PENDAPATAN</div>
                </td>
                <td style="width:10px;">&nbsp;</td>
                <td colspan="2" style="text-align:center;">
                    <div style="background-color:#d9534f;color:#fff;height:22px;border-radius:5px;padding-top:5px;margin-top:3px;margin-bottom:3px;">POTONGAN</div>
                </td>
            </tr>  
            <tr>
                <td>Gaji Dasar</td>
                <td><input class="easyui-numberbox" id="gaji_dasarmgaji" name="gaji_dasarmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td>Pot.Koperasi</td>
                <td><input class="easyui-numberbox" id="pot_koperasimgaji" name="pot_koperasimgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>              
            <tr>
                <td>Honorarium</td>
                <td><input class="easyui-numberbox" id="honorariummgaji" name="honorariummgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td>Pot.Bazis</td>
                <td><input class="easyui-numberbox" id="pot_bazismgaji" name="pot_bazismgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>              
            <tr>
                <td>Honorer</td>
                <td><input class="easyui-numberbox" id="honorermgaji" name="honorermgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td>DPLK Persero</td>
                <td><input class="easyui-numberbox" id="dplk_perseromgaji" name="dplk_perseromgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>              
            <tr>
                <td>Tarif Grade (P1)</td>
                <td><input class="easyui-numberbox" id="tarif_grademgaji" name="tarif_grademgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td>DPLK Pegawai (%)</td>
                <td><input class="easyui-numberbox" id="dplk_simponimgaji" name="dplk_simponimgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:2,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>              
            <tr>
                <td>Tunj.Posisi (P2)</td>
                <td><input class="easyui-numberbox" id="tunjangan_posisimgaji" name="tunjangan_posisimgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td>DPLK Pribadi</td>
                <td><input class="easyui-numberbox" id="pot_dplk_pribadimgaji" name="pot_dplk_pribadimgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            <tr>
                <td>Tunj.Kemahalan</td>
                <td><input class="easyui-numberbox" id="tunjangan_kemahalanmgaji" name="tunjangan_kemahalanmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td>COP Kendaraan</td>
                <td><input class="easyui-numberbox" id="cop_kendaraanmgaji" name="cop_kendaraanmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            <tr>
                <td>Tunj.Transportasi</td>
                <td><input class="easyui-numberbox" id="tunjangan_transportasimgaji" name="tunjangan_transportasimgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td>Iuran Pekerja</td>
                <td><input class="easyui-numberbox" id="iuran_pesertamgaji" name="iuran_pesertamgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            <tr>
                <td>Bantuan Pulsa</td>
                <td><input class="easyui-numberbox" id="bantuan_pulsamgaji" name="bantuan_pulsamgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td>BRPR</td>
                <td><input class="easyui-numberbox" id="brprmgaji" name="brprmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            <tr>
                <td>DPLK Perushn (%)</td>
                <td><input class="easyui-numberbox" id="dplk_simponi_prmgaji" name="dplk_simponi_prmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:2,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td>Sewa Mess</td>
                <td><input class="easyui-numberbox" id="sewa_messmgaji" name="sewa_messmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            <tr>
                <td>JKM Perusahaan (%)</td>
                <td><input class="easyui-numberbox" id="bpjs_tk_kpmgaji" name="bpjs_tk_kpmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:2,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td>Pot.Qurban</td>
                <td><input class="easyui-numberbox" id="qurbanmgaji" name="qurbanmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            <tr>
                <td style="text-align:right;padding-right:5px;">(Rp)</td>
                <td><input class="easyui-numberbox" id="rp_bpjs_tk_kpmgaji" name="rp_bpjs_tk_kpmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            <tr>
                <td>JKK Perusahaan (%)</td>
                <td><input class="easyui-numberbox" id="bpjs_tk_kkpmgaji" name="bpjs_tk_kkpmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:2,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td>Pot.Arisan</td>
                <td><input class="easyui-numberbox" id="arisanmgaji" name="arisanmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            <tr>
                <td style="text-align:right;padding-right:5px;">(Rp)</td>
                <td><input class="easyui-numberbox" id="rp_bpjs_tk_kkpmgaji" name="rp_bpjs_tk_kkpmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            <tr>
                <td>JP Perusahaan (%)</td>
                <td><input class="easyui-numberbox" id="bpjs_tk_ppmgaji" name="bpjs_tk_ppmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:2,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td>JP Pegawai (%)</td>
                <td><input class="easyui-numberbox" id="bpjs_tk_pkmgaji" name="bpjs_tk_pkmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:2,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            <tr>
                <td style="text-align:right;padding-right:5px;">(Rp)</td>
                <td><input class="easyui-numberbox" id="rp_bpjs_tk_ppmgaji" name="rp_bpjs_tk_ppmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td style="text-align:right;padding-right:5px;">(Rp)</td>
                <td><input class="easyui-numberbox" id="rp_bpjs_tk_pkmgaji" name="rp_bpjs_tk_pkmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            <tr>
                <td>JHT Perusahaan (%)</td>
                <td><input class="easyui-numberbox" id="bpjs_tk_htpmgaji" name="bpjs_tk_htpmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:2,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td>JHT Pegawai (%)</td>
                <td><input class="easyui-numberbox" id="bpjs_tk_jhtkmgaji" name="bpjs_tk_jhtkmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:2,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            <tr>
                <td style="text-align:right;padding-right:5px;">(Rp)</td>
                <td><input class="easyui-numberbox" id="rp_bpjs_tk_htpmgaji" name="rp_bpjs_tk_htpmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td style="text-align:right;padding-right:5px;">(Rp)</td>
                <td><input class="easyui-numberbox" id="rp_bpjs_tk_jhtkmgaji" name="rp_bpjs_tk_jhtkmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            <tr>
                <td>BPJS Kes Persh(%)</td>
                <td><input class="easyui-numberbox" id="bpjs_kes_ppmgaji" name="bpjs_kes_ppmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:2,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
                <td></td>
                <td>BPJS Kes Peg (%)</td>
                <td><input class="easyui-numberbox" id="bpjs_kes_pkmgaji" name="bpjs_kes_pkmgaji" missingMessage="Harus di isi" data-options="required:true,min:0,precision:2,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsmgaji">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savemgaji()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgmgaji').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addmgaji(){
    		$('#dlgmgaji').dialog('open').dialog('setTitle','Input Data mgaji');
    		$('#fmmgaji').form('clear');
            $("#end_datemgaji").datebox('setValue','9999-12-31');
    		url = 'save_mgaji.php';
    	}
    	function editmgaji(index){
            var row = $('#dgmgaji').datagrid('getRow', index);
    		if (row){
                $('#dlgmgaji').dialog('open').dialog('setTitle','Update Data Gaji');
                $('#fmmgaji').form('clear');
    			$('#fmmgaji').form('load',row);      
                url = 'update_mgaji.php?id='+row.idmgaji;  
            }          
    	}
    	function savemgaji(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmmgaji').form('submit',{
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
                        $('#dlgmgaji').dialog('close');
                        $('#dgmgaji').datagrid('reload');
                    }
                }
            });
    	}
    	function destroymgaji(index){
            var row = $('#dgmgaji').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data mgaji "'+row.nama_lengkapmgaji+'"?',function(r){
    				if (r){
    					$.post('destroy_mgaji.php',{id:row.idmgaji},function(result){
    						if (result.success){
    							$('#dgmgaji').datagrid('reload');	// reload the user data
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
    		$('#dlgtemplatepeg').dialog('open').dialog('setTitle','Upoad Template mgaji');
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
    				$('#dgmgaji').datagrid('reload');
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
    					$('#dgmgaji').datagrid('reload');
    				}
                    */
    			}
    		});
    	}
        
    	function detailmgaji(index){
            var row = $('#dgmgaji').datagrid('getRow', index);
    		if (row){
                if ($('#tt').tabs('exists','Riwayat mgaji')){
                    $('#tt').tabs('select','Riwayat mgaji');
                    var tab = $('#tt').tabs('getSelected');
                    tab.panel('refresh', 'mgaji2.php?nip='+row.nipmgaji+'&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
                } else {
                    $('#tt').tabs('add',{
                        title: 'Riwayat mgaji',
                        href: 'mgaji2.php?nip='+row.nipmgaji+'&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                        closable: true
                    });
                }
    		}
    	}

        //$("#dgmgaji").height($(window).height() - 0);
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
    	#fmmgaji .numberbox input{
    		text-align:right;
    	}
    </style>
<?php    
}
?>