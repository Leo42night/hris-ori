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
		function doSearchmbiaya(){
            $('#dgmbiaya').datagrid('load',{
				// penempatanmbiayacari: $('#penempatanmbiayacari').textbox('getValue')
			});
		}
        function aksimbiaya(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editmbiaya(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroymbiaya(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
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
        
        $('#kd_areambiaya').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#nama_unitmbiaya').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#kd_areambiaya').combobox({
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
        $('#nama_unitmbiaya').combobox({
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
        $("#dgmbiaya").datagrid({
        });
    });
    </script>
    <table id="dgmbiaya" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_mbiaya.php" pageSize="20"        
    		toolbar="#toolbarmbiaya" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th rowspan="2" field="aksimbiaya" width="80" align="center" halign="center" data-options="formatter:aksimbiaya,styler:styler1">Aksi</th>
    			<th colspan="2">Batas Periode</th>
    			<th rowspan="2" field="nama_level_sppdmbiaya" width="300" align="left" halign="left" data-options="styler:styler1">Level SPPD</th>
                <th rowspan="2" field="konsumsimbiaya" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Konsumsi</th>
                <th rowspan="2" field="cuci_pakaianmbiaya" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Loundry</th>
                <th rowspan="2" field="transportasi_lokalmbiaya" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Transportasi<br/>Lokal</th>
                <th rowspan="2" field="penginapanmbiaya" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Penginapan</th>
                <th rowspan="2" field="lumpsum_penginapanmbiaya" width="100" align="right" halign="center" data-options="formatter:formatrp2,styler:styler1">Lumpsum<br/>Penginapan</th>
    		</tr>
    		<tr>
    			<th field="batas_awal2mbiaya" width="110" align="center" halign="center" data-options="styler:styler1">Mulai</th>
                <th field="batas_akhir2mbiaya" width="110" align="center" halign="center" data-options="styler:styler1">Akhir</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarmbiaya" style="background-color:#fff;padding:5px;">
    	<div id="tbmbiaya" style="padding:3px">
            <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addmbiaya()" style="min-width:90px;">Tambah</a>
            <!--
            <table>
            <tr>
                <td style="padding-right:5px;">Penempatan</td>
                <td style="padding-right:10px;">
                    <input class="easyui-textbox" id="penempatanmbiayacari" name="penempatanmbiayacari" data-options="required:false,prompt:''" style="width: 160px;">
                </td>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchmbiaya()" style="min-width:90px;">Search</a>
                    <?php if($akses_proses==="1"){?>
                    <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addmbiaya()" style="min-width:90px;">Tambah</a>
                    <?php } ?>
                </td>
            </tr>
            </table>
            -->
    	</div>        
    </div>
    
    <div id="dlgmbiaya" class="easyui-dialog" modal="true" style="width:380px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsmbiaya">
    	<form id="fmmbiaya" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table style="width:350px;">
            <tr>
                <td style="width:49%;">
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Periode Awal</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-datebox" id="batas_awalmbiaya" name="batas_awalmbiaya" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td>
                <td style="width:2%;"></td>
                <td style="width:49%;">
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Periode Akhir</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-datebox" id="batas_akhirmbiaya" name="batas_akhirmbiaya" editable="false" data-options="required:true,formatter:myformatter,parser:myparser" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td colspan="3">
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Level SPPD</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-combobox"
                            id="level_sppdmbiaya" value="semua"
                            name="level_sppdmbiaya" missingMessage="Harus di isi" editable="false"
                            style="padding: 2px; width: 100%;" 
                            data-options=" 
                                url:'<?=$foldernya;?>get_level_sppd.php',                           
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
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Konsumsi</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="konsumsimbiaya" name="konsumsimbiaya" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
                <td></td>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Loundry</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="cuci_pakaianmbiaya" name="cuci_pakaianmbiaya" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Transportasi Lokal</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="transportasi_lokalmbiaya" name="transportasi_lokalmbiaya" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
                <td></td>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Penginapan</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="penginapanmbiaya" name="penginapanmbiaya" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Lumpsum Penginapan</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-numberbox" id="lumpsum_penginapanmbiaya" name="lumpsum_penginapanmbiaya" missingMessage="Harus di isi" data-options="required:true,min:0,precision:0,groupSeparator:',',decimalSeparator:'.'" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsmbiaya">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savembiaya()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgmbiaya').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addmbiaya(){
    		$('#dlgmbiaya').dialog('open').dialog('setTitle','Input Data Penempatan');
    		$('#fmmbiaya').form('clear');
    		url = '<?=$foldernya;?>save_mbiaya.php?id=0';
    	}
    	function editmbiaya(index){
            var row = $('#dgmbiaya').datagrid('getRow', index);
    		if (row){
                $('#dlgmbiaya').dialog('open').dialog('setTitle','Update Data Penempatan');
                $('#fmmbiaya').form('clear');
    			$('#fmmbiaya').form('load',row); 
                url = '<?=$foldernya;?>update_mbiaya.php?id='+row.idmbiaya;  
            }          
    	}
    	function savembiaya(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmmbiaya').form('submit',{
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
                        $('#dlgmbiaya').dialog('close');
                        $('#dgmbiaya').datagrid('reload');
                    }
                }
            });
    	}
    	function destroymbiaya(index){
            var row = $('#dgmbiaya').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_mbiaya.php',{id:row.idmbiaya},function(result){
    						if (result.success){
    							$('#dgmbiaya').datagrid('reload');	// reload the user data
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

    	function uploadtemplatembiaya(){
    		$('#dlgtemplatembiaya').dialog('open').dialog('setTitle','Upoad Template Penempatan');
            $('#fmtemplatembiaya').form('clear');
    		url = 'save_templatembiaya.php';
    	}
    	function savetemplatembiaya(){
            $.messager.progress({height:75, text:'Proses import Data'});
    		$('#fmtemplatembiaya').form('submit',{
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
    					$('#dlgtemplatembiaya').dialog('close');
    					$('#dgmbiaya').datagrid('reload');
    				}
    			}
    		});
    	}

        //$("#dgmbiaya").height($(window).height() - 0);
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