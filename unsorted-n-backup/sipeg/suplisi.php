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
		function doSearchsuplisi(){
            $('#dgsuplisi').datagrid('load',{
				blthsuplisicari: $('#blthsuplisicari').datebox('getValue'),
				namasuplisicari: $('#namasuplisicari').textbox('getValue')
			});
		}
        function aksisuplisi(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editsuplisi(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroysuplisi(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsisuplisi(){
            var nilai1 = $('#id_provinsisuplisi').combobox('getValue');
            var url1 = 'get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatensuplisi').combobox('enable');
            $('#id_kabupatensuplisi').combobox('clear'); 
            $('#id_kabupatensuplisi').combobox('reload',url1);
    	}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#negarasuplisi').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_provinsisuplisi').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatensuplisi').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });
        
        function hitungsuplisi(){
            var gaji = $("#gajisuplisi").numberbox('getValue');
            var tunjangan_posisi = $("#tunjangan_posisisuplisi").numberbox('getValue');
            var p21b = $("#p21bsuplisi").numberbox('getValue');
            var tunjangan_kemahalan = $("#tunjangan_kemahalansuplisi").numberbox('getValue');
            var tunjangan_perumahan = $("#tunjangan_perumahansuplisi").numberbox('getValue');
            var tunjangan_transportasi = $("#tunjangan_transportasisuplisi").numberbox('getValue');
            var bantuan_pulsa = $("#bantuan_pulsasuplisi").numberbox('getValue');
            var cuti = $("#cutisuplisi").numberbox('getValue');
            var thr = $("#thrsuplisi").numberbox('getValue');
            var iks = $("#ikssuplisi").numberbox('getValue');
            var bonus = $("#bonussuplisi").numberbox('getValue');
            var winduan = $("#winduansuplisi").numberbox('getValue');
            var honorarium_eo = $("#honorarium_eosuplisi").numberbox('getValue');
            var jumlah = parseFloat(gaji)+parseFloat(tunjangan_posisi)+parseFloat(p21b)+parseFloat(tunjangan_kemahalan)+parseFloat(tunjangan_perumahan)+parseFloat(tunjangan_transportasi)+parseFloat(bantuan_pulsa)+parseFloat(cuti)+parseFloat(thr)+parseFloat(iks)+parseFloat(bonus)+parseFloat(winduan)+parseFloat(honorarium_eo);
            $("#jumlah_suplisisuplisi").numberbox('setValue',jumlah);
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
        $('#negarasuplisi').combobox({
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
        $('#id_provinsisuplisi').combobox({
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
        $('#id_kabupatensuplisi').combobox({
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
        $("#dgsuplisi").datagrid({
        });
    });
    </script>
    <table id="dgsuplisi" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_suplisi.php" pageSize="20"        
    		toolbar="#toolbarsuplisi" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksisuplisi" width="80" align="center" halign="center" data-options="formatter:aksisuplisi,styler:styler1">Aksi</th>
    			<th field="nipsuplisi" width="120" align="center" halign="center" data-options="styler:styler1">NIP</th>
    			<th field="namasuplisi" width="240" align="left" halign="center" data-options="styler:styler1">Nama Pegawai</th>
    			<th field="blthsuplisi" width="80" align="center" halign="center" data-options="styler:styler1">Bulan</th>
                <th field="gajisuplisi" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Gaji</th>
                <th field="tunjangan_posisisuplisi" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">P2-1A</th>
                <th field="p21bsuplisi" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">P2-1B</th>
                <th field="tunjangan_kemahalansuplisi" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Tunjangan<br/>Lokasi</th>
                <th field="tunjangan_perumahansuplisi" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Tunjangan<br/>Perumahan</th>
                <th field="tunjangan_transportasisuplisi" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Tunjangan<br/>Transportasi</th>
                <th field="bantuan_pulsasuplisi" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Bantuan<br/>Pulsa</th>
                <th field="cutisuplisi" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Cuti</th>
                <th field="thrsuplisi" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">THR</th>
                <th field="ikssuplisi" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">IKS</th>
                <th field="bonussuplisi" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">IKP</th>
                <th field="winduansuplisi" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Winduan</th>
                <th field="honorarium_eosuplisi" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Honorarium<br/>EO</th>
                <th field="jumlah_suplisisuplisi" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Total</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarsuplisi" style="background-color:#fff;padding:5px;">
    	<div id="tbsuplisi" style="padding:3px">
            <table>
            <tr>
                <td>BULAN</td>
                <td>
                    <input class="easyui-datebox" id="blthsuplisicari" name="blthsuplisicari" value="<?=date('Y-m');?>" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 100px;">
                </td>
                <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="namasuplisicari" name="namasuplisicari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchsuplisi()" style="min-width:90px;">Search</a>
                    <?php if($akses_proses==="1"){?>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addsuplisi()" style="min-width:90px;">Tambah</a>
                    <?php } ?>
                </td>
            </tr>
            </table>
    	</div>	
        <?php if($akses_proses==="1"){?>
        <a target="_blank" href="<?=$foldernya;?>template/TemplateSuplisi.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Download Template</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatesuplisi()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatesuplisi" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;top:50px;"
    		closed="true" buttons="#dlg-buttonstemplatesuplisi">
    	<form id="fmtemplatesuplisi" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatesuplisi" name="file_templatesuplisi" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatesuplisi">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatesuplisi()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatesuplisi').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgsuplisi" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;top:50px;"
    		closed="true" buttons="#dlg-buttonssuplisi">
    	<form id="fmsuplisi" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>No Induk</label></div>
                        <input class="easyui-textbox" id="nipsuplisi" name="nipsuplisi" data-options="required:true" style="width: 190px;">
                    </div>
                </td> 
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Bulan</label></div>
                        <input class="easyui-datebox" id="blthsuplisi" name="blthsuplisi" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 190px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Gaji</label></div>
                        <input class="easyui-numberbox" id="gajisuplisi" name="gajisuplisi" missingMessage="Harus di isi" data-options="onChange:hitungsuplisi,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>P2-1A</label></div>
                        <input class="easyui-numberbox" id="tunjangan_posisisuplisi" name="tunjangan_posisisuplisi" missingMessage="Harus di isi" data-options="onChange:hitungsuplisi,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Tunjangan Lokasi</label></div>
                        <input class="easyui-numberbox" id="tunjangan_kemahalansuplisi" name="tunjangan_kemahalansuplisi" missingMessage="Harus di isi" data-options="onChange:hitungsuplisi,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>P2-1B</label></div>
                        <input class="easyui-numberbox" id="p21bsuplisi" name="p21bsuplisi" missingMessage="Harus di isi" data-options="onChange:hitungsuplisi,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Tunjangan Perumahan</label></div>
                        <input class="easyui-numberbox" id="tunjangan_perumahansuplisi" name="tunjangan_perumahansuplisi" missingMessage="Harus di isi" data-options="onChange:hitungsuplisi,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Tunjangan Transportasi</label></div>
                        <input class="easyui-numberbox" id="tunjangan_transportasisuplisi" name="tunjangan_transportasisuplisi" missingMessage="Harus di isi" data-options="onChange:hitungsuplisi,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Bantuan Pulsa</label></div>
                        <input class="easyui-numberbox" id="bantuan_pulsasuplisi" name="bantuan_pulsasuplisi" missingMessage="Harus di isi" data-options="onChange:hitungsuplisi,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Cuti</label></div>
                        <input class="easyui-numberbox" id="cutisuplisi" name="cutisuplisi" missingMessage="Harus di isi" data-options="onChange:hitungsuplisi,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>THR</label></div>
                        <input class="easyui-numberbox" id="thrsuplisi" name="thrsuplisi" missingMessage="Harus di isi" data-options="onChange:hitungsuplisi,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>IKS</label></div>
                        <input class="easyui-numberbox" id="ikssuplisi" name="ikssuplisi" missingMessage="Harus di isi" data-options="onChange:hitungsuplisi,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>IKP</label></div>
                        <input class="easyui-numberbox" id="bonussuplisi" name="bonussuplisi" missingMessage="Harus di isi" data-options="onChange:hitungsuplisi,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Winduan</label></div>
                        <input class="easyui-numberbox" id="winduansuplisi" name="winduansuplisi" missingMessage="Harus di isi" data-options="onChange:hitungsuplisi,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Honorarium EO</label></div>
                        <input class="easyui-numberbox" id="honorarium_eosuplisi" name="honorarium_eosuplisi" missingMessage="Harus di isi" data-options="onChange:hitungsuplisi,required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;">
                    </div>
                </td> 
                <td style="width:200px;">
                    <div>
                        <div class="labelfor"><label>Jumlah Suplisi</label></div>
                        <input class="easyui-numberbox" id="jumlah_suplisisuplisi" name="jumlah_suplisisuplisi" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 190px;" readonly>
                    </div>
                </td> 
            </tr>

            </table>
    	</form>
    </div>
    <div id="dlg-buttonssuplisi">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savesuplisi()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgsuplisi').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addsuplisi(){
    		$('#dlgsuplisi').dialog('open').dialog('setTitle','Input Data');
    		$('#fmsuplisi').form('clear');
            $("#nipsuplisi").textbox('readonly',false);
            $("#blthsuplisi").datebox('readonly',false);
            $("#gajisuplisi").numberbox('setValue',0);
            $("#tunjangan_posisisuplisi").numberbox('setValue',0);
            $("#p21bsuplisi").numberbox('setValue',0);
            $("#tunjangan_kemahalansuplisi").numberbox('setValue',0);
            $("#tunjangan_perumahansuplisi").numberbox('setValue',0);
            $("#tunjangan_transportasisuplisi").numberbox('setValue',0);
            $("#bantuan_pulsasuplisi").numberbox('setValue',0);
            $("#cutisuplisi").numberbox('setValue',0);
            $("#thrsuplisi").numberbox('setValue',0);
            $("#ikssuplisi").numberbox('setValue',0);
            $("#bonussuplisi").numberbox('setValue',0);
            $("#winduansuplisi").numberbox('setValue',0);
            $("#honorarium_eosuplisi").numberbox('setValue',0);
            $("#jumlah_suplisisuplisi").numberbox('setValue',0);
    		url = '<?=$foldernya;?>save_suplisi.php';
    	}
    	function editsuplisi(index){
            var row = $('#dgsuplisi').datagrid('getRow', index);
    		if (row){
                $('#dlgsuplisi').dialog('open').dialog('setTitle','Update Data');
                $('#fmsuplisi').form('clear');
    			$('#fmsuplisi').form('load',row); 
                $("#nipsuplisi").textbox('readonly',true);
                $("#blthsuplisi").datebox('readonly',true);
                url = '<?=$foldernya;?>update_suplisi.php?id='+row.idsuplisi;  
            }          
    	}
    	function savesuplisi(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmsuplisi').form('submit',{
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
                        $('#dlgsuplisi').dialog('close');
                        $('#dgsuplisi').datagrid('reload');
                    }
                }
            });
    	}
    	function destroysuplisi(index){
            var row = $('#dgsuplisi').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_suplisi.php',{id:row.idsuplisi},function(result){
    						if (result.success){
    							$('#dgsuplisi').datagrid('reload');	// reload the user data
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

    	function uploadtemplatesuplisi(){
    		$('#dlgtemplatesuplisi').dialog('open').dialog('setTitle','Upoad Template');
            $('#fmtemplatesuplisi').form('clear');
    		url = '<?=$foldernya;?>save_templatesuplisi.php';
    	}
    	function savetemplatesuplisi(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatesuplisi').form('submit',{
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
    					$('#dlgtemplatesuplisi').dialog('close');
    					$('#dgsuplisi').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgsuplisi").height($(window).height() - 0);
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