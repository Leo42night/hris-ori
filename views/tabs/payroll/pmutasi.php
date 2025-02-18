<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/payroll/";    
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
		function doSearchpmutasi(){
            $('#dgpmutasi').datagrid('load',{
				tahunpmutasicari: $('#tahunpmutasicari').numberbox('getValue'),
				namapmutasicari: $('#namapmutasicari').textbox('getValue')
			});
		}
        function aksipmutasi(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editpmutasi(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroypmutasi(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  

        function onSelectprovinsipmutasi(){
            var nilai1 = $('#id_provinsipmutasi').combobox('getValue');
            var url1 = 'get_kabupaten.php?id_provinsi='+nilai1;
            $('#id_kabupatenpmutasi').combobox('enable');
            $('#id_kabupatenpmutasi').combobox('clear'); 
            $('#id_kabupatenpmutasi').combobox('reload',url1);
    	}

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#negarapmutasi').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_provinsipmutasi').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#id_kabupatenpmutasi').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
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

    </script> 
    
    <script>        
        $('#negarapmutasi').combobox({
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
        $('#id_provinsipmutasi').combobox({
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
        $('#id_kabupatenpmutasi').combobox({
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
        $("#dgpmutasi").datagrid({
        });
    });
    </script>
    <table id="dgpmutasi" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_pmutasi.php" pageSize="20"        
    		toolbar="#toolbarpmutasi" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksipmutasi" width="80" align="center" halign="center" data-options="formatter:aksipmutasi,styler:styler1">Aksi</th>
    			<th field="nippmutasi" width="120" align="center" halign="center" data-options="styler:styler1">NIP</th>
    			<th field="namapmutasi" width="240" align="left" halign="center" data-options="styler:styler1">Nama Pegawai</th>
    			<th field="tahunpmutasi" width="80" align="center" halign="center" data-options="styler:styler1">Tahun</th>
    			<th field="blth_awalpmutasi" width="100" align="center" halign="center" data-options="styler:styler1">Bulan Awal</th>
                <th field="blth_akhirpmutasi" width="100" align="center" halign="center" data-options="styler:styler1">Bulan Akhir</th>
                <th field="nettopmutasi" width="120" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Pendapatan Netto</th>
                <th field="pph21pmutasi" width="120" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">PPh Terrpotong</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarpmutasi" style="background-color:#fff;padding:5px;">
    	<div id="tbpmutasi" style="padding:3px">
            <table>
            <tr>
                <td>TAHUN</td>
                <td>
                    <input class="easyui-numberbox" id="tahunpmutasicari" name="tahunpmutasicari" value="<?=date('Y');?>" data-options="required:true" style="width: 60px;">
                </td>
                <td>&nbsp;</td>
                <td>NIP/NAMA</td>
                <td>
                    <input class="easyui-textbox" id="namapmutasicari" name="namapmutasicari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td>
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchpmutasi()" style="min-width:90px;">Search</a>
                    <?php if($akses_proses==="1"){?>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addpmutasi()" style="min-width:90px;">Tambah</a>
                    <?php } ?>
                </td>
            </tr>
            </table>
    	</div>	
        <?php if($akses_proses==="1"){?>
        <a target="_blank" href="<?=$foldernya;?>template/TemplatePmutasi.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Download Template</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatepmutasi()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgtemplatepmutasi" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;top:50px;"
    		closed="true" buttons="#dlg-buttonstemplatepmutasi">
    	<form id="fmtemplatepmutasi" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template</td>                    
                    <td>
            			<input class="easyui-filebox" id="file_templatepmutasi" name="file_templatepmutasi" buttonAlign="left" buttonText="Upload Excel" editable="false" data-options="required:true,prompt:'Format file excel...'" style="width:400px">
                    </td>
                </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonstemplatepmutasi">        
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savetemplatepmutasi()" style="min-width:90px">Upload</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgtemplatepmutasi').dialog('close')" style="min-width:90px">Batal</a>
    </div>
    
    <div id="dlgpmutasi" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;top:50px;"
    		closed="true" buttons="#dlg-buttonspmutasi">
    	<form id="fmpmutasi" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td style="width:100px;">No Induk</td>
                <td><input class="easyui-textbox" id="nippmutasi" name="nippmutasi" missingMessage="Harus di isi" data-options="required:true" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Bulan Awal</td>
                <td><input class="easyui-datebox" id="blth_awalpmutasi" name="blth_awalpmutasi" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Bulan Akhir</td>
                <td><input class="easyui-datebox" id="blth_akhirpmutasi" name="blth_akhirpmutasi" editable="false" data-options="required:true,formatter:myformatter2,parser:myparser2" style="width: 150px;"></td>
            </tr>  
            <tr>
                <td>Netto</td>
                <td><input class="easyui-numberbox" id="nettopmutasi" name="nettopmutasi" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            <tr>
                <td>PPh Terpotong</td>
                <td><input class="easyui-numberbox" id="pph21pmutasi" name="pph21pmutasi" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 150px;"></td>
            </tr>
            </table>
    	</form>
    </div>
    <div id="dlg-buttonspmutasi">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savepmutasi()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgpmutasi').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addpmutasi(){
    		$('#dlgpmutasi').dialog('open').dialog('setTitle','Input Data');
    		$('#fmpmutasi').form('clear');
    		url = '<?=$foldernya;?>save_pmutasi.php';
    	}
    	function editpmutasi(index){
            var row = $('#dgpmutasi').datagrid('getRow', index);
    		if (row){
                $('#dlgpmutasi').dialog('open').dialog('setTitle','Update Data');
                $('#fmpmutasi').form('clear');
    			$('#fmpmutasi').form('load',row); 
                url = '<?=$foldernya;?>update_pmutasi.php?id='+row.idpmutasi;  
            }          
    	}
    	function savepmutasi(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmpmutasi').form('submit',{
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
                        $('#dlgpmutasi').dialog('close');
                        $('#dgpmutasi').datagrid('reload');
                    }
                }
            });
    	}
    	function destroypmutasi(index){
            var row = $('#dgpmutasi').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_pmutasi.php',{id:row.idpmutasi},function(result){
    						if (result.success){
    							$('#dgpmutasi').datagrid('reload');	// reload the user data
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

    	function uploadtemplatepmutasi(){
    		$('#dlgtemplatepmutasi').dialog('open').dialog('setTitle','Upoad Template');
            $('#fmtemplatepmutasi').form('clear');
    		url = '<?=$foldernya;?>save_templatepmutasi.php';
    	}
    	function savetemplatepmutasi(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatepmutasi').form('submit',{
    			url: url,
    			onSubmit: function(){
                    //return $(this).form('enableValidation').form('validate');
                    var v=$(this).form('validate');
                    if(!v) $.messager.progress('close');
                    return v;                    
    			},
    			success: function(result){
                    $.messager.progress('close');
                    alert(result);
    				if (result.errorMsg){
    					$.messager.show({
    						title: 'Error',
    						msg: result.errorMsg
    					});
    				} else {
    					$('#dlgtemplatepmutasi').dialog('close');
    					$('#dgpmutasi').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgpmutasi").height($(window).height() - 0);
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