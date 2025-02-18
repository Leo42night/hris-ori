<?php
// Pengaturan Absensi
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "api/absensi/";
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
            var gelar_depan = $("#gelar_depandevice").combobox('getValue');
            var gelar_belakang = $("#gelar_belakangdevice").combobox('getValue');
            var nama_lengkap = $("#nama_lengkapdevice").textbox('getValue');
            var know_as = "";
            if(gelar_depan!==""){
                know_as += gelar_depan+" ";
            }
            know_as += nama_lengkap;
            if(gelar_belakang!==""){
                know_as += " "+gelar_belakang;
            }
            $("#know_asdevice").textbox('setValue',know_as);
        }
    </script>

    <script type="text/javascript">                     
		function doSearchdevice(){
            $('#dgdevice').datagrid('load',{
				namadevicecari: $('#namadevicecari').textbox('getValue')
			});
		}
        function aksidevice(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var c = '<a href="javascript:void(0)" title="Edit Akses" onclick="editdevice(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                var a = '<a href="javascript:void(0)" title="Reset Device" onclick="resetdevice(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-mobile-alt" style="font-size:8px !important;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Reset Password" onclick="resetpassword(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-key" style="font-size:8px !important;"></i></button></a>';
            } else {
                var c = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-history" style="font-size:10px;"></i></button></a>';
                var b = '<a><button class="easyui-linkbutton c2" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-right:3px;"><i class="fa fa-key" style="font-size:8px !important;"></i></button></a>';
            }
            return c+a+b;
        }  
        function aksidevice2(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            var a = '<a href="javascript:void(0)" title="Riwayat device" onclick="detaildevice(\''+index+'\')"><button class="easyui-linkbutton c6" style="width:100%;min-height:25px;font-size:10.5px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;padding:5px;">RIWAYAT</button></a>';
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
        
        $('#kode_negaradevice').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#sukudevice').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#kode_negaradevice').combobox({
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
        $('#sukudevice').combobox({
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
        $("#dgdevice").datagrid({
            onDblClickRow: function() {
                //editUser();
            }            
        });
    });
    </script>
    <table id="dgdevice" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_device.php" pageSize="20"        
    		toolbar="#toolbardevice" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksidevice" width="110" align="center" halign="center" data-options="formatter:aksidevice,styler:styler1">Aksi</th>
    			<th field="nipdevice" width="120" align="center" halign="center" data-options="styler:styler1">No Induk</th>
    			<th field="namadevice" width="200" align="left" halign="left" data-options="styler:styler1">Nama Lengkap</th>                
                <th field="akses2device" width="100" align="center" halign="center" data-options="styler:styler1">Akses</th>
                <th field="kode_devicedevice" width="200" align="center" halign="center" data-options="styler:styler1">Kode Device</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbardevice" style="background-color:#fff;padding:5px;">
    	<div id="tbdevice" style="padding:3px">
            <table>
            <tr>
                <td style="padding-right:5px;">NIP/NAMA</td>
                <td style="padding-right:10px;">
                    <input class="easyui-textbox" id="namadevicecari" name="namadevicecari" data-options="required:false,prompt:'search'" style="width: 160px;">
                </td>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchdevice()" style="min-width:90px;">Search</a>
                </td>
            </tr>
            </table>
    	</div>        
        <?php if($akses_proses==="1"){?>
        <!--<a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="adddevice()" style="min-width:90px;">Tambah</a>-->
        <a target="_blank" href="template/template_device.xlsx" class="easyui-linkbutton c6" iconCls="fa fa-plus-circle" plain="false" style="min-width:90px;">Template device</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="uploadtemplatepeg()" style="min-width:90px;">Upload Template</a>     
        <?php } ?>
    </div>
    
    <div id="dlgdevice" class="easyui-dialog" modal="true" style="min-width:300px;min-height:120px;max-height:500px;padding:10px;"
    		closed="true" buttons="#dlg-buttonsdevice">
    	<form id="fmdevice" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table style="width:100%;">
            <tr>
                <td>
                    <div>
                        <div class="labelfor"><label>No Induk</label></div>
                        <input class="easyui-textbox" id="nipdevice" name="nipdevice" data-options="required:true" style="width: 300px;" readonly>
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div>
                        <div class="labelfor"><label>Nama</label></div>
                        <input class="easyui-textbox" id="namadevice" name="namadevice" data-options="required:true" style="width: 300px;" readonly>
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div>
                        <div class="labelfor"><label>Jenis Akses</label></div>
                        <select id="aksesdevice" name="aksesdevice" class="easyui-combobox" editable="false" data-options="panelHeight:'auto',required:true" style="width: 300px;">
                        <option value="android">ANDROID</option>
                        <option value="ios">IOS/WEB</option>
                        </select>                            
                    </div>
                </td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonsdevice">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savedevice()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgdevice').dialog('close')" style="min-width:90px">Batal</a>
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
    	function resetdevice(index){
            var row = $('#dgdevice').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Reset device pegawai atas nama "'+row.namadevice+'"?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>reset_device.php',{nip:row.nipdevice},function(result){
                            //alert(result);
    						if (result.success){
    							$('#dgdevice').datagrid('reload');
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

    	function resetpassword(index){
            var row = $('#dgdevice').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Reset password pegawai atas nama "'+row.namadevice+'" menjadi nomor induk?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>reset_password.php',{nip:row.nipdevice},function(result){
                            // alert(result);
    						if (result.success){
    							$('#dgdevice').datagrid('reload');
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

    	function editdevice(index){
            var row = $('#dgdevice').datagrid('getRow', index);
    		if (row){
                $('#dlgdevice').dialog('open').dialog('setTitle','Edit Jenis Akses');
                $('#fmdevice').form('clear');
                $('#fmdevice').form('load',row);
                url = '<?=$foldernya;?>update_device.php?nip='+row.nipdevice;
    		}
    	}

    	function savedevice(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmdevice').form('submit',{
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
                    var result = eval('(' + result + ')');
                    if (result.errorMsg){
                        $.messager.alert('ERROR',result.errorMsg,'warning');
                    } else {
                        $('#dlgdevice').dialog('close');
                        $('#dgdevice').datagrid('reload');
                    }
                }
            });
    	}

        //$("#dgdevice").height($(window).height() - 0);
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
    	#fmdevice .numberbox input{
    		text-align:right;
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