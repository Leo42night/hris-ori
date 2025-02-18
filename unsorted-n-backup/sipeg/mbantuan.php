<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    include "koneksi.php";
    $foldernya = "sipeg/";
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
		function doSearchmbantuan(){
            $('#dgmbantuan').datagrid('load',{
				statusmbantuancari: $('#statusmbantuancari').combobox('getValue'),
                // level_sppdmbantuancari: $('#level_sppdmbantuancari').combobox('getValue')
			});
		}
        function aksimbantuan(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editmbantuan(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroymbantuan(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
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

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#kd_areambantuan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#nama_unitmbantuan').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#kd_areambantuan').combobox({
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
        $('#nama_unitmbantuan').combobox({
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
                        return i;
                    }
                }
            })
        });
    </script>

    <script type="text/javascript">
    $(function(){
        $("#dgmbantuan").datagrid({
        });
    });
    </script>
    <table id="dgmbantuan" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_mbantuan.php" pageSize="20"        
    		toolbar="#toolbarmbantuan" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th rowspan="2" field="aksimbantuan" width="80" align="center" halign="center" data-options="formatter:aksimbantuan,styler:styler1">Aksi</th>
    			<th colspan="2">Jarak (km)</th>
    			<th rowspan="2" field="statusmbantuan" width="80" align="center" halign="center" data-options="styler:styler1">Status<br/>Kawin</th>
                <th rowspan="2" field="tarifmbantuan" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Tarif</th>
                <th rowspan="2" field="level1mbantuan" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Level 1</th>
                <th rowspan="2" field="level2mbantuan" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Level 2</th>
                <th rowspan="2" field="level3mbantuan" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Level 3</th>
                <th rowspan="2" field="level4mbantuan" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Level 4</th>
                <th rowspan="2" field="level5mbantuan" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Level 5</th>
                <th rowspan="2" field="level6mbantuan" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Level 6</th>
                <th rowspan="2" field="level7mbantuan" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Level 7</th>
    		</tr>
    		<tr>
                <th field="jarak_awalmbantuan" width="70" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Awal</th>
                <th field="jarak_akhirmbantuan" width="70" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Akhir</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarmbantuan" style="background-color:#fff;padding:5px;">
    	<div id="tbmbantuan" style="padding:3px">
            <!-- <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addmbantuan()" style="min-width:90px;">Tambah</a> -->
            <table>
            <tr>
                <td style="padding-right:5px;">Status</td>
                <td style="padding-right:10px;">
                    <select id="statusmbantuancari" name="statusmbantuancari" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 140px;">
                        <option value="semua" selected>Semua</option>
                        <option value="TK0">Tidak Kawin</option>
                        <option value="K0">Kawin</option>
                        <option value="K1">Kawin Anak 1</option>
                        <option value="K2">Kawin Anak 2</option>
                        <option value="K3">Kawin Anak 3</option>
                        <option value="TK1">Duda/Janda Anak 1</option>
                        <option value="TK2">Duda/Janda Anak 2</option>
                        <option value="TK3">Duda/Janda Anak 3</option>
                    </select>                                                                                                                        
                </td>
                <!-- <td style="padding-right:5px;">Level SPPD</td>
                <td style="padding-right:10px;">
                    <input class="easyui-combobox"
                        id="level_sppdmbantuancari" value="semua"
                        name="level_sppdmbantuancari" missingMessage="Harus di isi" editable="false"
                        style="padding: 2px; width: 180px;" 
                        data-options=" 
                            url:'<?=$foldernya;?>get_level_sppdcari.php',                           
                            required:false,
                            method:'get',
                            valueField:'value',
                            textField:'text',
                            panelHeight:'140px'
                    ">                                                
                </td> -->
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchmbantuan()" style="min-width:90px;">Search</a>
                    <?php if($akses_proses==="1"){?>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addmbantuan()" style="min-width:90px;">Tambah</a>
                    <?php } ?>
                </td>
            </tr>
            </table>
    	</div>        
    </div>
    
    <div id="dlgmbantuan" class="easyui-dialog" modal="true" style="width:380px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsmbantuan">
    	<form id="fmmbantuan" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table style="width:350px;">
            <tr>
                <td style="width:49%;">
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Jarak Awal (km)</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="jarak_awalmbantuan" name="jarak_awalmbantuan" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
                <td style="width:2%;"></td>
                <td style="width:49%;">
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Jarak Akhir (km)</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="jarak_akhirmbantuan" name="jarak_akhirmbantuan" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Status Kawin</label>
                        <span class="brxsmall1"></span>
                        <select id="statusmbantuan" name="statusmbantuan" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 100%;">
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
                <td></td>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Tarif</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="tarifmbantuan" name="tarifmbantuan" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Level 1</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="level1mbantuan" name="level1mbantuan" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
                <td></td>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Level 2</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="level2mbantuan" name="level2mbantuan" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Level 3</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="level3mbantuan" name="level3mbantuan" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
                <td></td>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Level4</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="level4mbantuan" name="level4mbantuan" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Level 5</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="level5mbantuan" name="level5mbantuan" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
                <td></td>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Level 6</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="level6mbantuan" name="level6mbantuan" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Level 7</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="level7mbantuan" name="level7mbantuan" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsmbantuan">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savembantuan()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgmbantuan').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addmbantuan(){
    		$('#dlgmbantuan').dialog('open').dialog('setTitle','Input Data Penempatan');
    		$('#fmmbantuan').form('clear');
    		url = '<?=$foldernya;?>save_mbantuan.php?id=0';
    	}
    	function editmbantuan(index){
            var row = $('#dgmbantuan').datagrid('getRow', index);
    		if (row){
                $('#dlgmbantuan').dialog('open').dialog('setTitle','Update Data Penempatan');
                $('#fmmbantuan').form('clear');
    			$('#fmmbantuan').form('load',row); 
                url = '<?=$foldernya;?>update_mbantuan.php?id='+row.idmbantuan;  
            }          
    	}
    	function savembantuan(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmmbantuan').form('submit',{
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
                        $('#dlgmbantuan').dialog('close');
                        $('#dgmbantuan').datagrid('reload');
                    }
                }
            });
    	}
    	function destroymbantuan(index){
            var row = $('#dgmbantuan').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_mbantuan.php',{id:row.idmbantuan},function(result){
    						if (result.success){
    							$('#dgmbantuan').datagrid('reload');	// reload the user data
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

    	function uploadtemplatembantuan(){
    		$('#dlgtemplatembantuan').dialog('open').dialog('setTitle','Upoad Template Penempatan');
            $('#fmtemplatembantuan').form('clear');
    		url = 'save_templatembantuan.php';
    	}
    	function savetemplatembantuan(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatembantuan').form('submit',{
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
    					$('#dlgtemplatembantuan').dialog('close');
    					$('#dgmbantuan').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgmbantuan").height($(window).height() - 0);
    </script>
    
    <style type="text/css">
    	#fmuser{
    		margin:0;
    		padding:10px 10px;
    	}
    	.ftitle{
    		font-size:14px;
    		font-weight:normal;
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
        .brxsmall {
            display: block;
            /*margin-bottom: -.1em !important;*/
            margin-bottom: 0.5em !important;
        }
        .brxsmall1 {
            display: block;
            margin-bottom: 0.2em !important;
        }
        .brxsmall2 {
            display: block;
            margin-bottom: -.0em !important;
        }
        .brxsmall3 {
            display: block;
            margin-bottom: -.2em !important;
        }

    </style>
<?php    
}
?>