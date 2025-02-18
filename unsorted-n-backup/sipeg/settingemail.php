<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";

if (!$userhris || ($akses_proses!="1" && $akses_view!="1")){
    echo "<br/>&nbsp;&nbsp;Maaf, Anda tidak memiliki akses di halaman ini. Silahkan hubungi <strong>administrator</strong>.<br/>";    
} else {
    $foldernya = "sipeg/pegawai/emailnTelp/";
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
		function doSearchsettingemail(){
            $('#dgsettingemail').datagrid('load',{
                namasettingemailcari: $('#namasettingemailcari').textbox('getValue')
			});
		}

        function aksisettingemail(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            var userhris = "<?=$userhris;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update Data" onclick="editsettingemail(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:28px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-top:3px;"><i class="fa fa-pencil-alt" style="font-size:8px !important;"></i></button></a>';
            } else {
                var a = '<a><button class="easyui-linkbutton c2" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:3px;margin-top:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
            }
            return a;
        }  

        function ttlnya(value,row,index){
            var a = row.tempat_lahirsettingemail;
            a += '<br/><span style="color:#337ab7;">'+row.tgl_lahir2settingemail+'</span>';
            return a;
        }  

		function styler1(value,row,index){
            return 'padding-top:3px;padding-bottom:3px;vertical-align: top;';
		}
        
        $('#penempatansettingemail').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#atasan_langsungsettingemail').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        $('#atasan_atasan_langsungsettingemail').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        $('#kd_project_sapsettingemail').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#penempatansettingemail').combobox({
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
        $('#atasan_langsungsettingemail').combobox({
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
        $('#atasan_atasan_langsungsettingemail').combobox({
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
        $('#kd_project_sapsettingemail').combobox({
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
        $("#dgsettingemail").datagrid({
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
    <table id="dgsettingemail" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_settingemail.php" pageSize="20"        
    		toolbar="#toolbarsettingemail" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th field="aksisettingemail" width="50" align="center" halign="center" data-options="formatter:aksisettingemail">Aksi</th>
    			<th field="nipsettingemail" width="120" align="center" halign="center" data-options="">No Induk</th>
    			<th field="namasettingemail" width="250" align="left" halign="left" data-options="">Nama</th>
                <th field="teleponsettingemail" width="140" align="center" halign="center" data-options="">Telepon</th>
                <th field="emailsettingemail" width="250" align="left" halign="left" data-options="">Email 1</th>
                <th field="email2settingemail" width="250" align="left" halign="left" data-options="">Email 2</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarsettingemail" style="background-color:#fff;padding:5px;">
    	<div id="tbsettingemail" style="padding:3px">
            <table>
            <tr>
                <td style="padding-right:5px;">NIP/Nama</td>
                <td style="padding-right:10px;">
                    <input class="easyui-textbox" id="namasettingemailcari" name="namasettingemailcari" data-options="required:false,prompt:'search'" style="width: 160px;">
                </td>
                <td colspan="2">
                    <a href="#" class="easyui-linkbutton c6" plain="true" iconCls="fa fa-search" onclick="doSearchsettingemail()" style="min-width:90px;">Search</a>
                </td>
            </tr>
            </table>
    	</div>        
        <?php if($akses_proses=="1"){?>
        <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addsettingemail()" style="min-width:90px;">Tambah</a>
        <?php } ?>
    </div>
    
    <div id="dlgsettingemail" class="easyui-dialog" modal="true" style="min-width:200px;min-height:120px;max-height:500px;padding:5px 20px 10px 10px;top:40px;"
    		closed="true" buttons="#dlg-buttonssettingemail">
    	<form id="fmsettingemail" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
        <table>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>No Induk</label></div>
                        <input class="easyui-textbox" id="nipsettingemail" name="nipsettingemail" data-options="required:true" style="width: 100%;" readonly>
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Nama</label></div>
                        <input class="easyui-textbox" id="namasettingemail" name="namasettingemail" data-options="required:false" style="width: 100%;" readonly>
                    </div>
                </td> 
            </tr>
            <tr>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Telepon</label></div>
                        <input class="easyui-textbox" id="teleponsettingemail" name="teleponsettingemail" data-options="required:false" style="width: 100%;">
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
                        <input class="easyui-textbox" id="emailsettingemail" name="emailsettingemail" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
                <td style="width:10px;"></td>
                <td style="width:250px;">
                    <div>
                        <div class="labelfor"><label>Email 2</label></div>
                        <input class="easyui-textbox" id="email2settingemail" name="email2settingemail" data-options="required:false" style="width: 100%;">
                    </div>
                </td> 
            </tr>
        </table>
        </form>
    </div>
    <div id="dlg-buttonssettingemail">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savesettingemail()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgsettingemail').dialog('close')" style="min-width:90px">Batal</a>
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
    	function editsettingemail(index){
            var row = $('#dgsettingemail').datagrid('getRow', index);
    		if (row){
                $('#dlgsettingemail').dialog('open').dialog('setTitle','Setting Email Pegawai');
                $('#fmsettingemail').form('clear');
    			$('#fmsettingemail').form('load',row);  
                url = '<?=$foldernya;?>update_settingemail.php?id='+row.idsettingemail;  
            }          
    	}
    	function savesettingemail(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmsettingemail').form('submit',{
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
                        $('#dlgsettingemail').dialog('close');
                        $('#dgsettingemail').datagrid('reload');
                    }
                }
            });
    	}
        $("#dgsettingemail").height($(window).height() - 0);
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