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
    include "koneksi_sipeg.php";    
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

        function changeknowas(){
            var gelar_depan = $("#gelar_depanmapping").combobox('getValue');
            var gelar_belakang = $("#gelar_belakangmapping").combobox('getValue');
            var nama_lengkap = $("#nama_lengkapmapping").textbox('getValue');
            var know_as = "";
            if(gelar_depan!==""){
                know_as += gelar_depan+" ";
            }
            know_as += nama_lengkap;
            if(gelar_belakang!==""){
                know_as += " "+gelar_belakang;
            }
            $("#know_asmapping").textbox('setValue',know_as);
        }
    </script>

    <script type="text/javascript">                     
		function doSearchmapping(){
            $('#dgmapping').datagrid('load',{
				namamappingcari: $('#namamappingcari').textbox('getValue')
			});
		}
        function aksimapping(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            var userhris = "<?=$userhris;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Edit Data" onclick="editmapping(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                if(userhris==="sandy"){
                    var b = '<a href="javascript:void(0)" title="Hapus Data" onclick="destroymapping(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:8px !important;"></i></button></a>';
                } else {
                    var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';                    
                }
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
            }
            return a+b;
        }  
        function aksimapping2(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            var a = '<a href="javascript:void(0)" title="Riwayat mapping" onclick="detailmapping(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:100%;min-height:25px;font-size:10.5px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;padding:5px;">RIWAYAT</button></a>';            
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
        
        $('#kode_negaramapping').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#sukumapping').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#kode_negaramapping').combobox({
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
        $('#sukumapping').combobox({
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
        $("#dgmapping").datagrid({
            onDblClickRow: function() {
                //editUser();
            }            
        });
    });
    </script>
    <table id="dgmapping" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_mapping.php" pageSize="20"        
    		toolbar="#toolbarmapping" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksimapping" width="90" align="center" halign="center" data-options="formatter:aksimapping,styler:styler1">Aksi</th>
                <th field="kolommapping" width="160" align="left" halign="left" data-options="styler:styler1">Kolom</th>
                <th field="kode_akunmapping" width="160" align="center" halign="center" data-options="styler:styler1">Kode Akun</th>
                <th field="nama_akunmapping" width="400" align="left" halign="left" data-options="styler:styler1">Uraian</th>
                <th field="item_nomapping" width="140" align="center" halign="center" data-options="styler:styler1">Item No</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarmapping" style="background-color:#fff;padding:5px;">
        <?php if($akses_proses==="1" && $userhris=="sandy"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addmapping()" style="min-width:90px;">Tambah</a>
        <?php } ?>
    </div>
    
    <div id="dlgtemplatepeg" class="easyui-dialog" modal="true" style="min-width:300px;min-height:80px;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"
    		closed="true" buttons="#dlg-buttonstemplatepeg">
    	<form id="fmtemplatepeg" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="white-space:nowrap;">Template mapping</td>                    
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
    
    <div id="dlgmapping" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:10px;top:50px;"
    		closed="true" buttons="#dlg-buttonsmapping">
    	<form id="fmmapping" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table>
            <tr>
                <td style="width:140px;">Kolom</td>
                <td><input class="easyui-textbox" id="kolommapping" name="kolommapping" data-options="required:true" style="width: 400px;"></td>
            </tr>  
            <tr>
                <td style="width:100px;">Kode AKun</td>
                <td>
                    <input class="easyui-textbox" id="kode_akunmapping" name="kode_akunmapping" data-options="required:true" style="width: 400px;">
                </td>
            </tr>  
            <tr>
                <td style="width:100px;">Uraian</td>
                <td>
                    <input class="easyui-textbox" id="nama_akunmapping" name="nama_akunmapping" data-options="required:true" style="width: 400px;">
                </td>
            </tr>  
            <tr>
                <td style="width:100px;">item No</td>
                <td>
                    <input class="easyui-textbox" id="item_nomapping" name="item_nomapping" data-options="required:false" style="width: 400px;">
                </td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsmapping">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savemapping()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgmapping').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addmapping(){
    		$('#dlgmapping').dialog('open').dialog('setTitle','Input Master Mapping');
    		$('#fmmapping').form('clear');
    		url = '<?=$foldernya;?>save_mapping.php';
    	}
    	function editmapping(index){
            var userhris = "<?=$userhris;?>";
            var row = $('#dgmapping').datagrid('getRow', index);
    		if (row){
                $('#dlgmapping').dialog('open').dialog('setTitle','Update Master Mapping');
                $('#fmmapping').form('clear');
    			$('#fmmapping').form('load',row);      
                if(userhris!=="sandy"){
                    $("#kolommapping").textbox('readonly',true);
                } else {
                    $("#kolommapping").textbox('readonly',false);
                }
                url = '<?=$foldernya;?>update_mapping.php?id='+row.idmapping;  
            }          
    	}
    	function savemapping(){
            //var p21b = $("#p21bmapping").numberbox('getValue');
            //alert(p21b);
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmmapping').form('submit',{
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
                        $('#dlgmapping').dialog('close');
                        $('#dgmapping').datagrid('reload');
                    }
                }
            });
    	}
    	function destroymapping(index){
            var row = $('#dgmapping').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data mapping "'+row.nama_lengkapmapping+'"?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_mapping.php',{id:row.idmapping},function(result){
    						if (result.success){
    							$('#dgmapping').datagrid('reload');	// reload the user data
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
    		$('#dlgtemplatepeg').dialog('open').dialog('setTitle','Upoad Template mapping');
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
    				$('#dgmapping').datagrid('reload');
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
    					$('#dgmapping').datagrid('reload');
    				}
                    */
    			}
    		});
    	}
        
    	function detailmapping(index){
            var row = $('#dgmapping').datagrid('getRow', index);
    		if (row){
                if ($('#tt').tabs('exists','Riwayat mapping')){
                    $('#tt').tabs('select','Riwayat mapping');
                    var tab = $('#tt').tabs('getSelected');
                    tab.panel('refresh', '<?=$foldernya;?>mapping2.php?nip='+row.nipmapping+'&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>');
                } else {
                    $('#tt').tabs('add',{
                        title: 'Riwayat mapping',
                        href: 'mapping2.php?nip='+row.nipmapping+'&proses=<?=$akses_proses;?>&view=<?=$akses_view;?>',
                        closable: true
                    });
                }
    		}
    	}

        //$("#dgmapping").height($(window).height() - 0);
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
    	#fmmapping .numberbox input{
    		text-align:right;
    	}
    </style>
<?php    
}
?>