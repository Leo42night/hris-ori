<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$akses_proses = $_REQUEST['proses'];
$akses_view = $_REQUEST['view'];
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
    </script>

    <script type="text/javascript">                     
		function doSearchkpp(){
            $('#dgkpp').datagrid('load',{
				statuskppcari: $('#statuskppcari').combobox('getValue'),
                // level_sppdkppcari: $('#level_sppdkppcari').combobox('getValue')
			});
		}
        function aksikpp(value,row,index){
            var akses_proses = "<?=$akses_proses;?>";
            if(parseInt(akses_proses)===1){
                var a = '<a href="javascript:void(0)" title="Update User" onclick="editkpp(\''+index+'\')"><button class="easyui-linkbutton c7" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-pencil-alt" style="font-size:10px;"></i></button></a>';
                var b = '<a href="javascript:void(0)" title="Hapus User" onclick="destroykpp(\''+index+'\')"><button class="easyui-linkbutton c5" style="width:30px;height:25px;font-size:11px;border:none;cursor:pointer;border-radius:3px;margin-bottom:5px;margin-right:3px;"><i class="fa fa-times" style="font-size:10px;"></i></button></a>';
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
        
        $('#kd_areakpp').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        
        
        $('#nama_unitkpp').combobox({
        	filter: function(q, row){
        		var opts = $(this).combobox('options');
        		return row[opts.textField].toLowerCase().indexOf(q.toLowerCase()) >= 0;
        	}
        });        

    </script> 
    
    <script>        
        $('#kd_areakpp').combobox({
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
        $('#nama_unitkpp').combobox({
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
        $("#dgkpp").datagrid({
        });
    });
    </script>
    <table id="dgkpp" title="" class="easyui-datagrid" style="width:100%;height:100%"	
            url="<?=$foldernya;?>get_master_kpp.php" pageSize="20"        
    		toolbar="#toolbarkpp" pagination="true" nowrap="false" method="post"   
    		rownumbers="false" fitColumns="false" singleSelect="true"
            >
    	<thead>
    		<tr>
                <th rowspan="2" field="aksikpp" width="80" align="center" halign="center" data-options="formatter:aksikpp,styler:styler1">Aksi</th>
    			<th rowspan="2" field="kppkpp" width="160" align="left" halign="left" data-options="styler:styler1">Nama KPP</th>
    			<th rowspan="2" field="alamatkpp" width="300" align="left" halign="left" data-options="styler:styler1">Alamat</th>
    			<th rowspan="2" field="alamat2kpp" width="300" align="left" halign="left" data-options="styler:styler1">Alamat 2</th>
    			<th rowspan="2" field="teleponkpp" width="140" align="left" halign="left" data-options="styler:styler1">Telepon</th>
    			<th rowspan="2" field="emailkpp" width="160" align="left" halign="left" data-options="styler:styler1">Email</th>
    			<th rowspan="2" field="path_ttdkpp" width="140" align="left" halign="left" data-options="styler:styler1">TTD</th>
    			<th colspan="2" style="text-align:center;">Data Pemotong</th>
    			<th colspan="2" style="text-align:center;">Data Pejabat</th>
    		</tr>
    		<tr>
    			<th field="npwp_pemotongkpp" width="120" align="left" halign="left" data-options="styler:styler1">NPWP</th>
    			<th field="nama_pemotongkpp" width="220" align="left" halign="left" data-options="styler:styler1">Nama</th>
    			<th field="npwp_pejabatkpp" width="120" align="left" halign="left" data-options="styler:styler1">NPWP</th>
    			<th field="nama_pejabatkpp" width="180" align="left" halign="left" data-options="styler:styler1">Nama</th>
    		</tr>
    	</thead>
    </table>
    <div id="toolbarkpp" style="background-color:#fff;padding:5px;">
    	<div id="tbkpp" style="padding:3px">
            <?php if($akses_proses==="1"){?>
            <a href="javascript:void(0)" class="easyui-linkbutton c1" iconCls="fa fa-plus-circle" plain="false" onclick="addkpp()" style="min-width:90px;">Tambah KPP</a>
            <?php } ?>
    	</div>        
    </div>
    
    <div id="dlgkpp" class="easyui-dialog" modal="true" style="width:380px;min-height:120px;max-height:500px;padding:10px;top:50px;"
    		closed="true" buttons="#dlg-buttonskpp">
    	<form id="fmkpp" class="easyui-form" method="post" data-options="novalidate:true" enctype="multipart/form-data">
            <table style="width:350px;">
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Nama KPP</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-textbox" id="kppkpp" name="kppkpp" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Alamat 1</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-textbox" id="alamatkpp" name="alamatkpp" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Alamat 2</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-textbox" id="alamat2kpp" name="alamat2kpp" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Telepon</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-textbox" id="teleponkpp" name="teleponkpp" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Email</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-textbox" id="emailkpp" name="emailkpp" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;font-weight:bold !important;">DATA PEMOTONG</label>
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">NPWP Pemotong</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-textbox" id="npwp_pemotongkpp" name="npwp_pemotongkpp" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Nama Pemotong</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-textbox" id="nama_pemotongkpp" name="nama_pemotongkpp" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;font-weight:bold !important;">DATA PEJABAT</label>
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">NPWP Pejabat</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-textbox" id="npwp_pejabatkpp" name="npwp_pejabatkpp" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <div style="margin-bottom:5px;">
                        <label style="font-weight: normal !important;font-size:12px;">Nama Pejabat</label>
                        <span class="brxsmall1"></span>
                        <input class="easyui-textbox" id="nama_pejabatkpp" name="nama_pejabatkpp" missingMessage="Harus di isi" data-options="required:true" style="width: 100%;">
                    </div>
                </td>
            </tr>  
            </table>
    	</form>
    </div>
    <div id="dlg-buttonskpp">
        <a href="javascript:void(0)" id="simpan" class="easyui-linkbutton c1" iconCls="fa fa-save" onclick="savekpp()" style="min-width:90px">Simpan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c5" iconCls="fa fa-times-circle" onclick="javascript:$('#dlgkpp').dialog('close')" style="min-width:90px">Batal</a>
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
    	function addkpp(){
    		$('#dlgkpp').dialog('open').dialog('setTitle','Input KPP');
    		$('#fmkpp').form('clear');
    		url = '<?=$foldernya;?>save_kpp.php?id=0';
    	}
    	function editkpp(index){
            var row = $('#dgkpp').datagrid('getRow', index);
    		if (row){
                $('#dlgkpp').dialog('open').dialog('setTitle','Update KPP');
                $('#fmkpp').form('clear');
    			$('#fmkpp').form('load',row); 
                url = '<?=$foldernya;?>update_kpp.php?id='+row.idkpp;  
            }          
    	}
    	function savekpp(){
            $.messager.progress({height:75, text:'Proses simpan data...'});
            $('#fmkpp').form('submit',{
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
                        $('#dlgkpp').dialog('close');
                        $('#dgkpp').datagrid('reload');
                    }
                }
            });
    	}
    	function destroykpp(index){
            var row = $('#dgkpp').datagrid('getRow', index);
    		if (row){
    			$.messager.confirm('Konfirmasi','Yakin menghapus data ini?',function(r){
    				if (r){
    					$.post('<?=$foldernya;?>destroy_kpp.php',{id:row.idkpp},function(result){
    						if (result.success){
    							$('#dgkpp').datagrid('reload');	// reload the user data
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

        //$("#dgkpp").height($(window).height() - 0);
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